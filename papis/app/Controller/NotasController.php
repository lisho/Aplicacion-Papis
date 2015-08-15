<?php 



/**
* Controlador del Modelo Nota
*/

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class NotasController extends AppController
{
	
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session',);


	public function index()
	{

		# usamos set para listar todos los registros de Users	
		$this -> set ('notas', $this->Nota->find('all'));
	}



	public function crear($alumno_id=null, $cursoacademico_id=null, $curso=null)
	{
		$convocatoria=null;
		$asignatura=null;
 		$nota=null;

		# Buscamos un listado de convocatorias
				
		# Buscamos un listado de asignaturas

		$calificacion = array(
						'alumno_id'=>$alumno_id,
						'cursoacademico_id'=>$cursoacademico_id,
						'convocatoria_id'=> $convocatoria,
						'asignatura_id'=>$asignatura,
						'nota' => $nota);

		$notas_alumno=$this->Nota->find('all',array(
												'conditions'=>array(
																'Nota.alumno_id'=>$alumno_id,
																'Nota.cursoacademico_id'=>$cursoacademico_id,
																'Asignatura.curso'=>$curso)));

		debug($notas_alumno);exit();

		if ($this->request->is('post','put')) 
		{
			$this->Nota->create();
	

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Nota->save($this->request->data)) {
				$this->Session->setFlash('Se ha añadido una nota nueva', $element='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'index'));
			}
			
			$this->Session->setFlash('No se ha podido añadir la nota nueva.');

		}	
		
	}

	
/*
* ************GESTIONAR LAS NOTAS DE UN CURSO PARA UN ALUMNO, en un año academico. ********************
* 
* 		- SI existen notas las podremos editar mediante ajax.
* 		- SI NO existen notas la crearemos de golpe para todo el curso, el año académico actual y el alumno activo.
* 
*/


	public function gestiona_notas($alumno=null ,$curso=null ,$cursoacademico=null )
	{

		
		$datos=array('alumno' => $alumno,
					'curso' => $curso,
					'cursoacademico' => $cursoacademico);
		$this->set($datos);

		# Extraemos todos los datos del alumno activo.
		$alumno_completo=$this->Nota->Alumno->findById($alumno);
		$this->set('alumno_completo',$alumno_completo);


		# Extraemos el curso academico más reciente de nuestra base.
		$current_cursoacademico= $this->Nota->Cursoacademico->find('first', array(
														'fields'=>array('id', 'cursoacademico'),
														'conditions'=> array('id'=>$cursoacademico)));
		$this->set('current_cursoacademico',$current_cursoacademico);
		
		

		# Extraemos una lista de las asignaturas y la almacenamos en la variable $asignaturas.
		$asignaturas=$this->Nota->Asignatura->find('list', array('fields'=>array('id','cod', 'curso'),
																	'conditions'=>array('curso'=>$curso)));
		$this->set('asignaturas',$asignaturas);
		
		# Extraemos una lista de las convocatorias y la almacenamos en la variable $convocatorias.
		$convocatorias=$this->Nota->Convocatoria->find('list', array('fields'=>array('id','cod')));
		$this->set('convocatorias',$convocatorias);	

		$existen_notas=$this->Nota->find('all',array('conditions'=>array(
																		'alumno_id'=>$alumno,
																		'Asignatura.curso'=>$curso,
																		'cursoacademico_id'=>$cursoacademico)));
		

		/**
		* Validamos la existencia de cada nota y, si no existe, la creamos...
		*/
	
		$lista_asignaturas=$this->Nota->Asignatura->find('list', array('fields'=>array('id'),
																		'conditions'=> array(
																							'curso'=>$curso)));

		$lista_convocatorias=$this->Nota->Convocatoria->find('list', array('fields'=>array('id')));
		
	
		if (empty($existen_notas)) {

			foreach ($lista_convocatorias as $convocatoria) {
				
				foreach ($lista_asignaturas as $asignatura) {
			
						$datos_nota = array('nota'=> 'sc',
													'alumno_id'=>$alumno,
													'asignatura_id'=>$asignatura,
													'cursoacademico_id'=>$cursoacademico,
													'convocatoria_id'=>$convocatoria);
						$this->Nota->create();
						$this->Nota->save($datos_nota);
					
				}					
			}

			$this->Session->setFlash('Se ha creado satisfactoriamente un nuevo boletín de notas para 
											recoger las calificaciones de '.$alumno_completo['Alumno']['nombre_completo'].
											', en el curso de '.$curso.' (año académico 20'.$current_cursoacademico['Cursoacademico']['cursoacademico'].')', 
									$element='default',
									$params=array('class'=>'alert alert-success'));
		
			return $this->redirect(array('controller'=>'alumnos','action'=>'ver',$alumno));
		}


# Pasamos la ruta en la que se almacennan las fotos.
		$dir = new Folder(WWW_ROOT . 'img/fotos');
		$this->set('dir',$dir);
	}

	
/*
* Ver las notas de un alumno
*/

	public function borra_boletin($alumno=null ,$curso=null ,$cursoacademico=null )
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}

		$existen_notas=$this->Nota->find('all',array('conditions'=>array(
																		'alumno_id'=>$alumno,
																		'Asignatura.curso'=>$curso,
																		'cursoacademico_id'=>$cursoacademico)));
		foreach ($existen_notas as $nota) {
			
			$this->Nota->delete($nota['Nota']['id'], false);
		}

		
		$this->Session->setFlash ('El boletín ha sido eliminado junto con las notas que contenía. Si deseas introducir notas para este alumno necesitarás crear un boletin nuevo', $element='default',$params=array('class'=>'alert alert-success'));
		return $this->redirect(array('controller'=>'alumnos','action'=>'ver',$alumno));
		
	}

/*
* Gestion de las nostas mediante AJAX
*/

	public function notaupdate()
	{
		if ($this->request->is('ajax')) {

			$id=$this->request->data['id'];

			// Nos aseguramos de que no se pueda introducir el 0.
			/*if ($this->request->data['calificacion']==0) {
				$this->request->data['calificacion']=1;
			}*/

			//if-else resumido...
			$calificacion = isset($this->request->data['calificacion'])?$this->request->data['calificacion'] : null;
		
			if($calificacion == '0'){
				$calificacion = 'sc';
			}

			
			/*$item = $this->Nota->find('all', array(
												'fields'=>array('Nota.id','Nota.nota'),
												'conditions'=> array('Nota.id'=>$id)
												));
			$calificacion_item = $item[0]['Nota']['nota'];*/
			$calificacion_update = array('id'=>$id, 'nota'=> $calificacion);
			
			$this->Nota->saveAll($calificacion_update);
		}

		$nota_update = $this->Nota->find('all', array(
												'fields'=>array('Nota.id','Nota.nota'),
												'conditions'=> array('Nota.id'=>$id)
												));

		$mostrar_nota = array('id'=>$nota_update[0]['Nota']['id']);

		echo json_encode(compact('mostrar_nota'));
		$this->autoRender=false;

	}
}


 ?>

 