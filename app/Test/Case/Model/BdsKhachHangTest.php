<?php
App::uses('BdsKhachHang', 'Model');

/**
 * BdsKhachHang Test Case
 *
 */
class BdsKhachHangTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bds_khach_hang'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->BdsKhachHang = ClassRegistry::init('BdsKhachHang');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->BdsKhachHang);

		parent::tearDown();
	}

}
