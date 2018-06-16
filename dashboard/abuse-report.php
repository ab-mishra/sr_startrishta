<?php 
include('classes/adminClass.php');
$adminObj = new Admin();
$userId = $_GET['uid'];
$userReportedArray = $adminObj->getUnreadUserReported();
$readUserReportedArray = $adminObj->getReadUserReported();

?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Abuse Report</title>
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
					   		<h5 class="no-space">Abuse Reported</h5>
							<br/><br/>
					   		<div class="col-lg-12 clearfix">
					   			<div role="tabpanel">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#tab1a" aria-controls="tab1a" role="tab" data-toggle="tab">Unread (<?php echo count($userReportedArray);?>)</a></li>
										<li role="presentation"><a href="#tab2a" aria-controls="tab2a" role="tab" data-toggle="tab">Read (<?php echo count($readUserReportedArray);?>)</a></li>
									</ul>
										<!-- Tab panes -->
									<div class="tab-content">
										<!-- APPROVED INTEREST -->
										
										<div role="tabpanel" class="tab-pane fade in active" id="tab1a">
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
														<th>S.No.</th>
														<th>User Id</th>
														<th>Username</th>
														<th>Total Flags raised against user	</th>
														<th>Reported by</th>
														<th>Reason</th>
														<th>Date/ time reported</th>
														<th>Location reported</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if( count($userReportedArray) )
												{
													$i=0;
													foreach( $userReportedArray as $userReported )
													{
														$userAgainsedFlagCount = count($adminObj->getUserAllAgainsedFlag($userReported['user_id']));
														$i++;
														?>
														<tr id="userReportedDiv-<?php echo $userReported['user_report_id'];?>">
															<td><?php echo $i;?></td>
															<td>
																<a href="power-search.php?id=<?php echo $userReported['user_id'];?>"><?php echo $userReported['user_id'];?></a>
															</td>
															<td>
																<a href="power-search.php?id=<?php echo $userReported['user_id'];?>"><?php echo $adminObj->getUserName($userReported['user_id']);?></a>
															</td>
															<td>
																<?php echo $userAgainsedFlagCount;?>
															</td>
															<td>
																<a href="power-search.php?id=<?php echo $userReported['reported_by'];?>"><?php echo $adminObj->getUserName($userReported['reported_by']);?></a>
															</td>
															<td>
																<?php 
																if($userReported['reason'] == 'Other'){
																	echo $userReported['description'];
																}else{
																	echo $userReported['reason'];
																}?>
															</td>
															<td>
																<?php echo date('d-M-Y', strtotime($userReported['reported_on']));?>
															</td>
															<td>Profile Page</td>
															<!--<td><input type="checkbox" class="flag" id="flag-<?php echo $userReported['user_id'];?>" value="<?php echo $userReported['user_report_id'];?>"/></td>-->
															<td>
																<select class="flag" id="flag-<?php echo $userReported['user_id'];?>-<?php echo $userReported['user_report_id'];?>">
																	<option value="">Select Action</option>
																	<option value="1">Suspend User</option>
																	<option value="2">Dismiss report</option>
																</select>
															</td>
														</tr>
														<?php 
													} 
												}
												else
												{
													?><tr><td colspan="5"> No Record found </td></tr><?php 
												} 
												?>
												</tbody>
												</table>
											</div>
										</div>
										<!--       READ ABUSE  REPORT -->
										
										<div role="tabpanel" class="tab-pane fade" id="tab2a">	
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
														<th>S.No.</th>
														<th>User Id</th>
														<th>Username</th>
														<th>Total Flags raised against user	</th>
														<th>Reported by</th>
														<th>Reason</th>
														<th>Date/ time reported</th>
														<th>Location reported</th>
														<th>Action Taken</th>
														<th>Timestamp</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if( count($readUserReportedArray) )
												{
													$k=0;
													foreach( $readUserReportedArray as $readUserReported )
													{
														$userAgainsedFlagCount = count($adminObj->getUserAllAgainsedFlag($readUserReported['user_id']));
														$k++;
														?>
														<tr>
															<td><?php echo $k;?></td>
															<td>
																<a href="power-search.php?id=<?php echo $readUserReported['user_id'];?>"><?php echo $readUserReported['user_id'];?></a>
															</td>
															<td>
																<a href="power-search.php?id=<?php echo $readUserReported['user_id'];?>"><?php echo $adminObj->getUserName($readUserReported['user_id']);?></a>
															</td>
															<td><?php echo $userAgainsedFlagCount;?></td>
															<td>
																<a href="power-search.php?id=<?php echo $readUserReported['reported_by'];?>"><?php echo $adminObj->getUserName($readUserReported['reported_by']);?></a>
															</td>
															<td>
																<?php echo ($readUserReported['reason'] == 'Other')?$readUserReported['description']:$readUserReported['reason']; ?>
															</td>
															<td>
																<?php echo date('d-M-Y', strtotime($readUserReported['reported_on'])); ?>
															</td>
															<td>Profile Page</td>
															<td>
																<?php 
																switch( $readUserReported['admin_action'] )
																{
																case 1: echo 'User suspended'; break;
																case 2: echo 'No action taken'; break;
																case 0: echo ''; break;
																}
																?>
															</td>
															<td><?php echo $adminObj->getAdminName($readUserReported['admin_id']).'<br/>'.date('d-M-Y', strtotime($readUserReported['action_date'])); ?></td>
														</tr>
														<?php 
													} 
												}
												else
												{
													?><tr><td colspan="4"> No Record found </td></tr><?php 
												} 
												?>
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
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/report.php",
			data:{report_id:report_id, user_id:user_id, option:option, action:'flagUserReport'},
			success:function(result){
				$('#preloader').hide();
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