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
    function create_account($data){
       // $pepper = getConfigVariable("pepper");
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);
        password_hash();
        $this->insert($data);
    }
    
}

?>