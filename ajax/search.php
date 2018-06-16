<?php
require('../classes/user_class.php');
$userObj=new User();
$user_id=$_SESSION['user_id'];

if(isset($_POST['action']) && $_POST['action']=='resetSearch'){

	$updateQuery=mysql_query("UPDATE sr_users SET here_with_guy=1 , here_with_girl=1 , here_age_min =18 , here_age_max =80 WHERE user_id='".$user_id."'");
	if($updateQuery){
		echo 1;
	}else {
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='enableLocationService'){

	$updateQuery=mysql_query("UPDATE sr_users SET location_service=1 WHERE user_id='".$user_id."'");
	if($updateQuery){
		echo 1;
	}else {
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='interestFilter'){
	
	$filter=mysql_real_escape_string($_POST['interestFilter']);
	$interestQuery=mysql_query("SELECT * FROM sr_interest WHERE status='1' AND interest like '%$filter%'"); 
	while($interestResult=mysql_fetch_object($interestQuery)){?>
		<li class="interest-section" data-value="<?php echo $interestResult->interest;?>" data-id="<?php echo $interestResult->interest_id;?>" data-title="<?php echo $interestResult->icon;?>" id="interest_li-<?php echo $interestResult->interest_id;?>">
			<a class="btn_intst" href="javascript:void(0)" >
			<i><img src="images/interest/<?php echo $interestResult->icon;?>.png"/></i><?php echo $interestResult->interest;?></a>
		</li>
	<?php 
	}
}
?>