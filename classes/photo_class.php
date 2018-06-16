<?php
require_once('user_class.php');

class Photo extends User{
	function __construct()
	{
	   $this->createConnection();
	}
	
	function getMyPhoto($user_id){
		$myPhotoQuery=mysql_query("select * from  sr_user_photo  where user_id='".$user_id."' AND status=1");
		if($myPhotoQuery){
			return $myPhotoQuery;
		}else {
			return 0;
		}
	}
	
	function getMyPhotoCount($user_id){
		$myPhotoQuery=mysql_query("select * from  sr_user_photo  where user_id='".$user_id."' AND status=1");
		return mysql_num_rows($myPhotoQuery);
	}
	
	function getPreRatedPhoto($user_id){
		$prePhotoQuery=mysql_query("SELECT p.photo_id,p.photo,u.user_id,u.user_name,u.gender ,r.rating, u.here_to FROM sr_user_photo p , sr_photo_rating r , sr_users u WHERE p.photo_id=r.photo_id AND rated_by='".$user_id."' AND u.user_id=p.user_id AND p.status=1 ORDER BY rated_on DESC LIMIT 0, 1");
		
		if($prePhotoQuery){
			return $prePhotoQuery;
		}else {
			return 0;
		}
	}
	function getNextPhoto($user_id){
		$getNextPhotoQuery=mysql_query("SELECT photo_id, photo FROM sr_user_photo WHERE user_id='".$user_id."' AND rate_status=0 AND status=1 AND photo_type=1 ORDER BY created_on DESC LIMIT 0, 1");
		
		if($getNextPhotoQuery){
			return $getNextPhotoQuery;
		}else {
			return 0;
		}
	}
	function getNextPhotoCount(){
		$user_id=$_SESSION['user_id'];
		$ratingQuery=mysql_query("SELECT rating FROM sr_photo_rating WHERE rated_by='".$user_id."'");
		$totalCount=mysql_num_rows($ratingQuery)%10;
		
		return (10 - $totalCount);
	}
	

	function getRatedMeUpUser($user_id){
		$array=array();
		$ratedMeQuery=mysql_query("SELECT p.photo_id , p.photo , u.user_id ,u.user_name , u.profile_image ,u.location , u.dob,u.gender, r.rating FROM `sr_users` u , sr_user_photo p , sr_photo_rating r where u.user_id=r.rated_by AND r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating >=4 GROUP BY r.rated_by");
		if($ratedMeQuery){
			while($ratedMeResult = mysql_fetch_assoc($ratedMeQuery)){
				$array[] = $ratedMeResult;
			}
		}
		return $array;
	}
	function getRatedMeDownUser($user_id){
		$array=array();
		$ratedMeQuery=mysql_query("SELECT p.photo_id , p.photo , u.user_id ,u.user_name , u.profile_image ,u.location , u.dob,u.gender, r.rating FROM `sr_users` u , sr_user_photo p , sr_photo_rating r where u.user_id=r.rated_by AND r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating < 4");
		if($ratedMeQuery){
			while($ratedMeResult = mysql_fetch_assoc($ratedMeQuery)){
				$array[] = $ratedMeResult;
			}
		}
		return $array;
	}
	function getRatedPhotoByUser($user_id , $rated_by){
		$array=array();
		$ratedQuery=mysql_query("SELECT p.photo_id , p.photo ,r.rating FROM sr_user_photo p , sr_photo_rating r where r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating >=4 AND r.rated_by='".$rated_by."'");
		if($ratedQuery){
			while($ratedResult = mysql_fetch_assoc($ratedQuery)){
				$array[] = $ratedResult;
			}
		}
		return $array;
	}
	
}
?>