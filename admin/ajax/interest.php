<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='deleteInterest'){
	
	$interest_id = $_POST['interest_id'];
	$userId = $_POST['userId'];
	
	$query =mysql_query("DELETE FROM sr_user_interest WHERE user_id='".$userId."' AND interest_id='".$interest_id."'");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}



?>
