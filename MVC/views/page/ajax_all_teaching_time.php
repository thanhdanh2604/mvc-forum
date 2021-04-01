<?php



?>

<table >
    <thead>
         <tr >
            <th>Teacher's name</th>
            <th>Student's name</th>
            <th>Date</th>
            <th>Days</th>
            <th>Fromm</th>
            <th>To</th>
            <th>Công</th>
            <th>Subject</th>
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
              if(!is_array($chi_tiet_buoi->id_student)){
                foreach ($data['student'] as  $name) {
                    if($name['id']==$chi_tiet_buoi->id_student){
                    echo $name['name'];
                    break;
                    }
                }
                }else{// Nếu là lớp nhóm
                foreach ($chi_tiet_buoi->id_student as  $id_student) {
                    foreach ($data['student'] as  $name) {
                    if($name['id']==$id_student){
                        echo $name['name']."</br>";
                        break;
                    }
                    }
                }
               }
             ?>
            </td>
            <td>
              <?php
               if($time != ""){
              echo date('M-d-y',$time);
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
              if(isset($chi_tiet_buoi->hours)){
                if(isset($chi_tiet_buoi->teacher_hours)){
                  echo $chi_tiet_buoi->teacher_hours;
                }else{
                  echo $chi_tiet_buoi->hours ;
                }
              }else{
              echo 0;
              } ?>
            </td>
            <td>
              <?php if(isset($chi_tiet_buoi->id_subject)){
              foreach ($data['subject_name'] as  $name) {
                  if($name['id']==$chi_tiet_buoi->id_subject){
                    echo $name['name'];
                    break;
              } }  }?></td>
          </tr>

       <?php } } }
       } ?>
    
    </tbody>
</table>


