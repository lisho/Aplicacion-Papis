<?php 

/**
* Clase para las asignaturas en las que se matriculan los participantes.
*/
class Asignatura extends AppModel
{
	
	/**
	* Funciones de validación de los modelos.
	*/

	

	public $validate = array (

			'asignatura'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'curso'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'cod'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío')


		);

	public $hasMany = array(
			'Nota' => array(
					'className'=> 'Nota',
					'foreignKey' => 'asignatura_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> false,
				)
		);

/*
	public $hasMany = array(
			'Grupo' => array(
					'className'=> 'Grupo',
					'foreignKey' => 'user_id',
					'conditions' => '',
					'order' => 'Grupo.nombre DESC',
					'depend' => false,
				)
		);
*/

}

?>