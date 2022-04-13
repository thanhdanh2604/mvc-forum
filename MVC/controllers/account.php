<?php

class account extends controller
{
    public $model_accounts;
    public function __construct(){
        $this->model_accounts = $this->model('M_account');
    }
    function home(){
       
    }

    function create_account(){
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        return $this->model_accounts->create_account($email,$pwd);
    }
    function update_info_account(){
        $pwd_hashed = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $data = array(
          'id_user'=>$_POST['id_user'],
          'email'=>$_POST['email'],
          'password'=>$pwd_hashed,
          'name'=>$_POST['name'],
          'sex'=>$_POST['sex']
        );
        $this->model_accounts->edit_info_account($data,$_POST['id_user']);
    }
    function delete_account($id){
        return $this->model_accounts->delete_account($id);
    }
    function detail_account($id){
      $detail_data = $this->model_accounts->get_detail_account($id);
      $this->view('master_layout',[
        "page"=>"detail_account",
        "data_account"=>$detail_data
      ]);
    }
}

?>