<?php 
require('classes/profile_class.php');
$page='profile';
$userProfileObj=new Profile();

require_once('include/header.php');

if(empty($_GET['uid'])){
	echo "<script>window.location.href='home.php'</script>";
	exit;
}else{
	$isUser = $userProfileObj->isUser($user_id , $_GET['uid']);
	if(!$isUser){
		echo "<script>window.location.href='home.php'</script>";
		exit;
	}
}
$userId=$_GET['uid'];
/*****************88DECREASE REPUTATION******************************/
//mysql_query("UPDATE `sr_user_reputation` SET status=0 WHERE `datetime` <= NOW() - INTERVAL 1 DAY AND `reputation_type` IN(7,8,9) AND status=1");
/**********************************************************************/
if($user_id != ''){
	//echo "SELECT * FROM `sr_profile_visitors` WHERE user_id='".$userId."' AND visitor_id='".$user_id."'";
	$visitorQuery=mysql_query("SELECT * FROM `sr_profile_visitors` WHERE user_id='".$userId."' AND visitor_id='".$user_id."' AND status=1");
	//echo mysql_num_rows($visitorQuery);
	//mysql_query("INSERT INTO sr_profile_visitors SET user_id='".$userId."',visitor_id='".$user_id."' , visited_on ='".DATE_TIME."', updated_on ='".DATE_TIME."'" );
	if(mysql_num_rows($visitorQuery) == 0){
		mysql_query("INSERT INTO sr_profile_visitors SET user_id='".$userId."',visitor_id='".$user_id."' , visited_on ='".DATE_TIME."', updated_on ='".DATE_TIME."'" );
		//REPUTATION
		mysql_query("INSERT INTO sr_user_reputation SET reputation=1, user_id='".$userId."' , reputation_type=7, datetime ='".DATE_TIME."' , status='1'");
	}else{
		$updateQuery =mysql_query("UPDATE sr_profile_visitors SET updated_on ='".DATE_TIME."' WHERE user_id='".$userId."' AND  visitor_id='".$user_id."'" );
	}
}
/*********************************************************************/
//***REWARDS
 $todayVisitorCount = $userProfileObj->getTodayProfileVisitCount($user_id);
//echo '<script>alert("'.$todayVisitorCount.'")</script>';
if($todayVisitorCount == 30){

	$insertReward = $userProfileObj->insertReward($user_id , 1);
}

/*********************************************************************/
$otherUserResult = $userProfileObj->getUserInfo($userId);
$otherInterestQuery = $userProfileObj->getUserInterest($userId);
$CommonInterestCount = $userProfileObj->getUserCommonInterest($user_id , $userId);
$otherphotoQuery = $userProfileObj->getUserPhoto($user_id);
$isUserLiked = $userProfileObj->isUserLike($userId , $user_id);
$isUserLiked1 = $userProfileObj->isUserLike($user_id , $userId);
$isUserFavorite = $userProfileObj->isUserFavorite($userId , $user_id);
$isUserVipMember = $userProfileObj->isVipMember($userId);
$isUserFbLinked = $userProfileObj->isFbLinked($userId);
$profilePercentage=$userProfileObj->getProfilePer($userResult);

$galleryArray= array();
$galleryQuery=mysql_query("Select * from  sr_user_photo where status='1' AND private='0' AND user_id='".$userId."'");
while($galleryResult = mysql_fetch_assoc($galleryQuery)){
	 $galleryArray[] = $galleryResult;
}
$countPhoto=mysql_num_rows($galleryQuery);


$UserPrivatePhotoCount = $userProfileObj->getPrivatePhotoCount($userId);
$MyPhotoCount = $userProfileObj->getMyPhotoCount($user_id);

$otherReputaion = $userProfileObj->getUserReputationText($userId);
$userName= $otherUserResult['user_name'];


$friendsArray = $userProfileObj->getMyFriends($userId);
$friendCount = count($friendsArray);
?>

<!doctype html>
<html>
<head>
	<title>Startrishta | Profile</title>	
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/script.php"); ?>	

