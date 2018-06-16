<?php 
include('classes/adminClass.php');
$adminObj=new Admin();

$userId=$_GET['uid'];
$userResult=$adminObj->getUserInfo($userId);

$userVisitorCount=$adminObj->getVisitorCount($userId);
$userLikeCount=$adminObj->getLikeMeCount($userId);
$userFavouriteCount=$adminObj->getFavouriteCount($userId);
$userBlockCount=$adminObj->getBlockCount($userId);								
$getRatedMeUserCount=$adminObj->getRatedMeUserCount($userId);
$userReputation=$adminObj->getUserReputationText($userId);

$userInterestArray=$adminObj->getUserProfileInterest($userId);

$friendsArray = $adminObj->getMyFriends($userId);
$friendCount = count($friendsArray);

$dob=date('Y-m-d' , strtotime($userResult['dob']));
$from = new DateTime($dob);
$to   = new DateTime('today');
$age = $from->diff($to)->y;	

$photosArray = $adminObj->getUserPhotos($userId);

$isVipMember=$adminObj->isUserVip($userId);
$statusIconHtml=$adminObj->getStatusIconHtml($userId , $userResult['gender'] ,$userReputation , $isVipMember);
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | User Profile</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">
	    
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/plugins/form/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
    </head>
    
    <body>
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
			
	<div class="wrapper">
	<!-- THEME OPTIONS -->
	    
	    
	<!-- HEADER -->
	    	    
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
					   		<h5 class="no-space"> User Profile </h5>
					   	<p><a href="power-search.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Power Search</a></p>
					   		<div class="clearfix"></div>
							<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<div class="row-10">
									<ul class="user-profile-list clearfix">
										<li>	
								   			<ul class="user-list clearfix">
								   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
								   				<li><strong>Reputation is<br /><span class="back-yellow"><?php echo $userReputation;?></span></strong></li>
								   			</ul>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="pv"></span>
								   				Profile Visitors
								   				<span class="right-num"><?php echo $userVisitorCount;?></span>
							   				</a>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="lm"></span>
								   				 Liked Me 
								   				<span class="right-num"><?php echo $userLikeCount;?></span>
							   				</a>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="rmp"></span>
								   				 Rated My Photos 
								   				<span class="right-num"><?php echo $getRatedMeUserCount;?></span>
							   				</a>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="mf"></span>
								   				 My Favourites 
								   				<span class="right-num"><?php echo $userFavouriteCount;?></span>
							   				</a>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="com"></span>
								   			 Comments 
								   				<span class="right-num">0</span>
							   				</a>
							   			</li>
							   			<li>
							   				<a href="javascript:void(0);">
								   				<span class="blk"></span>
								   					Blocked 
								   				<span class="right-num"><?php echo $userBlockCount;?></span>
							   				</a>
							   			</li>
							   		</ul>

							   		<ul class="verification clearfix">
							   			<p><b>Verification</b></p>
							   			<li>
								   				<ul class="pverification-detail clearfix">
								   					<li><span class="icon"><img src="assets/images/mobile.png"></span></li>
								   					<li><b>Mobile Phone </b><br/> <span>Unlinked</span></li>
								   					<li><i class="fa fa-check green-color-f" aria-hidden="true"></i></li>
								   				</ul>
								   			</li>
							   				<li>
								   				<ul class="pverification-detail clearfix">
								   					<li><span class="icon"><img src="assets/images/facebook.png"></span></li>
								   					<li><b>facebook </b><br/> <span>Linked</span></li>
								   					<li><i class="fa fa-check green-color-f" aria-hidden="true"></i></li>
								   				</ul>
								   			</li>
								   			<li>
								   				<ul class="pverification-detail clearfix">
								   					<li><span class="icon"><img src="assets/images/vip-small-gray.png"></span></li>
								   					<li><b>VIP Membership </b><br/> <span>Linked</span></li>
								   					<li><i class="fa fa-check green-color-f" aria-hidden="true"></i></li>
								   				</ul>
								   			</li>
							   		</ul>
					   		</div>
								
			    			</div><!-- col -->
			    			
			    			<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
								<div class="profile-dash clearfix">
									<ul class="middle-dash clearfix">
                                   	<li class="clearfix">
                                    	<ul class="top-dash-profile clearfix">
                                        	<li class="dash-heading"><strong><?php echo $userResult['user_name'];?></strong>, <?php echo $age;?></li>
                                            <li class="top-dash-heading"><h6>Date of Birth </h6></li>
                                           <li>
												<div class="form-group profile-date">
												    <div class="input-group date" id="date">
													<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
													<input type="text" class="form-control" placeholder="mm/dd/yyyy" value="<?php echo date('d/m/Y', strtotime($userResult['dob']));?>">
												    </div>
												</div>
                                            </li>
                                            <li class="top-dash-heading"><h6>Sex </h6></li>
	                                        <li>

	                                            <div class="dropdown">
												  <button class="btn drop-box dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												    Female
												    <span class="caret"></span>
												  </button>
												  <ul class="dropdown-menu dropdown-menu-in" aria-labelledby="dropdownMenu1">
												    <li><a href="#">Female</a></li>
												    <li><a href="#">Male</a></li>
												  </ul>
												</div>
	                                       	</li>
                                             
                                            <li>
                                            	<button type="button" class="btn btn-dash-grey">Save</button>
                                            </li>
                                            <li>
                                            or <span ><a href="#" class="grey-color">Cancel </a></span>
                                            </li>
                                            <li class="pull-right">
                                                <ul class="pdash-icon">
                                                	<?php echo $statusIconHtml;?>
                                            	</ul>
                                            </li>
                                        </ul>
                                        <ul class="inner-top-ul clearfix">
                                            <li class="">
                                            	<span><?php echo count($userInterestArray);?> INTERESTS</span>
                                            </li>
                                            <li>
                                            	<span><?php echo count($friendsArray);?> FRIENDS</span>
                                            </li>
                                             <li>
                                            	<strong><?php if($userResult['gender'] == 2) echo "She ";else { echo "He ";}?> is here to </strong> <?php echo $adminObj->getHereToName($userResult['here_to']);?>
                                            </li>
                                        </ul>
                                    </li>
										<li class="clearfix">
											<ul class="slider-map">
												<li>
													<div class="owl-carousel  demo" id="demo2">
													<?php foreach($photosArray as $photos){?>
														<div class="item"><img src="<?php echo $adminObj->getProfileImage($photos['photo']);?>" class="img-responsive" /></div>
													<?php } ?>
													</div>
												</li>
												<li>
													<ul>
														<li>
                                                        <h6 class="pull-left">Location  </h6>
                                                        <p><?php echo $userResult['location'];?></p>
															<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1462628537639" width="100%" height="60" frameborder="0" style="border:0" allowfullscreen></iframe>
														</li>
													</ul>	
												</li>
											</ul>	
										</li>
										
										<li class="interests">
											<h6>Interest <span><?php echo count($userInterestArray);?></span></h6>
											<ul class='clearfix'>
												<?php foreach($userInterestArray as $userInterest){?>
												<li>
													<a href="javascript:void(0);">
														<span class="<?php echo $userInterest['icon'];?>"></span><?php echo $userInterest['interest'];?>
													</a>
												</li>
												<?php } ?>
											</ul>
										</li>
										<li class="">
											<h6> Friends <span><?php echo count($friendsArray);?></span></h6>
											<ul class="friends-pro clearfix">
											<?php foreach($friendsArray as $friend){?>
												<li>
													<img src="<?php echo $adminObj->getProfileImage($friend['profile_image']);?>" class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="<?php echo $friend['user_name'];?>"/>
												</li>
											<?php } ?>
												
											</ul>
										</li>
										<li class="">
											<h6>About me </h6>
											<p><?php echo $userResult['about_me'];?></p>
										</li>
										<li class="">
											<h6> Looking for </h6>
											<p><?php echo 'adsg'.$userResult['looking_for'];?></p>
										</li>
										<?php
										$userRelationshipStatus = $adminObj->getRelationshipName($userResult['relationship_status']);
										$userStarSign = $adminObj->getstarSignName($userResult['star_sign']);
										$userSexuality = $adminObj->getSexualityName($userResult['sexuality']);
										$userBodyType=$adminObj->getBodyTypeName($userResult['body_type']);
										$userComplexion = $adminObj->getComplexionName($userResult['complexion']);
										$userEyeColor = $adminObj->getEyeColorName($userResult['eye_color']);
										$userHairColor = $adminObj->getHairColorName($userResult['hair_color']);
										$userEducation = $adminObj->getEducationName($userResult['education']);
										$userLanguageArray = $adminObj->getUserLanguage($userId);
										?>
										<li class="">
											<h6> Personal Info </h6>
											<ul class="personal-info">
												<li>
													<ul class="inner-personal-info">
														<li>Relational Status:</li>
														<li><?php echo $userRelationshipStatus;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Star Sign:</li>
														<li><?php echo $userStarSign;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Sexuality:</li>
														<li><?php echo $userSexuality;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Body Type:</li>
														<li><?php echo $userBodyType;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Complexion:</li>
														<li><?php echo $userComplexion;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Height:</li>
														<li><?php echo $userResult['height'];?>cm</li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Eye Color:</li>
														<li><?php echo $userEyeColor;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Hair Color:</li>
														<li><?php echo $userHairColor;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Languages:</li>
														<li>
															<?php 
															$prefix='';
															foreach($userLanguageArray as $userLanguage){
																echo $prefix.$userLanguage['language'];
																$prefix=', ';
															}?>
														</li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Smoking:</li>
														<li><?php if($userResult['smoking']==1) echo 'Yes'; else 'No';?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Drinking:</li>
														<li><?php if($userResult['drinking']==1) echo 'Yes'; else 'No';?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Kids:</li>
														<li><?php if($userResult['kids']==1) echo 'Yes'; else 'No';?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Education:</li>
														<li><?php echo $userEducation;?></li>
													</ul>
												</li>
												<li>
													<ul class="inner-personal-info">
														<li>Work:</li>
														<li><?php echo $userResult['work'];?></li>
													</ul>
												</li>
											</ul>
											
										</li>
									</ul>
								</div>   
								
			    			</div><!-- col -->
			    			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
								<ul class="psickers clearfix">
							   			<p><b>Rewards</b></p>
							   			<?php 
							   			$userRewarArray=$adminObj->getUserRewards($userId);
							   			foreach($userRewarArray as $userReward){
							   			?>
							   			<li>
							   				<img src="images/reward/<?php echo $userReward['reward_icon'];?>" class="img-responsive">
							   				<p><b><?php echo $userReward['reward_title'];?></b><br/> <span> <?php echo date('d-M-Y' , strtotime($userReward['awarded_on']));?></span></p>
								   		</li>
								   		<?php } ?>
							   		</ul>

							   		<ul class="pgift clearfix">
							   			<p><b>Gift</b></p>
							   			<?php 
							   			$userGiftArray=$adminObj->getUserGift($userId);
							   			foreach($userGiftArray as $userGift){
							   			?>
							   			<li>
							   				<img src="images/<?php echo $userGift['gift'];?>" class="img-responsive">
							   			</li>
								   		<li>
							   				<p><b class="green-color-f"><?php echo $userGift['user_name'];?></b><br/> <span><?php echo date('d-M-Y' , strtotime($userGift['gifted_on']));?></span></p>
								   		</li>
								   		<?php } ?>
							   			
							   		</ul>
								
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
	
        <!-- REQUIRED SCRIPTS -->
	<script src="vendor/js/required.min.js"></script>
	<script src="assets/js/quarca.js"></script>
	
	<!-- Progress Bar -->
	<script src="vendor/plugins/ui/progress-bar/bootstrap-progressbar.min.js"></script>
	
	<!-- Owl Carousel -->
	<script src="vendor/plugins/ui/carousel/owl.carousel.min.js"></script>

	<script src="vendor/plugins/form/minicolors/jquery.minicolors.min.js"></script>
	<script src="vendor/plugins/form/datetimepicker/bootstrap-datetimepicker.min.js"></script>
	<script src="vendor/plugins/form/summernote/summernote.min.js"></script>
	
	<script type="text/javascript">
	    "use strict";
	    $(document).ready(function() {
		//PROGRESS BAR
		$('.progress .progress-bar').progressbar({
		    transition_delay: 400,
		    display_text: 'fill'
		});
		
		//CAROUSEL
		var owl = $('#demo1');
		owl.owlCarousel({
		    loop: false,
		    nav: true,
		    margin: 10,
		    navText: [
				"<i class='fa fa-angle-left fa-lg'></i>",
				"<i class='fa fa-angle-right fa-lg'></i>"
			     ],
		    responsive: {
			0:{
			    items:1
			},
			600:{
			    items:3
			},
			1000:{
			    items:4
			}
		    }
		});
		
		var owl2 = $('#demo2');
		owl2.owlCarousel({
		    loop: true,
		    nav: true,
		    dots: false,
		    margin: 10,
		    navText: [
				"<i class='fa fa-angle-left fa-lg'></i>",
				"<i class='fa fa-angle-right fa-lg'></i>"
			     ],
		    responsive: {
			0:{
			    items:1
			},
			600:{
			    items:3
			},
			1000:{
			    items:4
			}
		    }
		});

	    }); //END
	</script>
	<script type="text/javascript">
	    "use strict";
	    $(document).ready(function() {
		//MINICOLORS
		$('.color-picker').each( function() {
		    $(this).minicolors({
			control: $(this).attr('data-control') || 'hue',
			defaultValue: $(this).attr('data-defaultValue') || '',
			inline: $(this).attr('data-inline') === 'true',
			letterCase: $(this).attr('data-letterCase') || 'lowercase',
			opacity: $(this).attr('data-opacity'),
			position: $(this).attr('data-position') || 'bottom left',
			change: function(hex, opacity) {
			    if( !hex ) return;
			    if( opacity ) hex += ', ' + opacity;
			    if( typeof console === 'object' ) {
				console.log(hex);
			    }
			},
			theme: 'bootstrap'
		    });
		});
		
		//DATETIMEPICKER
		$(function () {
		    $('#date').datetimepicker({
			format: 'L'
		    });
		    
		    $('#time').datetimepicker({
			format: 'LT'
		    });
		    
		    $('#date-time').datetimepicker({
		    });
		    
		    $('#view-mode').datetimepicker({
			viewMode: 'years'
		    });
		    
		    $('#days-of-week').datetimepicker({
			daysOfWeekDisabled: [0,6]
		    });
		});
		
		//SUMMERNOTE
		$('#wysiwyg').summernote({
		    height: 300,
		    minHeight: 200,
		    maxHeight: 500,
		    focus: true,
		});
	    });//END
	</script>
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60863013-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>

<!-- Mirrored from cazylabs.com/themes-demo/quarca/ui-advanced-elements.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>