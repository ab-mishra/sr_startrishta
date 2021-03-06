<?php 
include('classes/adminClass.php');
$adminObj = new Admin();

include('classes/epClass.php');
$epObj = new Entertainment();

$epList = $epObj->getEPLists();
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Edit EP</title>
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
	<style>
		.notify_nub
		{
			font-size: 12px;
			border-radius: 3px;
			top: -15px;
			left: 15px;
			background: #e74c3c;
			color: #ffffff;
			text-align: center;
			font-weight: bold;
			display: inline-block;
			padding: 3px 6px;
		}
		.notify_nub a{color:#fff;}
	</style>
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
					   		<h5>EP User List <a href="ep.php" class="pull-right back-btn"><span class="fa fa-arrow-left"></span>Back</a></h5>
							<div class="col-lg-5">
					   			<div class="">
								<form>
									<ul class="search-bar-power clearfix">
										<li>
									<ul class="search-bar search-bar-wap clearfix">
										<li>
											<div class="form-group">
												<?php /* onchange="$('#systemId').val(this.value)" */  ?>
												<select class="selectpicker"  id="search_options">
													<option value="uid">User ID</option>
													<option value="male">Male Only</option>
													<option value="female">Female Only</option>
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
				<!--			<div class="col-lg-7">
					   			<div class="">
					   				<ul class="power-nav clearfix">
					   					<li><a href="power-search.php?online">Promote all</a></li>
						   				<li><a href="power-search.php?new-user">Visit all</a></li>
						   				<li><a href="power-search.php?deleted">Send a Message to all</a></li>
						   				<li><a href="power-search.php?no-photo">Waiting to talk to all</a></li>
						   			</ul>
					   			</div>
							</div>-->
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div class="row">
					    <div class="col-lg-12">
							<div class="pane equal">
								<div class="table-responsive">
									<table class="powersearch-table table  table-hover">
										<form id="search-form" method="post">
									    <thead>
										<tr>
										    <th>Id</th>
										    <th>Photo</th>
										    <th>Username</th>
										    <th>Age</th>
										    <th>Gender</th>
										    <th>Location</th>
										    <th>New Messages</th>
										    <th>Date Created</th>
										    <th>Admin</th>
										    <th>Action</th>
										</tr>
										<tr class="table-secnd">
										 <!--   <th></th>
										    <th>
										    	<div class="form-group power-srch">
												    <select class="selectpicker  default" name="search_profile_status">
														<option value="">All</option>
														<option value="1">ON</option>
														<option value="2">OFF</option>
													</select>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												     /*/* <select class="selectpicker  default" name="search_profile_photo">
														<option value="">All</option>
														<option value="photo">Yes</option>
														<option value="no-photo">No</option>
												    </select> */ *
												</div>
										    </th>
										    <th></th>
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
													<div class="form-group">
														<input class="form-control start-input" placeholder="location" type="text">
													</div>
												   \ /*/*<select class="selectpicker  default" name="search_gender">
														<option value="">All</option>
														<option value="male">Male</option>
														<option value="female">Female</option>
												    </select>*/ */?>
												</div>
										    </th>
										    <th>

										    </th>
										    <th></th>
										    <th>
										    	<div class="form-group power-srch">
												   \ /*/*<select class="selectpicker  default" name="search_joined">
														<option value="">All</option>
														<option value="less1day"><24 hours</option>
														<option value="less3day"><3 days</option>
														<option value="less7day"><7 days</option>
														<option value="less30day"><30 days</option>
														<option value="less3month"><3 months</option>
														<option value="greater3month">3 month</option>
												    </select> */ */?>
												</div>
										    </th>
										    <th>
										    	<div class="form-group power-srch">
												   /*/*<select class="selectpicker  default" name="search_vip">
														<option value="">All</option>
														<option value="vip">VIP</option>
														<option value="free">Free</option>
												    </select>*/ */?>
												</div>
										    </th>
										    <th>
												<ul class="cross-icon">
													<li><i class="fa fa-caret-left" aria-hidden="true"></i></li>
													<li><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></li>
												</ul>
											</th>-->
										</tr>
									    </thead>
										</form>
									    <tbody>
											<?php
											if( $epList!=0 )
											{
												while( $epListFetch = mysql_fetch_array($epList) )
												{
													//echo $epListFetch['user_id'];
													$epImg=$epObj->getEPProfile($epListFetch['user_id']);
													//print_r($epListFetch);
													?>
													<tr>
														<td><?php echo $epListFetch['user_id']; ?></td>
														<td><img src="../upload/photo/<?php echo $epImg['photo']; ?>" class="img-responsive powersearch-img"></td>
														<td><?php echo ucwords($epListFetch['user_name']); ?></td>
														<td><?php echo ( date('Y') - date('Y', strtotime($epListFetch['dob'])) ) ?></td>
														<td><?php echo ($epListFetch['gender']==1)?"Male":"Female"; ?></td>
														<td><?php echo $epListFetch['location']; ?></td>
														<td><?php $unreadMsgQuery = mysql_query("SELECT msg_id FROM sr_user_message WHERE sent_to = '".$epListFetch['user_id']."' AND is_read = 0");
															if(mysql_num_rows($unreadMsgQuery)>0)
															{
																?>
																<span class="notify_nub" id="notify_msg"><a href="javacript:void(0)" onclick='window.open("get_ep_login.php?uid=<?php echo $epListFetch['user_id']; ?>","_blank")'>
											<?php echo mysql_num_rows($unreadMsgQuery); ?>
										</a></span>
																	<?php
															}
															else
															{
																echo 0;
															}
															//echo ($unreadMsgQuery)? mysql_num_rows($unreadMsgQuery) : 0;
															?></td>
														<td><?php echo date('M d, Y',strtotime($epListFetch['created_on'])); ?></td>
														<td>Admin</td>
														<td>
															<div class="btn-group button-edit">
																<button type="button" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
																	<i class="fa fa-cog" aria-hidden="true"></i> <i class="fa fa-caret-down" aria-hidden="true"></i>
																	<span class="sr-only">Toggle Dropdown</span>
																</button>
																<ul class="dropdown-menu info right" role="menu">
																<li><a href="edit-ep-profile.php?uid=<?php echo $epListFetch['user_id'] ?>">View/ Edit Profile</a></li>
																<li><a href="javacript:void(0)" onclick="deleteUser('<?php echo $epListFetch['user_id'] ?>')">Delete profile </a></li>
																</ul>
															</div>
															<button type="button" onclick="window.open('interact_ep.php?uid=<?php echo $epListFetch['user_id'] ?>','_blank');" class="btn btn-info btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Interact</button>
														</td>
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
					</div>
							 
					<nav><p class="searchPagination"></p></nav>
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
</div>

<script src="assets/js/bootpag.min.js"></script>	
<script type="text/javascript">
	function deleteUser(userid)
	{
		if(confirm("Are you sure you want to delete this profile?")){
			var data = 'action=deleteProfile & userid='+userid;
			$.ajax({
				type: 'post',
				url: 'ajax/entertainment.php',
				data: data,
				success: function(result){
					if( result==1 )
					{
						$("#create_ep_err").html("Profile deleted successfully").css('color', 'green');
						setTimeout(function(){ window.location.href = 'ep-user-list.php'; }, 5000);	//1 sec
						//	$("#ep_form").reset();
					}
					else
					{
						$("#create_ep_err").html("Network error. Please try later");
					}
				}
			});
		}
		else{
			return false;
		}
	}
$(function()
{
	var searchType ='<?php echo $searchType;?>';
	
	$("#search_result_div").load("search-pagination.php", {'searchType':searchType});
	$(".searchPagination").bootpag({
		total: '<?php echo $pages;?>',
		page: 1, 
		maxVisible: 5 
	}).on("page", function(e, num){
		e.preventDefault();
		//$('#preloader').show();
		$("#search_result_div").load("search-pagination.php", {'page':num , 'searchType':searchType});
		//$('#preloader').hide();
	});
});
</script>
	<script>
		$('.selectpicker').selectpicker({
						size: 3
		});
		$('#search_options').on('change',function(){
			//alert('hi');
			if($(this).val()=='uid')
			{
				$('#systemId').prop('readonly',false);
			}
			else
			{
				$('#systemId').prop('readonly',true);
			}
		});
	</script>
</body>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>