</head>
<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
		<?php //include('include/promotion-panel.php');?>
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
			<!-----------------GET ME HERE SLIDER--------------------------------------->
			<?php include('include/header-get-me-here.php');?>
			<!-----------------GET ME HERE SLIDER END----------------------------------->
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row  margin_t-60">
						<!--------------------LEFT SIDE------------------------>
						<?php include('include/profile-left-side.php');?>
						<!---------------------------------------------------------->
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
							<div class="row">
								<!--------PROMOTION PANEL--------------------->
								<?php include('include/promotion-panel.php');?>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view margin-b20">
											<div class="pull-left margin-b10">
												<div class="like-section" style="margin-right:0px !important;">
													<!--View Like Option-->
													<?php
												if($userResult['profile_image'] == ''){ ?>
													<a class="like ld_both" href="javascript:void(0)" data-target="#addProfilePhotoModal" data-toggle="modal" ><img src="images/icon002.png"/></a>
													<a class="dislike ld_both" href="javascript:void(0)" data-target="#addProfilePhotoModal" data-toggle="modal"><img src="images/icon003.png"/></a>
												<?php } else {
													if($isUserLiked1 == 1 && $isUserLiked == 1){?>
														<a class="match" href="javascript:void(0)"><img src="images/match.png"/></a>
													<?php }else {
														if($isUserLiked !=''){
															if($isUserLiked == 0){?>
																<a class="disliked" style="cursor:default;" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"  title="You didn't like <?php if($otherUserResult['gender'] == 2) echo "her!";else { echo "him!";}?>"><img src="images/deslike.png"/></a>
															<?php }
															if($isUserLiked == 1){ ?>
																<a class="liked " style="cursor:default;" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"  title="You liked <?php if($otherUserResult['gender'] == 2) echo "her!";else { echo "him!";}?>"><img src="images/liked.png"/></a>
															<?php }
														}else { ?>
															<a class="like ld_both" id="user_like" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Like <?php if($otherUserResult['gender'] == 2) echo "Her!";else { echo "Him!";}?>!"><img src="images/icon002.png"/></a>
															<a class="dislike ld_both" id="user_unlike" href="javascript:void(0)"  data-toggle="tooltip" data-placement="bottom" title="Not my Type!"><img src="images/icon003.png"/></a>
														<?php } 
													}
												} ?>
												</div>
												
												<div class="like-section name_age" style="margin-right:0px !important;">
													<a class="name" href=""><?php echo $otherUserResult['user_name'];?>,</a><span class="age"> <?php echo (date("Y") - date("Y" , strtotime($otherUserResult['dob'])));?></span>
													<?php if($isUserVipMember || $isUserFbLinked){?>
														<span class="tags"><img src="images/active.png" data-toggle="tooltip" data-placement="bottom"  title="Verified Member"/></span>
													<?php } ?>
												</div>
												
												
												<div class="pull-right status">
													<ul>
														<?php echo $userProfileObj->getStatusIconHtml($otherUserResult['user_id'], $otherUserResult['gender'] , $otherReputaion , $isUserFavorite , $isUserVipMember);?>
														<li id="chkFavIcon"></li>
													</ul>
												</div>
											</div>
											
											<div class="pull-left">
												<div class="intest_box">
													<a href="javascript:void(0)" style="cursor:default;">
														<span><?php echo $CommonInterestCount;?></span>
														<p>INTERESTS &nbsp;&nbsp; IN COMMON</p>
													</a>
												</div>
												<div class="intest_box">
													<a href="javascript:void(0)" style="cursor:default;">
														<span>0</span>
														<p>SHARED FRIENDS</p>
													</a>
												</div>
											</div>
											<div class="pull-left margin-t20">
											<?php
											$photoDisplay = (count($galleryArray)>0)?"block":"none";
											?>
												<div class="pro-photos pro-photos-1" style="display:<?php echo $photoDisplay; ?>;" >
													<div class="slide-box">
														<div class="slider3" >
														<?php 
															$iCount = 1;
															foreach($galleryArray as $gallery)
															{
																$photo_id=$gallery['photo_id'];
																$photo=$gallery['photo'];
																?>
																<div class="slide pointer"><?php 
																	//if(file_exists("doc/photo/".$photo) and ($photo!='') ) { 
																	?><img  id="my-gallery-<?php echo $photo_id.'-'.$iCount;?>" class="my-gallery" src="<?php echo $userProfileObj->getThumbPhotoPath($photo); ?>" /><?php 
																	//} 
																	?>
																</div>
																<?php  
															$iCount++;
															} 
														?>
														</div>
													</div>
												</div>
											</div>
											<div class="divider-line clearfix"></div>
											<div class="pull-left">
												<div class="pro_ttl"><span><?php if($otherUserResult['gender'] == 2) echo "She's";else { echo "He's";}?> here to</span> </div>
												<p><?php echo $userProfileObj->getHereToName($otherUserResult['here_to']);?></p>
											</div>
											<div class="divider-line clearfix"></div>
											<div class="pull-left">
											<?php if($userResult['location_service']){?>
												<div class="pro_ttl-1"><span>Location</span> </div>
												<p><?php echo $otherUserResult['location'];?></p>
											<?php }else{?>
												<p><b class="color-green"><a href="javascript:void(0);" onclick="findLocation('<?php echo $otherUserResult['user_name'];?>');">Find out </a></b>how close <?php echo $otherUserResult['user_name'];?> is to you right now!</p>
											<?php } ?>
											</div>
											<div class="divider-line clearfix"></div>
											<div class="pull-left">
												<div class="pro_ttl-1">
													<span>Interests</span>
												</div>
												<div class="interests">
													<ul>
													<?php 
													if(mysql_num_rows($otherInterestQuery) == 0){
												echo "<li><p>It looks like ".$otherUserResult['user_name']." has not added any interests yet. Ask"; if($otherUserResult['gender'] == 2) echo " her";else echo " him"; echo " what"; if($otherUserResult['gender'] == 2) echo " she";else echo " he";echo " is interested in.<a class='color-green message_now' onclick='location.href = \"user-message.php?chat_id=$otherUserResult[user_id]\"' style='cursor:pointer;' id='messagenow-".$userId."'> Send a Message!</a></p></li>";
													}else{
														while($otherInterestResult=mysql_fetch_assoc($otherInterestQuery)){ ?>
															<li><a class="blue1" href="javascript:void(0)"><span class="<?php echo $otherInterestResult['icon'];?>"></span><p><?php echo $otherInterestResult['interest'];?></p></a></li>
														<?php } 
													} ?>
														<!--
														<li><a href="javascript:void()"><span class="more"></span><p>29</p></a></li>
														-->
													</ul>
												</div>
											</div>
											<?php if($friendCount){?>
												<div class="divider-line clearfix"></div>
												<div class="pull-left">
													<div class="pro_ttl">
														<span>Friends</span>
														<span class="badge"><?php echo $friendCount;?></span>
													</div>
													<div class="pro_friends">
													<p>No Friends</p>
														<ul>
															<?php foreach($friendsArray as $friend){?>
																<li>
																	<a href="profile.php?uid=<?php echo $friend['user_id'];?>">
																		<img src="<?php echo $userProfileObj->getProfileImage($friend['profile_image']);?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $friend['user_name'];?>"/>
																	</a>
																</li>
															<?php } ?>
														</ul>
													</div>
												</div>
											<?php }
											if($otherUserResult['about_me'] != ''){?>
												<div class="divider-line clearfix"></div>
												<div class="pull-left">
													<div class="pro_ttl-1"><span>About <?php if($otherUserResult['gender'] == 2) echo "her";else { echo "him";}?></span> </div>
													<p><?php 
													//if($userResult['about_me'] == ''){
													if(strlen($userResult['about_me']) < 70){
														echo substr($otherUserResult['about_me'] , 0 ,10);
														echo '<b class="color-green"><a href="javascript:void(0)" data-toggle="modal" data-target="#aboutHimModel"> more </a></b>';
													}
													else
														echo $otherUserResult['about_me'];
													?></p>
												</div>
											<?php }
											if($otherUserResult['looking_for'] != ''){?>
												<div class="divider-line clearfix"></div>
												<div class="pull-left">
													<div class="pro_ttl-1"><span>Looking for</span> </div>
													<p>
													<?php 
													//if($userResult['looking_for'] == ''){
													if(strlen($userResult['looking_for']) < 70){
														echo substr($otherUserResult['looking_for'] , 0 ,10);
														echo '<b class="color-green"><a href="javascript:void(0)" data-toggle="modal" data-target="#lookingForModel"> more </a></b>';
													}
													else
														echo $otherUserResult['looking_for'];
													?></p>
												</div>
											<?php
											}
											$userRelationshipStatus = $userProfileObj->getRelationshipName($otherUserResult['relationship_status']);
											$userStarSign = $userProfileObj->getstarSignName($otherUserResult['star_sign']);
											$userSexuality = $userProfileObj->getSexualityName($otherUserResult['sexuality']);
											$userBodyType=$userProfileObj->getBodyTypeName($otherUserResult['body_type']);
											$userComplexion = $userProfileObj->getComplexionName($otherUserResult['complexion']);
											$userEducation = $userProfileObj->getEducationName($otherUserResult['education']);
											//if($userRelationshipStatus == '' && $userStarSign == '' && $userSexuality == '' && $userBodyType == '' && userComplexion == '' && $userEducation == ''){
											if(1){
											?>
												<div class="divider-line clearfix"></div>
												<div class="pull-left">
													<div class="pro_ttl"><span>Personal Info</span></div>
													<div class="par_info">
														<div class="">
															<ul class="user-profile clearfix">
															<?php
															if($userRelationshipStatus){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Relationship Status:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userRelationshipStatus.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															} 
															if($userStarSign){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Star Sign:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userStarSign.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															}
															if($userSexuality){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Sexuality:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userSexuality.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															} 
															if($userBodyType){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Body Type:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userBodyType.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															}
														
															echo '<li>
																<ul class="iner-profile">
																	<li>Drinking:</li>';
																	if($profilePercentage >=50){
																		if($otherUserResult['drinking'] == 1) echo 'Yes'; else echo 'No';
																	}else{
																		echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																	}
															echo '</ul>
															</li>';
															
															echo '<li>
																<ul class="iner-profile">
																	<li>Smoking:</li>';
																	if($profilePercentage >=50){
																		if($otherUserResult['smoking'] == 1) echo 'Yes'; else echo 'No';
																	}else{
																		echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																	}
															echo '</ul>
															</li>';
															
															if($userComplexion){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Complexion:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userComplexion.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															} 
															if($userEducation){
																echo '<li>
																	<ul class="iner-profile">
																		<li>Education:</li>';
																		if($profilePercentage >=50){
																			echo '<li>'.$userEducation.'</li>';
																		}else{
																			echo '<li><b class="color-green"><a data-target="#Alert2update" data-toggle="modal" href="">Show </a></b></li>';
																		}
																echo '</ul>
																</li>';
															} 
															?>
															</ul>
														</div>
													</div>
												</div>
											<?php } ?>
										</div>
									</div>
								</div>
								
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="Repo_box margin-b20">
										<div>
											<h4 class="color-db">Get in touch</h4>
											<ul class="get-in-touch">
											<!--<li class="message_now" id="message_now1-<?php echo $userId;?>">
												<a href="javascript:void(0)">
													<span class="msg"></span> Message Now
												</a>
											</li>-->
											<?php echo $userProfileObj->getUserActionHtml($userId ,$userName , $isUserFavorite, 'other-profile');?>
											</ul>
										</div>
									<!--<div class="align-c"><a href="javascript:void(0);" class="btn btn-default custom slat-blue">Get More Stickers </a></div>-->
									</div>
									<?php if($isUserVipMember || $isUserFbLinked){?>
									<div class="Repo_box margin-b20">
										<div>
											<h4 class="margin-b20 color-db">Verification</h4>
											<ul class="verification">
												<?php if($isUserFbLinked){?>
												<li class="margin-b10">
													<a>
														<span class="icon"><img src="images/facebook.png"/></span>
														<div><strong>Facebook</strong><p><p>Linked</p></p></div>
														<span class="pull-right color-white select"><i class="fa fa-check green"></i></span>
													</a>
												</li>
												<?php } 
												if($isUserVipMember){?>
												<li class="margin-b10">
													<a href="javascript:void(0);">
														<span class="icon"><img src="images/vip-small.png"/></span>
														<div><strong>VIP Membership</strong><p>Linked</p></div>
														<span class="pull-right color-white select"><i class="fa fa-check green"></i></span>
													</a>
												</li>
												<?php } ?>
											</ul>
										</div>
									</div>
									
									<?php 
									}
										$userGiftQuery=mysql_query("SELECT g.gift ,ug.*, u.user_id , u.user_name , u.profile_image FROM sr_gifts g,sr_user_gift ug,sr_users u WHERE ug.gift_id=g.gift_id AND ug.gifted_by=u.user_id AND ug.user_id='".$userId."' AND ug.status=1 AND ug.private=0");
										if(mysql_num_rows($userGiftQuery) > 0) {
										?>
										<div class="Repo_box margin-b20">
											<div class="gift_panel_div" style="height:auto;">
												<h4 class="margin-b10 color-db">Gifts</h4>
												<ul class="stickers">
												<?php
												$giftCount=0;
												while($userGiftresult=mysql_fetch_assoc($userGiftQuery)){
												if($giftCount >= 6){
													$giftClass='d_none gift_div';
												}else {
													$giftClass='';
												}
												?>
													<li class="gift <?php echo $giftClass;?>">
														<a href="javascript:void(0);"><img src="images/<?php echo $userGiftresult['gift'];?>"/></a>
														
														<div class="gift_caps">
															<i class="indicate fa fa-play"></i>
															<ul>
																<li><img src="<?php echo $userProfileObj->getProfileImage($userGiftresult['profile_image']);?>"/></li>
																<li>
																	<div class="name"><a href="profile.php?uid=<?php echo $userGiftresult['user_id'];?>" style="text-decoration:underline;"><?php echo $userGiftresult['user_name'];?></a><i>(<?php echo date('d-M-Y' , strtotime($userGiftresult['gifted_on']));?>)</i></div>
																	<div><p><b><?php echo $userGiftresult['message'];?></b></p></div>
																</li>
															</ul>
														</div>
													</li>
												<?php 
												$giftCount++;
												} ?>
												</ul>
												<?php if(mysql_num_rows($userGiftQuery) > 6) {?>
													<a class="pull-left gifts_more_btn" href="javascript:void(0)">view more</a>
												<?php } ?>
											</div>
										</div>
									<?php } else { ?>
									<div class="Repo_box margin-b20">
										<div class="gift_panel">
											<h4 class="margin-b10 color-db">Gifts</h4>
											<ul class="stickers">
												<li class="gift">
													<a href=""><img src="images/gift.png"></a>
												</li>
												<li class="gift_custom1 ">
													<a href="javascript:void(0)" class="green align-l giveGiftToUser" id="giveGiftToUser3-<?php echo $userId;?>">Get <?php if($otherUserResult['gender'] == 2) echo "Her";else echo "His";;?> attention with a gift!</a>
												</li>
											</ul>
										</div>
									</div>
									<?php } 
									
										/*$userStickerQuery = $userProfileObj->getUserStickers($userId);		
										if(mysql_num_rows($userStickerQuery)){
										?>
										<div class="Repo_box margin-b20">
											<div>
												<h4 class="margin-b25 color-db">Stickers</h4>
												<ul class="stickers">
												<?php while($userStickerResult=mysql_fetch_assoc($userStickerQuery)){ ?>
													<li class="gift">
														<a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="<?php echo $userStickerResult['sticker_text'];?>">
															<img src="images/sticker/<?php echo $userStickerResult['sticker_icon'];?>"/>
														</a>
													</li>
												<?php } ?>
												</ul>
												<?php if(mysql_num_rows($userStickerQuery) > 6){ ?>
												<a class="pull-left interest_more_btn" href="javascript:void()">view more</a>
												<?php } ?>
											</div>
										</div>
										<?php }*/ ?>
									
									<div class="Repo_box margin-b20">
										<div>
											<h4 class="margin-b20 color-db">Stats</h4>
											<p><?php if($otherUserResult['gender'] == 2) echo "She";else { echo "He";}?> is <b>1</b>place in search results with <b><?php echo $userProfileObj->getTodayVisitorCount($userId);?></b> profile visitors today and <b><?php echo $userProfileObj->getMonthVisitorCount($userId);?> </b>profile visitors so far this month.</p>

											<p><?php if($otherUserResult['gender'] == 2) echo "Her";else { echo "His";}?> reputation right now is <span class="red"><?php echo $otherReputaion;?></span></p>
										</div>
									</div>
									
								</div>
							</div>
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
	</div>
