<?php
App::uses ( 'AppController', 'Controller' );

/**
 * BdsKhachHangListController
 */
class BdsKhachHangListController extends AppController {
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
		
   	$searchParam = $this->request->data;
   	$condition = array();   		
	$order_by = '';		

   	if(isset($searchParam)){	   		
   		if(isset($searchParam["id_BdsKhachHang_loai_tin"]) && $searchParam["id_BdsKhachHang_loai_tin"] != ''){   				
   			array_push($condition, "BdsKhachHang.TYPE_NEWS_CODE= '". $searchParam["id_BdsKhachHang_loai_tin"] . "'");   			
		} else{
			$searchParam["id_BdsKhachHang_loai_tin"] = '';
		}
   	}
   	
	$this->set('querydata',$searchParam);

		$data = $this->BdsKhachHang->find("all", array(			
			'fields' => 'BdsKhachHang.*, Huong.HUONG_NAME, Ward.WARD_NAME, District.DISTRICT_NAME, Street.STREET_NAME',
			'conditions' => $condition,
			'joins' => array(				
				array(
					'table' => 'loai_bds',
					'alias' => 'LoaiBds',
					'type' => 'left',
					'conditions' => array(						
						'BdsKhachHang.LOAI_BDS_CODE = LoaiBds.LOAI_BDS_CODE'
					)
				)
			),
			'order' => $order_by
			));
		$this->set( 'data', $data);
		return $this->render ( '/BdsKhachHangList' );
	}

	public function getDistrictByProvince($provinceID){
		$provinceList = $this->Provinces->find('all', array(
			'conditions' => array(
					"Province.PROVINCE_STATUS = 1"
			))
		);
	}
	
	public function loadSearchInfo(){
		
	}
}
