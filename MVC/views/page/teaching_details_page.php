<?php


?>
  <div class="container-fluid ">
        
        <div class="row">
            
            <div class=" col-xs-8 col-sm-8 col-md-8 col-lg-8 mg-b-15">
      
                <table id="table-class" class=" white-box table table-bordered table-hover mg-b-15">

                <caption style="font-size:2em">Chi tiết Doanh thu & giờ học Ngày <?php echo date('d-M-Y',$data['start_date'])." đến ngày ".date('d-M-Y',$data['end_date']) ?></caption>

                    <thead>
                         <tr >
                          <th>STT</th>
                            <th>Teacher's name</th>
                            <th>Student's name</th>
                            <th>Date</th>
                            <th>Form</th>
                            <th>Hours</th>
                            <th style="display:none">dd_student</th>
                            <th>Doanh thu thuần</th>
                            <th>Subject</th>
                         </tr>
                    </thead>
                    <tbody>
                    <?php   $total_hour = 0;
                    $total_income = 0; ?>
                    <?php $stt=1; 
                    foreach ($data['data_teaching'] as  $value) { 
                        foreach ($value as $time => $detail) {
                         // if($detail->dd_student==1) {  ?>
                        <tr>
                        <td><?php echo $stt; ?></td>
                            <td style="font-weight:bold"><?php
                                      foreach ($data['teacher'] as  $name) {
                                        if($name['id']==$detail->id_prof){
                                          echo $name['name'];
                                          break;
                                        }
                             }  ?></td>
                          <td style="font-weight:bold">
                          <?php

                          if(is_array($detail->id_student)){
                            foreach ($detail->id_student as  $id_student) {
                              foreach ($data['student'] as  $name) {
                              if($name['id']==$id_student){
                                  echo $name['name']." - </br>";
                                  break;
                              }
                              }
                            }
                           }elseif(isset($detail->id_student)){
                              foreach ($data['student'] as  $name) {
                                if($name['id']==$detail->id_student){
                                echo $name['name'];
                                break;
                                }
                              }
                           }else{
                             echo "Dữ liệu lỗi, liên hệ Admin";
                           }

                            ?>
                            </td>
                            <td>
                         <?php  echo date('d-M-y',$time) ?></td>
                            <td style="color:blue;font-weight:bold"><?php echo $detail->starttime ?></td>
                            <td class="hours">
                            <?php

                           
                            if(isset($detail->hours)){
                              // Cộng vào tổng giờ
                                $total_hour+=$detail->hours;
                                echo $detail->hours;
                              }else{
                                echo 0;
                              } 
                              
                              ?>
                            </td>
                            <td style="display:none">
                              <?php print_r($detail->dd_student); ?>
                            </td>
                            <td class="doanh_thu">
                              <?php
                              $total_income+= $detail->doanh_thu;
                              echo $detail->doanh_thu; ?>
                            </td>
                            <td>
                              <?php 
                                foreach ($data['subject_name'] as  $name) {
                                  if($name['id']==$detail->id_subject){
                                    echo $name['name'];
                                    break;
                                  } }
                              ?></td>
                        </tr>
                     <?php // }
                      $stt++;
                     } } ?>
                    </tbody>
                </table>
                
            </div>
            
            <div class="white-box col-xs-4 col-sm-4 col-md-4 col-lg-4">
               <div class="white-box">
                <caption>Tùy chỉnh thời gian</caption>
                  
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
               </div>
              
              <div>
                     
                     <table class="table table-striped table-hover">
                       <thead>
                         <tr>
                           <th>Tổng số giờ</th>
                           <th>Tổng doanh thu thuần</th>
                         </tr>
                       </thead>
                       <tbody>
                        
                         <tr style="color:red;font-size:20px">
                           <td id=""> <?php echo $total_hour;  ?> </td>
                           <td> <?php echo number_format($total_income); ?></td>
                         </tr>
                       </tbody>
                     </table>
                     
              </div>
            </div>
            

        </div>

  </div>
  <script>
    tinh_tong_doanh_thu_va_gio()
    function choose_date(){
          var  start =  document.getElementById('start_date').value;
          var  end = document.getElementById('end_date').value;
          var  total = start+'/'+end+'/';
          window.open("<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>teaching_details/trang_chu/"+total);
        }

  </script>