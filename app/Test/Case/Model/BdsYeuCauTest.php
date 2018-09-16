<?php
App::uses('BdsYeuCau', 'Model');

/**
 * BdsYeuCau Test Case
 *
 */
class BdsYeuCauTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bds_yeu_cau'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdsYeuCau = ClassRegistry::init('BdsYeuCau');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdsYeuCau);

		parent::tearDown();
	}

}
