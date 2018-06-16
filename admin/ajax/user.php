<?php
include('../classes/adminClass.php');
$adminObj=new Admin();

/*****************SIGN IN****************************************/
if(isset($_POST['action']) && $_POST['action']=='userSignIN'){
	$email_id=$_POST['signInEmailId'];
	$password=$_POST['signInPassword'];
	echo $result=$adminObj->adminSignIn($email_id , $password );
	exit;
}
?>
