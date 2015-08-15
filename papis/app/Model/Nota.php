<?php 

/**
* Clase para los cursos académicos en los que se agrupamn las notas.
*/
class Nota extends AppModel
{
	
	/**
	* Funciones de validación de los modelos.
	*/

	

	public $validate = array (



		);

	public $belongsTo = array(
			'Alumno' => array(
					'className'=>'Alumno',
					'foreignKey' => 'alumno_id'),
			'Convocatoria' => array(
					'className'=>'Convocatoria',
					'foreignKey' => 'convocatoria_id'),
			'Asignatura' => array(
					'className'=>'Asignatura',
					'foreignKey' => 'asignatura_id'),
			'Cursoacademico' => array(
					'className'=>'Cursoacademico',
					'foreignKey' => 'cursoacademico_id'),
	);


}

?>