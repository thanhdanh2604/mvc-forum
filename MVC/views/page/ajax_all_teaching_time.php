

<table >
  
    <thead>
         <tr>
           
            <th>Teacher's name</th>
            <th>Student's name</th>
            <th>Date</th>
            <th>Days</th>
            <th>Fromm</th>
            <th>To</th>
            <th>Công</th>
            <th>Subject</th>
            <th>Giờ học sinh</th>
            <th>Doanh thu</th>
         </tr>
    </thead>
    <tbody>
       <?php foreach ($data['data_teaching'] as $key => $value) {
         $json_buoi_hoc = json_decode($value['teaching_history']) ;
         foreach ($json_buoi_hoc as $value1) { 
          foreach($value1->lich_hoc_du_kien as $buoi_hoc){
            foreach($buoi_hoc as $time=>$chi_tiet_buoi){
              
           ?>
          <tr>
          
            <td>
              <?php
             
                foreach ($data['teacher'] as  $name) {
                  if($name['id_teacher'] ==   $chi_tiet_buoi->id_prof){
                    echo $name['fullname'];
                    break;
                  }
                } ?>
            </td>
            <td>
              <?php
    
               
               if(is_array($chi_tiet_buoi->id_student)){
                foreach ($chi_tiet_buoi->id_student as  $id_student) {
                  foreach ($data['student'] as  $name) {
                  if($name['id']==$id_student){
                      echo $name['name']."</br>";
                      break;
                  }
                  }
                }
               }elseif(isset($chi_tiet_buoi->id_student)){
                  foreach ($data['student'] as  $name) {
                    if($name['id']==$chi_tiet_buoi->id_student){
                    echo $name['name'];
                    break;
                    }
                  }
               }else{
                 print_r($chi_tiet_buoi);
               }
             ?>
            </td>
            <td>
              <?php
               if($time != ""){
              echo date('n/j/y',$time);
            }else{ 
              echo $time;
            } 
           
            ?> 
            </td>
            <td>  <?php  echo date('D',$time) ?></td>

            <td><?php if(isset($chi_tiet_buoi->starttime)){ echo $chi_tiet_buoi->starttime; } ?></td>
            <td><?php if(isset($chi_tiet_buoi->endtime)){ echo $chi_tiet_buoi->endtime; } ?></td>
            <td>
              <?php
                if($chi_tiet_buoi->dd_prof ==1){
                  if(isset($chi_tiet_buoi->teacher_hours)){
                    echo $chi_tiet_buoi->teacher_hours;
                  }elseif(isset($chi_tiet_buoi->hours)){
                    echo $chi_tiet_buoi->hours;
                  }else{
                    echo "Dữ liệu cũ";// Debug dữ liệu cũ xem có lỗi với dữ liệu mới hay không
                  }
                }else{
                  echo "Chưa điểm danh";
                }
                
              ?>
            </td>
            <td>
              <?php if(isset($chi_tiet_buoi->id_subject)){
              foreach ($data['subject_name'] as  $name) {
                  if($name['id']==$chi_tiet_buoi->id_subject){
                    echo $name['name'];
                    break;
              } }  }?>
            </td>
            <td>
              <?php
              if($chi_tiet_buoi->dd_student ==1 && isset($chi_tiet_buoi->hours)){
                  echo $chi_tiet_buoi->hours;
              }else{
                echo 0;
              } ?>
            </td>
            <td>
              <?php 
              if(isset($chi_tiet_buoi->doanh_thu))
              { 
                echo $chi_tiet_buoi->doanh_thu; 
              }else echo 0;  ?>
            </td>
          </tr>

       <?php  } } }
       } ?>
    
    </tbody>
</table>

<!-- Chi tiết chi phí nhân sự-->
<table class="table table-hover">
<caption> Chi phí nhân sự</caption>
  <thead>
    <tr>
      <th>Tháng</th>
      <th>Tiền</th>
    </tr>
  </thead>
  <tbody>

  <?php

  foreach($data['data_staff_cost'] as $key=>$value) { ?>
    <tr>
      <td>Tháng <?php echo $key+1; ?></td>
      <td> <?php echo $value; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>

<!-- Chi tiết chi phí văn phòng-->

<table class="table table-hover">
<caption> Chi phí văn phòng</caption>
  <thead>
    <tr>
      <th>Tháng</th>
      <th>Tiền</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach($data['data_invoice'] as $key=>$value) { ?>
    <tr>
      <td>Tháng <?php echo $key+1; ?></td>
      <td> <?php echo $value; ?></td>
    </tr>
  <?php } ?>
  </tbody>
</table>
