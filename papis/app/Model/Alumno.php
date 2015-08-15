<?php 

/**
* Clase Alumno
*/

class Alumno extends AppModel
{
	/**
	* Funciones de validación de los modelos.
	*/

	public $virtualFields = array(
		'nombre_completo' => 'CONCAT(Alumno.nombre," ", Alumno.apellidos)'
		);

	# Insertampos en una variable reservada la configuración para el plugin Upload.
	public $actAs = array(
						'Upload.Upload'=> array(
										'foto'=> array(
											 'fields'=>array(
											 	'dir'=>'foto_dir'
											 	),
						 					'thumbnailMethod'=>'php',
						 					'thumbnailSizes' => array(
						 							'vga' => '640x480',
						 							'thumb'=> '150x150'
						 							),
						 					'deleteOnUpdate' => true,
						 					'deleteFolderOnDelete' => true
											 ))
						) ;

	public $validate = array (

			'dni'=>array(
				'notEmpty'=> array(
					'rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'
					),
				'validarDni'=> array (
					'rule'=>'/^(([X-Z]{1})(\d{7})([A-Z]{1}))|((\d{8})([A-Z]{1}))$/i',
					'message' => 'La forma de introducir el DNI/NIE no es correcta'
					),
				'alfanumerico'=> array (
					'rule' => 'alphaNumeric',
					),
				'unique' => array (
					'rule' => 'isUnique',
					'message' => 'Este DNI/NIE ya existe',
					),
				),

			'nombre'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'apellidos'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío')
		);

/*
	public $hasAndBelongsToMany = array(
			'Group' => array(
					'className'=>'Grupo',
					'joinTable'  =>  'alumnos_grupos',
					'foreignKey' => 'grupo_id',
					'associationForeignKey'  =>  'alumno_id' ,
				)
		);
*/

	public $hasMany = array(
			'Incidencia' => array(
					'className'=> 'Incidencia',
					'foreignKey' => 'alumno_id',
					'conditions' => '',
					'order' => 'Incidencia.fecha DESC',
					'dependent'=> true,
					),

			'Nota' => array(
					'className'=> 'Nota',
					'foreignKey' => 'alumno_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> true,
					),
			
			'Matricula'=> array(
					'className'=> 'Matricula',
					'foreignKey' => 'alumno_id',
					'conditions' => '',
					'order' => '',
					'dependent'=> true,
					),

		);

}

 ?>