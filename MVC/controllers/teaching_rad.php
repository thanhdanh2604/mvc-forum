<?php
class teaching_rad extends controller
{
    // Gọi trước model của teaching_history cho hàm khác sử dụng luôn
    public $model_teaching_rd;

    public function __construct(){
        $this->model_teaching_rd = $this->model('M_teaching_history');  
    }
    function trang_chu(){
        
        $this->view('master_layout',[
            "page"=>'teaching_rad'
            ]);
        $DATA = $this->model_teaching_rd->get_detail_teaching_recording(35);
        var_dump($DATA);
    }
  
}

?>