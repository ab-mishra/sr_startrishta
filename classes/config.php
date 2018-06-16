<?php
//date_default_timezone_set("UTC");
date_default_timezone_set("Asia/Kolkata");
error_reporting(0);
global $monthArray;
global $globalDateTime;
$monthArray = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");

$globalDateTime=gmdate("Y-m-d H:i:s", time()+19800);
$month3 = date("Y-m-d H:i:s", strtotime("+3 months", strtotime($globalDateTime)));

define('HTTP_SERVER', 'https://www.startrishta.com/');
define('SITEURL', 'https://www.startrishta.com/beta-dev/');
#define('SITEURL', 'http://localhost/startris/');
#define('IMPORTFBURL', 'https://www.startrishta.com/social/login.php?importFb');
define('IMPORTFBURL', 'https://www.startrishta.com/beta-dev/social/login.php?importFb');
define('IMPORTFBPICS', 'https://www.startrishta.com/beta-dev/fb-login/import.php');

/*************EMAIL****************************/
#define('Email_BCC', 'shilpisingh1990@gmail.com');
define('ADMINMAIL', 'websupt@startrishta.com');
define('Email_BCC', 'chitra.bhardwaj@vibescom.in');
#define('ADMINMAIL', 'chandrika.aggarwal@vibescom.in');
define('Email_FROM', 'websupt@startrishta.com');
define('ADMINMAIL2', 'no-reply@startrishta.com');
define('Email_FROMNAME', 'Startrishta');
define('DATE_TIME', $globalDateTime);
define('MONTH3', $month3);

/*********************************************/
define("FILESIZE","10485760");
define("FIFTEENMB","14679000");
define("TENMB","10485760");
define("IMGSIZE","512000");
define("EIGHTMB","8228608");
define("FOURMB","4194304");

/***Facebbok Login**/
define("APP_ID","1828270767489156");
define("APP_SECRET","27fee22bb6f0ae597bca4b14eade84c1");
?>