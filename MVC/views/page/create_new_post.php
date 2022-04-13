<form action="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>post/create_new_post" method="post">
  <div>
    <label >Title</label>
    <input required type="text" name="title" id="">
  </div>
  <div>
    <label >Body</label>
    <textarea name="body" id="" cols="30" rows="10"></textarea>
  </div>
  <div>
    <label >Public</label>
    <input type="radio" name="public" value="1" id="">
    <label >Only member</label>
    <input type="radio" name="public" value="0" id="">
  </div>
  <div>
    <input type="hidden" name="id_user" value="<?php echo isset($_SESSION['id_user'])?$_SESSION['id_user']:null ?>">
  </div>
  <div>
      <button class="button button-blue" type="submit" name="submit_post">Submit post</button>
  </div>
  
  <!-- <label> User</label>
  <input type="text" name="id_user" id=""> -->
</form>