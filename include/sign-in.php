<?php
$loginUrl = FBSIGNUP;
?>
<!-- SIGN UP POPUP -->
<div id="sign-up_popup" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog home_pg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="login_box">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Sign up - it's free!</h4>
				</div>
				<div class="modal-body">
				<!--<div class="fixed-signup-info padding-b30 padding-resp">
						<p class="align-j resp-font-12">Whether you are serious about matrimony, looking for new friends or simply want to explore, everyone is welcome at Startrishta. With thousands joining everyday, it's easy to meet new people.</p>
					</div>-->
					<form class="login-form" method="post" action="">
						<!--<h1 class="align-c padding-b10">Sign up - it's free!</h1>-->
						<div>
							<label><i class="fa fa-envelope"></i></label>
							<input type="text" name="email_id" id="signUpEmailId" placeholder="email address"/>
						</div>
						<div>
							<label><i class="fa fa-lock"></i></label>
							<input type="password" name="password" id="signUpPassword" placeholder="password"/>
						</div>
						<div class="progress stickers" id="progress" style="margin-top:5px;width:80px;display:none;">
							<div class="progress-bar stickers" id="result" role="progressbar" aria-valuenow="70"
								aria-valuemin="0" aria-valuemax="100" style="width:0%">
							</div>
						</div>
						<label class="pull-right" id="result_text"></label>
						<div class="sign_up">
							<input class="login_btn" name="signUp" type="button" value="Done" id="signUpButton"/>
						</div>
						
						<div class="sign_up">
							<a class="fb_login_btn fblogin1" href="javascript:void(0);" id="fbloginapp1">
								<i class="fa fa-facebook-square"></i> Sign up with Facebook
							</a>
						</div>
						
						<div>
							<p class="align-c">By continuing, you're confirming that you've read and agree to our <a href="terms.php">Terms and Conditions</a>, and <a href="privacy-policy.php">Privacy Policy</a>.</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END SIGN UP POPUP -->
<!-- SIGN IN POPUP -->
<div id="myModal" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog home_pg">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="login_box">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Member Login</h4>
				</div>
				<div class="modal-body">
					<form class="login-form" method="post" action="">
						<div>
							<label><i class="fa fa-envelope"></i></label>
							<input type="text" name="signInEmailId"  id="signInEmailId"  placeholder="email address"/>
						</div>
						<div>
							<label><i class="fa fa-lock"></i></label>
							<input type="password" name="signInPassword" id="signInPassword"   placeholder="password"/>
						</div>
						<div>
							<div class="pull-left remm_me">
								<input id="rememberMeCheckbox" type="checkbox" name="rememberMeCheckbox" value="1" checked="checked"><label for="rememberMeCheckbox"><span class="pull-left"></span><p class="pull-left font_s12">Remember Me</p></label>
							</div>
							<span class="pull-right"><a class="reset_form" id="forgot_pass">Forgot Password?</a></span>
						</div>
						<div>
							<input class="login_btn" type="button" id="signInButton" name="signIn" value="Done"/>
						</div>
						<div>
							<a class="fb_login_btn fblogin1" href="javascript:void(0);" id="fbloginapp123">
								<i class="fa fa-facebook-square"></i> Sign in with Facebook
							</a>
						</div>
						<div>
							<p class="align-c">By continuing, you're confirming that you've read and agree to our <a href="terms.php">Terms and Conditions</a>, and <a href="privacy-policy.php">Privacy Policy</a>.</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
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
<!-- it's popup -->

