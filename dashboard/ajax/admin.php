<?php
include('../classes/adminClass.php');
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
		$query = mysql_query("INSERT INTO sr_admin SET first_name='".$first_name."',email_id='".$email_id."', last_name='".$last_name."', role_id='".$role_id."', password=md5('".$password."'), status=1, created_by='".$admin_id."',  	updated_by='".$admin_id."', created_on=now(), updated_on=now()");
			
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
			
		$query = mysql_query("UPDATE sr_admin SET first_name='".$first_name."',email_id='".$email_id."', last_name='".$last_name."', role_id='".$role_id."',password=md5('".$password."'), status=1, updated_by='".$admin_id."', updated_on=now() WHERE admin_id='".$edit_admin_id."'");
		
	}else{
			
		$query = mysql_query("UPDATE sr_admin SET first_name='".$first_name."',email_id='".$email_id."', last_name='".$last_name."', role_id='".$role_id."', status=1, updated_by='".$admin_id."', updated_on=now() WHERE admin_id='".$edit_admin_id."'");
		
	}
	if($query){
			
		//$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Read Photo Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
			
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


?>
