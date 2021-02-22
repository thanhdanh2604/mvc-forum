<?php
class M_staff_cost extends DB
{
    
    function __construct()
    {
        $this->table = 'staff_cost';
        $this->key_id = 'id';
    }
    function insert_staff_cost($data){
        if($this->insert($data)){
            $this->status = true;
        }
    }
     
    function get_all_staff_cost(){
        if($this->get_list()){
            $this->status = true;
            return $this->get_list();
        }
    }
    function get_detail_staff_cost($id){
        if($this->get_row($id)){
            $this->status = true ; 
            return $this->get_row($id);
        }
    }
    function edit_staff_cost($data,$id){
        return $this->update($data,$id);
       
    }
    function delete_staff_cost($id){
        return $this->remove($id);
    }
    function get_staff_cost_date_range($start_date,$end_date){
        //@$start_date,$end_date dạng YYYY/MM/DD
        return $this->get_list_with_between('month',$start_date, $end_date);
    }
    function get_total_staff_cost($start_date,$end_date){
       $array = $this->get_staff_cost_date_range($start_date,$end_date);
       $tong = 0;
       foreach ($array as  $value) {
          $tong+= $value['cost'];
        }
        return $tong;
    }
}
?>