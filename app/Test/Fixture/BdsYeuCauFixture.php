<?php
/**
 * BdsYeuCauFixture
 *
 */
class BdsYeuCauFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'bds_yeu_cau';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'YEU_CAU_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'KHACH_HANG_ID' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'LOAI_TIN' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'NHOM_BDS' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'THANH_PHO' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'QUAN' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'PHUONG' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'DUONG' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'TEN_DU_AN' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 200, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DIEN_TICH_TOI_THIEU' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'NGANG_TOI_THIEU' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'DAI_TOI_THIEU' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'PHONG_NGU_TOI_THIEU' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'LAU_TOI_THIEU' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'VI_TRI_TANG_TU' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'VI_TRI_TANG_DEN' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'HUONG_BDS_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'VI_TRI_BDS_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'HEM_RONG_TOI_THIEU' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'LAN_RE_TOI_DA' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'KHOANG_CACH_DUONG_CHINH' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'GIA_TU' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'GIA_DEN' => array('type' => 'float', 'null' => true, 'default' => null, 'unsigned' => false),
		'LOAI_GIA_ID' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'indexes' => array(
			'PRIMARY' => array('column' => 'YEU_CAU_ID', 'unique' => 1)
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
			'YEU_CAU_ID' => 1,
			'KHACH_HANG_ID' => 1,
			'LOAI_TIN' => 1,
			'NHOM_BDS' => 1,
			'THANH_PHO' => 1,
			'QUAN' => 1,
			'PHUONG' => 1,
			'DUONG' => 1,
			'TEN_DU_AN' => 'Lorem ipsum dolor sit amet',
			'DIEN_TICH_TOI_THIEU' => 1,
			'NGANG_TOI_THIEU' => 1,
			'DAI_TOI_THIEU' => 1,
			'PHONG_NGU_TOI_THIEU' => 1,
			'LAU_TOI_THIEU' => 1,
			'VI_TRI_TANG_TU' => 1,
			'VI_TRI_TANG_DEN' => 1,
			'HUONG_BDS_ID' => 1,
			'VI_TRI_BDS_ID' => 1,
			'HEM_RONG_TOI_THIEU' => 1,
			'LAN_RE_TOI_DA' => 1,
			'KHOANG_CACH_DUONG_CHINH' => 1,
			'GIA_TU' => 1,
			'GIA_DEN' => 1,
			'LOAI_GIA_ID' => 1
		),
	);

}
