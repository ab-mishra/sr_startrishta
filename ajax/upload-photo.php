<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id = $_SESSION['user_id'];

if(isset($_POST['action']) && $_POST['action']=='unblockUser'){
	
	$block_uid = $_POST['block_uid'];
	
	$query =mysql_query("DELETE FROM sr_user_block WHERE user_id='".$block_uid."' AND block_by='".$user_id."'");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='unblockAllUser'){
	
	$userIds = $_POST['userIds'];
	foreach($userIds as $block_uid){
		$query =mysql_query("DELETE FROM sr_user_block WHERE user_id='".$block_uid."' AND block_by='".$user_id."'");
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}


?>