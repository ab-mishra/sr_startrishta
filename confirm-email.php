<?php
require('classes/user_class.php');
$userObj=new User();
$user_email_id = $_SESSION['user_email'];
$user_id = $_SESSION['user_id'];

$verifiedUser=$userObj->isVerifiedUser($user_id);

if($verifiedUser){
	echo "<script>window.location.href='home.php'</script>";
}

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
	<div id='div_session_write'> </div>
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
						<div class="col-md-6 col-sm-6 col-xs-12 col-xs-offset-0 col-md-offset-3 col-sm-offset-3">
							<div class="option_mrgn left">
								<div class="static_icon margin-r5 left">
									<img src="images/mail-checked.png"/>
								</div>
								<div class="left static_cntnt">
									<span class="padding-b10 prs margin-b10">You need to verify your account</span>
									<p>Please check your email and verify your account to login again.</p>
									<!--<p>-it's for your own good!</p>-->

									<div class="margin-t10 left">
										<div class="main_btn left margin-r10"><a href="logout.php"> I Understand</a> </div>
										<div class="green left"><a href="javascript:void(0);" id="resend_email">Resend email</a><!--<a class="left span">or</a> <a href="">Change address</a>--></div>
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
	</div>
	<script>
		$(function(){
			$('#resend_email').click(function(){
				var user_id ='<?php echo $user_id;?>';
				var user_email_id ='<?php echo $user_email_id;?>';
				
				$.ajax({
					type:"POST",
					url:"ajax/user.php",
					data:{resendMail:user_email_id,user_id:user_id,action:'resendMail'},
					success:function(result){
						//console.log(result);return false;
						$('#confirm_modal').modal('show');
						if(result == 1){
							$('#confirm_modal').modal('show');
						}else{
							$('#error_message_header').html('Alert');
							$('#error_message').html('There is some problem.please try again.');
							$('#alert_modal').modal('show');
						}
					}
				});
			
			});
		});
	</script>
	<div id="confirm_modal" class="modal fade login_pop" role="dialog" style="z-index:10000">
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Email sent successfully</b></h4>
					</div>
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b>A new verification email has been sent, please check it to continue</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="logout.php" class="btn btn-default padding-lr-40 custom red">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>