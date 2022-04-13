
      <a href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post"?>">Create New Posts</a>
      <table>
        <caption>List of Posts</caption>
        <thead>
          <tr>
            <th>No</th>
            <th>Title</th>
            <th>User post</th>
            <th>Public</th>
            <th>Tool</th>
          </tr>
        </thead>
        <tbody>
          <?php $stt=1; foreach($data['array_posts'] as $value){?>
       
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $value['title'] ?></td>
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
                  <a href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/detail_post/".$value['id_post'] ?>">Detail</a>
                  <a  href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/delete_post/".$value['id_post'] ?>">Delete</a>
                  <a href="<?PHP ECHO $GLOBALS['DEFAUL_DOMAIN']."post/edit_post/".$value['id_post'] ?>">Edit</a>
                </td>
              </tr>
       
          <?php $stt++; }  ?>
        </tbody>
      </table>
