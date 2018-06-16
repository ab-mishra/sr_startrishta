<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='eraseUser'){
	
	$userId = $_POST['eraseUserId'];
	$user_name = $_POST['user_name'];
	$reason = $_POST['reason'];
	$description = $_POST['description'];
	
	
	$query=mysql_query("UPDATE sr_users SET is_erase=1 WHERE user_id='".$userId."'");
	
	if($query){
		
		$sql =mysql_query("INSERT INTO sr_user_erased SET user_id='".$userId."', reason='".$reason."', description='".$description."', erased_by='".$adminId."', erased_on=now() , status=1");
		$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Erased User', admin_id='".$adminId."', timestamp=now() , status=1");
		
		//EMAIL
		$to=$adminObj->getUserEmailId($userId);
		$from_name='Startrishta.com';
		$from='no-reply@startrishta.com';
		$subject='Your account has been permanently deleted';
		$header='Hi '.$user_name;
		$body ='Your Startrishta.com account has been permanently deleted by our moderators as you have been found to have breached our terms and conditions.<br/><br/>';
		$body .= 'Reason code:'.$reason.'.<br/><br/>';
		$body .= 'You are welcome to sign-up again in the future providing you abide by our <a href="'.SITEURL.'terms.php">terms and conditions.</a>';
		$footer='<br/><br/>Startrishta Support';
		
		$sendMail=$adminObj->sendTemplateMail($to, $from, $from_name, $subject, $header, $body, $footer);
		//print_r($sendMail);
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}



?>
