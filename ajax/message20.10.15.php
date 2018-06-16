<?php
require('../classes/user_class.php');
$userProfileObj=new User();
$user_id=$_SESSION['user_id'];

function time2str($ts)
{
    if(!ctype_digit($ts))
        $ts = strtotime($ts);

    $diff = time() - $ts;
    if($diff == 0)
        return 'just now';
    elseif($diff > 0)
    {
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 60) return 'just now';
            if($diff < 120) return '1 minute ago';
            if($diff < 3600) return floor($diff / 60) . ' minutes ago';
            if($diff < 7200) return '1 hour ago';
            if($diff < 86400) return floor($diff / 3600) . ' hours ago';
        }
        if($day_diff == 1) return 'Yesterday';
        if($day_diff < 7) return $day_diff . ' days ago';
        if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
        if($day_diff < 60) return 'last month';
        return date('F Y', $ts);
    }
    else
    {
        $diff = abs($diff);
        $day_diff = floor($diff / 86400);
        if($day_diff == 0)
        {
            if($diff < 120) return 'in a minute';
            if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
            if($diff < 7200) return 'in an hour';
            if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
        }
        if($day_diff == 1) return 'Tomorrow';
        if($day_diff < 4) return date('l', $ts);
        if($day_diff < 7 + (7 - date('w'))) return 'next week';
        if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
        if(date('n', $ts) == date('n') + 1) return 'next month';
        return date('F Y', $ts);
    }
}



function getProfileImage($profile_image){
		if($profile_image == ''){
			return "profile_images/dummy-profile.png";
		}/*else if(file_exists("profile_images/".$profile_image)){
			return "profile_images/$profile_image";
		}*/else {
			//return "profile_images/dummy-profile.png";
			return "profile_images/$profile_image";
		}
	}
	
	
