<?php
/**
 * AsistenciaFixture
 *
 */
class AsistenciaFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'asistencia' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'observaciones' => array('type' => 'text', 'null' => false, 'default' => null, 'collate' => 'utf8_spanish_ci', 'charset' => 'utf8'),
		'evento_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'matricula_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'ceated' => array('type' => 'datetime', 'null' => false, 'default' => null),
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
			'asistencia' => 'Lorem ipsum dolor ',
			'observaciones' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'evento_id' => 1,
			'matricula_id' => 1,
			'ceated' => '2015-08-02 19:09:30',
			'modified' => '2015-08-02 19:09:30'
		),
	);

}
