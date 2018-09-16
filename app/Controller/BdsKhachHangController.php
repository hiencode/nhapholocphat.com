<?php
App::uses('AppController', 'Controller');
/**
 * BdsKhachHang Controller
 *
 * @property BdsKhachHang $BdsKhachHang
 */
class BdsKhachHangController extends AppController {
	public $uses = array (
			'BdsKhachHang',
			'BdsYeuCau',
			'TinhTrangKh',
			'LoaiTin',
			'NhomBds',
			'Province',
			'Huong',
			'ViTri',
			'LoaiTien'
	);
	
	/**
	 * Displays a view Results
	 */
	public function index() {
		$paraKhachHang = $this->request->query;
		
		$this->setInit();
		
		if(isset($paraKhachHang['id'])){
			$bdsKhachHangId = $paraKhachHang['id'];
			$bdsKhachHang = $this->getBdsKhachHang($bdsKhachHangId);
			$this->set('bdsKhachHang', $bdsKhachHang);
			$bdsYeuCauList = $this->getBdsYeuCau($bdsKhachHangId);
			$this->set('bdsYeuCauList', $bdsYeuCauList);
			return $this->render ( '/bdsKhachHang' );
		} else {
			$bdsKhachHang = $this->BdsKhachHang->create();
			$bdsKhachHang['BdsKhachHang']['NAME'] = "Cuong";
			$this->set('bdsKhachHang', $bdsKhachHang);
			return $this->render ( '/createBdsKhachHang' );
		}
	}
	
	private function setInit(){
		$tinhTrangKhList = $this->TinhTrangKh->find('all', array(
				'conditions' => array(
						'TinhTrangKh.DELETE_YMD IS NULL'
				))
		);
		$this->set('tinhTrangKhList', $tinhTrangKhList);
		
		$loaiTin = $this->LoaiTin->find('all', array(
				'conditions' => array(
						'LoaiTin.DELETE_YMD IS NULL',
						'LoaiTin.LA_KHACH_HANG = 1'
				))
		);
		$this->set('loaiTinlist', $loaiTin);
		
		$nhomBdsList = $this->NhomBds->find('all', array(
				'conditions' => array(
						'NhomBds.DELETE_YMD IS NULL'
				))
		);
		$this->set('nhomBdsList', $nhomBdsList);
		
		$provinceList = $this->Province->find('all', array(
				'conditions' => array(
						'Province.PROVINCE_STATUS = 1'
				))
		);
		$this->set('provinceList', $provinceList);
		$this->set('districtList', null);
		$this->set('wardList', null);
		$this->set('streetList', null);
		
		$huongList = $this->Huong->find('all', array(
				'conditions' => array(
						'Huong.DELETE_YMD IS NULL'
				))
		);
		$this->set('huongList', $huongList);
		
		$viTriList = $this->ViTri->find('all', array(
				'conditions' => array(
						'ViTri.DELETE_YMD IS NULL'
				))
		);
		$this->set('viTriList', $viTriList);
		
		$loaiTienList = $this->LoaiTien->find('all', array(
				'conditions' => array(
						'LoaiTien.DELETE_YMD IS NULL'
				))
		);
		$this->set('loaiTienList', $loaiTienList);
	}
	
