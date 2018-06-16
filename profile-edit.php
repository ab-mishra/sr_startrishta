<?php 
require('classes/profile_class.php');
$page='profile-edit';
$userProfileObj=new Profile();

require('include/header.php');

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
								<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view margin-b20">
											<div class="pull-left">
												<form class="pro_name" method="post">
													<ul>
														<li><label class="red">Name</label>
														<input type="text" name="user_name" value="<?php echo $user_name ;?>"/></li>
														<li><label class="red">Date Of Birth</label>
														<input type="text" name="dob" id="dob" class="input-group" data-date-format="dd-mm-yyyy" value="<?php echo date('d-m-Y' , strtotime($dob));?>">
														</li>
													</ul>
													<ul class="pro_edit_btn">
														<li><input class="btn pull-left" type="Submit" value="Save" name="submitBasicInfo"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
														<li><div>Age can only be <strong>changed once more</strong></div></li>
													</ul>
												</form>
											</div>
											
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
													<a href="photos.php">
														<i class="fa fa-camera"></i> My Photos
													</a>
												</div>
											</div>
											<!-----*****************************************************--->
											<?php include('include/profile-photo.php');?>
											<!-----*****************************************************--->
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl"><span>I’m here to</span> 
													
												</div>
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
																	<input id="checkbox1" type="checkbox" name="here_with_guy" <?php if($here_with_guy==1) {echo 'checked';}?>>
																	<label for="checkbox1">
																	<span class="pull-left"></span><p class="pull-left">Guys</p></label>
																</li>
																<li>
																	<input id="checkbox2" type="checkbox" name="here_with_girl" <?php if($here_with_girl==1) {echo 'checked';}?>>
																	<label for="checkbox2">
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
																<li><input class="btn pull-left" type="Submit" value="Save" name="submitHereTo"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
															</ul>
														</form>
													</div>	
												</div>
												
											</div>
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl"><span>Location</span> </div>
												<div class="location_map margin-t10">
												<form method="post">
													<div class="input-group srch_location">
													 <!-- <input type="text" class="form-control" placeholder="Search for...">-->
														<input id="location_lat" name="location_lat" type="hidden" value="" />
														<input id="location_lon" name="location_lon" type="hidden" value="" />
														<input id="pac-input" name="location" class="form-control edit_location" type="text" placeholder="Search for..." />
													  <span class="srch_icon"><i class="fa fa-search"></i></span>
													</div><!-- /input-group -->
													<div id="googleMap" style="width:530px;height:80px;"></div>
													<ul class="pro_edit_btn">
														<li><input class="btn pull-left" type="Submit" name="submitLocation" value="Save"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
													</ul>
												</form>
												</div>
											</div>
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl margin-b5"><span>Interests</span> 
												</div>
												<form method="POST" action="">
												<div class="interests">
													<ul id="interests_opn">
													<?php while($userInterestResult=mysql_fetch_assoc($userInterestQuery)){
															$interestIdArray[]=$userInterestResult['interest_id'];
													?>
														<li class="alert-dismissible" role="alert"><a href="javascript:void()"><span class="<?php echo $userInterestResult['icon'];?>"></span><p><?php echo $userInterestResult['interest'];?></p><i class="fa fa-times delete_interest" id="delete_interest-<?php echo $userInterestResult['user_interest_id'];?>" data-dismiss="alert" aria-label="Close"></i></a></li>
														<?php } ?>
													</ul>
												
													<div class="input-group srch_location">
														<h1 id="header" class="form-control interest dropdown-toggle" placeholder="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></h1>
														<span class="srch_icon"><i class="fa fa-search"></i></span>
														
														<div class="dropdown-menu interest_srch_result">
															<div id="wrap">
																<ul id="list">
																
																<?php while($interestResult=mysql_fetch_object($interestQuery)){
																	if(in_array($interestResult->interest_id, $interestIdArray)){
																		$interestDisplay='none';
																	}else{
																		$interestDisplay='block';
																	}
																?>
																	<li id="interest_li-<?php echo $interestResult->interest_id;?>" style="display:<?php echo $interestDisplay;?>">
																		<a class="btn_intst" href="javascript:void()" title="<?php echo $interestResult->icon;?>" data-value="<?php echo $interestResult->interest;?>" data-id="<?php echo $interestResult->interest_id;?>">
																		<i><img src="images/interest/<?php echo $interestResult->icon;?>.png"/></i><?php echo $interestResult->interest;?></a>
																	</li>
																<?php } ?>
																	<li id="add_new_interset" style="display:none;"> 
																		<a id="add_new_interest_popup" href="javascript:void(0);"></a>
																	</li>
																</ul>
															</div>
														</div>
													</div><!-- /input-group -->
													
												</div>
												
												<div class="btn-group interests" role="group">
													<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													  <div class="pull-left">Choose interests manually  </div>
													  <span class="caret"></span>
													</button>
													<div class="dropdown-menu gray">
														<ul class="clearfix">
															<li>
																<a href="javascript:void()" class="dropdown-submenu btn_intst" title="popular" data-value="Most popular"><span class="popular"></span><p>Most popular</p></a>
																
																<ul class="dropdown-submenu">
																	<li><a class="btn_intst"  href="javascript:void()">Money</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Ray-Ban</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Taking Photos</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Snowboarding</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Miami</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">iPhone</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Pop/Rock</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">London</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Whiskey</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Dolce & Gabbana</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Lasagna</a></li>
																	<li><a class="btn_intst"  href="javascript:void()">Voice show</a></li>
																	<li><a class="btn_intst"  href="javascript:void()"><i class="fa fa-refresh"></i> Show more</a></li>
																</ul>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="animal" data-value="Animal"><span class="animal"></span><p>Animal</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="religion" data-value="Religion"><span class="religion"></span><p>Religion</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="music" data-value="Music"><span class="music"></span><p>Music</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="tv-movies" data-value="TV & Movies"><span class="tv-movies"></span><p>TV & Movies</p></a>
															</li>
															<li>	
																<a class="btn_intst" href="javascript:void()" title="sportz-fitness" data-value="Sport & Fitness"><span class="sportz-fitness"></span><p>Sport & Fitness</p></a>
															</li>
															<li>	
																<a class="btn_intst" href="javascript:void()" title="travel" data-value="Travel"><span class="travel"></span><p>Travel</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="hobbies-games" data-value="Hobbies & Games"><span class="hobbies-games"></span><p>Hobbies & Games</p></a>
															</li>
															<li>	
																<a class="btn_intst" href="javascript:void()" title="books" data-value="Books"><span class="books"></span><p>Books</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="art-culture" data-value="Art & Culture"><span class="art-culture"></span><p>Art & Culture</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="profession" data-value="Profession" ><span class="profession"></span><p>Profession</p></a>
															</li>
															<li>	
																<a class="btn_intst" href="javascript:void()" title="food-drinks" data-value="Food & Drinks"><span class="food-drinks"></span><p>Food & Drinks</p></a>
															</li>
															<li>
																<a class="btn_intst" href="javascript:void()" title="others" data-value="Others" ><span class="others"></span><p>Others</p></a>
															</li>
														</ul>
														
														<div class="align-c my_rating">
															<a href="" class="btn btn-default custom slat-blue">Done </a>
														</div>
													</div>
													
												</div>
												<input type="hidden" value="" id="interest_hidden" name ="interest_hidden">
												<ul class="pro_edit_btn">
													<li>
														<input class="btn pull-left" type="Submit" value="Save" name ="submitInterest"> 
														<div class="cancel">or   <a href="">Cancel</a></div>
													</li>
												</ul>
												
												</form>
											</div>
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl margin-b5">
													<span>Friends</span> 
												</div>
												<div class="pro_friends">
												<p>No Friends</p>
													<!--<ul>
													<?php 
													$friendQuery=$userProfileObj->getFriends();
													while($friendResult = mysql_fetch_object($friendQuery)){
													?>
														<li>
															<a href="profile-page-others-view.php">
																<img src="upload/photo/<?php echo $friendResult->profile_image;?>"/>
															</a>
														</li>
													<?php } ?>	
													</ul>-->
												</div>
											</div>
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl">
													<span>About me</span> 
												</div>
												<form method="post">
													<textarea class="pro_edit" placeholder="Tell everyone a little a bit about yourself" name="aboutMe" id="aboutMeTextarea" maxlength='1000'><?php echo $about_me;?></textarea>
													<div class="word_count">
														<span id="count_aboutme"><?php echo strlen($about_me);?></span>/1000
													</div>
													<ul class="pro_edit_btn">
														<li><input class="btn pull-left" type="Submit" value="Save" name="submitAboutMe" id="submitaboutMe"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
													</ul>
												</form>
											</div>
											<div class="divider-line clearfix"></div>
											<div class="pull-left">
												<div class="pro_ttl">
													<span>Looking for</span> 
												</div>
												<form method="post">
													<textarea class="pro_edit" placeholder="Lets others know what sort of person you are looking to meet" name="lookingFor" id="lookingForTextarea" maxlength='1000'><?php echo $looking_for;?></textarea>
													<div class="word_count">
														<span id="count_lookingfor"><?php echo strlen($looking_for);?></span>/1000
													</div>
													<ul class="pro_edit_btn">
														<li><input class="btn pull-left" type="Submit" value="Save" name="submitLookingFor" id="submitLookingFor"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
													</ul>
												</form>
											</div>
											
											<div class="divider-line clearfix"></div>
											
											<div class="pull-left">
												<div class="pro_ttl">
													<span class="pull-left">Personal Info</span>
													<div class="pull-right">
														<div class="word_count"><span><?php echo $profilePercentage;?>%</span> Complete</div>
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
																	<div>
																		<div class="form-group pro_height clearfix">
																			<input class="pull-left" name="height" id="height" type="text" placeholder="169" value="<?php echo $height;?>">
																			<p>cm</p>
																			<p id="show_in_feet"></p>
																		</div>
																		<a href="javascript:void(0);" id="convert_to_feet" class="green">Show in feet and inches</a>				
																	
																	<!-----------------------------------------23-12-2015------------------------------------------>
																		<div class="form-group pro_height clearfix">
																			<input class="pull-left" name="height" id="height" type="text" placeholder="169" value="<?php echo $height;?>">
																			<p>Ft &nbsp; &nbsp; </p>
																			<input class="pull-left" name="height" id="height" type="text" placeholder="169" value="<?php echo $height;?>">
																			<p>Inches</p>
																		</div>
																		<a href="javascript:void(0);" id="" class="green">Show in Cm</a>
																	<!-----------------------------------------23-12-2015------------------------------------------>
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
																		<?php if($language == '0'){ ?>
																			<span class="input_box fontawesome-select">&nbsp;-Select-</span>
																		<?php } else {?>
																			<span class="input_box fontawesome-select">&nbsp;<?php echo $userProfileObj->getLanguageName($language);?></span>
																		<?php } ?>
																			<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
																			<div class="clearfix"></div>
																			<input type="hidden" name="language" id="language" value="<?php echo $language;?>">
																			<ul class="p_locations fontawesome-select">
																			<?php 
																			$languageArray = $userProfileObj->getLanguage();
																			foreach($languageArray as $languages){?>
																				<li class='p_location language' data-id='<?php echo $languages['language_id'];?>'><a href='javascript:void(0);'><span><?php echo $languages['language'];?></span></a></li>
																			<?php } ?>
																			</ul>
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
																		<input type="text" name ="work" placeholder="manager" value="<?php echo $work;?>"/>
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
																					<input type="text" name="company" placeholder="Enterprise Inc." value="<?php echo $company;?>"/>
																				</div>
																			</li>
																		</ul>
																	</div>
																</li>
															</ul>
															
															<ul class="pro_edit_btn">
																<li><input class="btn pull-left" type="Submit" value="Save" name="submitPersonalInfo"> <div class="cancel">or   <a href="home.php">Cancel</a></div></li>
															</ul>
														</div>
													</form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							<!-----------------RIGHT PANEL-------------------------->
							<?php include('include/profile-right-side.php');?>
							<!-----------------RIGHT PANEL-------------------------->
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

