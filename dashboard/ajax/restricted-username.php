<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$admin_id=$_SESSION['ADMIN']['USER_ID'];


if(isset($_POST['action']) && $_POST['action']=='restrictUsername'){
	
	$user_name=mysql_real_escape_string($_POST['user_name']);
	$isDupliacate = $adminObj->getDuplicateRestrictedUsername($user_name);
	if($isDupliacate){
	
		echo 2;
		
	}else{
		$query=mysql_query("INSERT INTO sr_restricted_name SET user_name='".$user_name."', created_by='".$adminId."', created_on='".DATE_TIME."', updated_by='".$adminId."' , updated_on='".DATE_TIME."', status=1");
		
		if($query){
		
			echo 1;
		
		}else{
			echo 0;
		}
	}
	exit;
}
if(isset($_POST['action']) && $_POST['action']=='editRestrictUsername'){
	
	$id=$_POST['id'];
	$user_name=mysql_real_escape_string($_POST['user_name']);
	$isDupliacate = $adminObj->getDuplicateRestrictedUsername($user_name, $id);
	if($isDupliacate){
	
		echo 2;
		
	}else{
		$query=mysql_query("UPDATE sr_restricted_name SET user_name='".$user_name."', updated_by='".$adminId."' , updated_on='".DATE_TIME."' WHERE id='".$id."'");
		
		if($query){
		
			echo 1;
		
		}else{
			echo 0;
		}
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteRestrictUsername'){
	
	$delete_id = $_POST['id'];
	$query = mysql_query("DELETE FROM sr_restricted_name WHERE id='".$delete_id."'");
	
	if($query){
		
		//$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Read Photo Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
		
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}

?>
