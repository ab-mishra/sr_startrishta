<?php
require_once('connection.php');
//require_once('email.class.php');
//require_once('mailerClass.php');

class User extends Connection{
	function __construct(){
	   $this->createConnection();
	}
    
	function notifyUser($email_id , $country ,$gender ,  $globalDateTime){
		$notify_query=mysql_query("SELECT * FROM sr_user_notify where email_id='".$email_id."'");
		if(mysql_num_rows($notify_query) == 0){
			$query=mysql_query("INSERT INTO sr_user_notify SET email_id='".$email_id."' , country ='".$country."' ,gender='".$gender."' ,datetime='".$globalDateTime."'");
			if($query){
				return 1;
			}else{
				return 0;
			}
		}else{
			return 2;
		}
	}
	
	function checkEmailDuplicate($email_id){
		$query=mysql_query("SELECT * FROM sr_user_login where email_id='".$email_id."'");
		if(mysql_num_rows($query) > 0){
			return 1;
		}else{
			return 0;
		}
	}
}
?>