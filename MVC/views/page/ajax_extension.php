

<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Stt</th>
      <th>Student</th>
      <th>Subject</th>
      <th>Date</th>
      <th>Time</th>
    </tr>
  </thead>
  <tbody>
  <?php $stt=1; foreach ($data['data'] as $value) {
    foreach ($value as $time => $chi_tiet) {
    ?>
      <tr>
        <td><?php echo $stt; ?></td>
        <td><?php
           if(!is_array($chi_tiet->id_student)){
             foreach ($data['student'] as  $name) {
               if($name['id']==$chi_tiet->id_student){
                 echo $name['name'];
                 break;
               }
             }
           }else{// Nếu là lớp nhóm
             foreach ($chi_tiet->id_student as  $id_student) {
               foreach ($data['student'] as  $name) {
                 if($name['id']==$id_student){
                   echo $name['name']."</br>";
                   break;
                 }
               }
             }
           }
           ?></td>
        <td><?php 
            foreach ($data['subject_name'] as  $name) {
              if(isset($chi_tiet->id_subject) && $name['id']==$chi_tiet->id_subject){
                echo $name['name'];
                break;
              }
            }  ?></td>
        <td><?php echo date('M-d-Y',$time); ?></td>
        <td>
        <p><?php echo $chi_tiet->starttime; ?></p>
        <p><?php echo $chi_tiet->endtime; ?></p>
      </td>
    </tr>
   <?php } $stt++; } ?>
  </tbody>
</table>
