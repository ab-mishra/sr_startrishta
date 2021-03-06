<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$newPhotoResult=$adminObj->getNewPhotos();
$newPhotoCount=count($newPhotoResult);

$newInterestResult=$adminObj->getNewInterest();
$newInterestCount=count($newInterestResult);

$photoReportedResult=$adminObj->getPhotoReported();
$photoReportedCount=count($photoReportedResult);

$abuseReportResult=$adminObj->getAbuseReport();
$abuseReportCount=count($abuseReportResult);

$newUsersResult=$adminObj->getNewUsers();
$newUsersCount=count($newUsersResult);

$deletedUsersResult=$adminObj->getDeletedUsers();
$deletedUsersCount=count($deletedUsersResult);

$onlineUsersResult=$adminObj->getOnlineUsers();
$onlineUsersCount=count($onlineUsersResult);

$notVerifiedUsersResult=$adminObj->getNotVerifiedUsers();
$notVerifiedUsersCount=count($notVerifiedUsersResult);

$noProfilePhotoResult=$adminObj->getNoProfilePhotoUsers();
$noProfilePhotoCount=count($noProfilePhotoResult);

$maleUsersResult=$adminObj->getMaleUsers();
$maleUsersCount=count($maleUsersResult);

$femaleUsersResult=$adminObj->getFemaleUsers();
$femaleUsersCount=count($femaleUsersResult);

$adminArray=$adminObj->getAllAdmin();
?>

