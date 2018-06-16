<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='suspandUser'){
	
	$userId = $_POST['suspendUserId'];
	$user_name = $_POST['user_name'];
	$reason = $_POST['reason'];
	$description = $_POST['description'];
	
	echo $result = $adminObj->suspendUser($userId, $user_name, $reason, $description);
	
	exit;
}

if(isset($_POST['action']) && $_POST['action'] == 'unsuspandUser'){
	$userId = $_POST['user_id'];
	$user_name = $_POST['user_name'];
	$query=mysql_query("UPDATE sr_users SET is_suspended=0 WHERE user_id='".$userId."'");
	
	if($query){
		
		$sql =mysql_query("UPDATE sr_user_suspend SET status=0 WHERE user_id='".$userId."'");
		$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Unsuspanded User', admin_id='".$adminId."', timestamp=now() , status=1");
		
		//EMAIL
		$to=$adminObj->getUserEmailId($userId);
		$from_name='Startrishta.com';
		$from='no-reply@startrishta.com';
		$subject='Your account has been unsuspended';
		$header='Hi '.$user_name;
		$body ='Good news! Your Startrishta account has been unsuspended. Visit our homepage to login and continue where you left off.<br/><br/>';
		$body .= '<a  href="'.SITEURL.'"><span style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 13px;font-weight: 500 !important; padding: 5px 9px; display:block; float:left;">Login</span></a><br/><br/>';
		$body .= 'Enjoy using Startrishta and please remember to always abide by our <a href="'.SITEURL.'terms.php">terms and conditions.</a>';
		$footer='<br/><br/>Thanks,<br/> Startrishta Support';
		
		$sendMail=$adminObj->sendTemplateMail($to, $from, $from_name, $subject, $header, $body, $footer);
		//print_r($sendMail);
		echo 1;
	
	}else{
		echo 0;
	}
}



?>
