<?php
// kiểm tra quyền và id user
 if($_SESSION['permission']==1&&$_SESSION['id_user']!=$data["data_account"]['id_user']){
    header("location:".$GLOBALS['DEFAUL_DOMAIN']);
    session_destroy();
 }
?>
<h1>Detail account infomation</h1>
<form action="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>account/update_info_account" method="post">
  <input type="text" name="id_user" id="" hidden value="<?php echo $data["data_account"]['id_user'] ?>">
  <div class="info">
    <label >Name</label>
    <input type="text" name="name" id="" value="<?php echo $data["data_account"]['name'] ?>">
  </div>
  <div class="info">
    <label >Sex</label>
    <label> Male</label>
    <input type="radio" name="sex" value="1" id="" <?php echo ($data["data_account"]['sex']==1)?"checked=checked":'' ?>>
    <label> Female</label>
    <input type="radio" name="sex" value="2" id="" <?php echo ($data["data_account"]['sex']==2)?"checked=checked":'' ?>>
  </div>
  <div class="info">
    <label >Email</label>
    <input type="email" name="email" id="" value="<?php echo $data["data_account"]['email'] ?>">
  </div>
  <div class="info">
    <label >Password</label>
    <input type="Password" name="password" id="" value="">
  </div>
  <div>
    <button type="submit">Edit infomation</button>
  </div>
</form>