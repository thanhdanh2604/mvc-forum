<?php
class M_invoice extends DB
{
    public $status = false;
    function __construct()
	{
		$this->table = 'invoice';
		$this->key_id = 'id';
    }
    function insert_invoice($data){
        return $this->insert($data);
        if($this->insert($data)){
            $this->status = true;
        }
    }
    function get_all_invoice(){
        if($this->get_list()){
            $this->status = true;
            return $this->get_list();
        }
    }
    function get_detail_invoice($id){
        if($this->get_row($id)){
            $this->status = true ; 
            return $this->get_row($id);
        }
    }
    function edit_invoice($data,$id){
        return $this->update($data,$id);
    }
    function delete_invoice($id){
        return $this->remove($id);
    }
    function get_invoice_date_range($start_date,$end_date){
        //@$start_date,$end_date dạng YYYY/MM/DD
        return $this->get_list_with_between('date',$start_date, $end_date);
    }
    function get_total_cost_invoice($start_date,$end_date){
       //@$start_date,$end_date dạng YYYY/MM/DD
       $array = $this->get_invoice_date_range($start_date,$end_date);
       $tong = 0;
       foreach ($array as  $value) {
          $tong+= $value['bill'];
        }
        return $tong;
    }
    function get_reinvest_cost($start_date,$end_date){
        $array = $this->get_invoice_date_range($start_date,$end_date);
        $totalReinvest = 0;
        foreach ($array as $key => $value) {
            if($value['type']==2){// get Reinvest cost
                $totalReinvest+=$value['bill'];
            }
        }
        return $totalReinvest;
    }
    function get_operation_cost($start_date,$end_date){
        //@$start_date,$end_date dạng YYYY/MM/DD
        $array = $this->get_invoice_date_range($start_date,$end_date);
        $totalOperation = 0;
        foreach ($array as $key => $value) {
            if($value['type']==1){// get Operation cost
                $totalOperation+=$value['bill'];
            }
        }
        return $totalOperation;
    }
    function get_array_reinvest_cost_in_year(){
        $this_month = date('n');
        $arrayReinvestCost = array();
        for ($m=1; $m<=$this_month; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $arrayReinvestCost[] =  $this->get_reinvest_cost($start_date,$end_date);
        }
        return $arrayReinvestCost;   
    }
    function get_array_operation_cost_in_year(){
        $this_month = date('n');
        $arrayOperationCost = array();
        for ($m=1; $m<=$this_month; $m++) {
            $month = date('Y-F', mktime(0,0,0,$m, 1, date('Y')));
            $start_date = date('Y-m-01',strtotime($month));
            $end_date = date('Y-m-t',strtotime($month));
            $arrayOperationCost[] =  $this->get_operation_cost($start_date,$end_date);
        }
        return $arrayOperationCost;   
    }
}



?>