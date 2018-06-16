<?php
require_once('user_class.php');

class Cronmail extends User
{
	function __construct()
	{
	   $this->createConnection();
	}
	
	
	#Mail when match is found
	//Run it in one hour interval
	function matchFoundMail()
	{
		$likedBy = mysql_query("Select user_id, liked_by from sr_user_like where status = '1' and liked_on >= DATE_SUB(NOW(),INTERVAL 1 HOUR); ");
		if( mysql_num_rows($likedBy)>0 )
		{
			While( $likedByFetch = mysql_fetch_array($likedBy) )
			{
				#Fetch if user is liked in return
				$likeTo = mysql_query("Select user_id from sr_user_like where status = '1' and liked_by = '".$likedByFetch['user_id']."' and user_id = '".$likedByFetch['liked_by']."' ");
				if( mysql_num_rows($likeTo)>0 )
				{
					#Match found
					
					$user1 = $this->logDetails($likedByFetch['user_id']);
					$user1Det = $this->getUserInfo($likedByFetch['user_id']);
					
					$user2 = $this->logDetails($likedByFetch['liked_by']);
					$user2Det = $this->getUserInfo($likedByFetch['liked_by']);
					
					$mailParam = array();
					$mailParam['subject'] = 'StartRishta: Congratulations, you have a match!';
					$mailParam['toAddress'] = $user1['email_id'];
					$mailParam['mailContent'] = "<tr>
						<th width='48%' colspan='2' style='padding: 8px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							<h3 >Hi ".$user1Det['user_name']."</h3>
						</th>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							Congratulations someone wants to meet up with you!<br><br/><br/>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							Name: <strong>".$user2Det['user_name']."</strong><br />
							Age: <strong>".(date('Y') - date('Y', strtotime($user2Det['dob'])))." years</strong><br />
							<img src='".$this->getProfileImage($user2Det['profile_image'])."' /><br /><br />
							<a style='background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;' href='".SITEURL."user-account.php?action=matchFound'>Click here to Login</a><br/><br/>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='color:#666666;padding: 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>Thanks,<br/>Startrishta.com Team</td>
					</tr>";
					$acknowledge1 = $this->triggerMail($mailParam);
					
					#Second mail
					$mailParam['toAddress'] = $user2['email_id'];
					$mailParam['mailContent'] = "<tr>
						<th width='48%' colspan='2' style='padding: 8px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							<h3 >Hi ".$user2Det['user_name']."</h3>
						</th>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							Congratulations someone wants to meet up with you!<br><br/><br/>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							Name: <strong>".$user1Det['user_name']."</strong><br />
							Age: <strong>".(date('Y') - date('Y', strtotime($user1Det['dob'])))."</strong><br />
							<img src='".$this->getProfileImage($user1Det['profile_image'])."' /><br /><br />
							<a style='background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;' href='".SITEURL."splash?action=matchFound '>Click here to Login</a><br/><br/>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='color:#666666;padding: 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>Thanks,<br/>Startrishta.com Team</td>
					</tr>";
					$acknowledge = $this->triggerMail($mailParam);
				}
			}
			
		}
	}
	
	
	#Trigger Mail
	function triggerMail( $paramArr = array() )
	{
		if( !empty($paramArr) )
		{
			$mail = new PHPmailer;
			$mail->IsHTML(true);		
			$mail->From = ADMINMAIL2;
			$mail->FromName = 'Startrishta Support';
			$mail->AddAddress($paramArr['toAddress']);
			$mail->AddBCC(Email_BCC);
			$mail->Subject = $paramArr['subject'];
			$mail->Body = "<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
			<tr>
				<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
					<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px; border:1px solid #ddd; display:block;'>
						<tr>
							<th width='48%' colspan='2' style='padding: 15px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:right; border-bottom:1px solid #ddd;'>
								<img src='".SITEURL."/images/logo-color.png'>
							</th>
						</tr>
						".$paramArr['mailContent']."
					</table>
				</td>
			</tr>
			</table>	
			";
			$mail->WordWrap = 50; 
			$email_response = $mail->Send();
			return $email_response;
		}
	}
	
	
}
?>