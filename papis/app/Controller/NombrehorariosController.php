<?php 

/**
* Controlador de nombrehorarios
*/
class NombrehorariosController extends AppController
{
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session');

	public function index()
	{
		# usamos set para listar todos los registros de nombrehorarios
		
		$this -> set ('nombrehorarios', $this->Nombrehorario->find('all'));
	}

	public function nuevo()
	{
		if ($this->request->is('post')) 
		{
			$this->Nombrehorario->create();
		
			# Activamos las validaciones del modelo con el metodo save
			if ($this->Nombrehorario->save($this->request->data)) {

				$this->Session->setFlash('Se ha creado un nuevo tipo de horario', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array(
											'controller' => 'nombrehorarios',
											'action'=>'index',
											
											));
			}

		$this->Session->setFlash('No se ha podido crear el nuevo tipo de horario.');
		}
		
	}

	public function editar($id)
	{
		# Comprobamos si nos ha llegado un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');	
		}
		# Almacenamos en $horario los datos de la busqueda por id
		$horario = $this->Nombrehorario->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if ($this->request->is(array('post','put'))) {
	
			# le decimos que el id enviado por el formulario debe ser igual que el que localizamos en la BD
			$this->Nombrehorario->id =$id;

			if ($this->Nombrehorario->save($this->request->data)) {
				$this->Session->setFlash('Los datos del horario han sido editados con éxito.', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'index', $id));
			}
			$this->Session->setFlash('No se ha podido editar el grupo.');
		}

		# Si no hay ningún cambio devolvemos los datos iniciales
		if (!$this->request->data) {
			$this->request->data =$horario;
		}

		# Metemos los datos en la variable horario.
		$this -> set ('horario', $horario);

	}

	public function eliminar($id)
	{
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Nombrehorario->delete($id)) {
			$this->Session->setFlash ('El horario ha sido eliminado', $element='default',$params=array('class'=>'alert alert-success'));
			return $this->redirect(array('action'=>'index'));
		}
	}

}

?>