<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrista | Dashboard</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">
	    
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
    </head>
    
    <body>
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper dashboard">
	<!-- THEME OPTIONS -->
	    <div class="theme-options affix">
			<h5>Sidebar Left/Right<br><small>Click on icon to toggle</small></h5>
			<!-- <div class="theme-layouts">
			    <a class="theme-option-toggle-sidebar">Sidebar Switch</a>
			</div><!-- theme-layouts --> 
			<div class="divider"></div>
			<h5>Available Themes<br><small>9 themes available</small></h5>
			<ul id="theme-switcher" class="theme-switcher">
			    <li class="default-theme"><a href="#" id="assets/css/themes/theme-default.css">&nbsp;</a></li>
			    <li class="dark-theme"><a href="#" id="assets/css/themes/theme-dark.css">&nbsp;</a></li>
			    <li class="red-theme"><a href="#" id="assets/css/themes/theme-red.css">&nbsp;</a></li>
			    <li class="yellow-theme"><a href="#" id="assets/css/themes/theme-yellow.css">&nbsp;</a></li>
			    <li class="green-theme"><a href="#" id="assets/css/themes/theme-green.css">&nbsp;</a></li>
			    <li class="blue-theme"><a href="#" id="assets/css/themes/theme-blue.css">&nbsp;</a></li>
			    <li class="purple-theme"><a href="#" id="assets/css/themes/theme-purple.css">&nbsp;</a></li>
			    <li class="pink-theme"><a href="#" id="assets/css/themes/theme-pink.css">&nbsp;</a></li>
			    <li class="orange-theme"><a href="#" id="assets/css/themes/theme-orange.css">&nbsp;</a></li>
			</ul>
	    </div><!-- theme-options -->
	    
	<?php  include("include/header.php"); ?>

	<!-- SIDEBAR -->
	<?php include("include/side-menu.php") ?>
	    
	   
	<!-- SIDEBAR -->
	    
	<!-- MAIN -->
	    <div class="main clearfix">
	    	<!-- CONTENT -->
			<div id="content" class="">
			    <div class="container-fluid">
					<div class="col-lg-9 col-md-9 col-sm-9 drag-drop dash-main">
						<div class="row-10">
					   		 <h5> Dashboard </h5>
						    	<div class="col-lg-3 col-md-3 col-sm-3 ">
							    	<div class="row-10">
							    		<div class="img-column clearfix">
								    		<div class="clearfix img-top">
								    			<h6>New Photos</h6>
								    			<a href="new-photos.php"><img src="assets/img/uploads/a3.png" class="img-responsive center-block"></a>
								    		</div>
								    		<div class="image-number">
								    			<h4><?php echo $newPhotoCount;?></h4>	
							    			</div>	
							    		</div>	
						    		</div>
								</div><!-- /drag-drop -->
								<div class="col-lg-3 col-md-3 col-sm-3 ">
							    	<div class="row-10">
							    		<div class="img-column clearfix">
								    		<div class="clearfix img-top">
								    			<h6>New Interests</h6>
								    			<a href="new-interests.php"><img src="assets/img/uploads/a1.png" class="img-responsive center-block"></a>
								    		</div>
								    		<div class="image-number">
								    			<h4><?php echo $newInterestCount;?></h4>	
							    			</div>	
							    		</div>	
						    		</div>
								</div>
								<!-- /drag-drop -->
								<div class="col-lg-3 col-md-3 col-sm-3">
							    	<div class="row-10">
							    		<div class="img-column clearfix">
								    		<div class="clearfix img-top">
								    			<h6>Photos Reported</h6>
								    			<a href="photo-report.php"><img src="assets/img/uploads/a4.png" class="img-responsive center-block"></a>
								    		</div>
								    		<div class="image-number">
								    			<h4><?php echo $photoReportedCount;?></h4>	
							    			</div>	
							    		</div>	
						    		</div>
								</div>
								<!-- /drag-drop -->
								<div class="col-lg-3 col-md-3 col-sm-3">
							    	<div class="row-10">
							    		<div class="img-column clearfix">
								    		<div class="clearfix img-top">
								    			<h6>Abuse Reported</h6>
								    			<a href="abuse-report.php"><img src="assets/img/uploads/a2.png" class="img-responsive center-block"></a>
								    		</div>
								    		<div class="image-number">
								    			<h4><?php echo $abuseReportCount;?></h4>	
							    			</div>	
							    		</div>	
						    		</div>
								</div>
						</div>
						<div class="clearfix"></div>
						<div class="row-10">
							<h6 class="ts-heading">Todays Statistics</h6>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-dg" class="today-tre-sec dark-green">
											<span><?php echo $newUsersCount;?></span>
										</div>
										<p>New Users</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-red" class="today-tre-sec red-color">
											<span><?php echo $deletedUsersCount;?></span>
										</div>
										<p>Deleted Profile</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-green" class="today-tre-sec green-color">
											<span><?php echo $onlineUsersCount;?></span>
										</div>
										<p>Online User</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-orange" class="today-tre-sec orange-color">
											<span><?php echo $notVerifiedUsersCount;?></span>
										</div>
										<p>Profile Not Verified</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-yellow" class="today-tre-sec yellow-color">
											<span><?php echo $noProfilePhotoCount;?></span>
										</div>
										<p>User with no profile photo</p>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="row-10">
									<div class="todays-s1">
										<div id="leftstrip-purple" class="today-tre-sec purple-color">
											<span><?php echo $maleUsersCount.'/'.$femaleUsersCount;?></span>
										</div>
										<p>Male/Female Ratio</p>
									</div>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
			<!-- /drag-drop -->
						</div>	<!-- col-lg-9 closed-->
						<div class="col-lg-3 col-md-3 col-sm-3 right-list">
							<div class="row-10">
								<h6>Administrators</h6>
								<?php foreach($adminArray as $admin){?>
								<div class="list-rt">
									<p class="name-st"><?php echo $admin['name'];?></p>
									<p class="email-st"><?php echo $admin['email_id'];?></p>
									<p class="login-st">
									<?php if($admin['is_online']){?>
										<i class="fa fa-circle green-color-f"></i> <?php echo $adminObj->getAdminLastLogedInTime($admin['admin_id']);?></p>
									<?php }else{?>
										<i class="fa fa-circle grey-color"></i> Offline
									<?php } ?>
								</div>
								<?php } ?>
							</div>
						</div>
			   		</div><!-- container-fluid -->
				</div><!-- content -->
	    	</div><!-- main -->
			<!-- /MAIN  -->
		</div><!-- wrapper -->
	
        <!-- REQUIRED SCRIPTS -->
	<?php include("include/foot.php"); ?>
    </body>

<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
