<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];

$userResult=$adminObj->getUserInfo($userId);
$userVipResult=$adminObj->getUserVipInfo($userId);
print_r($userVipResult);

?><!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Subscription</title>
		<link rel="icon" type="image/png" href="images/favico.png">		
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

		<link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet"> 
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
	    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
					<div class=" drag-drop dash-main">
						<div class="row-10">
					   		<h5 class="no-space"> User's  Subscription </h5>
					   	<p><a href="user-list.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Users list</a></p>
					   		<div class=" user-nid clearfix">
					   			<ul class=" clearfix ">
					   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
					   				<li><strong><?php echo $userResult['user_name'];?> </strong><br /> #<?php echo $userId;?></li>
					   				<li class="list-sub clearfix">
					   					<ul class="subcription-list clearfix">
											<li>Current Subscription Package:</li>
											<li><img src="assets/images/down-arw-red.png"> VIP Membership</li>
										</ul>
										<ul class="subcription-list clearfix">
											<li>Current Subscription Entry:</li>
											<li><?php echo date('d/m/y' , strtotime($userVipResult['end_date']));?></li>
										</ul>
										<ul class="subcription-list clearfix">
											<li>Total ammount Purchaised for VIP:</li>
											<li>
												<?php if($userVipResult['vip_id'] ==0){
													echo 'Upgrade By admin';
												}else{
													
													
												
												}?>
											</li>
										</ul>
					   				</li>
					   			</ul>

					   		</div>
					   		<div class="clearfix"></div>
								<div class="col-sm-6">
				    			</div><!-- col -->
			    		</div>
					<div class="clearfix"></div>
			<!-- /drag-drop -->
					</div>	<!-- col-lg-9 closed-->
					
			   		</div><!-- container-fluid -->
				</div><!-- content -->
	    	</div><!-- main -->
			<!-- /MAIN  -->
		</div><!-- wrapper -->
	
		
		
	<?php include("include/foot.php"); ?>
	<!--credits modal-->
		
	</div>
</div>

	
	
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>