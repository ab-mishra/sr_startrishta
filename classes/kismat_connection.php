<?php

require_once('user_class.php');

class KismatConnection extends User{
	function __construct(){
	   $this->createConnection();
	}
	function getKismatConnectionUser($user_id , $limit , $offset)
	{
		$array = array();
		$userResult = $this->getUserInfo($user_id);
		$here_to = $userResult['here_to'];
		$here_with_guy = $userResult['here_with_guy'];
		$here_with_girl = $userResult['here_with_girl'];
		$here_age_min = $userResult['here_age_min'];
		$here_age_max = $userResult['here_age_max'];
		//print_r($userResult);
		if($here_age_min==0){
			$here_age_min=22;
		}
		if($here_age_max==0)
		{
			$here_age_max==80;
		}
		$addSearchQuery='';
		if($here_to !=''){
			$addSearchQuery .= " AND here_to='".$here_to."'";
		}if($here_with_guy == 1 && $here_with_girl == 1){
			$addSearchQuery .= " AND (gender=1 OR gender=2)";
		}else if($here_with_guy == 1){
			$addSearchQuery .= " AND gender=1";
		}else if($here_with_girl == 1){
			$addSearchQuery .= " AND gender=2";
		}
		
		#Check Blocked Lists
		$blockList = "Select Distinct block_by from sr_user_block where user_id = '".$user_id."' ";
		//echo "SELECT * FROM sr_users u,sr_user_photo p WHERE u.user_id !='".$user_id."' and p.status=1 and p.is_profileImage=1 and p.private=0 and p.user_id=u.user_id and u.user_id NOT IN(".$blockList.") AND u.profile_image!='' AND u.user_id NOT IN(SELECT user_id FROM sr_user_like WHERE liked_by='".$user_id."') ".$addSearchQuery." AND FLOOR(DATEDIFF ('".DATE_TIME."', u.dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max." limit $limit , $offset";
		$query = mysql_query("SELECT * FROM sr_users u,sr_user_photo p WHERE u.user_id !='".$user_id."' and p.status=1 and p.is_profileImage=1 and p.private=0 and p.user_id=u.user_id and u.user_id NOT IN(".$blockList.") AND u.profile_image!='' AND u.user_id NOT IN(SELECT user_id FROM sr_user_like WHERE liked_by='".$user_id."') ".$addSearchQuery." AND FLOOR(DATEDIFF ('".DATE_TIME."', u.dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max." limit $limit , $offset");
	
		if( $query )
		{
			while( $result = mysql_fetch_assoc($query) )
			{				
				$array[] = $result;
			}
		}

		return $array;
	}
	
	
	function getKismatConnectionUserCount($user_id){

		$userResult = $this->getUserInfo($user_id);
		$here_to=$userResult['here_to'];
		$here_with_guy=$userResult['here_with_guy'];
		$here_with_girl=$userResult['here_with_girl'];
		$here_age_min=$userResult['here_age_min'];
		$here_age_max=$userResult['here_age_max'];

		$addSearchQuery='';
		if($here_to !=''){
			$addSearchQuery .= " AND here_to='".$here_to."'";
		}if($here_with_guy == 1 && $here_with_girl == 1){
			$addSearchQuery .= " AND (gender=1 OR gender=2)";
		}else if($here_with_guy == 1){
			$addSearchQuery .= " AND gender=1";
		}else if($here_with_girl == 1){
			$addSearchQuery .= " AND gender=2";
		}
		//echo "SELECT * FROM sr_users u,sr_user_photo p WHERE u.user_id !='".$user_id."' and p.status=1 and p.is_profileImage=1 and p.private=0 and p.user_id=u.user_id  AND u.profile_image!='' AND u.user_id NOT IN(SELECT user_id FROM sr_user_like WHERE liked_by='".$user_id."') ".$addSearchQuery." AND FLOOR(DATEDIFF ('".DATE_TIME."', u.dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max."";
		$query=mysql_query("SELECT * FROM sr_users u,sr_user_photo p WHERE u.user_id !='".$user_id."' and p.status=1 and p.is_profileImage=1 and p.private=0 and p.user_id=u.user_id  AND u.profile_image!='' AND u.user_id NOT IN(SELECT user_id FROM sr_user_like WHERE liked_by='".$user_id."') ".$addSearchQuery." AND FLOOR(DATEDIFF ('".DATE_TIME."', u.dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max."");
		if($query) {
			return mysql_num_rows($query);
		}
		return 0;	
	}
	function getKismatConnectionLikedUserCount($user_id){

		$userResult = $this->getUserInfo($user_id);
		$here_to=$userResult['here_to'];
		$here_with_guy=$userResult['here_with_guy'];
		$here_with_girl=$userResult['here_with_girl'];
		$here_age_min=$userResult['here_age_min'];
		$here_age_max=$userResult['here_age_max'];
		$query=mysql_query("SELECT * FROM sr_user_like WHERE liked_by='".$user_id."' and from_kc=1 and status=1");
		if($query) {
			return mysql_num_rows($query);
		}
		return 0;
	}
	
	function getProfilePer($userResult){
		$percentage=0;
		$add=25/4;
		if($userResult['sexuality'] != 0) $percentage += $add;
		if($userResult['relationship_status'] != 0) $percentage += $add;
		if($userResult['star_sign'] != 0) $percentage += $add;
		if($userResult['body_type'] != 0) $percentage += $add;
		if($userResult['complexion'] != 0) $percentage += $add;
		if($userResult['height'] != 0) $percentage += $add;
		if($userResult['eye_color'] != 0) $percentage += $add;
		if($userResult['hair_color'] != 0) $percentage += $add;
		if($userResult['language'] != 0) $percentage += $add;
		if($userResult['smoking'] != 0) $percentage += $add;
		if($userResult['drinking'] != 0) $percentage += $add;
		if($userResult['kids'] != 0) $percentage += $add;
		if($userResult['education'] != 0) $percentage += $add;
		if($userResult['work'] != 0) $percentage += $add;
		if($userResult['income'] != 0) $percentage += $add;
		if($userResult['company'] != 0) $percentage += $add;
		return $percentage;
	}
	function updateConnection($user_id){
		$here_to=mysql_real_escape_string($_POST['kc_here_to']);
		$here_age_min=$_POST['kc_here_age_min'];
		$here_age_max=$_POST['kc_here_age_max'];
		if(isset($_POST['kc_here_with_girl']) && $_POST['kc_here_with_girl'] == 'on')
			$here_with_girl=1;
		else
			$here_with_girl=0;
		if(isset($_POST['kc_here_with_guy']) && $_POST['kc_here_with_guy'] == 'on')
			$here_with_guy=1;
		else
			$here_with_guy=0;
		
		//update user basic info
		$updateQuery = mysql_query("UPDATE sr_users SET here_to ='".$here_to."',here_with_guy='".$here_with_guy."' , here_with_girl='".$here_with_girl."' , here_age_min='".$here_age_min."' , here_age_max='".$here_age_max."' WHERE user_id='".$user_id."'");
		if($updateQuery){
			return 1;
		}else {
			return 0;
		}
	}
}
?>