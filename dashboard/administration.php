<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$adminArray=$adminObj->getAllAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Startrista | Administration</title>
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
	<link href="vendor/plugins/form/bootstrap-select/bootstrap-select.css" rel="stylesheet">
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
					   		<h5 class="no-space"> Administration </h5>
					   		<p>
								<a href="javascript:void(0);" data-toggle="modal"data-target="#create-admin-modal" class="btn green-btn edit-admin"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Create Admin</a>
							</p>
					   		<div class="col-lg-7 clearfix"> 
								<table class="powersearch-table table-striped table no-margin-bottom">
									<thead>
										<tr>
										<th></th>
										<th>Name</th>
										<th>Role</th>
										<th>Edit</th>
										<th>Date Created</th>
										<th>Delete</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($adminArray as $admin){?>
										<tr id="adminDiv-<?php echo $admin['admin_id'];?>">
											<td>
												<?php if($admin['is_online']){?>
													<i class="fa fa-circle green-color-f" aria-hidden="true"></i>
												<?php }else{ ?>
													<i class="fa fa-circle" aria-hidden="true"></i>
												<?php } ?>
											</td>
											<td>
												<a href="admin-timestamp.php?aid=<?php echo $admin['admin_id'];?>">
												<?php echo $admin['first_name'].' '.$admin['last_name'];?></a>
											</td>
											<td><?php echo $adminObj->getAdminRole($admin['role_id']);?></td>
											<!--<td>
												<a href="javascript:void(0);" class="viewAdmin btn orange-btn" id="#viewAdmin-<?php echo $admin['admin_id'];?>"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
											</td>-->
											<td>
												<a href="javascript:void(0);" data-toggle="modal" data-target="#edit-admin-modal-<?php echo $admin['admin_id'];?>" class="btn green-btn">
													<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
												</a>
											</td>
											<td><?php echo date('d-M-Y' , strtotime($admin['created_on']));?></td>
											<td>
												<a href="javascript:void(0);" class="deleteAdmin" id="deleteAdmin-<?php echo $admin['admin_id'];?>">
													<i class="fa fa-times-circle" aria-hidden="true" style="font-size:18px;"></i>
												</a>
											</td>
										</tr>
										<?php } ?>
									</tbody>
								</table>		    
							</div>
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
<div class="modal fade" id="create-admin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Create Admin</h4>
			</div>
			<div class="modal-body">
				<div class="pane-re equal">
					<form>
							<div class="col-md-6 form-group">
								<label>First Name</label>
								<input type="text" class="form-control " id="first_name" placeholder="First Name">
							</div>	
							<div class="col-md-6 form-group" >
								<label>Last Name</label>
								<input type="text" class="form-control" id="last_name" placeholder="Last Name">
							</div>	
							<div class="col-md-6 form-group">
								<label>E-mail</label>
								<input type="text" class="form-control" id="email_id" placeholder="E-mail">
							</div>	
							
							<div class="col-md-6 form-group">
								<label>Role</label>
								<select class="form-control" id="role_id">
									<option value="">Select role</option>
									<option value="2">Admin</option>
									<option value="1">Super Admin</option>
								</select>
							</div>	
							<div class="col-md-6 form-group">
								<label>Password</label>
								<input type="password" class="form-control" id="password" placeholder="Password">
							</div>	
							<div class="col-md-6 form-group">
								<label>Confirm Password</label>
								<input type="password" class="form-control" id="password1" placeholder="Confirm Password">
							</div>
							<div class="col-md-3 pull-right form-group">
									
							</div>
					</form>
				</div><!-- pane -->
			</div>
			<div class="modal-footer">
				<div class="text-center clearfix">
					<button type="button" class="btn btn-success" id="createAdmin">Create Admin</button>
					<button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php foreach($adminArray as $admin){?>
	<div class="modal fade" id="edit-admin-modal-<?php echo $admin['admin_id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Update Admin</h4>
				</div>
				<div class="modal-body">
					<div class="pane-re equal">
						<form>
								<div class="col-md-6 form-group">
									<label>First Name</label>
									<input type="text" class="form-control" id="first_name-<?php echo $admin['admin_id'];?>" value="<?php echo $admin['first_name'];?>">
								</div>	
								<div class="col-md-6 form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" id="last_name-<?php echo $admin['admin_id'];?>" value="<?php echo $admin['last_name'];?>">
								</div>	
								<div class="col-md-6 form-group" >
									<label>Role</label>
									<select class="form-control" id="role_id-<?php echo $admin['admin_id'];?>">
										<option value="">Select role</option>
										<option value="2" <?php if($admin['role_id'] == 2) echo 'selected';?> >Admin</option>
										<option value="1" <?php if($admin['role_id'] == 1) echo 'selected';?>>Super Admin</option>
									</select>
								</div>	
									
								<div class="col-md-12 form-group">
									<label><a href="javascript:void(0);" onclick="$('#change-password-<?php echo $admin['admin_id'];?>').toggle();$('#password-<?php echo $admin['admin_id'];?>').val('');$('#password1-<?php echo $admin['admin_id'];?>').val('');">Change Password</a></label>
									<div class="col-md-3 pull-right form-group"></div>
								</div>
								<div class="row">
									<div class="change-password col-lg-12" id="change-password-<?php echo $admin['admin_id'];?>" style="display:none;">
										<div class="col-md-6 form-group">
											<label>Password</label>
											<input type="password" class="form-control" id="password-<?php echo $admin['admin_id'];?>" value="">
										</div>	
										<div class="col-md-6 form-group">
											<label>Confirm Password</label>
											<input type="password" class="form-control" id="password1-<?php echo $admin['admin_id'];?>" value="">
										</div>
									</div>
								</div>
								
						</form>
					</div><!-- pane -->
				</div>
				<div class="modal-footer clearfix">
					<div class="text-center clearfix">
						<button type="button" class="btn btn-success updateAdmin" id="updateAdmin-<?php echo $admin['admin_id'];?>">Update</button>
						<button type="button" class="btn btn-error" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<div class="modal fade" id="view-admin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><b>Admin Details</b></h4>
				</div>
				<div class="modal-body">
					<div class="pane-re equal">
						<div class="clearfix" id="append-view-html"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<div class="modal fade pop-up-dash" id="admin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index: 9999;">
	<div class="modal-dialog pop-up-width" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onclick="window.location.href=''"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="admin_success_header"></h4>
			</div>
			<div class="modal-body">
				<p id="admin_success_message"></p>
				<div class="text-center clearfix">
					<button type="button" class="btn btn-popup-red" onclick="window.location.href=''">Ok</button>
				</div>	
			</div>
		</div>
	</div>
</div>	
<script>
$(function(){
	//$('#create-admin-modal').modal('show');
	
	$('#createAdmin').click(function(){
		var first_name=$('#first_name').val();
		var last_name=$('#last_name').val();
		var role_id=$('#role_id').val();
		var email_id=$('#email_id').val();
		var password=$('#password').val();
		var password1=$('#password1').val();
		if(first_name == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter first name.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(last_name == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter last name.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(email_id == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter admin email address');
			$('#alert_modal').modal('show');
			return false;
		}else {
			if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
				$('#error_message_header').html('Alert');
				$('#error_message_header').html('Email Address Not Recognised');
				$('#error_message').html('Email Address is not recognized, please try again');
				$('#alert_modal').modal('show');
				return false;
			}
			if(email_id.length > 100)
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Email address length can\'t be greater than 100 characters.');
				$('#alert_modal').modal('show');
				$("#email_id").focus();
				return false;
			}
		}
		if(role_id == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please select role.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(password == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter password.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(password1 == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter confirm password.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(password != password1){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Password mismatched.');
			$('#alert_modal').modal('show');
			return false;
		}
		$.ajax({
			type:"POST",
			url:"ajax/admin.php",
			data:{first_name:first_name, email_id:email_id,last_name:last_name, role_id:role_id,password:password, password1:password1,action:'createAdmin'},
			success:function(result){
				if(result == 1){
					$('#create-admin-modal').modal('hide');
					$('#admin_success_header').html('Alert');
					$('#admin_success_message').html('Admin created sucessfully.');
					$('#admin_modal').modal('show');
				}
				if(result == 2){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Email Address already exist.');
					$('#alert_modal').modal('show');
				}
				if(result == 3){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Login name already exist.');
					$('#alert_modal').modal('show');
				}
				if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
	
	$('.updateAdmin').click(function(){
		var id=$(this).attr('id').split('-');
		var admin_id=id[1];
		var first_name=$('#first_name-'+admin_id).val();
		var last_name=$('#last_name-'+admin_id).val();
		var role_id=$('#role_id-'+admin_id).val();
		if(first_name == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter first name.');
			$('#alert_modal').modal('show');
			return false;
		}
		if(last_name == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please enter last name');
			$('#alert_modal').modal('show');
			return false;
		}
		if(role_id == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please select role.');
			$('#alert_modal').modal('show');
			return false;
		}
		alert($('#change-password-'+admin_id).css('display'));
		if($('#change-password-'+admin_id).css('display') == 'block'){
			var password=$('#password-'+admin_id).val();
			var password1=$('#password1-'+admin_id).val();
			if(password != '' && password != password1){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Password mismatched.');
				$('#alert_modal').modal('show');
				return false;
			}
		}else{
			var password='';
			var password1='';
		}
		
		$.ajax({
			type:"POST",
			url:"ajax/admin.php",
			data:{admin_id:admin_id,first_name:first_name,last_name:last_name, role_id:role_id,password:password, password1:password1,action:'updateAdmin'},
			success:function(result){
				if(result == 1){
					$('#edit-admin-modal-'+admin_id).modal('hide');
					$('#create-admin-modal').modal('hide');
					$('#admin_success_header').html('Alert');
					$('#admin_success_message').html('Admin Information updated sucessfully.');
					$('#admin_modal').modal('show');
				}
				if(result == 2){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Email Address already exist.');
					$('#alert_modal').modal('show');
				}
				if(result == 3){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Login name already exist.');
					$('#alert_modal').modal('show');
				}
				if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
	
	$('.deleteAdmin').click(function(){
		var id=$(this).attr('id').split('-');
		var admin_id=id[1];
		if(confirm('Sure you want to delete?')){
			$.ajax({
				type:"POST",
				url:"ajax/admin.php",
				data:{admin_id:admin_id,action:'deleteAdmin'},
				success:function(result){
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Admin deleted sucessfully.');
						$('#alert_modal').modal('show');
						$('#adminDiv-'+admin_id).hide();
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
	
	$('.viewAdmin').click(function(){
		var id=$(this).attr('id').split('-');
		var admin_id=id[1];
		$.ajax({
			type:"POST",
			url:"ajax/admin.php",
			data:{admin_id:admin_id,action:'viewAdmin'},
			success:function(result){
				$('#append-view-html').html(result);
				$('#view-admin-modal').modal('show');
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
