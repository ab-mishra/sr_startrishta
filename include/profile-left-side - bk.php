<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 lh-height col_sm_3_big">
	<?php 
	if($userResult['tut_status'] == 0){
	?>
	<!--Start Tutorial-->
	<div class="Repo_box kc margin-b20">
		<div class="dark">
			<div>
				<div>
				<h4 class="bold">Welcome to Startrishta! </h4>
				</div>
			</div>
			<div class="kc-toggle">
				Start your quick tutorial to learn more
			</div>
			<div class="align-c">
				<a class="btn btn-default custom1 purpal" id="start-tutorial" data-toggle="modal" data-target="#start-tutorial" href="javascript:void(0);">Start Tutorial </a>
			</div>
		</div>
	</div>	
	<!--End Start Tutorial-->
	<?php } ?>

<?php 
if($page == 'rate-photos'){
	include("include/show_me.php"); 
}
if($page == 'kismat-connection'){
	if($kismatConnectionUserCount == 1){ ?>
	<div class="Repo_box kc margin-b20">
		<div>
			<div>
			<h4 class="margin-b10 c-red bold">I'm here to 
				<a class="right kc_toggle_icon" href="javascript:void(0);"><i class="fa fa-caret-down"></i></a>
			</h4>
			</div>
		</div>
		<div class="kc-toggle">
			30 people that wanted to meet you didn't fall within your serach parameters.<a href="javascript:void(0);" id="kc-reset-serarch" class="green">Reset Search</a>
		</div>
	</div>

<?php }else {?>
	<div class="Repo_box kc margin-b20">
		<div>
			<div>
			<h4 class="margin-b10 c-red bold">I'm here to 
				<a class="right kc_toggle_icon" href="javascript:void(0);"><i class="fa fa-caret-down"></i></a>
			</h4>
			</div>
		</div>
		<form method="POST" action="kismat-connection.php">
		<div class="kc-toggle">
			<div>
				<ul class="kc_filter">
				<?php 
				$hereToArray=$userProfileObj->getHereTo();
				foreach($hereToArray as $hereTo){
				?>
					<li>
						<div class="swith_gq rate-pp">
							<input id="kc_hereto<?php echo $hereTo['here_to_id'];?>" data-rel="#general" type="radio" name="kc_here_to" value="<?php echo $hereTo['here_to_id'];?>" <?php if($hereTo['here_to_id'] == $userResult['here_to']) echo "checked";?>/>
							<label for="kc_hereto<?php echo $hereTo['here_to_id'];?>"><span class="pull-left"><span></span></span> <div class="kc_fl_img"><img src="images/<?php echo $hereTo['icon'];?>"/></div><?php echo $hereTo['here_to'];?></label>
						</div>
					</li>
				<?php } ?>
				</ul>
				
				
				<h4 class="margin-t10 c-red bold">With</h4>
				<ul class="pull-left p_edit kc">
					<li>
						<input id="kc_here_with_guy" type="checkbox" name="kc_here_with_guy" <?php if($userResult['here_with_guy']==1) {echo 'checked';}?>>
						<label for="kc_here_with_guy">
							<span class="pull-left"></span><p class="pull-left">Guys</p>
						</label>
					</li>
					<li>
						<input id="kc_here_with_girl" type="checkbox" name="kc_here_with_girl" <?php if($userResult['here_with_girl']==1) {echo 'checked';}?>>
						<label for="kc_here_with_girl">
						<span class="pull-left"></span><p class="pull-left">Girls</p></label>
					</li>
				</ul>
				<input type="hidden" value="<?php echo $userResult['here_age_min'];?>" id="kc_here_age_min" name="kc_here_age_min" />
				<input type="hidden" value="<?php echo $userResult['here_age_max'];?>" id="kc_here_age_max" name="kc_here_age_max" />
				<h5 class="margin-t10">Age <strong id="kc-age-amount">18 - 80</strong></h4>
				<div id="kc-age-slider-range"></div>
			</div>
			<div class="align-c"><input type="submit" class="btn btn-default custom slat-blue" name="kcupdateSearchResult" value="Save"/> or <a href="javascript:void(0);">cancel</a></div>
		</div>
		</form>
	</div>
							
<?php }

}?>


