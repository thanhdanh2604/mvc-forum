<?php

class invoice extends controller {
    public $model_invoice;

    public function __construct()
    {
       $this->model_invoice = $this->model('M_invoice');
       
    }
    // chạy hàm mặc định
    public function trang_chu(){
        $data = $this->model_invoice->get_all_invoice();
        $this->view('master_layout',[
            "page"=>'invoice',
            "data"=>$data
            ]);
           
    }
    public function add_invoice(){
        if(isset($_POST['submit_add_invoice'])){
            $data = array(
                'code_bill'=>$_POST['ma_hoa_don'],
                'info'=>$_POST['noi_dung'],
                'date'=>$_POST['date'],
                'bill'=> $_POST['bill'],
                'vat'=> $_POST['bill_vat']
            );
            $this->model_invoice->insert_invoice($data);
        }
     
        header('location:./invoice/');
       // $this->view('master_layout',["page"=>'invoice']);
    }
}

?>