<!--Match Div-->

	<div id="matched" class="modal fade login_pop in" role="dialog" aria-hidden="false">
		<div class="modal-dialog match">
			<div class="modal-content light-gray">
				<div>
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal">�</button>-->
						<h4><b>You found a match! </b></h4>
					</div>
					
					<div class="modal-body">
						<div class="kc_match bg_saltblue">
							<div class="identifire clearfix">
								<div><img src="<?php echo $userProfileObj->getProfileImage($userResult['profile_image']);?>" /></div>
								<div><img src="<?php echo $userProfileObj->getProfileImage($otherUserResult['profile_image']);?>" /></div>
								<div class="match_icon"><img src="images/match.png"/></div>
							</div>
							<div class="pull-left white full align-c margin-t30"><h3 >You found a match. <br /><?php echo $userName;?> likes you too! </h3></div>
						</div>
					</div>
					
					<div class="modal-footer">
						<div class="button-u">
							<a href="user-message.php" onclick="document.location='user-message.php'" class="message_now" style="display: inline-block;" id="message_nowkc-<?php echo $otherUserResult['user_id'];?>" class="pull-right b_red">Send <?php if($otherUserResult['gender'] == 2) echo "Her";else { echo "Him";}?> a Message</a>
						</div>
						<div class="button-u"><a href="profile.php?uid=<?php echo $otherUserResult['user_id']; ?>" class="pull-left">Cancel</a></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<!--Match Div-->
	<!---LOCATION ---->
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


