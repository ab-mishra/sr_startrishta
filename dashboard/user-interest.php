<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];

if(isset($_POST['disapproveInterest'])){
	$interestId=$_POST['interestId'];
	$res=$adminObj->disapproveUserInterest($interestId, $userId);
	if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	}
	if($res == 1){
		echo $adminObj->getResultPopup('Interest disapproved sucessfully' , 'Alert');
	}
}
if(isset($_POST['updateInterest'])){
	$interestId=$_POST['interestId'];
	$interestCatId=$_POST['interestCatId'];
	$interest_text=$_POST['interest_text'];
	$res=$adminObj->updateUserInterest($interestId, $interestCatId, $interest_text, $userId);
	if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	}
	if($res == 1){
		echo $adminObj->getResultPopup('Interest updated sucessfully' , 'Alert');
	}
}

$userInterestArray=$adminObj->getUserInterest($userId);
$userInterestCount=count($userInterestArray);

$userResult=$adminObj->getUserInfo($userId);
$interestCategoryArray=$adminObj->getInterestCategory();


?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>StartRista | User interest</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

		<link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet"> 
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
	    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    </head>
    
    <body>
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper dashboard">
	<!-- THEME OPTIONS -->
	    <div class="theme-options affix">
			<h5>Sidebar Left/Right<br><small>Click on icon to toggle</small></h5>
			<!-- <div class="theme-layouts">
			    <a class="theme-option-toggle-sidebar">Sidebar Switch</a>
			</div><!-- theme-layouts --> 
			<div class="divider"></div>
			<h5>Available Themes<br><small>9 themes available</small></h5>
			<ul id="theme-switcher" class="theme-switcher">
			    <li class="default-theme"><a href="#" id="assets/css/themes/theme-default.css">&nbsp;</a></li>
			    <li class="dark-theme"><a href="#" id="assets/css/themes/theme-dark.css">&nbsp;</a></li>
			    <li class="red-theme"><a href="#" id="assets/css/themes/theme-red.css">&nbsp;</a></li>
			    <li class="yellow-theme"><a href="#" id="assets/css/themes/theme-yellow.css">&nbsp;</a></li>
			    <li class="green-theme"><a href="#" id="assets/css/themes/theme-green.css">&nbsp;</a></li>
			    <li class="blue-theme"><a href="#" id="assets/css/themes/theme-blue.css">&nbsp;</a></li>
			    <li class="purple-theme"><a href="#" id="assets/css/themes/theme-purple.css">&nbsp;</a></li>
			    <li class="pink-theme"><a href="#" id="assets/css/themes/theme-pink.css">&nbsp;</a></li>
			    <li class="orange-theme"><a href="#" id="assets/css/themes/theme-orange.css">&nbsp;</a></li>
			</ul>
	    </div><!-- theme-options -->
	    
	<?php  include("include/header.php"); ?>

	<!-- SIDEBAR -->
	<?php include("include/side-menu.php") ?>
	    
	   
	<!-- SIDEBAR -->
	    
	<!-- MAIN -->
	    <div class="main clearfix">
	    	<!-- CONTENT -->
			<div id="content" class="">
			    <div class="container-fluid">
					<div class=" drag-drop dash-main">
						<div class="row-10">
					   		<h5 class="no-space"> User's Interests </h5>
					   	<p><a href="power-search.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Power Search</a></p>
					   		<div class=" user-nid  clearfix">
					   			<ul class="">
					   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
					   				<li><strong><?php echo $userResult['user_name'];?> </strong>has <strong id="userInterestCount"><?php echo $userInterestCount;?> interests</strong> <br /> #<?php echo $userId;?></li>
					   				<input type="hidden" id="hiddenInterestCount" value="<?php echo $userInterestCount;?>" >
					   			</ul>

					   		</div>
					   		<div class="clearfix"></div>
								<div class="col-lg-12">
									<?php 
									foreach($userInterestArray as $userInterestResult){
										$interestId=$userInterestResult['interest_id'];
										$interestInfo = $adminObj->getInterestInfo($interestId);
										$interestCatId=$interestInfo['cat_id'];
									?>
									<form action="" method="post">	
										<input type="hidden" value="<?php echo $interestId;?>" name="interestId"/>
										<input type="hidden" value="<?php echo $interestCatId;?>" name="interestCatId" />
										<div class="row col-lg-6" id="interestDiv<?php echo $interestId;?>">
											<ul class="intrest-search-bar clearfix">
												<li>
													<ul class="intrest-search clearfix">
														<li style="width:50%;">
															<div class="form-group">
																<select id="demo-htmlselect-<?php echo $interestId;?>" class="demo-htmlselect" name="approveInterest">
																<?php foreach($interestCategoryArray as $interestCategory){
																if($interestCatId == $interestCategory['cat_id']) $selected='selected'; else $selected='';
																?>
																	<option data-imagesrc="assets/images/interest/<?php echo $interestCategory['icon'];?>.png" <?php echo $selected;?> value="<?php echo $interestCategory['cat_id'];?>"><?php echo $interestCategory['category'];?></option>
																<?php } ?>
																</select>
															</div>
														</li>
														<li style="width:50%;">
															<div class="form-group">
																<input type="text" class="form-control" name="interest_text" value="<?php echo $interestInfo['interest'];?>" />
															</div>
														</li>
													</ul>
												</li>
												<li>
													<button type="submit" class="btn btn-success" name="updateInterest">update</button>
												</li>
												<li>
													<button type="submit" class="btn btn-block" name="disapproveInterest">Disapprove</button>
												</li>
											</ul> 
										</div>
									</form>
									<?php } ?>
				    			</div><!-- col -->	
					    			</div><!-- row -->
				    			</div><!-- col -->.
			    		</div>
					<div class="clearfix"></div>
			<!-- /drag-drop -->
					</div>	<!-- col-lg-9 closed-->
					
			   		</div><!-- container-fluid -->
				</div><!-- content -->
	    	</div><!-- main -->
			<!-- /MAIN  -->
		</div><!-- wrapper -->	
	<?php include("include/foot.php"); ?>
	<!--credits modal-->
		
	</div>
</div>
</body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->

<script>
$(function(){

	$('.deleteInterest').click(function(){
		var value=$(this).attr('id').split('-');
		var interest_id=value[1];
		var userId='<?php echo $userId;?>';
		var interestCount=$('#hiddenInterestCount').val();
		
		$.ajax({
				type:"POST",
				url:"ajax/interest.php",
				data:{interest_id:interest_id,userId:userId, action:'deleteInterest'},
				success:function(result){
					if(result == 1){
						$('#interestDiv'+interest_id).hide();
						interestCount=parseInt(interestCount -1);
						$('#hiddenInterestCount').val(interestCount);
						$('#userInterestCount').html(interestCount + ' interests');
					}else{
						alert('problem in network.Please try again');
					}
				}
				
		});
	
	});	
	
})</script>

<script>
	$(document).ready(function(){
		$('#result-modal').modal('show');
		<?php 
		foreach($userInterestArray as $userInterest){ 
		$interestId=$userInterest['interest_id'];
		?>
			var interestId='<?php echo $interestId;?>';
			$('#demo-htmlselect-'+interestId).ddslick({
				defaultSelectedIndex: interestId	
			});
		<?php } ?>
			
		$('.dd-option').click(function(){
			var catId = $(this).children('.dd-option-value').val();
			$("input[name='InterestCatId'").val(catId);
		});
	});
</script>
</html>
