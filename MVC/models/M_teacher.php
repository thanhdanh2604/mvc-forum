<?php

class M_teacher extends DB
{
   
    function __construct()
	{
		$this->table = 'teacher';
        $this->key_id = 'id_teacher';
        
    }
    function get_all_teacher(){
        return $this->get_list();
    }
    function get_detail_teacher($id){
        return  $this->get_row($id);
    }
    function is_r_a_d($id){
        $data = $this->get_detail_teacher($id);
        if($data['rd_team']==1){
            return true;
        }else{
            return false;
        }
    }
    function get_rd_teacher(){
        return $this->get_list_with_condition('rd_team',1);
    }
    function get_name_teacher($id){
       $data= $this->get_row($id);
        return $data['fullname'];
    }
    function get_id_and_name_teacher(){
        $data= $this->get_all_teacher();
        $array = array();
        foreach ($data as $key => $value) {
            array_push($array,['id'=>$value['id_teacher'],'name'=>$value['fullname']]);
        }
        return $array;
    }
}

?>