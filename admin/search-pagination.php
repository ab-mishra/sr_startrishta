
<?php
include('classes/adminClass.php');

$adminObj=new Admin();

function getProfileImage($profile_image){
		if($profile_image == ''){
			return SITEURL."upload/profile_images/dummy-profile.png";
		}else if(file_exists(SITEURL."upload/photo/$profile_image")){
			return SITEURL."upload/photo/200X200/$profile_image";
		}/*else {
			return "upload/profile_images/dummy-profile.png";
		}*/
	}
	
$item_per_page = 50;
if(isset($_POST["page"])){
    $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
    if(!is_numeric($page_number)){
		 $page_number = 1;
	} //incase of invalid page number
}else{
    $page_number = 1;
}
$position = (($page_number-1) * $item_per_page);
$searchType = $_POST['searchType'];
$searchValue = $_POST['searchValue'];
$userResult=$adminObj->getSearchUsers($searchType,$searchValue, $position, $item_per_page);
foreach($userResult as $user){
	$userId = $user['user_id'];
	$userName = $user['user_name'];
	$emailId = $user['email_id'];
	$dob=date('Y-m-d' , strtotime($user['dob']));
	$from = new DateTime($dob);
	$to   = new DateTime('today');
	$age = $from->diff($to)->y;
	$userInterestResult=$adminObj->getUserInterest($userId);
	$userInterestCount=count($userInterestResult);
	
	$isUserOnline=$user['is_online'];
	$isUserVerified=$user['is_verified'];
	$isUserSuspanded=$user['is_suspended'];
	$isUserDeleted=$user['is_erase'];
	$isDeleted=$user['is_deleted'];
	$isUserFrozen=$user['is_account_freeze'];
	$isUserVip=$adminObj->isUserVip($userId);
	
	$userCredit=$adminObj->getUserCredit($userId);

	$userRaisedFlagCount=count($adminObj->getUserAllRaisedFlag($userId));
	$userAgainsedFlagCount=count($adminObj->getUserAllAgainsedFlag($userId));
	$joinedDate=date('m/d/Y' , strtotime($user['created_on']));
	
	$suspandedReason='-';
	if($isUserSuspanded){
		$suspandedReason=$adminObj->getSuspandedReason($userId);
	}
	$deletedReason='-';
	if($isUserDeleted){
		$deletedReason=$adminObj->getdeletedReason($userId);
	}
	$deleteReason = '-';
	if($isDeleted){
		$deleteReason=$adminObj->getUserdeleteReason($userId);
	}

	$userLogedInTime = $adminObj->getUserLogedInTime($userId);
	$lastLogedInTime = $adminObj->getLastLogedInTime($userId);
	?>

		<tr <?php if($emailId==''){?> class="bg-yellow" <?php }?>>
			<td><?php echo $userId;?></td>
			<td><?php 
				if($isDeleted || $isUserDeleted) {
					echo 'Deleted';
				}elseif($isUserSuspanded){
					echo 'Suspended';
				}elseif($isUserFrozen){
					echo 'Frozen';
				}else{
					echo 'Active';
				}
				
				?>
			</td>
			<td>
				<img src="<?php if($user['profile_image']==''){echo "upload/profile_images/dummy-profile.png";}else{echo $adminObj->getProfileImage($user['profile_image']);}?>" class="img-responsive powersearch-img"/>
			</td>
			<td><?php echo $userName;?></td>
			<td><?php echo $age;?></td>
			<td><?php if($user['gender']==1) echo 'Male'; else echo 'Female';?></td>
			<td>
				<?php if($isUserOnline) echo '<i class="fa fa-check-circle green-check" aria-hidden="true"></i>'; else echo '<i class="fa fa-times-circle" aria-hidden="true"></i>';?>
			</td>
			<td><?php echo $user['email_id'];?></td>
			<td>-</td></td>
			<td><?php echo $user['location'];?></td>
			<td>
				<a href="user-interest.php?uid=<?php echo $userId;?>"><?php echo $userInterestCount;?></a>
			</td>
			<td>
				<?php if($isUserVerified) echo '<i class="fa fa-check-circle green-check" aria-hidden="true"></i>'; else echo '<i class="fa fa-times-circle" aria-hidden="true"></i>';?>
			</td>
			<td><?php echo $joinedDate;?></td>
			<td><?php echo $lastLogedInTime;?></td>
			<td>
				<a href="user-timestamp.php?uid=<?php echo $userId;?>"><?php echo $userLogedInTime;?></a>
			</td>
			<td>
				<?php if($isUserVip){?> <a href="user-subscription.php?uid=<?php echo $userId;?>">VIP</a> <?php } else { echo 'Free'; } ?>
			</td>
			<td>
				<a href="user-credit.php?uid=<?php echo $userId;?>"><?php echo $userCredit;?></a>
			</td>
			<td>
				<a href="user-flag.php?uid=<?php echo $userId;?>"><?php echo $userAgainsedFlagCount;?></a>
			</td>
			<td>
				<a href="user-flag.php?uid=<?php echo $userId;?>"><?php echo $userRaisedFlagCount;?></a>
			</td>
			<td><?php echo $suspandedReason;?></td>
			<td><?php if($isDeleted) echo $deleteReason['reason']; else echo '-';?></td>
			<td><?php if($isDeleted) echo date("d M, Y", strtotime($deleteReason['time'])); else echo '-';?></td>
			<td> 
				<div class="btn-group button-edit">
					<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<i class="fa fa-cog" aria-hidden="true"></i> <i class="fa fa-caret-down" aria-hidden="true"></i>
						<span class="sr-only">Toggle Dropdown</span>
					</button>
					<ul class="dropdown-menu info right" role="menu">
						<li><a href="user-profile.php?uid=<?php echo $userId;?>"> View Profile</a></li>
						<!--<li><a href="user-profile.php?uid=<?php echo $userId;?>"> View/Edit Profile</a></li>-->
						<li><a href="user-message-history.php?uid=<?php echo $userId;?>"> View Message History</a></li>
						<li><a href="#"> View Comment History</a></li>
						<li><a href="user-moderated-photos.php?uid=<?php echo $userId;?>"> View Moderated photos</a></li>
						<li><a href="user-admin-timestamp.php?uid=<?php echo $userId;?>"> Admin Timestamp</a></li>
						<li><a href="javascript:void(0);" class="credit-modal" id="modify_credit-<?php echo $userId.'-'.$userName;?>"> Modify Credits</a></li>
						<?php if(!$isUserVip){?>
						<li><a href="javascript:void(0);" class="vip-modal" id="upgrade_vip-<?php echo $userId.'-'.$userName;?>"> Upgrade  to VIP</a></li>
						<?php } ?>
						<?php if($isUserSuspanded){?>
							<li id="unsuspand_user_div-<?php echo $userId;?>"><a href="javascript:void(0);" class="radio-query unsuspand-user" id="unsuspand_user-<?php echo $userId.'-'.$userName;?>">Unsuspend User</a></li>
						<?php }else{ ?>
							<li id="suspand_user_div-<?php echo $userId;?>"><a href="javascript:void(0);" class="radio-query suspand-user" id="suspand_user-<?php echo $userId.'-'.$userName;?>">Suspend User</a></li>
						<?php } ?>
						<?php if(!$isUserDeleted){?>
							<li id="erase_user_div-<?php echo $userId;?>"><a href="javascript:void(0);" class="radio-query erase-user" id="erase_user-<?php echo $userId.'-'.$userName;?>">Erase User</a></li>
						<?php } ?>
					</ul>
				</div>
			</td>
		</tr>
	<?php } ?>