<!--#############################LOADR#######################################-->
<?php 
$output_file = time().".jpeg";
if(isset($_POST['img_hidden']))
{
	$img_string = $_POST['img_hidden'];
	function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );
	
    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[1] ) );
	
    // clean up the file resource
    fclose( $ifp ); 
	
    return $output_file; 
}
base64_to_jpeg($img_string,$output_file);
}
?>
<div id="preloader" style="display:none;">

</div>
<style>
    #page-preloader {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background-color: rgba(255, 255, 255, 0.90);z-index: 9999;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);}

    .loading-text {position: absolute;top: 50%;bottom: 0;left: 0;right: 0;margin: auto;text-align: center;width: 100%;}
    .loading-text span {display: inline;margin: 0;background: transparent;border-color:0;padding: 9px;border-radius: 3px; color: red;font-size: 33px;font-weight: bold;}
    .loading-text span:nth-child(1) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 0s infinite linear alternate;
        animation: blur-text 1.8s 0s infinite linear alternate;
    }
    .loading-text span:nth-child(2) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 0.2s infinite linear alternate;
        animation: blur-text 1.8s 0.2s infinite linear alternate;
    }
    .loading-text span:nth-child(3) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 0.4s infinite linear alternate;
        animation: blur-text 1.8s 0.4s infinite linear alternate;
    }
    .loading-text span:nth-child(4) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 0.6s infinite linear alternate;
        animation: blur-text 1.8s 0.6s infinite linear alternate;
    }
    .loading-text span:nth-child(5) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 0.8s infinite linear alternate;
        animation: blur-text 1.8s 0.8s infinite linear alternate;
    }
    .loading-text span:nth-child(6) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 1s infinite linear alternate;
        animation: blur-text 1.8s 1s infinite linear alternate;
    }
    .loading-text span:nth-child(7) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 1.2s infinite linear alternate;
        animation: blur-text 1.8s 1.2s infinite linear alternate;
    }
    .loading-text span:nth-child(8) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 1.4s infinite linear alternate;
        animation: blur-text 1.8s 1.4s infinite linear alternate;
    }
    .loading-text span:nth-child(9) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 1.6s infinite linear alternate;
        animation: blur-text 1.8s 1.6s infinite linear alternate;
    }
    .loading-text span:nth-child(10) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 1.8s infinite linear alternate;
        animation: blur-text 1.8s 1.8s infinite linear alternate;
    }
    .loading-text span:nth-child(11) {
        -webkit-filter: blur(0px);
        filter: blur(0px);
        -webkit-animation: blur-text 1.8s 2.0s infinite linear alternate;
        animation: blur-text 1.8s 2.0s infinite linear alternate;
    }

    @-webkit-keyframes blur-text {
        0% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
        }
        100% {
            -webkit-filter: blur(4px);
            filter: blur(4px);
        }
    }

    @keyframes blur-text {
        0% {
            -webkit-filter: blur(0px);
            filter: blur(0px);
        }
        100% {
            -webkit-filter: blur(4px);
            filter: blur(4px);
        }
    }

</style>



    <div id="page-preloader">
        <div class="loading-text">
            <span class="loading-text-words">S</span>
            <span class="loading-text-words">T</span>
            <span class="loading-text-words">A</span>
            <span class="loading-text-words">R</span>
            <span class="loading-text-words">T</span>
            <span class="loading-text-words">R</span>
            <span class="loading-text-words">I</span>
            <span class="loading-text-words">S</span>
            <span class="loading-text-words">H</span>
            <span class="loading-text-words">T</span>
            <span class="loading-text-words">A</span>
        </div>
    </div>

