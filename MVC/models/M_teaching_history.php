<?php

/**
 * Teaching history controller
 */
class M_teaching_history extends DB
{	
	public $teacher;
	function __construct()
	{
		$this->table = 'teaching_recording';
		$this->key_id = 'id';
		// Gọi Modal teacher
		
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
	function get_summary_team_rad($start_date,$end_date){
		$this->teacher = new M_teacher();
		$data = $this->get_full_teaching_recording();
		$array_mon = array();
		$array_tue =array();
		$array_web =array();
		$array_thu =array();
		$array_fri =array();
		$array_sat =array();
		$array_sun =array();
		foreach ($data as $key ) {
			if ($key['teaching_history']!="") {
				$data1 = json_decode($key['teaching_history']);
				foreach ($data1 as $key1 => $value1) {
					if($this->teacher->is_r_a_d($value1->ma_giao_vien)){
						foreach ($value1->lich_hoc_du_kien as $key2 => $value2) {
							foreach ($value2 as $key3 => $value3) {
								if (($key3>=strtotime($start_date))&&($key3<=strtotime($end_date)) ) {
									switch (date('N',$key3)) {
										case 1:
										  $value3->time = $key3;
										  array_push($array_mon,$value3);
										  break;
										case 2:
										  $value3->time = $key3;
										  array_push($array_tue,$value3);
										  break;
										case 3:
										  $value3->time = $key3;
										  array_push($array_web,$value3);
										  break;
										case 4:
										  $value3->time = $key3;
										  array_push($array_thu,$value3);
										  break;
										case 5:
										  $value3->time = $key3;
										  array_push($array_fri,$value3);
										  break;
										case 6:
										  $value3->time = $key3;
										  array_push($array_sat,$value3);
										  break;
										case 7:
										  $value3->time = $key3;
										  array_push($array_sun,$value3);
										  break;
												   
									  default: 
										break;
									}
								}
								
							}
						}
					}
				}
			   
			}
		}
		return $details = array_merge($this->sapxeptimeline($array_mon),$this->sapxeptimeline($array_tue),$this->sapxeptimeline($array_web),$this->sapxeptimeline($array_thu),$this->sapxeptimeline($array_fri),$this->sapxeptimeline($array_sat),$this->sapxeptimeline($array_sun));
	}
	function sapxeptimeline($array){
		$n = count($array);
		for ($i=0; $i < $n-1; $i++) { 
		  for ($j=$i+1; $j < $n; $j++) { 
		  
			if(strtotime($array[$i]->starttime)>strtotime($array[$j]->starttime)){
			  $temp=$array[$i];
			  $array[$i] =  $array[$j];
			  $array[$j] = $temp;
			 }
		  }
		}
		return $array;
	  } 
}



 ?>