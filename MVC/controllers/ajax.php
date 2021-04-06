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
        $this_month = date('n');
        for ($m=1; $m<=$this_month; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_teaching_recording->get_revenue_date_range($start_date,$end_date);
            array_push($array,$value);
        }
        echo json_encode($array);
    }
    function get_array_chi_phi_van_phong(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_invoice->get_total_cost_invoice($start_date,$end_date);
            array_push($array,$value);
        }
        return $array;
    }
    function get_array_chi_phi_nhan_su(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $value = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
            array_push($array,$value);
        }
        return $array;
    }
    function get_chi_phi_vp_ns(){
        $array_vp = array();
        $array_sc = array();
        $this_month = date('n');
        for ($m=1; $m<=$this_month; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $sc_value = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
            $vp_value = $this->model_invoice->get_total_cost_invoice($start_date,$end_date);
            array_push($array_vp,$vp_value);
            array_push($array_sc,$sc_value);
        }
        $final_object = '{
          "Chi phí Văn Phòng":'.json_encode($array_vp).',
          "Chi phí Nhân Sự:":'.json_encode($array_sc).'
        }';
        echo $final_object;
    }
    function get_array_dau_ra_dau_vao(){
      $array_dau_vao = array();
      $array_dau_ra = array();
      $this_month = date('n');
      for ($m=1; $m<=$this_month; $m++) {
          $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
          $start_date = date('Y-m-01',strtotime($month));
          $end_date = date('Y-m-t',strtotime($month));
          // Lấy doanh thu, chi phí văn phòng, và chi phí nhân sự
          $doanh_thu_dau_vao = $this->model_teaching_recording->get_revenue_date_range($start_date,$end_date);

          $chi_phi_van_phong = $this->model_invoice->get_total_cost_invoice($start_date,$end_date);
          $chi_phi_ns = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
         
          // trừ chi 
          $chi_phi_dau_ra = $chi_phi_van_phong + $chi_phi_ns;
          
          array_push($array_dau_vao,$doanh_thu_dau_vao);
          array_push($array_dau_ra,$chi_phi_dau_ra);
      }
      $final_object = '{
        "Doanh thu đầu vào":'.json_encode($array_dau_vao).',
        "Tổng chi đầu ra":'.json_encode($array_dau_ra).'
      }';
      echo $final_object;
    }
    function get_array_doanh_thu_thuc_te(){
        $array = array();
        $this_month = date('n');
        for ($m=1; $m<=$this_month; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
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
    function ajax_get_all_teaching_time(){
        $data = $this->model_teaching_recording->get_full_teaching_recording();
        $array_student = $this->model_student->get_id_and_name_student();
        $array_teacher = $this->model_teacher->get_all_teacher();
        $subject_name = $this->model_subject->get_all_subject();
        // Hiển thị data
        $this->view('ajax',[
            "page"=>'ajax_all_teaching_time',
            "data_teaching"=> $data,
            "subject_name"=> $subject_name,
            "student"=>$array_student,
            "teacher" => $array_teacher
        ]);
    }
    function ajax_get_student_out_of_hours(){
            $data_all_teaching_record = $this->model_teaching_recording->get_full_teaching_recording();
            $data_student = $this->model_student->get_id_and_name_student();
            $data_out_of_hours = array();
            foreach($data_all_teaching_record as $value){
              if($value['type']==1){
                $time_left_temp = $this->model_teaching_recording->tinh_thoi_gian_con_lai($value['id']);
                if ( $time_left_temp<=6 ) {
                  $temp_array = array();
                  $temp_array['name_teaching_recording']=$value['name'];
                  $temp_array['id_student']=$value['id_student'];
                  $temp_array['time_left']= $time_left_temp;
                  $temp_array['finish'] = $value['finish'];
                  $data_out_of_hours[]=$temp_array;
                }
              }
              elseif($value['type']==2){
                $time_left_temp = $this->model_teaching_recording->tinh_thoi_gian_con_lai($value['id']);
                foreach($time_left_temp as $k=>$v){
                  if($v<=6){
                    $temp_array = array();
                    $temp_array['name_teaching_recording']=$value['name'];
                    $temp_array['id_student']=$k;
                    $temp_array['time_left']= $v;
                    $temp_array['finish'] = $value['finish'];
                    $data_out_of_hours[]=$temp_array;
                  }
                }
              }
        
            }
            echo "<table class=\"table\">
              <thead>
                <tr>
                  <th>Student</th>
                  <th>Gói</th>
                  <th>Time left</th>
                </tr>
              </thead>
              <tbody>";
            echo "<tr>";
           
            foreach($data_out_of_hours as $value_outpackage){
              if ($value_outpackage['finish']==1) {
                echo  "<td style=\"color:blue\">";
                if(!is_array($value_outpackage['id_student'])){
                  foreach ($data_student as  $name) {
                      if($name['id']==$value_outpackage['id_student']){
                        echo $name['name'];
                        break;
                      }
                  }
                  }else{// Nếu là lớp nhóm
                  foreach ($value_outpackage['id_student'] as  $id_student) {
                      foreach ($data_student as  $name) {
                      if($name['id']==$id_student){
                          echo $name['name']."</br>";
                          break;
                      }
                      }
                  }
                 }
                echo  "</td>";
                echo  "<td style=\"color:green\">".$value_outpackage['name_teaching_recording']."</td>";
                echo  "<td style=\"color:red\">".$value_outpackage['time_left']."</td>";
                echo "</tr>";
              }
            }
             echo "</tbody></table>";
          
    }
}


?>
