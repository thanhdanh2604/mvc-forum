<h1>Detail Post</h1>
<div class="body_detail_post">
  <div class="title_post">
    <?php echo $data["data_post"]['title'] ?>
  </div>
  <div class="info_post">
      
      <ul>
        <li>User:<?php echo $data["data_post"]['id_user'] ?></li>
        <li>Create Date:<?php echo $data["data_post"]['create_date'] ?></li>
        <li>Status:<?php
              switch ($data["data_post"]['public']) {
                case 1:
                  echo "Public";
                  break;
                case 0:
                  echo "Only Member";
                  break;
                default:
                  echo "undefined";
                  break;
              }
              ?>
        </li>
      </ul>
  </div>
  <div class="body_post">
    <?php echo $data["data_post"]['body'] ?>
  </div>
  <hr>
  <div class="comment_session">
    <div class="comment_form">
      <form action="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN'] ?>comment/create_new_comment" method="post">
        <label> Comment to Post</label>
        <input hidden type="text" name="id_post" value="<?php echo $data["data_post"]['id_post'] ?>">
        <input hidden type="text" name="id_user" value="<?php echo (isset($_SESSION["id_user"]))?$_SESSION["id_user"]:0 ?>">
        <div>
          <textarea name="body" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
          <button type="submit" name="submit_comment">Submit comment</button>
        </div>
      </form>

    </div>
    Comment session:
    <ul>
      <?php foreach( $data["data_comments"] as $comments){ ?>
      <li>
        <h3>
          <?php foreach($data['array_users'] as $users){
                    if($users['id_user']== $comments['id_user']){
                      echo $users['name'];
                    }
          } ?>
          <?php
            if($comments['id_user']==0){
              echo "Anonymous";
            }
           ?>    
        </h3>
        <?php echo $comments["body"]; ?>
        <!-- Kiểm tra  -->
        <?php if(isset($_SESSION["id_user"])&&$comments["id_user"]==$_SESSION["id_user"]){
          echo "<a class=\"button button-red\" href=\"".$GLOBALS['DEFAUL_DOMAIN']."comment/delete_comment/".$comments['id_comment']."/".$comments['id_post']."\">Delete your comment</a>";
        } ?>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>