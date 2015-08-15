<?php 

/**
* Clase Horario
*/

class Sesioneshorario extends AppModel
{
	/**
	* Funciones de validación de los modelos.
	*/

	public $virtualFields = array();

	# Insertamos en dos arrays los datos permitidos en los campos.
	
	public $dias_semana=array(
						'L'=>'Lunes',
						'M'=>'Martes',
						'X'=>'Miércoles',
						'J'=>'Jueves',
						'V'=>'Viernes'
				);

	public $horas_sesion=array('1'=>'09:00-09:30','2'=>'09:30-10:00',
								'3'=>'10:00-10:30','4'=>'10:30-11:00',
								'5'=>'11:00-11:30','6'=>'11:30-12:00',
								'7'=>'12:00-12:30','8'=>'12:30-13:00',
								'9'=>'13:00-13:30','10'=>'13:30-14:00'
								);

	public $validate = array (

			'dia'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío'),

			'hora'=>array('rule'=>'notBlank',
					'message' => 'Este campo no puede estar vacío')
		);

	# Enlace con el modelo que nos aporta los nombres de los horarios

	public $belongsTo = array(
			'Nombrehorario' => array(
					'className'=>'Nombrehorario',
					'foreignKey' => 'nombrehorario_id'
				),
			'Grupo'=> array(
					'className'=>'Grupo',
					'foreignKey' => 'grupo_id'
				),
			'Cursoacademico'=> array(
					'className'=>'Cursoacademico',
					'foreignKey' => 'cursoacademico_id'
				),
		);

	

}

 ?>