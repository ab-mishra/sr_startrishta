<?php
session_start();
require_once 'Facebook/autoload.php';
require_once("../classes/user_class.php");
$fb = new \Facebook\Facebook([
  'app_id' => APP_ID,
  'app_secret' => APP_SECRET,
  'default_graph_version' => 'v2.9'
  //'default_access_token' => '{access-token}', // optional
]);

$userObj = new User();
$helper = $fb->getRedirectLoginHelper();


try {
  $accessToken = $helper->getAccessToken();
}
catch(\Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  //echo 'Graph returned an error: ' . $e->getMessage();
  echo "<script>
     window.location.href='".SITEURL."index.php?access=".base64_encode("fb_graph_error")."';
     </script>";
  exit;
}
catch(\Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
  echo "<script>
     window.location.href='".SITEURL."index.php?access=".base64_encode("fb_error")."';
     </script>";
  exit;
}

if (isset($accessToken)) {
    // Logged in!
    $_SESSION['facebook_access_token'] = (string) $accessToken;
    // Now you can redirect to another page and use the
    // access token from $_SESSION['facebook_access_token']
}
// Am Successfully Logged In Here

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email,birthday,link,gender,locale,timezone,updated_time', $accessToken);
  //print_r($response);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  //echo 'Graph returned an error: ' . $e->getMessage();
  echo "<script>
     window.location.href='".SITEURL."index.php?access=".base64_encode("fb_graph_error")."';
     </script>";
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  //echo 'Facebook SDK returned an error: ' . $e->getMessage();
  echo "<script>
     window.location.href='".SITEURL."index.php?access=".base64_encode("fb_error")."';
     </script>";
  exit;
}
//print_r($response);
echo "<pre>";
echo "</pre>";
$request_type = base64_decode($_REQUEST['accesstype']);

$me = $response->getGraphUser()->asArray();
//print_r($me);
//echo "https://graph.facebook.com/".$me['id']."/picture?width=480&height=480";
try {
    $pic = $fb->get('/' . $me['id'] . '/picture?width=480&height=480',$accessToken);
    //print_r($pic);
    $picArray=$pic->getHeaders();
/*    echo "<pre>";
    print_r($picArray);
    echo "</pre>";
    echo $picArray['Location'];*/
}
catch(Facebook\Exceptions\FacebookSDKException $e) {
    //echo 'Facebook SDK returned an error: ' . $e->getMessage();

    echo "<script>
     window.location.href='".SITEURL."index.php?access=".base64_encode("fb_error")."';
     </script>";
    exit;
}
$me['image'] = $picArray['Location'];
/*echo "<pre>";
print_r($me);
echo "</pre>";*/
//$albums = $fb->get('/me/albums', $accessToken)->getGraphEdge()->asArray();
//print_r($albums);
$resp = $userObj->userSignUp( $me['email'] , "" , "", "facebook", $me);

if($resp == 1 || $resp == 2)
{

  echo "<script>window.location.href = '".SITEURL."home.php';</script>";
}
else if($resp == 3){
  echo "<script>
   window.location.href='".SITEURL."index.php?access=".base64_encode("denied")."';
   </script>";
}
else if($resp == 4){
  echo "<script>
   window.location.href='".SITEURL."index.php?access=".base64_encode("deleted")."';
   </script>";
}
else{
  echo "<script>
   window.location.href='".SITEURL."index.php?access=".base64_encode("error")."';
   </script>";
}

/*$output = '<h1>Facebook Profile Details </h1>';
$output .= '<img src="'.$me['picture']['url'].'">';
$output .= '<br/>Facebook ID : ' . $me['id'];
$output .= '<br/>Name : ' . $me['name'];
$output .= '<br/>First Name : ' . $me['first_name'];
$output .= '<br/>Last Name : ' . $me['last_name'];
$output .= '<br/>Email : ' . $me['email'];
$output .= '<br/>Gender : ' . $me['gender'];
$output .= '<br/>Age : ' . $me['age_range'];
$output .= '<br/>Link : ' . $me['link'];
$output .= '<br/>Time Zone : ' . $me['timezone'];
$output .= '<br/>Verified : ' . $me['verified'];
$output .= '<br/>Locale : ' . $me['locale'];*/

//echo $output;
//$output .= '<br/>You are login with : Facebook';
//$output .= '<br/>Logout from <a href="logout.php?logout">Facebook</a>';
//$output .= '<br/>Access Token : <div style="font-size:12px;">' . $facebook->getAccessToken() . '</div>';
?>