	public function doAddYeuCau(){
		$this->ajaxAction();
		$data = $_POST ['dataInput'];
  		//console.log($data);
 		//die;
  		$loai_tin = $data[0];
		$nhom_bds = $data[1];
		$province_code = $data[2];
		$district_code = $data[3];
		$ward_code = $data[4];
		$street_code = $data[5];
		$dien_tich_toi_thieu = $data[6];
		$ngang_toi_thieu = $data[7];
		$dai_toi_thieu = $data[8];
		$phong_ngu_toi_thieu = $data[9];
		$lau_toi_thieu = $data[10];
		$vi_tri_tang_tu = $data[11];
		$huong_code = $data[12];
		$vi_tri_code = $data[13];
		$hem_rong_toi_thieu = $data[14];
		$lan_re_toi_da = $data[15];
		$khoang_cach_duong_chinh = $data[16];
		$gia_tu = $data[17];
		$gia_den = $data[18];
		$loai_tien_code = $data[19];
		
		$bdsYeuCau = $this->BdsYeuCau->create();
		$bdsYeuCau['KHACH_HANG_ID'] = 112;
		$bdsYeuCau['LOAI_TIN'] = $loai_tin;
		$bdsYeuCau['NHOM_BDS'] = $nhom_bds;
		$bdsYeuCau['PROVINCE_CODE'] = $province_code;
		$bdsYeuCau['DISTRICT_CODE'] = $district_code;
		$bdsYeuCau['WARD_CODE'] = $ward_code;
		$bdsYeuCau['STREET_CODE'] = $street_code;
		$bdsYeuCau['DIEN_TICH_TOI_THIEU'] = $dien_tich_toi_thieu;
		$bdsYeuCau['NGANG_TOI_THIEU'] = $ngang_toi_thieu;
		$bdsYeuCau['DAI_TOI_THIEU'] = $dai_toi_thieu;
		$bdsYeuCau['PHONG_NGU_TOI_THIEU'] = $phong_ngu_toi_thieu;
		$bdsYeuCau['LAU_TOI_THIEU'] = $lau_toi_thieu;
		$bdsYeuCau['VI_TRI_TANG_TU'] = $vi_tri_tang_tu;
		$bdsYeuCau['HUONG_CODE'] = $huong_code;
		$bdsYeuCau['VI_TRI_CODE'] = $vi_tri_code;
		$bdsYeuCau['HEM_RONG_TOI_THIEU'] = $hem_rong_toi_thieu;
		$bdsYeuCau['LAN_RE_TOI_DA'] = $lan_re_toi_da;
		$bdsYeuCau['KHOANG_CACH_DUONG_CHINH'] = $khoang_cach_duong_chinh;
		$bdsYeuCau['GIA_TU'] = $gia_tu;
		$bdsYeuCau['GIA_DEN'] = $gia_den;
		$bdsYeuCau['LOAI_TIEN_CODE'] = $loai_tien_code;
		
//  	$this->BdsYeuCau->begin();
// 		$this->BdsYeuCau->save($bdsYeuCau);
// 		$this->BdsYeuCau->commit();
		
		$res['success'] = true;
		$res['data'] = "";
		return json_encode($res);
	}
	
	public function funcAddYeuCau($noiDung){
		$loai_tin = $data[0];
		$nhom_bds = $data[1];
		$province_code = $data[2];
		$district_code = $data[3];
		$ward_code = $data[4];
		$street_code = $data[5];
		$dien_tich_toi_thieu = $data[6];
		$ngang_toi_thieu = $data[7];
		$dai_toi_thieu = $data[8];
		$phong_ngu_toi_thieu = $data[9];
		$lau_toi_thieu = $data[10];
		$vi_tri_tang_tu = $data[11];
		$huong_code = $data[12];
		$vi_tri_code = $data[13];
		$hem_rong_toi_thieu = $data[14];
		$lan_re_toi_da = $data[15];
		$khoang_cach_duong_chinh = $data[16];
		$gia_tu = $data[17];
		$gia_den = $data[18];
		$loai_tien_code = $data[19];
	
		$bdsYeuCau = $this->BdsYeuCau->create();
		$bdsYeuCau['KHACH_HANG_ID'] = 112;
		$bdsYeuCau['LOAI_TIN'] = $loai_tin;
		$bdsYeuCau['NHOM_BDS'] = $nhom_bds;
		$bdsYeuCau['PROVINCE_CODE'] = $province_code;
		$bdsYeuCau['DISTRICT_CODE'] = $district_code;
		$bdsYeuCau['WARD_CODE'] = $ward_code;
		$bdsYeuCau['STREET_CODE'] = $street_code;
		$bdsYeuCau['DIEN_TICH_TOI_THIEU'] = $dien_tich_toi_thieu;
		$bdsYeuCau['NGANG_TOI_THIEU'] = $ngang_toi_thieu;
		$bdsYeuCau['DAI_TOI_THIEU'] = $dai_toi_thieu;
		$bdsYeuCau['PHONG_NGU_TOI_THIEU'] = $phong_ngu_toi_thieu;
		$bdsYeuCau['LAU_TOI_THIEU'] = $lau_toi_thieu;
		$bdsYeuCau['VI_TRI_TANG_TU'] = $vi_tri_tang_tu;
		$bdsYeuCau['HUONG_CODE'] = $huong_code;
		$bdsYeuCau['VI_TRI_CODE'] = $vi_tri_code;
		$bdsYeuCau['HEM_RONG_TOI_THIEU'] = $hem_rong_toi_thieu;
		$bdsYeuCau['LAN_RE_TOI_DA'] = $lan_re_toi_da;
		$bdsYeuCau['KHOANG_CACH_DUONG_CHINH'] = $khoang_cach_duong_chinh;
		$bdsYeuCau['GIA_TU'] = $gia_tu;
		$bdsYeuCau['GIA_DEN'] = $gia_den;
		$bdsYeuCau['LOAI_TIEN_CODE'] = $loai_tien_code;
	
		//  	$this->BdsYeuCau->begin();
		// 		$this->BdsYeuCau->save($bdsYeuCau);
		// 		$this->BdsYeuCau->commit();
	
		$res['success'] = true;
		$res['data'] = "";
		return json_encode($res);
	}
	
