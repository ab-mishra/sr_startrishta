<?php
include('classes/adminClass.php');
$adminObj = new Admin();

$searchType = '';
$searchValue = '';

if( isset($_GET['online']) ){
	$searchType = 'online';
}
else if(isset($_GET['new-user'])){
	$searchType = 'new-user';
}
else if(isset($_GET['deleted'])){
	$searchType = 'deleted';	
}
else if(isset($_GET['no-photo'])){
	$searchType = 'no-photo';	
}
else if(isset($_GET['not-verified'])){
	$searchType = 'not-verified';	
}else if(isset($_GET['id'])){
	$searchType = 'id';
	$searchValue = $_GET['id'];
}
else if(isset($_GET['search_location'])){
	$searchType = 'location';
	$searchValue = $_GET['search_location'];
}
$search_profile_status='';
$search_profile_photo='';
$search_gender='';
$search_online='';
$search_verified='';
$search_vip='';
$search_joined='';
$search_location='';

if(isset($_POST['search_profile_status']) && $_POST['search_profile_status']!=''){
	$searchType = $_POST['search_profile_status'];
	$search_profile_status=$_POST['search_profile_status'];
}
if(isset($_POST['search_profile_photo']) && $_POST['search_profile_photo'] != ''){
	$searchType = $_POST['search_profile_photo'];
	$search_profile_photo=$_POST['search_profile_photo'];
}
if(isset($_POST['search_gender']) && $_POST['search_gender']!=''){
	$searchType = $_POST['search_gender'];
	$search_gender=$_POST['search_gender'];
}
if(isset($_POST['search_online']) && $_POST['search_online'] != ''){
	$searchType = $_POST['search_online'];
	$search_online=$_POST['search_online'];
}
if(isset($_POST['location']) && $_POST['location'] != ''){
	$searchType = 'location';
	$searchValue=$_POST['location'];
}
if(isset($_POST['search_verified'])  && $_POST['search_verified'] != ''){
	$searchType = $_POST['search_verified'];
	$search_verified=$_POST['search_verified'];
}
if(isset($_POST['search_vip'])  && $_POST['search_vip'] != ''){
	$searchType = $_POST['search_vip'];
	$search_vip=$_POST['search_vip'];
}
if(isset($_POST['search_joined'])  && $_POST['search_joined'] != ''){
	$searchType = $_POST['search_joined'];
	$search_joined=$_POST['search_joined'];
}


$allSystemId = $adminObj->getAllSystemId();
$allusers = $adminObj->getUsers();

/*echo "<pre>";print_r($allSystemId);echo "</pre>";*/

