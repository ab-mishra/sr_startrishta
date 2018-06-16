<?php

require_once 'config.php';
require_once 'lib/facebook/facebook.php';

class Social{
  
 function facebook(){
     $facebook = new Facebook(array(
		'app_id' => '1828270767489156',
	    'app_secret' => '27fee22bb6f0ae597bca4b14eade84c1',
	    'default_graph_version' => 'v2.9'
	));
			//get the user facebook id		
			$user = $facebook->getUser();
	 //echo $user;
	 //die();
			if($user){
				try{
					//get the facebook user profile data
					$user_profile = $facebook->api('/me?fields=id,name,email,gender');
					//logout url
					$params = array('next' => BASE_URL.'logout.php');
					
					$userQuery = mysql_query("SELECT * FROM sr_user_login WHERE email_id = '".$user_profile['email']."' OR fb_id ='".$user_profile['email']."'") or die(mysql_error());
						if (mysql_num_rows($userQuery) > 0){
							$result = mysql_fetch_array($userQuery);
							if($result['oauth_uid'] == '' && $result['oauth_provider']== ''){
								mysql_query("UPDATE `sr_user_login` 
									set oauth_uid='".$user_profile['id']."',
									fb_id='".$user_profile['email']."',status='1', 
									oauth_provider='facebook' WHERE user_id='".$result['user_id']."'");
							}
							$_SESSION['user_id'] = $result['user_id'];	
						}
						else
						{	
							$DateTime=gmdate("Y-m-d H:i:s", time()+19800);
							$sql = "INSERT INTO `sr_user_login` set 
							oauth_uid='".$user_profile['id']."',
							fb_id='".$user_profile['email']."', 
							role_id='2', email_id='".$user_profile['email']."', 
							status='1', oauth_provider='facebook' , 
							created_on='".$DateTime."', 
							updated_on='".$DateTime."'";
							mysql_query($sql) or die(mysql_error());
							$user_id =mysql_insert_id();	
							$_SESSION['user_id'] = $user_id;
							
							//FOR FREE VIP MEMBERSHIP AND ADD ON FRIEND LIST
							if(isset($_SESSION['ref_uid']) && $_SESSION['ref_uid'] != ''){
								$ref_uid=$_SESSION['ref_uid'];
								$end_date = date("Y-m-d H:i:s", strtotime("+1 day", strtotime($DateTime)));
								$userQuery1 = mysql_query("select * from sr_user_login where md5(user_id)='".($ref_uid)."'");
								if($userQuery1 && mysql_num_rows($userQuery1)>0){
									$userData = mysql_fetch_array($userQuery1);
									//FOR FREE VIP MEMBERSHIP
									$vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$userData['user_id']."' and status=1");
									if($vipQuery && mysql_num_rows($vipQuery) == 0){
										$Query=mysql_query("INSERT INTO  sr_vip_user SET  vip_id='' , user_id='".$userData['user_id']."', start_date='".$DateTime."' , end_date='".$end_date."', status=1 , is_received=0");
									}
									//ADD ON FRIEND LIST
									$friendQuery=mysql_query("INSERT INTO sr_user_friends SET user_id='".$userData['user_id']."' , friend_id='".$_SESSION['user_id']."' , status=1 , date='".$DateTime."'");
							
								}
							}
							
						}
					$logout =$facebook->getLogoutUrl($params);
					$_SESSION['facebook_logout']=$logout;
				}catch(FacebookApiException $e){
					error_log($e);
					$user = NULL;
				}		
			}
	 else
	 {
		 echo $user;
		 die();
	 }
			if(empty($user)){
			  //login url	
			  $loginurl = $facebook->getLoginUrl(array(
							'scope'			=> 'email, publish_actions, user_birthday, user_location, user_work_history, user_hometown, user_photos',
							'redirect_uri'	=> BASE_URL.'login.php?facebook',
							'display'=>'popup'
							));
			  header('Location: '.$loginurl);
			}

    }
	function fbConnect()
	{
		$facebook = new Facebook(array(
			'appId'		=>  APP_ID,
			'secret'	=> APP_SECRET,
			//'default_graph_version' => 'v2.9'
		));
		#get the user facebook id		
		$user = $facebook->getUser();
		if($user)
		{
			try{
				#get the facebook user profile data
				$user_profile = $facebook->api('/me?fields=id,name,email,gender');
				$userQuery = mysql_query("SELECT * FROM sr_user_login WHERE (email_id = '".$user_profile['email']."' OR fb_id ='".$user_profile['email']."') AND user_id != '".$_SESSION['user_id']."'") or die(mysql_error());
				
				if( mysql_num_rows($userQuery) )
				{
					echo "<script>alert('This facebook id is already connected with another user');</script>";
					
					$facebook->destroySession();
					$token = $facebook->getAccessToken();
					$url = 'https://www.facebook.com/logout.php?next=' . BASE_URL .
					  '&access_token='.$token;
					unset($_SESSION['userdata']);
				}
				else
				{
					mysql_query("UPDATE `sr_user_login` set oauth_uid='".$user_profile['id']."' , fb_id='".$user_profile['email']."',status='1', oauth_provider='facebook' WHERE user_id='".$_SESSION['user_id']."'");
				}
			}
			catch(FacebookApiException $e)
			{
				error_log($e);
				$user = NULL;
			}		
		}
		
		if( empty($user) )
		{
			#login url	
			$loginurl = $facebook->getLoginUrl(array(
				'scope' => 'email, publish_actions, user_birthday, user_location, user_work_history, user_hometown, user_photos',
				'redirect_uri' => BASE_URL.'login.php?fbConnect',
				'display'=>'popup'
			));
		  header('Location: '.$loginurl);
		}
    }
	
