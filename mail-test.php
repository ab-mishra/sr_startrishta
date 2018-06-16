<?php
include('classes/config.php');
require_once('classes/email.class.php');
require_once('classes/mailerClass.php');

$mail = new PHPmailer;
$mail->IsHTML(true);		
$mail->From = ADMINMAIL2;
$mail->FromName = Email_FROMNAME;
$mail->AddAddress('abhishekcs139@gmail.com');
$mail->AddBCC('nishith.srivastava@vibescom.in');
$mail->Subject = "StartRishta: Mail test";
$mail->Body = "<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
		<tr>
			<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
				<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px; border:1px solid #ddd; display:block;'>
					<tr>
						<th width='48%' colspan='2' style='padding: 15px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:right; border-bottom:1px solid #ddd;'>
							<img src='".SITEURL."/images/logo-color.png'>
						</th>
					</tr>
					<tr>
						<th width='48%' colspan='2' style='padding: 8px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							<h1 >Forgot your Password?</h1>
						</th>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							We received a request to reset the password for your Startrishta account <strong>".$user_email."</strong>
							<br />To reset your password, click on the link below.<br/><br/><br />
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 20px 20px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							<a style='text-decoration:none;'  href='".SITEURL."new-password.php?id=12345&code=12345'>
							<span style='background:#e74c3c; border:1px solid #170e8d; color: #fff; cursor: pointer;font-size: 13px;font-weight: 500 !important; padding: 5px 9px !important; display:block; float:left;'>Click here to reset password</span></a><br/><br/>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							Check out our <a href='".SITEURL."faq.php' style='color: #1abc9c;' >FAQ pages</a> for more information
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='padding: 4px 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left; border-bottom:1px solid #ddd;'>
							<h3 style='color:#666666; margin-top:20px; margin-bottom: 2px;'>Startrishta Support</h3>
						</td>
					</tr>
					<tr>
						<td width='48%' colspan='2' style='color:#666666;padding: 10px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>Please do not reply to this message; it was sent from an unmonitored email address.<br/> This message is a service email related to your use of Startrishta.com</td>
					</tr>
				</table>
			</td>
		</tr>
		</table>";
$mail->WordWrap=50; 
$email_response = $mail->Send();

echo "Mail Response: ".$email_response;
die;
?>