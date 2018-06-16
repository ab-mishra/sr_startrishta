<?php
require('classes/user_class.php');
$userObj = new User();

if(isset($_SESSION['user_id'])){
	session_destroy();
	setcookie('remember','', time()-864000, '/');// or die('unable to create cookie');

}

$header1 = "";
$header2 = "Securely login below to continue";
$emailPlaceholder = "email address";
$passwordPlaceholder = "password";
$afterLoginUrl = 'home.php';
//echo md5($_REQUEST['email']);
//echo "<pre>";print_r($_SESSION);
//echo "<pre>";print_r($_REQUEST);//die;
if( isset($_REQUEST['action']) && trim($_REQUEST['action']) )
{
	/*print_r($_REQUEST);
	die("if");*/
	switch( trim($_REQUEST['action']) )
	{
		case 'verifySignUp': #Verify email change confirmation
			$header1 = "Your new email address has been registered.";
			$header2 = "Securely login below to continue";
			$emailPlaceholder = "new email address";
			$passwordPlaceholder = "existing password";
			break;
		case 'passwordReset': #Password Reset confirmation
			$header1 = "Congratulations you have successfully reset your password!";
			$header2 = "Securely login below with your new details.";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'addFavourite': #Add to favourite confirmation
			$header1 = "Someone has favourited your profile!";
			$header2 = "Securely login below & get chatting to them";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			$afterLoginUrl = "favorites-main.php";
			break;
		case 'newGift': #Give gift confirmation
			$header1 = "Congratulations you've received a new gift!";
			$header2 = "Securely login below & check it out";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'photoRating': #Photo rating confirmation
			$header1 = "";
			$header2 = "Securely login below to view your latest photo ratings!";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			$afterLoginUrl = "rated-me.php";
			break;
		case 'matchFound': #Match found confirmation
			$header1 = "Congratulations you have a match!";
			$header2 = "Securely login below & get chatting";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'newComment': #Match found confirmation
			$header1 = "Take me to my photo comments!";
			$header2 = "Securely login below to continue";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'profileVisit': #Match found confirmation
			$header1 = "Securely login below to view your newest profile visitors!";
			$header2 = "";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'likeProfile': #Match found confirmation
			$header1 = "Someone on Startrishta likes you!";
			$header2 = "Securely login below to find out who";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'matchProfile': #Match found confirmation
			$header1 = "Congratulations you have a match!";
			$header2 = "Securely login below & get chatting";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'ratePhoto': #Match found confirmation
			$header1 = "Securely login below to view your latest photo ratings!";
			$header2 = "";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			break;
		case 'verifyNewSignUp': #Sign up confirmation
			$header1 = "Thanks for confirming your account!";
			$header2 = "Securely login below to continue";
			$emailPlaceholder = "email address";
			$passwordPlaceholder = "password";
			
			$verifyMail = ( isset($_REQUEST['email']) && trim($_REQUEST['email'])!="" )?$_REQUEST['email']:"";
			$verifyCode = ( isset($_REQUEST['code']) && trim($_REQUEST['code'])!="" )?$_REQUEST['code']:"";
			break;
	}
}
else{
	/*print_r($_REQUEST);
	die("else");*/
	echo "<script>window.location.href='index.php'</script>";
}

#Redirect if session is already set
/*if( isset($_SESSION['user_id']) && trim($_SESSION['user_id'])!="" )
{
		echo "<script>window.location.href='".$afterLoginUrl."'</script>";
}
*/
?>
<!doctype html>
<html>
<head>
	<title>Startrishta</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">

	<?php require("include/script.php"); ?>

</head>

<body>
<div class="main-body">

	<div class="clearfix">
		<div class="nav_scroll">
			<div class="container">
				<header>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="left logo"><a href="logout.php"><img src="images/logo-color.png"/></a></div>
					</div>
				</header>
			</div>
		</div>
		<div class="border_grad"></div>

		<div class="container">
			<div class="main">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-8 col-sm-8 col-xs-12 col-xs-offset-0 col-md-offset-2 col-sm-offset-2">
							<div class="option_mrgn log-wap-cont">
								<div class="static_icon margin-r5 left">
									<img src="images/mail-checked.png"/>
								</div>
								<div class="left login-form cu-login-wap static_cntnt">
									<span class="padding-b10 prs margin-b10"><?php echo $header1; ?></span>
									<p><?php echo $header2; ?></p>
									<div class="margin-t10"><label><i class="fa fa-envelope"></i></label><input type="text" name="signInEmailId"  id="signInEmailId"  placeholder="<?php echo $emailPlaceholder; ?>"/></div>
									<div class="margin-t10"><label><i class="fa fa-lock"></i></label><input type="password" name="signInPassword" id="signInPassword" placeholder="<?php echo $passwordPlaceholder; ?>"/></div>

									<div class="margin-t10">
										<div class="main_btn pull-left margin-r10 l-r-box"><input id="rememberMeCheckbox" type="checkbox" name="rememberMeCheckbox" value="1" checked="checked"><label for="rememberMeCheckbox"><span class="pull-left"></span><p class="pull-left font_s12">Remember Me</p></label></div>
										<div class="pull-right"><span class="pull-right"><a class="reset_form" id="forgot_pass">Forgot Password?</a></span></div>
									</div>
									<div class="margin-t10"><input class="login_btn" type="button" id="signInButton" name="signIn" value="Login"/></div>


									<div class="margin-t10 bot-conwap">By continuing, you are confirming that you've read and agree to our <br /><a href="terms.php" target="_blank">Terms and Conditions</a> and <a href="privacy-policy.php" target="_blank">Privacy Policy</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="forgetPassModal" class="modal fade login_pop" role="dialog" aria-hidden="false">
		<div class="modal-dialog home_pg">
			<!-- Modal content-->
			<div class="modal-content">
				<!---------RESET PASSWORD-------------->
				<div class="">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">×</button>
						<h4 class="modal-title">Reset Your Password</h4>
					</div>
					<div class="modal-body">
						<form class="login-form">
							<div>
								<p class="align-c forget-btxt">We will send a password reset link to your email address, please check it shortly.</p>
							</div>
							<div>
								<input class="forget-input" id="reset_email_id" type="text" placeholder="Type your email address">
							</div>
							<div>
								<input class="login_btn" type="button" id="reset_password" value="Send Reset Link">
							</div>

						</form>
					</div>
				</div>
				<!---------RESET PASSWORD END--------------->
			</div>
		</div>
	</div>
	<!--Footer start here-->
	<?php require("include/footer.php"); ?>
	<!--Footer end here-->
