<?php 
include('classes/adminClass.php');
$adminObj = new Admin();
$userId = $_GET['uid'];
$newPhotosArray=$adminObj->getNewPhotos();

?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | New Photos</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

		<link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet"> 

		<link href="vendor/plugins/form/bootstrap-select/bootstrap-select.css" rel="stylesheet">
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	<link href="assets/css/prettyPhoto.css" rel="stylesheet">

	
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
				<div class="col-lg-9">
				<div class="drag-drop dash-main" id="refreshPhotoId">
					<div class="row-10">
						<h5> New Photos <span style="color:#ff0000;">(<?php echo count($newPhotosArray); ?>)</span></h5>
						<div class="clearfix"></div>	
					</div>
					<div class="clearfix"></div>
						<ul class="clearfix gallery new-interest">
							<?php 
							foreach( $newPhotosArray as $newPhoto )
							{
								$userInfo = $adminObj->getUserInfo($newPhoto['user_id']);
								?>
								<li id="photoDiv-<?php echo $newPhoto['photo_id'];?>">
									<ul class="clearfix hide-show">
										<li>
											<div class="photo-top-wap" title="Click here to view details" onclick="window.location.href='power-search.php?id=<?php echo $userInfo['user_id']; ?>'" ><div><span class="photo-t-t">User ID:</span> <?php echo $userInfo['user_id']; ?></div>  
											<div><span class="photo-t-t">Username:</span> <?php echo ucwords($userInfo['user_name']); ?></div>
											<div><span class="photo-t-t">Uploaded:</span> <?php echo date('d/m/Y', strtotime($userInfo['created_on'])); ?> at <?php echo date('g:i', strtotime($userInfo['created_on'])); ?> GMT</div></div>
											<a href="javascript:void(0);" rel="prettyPhoto[gallery1]" >
												<img src="<?php echo $adminObj->getProfileImage($newPhoto['photo']);?>" class="img-responsive" />
											</a>
										</li>
										<li>
											<ul class="interest-phpto">
												<li>
													<div class="radio1 green">
														<button class="apprive-btn 1" value="<?php echo $newPhoto['photo_id'];?>" name="flag" id="user-<?php echo $newPhoto['user_id'];?>" style="background-color:#5CBA24; width:70px; border-radius:4px; color:#fff; border:1px solid #50A81C;">Approve</button>
													</div>
												</li>
												<li>
													<div class="radio1 green">
														<button class="reject-btn 2" value="<?php echo $newPhoto['photo_id'];?>" name="flag" id="user-<?php echo $newPhoto['user_id'];?>" style="background-color:#E72E2E;width:70px;border-radius:4px; color:#fff;border:1px solid #D22020;">Reject</button>
													</div>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<?php 
							} 
							?>
						</ul>
					
					</div>
					</div>
				
				
				<?php #Get Last Two Approved Photos 
				$getLastTwoApprovedPhotos = $adminObj->getLastApprovedPhotos(2);
				if( $getLastTwoApprovedPhotos!=0 )
				{
					?>
					<div class="col-lg-3 col-md-3">
						<div id="sticky-anchor"></div>
						<div class="photo-right-wap" id="sticky">
							<div class="photo-right-t">Previous Approved Photo</div>
							<div class="photo-right-img" id="prev-app-ph" >
								<?php
								while( $getLastTwoApprovedPhotosFetch = mysql_fetch_array($getLastTwoApprovedPhotos) )
								{
									$userInfo = $adminObj->getUserInfo($getLastTwoApprovedPhotosFetch['user_id']);
									?>
									<div class="img-wap-photo">
										<div class="img-undo-btn" id="undo-<?php echo $getLastTwoApprovedPhotosFetch['photo_id'];?>" ><a href="javascript:void(0);">Undo</a></div>
										<input type="hidden" value="<?php echo $userInfo['user_id']; ?>" id="user-undo" />
										<img src="<?php echo $adminObj->getProfileImage($getLastTwoApprovedPhotosFetch['photo']); ?>" class="img-responsive" />
										<div class="photo-top-wap" title="Click here to view details" onclick="window.location.href='power-search.php?id=<?php echo $userInfo['user_id']; ?>'" >
											<div><span class="photo-t-t">User ID:</span> <?php echo $userInfo['user_id']; ?></div>
											<div><span class="photo-t-t">Username:</span> <?php echo ucwords($userInfo['user_name']); ?></div>
											<div><span class="photo-t-t">Uploaded:</span> <?php echo date('d/m/Y', strtotime($userInfo['created_on'])); ?> at <?php echo date('g:i', strtotime($userInfo['created_on'])); ?> GMT</div>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<?php
				}
				#Get Last Two Approved Photos End 
				?>
				
				
			</div><!-- container-fluid -->
		</div><!-- content -->
   	</div><!-- main -->
	<!-- /MAIN  -->
</div><!-- wrapper -->
	
		
		
	<?php include("include/foot.php"); ?>
	<!--credits modal-->
		
	</div>
</div>
<script type="text/javascript">
/*$(document).ready(function(){
					$("area[rel^='prettyPhoto']").prettyPhoto();
					
					$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
					$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
			
					$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
						custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
						changepicturecallback: function(){ initialize(); }
					});

					$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
						custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
						changepicturecallback: function(){ _bsap.exec(); }
					});

//slide dropdown


				});
 				$(document).ready(function() {
						$("label.open-drop").click(function(){
						    $(this).closest("ul.hide-show").siblings(".slide-drop").slideToggle();
						});
				  });

	    "use strict";
	    $(document).ready(function() {
		//ICHECK
		$('.blue input').iCheck({
		    checkboxClass: 'icheckbox_square-blue',
		    radioClass: 'iradio_square-blue',
		});
		
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
		
		//AUTONUMERIC
		jQuery(function($) {
		    $('.autonumeric').autoNumeric('init');
		});
		
		//ICHECK
		
		
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
		*/
	</script>

<script type="text/javascript" charset="utf-8">

function refreshRightDiv()
{
	$.ajax({
		type: "Post",
		url: "ajax/report.php",
		data: {action: "refreshApprovedPhotosDiv"},
		success: function(result)
		{
			$("#prev-app-ph").html(result);
		}
	})
}


$(function(){
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
					//console.log(result);
					$('#photoDiv-'+photo_id).hide();
					refreshRightDiv();
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
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please select reason.');
			$('#alert_modal').modal('show');
			return false;
		}
		else if( reason == 'Other' && description=='' )
		{
			$('#error_message_header').html('Alert');
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
					$('#photoDiv-'+photo_id).hide();
				}
				else if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
	
	//Undo Photo
	$("div[id^='undo-']").click(function()
	{
		var photoID = $(this).attr("id").split('-');
		var userID = $("#user-undo").val();
		
		$.ajax({
			type: 'Post',
			url: 'ajax/report.php',
			data: {action: 'resetPhotoStatus', photoID: photoID[1], userID: userID},
			success: function(result){
				if( result==1 )
				{
					$("div[id='undo-"+photoID[1]+"']").parent().hide();
					refreshRightDiv();
				}
			}
		});
		
		$.ajax({
		type: 'Post',
		url: 'ajax/report.php',
		data: {action: 'refreshingPhotos'},
		success: function(result){
			$("#refreshPhotoId").html(result);
		}
	});
	});
});


