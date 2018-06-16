<?php 
require('classes/profile_class.php');
$page='home';
$userProfileObj=new Profile();

require_once('include/header.php');

//***************MODERATE PHOTO REVIEW
mysql_query("UPDATE sr_user_photo SET status=3 where user_id='".$user_id."' AND status=2");

$userInterestQuery = $userProfileObj->getUserInterest($user_id);
$userInterestCount=mysql_num_rows($userInterestQuery);
$interestIdArray=array();


$user_name=$userResult['user_name'];
$dob=$userResult['dob'];
$gender=$userResult['gender'];
$profile_image=$userResult['profile_image'];
$location=$userResult['location'];
$location_lat=$userResult['location_lat'];
$location_lon=$userResult['location_lon'];
$relationship_status=$userResult['relationship_status'];
$sexuality=$userResult['sexuality'];
$star_sign=$userResult['star_sign'];
$body_type=$userResult['body_type'];
$complexion=$userResult['complexion'];
$height=$userResult['height'];
$eye_color=$userResult['eye_color'];
$hair_color=$userResult['hair_color'];
$language=$userResult['language'];
$smoking=$userResult['smoking'];
$drinking=$userResult['drinking'];
$kids=$userResult['kids'];
$education=$userResult['education'];
$work=$userResult['work'];
$income=$userResult['income'];
$company=$userResult['company'];
$about_me=$userResult['about_me'];
$looking_for=$userResult['looking_for'];
$here_to=$userResult['here_to'];
$here_with_guy=$userResult['here_with_guy'];
$here_with_girl=$userResult['here_with_girl'];
$here_age_min=$userResult['here_age_min'];
$here_age_max=$userResult['here_age_max'];

$profilePercentage=$userProfileObj->getProfilePer($userResult);

$interestQuery=$userProfileObj->getInterest($user_id);
$languageArray = $userProfileObj->getLanguage();
$userLanguageArray = $userProfileObj->getUserLanguage($user_id);