	private function setCommonData($bdsNews, $isNew){
		$user_id_login = $this->Session->read(RwsConstant::SESSION_LOGIN_USER_KEY);
		if($isNew){
			$bdsNews['CREATE_USER'] = $user_id_login;
			$bdsNews['CREATE_YMD'] = date('Y-m-d');
		}
		$bdsNews['UPDATE_USER'] = $user_id_login;
		$bdsNews['UPDATE_YMD'] =  date('Y-m-d');
		return $bdsNews;
	}
	
	public function doSaveBdsKhachHang() {
		if ($this->request->is(array('post', 'put'))) {
			$data = $this->request->data;
			$khachHangId =  $data['BdsKhachHang']['KHACH_HANG_ID'];
			if($khachHangId == ""){
				$khachHangId = $this->doAddBdsKhachHang($data);
				var_dump($khachHangId);
			} else {
				$this->doUpdateBdsKhachHang($data);
			}
			$this->getBdsKhachHang($khachHangId);
// 			if($this->request->data['yeuCauIndex'] > 0){
// 				$yeuCauIndex = $this->request->data['yeuCauIndex'] - 1;
// 				$bdsYeuCau = $this->request->data['yeuCauList'.$yeuCauIndex];
// 				var_dump($bdsYeuCau);
// 				die;
// 				funcAddYeuCau($bdsYeuCau);
// 			}
		}
		return $this->render ( '/bdsKhachHang' );
	}
	
	public function doAddBdsKhachHang($data) {
		$bdsKhachHang = $this->BdsKhachHang->create();
		$bdsKhachHang = $data['BdsKhachHang'];
		$bdsKhachHang = $this->setCommonData($bdsKhachHang, true);
		var_dump($bdsKhachHang['CMND_NGAY_CAP']);
		die;
		$this->BdsKhachHang->begin();
		$this->BdsKhachHang->save($bdsKhachHang);
		$this->BdsKhachHang->commit();
	
		$khachHangId = $this->BdsKhachHang->getLastInsertID();
		//Create bdsYeuCau
		if($khachHangId > 0) {
			$yeuCauIndex = $this->request->data['yeuCauIndex'];
			var_dump($yeuCauIndex);
			for($i = 0 ; $i < $yeuCauIndex ; $i++){
				$yeuCauList = $this->request->data['yeuCauList'.$i];
				$yeuCauArr = split(",", $yeuCauList);
					
				$bdsYeuCau = $this->BdsYeuCau->create();
				$bdsYeuCau['KHACH_HANG_ID'] = $khachHangId;
				$bdsYeuCau['TYPE_NEWS_CODE'] = $yeuCauArr[1];
				$bdsYeuCau['GROUP_CODE'] = $yeuCauArr[2];
				$bdsYeuCau['PROVINCE_CODE'] = $yeuCauArr[3];
				$bdsYeuCau['DISTRICT_CODE'] = $yeuCauArr[4];
				$bdsYeuCau['WARD_CODE'] = $yeuCauArr[5];
				$bdsYeuCau['STREET_CODE'] = $yeuCauArr[6];
				$bdsYeuCau['DIEN_TICH_TOI_THIEU'] = $yeuCauArr[7];
				$bdsYeuCau['NGANG_TOI_THIEU'] = $yeuCauArr[8];
				$bdsYeuCau['DAI_TOI_THIEU'] = $yeuCauArr[9];
				$bdsYeuCau['PHONG_NGU_TOI_THIEU'] = $yeuCauArr[10];
				$bdsYeuCau['LAU_TOI_THIEU'] = $yeuCauArr[11];
				$bdsYeuCau['VI_TRI_TANG_TU'] = $yeuCauArr[12];
				$bdsYeuCau['HUONG_CODE'] = $yeuCauArr[13];
				$bdsYeuCau['VI_TRI_CODE'] = $yeuCauArr[14];
				$bdsYeuCau['HEM_RONG_TOI_THIEU'] = $yeuCauArr[15];
				$bdsYeuCau['LAN_RE_TOI_DA'] = $yeuCauArr[16];
				$bdsYeuCau['KHOANG_CACH_DUONG_CHINH'] = $yeuCauArr[17];
				$bdsYeuCau['GIA_TU'] = $yeuCauArr[18];
				$bdsYeuCau['GIA_DEN'] = $yeuCauArr[19];
				$bdsYeuCau['LOAI_TIEN_CODE'] = $yeuCauArr[20];
				var_dump($bdsYeuCau);
				$this->BdsYeuCau->begin();
				$this->BdsYeuCau->save($bdsYeuCau);
				$this->BdsYeuCau->commit();
			}
		}
		return $khachHangId;
	}
	
