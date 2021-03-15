<?php
class login extends controller
{
    public $account;
    function __construct()
    {
        $this->account = $this->model('M_account');
    }
    function trang_chu(){
        $this->view('login');
    }
    function login_form(){
        $username = $_POST['username'] ;
        $password = $_POST['password'];
        if(isset($_POST['remember'])){
            // Set cookie
            
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
    function logout(){
        session_destroy();
        header("location:../login");
    }
    function create_account(){
        $username = $_POST['username'];
        $pwd = $_POST['password'];
        return $this->account->create_account($username,$pwd);
    }
    function delete_account(){
        // Chưa xây dựng
    }
   
}


?>