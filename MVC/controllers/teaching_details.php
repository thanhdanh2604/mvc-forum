<?php
class teaching_details extends controller {
    public $model_teaching_history;
    public $model_teacher;
    public $model_student;
    public $model_subject;
    function __construct()
    {
        $this->model_teaching_history= $this->model('M_teaching_history');
        $this->model_teacher= $this->model('M_teacher');
        $this->model_student= $this->model('M_student');
        $this->model_subject= $this->model('M_subject');
    }
    function trang_chu($start_date=null,$end_date=null){
        if($start_date == null && $end_date == null ){
            $start_date = strtotime(date('Y-m-01',strtotime('this month')));
            $end_date = strtotime(date('Y-m-t',strtotime('this month')));
        }else{
            $start_date = strtotime($start_date);
            $end_date = strtotime($end_date);
        }
        $array_student = $this->model_student->get_id_and_name_student();
        $array_teacher = $this->model_teacher->get_id_and_name_teacher();
        $subject_name = $this->model_subject->get_all_subject();
        $data_teaching_recording = $this->model_teaching_history->get_list_of_the_date_range($start_date,$end_date);
        $this->view('master_layout',[
            "page"=>'teaching_details_page',
            "data_teaching"=> $data_teaching_recording,
            "subject_name"=> $subject_name,
            "student"=>$array_student,
            "teacher" => $array_teacher,
            "start_date" =>$start_date,
            "end_date"=> $end_date
        ]);
    }
}


?>