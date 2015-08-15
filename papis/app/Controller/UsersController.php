<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersController extends AppController {

/**
 * Helpers
 *
 * @var array
 */

	public $helpers =array('Html','Form','Time');

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * Método beforeFilter: Establecemos lo que va a ocurrir antes de loguear en este controlador,
 * y además hereda lo que hemos establecido en el beforeFilter de AppController. 
 */

	public function beforeFilter()
	{
		parent::beforeFilter();

		//Definimos a qué acciones damos acceso sin logear.
		
		//$this->Auth->allow('nuevo');
	}

/**
 * Métodos login & logout: 
 * 		Definimos lo que pasa al loguearse y desloguearse. 
 */

	public function login()
	{
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirectUrl());
			}

		$this->Session->setFlash('El usuario y/o contraseña no son correctos!.','default', array('class'=> 'alert alert-danger'));
		}
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function ver($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Lo siento, este usuario no existe.'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function nuevo() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El nuevo usuario se ha guardado correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No ha sido posible guardar el nuevo usuario. Por favor, inténtalo de nuevo.'));
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
	public function editar($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Lo siento, este usuario no existe.'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario se ha editado correctamente.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No ha sido posible editar los datos del usuario. Por favor, inténtalo de nuevo.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function eliminar($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Lo siento, este usuario no existe.'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->User->delete()) {
			$this->Session->setFlash(__('El usuario ha sido eliminado'));
		} else {
			$this->Session->setFlash(__('No ha sido posible eliminar el usuario. Por favor, inténtalo de nuevo.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
