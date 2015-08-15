<?php 

/**
* Clase Nombrehorario
* 	Nos aporta nombres para los horarios y explica cuando es válido
*/

class Nombrehorario extends AppModel
{
	/**
	* Funciones de validación de los modelos.
	*/

	public $virtualFields = array();

	# Insertamos en dos arrays los datos permitidos en los campos.
	
	

	public $validate = array (

			'nombre'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'definicion'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío')
		);

	# Enlace con el modelo que nos aporta los nombres de los horarios

	public $hasMany = array(
			'Sesioneshorario' => array(
					'className'=> 'Sesioneshorario',
					'foreignKey' => 'nombrehorario_id',
					'conditions' => '',
					//'order' => 'Incidencia.fecha DESC',
					'dependent'=> true,
				),
			
		);

	

}

 ?>