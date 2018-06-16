<?php
require('classes/user_class.php');
$userObj=new User();

/*if(isset($_FILES) && $_POST['action']=='uploadMyPhoto'){
	$resp=$userObj->uploadPhoto(1);
	echo $resp;
}*/
if(isset($_POST['action']) && $_POST['action']=='uploadMyPhoto'){
	$resp=$userObj->uploadPhoto(1);
	echo $resp;
}

if(isset($_POST['action']) && $_POST['action']=='uploadGroupPhoto'){
	$resp=$userObj->uploadPhoto(2);
	echo $resp;
}
if(isset($_POST['action']) && $_POST['action']=='uploadPrivatePhoto'){
	$resp=$userObj->uploadPhoto(3);
	echo $resp;
}



?>