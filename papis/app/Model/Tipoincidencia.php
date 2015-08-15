
<?php

/**
* Clase que define las incidencias de cada alumno de PAPIS		
*/

class Tipoincidencia extends AppModel
{
 	
 	public $virtualFields = array(
		//'nombre' => 'Tipoincidencia.nombre'
		);

	public $hasMany = array(
			'Incidencia' => array(
					'className'=> 'Incidencia',
					'foreignKey' => 'tipoincidencia_id',
					'conditions' => '',
					'order' => '',
					'depend' => false,
				)
		);

}


 ?>