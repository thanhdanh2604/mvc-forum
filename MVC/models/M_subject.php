<?php
class M_subject extends DB
{
    function __construct()
	{
		$this->table = 'subject';
		$this->key_id = 'id';
    }

    function get_all_subject(){
        return $this->get_list();
    }
    function get_name_subject($id){
        $data =  $this->get_row($id);
        return $data['name'];
    }
}



?>