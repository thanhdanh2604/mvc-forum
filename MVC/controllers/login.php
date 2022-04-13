<?php

use ReallySimpleJWT\Token;
use ReallySimpleJWT\Parsed;

class login extends controller
{
    public $account;
    public $teacher;
    private $secret;
    function __construct()
    {
        $this->account = $this->model('M_account');
        $this->secret = 'sec!ReTinterTu423*&';
    }
    function home(){
        $this->view('login');
    }
    function action_login_form(){
        $email = $_POST['email'] ;
        $password = $_POST['password'];
        // Check permission
        if( $this->account->check_pass($email,$password)===true ){
            // Lấy thông tin lưu vào session
            $_SESSION['email'] = $email;
            $data_user = $this->account->check_data_with_email($email);
            $_SESSION['id_user'] = $data_user['id_user'];
            $_SESSION['permission'] = $data_user['permission'];
            header("location:".$GLOBALS['DEFAUL_DOMAIN']);
        }else{
            die("Sai thông tin đăng nhập");
        }
    }
    function logout(){
        session_destroy();
        header("location:../");
      }
   
}


?>