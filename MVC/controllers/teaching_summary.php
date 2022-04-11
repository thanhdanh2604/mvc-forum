<?php
class teaching_summary extends controller
{
    public $teacher;
    public $subject;
    public $teaching_recording;
    function __construct()
    {
        $this->teacher= $this->model('M_teacher');
        $this->student= $this->model('M_student');
        $this->subject= $this->model('M_subject');
        $this->teaching_recording= $this->model('M_teaching_history');
    }
    function trang_chu($start_date= null,$end_date=null){
        if($start_date == null && $end_date == null ){
            $start_date = date('Y-m-01',strtotime('this month'));
            $end_date = date('Y-m-t',strtotime('this month'));
        }
        $array_student = $this->student->get_id_and_name_student();
        $array_teacher_rad = $this->teacher->get_rd_teacher();
        $array_summary = $this->teaching_recording->get_summary_team_rad($start_date,$end_date);
        $subject_name = $this->subject->get_all_subject();
          // Lấy giờ dạy của giáo viên trong tháng
        $teaching_time = $this->teaching_recording->get_all_teaching_hours_teacher($start_date,$end_date);
        $this->view('master_layout',[ 
        "page"=>'teaching_summary',
        "rad"=> $array_summary,
        "subject_name"=> $subject_name,
        "student"=>$array_student,
        "teacher_rad" => $array_teacher_rad,
        "teaching_time"=> $teaching_time,
        "start_date" =>$start_date,
        "end_date"=> $end_date]
        );
    }
  
}

?>