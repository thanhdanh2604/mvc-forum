<!doctype html>
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BI - Intertu Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/owl.carousel.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/owl.theme.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/calendar/fullcalendar.print.min.css">
    <!-- Chart CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/c3/c3.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/js/vendor/modernizr-2.8.3.min.js"></script>

    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/editor/select2.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/editor/datetimepicker.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/editor/bootstrap-editable.css">
    <link rel="stylesheet" href="<?PHP echo $GLOBALS['DEFAUL_DOMAIN']; ?>public/css/editor/x-editor-style.css">
</head>

<body>

    <!-- Start Left menu area -->
  <?php require_once 'block/left_sidebar.php'; ?>
  <!-- End Left menu area -->
 <?php  require_once 'block/header_bar.php'; ?>
  <div class="all-content-wrapper">
      <?php
      // require page muốn hiển thị trong thư mục /page/, ví dụ là trang bản tin, hay trang tổng hợp teaching history của R&d
        require_once 'page/'.$data['page'].'.php' 
      ?>
  </div>

  <!-- require footerjs  -->
  <?php require_once 'block/footer-js-lib.php'; ?>
   <!-- end footer js -->
</body>

</html>