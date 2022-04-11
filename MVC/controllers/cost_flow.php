<?php
class cost_flow extends controller
{
  
  public $model_teaching_recording;
 
  function __construct()
  {
    $this->model_teaching_history = $this->model('M_teaching_history');
  }
  public function trang_chu($month=null,$year=null){
    if($month===null&&$year ===null){
      $month = date('m');
      $year = date('Y');
    }
    $amount_of_month = date('t',strtotime('01-'.$month.'-'.$year));
    $start_date = date("Y-m-d", strtotime('01-'.$month.'-'.$year));
    $end_date = date("Y-m-d", strtotime($amount_of_month.'-'.$month.'-'.$year));

    $data_cost_flow = $this->model_teaching_history->get_cost_flow_with_date_range($start_date,$end_date);
    // Đổ ra View
    $this->view('master_layout',[
      'page'=>'cost_flow',
      'data_cost_flow'=>$data_cost_flow,
      'month'=>$month,
      'year'=>$year,
      'start_date' =>$start_date,
      'end_date'=> $end_date
    ]);
  }
}



?>
