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
	<title>Startrishta | Unsubscribe Vip</title>
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
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t50 margin-b20">
							<div class="col-sm-1 col-md-1 vip-sm-1">
								<img src="images/vip-big.png" width=" " height=" " alt="VIP"/> 
							</div>
							<div class="col-sm-8 col-md-8 vip-sm-8">
								<h3 class="margin-t10 vip-header lato"><b>Unsubscribing means you will miss out on all <br />
these fantastic VIP member benefits:</b></h3>
							</div>
							<div class="col-sm-3 col-md-3 margin-t10 vip-sm-3">
								
							</div>
						</div>
						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 col-md-offset-1">
						
						
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big.png" width=" " height=" " alt="Message"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Message Boost </b></h4>
										<p class="gray_1 margin-t5">
											<b>Get a conversation started quicker by having all you  messages read first</b>
										</p>
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big2.png" width=" " height=" " alt="likes"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>See who likes you</b></h4>
										<p class="gray_1 margin-t5">
											<b>Check out who likes you on Kismat Connection and message them straight away</b>
										</p>
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big1.png" width=" " height=" " alt="Hot"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Talk to the Hottest People</b></h4>
										<p class="gray_1 margin-t5">
											<b>Chat with the most popular members on Startrishta whose reputations are Very Hot</b>
										</p>
									</div>
								</div>
							</div>
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big3.png" width=" " height=" " alt="Favorite"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Added as a Favorite </b></h4>
										<p class="gray_1 margin-t5">
											<b>Find out who has added your profile to their favorites list and get in touch with them</b>
										</p>
									</div>
								</div>
							</div>
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big4.png" width=" " height=" " alt="Stealth"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Stealth Mode </b></h4>
										<p class="gray_1 margin-t5">
											<b>Become invisible when visiting other people's profiles to browse in private </b>
										</p>
									</div>
								</div>
							</div>
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big5.png" width=" " height=" " alt="Profile"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Profile Customisation </b></h4>
										<p class="gray_1 margin-t5">
											<b>Upgrade your profile with a variety of great wallpapers to show off with</b>
										</p>
									</div>
								</div>
							</div>
							
							
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<div class="row">
									<div class="vip-big_image"><img src="images/boost-big6.png" width=" " height=" " alt="New Members"/> </div>
									<div class="vip-big_discription margin-t10">
										<h4 class="red_v" ><b>Chat to New Members First </b></h4>
										<p class="gray_1 margin-t5">
											<b>Get a headstart on everyone else by being able to message newest Startrishta Members first</b>
										</p>
									</div>
								</div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20 margin-t20">
								<p class="align-c">
									<button class="btn btn-danger bold" data-target="#vip_payment_28012016" data-toggle="modal" type="button" style="padding:10px; font-size:18px; width:290px;"> Keep VIP Membership </button> 
								
									 <br /> <br /><a href="" class="underline-link">Unsubscribe</a>
									 
								</p>
							</div>
							
							
							
							
							
							
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t20 margin-b30">
							</div>
						</div>
					</div>
					
					
					
					
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