<?php
require 'M_database.php';
/**
 * Teaching history controller
 */
class M_teaching_history extends DB_driver
{	
	function __construct()
	{
		$this->table = 'teaching_recording';
		$this->key_id = 'id';
	}

	function get_full_teaching_recording() {
		return parent::get_list();
	}

	function get_detail_teaching_recording($id){
		return parent::get_row($id);
	}

	// Lấy lớp học theo $date
	function get_list_of_the_date($date){
		$data = $this->get_full_teaching_recording();
		$array = array();
		foreach ($data as $value) {
		$diemdanh = json_decode($value['teaching_history']);
		foreach ($diemdanh as $value1) {
			foreach ($value1->lich_hoc_du_kien as  $value2) {
			foreach ($value2 as $key3 => $value3) {
				if($key3==null){
				continue;
				}else{
				if ( date('d-m-Y',$key3) === date('d-m-Y',$date)) {
					$value3->ma_goi = $value1->id_packet;
					$value3->ma_lop = $value['id'];
					$array[] = $value3;
				}
				}
			}
			
			}
		}
		}
		return $array;
	}

	//$start_date,$end_date định dạng time 
	function get_list_of_the_date_range($start_date,$end_date){
		$data = $this->get_full_teaching_recording();
		$array = array();
		foreach ($data as $value) {
			$diemdanh = json_decode($value['teaching_history']);
			foreach ($diemdanh as  $value1) {
				foreach ($value1->lich_hoc_du_kien as  $value2) {
					foreach ($value2 as $key3 => $value3) {
						if($key3==null){
							//Một số trường hợp lỗi lúc đầu không có trường thời gian thì sẽ bỏ qua
							continue;
						}else{
							if ( $key3>=$start_date && $key3<=$end_date) {
								$value3->ma_goi = $value1->id_packet;
								$value3->ma_lop = $value['id'];
								$array[] = $value2;
							}
						}
					}
				}
			}
		}
		return $array;
	}

	// Lấy doanh thu theo $date
	function get_revenue_of_the_date($date){
		$array_class_of_the_date = $this->get_list_of_the_date($date);
		$tong_doanh_thu = 0 ;
		foreach ($array_class_of_the_date as $value) {
			if( isset($value->doanh_thu)){
				$tong_doanh_thu += $value->doanh_thu;
			}
		}
		return $tong_doanh_thu;
	}

	function get_revenue_date_range($start_date,$end_date){
		$array_date_range = $this->get_list_of_the_date_range($start_date,$end_date);
		$tong_doanh_thu = 0;
		foreach($array_date_range as $value){
			foreach($value as $chi_tiet_buoi){
				if(isset($chi_tiet_buoi->doanh_thu)){
					$tong_doanh_thu += $chi_tiet_buoi->doanh_thu;
				}
			}
		}
		return $tong_doanh_thu;
	}
}

//$test = new teaching_recording();
//$abc = $test->get_list_of_the_date_range($start_date,$end_date);
//echo $test->get_revenue_date_range($start_date,$end_date);
//var_dump($abc);

 ?>