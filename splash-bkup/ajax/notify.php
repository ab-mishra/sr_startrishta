<?php
require('../classes/user_class.php');
$userObj=new User();

if(isset($_POST['action']) && $_POST['action']=='notify'){
	$email_id=$_POST['email_id'];
	$country=$_POST['country'];
	$gender=$_POST['gender'];
	echo $result=$userObj->notifyUser($email_id , $country ,$gender , $globalDateTime);
	exit;

}
?>