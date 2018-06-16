<?php
require('../classes/user_class.php');
$userProfileObj=new User();
$user_id=$_SESSION['user_id'];
ini_set('display_errors',0);

# Add to favourite
if(isset($_POST['action']) && $_POST['action']=='refreshgetintouch')
{
$userId=$_POST['userid'];
echo $userProfileObj->getUserActionHtml($userId ,'demo' , 1, 'other-profile');

}

if( isset($_POST['action']) && $_POST['action']=='addtofavourite' )
{
	$fav_user_id = $_POST['fav_user_id'];
	
	$favQuery = mysql_query("SELECT favourite_id from sr_user_favourites where user_id = '".$fav_user_id."' AND favourite_by = '".$user_id."'");
	if( mysql_num_rows($favQuery) == 0 )
	{
		$Query = mysql_query("INSERT INTO sr_user_favourites SET 
			user_id = '".$fav_user_id."', favourite_by = '".$user_id."', status = 1, 
			favourite_on = '".DATE_TIME."' ");
		$query2 = mysql_query("INSERT INTO sr_user_reputation SET reputation = 10 , 
			user_id = '".$fav_user_id."' , reputation_type = 9 , datetime = '".DATE_TIME."' , 
			status = '1'");
		
		$checkNotif = mysql_query("select sr_email_notification.favorite_you, 
		sr_email_notification.user_id, sr_user_login.email_id, sr_users.user_name from 
			sr_email_notification 
			JOIN sr_users on sr_users.user_id = sr_email_notification.user_id
			JOIN sr_user_login on sr_user_login.user_id = sr_email_notification.user_id 
			WHERE sr_email_notification.user_id = '".$fav_user_id ."'");// or die(mysql_error());
		$res = mysql_fetch_array($checkNotif);
		
		if(mysql_num_rows($checkNotif) > 0)
		{
			$email = $res['email_id'];
			$name = $res['user_name'];

			$profileUser = mysql_query("Select user_name, dob, user_id, profile_image 
				from sr_users where user_id = '".$user_id."' ");
			$profileUserFetch = mysql_fetch_array($profileUser);

			$objEmail = new Email();
			$objEmail->mailaccount='start_rishta';
			$objEmail->to=$email;
			$objEmail->toname = $name;
			$objEmail->from=ADMINMAIL2;
			$objEmail->fromname=Email_FROMNAME;
			$objEmail->bcc=Email_BCC;
			$objEmail->subject = 'Someone new has favorited you!';
			$objEmail->body = '<html>
			<head>
				<title></title>
				<style type="text/css">
					body {margin: 0; padding: 0; min-width: 100%!important;}
					.content {width: 100%; max-width: 600px;}
				</style>
			</head>
			<body><!-- font-family: Open Sans,sans-serif; -->
			<table width="100%" style="max-width:600px; margin:auto; " bgcolor="#E36356" border="0" cellpadding="0" cellspacing="0">
				<tr>
					<td style="padding-top:30px;">
						<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
							<tr>
								<td style="max-width:100%; width:100%; padding-top:20px;"><img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>
							</tr>
							<tr>
								<td style="text-align:center; padding-top:20px;">
									<h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">
									Hi '.$name.'</h2>
								</td>
							</tr>
							<tr>
								<td style="padding:0 30px 15px;">
									Congratulations someone new has favorited your profile!
								</td>
							</tr>

							<tr>
			                    <td style="padding:0 30px 15px;">
			                        Name: <strong>'.$profileUserFetch["user_name"].'</strong><br />
			                        Age: <strong>'.(date("Y") - date("Y", strtotime($profileUserFetch["dob"]))).' years</strong><br />
			                        <img height="100" width="100" 
			                        src="'.SITEURL.'upload/photo/'.$profileUserFetch['profile_image'].'"/>
			                    </td>
			                </tr>

			                <tr>
								<td style="padding:0 30px 15px;">
								<a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
		                        href="'.SITEURL.'account-verify.php?action=addFavourite">Click here to Login</a></td>
		                    </tr>

							<tr>
								<td style="padding:20px 30px 20px;">
									<p style="font-size:14px;">Thanks,<br>Startrishta.com Team</p>
								</td>
							</tr>
							<tr>
								<td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">
									<ul style="text-align:center; padding:0; margin:0;">
										<li style="list-style:none; display:inline-block; 
										font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
										<li style="list-style:none; display:inline-block;vertical-align: bottom;">
										<a href="https://www.facebook.com/startrishta/" target="_blank" 
										style="display:block;">
										<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>
										</li>
										<li style="list-style:none; display:inline-block; vertical-align: bottom;">
										<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">
										<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>
										</li>
									</ul>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<td>
					<img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />
				</td>
				<tr>
				</tr>
			</table>
			</body>
			</html>';
			//print_r($objEmail);exit;
			$email_response = $objEmail->sendemail();
		}
		echo ($Query)?'<a href="javascript:void(0);" style="cursor:default;" data-toggle="tooltip" data-placement="bottom"  title="Added to Favorites!"><img src="images/star.png"/></a>':0;
	}
	else{
		echo 2;
	}
}

if(isset($_POST['action']) && $_POST['action']=='removetofavourite'){
	$fav_user_id=$_POST['fav_user_id'];
	
	$Query=mysql_query("DELETE FROM sr_user_favourites WHERE user_id='".$fav_user_id."' AND favourite_by='".$user_id."'");
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
	
}

if(isset($_POST['action']) && $_POST['action']=='addtoblock'){
	$block_user_id=$_POST['block_user_id'];
	$page = $_POST['page'];
	$blockQuery=mysql_query("SELECT block_id from sr_user_block where user_id='".$block_user_id."' 
		AND block_by='".$user_id."'");
	if(mysql_num_rows($blockQuery) == 0){
		$Query=mysql_query("INSERT INTO sr_user_block SET user_id='".$block_user_id."', 
			block_by='".$user_id."',status =1,block_on= '".DATE_TIME."' ");
		if($Query){
			$userInfo = $userProfileObj->getUserInfo($block_user_id);
			$isFav = $userProfileObj->getFavoritesCount($user_id, $block_user_id);
			echo $userProfileObj->getUserActionHtml($userInfo['user_id'] ,$userInfo['user_name'] , $isFav['favcount'], $page);
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
}

if(isset($_POST['action']) && $_POST['action']=='addtolike'){
	$like_user_id=$_POST['like_user_id'];
	
	$likeQuery=mysql_query("SELECT like_id from sr_user_like where 
		user_id='".$like_user_id."' AND liked_by='".$user_id."'");
	if(mysql_num_rows($likeQuery) == 0){
		$Query=mysql_query("INSERT INTO  sr_user_like SET user_id='".$like_user_id."',liked_by='".$user_id."',status =1,liked_on= '".DATE_TIME."' ");
		//REPUTATION
		$Query2 = mysql_query("INSERT INTO sr_user_reputation SET reputation=10 , user_id='".$like_user_id."' , reputation_type=9 , datetime ='".DATE_TIME."' , status='1'");
		//***REWARDS
		$todayLikeCount = $userProfileObj->getTodayLikeCount($user_id);
		if($todayLikeCount == 15){
			$insertReward = $userProfileObj->insertReward($user_id , 3);
		}

		$checkNotif = mysql_query("select sr_email_notification.like_you, 
		sr_email_notification.user_id, sr_user_login.email_id, sr_users.user_name from 
		sr_email_notification 
		JOIN sr_users on sr_users.user_id = sr_email_notification.user_id
		JOIN sr_user_login on sr_user_login.user_id = sr_email_notification.user_id 
		WHERE sr_email_notification.user_id = '".$like_user_id ."'");
		$res = mysql_fetch_array($checkNotif);

		if(mysql_num_rows($checkNotif) > 0)
		{
			if($res['like_you'] == 1)
			{
				$email = $res['email_id'];
				$name = $res['user_name'];

				$profileUser = mysql_query("Select user_name, dob, user_id, profile_image 
					from sr_users where user_id = '".$user_id."' ");
				$profileUserFetch = mysql_fetch_array($profileUser);

				$objEmail = new Email();
				$objEmail->mailaccount='start_rishta';
				$objEmail->to=$email;
				$objEmail->toname = $name;
				$objEmail->from=ADMINMAIL2;
				$objEmail->fromname=Email_FROMNAME;
				$objEmail->bcc=Email_BCC;
				$objEmail->subject = "Someone new likes you!";
				
				$objEmail->body = '<html>
				<head>
					<title></title>
					<style type="text/css">
				    	body {margin: 0; padding: 0; min-width: 100%!important;}
				    	.content {width: 100%; max-width: 600px;}
				    </style>
				</head>
				<body><!-- font-family: Open Sans,sans-serif; -->
				<table width="100%" style="max-width:600px; margin:auto;" bgcolor="#E36356" border="0" 
				cellpadding="0" cellspacing="0">
					<tr>
						<td style="padding-top:30px;">
							<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td style="max-width:100%; width:100%; padding-top:20px;">
									<img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>
								</tr>
								<tr>
									<td style="text-align:center; padding-top:20px;">
										<h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">
										Hi '.$name.' </h2>
									</td>
								</tr>
								<tr>
				                    <td style="padding:0 30px 15px;">
				                        Congratulations someone wants to meet up with you! 
				                        Login to your profile and start chatting with them now!
				                    </td>
				                </tr>
				                <tr>
				                    <td style="padding:0 30px 15px;">
				                        Name: <strong>'.$profileUserFetch["user_name"].'</strong><br />
				                        Age: <strong>'.(date("Y") - date("Y", strtotime($profileUserFetch["dob"]))).' years</strong><br />
				                        <img height="100" width="100" src="'.SITEURL.'upload/photo/'.$profileUserFetch['profile_image'].'"/>
				                    </td>
				                </tr>
				                <tr>
									<td style="padding:0 30px 15px;">
									<a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
			                        href="'.SITEURL.'account-verify.php?action=likeProfile">Click here to Login</a></td>
			                    </tr>

								<tr>
									<td style="padding:20px 30px 20px;">
										<p style="font-size:14px;">Thanks,<br>Startrishta.com Team</p>
									</td>
								</tr>
								<tr>
									<td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">
										<ul style="text-align:center; padding:0; margin:0;">
											<li style="list-style:none; display:inline-block; 
											font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
											<li style="list-style:none; display:inline-block;vertical-align: bottom;">
											<a href="https://www.facebook.com/startrishta/" target="_blank" 
											style="display:block;">
											<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>
											</li>
											<li style="list-style:none; display:inline-block; vertical-align: bottom;">
											<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">
											<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>
											</li>
										</ul>
									</td>
								</tr>
							</table>
						</td>
					</tr>
						<td>
							<img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />
						</td>
					<tr>
					</tr>
				</table>
				</body>
				</html>';
				//echo "<pre>";print_r($objEmail);exit;
				$email_response = $objEmail->sendemail();
			}
		}
		
		if($Query){

			$likeQuery1=mysql_query("SELECT like_id from sr_user_like where user_id='".$user_id."' AND liked_by='".$like_user_id."'");
			if(mysql_num_rows($likeQuery1)){

				$checkNotifMatch = mysql_query("select sr_email_notification.new_match, 
				sr_email_notification.user_id, sr_user_login.email_id, sr_users.user_name from 
				sr_email_notification 
				JOIN sr_users on sr_users.user_id = sr_email_notification.user_id
				JOIN sr_user_login on sr_user_login.user_id = sr_email_notification.user_id 
				WHERE 
				sr_email_notification.user_id = '".$user_id ."'
				OR
				sr_email_notification.user_id = '".$like_user_id ."'
				");
				if(mysql_num_rows($checkNotifMatch) > 0)
				{
					while($res1 = mysql_fetch_assoc($checkNotifMatch))
					{
						if($res1['new_match'] == 1)
						{
							$email = $res1['email_id'];
							$name = $res1['user_name'];
							$user = $res1['user_id'];

							$profileUser = mysql_query("Select user_name, dob, user_id, profile_image 
								from sr_users where user_id = '".$user."' ");
							$profileUserFetch = mysql_fetch_array($profileUser);

							$objEmail = new Email();
							$objEmail->mailaccount='start_rishta';
							$objEmail->to=$email;
							$objEmail->toname = $name;
							$objEmail->from=ADMINMAIL2;
							$objEmail->fromname=Email_FROMNAME;
							$objEmail->bcc=Email_BCC;
							$objEmail->subject = "Congratulations, you have a match!";
							//print_r($objEmail);
							$objEmail->body = '<html>
							<head>
								<title></title>
								<style type="text/css">
							    	body {margin: 0; padding: 0; min-width: 100%!important;}
							    	.content {width: 100%; max-width: 600px;}
							    </style>
							</head>
							<body><!-- font-family: Open Sans,sans-serif; -->
							<table width="100%" style="max-width:600px; margin:auto;" bgcolor="#E36356" border="0" 
							cellpadding="0" cellspacing="0">
								<tr>
									<td style="padding-top:30px;">
										<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
											<tr>
												<td style="max-width:100%; width:100%; padding-top:20px;">
												<img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>
											</tr>
											<tr>
												<td style="text-align:center; padding-top:20px;">
													<h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">
													Hi '.$name.' </h2>
												</td>
											</tr>
											<tr>
							                    <td style="padding:0 30px 15px;">
							                        Congratulations someone wants to meet up with you!
							                    </td>
							                </tr>
							                <tr>
							                    <td style="padding:0 30px 15px;">
							                        Name: <strong>'.$profileUserFetch["user_name"].'</strong><br />
							                        Age: <strong>'.(date("Y") - date("Y", strtotime($profileUserFetch["dob"]))).' years</strong><br />
							                        <img height="100" width="100" src="'.SITEURL.'upload/photo/'.$profileUserFetch['profile_image'].'"/>
							                    </td>
							                </tr>
							                <tr>
												<td style="padding:0 30px 15px;">
												<a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
						                        href="'.SITEURL.'account-verify.php?action=matchProfile">Click here to Login</a></td>
						                    </tr>

											<tr>
												<td style="padding:20px 30px 20px;">
													<p style="font-size:14px;">Thanks,<br>Startrishta.com Team</p>
												</td>
											</tr>
											<tr>
												<td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">
													<ul style="text-align:center; padding:0; margin:0;">
														<li style="list-style:none; display:inline-block; 
														font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
														<li style="list-style:none; display:inline-block;vertical-align: bottom;">
														<a href="https://www.facebook.com/startrishta/" target="_blank" 
														style="display:block;">
														<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>
														</li>
														<li style="list-style:none; display:inline-block; vertical-align: bottom;">
														<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">
														<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>
														</li>
													</ul>
												</td>
											</tr>
										</table>
									</td>
								</tr>
									<td>
										<img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />
									</td>
								<tr>
								</tr>
							</table>
							</body>
							</html>';
							//echo "<pre>";print_r($objEmail);//exit;
							$email_response = $objEmail->sendemail();
						}
					}
				}
				echo 3;
			}else {
				echo 1;
			}
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
}

if(isset($_POST['action']) && $_POST['action']=='addtounlike'){
	$unlike_user_id=$_POST['unlike_user_id'];
	
	$likeQuery=mysql_query("SELECT like_id from sr_user_like where user_id='".$unlike_user_id."' AND liked_by='".$user_id."'");
	if(mysql_num_rows($likeQuery) == 0){
		$Query=mysql_query("INSERT INTO  sr_user_like SET user_id='".$unlike_user_id."',liked_by='".$user_id."',status =0,liked_on= '".DATE_TIME."' ");
		if($Query){
			echo 1;
		}else {
			echo 0;
		}
	}else{
		echo 2;
	}
}


#Gift to user
if( isset($_POST['action']) && $_POST['action']=='giveGiftToUser' )
{
	$gift_user_id = $_POST['gift_user_id'];
	$gift_id = $_POST['gift_id'];
	$gift_msg = mysql_real_escape_string($_POST['gift_msg']);
	$private = $_POST['private_gift'];
	
	$Query = mysql_query("INSERT INTO sr_user_gift SET gift_id='".$gift_id."', message='".$gift_msg."', private='".$private."', user_id='".$gift_user_id."', status =0, gifted_by='".$user_id."', gifted_on= '".DATE_TIME."' ");
	//echo "INSERT INTO sr_user_gift SET gift_id='".$gift_id."', message='".$gift_msg."', private='".$private."', user_id='".$gift_user_id."', status =0, gifted_by='".$user_id."', gifted_on= '".DATE_TIME."' ";
	# REMOVE SERVICE COST 100
	$redeem_amount = 100;
	$user_credit = $userProfileObj->getUserCredit($user_id);
	
	if( $user_credit >= $redeem_amount )
	{
		$query = mysql_query("SELECT * FROM `sr_user_credit` WHERE user_id = '".$user_id."' AND expired_credit = 0 AND credit > used_credit ORDER BY credited_on");
		
		if( $query )
		{
			while( $result = mysql_fetch_assoc($query) )
			{
				$credit_id = $result['credit_id'];
				$credit = $result['credit'] - $result['used_credit'];
				
				if( $redeem_amount && $credit )
				{
					if( $credit < $redeem_amount )
					{
						mysql_query("UPDATE sr_user_credit SET used_credit=used_credit+'".$credit."' WHERE credit_id='".$credit_id."'");
						mysql_query("INSERT INTO sr_user_credit_redeem SET credit_id='".$credit_id."' , credit='".$credit."', service=5 , redeem_date='".DATE_TIME."'");
						$redeem_amount = $redeem_amount - $credit;
					}
					else
					{
						mysql_query("UPDATE sr_user_credit SET used_credit=used_credit+'".$redeem_amount."' WHERE credit_id='".$credit_id."'");
						mysql_query("INSERT INTO sr_user_credit_redeem SET credit_id='".$credit_id."' , credit='".$redeem_amount."', service=5 , redeem_date='".DATE_TIME."'");
						$redeem_amount = 0;
					}
				}
			}
		}
	}
	
	#Mail to User
	$mailToUser = mysql_query("Select sul.email_id, su.user_name from sr_user_login sul 
	join sr_users su on su.user_id = sul.user_id 
	where sul.user_id = '".$gift_user_id."' ");
	
	if( mysql_num_rows($mailToUser)>0 )
	{
		$mailToUserFetch = mysql_fetch_array($mailToUser);
		
		#Gift By Details
		$giftbyUser = mysql_query("Select user_name, dob from sr_users where user_id = '".$user_id."' ");
		$giftbyUserFetch = mysql_fetch_array($giftbyUser);
		
		#Gift Image
		$giftDet = $userProfileObj->getGiftByID($gift_id);
		$objEmail = new Email();
		$objEmail->mailaccount='start_rishta';
		$objEmail->to=$mailToUserFetch['email_id'];
		$objEmail->from=ADMINMAIL2;
		$objEmail->fromname=Email_FROMNAME;
		//$objEmail->bcc=Email_BCC;
		$objEmail->subject = 'Startrishta: You\'ve received a new gift!';
		$objEmail->body = '<html>
			<head>
			    <title></title>
			    <style type="text/css">
			        body {margin: 0; padding: 0; min-width: 100%!important;}
			        .content {width: 100%; max-width: 600px;}
			    </style>
			</head>
			<body><!-- font-family: Open Sans,sans-serif; -->
			<table width="100%" style="max-width:600px; margin:auto; " bgcolor="#E36356" border="0" cellpadding="0" cellspacing="0">
			    <tr>
			        <td style="padding-top:30px;">
			            <table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">
			                <tr>
			                    <td style="max-width:100%; width:100%; padding-top:20px;"><img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>
			                </tr>
			                <tr>
			                    <td style="text-align:center; padding-top:20px;">
			                        <h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">Hi '.$mailToUserFetch["user_name"].'</h2>
			                    </td>
			                </tr>
			                <tr>
			                    <td style="padding:0 30px 15px;">
			                        Congratulations, it looks like you\'ve received a new gift! Why don\'t you repay the favour and let them know you are interested!<br/><br/>
			                    </td>
			                </tr>

			                <tr>
			                    <td style="padding:0 30px 15px;">
			                        Name: <strong>'.$giftbyUserFetch["user_name"].'</strong><br />'.$giftDet["gift"].'
			                        Age: <strong>'.(date("Y") - date("Y", strtotime($giftbyUserFetch["dob"]))).' years</strong><br />
			                        <img src="'.SITEURL.'images/'.$giftDet[0]['gift'].'"/><br /><br />
			                        <a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
			                        href="'.SITEURL.'account-verify.php?action=newGift">Click here to Login</a><br/><br/>
			                    </td>
			                </tr>

			                <tr>
			                    <td style="padding:20px 30px 20px;">
			                        <p style="font-size:14px;">Thanks,<br>Startrishta.com Team</p>
			                    </td>
			                </tr>
			                <tr>
			                    <td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">
			                        <ul style="text-align:center; padding:0; margin:0;">
										<li style="list-style:none; display:inline-block; 
										font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
										<li style="list-style:none; display:inline-block;vertical-align: bottom;">
										<a href="https://www.facebook.com/startrishta/" target="_blank" 
										style="display:block;">
										<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>
										</li>
										<li style="list-style:none; display:inline-block; vertical-align: bottom;">
										<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">
										<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>
										</li>
									</ul>
			                    </td>
			                </tr>
			            </table>
			        </td>
			    </tr>
			    <td>
			        <img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />
			    </td>
			    <tr>
			    </tr>
			</table>
			</body>
			</html>';
		//print_r($objEmail);exit;
		 $email_response = $objEmail->sendemail();
		//return $email_response;
	}
	
	/* #STICKERS Most Generous
	$sickerQuery =mysql_query("SELECT user_sticker_id FROM sr_user_sticker WHERE sticker_id = 6 AND user_id = '".$user_id."'");
	if(mysql_num_rows($sickerQuery) == 0) {
		$giftQuery=mysql_query("SELECT user_gift_id FROM sr_user_gift WHERE gifted_by = '".$user_id."' AND gifted_on > DATE_SUB(NOW(), INTERVAL 1 WEEK)");
		$giftCount=mysql_num_rows($giftQuery);
		if($giftCount >= 2){
			mysql_query("INSERT INTO `sr_user_sticker` SET sticker_id = 6 , user_id = '".$user_id."' , awarded_on ='".DATE_TIME."'");
		}
	} */
	//echo 1;
	if($query)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	//echo ($Query)?1:0;
}

if(isset($_POST['action']) && $_POST['action']=='reportUser'){
	$report_user_id=$_POST['report_user_id'];
	$reason=mysql_real_escape_string($_POST['reason']);
	$description=mysql_real_escape_string($_POST['description']);
	$block_user=mysql_real_escape_string($_POST['block_user']);
	
	$Query=mysql_query("INSERT INTO sr_user_report SET user_id='".$report_user_id."',reason='".$reason."',description='".$description."',status =1 ,reported_by='".$user_id."',reported_on= '".DATE_TIME."'");
	
	if($block_user == 1){
		$blockQuery=mysql_query("SELECT block_id from sr_user_block where user_id='".$report_user_id."' AND block_by='".$user_id."'");
		if(mysql_num_rows($blockQuery) == 0){
			$Query=mysql_query("INSERT INTO sr_user_block SET user_id='".$report_user_id."',block_by='".$user_id."',status =1,block_on= '".DATE_TIME."' ");
		}
	}
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}

?>