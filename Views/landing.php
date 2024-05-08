<?php 
include_once '../Controllers/UserControllers/UserAuthenticator.php';
$arr_Err=array("nameErr"=>"" , "usernameErr"=>"" , "emailErr"=>"" , "passErr"=>"" );
if(isset($_POST["Register"]))
{
	$arr_Err=UserAuthenticator::registerErr($_POST['name'], $_POST['Rusername'], $_POST['gender'] ,$_POST['email'], $_POST['Rpassword']);
	if(UserAuthenticator::valueAssociativeArr($arr_Err)){
		$Rcheck = UserAuthenticator::register($_POST['name'], $_POST['Rusername'], $_POST['gender'] ,$_POST['email'], $_POST['Rpassword']);
		if($Rcheck == "duplicateusername"){
			echo "this username already taken";
		}elseif($Rcheck == "duplicateemail"){
			echo "you have account in this email";
		}elseif($Rcheck == "success"){
			echo "your account has been successfully created";
		}elseif($Rcheck == "somethingWrong"){
			echo "Error";
		}elseif($Rcheck == "missingError"){
			echo "Error: Missing or invalid input";
		}else{
			print_r($Rcheck);
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="images/fav.png" type="image/png" sizes="16x16"> 
    
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/color.css">
    <link rel="stylesheet" href="css/responsive.css">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Winku</h1>
						<p>
							Winku is free to use for as long as you want with two active projects.
						</p>
						<div class="friend-logo">
							<span><img src="images/wink.png" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
						<form method="post" >
							<div class="form-group">	
							  <input type="text" id="input" required="required" name="username"/>
							  <label class="control-label" for="input">Username</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
							<a href="#" title="" class="forgot-pwd">Forgot Password?</a>
							<?php
							if(isset($_POST['Login']))
							{
								$check=Authenticator::login($_POST['username'],$_POST['password']);
								if($check=="passError"){
									echo "incorrect password";
								}elseif($check=="usernameError"){
									echo "incorrect username";
								}elseif($check=="validError"){
									die('Error: Missing or invalid input');
								}else{
									echo"something wrong";
								}
							}
							?>
							<div class="submit-btns">
								<input  type = "submit" id = "submit" name = "Login" value="Login">
								<!--<button class="mtr-btn signin" type="button"><span>Login</span></button>-->
								<button class="mtr-btn signup" type="button"><span>Register</span></button>
							</div>
						</form>
					</div>
					<div class="log-reg-area reg">
						<h2 class="log-title">Register</h2>
							<p>
								Don’t use Winku Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
							</p>
						<form method="post">
							<div class="form-group">	
							  <input type="text" required="required" name="name"/>
							  <label class="control-label" for="input">First & Last Name</label><i class="mtrl-select"></i>
							  <span><?php echo $arr_Err['nameErr']; ?></span>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name="Rusername"/>
							  <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
							  <span> <?php echo $arr_Err['usernameErr']; ?></span>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="Rpassword"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							  <span> <?php echo $arr_Err['passErr']; ?></span>
							</div>
							<div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" value= "no" checked="checked"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="gender" value= "yes"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div>
							<div class="form-group">	
							  <input type="text" required="required" name = "email"/>
							  <label class="control-label" for="input"><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6c29010d05002c">[email&#160;protected]</a></label><i class="mtrl-select"></i>
								<span> <?php echo $arr_Err['emailErr']; ?></span>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Accept Terms & Conditions ?
							  </label>
							</div>
							<a href="#" title="" class="already-have">Already have an account</a>
							<div class="submit-btns">
								<input  type = "submit" id = "submit" name = "Register" value="Register">
								<!--<button class="mtr-btn signup" type="button"><span>Register</span></button>-->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/main.min.js"></script>
	<script src="js/script.js"></script>

</body>	

</html>