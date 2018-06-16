<?php
require('classes/user_class.php');
$userProfileObj=new User();
	if(isset($_SESSION['user_id']))
	{
		echo "<script>window.location.href='home.php'</script>";
	}
$ref_uid='';
if(isset($_GET['id'])){
	$ref_uid=$_GET['id'];
}
$_SESSION['ref_uid']=$ref_uid;
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
	<!-- its sign in and sign up -->
	<?php //include('include/sign-in.php') ;?>
	<!-- <div class="navigation">
		<div class="n_fixed padding-r15">
			<a class="right close-signup slide-left-signup"><i class="fa fa-times"></i></a>
			<div class="fixed-signup-info padding-t30 padding-b30 margin-t50">
				<p class="align-j">Whether you are serious about matrimony, looking for new friends or simply want to explore, everyone is welcome at Startrishta. With thousands joining everyday, it’s easy to meet new people.</p>
			</div>
			<form class="login-form" method="post" action="" onsubmit="return validateSignUp();">
				<h1 class="align-c padding-b10">Sign up - it’s free!</h1>
				<div>
					<label><i class="fa fa-envelope"></i></label>
					<input type="text" name="email_id" id="signUpEmailId" placeholder="email address"/>
				</div>
				<div>
					<label><i class="fa fa-lock"></i></label>
					<input type="password" name="password" id="signUpPassword" placeholder="password"/>
				</div> 
				PASSWORD STRENGTH CHECKER
				<span class="pull-left block">
				<div class="progress stickers signup" id="progress" style="display:none;">
					<div class="progress-bar stickers" id="result" role="progressbar" aria-valuenow="70"
						aria-valuemin="0" aria-valuemax="100" style="width:0%">
					</div>
				</div>
				<label class="pull-left password-qarning" id="result_text"></label>
				</span>
				<div class="sign_up margin-top_20">
					<input class="login_btn" name="signUp" type="button" value="Done" id="signUpButton"/>
				</div>
				
				<div class="sign_up">
					<a class="fb_login_btn fblogin" href="javascript:void(0);">
						<i class="fa fa-facebook-square"></i> Sign up with Facebook
					</a>
				</div>
				
				<div>
					<p class="align-c">By continuing, you're confirming that you've read and agree to our <a href="terms.php">Terms and Conditions</a>, and <a href="privacy-policy.php">Privacy Policy</a>.</p>
				</div>
			</form>
		</div>
	</div> -->
	<section class="main-bg">
		<div class="clearfix">
			<div id="task_flyout" class="nav_scroll">
				<div class="contain  clearfix">
					<?php require("include/header-home2.php"); ?>
				</div>
			</div>
			<div class="contain">
				<div class="mainin">
					<div class="left margin-t100 align-c sign-up-index">
						<h2 class="margin-b50">Whether you're serious about matrimony, Looking for new friend and simply want to explore, everyone is welcome to Startrishta</h2>
						
						<div class="col-lg-10 col-sm-offset-1">
							<h4 class="margin-b10"> With thousand of people joining everyday, It's east to meet new people! </h4>
							<ul class="list-signup clearfix center-block text-center">
								<li>
									<div class="form-group ">
									  	<input type="text" class="form-control" id="usr" placeholder="E-mail address">
									  	<div class="ab-input">
									  		<i class="fa fa-envelope-o" aria-hidden="true"></i>
									  	</div>
									</div>
								</li>
								<li>
									<div class="form-group">
									  <input type="text" class="form-control" id="usr" placeholder="Create a password">
									  	<div class="ab-input">
										  		<i class="fa fa-lock" aria-hidden="true"></i>
										  </div>
									</div>
								</li>
								<li>
									<div class="form-group">
									 	<button type="button" class="btn  btn-block f-bold">SIGN UP FOR FREE</button>
									</div>
								</li>
							</ul>
							<div class="col-sm-4 col-xs-12 pull-right clearfix ">
								<div class="form-group">
								 	<button type="button" class="btn face-btn  btn-block f-bold">Sign up with Facebook</button>
								 	<div class="ab-facebook">
									  	<i class="fa fa-facebook" aria-hidden="true"></i>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
							<div class="col-sm-12">
								<p class="pull-right">By joining, you are agreeing to our <a href="">Terms of service</a> and <a href="#">Privacy Policy.</a> </p>
								<div class="middle-arrow down-arrow margin-t70"><a href="#" id="go-to-toplink" class="go-to-top"><i class="fa fa-chevron-down"></i></a></div>
							</div>
						</div>
						
					</div>
							
					<div class="middle left margin-t300 align-c">
						<!-- <div class="big-caps clearfix">Start something new</div> -->
						<div class="margin-t20 clearfix margin-converter">
							<!-- <a class="big-btn-o slide-left-signup" id="sign-up_popup_btn-1" data-toggle="modal" data-target="#sign-up_popup1">Sign Up For Free</a> -->
						</div>
						
					</div>
							
					<!--<div class="down-arrow"><a href="#" id="go-to-toplink" class="go-to-top"><i class="fa fa-chevron-down"></i></a></div>-->
				</div>
			</div>
		</div>
	</section>
	
	<section class="bgcolor padding-t55 padding-b65 clearfix section-resp">
		<div class="contain resp_contain">
			<div class="full margin-b10" id="go-to-top">
				<div class="big-caps align-c font50 clearfix">Why you'll love Startrishta</div>
			</div>
			<div class="fourth">
				<div class="icons">
					<img src="images/twitter-red.png"/>
				</div>
				
				<h3 class="align-c">Free Messaging </h3>
				<p class="align-c">Chat to other people for free and see how fast you can get their attention.</p>
			</div>
			<div class="fourth">
				<div class="icons">
					<img src="images/icon2.png"/>
				</div>
				
				<h3 class="align-c">Privacy Focused </h3>
				<p class="align-c">We give you maximum control over your interactions. Control what you share and how you share it.</p>
			</div>
			<div class="fourth">
				<div class="icons">
					<img src="images/icon3.png"/>
				</div>
				
				<h3 class="align-c">Search Interests </h3>
				<p class="align-c">Browse unlimited profiles - we make it easy for you to search for users with similar interests and begin a conversation.</p>
			</div>
			<div class="fourth">
				<div class="icons">
					<img src="images/icon4.png"/>
				</div>
				
				<h3 class="align-c">Kismat Connection </h3>
				<p class="align-c">Find out if fate matches you in Kismat Connection - a fun way to express interest and chat with new people.</p>
			</div>
		</div>
	</section>
		<!--FOOTER-->
		<?php require("include/footer.php"); ?>
		
		<!--FOOTER-->
	</div>
	<!--its sign in and sign up-->
	<?php include('include/sign-in.php') ;?>
