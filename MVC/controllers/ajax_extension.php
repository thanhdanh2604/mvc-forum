<?php
//* Ajax này phục vụ cho extension chrome
class ajax_extension extends controller
{
  public $model_invoice;
  public $model_staff_cost;
  public $model_teaching_recording;
  public $model_teacher;
  public $model_student;
  public $model_subject;
  function __construct(){
    $this->model_teaching_recording = $this->model("M_teaching_history");
    $this->model_teacher = $this->model('M_teacher');
    $this->model_student= $this->model('M_student');
    $this->model_subject= $this->model('M_subject');
  }
  function show_calendar_of_teacher($id_teacher){
    //*Hiện tại đang lấy ngày bắt đầu của tuần và kết thúc của tuần
    $day = date('w');
    $week_start = date('M-d-Y', strtotime('-'.$day.' days'));
    $week_end = date('M-d-Y', strtotime('+'.(7-$day).' days'));
    $data = $this->model_teaching_recording->get_calendar_teacher_via_date_range($id_teacher,$week_start,$week_end);
    $data_student = $this->model_student->get_id_and_name_student();
    $subject_name = $this->model_subject->get_all_subject();
    $this->view('ajax',[
      "page"=>'ajax_extension',
      "subject_name"=> $subject_name,
      "student"=>$data_student,
      "data"=>$data,
      ]);
  }
}



?>