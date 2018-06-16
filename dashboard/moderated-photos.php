<?php 
include('classes/adminClass.php');
$adminObj = new Admin();

#Photos approved today
$getCountApprovedPhotos = $adminObj->getApprovedPhotosCount();
$getApprovedPhotos = $adminObj->getApprovedPhotos();

#Photos rejected today
$getCountRejectedPhotos = $adminObj->getRejectedPhotosCount();
$getRejectedPhotos = $adminObj->getRejectedPhotos();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Startrishta | Moderated Photos</title>
	<link rel="icon" type="image/png" href="images/favico.png">

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
	<div style="display:none;" id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper dashboard">
		<?php  include("include/header.php"); ?>
		<!-- SIDEBAR -->
		<?php include("include/side-menu.php") ?>
		
		<!-- MAIN -->
	    <div class="main clearfix">
	    	<!-- CONTENT -->
			<div id="content" class="">
			    <div class="container-fluid">
					<div class=" drag-drop dash-main">
						<div class="row-10">
					   		<h5 class="no-space">Moderated Photos</h5>
							<div class="col-lg-5"></div>
							<div class="col-lg-5">
					   			<div class="">
								<form>
					   				<ul class="search-bar-power clearfix">
					   					<li>
							   				<ul class="clearfix">
							   					<li>
							   						<div class="form-group">
														<input type="text" placeholder="Search with user id.." class="form-control" name="key" value="<?php echo $searchValue;?>" />
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
										<li role="presentation" class="active"><a href="#tab1a" aria-controls="tab1a" role="tab" data-toggle="tab">Approved (<?php echo $getCountApprovedPhotos['count(photo)']; ?>)</a></li>
										<li role="presentation"><a href="#tab2a" aria-controls="tab2a" role="tab" data-toggle="tab">Rejected (<?php echo $getCountRejectedPhotos['count(photo)']; ?>)</a></li>
									</ul>
									
									<!-- Tab panes -->
									<div class="tab-content">
									
										<?php #APPROVED Photos ?>
										<div role="tabpanel" class="tab-pane fade in active" id="tab1a">
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
													<th>Sno</th>
													<th>User ID</th>
													<th>Username</th>
													<th>Photo</th>
													<th>Date/Time uploaded</th>
													<th>Change Status</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if( $getApprovedPhotos!=0 )
												{
													$i = 0;
													while( $getApprovedPhotosFetch = mysql_fetch_array($getApprovedPhotos) )
													{
														$userInfo = $adminObj->getUserInfo($getApprovedPhotosFetch['user_id']);
														?>
														<tr>
															<td><?php echo ++$i; ?></td>
															<td><?php echo $getApprovedPhotosFetch['user_id']; ?></td>
															<td><?php echo $userInfo['user_name']; ?></td>
															<td><img src="<?php echo $adminObj->getProfileImage($getApprovedPhotosFetch['photo']);?>" height="100" width="100" /></td>
															<td><?php echo date('d-M-Y  h:i a', strtotime($getApprovedPhotosFetch['created_on'])); ?></td>
															<td><button class="reject-btn 2" value="<?php echo $getApprovedPhotosFetch['photo_id'];?>" name="flag" id="user-<?php echo $getApprovedPhotosFetch['user_id'];?>" style="background-color:#E72E2E;width:70px;border-radius:4px; color:#fff;border:1px solid #D22020;">Reject</button></td>
														</tr>
														<?php
													}
												}
												?>
												</tbody>
												</table>
											</div>
										</div>
			
										<?php #Reject Photos ?>
										<div role="tabpanel" class="tab-pane fade" id="tab2a">	
											<div class="col-sm-12">
												<table class="powersearch-table table-striped table no-margin-bottom">
												<thead>
													<tr>
													<th>Sno</th>
													<th>User ID</th>
													<th>Username</th>
													<th>Photo</th>
													<th>Date/Time uploaded</th>
													<th>Change Status</th>
													</tr>
												</thead>
												<tbody>
												<?php 
												if( $getRejectedPhotos!=0 )
												{
													$i = 0;
													while( $getRejectedPhotosFetch = mysql_fetch_array($getRejectedPhotos) )
													{
														$userInfo = $adminObj->getUserInfo($getRejectedPhotosFetch['user_id']);
														?>
														<tr>
															<td><?php echo ++$i; ?></td>
															<td><?php echo $getRejectedPhotosFetch['user_id']; ?></td>
															<td><?php echo $userInfo['user_name']; ?></td>
															<td><img src="<?php echo $adminObj->getProfileImage($getRejectedPhotosFetch['photo']); ?>" height="100" width="100" /></td>
															<td><?php echo date('d-M-Y  h:i a', strtotime($getRejectedPhotosFetch['created_on'])); ?></td>
															<td><button class="apprive-btn 1" value="<?php echo $getRejectedPhotosFetch['photo_id'];?>" name="flag" id="user-<?php echo $getRejectedPhotosFetch['user_id'];?>" style="background-color:#5CBA24; width:70px; border-radius:4px; color:#fff; border:1px solid #50A81C;">Approve</button></td>
														</tr>
														<?php
													}
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
	
		<?php #Disapprove photos ?>
		<div class="modal fade pop-up-dash" id="disapprove-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog pop-up-width" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Disapprove Photo</h4>
					</div>
					<div class="modal-body">
						<input type="hidden" id="hidden-user-id" >
						<input type="hidden" id="hidden-photo-id" >
							<p>Reason for rejection</p>
							<div class="pane-re equal">
							<form>
								<div class="radio blue">
								<label>
									<input type="radio" name="disapprove_reason" value="Inappropriate"> Inappropriate
								</label>
								</div>
								<div class="radio blue">
									<label>
										<input type="radio" name="disapprove_reason" value="Poor Quality"> Poor Quality
									</label>
								</div>
								<div class="radio blue">
									<label>
									<input type="radio" name="disapprove_reason" value="Misrepresentation"> Misrepresentation
									</label>
								</div>
								<div class="radio blue">
									<label>
									<input type="radio" name="disapprove_reason" value="Duplicate">Duplicate
									</label>
								</div>
								<div class="radio blue">
									<label>
									<input type="radio" name="disapprove_reason" value="Other"> Other
									</label>
								</div>				
							</form>
							</div><!-- pane -->
							<div class="form-group">
								<label for="comment">Give More Details:</label>
								<textarea class="form-control text-design" rows="2" id="disapprove_description"></textarea>
							</div>		
					</div>
					<div class="modal-footer">
						<div class="text-center clearfix">
							<button type="button" class="btn btn-popup-red" id="disapprove-button">Reject Photo</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
	<?php include("include/foot.php"); ?>
	<!--credits modal-->
		
	</div>
</div>

	
<script>
$(function()
{
	$('button[name="flag"]').click(function()
	{
		var photo_id = $(this).val();
		var flag = $(this).attr('class').split(' ');
		var user_id = $(this).attr('id').split('-');
		
		if( flag[1]==1 )
		{
			$.ajax({
				type:"POST",
				url:"ajax/report.php",
				data:{photo_id:photo_id, user_id:user_id[1], flag:flag[1], action:'approveNewPhoto'},
				success:function(result){
					window.location.href='';
				}
			});
		}
		else
		{
			$('#disapprove-photo').modal('show');
			$('#hidden-user-id').val(user_id);
			$('#hidden-photo-id').val(photo_id);
		}
		return false;
	});
	
	$('#disapprove-button').click(function()
	{
		var user_id = $('#hidden-user-id').val();
		var photo_id = $('#hidden-photo-id').val();
		var reason = $('input[name=disapprove_reason]:checked').val();
		var description = $('#disapprove_description').val();
		
		if( typeof reason === "undefined" )
		{
			reason=''
		}
		if( reason == '' )
		{
			$('#error_message_header').html('');
			$('#error_message').html('Please select reason.');
			$('#alert_modal').modal('show');
			return false;
		}
		else if( reason == 'Other' && description=='' )
		{
			$('#error_message_header').html('');
			$('#error_message').html('Please enter reason.');
			$('#alert_modal').modal('show');
			return false;
		}
		//$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/report.php",
			data:{photo_id:photo_id, user_id:user_id, reason:reason, description:description, action:'disapproveNewPhoto'},
			success:function(result){
				//$('#preloader').hide();
				$('#disapprove-photo').modal('hide');
				if( result == 1 )
				{
					$('#error_message_header').html('');
					$('#error_message').html('Photo disapproved sucessfully');
					$('#alert_modal').modal('show');
					window.location.href='';
				}
				else if(result == 0){
					$('#error_message_header').html('');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
});
</script>
  </body>	
</html>