<!--------------------------------------------MODALS----------------------------------------------------------------------->
		<!--Pop for ADD NEW INTEREST-->
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
		
<!------------------------MODAL FOR SUCCESSFULLY SUBMIT----------------------------->
<div id="sucess_modal" class="modal fade login_pop" role="dialog" style="z-index:9999">
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h3><b>Alert</b></h3>
						</div>
						<div class="modal-body">
							<form class="login-form">
								<div class="popup_add_photo">
								</div>
								<div>
								<h5 class="align-c lh-20"><b>Added Successfully</b></h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">OK </a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
<script>
(function ($) {
  // custom css expression for a case-insensitive contains()
  jQuery.expr[':'].Contains = function(a,i,m){
				  return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
  };


function listFilter(header, list) { // header is any element, list is an unordered list
	// create and add the filter form to the header
	var form = $("<form>").attr({"class":"filterform","action":"#"}),
					input = $("<input>").attr({"class":"filterinput","type":"text"});
	$(form).append(input).appendTo(header);

	$(input)
	  .change( function () {
					var filter = $(this).val();
					if(filter) {
					 // this finds all links in a list that contain the input,
					  // and hide the ones not containing the input while showing the ones that do
					  var class1 = $(list).find("a:Contains(" + filter + ")").attr('class');
					  if(class1 != 'btn_intst'){
							
							$('#add_new_interset').show();
							$('#add_new_interest_popup').attr('data-value' , filter);
							$('#add_new_interest_popup').html('Add "'+ filter +'" as a new interest');
					  }
					  
					//if($(list).find("a:not(:Contains(" + filter + "))").parent().css('display')=='block')
					//{
						$(list).find("a:not(:Contains(" + filter + "))").parent().slideUp();
					//}
					//if($(list).find("a:Contains(" + filter + ")").parent().css('display')=='block')
					//{
						$(list).find("a:Contains(" + filter + ")").parent().slideDown();
					//}
					  
					} else {
					  $(list).find("li").slideDown();
					}
					return false;
	  })
	.keyup( function () {
					// fire the above change event after every letter
					$(this).change();
	});
}
//ondomready
$(function () {
	listFilter($("#header"), $("#list"));
});
}(jQuery));


