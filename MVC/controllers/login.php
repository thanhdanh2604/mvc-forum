<?php
class login extends controller
{
    public $account;
    function __construct()
    {
        $this->account = $this->model('M_account');
    }
    function trang_chu(){
       echo $this->account->check_pass();
        //$this->account->create_account();
    }
}


?>