if(isset($_POST['action']) && $_POST['action']=='setMessageClicked'){
	
	if(empty($_SESSION['msg_visit'])){
		$_SESSION['msg_visit'] =1;
	}else{
		$msg_visit=$_SESSION['msg_visit'];
		$msg_visit++;
		$_SESSION['msg_visit']=$msg_visit;
	}
	$_SESSION['msg_click'] = DATE_TIME;
	$_SESSION['msg_visit'];
	//echo $diffdate = (strtotime(date('today')) - strtotime($_SESSION['msg_click']))/60000 ;
	
}
/*****************MSG NAVIGATION CLICK***********************************/
if(isset($_POST['action']) && $_POST['action']=='msgNavClicked'){
	
	$msgType = $_POST['msgType'];
	if($msgType == 'inbox')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id");
	else if($msgType == 'unread')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id AND is_read=0");
	else if($msgType == 'conversation')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_by='".$user_id."' AND m.sent_to=u.user_id");
	else if($msgType == 'online')
		//$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id AND u.is_online=1");
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_users` u WHERE u.is_online=1");
	
	while($result = mysql_fetch_assoc($Query)){
	
		$unreadMsgQuery=mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_by='".$result['user_id']."' AND sent_to ='".$user_id."' AND is_read=0");
		$unreadMsgCount=mysql_num_rows($unreadMsgQuery);
	?>
		<div class="list-group-item login-form left">
			<div class="pic">
				<a href="javascript:void(0);">
					<img src="<?php echo getProfileImage($result['profile_image']);?>">
				</a>
				<span><img src="images/match-icon-small.png"></span>
			</div>
			<div class="name chatOnlineUserList" id="chatOnlineUserList-<?php echo $result['user_id'];?>">
				<a href="javascript:void(0);">
					<?php 
					if($result['is_online'] == 1){
						echo '<span><img src="images/online.png"></span>';
					}
					echo $result['user_name'];
					?>
					<span><i class="fa fa-heart"></i></span>
				</a>
				<?php if($unreadMsgCount){
					echo "<span class='badge my-msg' id='unread-msg-count-".$result['user_id']."'>".$unreadMsgCount."</span>";
					}
				?>
			</div>
				<div class="check_box msg_pro_chk">
					<div class="pull-left">
						<input id="checkbox<?php echo $result['user_id'];?>" type="checkbox" name="chatUserCheckbox" class="chatUserCheckbox" value="<?php echo $result['user_id'];?>"/>
						<label for="checkbox<?php echo $result['user_id'];?>"><span class="pull-left"></span></label>
					</div>
				</div>
		</div>
	
	<?php }
	
}

/*****************SEARCH MORE PEOPLE***********************************/
if(isset($_POST['action']) && $_POST['action']=='searchMorePeople'){
		$userResult = $userProfileObj->getUserInfo($user_id);
		$here_to=$userResult['here_to'];
		$here_with_guy=$userResult['here_with_guy'];
		$here_with_girl=$userResult['here_with_girl'];
		$here_age_min=$userResult['here_age_min'];
		$here_age_max=$userResult['here_age_max'];
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
		$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6");

	?>
	<div class="clearfix">
		<ul>
		<?php
			while($chatUserResult=mysql_fetch_assoc($chatUserQuery)){?>
			<li>
				<a href="javascript:void(0);" class="chatUserPic"  id="chatUserPic-<?php echo $chatUserResult['user_id'];?>">
				 <img src="<?php echo getProfileImage($chatUserResult['profile_image']);?>"/>
				</a>
				<?php if($chatUserResult['is_online']){?>
					<span class="active_icon"><img src="images/online.png"></span>
				<?php } ?>
				<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $userProfileObj->getPublicPhotoCount($chatUserResult['user_id']);?></span> </span>
			</li>
		<?php } ?>
		</ul>
	</div>
	 
<?php }

/*****************NOT INTERESTED**********************************/
if(isset($_POST['action']) && $_POST['action']=='notInterested'){
	$userResult = $userProfileObj->getUserInfo($user_id);
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
	$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." order By RAND() limit 0,6");
?>
		<div class="row">
			<div class="msg_cont_sec align-c">
				<h3 class="margin-t80 margin-b30">Start talking with new people close by!</h3>
				<?php if(mysql_num_rows($chatUserQuery) == 0){?>
				<!-------------------IF NO USER FOUND----------------------->
				<div class="start_talking margin-t60">
					<p>Looks like there is no one close by right now.
					You can always <a class="green" href="javascript:void(0);">reset</a> your search filters and check out other fun new people on Startrishta or continue with any current </p>
				</div>
				<?php } else {?>
				<!------------------IF USER FOUND---------------------------->
				<div class="start_talking my_msg margin-t20" id="search_more_people_div">
					<div class="clearfix">
						<ul>
						<?php
							while($chatUserResult=mysql_fetch_assoc($chatUserQuery)){?>
							<li>
								<a href="javascript:void(0);" class="chatUserPic"  id="chatUserPic-<?php echo $chatUserResult['user_id'];?>">
								 <img src="<?php echo getProfileImage($chatUserResult['profile_image']);?>"/>
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
						<aside class="align-l margin-l15 padding-t15">Get seen by new people right here when they open their Startrishta messages!</aside>
					</div>
					<div class="align-c pull-left margin-t30 margin-l10">
						<a href="javascript:void(0);" class="btn btn-default custom sky-blue" onclick="$('#readyToChat').modal('show');">I'm ready to chat </a></div>
				</div>
			</div>
</div>
			
<?php }



/*****************SEARCHING OF USER ON LEFT SIDE*************************/
if(isset($_POST['action']) && $_POST['action']=='searchOnlineUserList'){
	
	$searchWord=$_POST['searchWord'];
	$msgType = $_POST['msgType'];
	if($msgType == 'inbox')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id AND u.user_name LIKE '%".$searchWord."%'");
	else if($msgType == 'unread')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id AND is_read=0 AND u.user_name LIKE '%".$searchWord."%'");
	else if($msgType == 'conversation')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_by='".$user_id."' AND m.sent_to=u.user_id AND u.user_name LIKE '%".$searchWord."%'");
	else if($msgType == 'online')
		$Query=mysql_query("SELECT DISTINCT u.user_id,u.user_name,u.is_online,u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to='".$user_id."' AND m.sent_by=u.user_id AND u.is_online=1 AND u.user_name LIKE '%".$searchWord."%'");
	
	while($result = mysql_fetch_assoc($Query)){
	
		$unreadMsgQuery=mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_by='".$result['user_id']."' AND sent_to ='".$user_id."' AND is_read=0");
		$unreadMsgCount=mysql_num_rows($unreadMsgQuery);
	?>
		<div class="list-group-item login-form left chatOnlineUserList" id="chatOnlineUserList-<?php echo $result['user_id'];?>">
			<div class="pic">
				<a href="javascript:void(0);">
					<img src="<?php echo getProfileImage($result['profile_image']);?>">
				</a>
				<span><img src="images/match-icon-small.png"></span>
			</div>
			<div class="name">
				<a href="javascript:void(0);">
					<?php 
					if($result['is_online'] == 1){
						echo '<span><img src="images/online.png"></span>';
					}
					echo $result['user_name'];
					?>
					<span><i class="fa fa-heart"></i></span>
				</a>
				<?php if($unreadMsgCount){
					echo "<span class='badge my-msg' id='unread-msg-count-".$result['user_id']."'>".$unreadMsgCount."</span>";
					}
				?>
			</div>
			<div class="check_box">
				<span class="left">
					<input type="checkbox" id="" class="style-checkbox check1">
					<span class="style-checkbox1 style_imp_checkbox"><i class="fa fa-square fa-2x"></i></span>
				</span>
			</div>
		</div>
	
	<?php }
}

if(isset($_POST['action']) && $_POST['action']=='showUserChatProfile'){
	
	$chatUserId=$_POST['userProfileId'];
	$myInterestArray=array();
	$myInterestQuery=$userProfileObj->getUserInterest($user_id);
	while($myInterestResult = mysql_fetch_assoc($myInterestQuery)){
		$myInterestArray[]=$myInterestResult['interest_id'];
	}
	$userMatchQuery=mysql_query("SELECT user_id,user_name,dob from sr_users WHERE user_id='".$chatUserId."'");
	$userMatchPhotoQuery=mysql_query("SELECT * from sr_user_photo WHERE user_id='".$chatUserId."' LIMIT 0,3");
	
	$userMatchInterestQuery=$userProfileObj->getUserInterest($chatUserId);	
	$chatUserInterestCount =mysql_num_rows($userMatchInterestQuery);
	
	$isUserLike = $userProfileObj->isUserLike($chatUserId , $user_id);
	$isUserLike1 = $userProfileObj->isUserLike($user_id , $chatUserId);

	$userMatchResult=mysql_fetch_assoc($userMatchQuery);
	$chatUserName=$userMatchResult['user_name'];
	$chatUserAge=date('Y') - date('Y' , strtotime($userMatchResult['dob']));
	
	$unreadMsgQuery=mysql_query("SELECT is_read , msg FROM sr_user_message WHERE sent_to='".$user_id."' AND sent_by='".$chatUserId."'");
	$unreadMsgResult=mysql_fetch_assoc($unreadMsgQuery);
	?>
	
	<div class="row">
		<div class="msg_cont_sec align-c" id="user_match">
			<?php 
				if(mysql_num_rows($userMatchQuery)> 0){
			?>
			<div class="msg_cont_sec align-c">
			<?php if($isUserLike1 == 1 && $isUserLike == 1){?>
				<h3 class="margin-t80 margin-b70">Congratulations, you've both matched!</h3>
			<?php }else {?>
				<h3 class="margin-t80 margin-b70">Congratulations, you've matched!</h3>
			<?php } ?>
				<!--<div class="margin-b50"><p><strong><?php echo $chatUserName;?></strong>, liked you in Kismat Connection!</p>
				</div>-->
				<!--<div class="margin-b70"><p><strong>Marcus</strong> liked you in Kismat Connection and he sent you a message!</p></div>-->
				
				
				<div class="user_pics pull-left">
				<?php if(mysql_num_rows($unreadMsgQuery)) {?>
					<div class="chat_msg">
						<a href="javascripe:void(0);"><?php echo $unreadMsgResult['msg'];?></a>
						<i class="fa fa-play"></i>
					</div>	
				<?php } ?>
					<ul class="clearfix">
						<?php 
						while($userMatchPhotoResult=mysql_fetch_assoc($userMatchPhotoQuery))
						{?>
							<li>
								<a><img src="doc/photo/<?php echo $userMatchPhotoResult['photo'] ;?>"></a>
							</li>
						<?php } ?>
					</ul>
				</div>
				
				<h2 class="align-c full pull-left margin-t40"><?php echo $chatUserName;?>, <span class="font_s20"><?php echo $chatUserAge;?></span></h2>
				<a href="profile.php?uid=<?php echo $chatUserId;?>" class="align-c green">View full profile</a>
				<?php if($chatUserInterestCount == 0){?>
				<!------------USER HAVE NO INTEREST-------------------------->
				<p class="margin-t20"><?php echo $chatUserName;?> has no interests yet, why don’t you recommend some?</p>
				<?php }else {
					/****************INTEREST IN COMMAN*********************/
				$chatUserCommonInterest = $userProfileObj->getUserCommonInterest($user_id , $chatUserId);
				if($chatUserCommonInterest){?>
					<p class="margin-t20">You have <?php echo $userProfileObj->getUserCommonInterest($user_id , $chatUserId);?> interests in common!</p>
				<?php } ?>
				<div class="interests margin-t20">
					<ul>
					<?php 
					$intCount=1;
					while($userMatchInterestResult=mysql_fetch_assoc($userMatchInterestQuery)){
					if(in_array($userMatchInterestResult['interest_id'] , $myInterestArray)) 
						$class='blue';
					else 
						$class='';
					?>
						<li><a class="<?php echo $class;?>" href="javascript:void(0);"><span class="<?php echo $userMatchInterestResult['icon'];?>"></span><p><?php echo $userMatchInterestResult['interest'];?></p></a></li>
					<?php 
					$intCount++;
					if($intCount > 4){
						break;
					}
					}
					if($chatUserInterestCount > 4) {?>	
						<li><a href="javascript:void(0)"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
					<?php } ?>
					</ul>
				</div>
				<?php } ?>
				<div class="align-c margin-t25 margin-b20 full pull-left">
					<a href="javascript:void(0);" class="btn btn-default custom red" id="start_conversation" data-id="<?php echo $chatUserId;?>"> Start a conversation now! </a>
				</div>
				<p><a href="javascript:void(0);" id="not_interested">Not Interested</a></p>
			</div>
		<?php } ?>
		</div>
	</div>
			
	
<?php }
/*
if(isset($_POST['action']) && $_POST['action']=='showRandomUser'){
	
	$chatUserId=$_POST['userProfileId'];
	/**************CHAT USER INFO***********************************
		$userMatchQuery=mysql_query("SELECT user_id,user_name,dob ,	profile_image,gender, location ,here_to, created_on from sr_users WHERE user_id='".$chatUserId."'");
		$userMatchResult=mysql_fetch_assoc($userMatchQuery);
		$chatUserImage=getProfileImage($userMatchResult['profile_image']);
		$chatUserName=$userMatchResult['user_name'];
		$chatUserHereTo=$userMatchResult['here_to'];
		$chatUserAge=date('Y') - date('Y' , strtotime($userMatchResult['dob']));
		if($userMatchResult['gender'] == 2){
			$userPer='Her';
			$userNou='She';
		}else {
			$userPer ='Him';
			$userNou ='He';
		}
		$isUserFavorite = $userProfileObj->isUserFavorite($chatUserId , $user_id);
	/*******************CHAT USER PHOTO****************************
		$userPhotoQuery=$userProfileObj->getUserPhoto($userMatchResult['user_id']);
		$photoCount=mysql_num_rows($userPhotoQuery);
	/****************REPUTATION*************************************
		$chatUserReputation = $userProfileObj->getUserReputation($chatUserId);
		if($chatUserReputation <= 40 ) $otherReputaion='Low';
		if($chatUserReputation > 40 && $chatUserReputation <= 60) $otherReputaion='Heating Up';
		if($chatUserReputation > 60 && $chatUserReputation <= 80) $otherReputaion='Hot';
		if($chatUserReputation > 80) $otherReputaion='Very Hot';
	/*************INTEREST******************************************
		$myInterestArray=array();
		$myInterestQuery=$userProfileObj->getUserInterest($user_id);
		while($myInterestResult = mysql_fetch_assoc($myInterestQuery)){
			$myInterestArray[]=$myInterestResult['interest_id'];
		}
		$chatUserInterestArray=array();
		$chatUserInterestQuery=$userProfileObj->getUserInterest($chatUserId);
		while($chatUserInterestResult=mysql_fetch_assoc($chatUserInterestQuery)){
			$chatUserInterestArray[]=$chatUserInterestResult;
		}
		$chatUserInterestCount = mysql_num_rows($chatUserInterestQuery);
	?>
	
	<div class="row">
		<header class="messages">
			<div class="prof_pics pull-left">
				<a href="javascript:void(0);"><img src="<?php echo $chatUserImage;?>"></a>
				
				<span class="active_icon"><img src="images/active2.png"></span>
				<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $photoCount;?></span> </span>
			</div>
			<div class="content">
			<div class="full pull-left">
				<aside class="pull-left">
					<div><a href=""><p><?php echo $chatUserName;?>,</p> <span><?php echo $chatUserAge;?></span></a></div>
					<div class="pull-right status">
						<ul>
							<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="<?php $userPer;?> Reputation is <?php echo $otherReputaion;?>!" ><img src="images/icon001.png"/></a></li>
							<?php if($isUserFavorite == 1){?>
								<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="Added to favorites!"><img src="images/star.png"/></a></li>
							<?php } if($isUserFavorite == 0) {?>
								<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="Add to favorites!"><img src="images/star.png"/></a></li>
							<?php } ?>
							<li><a href="javascript:void(0);"><img src="images/progress-icon.png"></a></li>
							<li><a href="javascript:void(0;)"><img src="images/down-arw.png" data-toggle="tooltip" data-placement="bottom"  title="Become a VIP member"/></a></li>
						</ul>
					</div>
				</aside>
				<aside class="pull-right">
					<div class="popup-right-box rated">
						<div class="profile pull-right margin-t10">
							<ul>
								<li class="pull-right"> 
									<a class="prof_dpdwn2 btn btn-default default slat-blue btn-pad" data-toggle="dropdown"> 
										<b><i class="fa fa-power-off"></i> Action <i class="fa fa-sort-desc"></i></b>  
									</a>
									<ul class="prof_drop_dwn2 dropdown-menu">
										<li><a href="javascript:void(0);"><span class="msg"></span> Message Now</a></li>
										<li>
										<?php if($isUserFavorite == 0){?>
											<a href="javascript:void(0);" class="add_favourite" id="add_favourite-<?php echo $chatUserId.'-'.$chatUserName;?>">
												<span class="mf"></span> Add to Favourites</a>
										<?php } else if($isUserFavorite == 1){?>
											<a href="javascript:void(0);">
												<span class="mf"></span> Added to Favourites</a>
										<?php } ?>
										</li>
										<li>
											<a href="javascript:void(0);" data-target="#MsgGiveGifts" data-toggle="modal"><span class="gift"></span>Give Gift</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="add_block" id="add_block-<?php echo $chatUserId.'-'.$chatUserName;?>">
												<span class="blk"></span>Block</a>
										</li>
										<li><a href="javascript:void(0);"><span class="report"></span>Report Abuse</a></li>
										<li><a href="javascript:void(0)" id="delete_oneconv" data-id="<?php echo $chatUserId;?>"><span class="dlt"></span>Delete</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</aside>
				</div>
				<div class="interests margin-t20 margin-l5">
					<ul>
						<?php 
						$intCount=1;
						$commanInterestCount=0;
						foreach($chatUserInterestArray as $chatUserInterestResult){
							if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)){
								$class='blue';
								$commanInterestCount++;
							}
							else{
								$class='';
							}
						?>
							<li><a class="<?php echo $class;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
						<?php 
						if($intCount >= 4) break;
						$intCount++;
						}  if($chatUserInterestCount > 4){?>
							<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</header>
		
		<div class="msg_cont_sec2 align-c">
			<div class="msg_cont_sec2 align-c">
			
				<h3 class="margin-t80 margin-b20"><?php echo $chatUserName;?> is waiting to talk!</h3>
				<div class="margin-b30"><p><strong> <?php echo $userNou;?></strong>  is looking to <strong><?php echo $chatUserHereTo;?>.</strong></p></div>
				<?php if($chatUserInterestCount == 0){ ?>
					<p class="margin-t20">Currently <?php echo $userNou;?> has no interests, why don’t you recommend some?</p>
				<?php } ?>
				<?php if($commanInterestCount){ ?>
					<p>You Share <strong><?php echo $commanInterestCount;?> Interests</strong> with <?php echo $userPer;?>:</p>
				<?php } ?>
				<div class="interests margin-t20">
					<ul>
						<?php 
						$intCount=1;

						foreach($chatUserInterestArray as $chatUserInterestResult){
							if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)){
								$class='blue';
							}
							else{
								$class='';
							}
						?>
							<li><a class="<?php echo $class;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
						<?php 
						if($intCount >= 4) break;
						$intCount++;
						}  if($chatUserInterestCount > 4){?>
							<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="align-c margin-t25 margin-b20 full pull-left">
					<a href="javascript:void(0);" class="btn btn-default custom red" id="start_conversation" data-id="<?php echo $chatUserId;?>"> Start a conversation now! </a>
				</div>
				<p class="pull-left full">or really get his attention by<a href=""> giving a gift!</a></p>
				<p class="pull-left full margin-t5"><a href="">Not Interested</a></p>
			</div>
		</div>			
	</div>

<?php }*/


if(isset($_POST['action']) && $_POST['action']=='startConversation'){
	
		$chatUserId=$_POST['userConverId'];
		//updtae user unread message
		mysql_query("UPDATE sr_user_message SET is_read=1 , receive_date='".DATE_TIME."' WHERE sent_by ='".$chatUserId."' AND sent_to='".$user_id."' ");
		
		$isUserVip = $userProfileObj->isVipMember($user_id);
		
		/**************CHAT USER INFO***********************************/
		$userMatchQuery=mysql_query("SELECT user_id,user_name,dob ,	profile_image,gender, location ,here_to, created_on from sr_users WHERE user_id='".$chatUserId."'");
		$userMatchResult=mysql_fetch_assoc($userMatchQuery);
		$chatUserImage=getProfileImage($userMatchResult['profile_image']);
		$chatUserName=$userMatchResult['user_name'];
		$chatUserjoined=$userMatchResult['created_on'];
		$chatUserLocation=$userMatchResult['location'];
		$chatUserHereTo=$userMatchResult['here_to'];
		$chatUserAge=date('Y') - date('Y' , strtotime($userMatchResult['dob']));
		if($userMatchResult['gender'] == 2){
			$userPer='Her';
			$userNou='She';
		}else {
			$userPer ='Him';
			$userNou ='He';
		}
		$diffJoin = time() - strtotime($chatUserjoined);
		$day_diffJoin = floor($diffJoin / 86400);
		$isUserFavorite = $userProfileObj->isUserFavorite($chatUserId , $user_id);
		$isChatUserVip = $userProfileObj->isVipMember($chatUserId);
		$isChatUserRandom = $userProfileObj->isRandomUser($chatUserId , $user_id);
		/*******************CHAT USER PHOTO****************************/
		$userPhotoQuery=$userProfileObj->getUserPhoto($userMatchResult['user_id']);
		$photoCount=mysql_num_rows($userPhotoQuery);
		/****************REPUTATION*************************************/
		$chatUserReputation = $userProfileObj->getUserReputation($chatUserId);
		if($chatUserReputation <= 40 ) $otherReputaion='Low';
		if($chatUserReputation > 40 && $chatUserReputation <= 60) $otherReputaion='Heating Up';
		if($chatUserReputation > 60 && $chatUserReputation <= 80) $otherReputaion='Hot';
		if($chatUserReputation > 80) $otherReputaion='Very Hot';
		/*************INTEREST******************************************/
		$myInterestArray=array();
		$myInterestQuery=$userProfileObj->getUserInterest($user_id);
		while($myInterestResult = mysql_fetch_assoc($myInterestQuery)){
			$myInterestArray[]=$myInterestResult['interest_id'];
		}
		$chatUserInterestArray=array();
		$chatUserInterestQuery=$userProfileObj->getUserInterest($chatUserId);
		while($chatUserInterestResult=mysql_fetch_assoc($chatUserInterestQuery)){
			$chatUserInterestArray[]=$chatUserInterestResult;
		}
		$chatUserInterestCount = mysql_num_rows($chatUserInterestQuery);
		/*******************chat limit********************************/
		$startChatUserArray=array();
		$chatLimitQuery=mysql_query("SELECT sent_to FROM `sr_user_message` WHERE date(sent_date) BETWEEN date('".DATE_TIME."') AND date('".DATE_TIME."')+ INTERVAL 1 DAY AND sent_by='".$user_id."' group by sent_to");
		while($chatLimitResult=mysql_fetch_assoc($chatLimitQuery)){
			$startChatUserArray[]=$chatLimitResult['sent_to'];
		}
		$chatLimitCount=mysql_num_rows($chatLimitQuery);
		
		/********************8SEARCH CRITERIA*************************/
		$userResult = $userProfileObj->getUserInfo($user_id);
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
			$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id='".$chatUserId."' ".$addChatQuery." ");
		/***********NEW USER SEND A MESSAGE******************************/
			$userDiffJoin = time() - strtotime($userResult['created_on']);
			$userDiffJoinDay = floor($userDiffJoin / 86400);
		/*****************CONVERSATIONS*********************************/
		$todayDate=date('Y-m-d 00:00:00');
		$showChatQuery=mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by='".$chatUserId."' AND sent_to = '".$user_id."'  AND is_deletebyto =0) OR (sent_by='".$user_id."' AND sent_to = '".$chatUserId."'  AND is_deletebyfrom =0)) AND m.sent_by=u.user_id  AND sent_date <= '".$todayDate."' ORDER BY sent_date");
		
		$showtodayChatQuery=mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by='".$chatUserId."' AND sent_to = '".$user_id."' AND is_deletebyto = 0) OR (sent_by='".$user_id."' AND sent_to = '".$chatUserId."' AND is_deletebyfrom =0)) AND m.sent_by=u.user_id  AND sent_date > '".$todayDate."' ORDER BY sent_date");
		
		$totalChat=mysql_num_rows($showChatQuery) + mysql_num_rows($showtodayChatQuery);
		
		$newMsgCountQuery=mysql_query("SELECT * FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to = '".$user_id."'");
		$newMsgRecQuery=mysql_query("SELECT * FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to = '".$chatUserId."'");
		
		/*****************888SEND AND RECEIVE MESSAGE COUNT********************************/
		$sendMsgQuery=mysql_query("SELECT count(*) as send_count FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to='".$chatUserId."'");
		$sendMsgResult=mysql_fetch_assoc($sendMsgQuery);
		 $send_count=$sendMsgResult['send_count'];
		$recMsgQuery=mysql_query("SELECT count(*) as rec_count FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to='".$user_id."'");
		$recMsgResult=mysql_fetch_assoc($recMsgQuery);
		 $rec_count=$recMsgResult['rec_count'];
		$ComBoxClass1='';
		$ComBoxClass2='';
		if($rec_count == 0 && $send_count == 2){
			$ComBoxClass1='d_none';
		}else{
			$ComBoxClass2='d_none';
		}
	?>
	<input type="hidden" name="chatUserId" id="chatUserId" value="<?php echo $chatUserId; ?>" >
	<input type="hidden" id="replay_msg" value="0" >
	<div class="row">
		<header class="messages">
			<div class="prof_pics pull-left">
				<a href="javascript:void(0);"><img src="<?php echo $chatUserImage;?>"></a>
				
				<span class="active_icon"><img src="images/active2.png"></span>
				<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $photoCount;?></span> </span>
			</div>
			<div class="content">
			<div class="full pull-left">
				<aside class="pull-left">
					<div><a href=""><p><?php echo $chatUserName;?>,</p> <span><?php echo $chatUserAge;?></span></a></div>
					<div class="pull-right status">
						<ul>
							<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="<?php $userPer;?> Reputation is <?php echo $otherReputaion;?>!" ><img src="images/icon001.png"/></a></li>
							<?php if($isUserFavorite == 1){?>
								<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="Added to favorites!"><img src="images/star.png"/></a></li>
							<?php } if($isUserFavorite == 0) {?>
								<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="Add to favorites!"><img src="images/star.png"/></a></li>
							<?php } ?>
							<li><a href="javascript:void(0);"><img src="images/progress-icon.png"></a></li>
							<li><a href="javascript:void(0;)"><img src="images/down-arw.png" data-toggle="tooltip" data-placement="bottom"  title="Become a VIP member"/></a></li>
						</ul>
					</div>
				</aside>
				<aside class="pull-right">
					<div class="popup-right-box rated">
						<div class="profile pull-right margin-t10">
							<ul>
								<li class="pull-right"> 
									<a class="prof_dpdwn2 btn btn-default default slat-blue btn-pad" data-toggle="dropdown"> 
										<b><i class="fa fa-power-off"></i> Action <i class="fa fa-sort-desc"></i></b>  
									</a>
									<ul class="prof_drop_dwn2 dropdown-menu">
										<li>
										<?php if($isUserFavorite == 0){?>
											<a href="javascript:void(0);" class="add_favourite" id="add_favourite-<?php echo $chatUserId.'-'.$chatUserName;?>">
												<span class="mf"></span> Add to Favourites</a>
										<?php } else if($isUserFavorite == 1){?>
											<a href="javascript:void(0);">
												<span class="mf"></span> Added to Favourites</a>
										<?php } ?>
										</li>
										<li>
											<a href="javascript:void(0);" data-target="#MsgGiveGifts" data-toggle="modal"><span class="gift"></span>Give Gift</a>
										</li>
										<li>
											<a href="javascript:void(0);" class="add_block" id="add_block-<?php echo $chatUserId.'-'.$chatUserName;?>">
												<span class="blk"></span>Block</a>
										</li>
										<li><a href="javascript:void(0);"><span class="report"></span>Report Abuse</a></li>
										<li><a href="javascript:void(0)" id="delete_oneconv" data-id="<?php echo $chatUserId;?>"><span class="dlt"></span>Delete</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</aside>
				</div>
				<div class="interests margin-t20 margin-l5">
					<ul>
						<?php 
						$intCount=1;
						$commanInterestCount=0;
						foreach($chatUserInterestArray as $chatUserInterestResult){
							if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)){
								$class='blue';
								$commanInterestCount++;
							}
							else{
								$class='';
							}
						?>
							<li><a class="<?php echo $class;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
						<?php 
						if($intCount >= 4) break;
						$intCount++;
						}  if($chatUserInterestCount > 4){?>
							<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</header>
		
	<?php 
	$class='';
	$isProfileImage=$userProfileObj->isProfileImage($user_id);
	/**********IF USER HAVE PROFILE IMAGE***************/
	if($isProfileImage){
		/***************IF CHAT USER IS RANDOM***********/
		if($isChatUserRandom && $rec_count == 0 && $send_count == 0 && !isset($_POST['clicked'])){
		$class ='d_none';
		?>
		<div class="msg_cont_sec2 align-c">
			<div class="msg_cont_sec2 align-c">
			
				<h3 class="margin-t80 margin-b20"><?php echo $chatUserName;?> is waiting to talk!</h3>
				<div class="margin-b30"><p><strong> <?php echo $userNou;?></strong>  is looking to <strong><?php echo $chatUserHereTo;?>.</strong></p></div>
				<?php if($chatUserInterestCount == 0){ ?>
					<p class="margin-t20">Currently <?php echo $userNou;?> has no interests, why don’t you recommend some?</p>
				<?php } ?>
				<?php if($commanInterestCount){ ?>
					<p>You Share <strong><?php echo $commanInterestCount;?> Interests</strong> with <?php echo $userPer;?>:</p>
				<?php } ?>
				<div class="interests margin-t20">
					<ul>
						<?php 
						$intCount=1;

						foreach($chatUserInterestArray as $chatUserInterestResult){
							if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)){
								$intClass='blue';
							}
							else{
								$intClass='';
							}
						?>
							<li><a class="<?php echo $intClass;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
						<?php 
						if($intCount >= 4) break;
						$intCount++;
						}  if($chatUserInterestCount > 4){?>
							<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
						<?php } ?>
					</ul>
				</div>
				<div class="align-c margin-t25 margin-b20 full pull-left">
					<a href="javascript:void(0);" class="btn btn-default custom red" id="start_conversation" data-id="<?php echo $chatUserId;?>"> Start a conversation now! </a>
				</div>
				<p class="pull-left full">or really get his attention by<a href="javascript:void(0);" data-target="#MsgGiveGifts" data-toggle="modal"> giving a gift!</a></p>
				<p class="pull-left full margin-t5"><a href="">Not Interested</a></p>
			</div>
		</div>			
	
		
		<?php }
		/************IF USER IS VIP**********************/
		if($isUserVip){
			/*******************NOT MEET TO SEARCH CRITERIA*****************/
			if(mysql_num_rows($chatUserQuery) == 0 && $send_count == 0 && $rec_count == 0){
			?>
				<div class="msg_cont_sec2 align-c" id="vip_unmatched">
						
							<h3 class="margin-t80 margin-b20">Get Chatting Now!</h3>
							<div class="margin-b30"><p><strong><?php echo $chatUserName;?></strong>  is looking to <strong><?php echo $chatUserHereTo;?>.</strong></p></div>
							<!--Message17 if Interest not found--
							<p class="margin-t20">Currently he has no interests, why don’t you recommend some?</p>-->
							
							<div class="interests margin-t20">
								<ul>
									<?php 
										$intCount1=1;
										foreach($chatUserInterestArray as $chatUserInterestResult){
											if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)) 
												$class='blue';
											else 
												$class='';
										?>
											<li><a class="<?php echo $class;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
										<?php 
										if($intCount1 >= 4) break;
										$intCount1++;
										}  if($chatUserInterestCount > 4){?>
											<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
										<?php } ?>
								</ul>
							</div>
							
							<p class="pull-left full margin-t30">Start a conversation now or really get his attention by<a href="javascript:void(0);" data-target="#MsgGiveGifts" data-toggle="modal"> giving a gift!</a></p>
					</div>
			<?php 
			}
		}
		/************IF USER IS NOT VIP**********************/
		else if($isUserVip == 0){
			/**********IF CHAT USER IS NEW ***************/
			if($day_diffJoin == 0 && $rec_count == 0 && $send_count == 0){ 
				$diffTime = strtotime($chatUserjoined . ' +1 day') - time();
				if($diffTime < 120) $remaingTime = '1 minute';
				else if($diffTime < 3600) $remaingTime = floor($diffTime / 60) . ' minutes ';
				else if($diffTime < 7200) $remaingTime = '1 hour';
				else if($diffTime < 86400) $remaingTime = floor($diffTime / 3600) . ' hours ';
				$class='d_none';
			?>
				<div class="msg_cont_sec2 align-c">
					<div class="msg_cont_sec2 align-c">
						<div class="align-c margin-t60 d_block"><a href=""><img src="images/timer.png"/></a></div>
						<h3 class="margin-t20 margin-b20">
							<?php echo $chatUserName;?> is a new member!</h3>
						<div class="margin-b10"><p>Only VIP users can contact <?php echo $userPer;?> for the next <?php echo $remaingTime;?>.</p></div>
						<div class="margin-b10"><p>Upgrade to a VIP membership and get exlusive access <br />to every new user the moment they join!</p></div>
						
						<div class="align-c margin-t5 margin-b20 full pull-left">
							<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-new-member">Go VIP </a>
						</div>
						<p><a href="javascript:void(0);">Or try it for free!</a></p>
					</div>
				</div>		
		<?php 
			/**********IF USER HAVE HOT REPUTATION ***************/
			} else if($chatUserReputation > 80 && $rec_count == 0 && $send_count == 0){
				$class='d_none';
			?>
				<div class="msg_cont_sec2 align-c">
					<div class="msg_cont_sec2 align-c">
						<div class="align-c margin-t60 d_block"><a href=""><img src="images/fire.png"/></a></div>
						<h3 class="margin-t20 margin-b20 lh-40"><?php echo $chatUserName;?>&#39;s reputation is very hot today <br />
						and has <?php echo $userPer;?> inbox full of messages!</h3>
						<div class="margin-b30"><p>Beat the queue and get exclusive access to <?php echo $userPer;?> <br/>
						Inbox right now by getting a VIP upgrade!</p></div>
						<div class="align-c margin-t5 margin-b20 full pull-left">
							<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-hot-member">Go VIP </a>
						</div>
						<p><a href="javascript:void(0);">Or try it for free!</a></p>
					</div>
				</div>	
		<?php
			/**********DONT MEET THEIR SEARCH CRITERIA ***************/
			} else if(mysql_num_rows($chatUserQuery) == 0 && $rec_count == 0 && $send_count == 0 && $userDiffJoinDay != 0){
				$class='d_none';
			?>
				<div class="msg_cont_sec2 align-c">
					<div class="align-c margin-t60 d_block"><a href=""><img src="images/facial.png"/></a></div>
					<h3 class="margin-t20 margin-b20 lh-40">You don&#39;t match his search criteria</h3>
					<div class="margin-b30"><p>It looks like this person&#39;s search criteria doesn&#39;t match with yours.<br />
	By becoming a VIP member you can still speak to them though.</p></div>
					<div class="align-c margin-t5 margin-b20 full pull-left">
						<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-search-criteria">Go VIP </a>
					</div>
					<p><a href="">Or try it for free!</a></p>
				</div>					
		<?php
			}	
		}
		/**********IF NEW USER SEND A MESSAGE WITHOUT MATCHING**************/
		 if(mysql_num_rows($chatUserQuery) == 0 && $isChatUserVip == 0 && $send_count == 0 && $rec_count!=0 && !isset($_POST['replyClicked'])){
				$class ='d_none';
				$newMsgCountResult=mysql_fetch_assoc($newMsgCountQuery);
			?>
					<div class="msg_cont_sec2 align-c" id="msg-reply-div">
						<div class="full clearfix">
							<h3 class="margin-t20 margin-b20"><strong><?php echo $chatUserName;?></strong> in <?php echo $chatUserLocation;?> sent you a message!<?php echo $class;?></h3>
							
							<div class="full">
								<div class="chat_msg msg15">
									<a href="javascript:void(0);"><?php echo $newMsgCountResult['msg'];?></a>
									<i class="fa fa-play"></i>
								</div>
							</div>
							<div class="full padding-l70 margin-t20">
								<div class="align-c margin-t5 margin-b20 pull-left">
									<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="reply-now" data-id="<?php echo $chatUserId;?>">Reply now </a>
								</div>
								<div class="pull-left padding10">or</div>
								<div class="align-c margin-t5 margin-b20 pull-left">
									<a href="javascript:void(0);" id="msg_nointerest" class="btn btn-default custom bg_gray wd_200">I'm not interested </a>
								</div>
							</div>
						</div>
						<hr>
						<div class="full clearfix">
							<div class="margin-b20"><p><?php echo $chatUserAge;?> years old. <?php echo $chatUserLocation;?>. <a href="profile.php?uid=<?php echo $chatUserId;?>">View full profile</p></div>
							<div class="user_pics pull-left">
								<ul class="clearfix">
									<?php $userPhotoResult=mysql_fetch_assoc($userPhotoQuery);?>
									<li><a><img src="doc/photo/<?php echo $userPhotoResult['photo'];?>"></a></li>
								</ul>
							</div>
							<p class="margin-t20 pull-left full">You have <?php echo $commanInterestCount;?> interests in common!</p>
							<div class="interests margin-t10 margin-b20">
								<ul>
									<?php 
										$intCount1=1;
										foreach($chatUserInterestArray as $chatUserInterestResult){
											if(in_array($chatUserInterestResult['interest_id'] , $myInterestArray)) 
												$intclass='blue';
											else 
												$intclass='';
										?>
											<li><a class="<?php echo $intclass;?>" href="javascript:void(0);"><span class="<?php echo $chatUserInterestResult['icon'];?>"></span><p><?php echo $chatUserInterestResult['interest'];?></p></a></li>
										<?php 
										if($intCount1 >= 4) break;
										$intCount1++;
										}  if($chatUserInterestCount > 4){?>
											<li><a href="javascript:void(0);"><span class="more"></span><p><?php echo $chatUserInterestCount-4;?></p></a></li>
										<?php } ?>
								</ul>
							</div>
							<p><a href="javascript:void(0);">Not Interested</a></p>
						</div>
					</div>
			
		<?php }
		/**************CHAT LIMIT REACHED*********************/
		if($chatLimitCount == 5 && (!in_array($chatUserId ,$startChatUserArray))){ 
				$class='d_none';
				$remaingChatTime='';
				$leftTime = mktime(24,0,0) - time();
				if($leftTime < 120) $remaingChatTime = '1 minute';
				else if($leftTime < 3600) $remaingChatTime = floor($leftTime / 60) . ' minutes ';
				else if($leftTime < 7200) $remaingChatTime = '1 hour';
				else if($leftTime < 86400){
					$remMin=$leftTime % 3600;
					if($remMin == 0)
						$remaingChatTime = floor($leftTime / 3600) . ' hours ';
					else
						$remaingChatTime = floor($leftTime / 3600) . ' hours '.floor($remMin / 60) . ' minutes ';
				}
			?>
				<div class="msg_cont_sec align-c">
					<div class="msg_cont_sec align-c">
						<div class="user_pics margin-t150 pull-left">
							<a class="align_c"><img src="images/chat-limit.png"></a>
						</div>
						<h3 class="align-c full pull-left margin-t20">Oops! You've reached your daily chat limit! </h3>
						<div class="clea+
						rfix"></div>
						<p class="margin-t20 ">You have <?php echo $remaingChatTime;?> remaining before your quota returns.</p>
						<p>	Alternatively buying credits will let you message more</p>
						<p>	new people on Startrishta.</p>
						<div class="align-c margin-t25 margin-b20 full pull-left">
							<a href="javascript:void(0);" class="btn btn-default custom red" data-toggle="modal" data-target="#getCredit">Get Credits </a>
						</div>
						<p>or<a href="javascript:void(0);"> Cancel</a></p>
					</div>
				</div>
		<?php }
		if($chatLimitCount == 4  && (!in_array($chatUserId ,$startChatUserArray))){
			$class='d_none';
		?>
			<div class="msg_cont_sec align-c" id="proceed-to-chat-div">
				<div class="msg_cont_sec align-c">
					<div class="user_pics margin-t150 pull-left">
						<a class="align_c"><img src="images/warning_icon.png"></a>
					</div>
					<h3 class="align-c full pull-left margin-t20">Hi <?php echo $userResult['user_name'];?> </h3>
					<div class="margin-t20 pull-left">
						<p>You can only talk to one more new contact today, please use it carefully! We'll remind you once you've hit your limit for today.</p>
					</div>
					<div class="align-c margin-t25 margin-b20 full pull-left">
						<a href="javascript:void(0);" class="btn btn-default custom red" onclick="$('#proceed-to-chat-div').hide();$('#chat-message-div').show();">Proceed to chat </a>
					</div>
					<p>or<a href="javascript:void(0);"> Cancel</a></p>
				</div>
			</div>
		<?php
		}
	}else { ?>
		<div class="msg_cont_sec2 align-c">
			<div class="msg_cont_sec2 align-c">
				<div class="align-c margin-t60 d_block"><a href=""><img src="images/add-photo-icon.png"/></a></div>
				<h3 class="margin-t20 margin-b20">You need to add one photo to chat</h3>
				<div class="margin-b30"><p>It looks like you don't have any photos of yourself on<br /> Startrishta. You'll need one to be able to chat!</p></div>
				<div class="input_custom my_msg popup_add_photo margin-t20">
					<div class="input_custom popup_add_photo margin-t20">	
						<form class="login-form" id="profilPhotoForm" enctype="multipart/form-data" method="post" action="">	
							<input type="hidden" name="submitProfilPhoto">
							<input type="file" name="profile_image" id="uploadProfilPhoto" class="filestyle btn-default slat-blue" data-input="false" data-buttontext="Upload Photo" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
						</form>
							<div class="bootstrap-filestyle input-group">
								<span class="group-span-filestyle " tabindex="0"><label for="uploadProfilPhoto" class="btn btn-default wd_200"><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Upload Photo</span></label></span>
							</div>
					</div>
					<div class="align-c">or </div>
						<div class="popup_add_photo">
							<a class="btn btn-default fb-blue bold" href=""> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
						</div>
				</div>
				<p class="pull-left full margin-t30">You can add up to 500 photos in your &#8216;Photos of you&#8217; album. <br />We accept JPG and PNG file formats. Individual file size<br /> limit must not exceed 10MB.</p>
			</div>
		</div>	
	<?php } ?>
		
		<?php 
		//$class = 'd_none';
		include('chat-window.php');?>
	</div>
		
<?php } 


/****************************************FOR SEND MESSAGE****************************************/
if(isset($_POST['action']) && $_POST['action']=='sendMessage'){
	$chatUserId=$_POST['ChatId'];
	$chat_content=mysql_real_escape_string($_POST['content']);
	
	$chatQuery=mysql_query("Insert into  sr_user_message set msg='".$chat_content."',sent_to='".$chatUserId."',sent_by='".$_SESSION['user_id']."',sent_date='".DATE_TIME."'");
	$msg_id=mysql_insert_id();
	if($chatQuery==true){ 
		$sendMsgQuery=mysql_query("SELECT count(*) as send_count FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to='".$chatUserId."'");
		$sendMsgResult=mysql_fetch_assoc($sendMsgQuery);
		$send_count=$sendMsgResult['send_count'];
		$recMsgQuery=mysql_query("SELECT count(*) as rec_count FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to='".$user_id."'");
		$recMsgResult=mysql_fetch_assoc($recMsgQuery);
		$rec_count=$recMsgResult['rec_count'];
		if($rec_count == 0 && $send_count == 2){
			echo  2;
		}else {
			echo 1;
		}
	} 
}


/****************************************SHOW ALL MESSAGE****************************************/
if(isset($_POST['action']) && $_POST['action']=='showChatHistory'){
	$chatUserId=$_POST['ChatId'];
	$todayDate=date('Y-m-d 00:00:00');
	mysql_query("UPDATE sr_user_message SET is_read=1 , receive_date='".DATE_TIME."' WHERE sent_by ='".$chatUserId."' AND sent_to='".$user_id."' AND is_read=0 ");
	
	$showChatQuery=mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by='".$chatUserId."' AND sent_to = '".$user_id."'  AND is_deletebyto =0) OR (sent_by='".$user_id."' AND sent_to = '".$chatUserId."'  AND is_deletebyfrom =0)) AND m.sent_by=u.user_id AND sent_date BETWEEN '".$todayDate."' AND  '".DATE_TIME."' ORDER BY sent_date");
	while($showChatResult=mysql_fetch_array($showChatQuery)){
	?>
		<div class="box">
			<div class="hding full pull-left">
				<a href="javascript:void(0);" class="pull-left"><span><?php echo $showChatResult['user_name']; ?></span>
				<?php 
					if($showChatResult['user_id'] == $user_id){
						echo "<span>(you)</span>";
					}
					echo "<i>".time2str(strtotime($showChatResult['sent_date']))."</i></a>";
					if($showChatResult['user_id'] == $user_id){
						if($showChatResult['is_read'] == 1){
							echo "<a class='pull-right'><i class='fa fa-check'></i>Message read</a>";
						} else {
							echo "<a class='pull-right'> <i class='fa fa-hourglass-end'></i> Message not read</a>";
						} 
					}
				?>
			</div>
			<div class="content gray">
				<p><?php echo $showChatResult['msg']; ?></p>
			</div>
		</div>
<?php } 
}

/********************************DELETE ONE CONVERSATION*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='deleteConversation'){

	$deleteUserId = $_POST['deleteUserId'];
	
	$Query1=mysql_query("UPDATE sr_user_message SET is_deletebyfrom=1 WHERE sent_by='".$user_id."' AND sent_to='".$deleteUserId."'");
	$Query2=mysql_query("UPDATE sr_user_message SET is_deletebyto=1 WHERE sent_to='".$user_id."' AND sent_by='".$deleteUserId."'");
		
	if($Query1 && $Query2){
		echo 1;
	}else {
		echo 0;
	}
}
/********************************DELETE ALL CONVERSATION*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='deleteAllConversation'){

	$userIds = $_POST['userIds'];
	foreach($userIds as $userId){
		$Query1=mysql_query("UPDATE sr_user_message SET is_deletebyfrom=1 WHERE sent_by='".$user_id."' AND sent_to='".$userId."'");
		$Query2=mysql_query("UPDATE sr_user_message SET is_deletebyto=1 WHERE sent_to='".$user_id."' AND sent_by='".$userId."'");
	}
		
	if($Query1 && $Query2){
		echo 1;
	}else {
		echo 0;
	}
}
/*******************************VIP MEMBERSHIP*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='goVipMenber'){

	$Query=mysql_query("INSERT INTO  sr_vip_user SET  user_id='".$user_id."', start_date='".DATE_TIME."' , end_date='".MONTH3."'");
		
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}

/********************************FAVOURITE*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='addtofavourite'){
	$fav_user_id=$_POST['fav_user_id'];
	
	$favQuery=mysql_query("SELECT favourite_id from sr_user_favourites where user_id='".$fav_user_id."' AND favourite_by='".$user_id."'");
	if(mysql_num_rows($favQuery) == 0){
		$Query=mysql_query("INSERT INTO sr_user_favourites SET user_id='".$fav_user_id."',favourite_by='".$user_id."',status =1,favourite_on = '".DATE_TIME."' ");
		$query2 = mysql_query("INSERT INTO sr_user_reputation SET reputation=10 , user_id='".$fav_user_id."' , reputation_type=9 , datetime ='".DATE_TIME."' , status='1'");
		if($Query){
			echo 1;
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
}

/********************************BLOCK*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='addtoblock'){
	$block_user_id=$_POST['block_user_id'];
	
	$blockQuery=mysql_query("SELECT block_id from sr_user_block where user_id='".$block_user_id."' AND block_by='".$user_id."'");
	if(mysql_num_rows($blockQuery) == 0){
		$Query=mysql_query("INSERT INTO sr_user_block SET user_id='".$block_user_id."',block_by='".$user_id."',status =1,block_on= '".DATE_TIME."' ");
		if($Query){
			echo 1;
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
}

/********************************GIFT*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='giveGiftToUser'){
	$gift_user_id=$_POST['gift_user_id'];
	$gift_id=$_POST['gift_id'];
	$gift_msg=mysql_real_escape_string($_POST['gift_msg']);
	if(isset($_POST['remember_me'])){
		$private=1;
	}else {
		$private=0;
	}
	$Query=mysql_query("INSERT INTO sr_user_gift SET gift_id='".$gift_id."',message='".$gift_msg."',private='".$private."',user_id='".$gift_user_id."',status =0 ,gifted_by='".$user_id."',gifted_on= '".DATE_TIME."'");
	
	//STICKERS Most Generous
	$sickerQuery =mysql_query("SELECT user_sticker_id FROM sr_user_sticker WHERE sticker_id = 6 AND user_id = '".$user_id."'");
	if(mysql_num_rows($sickerQuery) == 0) {
		$giftQuery=mysql_query("SELECT user_gift_id FROM sr_user_gift WHERE gifted_by = '".$user_id."' AND gifted_on > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
		$giftCount=mysql_num_rows($giftQuery);
		if($giftCount >= 2){
			mysql_query("INSERT INTO `sr_user_sticker` SET sticker_id = 6 , user_id = '".$user_id."' , awarded_on ='".DATE_TIME."'");
		}
	}
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}

 ?>
