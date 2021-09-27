
<html class="no-js" lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>BI - Intertu Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'block/header-lib.php'; ?>
</head>

<body>
  <?php require_once 'block/require_login.php'; ?>
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