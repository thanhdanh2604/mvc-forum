<?php

?>
<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report intertu</title>
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/style-report.css">

     <!-- Chart CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/c3/c3.min.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/report-style.css">
  </head>
  <body>
    
    <?php
      // require page muốn hiển thị trong thư mục /page/, 
        require_once 'page/'.$data['page'].'.php' 
    ?>
  
  <!-- jquery
  ============================================ -->
  <script src="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>public/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- c3 JS
  ============================================ -->
  <script src="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>public/js/c3-charts/d3.min.js"></script>
  <script src="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>public/js/c3-charts/c3.min.js"></script>
  <script src="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>public/js/c3-charts/c3-active.js"></script>

  </body>
</html>