//$('#sucess_modal').modal('show');

$('#add_new_interest_popup').live('click' , function(){
	var interest = $(this).attr('data-value');
	$('#interest_value').html(interest);
	$('#new_interest').modal('show');
	return false;
});
$('#save_new_interest').live('click' , function(){
	var interest = $('#interest_value').html();
	var category =$("input:radio[name=category]:checked").val().split('$$$');
	$.ajax({
		type:"POST",
		url:"ajax/profile.php",
		data:{interest:interest , category:category[0] ,category_icon : category[1] ,action:'saveNewInterest'},
		success:function(result){
			if(result == 1){
				$('.filterinput').val('')
				$('#new_interest').modal('hide');
				$('#interest_confirmation').modal('show');
			}else{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Problem in network.Please try again.');
				$('#alert_modal').modal('show');
			}
		}
	});
	return false;
});
	
$(".btn_intst").click(function(){
	//var interest = $(this).children('p').html();
	var interest_class = $(this).attr('title');
	var interest = $(this).attr('data-value');
	var interest_id = $(this).attr('data-id');
	var interest_ids = $('#interest_hidden').val();
	interest_ids = interest_ids + ',' + interest_id;
	$('#interest_hidden').val(interest_ids);
	$("#interests_opn").prepend('<li class="alert-dismissible" role="alert"><a href="javascript:void()"><span class="'+interest_class+'"></span><p>'+interest+'</p><i class="fa fa-times close_interest" id="close_interest-'+interest_id+'" data-dismiss="alert" aria-label="Close"></i></a></li>');
	
	$('#interest_li-'+interest_id).hide();
});


