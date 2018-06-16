<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];
if(isset($_GET['key'])){

	echo $searchValue=$_GET['key'];

}

$photoReportedArray=$adminObj->getUnreadPhotoReported($searchValue);
$readPhotoReportedArray=$adminObj->getReadPhotoReported($searchValue);

?><!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Photo Report</title>
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
    </head>
    
    <body>
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper dashboard">
	<!-- THEME OPTIONS -->
	    
	    
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
					   		<h5 class="no-space">Photos Reported</h5>
							<div class="col-lg-5"></div>
							<div class="col-lg-5">
					   			<div class="">
								<form>
					   				<ul class="search-bar-power clearfix">
					   					<li>
							   				<ul class="clearfix">
							   					<li>
							   						<div class="form-group">
														<input type="text" class="form-control" name="key" value="<?php echo $searchValue;?>" />
													</div>
							   					</li>
							   				</ul>
						   				</li>
							   			<li>
							   				<button type="submit" class="btn btn-block">Search</button>
							   			</li>
					   				</ul>
								</form>
					   			</div>
							</div>
							<br/><br/>
					   		<div class="col-lg-12 clearfix">
					   			<div role="tabpanel">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#tab1a" aria-controls="tab1a" role="tab" data-toggle="tab">Unread (<?php echo count($photoReportedArray);?>)</a></li>
										<li role="presentation"><a href="#tab2a" aria-controls="tab2a" role="tab" data-toggle="tab">Read (<?php echo count($readPhotoReportedArray);?>)</a></li>
									</ul>
										<!-- Tab panes -->
									<div class="tab-content">
										<!-- APPROVED INTEREST -->
										<div role="tabpanel" class="tab-pane fade in active" id="tab1a">
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
													<th>No</th>
													<th>Photo</th>
													<th>User Id</th>
													<th>Username</th>
													<th>Flags Received</th>
													<th>Reported by</th>
													<th>Date/Time reported</th>
													<th>Reason</th>
													<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if(count($photoReportedArray)){
												$i=0;
												foreach($photoReportedArray as $photoReported)
												{
													$userAgainsedFlagCount=count($adminObj->getUserAllAgainsedFlag($photoReported['user_id']));
													$i++;
												?>
													<tr>
														<td><?php echo $i;?></td>
														<td>
															<img src="<?php echo $adminObj->getProfileImage($photoReported['photo']);?>" height="100" width="100"/>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $photoReported['user_id'];?>"><?php echo $photoReported['user_id'];?></a>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $photoReported['user_id'];?>"><?php echo $adminObj->getUserName($photoReported['user_id']);?></a>
														</td>
														<td>
															<?php echo $userAgainsedFlagCount;?>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $photoReported['reported_by'];?>"><?php echo $adminObj->getUserName($photoReported['reported_by']);?></a>
														</td>
														<td>
															<?php echo date('d-M-Y  h:i a', strtotime($photoReported['reported_on']));?>
														</td>
														<td>
															<?php 
															if($photoReported['reason'] == 'Other'){
																echo $photoReported['description'];
															}else{
																echo $photoReported['reason'];
															}?>
														</td>
														<td>
														<!--<input type="checkbox" class="flag" id="flag-<?php echo $photoReported['user_id'];?>" value="<?php echo $photoReported['photo_report_id'];?>"/>-->
															<select class="flag" id="flag-<?php echo $photoReported['user_id'];?>-<?php echo $photoReported['photo_report_id'];?>-<?php echo $photoReported['photo_id'];?>">
																<option value="">Select Action</option>
																<option value="1">Keep Photo</option>
																<option value="2">Delete Photo</option>
															</select>
														</td>
													</tr>
												<?php } 
												}else {?> 
												<tr><td colspan="9"> No Record found </td></tr>
												<?php } ?>
												</tbody>
												</table>
											</div>
										</div>
										<!--       READ PHOTO REPORT -->
										
										<div role="tabpanel" class="tab-pane fade" id="tab2a">	
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
													<th>No</th>
													<th>Photo</th>
													<th>User Id</th>
													<th>Username</th>
													<th>Flags Received</th>
													<th>Reported by</th>
													<th>Date/Time reported</th>
													<th>Reason</th>
													<th>Action Taken</th>
													<th>Timestamp</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if(count($readPhotoReportedArray)){
												$k=0;
												foreach($readPhotoReportedArray as $readphotoReported)
												{
													$userAgainsedFlagCount=count($adminObj->getUserAllAgainsedFlag($readphotoReported['user_id']));
													$k++;
												?>
													<tr>
														<td><?php echo $k; ?></td>
														<td>
															<img src="<?php echo $adminObj->getProfileImage($readphotoReported['photo']);?>" height="100" width="100"/>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $readphotoReported['user_id'];?>"><?php echo $readphotoReported['user_id'];?></a>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $readphotoReported['user_id'];?>"><?php echo $adminObj->getUserName($readphotoReported['user_id']);?></a>
														</td>
														<td>
															<?php echo $userAgainsedFlagCount;?>
														</td>
														<td>
															<a href="power-search.php?id=<?php echo $readphotoReported['reported_by'];?>"><?php echo $adminObj->getUserName($readphotoReported['reported_by']);?></a>
														</td>
														<td>
															<?php echo date('d-M-Y h:i a', strtotime($readphotoReported['reported_on']));?>
														</td>
														<td>
															<?php 
															if($readphotoReported['reason'] == 'Other'){
																echo $readphotoReported['description'];
															}else{
																echo $readphotoReported['reason'];
															}?>
														</td>
														<td>
															<?php 
																if($readphotoReported['admin_action']==1)
																	echo 'Photo Approved';
																if($readphotoReported['admin_action']==2)
																	echo 'Photo Deleted';
																if($readphotoReported['admin_action']==0)
																	echo '';
															?>
														</td>
														<td><?php echo $adminObj->getAdminName($readphotoReported['admin_id']).'<br/>'.date('d-M-Y  h:i a', strtotime($readphotoReported['action_date']));?></td>
													</tr>
												<?php } 
												}else {?> 
												<tr><td colspan="10"> No Record found </td></tr>
												<?php } ?>
												</tbody>
												</table>
											</div>
										</div>
									</div>
								</div><!-- /tabpanel -->
							</div>
					   		<!--<div class="clearfix"></div>
							<!-- col -->
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

	
<script>
$(function(){
	$('.flag').change(function(){
		var option=$(this).val();
		var ID=$(this).attr('id').split('-');
		var user_id=ID[1];
		var report_id=ID[2];
		var photo_id=ID[3];
		$.ajax({
			type:"POST",
			url:"ajax/report.php",
			data:{option:option, photo_id:photo_id, report_id:report_id, user_id:user_id,action:'flagPhotoReport'},
			success:function(result){
				window.location.href='';
			}
		});
		return false;
	});
});
</script>
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>