$userCount = $adminObj->getSearchUsersCount($searchType);
/*echo 'shfjhskjfhsf ----------- '.$userCount;
echo 'search type ----------- '.$searchType;*/
$item_per_page = 5;
$pages = ceil($userCount/$item_per_page);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Power Search</title>
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
					   		 <h5> Power Search </h5>
					   		<div class="col-lg-5">
					   			<div class="">
								<form>
					   				<ul class="search-bar-power clearfix">
					   					<li>
							   				<ul class="search-bar search-bar-wap clearfix">
							   					<li>
													<div class="form-group">
														<?php /* onchange="$('#systemId').val(this.value)" */  ?>
														<select class="selectpicker default" >
															<option value="">User ID</option>
															<option value="">Email ID</option>
															<?php 
															/* foreach($allSystemId as $systemId){	?>
																<option value="<?php echo $systemId;?>" <?php echo $searchValue == $systemId ? 'selected' : '';?>><?php echo $systemId;?></option>
															<?php } */ ?>
														</select>
													</div>
							   					</li>
							   					<li>
							   						<div class="form-group">
														<input type="text" class="form-control" name="id" id="systemId" value="<?php echo $searchValue;?>" />
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
							<div class="col-lg-7">
					   			<div class="">
					   				<ul class="power-nav clearfix">
					   					<li>
							   				<a href="power-search.php?online">Current Online User</a>
						   				</li>
						   				<li>
							   				<a href="power-search.php?new-user">New Users</a>
						   				</li>
						   				<li>
							   				<a href="power-search.php?deleted">Recently Deleted</a>
						   				</li>
						   				<li>
							   				<a href="power-search.php?no-photo">No Profile Photo</a>
						   				</li>
						   				<li>
							   				<a href="power-search.php?not-verified">Profile Not Verified</a>
						   				</li>
					   				</ul>
					   			</div>
							</div>
						</div>
						<div class="clearfix"></div>
			<!-- /drag-drop -->
					</div>	<!-- col-lg-9 closed-->
						<div class="row">
							    <div class="col-lg-12">
								<div class="pane equal">
								    <div class="table-responsive">
									<table class="powersearch-table table  table-hover">
										<form id="search-form" method="post">
									    <thead>
										<tr>
										    <th>Id</th>
										    <th>Profile Status</th>
										    <th>Photos</th>
										    <th>Username</th>
										    <th>Age</th>
										    <th>Gender</th>
										    <th>Online</th>
										     <th>Email</th>
										    <th>Mobile Number</th>
										    <th>Location</th>
										    <th>Interests</th>
										    <th>Verified Profile</th>
										    <th>Date Joined</th>
										    <th>Last Active</th>
										    <th>Total&nbsp;time Logged&nbsp;in</th>
										    <th>Membership Status</th>
										    <th>Credits&nbsp;on Profile</th>
										    <th>Flags Received</th>
										    <th>Flags Raised</th>
										    <th>Suspended Reason</th>
										    <th>Deleted Reason</th>
										    <th>Deleted Date</th>
										    <th>Action</th>
										</tr>
										<tr class="table-secnd">
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_profile_status" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="1" <?php if($search_profile_status==1) echo 'selected';?>>Active</option>
														<option value="2" <?php if($search_profile_status==2) echo 'selected';?>>Frozen</option>
														<option value="3" <?php if($search_profile_status==3) echo 'selected';?>>Suspended</option>
														<option value="4" <?php if($search_profile_status==4) echo 'selected';?>>Deleted</option>
												    </select>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_profile_photo" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="photo" <?php if($search_profile_photo=='photo') echo 'selected';?>>Yes</option>
														<option value="no-photo" <?php if($search_profile_photo=='no-photo') echo 'selected';?>>No</option>
												    </select>
												</div>
										    </th>
										    <th></th>
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_gender" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="male" <?php if($search_gender=='male') echo 'selected';?>>Male</option>
														<option value="female" <?php if($search_gender=='female') echo 'selected';?>>Female</option>
												    </select>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_online" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option  value="online" <?php if($search_online=='online') echo 'selected';?>>Online</option>
														<option  value="offline" <?php if($search_online=='offline') echo 'selected';?>>Offline</option>
												    </select>
												</div>
										    </th>
										    <th></th>
										    <th></th>
										    <th>
										    	<div class="form-group">
													<input class="form-control start-input" name="location" placeholder="location" type="text">
												</div>
										    </th>
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_verified" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="verified" <?php if($search_verified=='verified') echo 'selected';?>>Verified</option>
														<option value="not-verified" <?php if($search_verified=='not-verified') echo 'selected';?>>Unverified</option>
												    </select>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_joined" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="less1day" <?php if($search_joined=='less1day') echo 'selected';?>><24 hours</option>
														<option value="less3day" <?php if($search_joined=='less3day') echo 'selected';?>><3 days</option>
														<option value="less7day" <?php if($search_joined=='less7day') echo 'selected';?>><7 days</option>
														<option value="less30day" <?php if($search_joined=='less30day') echo 'selected';?>><30 days</option>
														<option value="less3month" <?php if($search_joined=='less3month') echo 'selected';?>><3 months</option>
														<option value="greater3month" <?php if($search_joined=='greater3month') echo 'selected';?>>3 month</option>
												    </select>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default">
														<option>All</option>
														<option><24 hours</option>
														<option><3 days</option>
														<option><7 days</option>
														<option><30 days</option>
														<option><3 months</option>
														<option>3 month</option>
												    </select>
												</div>
										    </th>
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_vip" onchange="$('#search-form').submit();">
														<option value="">All</option>
														<option value="vip" <?php if($search_vip=='vip') echo 'selected';?>>VIP</option>
														<option value="free" <?php if($search_vip=='free') echo 'selected';?>>Free</option>
												    </select>
												</div>
										    </th>
										    <th></th>
										    <th></th>
										    <th></th>
										    <th></th>
										    <th></th>
										    <th></th>
										    <th>
										    	<ul class="cross-icon">
													<li><i class="fa fa-caret-left" aria-hidden="true"></i></li>
													<li><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></li>
												</ul>
										    </th>
										</tr>
									    </thead>
										</form>
									    
									    <tbody id="search_result_div"></tbody>
										
									</table>
									
								    </div>
								    
								</div><!-- pane -->
							    </div><!-- col -->
							</div><!-- row -->
							 <!--<nav>
								<p class="searchPagination"></p>
							</nav>-->
			   		</div><!-- container-fluid -->
				</div><!-- content -->
	    	</div><!-- main -->
			<!-- /MAIN  -->
		</div><!-- wrapper -->
	
        <!------------------------CREDIT MODAL------------------------------------->
        <div class="modal fade pop-up-dash" id="credit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog pop-up-width" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Modify Credits</h4>
					</div>
					<input type="hidden" id="hidden-credit-userid" >
					<input type="hidden" id="hidden-credit-username" >
					<div class="modal-body">
						<p> For <strong id="credit-username"></strong>  | ID <strong id="credit-userid"> 76331</strong></p>
							<ul class="credits-textbox clearfix">
								<li>Numbers of credits:</li>
								<li>
									<div class="form-group">
										<input class="form-control start-input" id="user-credit" type="text">
									</div>
								</li>
							</ul>
							<div class="text-center clearfix">
								<button type="button" id="modify-credit" class="btn btn-popup-red">Modify Credits</button>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-popup-grey" id="reset-credit">Reset All Credits</button>
					</div>
				</div>
			</div>
		</div>
		<!------------------------SUSPEND MODAL------------------------------------->
		<div class="modal fade pop-up-dash" id="modal-suspend" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog pop-up-width" role="document">
				    <div class="modal-content">
					      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Suspend User</h4>
					      </div>
					      <div class="modal-body">
						  <input type="hidden" id="hidden-suspend-user-id" >
						  <input type="hidden" id="hidden-suspend-user-name" >
					        <p>Why Do yor want to suspend <strong id="suspend-user-name"></strong> (ID <strong id="suspend-user-id"></strong>)</p>
					        	
									<div class="pane-re equal">
									    <form>
											<div class="radio blue">
											    <label>
												<input type="radio" name="suspand_reason" value="Personal Abuse"> Personal Abuse
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="suspand_reason" value="Threatening Behaviour"> Threatening Behaviour
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="suspand_reason" value="Offensive"> Offensive
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="suspand_reason" value="Inappropiate Photos"> Inappropiate Photos
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="suspand_reason" value="Other"> Other
											    </label>
											</div>
											
									    </form>
									</div><!-- pane -->
									<div class="form-group">
										<label for="comment">Give More Details:</label>
										<textarea class="form-control text-design" rows="2" id="suspand_description"></textarea>
									</div>
					        	
					      </div>
					      <div class="modal-footer">
					        <div class="text-center clearfix">
					        		<button type="button" class="btn btn-popup-red" id="suspand-user-button">Suspend User</button>
					        	</div>
					      </div>
				    </div>
			  </div>
		</div>
		<!------------------------erase MODAL------------------------------------->
		<div class="modal fade pop-up-dash" id="modal-erase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog pop-up-width" role="document">
				    <div class="modal-content">
					      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">Erase User</h4>
					      </div>
					      <div class="modal-body">
						  <input type="hidden" id="hidden-erase-user-id" >
						  <input type="hidden" id="hidden-erase-user-name" >
					        <p>Why Do yor want to Erase <strong id="erase-user-name"></strong> (ID <strong id="erase-user-id"></strong>)</p>
					        	
									<div class="pane-re equal">
									    <form>
											<div class="radio blue">
											    <label>
												<input type="radio" name="erase_reason" value="Personal Abuse"> Personal Abuse
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="erase_reason" value="Threatening Behaviour"> Threatening Behaviour
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="erase_reason" value="Offensive"> Offensive
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="erase_reason" value="Inappropiate Photos"> Inappropiate Photos
											    </label>
											</div>
											<div class="radio blue">
											    <label>
												<input type="radio" name="erase_reason" value="Other"> Other
											    </label>
											</div>
											
									    </form>
									</div><!-- pane -->
									<div class="form-group">
										<label for="comment">Give More Details:</label>
										<textarea class="form-control text-design" rows="2" id="erase_description"></textarea>
									</div>
					        	
					      </div>
					      <div class="modal-footer">
					        <div class="text-center clearfix">
					        		<button type="button" class="btn btn-popup-red" id="erase-user-button">Erase User</button>
					        	</div>
					      </div>
				    </div>
			  </div>
		</div>
		<!--credits modal-->
		<!--upgrate to vip-->
		<div class="modal fade pop-up-dash" id="vip-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog pop-up-width" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Upgrade to VIP</h4>
					</div>
					<input type="hidden" id="hidden-vip-userid" >
					<input type="hidden" id="hidden-vip-username" >
					<div class="modal-body">
						<p>Give <strong id="vip-username"></strong> (ID <strong id="credit-userid"></strong>) Free <strong>VIP</strong></p>
						<ul class="credits-textbox clearfix">
							<li>Membership for:</li>
							<li>
								<select class="selectpicker  default" id="vip_duration">
									<option value="+3 days">3 days</option>
									<option value="+7 days">7 days</option>
									<option value="+30 days">30 days</option>
									<option value="+3 months">3 months</option>
								</select>
							</li>
						</ul>
						<div class="text-center clearfix">
							<button type="button" class="btn btn-popup-red" id="upgrade-vip">Upgrade TO VIP</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade pop-up-dash" id="alert_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog pop-up-width" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="error_message_header"></h4>
					</div>
					<div class="modal-body">
						<p id="error_message"></p>
						<div class="text-center clearfix">
							<button type="button" class="btn btn-popup-red" data-dismiss="modal">Ok</button>
						</div>	
					</div>
				</div>
			</div>
		</div>
	<?php include("include/foot.php"); ?>
	<!--credits modal-->
		
	</div>
