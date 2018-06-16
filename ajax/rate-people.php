<?php
require('../classes/photo_class.php');
$userProfileObj = new Photo();
$user_id = $_SESSION['user_id'];

$offset=1;
if(isset($_GET['limit'])){
	$limit=$_GET['limit'];
}else{
	$limit=0;
}
$addQuery='';
if( isset($_REQUEST['action']) && $_REQUEST['action']=='Rating' )
{
	$photoId = $_REQUEST['photoId'];
	$ratedValue = $_REQUEST['value'];
	$rate_photo_id = $_POST['rate_photo_id'];
	$rate_photo_count = $_POST['rate_photo_count'];
	
	$query = mysql_query("Select * from sr_photo_rating where photo_id = '".$photoId."' AND rated_by = '".$user_id."'");
	if( mysql_num_rows($query) == 0 )
	{
		$queryInsert = mysql_query("INSERT INTO sr_photo_rating SET photo_id='".$photoId."',rating='".$ratedValue."',rated_by='".$user_id."',rated_on='".DATE_TIME."',updated_on='".DATE_TIME."'");
	}
	else{
		$queryInsert = mysql_query("UPDATE sr_photo_rating SET updated_on='".DATE_TIME."' , rating='".$ratedValue."' WHERE photo_id='".$photoId."' AND rated_by='".$user_id."'");
	}
	
	#REWARDS
	$todayPhotoRateCount = $userProfileObj->getTodayPhotoRateCount($user_id);
	if( $todayPhotoRateCount == 30 )
	{
		$insertReward = $userProfileObj->insertReward($user_id , 2);
	}
	
	if( $rate_photo_count == 1 )
	{
		mysql_query("UPDATE sr_user_photo SET rate_status=1 WHERE photo_id='".$rate_photo_id."'");
	}
	
	
	#Mail to user his/her photo got rating more than 8
	if( $ratedValue>8 )
	{
		$mailToUser = mysql_query("Select sul.email_id, su.user_name from sr_user_login sul 
		join sr_user_photo sup on sup.user_id = sul.user_id 
		join sr_users su on su.user_id = sul.user_id 
		where sup.photo_id = '".$photoId."' ");
		
		if( mysql_num_rows($mailToUser)>0 )
		{
			$mailToUserFetch = mysql_fetch_array($mailToUser);
			$objEmail = new Email();
			$objEmail->mailaccount='start_rishta';
			$objEmail->to=$mailToUserFetch['email_id'];
			$objEmail->from=ADMINMAIL2;
			$objEmail->fromname=Email_FROMNAME;
			$objEmail->bcc=Email_BCC;
			$objEmail->subject = "Startrishta: Someone New has rated your photo!";
			$objEmail->body = '<html>
				<head>
					<title></title>
					<style type="text/css">
				    	body {margin: 0; padding: 0; min-width: 100%!important;}
				    	.content {width: 100%; max-width: 600px;}
				    </style>
				</head>
				<body><!-- font-family: Open Sans,sans-serif; -->
				<table width="100%" style="max-width:600px; margin:auto; " bgcolor="#E36356" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:30px;">
							<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td style="max-width:100%; width:100%; padding-top:20px;"><img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>
								</tr>
								<tr>
									<td style="text-align:center; padding-top:20px;">
										<h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">Hi '.$mailToUserFetch["user_name"].'</h2>
									</td>
								</tr>
								<tr>
									<td style="padding:0 30px 15px;">
									New people have rated your photos! Login to your profile and take a look.<br /><br /><br />
												<a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
												href="'.SITEURL.'account-verify.php?action=ratePhoto">Click here to Login</a><br/><br/>
									</td>
								</tr>
								<tr>
									<td style="padding:20px 30px 20px;">
										<p style="font-size:14px;">Thanks,<br>Startrishta.com Team</p>
									</td>
								</tr>
								<tr>
									<td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">
										<ul style="text-align:center; padding:0; margin:0;">
											<li style="list-style:none; display:inline-block; 
											font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
											<li style="list-style:none; display:inline-block;vertical-align: bottom;">
											<a href="https://www.facebook.com/startrishta/" target="_blank" 
											style="display:block;">
											<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>
											</li>
											<li style="list-style:none; display:inline-block; vertical-align: bottom;">
											<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">
											<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</td>
					</tr>
						<td>
							<img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />
						</td>
					<tr>
					</tr>
				</table>
				</body>
				</html>';
			//print_r($objEmail);exit;
			$email_response = $objEmail->sendemail();
			//print_r($email_response);exit;
			//exit;
			//return $email_response;
		}
	}
	//echo ( $queryInsert )?1:0;

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
//	print_r($photoRatingResult);
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
															<img src="<?php echo 'upload/photo/'.$photoImg; ?>"/>
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
													<img src="<?php echo 'upload/photo/'.$prePhotoResult['photo']; ?>"/>
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
							<script type="text/javascript" src="js/rate-photo.js"></script>
							<script type="text/javascript" src="js/search.js"></script>
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
							<script type="text/javascript" src="js/rate-photo.js"></script>
							<script type="text/javascript" src="js/search.js"></script>
						<?php }
}
//echo 'success';
if(isset($_REQUEST['action']) && $_REQUEST['action']=='Skip')
	{

	}
if( isset($_REQUEST['action']) && $_REQUEST['action']=='showMeUser' )
{
	$show_me_option = $_REQUEST['show_me_option'];
	
	$query = mysql_query("UPDATE sr_users SET photo_preference='".$show_me_option."' where user_id='".$user_id."'");
	echo ($query)?1:0;
}
?>

