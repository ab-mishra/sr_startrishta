<?php
require('classes/user_class.php');
$userObj=new User();
if(isset($_REQUEST['id'])){
	$email_id=$_REQUEST['id'];
	//$verify_code=$_REQUEST['verify_code'];
	$emailQuery=mysql_query("SELECT * FROM sr_user_login WHERE md5(email_id) = '".$email_id."'");
	//$emailQuery=mysql_query("SELECT * FROM sr_user_login WHERE md5(email_id) = '".$email_id."' AND md5(verify_code) = '".$verify_code."'");
	if(mysql_num_rows($emailQuery) == 0){
		echo "<script>alert('You are not authorized to access this page.')</script>";
		echo "<script>window.location.href='index.php'</script>";
	}
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
									<img src="images/new-password.png"/>
								</div>
								<div class="left static_cntnt">
									<span class="padding-b10 margin-b10">Enter Your New Password</span>
									<div class="np left clearfix">
										<label class="pull-left">New Password</label>
										<input class="pull-left" type="password" id="new_password1" style="padding:2px 5px;font-size: 13px;"/>
										<span class="pull-left" id="show_password1">Show password</span>
									</div>
									<div class="np left clearfix" style="width:260px;">
										
										
										<div class="progress stickers" id="progress" style="margin-top:5px;width:80px;display:none;">
											<div class="progress-bar stickers" id="result" role="progressbar" aria-valuenow="70"
												aria-valuemin="0" aria-valuemax="100" style="width:0%">
											</div>
										</div>
										<label class="pull-right" id="result_text" style="width:90px;display:none;font-weight: bold;"></label>
									</div>
									<div class="np left clearfix">
										<label class="pull-left">Re-enter Password</label>
										<input class="pull-left" type="password" id="new_password2" style="padding:2px 5px; font-size: 13px;"/>
										<span class="pull-left" id="show_password2">Show password</span>
									</div>
									<div class="wp_alert_box left" id="password_message">
										
									</div>
									<div class="margin-t10 left np_sbt">
										<input class="main_btn" type="submit" id="reset_password1" value="Submit" style="width:140px;">
									</div>
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
<script>
$('#password_message').hide();
$('#reset_password1').click(function(){
	$('#preloader').hide();
	$('#password_message').html('');
	$('#password_message').hide();
	var email_id='<?php echo $email_id;?>';
	var new_password1=$('#new_password1').val();
	var new_password2=$('#new_password2').val();
	if(new_password1==''){
		$('#password_message').show();
		$('#password_message').html("<p><a href='javascript:void(0);'>Please enter password.</a></p>");
		$('#new_password1').focus();
		return false;
	}
	if(new_password1.length < 8){
		$('#password_message').show();
		$('#password_message').html("<p><a href='javascript:void(0);'>Your new password is too short, please enter a longer one</a></p>");
		$('#new_password1').focus();
		return false;
	}
	if(new_password2==''){
		$('#password_message').show();
		$('#password_message').html("<p><a href='javascript:void(0);'>Please re enter password.</a></p>");
		$('#new_password2').focus();
		return false;
	}
	if(new_password1 != new_password2){
		$('#new_password2').focus();
		$('#new_password2').val('');
		$('#password_message').show();
		$('#password_message').html("<p><a href='javascript:void(0);'>Your new passwords do not match each other.<br/>Please try again!</a></p>");
		return false;
	}
	$.ajax({
		type:"POST",
		url:"ajax/user.php",
		data:{reset_email_id1:email_id ,new_password:new_password1,action:'changeNewPassword'},
		success:function(result){
			$('#preloader').hide();
			if(result == 0){
				$('#password_message').show();
				$('#password_message').html("<p><a href='javascript:void(0);'>There is some problem.<br />Please try agian!</a></p>");
			}else if(result == 1){
				window.location.href='password-reset.php';
			}
		}
	});
	return false;
});

$('#show_password1').click(function(){
	if($('#new_password1').attr('type') == 'password'){
		document.getElementById('new_password1').setAttribute('type', 'text');
		$(this).html('Hide password');
	}else if($('#new_password1').attr('type') == 'text'){
		document.getElementById('new_password1').setAttribute('type', 'password');
		$(this).html('Show password');
	}
});
$('#show_password2').click(function(){
	if($('#new_password2').attr('type') == 'password'){
		document.getElementById('new_password2').setAttribute('type', 'text');
		$(this).html('Hide password');
	}else if($('#new_password2').attr('type') == 'text'){
		document.getElementById('new_password2').setAttribute('type', 'password');
		$(this).html('Show password');
	}
});

$(document).ready(function()
{
	$('#new_password1').keyup(function(){
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
});
</script>
</body>
</html>