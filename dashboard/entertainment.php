<?php
include('../classes/epClass.php');
$epObj = new Entertainment();
//print_r($_POST);
//cprint_r($_FILES);
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

?>