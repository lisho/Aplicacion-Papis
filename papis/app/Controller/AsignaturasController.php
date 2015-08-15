<?php 

/**
* Controlador del Modelo Asignatura
*/
class AsignaturasController extends AppController
{
	
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session','Paginator');
	public $paginate =array(
				'limit'=>50,
				'order'=> array(
						'Alumno.apellidos'=>'asc'));


	public function index()
	{
    	
    	if ($this->request->is('post')) 
		{
			$this->Asignatura->create();

			# Activamos las validaciones del modelo con el metodo save
			if ($this->Asignatura->save($this->request->data)) {
				$this->Session->setFlash('¡Felicidades!, has creado una nueva asignatura.', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array('action'=>'index'));
			}

		$this->Session->setFlash('No se ha podido crear la asignatura.');
		}

		$this->Asignatura->recursive=1;

		$this->Paginator->settings = $this->paginate;
		$lista_asignaturas = $this->Paginator->paginate();

    	$this->set('lista_asignaturas', $lista_asignaturas);

	}

	public function eliminar($id)
	{

		$asignatura = $this->Asignatura->findById($id);
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Asignatura->delete($id)) {
			$this->Session->setFlash ('La asignatura ha sido eliminada', $element='default',$params=array('class'=>'alert alert-success'));
			return $this->redirect(array('action'=>'index'));
		}


		


	}

	
}


 ?>