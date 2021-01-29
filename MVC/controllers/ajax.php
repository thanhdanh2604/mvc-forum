<?php 
class ajax extends controller{
    public $model_invoice;
    public $model_staff_cost;
    function __construct()
    {
        $this->model_invoice = $this->model('M_invoice');
        $this->model_staff_cost = $this->model('M_staff_cost');
    }
    function ajax_edit_invoice(){
        $value = $_POST['value'];
        $id = $_POST['pk'];
        $colum = $_POST['name'];
        $data = array($colum=>$value);
        $this->model_invoice->edit_invoice($data,$id);
    }
    function ajax_delete_invoice($id){
        $this->model_invoice->delete_invoice($id);
    }
    function ajax_edit_staff_cost(){
        $value = $_POST['value'];
        $id = $_POST['pk'];
        $colum = $_POST['name'];
        $data = array($colum=>$value);
        $this->model_staff_cost->edit_staff_cost($data,$id);
    }
    function ajax_delete_staff_cost($id){
        $this->model_staff_cost->delete_staff_cost($id);
    }
    
}

?>