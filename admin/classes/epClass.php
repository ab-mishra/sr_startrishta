<?php
require_once('connection.php');
require('resizeclass.php');
ini_set('display_errors',1);
class Entertainment extends Connection
{
	function __construct(){
		$this->createConnection();
	}

	/************************** List of EPs ******************************/
	#Create user profile
	function createProfile($usr_name='', $dob_date='', $gender='', $location='', $aboutMe='', $lookingFor='', $relation='', $starsign='', $sexuality='', $bodytype='', $complexion='', $height='', $eyecolor='', $haircolor='', $language='', $smoking='', $drinking='', $kids='', $education='', $usr_work='', $usr_iamhere='',$lan1='',$lon1='',$lan2='',$lon2='',$lan3='',$lon3='',$lan4='',$lon4='',$lan5='',$lon5='',$lan6='',$lon6='')
	{
		$loc = $_POST['location'];
		$random = rand(000,99999);
		$i=1;
		foreach ($loc as $key => $value) 
		{ 
			$key2=$key+1;
			$final_lan=${"lan".$key2};
			 $final_lon=${"lon".$key2};
			 //print_r($loc);
			if($value != '')
			{
				$filename = $random.'_'.$_FILES["imagefile"]["name"][0];
				$logQuery = mysql_query("Insert into sr_user_login(email_id, password, role_id, status, 
					created_on) values('', '', '2', '1', '".date('Y-m-d')."') ");
				$lastUserID = ($logQuery)?mysql_insert_id():0;
				
				$query = mysql_query("insert into sr_users(user_id, user_name, gender, dob,profile_image, 
				location,location_lat,location_lon,relationship_status, sexuality, star_sign, body_type, complexion, height, 
				height_in, eye_color, hair_color, language, smoking, drinking, kids, education, work, 
				about_me, looking_for, here_to, is_account_freeze, is_deleted, is_suspended, is_erase, created_on) values('".$lastUserID."', '".$usr_name."', 
				'".$gender."', '".$dob_date."','".$filename."', '".$value."', '".$final_lan."','".$final_lon."', '".$relation."', 
				'".$sexuality."', '".$starsign."', '".$bodytype."', '".$complexion."', 
				'".$height."', '1', '".$eyecolor."', '".$haircolor."', '".$language."', 
				'".$smoking."', '".$drinking."', '".$kids."', '".$education."', 
				'".$usr_work."', '".$aboutMe."', '".$lookingFor."', '".$usr_iamhere."', '0', '0', '0', '0',
				'".date('Y-m-d')."') ");
				
				$ep_query = mysql_query("INSERT into sr_ep_profile set `user_id` = '".$lastUserID."', 
					`created_on` = now(), `status` = 0 ");

				$url = "/home/startrishta/public_html/beta-dev/upload/";
				//$url = "D:/wamp/www/startris/upload/";
				$dir = $url."photo/thumb/";
				//$thumbdir = "/home/startrishta/public_html/upload/photo/";
				$thumbdir = $url."photo/";
				//$dir200 = "/home/startrishta/public_html/upload/photo/200X200";
				$dir200 = $url."photo/200X200/";
					if(isset($_FILES["imagefile"]["type"][0]))
					{
						$sourcePath = $_FILES['imagefile']['tmp_name'][0]; // Storing source path of the file in a variable
						$targetPath = $dir.$filename; // Target path where file is to be stored
						
						$moveFile = move_uploaded_file($_FILES['imagefile']['tmp_name'][0], $dir.$filename);
						$resizeObj = new resize($targetPath);
						
						$resizeObj -> resizeImage(387, 387, 'auto');
						$resizeObj -> saveImage($thumbdir.$filename, 100);
						
						$resizeObj -> resizeImage(200, 200, 'auto');
						$resizeObj -> saveImage($dir200.$filename, 100);
						
						$q2=mysql_query('INSERT INTO `sr_user_photo` set 
							`user_id`='.$lastUserID.', `photo`="'.$filename.'", `caption`="", `status`=1, 
							`filepath` = "'.$dir.'", `thumbfilepath` = "'.$thumbdir.'", 
							`thumbfilepath200x200` = "'.$dir200.'", `private`=0, `photo_type`=1, 
							`rate_status`=0, `is_profileImage`=1, `from_facebook`="", `created_on`=now(), 
							`created_by`=1, `updated_by`=1, `updated_on`=now()');
					}		
			}
			$i++;
		}
		if($q2){ return true; }
		//die();
	}

	function editProfile($userid='',$usr_name='', $dob_date='', $gender='', $location='', $aboutMe='', $lookingFor='', $relation='', $starsign='', $sexuality='', $bodytype='', $complexion='', $height='', $eyecolor='', $haircolor='', $language='', $smoking='', $drinking='', $kids='', $education='', $usr_work='', $usr_iamhere='')
	{
		//	echo is_uploaded_file($_FILES['imagefile']['tmp_name'][0]);
		if (is_uploaded_file($_FILES['imagefile']['tmp_name'][0])) {
			//echo getcwd();
			$filename = rand(000,99999).'_'.$_FILES["imagefile"]["name"][0];
			//$str=date();
			//$dir = "/home/startrishta/public_html/upload/photo/thumb";
			$url = "/home/startrishta/public_html/beta-dev/upload/";
			$dir = $url."photo/thumb/";
			//$thumbdir = "/home/startrishta/public_html/upload/photo/";
			$thumbdir = $url."photo/";
			//$dir200 = "/home/startrishta/public_html/upload/photo/200X200";
			$dir200 = $url."photo/200X200/";
			$sourcePath = $_FILES['imagefile']['tmp_name'][0]; // Storing source path of the file in a variable
			$targetPath = $dir.$filename; // Target path where file is to be stored
			//echo move_uploaded_file($sourcePath, $targetPath);
			
			$moveFile = move_uploaded_file($_FILES['imagefile']['tmp_name'][0], $dir.$filename);
			$resizeObj = new resize($targetPath);
			
			$resizeObj -> resizeImage(387, 387, 'auto');
			$resizeObj -> saveImage($thumbdir.$filename, 100);
			
			$resizeObj -> resizeImage(200, 200, 'auto');
			$resizeObj -> saveImage($dir200.$filename, 100);
			//if ($moveFile) {
				//die('uploaded');
				//echo 'INSERT INTO `sr_user_photo`(`photo_id`, `user_id`, `photo`, `caption`, `status`, `private`, `photo_type`, `rate_status`, `is_profileImage`, `from_facebook`, `created_on`, `created_by`, `updated_by`, `updated_on`) VALUES(NULL,'.$lastUserID.',"'.$filename.'","",1,0,1,0,1,"",now(),1,1,now())';
				//die();
				$q2 = mysql_query('UPDATE `sr_users` SET `user_name`="' . $usr_name . '",
					`gender`="' . $gender . '",`dob`="' . $dob_date . '",
					`profile_image`="' . $filename . '",`location`="' . $location . '",
					`relationship_status`="' . $relation . '",`sexuality`="' . $sexuality . '",
					`star_sign`="' . $starsign . '",`body_type`="' . $bodytype . '",
					`complexion`="' . $complexion . '",`height_in`="' . $height . '",
					`eye_color`="' . $eyecolor . '",`hair_color`="' . $haircolor . '",
					`language`="' . $language . '",`smoking`="' . $smoking . '",
					`drinking`="' . $drinking . '",`kids`="' . $kids . '",
					`education`="' . $education . '",`work`="' . $usr_work . '",
					`about_me`="' . $aboutMe . '",`looking_for`="' . $lookingFor . '",
					`here_to`="' . $usr_iamhere . '",`updated_on`=now() WHERE user_id=' . $userid) or die(mysql_error());
				if ($q2) {
					$qry3 = mysql_query("UPDATE `sr_user_photo` SET `photo`='$filename',
						`updated_by`='admin',`updated_on`=now() WHERE user_id=$userid") or die(mysql_error());
					if ($qry3) {
						//die('file uploaded');
						return 1;
					}
				} else {
					die(mysql_error());
				}

			//}

			// Moving Uploaded file
			/*echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
            echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
            echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
            echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";*/


		} else {
			$q2 = mysql_query('UPDATE `sr_users` SET `user_name`="' . $usr_name . '",
				`gender`="' . $gender . '",`dob`="' . $dob_date . '",`location`="' . $location . '",
				`relationship_status`="' . $relation . '",`sexuality`="' . $sexuality . '",
				`star_sign`="' . $starsign . '",`body_type`="' . $bodytype . '",`complexion`="' . $complexion . '",
				`height_in`="' . $height . '",`eye_color`="' . $eyecolor . '",`hair_color`="' . $haircolor . '",
				`language`="' . $language . '",`smoking`="' . $smoking . '",`drinking`="' . $drinking . '",
				`kids`="' . $kids . '",`education`="' . $education . '",`work`="' . $usr_work . '",
				`about_me`="' . $aboutMe . '",`looking_for`="' . $lookingFor . '",`here_to`="' . $usr_iamhere . '",
				`updated_on`=now() WHERE user_id=' . $userid);
			if ($q2) {
				//die('image not uploaded');
				return 1;
			}
			//die();
		}
	}
	#Link user account to EP
	function createEpLink($userID=0)
	{
		$query = mysql_query("Insert into sr_ep_profile(user_id, created_on) values('".$userID."', '".date('Y-m-d')."') ") or die(mysql_error());
		return ($query)?1:0;
	}

	#Get list of EPs
	function getEPLists()
	{
		$query = mysql_query("Select DISTINCT sep.user_id, sep.status, su.* from sr_users su INNER 
		join sr_ep_profile sep on sep.user_id = su.user_id where is_account_freeze = 0
		order by su.created_on asc ");
		return (mysql_num_rows($query)>0)?$query:0;
	}
	function getEPProfileInfo($userID)
	{
		//echo "select su.*,sup.*,sep.*,sul.* from sr_users su,sr_user_photo sup,sr_ep_profile sep,sr_user_login sul WHERE su.user_id=sup.user_id and sup.user_id=sep.user_id and sep.user_id=sul.user_id and sep.user_id=".$userID;
		$query=mysql_query("select su.*,sup.*,sep.*,sul.* from sr_users su,sr_user_photo sup,sr_ep_profile sep,sr_user_login sul WHERE su.user_id=sup.user_id and sup.user_id=sep.user_id and sep.user_id=sul.user_id and sep.user_id=".$userID);
		$array=mysql_fetch_array($query);
		return $array;
	}
	function getEPProfile($userid)
	{
		//echo "select * from sr_user_photo WHERE user_id=".$userid;
		$query=mysql_query("select * from sr_user_photo WHERE user_id=".$userid);
		$array=mysql_fetch_array($query);
		return $array;
		//return (mysql_fetch_array($query)>0)?$query:0;
	}

	#Reason on website
	function getHereTo()
	{
		$query = mysql_query("SELECT * FROM sr_here_to WHERE status=1");
		return ( $query )?$query:0;
	}


	#Get user interests
	function getUserInterest($user_id=0)
	{
		$query = mysql_query("SELECT ui.user_interest_id, i.interest_id, i.icon, i.interest 
		FROM `sr_user_interest` ui, sr_interest i 
		WHERE ui.interest_id = i.interest_id AND ui.user_id = '".$user_id."' 
		ORDER BY created_on DESC");
		return (mysql_num_rows($query)>0)?$query:0;
	}


	#User's friends
	function getMyFriends($user_id=0)
	{
		$friendQuery = mysql_query("SELECT u.user_id, u.user_name, u.profile_image, u.dob, u.gender, u.here_to, u.is_online , u.location, u.created_on, f.date 
		FROM sr_user_friends f, sr_users u 
		where f.user_id = '".$user_id."' AND f.status=1 AND f.friend_id=u.user_id 
		ORDER BY date DESC");
		return (mysql_num_rows($friendQuery)>0)?$friendQuery:0;
	}
	/********************* Relationships *****************************/
	#Relationships
	function getRelationship()
	{
		$query = mysql_query("SELECT * FROM sr_relationship_status WHERE status=1");
		return (mysql_num_rows($query)>0)?$query:"";
	}

	#Relationships
	function getRelationshipByID($id=0)
	{
		//echo "SELECT * FROM sr_relationship_status WHERE status=1 and relationship_id = '".$id."' ";

		$query = mysql_query("SELECT * FROM sr_relationship_status WHERE status=1 and relationship_id = '".$id."' ") or die(mysql_error());
		return (mysql_num_rows($query)>0)?mysql_fetch_array($query):0;
	}


	/******************* Star Sign ***********************************/
	#Start Sign
	function getstarSign()
	{
		$query = mysql_query("SELECT * FROM  sr_star_sign WHERE status=1");
		return (mysql_num_rows($query)>0)?$query:0;
	}

	#Start Sign
	function getstarSignByID($id=0)
	{
		$query = mysql_query("SELECT * FROM  sr_star_sign WHERE status=1 and sign_id = '".$id."' ");
		return (mysql_num_rows($query)>0)?mysql_fetch_array($query):0;
	}


	/********************** Sexuality ***********************************/
	#Sexuality
	function getSexuality()
	{
		$query = mysql_query("SELECT * FROM sr_sexuality WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Sexuality
	function getSexualityByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_sexuality WHERE status=1 and sexuality_id = '".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/****************** Body Type ************************************/
	#Body Type
	function getBodyType()
	{
		$query = mysql_query("SELECT * FROM sr_body_type WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Body Type
	function getBodyTypeByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_body_type WHERE status=1 and bodytype_id='".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/********************** Complexion *****************************/
	#Complexion
	function getComplexion()
	{
		$query = mysql_query("SELECT * FROM sr_complexion WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Complexion
	function getComplexionByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_complexion WHERE status=1 and complexion_id = '".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/******************** Eye color ******************************/
	#Eye color
	function getEyeColor()
	{
		$query = mysql_query("SELECT * FROM sr_eye_color WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Eye color
	function getEyeColorByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_eye_color WHERE status=1 and eye_color_id='".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/***************** Hair color *****************************/
	#Hair color
	function getHairColor()
	{
		$query = mysql_query("SELECT * FROM sr_hair_color WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Hair color
	function getHairColorByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_hair_color WHERE status=1 and hair_color_id='".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/********************** Language ***********************/
	#Language
	function getLanguage()
	{
		$query = mysql_query("SELECT * FROM sr_language WHERE status=1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Language
	function getLanguageByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_language WHERE status=1 and language_id='".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}


	/******************** Education ***********************/
	#Education
	function getEducation()
	{
		$query = mysql_query("SELECT * FROM sr_education WHERE status = 1");
		return ( mysql_num_rows($query)>0 )?$query:0;
	}

	#Education
	function getEducationByID($id=0)
	{
		$query = mysql_query("SELECT * FROM sr_education WHERE status = 1 and education_id = '".$id."' ");
		return ( mysql_num_rows($query)>0 )?mysql_fetch_array($query):0;
	}
	function  doEPLogin($uid='')
	{
		//var_dump($_SESSION);
	}
	function getEPuser($uid='')
	{
		$query = mysql_query("Select su.*, sep.status from sr_users su
		join sr_ep_profile sep on sep.user_id = su.user_id AND sep.user_id='$uid'
		order by su.uid desc ");
		return (mysql_num_rows($query)>0)?$query:0;
	}
	function getAllUsers($time_limit)
	{
		if($time_limit==2)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 24 HOUR";
        }
        elseif ($time_limit==3)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 3 DAY";
        }

		$query=mysql_query("select * from sr_users where is_account_freeze=0".$sqlwhere);
		while($array=mysql_fetch_array($query))
		{
			$retarray[]=$array;
		}
		return $retarray;
	}
	function getMaleUsers($time_limit)
	{
        if($time_limit==2)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 24 HOUR";
        }
        elseif ($time_limit==3)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 3 DAY";
        }
     $q="select * from sr_users where is_account_freeze=0 and gender=1".$sqlwhere;
		$query=mysql_query($q);

        while($array=mysql_fetch_array($query))
		{
			$retarray[]=$array;
		}
		return $retarray;
	}
	function getFemaleUsers($time_limit)
	{
        if($time_limit==2)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 24 HOUR";
        }
        elseif ($time_limit==3)
        {
            $sqlwhere=" and `created_on` >= NOW() - INTERVAL 3 DAY";
        }
		$query=mysql_query("select * from sr_users where is_account_freeze=0 and gender=2".$sqlwhere);
		while($array=mysql_fetch_array($query))
		{
			$retarray[]=$array;
		}
		return $retarray;
	}
	
	function getEPMaleUsers()
	{
		$query=mysql_query("select * FROM sr_users u , sr_ep_profile ul where u.user_id=ul.user_id and u.is_account_freeze=0 and u.gender=1 ");
		while($array=mysql_fetch_array($query))
		{
			$retarray[]=$array;
		}
		return $retarray;
	}
	function getEPFemaleUsers()
	{
		$query=mysql_query("select * FROM sr_users u , sr_ep_profile ul where u.user_id=ul.user_id and u.is_account_freeze=0 and u.gender=2");
		while($array=mysql_fetch_array($query))
		{
			$retarray[]=$array;
		}
		return $retarray;
	}
}

?>
