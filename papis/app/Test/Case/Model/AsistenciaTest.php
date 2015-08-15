<?php
App::uses('Asistencia', 'Model');

/**
 * Asistencia Test Case
 *
 */
class AsistenciaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.asistencia',
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
		'app.tipoincidencia'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Asistencia = ClassRegistry::init('Asistencia');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Asistencia);

		parent::tearDown();
	}

}
