<?php

require_once('user_class.php');



class Profile extends User{

	function __construct(){

	   $this->createConnection();

	}

	function userPhotoModerate($user_id){

		$photoModerateQuery = mysql_query("SELECT * FROM sr_users u, sr_user_photo p WHERE u.user_id = p.user_id AND u.user_id='".$user_id."'  AND p.status = 2 order by p.created_on desc");

		if($photoModerateQuery){

			return $photoModerateQuery;

		}else {

			return 0;

		}

	}

/**********************PROFILE EDIT***************************************/



	function addBasicInfo($user_id){

		$user_name=mysql_real_escape_string($_POST['user_name']);

		$dob=$_POST['dob'];

		$query=mysql_query("UPDATE `sr_users` SET user_name = '".$user_name."' , 
			dob = STR_TO_DATE('$dob','%d-%m-%Y')  WHERE user_id='".$user_id."'"); 

		if($query){

			return 1;

		}else {

			return 0;

		}

	}

	

	function addLocation($user_id){

		$location=mysql_real_escape_string($_POST['location']);

		$location_lat=$_POST['location_lat'];

		$location_lon=$_POST['location_lon'];

		

		$query=mysql_query("UPDATE `sr_users` SET location = '".$location."', location_lat = '".$location_lat."', location_lon = '".$location_lon."' WHERE user_id='".$user_id."'"); 

		if($query){

			return 1;

		}else {

			return 0;

		}

	}

	

	function addHereTo($user_id){

		$here_to=mysql_real_escape_string($_POST['here_to']);

		$here_age_min=$_POST['here_age_min'];

		$here_age_max=$_POST['here_age_max'];

		

		if(isset($_POST['here_with_girl']))

			$here_with_girl=1;

		else

			$here_with_girl=0;

		if(isset($_POST['here_with_guy']))

			$here_with_guy=1;

		else

			$here_with_guy=0;

		

		$query=mysql_query("UPDATE `sr_users` SET here_to = '".$here_to."' ,here_age_min = '".$here_age_min."',here_age_max = '".$here_age_max."' ,here_with_guy = '".$here_with_guy."' ,here_with_girl = '".$here_with_girl."'  WHERE user_id='".$user_id."'"); 

		if($query){

			return 1;

		}else {

			return 0;

		}

	}

	

	function addPersonalInfo($user_id){

		$sexuality=$_POST['sexuality'];

		$relationship_status=$_POST['relationship_status'];

		$star_sign=$_POST['star_sign'];

		$body_type=$_POST['body_type'];

		$complexion=$_POST['complexion'];

		$height=$_POST['height'];

		$eye_color=$_POST['eye_color'];

		$hair_color=$_POST['hair_color'];

		$language=$_POST['language'];

		$smoking=$_POST['smoking'];

		$drinking=$_POST['drinking'];

		$kids=$_POST['kids'];

		$education=mysql_real_escape_string($_POST['education']);

		$work=mysql_real_escape_string($_POST['work']);

		$income=mysql_real_escape_string($_POST['income']);

		$company=mysql_real_escape_string($_POST['company']);

		$query=mysql_query("UPDATE `sr_users` SET sexuality = '".$sexuality."' ,relationship_status = '".$relationship_status."' ,star_sign = '".$star_sign."',body_type = '".$body_type."',complexion = '".$complexion."',height = '".$height."',eye_color = '".$eye_color."',hair_color = '".$hair_color."',language = '".$language."',smoking = '".$smoking."',drinking = '".$drinking."',kids = '".$kids."',education = '".$education."',work = '".$work."',income = '".$income."',company = '".$company."' WHERE user_id='".$user_id."'"); 

		if($query){

			if($sexuality != '' AND $relationship_status != '' AND $star_sign != '' AND $body_type != '' AND $complexion != '' AND $height != '' AND $eye_color != '' AND $hair_color != '' AND $language != '' AND $smoking != '' AND $drinking != '' AND $kids != '' AND$education != '' AND $work !=''){

				$repQuery=mysql_query("SELECT * FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=1 AND status='1'");

				if(mysql_num_rows($repQuery) == 0){

					mysql_query("INSERT INTO sr_user_reputation SET reputation=5 , user_id='".$user_id."' , reputation_type=1 , datetime ='".DATE_TIME."' , status='1'");

				}

			}else{

				mysql_query("DELETE FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=1");

			}

			return 1;

		}else {

			return 0;

		}

	}

	

	function addAboutMe($user_id){

		$aboutMe=mysql_real_escape_string($_POST['aboutMe']);

		$aboutMe=trim($aboutMe);

		$query=mysql_query("UPDATE `sr_users` SET about_me = '".$aboutMe."' WHERE user_id='".$user_id."'"); 

		if($query){

			$length=strlen($aboutMe);

			if($length >= 30){

				$repQuery=mysql_query("SELECT * FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=2 AND status='1'");

				if(mysql_num_rows($repQuery) == 0){

					mysql_query("INSERT INTO sr_user_reputation SET reputation=10 , user_id='".$user_id."' , reputation_type=2 , datetime ='".DATE_TIME."' , status='1'");

				}

			}else{

				mysql_query("DELETE FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=2");

			}

			/*stickers

			$profileQuery=mysql_query("SELECT user_id FROM sr_users WHERE user_id = '".$user_id."' AND about_me != '' AND looking_for != ''");

			$profileCount=mysql_num_rows($profileQuery);

			if($profileCount){

				$sickerQuery =mysql_query("SELECT user_sticker_id FROM sr_user_sticker WHERE sticker_id = 5 AND user_id = '".$user_id."'");

				if(mysql_num_rows($sickerQuery) == 0) {

					mysql_query("INSERT INTO `sr_user_sticker` SET sticker_id = 5 , user_id = '".$user_id."' , awarded_on ='".DATE_TIME."'");

				}

			}*/

			return 1;

		}else {

			return 0;

		}

	}

	

	function addLookingFor($user_id){

		$lookingFor=mysql_real_escape_string($_POST['lookingFor']);

		$lookingFor=trim($lookingFor);

		$query=mysql_query("UPDATE `sr_users` SET looking_for = '".$lookingFor."' WHERE user_id='".$user_id."'"); 

		if($query){

			$length=strlen($lookingFor);

			if($length >= 30){

				$repQuery=mysql_query("SELECT * FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=3 AND status='1'");

				if(mysql_num_rows($repQuery) == 0){

					mysql_query("INSERT INTO sr_user_reputation SET reputation=5, user_id='".$user_id."' , reputation_type=3 , datetime ='".DATE_TIME."' , status='1'");

				}

			}else{

				mysql_query("DELETE FROM sr_user_reputation WHERE user_id='".$user_id."' AND reputation_type=3");

			}

			

			/*STICKERS

			$sickerQuery =mysql_query("SELECT user_sticker_id FROM sr_user_sticker WHERE sticker_id = 5 AND user_id = '".$user_id."'");

			if(mysql_num_rows($sickerQuery) == 0) {

				$profileQuery=mysql_query("SELECT user_id FROM sr_users WHERE user_id = '".$user_id."' AND about_me != '' AND looking_for != ''");

				$profileCount=mysql_num_rows($profileQuery);

				if($profileCount){

					mysql_query("INSERT INTO `sr_user_sticker` SET sticker_id = 5 , user_id = '".$user_id."' , awarded_on ='".DATE_TIME."'");

				}

			}*/

			return 1;

		}else {

			return 0;

		}

	}
	
	function getProfilePer($userResult){
		//print_r($userResult);
		$percentage=0;
		$add=25/4;
		if($userResult['sexuality'] != '' && $userResult['sexuality'] != 0) $percentage += $add;
		if($userResult['relationship_status'] != '' && $userResult['relationship_status'] != 0) $percentage += $add;
		if($userResult['star_sign'] != '' && $userResult['star_sign'] != 0) $percentage += $add;
		if($userResult['body_type'] != '' && $userResult['body_type'] != 0) $percentage += $add;
		if($userResult['complexion'] != '' && $userResult['complexion'] != 0) $percentage += $add;
		if($userResult['height'] != '' && $userResult['height'] != 0) $percentage += $add;
		if($userResult['eye_color'] != '' && $userResult['eye_color'] != 0) $percentage += $add;
		if($userResult['hair_color'] != '' && $userResult['hair_color'] != 0) $percentage += $add;
		if($userResult['language'] != '' && $userResult['language'] != 0) $percentage += $add;
		if($userResult['smoking'] != '' && $userResult['smoking'] != 0) $percentage += $add;
		if($userResult['drinking'] != '' && $userResult['drinking'] != 0) $percentage += $add;
		if($userResult['kids'] != '' && $userResult['kids'] != 0) $percentage += $add;
		if($userResult['education'] != '' && $userResult['education'] != 0) $percentage += $add;
		if($userResult['work'] != '' && $userResult['work'] != 0) $percentage += $add;
		if($userResult['income'] != '' && $userResult['income'] != 0) $percentage += $add;
		if($userResult['company'] != '' && $userResult['company'] != 0) $percentage += $add;
		///echo $percentage;
		return $percentage;
	}

	function getProfilePromoteDate($user_id){
		$profilePromotedDate='';
		/*echo $user_id;*/
		$query=mysql_query("SELECT redeem_id,redeem_date, DATEDIFF(now(),redeem_date) as diff FROM sr_user_credit_redeem r , sr_user_credit c 
		WHERE r.credit_id=c.credit_id AND c.user_id='".$user_id."' ORDER BY  r.redeem_date DESC LIMIT 0 , 1");
		if($query && mysql_num_rows($query)){
			$result=mysql_fetch_assoc($query);
			
			if($result['diff'] < '15'){
				$profilePromotedDate = '<li><a href="javascript:void(0);" class="parmot_profile" title="Promoted Profile '.$this->getTimeToStr($result['redeem_date']).'"></a></li>';
			}
		}
		return $profilePromotedDate;
	}
	
	function getTimeToStr($ts)
	{
	    if(!ctype_digit($ts))
			$ts = strtotime($ts);
		$diff = time() - $ts;
		if($diff == 0)
			return 'just now';
		elseif($diff > 0)
		{
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 60) return 'just now';
				if($diff < 120) return '1 minute ago';
				if($diff < 3600) return floor($diff / 60) . ' minutes ago';
				if($diff < 7200) return '1 hour ago';
				if($diff < 86400) return floor($diff / 3600) . ' hours ago';
			}
			if($day_diff == 1) return 'Yesterday';
			if($day_diff < 7) return $day_diff . ' days ago';
			if($day_diff < 31){ if(ceil($day_diff / 7)==1){return '1 week ago';}else{ return ceil($day_diff / 7) . ' weeks ago';}}
			if($day_diff < 60) return 'last month';
			return date('d F Y', $ts);
		}
		else
		{
			$diff = abs($diff);
			$day_diff = floor($diff / 86400);
			if($day_diff == 0)
			{
				if($diff < 120) return 'in a minute';
				if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
				if($diff < 7200) return 'in an hour';
				if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
			}
			if($day_diff == 1) return 'Tomorrow';
			if($day_diff < 4) return date('l', $ts);
			if($day_diff < 7 + (7 - date('w'))) return 'next week';
			if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
			if(date('n', $ts) == date('n') + 1) return 'next month';
			return date('d F Y', $ts);
		}
	}
	
