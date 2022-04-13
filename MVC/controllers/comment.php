<?php

class comment extends controller
{
    public $model_users;
    public $model_comments;
    public function __construct(){
      $this->model_comments = $this->model('M_comment');
      $this->model_users = $this->model('M_account');
    }
    function home(){
       
    }
    function create_new_comment(){
      if(isset($_POST['submit_comment'])){
        $data = array(
            'id_post'=>$_POST['id_post'],
            'id_user'=>$_POST['id_user'],
            'body'=>$_POST['body']
        );
        $this->model_comments->insert_comment($data);
      }
      header('location:'.$GLOBALS['DEFAUL_DOMAIN']."/post/detail_post/".$_POST['id_post']);
    }
    function delete_comment($id_comment,$id_post){
      $this->model_comments->remove($id_comment);
      header('location:'.$GLOBALS['DEFAUL_DOMAIN']."/post/detail_post/".$id_post);
    }
}

?>