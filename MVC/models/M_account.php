<?php


class M_account extends DB{

    function __construct()
    {
        $this->table = 'quanly';
		$this->key_id = 'id';
    }
    function ktrataikhoan(){

    }
    function get_detail_acount($id){
        if($this->get_row($id)){
            $this->status = true ; 
            return $this->get_row($id);
        }
    }
    function create_account(){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd_hashed = password_hash($pwd, PASSWORD_ARGON2ID);
        $data = array(
            "username"=>$username,
            "password"=>$pwd_hashed
        );
        return $this->insert($data);
    }
    function check_pass(){

        $username = $_POST['username'];
        $pwd = $_POST['password'];
       
        $data_check = $this->get_list_with_condition('username',$username);

        if($data_check==null){
            return false;
        }else{
            if(password_verify($pwd,$data_check[0]['password'])){
                return true;
            }else{
                return false;
            }
        }
       
    }
}

?>