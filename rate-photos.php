<?php 
require('classes/photo_class.php');
$page='rate-photos';
$userProfileObj=new Photo();

require_once('include/header.php');

$offset=1;
if(isset($_GET['limit'])){
	$limit=$_GET['limit'];
}else{
	$limit=0;
}
$addQuery='';

?>

<!doctype html>
<html>
<head>
	<title>Startrishta | Rate People Photos</title>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/script.php"); ?>
</head>

<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll in">
				<div class="container">
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
				</div>
			</div>
			
			<div class="border_grad"></div>
			<!-- Startheader get me here -->
			<?php include("include/header-get-me-here.php"); ?>
			<!-- End header get me here -->
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row margin_t-60">
						<!--------------------LEFT SIDE------------------------>
						<?php include('include/profile-left-side.php');?>
						<!---------------------------------------------------------->
						<div id="finaldiv">
						<?php

						$chkProfilePicture = mysql_query("Select profile_image, location_service from sr_users where user_id = '".$user_id."' and profile_image!='' ");
						$myPhotoCount = $userProfileObj->getMyPhotoCount($user_id);
						
						#Check Block List
						$blockList = "Select Distinct block_by from sr_user_block where user_id = '".$user_id."' ";

						if( isset($_GET['pid']) )
						{
							$photo_id = $_GET['pid'];
							//$photoRatingQuery=mysql_query("SELECT photo_id, photo FROM `sr_user_photo` WHERE photo_id='".$photo_id."' AND rate_status=1");
							//echo "SELECT photo_id, photo FROM `sr_user_photo` 	WHERE photo_id='".$photo_id."' and user_id NOT IN (".$blockList.") ";
							$photoRatingQuery = mysql_query("SELECT photo_id, photo FROM `sr_user_photo`
							WHERE photo_id='".$photo_id."' and user_id NOT IN (".$blockList.") ");
							$getPhotoRateQuery = mysql_query("SELECT rating FROM sr_photo_rating WHERE photo_id='".$photo_id."' AND rated_by='".$user_id."'");
							$getPhotoRateResult = mysql_fetch_assoc($getPhotoRateQuery);
							$photo_rating = $getPhotoRateResult['rating'];
						}
						else
						{
							$photo_rating='';
							if( $photo_preference == 1 )
							{
								$addQuery .= "AND u.gender=2";
							}
							else if( $photo_preference == 2 )
							{
								$addQuery .= "AND u.gender=1";
							}
							//echo "SELECT p.photo_id,p.photo FROM `sr_user_photo` p , sr_users u WHERE u.user_id=p.user_id AND p.user_id !='".$user_id."' AND p.private='0' AND p.rate_status=1 AND p.status='1' ".$addQuery." AND p.photo_id NOT IN (SELECT photo_id FROM sr_photo_rating where rated_by='".$user_id."') and p.user_id NOT IN (".$blockList.") ORDER BY p.created_on LIMIT ".$limit.", ".$offset."";
							$photoRatingQuery = mysql_query("SELECT p.photo_id,p.photo FROM `sr_user_photo` p , sr_users u WHERE u.user_id=p.user_id AND p.user_id !='".$user_id."' AND p.private='0' AND p.rate_status=1 AND p.status='1' ".$addQuery." AND p.photo_id NOT IN (SELECT photo_id FROM sr_photo_rating where rated_by='".$user_id."') and p.user_id NOT IN (".$blockList.") ORDER BY p.created_on LIMIT ".$limit.", ".$offset."");
						}
						
						$photoRatingResult = mysql_fetch_assoc($photoRatingQuery);
						$photoId = $photoRatingResult['photo_id'];
						$photoImg = $photoRatingResult['photo'];
						
						if( $myPhotoCount >0 || mysql_num_rows($chkProfilePicture)>0 )
						{ 
							$chkProfilePictureFetch = mysql_fetch_array($chkProfilePicture);
							$loc_service = $chkProfilePictureFetch['location_service'];
							
							?>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
								<div class="row">
									<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
										<div class="row">
										<?php 
										if( mysql_num_rows($photoRatingQuery) >0 )
										{ 
											?>
											<input type="hidden" id="photoId" value="<?php echo $photoId;?>">
											<div class="profile_view rate-pp margin-b20">
												<div class="align-c title margin-b10">How would you rate this photo?</div>
											<div class="rate_score reted_scoring">
											<fieldset class="rating">
											<?php 
											for($i=10; $i>=1; $i--){
												if($i==10 || $i==9){
													$class='r_veryhigh';
													$title='Excellent';
												}else if($i==8 || $i==7){
													$class='r_high';
													$title='Good';
												}else if($i==6 || $i==5 || $i==4){
													$class='r_medium';
													$title='OK';
												}else if($i==3 || $i==2){
													$class='r_low';
													$title='Bad';
												}else if($i==1){
													$class='r_lowest';
													$title='Eww';
												}
												if($photo_rating == $i){
											?>
												<input type="radio" id="star<?php echo $i;?>" name="rating" value="<?php echo $i;?>" checked="checked"/>
												<label for="star<?php echo $i;?>" class="<?php echo $class;?>" title="<?php echo $title;?>"><p><?php echo $i;?></p></label>
											<?php } else { ?>
												<input type="radio" id="star<?php echo $i;?>" name="rating" value="<?php echo $i;?>" />
												<label for="star<?php echo $i;?>" class="<?php echo $class;?>" title="<?php echo $title;?>"><p><?php echo $i;?></p></label>
											<?php } 
											} ?>
											</fieldset>
											<!--
												<input type="radio" id="star10" name="rating" value="10" />
												<label for="star10" class="r_veryhigh" title="Excellent"><p>10</p></label>
												<input type="radio" id="star9" name="rating" value="9" />
												<label for="star9" class="r_veryhigh" title="Excellent"><p>9</p></label>
												<input type="radio" id="star8" name="rating" value="8" />
												<label for="star8" class="r_high" title="Good"><p>8</p></label>
												<input type="radio" id="star7" name="rating" value="7" />
												<label for="star7" class="r_high" title="Good"><p>7</p></label>
												<input type="radio" id="star6" name="rating" value="6" />
												<label for="star6" class="r_medium" title="OK"><p>6</p></label>
												<input type="radio" id="star5" name="rating" value="5" />
												<label for="star5" class="r_medium" title="OK"><p>5</p></label>
												<input type="radio" id="star4" name="rating" value="4" />
												<label for="star4" class="r_medium" title="OK"><p>4</p></label>	
												<input type="radio" id="star3" name="rating" value="3" />
												<label for="star3" class="r_low" title="Bad"><p>3</p></label>
												<input type="radio" id="star2" name="rating" value="2" />
												<label for="star2" class="r_low" title="Bad"><p>2</p></label>
												<input type="radio" id="star1" name="rating" value="1" />
												<label for="star1" class="r_lowest" title="Eww"><p>1</p></label>
												-->
												<div class="align-c score">No Score</div>
											</div> 
											<div class="photo4rate">
												<span>
												<a class="align-c" id="skip_photo" href="rate-photos.php?limit=<?php echo ($limit+1);?>">Skip</a>
												</span>
												<div class="image">

													 <?php //if(file_exists("doc/photo/".$photoImg) and ($photoImg!='') ) { ?>
														<img src="<?php echo $userProfileObj->getPhotoThumbPath($photoImg); ?>"/>
													 <?php //} else { ?>
														<!--<img src="images/photo4rate.png"/> -->
													<?php //} ?>
													<a href="javascript:void(0);" class="pull-right" href="javascript:void(0);" data-toggle="modal" data-target="#rp-report-photo"><img src="images/flag.png"/>Report photo</a>
												</div>
											</div>
										</div>
									<?php } else if(mysql_num_rows($photoRatingQuery) == 0){ ?>
										<div class="profile_view rate-pp margin-b20">
											<div class="photo4rate">
												<div class="align-c margin-b30 margin-t30">
													<img src="images/photo-icon.png"/>
												</div>
												<div>
													<h3 class="align-c">Great Work !</h3>
													<p class="align-c">You've rated every photo in your area.<br />
													Be sure to come back later to check out more photos.</p>
													<p class="align-c">Why don't you <a href="search.php">search for new people</a> to talk to?</p>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<!----------------RIGHT SIDE START---------------------------------->
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<?php 
								$prePhotoQuery=$userProfileObj->getPreRatedPhoto($user_id);
								if(mysql_num_rows($prePhotoQuery)){
								$prePhotoResult=mysql_fetch_assoc($prePhotoQuery);
								$isUserFavorite = $userProfileObj->isUserFavorite($prePhotoResult['user_id'] , $user_id);
								$isUserVipMember = $userProfileObj->isVipMember($prePhotoResult['user_id']);
								$reputation = $userProfileObj->getUserReputationText($prePhotoResult['user_id']);
								
								#Find Here to icon
								$userIsHereTo = $prePhotoResult['here_to'];
								$hereToIcon = mysql_query("Select icon from sr_here_to where here_to_id = '".$userIsHereTo."' ");
								$hereToIconVal = "";
								if( mysql_num_rows($hereToIcon)>0 )
								{
									$hereToIconFetch = mysql_fetch_array($hereToIcon);
									$hereToIconVal = $hereToIconFetch['icon'];
								}
								
								?>
									<div class="Repo_box prev-photo">
										<h4 class="margin-b10">Previous Photo</h4>
										<div class="p_pic">
											<?php //if(file_exists("doc/photo/".$prePhotoResult['photo']) and ($prePhotoResult['photo']!='') ) { ?>
												 <img src="<?php echo $userProfileObj->getPhotoPath($prePhotoResult['photo']); ?>"/>
											<?php //} ?>
											
										</div>
										<div class="name"><span class="dot"><a></a></span><a href="profile.php?uid=<?php echo $prePhotoResult['user_id'];?>"><?php echo $prePhotoResult['user_name'];?></a><img src="images/active.png"/></div>
										<div class="icon_sybol">
											<ul>
												<?php echo $userProfileObj->getStatusIconHtml($prePhotoResult['user_id'] ,$prePhotoResult['gender'] , $reputation , $isUserFavorite , $isUserVipMember);?>
											</ul>
										</div>
										
										<div class="icon_sybol">
										<ul class="ch-ic-sy-text">
										<?php 
										$interestQuery = mysql_query("SELECT i.interest FROM sr_user_interest ui , sr_interest i WHERE ui.interest_id=i.interest_id AND user_id='".$prePhotoResult['user_id']."' LIMIT 0,4");
										while( $interestResult = mysql_fetch_assoc($interestQuery) )
										{
											echo "<li>".$interestResult['interest']."</li>";
										}
										?>
										</ul>
										</div>
										<ul class="pull-left links_ratepp">
											<li class="active">
											
											<span class="heart_location">
												<?php
												if( $hereToIconVal!="" )
												{
													echo "<img src = \"images/".$hereToIconVal."\"/>";
												}
												?>
											</span>
											
											<?php 
											if( $loc_service )
											{
												echo '<a href="javascript:void(0);">'.$prePhotoResult['location'].'</a>';
											}
											else
											{
												?><a href="javascript:void(0);" onclick="findLocation('<?php echo $prePhotoResult['user_name']; ?>');">
												See how near <?php if($prePhotoResult['gender']== 1) echo 'he'; else if($prePhotoResult['gender']== 2) echo 'she';?> was...
												</a><?php 
											} 
											?>
											
											</li>
											<li><?php if($prePhotoResult['gender']== 1) echo 'His'; else if($prePhotoResult['gender']== 2) echo 'Her';?> average rating is <span class="badge pull-right b_green"><?php echo round($userProfileObj->getPhotoAverageRating($prePhotoResult['photo_id']) , 2);?></span></li>
											<li>You gave them <span class="badge pull-right b_orange"><?php echo $prePhotoResult['rating']; ?></span></li>
										</ul>
									</div>
									<?php }
									$getNextPhotoQuery=$userProfileObj->getNextPhoto($user_id);
									if(mysql_num_rows($getNextPhotoQuery)){
									$getNextPhotoResult=mysql_fetch_assoc($getNextPhotoQuery);
									$getNextPhotoCount=$userProfileObj->getNextPhotoCount();
									?>
										<input type="hidden" id="rate_photo_id" value="<?php echo $getNextPhotoResult['photo_id'];?>">
										<input type="hidden" id="rate_photo_count" value="<?php echo $getNextPhotoCount;?>">
										<div class="Repo_box margin-t10 margin-b20">
										<div>
											<h4 class="margin-b10">Get your next photo rated</h4>
											<ul class="stickers rate_pp">
												<li>
													<a href="javascript:void(0);">
														<?php //if(file_exists("doc/photo/".$getNextPhotoResult['photo']) and ($getNextPhotoResult['photo']!='') ) { ?>
																<img src="<?php echo $userProfileObj->getPhotoPath($getNextPhotoResult['photo']); ?>"/>
														<?php //} ?>
													</a>
												</li>
												<li class="gift_custom padding_t0">
													<p>Rate <?php echo $getNextPhotoCount;?> more photos to have your next photo rated.  </p>
												</li>
											</ul>
											<div class="rate_prog_bar">
												<div class="bar left">
													<div class="line"><a href="javascript:void(0);" style="width:<?php echo (10 -$getNextPhotoCount);?>0%"></a></div>
												</div>
												<div class="ratting"><?php echo $getNextPhotoCount;?></div>
											</div>
										</div>
									</div>
									<?php }else { ?>
										<input type="hidden" id="rate_photo_id" value="">
										<input type="hidden" id="rate_photo_count" value="">
									<?php } ?>
								</div>
								<!----------------RIGHT SIDE END---------------------------------->
							</div>
						</div>
					<?php } else { 
					//###########################IF USER HAVENOT PHOTOS####################################
					?>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12" >
						<div class="row">
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<div class="row">
									<div class="profile_view rate-pp margin-b20">
									 <div class="align-c title margin-b10">How would you rate this photo?</div>
										<div class="rate_score">
											<ul id="notrating">
												<li><a  href="javascript:void(0);"><p>1</p></a></li>
												<li><a  href="javascript:void(0);"><p>2</p></a></li>
												<li><a  href="javascript:void(0);"><p>3</p></a></li>
												<li><a  href="javascript:void(0);"><p>4</p></a></li>
												<li><a  href="javascript:void(0);"><p>5</p></a></li>
												<li><a  href="javascript:void(0);"><p>6</p></a></li>
												<li><a  href="javascript:void(0);"><p>7</p></a></li>
												<li><a  href="javascript:void(0);"><p>8</p></a></li>
												<li><a  href="javascript:void(0);"><p>9</p></a></li>
												<li><a  href="javascript:void(0);"><p>10</p></a></li>
											</ul>
										</div>
										<div class="photo4rate">
											<span><a class="align-c" href="rate-photos.php">Skip</a></span>
											<div class="image">
												 <?php //if(file_exists("doc/photo/".$photoImg) and ($photoImg!='') ) { ?>
														<img src="upload/photo/<?php echo $photoImg; ?>"/>
													 <?php //} else { ?>
														<!--<img src="images/photo4rate.png"/> -->
													<?php //} ?>
												<a href="javascript:void(0);" class="pull-right" ><img src="images/flag.png"/> Report photo</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
								<div class="Repo_box">
									<div class="photos empty clearfix">
										<div>
											<a href=""><img src="images/dammy-profile-popup2.png"/></a>
										</div>
										<p class="align-c">To rate other people you<br /> have to add some photos<br /> of yourself first.</p>
									</div>
									<div class="align-c"><a href="javascript:void(0);" data-target="#addMyPhotoModal" data-toggle="modal" class="btn btn-default custom slat-blue">Add Photos </a></div>
								</div>
							</div>
						</div>
					</div>
					<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
	
		<!--Footer start here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
		<!--Footer end here-->
	<!------------------------REPORT PHOTO---------------------------------->
<div id="rp-report-photo" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Report Photo</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form" method="post" action="">
							<div class="popup_add_photo">
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Inappropriate Photo" name="rp_reportphoto" id="rp_reportphoto1">
								<label for="rp_reportphoto1"><span class="left"><span></span></span><p class="left">Inappropriate Photo</p></label>
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Threatening behaviour" name="rp_reportphoto" id="rp_reportphoto2">
								<label for="rp_reportphoto2"><span class="left"><span></span></span><p class="left">Threatening behaviour</p></label>
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Other" name="rp_reportphoto" id="rp_reportphoto3">
								<label for="rp_reportphoto3"><span class="left"><span></span></span><p class="left">Other</p></label>
							</div>
							<div class="report">
								<textarea id="rp_reportphotoTextarea" maxlength='500'></textarea>
								<div class="word_count"><span id="count_rp_reportphoto">0</span>/500</div>
							</div>
							<div class="photo_cmnt_btn report margin-t5 clearfix align-c">
								<!--<a href="javascript:void(0);" id="rp_reportphotoSubmit" class="btn btn-default padding-lr-40 custom red">Submit</a>
								<span class="pull-left"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);" data-dismiss="modal">Cancel</a></span>-->
								<a href="javascript:void(0);" id="rp_reportphotoSubmit" class="btn btn-default padding-lr-40 custom red">Submit</a>
								 &nbsp; <b>or</b> &nbsp;  <a href="javascript:void(0);" class="green" data-dismiss="modal">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End report abuse-->
	
	<!--Report Succussfully-->
	<div id="rp-report-succussfully" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Thank You!</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo"></div>
							<div>
							<h5 class="align-c lh-20"><b>  We've received your report and will review it as soon as we can. If we find the user is in violation of our policies we will take direct action.</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--End Report Succussfully-->
	
	<div id="search_location" class="modal fade login_pop" role="dialog" style="z-index:10000;">
		<div class="modal-dialog-1" style="width:434px;">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Location</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
								<h5 class="align-c lh-20"><b>To find out how close <span id="location-user-name"></span> is to you, you need to switch on the location service on your browser</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" onclick="getLocation();">Turn on your Browsers Location Services</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	</div>
	<script type="text/javascript" src="js/rate-photo.js"></script>
	<script type="text/javascript" src="js/search.js"></script>
	
</body>
</html>