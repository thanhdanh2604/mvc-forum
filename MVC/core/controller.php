<?php

class controller 
{
    function model($model){
        require_once './MVC/models/'.$model.'.php';
        return new $model;
    }
    function view($view,$data = []){
        // Biến $data là mảng bao gồm các tham số truyền vào view 
        require_once './MVC/views/'.$view.'.php';
    } 
}

?>
