<?php

class post extends controller
{

    public $model_users;
    public $model_posts;
    public function __construct(){
        $this->model_posts = $this->model('M_posts');
        $this->model_users = $this->model('M_account');
    }
    function home(){
        $this->view('master_layout',[
            "page"=>"create_new_post"
        ]);
    }
    function create_new_post(){
      if(isset($_POST['submit_post'])){
        $date=date_create("now");
        $data = array(
            'id_user'=>$_POST['id_user'],
            'title'=>$_POST['title'],
            'body'=>$_POST['body'],
            'public'=>$_POST['public'],
            'create_date'=>date_format($date, "Y/m/d H:i:s")
        );
        $this->model_posts->insert_post($data);
      }
      header('location:'.$GLOBALS['DEFAUL_DOMAIN']);
    }
    function detail_post($id){
      $detail_data = $this->model_posts->get_detail_post($id);
      $this->view('master_layout',[
        "page"=>"detail_post",
        "data_post"=>$detail_data
      ]);
    }
    function edit_post($id){
      $detail_data = $this->model_posts->get_detail_post($id);
      $this->view('master_layout',[
        "page"=>"edit_post",
        "data_post"=>$detail_data
      ]);
    }
    function action_edit_post(){
      if(isset($_POST['submit_edit_post'])){
        $data = array(
            'title'=>$_POST['title'],
            'id_user'=>$_POST['id_user'],
            'body'=>$_POST['body'],
            'public'=>$_POST['public'],
        );
        $this->model_posts->edit_post($data,$_POST['id_user']);
      }
      header('location:'.$GLOBALS['DEFAUL_DOMAIN']);
    }
    function delete_post($id){
      $this->model_posts->delete_post($id);
      header('location:'.$GLOBALS['DEFAUL_DOMAIN']);
    }
}

?>