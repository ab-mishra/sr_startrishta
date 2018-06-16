<?php 
require('classes/profile_class.php');
$page='profile-visitor';
$userProfileObj=new User();

require_once('include/header.php');



$addedMeFavoritesArray = $userProfileObj ->getAddedMeFavorites($user_id);
$favMeJson = json_encode($addedMeFavoritesArray);
$addedMeFavCount = count($addedMeFavoritesArray);

$myFavoritesArray = $userProfileObj->getMyFavorites($user_id); 
$myFavCount = count($myFavoritesArray);
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Favorites</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
</head>

<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
		<!--------PROMOTION PANEL--------------------->
		<?php //include('include/promotion-panel.php');?>
	
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll in">
				<div class="container">
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
			<!-----------------GET ME HERE SLIDER--------------------------------------->
			<?php include('include/header-get-me-here.php');?>
			<!-----------------GET ME HERE SLIDER END----------------------------------->
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row margin_t-60">
					<!--------------------LEFT SIDE------------------------>
						<?php include('include/profile-left-side.php');?>
					<!---------------------------------------------------------->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
							<!--------PROMOTION PANEL--------------------->
								<?php include('include/promotion-panel.php');?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row m-right_0">
									<div class="profile_view rated margin-b20 rh-height">
									<!--############################FIND FRIEND SECTION#####################-->	
										<div class="fav_container">
											<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<div class="content-1 margin-b20">
												<div class="thumb-like raising"><img src="images/icon-like-1.png" /></div>
												<div class="thumb-like-content padding-l20">
													<p><a href="friends.php" class="color-green"><b>Find your friends!</b></a> </p>
													<p>Find people you know on Startrishta or invite them to join.</p>
												</div>
											</div>
											<div class="clearfix"></div>
										</div>
										
										
										<div class="invite_container">
											<div class="invite_container_inner">
												<a href=""><img src="images/gmail.png" class="img-responsive" /></a>
											</div>
											<div class="invite_container_inner">
												<a href=""><img src="images/outlook.png" class="img-responsive" /></a>
											</div>
											<div class="invite_container_inner">
												<a href=""><img src="images/hotmail.png" class="img-responsive" /></a>
											</div>
											<div class="invite_container_inner">
												<a href=""><img src="images/yahoo.png" class="img-responsive" /></a>
											</div>
											<div class="clearfix"></div>
										</div>
										<h4 class="align-c margin-t20 h4-1"><span class="ornage_text">Limited Promotion </span>– for every friend that joins get rewarded with 1 day <br> free VIP membership!</h4>
										<p class="align-c margin-t20">By using this service, you give Startrishta permission to import your email contacts.<br> 
										All your email contacts will be stored securely and not shared with any third party.</p>

										<!--############################End FIND FRIEND SECTION####################-->	
										<!--############################NO FRIEND SECTION####################-->	
										<h3 class="margin-b20 margin-t10 favorit">Find Your Friends</h3>
											<div class="invite_container align-c"> <img src="images/warning_icon.png"></div>
											<h4 class="align-c margin-t20">Sorry</h4>
											<p class="align-c margin-t20">We can’t find your friends in your Gmail account.<br>Why not try another account?</p>
											<p class="align-c margin-t20"><a href="" class="btn btn-danger bold" style="width:200px; margin:0 auto; height:35px; border:0;">Try another account</a></p>
											
										<!--############################End No FRIEND SECTION####################-->	
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---------------------------------------------------------->
					</div>
				</div>
			</div>
		<!--Main Container end here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
		</div>
	</div>
	
