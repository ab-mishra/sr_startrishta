<?php
/*
------------------------------------------------------
  
--------------------------------------------------------
*/
require_once("../classes/config.php");

define('BASE_URL', filter_var(SITEURL.'social/', FILTER_SANITIZE_URL));
define('SITE_URL', filter_var(SITEURL, FILTER_SANITIZE_URL));

// Visit https://code.google.com/apis/console to generate your 
// oauth2_client_id, oauth2_client_secret, and to register your oauth2_redirect_uri.
//define('CLIENT_ID','146969814672-5nbikr2pjdifr6uuh95gtkt1nope8h53.apps.googleusercontent.com');
//define('CLIENT_SECRET','HstzhqM_hFu2NKUqI5QqxUzq');
//define('REDIRECT_URI','http://www.zealthtechnologies.com/pggrabber/social/login.php?google');//example:http://localhost/social/login.php?google,http://example/login.php?google
define('APPROVAL_PROMPT','auto');
define('ACCESS_TYPE','online');

//For facebook

define("APP_ID","1828270767489156");
define("APP_SECRET","27fee22bb6f0ae597bca4b14eade84c1");

?>