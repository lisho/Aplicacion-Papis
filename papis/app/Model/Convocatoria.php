<?php 

/**
* Clase para las convocatorias a las que pertenecen las notas.
*/
class Convocatoria extends AppModel
{
	
	/**
	* Funciones de validación de los modelos.
	*/

	

	public $validate = array (



		);

	public $hasMany = array(
			'Nota' => array(
					'className'=> 'Nota',
					'foreignKey' => 'convocatoria_id',
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