<script type="text/javascript">
$(document).ready(function(){
//For Facebook	
  $('.fblogin').oauthpopup({
		path: 'social/login.php?facebook',
		width:600,
		height:300
   });
   $(".prof_dpdwn").click(function(){
		var prof_dropdown = $(".prof_drop_dwn").css("display");
		if(prof_dropdown == 'none'){
			$(".prof_drop_dwn").css("display","block");
		}
		else{
			$(".prof_drop_dwn").css("display","none");
		}
	});	
	
   /*/#######################################FORGET PASSWORD#######################################	*/
	$('#forgot_pass').click(function(){
		$('#forgetPassModal').modal('show');
		$('#myModal').modal('hide');
	});
	/*/#######################################RESET PASSWORD#######################################*/
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
	/*/#######################################SIGN UP#######################################*/
	$('#signUpButton').on('click' , function(){
		var email_id=$('#signUpEmailId').val();
		var password=$('#signUpPassword').val();
		var ref_uid = '<?php echo $ref_uid;?>';
		$("#preloader").show();
		if(email_id==''){
			$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter a valid email address');
			$('#alert_modal').modal('show');
			$("#preloader").hide();
			//$('#signUpEmailId').focus();
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Please enter a valid email address');
				$('#alert_modal').modal('show');
				$("#signUpEmailId").val('');
				//$("#signUpEmailId").focus();
				$("#preloader").hide();
				return false;
			}
			if(email_id.length > 100)
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');
				//$("#signUpEmailId").focus();
				$("#preloader").hide();
				return false;
			}
		}
		if(password==''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter Password.');
			$('#alert_modal').modal('show');
			//$('#signUpPassword').focus();
			$("#preloader").hide();
			return false;
		}else if(password.length < 8){
			$('#error_message_header').html('Alert');
			$('#error_message').html("Your password is too short, please enter a longer one.");
			$('#alert_modal').modal('show');
			return false;
		}
		
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{signUpEmailId:email_id, signUpPassword:password, ref_uid:ref_uid, action:'userSignUp'},
			success:function(result){
				$("#preloader").hide();
				if(result == 1){
					$('#myModal').modal('hide');
					window.location.href="home.php";
				}else if(result == 2){
					$("#signUpEmailId").val('');
					$("#signUpPassword").val('');
					$('#error_message_header').html('Email address already registered');
					$('#error_message').html('Please use an alternative email address to continue with your registration');
					$('#alert_modal').modal('show');
				}else if(result == 3){
					$("#signUpEmailId").val('');
					//$("#signUpEmailId").focus();
					$('#error_message_header').html('Alert');
					$('#error_message').html('Please enter Email address and password');
					$('#alert_modal').modal('show');
				}else if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem in network.Please try again');
					$('#alert_modal').modal('show');
					$("#signUpEmailId").val('');
					//$("#signUpEmailId").focus();
				}
				$('#progress').hide();
				$("#result_text").hide();
			}
		
		});
	});

	/*$("#fbloginapp123").on('click', function(){
		window.location.href = '<?php //echo $loginUrl;?>';
	});*/

	/*$('#fbloginapp').on('click' , function(){	
		var ref_uid = '<?php // echo $ref_uid;?>';
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{ref_uid:ref_uid, action:'userFBSignUp'},
			success:function(result){
				alert(result);
				$("#preloader").hide();
				if(result == 1){
					$('#myModal').modal('hide');
					window.location.href="home.php";
				}else if(result == 2){
					$("#signUpEmailId").val('');
					$("#signUpPassword").val('');
					$('#error_message_header').html('Email address already registered');
					$('#error_message').html('Please use an alternative email address to continue with your registration');
					$('#alert_modal').modal('show');
				}else if(result == 3){
					$("#signUpEmailId").val('');
					//$("#signUpEmailId").focus();
					$('#error_message_header').html('Alert');
					$('#error_message').html('Please enter Email address and password');
					$('#alert_modal').modal('show');
				}else if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem in network.Please try again');
					$('#alert_modal').modal('show');
					$("#signUpEmailId").val('');
					//$("#signUpEmailId").focus();
				}
				$('#progress').hide();
				$("#result_text").hide();
			}
		
		});
	});*/
	
	/*/##############################PASSWORD STRENGTH##############################################*/
	$('#signUpPassword1').keyup(function(){
		$('#progress').show();
		$("#result_text").show();
		var password = $(this).val();
		var strength = 0
		var color = '';
		var text = '';
		if (password.length > 7) strength += 20;
		if (password.match(/([a-z])/))  strength += 20;
		if (password.match(/([A-Z])/))  strength += 20;
		if (password.match(/([0-9])/))  strength += 20;
		if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))  strength += 20;
		//alert(strength);
		if (password.length < 8){
			color = '#ff0000';
			text = 'Too Short';
		
		}else{
			if(strength > 40 && strength <= 60){
				color = '#ff8c00';
				text = 'Low';
			}
			if(strength > 60 && strength <= 80){
				color = '#32CD32';
				text = 'Average';
			}
			if(strength > 80 && strength <= 100){
				color = '#006400';
				text = 'Good';
			}
		}
		$('#result').css({
			width:strength+'%',
			background:color
		});
		$('#result_text').html(text).css('color' , color);
	});
	
	/*/#######################################SIGN IN#######################################*/
	$('#signInButton').live('click' , function(){
		signIn();
	});

	$("#signInEmailId , #signInPassword").live('keypress' , function(event) {
		if (event.which == 13) {
			event.preventDefault();
		   signIn();
		}
	});

});	
	function signIn(){
		var email_id=$('#signInEmailId').val();
		var password=$('#signInPassword').val();
		var rememberMeCheckbox=$('#rememberMeCheckbox').val();
		var rememberMeCheckbox = $('input[name=rememberMeCheckbox]:checked').val();
		if(typeof rememberMeCheckbox === "undefined"){
				rememberMeCheckbox='0'
		}
		$("#preloader").show();
		if(email_id==''){
			$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter a valid email address');
			$('#alert_modal').modal('show');
			$("#signInEmailId").val('');
			$("#preloader").hide();
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Please enter a valid email address');
				$('#alert_modal').modal('show');
				$("#signInEmailId").val('');
				$("#preloader").hide();
				return false;
			}
			if(email_id.length > 100)
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');
				//$("#signInEmailId").focus();
				$("#preloader").hide();
				return false;
			}
		}
		if(password==''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter Password.');
			$('#alert_modal').modal('show');
			$("#preloader").hide();
			return false;
		}
		
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{signInEmailId:email_id, signInPassword:password, rememberMeCheckbox:rememberMeCheckbox, action:'userSignIN'},
			success:function(result){
				console.log(result);
				$("#preloader").hide();
				if(result == 1){
					window.location.href="home.php";
				}else if(result == 2){
					window.location.href="confirm-email.php";
				}else if(result == 5){
					window.location.href="confirm-email.php";
				}else if(result == 3){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Incorrect email address or password.');
					$('#alert_modal').modal('show');
				}else if(result == 4){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Please enter Email id and password.');
					$('#alert_modal').modal('show');
				}else if(result == 5){
					$('#error_message_header').html('Alert');
					$('#error_message').html('You are not authorized to access startrishta');
					$('#alert_modal').modal('show');
				}else if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem in network.Please try again.');
					$('#alert_modal').modal('show');
				}
				/*Updates by Chitra, 07/06/2017*/
				else if(result == 'suspend'){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Your account has been suspended from Startrishta. To find out more information please <a href="contacts.php">contact us</a>.');
					$('#alert_modal').modal('show');
				}else if(result == 'deleted'){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Your account has been deleted from Startrishta. To find out more information please <a href="contacts.php">contact us</a>.');
					$('#alert_modal').modal('show');
				}else if(result == 'erased'){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Your account has been erased from Startrishta. To find out more information please <a href="contacts.php">contact us</a>.');
					$('#alert_modal').modal('show');
				}
			}
		
		});
	}
</script>
