<?php
date_default_timezone_set("Asia/Kolkata");
global $monthArray;
global $globalDateTime;
$monthArray = array("1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May","6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec");

$globalDateTime=gmdate("Y-m-d H:i:s", time()+19800);



/*************EMAIL****************************/
define('Email_BCC', 'nishith.srivastava@vibescom.in');
define('Email_FROM', 'Start Rishta');
define('Email_FROMNAME', 'Start Rishta');
?>