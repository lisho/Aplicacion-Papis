<?php
App::uses('AppController', 'Controller');
/**
 * Tipoeventos Controller
 *
 * @property Tipoevento $Tipoevento
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TipoeventosController extends AppController {

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
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipoevento->recursive = 0;
		$this->set('tipoeventos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipoevento->exists($id)) {
			throw new NotFoundException(__('Invalid tipoevento'));
		}
		$options = array('conditions' => array('Tipoevento.' . $this->Tipoevento->primaryKey => $id));
		$this->set('tipoevento', $this->Tipoevento->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tipoevento->create();
			if ($this->Tipoevento->save($this->request->data)) {
				$this->Session->setFlash(__('The tipoevento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipoevento could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tipoevento->exists($id)) {
			throw new NotFoundException(__('Invalid tipoevento'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tipoevento->save($this->request->data)) {
				$this->Session->setFlash(__('The tipoevento has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tipoevento could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tipoevento.' . $this->Tipoevento->primaryKey => $id));
			$this->request->data = $this->Tipoevento->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tipoevento->id = $id;
		if (!$this->Tipoevento->exists()) {
			throw new NotFoundException(__('Invalid tipoevento'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Tipoevento->delete()) {
			$this->Session->setFlash(__('The tipoevento has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tipoevento could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
