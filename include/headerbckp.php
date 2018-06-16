<?php 
	$_SESSION['referrer'] = $_SERVER['HTTP_REFERER'];
	$old = "";
	if(strstr($_SESSION['referrer'], "csp.startrishta.com")){
		$old = $_SESSION['user_id'];
		$csp_url = parse_url($_SESSION['referrer']);
		if($csp_url['query'] != ''){
			$qstr = explode('=',$csp_url['query']);
			$ep[] = $qstr[1];
		}

		$epId = explode('&',$ep[0]);
		$ep_Id = $epId[0];
		$page = $epId[1];

		if(isset($_SESSION['user_id'])){
			if($old != $ep_Id){
				$user_id = $ep_Id;
				unset($_SESSION['user_id']);
				$_SESSION['user_id']=$ep_Id;
				$isRememberMe = 1;
			}
			else{
				//unset($_SESSION['user_id']);
				$_SESSION['user_id']=$_SESSION['user_id'];
				//$ep_Id=$_SESSION['user_id'];
			}
		}
		else{
			$_SESSION['user_id']=$old;
		}
		//echo $_SESSION['user_id'];
	}
	else{
		$user_id=$_SESSION['user_id'];
	}

if(empty($_SESSION['user_id'])){
	$isRememberMe = $userProfileObj->isRememberMe();
	if($isRememberMe == 0){
		echo "<script>window.location.href='index.php'</script>";
		exit;
	}
}

$user_id=$_SESSION['user_id'];
//echo "<pre>";print_r($_SESSION);//die;
$userId='';
/*****check user verified his account by mail*************/
$verifiedUser=$userProfileObj->isVerifiedUser($user_id);
/*if(!$verifiedUser){
	echo "<script>window.location.href='confirm-email.php'</script>";
}*/

/*******************UPLOAD PROFILE IMAGE(MY MESSAGE)***********/

if(isset($_POST['submitProfilPhoto'])){

	$profilePhotoResult=$userProfileObj->uploadprofileImage();

}

/********************UPLOAD PROFILE IMAGE********************/

if(isset($_POST['uploadProfileImage']))

{

	$profileResult=$userProfileObj->uploadprofileImage();

}

/**************************UPLOAD PROFILEIMAGE CROP*************************/

$upload_path = "upload/photo/";
$thumb_width = "200";
$thumb_height = "200";						

function resizeThumbnailImage($thumb_image_name, $image, $width, $height, $start_width, $start_height, $scale){

	list($imagewidth, $imageheight, $imageType) = getimagesize($image);

	$imageType = image_type_to_mime_type($imageType);
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);

	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);

	switch($imageType) {

		case "image/gif":

			$source=imagecreatefromgif($image); 

			break;

	    case "image/pjpeg":

		case "image/jpeg":

		case "image/jpg":

			$source=imagecreatefromjpeg($image); 

			break;

	    case "image/png":

		case "image/x-png":

			$source=imagecreatefrompng($image); 

			break;

  	}

	imagecopyresampled($newImage,$source,0,0,$start_width,$start_height,$newImageWidth,$newImageHeight,$width,$height);

	switch($imageType) {

		case "image/gif":

	  		imagegif($newImage,$thumb_image_name); 

			break;

      	case "image/pjpeg":

		case "image/jpeg":

		case "image/jpg":

	  		imagejpeg($newImage,$thumb_image_name,100); 

			break;

		case "image/png":

		case "image/x-png":

			imagepng($newImage,$thumb_image_name);  

			break;

    }

	chmod($thumb_image_name, 0777);

	return $thumb_image_name;

}

