<?php
require_once('user_class.php');

class Search extends User{
	function __construct(){
	   $this->createConnection();
	}
	
	function searchPeopleCount( $user_id, $addQuery, $interestIds)
	{

		$userResult = $this->getUserInfo($user_id);
		$here_to = $userResult['here_to'];
		$here_with_guy = $userResult['here_with_guy'];
		$here_with_girl = $userResult['here_with_girl'];
		$here_age_min = $userResult['here_age_min'];
		$here_age_max = $userResult['here_age_max'];
		if (!strpos($addQuery, 'location_lon')) {
			//$userResult = $userProfileObj->getUserInfo($user_id);
			$location_lon=$userResult['location_lon'];
			$location_lat=$userResult['location_lat'];
			$addQuery .= " AND location_lon='".$location_lon."'";

			$addQuery .= " AND location_lat='".$location_lat."'";
		}
		$addSearchQuery='';
		if($here_to !=''){
			$addSearchQuery .= " AND here_to='".$here_to."'";
		}
		
		if($here_with_guy == 1 && $here_with_girl == 1){
			$addSearchQuery .= " AND (gender=1 OR gender=2)";
		}else if($here_with_guy == 1){
			$addSearchQuery .= " AND gender=1";
		}else if($here_with_girl == 1){
			$addSearchQuery .= " AND gender=2";
		}
		if($here_age_min == 0){
			$here_age_min = 18;
		}
		if($here_age_max == 0){
			$here_age_max = 80;
		}

		$checkVip = "Select DISTINCT user_id from sr_vip_user
		where status = 1 AND DATE(start_date) < '".DATE_TIME."' AND DATE(end_date) >= '".DATE_TIME."' ";
		/************************INTEREST***********************************/
		/*if($interestIds != ''){
			//$userInterest=substr($interestIds , 1);
			$searchPeopleQuery = ("SELECT * FROM sr_users u , sr_user_interest ui 
				WHERE u.user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
				AND ui.user_id=u.user_id AND is_account_freeze='0' 
				AND ui.interest_id IN(".$interestIds.") 
				AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
				AND ".$here_age_max."");
		}else {
			$searchPeopleQuery = ("SELECT * FROM sr_users 
				WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
				AND is_account_freeze='0' 
				AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
				AND ".$here_age_max." and user_id IN (".$checkVip.")");
		}*/

		if($interestIds != '')
		{		
			$searchPeopleQuery = "( SELECT *
			FROM sr_users u , sr_user_interest ui 
			WHERE u.user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND ui.user_id=u.user_id 
			AND ui.interest_id IN(".$interestIds.") 
			AND is_account_freeze='0' 
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) 
			AND location='".$location."' BETWEEN ".$here_age_min." AND ".$here_age_max." 
			AND u.user_id IN (".$checkVip.")
			ORDER BY user_name )
			UNION All
			( SELECT * 
			FROM sr_users u , sr_user_interest ui 
			WHERE u.user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND ui.user_id=u.user_id AND ui.interest_id IN(".$interestIds.") 
			AND is_account_freeze='0' 
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365)  BETWEEN ".$here_age_min." AND ".$here_age_max." 
			and u.user_id NOT IN (".$checkVip.") )";
		}
		else
		{
			/*SELECT * FROM sr_users 
				WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
				AND is_account_freeze='0' 
				AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
				AND ".$here_age_max."*/
			$searchPeopleQuery = "( SELECT * FROM sr_users
			WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND is_account_freeze='0'
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max." 
			AND user_id IN (".$checkVip.")
			ORDER BY user_name )
			UNION ALL
			( SELECT * FROM sr_users 
			WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND is_account_freeze='0'
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
			AND ".$here_age_max." AND user_id NOT IN (".$checkVip.") )";
		}
		
		$run_query = mysql_query($searchPeopleQuery);
		//echo "Total records ------ ".mysql_num_rows($run_query);
		if($run_query){
			return mysql_num_rows($run_query);
		}else {
			return 0;
		}
	}

	
	function searchPeople($user_id , $limit , $offset , $addQuery , $interestIds)
	{
		$userResult = $this->getUserInfo($user_id);
		$here_to = $userResult['here_to'];
		$here_with_guy = $userResult['here_with_guy'];
		$here_with_girl = $userResult['here_with_girl'];
		$here_age_min = $userResult['here_age_min'];
		$here_age_max = $userResult['here_age_max'];
		if (!strpos($addQuery, 'location_lon')) {
			//$userResult = $userProfileObj->getUserInfo($user_id);
			$location_lon=$userResult['location_lon'];
			$location_lat=$userResult['location_lat'];
			$addQuery .= " AND location_lon='".$location_lon."'";

			$addQuery .= " AND location_lat='".$location_lat."'";
		}
		if( $here_age_min == 0 ){
			$here_age_min = 18;
		}
		if( $here_age_max == 0 ){
			$here_age_max = 80;
		}
		$addSearchQuery = '';
		if($here_to !=''){
			$addSearchQuery .= " AND here_to='".$here_to."'";
		}if($here_with_guy == 1 && $here_with_girl == 1){
			$addSearchQuery .= " AND (gender=1 OR gender=2)";
		}else if($here_with_guy == 1){
			$addSearchQuery .= " AND gender=1";
		}else if($here_with_girl == 1){
			$addSearchQuery .= " AND gender=2";
		}
		//print_r($_POST);
		//echo $addQuery;
		$checkVip = "Select DISTINCT user_id from sr_vip_user
		where status = 1 AND DATE(start_date) < '".DATE_TIME."' 
		AND DATE(end_date) >= '".DATE_TIME."' ";
		
		/************************INTEREST***********************************/
		if($interestIds != '')
		{		
			$searchPeopleSql = "( SELECT *
			FROM sr_users u , sr_user_interest ui 
			WHERE u.user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND ui.user_id=u.user_id 
			AND ui.interest_id IN(".$interestIds.") 
			AND is_account_freeze='0' 
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) 
			AND location='".$location."' BETWEEN ".$here_age_min." AND ".$here_age_max." 
			AND u.user_id IN (".$checkVip.")
			ORDER BY user_name 
			LIMIT ".$limit." , ".$offset." )
			UNION All
			( SELECT * 
			FROM sr_users u , sr_user_interest ui 
			WHERE u.user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND ui.user_id=u.user_id AND ui.interest_id IN(".$interestIds.") 
			AND is_account_freeze='0' 
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0' 
			AND FLOOR(DATEDIFF (NOW(), dob)/365)  BETWEEN ".$here_age_min." AND ".$here_age_max." 
			and u.user_id NOT IN (".$checkVip.")
			LIMIT ".$limit." , ".$offset." )";
		}
		else
		{
			/*SELECT * FROM sr_users 
				WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
				AND is_account_freeze='0' 
				AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
				AND ".$here_age_max."*/
			$searchPeopleSql = "( SELECT * FROM sr_users
			WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND is_account_freeze='0'
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." AND ".$here_age_max." 
			AND user_id IN (".$checkVip.")
			ORDER BY user_name 
			LIMIT ".$limit." , ".$offset." )
			UNION ALL
			( SELECT * FROM sr_users 
			WHERE user_id !='".$user_id."' ".$addSearchQuery.$addQuery." 
			AND is_account_freeze='0'
			AND is_suspended='0'
			AND is_deleted='0'
			AND is_erase='0'
			AND FLOOR(DATEDIFF (NOW(), dob)/365) BETWEEN ".$here_age_min." 
			AND ".$here_age_max." AND user_id NOT IN (".$checkVip.")
			LIMIT ".$limit." , ".$offset." )";
		}
		
		$searchPeopleQuery = mysql_query($searchPeopleSql);
		//echo "Total rows ----------- ".mysql_num_rows($searchPeopleQuery);
		return ( $searchPeopleQuery )?$searchPeopleQuery:0;
	}
	
	
	#Update Search Table
	function updateSearch($user_id)
	{
		$here_to = mysql_real_escape_string($_POST['here_to']);
		
		$here_age_min = $_POST['here_age_min'];
		$here_age_max = $_POST['here_age_max'];
		
		$locQuery = "";
		if( trim($_POST['search_loc'])!="" )
		{
			$search_loc = trim($_POST['search_loc']);
			$location_lon = trim($_POST['location_lon']);
			$location_lat = trim($_POST['location_lat']);
			$locQuery = ", location='".$search_loc."', location_lon='".$location_lon."', location_lat='".$location_lat."'";
		}
		
		$here_with_girl = (isset($_POST['here_with_girl']) && $_POST['here_with_girl'] == 'on')?1:0;
		
		$here_with_guy = (isset($_POST['here_with_guy']) && $_POST['here_with_guy'] == 'on')?1:0;
		
		#update user basic info
		$updateQuery = mysql_query("UPDATE sr_users SET here_to ='".$here_to."', 
			here_with_guy='".$here_with_guy."' , here_with_girl='".$here_with_girl."' , 
			here_age_min='".$here_age_min."' , here_age_max='".$here_age_max."'
		WHERE user_id='".$user_id."'");
		
		return ($updateQuery)?1:0;
	}
}
?>