<?php

class Home extends controller
{
    // public $model_invoice;
    // public function __construct()
    // {
    //    $this->model_invoice = $this->model('M_invoice');
    // }
    public $model_users;
    public $model_posts;
    public function __construct(){
        $this->model_posts = $this->model('M_posts');
        $this->model_users = $this->model('M_account');
    }
    function home(){
        
        $arrayAllUser = $this->model_users->get_all_users();
        $arrayPosts = $this->model_posts->get_all_posts();
        $this->view('master_layout',[
            "array_users"=>$arrayAllUser,
            "array_posts"=>$arrayPosts,
            "page"=>"trang_chu"
        ]);
    }
    public function create_simple_account($email, $password){
        $this->model_users->create_account( $email,$password);
    }
}

?>