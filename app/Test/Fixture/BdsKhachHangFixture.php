<?php
/**
 * BdsKhachHangFixture
 *
 */
class BdsKhachHangFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'bds_khach_hang';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'KHACH_HANG_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'NAME' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'PHONE' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DOC_QUYEN' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DIA_CHI' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'EMAIL' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'GHI_CHU' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 1000, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DE_O' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'LAM_VP' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'KINH_DOANH' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'LAM_SHOW_ROOM' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'LAM_KHACH_SAN' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'NHA_HANG_CAFE' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'CAO_OC_VP' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'MUA_DAU_TU' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'MUA_CHO_THUE' => array('type' => 'integer', 'null' => true, 'default' => null, 'length' => 2, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'KHACH_HANG_ID', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'KHACH_HANG_ID' => 1,
			'NAME' => 'Lorem ipsum dolor sit amet',
			'PHONE' => 'Lorem ipsum dolor sit amet',
			'DOC_QUYEN' => 'Lorem ipsum dolor sit amet',
			'DIA_CHI' => 'Lorem ipsum dolor sit amet',
			'EMAIL' => 'Lorem ipsum dolor sit amet',
			'GHI_CHU' => 'Lorem ipsum dolor sit amet',
			'DE_O' => 1,
			'LAM_VP' => 1,
			'KINH_DOANH' => 1,
			'LAM_SHOW_ROOM' => 1,
			'LAM_KHACH_SAN' => 1,
			'NHA_HANG_CAFE' => 1,
			'CAO_OC_VP' => 1,
			'MUA_DAU_TU' => 1,
			'MUA_CHO_THUE' => 1
		),
	);

}
