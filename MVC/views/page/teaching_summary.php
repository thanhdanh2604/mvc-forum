          <script>
            function tinhgiogiaovienrd(id_teacher){
                var teachtime = document.getElementsByClassName('totaltime_'+id_teacher);
                var ottime = document.getElementsByClassName('ottime_'+id_teacher);
                  var i;var temp = 0; var tempot= 0;var j;var k;var m; tempctdk = 0; var tempotdk= 0;
                  for (i = 0; i < teachtime.length; i++) {
                    temp+= parseFloat(teachtime[i].textContent);
                  }
                  for (j = 0; j < ottime.length; j++) {
                    tempot+= parseFloat(ottime[j].textContent);
                  }
                  document.getElementById('totalhours_'+id_teacher).innerHTML = temp;
                  document.getElementById('othours_'+id_teacher).innerHTML = tempot;
            }
            function get_total_rad(){
              var total_teachtime = document.getElementsByClassName('congtt');
              var total_overtime = document.getElementsByClassName('congot');
              var total_hour=0;
              var total_overtime_hours=0;
              for(i=0; i < total_teachtime.length; i++){
                  total_hour+= parseFloat(total_teachtime[i].textContent);
              }
              for(j=0; j < total_overtime.length; j++){
                total_overtime_hours+= parseFloat(total_overtime[j].textContent);
              }
              document.getElementById('total_teaching_time').innerHTML = total_hour;
              document.getElementById('total_overtime').innerHTML = total_overtime_hours;
            } 
          </script>
        <style>
          [role="tabpanel"]{
            margin-top:20px;
          }
        </style>
        <div class="container-fluid">
        
        
        
        <div class="row">
          <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <div class="white-box">
              <div role="tabpanel">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                          <a href="#baocaogioday" aria-controls="baocaogioday" role="tab" data-toggle="tab">Báo cáo giờ dạy</a>
                      </li>
                      <li role="presentation">
                          <a href="#chitietgioday" aria-controls="chitietgioday" role="tab" data-toggle="tab">Chi tiết giờ dạy</a>
                      </li>
                      <li role="presentation">
                          <a href="#giodaygiaovien" aria-controls="giodaygiaovien" role="tab" data-toggle="tab">Lịch dạy giáo viên</a>
                      </li>
                  </ul>
              
                  <!-- Tab panes -->
                  <div class="tab-content">
                      <div role="tabpanel" class="tab-pane " id="chitietgioday">
                        <table id="table-class" class="table table-hover table-striped table-bordered">
                          <caption style="font-size:2em"> Ngày <?php echo date('d-M-Y',strtotime($data['start_date']))." Đến Ngày ".date('d-M-Y',strtotime($data['end_date'])) ?></caption>
                            <thead>
                              <tr>
                                <th>Teacher's name</th>
                                <th>Student's name</th>
                                <th>Date</th>
                                <th>Days</th>
                                <th>Form</th>
                                <th>To</th>
                                <th>Công</th>
                                <th>Công thường</th>
                                <th>OT</th>
                                <th>Subject</th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['rad'] as $key=> $value) {
                                    ?>
                                          <tr>    
                                              <td style="font-weight:bold"><?php
                                              foreach ($data['teacher_rad'] as  $name) {
                                                if($name['id']==$value->id_prof){
                                                  echo $name['name'];
                                                  break;
                                                }
                                              }  ?></td>
                                              <td style="font-weight:bold"><?php
                                              
                                              if(!is_array($value->id_student)){
                                                
                                                foreach ($data['student'] as  $name) {
                                                  if($name['id']==$value->id_student){
                                                    echo $name['name'];
                                                    break;
                                                  }
                                                }
                                              }else{// Nếu là lớp nhóm
                                                foreach ($value->id_student as  $id_student) {
                                                  foreach ($data['student'] as  $name) {
                                                    if($name['id']==$id_student){
                                                      echo $name['name']."</br>";
                                                      break;
                                                    }
                                                  }
                                                }
                                              }
                                              ?></td>
                                              <td><?php  echo date('M-d-y',$value->time) ?></td>
                                              <td><?php  echo date('D',$value->time) ?></td>
                                              <td style="color:blue;font-weight:bold"><?php  echo $value->starttime ?></td>
                                              <td><?php  echo $value->endtime ?></td>
                                              <td class="congtt totaltime_<?php echo $value->id_prof; ?>" style="color:green;font-weight:bold">
                                              
                                              <?php if($value->dd_prof==1){
                                                if(isset($value->teacher_hours)){
                                                  echo $value->teacher_hours;
                                                }else{
                                                  echo $value->hours;
                                                }
                                              }else{
                                                echo 0;
                                              }  ?></td>
                                              <td  style="color:red;font-weight:bold">
                                                  <?php
                                                  if(date('N',$value->time)>=1 && date('N',$value->time)<=5){
                                                      if( strtotime($value->starttime)>=strtotime('09:00')&&strtotime($value->endtime)<=strtotime('18:30')&& $value->dd_prof==1)
                                                      { echo (strtotime($value->endtime)-strtotime($value->starttime))/3600; }
                                                      //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                                      elseif(strtotime($value->starttime)>strtotime('09:00')&&strtotime($value->starttime)<strtotime('18:30')&&strtotime($value->endtime)>=strtotime('18:30')&& $value->dd_prof==1){
                                                        echo (strtotime('18:30')-strtotime($value->starttime))/3600;
                                                      }
                                                        // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                                      elseif(strtotime($value->starttime)<strtotime('09:00')&&strtotime($value->endtime)>strtotime('09:00')&& $value->dd_prof==1){
                                                        $total = (strtotime('09:00')-strtotime($value->starttime))/3600;
                                                        echo (strtotime('09:00')-strtotime($value->starttime))/3600;
                                                      }
                                                      else{
                                                        echo 0;
                                                      }
                                                  }
                                                  if(date('N',$value->time)==6 ){
                                                      if( strtotime($value->starttime)>=strtotime('08:00')&&strtotime($value->endtime)<=strtotime('12:00')&& $value->dd_prof==1)
                                                      { echo (strtotime($value->endtime)-strtotime($value->starttime))/3600; }
                                                      //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                                      elseif(strtotime($value->starttime)>strtotime('08:00')&&strtotime($value->starttime)<strtotime('12:00')&&strtotime($value->endtime)>strtotime('12:00')&& $value->dd_prof==1){
                                                        echo (strtotime('12:00')-strtotime($value->starttime))/3600;
                                                      }
                                                      // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                                      elseif(strtotime($value->starttime)<strtotime('08:00')&&strtotime($value->endtime)>strtotime('08:00')&& $value->dd_prof==1){
                                                        echo (strtotime('08:00')-strtotime($value->starttime))/3600;
                                                      }else{ echo 0;}
                                                  }
                                                  if(date('N',$value->time)==7){
                                                    echo 0;
                                                  }
                                                  ?>
                                              </td>

                                              <td class="congot ottime_<?php echo $value->id_prof; ?>" >
                                                <?php
                                                  
                                                  if($value->dd_prof==1)
                                                  {
                                                    if(date('N',$value->time)>=1 && date('N',$value->time)<=5){
                                                        if( strtotime($value->starttime)>=strtotime('09:00')&&strtotime($value->endtime)<=strtotime('18:30')){
                                                          echo 0;
                                                      }else{
                                                          // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                                          if(strtotime($value->starttime)<strtotime('09:00')&&strtotime($value->endtime)>strtotime('09:00')){
                                                            $total = (strtotime('09:00')-strtotime($value->starttime))/3600;
                                                              echo $total;
                                                          }
                                                          //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                                          if(strtotime($value->starttime)>strtotime('09:00')&&strtotime($value->starttime)<strtotime('18:30')&&strtotime($value->endtime)>=strtotime('18:30')){
                                                              $total = (strtotime($value->endtime)-strtotime('18:30'))/3600;
                                                              echo $total;
                                                            }
                                                            //Nếu giờ bắt đầu và kết thúc đều ngoài khung
                                                          if((strtotime($value->starttime)<=strtotime('09:00')&&strtotime($value->endtime)<=strtotime('09:00'))||(strtotime($value->starttime)>=strtotime('18:30')&&strtotime($value->endtime)>=strtotime('18:30'))){
                                                              $total = strtotime($value->endtime)-strtotime($value->starttime);
                                                              echo $total/3600;
                                                            }
                                                      }
                                                    }elseif(date('N',$value->time)==6 ){
                                                      // Kiểm tra có phải trong giờ hành chính không, nếu trong giờ thì return 0 (hiển thị giờ đúng trong bản total)
                                                      if( strtotime($value->starttime)>=strtotime('08:00')&&strtotime($value->endtime)<=strtotime('12:00'))
                                                      { echo 0; }
                                                      else{
                                                        echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;
                                                      }
                                                    }
                                                    if(date('N',$value->time)==7 ){
                                                      echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;
                                                    }
                                                  }else echo 0; 
                                                ?>
                                              </td>
                                            
                                              <td><?php 
                                              foreach ($data['subject_name'] as  $name) {
                                                if($name['id']==$value->id_subject){
                                                  echo $name['name'];
                                                  break;
                                                }
                                              }  ?></td>
                                            </tr>
                                  <?php }  ?>
                            </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane active" id="baocaogioday">
                        <table class="table table-bordered table-hover">
                          
                          <caption style="font-size:2em"> Từ <?php echo date('d-M-Y',strtotime($data['start_date']))." -> ".date('d-M-Y',strtotime($data['end_date'])) ?></caption>
                          
                          <div class="alert alert-info">
                          
                            <strong>Note!</strong> Chỉ những giáo viên có giờ dạy mới hiển thị
                          </div>
                          
                          <thead>
                            <tr>
                              <th>Tên</th>
                              <th>Giờ dạy</th>
                            </tr>
                          </thead>
                          <tbody>              
                            <?php
                            $totalTeaching = 0;
                            foreach ($data['teaching_time'] as  $name=>$hours) { ?>
                              <tr>
                                <td><?php echo $name ?></td>
                                <td style="color:red;font-weight:bold"><?php echo $hours; $totalTeaching+=$hours; ?></td>
                              
                              </tr>
                            <?php } ?>
                            <tfoot style="font-weight:bold;font-size:2em">
                            <tr>
                                <td> Tổng </td>
                                <td ><?php echo $totalTeaching; ?> Giờ</td>
                              </tr>
                            </tfoot>
                              
                          
                          </tbody>
                        </table>
                      </div>
                      <div role="tabpanel" class="tab-pane" id="giodaygiaovien">
                          <div id="teaching_calendar">
                          </div>
                          <div class="result">
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
              <div class="white-box">
                  <caption>Tùy chỉnh thời gian</caption>
                  <form action="">
                    <div>
                      <div class="form-group">
                        <label>Start date</label>
                        <input type="date" class="form-control" id="start_date" placeholder="Input field">
                      </div>
                    </div>
                    <div>
                      <div class="form-group">
                        <label>End date</label>
                        <input type="date" class="form-control" id="end_date" placeholder="Input field">
                      </div>
                    </div>
                    
                    <button onclick="choose_date()" id="confirm_button" class="btn btn-primary">Xem</button>
                  </form>
              </div>
             
          </div>
              
       <script> 
  
        function choose_date(){
          var  start =  document.getElementById('start_date').value;
          var  end = document.getElementById('end_date').value;
          var  total = start+'/'+end+'/';
          window.open("<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>teaching_summary/trang_chu/"+total);
        }
        
       </script>
          
        </div>
      
    
        <div class="footer-copyright-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        