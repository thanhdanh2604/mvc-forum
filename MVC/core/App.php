<?php
//require_once './MVC/bridge.php';
class App
{
    // Gọi Controller và action mặc định
    protected $controller= 'Home';
    protected $action='trang_chu';
    protected $pagram=[];
   
    function __construct()
    {
        $arr = $this->url_process();
        if(file_exists('./MVC/controllers/'.$arr[0].'.php')){
            require_once './MVC/controllers/'.$arr[0].'.php';
            $this->controller = $arr[0];
        }
        require_once './MVC/controllers/'.$this->controller.'.php';// gọi controller mặc định

        //Gọi class controller trong file controller.php để chạy các function trong đó
        // Ví dụ: new Home -> gọi class Home trong controller Home
        $this->controller = new $this->controller;
        unset($arr[0]);

        // Xử lý Action
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action= $arr[1];
            }
            unset($arr[1]);
        }

        //Xử lý Pagram 
        if(isset($arr)){
            $this->pagram = $arr;
        }
    

        //Chạy hàm 
        call_user_func_array([$this->controller,$this->action],$this->pagram);

    }
    function url_process(){
        if( isset($_GET["url"]) ){
            
            return explode("/", filter_var(trim($_GET["url"], "/")));
            
        }
    }
}

?>