<?php
class M_subject extends DB
{
    function __construct()
	{
		$this->table = 'student';
		$this->key_id = 'id_student';
    }

    function get_all_student(){
        return $this->get_list();
    }
    function get_name_student($id){
        $data =  $this->get_row($id);
        return $data['name'];
    }
}



?>