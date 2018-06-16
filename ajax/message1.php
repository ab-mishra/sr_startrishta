<?php
require('../classes/user_class.php');
$userObj=new User();

if(isset($_POST['action']) && $_POST['action']=='setMessageClicked'){
	
	echo $_SESSION['msg_click'] = DATE_TIME;
	echo $_SESSION['msg_visit']= 1;
}



?>