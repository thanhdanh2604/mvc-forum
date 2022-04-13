<?php
class M_comment extends DB
{
    function __construct()
	{
		$this->table = 'comments';
		$this->key_id = 'id_comment';
    }

    function get_all_comments(){
        return $this->get_list();
    }
    function get_detail_comment($id){
      return  $this->get_row($id);
    }
    function insert_comment($data){
        return $this->insert($data);
    }
    function edit_comment($data,$id){
        return $this->update($data,$id);
    }
    function delete_comment($id){
        return $this->remove($id);
    }
}



?>