<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
if(isset($_SESSION['ADMIN']['USER_ID'])){
	header('location:dashboard.php');
	//echo "<script>window.location.href='dashbboard.php'</script>";
	//exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8">
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Admin</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">
	    
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
    </head>
    
    <body class="page-membership">
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper">
	    
	    <div class="member-container">
		<div class="app-logo">
		    <a href="#">
			<img src="assets/img/core/logo.png" alt="Quarca Logo">
		    </a>
		</div><!-- app-logo -->
		    
		<div class="member-container-inside">
		    <form>
			<div class="form-group">
			    <input type="text" class="form-control" placeholder="Username" value="admin" id="signInEmailId">
			</div>
			
			<div class="form-group">
			    <input type="password" class="form-control" placeholder="Password" value="password" id="signInPassword">
			</div>
			
			<div class="form-group">
			    <a href="javascript:void(0);" class="btn red-login btn-block" id="signInButton">Login</a>
			</div>
		    </form>
		</div><!-- member-container-inside -->
		
		<p><small>Copyright &copy; 2016 Startrishta.</small></p>
	    </div><!-- member-container -->
	    
	</div><!-- wrapper -->
	
        <!-- REQUIRED SCRIPTS -->
		
	<?php include("include/foot.php"); ?>
	
	<script type="text/javascript">
	//############SIGN IN################################
	$('#signInButton').click(function(){
		signIn();
	});

	$("#signInEmailId , #signInPassword").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
		   signIn();
		}
	});
	function signIn(){
		var email_id=$('#signInEmailId').val();
		var password=$('#signInPassword').val();
		//$("#preloader").show();
		if(email_id==''){
			/*$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter a valid email address');
			$('#alert_modal').modal('show');*/
			alert('Please enter a valid email address');
			$("#signInEmailId").val('');
			//$("#preloader").hide();
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				/*$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Please enter a valid email address');
				$('#alert_modal').modal('show');*/
				alert('Please enter a valid email address');
				$("#signInEmailId").val('');
				$("#signInEmailId").focus();
				//$("#preloader").hide();
				return false;
			}
			if(email_id.length > 100)
			{
				/*$('#error_message_header').html('Alert');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');*/
				alert('Email address length can\'t be greater than 100 characters.');
				$("#signInEmailId").val('');
				$("#signInEmailId").focus();
				//$("#preloader").hide();
				return false;
			}
		}
		if(password==''){
			/*$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter Password.');
			$('#alert_modal').modal('show');
			$("#preloader").hide();*/
			alert('Please enter password.');
			return false;
		}
		
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{signInEmailId:email_id,signInPassword:password , action:'userSignIN'},
			success:function(result){
				//$("#preloader").hide();
				//alert(result);
				if(result == 1){
					window.location.href="dashboard.php";
				}else if(result == 2){
					alert('not verified yet.');
				}else if(result == 3){
					/*$('#error_message_header').html('Alert');
					$('#error_message').html('Incorrect email address or password.');
					$('#alert_modal').modal('show');*/
					alert('Incorrect email address or password.');
				}else if(result == 4){
					$('#error_message_header').html('Alert');
					$('#error_message').html('please enter Email id and password.');
					$('#alert_modal').modal('show');
				}else if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem in network.Please try again.');
					$('#alert_modal').modal('show');
				}
			}
		
		});
	}
	</script>
	

    </body>

<!-- Mirrored from cazylabs.com/themes-demo/quarca/page-login.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:41 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
