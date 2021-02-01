<?php 
class ajax extends controller{
    public $model_invoice;
    public $model_staff_cost;
    public $model_teaching_recording;
    function __construct()
    {
        $this->model_invoice = $this->model('M_invoice');
        $this->model_staff_cost = $this->model('M_staff_cost');
        $this->model_teaching_recording = $this->model('M_teaching_history');
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
    public function get_array_doanh_thu_trong_nam(){
        $array = array();
        for ($m=1; $m<=12; $m++) {
            $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = strtotime(date('Y-m-01',strtotime($month)));
            $end_date = strtotime(date('Y-m-t',strtotime($month)));
            $value = $this->model_teaching_recording->get_revenue_date_range($start_date,$end_date);
           // if($value!=0){
                array_push($array,$value);
           // }else{ continue;}
           
        }
        echo json_encode($array);
    }
   
}

?>