<div class="Repo_box">			
	<div class="dark">
		<div class="pull-left repo_pic">
			<a href="home.php">
				<img src="<?php echo $userProfileImage;?>">
			</a>
		</div>
		<div class="pull-left center-auto">
			<p class="text-normal">Your reputation is</p>
			<?php 
			$userReputation = $userProfileObj->getUserReputation($user_id);
			if($userReputation <= 40 ) $reputaion='Low';
			if($userReputation > 40 && $userReputation <= 60) $reputaion='Heating Up';
			if($userReputation > 60 && $userReputation <= 80) $reputaion='Hot';
			if($userReputation > 80) $reputaion='Very Hot';
			?>
			<div class="button yellow"><a href="javascript:void(0);"><?php echo $reputaion;?></a></div>
		</div>
		<div class="clearfix"></div>
		<div class="progress">
		<?php
		for($k=10 ; $k <=100 ; $k+=10){
			if($k <= $userReputation){?>
				<?php if($k == 10){ ?>
					<div class="progress-bar progress-bar-freezed" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 20){ ?>
					<div class="progress-bar progress-bar-coolest" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 30){ ?>
					<div class="progress-bar progress-bar-cool" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 40){ ?>
					<div class="progress-bar progress-bar-fine" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 50){ ?>
					<div class="progress-bar progress-bar-getting-warm" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 60){ ?>
					<div class="progress-bar progress-bar-warm" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 70){ ?>
					<div class="progress-bar progress-bar-getting-hot" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 80){ ?>
					<div class="progress-bar progress-bar-littel-hot" role="progressbar" style="width:10%"></div>
				<?php } else if($k == 90){ ?>
					<div class="progress-bar progress-bar-hot" role="progressbar" style="width:10%"></div>
				<?php } else if($k >= 100){ ?>
					<div class="progress-bar progress-bar-hottest" role="progressbar" style="width:10%"></div>	
				<?php }
			}else {?>
			<div class="progress-bar" role="progressbar" style="width:10%"></div>
		<?php }
		} ?>
		</div>
		<button type="button" class="btn btn-danger full bold" data-toggle="modal" data-target="#increaseReputation">Increase My Reputation!</button>
	</div>
	
	<?php
	$profileVisitorArray = $userProfileObj->getProfileVisitor($user_id);
	$profileVisitorCount=count($profileVisitorArray);
	$likeMeArray=$userProfileObj->getLikeMe($user_id);
	$userLikeCount=count($likeMeArray);
	$userFavouriteCount=$userProfileObj->userFavouriteCount($user_id);
	$userBlockCount=$userProfileObj->userBlockCount($user_id);
	$ratedMeUserArray=$userProfileObj->getRatedMeUser($user_id);										
	$getRatedMeUserCount=count($ratedMeUserArray);
	?>
	<div>
		<div class="list-group custom">
		<?php if($userResult['profile_image']){?>
			<a href="profile-visitor.php" class="list-group-item <?php if($page == 'profile-visitor') echo 'disabled';?>">
				<span class="pv"></span> Profile Visitors <span class="badge"  id="visitorCount1"><?php echo $profileVisitorCount;?></span>
			</a>
		<?php }else{ ?>
			<a href="javascript:void(0);" class="list-group-item <?php if($page == 'profile-visitor') echo 'disabled';?>" data-toggle="modal" data-target="#addProfilePhotoModal">
				<span class="pv"></span> Profile Visitors <span class="badge"  id="visitorCount1"><?php echo $profileVisitorCount;?></span>
			</a>
		<?php }?>
			<a href="like.php" class="list-group-item <?php if($page == 'like') echo 'disabled';?>">
				<span class="lm"></span> Liked Me <span class="badge" id="userLikeCountL"><?php echo $userLikeCount;?></span>
			</a>
			<a href="rated-me.php" class="list-group-item <?php if($page == 'rated-me') echo 'disabled';?>">
				<span class="rmp"></span> Rated My Photos <span class="badge"><?php echo $getRatedMeUserCount;?></span>
			</a>
			<a href="favorites-main.php" class="list-group-item <?php if($page == 'favorites') echo 'disabled';?>">
				<span class="mf"></span> My Favourites <span class="badge" id="myfavCount"><?php echo $userFavouriteCount;?></span>
			</a>
			<a href="comments.php" class="list-group-item <?php if($page == 'comment') echo 'disabled';?>">
				<span class="com"></span> Comments <span class="badge"><?php echo $allMyPhotoCount+ $otherPhotoCount;?></span>
			</a>
			<a href="blocked.php" class="list-group-item <?php if($page == 'block') echo 'disabled';?>">
				<span class="blk"></span> Blocked <span class="badge" id="blockCount1"><?php echo $userBlockCount;?></span>
			</a>
		</div>
	</div>
