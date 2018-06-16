<?php
include('../classes/epClass.php');
$epObj = new Entertainment();
//print_r($_POST);
//cprint_r($_FILES);
$uid=$_REQUEST['uid'];
$allusers=$epObj->getAllUsers();
$maleUsers=$epObj->getMaleUsers();
$femaleUsers=$epObj->getFemaleUsers();
$insertCount=0;
if( isset($_POST['action']) && trim($_POST['action'])=="createEP" )
{
	//print_r($_POST);

	parse_str($_POST['data']);
	
	$usr_name = ( isset($_POST['usr_name']) && trim($_POST['usr_name'])!="" )?trim($_POST['usr_name']):"";
	$dob_date = ( isset($_POST['dob_date']) && trim($_POST['dob_date'])!="" )?trim($_POST['dob_date']):"";
	$gender = ( isset($_POST['gender']) && trim($_POST['gender'])!="" )?trim($_POST['gender']):"";
	$location = ( isset($_POST['location']) && trim($_POST['location'])!="" )?trim($_POST['location']):"";
	$usr_iamhere = ( isset($_POST['usr_iamhere']) && trim($_POST['usr_iamhere'])!="" )?trim($_POST['usr_iamhere']):"";
	$aboutMe = ( isset($_POST['aboutMe']) && trim($_POST['aboutMe'])!="" )?trim($_POST['aboutMe']):"";
	$lookingFor = ( isset($_POST['lookingFor']) && trim($_POST['lookingFor'])!="" )?trim($_POST['lookingFor']):"";
	$relation = ( isset($_POST['relation']) && trim($_POST['relation'])!="" )?trim($_POST['relation']):"";
	$starsign = ( isset($_POST['starsign']) && trim($_POST['starsign'])!="" )?trim($_POST['starsign']):"";
	$sexuality = ( isset($_POST['sexuality']) && trim($_POST['sexuality'])!="" )?trim($_POST['sexuality']):"";
	$bodytype = ( isset($_POST['bodytype']) && trim($_POST['bodytype'])!="" )?trim($_POST['bodytype']):"";
	$complexion = ( isset($_POST['complexion']) && trim($_POST['complexion'])!="" )?trim($_POST['complexion']):"";
	$height = ( isset($_POST['height']) && trim($_POST['height'])!="" )?trim($_POST['height']):"";
	$eyecolor = ( isset($_POST['eyecolor']) && trim($_POST['eyecolor'])!="" )?trim($_POST['eyecolor']):"";
	$haircolor = ( isset($_POST['haircolor']) && trim($_POST['haircolor'])!="" )?trim($_POST['haircolor']):"";
	$language = ( isset($_POST['language']) && trim($_POST['language'])!="" )?trim($_POST['language']):"";
	$smoking = ( isset($_POST['smoking']) && trim($_POST['smoking'])!="" )?trim($_POST['smoking']):"";
	$drinking = ( isset($_POST['drinking']) && trim($_POST['drinking'])!="" )?trim($_POST['drinking']):"";
	$kids = ( isset($_POST['kids']) && trim($_POST['kids'])!="" )?trim($_POST['kids']):"";
	$education = ( isset($_POST['education']) && trim($_POST['education'])!="" )?trim($_POST['education']):"";
	$usr_work = ( isset($_POST['usr_work']) && trim($_POST['usr_work'])!="" )?trim($_POST['usr_work']):"";
	$dob_date=date('Y-m-d',strtotime($dob_date));
	$insertID = $epObj->createProfile($usr_name, $dob_date, $gender, $location, $aboutMe, $lookingFor, $relation, $starsign, $sexuality, $bodytype, $complexion, $height, $eyecolor, $haircolor, $language, $smoking, $drinking, $kids, $education, $usr_work, $usr_iamhere);
	
	if( $insertID!=0 )
	{
		$insertEP = $epObj->createEpLink($insertID);
		echo $insertEP;
	}
}
if( isset($_POST['action']) && trim($_POST['action'])=="editEP" )
{
	//print_r($_POST);

	parse_str($_POST['data']);

	$usr_name = ( isset($_POST['usr_name']) && trim($_POST['usr_name'])!="" )?trim($_POST['usr_name']):"";
	$dob_date = ( isset($_POST['dob_date']) && trim($_POST['dob_date'])!="" )?trim($_POST['dob_date']):"";
	$gender = ( isset($_POST['gender']) && trim($_POST['gender'])!="" )?trim($_POST['gender']):"";
	$location = ( isset($_POST['location']) && trim($_POST['location'])!="" )?trim($_POST['location']):"";
	$usr_iamhere = ( isset($_POST['usr_iamhere']) && trim($_POST['usr_iamhere'])!="" )?trim($_POST['usr_iamhere']):"";
	$aboutMe = ( isset($_POST['aboutMe']) && trim($_POST['aboutMe'])!="" )?trim($_POST['aboutMe']):"";
	$lookingFor = ( isset($_POST['lookingFor']) && trim($_POST['lookingFor'])!="" )?trim($_POST['lookingFor']):"";
	$relation = ( isset($_POST['relation']) && trim($_POST['relation'])!="" )?trim($_POST['relation']):"";
	$starsign = ( isset($_POST['starsign']) && trim($_POST['starsign'])!="" )?trim($_POST['starsign']):"";
	$sexuality = ( isset($_POST['sexuality']) && trim($_POST['sexuality'])!="" )?trim($_POST['sexuality']):"";
	$bodytype = ( isset($_POST['bodytype']) && trim($_POST['bodytype'])!="" )?trim($_POST['bodytype']):"";
	$complexion = ( isset($_POST['complexion']) && trim($_POST['complexion'])!="" )?trim($_POST['complexion']):"";
	$height = ( isset($_POST['height']) && trim($_POST['height'])!="" )?trim($_POST['height']):"";
	$eyecolor = ( isset($_POST['eyecolor']) && trim($_POST['eyecolor'])!="" )?trim($_POST['eyecolor']):"";
	$haircolor = ( isset($_POST['haircolor']) && trim($_POST['haircolor'])!="" )?trim($_POST['haircolor']):"";
	$language = ( isset($_POST['language']) && trim($_POST['language'])!="" )?trim($_POST['language']):"";
	$smoking = ( isset($_POST['smoking']) && trim($_POST['smoking'])!="" )?trim($_POST['smoking']):"";
	$drinking = ( isset($_POST['drinking']) && trim($_POST['drinking'])!="" )?trim($_POST['drinking']):"";
	$kids = ( isset($_POST['kids']) && trim($_POST['kids'])!="" )?trim($_POST['kids']):"";
	$education = ( isset($_POST['education']) && trim($_POST['education'])!="" )?trim($_POST['education']):"";
	$usr_work = ( isset($_POST['usr_work']) && trim($_POST['usr_work'])!="" )?trim($_POST['usr_work']):"";
	$userid=( isset($_POST['userid']) && trim($_POST['userid'])!="" )?trim($_POST['userid']):"";
	$dob_date=date('Y-m-d',strtotime($dob_date));
	$insertID = $epObj->editProfile($userid,$usr_name, $dob_date, $gender, $location, $aboutMe, $lookingFor, $relation, $starsign, $sexuality, $bodytype, $complexion, $height, $eyecolor, $haircolor, $language, $smoking, $drinking, $kids, $education, $usr_work, $usr_iamhere);

	if( $insertID!=0 )
	{
		echo $insertID;
	}
}
# Review EP
if( isset($_POST['action']) && trim($_POST['action'])=="reviewEP" )
{
	//print_r($_POST);
	parse_str($_POST['data']);
	//echo $_POST['data'].'s';
	$relation = ( isset($_POST['relation']) && trim($_POST['relation'])!="" )?trim($_POST['relation']):"";
	$starsign = ( isset($_POST['starsign']) && trim($_POST['starsign'])!="" )?trim($_POST['starsign']):"";
	$sexuality = ( isset($_POST['sexuality']) && trim($_POST['sexuality'])!="" )?trim($_POST['sexuality']):"";
	$bodytype = ( isset($_POST['bodytype']) && trim($_POST['bodytype'])!="" )?trim($_POST['bodytype']):"";
	$complexion = ( isset($_POST['complexion']) && trim($_POST['complexion'])!="" )?trim($_POST['complexion']):"";
	$height = ( isset($_POST['height']) && trim($_POST['height'])!="" )?trim($_POST['height']):"";
	$eyecolor = ( isset($_POST['eyecolor']) && trim($_POST['eyecolor'])!="" )?trim($_POST['eyecolor']):"";
	$haircolor = ( isset($_POST['haircolor']) && trim($_POST['haircolor'])!="" )?trim($_POST['haircolor']):"";
	$language = ( isset($_POST['language']) && trim($_POST['language'])!="" )?trim($_POST['language']):"";
	$smoking = ( isset($_POST['smoking']) && trim($_POST['smoking'])!="" )?trim($_POST['smoking']):"";
	$drinking = ( isset($_POST['drinking']) && trim($_POST['drinking'])!="" )?trim($_POST['drinking']):"";
	$kids = ( isset($_POST['kids']) && trim($_POST['kids'])!="" )?trim($_POST['kids']):"";
	$education = ( isset($_POST['education']) && trim($_POST['education'])!="" )?trim($_POST['education']):"";
	$usr_work = ( isset($_POST['usr_work']) && trim($_POST['usr_work'])!="" )?trim($_POST['usr_work']):"";

	$getRelationships = $epObj->getRelationshipByID($relation);
	//print_r($getRelationships);
	$getStarsign = $epObj->getstarSignByID($starsign);
	$getSexuality = $epObj->getSexualityByID($sexuality);
	$getBodyType = $epObj->getBodyTypeByID($bodytype);
	$getComplexion = $epObj->getComplexionByID($complexion);
	$getEyeColor = $epObj->getEyeColorByID($eyecolor);
	$getHairColor = $epObj->getHairColorByID($haircolor);
	$getLanguage = $epObj->getLanguageByID($language);
	$getEducation = $epObj->getEducationByID($education);
	
	?>
	<li>
		<ul class="inner-personal-info">
			<li>Relational Status:&nbsp;<?php echo $getRelationships['relationship_status']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Star Sign:&nbsp;<?php echo $getStarsign['star_sign']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Sexuality:&nbsp;<?php echo $getSexuality['sexuality']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Body Type:&nbsp;<?php echo $getBodyType['body_type']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Complexion:&nbsp;<?php echo $getComplexion['complexion_id']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Height:&nbsp;<?php echo $height; ?> cm</li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Eye Color:&nbsp;<?php echo $getEyeColor['eye_color']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Hair Color:&nbsp;<?php echo $getHairColor['hair_color']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Languages:&nbsp;<?php echo $getLanguage['language']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Smoking:&nbsp;<?php echo ($smoking=='1')?"Yes":"No"; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Drinking:&nbsp;<?php echo ($drinking=='1')?"Yes":"No"; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Kids:&nbsp;<?php echo ($kids=='1')?"Yes":"No"; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Education:&nbsp;<?php echo $getEducation['education']; ?></li><li></li>
		</ul>
	</li>
	<li>
		<ul class="inner-personal-info">
			<li>Work:&nbsp;<?php echo $usr_work; ?></li><li></li>
		</ul>
	</li>
	<?php
}
if( isset($_POST['action']) && trim($_POST['action'])=="deleteProfile" )
{
	//print_r($_POST);
	$userid=$_REQUEST['userid'];
	$query=mysql_query('delete from sr_ep_profile where user_id='.$userid);

	if(mysql_affected_rows($query)>0)
	{
		$query2=mysql_query('update sr_users set is_account_freeze = 1 WHERE user_id='.$userid);
		if($query2)
		echo 1;
	}
	else
	{
		echo 0;
	}
}
if(isset($_POST['action']) && trim($_POST['action'])=="visitSelected"){

	//print_r($maleUsers);
	if(isset($_POST['visitor']) && $_POST['visitor']=='visitor')
	{
		if($_POST['visit-select']=='male')
		{
			foreach ($maleUsers as $maleUser) {
				 $muid=$maleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("select * from sr_profile_visitors where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)>0)
				{
					$arr=mysql_fetch_array($sql);
					//echo $arr['user_id']."<br />";
				//	echo "update sr_profile_visitors set updated_on=now() where user_id=$uid and visitor_id=$muid ";
					$updateVisitorQuery=mysql_query("update sr_profile_visitors set updated_on=now() where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				}
				else
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_profile_visitors`(`visit_id`, `user_id`, `visitor_id`, `status`, `visited_on`, `updated_on`) VALUES ('NULL',$muid,$uid,1,now(),now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
		}
			echo $insertCount;
		}
		if($_POST['visit-select']=='female')
		{
			foreach ($femaleUsers as $femaleUser) {
				$muid=$femaleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("select * from sr_profile_visitors where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)>0)
				{
					$arr=mysql_fetch_array($sql);
					//echo $arr['user_id']."<br />";
					//	echo "update sr_profile_visitors set updated_on=now() where user_id=$uid and visitor_id=$muid ";
					$updateVisitorQuery=mysql_query("update sr_profile_visitors set updated_on=now() where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				}
				else
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_profile_visitors`(`visit_id`, `user_id`, `visitor_id`, `status`, `visited_on`, `updated_on`) VALUES ('NULL',$muid,$uid,1,now(),now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
		if($_POST['visit-select']=='all')
		{
			foreach ($allusers as $allUser) {
				$muid=$allUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("select * from sr_profile_visitors where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)>0)
				{
					$arr=mysql_fetch_array($sql);
					//echo $arr['user_id']."<br />";
					//	echo "update sr_profile_visitors set updated_on=now() where user_id=$uid and visitor_id=$muid ";
					$updateVisitorQuery=mysql_query("update sr_profile_visitors set updated_on=now() where user_id=$muid and visitor_id=$uid") or die(mysql_error());
				}
				else
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_profile_visitors`(`visit_id`, `user_id`, `visitor_id`, `status`, `visited_on`, `updated_on`) VALUES ('NULL',$muid,$uid,1,now(),now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
	}
}
if(isset($_POST['action2']) && trim($_POST['action2'])=="likeSelected"){
	if(isset($_POST['liked']) && $_POST['liked']=='liked')
	{

		if($_POST['visit-select']=='male')
		{
			foreach ($maleUsers as $maleUser) {
				 $muid=$maleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("SELECT `like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on` FROM `sr_user_like` WHERE user_id=$muid AND liked_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_like`(`like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on`) VALUES ('NULL',$muid,$uid,0,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
		if($_POST['visit-select']=='female')
		{
			foreach ($femaleUsers as $femaleUser) {
				$muid=$femaleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("SELECT `like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on` FROM `sr_user_like` WHERE user_id=$muid AND liked_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_like`(`like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on`) VALUES ('NULL',$muid,$uid,0,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}

			}
			echo $insertCount;
		}
		if($_POST['visit-select']=='all')
		{
			foreach ($allusers as $allUser) {
				$muid=$allUser['user_id'];
				$sql=mysql_query("SELECT `like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on` FROM `sr_user_like` WHERE user_id=$muid AND liked_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_like`(`like_id`, `user_id`, `liked_by`, `from_kc`, `status`, `liked_on`) VALUES ('NULL',$muid,$uid,0,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
	}
}
if(isset($_POST['action3']) && trim($_POST['action3'])=="favoriteSelected"){
	if(isset($_POST['favorite']) && $_POST['favorite']=='favorite')
	{
		//print_r($_POST);
		if($_POST['visit-select']=='male')
		{
			foreach ($maleUsers as $maleUser) {
				$muid=$maleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("SELECT * FROM `sr_user_favourites` WHERE user_id=$muid AND favourite_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_favourites`(`favourite_id`, `user_id`, `favourite_by`, `status`, `favourite_on`) VALUES ('NULL',$muid,$uid,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
		if($_POST['visit-select']=='female')
		{
			foreach ($femaleUsers as $femaleUser) {
				$muid=$femaleUser['user_id'];
				//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
				$sql=mysql_query("SELECT * FROM `sr_user_favourites` WHERE user_id=$muid AND favourite_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_favourites`(`favourite_id`, `user_id`, `favourite_by`, `status`, `favourite_on`) VALUES ('NULL',$muid,$uid,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}

			}
			echo $insertCount;
		}
		if($_POST['visit-select']=='all')
		{
			foreach ($allusers as $allUser) {
				$muid=$allUser['user_id'];
				$sql=mysql_query("SELECT * FROM `sr_user_favourites` WHERE user_id=$muid AND favourite_by=$uid") or die(mysql_error());
				if(mysql_num_rows($sql)==0)
				{
					$insertVisitorQuery=mysql_query("INSERT INTO `sr_user_favourites`(`favourite_id`, `user_id`, `favourite_by`, `status`, `favourite_on`) VALUES ('NULL',$muid,$uid,1,now()) ") or die(mysql_error());
					if($insertVisitorQuery)
					{
						$insertCount++;
					}
				}
			}
			echo $insertCount;
		}
	}
}
if(isset($_POST['action3']) && trim($_POST['action3'])=='fame-reel'){
	//print_r($_POST);
	$user_id=$_REQUEST['uid'];
	$fameReelQuery=mysql_query("SELECT * FROM sr_fame_reel WHERE user_id='".$user_id."'");
	echo mysql_num_rows($fameReelQuery);
	if(mysql_num_rows($fameReelQuery)){
		$insertQuery = mysql_query("UPDATE sr_fame_reel SET updated_on='".DATE_TIME."' WHERE  user_id='".$user_id."'") or die(mysql_error());
		if($insertQuery){
			echo 2;
		}

	}else{

		$insertQuery = mysql_query("INSERT INTO sr_fame_reel SET user_id='".$user_id."' , status=1 , created_on='".DATE_TIME."', updated_on='".DATE_TIME."'") or die(mysql_error());
		if($insertQuery){
			echo 3;
		}
	}


}
if(isset($_POST['action6']) && trim($_POST['action6'])=='govip'){

	$userId = $_POST['uid'];
	$duration ="+ 7 days";
	$start_date=gmdate("Y-m-d H:i:s", time()+19800);
	$end_date = date("Y-m-d H:i:s", strtotime($duration, strtotime($start_date)));

	$vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$userId."' AND status=1");
	if($vipQuery && mysql_num_rows($vipQuery) == 0){
		$query = mysql_query("INSERT INTO sr_vip_user SET start_date='".$start_date."',end_date='".$end_date."', status=1, by_admin=1, user_id='".$userId."'");

		if($query){

			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Upgrade to VIP Member', admin_id='".$adminId."', timestamp=now() , status=1");

			echo 1;

		}else{
			echo 0;
		}
	}else{
		echo 0;
	}
}
if(isset($_POST['action5']) && trim($_POST['action5'])=='reputation'){

	$userId = $_POST['uid'];
	$query1=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '1', '1', $userId, now())");
	$query2=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '2', '1', $userId, now())");
	$query3=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '3', '1', $userId, now())");
	$query4=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '4', '1', $userId, now())");
	$query5=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '5', '1', $userId, now())");
	$query6=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '6', '1', $userId, now())");
	$query7=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '7', '1', $userId, now())");
	$query8=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '8', '1', $userId, now())");
	$query9=mysql_query("INSERT INTO `sr_user_reputation` (`reputation_id`, `reputation`, `reputation_type`, `status`, `user_id`, `datetime`) VALUES (NULL, '10', '9', '1', $userId, now())");
if($query9)
{
	echo 1;
}
}
if(isset($_POST['action']) && trim($_POST['action'])=='stock'){
	$userId = $_POST['uid'];
	if($_POST['message-select']=='male')
	{
		foreach ($maleUsers as $maleUser) {
			$muid=$maleUser['user_id'];
			//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
			$sql=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$muid   AND `sent_by` =$userId ") or die(mysql_error());
			$sql2=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$userId   AND `sent_by` =$muid ") or die(mysql_error());
			//echo "SELECT * FROM `sr_user_message` WHERE `sent_to` =$muid   AND `sent_by` =$userId and is_deletebyfrom=1";
			$sql3=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$muid   AND `sent_by` =$userId and is_deletebyto=1") or die(mysql_error());
			if(mysql_num_rows($sql)==0 && mysql_num_rows($sql2)==0)
			{
				$insertMessageQuery=mysql_query("INSERT INTO `sr_user_message` (`msg_id`, `msg`, `msg_upload`, `sent_to`, `sent_by`, `sent_date`, `receive_date`, `status`, `is_read`, `is_deletebyfrom`, `is_deletebyto`, `notify_status`) VALUES (NULL, 'Hey nice profile..!', '', $muid, $userId, now(), '', '1', '0', '0', '0', '0'); ") or die(mysql_error());
				echo 1;
			}
			elseif(mysql_num_rows($sql3)==1)
			{
				$insertMessageQuery=mysql_query("INSERT INTO `sr_user_message` (`msg_id`, `msg`, `msg_upload`, `sent_to`, `sent_by`, `sent_date`, `receive_date`, `status`, `is_read`, `is_deletebyfrom`, `is_deletebyto`, `notify_status`) VALUES (NULL, 'Hey nice profile..!', '', $muid, $userId, now(), '', '1', '0', '0', '0', '0'); ") or die(mysql_error());
				echo 2;
			}
			echo 3;
		}
	}
	if($_POST['message-select']=='female')
	{
		foreach ($femaleUsers as $femaleUser) {
			$muid=$femaleUser['user_id'];
			//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
			$sql=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$muid   AND `sent_by` =$userId ") or die(mysql_error());
			$sql2=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$userId   AND `sent_by` =$muid ") or die(mysql_error());
			if(mysql_num_rows($sql)==0 && mysql_num_rows($sql2)==0)
			{
				$insertMessageQuery=mysql_query("INSERT INTO `sr_user_message` (`msg_id`, `msg`, `msg_upload`, `sent_to`, `sent_by`, `sent_date`, `receive_date`, `status`, `is_read`, `is_deletebyfrom`, `is_deletebyto`, `notify_status`) VALUES (NULL, 'Hey nice profile..!', '', $muid, $userId, now(), '', '1', '0', '0', '0', '0'); ") or die(mysql_error());
			}
		}
	}
	if($_POST['message-select']=='all')
	{
		foreach ($allusers as $alluser) {
			$muid=$alluser['user_id'];
			//echo "select * from sr_profile_visitors where user_id=$uid and visitor_id=$muid";
			$sql=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$muid   AND `sent_by` =$userId ") or die(mysql_error());
			$sql2=mysql_query("SELECT * FROM `sr_user_message` WHERE `sent_to` =$userId   AND `sent_by` =$muid ") or die(mysql_error());
			if(mysql_num_rows($sql)==0 && mysql_num_rows($sql2)==0)
			{
				$insertMessageQuery=mysql_query("INSERT INTO `sr_user_message` (`msg_id`, `msg`, `msg_upload`, `sent_to`, `sent_by`, `sent_date`, `receive_date`, `status`, `is_read`, `is_deletebyfrom`, `is_deletebyto`, `notify_status`) VALUES (NULL, 'Hey nice profile..!', '', $muid, $userId, now(), '', '1', '0', '0', '0', '0'); ") or die(mysql_error());
			}
		}
	}


}
?>