	# SEND MAIL TO USERS On Profile Visitor
	function sendEmailProfileVisit($user_email='', $user_name='', $verify_code='', $visitorId = '')
	{
		$senderDet = $this->getUserInfo($user_id);
		
		$profileUser = mysql_query("Select user_name, dob, user_id, profile_image 
			from sr_users where user_id = '".$visitorId."' ");
		$profileUserFetch = mysql_fetch_array($profileUser);
		//print_r(explode(',',$user_email));
		$objEmail = new Email();
		$objEmail->mailaccount='start_rishta';
		$objEmail->to=$user_email;
		$objEmail->toname = $user_name;
		$objEmail->from=ADMINMAIL2;
		$objEmail->fromname=Email_FROMNAME;
		$objEmail->bcc=Email_BCC;
		$objEmail->subject = "New profile visitors alert!";
		
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
								Hi '.$user_name.' </h2>
							</td>
						</tr>

						<tr>
							<td style="padding:0 30px 15px;">
								Check out your most recent profile visitors! 
								Why don’t you repay the favour and let them know you are interested!
							</td>
						</tr>

						<tr>
		                    <td style="padding:0 30px 15px;">
		                        Name: <strong>'.$profileUserFetch["user_name"].'</strong><br />
		                        Age: <strong>'.(date("Y") - date("Y", strtotime($profileUserFetch["dob"]))).' years</strong><br />
		                        <img height="100" width="100" src="'.SITEURL.'upload/photo/'.$profileUserFetch['profile_image'].'"/>
		                        <br /><br /> 
		                        <a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 
		                        href="'.SITEURL.'account-verify.php?action=profileVisit">Click here to Login</a><br/><br/>
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
		//echo "<pre>";print_r($objEmail);//exit;
		$email_response = $objEmail->sendemail();
		//echo "<pre>";print_r($email_response);exit;
		//return $email_response;
	}

	function getUserInfo($user_id){
		$query=mysql_query("SELECT * FROM sr_users WHERE user_id='".$user_id."'");
		$result=mysql_fetch_assoc($query);
		return $result;
	}

	function isVerifiedUser($user_id){
		$query=mysql_query("SELECT * FROM sr_user_login WHERE sr_user_login.user_id='".$user_id."' ");//die;
		$result=mysql_fetch_assoc($query);
		$signUpDate=$result['created_on'];
		$todate = date('Y-m-d h:i:s');
		$diffOfHour = round((strtotime($todate) - strtotime($signUpDate))/3600);
		if($result['status'] == 0 && $diffOfHour >= 72){
			return 0;
		}else{
			return 1;
		}
	}

}

?>