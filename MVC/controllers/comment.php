<?php

class comment extends controller
{
    public $model_users;
    public $model_comments;
    public function __construct(){
        $this->model_comments = $this->model('M_comments');
        $this->model_users = $this->model('M_account');
    }
    function home(){
       
    }
    function create_new_comment(){

    }
    function delete_comment($id){

    }
}

?>