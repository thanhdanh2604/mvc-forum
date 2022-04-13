<?php
session_start();

$GLOBALS['DEFAUL_DOMAIN'] = 'http://localhost/mvc-forum/';

require_once './MVC/bridge.php';

$myApp= new App();

?>