</div>				

<?php if($page != 'my-photos' || $page != 'rate-photos') {?>

<!--****************************RATING SCORE WITHOUT IMAGE*********************************************-->
<?php
$ratedPhotoQuery=$userProfileObj->getMyphots($user_id);
$ratedPhotoCount=mysql_num_rows($ratedPhotoQuery);

if($ratedPhotoCount == 0){
?>
	<div class="Repo_box margin-t20">
		<div>
			<h4 class="margin-b10"><b>Photo Rating Score</b></h4>
			<div class="pull-left">There are over <?php echo $userProfileObj->getAllPhotosCount();?>  photos here already. Add your photo now to get your photo rating score!</div>
		</div>
		<div class="photos empty clearfix">
			<div>
				<a href=""><img src="images/add-img-icon-blue.png"></a>
			</div>
		</div>
		<div class="align-c input_custom">
			<div class="bootstrap-filestyle input-group">
				<span class="group-span-filestyle " tabindex="0" data-target="#addMyPhotoModal" data-toggle="modal">
					<label for="filestyle-1" class="btn btn-default">
						<span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span>
						<span class="buttonText">Add Photo</span>
					</label>
				</span>
			</div>
		</div>
	</div>
<?php } else {?>
<!--****************************RATING SCORE*********************************************-->
	<div class="Repo_box margin-t20">
		<div>
			<h4 class="margin-b10"><b>Photo Rating Score</b></h4>
			<?php if($ratedPhotoCount >= 3){?>
				<div class="ratting">
					<p><?php echo $avgRating=$userProfileObj->getAverageRating($user_id);?></p>
				</div>
				<div class="pull-left">Average rating <br />of your photos</div>
			<?php }else{ ?>
				<div class="pull-left" style="font-size:15px;">You must have at least 3 photos<br />rated to get your average score.</div>
			<?php } ?>
		</div>
		<div class="photos clearfix">
		<ul>
		  <?php 
			$pc=1;
			 while($ratedPhotoResult=mysql_fetch_assoc($ratedPhotoQuery)){
					$ratedPhotorating =0;
					$ratedPhoto=$userProfileObj->getPhotoPath($ratedPhotoResult['photo']);
					$ratedPhotorating = $userProfileObj->getPhotoAverageRating($ratedPhotoResult['photo_id']);
			?>
			<li>
				<img src="<?php echo $ratedPhoto; ?>"/>
				<a class="" href="javascript:void(0);">
					<?php if($ratedPhotoResult['status'] == 0) {?>
						<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>
					<?php }else if($ratedPhotorating != 0){
							echo $ratedPhotorating;
						}else {?>
						<i class="fa fa-clock-o"  data-toggle="tooltip" data-placement="bottom" title="Photo is currently being rated"></i>
					<?php }
					?>				 
				</a>
			</li>
			 <?php 
				if($pc > 3){
					break;
				}
				else {
					$pc++;
				}
			 }  
			 for($k=4 ; $k > $ratedPhotoCount;$k--){?>
					<li><img src="images/q.jpg"/></li>
			<?php } ?>
		
		</ul>
	</div>
		<div class="align-c"><a href="my-photo-score.php" class="btn btn-default custom slat-blue">See My Rating </a></div>
		<div><p class="bold"><a href="rate-photos.php"><span class="green">Rate other people</span></a> to see how you compare</p></div>
	</div>			
<?php } } ?>
<div class="vip_bx margin-t20">
	<a href="add-friends.php">
		<img src="images/vip-tag.png"/>
	</a>
