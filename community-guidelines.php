<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='community-guidelines';
if(!empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Terms & Conditions</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/script.php"); ?>
</head>
<body>
	<div class="main-body">
		<!--====== its sign in and sign up ====-->
		<?php //include('include/sign-in.php') ;?>
		
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
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_sm_3_big">
							<!-- it's header -->
							<?php require("include/side-bar.php"); ?>
							<!-- it's header -->
						</div>
						<?php 
							$queryTerms=mysql_query("Select * from sr_cms where status='1' and page='Terms'");
							$result=mysql_fetch_array($queryTerms);
						?>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
							<!--<div class="title_in red margin-b10 margin-t50 bold"> <h2><b><?php //echo stripslashes($result['title']); ?></b></h2></div>-->
							<div class="title_in red margin-b10 margin-t50 bold"> <h2><b>Community Guidelines</b></h2></div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<!--<div class="row terms">
								   <?php// echo stripslashes($result['description']); ?>
								</div>-->
								
								<!-- -->      
								<div class="row terms lato font-15">
										<p>These Guidelines and our Terms and Conditions are here to ensure that every user can enjoy Startrishta safely and responsibly.</p>
										<div class="title_in red margin-b10 margin-t10"> <h3>Startrishta Do's</h3></div>

									<h4 class="terms_header margin-t30">1. Do upload only your own photo</h4>
										<p>We take copyrights very seriously. If you don't own the rights to a photo please don't use it. And remember that it is really lame to post other people's photos as your own</p>
										
									<h4 class="terms_header margin-t30">2. Do respect other users</h4>
										<p>We are a very diverse community. This means that respect for other people's beliefs and property must be made a priority.</p>
										<h4 class="terms_header margin-t30">3. Do follow the guidelines </h4>
										<p>Please don't make us constantly have to warn you about not following our guidelines. Repeated misbehaviour can lead your account being suspended.</p>
										<h4 class="terms_header margin-t30">4. Do spread Startrishta across the web </h4>
										<p>Share your Startrishta photos with all your friends and let everyone know about our great community.</p>
										<h4 class="terms_header margin-t30">5. Do share as much of your life as possible </h4>
										<p>Our site allows you to tell everyone about yourself and your work. It's your stage to show how brilliant you are!</p>

										<div class="title_in red margin-b10 margin-t10"> <h3>Startrishta Don'ts</h3></div>
										<h4 class="terms_header margin-t30">1. Don't verbally abuse other users</h4>
										<p>You should behave the same way on our site as you would in real life. Treat people as if you were  talking to them face to face. Any verbal abuse will be taken very seriously!</p>
										<h4 class="terms_header margin-t30">2. Don't upload tasteless or pornographic material </h4>
										<p>There are other sites out there for you to do this, just not ours.</p>

										<h4 class="terms_header margin-t30">3. Don't do anything illegal on our site </h4>
										<p>We will not hesitate to report your details to the appropriate authorities - you have been warned!</p>

										<h4 class="terms_header margin-t30">4. Don't spam other users </h4>
										<p>If you want to write someone a message, be original. Do not try to sell products, other sites or yourself on Startrishta. Spamming is just not cool and doesn't work!</p>

										
										
										<p><strong>Please remember that failure  to follow these guidelines will be first met with a warning and then a possible deletion of your account if the behaviour continues. These guidelines are meant to keep Startrishta a safe and friendly place for all of our users. If you don't agree, you're free to leave.</strong></p>
										<h4 class="terms_header margin-t30"></h4>
								</div>
							</div>
					<!-- -->
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!--Main Container end here-->
		<?php 
			//--Footer start here-->
			require("include/footer.php"); 
			//------its sign in and sign up----- -->
			include('include/sign-in.php') ;
		?>
	</div>
	
	
</body>
</html>