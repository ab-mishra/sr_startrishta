<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];

if(isset($_POST['action']) && $_POST['action']=='upgradeVip'){
	
	$userId = $_POST['vipUserId'];
	$duration = $_POST['duration'];
	$start_date=gmdate("Y-m-d H:i:s", time()+19800);
	$end_date = date("Y-m-d H:i:s", strtotime($duration, strtotime($start_date)));
	
	$vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$userId."' AND status=1");
	if($vipQuery && mysql_num_rows($vipQuery) == 0){
		$query = mysql_query("INSERT INTO sr_vip_user SET start_date='".$start_date."',end_date='".$end_date."', status=1, by_admin=1, user_id='".$userId."'");
		
		if($query){
			
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Upgrade to VIP Member', admin_id='".$adminId."', timestamp=now() , status=1");
			
			echo 1;
		
		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
	exit;
}
?>
