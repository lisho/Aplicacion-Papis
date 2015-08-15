<?php
App::uses('AppController', 'Controller');
/**
 * Asistencias Controller
 *
 * @property Asistencia $Asistencia
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class AsistenciasController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Html','Form','Js', 'Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * paginate
 *
 * @var array
 */	

	public $paginate =array(
				'limit'=>15,
				'order'=> array(
						'Asistencia.Evento.fecha'=>'asc'));

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Asistencia->recursive = 0;
		$this->set('asistencias', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Asistencia->exists($id)) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		$options = array('conditions' => array('Asistencia.' . $this->Asistencia->primaryKey => $id));
		$this->set('asistencia', $this->Asistencia->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Asistencia->create();
			if ($this->Asistencia->save($this->request->data)) {
				$this->Session->setFlash(__('The asistencia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asistencia could not be saved. Please, try again.'));
			}
		}
		$eventos = $this->Asistencia->Evento->find('list');
		$matriculas = $this->Asistencia->Matricula->find('list');
		$this->set(compact('eventos', 'matriculas'));
	}

/**
 * add method
 *
 * Añade una asistencia por cada alumno del grupo que participa en el evento.
 *
 * @return void
 */
	public function add_por_evento($grupo_id, $cursoacademico_id, $evento_id) {
		
		
			
			$matriculas= $this->Asistencia->Matricula->find('all',array(
													'conditions'=>array(
															'grupo_id'=>$grupo_id,
															'cursoacademico_id'=>$cursoacademico_id
															)));
			if (isset($matriculas)) {
				
			
				foreach ($matriculas as $matricula) {

					$matricula_id=$matricula['Matricula']['id'];

					$this->Asistencia->create();

					$this->request->data['Asistencia']['grupo_id']=$grupo_id;
					$this->request->data['Asistencia']['cursoacademico_id']=$cursoacademico_id;
					$this->request->data['Asistencia']['evento_id']=$evento_id;
					$this->request->data['Asistencia']['matricula_id']=$matricula_id;
					$this->request->data['Asistencia']['asistencia']='F';

					$this->Asistencia->save($this->request->data);
				}	

					$this->Session->setFlash(__('Se ha creado un nuevo evento y la tabla de asistencia de los participantes.'), $element='default',$params=array('class'=>'alert alert-success'));
					return $this->redirect(array(
												'controller'=>'eventos', 
												'action' => 'evento_de_grupo',
												$grupo_id, $cursoacademico_id));
			} else {

				$this->Session->setFlash(__('The asistencia could not be saved. Please, try again.'));
				return $this->redirect($this->referer());
			}
			
		
		//$eventos = $this->Asistencia->Evento->find('list');
		//$matriculas = $this->Asistencia->Matricula->find('list');
		//$this->set(compact('eventos', 'matriculas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Asistencia->exists($id)) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Asistencia->save($this->request->data)) {
				$this->Session->setFlash(__('The asistencia has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asistencia could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Asistencia.' . $this->Asistencia->primaryKey => $id));
			$this->request->data = $this->Asistencia->find('first', $options);
		}
		$eventos = $this->Asistencia->Evento->find('list');
		$matriculas = $this->Asistencia->Matricula->find('list');
		$this->set(compact('eventos', 'matriculas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Asistencia->id = $id;
		if (!$this->Asistencia->exists()) {
			throw new NotFoundException(__('Invalid asistencia'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Asistencia->delete()) {
			$this->Session->setFlash(__('The asistencia has been deleted.'));
		} else {
			$this->Session->setFlash(__('The asistencia could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * asistencia_por_grupo method
 *
 * @throws NotFoundException
 * @param int $grupo_id
 * @return void
 */
	public function asistencia_por_grupo($grupo = null) {
			
	
	}

/**
 * asistencia_por_alumno method
 *
 * @throws NotFoundException
 * @param string $grupo
 * @return void
 */
	public function asistencia_por_alumno($alumno_id = null) {
		
		

	}	

/**
 * asistencia_por_evento method
 *
 * @throws NotFoundException
 * @param string $evento, $grupo
 * @return void
 */
	public function asistencia_por_evento($evento_id = null, $grupo=null) {


		if ($this->request->is(array('post', 'put'))) {
			
			$asistencias=$this->Asistencia->find('all',array(
												'conditions'=>array(
														'Asistencia.evento_id'=> $evento_id,
													),
											));
			if (empty($asistencias)) {
						
				$this->Session->setFlash(__('No existen asistencias pare este evento.'));
				return $this->redirect(array('controller'=>'eventos', 'action' => 'evento_de_grupo', $grupo));
			}

			else {



			$lista_alumnos=$this->Asistencia->Matricula->find('all', array(
												'conditions'=>array(
														'Matricula.grupo_id'=> $asistencias[0]['Matricula']['grupo_id'],
														'Matricula.cursoacademico_id'=> $asistencias[0]['Matricula']['cursoacademico_id']),
				));
//debug($asistencias);exit();
			$nombres_alumnos=array();
			$dni_alumnos=array();

			foreach ($lista_alumnos as $alumno) {
				
				$nombres_alumnos=$nombres_alumnos+array($alumno['Alumno']['id']=>$alumno['Alumno']['nombre_completo']);
				$dni_alumnos=$dni_alumnos+array($alumno['Alumno']['id']=>$alumno['Alumno']['dni']);
	

			}
//debug($nombres_alumnos);exit();
			$this->set(array(
						'asistencias'=>$asistencias,
						'nombres_alumnos'=>$nombres_alumnos,
						'dni_alumnos' => $dni_alumnos,
						'nombre_grupo'=>$lista_alumnos[0]['Grupo']['nombre'],
						'cursopasado' =>$asistencias[0]['Evento']['cursoacademico_id'],
						'grupo'=>$grupo,
						'evento_id'=>$evento_id,
				));
			}
		}
		else{
			
			throw new NotFoundException(__('Invalid asistencia'));
		}

	}	

	/**
 * asistencia_por_evento method
 *
 * @throws NotFoundException
 * @param string $evento, $grupo
 * @return void
 */
	public function editar_asistencia_por_evento($evento_id = null, $grupo=null) {


		if ($this->request->is(array('post', 'put'))) {
			
			$asistencias=$this->Asistencia->find('all',array(
												'conditions'=>array(
														'Asistencia.evento_id'=> $evento_id,
													),
											));
			if (empty($asistencias)) {
						
				$this->Session->setFlash(__('No existen asistencias pare este evento.'));
				return $this->redirect(array('controller'=>'eventos', 'action' => 'evento_de_grupo', $grupo));
			}

			else {



			$lista_alumnos=$this->Asistencia->Matricula->find('all', array(
												'conditions'=>array(
														'Matricula.grupo_id'=> $asistencias[0]['Matricula']['grupo_id'],
														'Matricula.cursoacademico_id'=> $asistencias[0]['Matricula']['cursoacademico_id']),
				));
//debug($asistencias);exit();
			$nombres_alumnos=array();
			$dni_alumnos=array();

			foreach ($lista_alumnos as $alumno) {
				
				$nombres_alumnos=$nombres_alumnos+array($alumno['Alumno']['id']=>$alumno['Alumno']['nombre_completo']);
				$dni_alumnos=$dni_alumnos+array($alumno['Alumno']['id']=>$alumno['Alumno']['dni']);
	

			}
//debug($nombres_alumnos);exit();
			$this->set(array(
						'asistencias'=>$asistencias,
						'nombres_alumnos'=>$nombres_alumnos,
						'dni_alumnos' => $dni_alumnos,
						'nombre_grupo'=>$lista_alumnos[0]['Grupo']['nombre'],
						'cursopasado' =>$asistencias[0]['Evento']['cursoacademico_id'],
						'grupo'=>$grupo,
						'evento_id'=>$evento_id,
				));
			}
		}
		else{
			
			throw new NotFoundException(__('Invalid asistencia'));
		}

	}	

	public function asistencia_update()
	{
		if ($this->request->is('ajax')) {

			$id=$this->request->data['id'];
			$asistencia=$this->request->data['asistencia'];
			$observaciones=$this->request->data['observaciones'];

			if ($asistencia!=null) {
				
				$actualizacion = array('id'=>$id, 'asistencia'=> $asistencia);
			
			}
			elseif ($observaciones!=null) {
				
				$actualizacion = array('id'=>$id, 'observaciones'=>$observaciones);
			}

			$this->Asistencia->saveAll($actualizacion);		
		}

		$asistencia_update = $this->Asistencia->find('all', array(
												'fields'=>array('Asistencia.id','Asistencia.asistencia','Asistencia.observaciones'),
												'conditions'=> array('Asistencia.id'=>$id)
												));

		$mostrar_asistencia = array('id'=>$asistencia_update[0]['Asistencia']['id']);

		echo json_encode(compact('mostrar_asistencia'));
		$this->autoRender=false;

	}

}
