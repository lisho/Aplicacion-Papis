<?php 

/**
* Clase para los cursos académicos en los que se agrupamn las notas.
*/
class Cursoacademico extends AppModel
{
	
	/**
	* Funciones de validación de los modelos.
	*/

	public $virtualFields = array(
		'curso' => 'Cursoacademico.cursoacademico',
	);

	public $validate = array (



		);

	public $hasMany = array(
			'Matricula' => array(
					'className'=> 'Matricula',
					'foreignKey' => 'cursoacademico_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> false,
				),

			'Nota' => array(
					'className'=> 'Nota',
					'foreignKey' => 'cursoacademico_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> false,
				),
			'Sesioneshorario' => array(
					'className'=> 'Sesioneshorario',
					'foreignKey' => 'cursoacademico_id',
					'conditions' => '',
					//'order' => 'Incidencia.fecha DESC',
					'dependent'=> false,
				),
			'Evento' => array(
					'className'=> 'Evento',
					'foreignKey' => 'cursoacademico_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> false,
				),


		);


}

?>