</div>
<script>
	$('#forgot_pass').click(function(){
		$('#forgetPassModal').modal('show');
		$('#myModal').modal('hide');
	});
	$('#reset_password').click(function(){
		var email_id=$('#reset_email_id').val();
		if(email_id==''){
			$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter Email Address');
			$('#alert_modal').modal('show');
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				$('#error_message_header').html('Alert');
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Email Address is not recognized, please try again');
				$('#alert_modal').modal('show');
				$("#reset_email_id").val('');
				$("#reset_email_id").focus();
				return false;
			}
			if(email_id.length > 100)
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');
				$("#reset_email_id").focus();
				return false;
			}
		}
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{reset_email_id:email_id ,action:'resetPasswordMail'},
			success:function(result){
				if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem.please try again.');
					$('#alert_modal').modal('show');
				}else if(result == 2){
					$('#error_message_header').html('Email Address Not Recognised');
					$('#error_message').html('Email Address is not recognized, please try again');
					$('#alert_modal').modal('show');
				}else if(result == 1){
					$('#reset_email_id').val('');
					$('#error_message_header').html('Link Sent');
					$('#error_message').html('Your password reset link has been sent to your email address.');
					$('#alert_button').html('Done');
					$('#forgetPassModal').modal('hide');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
	//#######################################SIGN UP#######################################

	$(function()
	{
		//new signup confirmation
		var confirmCase = '<?php echo trim($_REQUEST['action']); ?>';
		//alert(confirmCase);//return false;
		if( confirmCase=='verifyNewSignUp' )
		{
			var emailToCheck = '<?php echo $verifyMail; ?>';
			var codeToCheck = '<?php echo $verifyCode; ?>';
			$.ajax({
				type: 'POST',
				url: 'ajax/user.php',
				data: { action:'verifySignUp', email:emailToCheck, code:codeToCheck },
				success: function(result){
					//console.log(result);return false;
					$('#error_message_header').html('');
					$('#error_message').html(result);
					$('#alert_modal').modal('show');
				}
			});
		}


		//Sign In
		$('#signInButton').live('click' , function(){ signIn(); });
		$("#signInEmailId , #signInPassword").live('keypress' , function(event) {
			if (event.which == 13)
			{
				event.preventDefault();
				signIn();
			}
		});
	});

	function signIn()
	{
		var email_id = $('#signInEmailId').val();
		var password = $('#signInPassword').val();
		var rememberMeCheckbox = $('#rememberMeCheckbox').val();
		var rememberMeCheckbox = $('input[name=rememberMeCheckbox]:checked').val();
		if(typeof rememberMeCheckbox === "undefined"){
			rememberMeCheckbox='0'
		}

		$("#preloader").show();
		if(email_id=='')
		{
			$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter a valid email address');
			$('#alert_modal').modal('show');
			$("#signInEmailId").val('');
			$("#preloader").hide();
			return false;
		}
		else
		{
			if ( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id)) )
			{
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Please enter a valid email address');
				$('#alert_modal').modal('show');
				$("#signInEmailId").val('');
				$("#preloader").hide();
				return false;
			}
			if(email_id.length > 100)
			{
				$('#error_message_header').html('');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');
				$("#preloader").hide();
				return false;
			}
		}
		if(password=='')
		{
			$('#error_message_header').html('');
			$('#error_message').html('Please enter Password.');
			$('#alert_modal').modal('show');
			$("#preloader").hide();
			return false;
		}

		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{signInEmailId:email_id, signInPassword:password, rememberMeCheckbox:rememberMeCheckbox, action:'userSignIN'},
			success:function(result)
			{
				$("#preloader").hide();
				if(result == 1)
				{
					window.location.href="<?php echo $afterLoginUrl; ?>";
				}
				else if(result == 2)
				{
					window.location.href="confirm-email.php";
				}
				else if(result == 3)
				{
					$('#error_message_header').html('');
					$('#error_message').html('Incorrect email address or password.');
					$('#alert_modal').modal('show');
				}else if(result == 4)
				{
					$('#error_message_header').html('');
					$('#error_message').html('please enter Email id and password.');
					$('#alert_modal').modal('show');
				}else if(result == 5)
				{
					$('#error_message_header').html('');
					$('#error_message').html('You are not authorized to access startrishta');
					$('#alert_modal').modal('show');
				}else if(result == 0)
				{
					$('#error_message_header').html('');
					$('#error_message').html('There is some problem in network.Please try again.');
					$('#alert_modal').modal('show');
				}
			}

		});
	}
</script>
</body>
</html>
<?php
if( isset($_SESSION['user_id']) && trim($_SESSION['user_id'])!="" )
{
	echo "<script>window.location.href='".$afterLoginUrl."'</script>";
}
?>