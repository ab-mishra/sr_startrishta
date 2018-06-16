<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
if(!empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Unsubscribed VIP Membership</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php require("include/login-script.php"); ?>
</head>
<body>
	<div class="main-body">
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
		<!-- Vip Cntainer--------------->
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row margin-b40">
					
						<div class="col-lg-8 col-md-8 col-sm-7 col-xs-12 margin-t50">
							<div class="disc-small">
								<img src="images/vip-big-gray.png" width=" " height=" " alt="VIP"/> 
							</div>
							<div class="disc-big">
								<h3 class="margin-t10 vip-header lato"><b>You have unsubscribed from VIP membership </b></h3>
								<h5 class="margin-t10 lato gray_1"><b>Your current subscription will expire on 9/12/2015</b></h5>
							</div>
						
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-l80">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-b20 ">
										<hr />
										<h5 class="margin-t10 lato gray_1 margin-b30" style="line-height:25px;"><b>Unsubscribed by mistake? You can re-subscribe again to meet new people faster and enjoy the very best of Startrishta</b></h5>
										<p class="align-c">
											<button class="btn btn-danger bold" data-target="#vip_payment_28012016" data-toggle="modal" type="button" style="padding:10px; font-size:18px; width:290px;"> Subscribe to VIP Membership </button> 
										
											 &nbsp; <b>Or </b> &nbsp; <a href="" class="underline-link">Continue</a>
											 
										</p>
									</div>
								</div>
							</div>
						</div>	
						
						<div class="col-lg-4 col-md-4 col-sm-5 col-xs-12 margin-b20 new-vip unsub-vip">
							<div class="vip-right-box-1 vip-box-unsubscribed">
								<br>
								<h4 class="dark-blue"><b>VIP Member Benefits </b> </h4>
								<ul class="margin-t15">
									<li>
										<a href="javascript:void(0)"><img src="images/icon-8.png" width=" " height=" " alt="message" /> &nbsp; Message Boost &nbsp;<i class="fa fa-caret-right"></i> </span></a>
										<ul class="benefits_details">
											<li>Get a conversation started quicker by having all you messages read first</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-7.png" width=" " height=" " alt="like" />  &nbsp; See who likes you &nbsp;<i class="fa fa-caret-right"></i></span> </a>
										<ul class="benefits_details">
											<li>Check out who likes you on Kismat Connection and message them straight away</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-6.png" width=" " height=" " alt="H. people" /> &nbsp; Talk to the Hottest People &nbsp;<i class="fa fa-caret-right"></i></a>
										<ul class="benefits_details">
											<li>Chat with the most popular members on Startrishta whose reputations are Very Hot</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-5.png" width=" " height=" " alt="favorite" /> &nbsp; Added as a Favorite  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Find out who has added your profile to their favorites list and get in touch with them</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-gift.png" width=" " height=" " alt="stealth" /> &nbsp; Stealth Mode  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Become invisible when visiting other people's profiles to browse in private </li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-hi.png" width=" " height=" " alt="customisation" /> &nbsp; Profile Customisation  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Upgrade your profile with a variety of great wallpapers to show off with</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon150.png" width=" " height=" " alt="chat" />  &nbsp; Chat to New Members First &nbsp;<i class="fa fa-caret-right"></i></span> </a>
										
										<ul class="benefits_details">
											<li>Get a headstart on everyone else by being able to message newest Startrishta Members first</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						
					</div>
					<div class="hidden-sm margin-t30 margin-b35 clearfix"> </div>
					
				</div>
			</div>
		<!-- End Vip Cntainer--------------->	
			
			
			
			
		</div>
		<!--Main Container end here-->
		<?php 
			//--Footer start here-->
			require("include/footer.php"); 
			//------its sign in and sign up------->
			include('include/sign-in.php') ;
			//------Foot------->
			require("include/foot.php");
			//------Popups ------->
			include('include/profile-modal.php');
		?>
	</div>
	<script>
	$(document).ready(function(){
		$(".new-vip .vip-right-box-1 > ul > li > a").click(function(){
			$(".new-vip .vip-right-box-1 > ul > li > a").removeClass("active");
			$(".new-vip .vip-right-box-1 > ul > li > a i").removeClass("fa-caret-down");
			$(".new-vip .vip-right-box-1 > ul > li > a i").addClass("fa-caret-right");
			$("ul.benefits_details").slideUp("slow");
			if($(this).next("ul.benefits_details").is(":visible") == false){
				$(this).next("ul.benefits_details").slideDown("slow");
				$(this).find("i").addClass("fa-caret-down");
				$(this).find("i").removeClass("fa-caret-right");
				$(this).addClass("active");
			}else{
				//$(".new-vip .vip-right-box-1 > ul > li > a i").removeClass("fa-caret-down");
				//$(".new-vip .vip-right-box-1 > ul > li > a i").addClass("fa-caret-right");
			}
		});
	});
	</script>
</body>
</html>