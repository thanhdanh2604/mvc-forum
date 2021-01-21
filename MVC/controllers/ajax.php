<?php 
class ajax extends controller{
    public $model_invoice;
    function __construct()
    {
        $this->model_invoice = $this->model('M_invoice');
    }
    function ajax_edit_invoice(){
        $value = $_POST['value'];
        $id = $_POST['pk'];
        $colum = $_POST['name'];
        $data = array($colum=>$value);
        $this->model_invoice->edit_invoice($data,$id);
    }
    function ajax_delete_invoice(){
        $id = $_POST['pk'];
        $this->model_invoice->delete_invoice($id);
    }
}

?>