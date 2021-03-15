
<table >
                 
<thead>
  <tr>
    <th>Teacher's name</th>
    <th>Student's name</th>
    <th>Date</th>
    <th>Days</th>
    <th>Form</th>
    <th>To</th>
    <th>Công</th>
    <th>Subject</th>
  </tr>
</thead>
<tbody>
     <?php   ?>
    <?php foreach ($data['data_teaching'] as $record) {
          foreach ($record as $key => $value) {
       ?>
        <tr>    
            <td><?php
                foreach ($data['teacher_rad'] as  $name) {
                  if($name['id']==$value->id_prof){
                    echo $name['name'];
                    break;
                  }
            }  ?></td>

            <td ><?php
           
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
            <td>
              <?php  echo date('m-d-y',$key) ?>
            </td>
            <td>
              <?php  echo date('D',$key) ?>
            </td>
            <td>
            <?php if(isset($value->starttime)){
               echo $value->starttime;
            }
              
              ?>
            
            </td>
            <td><?php if(isset($value->endtime)){
               echo $value->endtime;
            }   ?></td>
            <td>
            
            <?php if($value->dd_prof==1){
              if(isset($value->teacher_hours)){
                echo $value->teacher_hours;
              }elseif(isset($value->hours)){
                echo $value->hours;
              }
            }else{
              echo 0;
            }  ?>
            
            </td>

            <td><?php 
            foreach ($data['subject_name'] as  $name) {
              if(isset($value->id_subject) && $name['id']==$value->id_subject){
                echo $name['name'];
                break;
              }
            }  ?></td>
          </tr>
            <?php } } ?>
      </tbody>
</table>