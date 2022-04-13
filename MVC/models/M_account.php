<?php


class M_account extends DB{

    function __construct()
    {
        $this->table = 'users';
		$this->key_id = 'id_user';
    }
    function get_all_users(){
        return $this->get_list();
    }
    function check_duplica_username($username){
        //nếu trùng trả về true, sai trả về false
        $result = $this->get_list_with_condition('email',$username);
        if($result==null){
            return false;
        }else{
            return true;
        }
    }
    function get_detail_account($id){
        if($this->get_row($id)){
            $this->status = true ; 
            return $this->get_row($id);
        }
    }
    function create_account( $email,$pwd){
        $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
        if($this->check_duplica_username($email)===true){
            die('Username bị trùng');
        }
        $data = array(
            "email"=>$email,
            "password"=>$pwd_hashed
        );
       return $this->insert($data);
    }
    function check_permission_with_id($id){
        $data_permission =$this->get_colum_with_id($id,'permission');
        return $data_permission;
    }
    function check_data_with_email($email){
        $data_permission = $this->get_list_with_condition('email',$email);
        return $data_permission[0];
    }
    function check_pass($email,$password){
        $data_check = $this->get_list_with_condition('email',$email);
        if($data_check==null){
            return false;
        }else{
            if(password_verify($password,$data_check[0]['password'])){
                return true;
            }else{
                return false;
            }
        }
    }
    function edit_info_account($data,$id){
        return $this->update($data,$id);
    }
}

?>