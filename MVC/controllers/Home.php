<?php

class Home extends controller
{
    function trang_chu(){
        // Gọi model Teaching recording
        $data_teaching = $this->model('M_teaching_history');
        $teaching_recording = new M_teaching_history();
  
        $today_tuition = $teaching_recording->get_revenue_of_the_date(strtotime('today'));
        $tuition_yesterday = $teaching_recording->get_revenue_of_the_date(strtotime('yesterday'));
        //Gọi layout và gáng thêm value doanh thu hôm nay và hôm trước @master_layout là lựa chọn master cho trang quảng trị, nếu có layout master khác thì có thể tạo và @page là layout con của trang master đó
        $this->view('master_layout',[
            "tuition_today"=>$today_tuition,
            "tuition_yesterday"=>$tuition_yesterday,
            "page"=>'ban_tin'
            ]);
    }
   
}

?>