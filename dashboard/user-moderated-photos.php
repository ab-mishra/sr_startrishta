<?php 
include('classes/adminClass.php');
$adminObj=new Admin();
$userId=$_GET['uid'];
$msg='';


if(isset($_POST['delete'])){
	
	$res1 = $adminObj->deleteModeratePhoto($userId);
	if($res1){
		
		$msg='Photo deleted successfully';
		
	}else{
	
		$msg='Problem in network.Please try again';
	}
	//print_r($_POST['photoCheck']);
	
}
if(isset($_POST['unblock'])){

	$res1 = $adminObj->unblockModeratePhoto($userId);
	if($res1){
		
		$msg='Photo unblocked successfully';
		
	}else{
	
		$msg='Problem in network.Please try again';
	}
	
	
}

$userPhotoArray=$adminObj->getUserModeratePhotos($userId);
$userPhotoCount=count($userPhotoArray);


$userResult=$adminObj->getUserInfo($userId);

?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from cazylabs.com/themes-demo/quarca/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:44 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | Moderated Photos </title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">
	    
	<!-- iCheck -->
	<link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet">
	    
	<!-- Bootstrap-Select -->
	<link href="vendor/plugins/form/bootstrap-select/bootstrap-select.css" rel="stylesheet">
	
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
	
	<div class="wrapper">
	<!-- THEME OPTIONS -->
	    
	    
	<!-- HEADER -->
	    	    
	<?php  include("include/header.php"); ?>

	<!-- SIDEBAR -->
	<?php include("include/side-menu.php") ?>


	
        
	    
	<div class="messenger-wrap">
		<div class="messenger-header">
		    <a href="#" class="toggle-list"><i class="fa fa-times"></i></a>
		    <div class="friend-chat-profile clearfix online">
			<figure>
			    <img src="assets/img/uploads/profile1.jpg" class="img-circle" alt="Profile Pic">
			</figure>
			Friend Name
		    </div><!-- friend-chat-profile -->
		</div><!-- header -->
		
		
		
		<div class="messenger-footer">
		    <form class="row" id="chat-write">
			<div class="form-group col-xs-1">
			    <div class="btn-group dropup">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				    <i class="fa fa-plus"></i>
				    <span class="sr-only">Toggle Dropdown</span>
				</a>
				<ul class="dropdown-menu" role="menu">
				    <li><a href="#"><i class="fa fa-music"></i></a></li>
				    <li class="divider"></li>
				    <li><a href="#"><i class="fa fa-video-camera"></i></a></li>
				    <li class="divider"></li>
				    <li><a href="#"><i class="fa fa-image"></i></a></li>
				</ul>
			    </div><!-- chat-addons -->
			</div>
			<div class="form-group col-xs-11">
			    <textarea class="form-control" id="chatMessage" placeholder="Write message"></textarea>
			</div>
		    </form>
		</div><!-- footer -->
	    </div><!-- messenger-wrap -->
	<!-- SIDEBAR -->
	    
	<!-- MAIN -->
	    <div class="main clearfix">
	    	<!-- CONTENT -->
			<div id="content" class="">
			    <div class="container-fluid">
					<div class=" drag-drop dash-main">
						<div class="row-10">
							<strong style="color:#12a386"><?php echo $msg;?></strong>
					   		<h5 class="no-space"> User's Moderated Photos </h5>
					   	<p><a href="power-search.php" class="cgreen"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back to Power Search</a></p>
					   		<div class=" user-nid  clearfix">
					   			<ul class="">
					   				<li><img src="<?php echo $adminObj->getProfileImage($userResult['profile_image']);?>" class="img-responsive"></li>
					   				<li><strong><?php echo $userResult['user_name'];?></strong> <br /> #<?php echo $userId;?></li>
					   			</ul>
					   		</div>
					   		<div class="clearfix"></div>
                            
							<form action="" method="post">
							<ul class="clearfix pa unblck-pic">
									<li class="pull-left">
										<button type="submit" class="btn btn-photo-green" name="unblock">Unblock Selected Photos</button>
									</li>
									<li class="pull-left">
										<button type="submit" class="btn btn-photo-green" name="delete">Delete Entirely</button>
									</li>
                            </ul>
							<div class="col-sm-12">
								<ul class="img-listing">
								
												
							<?php foreach($userPhotoArray as $userPhotoResult){?>	
								
									<li>
										<ul class="image-moderated clearfix"> 
											<li> 
												<div class="checkbox scheck green">
												    <label>
													<input type="checkbox" name="photoCheck[]" value="<?php echo $userPhotoResult['photo_id'];?>">
												    </label>
												</div>
											</li>
											<li>
												<img src="<?php echo $adminObj->getProfileImage($userPhotoResult['photo']);?>" class="img-responsive"/>
											</li>
										</ul>
									</li>
								   
								<?php } ?>
							</ul>
							</form>
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
	
	<?php  include("include/foot.php"); ?>
	
	<script type="text/javascript">
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
	</script>
	
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60863013-1', 'auto');
  ga('send', 'pageview');

</script>
    </body>

<!-- Mirrored from cazylabs.com/themes-demo/quarca/form-elements.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:49 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
