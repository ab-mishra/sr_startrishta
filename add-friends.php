<?php 
require('classes/profile_class.php');
$page='profile-visitor';
$userProfileObj=new User();

require_once('include/header.php');

//#########################################GMAIL
$error='';
$clientid =	'889325049526-j6sc10m2ui8r35jguag9uqer71kjr9ru.apps.googleusercontent.com';
$clientsecret = 'bW_K9pJBJKsQHpiiqNdaWa1v';
$redirecturi = 'https://www.startrishta.com/add-friends.php'; //Add your redirect URl	
$maxresults	=	 1000;
function curl($url, $post = "") {
	 $curl = curl_init();
	 $userAgent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)';
	 curl_setopt($curl, CURLOPT_URL, $url);
	 //The URL to fetch. This can also be set when initializing a session with curl_init().
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	 //TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
	 curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 5);
	 //The number of seconds to wait while trying to connect.
	 if ($post != "") {
	 curl_setopt($curl, CURLOPT_POST, 5);
	 curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
	 }
	 curl_setopt($curl, CURLOPT_USERAGENT, $userAgent);
	 //The contents of the "User-Agent: " header to be used in a HTTP request.
	 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, TRUE);
	 //To follow any "Location: " header that the server sends as part of the HTTP header.
	 curl_setopt($curl, CURLOPT_AUTOREFERER, TRUE);
	 //To automatically set the Referer: field in requests where it follows a Location: redirect.
	 curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	 //The maximum number of seconds to allow cURL functions to execute.
	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	 //To stop cURL from verifying the peer's certificate.
	 $contents = curl_exec($curl);
	 curl_close($curl);
	 return $contents;
}
if(isset($_GET["code"])){
	$authcode = $_GET["code"];
	$fields=array(
	'code'=>  urlencode($authcode),
	'client_id'=>  urlencode($clientid),
	'client_secret'=>  urlencode($clientsecret),
	'redirect_uri'=>  urlencode($redirecturi),
	'grant_type'=>  urlencode('authorization_code') 
	);

	  $post = '';
		foreach($fields as $key=>$value)
		{
			$post .= $key.'='.$value.'&';
		}
		$post = rtrim($post,'&');
		$result = curl('https://accounts.google.com/o/oauth2/token',$post);
		$response =  json_decode($result);
		$error = $response->error;
		$accesstoken = $response->access_token;
		$url = 'https://www.google.com/m8/feeds/contacts/default/full?max-results='.$maxresults.'&alt=json&v=3.0&oauth_token='.$accesstoken;
		$xmlresponse =  curl($url);
		$contacts = json_decode($xmlresponse,true);
}