$(".close_interest").live('click' ,function(){
	var interest_id = $(this).attr('id').split('-');
	$('#interest_li-'+interest_id[1]).show();
});

$(".delete_interest").live('click' , function(){
	var interest_id = $(this).attr('id').split('-');
	$.ajax({
		type:"POST",
		url:"ajax/profile.php",
		data:{user_interest_id:interest_id[1],action:'deleteInterest'},
		success:function(result){
		$('#interest_li-'+interest_id[1]).show();
			if(result == 1){
				$(this).parent('a').parent('li').hide();
			}else{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Problem in network.Please try again.');
				$('#alert_modal').modal('show');
			}
		}
	});
	return false;
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#dob").datepicker({ 
			autoclose: true, 
			todayHighlight: true,
			orientation: "top"
		});
		//age Range Code//
		var here_age_min = $('#here_age_min').val();
		var here_age_max = $('#here_age_max').val();
		if(here_age_min != 0)
			var min_value=here_age_min;
		else
			var min_value = 18;
		if(here_age_max != 0)
			var max_value=here_age_max;
		else
			var max_value = 100;
		
		$( "#slider-range" ).slider({
		  range: true,
		  min: 18,
		  max: 100,
		  values: [ min_value, max_value ],
		  slide: function( event, ui ) {
			$("#amount").val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			$('#here_age_min').val(ui.values[0]);
			$('#here_age_max').val(ui.values[1]);
		  }
		});
		$( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0) +
		  " - " + $( "#slider-range" ).slider( "values", 1 ) );			

		  
		$('.here_to').click(function(){
			var option = $(this).data('id');
			$('#here_to').val(option);
		});
		$('.relationship_status').click(function(){
			var option = $(this).data('id');
			$('#relationship_status').val(option);
		});
		$('.star_sign').click(function(){
			var option = $(this).data('id');
			$('#star_sign').val(option);
		});
		$('.sexuality').click(function(){
			var option = $(this).data('id');
			$('#sexuality').val(option);
		});
		$('.body_type').click(function(){
			var option = $(this).data('id');
			$('#body_type').val(option);
		});
		$('.complexion').click(function(){
			var option = $(this).data('id');
			$('#complexion').val(option);
		});
		$('.eye_color').click(function(){
			var option = $(this).data('id');
			$('#eye_color').val(option);
		});
		$('.hair_color').click(function(){
			var option = $(this).data('id');
			$('#hair_color').val(option);
		});
		$('.language').click(function(){
			var option = $(this).data('id');
			$('#language').val(option);
		});
		$('.kids').click(function(){
			var option = $(this).data('id');
			$('#kids').val(option);
		});
		$('.education').click(function(){
			var option = $(this).data('id');
			$('#education').val(option);
		});
		$('.income').click(function(){
			var option = $(this).data('id');
			$('#income').val(option);
		});
		
		$('#lookingForTextarea').keyup(function(){
			var value = $(this).val();
			var len = value.length;
			if(len <= 1000) {
				$('#count_lookingfor').text(len);
			}
		});
		$('#submitLookingFor').click(function(){
			$('#preloader').show();
			var value = $('#lookingForTextarea').val();
			var lookingFor = $.trim(value);
			if(lookingFor == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter Looking for.');
				$('#alert_modal').modal('show');
				$('#preloader').hide();
				return false;
			}
		});
		$('#aboutMeTextarea').keyup(function(){
			var value = $(this).val();
			var len = value.length;
			if(len < 1000) {
				$('#count_aboutme').text(len);
			}
		});
		$('#submitaboutMe').click(function(){
			$('#preloader').show();
			var value = $('#aboutMeTextarea').val();
			var aboutMe = $.trim(value);
			if(aboutMe == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter about me.');
				$('#alert_modal').modal('show');
				$('#preloader').hide();
				return false;
			}
		});
		$('#convert_to_feet').click(function(){
			var height=$('#height').val();
			var realFeet = ((height*0.393700) / 12);
			var feet = Math.floor(realFeet);
			var inches = Math.round((realFeet - feet) * 12);
				$('#show_in_feet').html(feet + "&prime;" + inches + '&Prime;');
		});
	});
	</script>

<script src="https://maps.googleapis.com/maps/api/js?signed_in=true&libraries=places&callback=initMap" async defer></script>
<script>
function initMap() {
	/****************for google map with marker*******************/
	var lat = '<?php echo $userResult['location_lat'];?>';
	var lon = '<?php echo $userResult['location_lon'];?>';
	var myCenter=new google.maps.LatLng(lat,lon);
	var mapProp = {
		center:myCenter,
		zoom:5,
		mapTypeId:google.maps.MapTypeId.ROADMAP
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	var marker=new google.maps.Marker({
		position:myCenter,
	});
	marker.setMap(map);
/***********for autocomplete *****************************/
	var input = /** @type {!HTMLInputElement} */(
	document.getElementById('pac-input'));
	var autocomplete = new google.maps.places.Autocomplete(input);
	var infowindow = new google.maps.InfoWindow();
  
	autocomplete.addListener('place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
	$('#location_lat').val(place.geometry.location.lat());
	$('#location_lon').val(place.geometry.location.lng());
  });
}
</script>	
</body>
</html>