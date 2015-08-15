<?php
App::uses('Tipoevento', 'Model');

/**
 * Tipoevento Test Case
 *
 */
class TipoeventoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tipoevento',
		'app.evento'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tipoevento = ClassRegistry::init('Tipoevento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tipoevento);

		parent::tearDown();
	}

}
