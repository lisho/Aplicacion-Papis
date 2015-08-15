<?php 

App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');

/**
* Clase para los usuarios que interactuarán con la aplicación.
*/
class User extends AppModel
{
	
	/**
	* Funciones de validación de los modelos.
	*/

	public $virtualFields = array(
		'nombre_user' => 'CONCAT(User.nombre," ",User.apellidos)'
		);

	public $validate = array (
					'nombre'=>array(
						'notEmpty'=> array(
							'rule'=>'notBlank',
							'message' => 'Este campo no puede estar vacío')
							),
					'apellidos'=>array(
						'notEmpty'=> array(
							'rule'=>'notBlank',
							'message' => 'Este campo no puede estar vacío')
							),
					'username'=>array(
						'notEmpty'=> array(
							'rule'=>'notBlank',
							'message' => 'Este campo no puede estar vacío')
							),
					'password'=>array(
						'notEmpty'=> array(
							'rule'=>'notBlank',
							'message' => 'Este campo no puede estar vacío')
							),

		);

	public $hasMany = array(
			'Grupo' => array(
					'className'=> 'Grupo',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'order' => 'Grupo.nombre DESC',
					'depend' => false,
				),
			'Incidencia' => array(
					'className'=> 'Incidencia',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'order' => '',
					'depend' => false,
				)
		);


	/**
	* Usamos el metodo beforeSave para "hacer cosas" antes de que se aplique el save.
	* Entre ellas: - Encriptar la contraseña con BlowfishPasswordHasher().
	*/

	public function beforeSave($options=array())
	{
		if (isset($this->data[$this->alias]['password'])) {
			
			$passwordHasher = new BlowfishPasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash($this->data[$this->alias]['password']); 
		}

		return true;
	}
}

 ?>