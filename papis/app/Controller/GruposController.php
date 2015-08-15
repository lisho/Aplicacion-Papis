<?php 

/**
* Controlador de la clase Grupo
*/

App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class GruposController extends AppController
{
	
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session','Paginator');
	public $paginate =array(
				'limit'=>10,
				'order'=> array(
						'Grupo.nombre'=>'asc'));

	public function index()
	{

		$grupos=$this->Grupo->find('all', array('order'=>'Grupo.nombre ASC'));
		$this -> set ('grupos', $grupos);

		$curso_academico=$this->Grupo->Matricula->Cursoacademico->find('all', array('fields'=>array('id','cursoacademico'),
																					'order'=>'Cursoacademico.cursoacademico DESC'));
		$this->set('curso_academico', $curso_academico);

		

					//echo "<pre>";
					//print_r($curso_academico);exit();
					
					//echo "</pre>";
				


				
	}

	public function listado()
	{
		# usamos set para listar todos los registros de alumnos
		$this->Grupo->recursive=0;
		$this->Paginator->settings = $this->paginate;
		$data = $this->Paginator->paginate('Grupo');
    	$this->set('grupos', $data);
/*
		$this->paginate['Grupo']['limit']=5;
		$this->paginate['Grupo']['order']=array(
					'Grupo.nombre'=> 'asc',
					);
		$this->paginate['Grupo']['conditions']=array(
				'Grupo.nombre'=>'asc',
					);
			
		$this -> set('grupos', $this->paginate());	
	*/

		$todos_grupos=$this -> set ('todos_grupos', $this->Grupo->find('all', array('order' => array('Grupo.nombre ASC'))));
		//$this->set('todos_grupos', $todos_grupos);
	}

	public function ver($id=null,$cursopasado=null)
	{
		

		$this->set('cursopasado',$cursopasado);
		$datos_sesiones= $this->Grupo->Sesioneshorario->find('all', array(
																		//'fields'=>array('id','cursoacademico'),
																		//'order'=>'Cursoacademico.cursoacademico DESC',
																		'conditions' => array(
																							'Sesioneshorario.grupo_id'=>$id,
																							'Sesioneshorario.cursoacademico_id'=>$cursopasado)
															));
		$this -> set ('datos_sesiones',$datos_sesiones);

		$this->set('dias_semana', $this->Grupo->Sesioneshorario->dias_semana);
		$this->set('horas_sesion', $this->Grupo->Sesioneshorario->horas_sesion);
		$this -> set ('nombres_horarios', $this->Grupo->Sesioneshorario->Nombrehorario->find('all'));

		# comprobamos que nos llega un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');
			
		}
		
		# Almacenamos en $grupo los datos de la busqueda por id
		
		$grupo = $this->Grupo->findById($id);
		$titulo_pagina='Gestión del Grupo'.$grupo['Grupo']['nombre'];
		$this -> set ('titulo_pagina',$titulo_pagina);


		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$grupo) {
			throw new NotFoundException('El grupo no existe...');
			
		}

		# Metemos los datos en la variable grupo.
		$this -> set ('grupo', $grupo);

		# Extraemos las matriculas que corresponden con el curso y con el grupo.
		$matricula=$this->Grupo->Matricula->find('all',array(
														'conditions'=>array(
																	'cursoacademico_id'=>$cursopasado,
																	'grupo_id'=>$id)
														));
		$this->set('matricula', $matricula);

		$curso_actual= $this->Grupo->Matricula->Cursoacademico->findById($cursopasado, array(
														'fields'=>'cursoacademico'
														));
		$this->set('curso_actual',$curso_actual);


		$users=$this->Grupo->User->find('list', array('fields'=>array('id','nombre_user')));
		$this->set('users',$users);

		$curso= $this->Grupo->Matricula->Cursoacademico->find('list', array('fields'=>array('id','cursoacademico')));
		$this->set('curso', $curso);
		// Pasamos los datos de los grupos para generar los accesos del lateral.
		$todos_grupos=$this -> set ('todos_grupos', $this->Grupo->find('all', array('order' => array('Grupo.nombre ASC'))));
		$this->set('grupos', $todos_grupos);

		$alumno=$this->Grupo->Matricula->Alumno->find('all', array('order' => array('Alumno.nombre ASC')));
		//$alumnos=$this->$grupo->Alumno->find('list', array('fields'=>array('dni')));
		$this->set('alumno', $alumno);

		//Comprobamos si hay foto del alumno
		$dir = new Folder(WWW_ROOT . 'img/fotos');
		$this->set('dir',$dir);
		//$nombre_foto= $grupo['Alumno'].'.jpg';
		//$foto = $dir->find($nombre_foto, true);
		//$this->set('foto', $foto);
		

	}

	public function nuevo()
	{
		# Validamos que los datos llegan por post
		if ($this->request->is('post')) 
		{
			$this->Grupo->create();

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash('Se ha creado un nuevo grupo', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'index'));
			}

		$this->Session->setFlash('No se ha podido crear el nuevo grupo.');
		}

		$users=$this->Grupo->User->find('list', array(
								'fields'=>array('id','nombre_user')));
		$this->set('users',$users);
	}

	public function editar($id=null)
	{

		# Comprobamos si nos ha llegado un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');	
		}
		# Almacenamos en $grupo los datos de la busqueda por id
		$grupo = $this->Grupo->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$grupo) {
			throw new NotFoundException('El grupo no existe...');
			
		}

		if ($this->request->is(array('post','put'))) {
	
			# le decimos que el id enviado por el formulario debe ser igual que el que localizamos en la BD
			$this->Grupo->id =$id;

			if ($this->Grupo->save($this->request->data)) {
				$this->Session->setFlash('Los datos del grupo han sido editados con éxito.', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'ver', $id));
			}
			$this->Session->setFlash('No se ha podido editar el grupo.');
		}

		# Si no hay ningún cambio devolvemos los datos iniciales
		if (!$this->request->data) {
			$this->request->data =$grupo;
		}

		# Metemos los datos en la variable grupo.
		$this -> set ('grupo', $grupo);

		$users=$this->Grupo->User->find('list', array('fields'=>array('id','nombre_user')));
		$this->set('users',$users);
	}

	public function eliminar($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Grupo->delete($id)) {
			$this->Session->setFlash ('El grupo ha sido eliminado', $element='default',$params=array('class'=>'alert alert-success'));
			return $this->redirect(array('action'=>'index'));
		}

		$users=$this->Grupo->User->find('list', array('fields'=>array('id','nombre_user')));
		$this->set('users',$users);
	}

	public function ver_curso($id=null,$cursoacademico=null) 
	{
		# comprobamos que nos llega un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');
			
		}
		
		# Almacenamos en $grupo los datos de la busqueda por id
		$grupo = $this->Grupo->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$grupo) {
			throw new NotFoundException('El grupo no existe...');
			
		}

		# Metemos los datos en la variable grupo.
		$this -> set ('grupo', $grupo);

		$users=$this->Grupo->User->find('list', array('fields'=>array('id','nombre_user')));
		$this->set('users',$users);



		// Pasamos los datos de los grupos para generar los accesos del lateral.
		$todos_grupos=$this -> set ('todos_grupos', $this->Grupo->find('all', array('order' => array('Grupo.nombre ASC'))));
		$this->set('grupos', $todos_grupos);

		$alumno=$this->Grupo->Matricula->Alumno->find('all', array('order' => array('Alumno.nombre ASC')));
		//$alumnos=$this->$grupo->Alumno->find('list', array('fields'=>array('dni')));
		$this->set('alumno', $alumno);

		//Comprobamos si hay foto del alumno
		$dir = new Folder(WWW_ROOT . 'img/fotos');
		$this->set('dir',$dir);
		//$nombre_foto= $grupo['Alumno'].'.jpg';
		//$foto = $dir->find($nombre_foto, true);
		//$this->set('foto', $foto);
		

	}

	public function asistencias_por_grupo ($grupo=null) 
	{

		if ($this->request->is(array('post', 'put'))) {
		
			$datos_grupo=$this->Grupo->findById($grupo);

			$asistencias_por_grupo=$this->Grupo->Evento->findAllByGrupoId($grupo,array(),array('Evento.fecha ASC'));

			$nombres_alumnos=$this->Grupo->Matricula->findAllByGrupoId($grupo);

			$lista_eventos_grupo=$this->Grupo->Evento->findAllByGrupoId($grupo, 
																		array('fecha','evento','id','cursoacademico_id'),
																		array('Evento.fecha ASC')		
											);
			$cursopasado=$this->Grupo->Matricula->find('first', array(
													'conditions'=>array(),
													'order'=> array('Matricula.cursoacademico_id DESC')
											));
			$curso_academico= $this->Grupo->Evento->Cursoacademico->find('list',array(
										'fields'=>array('id', 'cursoacademico'),
										'order'=>'Cursoacademico.id DESC'));

			$meses=['08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre',
						'12'=>'Diciembre','01'=>'Enero','02'=>'Febrero','03'=>'Marzo',
						'04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio',
												];
			//debug($lista_eventos_grupo);exit();

			$this->set(array(
					'grupo'=>$datos_grupo,
					'lista_eventos_grupo'=>$lista_eventos_grupo,
					'asistencias_por_grupo'=>$asistencias_por_grupo,
					'nombre_grupo'=>$nombres_alumnos[0]['Grupo']['nombre'],
					'nombres_alumnos'=>$nombres_alumnos,
					'cursopasado'=>$cursopasado['Matricula']['cursoacademico_id'],
					'curso_academico'=>$curso_academico,
					'meses'=>$meses,
				));
		}
		else{
			
			throw new NotFoundException(__('Invalid asistencia'));
		}	

	}
}

 ?>