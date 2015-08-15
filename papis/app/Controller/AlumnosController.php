<?php 
App::uses('AppController', 'Controller');
/**
* Controlador de alumnos
*/

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class AlumnosController extends AppController
{
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session','Paginator','RequestHandler');
	public $paginate =array(
				'limit'=>10,
				'order'=> array(
						'Alumno.apellidos'=>'asc'));






	public function index()
	{
		$this->Alumno->recursive=1;

		$this->Paginator->settings = $this->paginate;
		$alumnos = $this->Paginator->paginate();

    	$this->set('alumnos', $alumnos);

    	$grupos=$this->Alumno->Matricula->Grupo->find('list', array('fields'=>array('id','nombre_grupo')));
    	$this->set('grupos',$grupos);
    	
    	$curso_academico=$this->Alumno->Matricula->Cursoacademico->find('list', array('fields'=>array('id','cursoacademico'),
    																				'order'=>array('Cursoacademico.cursoacademico DESC')));
    	$this->set('curso_academico',$curso_academico);

    	$todos_alumnos=$this -> set ('todos_alumnos', 
    								$this->Alumno->find('all', array(
    														'order' => array(
    																'Alumno.apellidos ASC')
    												)));
	}



/*
* VER UN ALUMNO;
*
* Genera una ficha de cada alumno con los siguienetes elementos:
* 	- datos del alumno
* 	- grupos en los que ha estado matriculado
* 	- incidencias
* 	- notas
*
* Necesitamos pasarle un parametro $id para individualizar el alumno.
*/

	public function ver($id=null) 
	{

		/**
		* @var: 
		*/

		$titulo_pagina='Ficha de Participante';
		$url = array('action'=> 'ver',$id);


		$this -> set (array(
						'titulo_pagina'=>$titulo_pagina,
						'url'=>$url
					));

		/********************************************/

		# comprobamos que nos llega un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');
			
		}

		# Almacenamos en $alumno los datos de la busqueda por id
		$alumno = $this->Alumno->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$alumno) {
			throw new NotFoundException('El alumno no existe...');
			
		}
	
		# Extraemos una lista de los grupos y la almacenamos en la variable $grupos.
		$grupos=$this->Alumno->Matricula->Grupo->find('list', array('fields'=>array('id','nombre_grupo')));

		# Extraemos una lista de los cursos academicos y la almacenamos en la variable $cursoacademico.
		$cursoacademico=$this->Alumno->Matricula->Cursoacademico->find('list',array('fields'=>'cursoacademico'));

		# Extraemos una lista de las matrículas del alumno y la almacenamos en la variable $matricula.
		$matricula=$this->Alumno->Matricula->find('all', array('fields'=>array('id','alumno_id','grupo_id','cursoacademico_id'),
																'conditions'=>array('Matricula.alumno_id'=>$id),
																'order'=>array('Matricula.cursoacademico_id DESC'))
														);

		//$todos_compis=$this->Alumno->Matricula->find('all', array('fields'=>array('alumno_id','grupo_id','cursoacademico_id')));
		//$this->set('todos_compis',$todos_compis);

		$compis= $this->Alumno->Matricula->find('all',array(
        												'conditions' => array(
        															//'grupo_id' => $alumno['Matricula']['grupo_id'],
        															//'cursoacademico_id'=> $alumno['Matricula']['cursoacademico_id']
        													),
        												));

		$todos_grupos=$this->Alumno->Matricula->Grupo->find('all');
		
		# Comprobamos si alguno de los grupos en los que está matriculado requiere matricula en CEPA..

		$grupos_cepa=$this->Alumno->Matricula->find('all', array(
															'conditions'=>array(
																				'Alumno.id' => $id,
																				'Grupo.cepa'=>true)));

		$mis_grupos=$this->Alumno->Matricula->find('all', array(
															'conditions'=>array(
																				'Alumno.id' => $id,
																				)));
	
		$tipoincidencias=$this->Alumno->Incidencia->Tipoincidencia->find('list', array('fields'=>array('id', 'nombre')));		

		$incidencias=$this->Alumno->Incidencia->find('all',array(
        												'conditions' => array(
        															'alumno_id' => $id),
    													'order' => array(
    																'fecha DESC, Incidencia.id DESC')
        												));

		# Extraemos las notas de este alumno.

		$notas= $this->Alumno->Nota->find('all',array(
        												'conditions' => array(
        															'Nota.alumno_id' => $id),
        												));

		# Extraemos una lista de las asignaturas y la almacenamos en la variable $asignaturas.
		$asignaturas=$this->Alumno->Nota->Asignatura->find('list', array('fields'=>array('id','cod', 'curso')));
		
		
		# Extraemos una lista de las convocatorias y la almacenamos en la variable $convocatorias.
		$convocatorias=$this->Alumno->Nota->Convocatoria->find('list', array('fields'=>array('id','cod')));
		

		# Mandamos el curso académico actual, que será el último que tenemos en la tabla cursoacademicos..
		$current_cursoacademico=$this->Alumno->Matricula->find('first', array (
														'fields'=>array('cursoacademico_id'),
														'order'=> array('Matricula.cursoacademico_id DESC')));
		

		
