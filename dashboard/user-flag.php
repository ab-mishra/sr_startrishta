<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];
$userRaisedFlagArray=$adminObj->getUserRaisedFlag($userId);
$userRaisedFlagCount=count($userRaisedFlagArray);

$userAgainsedFlagArray=$adminObj->getUserAgainsedFlag($userId);
$userAgainsedFlagCount=count($userAgainsedFlagArray);

$userResult=$adminObj->getUserInfo($userId);

?><!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrista | Flag</title>
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
					   		<h5 class="no-space"> User's Flag </h5>
					   		<p><a href="power-search.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Power Search</a></p>
					   		<div class=" user-nid clearfix">
					   			<ul class="">
					   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
					   				<li><strong><?php echo $userResult['user_name'];?></strong> <br /> #<?php echo $userId;?></li>
					   			</ul>
					   		</div>
					   		<div class="col-lg-7 clearfix">
					   			  <div role="tabpanel">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist">
										    <li role="presentation" class="active"><a href="#tab1a" aria-controls="tab1a" role="tab" data-toggle="tab">User Raised</a></li>
										    <li role="presentation"><a href="#tab2a" aria-controls="tab2a" role="tab" data-toggle="tab">Raised Against User</a></li>
										    
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
										    <div role="tabpanel" class="tab-pane fade in active" id="tab1a">
													<ul class="tab-accordion text-report clearfix">
															<li></li>
															<li >Against User</li>
															<li>Email</li>
															<li>Report Abuse</li>
															<li>Report Photo</li>
														</ul>
															    	
										    		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
													<?php 
													foreach($userRaisedFlagArray as $userRaisedFlagResult){
														$flagUserId=$userRaisedFlagResult['user_id'];
														$flagUser=$adminObj->getUserInfo($flagUserId);	
														$userReportArray=$adminObj->getUserReport($flagUserId , $userId);
														$userPhotoReportArray=$adminObj->getUserPhotoReport($flagUserId, $userId);
														?>
															<div class="panel panel-default">
															    <div class="panel-heading" role="tab" id="headingOne">
															    	<ul class="tab-accordion clearfix">
															    		<li class="text-center">
															    			<a  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $userRaisedFlagResult['user_id'];?>" aria-expanded="true" aria-controls="collapseOne">
																				<i class="more-less fa fa-minus "></i>
																    		</a>
																		</li>
															    		<li><?php echo $flagUser['user_name'];?></li>
															    		<li><a href="#"><?php echo $flagUser['email_id'];?></a></li>
															    		<li><?php echo count($userReportArray);?></li>
															    		<li><?php echo count($userPhotoReportArray);?></li>
															    	</ul>
															    </div><!-- /panel-heading -->
															    
															    <div id="collapse<?php echo $userRaisedFlagResult['user_id'];?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
																	<div class="panel-body">
																	    <table class="powersearch-table table table-bordered no-margin-bottom">
																			<thead>
																			    <tr>
																					<th>#</th>
																					<th>Type</th>
																					<th>Reason</th>
																					<th>Timestamp</th>
																			    </tr>
																			</thead>
																			<tbody>
																				<?php 
																				$i=1;
																				foreach($userReportArray as $userReportResult){?>
																			    <tr>
																					<td><?php echo $i;?></td>
																					<td>Report Abuse</td>
																					<td>
																						<?php 
																						if($userReportResult['reason'] == 'Other'){
																							echo $userReportResult['description'];
																							}
																						else{
																							echo $userReportResult['reason'];
																						}?>
																					</td>
																					<td>
																						<?php echo date('d/m/y h:i', strtotime($userReportResult['reported_on']));?>
																					</td>
																			    </tr>
																			    <?php 
																			    $i++;
																			    } 
																			    foreach($userPhotoReportArray as $userPhotoReportResult){?>
																			    <tr>
																					<td><?php echo $i;?></td>
																					<td>Report Photo</td>
																					<td>
																						<?php 
																						if($userPhotoReportResult['reason'] == 'Other'){
																							echo $userPhotoReportResult['description'];
																							}
																						else{
																							echo $userPhotoReportResult['reason'];
																						}?>
																					</td>
																					<td>
																						<?php echo date('d/m/y h:i', strtotime($userPhotoReportResult['reported_on']));?>
																					</td>
																			    </tr>
																			    <?php 
																			    $i++;
																			    }?>
																			</tbody>
																	    </table>
																	</div><!-- /panel-body -->
															    </div><!-- /panel-collapse -->
															</div><!-- /panel 1 -->	
													<?php } ?>
													</div><!-- /panel-group -->
										    </div>
										    <!-- tab1 -->
										     <div role="tabpanel" class="tab-pane fade" id="tab2a">
													<ul class="tab-accordion text-report clearfix">
															<li></li>
															<li >Reported User</li>
															<li>Email</li>
															<li>Report Abuse</li>
															<li>Report Photo</li>
														</ul>
															    	
										    		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
													<?php 
													foreach($userAgainsedFlagArray as $userAgainsedFlagResult){
														$flagUserId=$userAgainsedFlagResult['reported_by'];
														$flagUser=$adminObj->getUserInfo($flagUserId);	
														$userReportArray=$adminObj->getUserReport($userId, $flagUserId);
														$userPhotoReportArray=$adminObj->getUserPhotoReport($userId, $flagUserId);
														?>
															<div class="panel panel-default">
															    <div class="panel-heading" role="tab" id="headingOne">
															    	<ul class="tab-accordion clearfix">
															    		<li class="text-center">
															    			<a  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $flagUserId;?>" aria-expanded="true" aria-controls="collapseOne">
																				<i class="more-less fa fa-minus "></i>
																    		</a>
																		</li>
															    		<li><?php echo $flagUser['user_name'];?></li>
															    		<li><a href="#"><?php echo $flagUser['email_id'];?></a></li>
															    		<li><?php echo count($userReportArray);?></li>
															    		<li><?php echo count($userPhotoReportArray);?></li>
															    	</ul>
															    </div><!-- /panel-heading -->
															    
															    <div id="collapse<?php echo $flagUserId;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
																	<div class="panel-body">
																	    <table class="powersearch-table table table-bordered no-margin-bottom">
																			<thead>
																			    <tr>
																					<th>#</th>
																					<th>Type</th>
																					<th>Reason</th>
																					<th>Timestamp</th>
																			    </tr>
																			</thead>
																			<tbody>
																				<?php 
																				$i=1;
																				foreach($userReportArray as $userReportResult){?>
																			    <tr>
																					<td><?php echo $i;?></td>
																					<td>Report Abuse</td>
																					<td>
																						<?php 
																						if($userReportResult['reason'] == 'Other'){
																							echo $userReportResult['description'];
																							}
																						else{
																							echo $userReportResult['reason'];
																						}?>
																					</td>
																					<td>
																						<?php echo date('d/m/y h:i', strtotime($userReportResult['reported_on']));?>
																					</td>
																			    </tr>
																			    <?php 
																			    $i++;
																			    } 
																			    foreach($userPhotoReportArray as $userPhotoReportResult){?>
																			    <tr>
																					<td><?php echo $i;?></td>
																					<td>Report Photo</td>
																					<td>
																						<?php 
																						if($userPhotoReportResult['reason'] == 'Other'){
																							echo $userPhotoReportResult['description'];
																							}
																						else{
																							echo $userPhotoReportResult['reason'];
																						}?>
																					</td>
																					<td>
																						<?php echo date('d/m/y h:i', strtotime($userPhotoReportResult['reported_on']));?>
																					</td>
																			    </tr>
																			    <?php 
																			    $i++;
																			    }?>
																			</tbody>
																	    </table>
																	</div><!-- /panel-body -->
															    </div><!-- /panel-collapse -->
															</div><!-- /panel 1 -->	
													<?php } ?>
													</div><!-- /panel-group -->
										    </div>
										   
										</div>
									</div><!-- /tabpanel -->
								</div>
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