<!--###############################VIP MODAL######################################-->
<div id="go_vip_pay" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-vip">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Upgrade to a VIP membership to find out who has liked your profile!</b></h4>
					</div>
					
					<div class="modal-body">
						<div class="vip-right-box-1">
							<br>
							<h4 class=""><b>Vip Member Benefits</b></h4>
							
							<ul class="margin-t15 go_vip_pay_benefits">
								<li>
									<a href="#"><img src="images/icon-15.png"> &nbsp; <b>Message Boots </b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-14.png"> &nbsp; <b>See who likes you</b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-13.png"> &nbsp; <b>Talk to the Hottest People</b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-12.png"> &nbsp; <b>Add as a Favourite</b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-11.png"> &nbsp; <b>Sttealth mode  </b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-10.png"> &nbsp; <b>Profile Customisation</b></a>
								</li>
								<li>
									<a href="#"><img src="images/icon-9.png"> &nbsp; <b>Chat to new Members First</b></a>
								</li>
								
							</ul>
						</div>
						
						<div class="vip-left-box">
							<ul class="vip-pay">
								<li >
									<a data-rel="#seven"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
								</li>
								<li class="active">
									<a data-rel="#eight" href="#"><img src="images/icon.jpg" />Paypal Account</a>
								</li>
							</ul>
							<div id="eight" class="active_pane vip-left-box-container paypal">
								<div class="vip-container1">
									<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
									<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>
									<br>
									<div class="relative">
										<div class="filter1 margin-l90 margin-b15">
											<!--new-->
											<div class="form-group">
												<input class="ploc_input" type="hidden" value="">
												<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
												<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
												<div class="clearfix"></div>
												<ul class="p_locations clearfix fontawesome-select">
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>
									
									<div class="relative">
										<div class="filter1 margin-l90 margin-b15">
											<!--new-->
											<div class="form-group">
												<input class="ploc_input" type="hidden" value="">
												<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
												<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
												<div class="clearfix"></div>
												<ul class="p_locations clearfix fontawesome-select">
													<li class="p_location">
														<a href="#">
															 &nbsp; 1 Month 1254/m  US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; 1 Month 1054/m  US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; 1 Month 854/m  US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>	
									<div class="pay-btn margin-l150"></div>
									<br>
									<p class="margin-t50 align-c text-normal text-13"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
									<p class="align-c text-normal text-13">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>
								</div>
								<div class="pay-footer">
									<hr>
									<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
								</div>
							</div>
							
							<!--credit card-->
							
							<div id="seven" class="vip-left-box-container credit-card">
								<div class="vip-container1">
									<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
									<br>
									<div class="relative">
										<div class="filter1 margin-l90 margin-b15">
											<!--new-->
											<div class="form-group">
												<input class="ploc_input" type="hidden" value="">
												<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
												<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
												<div class="clearfix"></div>
												<ul class="p_locations clearfix fontawesome-select">
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>
									
									<div class="relative">
										<div class="filter1 margin-l90 margin-b15">
											<!--new-->
											<div class="form-group">
												<input class="ploc_input" type="hidden" value="">
												<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
												<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
												<div class="clearfix"></div>
												<ul class="p_locations clearfix fontawesome-select">
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>	
									<div class="pay-btn margin-l150"></div>
								</div>
								<div class="pay-footer">
									<hr>
									<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#" class="color-green">Service conditions</a></p>
								</div>
							</div>
							<!--end of credit card-->
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(window).load(function(){
			//NEW LIKE-ME PAGE
			var rh = $(".rh-height").height();
			var lh = $(".lh-height").height();
			if(lh > rh){
				$(".rh-height").height((lh)-50);
			} else{ $(".lh-height").height(rh); }
		});
	</script>
	<script>
	
	
	
var favMeJson = '<?php echo $favMeJson; ?>';
//alert(likeMeJson);

var favMeArray = jQuery.parseJSON(favMeJson);
var i;
var j;
var len = favMeArray.length;
var play = false;
var ctx = [];
var img = [];
var w = [];
var h = [];
	
for(i=0 ; i<len ; i++){

	var canvasId = '#canvas'+favMeArray[i]['user_id'];

	ctx[i] = $(""+canvasId+"")[0].getContext('2d');
	
	img[i] = new Image();

	ctx[i].mozImageSmoothingEnabled = false;
	ctx[i].webkitImageSmoothingEnabled = false;
	ctx[i].imageSmoothingEnabled = false;

	img[i].onload = pixelate;

	img[i].src = "upload/photo/"+favMeArray[i]['profile_image'];
}

function pixelate() {

	var size = 0.08;

	for(j=0 ; j<len ; j++){
		var canvasId = '#canvas'+favMeArray[j]['user_id'];
		w = $(""+canvasId+"")[0].width * size,
		h = $(""+canvasId+"")[0].height * size;
		
		ctx[j].drawImage(img[j], 0, 0, w, h);

		ctx[j].drawImage($(""+canvasId+"")[0], 0, 0, w, h, 0, 0, $(""+canvasId+"")[0].width, $(""+canvasId+"")[0].height);
	}
}
</script>
</body>
</html>