</div>

<script src="assets/js/bootpag.min.js"></script>	
<script type="text/javascript">
	$(function(){
		
		//Pgination
		var searchType ='<?php echo $searchType;?>';
		var searchValue ='<?php echo $searchValue;?>';
		// alert(searchType);
		if( searchValue!="" || searchType!="" )
		{
			$("#search_result_div").load("search-pagination.php", {'searchType':searchType, 'searchValue':searchValue});
		}

        $(".searchPagination").bootpag({
            total: '<?php echo $pages;?>',
            page: 1,
            maxVisible: 5
        }).on("page", function(e, num){
            e.preventDefault();
            //$('#preloader').show();
            $("#search_result_div").load("search-pagination.php", {'page':num , 'searchType':searchType, 'searchValue':searchValue});
            //$('#preloader').hide();
        });
		
		/*/##############################SEACRCH ###############################################*/
		
		
		/*/##############################SUSPEND USER ###########################################*/
		$('#search_result_div').on('click' , '.suspand-user' , function(){
			var value=$(this).attr('id').split('-');
			var id=value[1];
			var name=value[2];
			$('#hidden-suspend-user-id').val(id);
			$('#hidden-suspend-user-name').val(name);
			$('#suspend-user-id').html(id);
			$('#suspend-user-name').html(name);
			$('#modal-suspend').modal('show');
		});
		$('#search_result_div').on('click' , '.unsuspand-user' , function(){
			var value=$(this).attr('id').split('-');
			var user_id=value[1];
			var user_name=value[2];
			$.ajax({
				type:"POST",
				url:"ajax/suspand.php",
				data:{user_id : user_id, user_name:user_name,action : 'unsuspandUser'},
				success:function(result){
                    //console.log(result);return false;
					//$('#preloader').hide();
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('User unsuspended successfully.');
						$('#alert_modal').modal('show');
						location.reload();
						//window.location.href='';
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			
		});
		$('#suspand-user-button').on('click' , function(){
			/*alert("here");*/
			var user_id=$('#hidden-suspend-user-id').val();
			var user_name=$('#hidden-suspend-user-name').val();
			var reason = $('input[name=suspand_reason]:checked').val();
			var description = $('#suspand_description').val();
			if(typeof reason === "undefined"){
				reason=''
			}
			if(reason == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select reason.');
				$('#alert_modal').modal('show');
				return false;
			}else if(reason == 'Other' && description==''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter reason.');
				$('#alert_modal').modal('show');
				return false;
			}
			$.ajax({
				type:"POST",
				url:"ajax/suspand.php",
				data:{suspendUserId : user_id, user_name:user_name, reason:reason ,description:description,action : 'suspandUser'},
				success:function(result){
					console.log(result);//return false;
					$('#modal-suspend').modal('hide');
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('User suspended successfully.');
						$('#alert_modal').modal('show');
						location.reload();
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
		
		/*/##############################erase USER ###########################################*/
		$('#search_result_div').on('click' , '.erase-user' , function(){
			var value=$(this).attr('id').split('-');
			var id=value[1];
			var name=value[2];
			$('#hidden-erase-user-id').val(id);
			$('#hidden-erase-user-name').val(name);
			$('#erase-user-id').html(id);
			$('#erase-user-name').html(name);
			$('#modal-erase').modal('show');
		});
		$('#erase-user-button').on('click' , function(){
			var user_id=$('#hidden-erase-user-id').val();
			var user_name=$('#hidden-erase-user-name').val();
			var reason = $('input[name=erase_reason]:checked').val();
			var description = $('#erase_description').val();
			if(typeof reason === "undefined"){
				reason=''
			}
			if(reason == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select reason.');
				$('#alert_modal').modal('show');
				return false;
			}else if(reason == 'Other' && description==''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter reason.');
				$('#alert_modal').modal('show');
				return false;
			}
			//$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/erase.php",
				data:{eraseUserId : user_id,user_name:user_name, reason:reason ,description:description,action : 'eraseUser'},
				success:function(result){
					
					//$('#preloader').hide();
					$('#modal-erase').modal('hide');
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('User erased successfully.');
						$('#alert_modal').modal('show');
						$('#erase_user_div-'+user_id).hide();
						location.reload();
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
	
		/*/############################MODIFY CREDIT#########################################*/
		$('#search_result_div').on('click' , '.credit-modal' , function(){
			var value=$(this).attr('id').split('-');
			var id=value[1];
			var name=value[2];
			$('#hidden-credit-userid').val(id);
			$('#hidden-credit-username').val(name);
			$('#credit-userid').html(id);
			$('#credit-username').html(name);
			$('#credit-modal').modal('show');
		});
		$('#modify-credit').on('click' , function(){
			var userId=$('#hidden-credit-userid').val();
			var user_name=$('#hidden-credit-username').val();
			var credit = $('#user-credit').val();
			
			if(credit == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter credit.');
				$('#alert_modal').modal('show');
				return false;
			}
			//$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/credit.php",
				data:{creditUserId : userId ,credit:credit, action : 'modifyCredit'},
				success:function(result){
					//$('#preloader').hide();
					$('#credit-modal').modal('hide');
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Credit modified successfully.');
						$('#alert_modal').modal('show');
						location.reload();
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
		$("#user-credit").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		// Allow: Ctrl+A, Command+A
		(e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
		// Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) { return; }
			// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
		}
		});
		$('#reset-credit').on('click' , function(){
			var userId=$('#hidden-credit-userid').val();
			var user_name=$('#hidden-credit-username').val();
			
			//$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/credit.php",
				data:{creditUserId : userId, action : 'resetCredit'},
				success:function(result){
					//$('#preloader').hide();
					$('#credit-modal').modal('hide');
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Credits reset successfully.');
						$('#alert_modal').modal('show');
						location.reload();
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
		
		/*/##################################VIP##############################################*/
		$('#search_result_div').on('click' , '.vip-modal' , function(){
			var value=$(this).attr('id').split('-');
			var id=value[1];
			var name=value[2];
			/*alert(id+"----- "+name);*/
			$('#hidden-vip-userid').val(id);
			$('#hidden-vip-username').val(name);
			$('#vip-userid').html(id);
			$('#vip-username').html(name);
			$('#vip-modal').modal('show');
		});
		$('#upgrade-vip').on('click' , function(){
			var userId=$('#hidden-vip-userid').val();
			var user_name=$('#hidden-vip-username').val();
			var duration = $('#vip_duration').val();
			/*alert(duration);*/
			if(duration == ''){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select duration.');
				$('#alert_modal').modal('show');
				return false;
			}
			//$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/vip.php",
				data:{vipUserId : userId ,duration:duration, action : 'upgradeVip'},
				success:function(result){
					//$('#preloader').hide();
					$('#vip-modal').modal('hide');
					if(result == 1){
						$('#error_message_header').html('Alert');
						$('#error_message').html('User upgraded to VIP successfully.');
						$('#alert_modal').modal('show');
						location.reload();
					}else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network. Please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
		
		$('.selectpicker').selectpicker({
		    style: 'btn-select',
		    size: 10,
		});

	});
	
	</script>
	<!--<script type="text/javascript">
	    "use strict";
	    $(document).ready(function() {
		//TAGS INPUT
		$('#tag1').tagsInput({
		    interactive: true,
		});
		
		//TEXT AREA LIMIT
		var elem = $("#charsLeft");
		$(".limit-text-140").limiter(140, elem);
		
		//TEXT AREA AUTOSIZE
		$(function(){
		    $('.text-area-autosize').autosize();
		});
		
		//MASKED INPUT
		jQuery(function($){
		    $("#date").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
		    $("#phone").mask("(999) 999-9999");
		    $("#tin").mask("99-9999999");
		    $("#ssn").mask("999-99-9999");
		});
		$(".radio-query").click(function(){
			alert("ghiii");
			  $('.blue input').iCheck({
			    checkboxClass: 'icheckbox_square-blue',
			    radioClass: 'iradio_square-blue',
			});
		});
		
		//AUTONUMERIC
		jQuery(function($) {
		    $('.autonumeric').autoNumeric('init');
		});
		
		//ICHECK
		
		
		$('.green input').iCheck({
		    checkboxClass: 'icheckbox_square-green',
		    radioClass: 'iradio_square-green',
		});
		
		$('.aero input').iCheck({
		    checkboxClass: 'icheckbox_square-aero',
		    radioClass: 'iradio_square-aero',
		});
		
		$('.yellow input').iCheck({
		    checkboxClass: 'icheckbox_square-yellow',
		    radioClass: 'iradio_square-yellow',
		});
		
		$('.red input').iCheck({
		    checkboxClass: 'icheckbox_square-red',
		    radioClass: 'iradio_square-red',
		});
		
		$('.grey input').iCheck({
		    checkboxClass: 'icheckbox_square-grey',
		    radioClass: 'iradio_square-grey',
		});
		
		// SWITCH
		// Classes
		var grey = document.querySelector('.switch-default');
		var primary = document.querySelector('.switch-primary');
		var success = document.querySelector('.switch-success');
		var info = document.querySelector('.switch-info');
		var warning = document.querySelector('.switch-warning');
		var danger = document.querySelector('.switch-danger');
		var dark = document.querySelector('.switch-dark');
		
		var grey_2 = document.querySelector('.square .switch-default_2');
		var primary_2 = document.querySelector('.switch-primary_2');
		var success_2 = document.querySelector('.switch-success_2');
		var info_2 = document.querySelector('.switch-info_2');
		var warning_2 = document.querySelector('.switch-warning_2');
		var danger_2 = document.querySelector('.switch-danger_2');
		var dark_2 = document.querySelector('.switch-dark_2');
	    
		// Colors
		var switchery = new Switchery(grey, { color: '#eeeeee' });
		var switchery = new Switchery(primary, { color: '#4894af' });
		var switchery = new Switchery(success, { color: '#16a085' });
		var switchery = new Switchery(info, { color: '#59abe3' });
		var switchery = new Switchery(warning, { color: '#f1c40f' });
		var switchery = new Switchery(danger, { color: '#e26a6a' });
		var switchery = new Switchery(dark, { color: '#666666' });
		
		var switchery = new Switchery(grey_2, { color: '#eeeeee' });
		var switchery = new Switchery(primary_2, { color: '#4894af' });
		var switchery = new Switchery(success_2, { color: '#16a085' });
		var switchery = new Switchery(info_2, { color: '#59abe3' });
		var switchery = new Switchery(warning_2, { color: '#f1c40f' });
		var switchery = new Switchery(danger_2, { color: '#e26a6a' });
		var switchery = new Switchery(dark_2, { color: '#666666' });
		
		//SELECT
		$('.selectpicker').selectpicker({
		    style: 'btn-select',
		    size: 10,
		});
		
		//SPINNER
		$(function(){
		    $('#customize-spinner').spinner('changed',function(e, newVal, oldVal){
			$('#old-val').text(oldVal);
			$('#new-val').text(newVal);
		    });
		})
	    });//END
	</script>-->
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
