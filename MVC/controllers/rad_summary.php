<?php
class rad_summary extends controller
{
    public $teacher;
    public $subject;
    public $teaching_recording;
    function __construct()
    {
        $this->teacher= $this->model('M_teacher');
        $this->student= $this->model('M_student');
        $this->subject= $this->model('M_subject');
        $this->teaching_recording= $this->model('M_teaching_recording');
    }
    function trang_chu(){
        $array_rad = $this->teacher->get_name_rd_teacher();
        $array_student = $this->student->get_all_student();
        $array_all_teaching_recording = $this->teaching_recording->get_all_teaching_recording();
        $this->view('master_layout',array(
            'page'=>'teaching_rad',
            'rad'=>$array_rad,
            'student'=>$array_student,
            'teaching_recording'=>$array_all_teaching_recording
        ));
    }
}



?>