<?php
class teaching_rad extends controller
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
        $array_teacher_rad = $this->teacher->get_id_and_name_teacher();
        $array_summary = $this->teaching_recording->get_summary_team_rad($start_date,$end_date);
        $subject_name = $this->subject->get_all_subject();
        $this->view('master_layout',[ 
        "page"=>'teaching_rad',
        "rad"=> $array_summary,
        "subject_name"=> $subject_name,
        "student"=>$array_student,
        "teacher_rad" => $array_teacher_rad,
        "start_date" =>$start_date,
        "end_date"=> $end_date]
        );
    }
  
}

?>