$interestArray = array();
while($userInterestResult = mysql_fetch_assoc($userInterestQuery)){
	$interestIdArray[]=$userInterestResult['interest_id'];
	$interestArray[]=$userInterestResult;
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Profile</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
					<div class="row margin_t-60">
					<!--------------------LEFT SIDE------------------------>
						<?php include('include/profile-left-side.php');?>
					<!---------------------------------------------------------->
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="row">
							<!--------PROMOTION PANEL--------------------->
							<?php include('include/promotion-panel.php');?>
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view margin-b20">
										<!--##########################BASIC INFORMATION##################-->
											<div class="pull-left" id="basic-info-view">
												<div id="basic-info">
													<span class="pro_name_m" id="userName"><?php echo $user_name;?></span>
													<span class="pro_age_m" id="userDob">
														<?php  if($userResult['dob'] != ''){ 
															echo ' , ';
															echo (date('Y') - date('Y' ,strtotime($dob))) ; 
														} ?>
													</span>
												</div>
												<!--<a id="edit-btn" class="edit"><i class="fa fa-pencil"></i></a>-->
												<a href="javascipt:void(0);" id="edit-basic-info" class="edit bg">
													<i class="fa fa-pencil"></i>
													<span class="pull-right">edit</span>
												</a>
												<a href="#" class="parmot_profile" data-toggle="tooltip" data-placement="bottom"  
												title="Pormoted profile 15 minutes ago"></a>
											</div>
											<!-----------------EDIT VIEW------------------------------------>
											<div class="pull-left" id="basic-info-edit" style="display:none;">
												<form class="pro_name" method="post">
													<ul>
														<li>
															<label class="red">Name</label>
															<input type="text" name="user_name" id="user_name" value="<?php echo $user_name ;?>"/>
														</li>
														<?php if($userResult['dob_update'] > 2){?>
														<li>
															<label class="red">Date Of Birth</label>
															<input type="text" name="dob" id="user_dob" class="input-group" data-date-format="yyyy-mm-dd" value="<?php echo date('d-m-Y' , strtotime($dob));?>" disabled>
														</li>
														<?php }else{ ?>
														<li>
															<label class="red">Date Of Birth</label>
															<input type="text" name="dob" id="user_dob" class="input-group" data-date-format="yyyy-mm-dd" value="<?php echo date('d-m-Y' , strtotime($dob));?>">
														</li>
														<?php } ?>
													</ul>
													<ul class="pro_edit_btn">
														<li>
															<input class="btn pull-left" type="button" value="Save" id="save-basic-info"/>
                                                            <div class="cancel">or   <a href="javascript:void(0);" id="cancel-basic-info">Cancel</a></div></li>
														<?php if($userResult['dob_update'] == 0){?>
														<li><div>Age can only be <strong>changed two times</strong></div></li>
														<?php }else if($userResult['dob_update'] == 1){?>
														<li><div>Age can only be <strong>changed once more</strong></div></li>
														<?php }else{ ?>
														<li><div>Age already updated <strong>two times</strong></div></li>
														<?php } ?>
													</ul>
												</form>
											</div>
										<!--###########################################################-->
											<div class="pull-left margin-t10">
												<div class="intest_box">
													<a href="">
														<span><?php echo $userInterestCount;?></span>
														<p>YOUR INTERESTS</p>
													</a>
												</div>
												<div class="intest_box">
													<a href="">
														<span>0</span>
														<p>YOUR FRIENDS</p>
													</a>
												</div>
												<div class="photos_btn">
													<!--<a href="myphoto.php" data-toggle="modal">-->
													<a href="photos.php">
														<i class="fa fa-camera"></i> My Photos
													</a>
												</div>
											</div>
											<!-----*****************************************************--->
											<?php include('include/profile-photo.php');?>
											<!-----*****************************************************--->
											<div class="divider-line clearfix"></div>
										<!--##########################I M HERE TO##################-->
											<div class="pull-left" id="here-to-view">
												<div class="pro_ttl"><span>I�m here to</span> 
													<a href="javascript:void(0);" id="edit-here-to" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<p><?php echo $userProfileObj->getHereToName($userResult['here_to']);?></p>
												
											</div>
											<div class="pull-left" id="here-to-edit" style="display:none;">
												<div class="pro_ttl"><span>I�m here to</span></div>
												<div class="filter">
												<div class="form-group p_edit">
													<form method="POST" action="">
														<input type="hidden" value="<?php echo $here_to;?>" id="here_to" name="here_to" />
														<input type="hidden" value="<?php echo $here_age_min;?>" id="here_age_min" name="here_age_min" />
														<input type="hidden" value="<?php echo $here_age_max;?>" id="here_age_max" name="here_age_max" />
														<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-heart"></i> &nbsp; <?php echo $userProfileObj->getHereToName($here_to);?></span>
														<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
														<ul class="pull-left p_edit">
															<li>With</li>
															<li>
																<input id="here_with_guy" type="checkbox" name="here_with_guy" <?php if($here_with_guy==1) {echo 'checked';}?>>
																<label for="here_with_guy">
																<span class="pull-left"></span><p class="pull-left">Guys</p></label>
															</li>
															<li>
																<input id="here_with_girl" type="checkbox" name="here_with_girl" <?php if($here_with_girl==1) {echo 'checked';}?>>
																<label for="here_with_girl">
																<span class="pull-left"></span><p class="pull-left">Girls</p></label>
															</li>
														</ul>
														<div class="clearfix"></div>
														<ul class="p_locations clearfix fontawesome-select">
														<?php 
															$hereToArray=$userProfileObj->getHereTo();
															foreach($hereToArray as $hereTo){
															?>
															<li class="p_location here_to" data-id="<?php echo $hereTo['here_to_id'];?>">
																<a href="javascript:void(0);">
																<?php echo $hereTo['html_icon'];?> <span><?php echo $hereTo['here_to'];?></span>
																</a>	
															</li>
															<?php } ?>
														</ul>
														<div class="age_bar">
															<label for="amount">Age:</label>
															<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
														</div>
														<div id="slider-range"></div>
														<ul class="pro_edit_btn">
															<li>
																<input class="btn pull-left" type="button" value="Save" id="save-here-to">
																<div class="cancel">or   <a href="javascript:void(0);" id="cancel-here-to">Cancel</a></div>
															</li>
														</ul>
													</form>
												</div>	
												</div>
											</div>
											
											<div class="divider-line clearfix"></div>
										<!--##########################LOCATION##################-->
											<div class="pull-left" id="location-view">
												<div class="pro_ttl"><span>Location</span> 
													<a href="javascript:void(0);" id="edit-location" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<div class="location_map margin-t10">
													<div id="googleMap" style="width:530px;height:80px;"></div>
												</div>
											</div>
											<div class="pull-left" id="location-edit" style="display:none;">
												<div class="pro_ttl"><span>Location</span> </div>
												<div class="location_map margin-t10">
												<form method="post">
													<div class="input-group srch_location">
													 <!-- <input type="text" class="form-control" placeholder="Search for...">-->
														<input id="location_lat" type="hidden" value="<?php echo $location_lat;?>" />
														<input id="location_lon" type="hidden" value="<?php echo $location_lon;?>" />
														<input id="pac-input" name="location" class="form-control edit_location" type="text" placeholder="Search for..." />
													  <span class="srch_icon"><i class="fa fa-search"></i></span>
													</div><!-- /input-group -->
													<div id="googleMap1" style="width:530px;height:80px;"></div>
													<ul class="pro_edit_btn">
														<li>
															<input class="btn pull-left" type="button"value="Save" id="save-location"> 
															<div class="cancel">or   <a href="javascript:void(0);" id="cancel-location">Cancel</a></div></li>
													</ul>
												</form>
												</div>
											</div>
											<div class="divider-line clearfix"></div>
										<!--#########################INTEREST##################-->	
											<div class="pull-left" id="interest-view">
												<div class="pro_ttl margin-b5"><span>Interests</span> 
													<span class="badge margin-r5i"><?php echo $userInterestCount;?></span>   
													<a href="javascript:void(0);" id="edit-interest" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<div class="interests">
												<?php if($userInterestCount){?>
												<ul>
													<?php foreach($interestArray as $interestRes){?>
														<li><a href="#"><span class="<?php echo $interestRes['icon'];?>"></span><p><?php echo $interestRes['interest'];?></p></a></li>
													<?php } ?>
												</ul>
												<?php } else { ?>
												<p>Add your interests here to get found by like minded people</p>
												<?php } ?>
												</div>
											</div>
											<!--######################EDIT INTEREST########################-->
											<div class="pull-left" id="interest-edit" style="display:none;">
												<div class="pro_ttl margin-b5"><span>Interests</span> </div>
												<form method="POST" action="">
												<div class="interests">
												<!--############ALREADY ADDED INTEREST################-->
													<ul id="interests_opn">
													<?php 
													foreach($interestArray as $userInterestResult){
													?>
														<li class="alert-dismissible" role="alert"><a href="javascript:void(0)"><span class="<?php echo $userInterestResult['icon'];?>"></span><p><?php echo $userInterestResult['interest'];?></p><i class="fa fa-times delete_interest" id="delete_interest-<?php echo $userInterestResult['user_interest_id'];?>" data-dismiss="alert" aria-label="Close"></i></a></li>
													<?php } ?>
													</ul>
												<!--############DROPDOWN INTEREST################-->
													<div class="input-group srch_location">
														<h1 id="header" class="form-control interest dropdown-toggle" placeholder="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></h1>
														<span class="srch_icon"><i class="fa fa-search"></i></span>
														<div class="dropdown-menu interest_srch_result">
															<div id="wrap">
																<ul id="list"></ul>
															</div>
														</div>
													</div>
												</div>
												<!--####################Choose interests manually#####################-->
												<div class="btn-group interests" role="group">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
														<div class="pull-left" onclick="$('#interest-manually').show()">Choose interests manually <i class="fa fa-caret-down"></i> </div>
													</button>
													<div class="dropdown-menu gray" id="interest-manually">
														<ul class="clearfix">
														<?php 
														$interestCatQuery=mysql_query("SELECT * FROM sr_interest_category WHERE status=1");
														while($interestCatResult=mysql_fetch_assoc($interestCatQuery)){?>
															<li>
																<a href="javascript:void(0)" class="dropdown-submenu btn_intst">
																	<span class="<?php echo $interestCatResult['icon'];?>"></span><p><?php echo $interestCatResult['category'];?></p>
																</a>
																<ul class="dropdown-submenu">
																<?php $interestQry=mysql_query("SELECT * FROM sr_interest WHERE cat_id='".$interestCatResult['cat_id']."' AND status=1");
																while($interestRes=mysql_fetch_assoc($interestQry)){
																	if(!in_array($interestRes['interest_id'], $interestIdArray)){
																	?>
																		<li class="interest-section" data-value="<?php echo $interestRes['interest'];?>" data-id="<?php echo $interestRes['interest_id'];?>" data-title="<?php echo $interestRes['icon'];?>">
																			<a class="btn_intst" href="javascript:void(0)">
																			<i><img src="images/interest/<?php echo $interestRes['icon'];?>.png"/></i><?php echo $interestRes['interest'];?></a>
																		</li>
																	<?php }
																} ?>
																	<!--<li><a class="btn_intst"  href="javascript:void(0)"><i class="fa fa-refresh"></i> Show more</a></li>-->
																</ul>
															</li>
															<?php } ?>
														</ul>
														<div class="align-c my_rating">
															<a href="javascript:void(0);" onclick="$('#interest-manually').hide();" class="btn btn-default custom slat-blue">Done </a>
														</div>
													</div>													
												</div>
												<ul class="pro_edit_btn">
													<li>
														<input class="btn pull-left" type="button" value="Save" id="save-interest"> 
														<div class="cancel">or  <a href="javascript:void(0);" id="cancel-interest">Cancel</a></div>
													</li>
												</ul>
												
												</form>
											</div>
											
											
											<div class="divider-line clearfix"></div>
										<!--#########################FRIENDS##################-->
											<div class="pull-left">
												<div class="pro_ttl margin-b5">
													<span>Friends</span> 
													<span class="badge margin-r5i">0</span> 
													<a href="profile-edit.php" id="edit-btn2" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<!--<div class="pro_friends">
													<ul>
														<li><a href=""><img src="images/usersSpotlightMan.png"/></a></li>
													</ul>
												</div>-->
												<div class="pro_friends">
													<p>No Friends</p>
												</div>
											</div>
											<div class="divider-line clearfix"></div>
											<!--#########################ABOUT ME########################-->
											<div class="pull-left" id="about-me-view">
												<div class="pro_ttl">
													<span>About me</span> 
														<a href="javascript:void(0);" id="edit-about-me" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
														</a>
												</div>
												<p id="about-me-text" style="white-space: pre-wrap;"><?php 
												if($userResult['about_me'] == ''){
													echo "Tell everyone a little a bit about yourself";
												}else { 
													echo $userResult['about_me'];
												}
												?>
												</p>
											</div>
											<div class="pull-left" id="about-me-edit" style="display:none;"> 
												<div class="pro_ttl">
													<span>About me</span> 
												</div>
												<form method="post">
													<textarea class="pro_edit" placeholder="Tell everyone a little a bit about yourself" name="aboutMe" id="aboutMeTextarea" maxlength='1000'><?php echo $about_me;?></textarea>
													<div class="word_count">
														<span id="count_aboutme"><?php echo strlen($about_me);?>/1000</span>
														<?php if(strlen($about_me) >= 80){?>
															<span id="about-me-check">
																<i class="fa fa-check green"></i>
															</span>
														<?php }else{?>
															<span style="display:none;" id="about-me-check">
																<i class="fa fa-check green"></i>
															</span>
														<?php } ?>
													</div>
													<ul class="pro_edit_btn">
														<li>
															<input class="btn pull-left" type="button" value="Save" id="save-about-me">
															<div class="cancel">or   <a href="javascript:void(0);" id="cancel-about-me">Cancel</a></div></li>
													</ul>
												</form>
											</div>
											<div class="divider-line clearfix"></div>
											<!--########################LOOKING FOR######################-->
											<div class="pull-left" id="looking-for-view">
												<div class="pro_ttl">
													<span>Looking for</span> 
													<a href="javascript:void(0);" id="edit-looking-for" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<p id="looking-for-text" style="white-space: pre-wrap;"><?php 
												if($userResult['looking_for'] == ''){
													echo "Let others know what sort of person you are looking to meet";
												}else { 
													echo $userResult['looking_for'];
												}
												?>
												</p>
											</div>
											<div class="pull-left" id="looking-for-edit" style="display:none;">
												<div class="pro_ttl">
													<span>Looking for</span> 
												</div>
												<form method="post">
													<textarea class="pro_edit" placeholder="Lets others know what sort of person you are looking to meet" name="lookingFor" id="lookingForTextarea" maxlength='1000'><?php echo $looking_for;?></textarea>
													<div class="word_count">
														<span id="count_lookingfor"><?php echo strlen($looking_for);?>/1000</span>
														<?php if(strlen($looking_for) >= 80){?>
															<span id="looking-for-check">
																<i class="fa fa-check green"></i>
															</span>
														<?php }else{?>
															<span style="display:none;" id="looking-for-check">
																<i class="fa fa-check green"></i>
															</span>
														<?php } ?>
													</div>
													<ul class="pro_edit_btn">
														<li>
															<input class="btn pull-left" type="button" value="Save" id="save-looking-for">
															<div class="cancel">or   <a href="javascript:void(0);" id="cancel-looking-for">Cancel</a></div></li>
													</ul>
												</form>
											</div>
											<div class="divider-line clearfix"></div>
											<!---##############PERSONAL INFORMATION#######################-->
											<div class="pull-left" id="personal-info-view">
												<div class="pro_ttl">
													<span>Personal Info</span>
													<a href="javascript:void(0);" id="edit-personal-info" class="edit bg">
														<i class="fa fa-pencil"></i>
														<span class="pull-right">edit</span>
													</a>
												</div>
												<div class="par_info" id="personal-information">
													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
															<ul>
																<li>
																	<div class="que">Relationship Status:</div>
																	<div><?php echo $userProfileObj->getRelationshipName($userResult['relationship_status']);?></div>
																</li>
																<li>
																	<div class="que">Star Sign:</div>
																	<div><?php echo $userProfileObj->getstarSignName($userResult['star_sign']);?></div>
																</li>
																<li>
																	<div class="que">Sexuality:</div>
																	<div><?php echo  $userProfileObj->getSexualityName($userResult['sexuality']); ?></div>
																</li>
																<li>
																	<div class="que">Body Type:</div>
																	<div><?php echo $userProfileObj->getBodyTypeName($userResult['body_type']);?></div>
																</li>
																<li>
																	<div class="que">Complexion:</div>
																	<div><?php echo $userProfileObj->getComplexionName($userResult['complexion']);?></div>
																</li>
																<li>
																	<div class="que">Height:</div>
																	<div><?php if($userResult['height'] != 0) echo $userResult['height'];?></div>
																</li>
																<li>
																	<div class="que">Eye Color:</div>
																	<div><?php echo $userProfileObj->getEyeColorName($userResult['eye_color']);?></div>
																</li>
																<li>
																	<div class="que">Hair Color:</div>
																	<div><?php echo $userProfileObj->getHairColorName($userResult['hair_color']);?></div>
																</li>
															</ul>
														</div>
														<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
															<ul>
																<li>
																	<div class="que">Languages:</div>
																	<div>
																	<?php foreach($userLanguageArray as $language_id)
																	{
																		echo $userProfileObj->getLanguageName($language_id);
																		echo ' ';
																	}?>
																	</div>
																</li>
																<li>
																	<div class="que">Smoking:</div>
																	<div><?php if($userResult['smoking'] ==1) { echo 'Yes'; } else if($userResult['smoking'] ==0){ echo 'No';} ?></div>
																</li>
																<li>
																	<div class="que">Drinking:</div>
																	<div><?php if($userResult['drinking'] ==1) { echo 'Yes'; } else if($userResult['drinking'] ==0){ echo 'No';} ?></div>
																</li>
																<li>
																	<div class="que">Kids:</div>
																	<div><?php if($userResult['kids'] ==1) { echo 'Yes'; } else if($userResult['kids'] ==2){ echo 'No';} ?></div>
																</li>
																<li>
																	<div class="que">Education:</div>
																	<div><?php echo $userProfileObj->getEducationName($userResult['education']);?></div>
																</li>
																<li>
																	<div class="que">Work:</div>
																	<div><?php echo $userResult['work'];?>
																		Income: <?php echo $userProfileObj->getIncomeName($userResult['income']);?>
																		Company: <?php echo $userResult['company'];?></div>
																</li>
																
															</ul>
														</div>
													</div>
												</div>
											</div>
											<div class="pull-left" id="personal-info-edit" style="display:none;">
												<div class="pro_ttl">
													<span class="pull-left">Personal Info</span>
													<div class="pull-right">
														<div class="word_count"><span><?php echo $profilePercentage;?>%</span> Complete 
														<?php if($profilePercentage >= 50){?>
														<i class="fa fa-check green"></i>
														<?php } ?>
														</div>
														<div class="progress">
														  <div class="progress-bar" role="progressbar" aria-valuenow="50"
														  aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $profilePercentage;?>%">
															<span class="sr-only">50% Complete</span>
														  </div>
														</div>
													</div>
												</div>
												<div class="par_info pro_edit margin-t20">
													<div class="row">
													<form method="POST" action=''>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<ul>
																<li>
																	<div class="que">Relationship Status:</div>
																	<div>
																		<div class="form-group">
																		<?php if($relationship_status == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getRelationshipName($relationship_status);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="relationship_status" id="relationship_status" value="<?php echo $relationship_status;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$relationshipArray = $userProfileObj->getRelationship();
																			foreach($relationshipArray as $relationships){?>
																				<li class="p_location relationship_status" data-id="<?php echo $relationships['relationship_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $relationships['relationship_status'];?></span></a>
																				</li>
																			<?php } ?>
																			</ul>
																		</div>
																						
																	</div>
																</li>
																<li>
																	<div class="que">Star Sign:</div>
																	<div>
																		<div class="form-group">
																		<?php if($star_sign == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getstarSignName($star_sign);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="star_sign" id="star_sign" value="<?php echo $star_sign;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$starSignArray = $userProfileObj->getstarSign();
																			foreach($starSignArray as $starSigns){?>
																				<li class="p_location star_sign" data-id="<?php echo $starSigns['sign_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $starSigns['star_sign'];?></span></a>
																				</li>
																				<?php } ?>
																			</ul>
																		</div>
																						
																	</div>
																</li>
																<li>
																	<div class="que">Sexuality:</div>
																	<div>
																		<div class="form-group">
																		<?php if($sexuality == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;Select</span>
																		<?php }else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getSexualityName($sexuality);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="sexuality" id="sexuality" value="<?php echo $sexuality;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$sexualityArray = $userProfileObj->getSexuality();
																			foreach($sexualityArray as $sexualities){?>
																				<li class="p_location sexuality" data-id="<?php echo $sexualities['sexuality_id'];?>">
																					<a href="javascript:void(0);"><?php echo $sexualities['sexuality'];?></a>
																				</li>
																			<?php } ?>	
																			</ul>
																		</div>
																						
																	</div>
																</li>
																<li>
																	<div class="que">Body Type:</div>
																	<div>
																		<div class="form-group">
																		<?php if($body_type == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getBodyTypeName($body_type);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="body_type" id="body_type" value="<?php echo $body_type;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$bodyTypeArray = $userProfileObj->getbodyType();
																			foreach($bodyTypeArray as $bodyTypes){?>
																				<li class="p_location body_type" data-id="<?php echo $bodyTypes['bodytype_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $bodyTypes['body_type'];?></span></a>
																				</li>
																			<?php } ?>
																			</ul>
																		</div>
																						
																	</div>
																</li>
																<li>
																	<div class="que">Complexion:</div>
																	<div>
																		<div class="form-group">
																		<?php if($complexion == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getComplexionName($complexion);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="complexion" id="complexion" value="<?php echo $complexion;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$complexionArray = $userProfileObj->getComplexion();
																			foreach($complexionArray as $complexions){?>
																				<li class="p_location complexion" data-id="<?php echo $complexions['complexion_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $complexions['complexion'];?></span></a>
																				</li>
																			<?php } ?>
																			</ul>
																		</div>
																						
																	</div>
																</li>
																<li>
																	<div class="que">Height:</div>
																	<?php 
																	if($height != 0){
																		$realFeet = (($height*0.393700) / 12);
																		$feet = floor($realFeet);
																		$inches = round(($realFeet - $feet) * 12);
																	}else{
																		$height = '';
																		$feet = '';
																		$inches = '';
																	}
																	?>
																	<div id="height_div">
																		<!------------------CM-------------------->
																		<div class="form-group pro_height clearfix" id="cm_div">
																			<input class="pull-left" name="height" id="height" type="text" placeholder="169" value="<?php echo $height;?>">
																			<p>cm</p>
																		</div>
																		<a href="javascript:void(0);" id="convert_to_feet" class="green">Show in feet and inches</a>
																		<!-----------------INCH---------------------->
																		<div class="form-group pro_height clearfix" id="feet_div" style="display:none;">
																			<input class="pull-left" name="feet" id="feet" type="text" placeholder="5" value="<?php echo $feet;?>">
																			<p>Ft &nbsp; &nbsp; </p>
																			<input class="pull-left" name="inches" id="inches" type="text" placeholder="5" value="<?php echo $inches;?>">
																			<p>Inches</p>
																		</div>
																		<a href="javascript:void(0);" id="convert_to_cm" class="green" style="display:none;">Show in Cm</a>
																	</div>
																</li>
																<li>
																	<div class="que">Eye Color:</div>
																	<div>
																		<div class="form-group">
																		<?php if($eye_color == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getEyeColorName($eye_color);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="eye_color" id="eye_color" value="<?php echo $eye_color;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$eyeColorArray = $userProfileObj->getEyeColor();
																			foreach($eyeColorArray as $eyeColors){?>
																				<li class="p_location eye_color" data-id="<?php echo $eyeColors['eye_color_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $eyeColors['eye_color'];?></span></a>
																				</li>
																			<?php } ?>
																			</ul>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Hair Color:</div>
																	<div>
																		<div class="form-group">
																		<?php if($hair_color == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getHairColorName($hair_color);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="hair_color" id="hair_color" value=<?php echo $hair_color;?>>
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$hairColorArray = $userProfileObj->getHairColor();
																			foreach($hairColorArray as $hairColors){?>
																				<li class="p_location hair_color" data-id="<?php echo $hairColors['hair_color_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $hairColors['hair_color'];?></span></a>
																				</li>
																			<?php } ?>
																			</ul>
																		</div>
																	</div>
																</li>
															</ul>
														</div>
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															<ul>
																<li>
																	<div class="que">Languages:</div>
																	<div>
																		<div class="form-group">
																			<select class="slec_m" id="lang" multiple="multiple" style="width:204px;">
																				<?php 
																				foreach($languageArray as $languages){
																					$selected = '';
																					if(in_array($languages['language_id'] , $userLanguageArray)){
																						$selected ='selected';
																					}
																					echo "<option class='p_location language' value='".$languages['language_id']."' ".$selected." /><span>".$languages['language']."</span></option>";
																				} 
																			?>
																			</select>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Smoking:</div>
																	<div>
																		<div class="form-group">
																			<div class="radio">
																				<div class="swith_gq">
																					<input type="radio" <?php if($smoking == 1) echo 'checked';?> value="1" name="smoking" data-rel="#general" id="radio1" >
																					<label for="radio1"><span><span></span></span>Yes</label>
																				</div>
																				<div class="swith_gq">
																					<input type="radio" <?php if($smoking == 0) echo 'checked';?> value="0" name="smoking" data-rel="#general" id="radio2" >
																					<label for="radio2"><span><span></span></span>No</label>
																				</div>
																			</div>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Drinking:</div>
																	<div>
																		<div class="form-group">
																			<div class="radio">
																				<div class="swith_gq">
																					<input type="radio" <?php if($drinking == 1) echo 'checked';?> value="1" name="drinking" data-rel="#general" id="radio3" >
																					<label for="radio3"><span><span></span></span>Yes</label>
																				</div>
																				<div class="swith_gq">
																					<input type="radio" <?php if($drinking == 0) echo 'checked';?> value="0" name="drinking" data-rel="#general" id="radio4" >
																					<label for="radio4"><span><span></span></span>No</label>
																				</div>
																			</div>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Kids:</div>
																	<div>
																		<div class="form-group">
																		<?php if($kids == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php if($kids == '1') echo 'Yes';else if($kids == '2') echo 'No';?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="kids" id="kids" value="<?php echo $kids;?>">
																			<ul class="p_locations fontawesome-select">
																				<li class="p_location kids" data-id='1'>
																					<a href="javascript:void(0);"><span>Yes</span></a>
																				</li>
																				<li class="p_location kids" data-id='2'>
																					<a href="javascript:void(0);"><span>No</span></a>
																				</li>
																			</ul>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Education:</div>
																	<div>
																		<div class="form-group">
																		<?php if($education == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getEducationName($education);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="education" id="education" value="<?php echo $education;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																				$educationArray = $userProfileObj->getEducation();
																				foreach($educationArray as $educations){
																			?>
																				<li class="p_location education" data-id="<?php echo $educations['education_id'];?>">
																					<a href="javascript:void(0);"><span><?php echo $educations['education'];?></span></a>
																				</li>
																				<?php } ?>
																			</ul>
																		</div>
																	</div>
																</li>
																<li>
																	<div class="que">Work:</div>
																	<div class="pro_work">
																		<input type="text" name ="work" id ="work" placeholder="manager" value="<?php echo $work;?>"/>
																		<ul class="clearfix">
																			<li>
																				<label class="pull-left">Income:</label>
																				<div class="form-group">
																				<?php if($income == '0'){ ?>
																					<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																				<?php } else {?>
																				<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getIncomeName($income);?></span>
																		<?php } ?>
																					<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																					<div class="clearfix"></div>
																					<input type="hidden" name="income" id="income" value="<?php echo $income;?>">
																					<ul class="p_locations fontawesome-select">
																					<?php 
																					$incomeArray = $userProfileObj->getIncome();
																					foreach($incomeArray as $incomes){
																					?>
																						<li class="p_location income" data-id="<?php echo $incomes['income_id'];?>">
																							<a href="javascript:void(0);"><span><?php echo $incomes['income'];?></span></a>
																						</li>
																				<?php } ?>
																					</ul>
																				</div>
																			</li>
																			<li>
																				<label class="pull-left">Company:</label>
																				<div class="pro_work margin-t10">
																					<input type="text" name="company" id="company" placeholder="Enterprise Inc." value="<?php echo $company;?>"/>
																				</div>
																			</li>
																		</ul>
																	</div>
																</li>
															</ul>
															
															<ul class="pro_edit_btn">
																<li>
																	<input class="btn pull-left" type="button" value="Save" id="save-personal-info">
																	<div class="cancel">or   <a href="javascript:void(0);" id="cancel-personal-info">Cancel</a></div></li>
															</ul>
														</div>
													</form>
													</div>
												</div>
											</div>
										
										</div>
									</div>
								</div>
								
								<?php include('include/profile-right-side.php');?>
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
	
	<?php include('include/profile-modal.php'); ?>
<!--#########################INTEREST MODALS######################################-->
<div id="new_interest" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog home_pg pop_pro">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Add a brand new interest</h3>
				</div>
				
				<div class="modal-body clearfix">
					<form class="login-form psnl_pro pull-left">
						<div class="align-c">
							<h4>Congratulations, looks like no one<br />
								has added this interest!
							</h4>
							<div class="align-c margin-t20"><a class="btn btn-default custom sky-blue" id="interest_value" href="javascript:void(0);">Massive</a></div>
							<p class="font_s16">Please help us by choosing a category for it:</p>
						</div>
						
						<div class="add_interest pe_i">
						<?php 
						$intestCount=5;
						$interestCatQuery=mysql_query("SELECT * FROM sr_interest_category WHERE status=1");
						while($interestCatResult=mysql_fetch_object($interestCatQuery)){
						?>
							<div class="swith_gq">
								<input type="radio" value="<?php echo $interestCatResult->cat_id.'$$$'.$interestCatResult->icon;?>" name="category" data-rel="#general" id="radio<?php echo $intestCount;?>">
								<label for="radio<?php echo $intestCount;?>" class="pe_i">
									<span class="left"><span></span></span>
									<img class="left" src="images/interest/<?php echo $interestCatResult->icon;?>.png"/><b class="left"><?php echo $interestCatResult->category;?></b>
								</label>
							</div>
						<?php 
						$intestCount++;
						} ?>
						</div>
						<div class="ppd">
							<input class="login_btn font_s18" type="button" id="save_new_interest" value="Save Interest"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--POP UP FOR ADD INTEREST CONFIRMATION-->
<div id="interest_confirmation" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog-1">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Thank You!</b></h4>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="popup_add_photo">
							<!--<img src="images/icon-007.png"/>-->
						</div>
						<div>
						<h5 class="align-c lh-20"><b>We'll add your interest as soon as we've reviewed it.</b></h5>
						</div>
						<div class="popup_add_photo margin-t20">
							<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
		
<script type="text/javascript">
$(window).load(function(){
	$('#myModal3').modal('show');
});
function getAge(dateString) {
  var today = new Date();
  var birthDate = new Date(dateString);
  var age = today.getFullYear() - birthDate.getFullYear();
  var m = today.getMonth() - birthDate.getMonth();
  if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
    age--;
  }
  return age;
}
$(document).mouseup(function (e){
	var container = $("#interest-manually");

	if (!container.is(e.target) // if the target of the click isn't the container...
		&& container.has(e.target).length === 0) // ... nor a descendant of the container
	{
		container.hide();
	}
});
$(document).ready(function(){
	
	$('#resend_email').click(function(){
		var user_id ='<?php echo $user_id;?>';
		//$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{resendMail:user_id,action:'resendMail'},
			success:function(result){
			//$('#preloader').hide();
				if(result == 1){
					$('#error_message_header').html('Email sent');
					$('#error_message').html('Verification mail resend succesfully.');
					$('#alert_modal').modal('show');
				}else{
					$('#error_message_header').html('Alert');
					$('#error_message').html('There is some problem.please try again.');
					$('#alert_modal').modal('show');
				}
			}
		});
	});
	$('#changeAddress').click(function(){
		var email_id =$('#changed_address').val();
		if(email_id==''){
			$('#error_message_header').html('Email Address Not Recognised');
			$('#error_message').html('Please enter a valid email address');
			$('#alert_modal').modal('show');
			$('#alert_modal').modal('show');
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Please enter a valid email address');
				$('#alert_modal').modal('show');
				$('#alert_modal').modal('show');
				$("#changed_address").val('');
				$("#changed_address").focus();
				return false;
			}
			if(email_id.length > 100)
			{
				alert("Email length can\'t be greater than 100 characters.");
				$("#changed_address").focus();
				return false;
			}
		}
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/user.php",
			data:{changeMail:email_id,action:'changeMail'},
			success:function(result){
				$('#preloader').hide();
				if(result == 1){
					$('#changeEmailAddress').modal('hide');
					$('#email-change').hide();
					$('#email-sent').show();
				}else if(result == 2){
					$('#error_message_header').html('Email address already registered');
					$('#error_message').html('Please use an alternative email address to continue with your registration');
					$('#alert_modal').modal('show');
					$("#changed_address").val('');
					$("#changed_address").focus();
				}else{
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.Please try again.');
					$('#alert_modal').modal('show');
				}
			}
		});
	
	});
	$('#message_now').click(function(){
		$('#preloader').show();
		$('#my-message-box').addClass('active');
		$('#message_div2').show();
		var userId=$('#gift_user_id').val();
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{userConverId:userId , action:'startConversation'},
			success:function(result){
				$(".close_receive_gift").click();
				$('#preloader').hide();
				$('.onlineUserDiv').removeClass('active');
				$('#onlineUserDiv-'+userId).addClass('active');
				$('#unread-msg-count-'+userId).hide();
				$('#userChat_window').html(result);
			}
		});
			return false;
	});
});
</script>
<script src="js/profile.js"></script>
<style>
.pac-container {
  z-index:9999;
}
</style>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
<script>

var lat = $('#location_lat').val();
var lon = $('#location_lon').val();
	
function initMap(lat , lon) {
	
	var myCenter=new google.maps.LatLng(lat,lon);
	var mapProp = {
		center:myCenter,
		zoom:5,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var marker=new google.maps.Marker({
		position:myCenter,
	});
	var marker1=new google.maps.Marker({
		position:myCenter,
	});
	
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	var map1=new google.maps.Map(document.getElementById("googleMap1"),mapProp);
	
	marker.setMap(map);
	marker1.setMap(map1);
	/***********for autocomplete *****************************/
	var input =(
	document.getElementById('pac-input'));
	var autocomplete = new google.maps.places.Autocomplete(input);
	var infowindow = new google.maps.InfoWindow();
  
	autocomplete.addListener('place_changed', function() {
    infowindow.close();
	$('#location_search').hide();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
	$('#location_lat').val(place.geometry.location.lat());
	$('#location_lon').val(place.geometry.location.lng());
  });
}
google.maps.event.addDomListener(window, 'load', initMap(lat , lon));
</script>
<script>
(function ($) {
  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
				  return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };


function listFilter(header, list) { 
	var form = $("<form>").attr({"class":"filterform","action":"#"}),
					input = $("<input>").attr({"class":"filterinput","type":"text"});
	$(form).append(input).appendTo(header);
	$(input)
	  .change( function () {
					var filter = $(this).val();	
					var interestArr = [];
					$('input[type=hidden][name="interest_hidden[]"]').each(function(){
						interestArr.push($(this).val());
					});
					$.ajax({
						type:"POST",
						url:"ajax/edit-profile.php",
						data:{interestFilter:filter , interests:interestArr , action:'interestFilter'},
						success:function(result){
							$('#list').html(result);
						}
					});
			return false;
	  })
	.keyup( function () {
					$(this).change();
	})
	.focus( function () {
					$(this).change();
					$('#add_new_interset').hide();
	});
}
//ondomready
$(function () {
	listFilter($("#header"), $("#list"));
});
}(jQuery));
</script>
<link href="css/multiple-select.css" rel="stylesheet"/>
<script src="js/multiple-select.js"></script>
<script>
	$('select.slec_m').multipleSelect();
</script>
</body>
</html>