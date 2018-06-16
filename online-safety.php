<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='online-safety';
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
							<div class="title_in red margin-b10 margin-t50 bold"> <h2><b>Online Safety</b></h2></div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<!--<div class="row terms">
								   <?php// echo stripslashes($result['description']); ?>
								</div>-->
								
								<!-- -->      
								<div class="row terms lato font-15">
								   
										
									<h4 class="terms_header margin-t30">Guide To Online Safety</h4>
											<p>As with any location-based service,  it's important that you use common sense when interacting with people online.  </p>
										<ul class="terms_ul">
											<li>You should not share of disclose your password with any third party - even if they are your friend. If you lose your password or give it out, your personal data may be compromised. If you believe your profile was hacked please report it to us immediately via our Contact page.</li>

											<li>Always be careful with giving out personal information if you don't know a new person well yet. This includes disclosing your email address, IM details, full name and any URLs. Also be sure to never share your financial information, such as bank account or credit card details.</li>

											<li>Be vigilant of people claiming to represent our company or other companies who are asking you to pay for delivery of a prize or service that is not offered directly on Startrishta.</li>

											<li>Be aware of people requiring financial assistance, it may be a scam.</li>

											<li>Don't use a provocative username, this can attract unwanted attention. We recommend using an appropriate username, typically your first name.</li>

											<li>If you come across any inappropriate behaviour, click on the Report Abuse link which will alert our team immediately. There is also a block member function if you do not want to interact with another user for any reason. Never put up with intimidation, harassment of any other forms of abuse - report it to us immediately. We will deal with these matters as quickly as possible and a detailed management system is in place to monitor and quality control this aspect.</li>
											
										</ul>
									<h4 class="terms_header margin-t30">Tips For Meeting Up Offline</h4>
										<ul class="terms_ul">
											<li>When chatting to people, ask for recent photos - preferably ones that have been taken in the last month.</li>

											<li>Never feel pressured in the meeting up; only do so when you are sure you are ready.</li>

											<li>Always try and talk to the other person on the phone first.</li>

											<li>Tell friends or relatives when you are planning to go and arrange a check-up phone call or text. It's also good practice to take a friend with you on the first meeting.</li>

											<li>Make sure you bring a fully charged mobile with enough credit, and let your friends know how the meeting is going and also when you get home safely.</li>

											<li>Arrange your own transportation to and from the meeting place - don't agree to meet at their place or you own home. Do not give out your personal address until you have really gotten to know the other person.</li>

											<li>It can be useful to come prepared with an excuse to leave if you feel the meeting is not going well, that way you get out with a minimum fuss.</li>

											<li>When meeting up for the first time, make sure it's during daylight hours, in a public place and while sober! And make sure you don't drink too much during your meeting, and always keep your drinks and belongings within site at all times</li>
										</ul>
										<h4 class="terms_header margin-t30"> </h4>
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