//######################################YAHOO
require_once('social/lib/yahoo/globals.php'); 
require_once('social/lib/yahoo/oauth_helper.php');
$callback = "https://www.startrishta.com/add-friends.php"; 
//$response=array();
// 'Get the request token using HTTP GET and HMAC-SHA1 signature';
$retarr = get_request_token(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, $callback, false, true, true);
if(isset($_GET['oauth_verifier'])){
	$request_token           =   $_SESSION['request_token'];
	$request_token_secret   =   $_SESSION['request_token_secret'];
	$oauth_verifier        =   $_GET['oauth_verifier']; 
	// Get the access token using HTTP GET and HMAC-SHA1 signature 
	$retarray = get_access_token_yahoo(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, $request_token, $request_token_secret, $oauth_verifier, false, true, true); 
	if (! empty($retarray)) { 
		list($info, $headers, $body, $body_parsed) = $retarray;
		if ($info['http_code'] == 200 && !empty($body)) { 
  
			$guid    =  $body_parsed['xoauth_yahoo_guid'];
			$access_token  = rfc3986_decode($body_parsed['oauth_token']) ;
			$access_token_secret  = $body_parsed['oauth_token_secret']; 

			$result = callcontact_yahoo(OAUTH_CONSUMER_KEY, OAUTH_CONSUMER_SECRET, $guid, $access_token, $access_token_secret, false, true);
			//echo "<pre>";
			//print_r($result);
			$response = $result->contacts->contact;
			//echo '====================';
			//print_r($response);
		}
	}
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Friends</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
</head>

<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
		<!--------PROMOTION PANEL--------------------->
		<?php //include('include/promotion-panel.php');?>
	
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll in">
				<div class="container">
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
			<!-----------------GET ME HERE SLIDER--------------------------------------->
			<?php include('include/header-get-me-here.php');?>
			<!-----------------GET ME HERE SLIDER END----------------------------------->
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row margin_t-60">
					<!--------------------LEFT SIDE------------------------>
						<?php include('include/profile-left-side.php');?>
					<!---------------------------------------------------------->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<!--------PROMOTION PANEL--------------------->
							<?php include('include/promotion-panel.php');?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row m-right_0">
								
								
							<?php if((!isset($_GET["code"]) || $error == 'invalid_grant') && !isset($_GET["oauth_verifier"])){?>
								<!--############################FIND FRIEND SECTION#####################-->	
									<div class="profile_view rated margin-b20 rh-height">
										<div class="fav_container">
											<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<div class="content-1 margin-b20">
												<div class="thumb-like raising"><img src="images/icon-like-1.png" /></div>
												<div class="thumb-like-content padding-l20">
													<p><a href="friends.php" class="color-green"><b>Find your friends!</b></a> </p>
													<p>Invite people you know to join Startrishta!</p>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="invite_container">
										<!-- ########################################GAMIL############################### -->
											<div class="invite_container_inner">
											
												<a href="https://accounts.google.com/o/oauth2/auth?client_id=<?php print $clientid; ?>&redirect_uri=<?php print $redirecturi; ?>&scope=https://www.google.com/m8/feeds/&response_type=code" style="text-decoration: none">
													<img src="images/gmail.png" class="img-responsive" />
												</a>
												 <!-- <button class="g-signin"
													  data-scope="email"
													  data-clientid="243959547185-qio5an2n4337a2csltnni1g2lq4e1mng.apps.googleusercontent.com"
													  data-callback="onSignInCallback"
													  data-theme="dark"
													  data-cookiepolicy="single_host_origin">
												  </button>-->
											</div>
										
										<!-- ########################################OUTLOOK############################### 
											<div class="invite_container_inner">
												<a href=""><img src="images/outlook.png" class="img-responsive" /></a>
											</div>
										
										<!-- ########################################HOTMAIL############################### 
											<div class="invite_container_inner">
												<a href=""><img src="images/hotmail.png" class="img-responsive" /></a>
											</div>
										
										<!-- ########################################YAHOO############################### -->
											<div class="invite_container_inner">
												<?php 
												
												if ( !empty($retarr)){ 
													list($info, $headers, $body, $body_parsed) = $retarr; 
													//&& !empty($body)
													if ($info['http_code'] == 200 )
													{
														// print "Have the user go to xoauth_request_auth_url to authorize your app\n" . 
														//  rfc3986_decode($body_parsed['xoauth_request_auth_url']) . "\n"; 
														$_SESSION['request_token'] = $body_parsed['oauth_token'];
														$_SESSION['request_token_secret']  = $body_parsed['oauth_token_secret']; 
														$_SESSION['oauth_verifier'] = $body_parsed['oauth_token']; 
														echo '<a href="'.urldecode($body_parsed['xoauth_request_auth_url']).'" >
																<img src="images/yahoo.png" class="img-responsive" />
															</a>';
													} 
												}else{
												?>
												<a href="javascript:void(0);">
													<img src="images/yahoo.png" class="img-responsive" />
												</a>
												<?php } ?>
											</div>
											<div class="clearfix"></div>
										</div>
										<h4 class="align-c margin-t20 h4-1"><span class="ornage_text">Limited Promotion </span>&mdash; for every friend that joins get rewarded with 1 day <br> free VIP membership!</h4>
										<p class="align-c margin-t20">By using this service, you give Startrishta permission to import your email contacts.<br> 
										All your email contacts will be stored securely and not shared with any third party.</p>	
									</div>
								
								
			
					<?php //################################GMAIL####################################################-->
								
							}else if(isset($_GET["code"])){
								
								if(!count($contacts['feed']['entry'])){
								?>	
									<div class="profile_view rated margin-b20 rh-height d_none">
										<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
										<div class="invite_container align-c"> <img src="images/warning_icon.png"></div>
										<h4 class="align-c margin-t20">Sorry</h4>
										<p class="align-c margin-t20">We can�t find your friends in your Gmail account.<br>Why not try another account?</p>
										<p class="align-c margin-t20">
											<a href="add-friends.php" class="btn btn-danger bold" style="width:200px; margin:0 auto; height:35px; border:0;">Try another account</a>
										</p>	
									</div>
								<?php }else{?>
									<!--############################FIND FRIEND LIST#####################-->	
									<div class="profile_view rated margin-b20 rh-height">
										<div class="fav_container">
											<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<p class="margin-t20">Invite your friends to join and you get rewarded with free VIP membership!</p>
											<div class="clearfix"></div>
											<div id="" class="rs edit">
												<form>
													<div>
														<div class="radio my-radio">
															<div class="select">
																<b>Select</b>
															</div>
															<div class="swith_gq">
																<input id="selectAllFriends" class="my-radio" type="radio"  name="option">
																<label for="selectAllFriends">
																	<span>
																		<span></span>
																	</span>
																	All
																</label>
															</div>
															<div class="swith_gq">
																<input id="unselectAllFriends" class="my-radio" type="radio"  name="option">
																<label for="unselectAllFriends">
																	<span>
																		<span></span>
																	</span>
																	None
																</label>
															</div>
														</div>
													</div>
												</form>
												<div class="clearfix"></div>
											</div>
											<div class="frend-user_list">
												<div>
												<?php foreach($contacts['feed']['entry'] as $contact) {
													if($contact['gd$email'][0]['address'] != ''){
														if (isset($contact['link'][0]['href'])) {
															$url =   $contact['link'][0]['href'];
															$url = $url . '&access_token=' . urlencode($accesstoken);
															$curl = curl_init($url);
															curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
															curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
															curl_setopt($curl, CURLOPT_TIMEOUT, 15);
															curl_setopt($curl, CURLOPT_VERBOSE, true);
													 
															$image = curl_exec($curl);
															curl_close($curl);
														}
													$fullName =  $contact['gd$name']['gd$fullName']['$t'];
													
													//print_r($contact);
												?>
													<div class="frend-user_lists">
														<span class="c-bx margin-b10">
															<input class="style-checkbox check1 friendCheckbox" value="<?php echo $contact['gd$email'][0]['address'];?>-<?php echo $fullName;?>" type="checkbox">
															<span class="style-checkbox1">
																<i class="fa fa-square fa-2x"></i>
															</span>
														</span>
														<div class="frend-user_list-inner">
														<?php if($image != 'Photo not found'){?>
															<img src="<?php echo $url;?>" />
														<?php } ?>
														</div>
														<p style="word-wrap: break-word;"><?php echo $contact['gd$email'][0]['address'];?></p>
													</div>
												<?php }
												} ?>
												</div>
											
												<div class="clearfix"></div>
												<p class="align-c margin-t20">
													<a href="javascript:void(0);" class="btn btn-danger bold" style="width:150px; margin:0 auto; height:35px; border:0;" id="connectFriends">Connect</a>
												</p>
												<p class="align-c margin-t10">Or</p>
												<p class="align-c margin-t5 color-green">
													<a class="" href="add-friends.php">Check another address book</a>
												</p>
											</div>
										</div>	
									</div>
								<?php 
								}
				//##################################YAHOO##########################################################################
				###################################################################################################################
								}else if(isset($_GET["oauth_verifier"])){
									
									if(!count($response)){
								?>	
									<!--###########################IF NO USER FOUND#####################-->	
										<div class="profile_view rated margin-b20 rh-height d_none">
											<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<div class="invite_container align-c"> <img src="images/warning_icon.png"></div>
											<h4 class="align-c margin-t20">Sorry</h4>
											<p class="align-c margin-t20">We can�t find your friends in your Gmail account.<br>Why not try another account?</p>
											<p class="align-c margin-t20"><a href="" class="btn btn-danger bold" style="width:200px; margin:0 auto; height:35px; border:0;">Try another account</a></p>	
										</div>
								
							<?php 	}else{?>

									<!--############################FIND FRIEND LIST#####################-->	
									<div class="profile_view rated margin-b20 rh-height">
										<div class="fav_container">
											<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<p class="margin-t20">Invite your friends to join and you get rewarded with free VIP membership!</p>
											<div class="clearfix"></div>
											<div id="" class="rs edit">
												<form>
													<div>
														<div class="radio my-radio">
															<div class="select">
																<b>Select</b>
															</div>
															<div class="swith_gq">
																<input id="selectAllFriends" class="my-radio" type="radio"  name="option">
																<label for="selectAllFriends">
																	<span>
																		<span></span>
																	</span>
																	All
																</label>
															</div>
															<div class="swith_gq">
																<input id="unselectAllFriends" class="my-radio" type="radio"  name="option">
																<label for="unselectAllFriends">
																	<span>
																		<span></span>
																	</span>
																	None
																</label>
															</div>
														</div>
													</div>
												</form>
												<div class="clearfix"></div>
											</div>
											<div class="frend-user_list">
												<div>
												<?php 
												foreach($response as $res){
													$fieldArray = $res->fields;
													$first_name = $fieldArray[0]->value->givenName;
													$last_name = $fieldArray[0]->value->familyName;
													$image = $fieldArray[1]->value->imageUrl;
													$email =  $fieldArray[2]->value;
												?>
													<div class="frend-user_lists">
														<span class="c-bx margin-b10">
															<input class="style-checkbox check1 friendCheckbox" value="<?php echo $email;?>-<?php echo $first_name;?>" type="checkbox">
															<span class="style-checkbox1">
																<i class="fa fa-square fa-2x"></i>
															</span>
														</span>
														<div class="frend-user_list-inner">
															<img src="<?php echo $url;?>" />
														</div>
														<p style="word-wrap: break-word;"><?php echo $email;?></p>
													</div>
												<?php
												} ?>
												</div>
											
												<div class="clearfix"></div>
												<p class="align-c margin-t20">
													<a href="javascript:void(0);" class="btn btn-danger bold" style="width:150px; margin:0 auto; height:35px; border:0;" id="connectFriends">Connect</a>
												</p>
												<p class="align-c margin-t10">Or</p>
												<p class="align-c margin-t5 color-green">
													<a class="" href="javascript:void(0);">Check another address book</a>
												</p>
											</div>
										</div>	
									</div>
								
								<?php } 
								} ?>
								
								</div>
							</div>
						</div>
					</div>
					<!---------------------------------------------------------->
					</div>
				</div>
			</div>
		<!--Main Container end here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
		</div>
		
		<?php #Friends Invitation ?>
		<div id="pre-friend-invite" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog popup-w400">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title gray_1"><b>You are about to send an invitation to the following users</b></h4>
						</div>
						<div class="modal-body padding-t0">
							<div class="margin-b25">
								<p class="forget-btxt font-14 lato gray_1  padding-b15">
									<b id="pre-friend-invite-body" ></b>
								</p>
								<div class="popup_add_photo margin-t5">
									<a class="btn btn-danger bold" id="pre-friend-invite-send" href="javascript:void(0);"> Send </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<?php #Friends Invitation Confirmation ?>
		<div id="pre-friend-invite-confirm" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog popup-w400">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title gray_1"><b></b></h4>
						</div>
						<div class="modal-body padding-t0">
							<div class="margin-b25">
								<p class="forget-btxt font-14 lato gray_1  padding-b15">
									<b>Are you sure ?</b>
								</p>
								<div class="popup_add_photo margin-t5">
									<a class="btn btn-danger bold" id="pre-friend-invite-confirm-send" href="javascript:void(0);"> Send </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

<script>
$(function(){
	$("#selectAllFriends").live('click' ,function () {
		$(".friendCheckbox").each(function(){
			$('.friendCheckbox').prop('checked' , true);
		});
	});
	$("#unselectAllFriends").live('click' ,function () {
		$(".friendCheckbox").each(function(){
				this.checked = false;
		});
	});
	$('.friendCheckbox').live('click' , function(){
		if($(this).attr('checked') == 'checked'){
			$('#unselectAllFriends').prop('checked' , false);
		}else{
			$('#selectAllFriends').prop('checked' , false);
		}
	});
	
	$('#connectFriends').click(function()
	{
		var userIds = [];
		$(".friendCheckbox:checked").each(function(){
			userIds.push($(this).val());
		});
		
		if( userIds.length == 0 )
		{
			$('#error_message_header').html('');
			$('#error_message').html('Please select atleast one option');
			$('#alert_modal').modal('show');
		}
		else{
			$('#pre-friend-invite-body').html(userIds);
			$('#pre-friend-invite').modal('show');
		}
	});
	
	$('#pre-friend-invite-send').click(function()
	{
		$('#pre-friend-invite').modal('hide');
		$('#pre-friend-invite-confirm').modal('show');
	});
	
	$('#pre-friend-invite-confirm-send').click(function()
	{
		var userIds = [];
		$(".friendCheckbox:checked").each(function(){
			userIds.push($(this).val());
		});
		
		$.ajax({
			type:"POST",
			url:"ajax/add-friends.php",
			data:{action:'addFriends' , userIds:userIds},
			success:function(result){
				//if(result==1){
					window.location.href='add-friends.php';
				/*}else{
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');
				}*/
			}
		});
		return false;
	});

});

</script>

	<script>
		/*$(window).load(function(){
			//$("#alert_modal_congratulation").modal("show");
			//NEW LIKE-ME PAGE
			var rh = $(".rh-height").height();
			var lh = $(".lh-height").height();
			if(lh > rh){
				$(".rh-height").height((lh)-50);
			} else{ $(".lh-height").height(rh); }
		});*/
	</script>
	
<!-- <script src = "https://plus.google.com/js/client:platform.js" async defer></script>
	<script>
  /**
   * Handler for the signin callback triggered after the user selects an account.
   */
  function onSignInCallback(resp) {
    gapi.client.load('plus', 'v1', apiClientLoaded1);
  }

  /**
   * Sets up an API call after the Google API client loads.
   */
  function apiClientLoaded() {
    gapi.client.plus.people.get({userId: 'me'}).execute(handleEmailResponse);
  }

  function apiClientLoaded1() {
    gapi.client.plus.people.list({
	'userId' : 'me',
	'collection' : 'visible'
	}).execute(handleEmailResponse1);
  }

  /**
   * Response callback for when the API client receives a response.
   *
   * @param resp The API response object with the user email and profile information.
   */
	function handleEmailResponse(resp) {
		var primaryEmail;
		for (var i=0; i < resp.emails.length; i++) {
			if (resp.emails[i].type === 'account') primaryEmail = resp.emails[i].value;
		}
		document.getElementById('responseContainer').value = 'Primary email: ' +
        primaryEmail + '\n\nFull Response:\n' + JSON.stringify(resp);
	}
	
	function handleEmailResponse1(resp) {
		var numItems = resp.items.length;
		var friendsHtml = '';
		var resultHtml = '';
		for (var i = 0; i < numItems; i++) {
			var name = resp.items[i].displayName;
			var image = resp.items[i].image.url;
			var id = resp.items[i].id;
			
			var friendsHtml = '<div class="frend-user_lists"><span class="c-bx margin-b10"><input class="style-checkbox check1" type="checkbox"><span class="style-checkbox1"><i class="fa fa-square fa-2x"></i></span></span><div class="frend-user_list-inner"><img src="'+image+'" /></div><p>'+name+'</p></div>';
			
			var resultHtml = resultHtml.concat(friendsHtml);
		}
		$('#gmail-friend-list').show();
		$('#show-gmail-friends').html(resultHtml);
	}
  </script>-->
</body>
</html>