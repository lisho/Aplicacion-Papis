<?php 

/**
* Controlador de Matriculas
*/

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class MatriculasController extends AppController
{
	public $helpers =array('Html','Form','Time');
	public $components= array ('Flash','Session','Paginator');
	public $paginate =array(
				'limit'=>10,
				'order'=> array(
						''=>''));


	public function index()
	{
		$this->Matricula->recursive=1;

		$this->Paginator->settings = $this->paginate;
		$matriculas = $this->Paginator->paginate();

    	$this->set('matriculas', $matriculas);

    	/*
    	$todos_alumnos=$this -> set ('todos_alumnos', 
    								$this->Alumno->find('all', array(
    														'order' => array(
    																'Alumno.apellidos ASC')
    												)));
    	*/
		# usamos set para listar todos los registros de alumnos
		//$this -> set ('alumnos', $this->Alumno->find('all'));
		//
	//echo "<pre>";
	//print_r($matriculas); exit();	
	//echo "</pre>";

	}


	public function ver($id=null) 
	{
		

		# comprobamos que nos llega un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');
			
		}

		
		# Almacenamos en $grupo los datos de la busqueda por id
		


		$grupo = $this->Matricula->findById($id);



		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$grupo) {
			throw new NotFoundException('El grupo no existe...');
			
		}

		# Metemos los datos en la variable grupo.
		$this -> set ('grupo', $grupo);


		$matriculas=$this->Matricula->Cursoacademico->find('all');
		$this -> set ('matriculas', $matriculas);

					
		
		$this -> set ('cursos', $cursos);
		//$users=$this->Grupo->User->find('list', array('fields'=>array('id','nombre_user')));
		//$this->set('users',$users);

		# Pasamos los datos de los grupos para generar los accesos del lateral.
		$todos_grupos=$this -> set ('todos_grupos', $this->Matricula->Grupo->find('all', array('order' => array('Grupo.nombre ASC'))));
		$this->set('grupos', $todos_grupos);

		//$alumno=$this->Grupo->Matricula->Alumno->find('all', array('order' => array('Alumno.nombre ASC')));
		//$alumnos=$this->$grupo->Alumno->find('list', array('fields'=>array('dni')));
		//$this->set('alumno', $alumno);

		# Comprobamos si hay foto del alumno
		//$dir = new Folder(WWW_ROOT . 'img/fotos');
		//$this->set('dir',$dir);
		
		
		//$nombre_foto= $grupo['Alumno'].'.jpg';
		//$foto = $dir->find($nombre_foto, true);
		//$this->set('foto', $foto);
		


	}

	public function nuevo($alumno=null)
	{
		# Validamos que los datos llegan por post
		if ($this->request->is('post')) 
		{
	

			$datos=$this->request->data;
	
			$todas_matriculas=$this->Matricula->find('threaded', array(
															'fields'=>array(
																  'Matricula.id','Matricula.alumno_id','Matricula.grupo_id','Matricula.cursoacademico_id'),
															//'conditions' => array('Matricula.id' => $alumno)
															));

			$current_cursoacademico=$this->Matricula->Cursoacademico->find('first', array(
														'fields'=>array('id','cursoacademico'),
														'conditions'=>array('id'=>$datos['Matricula']['cursoacademico_id'])
													));

			$this->loadModel('Grupo');

			$current_grupo=$this->Grupo->find('first', array(
														'fields'=>array('nombre_grupo'),
														'conditions'=>array('Grupo.id'=>$datos['Matricula']['grupo_id'])
													));

		
			
			# Revisamos si ya existe
			foreach ($todas_matriculas as $m) 
			{
			

				if ($m['Matricula']['alumno_id']===$datos['Matricula']['alumno_id'] &&
					$m['Matricula']['grupo_id']===$datos['Matricula']['grupo_id'] &&
					$m['Matricula']['cursoacademico_id']===$datos['Matricula']['cursoacademico_id']
					) 
				{
					$this->Session->setFlash('No hemos creado la matrícula porque ya existe una matrícula igual para este alumno!!', $elemnt='default',$params=array('class'=>'alert alert-danger'));
					return $this->redirect(array('controller'=>'alumnos','action'=>'ver',$alumno));
				}
			}
	
			$this->Matricula->create();

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Matricula->save($this->request->data)) {
				$this->Session->setFlash('Has creado una nueva matrícula', $elemnt='default',$params=array('class'=>'alert alert-success'));
			
				#Generamos una incidencia con los datos:
				
				$this->loadModel('Incidencia');
				$fecha_actual = date('Y-m-d');
				$this->Incidencia->create();
					$this->request->data['Incidencia']['user_id'] = $this->Auth->user('id');
					$this->request->data['Incidencia']['alumno_id'] = $alumno;
					$this->request->data['Incidencia']['fecha'] = $fecha_actual;
					$this->request->data['Incidencia']['titulo'] = 'Incidencia automatica por nueva matriculación';
					$this->request->data['Incidencia']['descripcion'] = 'Matricula en el Grupo '.$current_grupo['Grupo']['nombre_grupo'].'  (Curso academico 20'.$current_cursoacademico['Cursoacademico']['cursoacademico'].')';
					$this->request->data['Incidencia']['tipoincidencia_id'] = '4';
				$this->Incidencia->save($this->data);


				return $this->redirect(array('controller'=>'alumnos','action'=>'ver',$alumno));
			}

			$this->Session->setFlash('No se ha podido matricular al alumno.');
		}
		#Recuperamos un listado de los grupos
		
		$this->set('cursoacademicos', $this->Matricula->Cursoacademico->find('list', array(
																				'fields'=>array(
																							'cursoacademico'),
																				'order'=>'Cursoacademico.id DESC'
																				)));

		$this->set('alumnos', $this->Matricula->Alumno->find('list', array(
																		'fields'=>array('id',
																					'nombre_completo'),
																		'conditions'=>array(
																					'Alumno.id'=>$alumno)
																		)));


		$grupos=$this->Matricula->Grupo->find('list', array(
														'fields'=>array('id','nombre_grupo'),
														'order'=>'Grupo.nombre_grupo ASC'
														));
		$this->set('grupos',$grupos);
		$this->set('alumno',$alumno);
		
		
	}





	public function editar($id=null)
	{

	
	}



	public function eliminar($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Matricula->delete($id, true)) {
			
			$this->Flash->set('La matrícula de este alumno ha sido anulada correctamente.', array(
    														'element' => 'crea_incidencia'));

			//$this->Session->setFlash ('La matrícula de este alumno ha sido anulada correctamente.', $element='crea_incidencia',$params=array('class'=>'alert alert-success'));
			//return $this->redirect(array('controller' => 'alumnos','action'=>'ver',$matricula['alumno_id']));
			

			return $this->redirect($this->referer());
		}
	}


