<?php
require('classes/profile_class.php');
$userProfileObj=new Profile();
	if(isset($_SESSION['user_id']))
	{
	echo "<script>window.location.href='home.php'</script>";
	}
 ?>
<!doctype html>
<html>
<head>
	<title>Startrishta</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
<?php require("include/login-script.php"); ?>
	
</head>

<body>
	<div class="main-body">
	<div class="clearfix">
		<div class="nav_scroll">
			<div class="container">
				<header>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="left logo"><img src="images/logo-color.png"/></div>
					</div>
				</header>
			</div>
		</div>
		<div class="border_grad"></div>
		
		<div class="container">
			<div class="main">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-xs-12 col-xs-offset-0 col-md-offset-3 col-sm-offset-3">
							<div class="option_mrgn left">
								<div class="static_icon margin-r5 left">
									<img src="images/new-password-green.png"/>
								</div>
								<div class="left static_cntnt">
									<span class="padding-b10 margin-b10">
										Congratulations you have successfully reset your password! <span>Securely login below with your new details.</span>
									</span>
									<form class="login-form reset" method="post">
										<div>
											<label><i class="fa fa-envelope"></i></label>
											<input type="text" placeholder="email address" id="signInEmailId"/>
										</div>
										<div>
											<label><i class="fa fa-lock"></i></label>
											<input type="password" placeholder="password" id="signInPassword"/>
										</div>
										
										<div class="clearfix">
											<div class="pull-left remm_me">
												<input id="checkbox1" type="checkbox" name="checkbox" value="1" checked="checked"><label for="checkbox1"><span class="pull-left"></span><p class="pull-left font_s12">Remember Me</p></label>
											</div>
											<span class="pull-right"><a class="reset_form" data-toggle="modal" data-target="#forgetPassModal">Forgot Password?</a></span>
										</div>
										<div class="btn_div">
											<input class="button1" type="button" value="Login" id="signInButton1">
										</div>
										<div class="pass_reset_div" id="error_msg" style="color:red;font-size:13px;text-align: center;"></div>
										<div class="clearfix">
											<p class="align-c" style="float:left;">By continuing, you're confirming that you've read and agree to our <a href="terms.php">Terms and Conditions</a>, and <a href="privacy-policy.php">Privacy Policy</a>.</p>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!--Footer start here-->
		<?php require("include/footer.php"); ?>
	<!--Footer end here-->
	</div>
<div id="forgetPassModal" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog home_pg">
		<!-- Modal content-->
		<div class="modal-content">
		<!---------RESET PASSWORD-------------->
			<div class="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Reset Your Password</h4>
				</div>
				<div class="modal-body">
					<form class="login-form">
						<div>
							<p class="align-c forget-btxt">We will send a password reset link to your email address, please check it shortly.</p>
						</div>
						<div>
							<input class="forget-input" id="reset_email_id" type="text" placeholder="Type your email address"/>
						</div>
						<div>
							<input class="login_btn" type="button" id="reset_password" value="Send Reset Link"/>
						</div>
						
					</form>
				</div>
			</div>
			<!---------RESET PASSWORD END--------------->
		</div>
	</div>
</div>
<script>
$('#signInButton1').live('click' , function(){
	var email_id=$('#signInEmailId').val();
	var password=$('#signInPassword').val();
	$("#preloader").show();
	if(email_id==''){
		$('#error_msg').html('Email address not recognised, please try again');
		$("#signInEmailId").val('');
		$("#preloader").hide();
		return false;
	}else {
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
			$('#error_msg').html('Email address not recognised, please try again');
			$("#signInEmailId").val('');
			$("#preloader").hide();
			return false;
		}
		if(email_id.length > 100)
		{
			$('#error_msg').html('Email address length can\'t be greater than 100 characters.');
			$("#preloader").hide();
			return false;
		}
	}
	if(password==''){
		$('#error_msg').html('Please enter Password.');
		$("#preloader").hide();
		return false;
	}
	
	$.ajax({
		type:"POST",
		url:"ajax/user.php",
		data:{signInEmailId:email_id,signInPassword:password , action:'userSignIN'},
		success:function(result){
			$("#preloader").hide();
			if(result == 1){
				window.location.href="home.php";
			}else if(result == 2){
				window.location.href="confirm-email.php";
			}else if(result == 3){
				$('#error_msg').html('Incorrect email address or password.');
			}else if(result == 4){
				$('#error_msg').html('Please enter Email id and password.');
			}else if(result == 0){
				$('#error_msg').html('There is some problem in network, Please try again.');
			}
		}
	
	});
});
</script>
</script>
</body>
</html>