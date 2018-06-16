<?php
include('classes/adminClass.php');
$adminObj=new Admin();

$admin_id=$_SESSION['ADMIN']['USER_ID'];
$login_time=$_SESSION['ADMIN']['LOGIN_TIME'];

mysql_query("UPDATE sr_admin SET is_online=0 WHERE admin_id='".$admin_id."'");
mysql_query("UPDATE sr_admin_login_history SET  logout_time = '".DATE_TIME."' WHERE admin_id='".$admin_id."' AND login_time = '".$login_time."'");

unset($_SESSION['ADMIN']);
 echo "<script>window.location.href='index.php'</script>";
 //echo '<script>window.location="index.php"</script>';
?>
