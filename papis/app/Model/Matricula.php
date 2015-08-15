<?php 

/**
* Clase que define la relacion entre grupos y alumnos		
*/
class Matricula extends AppModel
{
 
	public $validate = array (

			'grupo_id'=>array(
				'notEmpty'=> array(
					'rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'
					),
				),

			'alumno_id'=>array(
				'notEmpty'=> array(
					'rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'
					),
				),

			'cursoacademico_id'=>array(
				'notEmpty'=> array(
					'rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'
					),
				),
		
		);

	public $belongsTo = array('Alumno', 'Grupo', 'Cursoacademico');


/*
	public $belongsTo = array(
			'Alumno' => array(
					'className'=>'Alumno',
					'foreignKey' => 'alumno_id'
				),
			'Grupo' => array(
					'className'=>'Grupo',
					'foreignKey' => 'grupo_id'
				),
			'Cursoacademico'=> array(
					'className'=> 'Cursoacademico',
					'foreignKey' => 'cursoacademico_id',
					),
		);

*/

	
	public $hasMany = array(
			'Asistencia'=> array(
					'className'=> 'Asistencia',
					'foreignKey' => 'matricula_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> true,
					),
		);


}

 ?>