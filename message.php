<?php
require('../classes/user_class.php');
/*error_reporting(E_ALL);
ini_set('display_errors', 1);*/
$userProfileObj=new User();
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
}else{
	$user_id='';
}

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
			return SITEURL."upload/profile_images/dummy-profile.png";
		}else if(file_exists(SITEURL."upload/photo/".$profile_image)){
			return SITEURL."upload/photo/$profile_image";
		}else {
			return SITEURL."upload/photo/$profile_image";
		}
	}
function getMessageImage($image){
	return "upload/msg_upload/$image";
	/*if($image != '' && file_exists("upload/msg_upload/".$image)){
			return "upload/msg_upload/$image";
		}else {
			return 0;
		}
	*/
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


########### Refresh Message Count ############
if( isset($_POST['action']) && $_POST['action']=='refreshMsgCount' )
{
	if( $user_id != '' )
	{
		$unreadMsgQuery = mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_to = '".$user_id."' AND is_read = 0");
		echo ($unreadMsgQuery)? mysql_num_rows($unreadMsgQuery) : 0;
	}
}


########### REFRESH ONLINE USERS #########
if( isset($_POST['action']) && $_POST['action']=='refreshOnlineUsers' )
{
	$totalUnreadMsgCount = 0;
	$msgType = $_POST['msgType'];
	$searchWord = $_POST['searchWord'];
	$chatUser_id = $_POST['chatUser_id'];
	$chatUserIds = (empty($_POST['chatUserIds']))?array():$_POST['chatUserIds'];
	
	switch($msgType)
	{
	case 'inbox':
		echo "SELECT added_uid as chat_uid FROM sr_inbox_user WHERE user_id = '".$user_id."'
		UNION SELECT DISTINCT sent_by as chat_uid FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to = '".$user_id."' AND m.sent_by = u.user_id AND u.user_name LIKE '%".$searchWord."%'";
		$Query = mysql_query("SELECT added_uid as chat_uid FROM sr_inbox_user WHERE user_id = '".$user_id."' 
		UNION SELECT DISTINCT sent_by as chat_uid FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to = '".$user_id."' AND m.sent_by = u.user_id AND u.user_name LIKE '%".$searchWord."%' and m.is_deletebyto=0");
	break;
	case 'unread':
		//$Query=mysql_query("SELECT DISTINCT sent_by as chat_uid FROM `sr_user_message` WHERE sent_to='".$user_id."' AND is_read=0");
		$Query = mysql_query("SELECT DISTINCT sent_by as chat_uid FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to = '".$user_id."' AND m.sent_by = u.user_id AND is_read = 0 AND u.user_name LIKE '%".$searchWord."%'");
	break;
	case 'conversation':
		//$Query=mysql_query("SELECT DISTINCT sent_to as chat_uid FROM `sr_user_message` WHERE sent_by='".$user_id."'");
		$Query = mysql_query("SELECT DISTINCT sent_to as chat_uid FROM `sr_user_message` m,`sr_users` u WHERE m.sent_by = '".$user_id."' AND m.sent_to = u.user_id AND u.user_name LIKE '%".$searchWord."%'");
	break;
	case 'online':
		$Query = mysql_query("SELECT DISTINCT user_id as chat_uid FROM `sr_users` WHERE user_id != '".$user_id."' AND is_online = 1 and show_online = 1 AND user_name LIKE '%".$searchWord."%'");
	break;
	}
		
	$html ='';
	
	while( $result = mysql_fetch_assoc($Query) )
	{
		$userInfoQuery = mysql_query("SELECT user_id, user_name, is_online, profile_image, created_on, show_online FROM sr_users WHERE user_id='".$result['chat_uid']."'");
		$userInfoResult = mysql_fetch_assoc($userInfoQuery);
		
		$unreadMsgQuery = mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_by='".$result['chat_uid']."' AND sent_to ='".$user_id."' AND is_read=0");
		$unreadMsgCount = mysql_num_rows($unreadMsgQuery);
		
		$onlineUserId = $userInfoResult['user_id'];
		$expUserName = explode(' ',$userInfoResult['user_name']);
		$onlineUserName = ( count($expUserName)>0 )?$expUserName[0]:$userInfoResult['user_name'];
		//$onlineUserName = $userInfoResult['user_name'];
		$isUserLike = $userProfileObj->isUserLike($onlineUserId , $user_id);
		$isUserLike1 = $userProfileObj->isUserLike($user_id , $onlineUserId);
		$onlineUserImage = getProfileImage($userInfoResult['profile_image']);
		
		$onlineUser = ( $userInfoResult['is_online'] == 1 && $userInfoResult['show_online'] == 1 )?'<span><img src="images/online.png"></span>':'';
		
		if($isUserLike==1){
			$likeIcon = '<span><i class="fa fa-heart"></i></span>';
		}else {
			$likeIcon = '';
		}
		
		if( $isUserLike==1 && $isUserLike1 == 1 )
		{
			$matchIcon = '<span><img src="images/match-icon-small.png"></span>';
		}else {
			$matchIcon = '';
		}
		
		if( $unreadMsgCount )
		{
			$unreadMsg = "<span class='badge my-msg' id='unread-msg-count-".$onlineUserId."'>".$unreadMsgCount."</span>";
		}else {
			$unreadMsg ='';
		}
		
		$onlineClass ='';
		$onlineCheckClass ='';
		
		if($chatUser_id == $onlineUserId){
			$onlineClass='active';
		}
		
		if(in_array($onlineUserId , $chatUserIds)){
			$onlineCheckClass='checked';
		}
		
		$html .= "<div class='list-group-item login-form left onlineUserDiv $onlineClass' id='onlineUserDiv-$onlineUserId'><div class='pic'><a href='javascript:void(0);' id='chatOnlineUserList-$onlineUserId'><img src='$onlineUserImage'></a>$matchIcon</div><div class='name chatOnlineUserList'><a href='javascript:void(0);'>$onlineUser$onlineUserName</a>$unreadMsg</div><div class='check_box msg_pro_chk'><div class='pull-left'><input id='checkbox$onlineUserId' type='checkbox' name='chatUserCheckbox' class='chatUserCheckbox' value='$onlineUserId' $onlineCheckClass/><label for='checkbox$onlineUserId'><span class='pull-left'></span></label></div></div></div>";
	}
	
	$notifyMsgQuery = mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_to = '".$user_id."' AND notify_status = 0");
	$notifyMsgCount = mysql_num_rows($notifyMsgQuery);
	$outputResult[0] = $html;
	$outputResult[1] = $notifyMsgCount;
	echo json_encode($outputResult);
	mysql_query("UPDATE sr_user_message SET notify_status=1 WHERE sent_to ='".$user_id."' AND notify_status=0");
}


############# Change Chat Listing ############
if( isset($_POST['action']) && $_POST['action']=='msgNavClicked' )
{
	
	$msgType = $_POST['msgType'];
	
	switch( strtolower($msgType) ):
	case 'inbox': ##Inbox
		$Query = mysql_query("SELECT added_uid as chat_uid 
		FROM sr_inbox_user 
		WHERE user_id='".$user_id."' 
		UNION 
		SELECT DISTINCT sent_by as chat_uid 
		FROM `sr_user_message` 
		WHERE sent_to='".$user_id."' and is_deletebyto=0");
	break;
	case 'unread': ##Unread
		$Query = mysql_query("SELECT DISTINCT sent_by as chat_uid 
		FROM `sr_user_message` 
		WHERE sent_to='".$user_id."' AND is_read=0");
	break;
	case 'conversation': ##Conversation
		$Query = mysql_query("SELECT DISTINCT sent_to as chat_uid 
		FROM `sr_user_message` 
		WHERE sent_by='".$user_id."'");
	break;
	case 'online': ##Online
		$Query = mysql_query("SELECT DISTINCT user_id as chat_uid 
		FROM `sr_users` 
		WHERE user_id != '".$user_id."' AND is_online=1 and show_online = 1 ");
	break;
	endswitch;
		
	$html ='';
	
	while( $result = mysql_fetch_assoc($Query) )
	{
		$userInfoQuery = mysql_query("SELECT user_id, user_name, is_online, profile_image, created_on, show_online 
		FROM sr_users 
		WHERE user_id='".$result['chat_uid']."'");
		$userInfoResult = mysql_fetch_assoc($userInfoQuery);
	
		$unreadMsgQuery = mysql_query("SELECT msg_id 
		FROM sr_user_message 
		WHERE sent_by = '".$result['chat_uid']."' AND sent_to = '".$user_id."' AND is_read = 0");
		$unreadMsgCount = mysql_num_rows($unreadMsgQuery);
		
		$isUserLike = $userProfileObj->isUserLike($result['chat_uid'] , $user_id);
		$isUserLike1 = $userProfileObj->isUserLike($user_id , $result['chat_uid']);
		?>
		
		<li id="onlineUserDiv-<?php echo $userInfoResult['user_id'];?>" >
			<a href="javascript:void(0);" id="chatOnlineUserList-<?php echo $userInfoResult['user_id'];?>">
				<span class="list-img"><img src="<?php echo getProfileImage($userInfoResult['profile_image']);?>" /></span>
				<?php 
				if( $unreadMsgCount )
				{
					echo "<span class='badge my-msg' id='unread-msg-count-".$userInfoResult['user_id']."'>".$unreadMsgCount."</span>";
				}
				
				if( $userInfoResult['is_online'] == 1 && $userInfoResult['show_online'] == 1 )
				{
					echo '<i class="fa fa-circle text-success"></i>';
				}
				
				if( $isUserLike==1 && $isUserLike1 == 1 )
				{
					echo '<span><img src="images/match-icon-small.png"></span>';
				}
				
				$expUserName = explode(' ',$userInfoResult['user_name']);
				$expUserNameShow = ( count($expUserName)>0 )?$expUserName[0]:$userInfoResult['user_name'];
				?>
				<strong class="user-name"  ><?php echo $expUserNameShow; ?></strong>
				<div class="pull-right check-box">
					<input type="checkbox" id="checkbox<?php echo $userInfoResult['user_id'];?>" name="chatUserCheckbox" value="<?php echo $userInfoResult['user_id'];?>" />
					<label for="checkbox<?php echo $userInfoResult['user_id'];?>"><span class="pull-left"></span></label>
				</div>
			</a>
		</li>
		<?php 
	}
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
	//echo "SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6";
		$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6");

	?>
	<div class="clearfix">
		<ul>
		<?php
			while($chatUserResult=mysql_fetch_assoc($chatUserQuery)){?>
			<li>
				<a href="javascript:void(0);" class="chatUserPic"  id="chatUserPic-<?php echo $chatUserResult['user_id'];?>">
				 <img src="<?php echo getProfileImage($chatUserResult['profile_image']);?>" title="<?php echo $chatUserResult['user_name'];?>"/>
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


########## NOT INTERESTED ##############
if( isset($_POST['action']) && $_POST['action']=='notInterested' )
{
	$sentby_uid=$_POST['sentby'];
	$userResult = $userProfileObj->getUserInfo($user_id);
	$addChatQuery='';
	
	if( $userResult['here_to'] !='' )
	{
		$addChatQuery .= " AND here_to='".$userResult['here_to']."'";
	}
	
	if( $userResult['here_with_guy'] == 1 && $userResult['here_with_girl'] == 1 )
	{
		$addChatQuery .= " AND (gender=1 OR gender=2)";
	}
	else if( $userResult['here_with_guy'] == 1 )
	{
		$addChatQuery .= " AND gender=1";
	}
	else if( $userResult['here_with_girl'] == 1 )
	{
		$addChatQuery .= " AND gender=2";
	}
	
	if( $userResult['here_age_min'] != 0  && $userResult['here_age_max'] != 0 )
	{
		$addChatQuery .= " AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$userResult['here_age_min']." AND ".$userResult['here_age_max']."";
	}
	$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." order By RAND() limit 0,6");
	//echo "update sr_user_message set is_deletebyto=1 where sent_to=$user_id and sent_by=$sentby_uid";
	$deleteOneMessageQuery=mysql_query("update sr_user_message set is_deletebyto=1 where sent_to=$user_id and sent_by=$sentby_uid") or die(mysql_error());
	?>
	<div class="chat-sec-panel-2">
		<div class="msg_cont_sec align-c">
			<h3>Start talking with new people close by!</h3>
			<?php
			$chatUserQuery = mysql_query("SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery."  AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6 ");
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
								 <img src="<?php echo $userProfileObj->getProfileImage($chatUserResult['profile_image']);?>" title="<?php echo $chatUserResult['user_name'];?>"/>
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
				<div class="align-c margin-r60 margin-t5 margin-l10">
					<a href="javascript:void(0);" class="btn btn-default custom sky-blue go-credit-ready-to-chat">I'm ready to chat </a>
				</div>
			</div>
		</div>
	</div>			
	<?php 
}

############# Search Users ############
if( isset($_POST['action']) && $_POST['action'] == 'searchOnlineUserList' )
{	
	$searchWord = $_POST['searchWord'];
	$msgType = strtolower($_POST['msgType']);
	
	switch( $msgType ):
	case 'inbox':
		$Query = mysql_query("SELECT DISTINCT u.user_id, u.user_name, u.is_online, u.show_online, u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to = '".$user_id."' AND m.sent_by = u.user_id AND u.user_name LIKE '%".$searchWord."%'");
	break;
	case 'unread':
		$Query = mysql_query("SELECT DISTINCT u.user_id, u.user_name, u.is_online, u.show_online, u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_to = '".$user_id."' AND m.sent_by = u.user_id AND is_read = 0 AND u.user_name LIKE '%".$searchWord."%'");
	break;
	case 'conversation':
		$Query = mysql_query("SELECT DISTINCT u.user_id, u.user_name, u.is_online, u.show_online, u.profile_image FROM `sr_user_message` m,`sr_users` u WHERE m.sent_by = '".$user_id."' AND m.sent_to = u.user_id AND u.user_name LIKE '%".$searchWord."%'");
	break;
	case 'online':
		$Query = mysql_query("SELECT DISTINCT user_id, user_name, is_online, show_online, profile_image FROM `sr_users` WHERE user_id != '".$user_id."' AND is_online = 1 AND user_name LIKE '%".$searchWord."%'");
	break;
	endswitch;	
	
	while( $result = mysql_fetch_assoc($Query) )
	{
		$unreadMsgQuery = mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_by='".$result['user_id']."' AND sent_to  = '".$user_id."' AND is_read = 0");
		$unreadMsgCount = mysql_num_rows($unreadMsgQuery);
		
		$isUserLike = $userProfileObj->isUserLike($result['user_id'] , $user_id);
		$isUserLike1 = $userProfileObj->isUserLike($user_id , $result['user_id']);
		?>
		
		<li id="onlineUserDiv-<?php echo $result['user_id'];?>" >
			<a href="javascript:void(0);" id="chatOnlineUserList-<?php echo $result['user_id'];?>">
				<span class="list-img"><img src="<?php echo getProfileImage($result['profile_image']);?>" /></span>
				<?php 
				if( $unreadMsgCount )
				{
					echo "<span class='badge my-msg' id='unread-msg-count-".$result['user_id']."'>".$unreadMsgCount."</span>";
				}
				
				if( $result['is_online'] == 1 && $result['show_online'] == 1 )
				{
					echo '<i class="fa fa-circle text-success"></i>';
				}
				
				if( $isUserLike==1 && $isUserLike1 == 1 )
				{
					echo '<span><img src="images/match-icon-small.png"></span>';
				}
				
				$expUserName = explode(' ',$result['user_name']);
				$expUserNameShow = ( count($expUserName)>0 )?$expUserName[0]:$result['user_name'];
				?>
				<strong class="user-name"  ><?php echo $expUserNameShow; ?></strong>
				<div class="pull-right check-box">
					<input type="checkbox" id="checkbox<?php echo $result['user_id'];?>" name="chatUserCheckbox" value="<?php echo $result['user_id'];?>" />
					<label for="checkbox<?php echo $result['user_id'];?>"><span class="pull-left"></span></label>
				</div>
			</a>
		</li>
		<?php 
	}
}

if(isset($_POST['action']) && $_POST['action']=='showUserChatProfile'){
	
	$chatUserId=$_POST['userProfileId'];
	$userMatchQuery=mysql_query("SELECT user_id,user_name,dob, gender from sr_users WHERE user_id='".$chatUserId."'");
	$userMatchPhotoQuery=mysql_query("SELECT * from sr_user_photo WHERE user_id='".$chatUserId."' LIMIT 0,3");
	
	$userMatchInterestQuery=$userProfileObj->getUserInterest($chatUserId);	
	$chatUserInterestCount =mysql_num_rows($userMatchInterestQuery);
	
	$isUserLike = $userProfileObj->isUserLike($chatUserId , $user_id);
	$isUserLike1 = $userProfileObj->isUserLike($user_id , $chatUserId);
	$isKcUserLike = $userProfileObj->isKcUserLike($user_id , $chatUserId);

	$userMatchResult=mysql_fetch_assoc($userMatchQuery);
	$chatUserName=$userMatchResult['user_name'];
	$chatUserAge=date('Y') - date('Y' , strtotime($userMatchResult['dob']));
	
	$unreadMsgQuery=mysql_query("SELECT is_read , msg FROM sr_user_message WHERE sent_to='".$user_id."' AND sent_by='".$chatUserId."'");
	$unreadMsgResult=mysql_fetch_assoc($unreadMsgQuery);
	if($userMatchResult['gender'] == 2) $userPer='she'; else $userPer='he';
	?>
	
	<div class="row">
		<div class="msg_cont_sec align-c" id="user_match">
			<?php 
				if(mysql_num_rows($userMatchQuery)> 0){
			?>
			<div class="msg_cont_sec align-c">
			<?php if($isUserLike1 == 1 && $isUserLike == 1){?>
				<h3 class="margin-t80 margin-b70">Congratulations, you've both matched!</h3>
			<?php }else if($isUserLike1 == 1){?>
				<h3 class="margin-t80 margin-b70">Congratulations, you've matched!</h3>
				<div class="margin-b50"><p><strong><?php echo $chatUserName;?></strong>, liked you<?php if($isKcUserLike == 1) { echo "in  Kismat Connection"; } ?><?php if($unreadMsgResult['msg'] != ''){ echo " and ".$userPer." sent you a message";}?>!</p></div>
			<?php } ?>
			
				<!---->
				<!--<div class="margin-b70"><p><strong>Marcus</strong> liked you in Kismat Connection and he sent you a message!</p></div>-->
				<div class="user_pics pull-left">
				<?php if(mysql_num_rows($unreadMsgQuery)) {?>
					<div class="chat_msg">
						<a href="javascripe:void(0);"><?php echo htmlspecialchars_decode($unreadMsgResult['msg']);?></a>
						<i class="fa fa-play"></i>
					</div>	
				<?php } ?> 
					<ul class="clearfix">
						<?php 
						while($userMatchPhotoResult=mysql_fetch_assoc($userMatchPhotoQuery))
						{?>
							<li>
								<a><img src="upload/photo/<?php echo $userMatchPhotoResult['photo'] ;?>"></a>
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
					<p class="margin-t20">You have <?php echo $chatUserCommonInterest;?> interests in common!</p>
				<?php } ?>
		<!--		<div class="interests chat-interests-wap margin-t20">
					<ul><?php/* echo $userProfileObj->getCommonInterest($user_id , $chatUserId)*/;?></ul>
				</div-->>
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

############ User Chat Options ############
if( isset($_POST['action']) && $_POST['action']=='startConversation' )
{
	$chatUserId = $_POST['userConverId'];
		
	#update unread message
	mysql_query("UPDATE sr_user_message SET is_read=1 , receive_date='".DATE_TIME."' WHERE sent_by ='".$chatUserId."' AND sent_to='".$user_id."' ");
		
	$isUserVip = $userProfileObj->isVipMember($user_id);
		
	## User Info
	$userMatchQuery = mysql_query("SELECT user_id, user_name, dob, profile_image, gender, location, here_to, created_on 
	from sr_users WHERE user_id='".$chatUserId."'");
	$userMatchResult = mysql_fetch_assoc($userMatchQuery);
	
	$chatUserName = $userMatchResult['user_name'];
	$chatUserjoined = $userMatchResult['created_on'];
	$chatUserLocation = $userMatchResult['location'];
	$chatUserAge=date('Y') - date('Y' , strtotime($userMatchResult['dob']));
	
	$chatUserImage = getProfileImage($userMatchResult['profile_image']);
	$chatUserHereTo = $userProfileObj->getHereToName($userMatchResult['here_to']);
	
	if( $userMatchResult['gender'] == 2 )
	{
		$userPer='her';
		$userNou='she';
	}else
	{
		$userPer ='him';
		$userNou ='he';
	}
	
	$diffJoin = time() - strtotime($chatUserjoined);
	$day_diffJoin = floor($diffJoin / 86400);
	$isChatUserFavorite = $userProfileObj->isUserFavorite($chatUserId , $user_id);
	$isChatUserVip = $userProfileObj->isVipMember($chatUserId);
	$isChatUserVerified = $userProfileObj->isUserVerified($chatUserId);
	$isChatUserBlocked = $userProfileObj->isBlockUser($chatUserId , $user_id);
	$isChatUserBlockedMe = $userProfileObj->isMeBlocked($chatUserId,$user_id);
	$isChatUserRandom = $userProfileObj->isRandomUser($chatUserId , $user_id);
	
	/*******************CHAT USER PHOTO****************************/
	$userPhotoQuery = $userProfileObj->getUserPhoto($userMatchResult['user_id']);
	$photoCount = mysql_num_rows($userPhotoQuery);
	
	/****************REPUTATION*************************************/
	$chatUserReputation = $userProfileObj->getUserReputation($chatUserId);
	if($chatUserReputation <= 40 ) $chatUserReputn='Low';
	if($chatUserReputation > 40 && $chatUserReputation <= 60) $chatUserReputn='Heating Up';
	if($chatUserReputation > 60 && $chatUserReputation <= 80) $chatUserReputn='Hot';
	if($chatUserReputation > 80) $chatUserReputn='Very Hot';
	
	/*************INTEREST******************************************/
	$commanInterestCount = $userProfileObj->getUserCommonInterest($user_id , $chatUserId);
	$chatUserInterestQuery = $userProfileObj->getUserInterest($chatUserId);
	$chatUserInterestArray = array();
	while( $chatUserInterestResult = mysql_fetch_assoc($chatUserInterestQuery) )
	{
		$chatUserInterestArray[] = $chatUserInterestResult;
	}
	$chatUserInterestCount = mysql_num_rows($chatUserInterestQuery);
	$getCommonInterestHtml = $userProfileObj->getMsgCommonInterest($user_id , $chatUserId);
	
	/*******************chat limit********************************/
	$startChatUserArray = array();
	$chatLimitQuery = mysql_query("SELECT sent_to FROM `sr_user_message` WHERE date(sent_date) BETWEEN date('".DATE_TIME."') AND date('".DATE_TIME."')+ INTERVAL 1 DAY AND sent_by='".$user_id."' group by sent_to");
	while( $chatLimitResult = mysql_fetch_assoc($chatLimitQuery) )
	{
		$startChatUserArray[]=$chatLimitResult['sent_to'];
	}
	$chatLimitCount=mysql_num_rows($chatLimitQuery);
		
	/*********************SEARCH CRITERIA*************************/
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
	$query2=mysql_query('SET NAMES utf8mb4');
	/*****************CONVERSATIONS*********************************/
	$todayDate=date('Y-m-d 00:00:00');
	$showChatQuery=mysql_query("SELECT u.user_id , u.user_name, u.profile_image, m.* from sr_user_message m , sr_users u where ((sent_by='".$chatUserId."' AND sent_to = '".$user_id."'  AND is_deletebyto =0) OR (sent_by='".$user_id."' AND sent_to = '".$chatUserId."'  AND is_deletebyfrom =0)) AND m.sent_by=u.user_id  AND sent_date <= '".$todayDate."' ORDER BY sent_date");
		
	$showtodayChatQuery=mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by='".$chatUserId."' AND sent_to = '".$user_id."' AND is_deletebyto = 0) OR (sent_by='".$user_id."' AND sent_to = '".$chatUserId."' AND is_deletebyfrom =0)) AND m.sent_by=u.user_id  AND sent_date > '".$todayDate."' ORDER BY sent_date");
	
	$totalChat=mysql_num_rows($showChatQuery) + mysql_num_rows($showtodayChatQuery);
	
	$newMsgCountQuery=mysql_query("SELECT * FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to = '".$user_id."'  and is_deletebyto=0");
	//echo "SELECT * FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to = '".$chatUserId."' and is_deletebyto=0";
	$newMsgRecQuery=mysql_query("SELECT * FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to = '".$chatUserId."'");
		if($isChatUserBlockedMe)
		{
			/*****************888SEND AND RECEIVE MESSAGE COUNT FOR BLOCK ME********************************/
			$blockmearray=$userProfileObj->getBlockMeDetail($chatUserId,$user_id);
			//print_r($blockmearray);
			$blockmedate=$blockmearray['block_on'];
			//echo "SELECT count(*) as send_count FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to='".$chatUserId."' AND sent_date>='".$blockmedate."'";
			$sendMsgQueryBlocked = mysql_query("SELECT count(*) as send_count FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to='".$chatUserId."' AND sent_date>='".$blockmedate."'");
			$sendMsgResultBlocked = mysql_fetch_assoc($sendMsgQueryBlocked);
		//	print_r($sendMsgResultBlocked);
			$send_countBlocked = $sendMsgResultBlocked['send_count'];

			$recMsgQueryBlocked = mysql_query("SELECT count(*) as rec_count FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to='".$user_id."' AND sent_date>='".$blockmedate."'");
			$recMsgResultBlocked = mysql_fetch_assoc($recMsgQueryBlocked);
			$rec_countBlocked=$recMsgResultBlocked['rec_count'];
			//print_r($recMsgResultBlocked);
			$ComBoxClassBlock2='';
			$ComBoxClass1 = '';

		}
	/*****************888SEND AND RECEIVE MESSAGE COUNT********************************/
	$sendMsgQuery = mysql_query("SELECT count(*) as send_count FROM sr_user_message WHERE sent_by='".$user_id."' AND sent_to='".$chatUserId."'");
	$sendMsgResult = mysql_fetch_assoc($sendMsgQuery);
	$send_count = $sendMsgResult['send_count'];

	$recMsgQuery = mysql_query("SELECT count(*) as rec_count FROM sr_user_message WHERE sent_by='".$chatUserId."' AND sent_to='".$user_id."'");
	$recMsgResult = mysql_fetch_assoc($recMsgQuery);
	$rec_count=$recMsgResult['rec_count'];
	$ComBoxClass1 = '';
	$ComBoxClass2 = '';
	if($rec_count == 0 && $send_count == 2){
		$ComBoxClass1='d_none';
	}else{
		$ComBoxClass2='d_none';
	}
	//echo "SELECT * FROM sr_users WHERE user_id !='".$user_id."' ".$addChatQuery." AND user_id NOT IN(select sent_to FROM sr_user_message WHERE sent_by='".$user_id."') order By RAND() limit 0,6";
	//echo mysql_num_rows($chatUserQuery)."<br />".$isChatUserVip ."<br />". $send_count ."<br />". $rec_count;
	// mysql_num_rows($chatUserQuery);
	?>
	<input type="hidden" name="chatUserId" id="chatUserId" value="<?php echo $chatUserId; ?>" >
	<input type="hidden" id="replay_msg" value="0" >

	<?php /*#Chat Header */?>
	<div class="chat-name-panel">
		<div class="pull-left user-big-img"><a href="#"><img src="<?php echo $chatUserImage;?>" /></a></div>
		<div class="pull-left chat-head-content">
			<div class="pull-left chat-wap-title">
				<a href="profile.php?uid=<?php echo $userMatchResult['user_id'];?>" ><?php echo $chatUserName; ?>, <?php echo $chatUserAge; ?></a></div>
			<div class="pull-left chat-wap-title">
			<?php
			if( $isChatUserVerified )
			{ 
				?><span class="active_icon"><img src="images/active2.png"></span><?php
		}
			?>
			<span class="image_count"><i class="fa fa-camera"></i> <span><?php echo $photoCount;?></span></span>
			</div>
			<div class="pull-right">
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action <span class="caret"></span></button>
					<?php
				if( $isChatUserBlocked )
					{
						?>
						<ul class="dropdown-menu pull-right right-list-m" >
							<li><a href="javascript:void(0);" class="unblockUserMsg" id="unblockUserMsg-<?php /*echo $chatUserId.'-'.$chatUserName;*/?>"><span class="blk"></span>Unblock</a></li>
							<li><a href="javascript:void(0);" class="reportUser" id="reportUser-<?php /*echo $chatUserId;*/?>"><span class="report"></span>Report Abuse</a></li>
							<li><a href="javascript:void(0)" id="delete_oneconv" data-id="<?php /*echo $chatUserId;*/?>"><span class="dlt"></span>Delete Conversation</a></li>
						</ul>
						<?php
				}
					else
					{
						?>
						<ul class="dropdown-menu pull-right right-list-m" >
							<li>
							<?php
							if( $isChatUserFavorite == 0 )
							{
								?><a href="javascript:void(0);" class="msg_add_favourite" id="add_favourite-<?php echo $chatUserId.'-'.$chatUserName;?>"><span class="mf"></span> Add to Favourites</a><?php
						}
							else if( $isChatUserFavorite == 1 )
							{
								?><a href="javascript:void(0);"><span class="mf"></span> Added to Favourites</a><?php
						}
							?>
							</li>
							<li>
								<a href="javascript:void(0);" class="giveGiftToUser" id="giveGiftToUser-<?php echo $chatUserId; ?>"><span class="gift"></span>Give Gift</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="add_block" id="add_block-<?php echo $chatUserId.'-'.$chatUserName;?>">
									<span class="blk"></span>Block</a>
							</li>
							<li>
								<a href="javascript:void(0);" class="reportUser" id="reportUser-<?php echo $chatUserId;?>"><span class="report"></span>Report Abuse</a>
							</li>
							<li><a href="javascript:void(0)" id="delete_oneconv" data-id="<?php echo $chatUserId;?>"><span class="dlt"></span>Delete</a></li>
						</ul>
						<?php
			}
					?>
				</div>
			</div>
			<div class="pull-right chat-wap-title" style="margin-right: 10px;margin-top: -2px;">
			<?php echo $userProfileObj->getStatusIconHtml($userMatchResult['user_id'] , $userMatchResult['gender'] , $chatUserReputn , $isChatUserFavorite , $isChatUserVip);?>
			</div>
			
			<div class="clearfix"></div>
			
			<div class="chat-interests">
				<ul>
					<?php echo $getCommonInterestHtml; ?>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>	
	</div>
	<?php /*#Chat Header End */?>
		
	<?php 
	$class = '';
	$showChatBox = '';
	$showChatHistory = '';
	$isProfileImage = $userProfileObj->isUserImage($user_id);
	
	#If user has profile image
	if( $isProfileImage )
	{
		#If user is random
		if( $isChatUserRandom && $rec_count == 0 && $send_count == 0 && !isset($_POST['clicked']) )
		{
			echo "<script>alert('1');</script>";
			$class ='d_none';
			?>
			<div class="chat-sec-panel-3" id="scroll-bot" >
				<div class="msg_cont_sec2 align-c">
					<h3 class="margin-t80 margin-b20"><?php echo $chatUserName;?> is waiting to talk!</h3>
					<div class="margin-b30"><p><?php echo $userNou;?>  is looking to <strong><?php echo $chatUserHereTo;?>.</strong></p></div>
					<?php 
					if( $chatUserInterestCount == 0 )
					{ 
						?><p class="margin-t20">Currently <?php echo strtolower($userNou);?> has no interest(s), why don’t you recommend some?</p><?php 
					} 
					
					if( $commanInterestCount )
					{ 
						?><p>You Share <strong><?php echo $commanInterestCount;?> Interest(s)</strong> with <?php echo $userPer;?>:</p><?php 
					} 
					?>
					<div class="interests margin-t20">
						<ul>
							<?php echo $getCommonInterestHtml; ?>
						</ul>
					</div>
					<div class="align-c margin-t25 margin-b20 full pull-left">
						<a href="javascript:void(0);" class="btn btn-default custom red" id="start_conversation" data-id="<?php echo $chatUserId;?>"> Start a conversation now! </a>
					</div>
					<p class="pull-left full">or really get <?php echo $userPer; ?> attention by<a href="javascript:void(0);" id="giveGiftToUserm2-<?php echo $chatUserId;?>" class="giveGiftToUser"> giving a gift!</a></p>
					<p class="pull-left full margin-t5"><a href="javascript:void(0)" id="not_interested" style="border-bottom:1px dotted #000;">Not Interested</a></p>
				</div>
			</div>
			<?php 
		}


		## If user is VIP member
		if( $isUserVip )
		{
		//	echo "<script>alert('2');</script>";
			# NOT MEET TO SEARCH CRITERIA
			
			if( mysql_num_rows($chatUserQuery) == 0 && $send_count == 0 && $rec_count == 0 )
			{
				$showChatBox = ' style="display: block !important;"';
				$showChatHistory = ' style="display: none !important;"';
				?>
				<div class="chat-sec-panel-3" id="scroll-bot" >
					<div class="msg_cont_sec2 align-c" id="vip_unmatched" style="min-height: 331px;">
						<h3 class="margin-b20">Get Chatting Now!</h3>
						<div class="margin-b30"><p><strong><?php echo $chatUserName;?></strong>  is looking to <strong><?php echo $chatUserHereTo;?>.</strong></p></div>
						<!--Message17 if Interest not found--
						<p class="margin-t20">Currently he has no interests, why don’t you recommend some?</p>-->
						<div class="interests chat-interests chat-interests-wap chat-last margin-t20">
							<ul>
								<?php echo $getCommonInterestHtml; ?>
							</ul>
						</div>
						<p class="pull-left full">Start a conversation now or really get <?php echo $userPer; ?> attention by<a href="javascript:void(0);" id="giveGiftToUserm1-<?php echo $chatUserId;?>" class="giveGiftToUser"> giving a gift!</a></p>
					</div>
				</div>
				<?php 
			}
		}
		
		
		# If user is NON VIP member
		else if( $isUserVip == 0 )
		{
			//echo "<script>alert('3');</script>";
			# IF CHAT USER IS NEW
			if( $day_diffJoin == 0 && $rec_count == 0 && $send_count == 0 )
			{ 
				$diffTime = strtotime($chatUserjoined . ' +1 day') - time();
				if($diffTime < 120) $remaingTime = '1 minute';
				else if($diffTime < 3600) $remaingTime = floor($diffTime / 60) . ' minutes ';
				else if($diffTime < 7200) $remaingTime = '1 hour';
				else if($diffTime < 86400) $remaingTime = floor($diffTime / 3600) . ' hours ';
				$class='d_none';
				?>
				
				<div class="chat-sec-panel-3" id="scroll-bot" >
					<div class="msg_cont_sec2 align-c" style="height:440px; margin: 0 6px;">
						<div class="msg_cont_sec2 align-c" style="height:434px;margin: 0 6px;">
							<div class="align-c d_block"><a href=""><img src="images/timer.png"/></a></div>
							<h3 class="margin-t20 margin-b20">
								<?php echo $chatUserName;?> is a new member!</h3>
							<div class="margin-b10"><p>Only VIP users can contact <?php echo $userPer;?> for the next <?php echo $remaingTime;?>.</p></div>
							<div class="margin-b10"><p>Upgrade to a VIP membership and get exlusive access <br />to every new user the moment they join!</p></div>
							
							<div class="align-c margin-t5 margin-b20 full pull-left">
								<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-new-member">Go VIP </a>
							</div>
							<p><a href="add-friends.php">Or try it for free!</a></p>
						</div>
					</div>
				</div>
				<?php 
			} 
			
			# IF USER HAS HOT REPUTATION
			else if( $chatUserReputation > 80 && $rec_count == 0 && $send_count == 0 )
			{
				$class='d_none';
				?>
				<div class="chat-sec-panel-3" id="scroll-bot" style="height:calc(100vh - 216px);">
					<div class="msg_cont_sec2 align-c" style="min-height:420px;">
						<div class="msg_cont_sec2 align-c" style="min-height:420px;">
							<div class="align-c d_block"><a href=""><img src="images/fire.png"/></a></div>
							<h3 class="margin-t10 margin-b20 lh-40"><?php echo $chatUserName;?>&#39;s reputation is very hot today <br />and has <?php echo $userPer;?> inbox full of messages!</h3>
							<div class="margin-b30"><p>Beat the queue and get exclusive access to <?php echo $userPer;?> <br/>
							Inbox right now by getting a VIP upgrade!</p></div>
							<div class="align-c margin-t5 margin-b10 full pull-left">
								<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-hot-member">Go VIP </a>
							</div>
							<p><a href="add-friends.php">Or try it for free!</a></p>
						</div>
					</div>
				</div>
				<?php
			} 
			
			# DONT MEET THEIR SEARCH CRITERIA
			else if( mysql_num_rows($chatUserQuery) == 0 && $rec_count == 0 && $send_count == 0 && $userDiffJoinDay != 0 )
			{
				$class='d_none';
				?>
				<div class="chat-sec-panel-3" id="scroll-bot" style="height:calc(100vh - 216px);">
					<div class="msg_cont_sec2 align-c" style="min-height: 430px;">
						<div class="align-c margin-t10 d_block"><a href=""><img src="images/facial.png"/></a></div>
						<!--<h3 class="margin-t20 margin-b20 lh-40">You don&#39;t match <?php echo $userPer; ?> search criteria</h3>-->
						<h3 class="margin-t20 margin-b20 lh-40">You dont match their search criteria</h3>
						<div class="margin-b30"><p>It looks like the person does not match with your search criteria<br /> but you can contact <?php echo $userPer;?> by becoming VIP member of Startrishta.</p></div>
						<div class="align-c margin-t5 margin-b20 full pull-left">
							<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="go-vip-search-criteria">Go VIP </a>
						</div>
						<p><a href="add-friends.php">Or try it for free!</a></p>
					</div>
				</div>				
				<?php
			}
			elseif(  $isChatUserVip == 0 && $send_count == 0 && !isset($_POST['replyClicked']) && mysql_num_rows($newMsgCountQuery)>0)
			{

				//echo "<script>alert('4');</script>";
				$class ='d_none';
				$newMsgCountResult = mysql_fetch_assoc($newMsgCountQuery);
				?>
				<div class="chat-sec-panel-3" id="scroll-bot" style="height:calc(100vh - 130px);">
					<div class="msg_cont_sec2 align-c" id="msg-reply-div">
						<input type="hidden" id="newUserNotMatched" name="newUserNotMatched" value="<?php echo $chatUserId;?>" />
						<div class="full clearfix">
							<h3 class="margin-b20"><strong><?php echo $chatUserName;?></strong> in <?php echo $chatUserLocation;?> sent you a message!</h3>

							<div class="full">
								<div class="chat_msg msg15">
									<a href="javascript:void(0);"><?php echo htmlspecialchars_decode($newMsgCountResult['msg']);?></a>
									<i class="fa fa-play"></i>
								</div>
							</div>
							<div class="full margin-t20 replay_wap">
								<div class="align-c margin-t5 margin-b20 replay_wap_btn">
									<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="reply-now" data-id="<?php echo $chatUserId;?>">Reply now </a>
								</div>
								<div class="padding10 replay_wap_btn">or</div>
								<!-- Check 2-->
								<div class="align-c margin-t5 margin-b20 replay_wap_btn">
									<a href="javascript:void(0);" id="msg_nointerest" class="btn btn-default custom bg_gray wd_200" >I'm not interested </a>
									<!--<span id="chkCountMsg" style="display:none;"></span>-->
								</div>
							</div>
						</div>
						<hr style="margin:5px 0;">
						<div class="full clearfix">
							<div class="margin-b20"><p><?php echo $chatUserAge;?> years old. <?php echo $chatUserLocation;?>. <a href="profile.php?uid=<?php echo $chatUserId;?>">View full profile</p></div>
							<div class="user_pics pull-left">
								<ul class="clearfix mess-wap-cen">
									<?php
									$pi = 1;
									while( $userPhotoResult = mysql_fetch_assoc($userPhotoQuery) )
									{
										if( $pi <= 3 )
										{
											?><li><a><img src="upload/photo/<?php echo $userPhotoResult['photo'];?>"></a></li><?php
											$pi++;
										}
									}
									?>
								</ul>
							</div>
							<?php
							if( $commanInterestCount )
							{
								?><p class="margin-t20 pull-left full">You have <?php echo $commanInterestCount;?> interest(s) in common!</p><?php
							}
							?>
							<div class="interests chat-interests chat-last margin-t10 margin-b20">
								<ul>
									<?php echo $getCommonInterestHtml; ?>
								</ul>
							</div>
							<p><a href="javascript:void(0);" id="not_interested"><input type="hidden" name="sentby" class="sentby" value="<?php echo $chatUserId ?>">Not Interested</a></p>
						</div>
					</div>
				</div>
				<?php
			}
		}
		
		
		# IF NEW USER SEND A MESSAGE WITHOUT MATCHING
		elseif(  $isChatUserVip == 0 && $send_count == 0 && !isset($_POST['replyClicked']) && mysql_num_rows($newMsgCountQuery)>0)
		{

			//echo "<script>alert('4');</script>";
			$class ='d_none';
			$newMsgCountResult = mysql_fetch_assoc($newMsgCountQuery);
			?>
			<div class="chat-sec-panel-3" id="scroll-bot" >
				<div class="msg_cont_sec2 align-c" id="msg-reply-div">
					<input type="hidden" id="newUserNotMatched" name="newUserNotMatched" value="<?php echo $chatUserId;?>" />
					<div class="full clearfix">
						<h3 class="margin-b20"><strong><?php echo $chatUserName;?></strong> in <?php echo $chatUserLocation;?> sent you a message!</h3>
						
						<div class="full">
							<div class="chat_msg msg15">
								<a href="javascript:void(0);"><?php echo htmlspecialchars_decode($newMsgCountResult['msg']);?></a>
								<i class="fa fa-play"></i>
							</div>
						</div>
						<div class="full margin-t20 replay_wap">
							<div class="align-c margin-t5 margin-b20 replay_wap_btn">
								<a href="javascript:void(0);" class="btn btn-default custom red wd_200" id="reply-now" data-id="<?php echo $chatUserId;?>">Reply now </a>
							</div>
							<!-- Check 1-->
							<div class="padding10 replay_wap_btn">or</div>
							<div class="align-c margin-t5 margin-b20 replay_wap_btn">
								<a href="javascript:void(0);" id="msg_nointerest" class="btn btn-default custom bg_gray wd_200" >I'm not interested </a>
								<!--<span id="chkCountMsg" style="display:none;"></span>-->
							</div>
						</div>
					</div>
					<hr style="margin:5px 0;">
					<div class="full clearfix">
						<div class="margin-b20"><p><?php echo $chatUserAge;?> years old. <?php echo $chatUserLocation;?>. <a href="profile.php?uid=<?php echo $chatUserId;?>">View full profile</p></div>
						<div class="user_pics pull-left">
							<ul class="clearfix mess-wap-cen">
								<?php 
								$pi = 1;
								while( $userPhotoResult = mysql_fetch_assoc($userPhotoQuery) )
								{
									if( $pi <= 3 )
									{
										?><li><a><img src="upload/photo/<?php echo $userPhotoResult['photo'];?>"></a></li><?php 
										$pi++;
									}
								}
								?>
							</ul>
						</div>
						<?php 
						if( $commanInterestCount )
						{ 
							?><p class="margin-t20 pull-left full">You have <?php echo $commanInterestCount;?> interest(s) in common!</p><?php 
						} 
						?>
						<div class="interests margin-t10 margin-b20">
							<ul>
								<?php echo $getCommonInterestHtml; ?>
							</ul>
						</div>
						<p><a href="javascript:void(0);" id="not_interested"><input type="hidden" name="sentby" class="sentby" value="<?php echo $chatUserId ?>">Not Interested</a></p>
					</div>
				</div>
			</div>
			<?php 
		}
		
		
		# CHAT LIMIT REACHED
		elseif( $chatLimitCount == 5 && (!in_array($chatUserId ,$startChatUserArray)) )
		{

			$class = 'd_none';
			$remaingChatTime = '';
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
			
			<div class="chat-sec-panel" id="scroll-bot" >
				<div class="msg_cont_sec align-c">
					<div class="msg_cont_sec align-c">
						<div class="user_pics margin-t150 pull-left">
							<a class="align_c"><img src="images/chat-limit.png"></a>
						</div>
						<h3 class="align-c full pull-left margin-t20">Oops! You've reached your daily chat limit! </h3>
						<div class="clearfix"></div>
						<p class="margin-t20 ">You have <?php echo $remaingChatTime;?> remaining before your quota returns.</p>
						<p>	Alternatively buying credits will let you message more</p>
						<p>	new people on Startrishta.</p>
						<div class="align-c margin-t25 margin-b20 full pull-left">
							<a href="javascript:void(0);" class="btn btn-default custom red" data-toggle="modal" data-target="#getCredit">Get Credits </a>
						</div>
						<p>or<a href="javascript:void(0);"> Cancel</a></p>
					</div>
				</div>
			</div>
			<?php 
		}


		elseif( $chatLimitCount == 4  && (!in_array($chatUserId ,$startChatUserArray)) )
		{
			?>
			<div class="chat-sec-panel-3" id="scroll-bot" >
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
			</div>
			<?php
		}
		include('chat-window.php');
	
	}
	else
	{ 
		?>
		<div class="chat-sec-panel-3" id="scroll-bot" >
			<div class="align-c" style="margin-top: 0;">
				<div class="align-c">
					<div class="align-c d_block"><a href=""><img src="images/add-photo-icon.png"/></a></div>
					<h3 class="margin-t20">You need to add one photo to chat</h3>
					<div class=""><p>It looks like you don't have any photos of yourself on<br /> Startrishta. You'll need one to be able to chat!</p></div>
					<div class="input_custom my_msg popup_add_photo">
						<div class="input_custom popup_add_photo">
							<form class="" id="profilPhotoForm" enctype="multipart/form-data" method="post" action="">
								<input type="hidden" name="submitProfilPhoto">
								<input type="file" name="profile_image" id="uploadProfilPhoto" class="filestyle btn-default slat-blue" data-input="false" data-buttontext="Upload Photo" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
							</form>
							<div class="bootstrap-filestyle input-group">
								<span class="group-span-filestyle " tabindex="0"><label for="uploadProfilPhoto" class="btn btn-default wd_200"><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Upload Photo</span></label></span>
							</div>
						</div>
						<div class="align-c">or </div>
						<div class="popup_add_photo">
							<a class="btn btn-default fb-blue bold" href="<?php echo IMPORTFBURL;?>"> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
						</div>
					</div>
					<p class="pull-left full margin-t30">You can add up to 500 photos in your &#8216;Photos of you&#8217; album. <br />We accept JPG and PNG file formats. Individual file size<br /> limit must not exceed 10MB.</p>
				</div>
			</div>
		</div>		
		<?php 
	} 
	?>
	
	
	
	<!------------------------INRTEREST POPUP----------------------------------------------------->
	<div id="msg_interest_list" class="modal fade" role="dialog" style="z-index:100000;">
		<div class="modal-dialog clearfix msg_things_two">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title"><?php echo $chatUserName;?>'s Interests <span class="badge my-msg"><?php echo $chatUserInterestCount;?></span></h4>
				</div>
				<div class="modal-body mgs_interest">
					<div class="interests margin-t20">
						<ul>
						<?php foreach($chatUserInterestArray as $chatUserInterest){?>
							<li><a href="javascript:void(0);"><span class="<?php echo $chatUserInterest['icon'];?>"></span><p><?php echo $chatUserInterest['interest'];?></p></a></li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<div class="modal-footer align-l">
					Found Some Common Interests? <a href="javascript:void(0);" onclick="$('#msg_interest_list').modal('hide');" data-toggle="modal" data-target="#copy_interest" >Add them to Your Profile</a>
				</div>
			</div>
		</div>
	</div>
	<div id="copy_interest" class="modal fade" role="dialog" style="z-index:100000;">
		<div class="modal-dialog clearfix msg_things_two">
			<div class="modal-content msg_copy_in">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Copy <?php echo $chatUserName;?>'s Interests <span class="badge my-msg"><?php echo $chatUserInterestCount;?></span></h4>
				</div>
				<div class="modal-body">
					<?php foreach($chatUserInterestArray as $chatUserInterest1){?>
						<div class="pull-left">
							<input id="user_interest<?php echo $chatUserInterest1['user_interest_id'];?>" type="checkbox" name="user_interest[]" value="<?php echo $chatUserInterest1['interest_id'];?>">
							<label for="user_interest<?php echo $chatUserInterest1['user_interest_id'];?>"><span class="pull-left"></span>
							<a href="javascript:void(0);"><span class="<?php echo $chatUserInterest1['icon'];?>"></span><p><?php echo $chatUserInterest1['interest'];?></p></a></label>
						</div>
					<?php } ?>
				</div>
				<div class="modal-footer align-l">
					<div class="popup_add_photo margin-t20">
					<span id="selected_interest"></span>
						<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="add_selected_interest">Add Selected Interests</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } 

/****************************************FOR SEND MESSAGE****************************************/
if(isset($_POST['action']) && $_POST['action']=='sendMessage'){
	
	$msg_upload='';
	if(isset($_FILES['msg_upload']['name']) && !empty($_FILES['msg_upload']['name'])){
		$sourcePath = $_FILES['msg_upload']['tmp_name']; 
		$msg_upload =  time().$_FILES['msg_upload']['name'];	
		$targetPath = "../upload/msg_upload/".$msg_upload;
		
		move_uploaded_file($sourcePath,$targetPath) ; 
	}
	$chatUserId=$_POST['chatUserId'];
	 $chat_message= mysql_real_escape_string(htmlspecialchars($_POST['chat_message']));
	$sub=mysql_query('SET NAMES utf8mb4');
	$chatQuery=mysql_query("insert into  sr_user_message set msg='".$chat_message."',msg_upload = '".$msg_upload."' ,sent_to='".$chatUserId."',sent_by='".$_SESSION['user_id']."',sent_date='".DATE_TIME."'");
	//echo "Insert into  sr_user_message set msg='".$chat_message."',msg_upload = '".$msg_upload."' ,sent_to='".$chatUserId."',sent_by='".$_SESSION['user_id']."',sent_date='".DATE_TIME."'";
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
	//***REWARDS
	$todayMessageCount = $userProfileObj->getTodayMessageCount($user_id);
	if($todayMessageCount == 6){
		$insertReward = $userProfileObj->insertReward($user_id , 4);
	}
}

############ SHOW ALL MESSAGE ##############
if( isset($_POST['action']) && $_POST['action']=='showChatHistory' )
{
	$chatUserId = $_POST['ChatId'];
	$todayDate = date('Y-m-d 00:00:00');
	mysql_query("UPDATE sr_user_message SET is_read = 1 , receive_date = '".DATE_TIME."' WHERE sent_by = '".$chatUserId."' AND sent_to = '".$user_id."' AND is_read = 0 ");
	$query2=mysql_query('SET NAMES utf8mb4');
	$showChatQuery = mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by = '".$chatUserId."' AND sent_to = '".$user_id."'  AND is_deletebyto = 0) OR (sent_by = '".$user_id."' AND sent_to = '".$chatUserId."'  AND is_deletebyfrom = 0)) AND m.sent_by = u.user_id AND sent_date BETWEEN '".$todayDate."' AND  '".DATE_TIME."' ORDER BY sent_date");
	
	while( $showChatResult = mysql_fetch_array($showChatQuery) )
	{
		$profileImg = mysql_query("Select profile_image from sr_users where user_id = '".$showtodayChatResult['sent_by']."' ");
		$profileImgFetch = mysql_fetch_array($profileImg);
		$profileImgUrl = ( $profileImgFetch['profile_image']!="" )?$profileImgFetch['profile_image']:"dummy-profile.png";

		if( $showChatResult['user_id'] == $user_id )
		{
			?>
			<div class="chat-wap-c">
								<div class="send-chat">
									<div class="user-name-c"><a href="#"><span><?php echo  $showChatResult['user_name']; ?></span><i><?php
											echo $date=date('M,d Y h:i A',strtotime($showChatResult['sent_date']));

												?></i></a></div>
									<div class="user-cont-c">
						<?php 
						echo htmlspecialchars_decode($showChatResult['msg']);

						if( $showChatResult['msg_upload'] != '' )
						{ 
							?><img src="<?php echo getMessageImage($showChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
						} 
						?>
					</div>
									<?php
									if($showChatResult['is_read']==1)
									{
										?>
										<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
										<?php
									}
									else
									{?>

										<div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
									<?php  } ?>

								</div>
			</div>
			<?php
		}
		else
		{
			?>
			<div class="chat-wap-c">
								<div class="receive-chat">
									<div class="user-name-r"><a href="#"><span><?php echo  $showChatResult['user_name']; ?></span><i><?php echo $date=date('M,d Y h:i A',strtotime($showChatResult['sent_date'])); ?></i></a></div>
									<div class="user-cont-r">
						<?php 
						echo htmlspecialchars_decode($showChatResult['msg']);

						if( $showChatResult['msg_upload'] != '' )
						{ 
							?><img src="<?php echo getMessageImage($showChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
						} 
						?>
					</div>
									<?php
									if($showChatResult['is_read']==1)
									{
										?>
										<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
										<?php
									}
									else
									{?>

										<div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
									<?php  } ?>

								</div>
			</div>
			<?php
		} 
	} 
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

########### DELETE ALL CONVERSATION #################
if( isset($_POST['action']) && $_POST['action']=='deleteAllConversation' )
{

	$userIds = $_POST['userIds'];
	foreach( $userIds as $userId )
	{
		$Query1 = mysql_query("UPDATE sr_user_message SET is_deletebyfrom = 1 WHERE sent_by = '".$user_id."' AND sent_to = '".$userId."'");
		$Query2 = mysql_query("UPDATE sr_user_message SET is_deletebyto = 1 WHERE sent_to = '".$user_id."' AND sent_by = '".$userId."'");
	}
	
	echo ($Query1 && $Query2)?1:0;
}

/*******************************VIP MEMBERSHIP(REMOVE)******************************************************/
if(isset($_POST['action']) && $_POST['action']=='goVipMenber'){

	echo 1;
}

/********************************GIFT*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='giveGiftToUser'){
	$gift_user_id=$_POST['gift_user_id'];
	$gift_id=$_POST['gift_id'];
	$gift_private=$_POST['gift_private'];
	$gift_msg=mysql_real_escape_string($_POST['gift_msg']);
	
	$Query=mysql_query("INSERT INTO sr_user_gift SET gift_id='".$gift_id."',message='".$gift_msg."',private='".$gift_private."',user_id='".$gift_user_id."',status =0 ,gifted_by='".$user_id."',gifted_on= '".DATE_TIME."'");
	
	/*******STICKERS Most Generous
	$sickerQuery =mysql_query("SELECT user_sticker_id FROM sr_user_sticker WHERE sticker_id = 6 AND user_id = '".$user_id."'");
	if(mysql_num_rows($sickerQuery) == 0) {
		$giftQuery=mysql_query("SELECT user_gift_id FROM sr_user_gift WHERE gifted_by = '".$user_id."' AND gifted_on > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
		$giftCount=mysql_num_rows($giftQuery);
		if($giftCount >= 2){
			mysql_query("INSERT INTO `sr_user_sticker` SET sticker_id = 6 , user_id = '".$user_id."' , awarded_on ='".DATE_TIME."'");
		}
	}*************/
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}


/********************************ADD INTEREST*******************************************************/
if(isset($_POST['action']) && $_POST['action']=='addInterest'){
	 $interest_ids=$_POST['interest_ids'];
	 print_r($interest_ids);
	foreach($interest_ids as $interest_id){
		$query=mysql_query("INSERT INTO `sr_user_interest` SET interest_id = '".$interest_id."' ,user_id = '".$user_id."' ,status=1 ,created_on = '".DATE_TIME."',updated_on='".DATE_TIME."'"); 
	}
	if($query){
		echo 1;
	}else {
		echo 0;
	}
}


################# Not Interested Action #################
if( isset($_POST['action']) && trim($_POST['action'])=="notInterestedAction" )
{
	$notInterestedActionVal = ( isset($_POST['notInterestedOption']) && trim($_POST['notInterestedOption'])!="" )?trim($_POST['notInterestedOption']):"";
	$newUserNotMatched = ( isset($_POST['newUserNotMatched']) && trim($_POST['newUserNotMatched'])!="" )?trim($_POST['newUserNotMatched']):"";
	
	if( $notInterestedActionVal=="" ){  echo 1;  }
	elseif( $newUserNotMatched=="" ){  echo 2;  }
	else
	{
		#Update not interested table
		$notInterestedQuery = mysql_query("Insert into sr_not_interested(user_id, noi_user, action) values('".$user_id."', '".$newUserNotMatched."', '".$notInterestedActionVal."') ");
		
		if( $notInterestedQuery )
		{


			switch($notInterestedActionVal):
			case 'blockuser':  #Block user
				#Delete Conversation
				$Query1 = mysql_query("UPDATE sr_user_message SET is_deletebyfrom = 1 WHERE sent_by = '".$user_id."' AND sent_to = '".$newUserNotMatched."' ");
				$Query2 = mysql_query("UPDATE sr_user_message SET is_deletebyto = 1 WHERE sent_to = '".$user_id."' AND sent_by = '".$newUserNotMatched."' ");
				#Block User
				$blockQuery = mysql_query("Insert into sr_user_block(user_id, block_by, status, block_on) values('".$newUserNotMatched."', '".$user_id."', '1', '".date('Y-m-d H:i:s')."') ");
				if( !$blockQuery ){  echo 4;  }
			break;
			
			case 'blocklike':  #Block every user like this
				/* $chkNewUser = mysql_query("Select user_id from sr_users where (time_to_sec(timediff('".date('Y-m-d H:i:s')."', created_on )) / 3600) < 24 ") or die(mysql_error());
				if( mysql_num_rows($chkNewUser) > 0 )
				{
					while( $chkNewUserFetch = mysql_fetch_array($chkNewUser) )
					{
						print_r($chkNewUserFetch);
					}
				} */
			break;
			
			case 'dltmsg':  #Delete messages only
				$Query1 = mysql_query("UPDATE sr_user_message SET is_deletebyfrom = 1 WHERE sent_by = '".$user_id."' AND sent_to = '".$newUserNotMatched."' ");
				$Query2 = mysql_query("UPDATE sr_user_message SET is_deletebyto = 1 WHERE sent_to = '".$user_id."' AND sent_by = '".$newUserNotMatched."' ");
				if( !$Query1 && !$Query2 ){  echo 5;  }
			break;
			
			case 'dltlike':  #Delete every message like this
			break;
			endswitch;
		}
		else
		{
			echo 3;
		}			
	}
	
	exit;
}


 ?>
