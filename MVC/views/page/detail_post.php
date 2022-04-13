<h1>Detail Post</h1>
<div class="body_detail_post">
  <div class="title_post">
    <?php echo $data["data_post"]['title'] ?>
  </div>
  <div class="info_post">
      info post, phần này sẽ để tên user, ngày post, thời gian, permission và status của post
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
    Comment session
    <ul>
      <li></li>
    </ul>
  </div>
</div>