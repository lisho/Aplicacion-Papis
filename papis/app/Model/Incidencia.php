<?php 
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
App::uses('AppModel', 'Model');
/**
* Clase que define las incidencias de cada alumno de PAPIS		
*/

class Incidencia extends AppModel
{

	public $validate = array (


			'fecha'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'titulo'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío')
		);
 
	public $belongsTo = array(
			'Alumno' => array(
					'className'=>'Alumno',
					'foreignKey' => 'alumno_id'
				),
			
			'Tipoincidencia' => array(
					'className'=>'Tipoincidencia',
					'foreignKey' => 'tipoincidencia_id'
				),
			
			'User' => array(
					'className'=>'User',
					'foreignKey' => 'user_id'
				),
		);

}


 ?>
