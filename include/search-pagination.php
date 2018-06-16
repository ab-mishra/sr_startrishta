<?php
require('../classes/search_class.php');
$userProfileObj=new Search();
$user_id=$_SESSION['user_id'];
function getProfileImage($profile_image)
{
	if( $profile_image == '' )
	{
		return "upload/profile_images/dummy-profile.png";
	}
	else if( file_exists("../upload/photo/$profile_image") )
	{
		return "upload/photo/$profile_image";
	}
	else {
		return "upload/profile_images/dummy-profile.png";
	}
}
$item_per_page = 12;
if( isset($_POST["page"]) )
{
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if( !is_numeric($page_number) ){die('Invalid page number!');} //incase of invalid page number
}
else{
    $page_number = 1;
}
$position = (($page_number-1) * $item_per_page);
$addQuery = $_POST['addQuery'];
$interestIds = $_POST['interestIds'];
 $location_service = $_POST['location_service'];
$location=$_POST['location'];
$searchQuery = $userProfileObj->searchPeople($user_id , $position , $item_per_page , $addQuery ,$interestIds);
$myInterestArray = array();
$myInterestQuery = $userProfileObj->getUserInterest($user_id);
while( $myInterestResult = mysql_fetch_assoc($myInterestQuery) )
{
	$myInterestArray[]=$myInterestResult['interest_id'];
}
?><div class="row portfolioContainer search_result" id="search_result_div"><?php if( !empty($searchQuery) )
{	while( $searchResult = mysql_fetch_assoc($searchQuery) )	{
		$searchUserId = $searchResult['user_id'];
		$searchUserName = $searchResult['user_name'];
		$isOnline = $searchResult['is_online'];
		$showOnline = $searchResult['show_online'];
		$searchUserLoaction = substr($searchResult['location'],0,20);
		$searchUserImage = getProfileImage($searchResult['profile_image']);
	
		if( $searchResult['gender'] == 2 )
		{
			$userPer='Her';
			$userNou='She';
		}else {
			$userPer ='Him';
			$userNou ='He';
		}
		$searchUserPhotoCount = $userProfileObj->getPublicPhotoCount($searchUserId);		$isUserFavorite = $userProfileObj->isUserFavorite($searchUserId , $user_id);		$isVipMember = $userProfileObj->isVipMember($searchUserId);		$isUserVerified = $userProfileObj->isUserVerified($searchUserId);		$searchUserReputation = $userProfileObj->getUserReputation($searchUserId);		if($searchUserReputation <= 40 ) $otherReputaion='Low';		if($searchUserReputation > 40 && $searchUserReputation <= 60) $otherReputaion='Heating Up';		if($searchUserReputation > 60 && $searchUserReputation <= 80) $otherReputaion='Hot';		if($searchUserReputation > 80) $otherReputaion='Very Hot';		#Find I am Here To		$iamHereTo = $searchResult['here_to'];		$findIcon = mysql_query("SELECT icon FROM sr_here_to WHERE status = 1 and here_to_id = '".$iamHereTo ."' ");		$findIconVal = "";		if( mysql_num_rows($findIcon) > 0 )		{			$findIconFetch = mysql_fetch_array($findIcon);			$findIconVal = "<img src=\"images/".$findIconFetch['icon']."\" />&nbsp;";		}		#Check if searched person is not blocked		$isBlockUser = $userProfileObj->isBlockUser($user_id, $searchResult['user_id']);		if( $isBlockUser == 0 )		{			?>
			<div class="objects">
				<a class="pic" href="profile.php?uid=<?php echo $searchUserId;?>">
					<?php
					$imageval = $searchResult['profile_image'];
					if($imageval != ""){
						if(file_exists("upload/photo/".$imageval)){
							$img = "upload/photo/200X200/".$imageval;
						}
						else{
							$img = "upload/photo/200X200/".$imageval;
						}
					}
					else{
						$img = "upload/profile_images/dummy-profile.png";
					}
					?>
					<img style="width:100%;" src="<?php echo $img;?>" alt="image"></a>
					<span class="image_count"><i class="fa fa-camera"></i> 
					<span><?php echo $searchUserPhotoCount;?></span> </span>
				
				<div class="name_bar">
					<?php 
					if( $isOnline && $showOnline )
					{ 
						?><div class="pull-left"><img src="images/online.png"/></div><?php 
					} 
					?>
					<div class="pull-left"><h4><?php echo $searchUserName;?></h4></div>
					<?php 
					if( $isUserVerified )
					{
						?><div class="pull-left"><img src="images/active.png"/></div><?php 
					} 
					?>
				</div>
				<div class="pull-left status">
					<ul>
						<?php echo $userProfileObj->getStatusIconHtml($searchResult['user_id'], $searchResult['gender'] , $otherReputaion , $isUserFavorite , $isVipMember);?>
					</ul>
				</div>
				<div class="interests margin-t20 margin-l5">
					<ul><?php echo $userProfileObj->getCommonInterest($user_id , $searchUserId);?></ul>
				</div>
				<div class="near_locate pull-left">
					<div class="pull-left">
						<?php 
						echo $findIconVal;
						/* <i class="fa fa-heart"></i> */ 
						?>
					</div>
					<div class="pull-left">
						<?php 
						if( $location_service )
						{
							echo '<a href="javascript:void(0);">'.$searchUserLoaction.'</a>';
						}
						else
						{
							?><a href="javascript:void(0);" onclick="findLocation('<?php echo $searchUserName;?>');">See how near <?php echo $userNou;?> was..</a><?php 
						} 
						?>
					</div>
				</div>
			</div>
			<?php 
		}
	} 
}
?>
</div>