<!---------------------------------------------------------------------------------------------------------->
<?php 
	$iCount=1;
	foreach($galleryArray as $gallery){
		$photo_id=$gallery['photo_id'];
		include('slider/profile-gallery.php');
		$iCount++;
	}
?>
<!---------------------------------------------------------------------------------------------------------->
<script src="js/profile.js"></script>
<script src="js/photo.js"></script>
<script src="js/jquery.arbitrary-anchor.js"></script>

<script>
$(function(){
	/*********************GALLERY SLIDER*****************************/
	$(".fb_caps_btn").click(function(){
		$(".slider-container-fadebox-1").css("display","none");
		$(".facebook_option").css("display","block");
	});
	$(".lock_caps_btn").click(function(){
		$(".slider-container-fadebox-1").css("display","none");
		$(".lock_option").css("display","block");
	});
	$(".skip_private_photo").click(function(){
		$(".slider-container-fadebox-1").css("display","none");
	});
	$(".list-bxslider li a").click(function(){
		$(".lock_option").hide();
	});
	$(".report_photo_btn").click(function(){
		//$(".slider-container-fadebox-1").css("display","none");
		var id=$(this).attr('id').split('-');
		$('.reportPhotoId').val(id[3]);
		$(".photo_report").css("display","block");
	});
	$(".cancel_photo_report").click(function(){
		$(".photo_report").hide();
	});
	
	$('.reportPhotoTextarea').keyup(function(){
		var value = $(this).val();
		var len = value.length;
		if(len <= 500) {
			$('.count_reportPhoto').text(len+'/500');
		}
	});
	
	$(".submit_photo_report").click(function(){
		var id=$(this).attr('id').split('-');
		var photo_id=id[1];
		var iCount=id[2];
		var reason = $('input[name=reportPhotoReason]:checked').val();
		var description = $('#reportPhotoTextarea-'+photo_id+'-'+iCount).val();
		var photo_id = $('.reportPhotoId').val();
		description.trim();
		if(typeof reason === "undefined"){
			reason=''
		}
		if(reason == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please select a reason.');
			$('#alert_modal').modal('show');
			return false;
		}else if(reason == 'Other' && description==''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter reason description.');
			$('#alert_modal').modal('show');
			$('.reportPhotoTextarea').focus();
			return false;
		}
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/photo.php",
			data:{report_photo_id : photo_id ,reason:reason ,description:description,action : 'reportPhoto'},
			success:function(result){
				$('#preloader').hide();
				$(".photo_report").hide();
				if(result == 1){
					$(".report_confirm").css("display","block");
				}else if(result == 0){
					alert('Problem in network.please try again.');
				}
			}
		});
		return false;
	});
	$(".done_report").click(function(){
		$(".report_confirm").css("display","none");
	});
	
	$(".gifts_more_btn").live('click' , function(){
		var gift_sec = $(this).html();
		//alert(gift_sec);
		if(gift_sec=='view more'){
			$(this).html('view less');
			$('.gift').removeClass('d_none');
		}
		else{
			$(this).html('view more');
			$('.gift_div').addClass('d_none');
		}
	});
	$('#gift_msg').keyup(function(){
		var value = $(this).val();
		var len = value.length;
		if(len <= 70) {
			$('#count_gift').text(len +'/70');
		}
	});
});
function findLocation(name){
	
	$('#location-user-name').html(name);
	$('#search_location').modal('show');
	
}
function getLocation(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition,showError);
	}
	else{
		$('#near_location').html("Geolocation is not supported by this browser.");
	}
}
function showPosition(position){
	//$('#near_location').htm("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);   
	$.ajax({
		type:"POST",
		url:"ajax/search.php",
		data:{action:'enableLocationService'},
		success:function(result){
			if(result== 0){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Problem in network.Please try again');
				$('#alert_modal').modal('show');
			}else{
				window.location.href='';
			}
		}
	});
}
function showError(error){
	$('#near_location').html("Geolocation is not supported by this browser.");
}
$(document).ready(function(){
  $('.myphotosfix').bxSlider({pager:false, controls:false,});
});
</script>
<style>
.bxslider-wrap { visibility: hidden; }
.custom_profile_slide{ width:100%;}
.custom_report{ position: absolute;
left: -110px;
width: auto;
bottom: 79px;
top: auto;
text-align: left;}
</style>

</body>
</html>