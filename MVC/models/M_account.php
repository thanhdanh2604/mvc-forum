<?php


class M_account extends DB{

    function __construct()
    {
        $this->table = 'quanly';
		$this->key_id = 'id';
    }
    function check_duplica_username($username){
        //nếu trùng trả về true, sai trả về false
        $result = $this->get_list_with_condition('username',$username);
        if($result==null){
            return false;
        }else{
            return true;
        }
    }
    function get_detail_acount($id){
        if($this->get_row($id)){
            $this->status = true ; 
            return $this->get_row($id);
        }
    }
    function create_account( $username,$pwd){
        $pwd_hashed = password_hash($pwd, PASSWORD_DEFAULT);
        if($this->check_duplica_username($username)===true){
            die('Username bị trùng');
        }
        $data = array(
            "username"=>$username,
            "password"=>$pwd_hashed
        );
       return $this->insert($data);
    }
    function reset_password($username,$password,$new_password){
        // Kiểm tra username và password trước
        if($this->check_pass($username,$password)){
            $this->update(array('password'=>$new_password), $id);
        }else{
            echo "False";
        };
    }
    function check_permission_with_id($id){
        $data_permission =$this->get_colum_with_id($id,'permission');
        return $data_permission;
    }
    function check_permission_with_username($username){
        $data_permission = $this->get_list_with_condition('username',$username);
        return $data_permission[0]['permission'];
    }
    function check_pass($username,$password){
        $data_check = $this->get_list_with_condition('username',$username);
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
}

?>