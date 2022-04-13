     
      <a class="button button-green" href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post"?>">Create New Posts</a>
      <table class="table">
        <h1>List of Posts</h1>
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>User Name</th>
            <th>Public</th>
            <th>Date time</th>
            <th>Tool</th>
          </tr>
        </thead>
        <tbody>

          <?php $stt=1; foreach($data['array_posts'] as $value){?>
           <?php if(isset($_SESSION['email'])){ ?>
                <!--  nếu đã đăng nhâp -->
              <tr>
                <td><?php echo $stt; ?></td>
                <td><a href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/detail_post/".$value['id_post'] ?>"><?php echo $value['title'] ?></a></td>
                <td>
                  <?php foreach($data['array_users'] as $users){
                    if($users['id_user']==$value['id_user']){
                      echo $users['name'];
                    }
                  } ?>
                </td>
                <td>
                  <?php
                  switch ($value['public']) {
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
                </td>
                <td>
                  <?php echo $value['create_date'] ?>
                </td>
                <td>
                  <!-- Kiểm tra chỉ user quyền cao nhất 99 và chính user post bài mới được sửa, xóa -->
                  <?php if($_SESSION['permission']==99||$_SESSION['id_user']==$value['id_user']){ ?>
                  <a class="button button-yellow" href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/edit_post/".$value['id_post'] ?>">Edit</a>
                  <a class="button button-red"  href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/delete_post/".$value['id_post'] ?>">Delete</a>
                  <?php } ?>
                </td>
              </tr>
              <?php }elseif($value['public']==1){ ?>
                <tr>
                <td><?php echo $stt; ?></td>
                <td><a href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/detail_post/".$value['id_post'] ?>"><?php echo $value['title'] ?></a></td>
                <td>
                  <?php foreach($data['array_users'] as $users){
                    if($users['id_user']==$value['id_user']){
                      echo $users['name'];
                    }
                  } ?>
                </td>
                <td>
                  <?php
                  switch ($value['public']) {
                    case 1:
                      echo "Public";
                      break;
                    default:
                      echo "undefined";
                      break;
                  }
                  ?>
                </td>
                <td>
                  <?php echo $value['create_date'] ?>
                </td>
                <td>
                  
                </td>
              </tr>
              <?php } ?>
          <?php $stt++; }  ?>
        </tbody>
      </table>
