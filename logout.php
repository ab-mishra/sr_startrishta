<?php
require('classes/user_class.php');
$userObj=new User();

$user_id=$_SESSION['user_id'];
//$login_time=$_SESSION['login_time'];

mysql_query("UPDATE sr_users SET is_online=0 WHERE user_id='".$user_id."'");
//mysql_query("UPDATE sr_login_history SET  logout_time = '".DATE_TIME."' WHERE user_id='".$user_id."' AND login_time = '".$login_time."'");

if(isset($_SESSION['profile_visit'])){
	mysql_query("UPDATE sr_profile_visitors SET status=0 where user_id='".$user_id."'");
}
session_destroy();

setcookie('remember','', time()-864000, '/');// or die('unable to create cookie'); 

 echo "<script>window.location.href='index.php'</script>";
 //echo '<script>window.location="index.php"</script>';
?>