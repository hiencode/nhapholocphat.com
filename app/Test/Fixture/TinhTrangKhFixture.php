<?php
/**
 * TinhTrangKhFixture
 *
 */
class TinhTrangKhFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'tinh_trang_kh';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'TINH_TRANG_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4, 'unsigned' => true, 'key' => 'primary'),
		'TINH_TRANG_CODE' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'TINH_TRANG_NAME' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 50, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'DELETE_YMD' => array('type' => 'date', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'TINH_TRANG_ID', 'unique' => 1)
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
			'TINH_TRANG_ID' => 1,
			'TINH_TRANG_CODE' => 'Lorem ipsum dolor sit amet',
			'TINH_TRANG_NAME' => 'Lorem ipsum dolor sit amet',
			'DELETE_YMD' => '2018-05-03'
		),
	);

}
