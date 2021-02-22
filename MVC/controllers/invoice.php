<?php

class invoice extends controller {
    public $model_invoice;
    public $model_staff_cost;
    public function __construct()
    {
       $this->model_invoice = $this->model('M_invoice');
      $this->model_staff_cost = $this->model('M_staff_cost');
    }
  
    // chạy hàm mặc định
    public function trang_chu($month=null){
        if($month==null){
            $month = strtotime('this month');
        }
        $data = $this->model_invoice->get_all_invoice();
        $data_sc = $this->model_staff_cost->get_all_staff_cost();
        $this->view('master_layout',[
            "page"=>'invoice_page',
            "month" => $month,
            "data"=>$data,
            "data_sc"=>$data_sc
            ]);
    }
    public function add_staff_cost(){
        $month = date('Y-m-01',strtotime($_POST['month']));
        if(isset($_POST['submit_add_staff_cost'])){
                $data = array(
                    'month'=>$month,
                    'note'=>$_POST['note'], 
                    'cost'=> $_POST['total']
                );
                $this->model_staff_cost->insert_staff_cost($data);
        }
        header('location:../invoice');
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
        header('location:../invoice');
    }
   
}

?>