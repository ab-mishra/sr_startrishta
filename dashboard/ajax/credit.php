<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='modifyCredit'){
	
	$credit = $_POST['credit'];
	$userId = $_POST['creditUserId'];
	
	$query = mysql_query("INSERT INTO sr_user_credit SET credit='".$credit."', status=0, by_admin=1, user_id='".$userId."', credited_on=now()");
	
	if($query){
		
		$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Modify Credit by ".$credit."', admin_id='".$adminId."', timestamp=now() , status=1");
		
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='resetCredit'){
	
	$userId = $_POST['creditUserId'];
	
	$query = mysql_query("DELETE FROM sr_user_credit WHERE user_id='".$userId."'");
	
	if($query){
		
		$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Reset all Credit', admin_id='".$adminId."', timestamp=now() , status=1");
		
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}



?>
