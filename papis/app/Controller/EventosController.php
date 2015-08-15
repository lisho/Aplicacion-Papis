<?php
App::uses('AppController', 'Controller');
/**
 * Eventos Controller
 *
 * @property Evento $Evento
 * @property PaginatorComponent $Paginator
 * @property RequestHandlerComponent $RequestHandler
 * @property SessionComponent $Session
 */
class EventosController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js', 'Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Evento->recursive = 0;
		$this->set('eventos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Evento no válido.'));
		}
		$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
		$this->set('evento', $this->Evento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id = null) {
		
		$current_grupo=$id;	

		if ($this->request->is('post')) {
			$this->Evento->create();
		
		$cachos_fecha = preg_split("/[\/]+/", $this->request->data['Evento']['fecha']);
		$this->request->data['Evento']['fecha']=array(
								'year'=>$cachos_fecha[2],
								'month'=>$cachos_fecha[1],
								'day' =>$cachos_fecha[0] 
						);

				
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento ha sido creado correctamente.'), $element='default',$params=array('class'=>'alert alert-success'));
				

				$grupo_id=$this->request->data['Evento']['grupo_id'];
				$cursoacademico_id=$this->request->data['Evento']['cursoacademico_id'];
				$evento_id=$this->Evento->find('first',array(
											'fields'=>'id',
											'order'=>'Evento.id DESC',
											'conditions'=>array(
													)));

				return $this->redirect(array(
							'controller'=> 'asistencias',
							'action' => 'add_por_evento',
							$grupo_id,
							$cursoacademico_id,
							$evento_id['Evento']['id']));



			} else {
				$this->Session->setFlash(__('El evento no ha sido creado. Por favor, inténtalo de nuevo.'));
			}
		}
		$tipoeventos = $this->Evento->Tipoevento->find('list');
		$grupos = $this->Evento->Grupo->find('list', array(
											'fields'=>array ('id', 'nombre')
									));
		$cursoacademicos= $this->Evento->Cursoacademico->find('list',array(
									'fields'=>array('id', 'cursoacademico'),
									'order'=>'Cursoacademico.id DESC'));
		$this->set(compact('tipoeventos', 'grupos', 'cursoacademicos','current_grupo'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Evento->exists($id)) {
			throw new NotFoundException(__('Evento no válido.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Evento->save($this->request->data)) {
				$this->Session->setFlash(__('El evento ha sido editado correctamente.'), $element='default', $params=array('class'=>'alert alert-success'));
				return $this->redirect(array(
								'action' => 'evento_de_grupo',
								$this->request->data['Evento']['grupo_id'],
								$this->request->data['Evento']['cursoacademico_id']));
			} else {
				$this->Session->setFlash(__('El evento no ha sido editado. Por favor, inténtalo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('Evento.' . $this->Evento->primaryKey => $id));
			$this->request->data = $this->Evento->find('first', $options);
		}
		$tipoeventos = $this->Evento->Tipoevento->find('list');
		$grupos = $this->Evento->Grupo->find('list', array(
											'fields'=>array ('id', 'nombre')
								));
		$cursoacademicos= $this->Evento->Cursoacademico->find('list',array(
									'fields'=>array('id', 'cursoacademico'),
									'order'=>'Cursoacademico.id DESC'));

		$this->set(compact('tipoeventos', 'grupos','cursoacademicos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null, $grupo_id=null) {
		$this->Evento->id = $id;
		if (!$this->Evento->exists()) {
			throw new NotFoundException(__('Evento no válido.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Evento->delete()) {
			$this->Session->setFlash(__('El evento ha sido eliminado.'));

		} else {
			$this->Session->setFlash(__('El evento no ha podido ser eliminado. Por favor inténtelo de nuevo.'));
		}
		return $this->redirect(array('controller'=>'eventos', 'action' => 'evento_de_grupo', $grupo_id));
	}


/**
 * evento de grupo method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function evento_de_grupo($grupo_id = null, $cursopasado=null) {


		$meses=['08'=>'Agosto','09'=>'Septiembre','10'=>'Octubre','11'=>'Noviembre',
					'12'=>'Diciembre','01'=>'Enero','02'=>'Febrero','03'=>'Marzo',
					'04'=>'Abril','05'=>'Mayo','06'=>'Junio','07'=>'Julio',
			];


		$lista_meses=array('Agosto','Septiembte','Octubre','Noviembre',
			'Diciembre','Enero','Febrero','Marzo',
			'Abril','Mayo','Junio','Julio');

		$curso_academico= $this->Evento->Cursoacademico->find('list',array(
									'fields'=>array('id', 'cursoacademico'),
									'order'=>'Cursoacademico.id DESC'));

		$eventos=$this->Evento->find('all', array(
										'conditions'=>array(
												'Evento.grupo_id'=>$grupo_id),
										'order' => ('Evento.fecha DESC')
								));
		$grupo=$this->Evento->Grupo->findById($grupo_id);

		$this->set(array(
				'curso_academico'=>$curso_academico,
				'eventos'=>$eventos,
				'meses'=>$meses,
				'grupo'=>$grupo,
				'cursopasado'=>$cursopasado
				
			));

		
		//debug($meses);exit();

	}
}