//Refreshing photos
var photos_ajax = function() {
	$.ajax({
		type: 'Post',
		url: 'ajax/report.php',
		data: {action: 'refreshingPhotos'},
		success: function(result){
			$("#refreshPhotoId").html(result);
		}
	});
};

var interval = 100 * 60 * 0.5; // where X is your every X minutes
setInterval(photos_ajax, interval);
</script>
		
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
<script>

function sticky_relocate() {
    var window_top = $(window).scrollTop();
    var div_top = $('#sticky-anchor').offset().top;
    if (window_top > div_top) {
        $('#sticky').addClass('stick');
        $('#sticky-anchor').height($('#sticky').outerHeight());
    } else {
        $('#sticky').removeClass('stick');
        $('#sticky-anchor').height(0);
    }
}

$(function() {
    $(window).scroll(sticky_relocate);
    sticky_relocate();
});

var dir = 1;
var MIN_TOP = 300;
var MAX_TOP = 450;

function autoscroll() {
    var window_top = $(window).scrollTop() + dir;
    if (window_top >= MAX_TOP) {
        window_top = MAX_TOP;
        dir = -1;
    } else if (window_top <= MIN_TOP) {
        window_top = MIN_TOP;
        dir = 1;
    }
    $(window).scrollTop(window_top);
    window.setTimeout(autoscroll, 100);
}

</script>	
  </body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->

</html>