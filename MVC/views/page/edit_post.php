
<h1>Edit Post</h1>
<form action="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>post/action_edit_post" method="post">
  <div class="body_detail_post">
    <div class="title_post">
      <label >Title</label>
      <input name="title" type="text" value="<?php echo $data["data_post"]['title'];?>">
      <input type="text" name="id_user" value="<?php echo $data["data_post"]['id_user'];?>" id="">
    </div>
    <div class="info_post">
      <ul>
          <li>User:<?php echo $data["data_post"]['id_user'] ?></li>
          <li>Create Date:<?php echo $data["data_post"]['create_date'] ?></li>
          <li>Status:
                <label >Public<input value="1" type="radio" name="public" <?php echo ($data["data_post"]['public']==1)?"checked=checked":'' ?> id=""></label>
                <label >Only member<input value="0" type="radio" name="public" <?php echo ($data["data_post"]['public']==0)?"checked=checked":'' ?> id=""></label>
          </li>
      </ul>
    </div>
    <div class="body_post">
      <textarea name="body" id="" cols="30" rows="10"><?php echo $data["data_post"]['body'] ?></textarea>
    </div>
    <button type="submit" name="submit_edit_post">Edit Post</button>
  </div>
</form>