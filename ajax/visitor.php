<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id = $_SESSION['user_id'];

if(isset($_POST['action']) && $_POST['action']=='closeModal'){
	
	$_SESSION['http_refer'] = '';
	unset($_SESSION['http_refer']);
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteVisitor'){
	
	$visitor_id = $_POST['visitor_id'];
	
	//$query =mysql_query("DELETE FROM sr_profile_visitors WHERE user_id='".$user_id."' AND visitor_id='".$visitor_id."'");
	$query = mysql_query("UPDATE sr_profile_visitors SET status=0 where user_id='".$user_id."' AND visitor_id='".$visitor_id."'");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteAllVisitor'){
	
	$userIds = $_POST['userIds'];
	foreach($userIds as $visitor_id){
		//$query =mysql_query("DELETE FROM sr_profile_visitors WHERE user_id='".$user_id."' AND visitor_id='".$visitor_id."'");
		$query =mysql_query("UPDATE sr_profile_visitors SET status=0 WHERE user_id='".$user_id."' AND visitor_id='".$visitor_id."'");
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}
?>