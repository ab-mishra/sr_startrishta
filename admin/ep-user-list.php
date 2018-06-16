<?php 
include('classes/adminClass.php');
$adminObj = new Admin();

include('classes/epClass.php');
$epObj = new Entertainment();

$epList = $epObj->getEPLists();

$epMaleUser = $epObj->getEPMaleUsers();
$epFemaleUsers = $epObj->getEPFemaleUsers();

if(isset($_SESSION['current_ep']))
{
  $current_ep = $_SESSION['current_ep'];
}
echo $current_ep;
?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | EP User List</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
		<!-- Styling -->
		<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/style.css" rel="stylesheet">
		<link href="assets/css/ui.css" rel="stylesheet">
		<link href="assets/css/jquery.dataTables.min.css" rel="stylesheet">
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
					   		<h5>EP User List <a href="ep.php" class="pull-right back-btn">
					   			<span class="fa fa-arrow-left"></span>Back</a></h5>
					   			<span id="create_ep_err" style="font-weight:bold; color:#ff0000;" ></span>
							<div class="data_table">
								<table id="table_ep_user" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Photo</th>
											<th>Username</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Location</th>
											<th>New Message</th>
											<th>Date Created</th>
											<th>Admin</th>
											<th>Action</th>
										</tr>
									</thead>
									
									<tbody>
										<?php
											if( $epList!=0 )
											{
												while( $epListFetch = mysql_fetch_array($epList))
												{
													$ep_id =  $epListFetch['user_id'];

													$epImg=$epObj->getEPProfile($epListFetch['user_id']);
													$pic = SITEURL."upload/photo/200X200/".$epImg['photo'];
													//print_r($epListFetch);
													?>
													<tr id='<?php echo $epListFetch['user_id']; ?>' style="<?php if($ep_id==$current_ep){echo "background: rgba(249, 249, 119, 0.92)";} ?>">
														<td><?php echo $epListFetch['user_id']; ?></td>
														<td><img src="<?php echo $pic; ?>" class="img-responsive powersearch-img"></td>
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
						<div class="clearfix"></div>
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
<script src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	function deleteUser(userid)
	{
		var row = $(this).parent();
		//alert(row);return false;
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
						$("#"+userid).remove();
						location.reload();
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
	
<script>
$(document).ready(function() {
    $('#table_ep_user').DataTable({
        "pageLength": 25,
        "aaSorting": [[ 7, 'asc' ]]
    });
} );
	$(document).ready(function () {
	
    (function ($) {

        $('#userListFilter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});
</script>


	
</body>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
</html>