<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id = $_SESSION['user_id'];


//###############################ADDED AS FAVORITES#####################################
if(isset($_POST['action']) && $_POST['action']=='deleteFav'){
	
	$fav_id = $_POST['fav_id'];
	
	$query =mysql_query("DELETE FROM sr_user_favourites WHERE user_id='".$user_id."' AND favourite_by='".$fav_id."'");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteAllFav'){
	
	$userIds = $_POST['userIds'];
	foreach($userIds as $fav_id){
		$query =mysql_query("DELETE FROM sr_user_favourites WHERE user_id='".$user_id."' AND favourite_by='".$fav_id."'");
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

//###############################MY FAVORITES#####################################
if(isset($_POST['action']) && $_POST['action']=='deleteMyFav'){
	
	$fav_id = $_POST['fav_id'];
	
	$query =mysql_query("DELETE FROM sr_user_favourites WHERE user_id='".$fav_id."' AND favourite_by='".$user_id."'");
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteAllMyFav'){
	
	$userIds = $_POST['userIds'];
	foreach($userIds as $fav_id){
		$query =mysql_query("DELETE FROM sr_user_favourites WHERE user_id='".$fav_id."' AND favourite_by='".$user_id."'");
	}
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}



?>