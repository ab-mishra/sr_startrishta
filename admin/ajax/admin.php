<?php
ini_set("display_errors",1);
include('../classes/adminClass.php');

print_r($_POST);

$adminObj=new Admin();
$admin_id=$_SESSION['ADMIN']['USER_ID'];


if(isset($_POST['action']) && $_POST['action']=='createAdmin'){
	
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email_id = $_POST['email_id'];
	$role_id = $_POST['role_id'];
	$password = $_POST['password'];
	$password1 = $_POST['password1'];
	
	$checkDuplicateEmailId = $adminObj->checkDuplicateEmailId($email_id, $edit_admin_id);
	
	if($checkDuplicateEmailId){
		echo 2;
	}else{
		$query = mysql_query("INSERT INTO sr_admin SET 
			name='".$first_name." ".$last_name."',
			email_id='".$email_id."', 
			role_id='".$role_id."', 
			password=md5('".$password."'), 
			status=1, created_by='".$admin_id."', 
			updated_by='".$admin_id."', 
			created_on=now(), 
			updated_on=now()");
		$user_id = mysql_insert_id();

		mysql_query("INSERT into sr_admin_privilege set 
		`admin_id` = '".$user_id."',
		`admin_name` = '".$first_name." ".$last_name."',
		`dashboard` = '1', 
		`power_search` = '1', 
		`user_list` = '0', 
		`ep` = '0', 
		`new_photos` = '1', 
		`moderated_photos` = '1', 
		`new_interests` = '1', 
		`photos_reported` = '1', 
		`abuse_reported` = '1', 
		`restricted_usernames` = '0', 
		`administration` = '0',
		`status` = 1,
		`created_on` = now(), 
		`updated_on` = now() ");
			
		if($query){
				
			//$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Read Photo Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
				
			echo 1;
			
		}else{
			echo 0;
		}
	}
	exit;
}


if(isset($_POST['action']) && $_POST['action']=='updateAdmin'){
	
	$edit_admin_id = $_POST['admin_id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$role_id = $_POST['role_id'];
	$password = $_POST['password'];
	$password1 = $_POST['password1'];
	
	if($password != ''){
			
		$query = mysql_query("UPDATE sr_admin SET 
			name='".$first_name." ".$last_name."',email_id='".$email_id."', role_id='".$role_id."',
			password=md5('".$password."'), status=1, 
			updated_by='".$admin_id."', 
			updated_on=now() WHERE admin_id='".$edit_admin_id."'");
		
	}else{
			
		$query = mysql_query("UPDATE sr_admin SET 
			name='".$first_name." ".$last_name."', email_id='".$email_id."', 
			role_id='".$role_id."', status=1, 
			updated_by='".$admin_id."', 
			updated_on=now() WHERE admin_id='".$edit_admin_id."'");
		
	}
	if($query){
			
		//$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Read Photo Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
			
		echo 1;
		
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='updateAdminPriv'){
	//echo "<pre>";print_r($_POST);
	$edit_admin_id = $_POST['admin_id'];
	$dashboard = $_POST['dashboard'];
	$power_search = $_POST['power_search'];
	$user_list = $_POST['user_list'];
	$ep = $_POST['ep'];
	$new_photos = $_POST['new_photos'];
	$moderated_photos = $_POST['moderated_photos'];
	$new_interests = $_POST['new_interests'];
	$photos_reported = $_POST['photos_reported'];
	$abuse_reported = $_POST['abuse_reported'];
	$restricted_usernames = $_POST['restricted_usernames'];
	$administration = $_POST['administration'];

	$query = mysql_query("UPDATE sr_admin_privilege set 
		`dashboard` = '".$dashboard."', 
		`power_search` = '".$power_search."', 
		`user_list` = '".$user_list."', 
		`ep` = '".$ep."', 
		`new_photos` = '".$new_photos."', 
		`moderated_photos` = '".$moderated_photos."', 
		`new_interests` = '".$new_interests."', 
		`photos_reported` = '".$photos_reported."', 
		`abuse_reported` = '".$abuse_reported."', 
		`restricted_usernames` = '".$restricted_usernames."', 
		`administration` = '".$administration."',
		`status` = '1',
		`created_on` = now(), 
		`updated_on` = now()
		WHERE admin_id = '".$edit_admin_id."'");
	
	if($query){
		echo 1;
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteAdmin'){
	
	$delete_admin_id = $_POST['admin_id'];
	
	
	$query = mysql_query("DELETE FROM sr_admin WHERE admin_id='".$delete_admin_id."'");
	
	if($query){
		
		$query1 = mysql_query("DELETE FROM sr_admin_login_history WHERE admin_id='".$delete_admin_id."'");
		$query2 = mysql_query("DELETE FROM sr_admin_user_timestamp WHERE admin_id='".$delete_admin_id."'");
		
		//$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Read Photo Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
		
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='viewAdmin'){
	
	$view_admin_id = $_POST['admin_id'];
	
	$html ='';
	$query = mysql_query("SELECT * FROM sr_admin WHERE admin_id='".$view_admin_id."'");
	
	if($query){
		
		$result = mysql_fetch_assoc($query);
		
		$html .= '<table class="powersearch-table table-striped table no-margin-bottom">
					<tbody>
						<tr>
							<td><b>First Name</b></td>
							<td>'.$result['first_name'].'</td>
						</tr>
						<tr>
							<td><b>Last Name</b></td>
							<td>'.$result['last_name'].'</td>
						</tr>
						<tr>
							<td><b>Email Id</b></td>
							<td>'.$result['email_id'].'</td>
						</tr>
						<tr>
							<td><b>Role</b></td>
							<td>'.$adminObj->getAdminRole($result['role_id']).'</td>
						</tr>
					</tbody>
				</table>';
	
	}
	echo $html;
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='sendMultiMail'){

	$uid=$_POST['valemail'];
	$bodymsg=$_POST['bodymsg'];
    foreach($uid as $emname)
    {
        $email = new Emailclass();
        $email->mailaccount='vibescom';
        $email->to=$emname;
        $email->toname='Startrishta User';
        $email->bcc='';
        $email->from="info@startrista.com";
        $email->fromname="Startrishta";
        $email->subject="Startrista Mailer Subject";
        $email->body.=$bodymsg;
        $email_response = $email->sendemail();
        print_r($email_response);
        if($email_response == "1")
        {
            echo $success=1;
        }
        else
        {
            echo $success=0;
        }

    }
	// print_r($bodymsg);


}

?>
