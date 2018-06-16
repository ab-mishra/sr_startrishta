<?php

include('classes/profile_class.php');
$page = 'user-message';
$userProfileObj = new Profile();

require_once('include/header.php');

# Fetch User Information
$userInfo = $userProfileObj->getUserInfo($user_id);

//echo "<pre>";
//print_r($userInfo);

?>

<!doctype html>
<html>
<head>
	<title>Startrishta | Message</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	
	<style>
		.emojionearea-filters{
			display: block;
			margin-top: 10px;
			cursor: pointer;		}
		.emojionearea-tab .emojibtn
		{
			cursor: pointer;
		}
	</style>
	
	<?php require("include/login-script.php"); ?>
</head>

<body>
	<div class="main-body">
		<!------its sign in and sign up------->
		<?php //include('include/sign-in.php') ;?>
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
					<!-- it's header -->
					<?php require("include/header-inner.php"); ?>
					<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
			
			<div class="container">
				<div class="row">	
				<div class="left-chat-menu col-md-3 col-sm-4">
					<div class="row">
						<div class="user-panel">
							<div class="pull-left user-image"><img src="<?php echo $userProfileObj->getThumbPhotoPath($userInfo['profile_image']);?>" /></div>
							
							<div class="pull-left user-info">
								<p><?php echo ucwords($userInfo['user_name']); ?></p>
								<?php
								if( $userInfo['show_online']==1 )
								{
									?><a href="#"><i class="fa fa-circle text-success"></i>Online</a><?php
								}
								?>
							</div>
							
							<div class="pull-right dropdown profile-menu"><a href="#" id="dLabel" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
								<ul class="dropdown-menu" aria-labelledby="dLabel">
									<li id="message_navigation" title="Inbox" ><a href="javascript:void(0);"><i class="fa fa-inbox"></i>Inbox</a></li>
									<li id="message_navigation" title="Unread" ><a href="javascript:void(0);"><i class="fa fa-envelope"></i>Unread</a></li>
									<li id="message_navigation" title="Conversation" ><a href="javascript:void(0);"><i class="fa fa-comments"></i>Conversation</a></li>
									<li id="message_navigation" title="Online" ><a href="javascript:void(0);"><i class="fa fa-wifi"></i>Online</a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"></div>
						<form class="sidebar-form" autocomplete="off" >
							<div class="input-group">
							  <input type="text" class="form-control" placeholder="Search for..." id="searchOnlineUserList" >
							  <span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
							  </span>
							</div>
						</form>
						
						<?php ###### USER LISTING ###### ?>
						<div style="display:none;" id="message_navigation_title" >Inbox</div>
						<input type="hidden" value="inbox" id="msgType">
						<input type="hidden" value="" id="chatUser_id">
						<ul class="sidebar-menu" id="chatOnlineUserDiv" >
							<?php
							$inboxQuery = mysql_query("SELECT added_uid as inbox_uid 
							FROM sr_inbox_user 
							WHERE user_id='".$user_id."' 
							UNION 
							SELECT DISTINCT sent_by as inbox_uid 
							FROM `sr_user_message` 
							WHERE sent_to='".$user_id."' and is_deletebyto=0") or die(mysql_error());
							
							while( $inboxResult = mysql_fetch_assoc($inboxQuery) )
							{
								$userInfoQuery = mysql_query("SELECT user_id, user_name, is_online, profile_image, created_on 
								FROM sr_users 
								WHERE user_id = '".$inboxResult['inbox_uid']."'");
								$userInfoResult = mysql_fetch_assoc($userInfoQuery);
								
								$unreadMsgQuery = mysql_query("SELECT msg_id 
								FROM sr_user_message 
								WHERE sent_by = '".$inboxResult['inbox_uid']."' AND sent_to = '".$user_id."' AND is_read = 0");
								$unreadMsgCount = mysql_num_rows($unreadMsgQuery);
								
								$isUserLike = $userProfileObj->isUserLike($inboxResult['inbox_uid'] , $user_id);
								$isUserLike1 = $userProfileObj->isUserLike($user_id , $inboxResult['inbox_uid']);
							
								?>
								<li id="onlineUserDiv-<?php echo $userInfoResult['user_id'];?>" >
									<a href="javascript:void(0);" id="chatOnlineUserList-<?php echo $userInfoResult['user_id'];?>">
										<span class="list-img"><img src="<?php echo $userProfileObj->getProfileImage($userInfoResult['profile_image']);?>" /></span>
										<?php
										if( $unreadMsgCount )
										{
											echo "<span class='badge my-msg' id='unread-msg-count-".$userInfoResult['user_id']."'>".$unreadMsgCount."</span>";
										}
										
										if( $userInfoResult['is_online'] == 1 )
										{
											echo '<i class="fa fa-circle text-success"></i>';
										}
										
										if( $isUserLike == 1 && $isUserLike1 == 1 )
										{
											echo '<span class="chat-img"><img src="images/match-icon-small.png"></span>';
										}
										
										$userNameExp = explode(' ',$userInfoResult['user_name']);
										$userNameExpShow = ( strlen($userNameExp[0])<3 )?$userNameExp[0].' '.$userNameExp[1]:$userNameExp[0];
										?>
										
										<strong class="user-name"  ><?php echo $userNameExpShow; ?></strong>
										<?php 
											if( $userInfoResult['is_online'] != 1 || $userInfoResult['show_online'] != 1 || in_array($userInfoResult['user_id'],$userInfoResult))
											{
												//echo '<i class="fa fa-circle text-success"></i>';
										?>
											<div class="pull-right check-box delete_span">
											 <span  id="delete_chat_head-<?php echo $userInfoResult['user_id']; ?>" onclick="return delete_chat_func(<?php echo $userInfoResult['user_id']; ?>);" class="delete_chat_head" >
											  <i class="fa fa-trash text-success"></i></span>
												<!-- <input type="checkbox" id="checkbox<?php //echo $userInfoResult['user_id'];?>" name="chatUserCheckbox" value="<?php //echo $userInfoResult['user_id'];?>" />
												<label for="checkbox<?php //echo $userInfoResult['user_id'];?>"><span class="pull-left"></span></label> -->
											</div>

											<?php } 
											?>
									</a>
								</li>
								<?php
							}
							?>
						</ul>
						<?php ###### USER LISTING END ###### ?>
						
						<?php ###### DELETE CHAT(S) ######### ?>
						<div class="select_all" id="select_all">
							<form>
								<div class="sel-title">Select</div>
								<div class="sel-bo-ch">
									<div class="radio">
										<div class="swith_gq">
											<input type="radio" name="option" data-rel="#general" id="selectAll">
											<label for="selectAll"><span><span></span></span>All</label>
										</div>
										<div class="swith_gq">
											<input type="radio" name="option" data-rel="#general" id="unselectAll">
											<label for="unselectAll"><span><span></span></span>None</label>
										</div>
									</div>
								</div>
								<div class="clearfix"></div>
								<div class="pull-right bot-foot"><a href="javascript:void(0);" id="delete_allconv"><i class="fa fa-trash-o"></i></a></div>
							</form>
						</div>
						<?php ###### DELETE CHAT(S) END ######### ?>
						
						<?php ###### GET ME HERE ######### 
						$getOnlineUserArray = $userProfileObj->getOnlineUser($user_id);
						?>
						
						<div class="online-foot"><?php echo count($getOnlineUserArray);?> online people will see you here</div>
						<div class="select_all reel">
							<div class="photo_reel thum clearfix">
								<div class="get_me_here_slide thum">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="photo-reel-thum custom_slide thum">
											<?php
											foreach($photoReelArray as $photoReel)
											{
												?>
												<div class="slide slider_onclick" id="slider_onclick-<?php echo $photoReel['user_id'];?>">
												<?php 
												$userImage = $userProfileObj->getProfileImage($photoReel['profile_image']);
												if(file_exists($userImage))
												{ 
												?>
													<img src="<?php echo $userImage;?>" data='1'/>
												<?php 
												} else { ?>
													<img src="upload/photo/<?php echo $photoReel['profile_image'];?>" data='2'/>
												<?php 
												}
												?>
												</div><?php 
											} 
											?>
										</div>
									</div>
								</div>
								<div class="get_me_here thum">
									<i class="fa fa-stop"></i><i class="rotate fa fa-stop"></i>
									<div class="gmh_pic go-credit-get-me-here" style="cursor:pointer;">
										<img src="<?php echo $userProfileImage;?>">
										<div class="caption">GET<br /> ME<br /> HERE</div>
									</div>
								</div>
							</div>
						</div>
						<?php ###### GET ME HERE END ######### ?>
					
					</div>
				</div>
				
				<?php ###### CHAT WINDOW - User Chat ###### ?>
				<div class="col-md-9 col-sm-8" style="border-right:1px solid #ccc;">
					<div class="row chat-right-panel" id="userChat_window">
						<div class="chat-sec-panel-2">
							<div class="msg_cont_sec align-c">
								<h3>Start talking with new people close by!</h3>
								<?php
								$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery."  AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6");
								if( mysql_num_rows($chatUserQuery) == 0 )
								{
									?>
									<div class="start_talking margin-t60">
										<p>Looks like there is no one close by right now.
										You can always <a class="green" href="javascript:void(0);" id="resetSearchFromMsg">reset</a> your search filters and check out other fun new people on Startrishta or continue with any current </p>
									</div>
									<?php 
								} 
								else 
								{
									?>
									<div class="start_talking my_msg" id="search_more_people_div">
										<div class="clearfix">
											<ul>
											<?php
											while( $chatUserResult = mysql_fetch_assoc($chatUserQuery) )
											{
												?>
												<li>
													<a href="javascript:void(0);" class="chatUserPic"  id="chatUserPic-<?php echo $chatUserResult['user_id'];?>">
													 <img src="<?php echo $userProfileObj->getCropProfileImage($chatUserResult['profile_image']);?>" title="<?php echo $chatUserResult['user_name'];?>"/>
													</a>
													<?php
													if( $chatUserResult['is_online'] )
													{
														?><span class="active_icon"><img src="images/online.png"></span><?php 
													} 
													?>
													<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $userProfileObj->getPublicPhotoCount($chatUserResult['user_id']);?></span> </span>
												</li>
												<?php 
											} 
											?>
											</ul>
										</div>
									</div>
									<div class="align-c full pull-left margin-t30 margin-l10">
										<a href="javascript:void(0);" id="search_more_people" class="btn btn-default custom slat-blue">Search for more people </a>
									</div>
									<?php 
								} 
								?>
								<div class="chat_ready clearfix margin-t70">
									<div class="left m_icon"><img src="images/speaker.png"></div>
									<div class="left info">
										<aside class="align-l margin-l15 padding-t10">Get seen by new people right here when they open their Startrishta messages!</aside>
									</div>
									<div class="align-c margin-r60 margin-t15 margin-l10" style="display:inline-block;">
										<a href="javascript:void(0);" class="btn btn-default custom sky-blue go-credit-ready-to-chat">I'm ready to chat </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php ###### CHAT WINDOW END ###### ?>
				
				</div>
			</div>
			
		
		<?php #POPUP(s)  ?>
		<!-- NOT INTERESTED -->
		<div class="modal fade" id="show-interested" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  <div class="modal-dialog-1" role="document">
			<div class="modal-content">
				<div class="modal-header" style="border-botton:0 !important;">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
				<span class="v-middle report">
					<p class="align-c h5 report_btn">
						<b>You clicked 'Not interested' last time, what do <br />you want to do with this user? </b>
					</p>
					<p class="align-c h6">Please choose an option below, you can always change <br /> your preferences in Settings at any time:</p>
					<form class="report_caps msg clearfix login-form">
						<div class="swith_gq report">
							<input type="radio" name="notInterestedAction" id="notInterestedAction1" value="blockuser" checked />
							<label for="notInterestedAction1"><span class="left"><span></span></span>Block user</label>
						</div>
						<div class="swith_gq report">
							<input type="radio" name="notInterestedAction" id="notInterestedAction2" value="blocklike" />
							<label for="notInterestedAction2"><span class="left"><span></span></span>Block every user like this</label>
						</div>
						<div class="swith_gq report">
							<input type="radio" name="notInterestedAction" id="notInterestedAction3" value="dltmsg" />
							<label for="notInterestedAction3"><span class="left"><span></span></span>Delete messages only</label>
						</div>
						<div class="swith_gq report">
							<input type="radio" name="notInterestedAction" id="notInterestedAction4" value="dltlike" />
							<label for="notInterestedAction4"><span class="left"><span></span></span>Delete every message like this</label>
						</div>					
						<div class="popup_add_photo margin-t20">
							<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2 custom red">
								<a href="javascript:void(0);" class="color-white" id="notInterestedContinue" >Continue</a>
							</span>
							<span class="clearfix color-white">or <a href="javascript:void(0);" class="txt_green cancel_photo_report msg_cancel">Cancel</a></span>
						</div>
						
					</form>
				</span>
				</div>
				
			</div>
		  </div>
		</div>
		<div class="slider-container-fadebox-1 message_report" id="message_report" >
			<span class="v-middle report">
				<p class="align-c color-white h3 report_btn">
					<b>You clicked 'Not interested' last time, what do <br />you want to do with this user? </b>
				</p>
				<p class="align-c color-white">Please choose an option below, you can always change <br /> your preferences in Settings at any time:</p>
				<form class="report_caps msg clearfix login-form">
					<div class="swith_gq report">
						<input type="radio" name="notInterestedAction" id="notInterestedAction1" value="blockuser" checked />
						<label for="notInterestedAction1"><span class="left"><span></span></span><b>Block user</b></label>
					</div>
					<div class="swith_gq report">
						<input type="radio" name="notInterestedAction" id="notInterestedAction2" value="blocklike" />
						<label for="notInterestedAction2"><span class="left"><span></span></span><b>Block every user like this</b></label>
					</div>
					<div class="swith_gq report">
						<input type="radio" name="notInterestedAction" id="notInterestedAction3" value="dltmsg" />
						<label for="notInterestedAction3"><span class="left"><span></span></span><b>Delete messages only</b></label>
					</div>
					<div class="swith_gq report">
						<input type="radio" name="notInterestedAction" id="notInterestedAction4" value="dltlike" />
						<label for="notInterestedAction4"><span class="left"><span></span></span><b>Delete every message like this</b></label>
					</div>					
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<a href="javascript:void(0);" class="color-white " id="notInterestedContinue" >Continue</a>
						</span>
						<span class="clearfix color-white">or <a href="javascript:void(0);" class="txt_green cancel_photo_report msg_cancel">Cancel</a></span>
					</div>
				</form>
			</span>
		</div>	
		<!-- DELETE ONE CONVERSATION -->
		<div id="delete_oneconv_div" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Delete</h4>
						</div>
						<div class="modal-body">
							<form class="login-form">
								<div><h5 class="align-c lh-20"><b>Are you sure you want to permanently delete these conversation?</b></h5></div>
								<div class="popup_add_photo margin-t20">
									<span class="padding-l25 padding-r25 ok-2">
										<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="oneconv_delete">Delete</a>
									</span>
									
						<span class="clearfix color-white margin-b15">or <a href="javascript:void(0);" class="txt_green" id="oneconv_cancel">Cancel</a></span>
						<span class="clearfix color-white"><input type="checkbox"> <a href="javascript:void(0);" class="">Dont show this again</a></span>
									<?php /* <span>&nbsp;or&nbsp;<a href="javascript:void(0);" class="txt_green" id="allconv_delete">Cancel</a></span> 
									<span class="clearfix color-white"><input type="checkbox"> <a href="javascript:void(0);" class="">Dont show this again</a></span> */ ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	<!--	<div class="slider-container-fadebox-1 message_report" id="delete_oneconv_div">
			<span class="v-middle report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class="align-c color-white">Are you sure you want to<br />  permanently delete this <br /> conversation?</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue margin-b20 padding-l25 padding-r25 ok-2">
							<a href="javascript:void(0);" class="color-white" id="oneconv_delete">Delete</a>
						</span>
						<span class="clearfix color-white margin-b15">or <a href="javascript:void(0);" class="txt_green" id="oneconv_cancel">Cancel</a></span>
						<span class="clearfix color-white"><input type="checkbox"> <a href="javascript:void(0);" class="">Dont show this again</a></span>
					</div>
				</form>
			</span>
		</div> -->	
		<!--DELETE ALL CONVERSATION -->
		<div id="delete_allconv_div" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>
						<div class="modal-body">
							<form class="login-form">
								<div><h5 class="align-c lh-20"><b>Are you sure you want to permanently delete these conversation?</b></h5></div>
								<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
										<a href="javascript:void(0);" class="color-white" id="allconv_delete">Delete</a>
									</span>
									<?php /* <span>&nbsp;or&nbsp;<a href="javascript:void(0);" class="txt_green" id="allconv_delete">Cancel</a></span> 
									<span class="clearfix color-white"><input type="checkbox"> <a href="javascript:void(0);" class="">Dont show this again</a></span> */ ?>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Block Member-->
			<div id="block_member_div" class="modal fade login_pop" role="dialog" >
				<div class="modal-dialog-1">
					<div class="modal-content">
						<div>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Block</h4>
							</div>
							<div class="modal-body">
								<span class="v-middle block-popup report">
									<p class="align-c color-white h3 report_btn">
										<b></b>
									</p>
									<p class="align-c"><span id="user-block-msg1"></span> is now in your blocked list.</p>
									<form class="report_caps msg clearfix login-form">
										<div class="popup_add_photo margin-t20">
											<span class="padding-l25 padding-r25 ok-2">
												<!--<a href="#" class="color-white" onclick="$('#block_member_div').hide();">OK</a>-->
												<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="block-done">OK</a>
											</span>
										</div>
									</form>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!--<div class="slider-container-fadebox-1 message_report" id="block_member_div">
			<span class="v-middle block-popup report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class="align-c color-white"><span id="user-block-msg1"></span> is now in your blocked list.</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<a href="#" class="color-white" onclick="$('#block_member_div').hide();">OK</a>
							<a href="javascript:void(0);" class="color-white" id="block-done">OK</a>
						</span>
					</div>
				</form>
			</span>
		</div> -->
		<!--UNBlock Member-->

			<div id="unblock_member_div" class="modal fade login_pop" role="dialog" >
				<div class="modal-dialog-1">
					<div class="modal-content">
						<div>
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Unblock</h4>
							</div>
							<div class="modal-body">
								<span class="v-middle block-popup report">
									<p class="align-c color-white h3 report_btn">
										<b></b>
									</p>
									<p class="align-c"><span id="user-unblock-msg1"></span> has been removed from your blocked list.</p>
									<form class="report_caps msg clearfix login-form">
										<div class="popup_add_photo margin-t20">
											<span class="padding-l25 padding-r25 ok-2">
												<!--<a href="#" class="color-white" onclick="$('#block_member_div').hide();">OK</a>-->
												<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="unblock-done">OK</a>
											</span>
										</div>
									</form>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!--<div class="slider-container-fadebox-1 message_report" id="unblock_member_div">
			<span class="v-middle block-popup report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class	="align-c color-white"><span id="user-unblock-msg1"></span> has been removed from your blocked list.</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<a href="#" class="color-white" onclick="$('#block_member_div').hide();">OK</a>
							<a href="javascript:void(0);" class="color-white" id="unblock-done">OK</a>
						</span>
					</div>
				</form>
			</span>
		</div>
		-->
		<?php /* <div class="slider-container-fadebox-1 message_report" id="">
			<span class="v-middle block-popup report">
				<p class="align-c color-white h3 report_btn"><b></b></p>
				<p class="align-c color-white"><span id=""></span> has been removed from your blocked list.</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<!--<a href="" class="color-white" onclick="$('#unblock_member_div').hide();">OK</a>-->
							<a href="javascript:void(0);" id="unblock-done" class="color-white">OK</a>
						</span>
					</div>
				</form>
			</span>
		</div> */ ?>

	</div>
	<!--Main Container end here-->
	<?php 
	//--Footer start here-->
	require("include/footer.php"); 
	require("include/foot.php");
	?>
</div>
	
	<script src="js/message.js" ></script>
	<?php
	if(isset($_GET['chat_id']))
	{
		?>
		<script>
			$(document).ready(function () {
			showChatHistory(<?php echo $_GET['chat_id'] ?>);
			});
			
		</script>
		<?php
	}
	?>
	<script>
		$(document).ready(function(){
			$("#icon-add").click(function(){
				$("#icons-added").toggle();
			});
			$(document).ready(function () {
				var objDiv = $('#scroll-bot');
				if (objDiv.length > 0){
					objDiv[0].scrollTop = objDiv[0].scrollHeight;
				}
			});
			
			
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
			
		});
	</script>
</body>
</html>