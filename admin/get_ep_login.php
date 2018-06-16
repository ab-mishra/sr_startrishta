<?php
include('classes/epClass.php');
$epObj = new Entertainment();
$uid=$_GET['uid'];
//$epObj->doEPLogin($uid);
if(isset($_SESSION['user_id']) && $_REQUEST['action']=='rate-photos')
{
    unset($_SESSION['user_id']);
    $_SESSION['user_id'] = $uid;
//echo $uid;
    echo "<script>window.location.href='".SITEURL."rate-photos.php'</script>";
}
elseif(!isset($_SESSION['user_id']) && $_REQUEST['action']=='rate-photos')
{
    $_SESSION['user_id'] = $uid;
//echo $uid;
    echo "<script>window.location.href='".SITEURL."rate-photos.php'</script>";
}

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
    $_SESSION['user_id'] = $uid;
//echo $uid;
    echo "<script>window.location.href='".SITEURL."user-message.php'</script>";
}
elseif(!isset($_SESSION['user_id']))
{
    $_SESSION['user_id'] = $uid;
//echo $uid;
    echo "<script>window.location.href='".SITEURL."user-message.php'</script>";
}

//header("Location:".SITEURL."user-message.php");
//header("Location:../user-message.php");