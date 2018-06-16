<?php
require('../classes/user_class.php');
$userObj = new User();
$user_id = $_SESSION['user_id'];


if(isset($_POST['action']) && $_POST['action']=='saveProfileSetting'){
	
	$show_online = $_POST['show_online'];
	$show_distance = $_POST['show_distance'];
	$view_profile = $_POST['view_profile'];
	$photo_comment = $_POST['photo_comment'];
	
	$query = mysql_query("UPDATE sr_users SET show_online='".$show_online."', show_distance='".$show_distance."', view_profile='".$view_profile."' , photo_comment='".$photo_comment."' where user_id='".$user_id."'");
	
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='saveEmailNotification'){
	
	$new_message = $_POST['new_message'];
	$message_comment = $_POST['message_comment'];
	$profile_visitor = $_POST['profile_visitor'];
	$like_you = $_POST['like_you'];
	$new_match = $_POST['new_match'];
	$startrishta_new = $_POST['startrishta_new'];
	$alert = $_POST['alert'];
	$gift = $_POST['gift'];
	$favorite_you = $_POST['favorite_you'];
	$photo_rating = $_POST['photo_rating'];
	
	$emailNotQuery=mysql_query("SELECT * FROM sr_email_notification WHERE user_id='".$user_id."'");
	if($emailNotQuery && mysql_num_rows($emailNotQuery)){
		
		$query = mysql_query("UPDATE sr_email_notification SET 
			new_message = '".$new_message."',
			message_comment='".$message_comment."', 
			profile_visitor='".$profile_visitor."', 
			like_you='".$like_you."' , 
			new_match='".$new_match."' , 
			startrishta_new='".$startrishta_new."', 
			alert='".$alert."', gift='".$gift."' , 
			favorite_you='".$favorite_you."', 
			photo_rating='".$photo_rating."', 
			updated_on='".DATE_TIME."' 
			where user_id='".$user_id."'");
		
	}else{
	
		$query = mysql_query("INSERT INTO sr_email_notification SET 
			new_message = '".$new_message."',
			message_comment='".$message_comment."', 
			profile_visitor='".$profile_visitor."', 
			like_you='".$like_you."' , 
			new_match='".$new_match."' , 
			startrishta_new='".$startrishta_new."', 
			alert='".$alert."', gift='".$gift."' , 
			favorite_you='".$favorite_you."', 
			photo_rating='".$photo_rating."', 
			user_id='".$user_id."', 
			created_on='".DATE_TIME."', updated_on='".DATE_TIME."'");
		
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

//#######################CHANGE PASSWORD#################################

if( isset($_POST['action']) && $_POST['action'] == 'changePassword' )
{	
	$current_password = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	$new_password1 = $_POST['new_password1'];

	//if(!empty($_SESSION['captcha_code'] ) && strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){
			
	$query = mysql_query("SELECT user_id, email_id FROM sr_user_login WHERE user_id = '".$user_id."' AND password = md5('".$current_password."')");
	if( $query && mysql_num_rows($query) )
	{	
		$queryDataFetch = mysql_fetch_array($query);
		if( $new_password == $new_password1 )
		{	
			$updateQuery = mysql_query("UPDATE sr_user_login SET password = md5('".$new_password."') WHERE user_id = '".$user_id."'");
			$mailResponse = $userObj->sendResetPasswordConfirmationMail($queryDataFetch['email_id']);
			echo ($updateQuery)?1:0;
		}
		else{	
			echo 3;
		}
	}else
	{
		echo 2;
	}
	/* }else{
				
		echo 4;
	} */
	exit;
}

//#############################CHANGE EMAIL################################
if(isset($_POST['action']) && $_POST['action']=='changeEmail'){
	
	//if(!empty($_SESSION['captcha_code'] ) && strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){
			
	$user_id=$_SESSION['user_id'];
	$email_id=$_POST['changeMail'];
	$new_email_address=$_POST['new_email_address'];
	$current_password=$_POST['current_password'];
	$result=array();
	$result['msg']='';
	if($email_id != $new_email_address){
		$checkEmail=$userObj->checkEmailDuplicate($new_email_address);
		if(!$checkEmail){

			$passwordQuery =mysql_query("SELECT user_id FROM sr_user_login WHERE user_id='".$user_id."' AND password=md5('".$current_password."')");
			if($passwordQuery && mysql_num_rows($passwordQuery)){
			
				$update_verify_code = mt_rand();
				$updateQuery=mysql_query("UPDATE sr_user_login SET email_id ='".$new_email_address."' , verify_code ='".$update_verify_code."' WHERE user_id='".$user_id."'");
				
				if($updateQuery)
				{
					$emailQuery = mysql_query("SELECT * FROM sr_user_login l , sr_users u WHERE l.user_id=u.user_id AND l.user_id = '".$user_id."'");
					$emailResult = mysql_fetch_object($emailQuery);
					$user_email = $emailResult->email_id;
					$user_name = $emailResult->user_name;
					$verify_code = $emailResult->verify_code;
					$resendSignUpMail = $userObj->sendEmailChangeMail($user_email, $user_name, $verify_code);
					
					$domain = explode('@' , $user_email);
					$hiddenEmailId = substr_replace($domain[0],'***',1).'@'.$domain[1];
					$result['msg'] = 'success';
					$result['email'] = $hiddenEmailId;
				}
				else{
					$result['msg'] =  'Problem in network.Please try again.';;
				}
			}else{
				$result['msg'] =  'Please enter correct password.';
			}
		}else{
			$result['msg'] =  'This email address is already registered, please choose another.';
		}
	}else{
		$result['msg'] =  'This email address is already registered, please choose another.';
	}
		
	echo json_encode($result);
	exit;
}
//##########################FREEZ ACCOUNT##########################
if(isset($_POST['action']) && $_POST['action']=='freezeAccount'){
	
	
	$query = mysql_query("UPDATE sr_users SET is_account_freeze='1', is_online = 0 where user_id='".$user_id."'");
	
	if( isset($_SESSION['profile_visit']) )
	{
		mysql_query("UPDATE sr_profile_visitors SET status=0 where user_id='".$user_id."'");
	}

	session_destroy();
	setcookie('remember','', time()-864000, '/') or die('unable to create cookie'); 
	
	echo ($query)?1:0;
	exit;
}
//###################RESET PROFILE INFORMATION########################
if(isset($_POST['action']) && $_POST['action']=='resetProfileInfo'){
	
	//delete message
	$Query1=mysql_query("UPDATE sr_user_message SET is_deletebyfrom=1 WHERE sent_by='".$user_id."'");
	$Query2=mysql_query("UPDATE sr_user_message SET is_deletebyto=1 WHERE sent_to='".$user_id."'");
	//delete profile visits 
	$Query3=mysql_query("DELETE FROM sr_profile_visitors WHERE user_id='".$user_id."'");
	//delete like  
	$Query4=mysql_query("DELETE FROM sr_user_like WHERE user_id='".$user_id."'");
	//delete favourite
	$Query5=mysql_query("DELETE FROM sr_user_favourites WHERE favourite_by='".$user_id."'");
	
	if($Query1 && $Query2 && $Query3 && $Query4 && $Query5){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}


//######################DELETED PROFILE###########################
if( isset($_POST['action']) && $_POST['action']=='deleteProfile' )
{
	ini_set('display_errors',1);
	$reason = mysql_real_escape_string($_POST['reason']);
	$description = mysql_real_escape_string($_POST['description']);

	//if(!empty($_SESSION['captcha_code'] ) && strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) == 0){
	
	#check if user took action 2nd time
	$chkDeleteLog = mysql_query("Select DISTINCT user_id from sr_delete_profile where user_id='".$user_id."' ");
	if( mysql_num_rows($chkDeleteLog)>0 )
	{
		echo 3;
		$query = mysql_query("INSERT INTO sr_delete_profile SET user_id='".$user_id."', reason='".$reason."', description='".$description."', deleted_on='".DATE_TIME."' , deleted_by='".$user_id."' , status=1");
	}
	else
	{
		$query = mysql_query("INSERT INTO sr_delete_profile SET user_id='".$user_id."', reason='".$reason."', description='".$description."', deleted_on='".DATE_TIME."' , deleted_by='".$user_id."' , status=1");
		
		echo ($query)?1:0;
	}
	
	$senderDet = $userObj->getUserInfo($user_id);
	$senderLogDet = $userObj->logDetails($user_id);
	$userObj->sendDeleteUserMail($user_id);
	
	#Mail To User
	/*$mail = new PHPmailer;
	$mail->IsHTML(true);		
	$mail->From = ADMINMAIL2;
	$mail->FromName = Email_FROMNAME;
	$mail->AddAddress($senderLogDet['email_id']);
	$mail->AddBCC(Email_BCC);
	$mail->Subject = "StartRishta: Goodbye..for now!";
	$mail->Body = "<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
	<tr>
		<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
			<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px; border:1px solid #ddd; display:block;'>
				<tr>
					<th width='48%' colspan='2' style='padding: 15px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:right; border-bottom:1px solid #ddd;'>
						<img src='".SITEURL."/images/logo-color.png'>
					</th>
				</tr>
				
				<tr>
					<th width='48%' colspan='2' style='padding: 8px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
						<h1>Hi ".$senderDet['user_name']."</h1>
					</th>
				</tr>
				<tr>
					<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
						Your account has been deleted.<br><br/><br/>
						We hope you've had a fantastic time using Startrishta and we're sad to see you leave. Remember, you are welcome back anytime and you'll be able to pick up where you left off - talking to awesome new people and having fun!
					</td>
				</tr>
				<tr>
					<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left; border-bottom:1px solid #ddd;'>
						<h3 style='color:#666666; margin-top:20px; margin-bottom: 2px;'>See you around!<br />Startrishta.com Team</h3>
					</td>
				</tr>
				<tr>
					<td width='48%' colspan='2' style='color:#666666;padding: 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>Please do not reply to this message; it was sent from an unmonitored email address.<br/> This message is a service email related to your use of Startrishta.com</td>
				</tr>
			</table>
		</td>
	</tr>
	</table>	
	";
	$mail->WordWrap=50; 
	$email_response = $mail->Send();*/
	exit;
}


//######################STEALTH MODE############################
if(isset($_POST['action']) && $_POST['action']=='stealthMode') {
	//print_r($_POST);
	//die();
	 $hide_presence = mysql_real_escape_string($_POST['hide_presence']);
	 $hide_vip = mysql_real_escape_string($_POST['hide_vip']);
	if ($hide_presence == 1 && $hide_vip == 0) {
		$query = mysql_query("UPDATE sr_users SET hide_presence='" . $hide_presence . "' and  hide_vip=0 where user_id='" . $user_id . "'") or die(mysql_error());
		//die();
		//echo "UPDATE sr_users SET hide_presence='".$hide_presence."', hide_vip='".$hide_vip."' where user_id='".$user_id."'"
		if ($query) {
			echo 1;
		} else {
			echo 0;
		}
	}
	if ($hide_vip == 1 && $hide_presence == 0) {
		$query = mysql_query("UPDATE sr_users SET  hide_vip='" . $hide_vip . "' and hide_presence=0 where user_id='" . $user_id . "'") or die(mysql_error());
		//die();
		//echo "UPDATE sr_users SET hide_presence='".$hide_presence."', hide_vip='".$hide_vip."' where user_id='".$user_id."'"
		if ($query) {
			echo 2;
		} else {
			echo 0;
		}
	}
	if ($hide_vip == 1 && $hide_presence==1 ) {
		$query = mysql_query("UPDATE `sr_users` SET `hide_presence` = '1', `hide_vip` = '1' WHERE `sr_users`.`user_id` = $user_id") or die(mysql_error());
		//die();
		//echo "UPDATE sr_users SET hide_presence='".$hide_presence."', hide_vip='".$hide_vip."' where user_id='".$user_id."'"
		if ($query) {
			echo 3;
		} else {
			echo 0;
		}
	}
	if ($hide_vip == 0 && $hide_presence==0 ) {

		//echo "UPDATE `sr_users` SET `hide_presence` = '0', `hide_vip` = '0' WHERE `sr_users`.`user_id` = $user_id;";
		$query = mysql_query("UPDATE `sr_users` SET `hide_presence` = '0', `hide_vip` = '0' WHERE `sr_users`.`user_id` = $user_id") or die(mysql_error());
		//die();
		//echo "UPDATE sr_users SET hide_presence='".$hide_presence."', hide_vip='".$hide_vip."' where user_id='".$user_id."'"
		if ($query) {
			echo 4;
		} else {
			echo 0;
		}
	}


}
//##################RESET FRIENDS#############################
if(isset($_POST['action']) && $_POST['action']=='resetFriends'){

	
	$query = mysql_query("DELETE FROM sr_user_friends where user_id='".$user_id."'");
	
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}
//##################FREE VIP MEMBERSHIP#############################
if(isset($_POST['action']) && $_POST['action']=='freeVipMembership'){
	
	$dateTime=gmdate("Y-m-d H:i:s", time()+19800);
	$end_date = date("Y-m-d H:i:s", strtotime("+3 days", strtotime($dateTime)));
	
	$vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$user_id."' and status=1");
	if($vipQuery && mysql_num_rows($vipQuery)>0){
		$Query=mysql_query("UPDATE sr_vip_user SET  vip_id='', start_date='".$dateTime."' , end_date='".$end_date."' WHERE  user_id='".$user_id."'");
	}else{
		$Query=mysql_query("INSERT INTO sr_vip_user SET vip_id='', user_id='".$user_id."', start_date='".$dateTime."', end_date='".$end_date."'");
	}
	
	if($Query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}


###################### Message Setting ###########################
if(isset($_POST['action']) && $_POST['action']=='saveMsgSetting')
{
	$msgPlanVal = ( isset( $_POST['msgPlanVal'] ) && trim($_POST['msgPlanVal'])!="" )?trim($_POST['msgPlanVal']):"";
	$user_id = trim($_SESSION['user_id']);
	
	if( $msgPlanVal=="" ){	echo 1;		}
	else
	{
		$query = mysql_query("Update sr_users set msg_plan = '".$msgPlanVal."' where user_id = '".$user_id."' ");
		if( $query ){	echo 0;	}
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=="saveAutoTopUp"){
	$paychk = $_POST['paychk'];
	$query = mysql_query("UPDATE `sr_users` set `auto_topup` = '".$paychk."' where user_id = '".$user_id."' ");
	if($query){
		echo 1;
	}
	else{
		echo 0;
	}
}

?>