//debug($grupos_matricula);exit();	
		$alumno_sesiones = $this->Alumno->Matricula->Grupo->Sesioneshorario->find('all',array(
																	'conditions'=>array(
																	
																		//'Sesioneshorario.grupo_id'=>$grupos_matricula['grupo_id'],
																		//'Sesioneshorario.cursoacademico_id'=>$grupos_matricula['cursoacademico_id'],
																)));

		$nombres_horarios=$this->Alumno->Matricula->Grupo->Sesioneshorario->Nombrehorario->find('all');
		
		$this->set(array(
			'alumno_sesiones'=>$alumno_sesiones,
			'dias_semana'=> $this->Alumno->Matricula->Grupo->Sesioneshorario->dias_semana,
			'horas_sesion'=> $this->Alumno->Matricula->Grupo->Sesioneshorario->horas_sesion,
			'current_cursoacademico'=>$current_cursoacademico,
			'convocatorias'=>$convocatorias,
			'asignaturas'=>$asignaturas,
			'notas'=>$notas,
			'incidencias'=>$incidencias,
			'tipoincidencias'=>$tipoincidencias,
			'mis_grupos'=>$mis_grupos,
			'grupos_cepa'=>$grupos_cepa,
			'todos_grupos'=>$todos_grupos,
			'grupos'=>$grupos,
			'compis'=>$compis,
			'matricula'=>$matricula,
			'cursoacademico'=>$cursoacademico,
			'alumno'=> $alumno
			));

	
		$dir = new Folder(WWW_ROOT . 'img/fotos');
		$this->set('dir',$dir);

		//---------------------------------------//
		// PDF
		/*
		$this->Alumno->id = $id;
            if (!$this->Alumno->exists()) {
                throw new NotFoundException(__('El Alumno no exixte...'));
            }
            $this->pdfConfig = array(
                'orientation' => 'portrait',
                'filename' => 'Invoice_' . $id
            );
            $this->set('ficha-pdf', $this->Alumno->read(null, $id));

        */
        


	}

/*
* CREAR UN NUEVO ALUMNO
*/
		

	public function nuevo()
	{


		$filename=null;
		# Validamos que los datos llegan por post
		if ($this->request->is('post')) 
		{


			$this->Alumno->create();

			$filename=$this->request->data['Alumno']['dni'];
			
				if (!empty($this->request->data['Alumno']['foto']['tmp_name'])
    				&& is_uploaded_file($this->request->data['Alumno']['foto']['tmp_name'])) 
				{

				$filename=basename($this->request->data['Alumno']['dni']);

				move_uploaded_file($this->request->data['Alumno']['foto']['tmp_name'],IMAGES.'fotos/'.$this->request->data['Alumno']['dni'].'.jpg');
				}

		$this->request->data['Alumno']['foto'] = $filename;

	//echo $filename;exit();
	

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Alumno->save($this->request->data)) {
				$this->Session->setFlash('Se ha creado un nuevo alumno', $element='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'index'));


			}
			
			$this->Session->setFlash('No se ha podido crear el nuevo alumno.');

		}	
	}

