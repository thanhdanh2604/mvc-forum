<?php
// Kiểm tra quyền
if($_SESSION['permission']!=99){
    session_destroy();
    header('location:'.$GLOBALS['DEFAUL_DOMAIN']);
}
 ?>

<table>
  <h1>All general user</h1>
  <thead>
    <tr>
      <th>No</th>
      <th>Name</th>
      <th>sex</th>
      <th>Email</th>
      <th>Tool</th>
    </tr>
  </thead>

  <tbody>
    <?php $stt=1;foreach($data['data_users'] as $general_users){ ?>
    <tr>
      <td><?php echo $stt; ?></td>
      <td><?php echo $general_users['name']; ?></td>
      <td><?php echo $general_users['sex']; ?></td>
      <td><?php echo $general_users['email']; ?></td>
      <td>
        <a class="button button-blue" href="account/detail_account/<?php echo $general_users['id_user'] ?>">Edit</a>
        <a class="button button-red" href="account/delete_account/<?php echo $general_users['id_user'] ?>">Delete</a>
      </td>
    </tr>
    <?php $stt++; } ?>
  </tbody>
</table>