<?php
class rad_dashboard extends controller
{
  public $model_teaching_history;
  
  public function __construct(){
    $this->model_teaching_history = $this->model('M_teaching_history');
  }
  function trang_chu(){
      // Gọi model Teaching recording
      $this->view('master_layout',[
          "page"=>'rad_dashboard'
          ]);
  }
}



?>