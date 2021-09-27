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
	}
	function get_full_teaching_recording() {
		return parent::get_list();
	}

	function get_detail_teaching_recording($id){
		return parent::get_row($id);
	}

	// Lấy lớp học theo $date, biến $date dạng time
	function get_list_of_the_date($date){
		$day = date('d-m-Y',$date);
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
						if ( date('d-m-Y',$key3) == $day) {
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
			if($diemdanh===null){
				continue;
			}else{
				foreach ($diemdanh as  $value1) {
					foreach ($value1->lich_hoc_du_kien as  $value2) {
						foreach ($value2 as $key3 => $value3) {
							if($key3==null){
								//Một số trường hợp lỗi lúc đầu không có trường thời gian thì sẽ bỏ qua
								continue;
							}else{
								if ( $key3>=$start_date && $key3<=$end_date && isset($value3->doanh_thu)) {
									$value3->ma_goi =
									$value1->id_packet;
									$value3->ma_lop = $value['id'];
									$array[] = $value2;
								}
							}
						}
					}
				}
			}
			
		}
		return $array;
	}

	// Lấy doanh thu theo $date, $date dạng time
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
	// Lấy doanh thu 7 ngày gần nhất, xuất theo dạng array
	function get_revenue_last_7_date(){
		$array_revenue = array();
		$doanh_thu_theo_ngay = 0;
		for ($i=1; $i <=7 ; $i++) { 
			$doanh_thu_theo_ngay = $this->get_revenue_of_the_date(strtotime( $i." days ago"));
			array_push($array_revenue,$doanh_thu_theo_ngay);
		}
		//Đảo ngược mảng lại cho doanh thu nằm ở cuối mảng
		return array_reverse($array_revenue) ;
	}
	//Lấy doanh thu theo ngày, xuất theo array
	function get_revenue_of_month($month,$year){
		// Lấy danh sách các ngày trong tháng
		$current_month = '01-'.$month.'-'.$year;
		$number_of_date = date('t',strtotime($current_month));
		$array_of_date = array();
		for ($i=1; $i <= $number_of_date; $i++) { 
			$time=mktime(12, 0, 0, $month, $i, $year);          
    	if (date('m', $time)==$month)       
      $array_of_date[]=date('d-m-Y', $time);
		}
		// Lấy doanh thu từng ngày trong tháng
		$array_revenue = array();
		foreach ($array_of_date as $date) {
			$revenue = $this->get_revenue_of_the_date(strtotime($date));
			$array_revenue[$date]=$revenue;
		}
		return $array_revenue;
	}
	//Lấy tổng doanh thu theo khoản thời gian, biến truyền vào dạng string ()
	function get_revenue_date_range($start_date,$end_date){
		$start_date_value = strtotime($start_date);
		$end_date_value = strtotime($end_date);
		$array_date_range = $this->get_list_of_the_date_range($start_date_value,$end_date_value);
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
	//Lấy tổng hợp giờ dạy của Team R&D xuất theo dạng Mảng
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
				if($data1 ===null){
					continue;
				}else{
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
		}
		return $details = array_merge($this->sapxeptimeline($array_mon),$this->sapxeptimeline($array_tue),$this->sapxeptimeline($array_web),$this->sapxeptimeline($array_thu),$this->sapxeptimeline($array_fri),$this->sapxeptimeline($array_sat),$this->sapxeptimeline($array_sun));
	}
	// Tính giờ dạy của giáo viên trong tháng
	function get_all_teaching_hours_teacher($start_date= null,$end_date = null){
		
		$this->teacher = new M_teacher();
		$data = $this->get_full_teaching_recording();
		$array_temp = array();
		foreach ($data as $key ) {
				$data1 = json_decode($key['teaching_history']);
				if($data1 ===null){
					continue;
				}else{
					foreach ($data1 as $key1 => $value1) {
							foreach ($value1->lich_hoc_du_kien as $key2 => $value2) {
								foreach ($value2 as $key3 => $value3) {
									if (($key3>=strtotime($start_date))&&($key3<=strtotime($end_date)) ) {
										if(isset($value3->hours)&&$value3->dd_prof==1){
											if(isset($value3->teacher_hours)){// Liểm tra có giờ dạy riêng không, nếu có lưu lại
												$final_hours= $value3->teacher_hours;
											}else{
												$final_hours= $value3->hours;
											}
											$teacherName= $this->teacher->get_name_teacher($value1->ma_giao_vien);
											if(isset($array_temp[$teacherName])){
												$array_temp[$teacherName]+=$final_hours;
											}else{
												$array_temp[$teacherName]=$final_hours;
											}
										}
									}
									
								}
							}
					}
				}
		}
		return $array_temp;
	}
	//Xắp xếp giờ dạy theo sáng, trưa tối
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
	//Tính thồi gian còn lại của Teaching Recording
	function tinh_thoi_gian_con_lai($id){
    $study_hour = 0;
    $temp_json = $this->get_detail_teaching_recording($id);
    $objdd = json_decode($temp_json['teaching_history']);
    if ($objdd==null) {
      $study_hour=0;
    }
    else{
      if ($temp_json['type']==1) {
        foreach ($objdd as $key => $value) {
          foreach ($value->lich_hoc_du_kien as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
              if (isset($value2->hours)&& $value2->dd_student==1&& !isset($value1->finish)) {
                $study_hour+= $value2->hours;
              }
            }
          }
        }
        $time_left = $temp_json['total_hours']- $study_hour;
        return $time_left;
      }
      else {
        // nếu là lớp nhóm
        $temp_array = array();
        $obj_id_student = json_decode($temp_json['id_student']);
        foreach ( $obj_id_student as $key_id => $value_id) {
          $study_hour=0;
          foreach ($objdd as $key => $value) {
            foreach ($value->lich_hoc_du_kien as $key1 => $value1) {
              foreach ($value1 as $key2 => $value2) {
                foreach ($value2->dd_student as $key3 => $value3) {
                    if (isset($value2->hours)&& $value3==1 && $key3 == $value_id) {
                      $study_hour+= $value2->hours;
                    }
                }
              }
            }
          }
          $temp_array[$value_id]= $temp_json['total_hours'] - $study_hour;
        }
        return $temp_array;
      }     
    }
    
  }
	//Lấy các lớp hiện tại của giáo viên
	function get_current_class_prof($id_prof){
		// Lấy toàn bộ danh sách điểm danh 
	 
		$result = $this->get_list_with_condition('finish',1);

		// Từ danh sách điểm danh, lọc mã giáo viên 
		$array_current_class=array();
		foreach ($result as $key) {
				if($key['teaching_history']!=""){
						$tempjson = json_decode($key['teaching_history']);
						foreach ($tempjson as $key2 => $value2) {
								if ($value2->ma_giao_vien==$id_prof && (!isset($value2->finish))) {
										$obj_current_class= new stdClass();
										$obj_current_class->ma_giao_vien = $value2->ma_giao_vien;
										$obj_current_class->ma_mon = $value2->ma_mon;
										$obj_current_class->ma_hoc_sinh = $value2->ma_hoc_sinh;
										$obj_current_class->id_packet = $value2->id_packet;
										$obj_current_class->ma_lop = $key['id'];
										if(isset($value2->whiteboard)){
												$obj_current_class->whiteboard = $value2->whiteboard;
										}
										$obj_current_class->lich_hoc_du_kien = $value2->lich_hoc_du_kien;
										array_push($array_current_class,$obj_current_class);
										
								}
						}
				}
				
		}
		return $array_current_class;
	}
	//Lấy lịch dạy của giáo viên dựa vào khoản thời gian cụ thể
	function get_calendar_teacher_via_date_range($id_prof,$start_date,$end_date){
		$start_date_time = strtotime($start_date);
		$end_date_time = strtotime($end_date);
		$data_current_class = $this->get_current_class_prof($id_prof);
		$array_calendar_from_time_to_time = array();
		
		foreach ($data_current_class as $key=>$value) {
			foreach($value->lich_hoc_du_kien as $key2=>$chi_tiet_buoi){
					
					foreach($chi_tiet_buoi as $time=> $chi_tiet){
			
						if($time>=$start_date_time && $time<=$end_date_time){
							array_push($array_calendar_from_time_to_time,$chi_tiet_buoi);
						}
					
					}

			}
		}
		return $array_calendar_from_time_to_time;
	}
	//Lấy tất cả phần dòng tiền  
	function get_all_cost_flow(){

		$data = $this->get_full_teaching_recording();
		$array_temp = array();
		foreach ($data as $value) {
			if($value['edit_history']!=null){// một số Nhật ký giảng dạy không có cost flow do lúc đó chưa cập nhập
				$cost_flow = json_decode($value['edit_history']);
				$array_temp[]= $cost_flow;
			}else{
				continue;
			}
		}
		return $array_temp;
	}
	// Lấy phần dòng tiền theo ngày bắt đầu và kết thúc
	function get_cost_flow_with_date_range($start_date,$end_date){
		$data = $this->get_all_cost_flow();
		$array_cash_flow = array();
		foreach ($data as $value) {
			if($value!=null){
				foreach($value as $cash_flow){ // Lặp lại lần nữa để lọc ngày
					if(strtotime($cash_flow->ngay_nhan)>=strtotime($start_date)&& strtotime($cash_flow->ngay_nhan)<=strtotime($end_date)){
					 array_push($array_cash_flow,$cash_flow);
					}
				}
			}
			
		}
		return $array_cash_flow;
	}
}



 ?>