	private function getBdsKhachHang($khachHangId){
// 		$bdsNews = $this->BdsNews->find('first', array(
// 				'fields' => 'BdsNews.*, DiemTot.*, DiemXau.*',
// 				'conditions' => array(
// 						'BdsNews.DELETE_YMD IS NULL',
// 						'BdsNews.BDSNEWS_ID =' . $bdsNewsId
// 				),
// 				'joins' =>array(
// 						array (
// 								'table' => 'diem_tot',
// 								'alias' => 'DiemTot',
// 								'type' => 'left',
// 								'conditions' => array (
// 										'DiemTot.DIEM_TOT_ID = BdsNews.DIEM_TOT_ID'
// 								)
// 						),
// 						array (
// 								'table' => 'diem_xau',
// 								'alias' => 'DiemXau',
// 								'type' => 'left',
// 								'conditions' => array (
// 										'DiemXau.DIEM_XAU_ID = BdsNews.DIEM_XAU_ID'
// 								)
// 						)
// 				)
// 		)
// 		);
// 		if($bdsNews != null){
// 			$this->set('bdsNews', $bdsNews);
				
// 			$districtList = null;
// 			if(isset($bdsNews['BdsNews']['PROVINCE_CODE']) && $bdsNews['BdsNews']['PROVINCE_CODE'] != ""){
// 				$provinceCode = $bdsNews['BdsNews']['PROVINCE_CODE'];
// 				$districtList = $this->District->find('all', array(
// 						'conditions' => array(
// 								'District.DISTRICT_STATUS = 1',
// 								'District.PROVINCE_CODE =' . $provinceCode
// 						))
// 				);
// 			}
// 			$this->set('districtList', $districtList);
				
// 			$wardList = null;
// 			if(isset($bdsNews['BdsNews']['DISTRICT_CODE']) && $bdsNews['BdsNews']['DISTRICT_CODE'] != ""){
// 				$districtCode = $bdsNews['BdsNews']['DISTRICT_CODE'];
// 				$wardList = $this->Ward->find('all', array(
// 						'conditions' => array(
// 								'Ward.WARD_STATUS = 1',
// 								'Ward.DISTRICT_CODE =' . $districtCode
// 						))
// 				);
// 			}
// 			$this->set('wardList', $wardList);
				
// 			$streetList = null;
// 			if(isset($bdsNews['BdsNews']['WARD_CODE']) && $bdsNews['BdsNews']['WARD_CODE'] != ""){
// 				$wardCode = $bdsNews['BdsNews']['WARD_CODE'];
// 				$streetList = $this->Street->find('all', array(
// 						'conditions' => array(
// 								'Street.STREET_STATUS = 1',
// 								'Street.DISTRICT_CODE =' . $districtCode
// 						))
// 				);
// 			}
// 			$this->set('streetList', $streetList);
				
// 			$docSoTien = $this->convert_number_to_words($bdsNews['BdsNews']['GIA_RAO']);
// 			$this->set('docSoTien', $docSoTien);
				
// 			$hinhAnhList = $this->HinhAnh->find('all', array(
// 					'conditions' => array(
// 							'HinhAnh.DELETE_YMD IS NULL',
// 							'HinhAnh.BDS_NEWS_ID =' . $bdsNewsId
// 					))
// 			);
// 			$this->set('hinhAnhList', $hinhAnhList);
// 			//			var_dump($hinhAnhList);
// 			//			die;
// 		}
	}
}