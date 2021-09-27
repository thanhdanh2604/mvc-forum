

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script>
    var aElements = document.links
    for(var i=0;i< aElements.length; ++i){
      aElements[i].onclick = function(e){
        console.log(e.target.href);
        e.preventDefault();
      }
    }
  </script>
</head>
<body>
    <?php
      get_revenue_of_month('02','2021');
    	function get_revenue_of_month($month,$year){
        $current_month = '01-'.$month.'-'.$year;
        $number_of_date = date('t',strtotime($current_month));
        $array_of_date = array();
        for ($i=1; $i <= $number_of_date; $i++) { 
          $array_of_date[]= $i.'-'.$month.'-'.$year;
        }
        
      }
      $month = date('m');
      $year = date('Y');
       $amount_of_month = date('t',strtotime('01-'.$month.'-'.$year));
       date("Y-m-d", strtotime('01-'.$month.'-'.$year));
        date("Y-m-d", strtotime($amount_of_month.'-'.$month.'-'.$year));
       echo date('m-d-Y',1630623600);
       echo date_default_timezone_get();
    ?>
</body>
</html>