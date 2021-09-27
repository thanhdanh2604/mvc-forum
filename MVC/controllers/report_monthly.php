<?php
class report_monthly extends controller{
  public $model_teaching_history;
  public $model_invoice;
  public $model_staff_cost;
  public $model_teacher;
  public function __construct(){
    $this->model_teaching_history = $this->model('M_teaching_history');
    $this->model_invoice = $this->model('M_invoice');
    $this->model_staff_cost = $this->model('M_staff_cost');
    $this->model_teacher = $this->model('M_teacher');
  }

  public function trang_chu($month=null,$year=null){
    if($month==null||$year ==null){
      $month = date('m');
      $year = date('Y');
      $amount_of_month = date('t',strtotime('01-'.$month.'-'.$year));
    }
    $start_date = date("Y-m-d", strtotime('01-'.$month.'-'.$year));
    $end_date = date("Y-m-d", strtotime($amount_of_month.'-'.$month.'-'.$year))
    ;
    // Dòng tiền của tháng
    $cash_flow = $this->model_teaching_history->get_cost_flow_with_date_range($start_date,$end_date);
    //doanh thu của tháng
    $revenue_of_month = $this->model_teaching_history->get_revenue_of_month($month,$year);
    // Lấy tổng cộng reinvest
    $totalReinvest = $this->model_invoice->get_reinvest_cost($start_date,$end_date);
    $totalOperation = $this->model_invoice->get_operation_cost($start_date,$end_date);
    $totalStaffCost = $this->model_staff_cost->get_total_staff_cost($start_date,$end_date);
    // Lấy giờ dạy của giáo viên trong tháng
    $teaching_time = $this->model_teaching_history->get_all_teaching_hours_teacher($start_date,$end_date);
    // Lấy mảng bao gồm giáo viên
    $array_teacher =  $this->model_teacher->get_all_teacher();
    // Đổ ra View
    $this->view('report_layout',[
      'page'=>'monthly_report',
      'data_cash_flow'=>$cash_flow,
      'data_revenue_month'=> $revenue_of_month,
      'totalReinvest'=> $totalReinvest,
      'totalOperation'=> $totalOperation,
      'totalStaffCost'=> $totalStaffCost,
      'teaching_hours'=> $teaching_time,
      'start_date' =>$start_date,
      'end_date'=> $end_date
    ]);
  }
  public function test(){
    $month = date('m');
    $year = date('Y');
    $amount_of_month = date('t',strtotime('01-'.$month.'-'.$year));
    $start_date = date("Y-m-d", strtotime('01-'.$month.'-'.$year));
    $end_date = date("Y-m-d", strtotime($amount_of_month.'-'.$month.'-'.$year))
    ;
    $array_teacher =  $this->model_teaching_history->get_all_teaching_hours_teacher($start_date,$end_date);
    print_r ($array_teacher);
     
    
  }
}

?>