<script src="https://apis.google.com/js/platform.js"></script>
		<!--Js start here-->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/validation.js"></script>
<script type="text/javascript">		
$(window).scroll(function(){
	if ($(this).scrollTop() > 50) {
		  $('#task_flyout').addClass('fixed');
		  $('.signup').addClass('display-b');

		  //$(".mainin").offset().top-100()'slow');
		  //$("body").offset({top:-100});
	}else {
		  $('#task_flyout').removeClass('fixed');
		   $('.signup').removeClass('display-b');
	}
});
		
$(document).ready(function(){
	$(".signup").click(function() {
		  $("html, body").animate({ scrollTop: 0 }, "slow");
		  return false;
		});
	/*
	$(".reset_form").click(function(){
		$(".reset_box").css("display","block");
		$(".login_box").css("display","none");
	});
	$(".close").click(function(){
		$(".reset_box").css("display","none");
		$(".login_box").css("display","block");
	});

	$(".cls_btn").click(function(){
		$(".reset_box").css("display","none");
		$(".login_box").css("display","none");
		$(".close_box").css("display","block");
	});*/
	//$(".header.in.full").css("width" , "100%");
	//**************
	if(jQuery(window).width() <= 978){
		$(".slide-left-signup").removeClass("right_panel");
		 $("#sign-up_popup_btn, #sign-up_popup_btn-1").attr('data-target','#sign-up_popup');
		//alert("less then 980");
			}
		else{$(".slide-left-signup").addClass("right_panel");}
		
	$(".slide-left-signup.right_panel").click(function(){
		//$(".nav_scroll").toggleClass('nav_scroll-1');
		var ws = parseInt($(window).width());
		var nav = $(".navigation").css("right");
		var body = $(".main-body").css("right");
		var f = $(".nav_scroll").width() / $('.nav_scroll').parent().width() * 100;
		//alert(ws);
		if(nav == '-310px' && body=='0px' || f=='100'){
			$(".navigation").animate({right:'-310px'});
			$(".main-body").animate({right:'310px'});
			if(ws >= 790 && ws <= 810){
				//alert('61');
					$(".nav_scroll").css({"width": "61.2%", "float": "right"});
				}
			else if(ws >= 950 && ws <= 980){$(".nav_scroll").css({"width": "68.2%", "float": "right"});}
			else if(ws >= 1000 && ws <= 1024){$(".nav_scroll").css({"width": "69.6%", "float": "right"});
								$("header.in").css("width","720px");
							}
			else if(ws >= 1140 && ws <= 1170){$(".nav_scroll").css({"width": "73.3%", "float": "right"});
								$("header.in").css("width","850px");
							}
			else if(ws >= 1200 && ws <= 1220){$(".nav_scroll").css({"width": "74.4%", "float": "right"});
								$("header.in").css("width","900px");
							}
			else if(ws >= 1240 && ws <= 1280){$(".nav_scroll").css({"width": "75.6%", "float": "right"});}
			else if(ws >= 1320 && ws <= 1366){$(".nav_scroll").css({"width": "77.1%", "float": "right"});}
			else if(ws >= 1400 && ws <= 1440){$(".nav_scroll").css({"width": "78.3%", "float": "right"});}
			else if(ws >= 1600 && ws <= 1680){$(".nav_scroll").css({"width": "80.4%", "float": "right"});}
			else if(ws >= 1900 && ws <= 1920){
				//alert('83');
					$(".nav_scroll").css({"width": "83.7%", "float": "right"});
			}
			//else if(ws==1280){$("header .in").css("width","970px");}
			//else{$(".nav_scroll").css("width","77%");
			else{
					$(".nav_scroll").css({"width": "77%", "float": "right"});
				 }
			
		}else {
			$(".navigation").animate({right:'-310px'});
			$(".main-body").animate({right:'0px'});
			$(".nav_scroll").css("width","100%");
		}
	});

	$(".slide-left-signup").click(function(){
		var posnav = $(".navigation").css("position");
		if(posnav == 'fixed'){
			$(".navigation").css("position","absolute");
		}
		else{
			$(".navigation").css("position","fixed");
		}
	});		
	
	/*$('#email_id').blur(function(){
		$('#preloader').show();
		var email_id=$('#email_id').val();
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{email_id:email_id ,action:'checkEmailDuplicate'},
			success:function(result){
				$('#preloader').hide();
				if(result == 1){
					$('#email_id').val('');
					$('#error_message').html('Email Id is already registered.');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});*/
});
</script>
<script>
$(function(){
			function goToByScroll(id){
				id = id.replace("link", "");
				$('html,body').animate({
					scrollTop: ($("#"+id).offset().top)-100},
					'slow');
			}
			$(".down-arrow > a").click(function(e) {
				e.preventDefault(); 
				goToByScroll($(this).attr("id"));
			});
			
			//caps is on 
			/*$('#signInPassword').keyup(function(e){
				kc = e.keyCode?e.keyCode:e.which;
				sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
				//var a="10"+2+3;
				//alert(kc);
				alert(kc + '==========' +sk);
				if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk)){
					//document.getElementById('divMayus').style.visibility = 'visible';
					alert('caps');
				}else{
					//document.getElementById('divMayus').style.visibility = 'hidden';
				}
			});*/
});
</script>
</body>
</html>