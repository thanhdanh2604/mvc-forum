
<?php 
if(isset($_SESSION['username'])){
  header("location:".$GLOBALS['DEFAUL_DOMAIN']);
}
 ?>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | mvc - forum</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'block/header-lib.php'; ?>
</head>

<body>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>login/action_login_form" method="POST" id="loginForm">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text"  required="" value="" name="email" id="username" >
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input type="password" required="" value="" name="password" >
                            </div>
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                        </form>
                    </div>
                </div>
			</div>
</body>

</html>