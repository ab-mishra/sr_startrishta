<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id = $_SESSION['user_id'];

if(isset($_POST['action']) && $_POST['action']=='unblockUser'){
	$block_uid = $_POST['block_uid'];
	$query =mysql_query("DELETE FROM sr_user_block WHERE user_id='".$block_uid."' 
		AND block_by='".$user_id."'");
	if($query){
		$userInfo = $userObj->getUserInfo($block_uid);
		$isFav = $userObj->getFavoritesCount($user_id, $block_uid);
		echo $userObj->getUserActionHtml($userInfo['user_id'], $userInfo['user_name'] , $isFav['favcount'], '');
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='addtoblock'){
	$block_user_id=$_POST['block_user_id'];
	
	$blockQuery=mysql_query("SELECT block_id from sr_user_block where user_id='".$block_user_id."' 
		AND block_by='".$user_id."'");
	//echo "SELECT block_id from sr_user_block where user_id='".$block_user_id."' AND block_by='".$user_id."'";
	//echo mysql_num_rows($blockQuery);
	if(mysql_num_rows($blockQuery) == 0){
		$Query=mysql_query("INSERT INTO sr_user_block SET user_id='".$block_user_id."', 
			block_by='".$user_id."',status =1,block_on= '".DATE_TIME."' ");
		echo "INSERT INTO sr_user_block SET user_id='".$block_user_id."', block_by='".$user_id."',status =1,block_on= '".DATE_TIME."' ";
		if($Query){
			$userInfo = $userProfileObj->getUserInfo($block_user_id);
			$isFav = $userProfileObj->getFavoritesCount($user_id, $block_user_id);
			echo $userProfileObj->getUserActionHtml($userInfo['user_id'] ,$userInfo['user_name'] , $isFav['favcount'], 'my-favorites');
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
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