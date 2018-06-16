	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 lh-height">
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
			<div class="pull-left">
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
		$profileVisitorCount=$userProfileObj->profileVisitorCount($user_id);
		$userLikeCount=$userProfileObj->userLikeCount($user_id);
		$userFavouriteCount=$userProfileObj->userFavouriteCount($user_id);
		$userBlockCount=$userProfileObj->userBlockCount($user_id);
		$ratedMeUserArray=$userProfileObj->getRatedMeUser($user_id);										
		$getRatedMeUserCount=count($ratedMeUserArray);
		?>
		<div>
			<div class="list-group custom">
				<a href="profile-visitor.php" class="list-group-item disabled"><span class="pv"></span> Profile Visitors <span class="badge"><?php echo $profileVisitorCount;?></span></a>
				<a href="like-me-non-vip.php" class="list-group-item"><span class="lm"></span> Liked Me <span class="badge"><?php echo $userLikeCount;?></span></a>
				<a href="rated-me.php" class="list-group-item"><span class="rmp"></span> Rated My Photos <span class="badge"><?php echo $getRatedMeUserCount;?></span></a>
				<a href="#" class="list-group-item"><span class="mf"></span> My Favourites <span class="badge"><?php echo $userFavouriteCount;?></span></a>
				<a href="#" class="list-group-item"><span class="com"></span> Comments <span class="badge">0</span></a>
				<a href="#" class="list-group-item"><span class="blk"></span> Blocked <span class="badge"><?php echo $userBlockCount;?></span></a>
			</div>
		</div>
	</div>				

	<?php if($page != 'my-photos' || $page != 'rate-photos') {?>

	<!--****************************RATING SCORE WITHOUT IMAGE*********************************************-->
	<?php
	$ratedPhotoQuery=$userProfileObj->getMyphots($user_id);
	if(mysql_num_rows($ratedPhotoQuery) == 0){
	?>
	<div class="Repo_box margin-t20">
			<div>
				<h4 class="margin-b10">Photo Rating Score</h4>
				<div class="pull-left">There are over <?php echo $userProfileObj->getAllPhotosCount();?>  photos here already. Add your photo now to get your photo rating score!</div>
			</div>
			<div class="photos empty clearfix">
				<div>
					<a href=""><img src="images/add-img-icon-blue.png"></a>
				</div>
			</div>
			<div class="align-c input_custom">
				<!--<input type="file" class="filestyle btn-default slat-blue" data-input="false" data-buttontext="Add Photo" id="filestyle-1" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">-->
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
			<h4 class="margin-b10">Photo Rating Score</h4>
			<div class="ratting">
				<p><?php echo $avgRating=$userProfileObj->getAverageRating($user_id);?></p>
			</div>
			<div class="pull-left">Average rating <br />of your photos</div>
			</div>
			<div class="photos clearfix">
			<ul>
			  <?php 
				 while($ratedPhotoResult=mysql_fetch_assoc($ratedPhotoQuery)){
						$ratedPhoto=$userProfileObj->getPhotoPath($ratedPhotoResult['photo']);
						$ratedPhotorating = $userProfileObj->getPhotoAverageRating($ratedPhotoResult['photo_id']);
				?>
				<li>
					<img src="<?php echo $ratedPhoto; ?>"/>
					<a class="" href="javascript:void(0);">
						<?php if($ratedPhotoResult['status'] == 0) {?>
							<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>
						<?php }else if($ratedPhotorating != 0){
								echo round($ratedPhotorating);
							}else {?>
							<i class="fa fa-clock-o"  data-toggle="tooltip" data-placement="bottom" title="Photo is currently being rated"></i>
						<?php }
						?>				 
					</a>
				</li>
				 <?php 
				 }  
				 ?>
			</ul>
		</div>
			<div class="align-c"><a href="my-photo-score.php" class="btn btn-default custom slat-blue">See My Rating </a></div>
			<div><p class="bold"><a href="rate-photos.php"><span class="green">Rate other people</span></a> to see how you compare</p></div>
		</div>			
	<?php } } ?>
	<div class="vip_bx margin-t20">
		<img src="images/vip-tag.png"/>
	</div>

	</div>
