<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$adminId=1;
$userId=$_GET['uid'];
$userResult=$adminObj->getUserInfo($userId);


$messageUserListArray=$adminObj->getMessageUserList($userId);
$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Viewed Message History', admin_id='".$adminId."', timestamp=now() , status=1");

?><!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>StartRista | User Message</title>
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
					<div class=" drag-drop dash-main">
						<div class="row-10">
					   		<h5 class="no-space"> User's message history </h5>
					   			<p><a href="power-search.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Power Search</a></p>
					   		<div class=" user-nid  clearfix">
					   			<ul class="">
					   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
					   				<li><strong><?php echo $userResult['user_name'];?> </strong><br /> #<?php echo $userId;?></li>
					   			</ul>
					   		</div>
					   		<div class="clearfix"></div>
								<div class="col-lg-2 col-md-2 col-sm-2">
									<div class="login-list row-10">
										<ul>
										<?php foreach($messageUserListArray as $messageUserList){?>
											<li class="userMessageList" id="userMessageList-<?php echo $messageUserList['user_id'];?>" style="cursor:pointer;">
												<ul class="msg-h clearfix">
									   				<li><img src="<?php echo $adminObj->getProfileImage($messageUserList['profile_image']);?>" class="img-responsive"></li>
									   				<li><i class="fa fa-circle login-active" aria-hidden="true"> </i> <strong><?php echo $messageUserList['user_name'];?></strong> </li>
								   				</ul>
							   				</li>
											<?php } ?>
								   		</ul>
									</div>
								</div><!-- col closed-->
								<?php 
								foreach($messageUserListArray as $messageUserList){
								$messageHistoryArray=$adminObj->getMessageHistory($userId , $messageUserList['user_id']);
								if($messageUserList['user_id'] == $messageHistoryArray[0]['user_id']){
									$display='none';
								}else{
									$display='block';
								}
								?>
								<div class="col-lg-10 col-md-10 col-sm-10 messageHistoryDiv" id="messageHistoryDiv-<?php echo $messageUserList['user_id'];?>" style="display:<?php echo $display;?>">
									<div class="ulogin-detail row-10">
										<ul>
											<li>
												<ul class="umsg-head clearfix">
									   				<li><img src="<?php echo $adminObj->getProfileImage($messageUserList['profile_image']);?>" class="img-responsive"></li>
									   				<li><strong><?php echo $messageUserList['user_name'];?></strong> <br /><strong class="green-color-f"><?php echo $adminObj->getUserEmailId($messageUserList['user_id']);?></strong></li>
									   				<li><strong><?php echo count($messageHistoryArray);?> Messages </strong> in this chat</li>
								   				</ul>
							   				</li>
								   			
											<?php foreach($messageHistoryArray as $messageHistory){?>
											<li>
												<p class="green-color-f"><?php echo $messageHistory['user_name'];?><span class="grey-color"><?php echo date('d/m/Y h:i' , strtotime($messageHistory['sent_date']));?></span></p>
												<p><?php echo htmlspecialchars_decode($messageHistory['msg']); ?></p>
												<div class="uleft-drop button-edit">
													<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														<i class="fa fa-cog" aria-hidden="true"></i> <i class="fa fa-caret-down" aria-hidden="true"></i>
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<ul class="dropdown-menu info right" role="menu">
														<li><a href="#"> Edit message</a></li>
														<li><a href="#"> Delete message</a></li>
														<li><a href="#"> Suspend User</a></li>
													</ul>
												</div>
								   			</li>
											<?php } ?>
								   			
								   		</ul>
									</div>
								</div>
								<?php } ?>
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
<script>
$(function(){
	
	$('.userMessageList').click(function(){
		$('#preloader').show();
		var id=$(this).attr('id').split('-');
		$('.messageHistoryDiv').hide();
		$('#messageHistoryDiv-'+id[1]).show();
		$('#preloader').hide();
	});


});
</script>
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
