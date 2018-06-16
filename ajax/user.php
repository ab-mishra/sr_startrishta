<?php
require('../classes/user_class.php');
$userObj=new User();

/*****************SIGN UP****************************************/
if(isset($_POST['action']) && $_POST['action']=='userSignUp'){
	$email_id=$_POST['signUpEmailId'];
	$password=$_POST['signUpPassword'];
	$ref_uid=$_POST['ref_uid'];
	echo $result=$userObj->userSignUp($email_id, $password, $ref_uid);
	exit;
}
/*****************SIGN IN****************************************/
if(isset($_POST['action']) && $_POST['action']=='userSignIN'){
	$email_id=$_POST['signInEmailId'];
	$password=$_POST['signInPassword'];
	$rememberMe=$_POST['rememberMeCheckbox'];
	echo $result=$userObj->userSignIn($email_id , $password , $rememberMe);
	exit;
}
if(isset($_POST['action']) && $_POST['action']=='checkEmailDuplicate'){
	$email_id=$_POST['email_id'];
	echo $result=$userObj->checkEmailDuplicate($email_id);
	exit;
}
/*Updates by Chitra, 8/06/2017 */
/*****************SUSPEND USER****************************************/
if(isset($_POST['action']) && $_POST['action']=='checkSuspend'){
   // print_r($_POST);die;
    $user_id=$_SESSION['user_id'];
    $chkFlag = 'suspend';
    echo $result=$userObj->isSuspendUser($user_id,$chkFlag);
    exit;
}
/*****************DELETED USER****************************************/
if(isset($_POST['action']) && $_POST['action']=='checkDeleted'){
    $user_id=$_SESSION['user_id'];
    $chkFlag = 'deleted';
    echo $result=$userObj->isDeletedUser($user_id,$chkFlag);
    exit;
}

#Signup account verification
if( isset($_REQUEST['action'],$_REQUEST['email'],$_REQUEST['code']) and !empty($_REQUEST['code']) and  !empty($_REQUEST['email']) and ($_REQUEST['action']=='verifySignUp') )
{
	//$count = 0;
	$query = mysql_query("select * from sr_user_login where 
		md5(email_id)='".trim($_REQUEST['email'])."' ");
    $count = mysql_num_rows($query);//die;
    if( $count>0 )
	{
        $data = mysql_fetch_array($query);
        $sqlUpdate = mysql_query("update sr_user_login set status='1' 
        	where user_id='".$data['user_id']."' ");
        echo ($sqlUpdate)?'Congratulation! You have been successfully verified':'Network error. Please try again.';
    }
	else{
		echo "Verification link has expired";	
	}
	//echo "<script>window.location='".SITEURL."index.php'</script>";
}

/******************************RESEND REGISTRATION VERIFICATION MAIL*************************************/
if(isset($_REQUEST['action']) && isset($_REQUEST['resendMail'])  && isset($_REQUEST['user_id']) ){
	$user_email_id=$_REQUEST['resendMail'];
	$user_id=$_REQUEST['user_id'];
	
	$update_verify_code = mt_rand();
	
	mysql_query("UPDATE sr_user_login SET 
		verify_code ='".$update_verify_code."' 
		WHERE user_id='".$user_id."'");
	
	$emailQuery=mysql_query("SELECT * FROM sr_user_login l , 
		sr_users u WHERE l.user_id=u.user_id AND l.user_id = '".$user_id."'");
	$emailResult=mysql_fetch_object($emailQuery);
	//echo "<pre>";print_r($emailResult);

	$email_id=$emailResult->email_id;
	$user_name=$emailResult->user_name;
	$verify_code=$emailResult->verify_code;
	
	$resendSignUpMail=$userObj->sendSignUpMail($email_id,$user_name,$verify_code);
	if($resendSignUpMail){
		echo 1;
	}else {
		echo 0;
	}
}
/******************************CHANGE EMAIL ADDRESS*************************************/
if(isset($_REQUEST['action'],$_REQUEST['changeMail'])and !empty($_REQUEST['changeMail']) and ($_REQUEST['action']=='changeMail')){
	$user_id=$_SESSION['user_id'];
	$email_id=$_REQUEST['changeMail'];
	$checkEmail=$userObj->checkEmailDuplicate($email_id);
		if($checkEmail){
			echo 2; // email id is already exit
			exit;
		}
	$update_verify_code = mt_rand();
	$updateQuery=mysql_query("UPDATE sr_user_login SET email_id ='".$email_id."' , verify_code ='".$update_verify_code."' WHERE user_id='".$user_id."'");
	if($updateQuery) {
		$emailQuery=mysql_query("SELECT * FROM sr_user_login l , sr_users u WHERE l.user_id=u.user_id AND l.user_id = '".$user_id."'");
		$emailResult=mysql_fetch_object($emailQuery);
		$email_id=$emailResult->email_id;
		$user_name=$emailResult->user_name;
		$verify_code=$emailResult->verify_code;
		$resendSignUpMail=$userObj->sendSignUpMail($email_id,$user_name,$verify_code);
		echo 1;
	}else {
		echo 0;
	}
}
/**********************************SEND PASSWORD RESEND MAIL*************************************/
if( isset($_REQUEST['action'],$_REQUEST['reset_email_id'])and !empty($_REQUEST['reset_email_id']) and ($_REQUEST['action']=='resetPasswordMail') )
{
	$email_id = $_REQUEST['reset_email_id'];
	$emailQuery = mysql_query("SELECT l.* , u.user_name FROM sr_user_login l , sr_users u WHERE l.user_id=u.user_id AND l.email_id = '".$email_id."'");
	
	if( mysql_num_rows($emailQuery) )
	{
		$emailResult = mysql_fetch_object($emailQuery);
		$user_name = $emailResult->user_name;
		$verify_code = $emailResult->verify_code;
		$ResetPasswordMail = $userObj->sendResetPasswordMail($user_name , $email_id , $verify_code);
		if( $ResetPasswordMail )
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		echo 2;
	}
}
/**********************************CHANGE PASSWORD*************************************/
if(isset($_REQUEST['action'],$_REQUEST['reset_email_id1'])and !empty($_REQUEST['reset_email_id1']) and ($_REQUEST['action']=='changeNewPassword')){
	$email_id=$_REQUEST['reset_email_id1'];
	$new_password=$_REQUEST['new_password'];
	$PassQuery=mysql_query("UPDATE sr_user_login SET password='".md5($new_password)."' WHERE md5(email_id) = '".$email_id."'");
	if($PassQuery){
		$emailQuery=mysql_query("SELECT l.* , u.user_name FROM sr_user_login l , sr_users u WHERE l.user_id=u.user_id AND md5(l.email_id) = '".$email_id."'");
		if(mysql_num_rows($emailQuery)){
			$emailResult=mysql_fetch_object($emailQuery);
			$user_email=$emailResult->email_id;
			$userObj->sendResetPasswordConfirmationMail($user_email);
		}
		echo 1;
	}else {
		echo 0;
	}
}
/*
if(isset($_REQUEST['action'],$_REQUEST['signInEmailId'],$_REQUEST['signInPassword']) and !empty($_REQUEST['signInEmailId'])and !empty($_REQUEST['signInPassword']) and ($_REQUEST['action']=='SignIn')){
		$result[0]=$userObj->userSignIn();
		$result[1]=md5($_REQUEST['signInEmailId']);
		echo json_encode($result);
		exit;
}*/
?>