<?php
if(!empty($_SESSION['user_id'])){
	require("include/my-message.php");
	$unreadMsgCount = $userProfileObj->getUnreadMsgCount($user_id);
?>
<header class="clearfix">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="left logo"><a href="index.php"><img src="images/logo-color.png"/></a></div>
	</div>
	<?php
		$isVipMember = $userProfileObj->isVipMember($userResult['user_id']);
		$userProfileImage=$userProfileObj->getProfileImage($userResult['profile_image']);
	?>
	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
		<div class="right right-panel">
			<div>
				<?php if($isVipMember){ ?>
				<div class="left vip_icon red" data-toggle="tooltip" data-placement="bottom" title="You are a VIP Member"> 
					<a href="vip.php"></a> 
				</div>
			<?php }else { ?>
				<div class="left vip_icon" data-toggle="tooltip" data-placement="bottom" title="Become a VIP Member"> 
					<a href="vip.php"></a> 
				</div>
			<?php } ?>
				<div class="currency" data-toggle="tooltip" data-placement="bottom" title="Add Startrishta Credits to meet new people">
					<span class="pull-left"><img src="images/coins.png" /></span>
					<a href="credit.php" id="credit-header"><strong>
						<?php echo $userProfileObj->getUserCredit($user_id);?> credits</strong></a>
				</div>
				<div class="profile">
					<ul>
						<li> 
							<a class="prof_dpdwn">
								<?php if($userResult['hide_presence']==1) {?>
									<img src="images/headerProfileStealthPhoto.png" style="width:26px;height:26px;">
								<?php }else{ ?>
								<?php //print_r($userProfileImg);//die;
								if($userProfileImg){
									
								if($userProfileImg['status'] != 2){
									
									if(file_exists("upload/photo/200X200/".$userProfileImg['photo'])){
										$img = "upload/photo/200X200/".$userProfileImg['photo'];
									}
									else{
										$img = "upload/photo/".$userProfileImg['photo'];
									}
								?>
									<img src="<?php echo $img;?>" data="2" 
									style="width:26px;height:26px;">
								<?php } 
								else { ?>
									<img src="<?php echo "upload/profile_images/dummy-profile.png";?>" 
									class='pic' data = "1" style="width:26px;height:26px;">
									<?php }
								}
								else { ?>
									<img src="<?php echo "upload/profile_images/dummy-profile.png";?>" 
								class='pic' data = "1" style="width:26px;height:26px;">
								<?php } ?>
								<?php } ?>
								<i class="fa fa-sort-desc"></i>  </a>
							<ul class="prof_drop_dwn">
								<li><a href="home.php">My Profile</a></li>
								<li><a href="profile-setting.php">Settings</a></li>
								<li><a  href="logout.php">Log Out</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col_sm_800">
		<div class="nv_mid_links">
			<ul class="clearfix">
				<?php
				/* li id id="my-message-box" */
				?>
				<li>
					<a class="msg_icon" href="user-message.php"><p>My</p><p>Messages</p></a>
					<?php 
						if($unreadMsgCount){
							echo '<span class="notify_nub" id="notify_msg">'.$unreadMsgCount.'</span>';
						}else{
							echo '<span class="notify_nub" id="notify_msg" style="display: none;"></span>';
						}
					?>
				</li>
				<li><a class="connect" href="kismat-connection.php"><p>Kismat</p><p>Connection</p></a></li>
				<li><a class="p_srch" href="search.php"><p>People</p><p> Search</p></a></li>
			</ul>
		</div>
	</div>	
</header>
<?php }else{ ?>
<header class="clearfix">
	<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
		<div class="left logo"><a href="index.php"><img src="images/logo-color.png"/></a></div>
	</div>
	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 pull-right">
		<div class="right right-panel">
			<div>
				<a href="javascript:void(0);" class="signup slide-left-signup1 act" data-toggle="modal" data-target="#sign-up_popup">Sign Up for free</a>
				<a href="javascript:void(0);" class="act" data-toggle="modal" data-target="#myModal" ><span><i class="fa fa-lock"></i></span> Login</a>
			</div>
		</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col_sm_800">
		<div class="nv_mid_links">
			<ul class="clearfix">
				<li id="my-message-box">
					<a class="msg_icon" href="javascript:void(0);"><p>My</p><p>Messages</p></a>
				</li>
				<li><a class="connect" href="javascript:void(0);"><p>Kismat</p><p>Connection</p></a></li>
				<li><a class="p_srch" href="javascript:void(0);"><p>People</p><p> Search</p></a></li>
			</ul>
		</div>
	</div>	
</header>
<?php }?>

