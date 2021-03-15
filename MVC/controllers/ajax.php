<?php 
class ajax extends controller{
    public $model_invoice;
    public $model_staff_cost;
    public $model_teaching_recording;
    public $model_teacher;
    public $model_student;
    public $model_subject;
    function __construct()
    {
        $this->model_invoice = $this->model('M_invoice');
        $this->model_staff_cost = $this->model('M_staff_cost');
        $this->model_teaching_recording = $this->model('M_teaching_history');
        $this->model_teacher = $this->model('M_teacher');
        $this->model_student= $this->model('M_student');
        $this->model_subject= $this->model('M_subject');
    }
    function ajax_edit_invoice(){
        $value = $_POST['value'];
        $id = $_POST['pk'];
        $colum = $_POST['name'];
        $data = array($colum=>$value);
        $this->model_invoice->edit_invoice($data,$id);
    }
    function ajax_delete_invoice($id){
        $this->model_invoice->delete_invoice($id);
    }
    function ajax_edit_staff_cost(){
        $value = $_POST['value'];
        $id = $_POST['pk'];
        $colum = $_POST['name'];
        $data = array($colum=>$value);
        $this->model_staff_cost->edit_staff_cost($data,$id);
    }
    function ajax_delete_staff_cost($id){
        $this->model_staff_cost->delete_staff_cost($id);
    }
    function get_array_doanh_thu_trong_nam(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_teaching_recording->get_revenue_date_range($start_date,$end_date);
           // if($value!=0){
                array_push($array,$value);
           // }else{ continue;}
        }
        echo json_encode($array);
    }
    function get_array_chi_phi_van_phong(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_invoice->get_total_cost_invoice($start_date,$end_date);
          
                array_push($array,$value);
           
        }
        echo json_encode($array);
    }
    function get_array_chi_phi_nhan_su(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
           // if($value!=0){
                array_push($array,$value);
           // }else{ continue;}
        }
        echo json_encode($array);
    }
    function get_array_doanh_thu_thuc_te(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            // Lấy doanh thu, chi phí văn phòng, và chi phí nhân sự
            $doanh_thu = $this->model_teaching_recording->get_revenue_date_range($start_date,$end_date);
            $chi_phi_van_phong = $this->model_invoice->get_total_cost_invoice($start_date,$end_date);
            $chi_phi_ns = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
           
            // trừ chi 
            $total = $doanh_thu - ($chi_phi_van_phong + $chi_phi_ns);
            
            array_push($array,$total);
        }
        echo json_encode($array);
    }
    function get_array_doanh_thu_7_ngay_gan_nhat(){
      echo json_encode($this->model_teaching_recording->get_revenue_last_7_date()) ;
    }
    function ajax_get_all_rad_teaching_detail(){
        $data = $this->model_teaching_recording->get_full_teaching_recording();
		$array_teaching_rad = array();
		foreach ($data as $key ) {
			if ($key['teaching_history']!="") {
				$data1 = json_decode($key['teaching_history']);
				foreach ($data1 as  $value1) {
					if($this->model_teacher->is_r_a_d($value1->ma_giao_vien)){
						foreach ($value1->lich_hoc_du_kien as $key2 => $value2) {
							foreach ($value2 as $key3 => $value3) {
								array_push($array_teaching_rad,$value2);
							}
						}
					}
				}
			}
		}
        
        $array_student = $this->model_student->get_id_and_name_student();

        $array_teacher_rad = $this->model_teacher->get_rd_teacher();

        $subject_name = $this->model_subject->get_all_subject();

        // Hiển thị data
        $this->view('ajax',[
            "page"=>'ajax_rad',
            "data_teaching"=> $array_teaching_rad,
            "subject_name"=> $subject_name,
            "student"=>$array_student,
            "teacher_rad" => $array_teacher_rad
        ]);
    }
}


?>
