<!--MAIN DIV--><?php /* ?>
<?php  
$addChatQuery='';
if($userResult['here_to'] !=''){
	$addChatQuery .= " AND here_to='".$userResult['here_to']."'";
}if($userResult['here_with_guy'] == 1 && $userResult['here_with_girl'] == 1){
	$addChatQuery .= " AND (gender=1 OR gender=2)";
}else if($userResult['here_with_guy'] == 1){
	$addChatQuery .= " AND gender=1";
}else if($userResult['here_with_girl'] == 1){
	$addChatQuery .= " AND gender=2";
}
if($userResult['here_age_min'] != 0  && $userResult['here_age_max'] != 0){
	$addChatQuery .= " AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$userResult['here_age_min']." AND ".$userResult['here_age_max']."";
}

$getRandomUserQuery=mysql_query("SELECT * FROM sr_inbox_user WHERE user_id='".$user_id."'");
if(mysql_num_rows($getRandomUserQuery)){
	$getRandomUserResult=mysql_fetch_assoc($getRandomUserQuery);
	$added_on=$getRandomUserResult['added_on'];
	$diff48 = abs(strtotime($added_on) - strtotime(DATE_TIME));
	$hours=$diff48/(60*60);
	if($hours >= 1 && $hours % 48 == 0){
		$randomUserQuery = mysql_query("SELECT user_id FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') AND user_id NOT IN(select sent_by FROM sr_user_message WHERE sent_to='".$user_id."') order By rand() limit 0,1 ");
		if(mysql_num_rows($randomUserQuery)){
			$randomUserResult=mysql_fetch_assoc($randomUserQuery);
			mysql_query("UPDATE sr_inbox_user SET added_uid = '".$randomUserResult['user_id']."' , added_on='".DATE_TIME."' WHERE user_id='".$user_id."'");
		}
	}
}else{
	$randomUserQuery = mysql_query("SELECT user_id FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') AND user_id NOT IN(select sent_by FROM sr_user_message WHERE sent_to='".$user_id."') order By rand() limit 0,1 ");
	if(mysql_num_rows($randomUserQuery)){
		$randomUserResult=mysql_fetch_assoc($randomUserQuery);
		mysql_query("INSERT INTO sr_inbox_user SET added_uid = '".$randomUserResult['user_id']."' , added_on='".DATE_TIME."', user_id='".$user_id."'");
	}
}
?>

<div class="message_div d_none" id="message_div2">
	<div class="msg_sec">
		<div class="msg_head clearfix">
		<input type="hidden" value="inbox" id="msgType">
		<input type="hidden" value="" id="chatUser_id">
			<ul>
				<li><a href="javascript:void(0);" class="message_navigation active" id="inbox"><i class="fa fa-inbox"></i> Inbox</a></li>
				<li><a href="javascript:void(0);" class="message_navigation" id="unread"><i class="fa fa-envelope"></i> Unread</a></li>
				<li><a href="javascript:void(0);" class="message_navigation" id="conversation"><i class="fa fa-comments"></i> Conversation</a></li>
				<li><a href="javascript:void(0);" class="message_navigation" id="online"><i class="fa fa-wifi"></i> Online</a></li>
			</ul>
			<div class="pull-right close">
				<ul>
					<li>
						<a href="javascript:void(0);" id="msg_volume">
							<i class="fa fa-volume-up"></i>
						</a>
					</li>
					<li><a href="javascript:void(0);" class="close_div" id="close_msg_div"><i class="fa fa-times"></i></a></li>
				</ul>
			</div>
		</div>
		<!-- <div class="row">-->
		<div class="">
			<!-- START LEFT SIDE -->
			<div class="col-md-4 col-sm-4">
				<div class="row">
					<div class="msg_left_sec">
						<div class="input-group search">
							<input type="text" class="form-control" placeholder="Search for..." id="searchOnlineUserList">
							<span class="input-group-btn">
								<button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
							</span>
						</div>
						<div class="list-group people_online margin-b20" id="chatOnlineUserDiv" style="overflow-y:scroll;">
						
						<?php 
						//$inboxQuery=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image,created_on FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id");
						$inboxQuery=mysql_query("SELECT added_uid as inbox_uid FROM sr_inbox_user WHERE user_id='".$user_id."' UNION SELECT DISTINCT sent_by as inbox_uid FROM `sr_user_message` WHERE sent_to='".$user_id."'");
						while($inboxResult = mysql_fetch_assoc($inboxQuery)){
							$userInfoQuery=mysql_query("SELECT user_id,user_name,is_online,profile_image,created_on FROM sr_users WHERE user_id='".$inboxResult['inbox_uid']."'");
							$userInfoResult=mysql_fetch_assoc($userInfoQuery);
							$unreadMsgQuery=mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_by='".$inboxResult['inbox_uid']."' AND sent_to ='".$user_id."' AND is_read=0");
							$unreadMsgCount=mysql_num_rows($unreadMsgQuery);
							$isUserLike = $userProfileObj->isUserLike($inboxResult['inbox_uid'] , $user_id);
							$isUserLike1 = $userProfileObj->isUserLike($user_id , $inboxResult['inbox_uid']);
						 ?>
						<div class="list-group-item login-form left onlineUserDiv" id="onlineUserDiv-<?php echo $userInfoResult['user_id'];?>">
							<div class="pic">
								<a href="javascript:void(0);">
									<img src="<?php echo $userProfileObj->getProfileImage($userInfoResult['profile_image']);?>">
								</a>
								<?php if($isUserLike==1 && $isUserLike1 == 1){
									echo '<span><img src="images/match-icon-small.png"></span>';
								}?>
								<!-- <div class="heart-icon">
									<i class="fa fa-heart"></i>
								</div> -->
							</div>
							<div class="name chatOnlineUserList" id="chatOnlineUserList-<?php echo $userInfoResult['user_id'];?>">
								<a href="javascript:void(0);">
									<?php 
									if($userInfoResult['is_online'] == 1){
										echo '<span><img src="images/online.png"></span>';
									}
									$userNameExp = explode(' ',$userInfoResult['user_name']);
									echo ( strlen($userNameExp[0])<3 )?$userNameExp[0].' '.$userNameExp[1]:$userNameExp[0];
									?>
								</a>
								<?php if($unreadMsgCount){
									echo "<span class='badge my-msg' id='unread-msg-count-".$userInfoResult['user_id']."'>".$unreadMsgCount."</span>";
									}
								?>
							</div>
							<div class="check_box msg_pro_chk">
								<div class="pull-left">
									<input id="checkbox-<?php echo $userInfoResult['user_id'];?>" type="checkbox" name="chatUserCheckbox" class="chatUserCheckbox" value="<?php echo $userInfoResult['user_id'];?>"/>
									<label for="checkbox-<?php echo $userInfoResult['user_id'];?>"><span class="pull-left"></span></label>
								</div>
							</div>
						</div>
					<?php }?>
						</div>
					<?php if(mysql_num_rows($inboxQuery)){?>
						<div class="select_all" id="select_all">
							<form>
								<div>Select</div>
								<div>
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
								<div class="pull-right"><a href="javascript:void(0);" id="delete_allconv"><i class="fa fa-trash-o"></i></a></div>
							</form>
						</div>
					<?php } 
					$getOnlineUserArray=$userProfileObj->getOnlineUser($user_id);
					?>
						<div class="select_all reel">
							<div><?php echo count($getOnlineUserArray);?> online guys and girls will see you here</div>
								<div class="photo_reel thum clearfix">
								<div class="get_me_here_slide thum">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="photo-reel-thum custom_slide thum">
										<?php
										foreach($photoReelArray as $photoReel){
										?>
											<div class="slide slider_onclick" id="slider_onclick-<?php echo $photoReel['user_id'];?>">
												<img src="<?php echo $userProfileObj->getProfileImage($photoReel['profile_image']);?>">
											</div>
										<?php } ?>
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
					</div>
				</div>
			</div>
			<!-- START RIGHT SIDE-->
		
			<div class="col-md-8 col-sm-8">
				<!-- 
				****NEW DESIGN ***************
				<ul class="message-chat">
						<li class="right-comment">
							<h5>
								<span class="name">Shilpi</span>
								<span class="time">1 Jul 2016 04:21 PM</span>
								<span class="pull-right check-read"><i class="fa fa-check" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></span>
							</h5>
							<p>hello Abhay... how re you?</p>
						</li>
						<li class="left-comment">
							<h5>
								<span class="name">Abhay</span>
								<span class="time">1 Jul 2016 04:22 PM</span>
								<span class="pull-right check-read"><i class="fa fa-check" aria-hidden="true"></i><i class="fa fa-check" aria-hidden="true"></i></span>
							</h5>
							<p>hello shilpi... </p>
						</li>
					</ul>-->
				<div class="userChat_window" id="userChat_window" style="position: relative;height: 762px;">
					<div class="row">
						<div class="msg_cont_sec align-c">
							<h3 class="margin-t80 margin-b30">Start talking with new people close by!</h3>
							
							<?php 		
							$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery."  AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6 ");
							//serachimg on basis of city and country.
							//$chatUserQuery=mysql_query("SELECT * from sr_users WHERE user_id!='".$user_id."' AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."')order By RAND() limit 0,6");
							if(mysql_num_rows($chatUserQuery) == 0){
							?>
							 IF NO USER FOUND
							<div class="start_talking margin-t60">
								<p>Looks like there is no one close by right now.
								You can always <a class="green" href="javascript:void(0);" id="resetSearchFromMsg">reset</a> your search filters and check out other fun new people on Startrishta or continue with any current </p>
							</div>
							<?php } else {?>
							<div class="start_talking my_msg" id="search_more_people_div">
								<div class="clearfix">
									<ul>
									<?php
										while($chatUserResult=mysql_fetch_assoc($chatUserQuery)){?>
										<li>
											<a href="javascript:void(0);" class="chatUserPic"  id="chatUserPic-<?php echo $chatUserResult['user_id'];?>">
											 <img src="<?php echo $userProfileObj->getProfileImage($chatUserResult['profile_image']);?>" title="<?php echo $chatUserResult['user_name'];?>"/>
											</a>
											<?php if($chatUserResult['is_online']){?>
												<span class="active_icon"><img src="images/online.png"></span>
											<?php } ?>
											<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $userProfileObj->getPublicPhotoCount($chatUserResult['user_id']);?></span> </span>
										</li>
									<?php } ?>
									</ul>
								</div>
							</div>
							<div class="align-c full pull-left margin-t30 margin-l10">
								<a href="javascript:void(0);" id="search_more_people" class="btn btn-default custom slat-blue">Search for more people </a>
							</div>
						<?php } ?>
							<div class="chat_ready clearfix margin-t70">
								<div class="left m_icon"><img src="images/speaker.png"></div>
								<div class="left info">
									<aside class="align-l margin-l15 padding-t10">Get seen by new people right here when they open their Startrishta messages!</aside>
								</div>
								<div class="align-c pull-right margin-r5 margin-t5 margin-l10">
									<a href="javascript:void(0);" class="btn btn-default custom sky-blue go-credit-ready-to-chat">I'm ready to chat </a>
								</div>
							</div>
						</div>
					</div>
				</div>		
			</div>		
		</div>
		<!-- NOT INTERESTED -->
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
		<div class="slider-container-fadebox-1 message_report" id="delete_oneconv_div">
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
		</div>	
		<!--DELETE ALL CONVERSATION -->
		<div class="slider-container-fadebox-1 message_report" id="delete_allconv_div">
			<span class="v-middle report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class="align-c color-white">Are you sure you want to<br />  permanently delete these <br /> conversation?</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<a href="javascript:void(0);" class="color-white" id="allconv_delete">Delete</a>
						</span>
						<span class="clearfix color-white">or <a href="javascript:void(0);" class="txt_green" id="allconv_delete">Cancel</a></span>
						<span class="clearfix color-white"><input type="checkbox"> <a href="javascript:void(0);" class="">Dont show this again</a></span>
					</div>
				</form>
			</span>
		</div>
		<!--Block Member-->
		<div class="slider-container-fadebox-1 message_report" id="block_member_div">
			<span class="v-middle block-popup report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class="align-c color-white"><span id="user-block-msg1"></span> is now in your blocked list.</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<!--<a href="#" class="color-white" onclick="$('#block_member_div').hide();">OK</a>-->
							<a href="javascript:void(0);" class="color-white" id="block-done">OK</a>
						</span>
					</div>
				</form>
			</span>
		</div>
		<!--UNBlock Member-->
		<div class="slider-container-fadebox-1 message_report" id="unblock_member_div">
			<span class="v-middle block-popup report">
				<p class="align-c color-white h3 report_btn">
					<b></b>
				</p>
				<p class="align-c color-white"><span id="user-unblock-msg1"></span> has been removed from your blocked list.</p>
				<form class="report_caps msg clearfix login-form">			
					<div class="popup_add_photo margin-t20">
						<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2">
							<!--<a href="" class="color-white" onclick="$('#unblock_member_div').hide();">OK</a>-->
							<a href="javascript:void(0);" id="unblock-done" class="color-white">OK</a>
						</span>
					</div>
				</form>
			</span>
		</div>	
		
	</div>
</div><?php */ ?>