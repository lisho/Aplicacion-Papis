<?php 

/**
* Controlador de incidencias
*/
class IncidenciasController extends AppController
{
	public $helpers =array('Html','Form','Time');
	public $components= array ('Session');

	public function index()
	{
		# usamos set para listar todos los registros de incidencias
		
		$this -> set ('incidencias', $this->Incidencia->find('all'));
	}

	public function ver($id=null) 
	{
		# comprobamos que nos llega un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');
			
		}

		# Almacenamos en $incidencia los datos de la busqueda por id
		$incidencia = $this->Incidencia->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$incidencia) {
			throw new NotFoundException('La incidencia no existe...');
			
		}

		# Metemos los datos en la variable incidencia.
		$this -> set ('incidencia', $incidencia);

		//$grupos=$this->Incidencia->Grupo->find('list', array('fields'=>array('id','nombre_grupo')));
		//$this->set('grupos',$grupos);

	}

	public function nuevo($alumno_id=null)
	{
		
# Cargamos los datos del alumno de referencia para la incidencia en $alumnos.
		
		$alumnos=$this->Incidencia->Alumno->find('list', array(
								'fields'=>array('id','nombre_completo'),
								'conditions' => array('Alumno.id' => $alumno_id)));
		$this->set(array(
				'alumnos'=>$alumnos,
				'alumno_id'=>$alumno_id));	

		

# Cargamos los tipos de incidencia en $alumnos.
		$tipo_incidencia=$this->Incidencia->Tipoincidencia->find('list', array(
																	'fields'=>array('id','nombre'),
																));
		$this->set('tipo_incidencia',$tipo_incidencia);

		//print_r($tipo_incidencia);exit();

# Cargamos el nombre para el titulo en $nombre_alumno.
		$this->set('nombre_alumno', $alumnos[$alumno_id]);

		//$users=$this->Incidencia->User->find('list', array('fields'=>array('id','nombre_user')));
		//$this->set('users',$users);
		

	# Validamos que los datos llegan por post
		
		if ($this->request->is('post')) 
		{
			$this->Incidencia->create();

			# Pasamos el id del usuarios activo.
			$this->request->data['Incidencia']['user_id'] = $this->Auth->user('id');
			$this->request->data['Incidencia']['alumno_id'] = $alumno_id;
		
			# Activamos las validaciones del modelo con el metodo save
			if ($this->Incidencia->save($this->request->data)) {

				$this->Session->setFlash('Se ha creado una nueva incidencia', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array(
											'controller' => 'alumnos',
											'action'=>'ver',
											$alumno_id
											));
			}

		$this->Session->setFlash('No se ha podido crear la nueva incidencia.');
		}

		

	}

	public function editar($id=null)
	{

		# Comprobamos si nos ha llegado un id
		if (!$id) {
			throw new NotFoundException('Datos Inválidos');	
		}
		# Almacenamos en $incidencia los datos de la busqueda por id
		$incidencia = $this->Incidencia->findById($id);

		# Creamos una validacion que comprueba si existe el registro y si no...
		
		if (!$incidencia) {
			throw new NotFoundException('La incidencia no existe...');
			
		}

		if ($this->request->is(array('post','put'))) {
	
			# le decimos que el id enviado por el formulario debe ser igual que el que localizamos en la BD
			$this->Incidencia->id =$id;
			$this->request->data['Incidencia']['user_id'] = $this->Auth->user('id');
			
			if ($this->Incidencia->save($this->request->data)) {
				$this->Session->setFlash('Los datos de la incidencia han sido editados con éxito.', $elemnt='default',$params=array('class'=>'alert alert-success'));
				return $this->redirect(array(
											'controller' => 'alumnos',
											'action'=>'ver',
											$incidencia['Alumno']['id']));
			}
			$this->Session->setFlash('No se ha podido editar la incidencia.');
		}

		# Si no hay ningún cambio devolvemos los datos iniciales
		if (!$this->request->data) {
			$this->request->data =$incidencia;
		}

		# Metemos los datos en la variable incidencia.
		$this -> set ('incidencia', $incidencia);

		# Cargamos los tipos de incidencia en $alumnos.
		$tipo_incidencia=$this->Incidencia->Tipoincidencia->find('list', array(
																	'fields'=>array('id','nombre'),
																));
		$this->set('tipo_incidencia',$tipo_incidencia);

		$users=$this->Incidencia->User->find('list', array('fields' => array('id','nombre_user'),
															'conditions' => array()));
		//echo "<br><br><br><br>";
		//debug($current_user);
		$this->set('users',$users);

		$this->set('nombre_alumno', $incidencia['Alumno']['nombre_completo']);
	}

	public function eliminar($id)
	{

		$incidencia = $this->Incidencia->findById($id);
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException("Dato Incorrecto!");
		}
		if ($this->Incidencia->delete($id)) {
			$this->Session->setFlash ('La incidencia ha sido eliminada', $element='default',$params=array('class'=>'alert alert-success'));
			return $this->redirect(array('controller' => 'alumnos','action'=>'ver',$incidencia ['Incidencia']['alumno_id']));
		}


		


	}

}
 ?>