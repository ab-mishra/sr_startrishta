<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
include('classes/adminClass.php');
include('classes/PHPExcel.php');

$adminObj=new Admin();
$objPHPExcel = new PHPExcel();

if(isset($_POST)){

	$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
	$objPHPExcel->getActiveSheet()->setTitle('Start Rishta User List');
	$objPHPExcel->setActiveSheetIndex(0);

	// for XLSX
	//$xlsName = 'sr_user_list.xlsx';
	//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

	// for XLS
	$xlsName = 'sr_user_list.xls';
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	
	$searchType = $_POST['searchType'];
	$searchValue = $_POST['searchValue'];
	//print_r($_POST);exit;
	$whereclause = "";
	if($searchType == ''){
		//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id ORDER BY dob DESC LIMIT $position, $item_per_page");
		$whereclause.= (" u.user_id=ul.user_id");
	}
	else{
		$whereclause.= (' u.user_id=ul.user_id');
		if($searchType == 'online'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=1  ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.= (" AND u.is_online=1");
		}
		if($searchType == 'offline'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=0  ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_online=0 ");
		}
		if($searchType == 'location'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_online=0  ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.location like '%".$searchValue."%' ");
		}
		if($searchType == 'new-user'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` >= '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.= (" AND u.`created_on` >= '".DATE_TIME."' - INTERVAL 1 DAY");
		}
		if($searchType == 'deleted'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_deleted=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			$whereclause.= (" AND u.is_deleted=1 ");	
		}
		if($searchType == 'no-photo'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image='' ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			$whereclause.= (" AND u.profile_image='' ");	
		}
		if($searchType == 'photo'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.profile_image !='' AND u.user_id IN (SELECT user_id FROM sr_user_photo WHERE is_profileImage=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");	
			$whereclause.=(" AND u.profile_image !='' AND u.user_id IN (SELECT user_id FROM sr_user_photo WHERE is_profileImage=1) ");	
		}
		if($searchType == 'not-verified'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_verified=0 ");
		}
		if($searchType == 'verified'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_verified=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_verified=1 ");
		}
		if($searchType == '1'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0 AND u.is_erase=0 AND u.is_deleted=0 AND u.is_account_freeze=0 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_suspended=0 AND u.is_erase=0 AND u.is_deleted=0 AND u.is_account_freeze=0 ");
		}
		if($searchType == '2'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_account_freeze=1 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_account_freeze=1 ");
		}
		if($searchType == '3'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.is_suspended=0  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.is_suspended=1 ");
		}
		if($searchType == '4'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND (u.is_erase=1 OR u.is_deleted=1) ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND (u.is_erase=1 OR u.is_deleted=1) ");
		}
		if($searchType == 'male'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=1  ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.gender=1 ");
		}
		if($searchType == 'female'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.gender=2 ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.gender=2 ");
		}
		if($searchType == 'vip'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.user_id IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ");
		}
		if($searchType == 'free'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.user_id NOT IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ORDER BY dob DESC  LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.user_id NOT IN(SELECT user_id FROM sr_vip_user WHERE status=1 AND DATE(start_date) <'".DATE_TIME."' AND DATE(end_date) >='".DATE_TIME."') ");
		}
		if($searchType == 'less1day'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 1 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` > '".DATE_TIME."' - INTERVAL 1 DAY ");
		}
		if($searchType == 'less3day'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 DAY ");
		}
		if($searchType == 'less7day'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 7 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` > '".DATE_TIME."' - INTERVAL 7 DAY ");
		}
		if($searchType == 'less30day'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 30 DAY ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` > '".DATE_TIME."' - INTERVAL 30 DAY ");
		}
		if($searchType == 'less3month'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` > '".DATE_TIME."' - INTERVAL 3 MONTH ");
		}
		if($searchType == 'greater3month'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND u.`created_on` < '".DATE_TIME."' - INTERVAL 3 MONTH ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND u.`created_on` < '".DATE_TIME."' - INTERVAL 3 MONTH ");
		}
		if($searchType == 'id'){
			//$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where u.user_id=ul.user_id AND (u.user_id LIKE '%".$searchValue."%' OR ul.email_id LIKE '%".$searchValue."%') ORDER BY dob DESC LIMIT $position, $item_per_page");
			$whereclause.=(" AND (u.user_id LIKE '%".$searchValue."%' OR ul.email_id LIKE '%".$searchValue."%') ");
		}
	}
	$query=mysql_query("SELECT * FROM sr_users u , sr_user_login ul where ".$whereclause." ORDER BY dob DESC");
	
	if($query){
		$count = 1;
		$char = 65; // represent 'A'
		$rownum = 1;
		
		// set the header
		$objPHPExcel->getActiveSheet()->getStyle('A1:W1')->getFont()->setBold(true)->setSize(16);
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Id');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Profile Status');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Username');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Age');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Gender');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Email');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Mobile Number');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Location');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Date Joined');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Membership Status');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Credits on Profile');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Flags Received');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Flags Raised');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Suspended Reason');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Deleted Reason');
		$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue('Deleted Date');
		
		$rownum = 2; // now start entering from row number 2
		$char = 65; // reset to 'A' again
		//echo "<pre>";print_r(mysql_fetch_assoc($query));exit;
		while($user=mysql_fetch_assoc($query)){
			$user['user_id'];
			$userId = $user['user_id'];
			$userName = $user['user_name'];
			$dob=date('Y-m-d' , strtotime($user['dob']));
			$from = date("Y",strtotime($dob));
			$to   = date("Y");
			$age = $to-$from.' Years';

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
			$suspandedReason;
			$deletedReason='-';
			if($isUserDeleted){
				$deletedReason=$adminObj->getdeletedReason($userId);
			}
			$deletedReason;
			$deleteReason = '-';
			if($isDeleted){
				$deleteReason=$adminObj->getUserdeleteReason($userId);
			}
			$deleteReason;
			if($isDeleted || $isUserDeleted) {
				$st = 'Deleted';
			}elseif($isUserSuspanded){
				$st = 'Suspended';
			}elseif($isUserFrozen){
				$st = 'Frozen';
			}else{
				$st = 'Active';
			}

			if($user['mobile_number'] != ''){ $mobile = $user['mobile_number']; } else { $mobile = '-';}
			
			if($user['gender']==1) $gen = 'Male'; else $gen = 'Female';
			
			if($isUserVip){ $mem = "VIP"; } else { $mem = 'Free'; }
			
			if($isDeleted) { $delres =  $deleteReason['reason']; } else { $delres = '-';}
			
			if($isDeleted) { $delDate =  date("d M, Y", strtotime($deleteReason['time'])); } else { $delDate = '-';}

			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($userId);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($st);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($userName);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($age);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($gen);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($user['email_id']);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($mobile);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($user['location']);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($joinedDate);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($mem);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($userCredit);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($userAgainsedFlagCount);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($userRaisedFlagCount);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($suspandedReason);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($delres);
			$objPHPExcel->getActiveSheet()->getCell(chr($char++).$rownum)->setValue($delDate);
			$count++;
			$rownum++;
			$char = 65;	// reset to 'A'
		}

	}
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.$xlsName.'"');
	header('Cache-Control: max-age=0');
	/*header('Content-Transfer-Encoding: binary');
	header('Cache-Control: cache, must-revalidate');
	header('Pragma: public');*/
	ob_end_clean();
	$objWriter->save('php://output');
	exit;
}

?>