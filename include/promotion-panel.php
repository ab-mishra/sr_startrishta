<?php //echo $user_id;	$verifyEmailQuery=mysql_query("SELECT * FROM sr_user_login where user_id='".$user_id."'");	$verifyEmailResult=mysql_fetch_assoc($verifyEmailQuery);	$login_status=$verifyEmailResult['status'];	//echo $userResult['profile_image'];	if($login_status == 0){ ?>		<!--sent email-->		<div class="email-sent-1 promotion_plcing" id="email-change" style="display:block;">			<div class="email-sent-header">				<img src="images/sent-email.png" class="pad-tb30"/>			</div>			<div class="email-sent-container">				<h5 class="align-c"><b>Confirm your email </b></h5>				<p class="align-c  margin-b10">Please remember to check you email and verify your account</p>				<p class="align-c custom2 gray-btn1"><i class="fa fa-check" aria-hidden="true"></i>&nbsp; Email Sent</p>				<p class="align-c sent">or <a href="javascript:void(0);" id="change-email" data-toggle="modal" data-target="#changeEmailAddress">Change address</a></p>			</div>		</div>		<!--end of sent email-->		<!--resent email-->		<div class="email-sent promotion_plcing" id="email-sent" style="display:none;">			<div class="email-sent-header">				<img src="images/sent-email.png" class="pad-tb30"/>			</div>			<div class="email-sent-container">				<h5 class="align-c"><b>Confirm your email </b></h5>				<p class="align-c">Please remember to check you email and verify your account</p>				<div class="align-c"><a href="javascript:void(0);" id="resend_email" class="btn btn-default custom1 voilet-btn">Resend Email </a></div>				<p class="align-c custom3"> <span>&radic;</span>&nbsp; Address Changed</p>				<!--<span class="btn-close-x btn btn-xs btn-default"><i class="fa fa-times"></i></span>-->			</div>		</div>		<!--end of resent email-->	<?php }	else if($userResult['profile_image'] == '') { ?>		<!--profile picture-->		<div class="profile-picture promotion_plcing" style="display:block;">			<div class="profile-picture-header">				<img src="images/icon-p-p.png" class="pad-tb-lr"/>			</div>			<div class="profile-picture-container">				<h5 class="align-c"><b>You don't have a profile picture</b></h5>				<p class="align-c">Add a photo to start <span class="color-green"><a href="<?php echo SITEURL.'user-message.php' ?>">messaging</a></span> other people!</p>				<div class="align-c"><a href="javascript:void(0);" data-backdrop="static" data-toggle="modal" data-target="#myModal2" class="btn btn-default custom-01 yellow-btn">Add Photo </a></div>				<!--<span class="btn-close-x-01 btn btn-xs btn-default"><i class="fa fa-times"></i></span>-->			</div>		</div>		<!--end of profile picture-->	<?php } else {		$profileVisitorArray = $userProfileObj->gettodayProfileVisitor($user_id);		//var_dump($profileVisitorArray);		$profileVisitorCount=count($profileVisitorArray);		?>		<!--Rise up in Search -->		<div class="rise-up right_popup promotion_plcing">			<div class="rise-up-header">				<img src="images/icon-005.png" class="pad-tb-lr2"/>			</div>			<div class="profile-picture-container">				<h5 class="align-c"><b>Rise up in Search </b></h5>				<p class="align-c">Get to the top of the search results and be found by more people! Currently you are in place 15,135 with  <span class="color-green"><a href="profile-visitor.php"><?php echo $profileVisitorCount; ?> visitors </a></span> today.</p>				<div class="align-c"><a href="javascript:void(0);" class="btn btn-default custom-04 blue-light-btn go-credit-raising-profile">Rise Up </a></div>			</div>		</div>		<!--end of Rise up in Search -->			<!--Go vip-->		<?php if(!$isVipMember){?>		<div class="go-vip right_popup promotion_plcing">			<div class="profile-picture-header">				<img src="images/icon-004.png" class="pad-tb-lr"/>			</div>			<div class="profile-picture-container">				<h5 class="align-c"><b>Boost your message to the top of the inbox!</b></h5>				<p class="align-c">Become a VIP member and get your messages read first!</p>				<div class="align-c"><a href="javascript:void(0);" class="btn btn-default custom-01 yellow-btn go-vip-boost-message" >Go VIP </a></div>				<!--<span class="btn-close-x-03 btn btn-xs btn-default"><i class="fa fa-times"></i></span>-->			</div>        </div>		<?php } ?>		<!--Kismat Connection-->		<div class="extra-display right_popup promotion_plcing">			<div class="extra-display-header">				<img src="images/icon-p-1.png" class="pad-tb-lr"/>			</div>			<div class="extra-display-container">				<h5 class="align-c"><b>Appear more often in Kismat Connection</b></h5>				<p class="align-c">Get shown more times in Kismat Connection. You have <b>300</b> priority displays left, enjoy the attention!</p>				<div class="align-c"><a href="javascript:void(0);" class="btn btn-default custom-03 red-brown-btn go-credit-appear-kc">Add 100 Extra <br>Displays</a></div>				<!--<p class="align-c custom3"> <span>&radic;</span>&nbsp; address Changed</p>-->				<!--<span class="btn-close-x-02 btn btn-xs btn-default"><i class="fa fa-times"></i></span>-->			</div>		</div>		<!--Kismat Connection-->	<?php } ?>