<!--Pop  Increase My Reputation-->
<div id="increaseReputation" class="modal fade login_pop" role="dialog" >
	<!--<div class="modal-dialog-vip">-->
	<div class="modal-dialog-vip">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Users with the hottest reputations get more interest</b></h4>
					<p class="text-normal1"> Speed things up & choose one of the following ways to increase your reputation right now</p>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="col-1">
							<span class="c-bx">
								<input type="checkbox" id="" class="style-checkbox check1">
								<span class="style-checkbox1"><i class="fa fa-square fa-2x"></i></span>
							</span>
							<div class="popup_add_photo padding20">
								<img src="images/icon-17.png"/>
							</div>
							
							<div>
							<h5 class="align-c lh-20 color-red-b"><b>Get to the top of People Search</b></h5>
							<p class="align-c text-normal1 lh-20">Promote your profile to first place in search results for your area</p>
							</div>
						</div>
						
						<div class="col-1">
							<span class="c-bx">
								<input type="checkbox" id="" class="style-checkbox check2">
								<span class="style-checkbox2"><i class="fa fa-square fa-2x"></i></span>
							</span>
							<div class="popup_add_photo padding20">
								<img src="images/icon-18.png"/>
							</div>
							
							<div>
							<h5 class="align-c lh-20 color-red-b"><b>Appear more often in Kismat Connection</b></h5>
							<p class="align-c text-normal1 lh-20">Get 100 more priority displays in Kismat Connection to increase your chances of other people liking you</p>
							</div>
						</div>
						
						<div class="col-1">
							<span class="c-bx">
								<input type="checkbox" id="" class="style-checkbox check3">
								<span class="style-checkbox3"><i class="fa fa-square fa-2x"></i></span>
							</span>
							<div class="popup_add_photo padding20">
								<img src="images/icon-16.png"/>
							</div>
							
							<div>
							<h5 class="align-c lh-20 color-red-b"><b>Get seen on  the Fame Reel</b></h5>
							<p class="align-c text-normal1 lh-20">Appear on the Fame Reel at the top of the page & let other Startrisha users notice you quicker</p>
							</div>
						</div>
						
						<div class="clearfix"></div>
						
						<div class="popup_add_photo margin-t20">
							<a href="" class="btn btn-default padding-lr-40 custom red">Increase My Reputation!</a>
						</div>
						<!--<div class="pap_font pull-left">
							<a href="#">I’ll add one later</a>
						</div>-->
						<!--<button type="button" class="btn btn-danger full bold">Increase My Reputation!</button>-->
					</form>
					<!--checkbox-->
					<!--<span class="c-bx">
						<input type="checkbox" id="" class="style-checkbox">
						<span class="style-checkbox1"><i class="fa fa-square fa-2x"></i></span>
					</span>-->
					<!--End checkbox-->
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Increase My Reputation-->
<script type="text/javascript">
$(document).ready(function(){
	$('.slider-pattern').bxSlider({
		slideWidth: 230,
		minSlides: 1,
		maxSlides: 1,
		pager:false, 
		slideMargin: 10
	});
	$(".red_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("red_ptn");
	});
	$(".yellow_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("yellow_ptn");
	});
	$(".green_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("green_ptn");
	});
	$(".orange_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("orange_ptn");
	});
	$(".blue_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("blue_ptn");
	});
	$(".pink_ptn_btn").live('click' ,function(){
		$("body").removeClass();
		$("body").addClass("pink_ptn");
	});
	$(".blank").live('click' ,function(){
		$("body").removeClass();
	});
	$('#apply_custome_theme').click(function(){
		var theme_name = $('body').attr('class');
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/profile.php",
			data:{theme_name:theme_name , action :'customizeProfile'},
			success:function(result){
				$('.check_done_btn').html('');
				$('#'+theme_name).after('<span class="green check_done_btn"><i class="fa fa-check-square"></i></span>');
				$('#preloader').hide();
			}
		});
	});
});
</script>