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
       
       $array = $this->get_invoice_date_range($start_date,$end_date);
       $tong = 0;
       foreach ($array as  $value) {
          $tong+= $value['bill'];
        }
        return $tong;
    }
}



?>