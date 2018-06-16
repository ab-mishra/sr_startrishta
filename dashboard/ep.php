<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];
$restrictedUsernameArray=$adminObj->getRestrictedUsername();

?><!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | EP </title>
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
					   		<h5 class="no-space"> Entertainment profiles </h5>
					   		<div class="clearfix"></div>
							<br>
					   		<div class="col-sm-6">
								<table class="powersearch-table table-striped table no-margin-bottom">
								<thead>
									<tr>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Create a new entertainment profile</td>
										<td>
											<a href="ep-profile.php" class="btn green-btn">
													 Select
											</a>
										</td>
									</tr>
									<tr>
										<td>View & edit current entertainment profiles</td>
										<td>
											<a href="ep-user-list.php"  class="btn green-btn">
													 Select
											</a>
										</td>
									</tr>
									<tr>
										<td>View deleted entertainment profiles</td>
										<td>
											<a href="javascript:void(0);" data-toggle="modal" data-target="#edit-admin-modal-1" class="btn green-btn">
													 Select
											</a>
										</td>
									</tr>
								</tbody>
								</table>
			    			</div><!-- col -->
							
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

<!--<div id="alert_modal" class="modal fade login_pop" role="dialog" style="z-index:10000">
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b id="error_message_header">Alert</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b id="error_message"></b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal" id="alert_button">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>-->

<script>
$(function(){
	$('#submitUsername').click(function(){
		var user_name=$('#user_name').val();
		
		if(user_name == ''){
			/*$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter User name.');
			$('#alert_modal').modal('show');*/
			alert('Please enter user name');
			return false;
		}
		$.ajax({
			type:"POST",
			url:"ajax/restricted-username.php",
			data:{user_name:user_name, action:'restrictUsername'},
			success:function(result){
				if(result == 0){
					/*$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');*/
					alert('Problem in network.please try again.');
					return false;
				}
				if(result == 2){
					alert('User name already exist.please try again.');
					$('#user_name').val('');
					return false;
				}
				if(result == 1){
					window.location.href='';
					return false;
				}
			}
		});
		return false;
	});
	$('.updatename').click(function(){
		var id=$(this).attr('id').split('-');
		var user_name=$('#user_name-'+id[1]).val();
		alert(id[1]+user_name);
		if(user_name == ''){
			alert('Please enter user name');
			return false;
		}
		$.ajax({
			type:"POST",
			url:"ajax/restricted-username.php",
			data:{user_name:user_name, id:id[1], action:'editRestrictUsername'},
			success:function(result){
				if(result == 0){
					/*$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');*/
					alert('Problem in network.please try again.');
					return false;
				}
				if(result == 2){
					alert('User name already exist.please try again.');
					return false;
				}
				if(result == 1){
					window.location.href='';
					return false;
				}
			}
		});
		return false;
	});
	
	$('.deleteUser').click(function(){
		var id=$(this).attr('id').split('-');
		var rest_id=id[1];
		if(confirm('Sure you want to delete?')){
			$.ajax({
				type:"POST",
				url:"ajax/restricted-username.php",
				data:{id:rest_id,action:'deleteRestrictUsername'},
				success:function(result){
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Restricted User name deleted sucessfully.');
						$('#alert_modal').modal('show');
						$('#restrictedUsernameDiv-'+rest_id).hide();
					}else{
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again');
						$('#alert_modal').modal('show');
					}
				}
			});
		}
		return false;
	});
});
</script>
	
	
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>