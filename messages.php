<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$user_id=1;
$userResult = $userProfileObj->getUserInfo($user_id);
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | My Messages</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/login-script.php"); ?>
	
	
</head>
<body>
	<div class="main-body">
		<!------its sign in and sign up------->
		<?php include('include/sign-in.php') ;?>
		
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
						<!-- it's header -->
						<?php require("messages/html.php"); ?>
						<header class="clearfix">
						
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="left logo"><a href="index.php"><img src="images/logo-color.png"/></a></div>
							</div>
							
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="nv_mid_links">
									<ul class="clearfix">
										<li class="active">
											<a class="msg_icon" href=""><p>My</p><p>Messages</p></a>
											<span class="notify_nub">0</span>
										</li>
										<li><a class="connect" href=""><p>Kismat</p><p>Connection</p></a></li>
										<li><a class="p_srch" href=""><p>People</p><p> Search</p></a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<!--<div class="right right-panel">
									<a class="signup slide-left-signup act">Sign Up for free</a>
									<a href="" class="act" data-toggle="modal" data-target="#myModal" ><span><i class="fa fa-lock"></i></span> Login</a>
								</div>-->
								
								<div class="right right-panel">
									<div>
										<div class="left vip_icon" data-toggle="tooltip" data-placement="bottom" title="Become a VIP member"> 
											<a href=""></a> 
											<!--<span class="vip_info"> Become a VIP member You are a VIP member!</span>-->
										</div>
										<div class="currency" data-toggle="tooltip" data-placement="bottom" title="Add Startrishta Credits to meet new people">
											<span class="pull-left"><img src="images/coins.png" /></span>
											<a>0 <span class="auto">credits</span></a>
										</div>
										<?php 
											$userProfileImage=$userProfileObj->getProfileImage($userResult['profile_image']);
										?>
										<div class="profile">
											<ul>
												<li> 
													<a class="prof_dpdwn"> <img src="<?php echo $userProfileImage;?>" style="width:26px;height:26px;"> <i class="fa fa-sort-desc"></i>  </a>
													<ul class="prof_drop_dwn">
														<li><a  href="logout.php">Log Out</a></li>
														<li><a href="home.php">Profile</a></li>
														<li><a href="">Settings</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</header>
						<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<!-- it's header -->
							<?php require("include/side-bar.php"); ?>
							<!-- it's header -->
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							 <?php 
							  $queryTerms=mysql_query("Select * from sr_cms where status='1' and page='about'");
							  $result=mysql_fetch_array($queryTerms);
							?>
							<div class="title_in red margin-b10 margin-t50 bold"><h2><?php echo stripslashes($result['title']); ?></h2></div>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<ul class="ccm_btn">
										<li><a href="javascript:void(0);">CONNECT.</a></li>
										<li><a href="javascript:void(0);">COMMUNICATE.</a></li>
										<li><a href="javascript:void(0);">MEET.</a></li>
									</ul>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="row abt_intro">
										<?php echo stripslashes($result['description']); ?>
									</div>
								</div>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row margin-t20 margin-b20">
									<div class="abt_red_bx"><p>OUR MISSION: TO EMPOWER A <br />NEW GENERATION OF RELATIONSHIPS</p> </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
		
		<!--Footer start here-->
		<?php require("include/footer.php"); ?>
		<!--Footer end here-->
	</div>
	
	<script>
	$(document).ready(function(){
		$(".close_div0").click(function(){
			$(".msg0").css("display","none");
			alert("1 Ready to chat reset search");
		});
		$(".close_div1").click(function(){
			$(".msg1").css("display","none");
			alert("1.1 Ready to chat Users");
		});
		$(".close_div1b").click(function(){
			$(".msg1b").css("display","none");
			alert("2 when you match with a user");
		});
		$(".close_div2").click(function(){
			$(".msg2").css("display","none");
			alert("3 when you match with a user with interest");
		});
		$(".close_div3").click(function(){
			$(".msg3").css("display","none");
			alert("4 when you match with a user share interest");
		});
		$(".close_div4").click(function(){
			$(".msg4").css("display","none");
			alert("5 when a user match with you");
		});
		$(".close_div5").click(function(){
			$(".msg5").css("display","none");
			alert("6 when a user match with you with interest");
		});
		
		$(".close_div6").click(function(){
			$(".msg6").css("display","none");
			alert("7 when a user match with you share interest");
		});
		
		$(".close_div7").click(function(){
			$(".msg7").css("display","none");
			alert("8 when a user match with you send message");
		});
		$(".close_div8").click(function(){
			$(".msg8").css("display","none");
			alert("9 when a user match with you with interest send message");
		});
		
		$(".close_div9").click(function(){
			$(".msg9").css("display","none");
			alert("10 when a user match with you share interest send message");
		});
		
		$(".close_div10").click(function(){
			$(".msg10").css("display","none");
			alert("11 Newly Join User");
		});
		$(".close_div11").click(function(){
			$(".msg11").css("display","none");
			alert("12 User with very hot reputation");
		});
		$(".close_div12").click(function(){
			$(".msg12").css("display","none");
			alert("13 you don't match user's criteria");
		});
		$(".close_div13").click(function(){
			$(".msg13").css("display","none");
			alert("14 Upload Profile Photos");
		});
		
		$(".close_div14").click(function(){
			$(".msg14").css("display","none");
			alert("15 new incoming message");
		});
		
		$(".close_div15").click(function(){
			$(".msg15").css("display","none");
			alert("17 start chatting no interest");
		});
		
		$(".close_div17").click(function(){
			$(".msg17").css("display","none");
			alert("18 start chatting with interest");
		});
		$(".close_div18").click(function(){
			$(".msg18").css("display","none");
			alert("20 User want to talk");
		});
		
		$(".close_div20").click(function(){
			$(".msg20").css("display","none");
			alert("21 User want to talk with interest");
		});
		
		$(".close_div21").click(function(){
			$(".msg21").css("display","none");
			alert("22 User want to talk with shared interest");
		});
		$(".close_div22").click(function(){
			$(".msg22").css("display","none");
			alert("23 limit warning");
		});
		$(".close_div23").click(function(){
			$(".msg23").css("display","none");
			alert("24 chat limit reached");
		});
		$(".close_div24").click(function(){
			$(".msg24").css("display","none");
			alert("25 Users Interest");
		});
		
		$("#msg_nointerest").click(function(){
			$(".message_report").show();
			$(".nv_mid_links ul li").removeClass("active");
		});
		$(".msg_cancel").click(function(){
			$(".message_report").hide();
		});
	});
	
	</script>
</body>

</html>