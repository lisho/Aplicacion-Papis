<?php
/**
 * EventoFixture
 *
 */
class EventoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'fecha' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'evento' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'horainicio' => array('type' => 'time', 'null' => false, 'default' => null),
		'tipoevento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'grupo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'fecha' => '2015-08-02 19:02:34',
			'evento' => 'Lorem ipsum dolor sit amet',
			'horainicio' => '19:02:34',
			'tipoevento_id' => 1,
			'grupo_id' => 1,
			'created' => '2015-08-02 19:02:34',
			'modified' => '2015-08-02 19:02:34'
		),
	);

}
