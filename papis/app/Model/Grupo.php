<?php 

/**
* Clase que define los grupos de PAPIS		
*/
class Grupo extends AppModel
{
 
	public $virtualFields = array(
		'nombre_grupo' => 'Grupo.nombre'
		);

	public $validate = array (

			'nombre'=>array(
				'notEmpty'=> array(
					'rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'
					),
				),

			'sede'=>array('rule'=>'notBlank'),
		);

/*
	public $hasAndBelongsToMany = array(
			'Alumno' => array(
					'className'=> 'Alumno',
					'joinTable'  =>  'alumnos_grupos',
					'foreignKey' => 'alumno_id',
					'associationForeignKey'  =>  'grupo_id' ,
					'conditions' => '',
					'order' => 'Alumno.apellidos DESC',
					'depend' => false,
				)
		);
*/

	public $belongsTo = array(
			'User' => array(
					'className'=>'User',
					'foreignKey' => 'user_id'
				)
		);

	public $hasMany = array(
			'Matricula'=> array(
					'className'=> 'Matricula',
					'foreignKey' => 'grupo_id',
					'conditions' => '',
					'order' => 'Matricula.cursoacademico_id DESC',
					'dependent'=> false,
				),
			'Sesioneshorario' => array(
					'className'=> 'Sesioneshorario',
					'foreignKey' => 'grupo_id',
					'conditions' => '',
					//'order' => 'Incidencia.fecha DESC',
					'dependent'=> true,
				),
			'Evento' => array(
					'className'=> 'Evento',
					'foreignKey' => 'grupo_id',
					'conditions' => '',
					//'order' => 'Incidencia.fecha DESC',
					'dependent'=> false,
				),
		);
}

 ?>
 