<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id = $_SESSION['user_id'];

if(isset($_POST['action']) && $_POST['action']=='addFriends'){
	
	$emailIds = $_POST['userIds'];
	foreach($emailIds as $email_id){
		echo $result=$userObj->sendAddFriendMail($email_id , $user_id);
	}
	exit;
}
?>