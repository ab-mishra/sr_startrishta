<?php
require('../classes/user_class.php');
$userObj=new User();


function sms_send($params, $token, $backup = false ) {

        static $content;

        if($backup == true){
            $url = 'https://api2.smsapi.com/sms.do';
        }else{
            $url = 'https://api.smsapi.com/sms.do';
        }

        $c = curl_init();
        curl_setopt( $c, CURLOPT_URL, $url );
        curl_setopt( $c, CURLOPT_POST, true );
        curl_setopt( $c, CURLOPT_POSTFIELDS, $params );
        curl_setopt( $c, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $c, CURLOPT_HTTPHEADER, array(
           "Authorization: Bearer $token"
        ));

        $content = curl_exec( $c );
        $http_status = curl_getinfo($c, CURLINFO_HTTP_CODE);

        if($http_status != 200 && $backup == false){
            $backup = true;
            sms_send($params, $token, $backup);
        }

        curl_close( $c );
        return $content;
    }
/*******************************************************************/

if(isset($_POST['action']) && $_POST['action']=='submitMobileNumber'){
	$user_id=$_SESSION['user_id'];
	$mobile_number=$_POST['mobile_number'];
	
	$digits = 6;
	$mobile_otp = rand(pow(10, $digits-1), pow(10, $digits)-1);
	$dateTime=gmdate("Y-m-d H:i:s", time()+19800);
	$otp_expire = date("Y-m-d H:i:s", strtotime("+1 Minute", strtotime($dateTime)));
	
	$updateQuery=mysql_query("UPDATE sr_users SET mobile_number ='".$mobile_number."', mobile_otp ='".$mobile_otp."', otp_expire='".$otp_expire."' WHERE user_id='".$user_id."'");
	
	if($updateQuery) {
		//$token = "Zw8hk8G497in1yKFUbBH4RQfQzNdMZ3DgRE5kknX";
		$token = "5xtYMiSLEBZXBYGFKC84H4991oAxPm9Nz34K3Uiw";
		$params = array(
			'to' => $mobile_number,
			'from' => 'Startrishta',
			'message' => "Your personal validation code to verify your Startrishta account is: $mobile_otp.",
		);

		$sms_res = sms_send($params,$token);
		//$res = explode(':' , $sms_res);
		// if($res == 'OK'){
		
		// }
		echo 1;
	}else {
		echo 0;
	}
}
/********************************************************************/
if(isset($_POST['action']) && $_POST['action']=='verifyMobileNumber'){
	$user_id=$_SESSION['user_id'];
	$mobile_otp=$_REQUEST['mobile_otp'];
	
	$userQuery = mysql_query("SELECT mobile_otp, otp_expire FROM sr_users WHERE user_id='".$user_id."'");
	$userResult=mysql_fetch_assoc($userQuery);
	
	$user_mobile_otp = $userResult['mobile_otp'];
	$user_otp_expire = $userResult['otp_expire'];
	
	if($user_mobile_otp == $mobile_otp){
		
		$updateQuery=mysql_query("UPDATE sr_users SET is_mobileVerified ='1' WHERE user_id='".$user_id."'");
	
		if($updateQuery) {
			
			echo 1;
		}else {
			echo 0;
		}
		
	}else{
		echo 2;
	}
	
	
}


 /*--------------- Mobile Unlink ------------------------*/
 if( $_POST['action'] && trim($_POST['action'])=='unlinkMobile' )
 {
	$user_id = $_SESSION['user_id'];
	$Query = mysql_query("Update sr_users set mobile_number = '', is_mobileVerified = '0', mobile_otp = '' ");
	if( $Query ){  echo 0;  }
 }

?>