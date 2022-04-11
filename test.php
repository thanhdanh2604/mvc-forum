

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
      $data = '{"TR\u1ea6N V\u0168 QUANG TH\u1ecaNH":15.5,"\u0110\u1eb6NG PH\u1ea0M LAN ANH":3,"NGUY\u1ec4N TH\u1eca QU\u1ef2NH NH\u01af":4.5,"NGUY\u1ec4N TH\u00c0NH \u0110\u1ea0T":6,"NGUY\u1ec4N H\u1eeeU DUY":10.5,"PHAN V\u00d5 NH\u1eacT VY":10.5,"TR\u00daC H\u1ed2":4.5,"NG\u00d4 V\u00d5 KIM C\u01af\u01a0NG":9,"\u0110O\u00c0N V\u0168 NH\u01af QU\u1ef2NH":6,"SUEN MINH \u0110\u00d4NG":4.5,"\u0110\u00c0O NG\u1eccC PH\u01af\u1ee2NG":3," V\u0168 THU\u00dd MAI UY\u00caN":4.5,"NG\u00d4 MINH TI\u1ebeN":6,"PH\u1ea0M TR\u1ea6N \u0110\u1eaeC TH\u1ea0NH":"1.5","\u0110O\u00c0N H\u1ed2NG MINH T\u00da":"1.5","PH\u1ea0M ANH TU\u1ea4N":"1.5"} ';
      $array_data = (json_decode($data,1));
      echo "Before Sorting — \n";
      foreach($array_data as $person=>$teaching_time) {
          echo $person." Giờ dạy ".$teaching_time."\n";
      }
      arsort($array_data);
      echo "After Sorting  — \n";
      foreach($array_data as $person=>$preference) {
          echo $person." likes ".$preference."</br>";
      }

    ?>
</body>
</html>