/**
 * Metodo para mostrar listados de asistencia de un alumno según sus matrículas.
 * 
 * @param  strin $alumno_id (identificador del alumno del que mostramos las asistencias)
 * @return             
 */		
	public function asistencia_por_alumno($alumno=null)
	{
			
	//	if ($this->request->is(array('post', 'put'))) {
	

			$asistencias_por_alumno=$this->Matricula->find('all',array(
																		'conditions'=>array(
																			'Matricula.alumno_id ='=>$alumno
																						)
																				));
			$eventos=$this->Matricula->Grupo->Evento->find('list',array(
																	'fields'=>'Evento.fecha,Evento.evento,Evento.id'
																	));

			$nombre_alumno=$asistencias_por_alumno[0]['Alumno']['nombre_completo'];
			$nombre_foto=$asistencias_por_alumno[0]['Alumno']['foto'].'.jpg';
			$this->set(array(
				'asistencias_por_alumno'=>$asistencias_por_alumno,
				'eventos'=>$eventos,
				'nombre_alumno'=>$nombre_alumno,
				'nombre_foto'=>$nombre_foto,
				));
			//debug($asistencias_por_alumno);exit();
	//	}	
	}


/**
* ACCION: Lista_alumnos: Genera un PDF con el listado de los alumnos de un grupo.
*/


	public function lista_alumnos_pdf($grupo=null, $cursoacademico=null){
		
	
		$alumnos=$this->Matricula->find('all',array(
											'conditions'=>array(
													'grupo_id'=>$grupo,
													'cursoacademico_id'=>$cursoacademico
												)
					));
        
		$this->set('alumnos', $alumnos);		

		//debug($alumnos[0]['Grupo']['nombre']);exit();


            $this->pdfConfig = array(
            	'encoding' =>'utf8',
                'orientation' => 'portrait',
                'filename' => 'listado de todos los alumnos - Grupo '.$alumnos[0]['Grupo']['nombre'],
                //'header-html' => sprintf('<h1>prueba head</h1>')
                'options' => array(

		            'footer-left'=> date('d-m-Y'),
		            'footer-right'=> '[page] de [toPage]',
		            'header-html'=>'<img width= "100%" src="http://localhost/mis_doc_papis/header_banner.png"><hr><br>',
		        )
            );
    }
    
    public function control_asistencia_pdf($grupo=null, $cursoacademico=null){
		
	
		$alumnos=$this->Matricula->find('all',array(
											'conditions'=>array(
													'grupo_id'=>$grupo,
													'cursoacademico_id'=>$cursoacademico
												)
					));
        
		$this->set('alumnos', $alumnos);		

		//debug($alumnos[0]['Grupo']['nombre']);exit();


            $this->pdfConfig = array(
            	'encoding' =>'utf8',
                'orientation' => 'portrait',
                'filename' => 'listado de todos los alumnos - Grupo '.$alumnos[0]['Grupo']['nombre'],
                //'header-html' => sprintf('<h1>prueba head</h1>')
                'options' => array(

		            'footer-left'=> date('d-m-Y'),
		            'footer-right'=> '[page] de [toPage]',
		            'header-html'=>'<img width= "100%" src="http://localhost/mis_doc_papis/header_banner.png"><hr><br>',
		        )
            );      

            
	}



	

}
 ?>