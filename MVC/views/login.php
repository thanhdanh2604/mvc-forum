
<?php 
if(isset($_SESSION['username'])){
  header("location:".$GLOBALS['DEFAUL_DOMAIN']);
}
 ?>

<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | BI - Intertu Education</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once 'block/header-lib.php'; ?>
</head>

<body>

	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>Login to BI Intertu</h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="<?php echo $GLOBALS['DEFAUL_DOMAIN'] ?>login/login_form" method="POST" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="username">Username</label>
                                <input type="text" placeholder="username" title="Please enter you username" required="" value="" name="username" id="username" class="form-control">
                                <span class="help-block small">Your unique username to app</span>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Password</label>
                                <input type="password" title="Please enter your password" placeholder="******" required="" value="" name="password" id="password" class="form-control">
                                <span class="help-block small">Yur strong password</span>
                            </div>
                            <!--<div class="checkbox login-checkbox">
                                <label>
								<input name="remember" type="checkbox" class="i-checks"> Remember me </label>
                                <p class="help-block small">(if this is a private computer)</p>
                            </div>-->
                            <button class="btn btn-success btn-block loginbtn">Login</button>
                            
                        </form>
                    </div>
                </div>
			</div>
		
		</div>   
    </div>
    <?php require_once 'block/footer-js-lib.php'; ?>
</body>

</html>