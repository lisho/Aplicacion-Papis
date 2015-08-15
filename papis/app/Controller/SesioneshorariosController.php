<?php 

/**
* Controlador de horarios
*/
class SesioneshorariosController extends AppController
{
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session');

	public function index()
	{
		# usamos set para listar todos los registros de horarios
		
		$datos_sesiones= $this->Sesioneshorario->find('all');
		$this -> set ('datos_sesiones',$datos_sesiones);

		$this->set('dias_semana', $this->Sesioneshorario->dias_semana);

		$this->set('horas_sesion', $this->Sesioneshorario->horas_sesion);
		
		$this -> set ('nombres_horarios', $this->Sesioneshorario->Nombrehorario->find('all',array(
				'conditions' => array(
									//'Sesioneshorario.id' => $alumno_id
									)
				)));
		
//debug($nh);exit;

			$cursos_existen= array();
			foreach ($datos_sesiones as $dato_sesion) {
				

				if (!in_array($dato_sesion['Sesioneshorario']['cursoacademico_id'], $cursos_existen)) {
					
					$cursos_existen[]=$dato_sesion['Sesioneshorario']['cursoacademico_id'];
				}		
			}
		$this->set('cursos_existen',$cursos_existen);

		$this -> set ('cursos_academicos', $this->Sesioneshorario->Cursoacademico->find('all', array(
																		'fields'=>array('id','cursoacademico'),
																		'order'=>'Cursoacademico.id DESC',
																		//'conditions' => array()
																)
														));
	}

	public function nuevo($grupo, $cursoacademico)
	{
						
		if ($this->request->is('post')) 
		{
			$this->Incidencia->create();

			# Pasamos el id del usuarios activo.
			$this->request->data['Sesioneshorario']['cursoacademico_id'] = $cursoacademico;
			$this->request->data['Sesioneshorario']['grupo_id'] = $grupo;
		
			# Activamos las validaciones del modelo con el metodo save
			if ($this->Incidencia->save($this->request->data)) {

				$this->Session->setFlash('Se ha creado una nueva sesión de horario', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array(
											'controller' => 'grupo',
											'action'=>'ver',
											$grupo,
											$cursoacademico
											));
			}

		$this->Session->setFlash('No se ha podido crear una nueva sesion de horario.');
		}
	}


	public function gestionar_horario($grupo=null,$cursopasado=null)
	{
		

		$grupo_actual=$this->Sesioneshorario->Grupo->find('all',array(
															//'fields'=>array('id','nombre'),
															'conditions' => array(
																	'Grupo.id'=>$grupo)));
		$cursopasado_nombre=$this->Sesioneshorario->Cursoacademico->find('list',array(
															'fields'=>'cursoacademico',
															'conditions'=>array('Cursoacademico.id'=>$cursopasado)));
		$this -> set ('cursopasado_nombre',$cursopasado_nombre);
		$this -> set ('grupo_actual',$grupo_actual);
		$this -> set ('cursopasado',$cursopasado);
		$this->set('dias_semana', $this->Sesioneshorario->dias_semana);
		$horas_sesion=$this->Sesioneshorario->horas_sesion;
		$this->set('horas_sesion', $horas_sesion);
//debug($horas_sesion);exit();

		$this -> set ('nombres_horarios', $this->Sesioneshorario->Nombrehorario->find('all'));
		$datos_sesiones= $this->Sesioneshorario->find('all', array(
																		//'fields'=>array('id','cursoacademico'),
																		//'order'=>'Cursoacademico.cursoacademico DESC',
																		'conditions' => array(
																							'Sesioneshorario.grupo_id'=>$grupo,
																							'Sesioneshorario.cursoacademico_id'=>$cursopasado)
															));
		$this -> set ('datos_sesiones',$datos_sesiones);


//debug($nh);exit;

			$cursos_existen= array();
			foreach ($datos_sesiones as $dato_sesion) {
				
				if (!in_array($dato_sesion['Sesioneshorario']['cursoacademico_id'], $cursos_existen)) {
					$cursos_existen[]=$dato_sesion['Sesioneshorario']['cursoacademico_id'];
				}		
			}
		$this->set('cursos_existen',$cursos_existen);
	}


	public function crea_sesion($dia,$hora,$grupo,$cursoacademico,$nombre_horario)
	{
		
		$hora_sesion=$this->Sesioneshorario->horas_sesion[$hora];

		# Validamos que los datos llegan por post
		if ($this->request->is('post')) 
		{
			$nueva_sesion=array(
							'dia'=>$dia,
							'hora'=>$hora_sesion,
							'grupo_id'=>$grupo,
							'cursoacademico_id'=>$cursoacademico,
							'nombrehorario_id'=>$nombre_horario);

			$this->Sesioneshorario->create();

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Sesioneshorario->save($nueva_sesion)) {
				$this->Session->setFlash('Se ha creado correctamente una nueva sesion', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('controller'=>'sesioneshorarios','action'=>'gestionar_horario',$grupo,$cursoacademico));
			}

		$this->Session->setFlash('No se ha podido crear la sesión.');
		}

	}

	public function borra_sesion($id,$grupo,$cursoacademico)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		
			$this->Sesioneshorario->delete($id, false);
		
		$this->Session->setFlash ('La sesion se ha borrado correctamente', $element='default',$params=array('class'=>'alert alert-success'));
		return $this->redirect(array('controller'=>'sesioneshorarios','action'=>'gestionar_horario',$grupo,$cursoacademico));
		
	}










/*
	public function borra_sesion() // con ajax
	{

		if ($this->request->is('ajax')) {

			$id=$this->request->data['id'];
			debug($id);exit();
			$this->Sesioneshorario->delete($id, false);
		}

		//echo json_encode(compact('mostrar_nota'));
		$this->autoRender=false;
	}*/

}

?>
