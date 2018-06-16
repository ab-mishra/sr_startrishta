<?php
session_start();
//require_once 'src/Facebook/autoload.php';
require_once 'Facebook/autoload.php';
$fb = new \Facebook\Facebook([
  'app_id' => '1828270767489156',
  'app_secret' => '27fee22bb6f0ae597bca4b14eade84c1',
  'default_graph_version' => 'v2.9'
  //'default_access_token' => '{access-token}', // optional
]);

$helper = $fb->getRedirectLoginHelper();

$permissions = ['email', 'user_likes']; // optional
$loginUrl = $helper->getLoginUrl('https://www.startrishta.com/beta-dev/fb-login/Facebook/callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>