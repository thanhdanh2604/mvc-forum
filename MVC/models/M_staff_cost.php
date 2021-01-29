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
}


?>