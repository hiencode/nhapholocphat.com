<?php
App::uses('TinhTrangKh', 'Model');

/**
 * TinhTrangKh Test Case
 *
 */
class TinhTrangKhTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tinh_trang_kh'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TinhTrangKh = ClassRegistry::init('TinhTrangKh');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TinhTrangKh);

		parent::tearDown();
	}

}