	#Facebook Unlinking
	function fbDisconnect(){
     $facebook = new Facebook(array(
		'appId'		=>  APP_ID,
		'secret'	=> APP_SECRET,
		//'default_graph_version' => 'v2.9'
		));
		//get the user facebook id		
		$user = $facebook->getUser();
		if($user){
			try{
				//get the facebook user profile data
				$user_profile = $facebook->api('/me/permissions?fields=id,name,email,gender', 'DELETE');
				$userQuery = mysql_query("SELECT * FROM sr_user_login WHERE (email_id = '".$user_profile['email']."' OR fb_id ='".$user_profile['email']."') AND user_id != '".$_SESSION['user_id']."'") or die(mysql_error());
				if( mysql_num_rows($userQuery) )
				{
					mysql_query("UPDATE `sr_user_login` set oauth_uid='".$user_profile['id']."' , fb_id='".$user_profile['email']."',status='1', oauth_provider='' WHERE user_id='".$_SESSION['user_id']."'");
					
					$facebook->destroySession();
					$token = $facebook->getAccessToken();
					$url = 'https://www.facebook.com/logout.php?next=' . BASE_URL .
					  '&access_token='.$token;
					unset($_SESSION['userdata']);
				}
				else{
					echo "<script>alert('No such account found');</script>";
				}
			}catch(FacebookApiException $e){
				error_log($e);
				$user = NULL;
			}		
		}
		if(empty($user)){
		  //login url	
		  $loginurl = $facebook->getLoginUrl(array(
						'scope'			=> 'email, publish_actions, user_birthday, user_location, user_work_history, user_hometown, user_photos',
						'redirect_uri'	=> BASE_URL.'login.php?fbConnect',
						'display'=>'popup'
						));
		  header('Location: '.$loginurl);
		}
    }
	
	function importFb(){
     $facebook = new Facebook(array(
		'appId'		=>  APP_ID,
		'secret'	=> APP_SECRET,
		//'default_graph_version' => 'v2.9'
		));
		
		$loginurl = $facebook->getLoginUrl(array(
						'scope'			=> 'email, publish_actions, user_birthday, user_location, user_work_history, user_hometown, user_photos',
						'redirect_uri'	=> SITE_URL.'photos.php',
						'display'=>'popup'
						));
		  header('Location: '.$loginurl);
    }


function get_albums($facebook)
{
	$fb_user = fbird_connect($facebook);
	$myalbums = $facebook->api('/me/albums');
	return $myalbums["data"];
	$albums = get_albums($facebook);
	foreach($albums as $album)
	{
		if($album["count"] > 0)
		{
			//if the album has pictures, then do something with the album
		}
	}
}

}

?>