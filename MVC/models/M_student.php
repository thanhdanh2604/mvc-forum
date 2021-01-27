<?php
class M_student extends DB
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
    function get_id_and_name_student(){
        $data= $this->get_all_student();
        $array = array();
        foreach ($data as $key => $value) {
            array_push($array,['id'=>$value['id_student'],'name'=>$value['full_name']]);
        }
        return $array;
    }
}



?>