<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='viewMessageHistory'){
	
	$userId = $_POST['messageUserId'];
	
	$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Viewed Message History', admin_id='".$adminId."', timestamp=now() , status=1");
	
	if($timestampQuery){
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}



?>