<style>

	#page-status {
	  background: url(images/loader.gif) no-repeat 50% 50%;
	  margin: 250px auto 0 auto;
	  width: 300px;
	  height: 300px;
	}
	#preloader{
	  position: fixed;
	  top: 0;
	  left: 0;
	  right: 0;
	  bottom: 0;
	  background-color: #ccc;
	  z-index: 9999;
	  opacity: .5;
	  display:block;
	}
	#status{
	  background: url(images/loader.gif) no-repeat 50% 50%;
	  margin: 250px auto 0 auto;
	  width: 300px;
	  height: 300px;
	}
	.img-progress-bar {background-color: #1abc9c; height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
	.img-progress-div {padding: 5px 0px;
    margin: 5px auto;
    border-radius: 4px;
    text-align: center;
    width: 235px;
	display:none;
	}
	body.modal-open {
    overflow: hidden;
}
</style>

<!--################################TUTORIALS#####################################-->
	<?php 
	if($userResult['tut_status'] == 0 || 1){
	?>
		<div id="start-tutorial" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div>
						<div class="modal-header-1">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<div class="content-box">
								<div id="tutorial_1" class="carousel slide" data-ride="carousel">
									<!-- Indicators -->
									<ol class="carousel-indicators">
										<li data-target="#tutorial_11" data-slide-to="0" class="active"></li>
										<li data-target="#tutorial_11" data-slide-to="1"></li>
										<li data-target="#tutorial_11" data-slide-to="2"></li>
										<li data-target="#tutorial_11" data-slide-to="3"></li>
										<li data-target="#tutorial_11" data-slide-to="4"></li>
										<li data-target="#tutorial_11" data-slide-to="5"></li>
										<li data-target="#tutorial_11" data-slide-to="6"></li>
										<li data-target="#tutorial_11" data-slide-to="7"></li>
									</ol>
									  <!-- Wrapper for slides -->
									<div class="carousel-inner" role="listbox">

										<div class="item active">
											<img src="images/tutorial.png" />
											<h4>Welcome! This tour walks you through the basics of Startrishta. Use the top three icons to check your messages, play our fun Kismat Connection game or find new people in People Search.</h4>
										</div>

										<div class="item">
											<img src="images/user-tutorial.png" />
											<h4>At a glance see how many credits you have available, and whether you have an active VIP subscription. Credits can be spent promoting your profile across the site and a VIP subscription unlocks awesome new features!</h4>
										</div>

										<div class="item">
											<img src="images/getme.png" />
											<h4>This is the Fame Reel. You can add your own picture here to get seen by everyone on Startrishta and meet people quicker.</h4>
										</div>
										
										<div class="item">
											<img src="images/reputation-2.png" />
											<h4>Your Reputation depends on how popular you are on Startrishta, you can increase it by interacting with new users. Members with the hottest reputations tend to meet more people!</h4>
										</div>
										
										<div class="item">
											<img src="images/photo-rate.png" />
											<h4>View your photo ratings that other members have given you. Rate their photos in return.</h4>
										</div>
										
										<div class="item">
											<img src="images/photo.png" />
											<h4>Your main profile information goes here, you can add interests, information about you, and what sort of person you are looking for.</h4>
											<h4>Adding your information will increase your chances of finding likeminded people.</h4>
										</div>
										
										<div class="item">
											<img src="images/sticker-1.png" />
											<h4>Collect Reward Badges and earn free credits by being an active member on Startrishta.</h4>
										</div>
										
										<div class="item">
											<img src="images/reputation-last.png" />
										    <h3 class="margin-b10">You are ready now!</h3>
										    <h5>Enjoy using Startrishta now.Be sure to go to our <a href="<?php echo HTTP_SERVER;?>faq.php">FAQ page</a> if you need more assistance.</h5>
											<button type="button" class="close get-started" data-dismiss="modal" id="get-started">Get Started</button>
												<!--<p>Replay tutorial</p>-->
										</div>
									</div>

									  <!-- Left and right controls -->
									  <a class="left carousel-control" href="#tutorial_1" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									  </a>
									  <a class="right carousel-control" href="#tutorial_1" role="button" data-slide="next">
										<span class="glyphicon glyphicon-circle-arrow-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									  </a>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End tutorial  Settings popup-->
	
	<?php }
		############################################RECEIVE A GIFT###############################################
		$recevieGiftQuery=mysql_query("SELECT g.gift ,ug.message,ug.private,ug.user_gift_id , u.user_id , u.user_name FROM sr_gifts g,sr_user_gift ug,sr_users u WHERE ug.gift_id=g.gift_id AND ug.gifted_by=u.user_id AND ug.user_id='".$user_id."' AND ug.status=0");
	if(mysql_num_rows($recevieGiftQuery)>0) {
		while ($recevieGiftResult = mysql_fetch_assoc($recevieGiftQuery)) {
			?>
			<div class="modal fade login_pop recievegift"
				 id="recievegift-<?php echo $recevieGiftResult['user_gift_id']; ?>" role="dialog">
				<div class="modal-dialog-1">
					<div class="modal-content">
						<div>
							<div class="modal-header">
								<button type="button" class="close close_receive_gift"
										id="close_receive_gift1-<?php echo $recevieGiftResult['user_gift_id']; ?>">&times;</button>
								<h4><b>Congratulations, <br/><span><?php echo $recevieGiftResult['user_name']; ?></span>
										sent you a gift!</b></h4>
							</div>
							<div class="modal-body">
								<form class="login-form">
									<div class="popup_add_photo">
									</div>
									<div>
										<div class="center-block img_r_gift" href=""><img
													src="images/<?php echo $recevieGiftResult['gift']; ?>"/></div>
										<h5 class="align-c lh-20"><b><?php echo $recevieGiftResult['message']; ?></b>
										</h5>
									</div>
									<div class="popup_add_photo margin-t20">
										<input type="hidden" value="<?php echo $recevieGiftResult['user_id']; ?>" id="gift_user_id"/>
										<!--<a onclick="location.href = 'user-message.php?chat_id=<?php /*echo $recevieGiftResult["user_id"];*/
										?>';" class="btn btn-default padding-lr-40 custom red" id="close_receive_gift2-<?php /*echo $recevieGiftResult['user_gift_id'];*/
										?>" data-dismiss="modal" >Message Now </a> or <a href="javascript:void(0);" class="close_receive_gift" id="close_receive_gift-<?php /*echo $recevieGiftResult['user_gift_id'];*/
										?>">close</a>
										title from hyperlink removed by Chitra 19/5/2017-->

										<a href="javascript;void(0)"
										   class="btn btn-default padding-lr-40 custom red close_receive_gift2"
										   id="close_receive_gift2-<?php echo $recevieGiftResult['user_gift_id']; ?>-<?php echo $recevieGiftResult["user_id"];?>"
										   data-dismiss="modal" data="<?php echo $recevieGiftResult["user_id"];?>">Message Now </a>
										    or 
										   <a href="javascript:void(0);" class="close_receive_gift"
										   id="close_receive_gift-<?php echo $recevieGiftResult['user_gift_id']; ?>">close</a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		<?php }
	}
	else
	{
		?>
<div class="modal recievegiftajax" id="recievegift" role="dialog">
	</div>
			<?php
	}
		################################################REWARD CREDIT###############################################
		$rewardCreditQuery=mysql_query("SELECT * FROM sr_user_credit WHERE user_id='".$user_id."' AND status= 0");
		while($rewardCreditResult=mysql_fetch_assoc($rewardCreditQuery)){?>
			<div id="win-free-credits-<?php echo $rewardCreditResult['credit_id'] ;?>" class="modal fade login_pop win-free-credits" role="dialog" >
				<div class="modal-dialog-1-2">
					<div class="modal-content">
						<div>
							<div class="modal-header">
								<button type="button" class="close gotRewardCredit" 
								id="gotRewardCredit1-<?php echo $rewardCreditResult['credit_id'] ;?>" >&times;</button>
								<h5><b>You received free credits!</b></h5>
							</div>
							<div class="modal-body">
								<form class="login-form">
									<h4 class="align-c"><b><?php echo $rewardCreditResult['credit']; ?> Startrishta Credits</b></h4>
									<div class="popup_add_photo margin-t10">
										<img src="images/credits.png"/><br>
									</div>
									<div>
										<h5 class="align-c">Use your credits to meet new people by 
										<a href="javascript:void(0);" class="promo promoRewardCredit" 
										id="promoRewardCredit-<?php echo $rewardCreditResult['credit_id'] ;?>">promoting your profile</a></h5>
									</div>
									<div class="popup_add_photo margin-t20">
										<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red gotRewardCredit" 
										id="gotRewardCredit-<?php echo $rewardCreditResult['credit_id'] ;?>">Got it </a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php } 
		#################################################FREE VIP MEMBERSHIP############################################
		$freeVipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$user_id."' 
			AND vip_id=0 AND is_received=0 AND DATE(start_date) <'".DATE_TIME."' 
			AND DATE(end_date) >='".DATE_TIME."' ");
		if($freeVipQuery && mysql_num_rows($freeVipQuery)){
			$freeVipResult=mysql_fetch_assoc($freeVipQuery);
			mysql_query("UPDATE sr_vip_user SET is_received=1 WHERE user_id='".$user_id."' AND vip_id=0 AND id='".$freeVipResult['id']."'");
		?>
			<!--Alert congratulation  Vip-->
			<div id="free_vip_cong" class="modal fade login_pop" role="dialog">
				<div class="modal-dialog-1">
					<div class="modal-content">
						<div >
							<div class="modal-header Congratulations">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h3><b>Congratulations!</b></h3>
							</div>
							<div class="modal-body">
								<form class="login-form">
									<div class="popup_add_photo"></div>
									<div>
										<h5 class="align-c margin-b15"><b>One of your friends has joined Startrishta.</b></h5>
										<h5 class="align-c"><b>You've been rewarded with 24 hours free <br> VIP membership - Enjoy!</b></h5>
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
		<!--End Alert congratulation  Vip-->
	
	<?php }

	$dailyRewardsQuery=mysql_query("SELECT r.reward_title, r.reward_text, r.reward_desc, r.reward_icon , ur.* FROM sr_user_reward ur , sr_rewards r WHERE ur.reward_id = r.reward_id AND ur.user_id = '".$user_id."' AND is_latest=1 AND is_received=0  AND r.status = 1 GROUP BY r.reward_id") or die(mysql_error());
		while($dailyRewardsResult=mysql_fetch_array($dailyRewardsQuery))
		{
			//print_r($dailyRewardsResult);
			?>
			<div id="go4sticker-<?php echo $dailyRewardsResult['reward_id'];?>" class="modal go4sticker fade login_pop" role="dialog" >
				<input type="hidden" class="user_reward_id" value="<?php echo $dailyRewardsResult['user_reward_id']; ?>" />
				<div class="modal-dialog-1">

					<div class="modal-content">

						<div >

							<div class="modal-header">

								<button type="button" class="close" data-dismiss="modal">&times;</button>

								<h5><b>Congratulations! You just won a Badge</b></h5>

							</div>



							<div class="modal-body">

								<form class="login-form">

									<h5 class="align-c"><?php echo $dailyRewardsResult['reward_title'];?></h5>

									<div class="popup_add_photo margin-t10">

										<div class="sticker_bg">

											<img src="images/reward/<?php echo $dailyRewardsResult['reward_icon'];?>"/>

										</div>

										<p class="align-c">Awarded on <?php echo date('d F Y' , strtotime($dailyRewardsResult['awarded_on']));?></p>

									</div>

									<div>

										<p class="align-c lh-20"><b><?php echo $dailyRewardsResult['reward_text'];?></b></p>

									</div>

									<div class="popup_add_photo margin-t20">

										<a href="" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Got it </a>

									</div>

								</form>

							</div>

						</div>

					</div>

				</div>

			</div>
				<?php
		}
	?>

	<!--UPLOAD PROFILE IMAGE-->
	<div id="myModal2" class="modal fade login_pop bs-example-modal-sm" data-backdrop="static" role="dialog" >
		<div class="modal-dialog home_pg modal-sm">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add a profile picture!</h4>
					</div>
					<div class="modal-body">
						
							<div>
								<p class="align-c forget-btxt">You'll need to add at least one picture of yourself so others can chat with you.</p>
							</div>
							<!--<div class="popup_add_photo" id="viewimage">
								<!--<img src="images/dammy-profile-popup.png" id="dammyProfileImage"/>
								<img src="" id="displayProfileImage" class="displayProfileImage"/>
							</div>-->
										
								<!--<input type="file" name="profile_image" id="profile_image" class="filestyle btn-default slat-blue" data-input="false" data-buttonText="Upload Photo">-->
								
								<div class="upload-one clearfix">
									<form class="uploadform" method="post" enctype="multipart/form-data" action='upload.php' name="photo">
									<input type="file" name="imagefile" id="imagefile" class="filestyle btn-default slat-blue clearfix cropit-image-input" data-input="false" data-buttonText="Upload Photo" />
											<input type="hidden" id="img_hidden" name="img_hidden"/>
									<input type="submit" value="Upload" class="upload_button" style="text-align: center;float: right;width: 100%;" name="submitbtn" id="submitbtn" />
									</form>		
								
								</div>
								<div class="align-c">or </div>
								<form class="login-form" name="thumbnail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
									<input type="hidden" name="x1" value="0" id="x1" />
									<input type="hidden" name="y1" value="0" id="y1" />
									<input type="hidden" name="x2" value="100" id="x2" />
									<input type="hidden" name="y2" value="100" id="y2" />
									<input type="hidden" name="w" value="100" id="w" />
									<input type="hidden" name="h" value="100" id="h" />
									<input type="hidden" name="wr" value="" id="wr" />
									
									<input type="hidden" name="filename" value="" id="filename" />
									
									<div class="popup_add_photo">
									 <?php
                                     if(!isset($_SESSION['fb_dp']))
                                     {
                                     ?>
                                        <a class="btn btn-default fb-blue" href="<?php echo FBIMPORT;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
                                        <?php }
                                        else
                                        {
                                            ?>
                                            <a class="btn btn-default fb-blue" href="javascript:void(0)" style="font-size: 14px;text-shadow: none;" id="fb_dp"> <i class="fa fa-facebook-square"></i>&nbsp;Use Facebook image as profile image. </a>
                                        <?php
                                        }
                                        ?>
									</div>
									<div>
										<!--<input class="login_btn" type="submit" id="uploadProfileImage" name="uploadProfileImage" value="Done"/>-->
										<input type="submit" name="upload_thumbnail" value="Done" id="save_thumb" class="login_btn export-profile" />
									</div>
								</form>
							<div class="pap_font pull-left">
								<a href="javascript:void(0);" data-dismiss="modal">I'll add one later</a>
                            </div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="addProfilePhotoModal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<?php 
						switch( $page ):
						case 'profile':
							?><h4>Add new photos of yourself to vote</h4><?php
						break;
						case 'kismat-connection':
							?><h4>Add a photo to play Kismat Connection</h4><?php
						break;
						case 'profile-visitor':
							?><h4>Add a photo of yourself to view your profile visitors</h4><?php
						break;
						default:
							?><h4>You need to add profile photo first!</h4><?php
						break;
						endswitch;
						?>
					</div>
					<div class="modal-body">
						<form class="login-form popup-bg" id="profile-photo-form" method="POST" action="" enctype="multipart/form-data">
							<div class="popup_add_photo margin-t30 margin-b15">
								<img src="images/add-img-icon-blue.png"/>
							</div>
							<div id="upload-image-body-content">
							<?php
							switch( $page ):
							case 'profile':
								?><h4 class="align-c width-80"><b>You cannot like people without a photo!</b></h4> 
								<h4 class="align-c width-80">Add one now to unlock your voting privileges.</h4><?php
							break;
							case 'kismat-connection':
								?><h4 class="align-c width-80"><b>To like other people you need to add a profile picture first!</h4><?php
							break;
							case 'profile-visitor':
								?><h4 class="align-c width-80"><b>Upload Photos</b></h4> 
								<h4 class="align-c width-80">and meet people near you today. </h4><?php
							break;
							default:
								?><h4 class="align-c width-80"><b>Upload Photos</b></h4> 
								<h4 class="align-c width-80">and meet people near you today. </h4><?php
							break;
							endswitch;
							?>
							</div>
							<div class="input_custom popup_add_photo margin-t20">
								<input type="file" name="profile_image" id="profile_image1" class="filestyle btn-default slat-blue" data-input="false" data-buttonText="Upload Photo">
								<input type="hidden" name="uploadProfileImage">
								
							</div>
							<div class="align-c white1">or </div>
							<div class="popup_add_photo">
							 <a class="btn btn-default fb-blue bold" href="<?php echo FBIMPORT;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
							</div>
							<br>
							<p class="align-c gray text-normal width-90"> You can add up to 500 photos in your 'Photos of you' album. We accept JPG and PNG file formats. Individual file size limit must not exceed 10MB.</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	<!-------------------------------UPLOAD MY PHOTO------------------------------------------>
	<div id="addMyPhotoModal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" id="close_modal" class="close" data-dismiss="modal">&times;</button>
						<?php if($page == 'average-rate'){?>
							<h4>Add New photos of Yourself to get them Rated</h4>
						<?php }else if($page == 'rate-photos'){?>
							<h4>Add New photos of Yourself to Rate other People</h4>
						<?php }else if($page == 'average-rate'){?>
							<h4>Add New Photos</h4>
						<?php }else if($page == 'kismat-connection'){?>
							<h4>Add More Photos to play</h4>
						<?php }else if($page == 'average-rate'){?>
							<h4>Add New Photos</h4>
						<?php }else{?>
							<h4>Add New Photos</h4>
						<?php }?>
					</div>
					<div class="modal-body">
						
						<form class="login-form popup-bg" id="my-photo-form" enctype="multipart/form-data" method="post" action="upload-photo.php">
							<div class="popup_add_photo">
								<img src="images/icon-007.png" />
							</div>
							<div>
							<h4 class="align-c width-80"><b>Upload Photos</b></h4> 
							<?php if($page == 'average-rate'){?>
								<h4 class="align-c width-80">and other people will rate them. </h4>
							<?php }else if($page == 'kismat-connection'){?>
								<br /><h4 class="align-c width-80"><b>and meet people near you today.</b></h4>
								<!--<br /><h4 class="align-c width-80"><b>It looks like you don't have 3 photos of yourself on Startrishta.</b></h4>
								<br /><h4 class="align-c width-80">You need to add at least three photo of yourself to like other people in kismat connection!</h4>-->
							<?php }else if($page == 'rate-photos'){?>
								<h4 class="align-c width-80">to rate other people. </h4>
							<?php } else {?>
							<h4 class="align-c width-80">and meet people near you today. </h4>
							<?php } ?>
							</div>
							<div class="input_custom popup_add_photo margin-t20">
								<input type="file" name="upload_photo[]" id="upload_my_photo" class="filestyle btn-default slat-blue" data-input="false" data-buttonText="Upload Photo" multiple>
								<input type="hidden" name="action" value="uploadMyPhoto" />
								<div id="loading-icon"></div>
								
							</div>
							<div  class="error-bar" style="color: red;text-align: center;"></div>
							<!--<div id="progress-div" class="img-progress-div">
								<div id="progress-bar" class="img-progress-bar"></div>
							</div>-->
							<div class="align-c white1">or </div>
							<div class="popup_add_photo">
								<a class="btn btn-default fb-blue" href="<?php echo FBIMPORT;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
							</div>
							<br />
							<p class="align-c gray text-normal width-90"> You can add up to 500 photos in your 'Photos of you' collection. We accept JPG and PNG file formats. Individual file size limit must not exceed 10MB.</p>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-------------------------------UPLOAD GROUP PHOTO--------------------------------------->
	 <div id="addGroupPhotoModal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4>Add New Photos</h4>
					</div>
					<div class="modal-body">
						<form action="upload-photo.php" id="group-photo-form" class="login-form popup-bg" enctype="multipart/form-data" method="post">
							<div class="popup_add_photo">
								<img src="images/icon-007.png" />
							</div>
							<div>
							<h4 class="align-c width-80"><b>Upload Photos</b></h4> 
							<h4 class="align-c width-80">and meet people near you today. </h4>
							</div>
							<div class="input_custom popup_add_photo margin-t20">
								<input type="file" name="upload_photo[]" id="upload_group_photo" class="filestyle btn-default slat-blue" data-input="false" data-buttonText="Upload Photo" multiple >
								<input type="hidden" name="action" value="uploadGroupPhoto" />
								<div id="loading-Group"></div>
							</div>
							<!--<div id="progress-div1" class="img-progress-div">
								<div id="progress-bar1" class="img-progress-bar"></div>
							</div>-->
							<div class="align-c white1">or </div>
							<div class="popup_add_photo">
							 <a class="btn btn-default fb-blue bold" href="<?php echo FBIMPORT;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
							</div>
							<br />
							<p class="align-c gray text-normal width-90"> You can add up to 500 photos in your 'Photos of you' collection. We accept JPG and PNG file formats. Individual file size limit must not exceed 10MB.</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-------------------------------UPLOAD PRIVATE PHOTO-------------------------------------->
	<div id="addPrivatePhotoModal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4>Add New Photos</h4>
					</div>
					
					<div class="modal-body">
						<form action="upload-photo.php" id="private-photo-form" class="login-form popup-bg" enctype="multipart/form-data" method="post">
							<div class="popup_add_photo">
								<img src="images/icon-007.png" />
							</div>
							<div>
							<h4 class="align-c width-80"><b>Upload Photos</b></h4> 
							<h4 class="align-c width-80">and meet people near you today. </h4>
							</div>
							<div class="input_custom popup_add_photo margin-t20">
								<input type="file" name="upload_photo[]" id="upload_private_photo" class="filestyle btn-default slat-blue" data-input="false" data-buttonText="Upload Photo" multiple>
								<input type="hidden" name="action" value="uploadPrivatePhoto">
								<div id="loading-Private"></div>
							</div>
							<!--<div id="progress-div2" class="img-progress-div">
								<div id="progress-bar2" class="img-progress-bar"></div>
							</div>-->
							<div class="align-c white1">or </div>
							<div class="popup_add_photo">
							 <a class="btn btn-default fb-blue bold" href="<?php echo FBIMPORT;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
							</div>
							<br />
							<p class="align-c gray text-normal width-90"> You can add up to 500 photos in your 'Photos of you' collection. We accept JPG and PNG file formats. Individual file size limit must not exceed 10MB.</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--------------------ERROR MODAL FOR UPLOAD PHOTO----------------------------->
	<div id="myModal4" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4>Add New photos</h4>
					</div>
					<div class="modal-body">
						<form class="login-form popup-bg">
							<div class="popup_add_photo">
								<img src="images/icon-006.png"/>
							</div>
							<div>
							<h4 class="align-c width-80"><b>Your photo size exceeds our file size limit of 10 MB.</b></h4> 
							<h4 class="align-c width-80">Please choose a different picture to upload.</h4>
							</div>
							<div class="popup_add_photo margin-t20">
								<a class="btn btn-default default slat-blue padding-r75 padding-l75" href="">Upload Photo </a>
							</div>
							<div class="align-c white1">or </div>
							<div class="popup_add_photo">
							 <a class="btn btn-default fb-blue bold" href=""> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
							</div>
							<br>
							<p class="align-c gray text-normal width-90"> You can add up to 500 photos in your 'Photos of you' album. We accept JPG and PNG file formats. Individual file size
							limit must not exceed 10MB.</p>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<div id="myModal5" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4>Add New photos</h4>
					</div>
					<div class="modal-body">
						<form class="login-form popup-bg">
							<div class="popup_add_photo">
								<img src="images/icon-006.png"/>
							</div>
							<div>
							<h4 class="align-c width-90 white"><b>You have exceeded your limit of 500 photos in your album,</b></h4> 
							<h4 class="align-c width-80">you will need to delete some pictures first</h4>
							<h4 class="align-c width-80">before adding new ones</h4>
							</div>
							<div class="popup_add_photo margin-t20">
								<a class="btn btn-default default slat-blue" href="">Go to my photo album </a>
							</div>
							<div class="align-c white1">or <a href="#" class="gray" data-dismiss="modal">Cancle</a></div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- ##########################INCREASE MY REPUTATION############################## -->
<!--Pop  Increase My Reputation-->
<div id="increaseReputation" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog-vip">
		<div class="modal-content">
			<div>
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Users with the hottest reputations get more interest</b></h4>
					<p class="text-normal1"> Speed things up & choose one of the following ways to increase your reputation right now</p>
				</div>
				<div class="modal-body">
					<form class="login-form">
						<div class="col-1">
							<span class="c-bx">
								<!--<input type="checkbox" class="style-checkbox check1 rep_checkbox">
								<span class="style-checkbox1"><i class="fa fa-square fa-2x"></i></span>-->
								<input id="rep_checkbox1" type="checkbox" class="rep_checkbox" value="raising-profile" />
								<label for="rep_checkbox1"><span class="pull-left"></span></label>
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
								<input id="rep_checkbox2" type="checkbox" class="rep_checkbox" value="appear-kc" />
								<label for="rep_checkbox2"><span class="pull-left"></span></label>
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
								<input id="rep_checkbox3" type="checkbox" class="rep_checkbox" value="get-me-here" />
								<label for="rep_checkbox3"><span class="pull-left"></span></label>
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
							<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="increase-my-reputation">Increase My Reputation!</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--End Increase My Reputation-->
<!----######################MODAL AND SCRIPT FOR USER ACTIONS######################-->
<?php
	require("include/user-action-modal.php");  
	require("include/vip-modal.php"); 
	require("include/credit-modal.php");

?>
<link type="text/css" rel="stylesheet" href="css/emojionearea.min.css"/>
<link type="text/css" rel="stylesheet" href="css/croping-custom.css"/>
<script src="js/user-action.js"></script>
<!--###################################COMMAN JS####################-->
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/validation.js"></script>
<script src="js/owl.carousel.js"></script>
<script src="js/custom.js"></script>
<script src="js/emojionearea.min.js"></script>
<!-- for image upload ajax -->
<script src="js/jquery.form.min.js" type="text/javascript"></script>
<!-- CROP IMAGE -->
<script src="js/jquery.bxslider.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery.imgareaselect.js"></script>
<script src="js/bootstrap-select.js"></script>
<script src="js/croping/iEdit.js"></script>
<script src="js/croping/script.js"></script>
<script>
	$("#crop-btn").click(function(){
		$(".image-editor").show();
	});
	$(".cropit-image-input").click(function(){
		$("#default-crop-wap").hide();
		$("#croping-wap-cont").show();
	});
   
</script>

<script type="text/javascript">
    $("#fb_dp").on('click',function () {
        $.ajax({
            url:"ajax/photo.php",
            type:"POST",
            data:"action=fb_dp",
            success:function (result) {
                location.reload();
            }
        });
       $("#myModal2").modal('hide');

    });
$(document).ready(function(){
	$('#start-tutorial').on('shown.bs.modal', function (e) {
		$('.carousel').carousel(0);
	});
	
	$(".sidebar-menu ul li label").hover(function(){
		$("#chatOnlineUserDiv .check-box").css("display","block");
	});
	//$('.carousel').carousel({
	//	interval: false,
	//});
	$(".slider_4").parent(".bx-viewport").height(160);
	$(".new-vip .vip-right-box-1 > ul > li > a, .new-vip .vip-right-box-1 > ul > div > li > a").click(function(){
			$(".new-vip .vip-right-box-1 > ul > li > a, .new-vip .vip-right-box-1 > ul > div > li > a").removeClass("active");
			$(".new-vip .vip-right-box-1 > ul > li > a i, .new-vip .vip-right-box-1 > ul > div > li > a i").removeClass("fa-caret-down");
			$(".new-vip .vip-right-box-1 > ul > li > a i, .new-vip .vip-right-box-1 > ul > div > li > a i").addClass("fa-caret-right");
			$("ul.benefits_details").slideUp("slow");
			if($(this).next("ul.benefits_details").is(":visible") == false){
				$(this).next("ul.benefits_details").slideDown("slow");
				$(this).find("i").addClass("fa-caret-down");
				$(this).find("i").removeClass("fa-caret-right");
				$(this).addClass("active");
			}else{
				//$(".new-vip .vip-right-box-1 > ul > li > a i").removeClass("fa-caret-down");
				//$(".new-vip .vip-right-box-1 > ul > li > a i").addClass("fa-caret-right");
			}
		});
		<!---popup right-box height with bg -->
		$("#cr_pay , #cr_pay1").click(function(){
			$(this).parents().parents().prev(".vip-right-box-1").addClass("vip_right_box_03");
		});
		$("#pp_pay , #pp_pay1").click(function(){
			$(this).parents().parents().prev(".vip-right-box-1").removeClass("vip_right_box_03");
		});

	 $('#myModal2').on('show.bs.modal', function (){
		// $('body').css({overflow: 'hidden'});
		//$(".imgareaselect-outer").css({'position','absdolute'});
		//$('.imgareaselect-outer, .imgareaselect-border1, .imgareaselect-border2, .imgareaselect-border3, .imgareaselect-border4, .imgareaselect-handle, .imgareaselect-selection').css({'display':'block'});
    }).on('hide.bs.modal', function (){
       // $('body').css({overflow: 'auto'});
		//$('.imgareaselect-outer,.imgareaselect-border1, .imgareaselect-border2, .imgareaselect-border3, .imgareaselect-border4, .imgareaselect-handle, .imgareaselect-selection').css({'display':'none'});
    });
});
$(window).load(function () {
    $('#page-preloader').fadeOut('slow');
})
$(window).load(function(){
	//$('#page-preloader').hide();
	$(".slider_4").parent(".bx-viewport").height(160);
	$(".margin_t-60").css("margin-top" , "1px");
});
$(window).resize(function(){
	$(".slider_4").parent(".bx-viewport").height(160);
	//$(".margin_t-60").css("margin-top" , "0px");
});
</script>
<script type="text/javascript" >
    $(document).ready(function() {
		$('.hidetutorial').click(function() {
			$(".first").css("display","none");
			$.ajax({
				type:"POST",
				url:"ajax/profile.php",
				data:{action:'profileTutorial'},
				success:function(result){
					$('#start-tutorial-box').hide();
				}
			});
		});
	   $('#imagefile').change(function(e) {
			var img = e.target.files[0];
			
		if(!iEdit.open(img, true, function(res){
			$("#result").attr("src", res);	
			$("#img_hidden").val(res);
				//$("#img_form").submit();
			//console.log(res);	
		})){
			alert("Whoops! That is not an image!");
		}
		});
		
		$('#submitbtn').click(function() {
            $("#viewimage").html('');
            $("#viewimage").html('<img src="images/loading.gif" />');
            $(".uploadform").ajaxForm({
            	url: 'upload.php',
                success:showResponse 
            }).submit();
        });
    });
	function upload_resized()
	{
			$.ajax({
				type:"POST",
				url:"ajax/photo.php",
				data:{action:'upload_resized_photo'},
				success:function(result){
					location.reload();
				}
			});
	}
   $("#img_save").live("click",function(){
	   //alert('Hi');
	   $("#preloader").show();
	   $("#preloader").css('z-index','99999');
	   var img_code = $("#img_hidden").val();
	   $.ajax({
				type:"POST",
				url:"ajax/photo.php",
				data:{action:'upload_first_cropped_photo','image':img_code},
				success:function(result){
					upload_resized();
				}
			});
   });
   
$(document).ready(function () {
	$(".prof_dpdwn").on( "blur", function(){
		$(".prof_drop_dwn").hide();
	});
	}); 
</script>

<?php
// 30 mins in seconds
$inactive = 3600;
if(isset($_SESSION['timeout'])) {
	$session_life = time() - $_SESSION['timeout'];
    //echo $session_life;
	if ($session_life > $inactive) {
		//ini_set('display_errors', 1);
		//echo "<script>alert('hi');</script>";
		//ob_clean();
		//header("Location: logout.php");
		//echo "<script>alert('hi');</script>";
		echo	"<script>
				//	alert('hi');
				$('#error_message_header').html('');
				$('#error_message').html('Your Startrishta session has expired.</br><p>To maintain security, your Startrishta session periodically expires. To reconnect click CONTINUE.</p>');
				$('#alert_button').html('CONTINUE');
				$('#alert_modal').modal('show');
				$('#alert_modal').on('hidden.bs.modal', function () {
				window.location='logout.php';
				});
	//s			return false;
	</script>";
		//die();
		//echo "<script>window.location='logout.php';</script>";
	}
}
$_SESSION['timeout'] = time();
?>
