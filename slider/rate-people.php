<?php
require('../classes/photo_class.php');
$userProfileObj = new Photo();
$user_id = $_SESSION['user_id'];


if( isset($_REQUEST['action']) && $_REQUEST['action']=='Rating' )
{
	$photoId = $_REQUEST['photoId'];
	$ratedValue = $_REQUEST['value'];
	$rate_photo_id = $_POST['rate_photo_id'];
	$rate_photo_count = $_POST['rate_photo_count'];
	
	$query = mysql_query("Select * from sr_photo_rating where photo_id = '".$photoId."' AND rated_by = '".$user_id."'");
	if( mysql_num_rows($query) == 0 )
	{
		$queryInsert = mysql_query("INSERT INTO sr_photo_rating SET photo_id='".$photoId."',rating='".$ratedValue."',rated_by='".$user_id."',rated_on='".DATE_TIME."',updated_on='".DATE_TIME."'");
	}
	else{
		$queryInsert = mysql_query("UPDATE sr_photo_rating SET updated_on='".DATE_TIME."' , rating='".$ratedValue."' WHERE photo_id='".$photoId."' AND rated_by='".$user_id."'");
	}
	
	#REWARDS
	$todayPhotoRateCount = $userProfileObj->getTodayPhotoRateCount($user_id);
	if( $todayPhotoRateCount == 30 )
	{
		$insertReward = $userProfileObj->insertReward($user_id , 2);
	}
	
	if( $rate_photo_count == 1 )
	{
		mysql_query("UPDATE sr_user_photo SET rate_status=1 WHERE photo_id='".$rate_photo_id."'");
	}
	
	
	#Mail to user his/her photo got rating more than 8
	if( $ratedValue>8 )
	{
		$mailToUser = mysql_query("Select sul.email_id, su.user_name from sr_user_login sul 
		join sr_user_photo sup on sup.user_id = sul.user_id 
		join sr_users su on su.user_id = sul.user_id 
		where sup.photo_id = '".$photoId."' ");
		
		if( mysql_num_rows($mailToUser)>0 )
		{
			$mailToUserFetch = mysql_fetch_array($mailToUser);


			$objEmail = new Email();
			$objEmail->mailaccount='start_rishta';
			$objEmail->to=$mailToUserFetch['email_id'];
			$objEmail->from=ADMINMAIL2;
			$objEmail->fromname=Email_FROMNAME;
			$objEmail->bcc=Email_BCC;
			$objEmail->subject = "Startrishta: Someone New has rated your photo!";
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
					New people have rated your photos! Login to your profile and take a look.<br /><br /><br />
								<a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" href="'.SITEURL.'rated-me.php">Click here to Login</a><br/><br/>
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
							<li style="list-style:none; display:inline-block; font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>
							<li style="list-style:none; display:inline-block; vertical-align: bottom;"><a href="#" target="_blank" style="display:block;"><img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a></li>
							<li style="list-style:none; display:inline-block; vertical-align: bottom;"><a href="#" target="_blank" style="display:block;"><img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a></li>
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
			echo $email_response = $objEmail->sendemail();
			//exit;
			//return $email_response;
					}
	}
	echo ( $queryInsert )?1:0;		
}


if( isset($_REQUEST['action']) && $_REQUEST['action']=='showMeUser' )
{
	$show_me_option = $_REQUEST['show_me_option'];
	
	$query = mysql_query("UPDATE sr_users SET photo_preference='".$show_me_option."' where user_id='".$user_id."'");
	echo ($query)?1:0;
}
?>