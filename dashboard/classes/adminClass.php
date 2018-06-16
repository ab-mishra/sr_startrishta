<?php
require_once('connection.php');
require_once('email.class.php');
require_once('mailerClass.php');

class Admin extends Connection{
	function __construct(){
	   $this->createConnection();
	}
    
    
    function getAdminRole($role_id){
		$role_name='';
		$query=mysql_query("SELECT * FROM  sr_role WHERE role_id='".$role_id."'");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$role_name = $result['role_name'];
			}
		}
		return $role_name;
		
	}
	function getAllAdmin(){
		$array = array();
		$query=mysql_query("SELECT * FROM  sr_admin WHERE status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	} 
	function getAllSystemId(){
		$array = array();
		$query=mysql_query("SELECT u.user_id FROM sr_users u , sr_user_login ul WHERE u.user_id=ul.user_id LIMIT 0,7");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result['user_id'];
			}
		}
		return $array;
		
	}
    function getUserInfo($user_id){
		$array = array();
		$query=mysql_query("SELECT u.*, ul.email_id FROM sr_users u , sr_user_login ul WHERE u.user_id=ul.user_id AND u.user_id='".$user_id."'");
		if($query){
			$array=mysql_fetch_assoc($query);
		}
		return $array;
		
	}
	function getUserName($user_id){
		$user_name='';
		$query=mysql_query("SELECT user_name FROM sr_users WHERE user_id='".$user_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
			$user_name=$result['user_name'];
		}
		return $user_name;
		
	}
	function getUserEmailId($user_id){
		$email_id='';
		$query=mysql_query("SELECT email_id FROM sr_user_login WHERE user_id='".$user_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
			$email_id=$result['email_id'];
		}
		return $email_id;
		
	}
	
	
	#Get profile image
	function getProfileImage($profile_image)
	{
		if($profile_image == '')
		{
			return "../upload/profile_images/dummy-profile.png";
		}
		else if( ! file_exists("../upload/photo/thumb/$profile_image"))
		{
			return "../upload/profile_images/dummy-profile.png";
		}else
		{
			return "../upload/photo/thumb/$profile_image";
		}
	}
	
	
    #Fetch unmoderated photos
    function getNewPhotos()
	{
		$array = array();
		$query = mysql_query("SELECT * FROM sr_user_photo p, sr_users u 
		WHERE p.user_id = u.user_id AND p.status = 0 
		order by photo_id ");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
	}
	
	
	//########################MODERATED PHOTO########################
    function getUserModeratePhotos($user_id){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_user_photo WHERE status=0 AND user_id='".$user_id."'");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function deleteModeratePhoto($user_id){
		foreach($_POST['photoCheck'] as $photo_id){
		
			$query=mysql_query("UPDATE sr_user_photo SET status=2 WHERE photo_id='".$photo_id."' AND user_id='".$user_id."'");
			
		}
		if($query){
			return 1;
		}
		return 0;
	}
	function unblockModeratePhoto($user_id){
		foreach($_POST['photoCheck'] as $photo_id){
		
			$query=mysql_query("UPDATE sr_user_photo SET status=1 WHERE photo_id='".$photo_id."' AND user_id='".$user_id."'");
			
		}
		if($query){
			return 1;
		}
		return 0;
	}
	//###################MESSAGE########################################
    function getMessageUserList($user_id){
		$array = array();
		$query=mysql_query("SELECT user_name,user_id,profile_image FROM sr_users WHERE user_id IN (SELECT DISTINCT sent_by FROM sr_user_message WHERE sent_to = '".$user_id."')");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	} 
	function getMessageHistory($sent_to , $sent_by){
		$array = array();
		$query=mysql_query("SELECT u.user_id , u.user_name , m.* from sr_user_message m , sr_users u where ((sent_by='".$sent_by."' AND sent_to = '".$sent_to."') OR (sent_by='".$sent_to."' AND sent_to = '".$sent_by."')) AND m.sent_by=u.user_id ORDER BY sent_date");;
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	//###################INTEREST########################################
    function getNewInterest(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_interest WHERE status=0 order by interest_id desc");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getApproveInterest(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_interest WHERE status=1 order by interest_id desc");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getDisapproveInterest(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_interest WHERE status=2 order by interest_id desc");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUsersInterest(){
		$array = array();
		$query=mysql_query("SELECT i.interest_id , u.user_id,u.user_name FROM sr_user_interest i,sr_users u WHERE i.status=1 AND i.user_id=u.user_id");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUserInterest($user_id){
		$array = array();
		$query=mysql_query("SELECT interest_id FROM sr_user_interest WHERE status=1 AND user_id='".$user_id."'");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getInterestCategory(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_interest_category WHERE status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getInterestInfo($interest_id){
		$array = array();
		$query=mysql_query("SELECT i.interest ,ic.cat_id, ic.category, ic.icon FROM sr_interest i , sr_interest_category ic WHERE i.cat_id=ic.cat_id AND i.interest_id='".$interest_id."'");
		if($query){
			$array=mysql_fetch_assoc($query);
		}
		return $array;
		
	}
	function approveInterest($interest_id){
		$adminId=$_SESSION['ADMIN']['USER_ID'];
		$res=0;
		$query=mysql_query("UPDATE sr_interest SET status=1 WHERE interest_id='".$interest_id."'");
		if($query){
			$res=1;	
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET interest_id='".$interest_id."', activity='Approve Interest', admin_id='".$adminId."', timestamp=now() , status=1");
		}else{
			$res=0;
		}
		return $res;
	}
	function disapproveInterest($interest_id){
		$adminId=$_SESSION['ADMIN']['USER_ID'];
		$res=0;
		$query=mysql_query("UPDATE sr_interest SET status=2 WHERE interest_id='".$interest_id."'");
		if($query){
			$res=1;
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET interest_id='".$interest_id."', activity='Disapprove Interest', admin_id='".$adminId."', timestamp=now() , status=1");
		}else{
			$res=0;
		}
		return $res;
	}
	function updateApproveInterest($interest_id, $cat_id, $interest){
		$adminId=$_SESSION['ADMIN']['USER_ID'];
		$res=0;
		if($interest_id != 0 && $cat_id !=0 && $interest != ''){
			$query=mysql_query("UPDATE sr_interest SET interest='".$interest."', cat_id='".$cat_id."' WHERE interest_id='".$interest_id."'");
			if($query){
				$res=1;
				$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET interest_id='".$interest_id."', activity='Update Interest', admin_id='".$adminId."', timestamp=now() , status=1");
			}else{
				$res=0;
			}
		}
		return $res;
	}
	function disapproveUserInterest($interest_id, $user_id){
		$adminId=$_SESSION['ADMIN']['USER_ID'];
		$res=0;
		$query=mysql_query("UPDATE sr_user_interest SET status=0 WHERE interest_id='".$interest_id."'");
		if($query){
			$res=1;
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET interest_id='".$interest_id."', activity='Disapprove User Interest', admin_id='".$adminId."',user_id='".$user_id."', timestamp=now() , status=1");
		}else{
			$res=0;
		}
		return $res;
	}
	function updateUserInterest($interest_id, $cat_id, $interest, $user_id){
		$adminId=$_SESSION['ADMIN']['USER_ID'];
		$res=0;
		if($interest_id != 0 && $cat_id !=0 && $interest != ''){
			$query=mysql_query("UPDATE sr_interest SET interest='".$interest."', cat_id='".$cat_id."' WHERE interest_id='".$interest_id."'");
			if($query){
				$res=1;
				$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET interest_id='".$interest_id."', activity='Update User Interest', admin_id='".$adminId."',user_id='".$user_id."', timestamp=now() , status=1");
			}else{
				$res=0;
			}
		}
		return $res;
	}
	
	//#######################################################
	function getUnreadPhotoReported($searchKey =''){
		$array = array();
		//$query=mysql_query("SELECT * FROM sr_photo_report WHERE status=1");
		$addQuery ='';
		if($searchKey != ''){
			$addQuery = "AND (u.user_id = '".$searchKey."' OR u.email_id ='".$searchKey."')";
		}
		
		$query=mysql_query("SELECT r.* , p.user_id , p.photo FROM  `sr_photo_report` r, sr_user_photo p , sr_user_login u WHERE p.`photo_id` = r.`photo_id` AND r.status=1 AND r.is_read='0' AND r.disapprove_by_admin=0 AND p.user_id = u.user_id $addQuery ");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getReadPhotoReported($searchKey=''){
		$array = array();
		$addQuery ='';
		if($searchKey != ''){
			$addQuery = "AND (u.user_id = '".$searchKey."' OR u.email_id ='".$searchKey."')";
		}
		$query=mysql_query("SELECT r.*, p.user_id, p.photo FROM `sr_photo_report` r, sr_user_photo p, sr_user_login u  
		WHERE p.`photo_id` = r.`photo_id` AND r.is_read = '1' AND r.disapprove_by_admin = 0  AND p.user_id = u.user_id $addQuery 
		order by photo_report_id desc ");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getPhotoReported(){
		$array = array();
		$query=mysql_query("SELECT r.* FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND r.status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getUnreadUserReported(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_user_report WHERE status=1 AND is_read=0 order by user_report_id desc ");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getReadUserReported()
	{
		$array = array();
		$query = mysql_query("SELECT * FROM sr_user_report WHERE status=1 AND is_read=1 order by user_report_id desc ");
		if( $query )
		{
			while( $result = mysql_fetch_assoc($query) )
			{
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getAbuseReport(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_user_report WHERE status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getSearchUsers($searchType, $searchValue, $position, $item_per_page){
		$array = array();
		if($searchType == ''){
			$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id ORDER BY dob DESC LIMIT $position, $item_per_page");
		}else{
			if($searchType == 'online'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=1  ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'offline'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=0  ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'new-user'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` >= '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'deleted'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_deleted=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'no-photo'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image='' ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'photo'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image !='' AND u.user_id IN (SELECT user_id FROM sr_user_photo WHERE is_profileImage=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'not-verified'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'verified'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '1'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0 AND u.is_erase=0 AND u.is_deleted=0 AND u.is_account_freeze=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '2'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_account_freeze=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '3'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '4'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND (u.is_erase=1 OR u.is_deleted=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'male'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'female'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=2 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'vip'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'free'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id NOT IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'less1day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less3day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less7day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 7 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less30day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 30 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less3month'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'greater3month'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` < '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'id'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND (u.user_id LIKE '%".$searchValue."%' OR ul.email_id LIKE '%".$searchValue."%') ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
		}
		
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	function getSearchUsersCount($searchType){
		$count = 0;
		if($searchType == ''){
			$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id");
		}else{
			if($searchType == 'online'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=1  ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'offline'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=0  ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'new-user'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` >= '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'deleted'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_deleted=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'no-photo'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image='' ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'photo'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image !='' AND u.user_id IN (SELECT user_id FROM sr_user_photo WHERE is_profileImage=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			}
			if($searchType == 'not-verified'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'verified'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '1'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0 AND u.is_erase=0 AND u.is_deleted=0 AND u.is_account_freeze=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '2'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_account_freeze=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '3'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == '4'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND (u.is_erase=1 OR u.is_deleted=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'male'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'female'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=2 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'vip'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'free'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id NOT IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			}
			if($searchType == 'less1day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less3day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less7day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 7 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less30day'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 30 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'less3month'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
			if($searchType == 'greater3month'){
				$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` < '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			}
		}
		if($query){
			$count = mysql_num_rows($query);
		}
		return $count;	
	}
	function getOnlineUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getNewUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` >= '".DATE_TIME."' - INTERVAL 1 DAY");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getDeletedUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_deleted=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getNotVerifiedUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=0");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getNoProfilePhotoUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image=''");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getMaleUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users WHERE gender=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getFemaleUsers(){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_users WHERE gender=2");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	
	
	#Get User ID , Interest wise
	function getUserByInterest($interestID=0)
	{
		$query = mysql_query("Select user_id from sr_user_interest where interest_id = '".$interestID."' ");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}
	
	
	//####################POWER SEARCH##############################

    function isUserOnline($user_id){
		
		$isOnline=0;
		$query=mysql_query("SELECT * FROM sr_users WHERE user_id='".$user_id."' AND is_online=1");
		if($query){
			$result=mysql_fetch_assoc($query);
				$isOnline = $result['is_online'];
		}
		return $isOnline;
		
	}
    function isUserVerified($user_id){
		
		$isVerified=0;
		$query=mysql_query("SELECT * FROM sr_users WHERE user_id='".$user_id."' AND is_verified=1");
		if($query){
			$result=mysql_fetch_assoc($query);
				$isVerified = $result['is_verified'];
		}
		return $isVerified;
		
	}
	function isUserVip($user_id){
		$isUserVip=0;
		$query=mysql_query("SELECT id FROM sr_vip_user WHERE user_id ='".$user_id."' AND status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."'");
		if($query){
			$isUserVip = mysql_num_rows($query);
		}
			
		return $isUserVip;
	
	}
	function getSuspandedReason($user_id){
		$credit = 0;
		$query = mysql_query("SELECT reason,description FROM `sr_user_suspend` WHERE user_id = '".$user_id."' AND status=1");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$reason = $result['reason'];
				if($reason == 'Other'){
					$reason = $result['description'];
				}
			}
		}
		return $reason;
	}
	function getdeletedReason($user_id){
		$credit = 0;
		$query = mysql_query("SELECT reason,description FROM `sr_user_erased` WHERE user_id = '".$user_id."' AND status=1");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$reason = $result['reason'];
				if($reason == 'Other'){
					$reason = $result['description'];
				}
			}
		}
		return $reason;
	}
	function getUserCredit($user_id){
		$credit = 0;
		$query = mysql_query("SELECT * FROM `sr_user_credit` WHERE user_id = '".$user_id."' AND expired_credit = 0 AND (credit)*1 > (used_credit)*1 ORDER BY credited_on");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$credit += ($result['credit'] - $result['used_credit']);
			}
		}
		return $credit;
	}
	function getCurrentMonthPurchaseCredit($user_id){
		$array = array();
		$currentMonth=date('m');
		
		$query = mysql_query("SELECT SUM(credit) as total_credit , SUM(price) as total_price , currency FROM `sr_user_credit` WHERE user_id = '".$user_id."' AND MONTH(credited_on)='".$currentMonth."' AND price != ''");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$array['total_credit'] = $result['total_credit'];
				$array['total_price'] = $result['total_price'];
				$array['currency'] = $result['currency'];
			}
		}
		return $array;
	}
	function getTotalPurchaseCredit($user_id){
		$array = array();
		
		$query = mysql_query("SELECT SUM(credit) as total_credit , SUM(price) as total_price , currency FROM `sr_user_credit` WHERE user_id = '".$user_id."' AND price != ''");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$array['total_credit'] = $result['total_credit'];
				$array['total_price'] = $result['total_price'];
				$array['currency'] = $result['currency'];
			}
		}
		return $array;
	}
	function getCurrencyIcon($currency_id){
		$currency = '';
		
		$query = mysql_query("SELECT * FROM `sr_currency` WHERE currency_id = '".$currency_id."'");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$currency = $result['icon'];
			}
		}
		return $currency;
	}
	
	//######################REPORT FLAG
    function getUserReport($user_id , $reported_by){
		
		$array = array();
		$query=mysql_query("SELECT * FROM sr_user_report r, sr_users u WHERE r.user_id=u.user_id AND r.reported_by='".$reported_by."' AND r.user_id='".$user_id."' AND status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUserPhotoReport($user_id , $reported_by){
		
		$array = array();
		$query=mysql_query("SELECT r.* FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND p.user_id='".$user_id."' AND r.`reported_by` =  '".$reported_by."' AND r.status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUserRaisedFlag($user_id){
		
		$array = array();
		$query=mysql_query("SELECT user_id FROM `sr_user_report` WHERE `reported_by`='".$user_id."' GROUP BY user_id UNION SELECT p.user_id FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND  `reported_by` =  '".$user_id."' GROUP BY user_id");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUserAgainsedFlag($user_id){
		
		$array = array();
		$query=mysql_query("SELECT reported_by FROM `sr_user_report` WHERE `user_id`='".$user_id."' GROUP BY user_id UNION SELECT reported_by FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND  p.`user_id` =  '".$user_id."' GROUP BY user_id");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	 function getUserAllRaisedFlag($user_id){
		
		$array = array();
		$query=mysql_query("SELECT user_report_id FROM `sr_user_report` WHERE `reported_by`='".$user_id."' UNION ALL SELECT r.photo_report_id FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND  `reported_by` =  '".$user_id."'");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
    function getUserAllAgainsedFlag($user_id){
		
		$array = array();
		$query=mysql_query("SELECT user_report_id FROM `sr_user_report` WHERE `user_id`='".$user_id."' UNION ALL SELECT r.photo_report_id FROM  `sr_photo_report` r, sr_user_photo p WHERE p.`photo_id` = r.`photo_id` AND  p.`user_id` =  '".$user_id."'");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
		
	}
	
	//#################################USER PROFILE
	
	function getVisitorCount($user_id){
		$count = 0;
		$query=mysql_query("SELECT u.user_id FROM sr_profile_visitors v , sr_users u WHERE u.user_id = v.visitor_id AND v.user_id='".$user_id."' AND v.visitor_id !='".$user_id."' AND v.status=1 ORDER BY v.updated_on DESC ");
		if($query){
			$count=mysql_num_rows($query);		
		}
		return $count;
	}
	function getLikeMeCount($user_id){
		$count = 0;
		$query=mysql_query("SELECT u.user_id FROM sr_user_like l , sr_users u WHERE u.user_id = l.liked_by AND l.user_id='".$user_id."' AND status=1 AND liked_by NOT IN(SELECT user_id FROM sr_user_like WHERE liked_by='".$user_id."' AND status=0) ORDER BY l.liked_on DESC ");
		if($query){
			$count=mysql_num_rows($query);		
		}
		return $count;
	}
	function getFavouriteCount($user_id){
		$count = 0;
		$query=mysql_query("SELECT count(favourite_id) as favourite_count FROM `sr_user_favourites` WHERE favourite_by='".$user_id."' AND status=1"); 
		if($query){
			$count=mysql_num_rows($query);		
		}
		return $count;
	}
	function getBlockCount($user_id){
		$count = 0;
		$query=mysql_query("SELECT count(block_id) as block_count FROM `sr_user_block` WHERE block_by='".$user_id."'"); 
		if($query){
			$count=mysql_num_rows($query);		
		}
		return $count;
	}
	function getRatedMeUserCount($user_id){
		$count = 0;
		$query=mysql_query("SELECT p.photo_id FROM `sr_users` u , sr_user_photo p , sr_photo_rating r where u.user_id=r.rated_by AND r.photo_id=p.photo_id AND p.user_id='".$user_id."' GROUP BY r.rated_by");
		if($query){
			$count=mysql_num_rows($query);		
		}
		return $count;
	}
	function getUserReputation($user_id){
		$count=0;
		$query=mysql_query("SELECT sum(reputation) as total_reputation FROM `sr_user_reputation` WHERE user_id='".$user_id."' AND status=1"); 
		if($query && mysql_num_rows($query)){
			$result=mysql_fetch_object($query);
			$count= $result->total_reputation;
		}
		return $count;
		
	}
	function getUserReputationText($user_id){
		$response = $this->getUserReputation($user_id);
		if($response <= 40 ) $reputaion='Low';
		if($response > 40 && $response <= 60) $reputaion='Heating Up';
		if($response > 60 && $response <= 80) $reputaion='Hot';
		if($response > 80) $reputaion='Very Hot';
		
		return $reputaion;
	}
	function getUserProfileInterest($user_id){
		$array = array();
		$query=mysql_query("SELECT ui.user_interest_id ,i.interest_id ,i.icon , i.interest FROM `sr_user_interest` ui , sr_interest i WHERE ui.interest_id=i.interest_id AND ui.user_id='".$user_id."' ORDER BY  created_on DESC"); 
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
	}
	function getRelationshipName($relationship_id){
		$relationship_status ='';
		$query=mysql_query("SELECT relationship_status FROM sr_relationship_status WHERE relationship_id = '".$relationship_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$relationship_status = $result['relationship_status'];
		}
		return $relationship_status;
	}
	function getstarSignName($sign_id){
		$star_sign ='';
		$query=mysql_query("SELECT star_sign FROM sr_star_sign WHERE sign_id = '".$sign_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$star_sign = $result['star_sign'];
		}
		return $star_sign;
	}
	function getSexualityName($sexuality_id){
		$sexuality ='';
		$query=mysql_query("SELECT sexuality FROM sr_sexuality WHERE sexuality_id = '".$sexuality_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$sexuality = $result['sexuality'];
		}
		return $sexuality;
	}
	function getBodyTypeName($bodytype_id){
		$body_type ='';
		$query=mysql_query("SELECT body_type FROM sr_body_type WHERE bodytype_id = '".$bodytype_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$body_type = $result['body_type'];
		}
		return $body_type;
	}
	function getComplexionName($complexion_id){
		$complexion ='';
		$query=mysql_query("SELECT complexion FROM sr_complexion WHERE complexion_id = '".$complexion_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$complexion = $result['complexion'];
		}
		return $complexion;
	}
	function getEyeColorName($eye_color_id){
		$eye_color ='';
		$query=mysql_query("SELECT eye_color FROM sr_eye_color WHERE eye_color_id = '".$eye_color_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$eye_color = $result['eye_color'];
		}
		return $eye_color;
	}
	function getHairColorName($hair_color_id){
		$hair_color ='';
		$query=mysql_query("SELECT hair_color FROM sr_hair_color WHERE hair_color_id = '".$hair_color_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$hair_color = $result['hair_color'];
		}
		return $hair_color;
	}
	function getLanguageName($language_id){
		$language ='';
		$query=mysql_query("SELECT language FROM sr_language WHERE language_id = '".$language_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$language = $result['language'];
		}
		return $language;
	}
	function getEducationName($education_id){
		$education ='';
		$query=mysql_query("SELECT education FROM sr_education WHERE education_id = '".$education_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$education = $result['education'];
		}
		return $education;
	}
	function getIncomeName($income_id){
		$income ='';
		$query=mysql_query("SELECT income FROM sr_income WHERE income_id = '".$income_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$income = $result['income'];
		}
		return $income;
	}
	function getUserLanguage($user_id){
		$array = array();
		$query=mysql_query("SELECT l.language FROM sr_user_language ul ,  sr_language l WHERE ul.user_id='".$user_id."' AND ul.language_id=l.language_id AND l.status=1");
		if($query){
			while($result=mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
	}
	function getHereToName($here_to_id){
		$here_to ='';
		$query=mysql_query("SELECT here_to FROM sr_here_to WHERE here_to_id = '".$here_to_id."'");
		if($query){
			$result=mysql_fetch_assoc($query);
				$here_to = $result['here_to'];
		}
		return $here_to;
	}
	function getMyFriends($user_id){
		$array = array();
		$friendQuery=mysql_query("SELECT u.user_id,u.user_name,u.profile_image,u.dob,u.gender , u.here_to , u.is_online ,u.location ,u.created_on , f.date FROM sr_user_friends f , sr_users u where f.user_id='".$user_id."' AND f.status=1 AND f.friend_id=u.user_id ORDER BY date DESC");
		if($friendQuery){
			while($friendResult = mysql_fetch_assoc($friendQuery)){
				$array[] = $friendResult;
			}
		}
		return $array;
	}
	function getUserPhotos($user_id){
		$array = array();
		$query =mysql_query("SELECT * FROM  sr_user_photo WHERE user_id = '".$user_id."' AND status = 1");
		if($query) {
			if(mysql_num_rows($query)){
				while($result=mysql_fetch_assoc($query)){
					$array[] = $result;
				}
			}
		}
		return $array;
	}
	function getUserGift($user_id){
		$array = array();
		$query=mysql_query("SELECT g.gift ,ug.*, u.user_id , u.user_name , u.profile_image FROM sr_gifts g,sr_user_gift ug,sr_users u WHERE ug.gift_id=g.gift_id AND ug.gifted_by=u.user_id AND ug.user_id='".$user_id."' AND ug.status=1");
		if($query){
			while($result = mysql_fetch_assoc($query)){
				$array[] = $result;
			}
		}
		return $array;
	}
	function getUserRewards($user_id){
		$array = array();
		$rewardQuery =mysql_query("SELECT r.reward_title , r.reward_text , r.reward_icon , ur.* FROM sr_user_reward ur , sr_rewards r WHERE ur.reward_id = r.reward_id AND ur.user_id = '".$user_id."' AND is_latest=1 AND r.status = 1 GROUP BY r.reward_id");
		if($rewardQuery) {
			if(mysql_num_rows($rewardQuery)){
				while($rewardResult=mysql_fetch_assoc($rewardQuery)){
					$array[] = $rewardResult;
				}
			}
		}
		return $array;
	}
	//##########################USER TIMESTAMP
	function getUserTimestamp($user_id){
		$array = array();
		$query =mysql_query("SELECT * FROM  sr_login_history WHERE user_id = '".$user_id."' AND status = 1 AND logout_time !='0000-00-00 00:00:00' ORDER BY login_time DESC");
		if($query) {
			if(mysql_num_rows($query)){
				while($result=mysql_fetch_assoc($query)){
					$array[] = $result;
				}
			}
		}
		return $array;
	}
	function getUserLogedInTime($user_id){
		$logedInTime = 0;
		$query =mysql_query("SELECT * FROM  sr_login_history WHERE user_id = '".$user_id."' AND status = 1 AND logout_time !='0000-00-00 00:00:00' ORDER BY login_time DESC");
		if($query && mysql_num_rows($query)){
			while($result=mysql_fetch_assoc($query)){
				$diff = (strtotime($result['logout_time']) - strtotime($result['login_time']))/60;
				$duration = (int)$diff;
				$logedInTime += $duration;
			}
		}
		return $logedInTime;
	}
	function getLastLogedInTime($user_id){
		$lastLogedInTime = '';
		$query =mysql_query("SELECT * FROM  sr_login_history WHERE user_id = '".$user_id."' AND status = 1 AND logout_time !='0000-00-00 00:00:00' ORDER BY login_time DESC LIMIT 0 ,1");
		if($query && mysql_num_rows($query)){
			while($result=mysql_fetch_assoc($query)){
				$lastLogedInTime = date('d/m/Y' , strtotime($result['logout_time']));	
			}
		}
		return $lastLogedInTime;
	}
	function getUserAdminTimestamp($user_id){
		$array = array();
		$query =mysql_query("SELECT * FROM  sr_admin_user_timestamp WHERE user_id = '".$user_id."' AND status = 1 ORDER BY timestamp DESC");
		if($query) {
			if(mysql_num_rows($query)){
				while($result=mysql_fetch_assoc($query)){
					$array[] = $result;
				}
			}
		}
		return $array;
	}
	function getAdminLastLogedInTime($admin_id){
		$lastLogedInTime = '';
		$query =mysql_query("SELECT * FROM sr_admin_login_history WHERE admin_id = '".$admin_id."' AND status = 1 ORDER BY login_time DESC LIMIT 0 ,1");
		if($query && mysql_num_rows($query)){
			while($result=mysql_fetch_assoc($query)){
				$lastLogedInTime = $this->getTimeToStr($result['login_time']);
			}
		}
		return $lastLogedInTime;
	}
	function getAdminTimestamp($admin_id){
		$array = array();
		$query =mysql_query("SELECT * FROM sr_admin_login_history WHERE admin_id = '".$admin_id."' AND status = 1 AND logout_time !='0000-00-00 00:00:00' ORDER BY login_time DESC");
		if($query) {
			if(mysql_num_rows($query)){
				while($result=mysql_fetch_assoc($query)){
					$array[] = $result;
				}
			}
		}
		return $array;
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
			if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
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
	function getProfilePromotedDate($user_id){
		$profilePromotedDate='';
		$query=mysql_query("SELECT redeem_date FROM sr_user_credit_redeem r , sr_user_credit c WHERE r.credit_id=c.credit_id AND r.service=1 and c.user_id='".$user_id."' ORDER BY  r.redeem_date DESC LIMIT 0 , 1");
		if($query && mysql_num_rows($query)){
			$result=mysql_fetch_assoc($query);
			$profilePromotedDate = '<li><a href="javascript:void(0);" class="parmot_profile" data-toggle="tooltip" data-placement="bottom"  title="Pormoted Profile '.$this->getTimeToStr($result['redeem_date']).'"></a></li>';
		}
		return $profilePromotedDate;
	}
	function getStatusIconHtml($user_id, $gender, $reputation, $isVipMember){
		$userNou = '';
		$userPer = '';
		$statusIconHtml = '';
		$userFavorite = '';
		$userReputation = '';
		$vipMember = '';
		if($gender == 1){
			$userNou = 'he';
			$userPer = 'His';
		}if($gender == 2){
			$userNou = 'She';
			$userPer = 'Her';
		}
		if($reputation == 'Very Hot'){
			$userReputation = '<li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom"  title="'.$userPer.' Reputation is '.$reputation.'!" ><img src="images/icon001.png"/></a></li>';
		}
		if($isVipMember){
			$vipMember = '<li><a href="javascript:void(0;)"><img src="images/down-arw-red.png" data-toggle="tooltip" data-placement="bottom"  title="VIP Member"/></a></li>';
		}
		$promotedProfile=$this->getProfilePromotedDate($user_id);
		$statusIconHtml = $userReputation.$userFavorite.$promotedProfile.$vipMember.'';
			
		return $statusIconHtml;
	}
	//##############RESTRITED USER NAME######################
	function getRestrictedUsername(){
		$array = array();
		$query =mysql_query("SELECT * FROM  sr_restricted_name ORDER BY created_on DESC");
		if($query) {
			if(mysql_num_rows($query)){
				while($result=mysql_fetch_assoc($query)){
					$array[] = $result;
				}
			}
		}
		return $array;
	}
	function getDuplicateRestrictedUsername($user_name , $id=''){
		$isDuplicate = 0;
		if($admin_id == ''){
			$query =mysql_query("SELECT * FROM  sr_restricted_name WHERE user_name='".$user_name."'");
		}else{
			$query =mysql_query("SELECT * FROM  sr_restricted_name WHERE user_name='".$user_name."' AND id!='".$id."'");
		}
		if($query) {
			if(mysql_num_rows($query)){
				$isDuplicate=1;
			}
		}
		return $isDuplicate;
	}
	//##########################USER SIGN IN###############################
	function adminSignIn($signInEmailId , $signInPassword){
		extract($_POST);
		if($signInEmailId != '' && $signInPassword != ''){
			$signInQuery=mysql_query("SELECT * FROM sr_admin WHERE email_id='".$signInEmailId."' AND password='".md5($signInPassword)."'");
			if($signInQuery){
				if(mysql_num_rows($signInQuery)){
					$signInResult=mysql_fetch_object($signInQuery);
					$signInUserId=$signInResult->admin_id;
			
					if($signInResult->status == 0){
					
						return 2; // not verified
						
					}else{
			
						$login_time=DATE_TIME;
						$_SESSION['ADMIN']['USER_ID'] = $signInUserId;
						$_SESSION['ADMIN']['LOGIN_TIME'] = $login_time;
						mysql_query("UPDATE sr_admin SET is_online=1 WHERE admin_id='".$signInUserId."'");
						mysql_query("INSERT INTO sr_admin_login_history SET admin_id='".$signInUserId."' , login_time = '".$login_time."'");
						return 1; // success
					}	
				}else {
					
					return 3; //incorrect usernsme or password
				}
			}else{
				
				return 0; //error 
			}
		}else{
			
			return 4; // required parameter missing
		}
	}
	
	function getAdminInfo($admin_id){
		$array = array();
		$query=mysql_query("SELECT * FROM sr_admin WHERE admin_id='".$admin_id."'");
		if($query){
			$array=mysql_fetch_assoc($query);
		}
		return $array;
		
	}
	function getAdminName($admin_id){
		$adminName = '';
		$query=mysql_query("SELECT * FROM sr_admin WHERE admin_id='".$admin_id."'");
		if($query && mysql_num_rows($query)){
			$result=mysql_fetch_assoc($query);
			$adminName = $result['first_name'].' '.$result['last_name'];
		}
		return $adminName;
		
	}
	function checkDuplicateEmailId($email_id, $admin_id=''){
		$isDuplicate = '';
		if($admin_id == ''){
			$query=mysql_query("SELECT * FROM sr_admin WHERE email_id='".$email_id."'");
		}else{
			$query=mysql_query("SELECT * FROM sr_admin WHERE email_id='".$email_id."' AND admin_id != '".$admin_id."'");
		}
		if($query && mysql_num_rows($query)){
			$isDuplicate=1;
		}
		return $isDuplicate;
		
	}
	function checkDuplicateLoginName($login_name, $admin_id=''){
		$isDuplicate = '';
		if($admin_id == ''){
			$query=mysql_query("SELECT * FROM sr_admin WHERE login_name='".$login_name."'");
		}else{
			$query=mysql_query("SELECT * FROM sr_admin WHERE login_name='".$login_name."' AND admin_id != '".$admin_id."'");
		}
		if($query && mysql_num_rows($query)){
			$isDuplicate=1;
		}
		return $isDuplicate;
		
	}
	function getResultPopup($message, $header){
		$result = '';
		$result .= '<div class="modal fade pop-up-dash" id="result-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999;">
			<div class="modal-dialog pop-up-width" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">'.$header.'</h4>
					</div>
					<div class="modal-body">
						<p>'.$message.'</p>
						<div class="text-center clearfix">
							<button type="button" class="btn btn-popup-red" data-dismiss="modal">Ok</button>
						</div>	
					</div>
				</div>
			</div>
		</div>';
		
		return $result;	
	}
	
		function getUserVipInfo($user_id){
		$vipResult=array();
		$vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$user_id."' AND status=1");
		if($vipQuery && mysql_num_rows($vipQuery) >0){
			$vipResult=mysql_fetch_assoc($vipQuery);
		}
		return $vipResult;
	}
	
	
	#Get Last Approved Photos By Limit
	function getLastApprovedPhotos($lim=1)
	{
		$query = mysql_query("Select saut.photo_id, sup.* 
		from sr_admin_user_timestamp saut
		join sr_user_photo sup on sup.photo_id = saut.photo_id 
		where saut.activity = 'Approved Photo' and saut.status = '1' 
		order by saut.admin_activity_id desc 
		limit $lim ");
		
		return ( mysql_num_rows($query)>0 )?$query:0;
	}
	
	
	#Get count of approved photos
	function getApprovedPhotosCount()
	{
		$query = mysql_query("Select count(photo) from sr_user_photo where status = '1' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}
	
	
	#Get all approved photos 
	function getApprovedPhotos()
	{
		$query = mysql_query("Select created_on, photo, user_id, photo_id from sr_user_photo 
		where status = '1' order by photo_id desc ");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}
	
	
	#Get count of rejected photos
	function getRejectedPhotosCount()
	{
		$query = mysql_query("Select count(photo) from sr_user_photo where status = '2' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}
	
	
	#Get all rejected photos 
	function getRejectedPhotos()
	{
		$query = mysql_query("Select created_on, photo, user_id, photo_id from sr_user_photo 
		where status = '2' order by photo_id desc ");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	
	//############################SUSPEND USER############################################
	
	function suspendUser($userId, $user_name, $reason, $description, $report_id=''){
		$response='0';
		$query=mysql_query("UPDATE sr_users SET is_suspended=1 WHERE user_id='".$userId."'");
	
		if($query){
			
			$sql =mysql_query("INSERT INTO sr_user_suspend SET user_id='".$userId."', reason='".$reason."', description='".$description."', suspended_by='".$adminId."', suspended_on=now() , status=1");
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Suspanded User', admin_id='".$adminId."', timestamp=now() , status=1, report_id='".$report_id."'");
			
			//EMAIL
			$to=$adminObj->getUserEmailId($userId);
			$from_name='Startrishta.com';
			$from='no-reply@startrishta.com';
			$subject='Your account has been suspended';
			$header='Hi '.$user_name;
			$body .='Your Startrishta.com account has been suspended by our moderators as you have been found to have breached our terms and conditions.<br/><br/>';
			$body .= 'Reason code:'.$reason.'.<br/><br/>';
			$body .= 'If you would like to appeal this decision, please <a href="'.SITEURL.'contacts.php">contact us</a>.';
			$footer='<br/><br/>Startrishta Support';
			
			$sendMail=$adminObj->sendTemplateMail($to, $from, $from_name, $subject, $header, $body, $footer);
			$response='1';
		
		}else{
			$response='0';
		}
		return $response;
	}
	
	function sendTemplateMail($to, $from, $from_name, $subject, $header, $body, $footer){
		$mail=new PHPmailer;
        $mail->IsHTML(true);		
		$mail->From=$from;
		$mail->FromName=$from_name;
		$mail->AddAddress($to);
        $mail->AddBCC(Email_BCC);
		$mail->Subject=$subject;
		$mail->Body.="<table style='width:600px; margin:0 auto; padding: 10px 0; border-collapse: collapse; table-layout: auto;vertical-align: top;'>
			<tr>
				<td align='left' style='padding: 7px; border-collapse: collapse; font-size: 12px; font-family:Verdana, Geneva, sans-serif;'>
					<table class='tables2' style=' width: 100%; border-collapse: collapse; table-layout: auto;vertical-align: top; margin: 0px 0 5px;'>
						<tr>
							<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
							</th>
						</tr>
						<tr>
							<th width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>
								<h3>".$header."</h3>
							</th>
						</tr>
						<tr>
							<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>".$body."</td>
						</tr>
						<tr>
							<td width='48%' colspan='2' style='padding: 2px; border-collapse: collapse; font-size: 12px; table-layout: auto; vertical-align: middle;text-align:left;'>".$footer."</td>
						</tr>
					</table>
				</td>
			</tr>
			</table>	
			";
			$mail->WordWrap=50; 
			$email_response = $mail->Send();
			return $email_response;
	
	}
}
?>