if (isset($_POST["upload_thumbnail"])){

	if(isset($_POST['filename']) && $_POST['filename'] != ''){

		$filename = $_POST['filename'];

		$large_image_location = $upload_path.$_POST['filename'];

		$thumb_image_location = $upload_path."200X200/".$_POST['filename'];



		$x1 = $_POST["x1"];

		$y1 = $_POST["y1"];

		$x2 = $_POST["x2"];

		$y2 = $_POST["y2"];

		$w = $_POST["w"];

		$h = $_POST["h"];

		

		$scale = $thumb_width/$w;

		$cropped = resizeThumbnailImage($thumb_image_location, $large_image_location,$w,$h,$x1,$y1,$scale);

		if($cropped){

			mysql_query("UPDATE sr_user_photo SET is_profileImage= 0 WHERE is_profileImage=1 and user_id='".$user_id."'");

			$query = mysql_query("insert into sr_user_photo set photo='".$filename."', user_id='".$user_id."',
				status='0', photo_type='1',private='0',is_profileImage= 1 , created_on='".DATE_TIME."',updated_on='".DATE_TIME."',created_by='".$user_id."',updated_by='".$user_id."'");

			$sql=mysql_query("UPDATE sr_users set profile_image='".$filename."',updated_on='".DATE_TIME."' 
				WHERE user_id='".$user_id."'");

			if($query==true && $sql==true)

			{

				

			}

			else

			{

				//echo "<script>window.location.href=''</script>";

			}

		

		}

	}else{

	

	

	}

	

	//echo "<img src='".$thumb_image_location."' />";

	//header("location:".$_SERVER["PHP_SELF"]);

	//exit();

}



/**********************UPLOAD MY PHOTO**********************************

if(isset($_REQUEST['uploadMyPhoto'])){

	$resp=$userProfileObj->uploadPhoto(1);

	if($resp == 1){

		//echo "<script>alert('You have uploaded photo successfully.');</script>";

	}else if($resp == 0){

		echo "<script>alert('There is some problem in network.Please try again.');</script>";

	}else if($resp == 3){

		echo "<script>alert('Please select image.');</script>";

	}else if($resp ==7){

		echo "<script>alert('file size not larger than 10 MB');</script>";

	}else if($resp ==8){

		echo "<script>alert('Please upload image jpg or png or jpeg');</script>";

	}

}

/**********************UPLOAD GROUP PHOTO**********************************

if(isset($_REQUEST['uploadGroupPhoto']))

{

	$resp=$userProfileObj->uploadPhoto(2);

	if($resp == 1){

		//echo "<script>alert('You have uploaded photo successfully.');</script>";

	}else if($resp == 0){

		echo "<script>alert('There is some problem in network.Please try again.');</script>";

	}else if($resp == 3){

		echo "<script>alert('Please select image.');</script>";

	}else if($resp ==7){

		echo "<script>alert('file size not larger than 10 MB');</script>";

	}else if($resp ==8){

		echo "<script>alert('Please upload image jpg or png or jpeg');</script>";

	}

}

/**********************UPLOAD PRIVATE PHOTO**********************************

if(isset($_REQUEST['uploadPrivatePhoto']))

{

	$resp=$userProfileObj->uploadPhoto(3);

	if($resp == 1){

		//echo "<script>alert('You have uploaded photo successfully.');</script>";

	}else if($resp == 0){

		echo "<script>alert('There is some problem in network.Please try again.');</script>";

	}else if($resp == 3){

		echo "<script>alert('Please select image.');</script>";

	}else if($resp ==7){

		echo "<script>alert('file size not larger than 10 MB');</script>";

	}else if($resp ==8){

		echo "<script>alert('Please upload image jpg or png or jpeg');</script>";

	}

}

/********************************SEARCH PAGE ***********************************/

if(isset($_REQUEST['updateSearchResult']))

{

	$searchQuery=$userProfileObj->updateSearch($user_id); 

	//*******************LOCATION**********************************/

		if(isset($_POST['location_lon'] , $_POST['location_lat'] ,$_POST['miles']) && !empty($_POST['location_lon']) && !empty($_POST['location_lat']) && !empty($_POST['miles'])){

			$location_lon=$_POST['location_lon'];

			$location_lat=$_POST['location_lat'];

			$miles=$_POST['miles'];

			$dx=$miles / 0.62137;

			$dy=$miles / 0.62137;

			$latitude  = $location_lat  + ($dx/ 6378) * (180 / pi());

			$longitude = $location_lon + ($dy / 6378) * (180 / pi()) / cos($location_lat * pi()/180);

			$addQuery .= " AND location_lon BETWEEN ".$location_lon." AND ".$longitude."";

			$addQuery .= " AND location_lat BETWEEN ".$location_lat." AND ".$latitude."";

		}else if(isset($_POST['location_lon'] ,$_POST['location_lat']) && !empty($_POST['location_lon']) && !empty($_POST['location_lat']) ){

			$location_lon=$_POST['location_lon'];

			$location_lat=$_POST['location_lat'];

			$addQuery .= " AND location_lon='".$location_lon."'";

			$addQuery .= " AND location_lat='".$location_lat."'";

		}
	elseif(empty($_POST['location_lon']) && empty($_POST['location_lat']))
	{
		$userResult = $userProfileObj->getUserInfo($user_id);
		$location_lon=$userResult['location_lon'];
		$location_lat=$userResult['location_lat'];
		$addQuery .= " AND location_lon='".$location_lon."'";

		$addQuery .= " AND location_lat='".$location_lat."'";
	}

		if(isset($_POST['hiddenSearchInterest']) && !empty($_POST['hiddenSearchInterest'])){

			$interestIds=$_POST['hiddenSearchInterest'];

		}

		if(isset($_POST['relationship_status']) && !empty($_POST['relationship_status'])){

			$relationships = implode(',' , $_POST['relationship_status']);

			$addQuery .= " AND relationship_status IN (".$relationships.")";

		}

		if(isset($_POST['star_sign']) && !empty($_POST['star_sign'])){

			$star_signs = implode(',' , $_POST['star_sign']);

			$addQuery .= " AND star_sign IN (".$star_signs.")";

		}

		if(isset($_POST['sexuality']) && !empty($_POST['sexuality'])){

			$sexualities = implode(',' , $_POST['sexuality']);

			$addQuery .= " AND sexuality IN (".$sexualities.")";

		}

		if(isset($_POST['body_type']) && !empty($_POST['body_type'])){

			$body_types = implode(',' , $_POST['body_type']);

			$addQuery .= " AND body_type IN (".$body_types.")";

		}

		if(isset($_POST['complexion']) && !empty($_POST['complexion'])){

			$complexions = implode(',' , $_POST['complexion']);

			$addQuery .= " AND complexion IN (".$complexions.")";

		}

		if(isset($_POST['hair_color']) && !empty($_POST['hair_color'])){

			$hair_colors = implode(',' , $_POST['hair_color']);

			$addQuery .= " AND hair_color IN (".$hair_colors.")";

		}

		if(isset($_POST['eye_color']) && !empty($_POST['eye_color'])){

			$eye_colors = implode(',' , $_POST['eye_color']);

			$addQuery .= " AND eye_color IN (".$eye_colors.")";

		}

		if(isset($_POST['language']) && !empty($_POST['language'])){

			$languages = implode(',' , $_POST['language']);

			$addQuery .= " AND language IN (".$languages.")";

		}

		if(isset($_POST['smoking']) && !empty($_POST['smoking'])){

			$smokings = implode(',' , $_POST['smoking']);

			$addQuery .= " AND smoking IN (".$smokings.")";

		}

		if(isset($_POST['drinking']) && !empty($_POST['drinking'])){

			$drinkings = implode(',' , $_POST['drinking']);

			$addQuery .= " AND drinking IN (".$drinkings.")";

		}

		if(isset($_POST['kids']) && !empty($_POST['kids'])){

			$kid = implode(',' , $_POST['kids']);

			$addQuery .= " AND kids IN (".$kid.")";

		}

		if(isset($_POST['education']) && !empty($_POST['education'])){

			$educations = implode(',' , $_POST['education']);

			$addQuery .= " AND education IN (".$educations.")";

		}

		if(isset($_POST['income']) && !empty($_POST['income'])){

			$incomes = implode(',' , $_POST['income']);

			$addQuery .= " AND income IN (".$incomes.")";

		}

		if(isset($_POST['min_height']) && !empty($_POST['min_height']) && isset($_POST['max_height']) && !empty($_POST['max_height'])){

			$addQuery .= " AND (height BETWEEN '".$_POST['min_height']."' AND  '".$_POST['max_height']."')";

		}else if(isset($_POST['min_height']) && !empty($_POST['min_height'])){

			$addQuery .= " AND height >= '".$_POST['min_height']."'";

		}

		else if(isset($_POST['max_height']) && !empty($_POST['max_height'])){

			$addQuery .= " AND height <= '".$_POST['max_height']."'";

		}
}



/****************FOR KISMAT CONNECTION PAGE***************************************/

if(isset($_REQUEST['kcupdateSearchResult']))

{

	$searchQuery=$userProfileObj->updateConnection($user_id); 

}



/**************************************************************************************/

$userResult = $userProfileObj->getUserInfo($user_id);

$isFameReel = $userProfileObj->isFameReel($user_id);

$CustomizeTheme = $userProfileObj->getCustomizeTheme($userResult['profile_customize_id']);

$userCredit = $userProfileObj->getUserCredit($user_id);

$isVipMember = $userProfileObj->isVipMember($userResult['user_id']);

$vipExpiryDate = $userProfileObj->vipExpireDate($userResult['user_id']);

$isFbLinked = $userProfileObj->isFbLinked($userResult['user_id']);

$isMobileVerified = $userProfileObj->isMobileVerified($userResult['user_id']);

$userProfileImage=$userProfileObj->getProfileImage($userResult['profile_image']);

$userCropProfileImage=$userProfileObj->getCropProfileImage($userResult['profile_image']);

$userProfileImg=$userProfileObj->getProfileImg($userResult['profile_image']);

$photoReelArray=$userProfileObj->getPhotoReel($userResult['city'] , $userResult['country']);

$allMyPhotoArray = $userProfileObj->getMyPhotoComment($user_id);

$allMyPhotoCount = count($allMyPhotoArray);



$otherPhotoArray = $userProfileObj->getOtherPhotoComment($user_id);

$otherPhotoCount = count($otherPhotoArray);



$customizeThemeArray = $userProfileObj->getAllCustomizeTheme();

$currencyArray = $userProfileObj->getCurrency();







//REPUTATIPN EXPIRE	

mysql_query("UPDATE `sr_user_reputation` SET status=0 WHERE `datetime` <= '".DATE_TIME."' - INTERVAL 1 DAY AND `reputation_type` IN(4,5,6,7,8,9) AND status=1");

//VIP EXPIRE

mysql_query("UPDATE sr_vip_user SET status=0 WHERE end_date < '".DATE_TIME."' AND  status=1");

if(!$isVipMember)
	{
		$query2=mysql_query("update sr_users set profile_customize_id=0 WHERE  user_id=$user_id") or die(mysql_error());
		$rows=mysql_affected_rows();
		//echo "<script>alert('".$rows." rows updated');</script>";
		$query3=mysql_query("update sr_users set hide_presence=0 and hide_vip=0 WHERE  user_id=$user_id") or die(mysql_error());
		$rows2=mysql_affected_rows();
		if(isset($rows2)&&$rows2!='')
		{
			echo "<script>window.location='".$_SERVER['REQUEST_URI']."'</script>";
		}
		//echo "<script>alert('".$rows2." rows updated');</script>";

		//echo "<script>window.location='".$_SERVER['REQUEST_URI']."'</script>" ;

	}
//CREDIT EXPIRE

//mysql_query("UPDATE sr_user_credit SET status=0 WHERE end_date < '".DATE_TIME."' AND  status=1");

?>