</div>
<?php if($page != 'rate-photos' && $page != 'profile-visitor' && $page != 'like') { ?>		
<div class="Repo_box margin-b20">
	<div>
		<h4 class="margin-b10"><b>Customize your profile</b></h4>
		<div class="slider-pattern">
		<div class="slide">
			<ul class="theme-pattern">
				<li>
					<a href="javascript:void(0);" class="blank"><img src="images/blank.png"/></a>
					<?php
					if($CustomizeTheme == ''){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);" class="red_ptn_btn" id="red_ptn1"><img src="images/pattern/pattern1.png"/></a>
					<?php if($CustomizeTheme == 'red_ptn'){ ?>
						<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
						<?php } ?>
				</li>
				<li class="last">
					<a href="javascript:void(0);" class="yellow_ptn_btn" id="yellow_ptn"><img src="images/pattern/pattern2.png"/></a>
					<?php if($CustomizeTheme == 'yellow_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);"  class="green_ptn_btn" id="green_ptn"><img src="images/pattern/pattern3.png"/></a>
					<?php if($CustomizeTheme == 'green_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);"  class="orange_ptn_btn" id="orange_ptn"><img src="images/pattern/pattern4.png"/></a>
					<?php if($CustomizeTheme == 'orange_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li class="last">
					<a href="javascript:void(0);"  class="blue_ptn_btn" id="blue_ptn"><img src="images/pattern/pattern5.png"/></a>
					<?php if($CustomizeTheme == 'blue_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
			</ul>
		</div>
		<div class="slide">
			<ul class="theme-pattern">
				<li>
					<a href="javascript:void(0);" class="red_ptn_btn" id="red_ptn1"><img src="images/pattern/pattern1.png"/></a>
					<?php if($CustomizeTheme == 'red_ptn'){ ?>
						<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
						<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);" class="yellow_ptn_btn" id="yellow_ptn1"><img src="images/pattern/pattern2.png"/></a>
					<?php if($CustomizeTheme == 'yellow_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li class="last">
					<a href="javascript:void(0);"  class="green_ptn_btn" id="green_ptn1"><img src="images/pattern/pattern3.png"/></a>
					<?php if($CustomizeTheme == 'green_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);"  class="orange_ptn_btn" id="orange_ptn1"><img src="images/pattern/pattern4.png"/></a>
					<?php if($CustomizeTheme == 'orange_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li>
					<a href="javascript:void(0);"  class="blue_ptn_btn" id="blue_ptn1"><img src="images/pattern/pattern5.png"/></a>
					<?php if($CustomizeTheme == 'blue_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
				<li class="last">
					<a href="javascript:void(0);"  class="pink_ptn_btn" id="pink_ptn1"><img src="images/pattern/pattern6.png"/></a>
					<?php if($CustomizeTheme == 'pink_ptn'){ ?>
					<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>
					<?php } ?>
				</li>
		</ul>
		</div>
		</div>
	</div>
	<div class="align-c"><a href="javascript:void(0);" id="apply_custome_theme" class="btn btn-default custom slat-blue">Apply </a> or  <a href="" class="green">Cancel</a></div>
</div>
<?php } ?>
</div>