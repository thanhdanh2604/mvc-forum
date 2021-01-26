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
    function get_name_rd_teacher(){
        return $this->get_list_with_condition('rd_team',1);
    }
}

?>