/*
* EDITAR UN ALUMNO
*
* @param string $id
* 
*/
	
	public function editar($id=null)
	{

		$filename=null;
		# Comprobamos si nos ha llegado un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');	
		}
		# Almacenamos en $alumno los datos de la busqueda por id
		$alumno = $this->Alumno->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$alumno) {
			throw new NotFoundException('El alumno no existe...');
			
		}

		if ($this->request->is(array('post','put'))) {
	
			# le decimos que el id enviado por el formulario debe ser igual que el que localizamos en la BD
			$this->Alumno->id =$id;


	# Gestión del cambio de foto #


			if (!empty($this->request->data['Alumno']['foto']['tmp_name'])
    				&& is_uploaded_file($this->request->data['Alumno']['foto']['tmp_name'])) 
				{

				$filename=basename($this->request->data['Alumno']['dni']);

				move_uploaded_file($this->request->data['Alumno']['foto']['tmp_name'],IMAGES.'fotos/'.$this->request->data['Alumno']['dni'].'.jpg');
				} else{
				$filename=basename($this->request->data['Alumno']['dni']);	
				}

			$this->request->data['Alumno']['foto'] = $filename;
		
		#################################################################

			if ($this->Alumno->save($this->request->data)) {
				$this->Session->setFlash('Los datos del alumno han sido editados con éxito.', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'ver',$alumno['Alumno']['id']));
			}
			$this->Session->setFlash('No se ha podido editar el alumno.');
		}

		# Si no hay ningún cambio devolvemos los datos iniciales
		if (!$this->request->data) {
			$this->request->data =$alumno;
		}

		# Metemos los datos en la variable alumno.
		$this -> set ('alumno', $alumno);

		$grupos=$this->Alumno->Matricula->Grupo->find('list', array('fields'=>array('id','nombre_grupo')));
		$this->set('grupos',$grupos);
	}

	public function eliminar($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Alumno->delete($id, true)) {
			$this->Session->setFlash ('El alumno ha sido eliminado, así como las incidencias asociadas a su paso por el programa.', $element='default',$params=array('class'=>'alert alert-success'));
			return $this->redirect(array('action'=>'index'));
		}
	}


/*
* BUSCADOR DE ALUMNOS;
*
* 
*/	

	public function searchjson()
	{
		$term=null;
		if (!empty($this->request->query['term'])) {
			$term=$this->request->query['term'];
			$terms=explode(' ', trim($term));
			$terms=array_diff($terms, array(''));

			foreach ($terms as $term) {
				$conditions[]= array('Alumno.nombre_completo LIKE' => '%' . $term . '%');
			}

			$alumnos = $this->Alumno->find('all', array(
														'recursive'=>-1,
														'fields'=>array(
																		'Alumno.id', 'Alumno.nombre_completo', 'Alumno.dni','Alumno.foto'),
														'conditions'=>$conditions,
														'limit'=> 20
														));
		}
		echo json_encode($alumnos);
		$this->autoRender = false;
	}

	public function search()
	{
		$search=null;

		if (!empty($this->request->query['search'])){
			$search=$this->request->query['search'];
			$search=preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $search);
			$terms=explode(' ', trim($search));
			$terms=array_diff($terms, array(''));

			foreach ($terms as $term) {
				$terms1[]= preg_replace('/[^a-zA-ZñÑáéíóúÁÉÍÓÚ0-9 ]/', '', $term);
				$conditions[]= array('Alumno.nombre_completo LIKE' => '%' . $term . '%');
			}

			$alumnos = $this->Alumno->find('all', array(
														'recursive'=>-1,
														'fields'=>array(
																		'Alumno.id', 'Alumno.nombre_completo', 'Alumno.dni','Alumno.foto'),
														'conditions'=>$conditions,
														'limit'=> 200
														));

			if (count($alumnos)==1) {
				return $this->redirect(array(
											'controller'=>'alumnos',
											'action'=>'ver',
											$alumnos[0]['Alumno']['id']
											));
			}

			$terms1 = array_diff($terms1, array(''));
			$this->set(compact('alumnos', 'terms1'));
		}

		$this->set(compact('search'));

		if ($this->request->is('ajax')) { //Por si en algún momento queremos usar ajax.
			$this->layout = false;
			$this->set('ajax', 1);
		}
		else{
			
			$this->set('ajax',0);
		}
	}





	public function prueba_pdf()
	{
		
	
		$alumnos=$this->Alumno->find('all');
        /*$url_pdf = $this->Html->url(array(
        			'controller'=> 'alumnos',
        			'action'=>'prueba_pdf',
        			'header-prueba',
        			'ext' => 'html'
        	));*/
				
            $this->pdfConfig = array(
            	'encoding' =>'utf8',
                'orientation' => 'portrait',
                'filename' => 'listado de todos los alumnos',
                //'header-html' => sprintf('<h1>prueba head</h1>')
                'options' => array(

		            'footer-left'=> date('d-m-Y'),
		            'footer-right'=> '[page] de [toPage]',
		            'header-html'=>'<img width= "100%" src="http://localhost/mis_doc_papis/header_banner.png"><hr><br>',
		        )
            );
           

            $this->set('alumnos', $alumnos);
	}


}
 ?>