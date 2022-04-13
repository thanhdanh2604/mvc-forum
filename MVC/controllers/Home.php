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
        // Gọi model Teaching recording
        // $today_tuition = $this->model_teaching_history->get_revenue_of_the_date(strtotime('today'));
        //Gọi layout và gáng thêm value doanh thu hôm nay và hôm trước @master_layout là lựa chọn master cho trang quảng trị, nếu có layout master khác thì có thể tạo và @page là layout con của trang master đó
        // $this->view('master_layout',[
        //     "tuition_today"=>$today_tuition,
        //     "tuition_yesterday"=>$tuition_yesterday,
        //     "page"=>'ban_tin'
        //     ]);
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