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
        $this->teacher = $this->model('M_teacher');
        $this->secret = 'sec!ReTinterTu423*&';
    }
    function trang_chu(){
        $this->view('login');
    }
    function login_form(){
        $username = $_POST['username'] ;
        $password = $_POST['password'];
        if(isset($_POST['remember'])){
            //! Set cookie mình làm biếng quá chưa làm
        }
        // Check permission
        if( $this->account->check_pass($username,$password)===true ){
            // Lấy username và permission lưu vào session
            $_SESSION['username'] = $username;
            $permission = $this->account->check_permission_with_username($username);
            $_SESSION['permission'] = $permission;
            header("location:../");
        }else{
            die("Sai thông tin đăng nhập");
        }
    }
    function login_teacher(){
        $teacher_name = $_POST['username'];
        $teacher_pass = $_POST['password'];
        $result_check_pass = $this->teacher->chess_pass_teacher($teacher_name,$teacher_pass);
        if($result_check_pass===false){
            echo json_encode(array("status"=>false,"message"=>'Wrong Username or Password'));
        }elseif($result_check_pass['success']===true){
            //*Tạo Token nè
            $userId = $result_check_pass['id'];
         
            $expiration = time() + 100;/* Thời gian hết hạn, dạng strtotime */
            $issuer = 'localhost';
            $token = Token::create($userId, $this->secret, $expiration, $issuer);
            echo json_encode(array("status"=>true,"token"=>$token)) ;
        }
    }
    /* Return dạng {"status":true,"id_user":12} */
    function check_token_val(){
        $token = $_POST['token'];
        $status=  Token::validate($token,$this->secret);
        $payload = Token::getPayload($token,$this->secret);
        echo json_encode(array("status"=>$status,"id_user"=>$payload['user_id']));
    }
    function logout(){
        session_destroy();
        header("location:../login");
    }
    function create_account(){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        return $this->account->create_account($username,$pwd);
    }
    function delete_account($id){
        return $this->account->delete_account($id);
    }
   
}


?>