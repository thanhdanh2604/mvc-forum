        <?php
        
     
       
        ?>
          
    
     
        <div class="container-fluid">
        
        <div class="row">
          
          <div class="col-xs-6 col-sm-6 col-md-8 col-lg-8">
            <div class="white-box">
            <table id="table-class" class="table table-hover table-striped table-bordered">
                <caption style="font-size:2em"> Ngày <?php echo date('d-m-y',strtotime($data['start_date']))." Đến Ngày ".date('d-m-y',strtotime($data['end_date'])) ?></caption>
                  <thead>
                    <tr>
                      <th>Teacher's name</th>
                      <th>Student's name</th>
                      <th>Date</th>
                      <th>Days</th>
                      <th>Form</th>
                      <th>To</th>
                      <th>Total</th>
                      <th style="display:none">Dự kiến</th>
                      <th>OT</th>
                      <th style="display:none">OT Dự kiến</th>
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
                                    <td style="font-weight:bold"><?php  foreach ($data['student'] as  $name) {
                                      if($name['id']==$value->id_student){
                                        echo $name['name'];
                                        break;
                                      }
                                    } ?></td>
                                    <td><?php  echo date('m-d-y',$value->time) ?></td>
                                    <td><?php  echo date('D',$value->time) ?></td>
                                    <td style="color:blue;font-weight:bold"><?php  echo $value->starttime ?></td>
                                    <td><?php  echo $value->endtime ?></td>
                                    <td class="totaltime_<?php echo $value->id_prof; ?>" style="color:red;font-weight:bold">
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
                                    <td style="display:none" class="ct_dk_<?php echo $value->id_prof; ?>">
                                    <?php
                                        if(date('N',$value->time)>=1 && date('N',$value->time)<=5){
                                            if( strtotime($value->starttime)>=strtotime('09:00')&&strtotime($value->endtime)<=strtotime('18:30'))
                                            { 
                                              echo (strtotime($value->endtime)-strtotime($value->starttime))/3600; 
                                            }
                                            //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                            elseif(strtotime($value->starttime)>strtotime('09:00')&&strtotime($value->starttime)<strtotime('18:30')&&strtotime($value->endtime)>=strtotime('18:30')){
                                              echo (strtotime('18:30')-strtotime($value->starttime))/3600;
                                            }
                                              // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                            elseif(strtotime($value->starttime)<strtotime('09:00')&&strtotime($value->endtime)>strtotime('09:00')){
                                              $total = (strtotime('09:00')-strtotime($value->starttime))/3600;
                                              echo (strtotime('09:00')-strtotime($value->starttime))/3600;
                                            }else{ echo 0;}
                                    
                                        }
                                        if(date('N',$value->time)==6 ){
                                            if( strtotime($value->starttime)>=strtotime('08:00')&&strtotime($value->endtime)<=strtotime('12:00'))
                                            { echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;  }
                                            //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                            elseif(strtotime($value->starttime)>strtotime('08:00')&&strtotime($value->starttime)<strtotime('12:00')&&strtotime($value->endtime)>strtotime('12:00')){
                                              echo (strtotime('12:00')-strtotime($value->starttime))/3600;
                                            }
                                            // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                            elseif(strtotime($value->starttime)<strtotime('08:00')&&strtotime($value->endtime)>strtotime('08:00')){
                                              echo (strtotime('08:00')-strtotime($value->starttime))/3600;
                                            }else{ echo 0;}
                                        }
                                        if(date('N',$value->time)==7){
                                          echo 0;
                                        }?>
                                    </td>
                                    <td class="ottime_<?php echo $value->id_prof; ?>" style="color:green;font-weight:bold">
                                      <?php
                                        
                                        if($value->dd_prof==1)
                                        {
                                          if(date('N',$value->time)>=1 && date('N',$value->time)<=5){
                                            //echo tinhgioot($value->starttime,$value->endtime); 
                                          }
                                          if(date('N',$value->time)==6 ){
                                            // Kiểm tra có phải trong giờ hành chính không, nếu trong giờ thì return 0 (hiển thị giờ đúng trong bản total)
                                            if( strtotime($value->starttime)>=strtotime('08:00')&&strtotime($value->endtime)<=strtotime('12:00'))
                                            { echo 0; }
                                            elseif(strtotime($value->starttime)>=strtotime('12:00')&&strtotime($value->endtime)>=strtotime('12:00')||strtotime($value->starttime)<strtotime('08:00')&&strtotime($value->endtime)<=strtotime('08:00')){
                                              echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;
                                            }
                                            //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                            elseif(strtotime($value->starttime)>strtotime('08:00')&&strtotime($value->starttime)<strtotime('12:00')&&strtotime($value->endtime)>strtotime('12:00')){
                                              echo (strtotime($value->endtime)-strtotime('12:00'))/3600;
                                            }
                                            // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                            elseif(strtotime($value->starttime)<strtotime('08:00')&&strtotime($value->endtime)>strtotime('08:00')){
                                              echo (strtotime($value->starttime)-strtotime('08:00'))/3600;
                                            }else{ echo 0;}
                                          }
                                          if(date('N',$value->time)==7 ){
                                            echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;
                                          }
                                        }
                                        else echo 0; 
                                      ?>
                                    </td>
                                    <td class="ot_dk_<?php echo $value->id_prof; ?>" style="display:none">
                                      <?php
                                    
                                        if(date('N',$value->time)>=1 && date('N',$value->time)<=5){
                                          //echo tinhgioot($value->starttime,$value->endtime); 
                                        }elseif(date('N',$value->time)==6 ){
                                          if( strtotime($value->starttime)>=strtotime('08:00')&&strtotime($value->endtime)<=strtotime('12:00')||strtotime($value->starttime)>=strtotime('12:00'))
                                          { echo (strtotime($value->endtime)-strtotime($value->starttime))/3600; }
                                          //Nếu giờ bắt đầu trong khung, giờ kết thúc ngoài khung
                                          elseif(strtotime($value->starttime)>strtotime('08:00')&&strtotime($value->starttime)<strtotime('12:00')&&strtotime($value->endtime)>strtotime('12:00')){
                                            echo (strtotime($value->endtime)-strtotime('12:00'))/3600;
                                          }
                                          // nếu giờ bắt đầu ngoài khung, giờ kết thúc trong khung
                                          elseif(strtotime($value->starttime)<strtotime('08:00')&&strtotime($value->endtime)>strtotime('08:00')){
                                            echo (strtotime($value->starttime)-strtotime('08:00'))/3600;
                                          }else echo 0;
                                        }elseif(date('N',$value->time)==7 ){
                                          echo (strtotime($value->endtime)-strtotime($value->starttime))/3600;
                                        }else echo 0; ?>
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
          </div>
          <div class="white-box col-xs-6 col-sm-6 col-md-4 col-lg-4">
              <caption>Tùy chỉnh thời gian</caption>
                  
                  <div>
                    <div class="form-group">
                      <label>Start date</label>
                      <input type="date" name="start_date" class="form-control" id="start_date" placeholder="Input field">
                    </div>
                  </div>
                  <div>
                    <div class="form-group">
                      <label>End date</label>
                      <input type="date" name="end_date" class="form-control" id="end_date" placeholder="Input field">
                    </div>
                  </div>
                  
                  <button id="confirm_button" type="submit" class="btn btn-primary">Xem</button>
             
          </div>
         
       <script>
        document.getElementById('confirm_button').addEventListener("click",function (){
          start =  document.getElementById('start_date').value;
          end = document.getElementById('end_date').value;
          total = start_date+'/'+end_date;
          window.open('./trang_chu/'+total);
        }
         
        );
        
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