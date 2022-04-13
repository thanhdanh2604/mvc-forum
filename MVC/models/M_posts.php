<?php
class M_posts extends DB
{
    function __construct()
	{
		$this->table = 'posts';
		$this->key_id = 'id_post';
    }

    function get_all_posts(){
        return $this->get_list();
    }
    function get_detail_post($id){
      return  $this->get_row($id);
    }
    function insert_post($data){
        return $this->insert($data);
    }
    function edit_post($data,$id){
        return $this->update($data,$id);
    }
    function delete_post($id){
        return $this->remove($id);
    }
}



?>