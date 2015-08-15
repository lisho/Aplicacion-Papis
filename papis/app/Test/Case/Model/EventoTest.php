<?php
App::uses('Evento', 'Model');

/**
 * Evento Test Case
 *
 */
class EventoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.evento',
		'app.tipoevento',
		'app.grupo',
		'app.user',
		'app.incidencia',
		'app.alumno',
		'app.nota',
		'app.convocatoria',
		'app.asignatura',
		'app.cursoacademico',
		'app.matricula',
		'app.sesioneshorario',
		'app.nombrehorario',
		'app.tipoincidencia',
		'app.asistencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Evento = ClassRegistry::init('Evento');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Evento);

		parent::tearDown();
	}

}
