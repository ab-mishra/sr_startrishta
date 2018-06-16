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
	<title>Startrishta | Vip Member</title>
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
								<h3 class="margin-t10 vip-header lato"><b>Congratulations on upgrading to a VIP Membership!</b></h3>
								<h5 class="margin-t10 lato gray_1"><b>Here is a reminder of the fantastic benefits you can enjoy:</b></h5>
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
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-t40 margin-b30">
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
	
</body>
</html>