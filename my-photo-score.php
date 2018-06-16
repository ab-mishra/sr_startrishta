<?php 
require('classes/photo_class.php');
$page='average-rate';
$userProfileObj=new Photo();

require_once('include/header.php');

	$avgSum=0;
	$photoArray=array();
	/**************************************************************************/
	function getRated($rate){
		if($rate == 1){
			$rating = 'Eww';
			$color='red';
		}else if($rate == 2 || $rate == 3){
			$rating = 'Bad';
			$color='red';
		}else if($rate == 4 || $rate == 5|| $rate == 6){
			$rating = 'Ok';
			$color='orange';
		}else if($rate == 7 || $rate == 8){
			$rating = 'Good';
			$color='green';
		}else if($rate == 9 || $rate == 10){
			$rating = 'Excellent';
			$color='green';
		}else {
			$rating ='';
			$color='';
		}
		return $rating.'-'.$color;
	}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Profile</title>
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
			<!-- Startheader get me here -->
			<?php include("include/header-get-me-here.php"); ?>
			<!-- End header get me here -->
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row  margin_t-60">
						<!-- Profile left side bar -->
						  <?php include("include/profile-left-side.php"); ?>
						<!-- Profile left side bar -->
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="row promotion_p2">
							<!--------PROMOTION PANEL--------------------->
								<?php include('include/promotion-panel.php');?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row m-right_0">
										<div class="profile_view margin-b20">
										<?php 
										$photoRateQuery=mysql_query("SELECT p.photo_id , r.rating FROM sr_user_photo p , sr_photo_rating r where r.photo_id=p.photo_id AND p.user_id='".$user_id."' GROUP BY p.photo_id");
										$photoRateCount=mysql_num_rows($photoRateQuery);
										if($photoRateCount >= 3){
										?>
											<div class="pull-left">
												<div class="rating-mitter">
												<h3 class="margin-b40 margin-t10">See Who Has Rated your Photos</h3>
													<img src="images/rate-meter/rate-meter<?php echo $avgRating;?>.png"/>
													<p><strong><a href="rate-photos.php" class="color-green">Rate other people photos </a> to have your photos rated.</strong></p>
												</div>
											</div>
										<?php }else { ?>
											<div class="pull-left">
												<div class="rating-mitter">
												<h3 class="margin-b40 margin-t10">See Who Has Rated your Photos</h3>
													<img src="images/rate-meter/rate-meter0.png"/>
													<p><strong>You need 3 photos rated to get your average score.</strong></p>
													<p><strong><a href="rate-photos.php" class="color-green">Rate other people photos </a> to have your photos rated.</strong></p>
												</div>
											</div>
										<?php } ?>
											<div class="divider-line clearfix margin-t25"></div>
											
											<div class="pull-left">
												<div class="photos-my-photos">
												<?php 
												$myPhotoQuery=$userProfileObj->getMyphots($user_id);
												while($myPhotoResult=mysql_fetch_assoc($myPhotoQuery)) {
													$avgSum=0;
													$ratingQuery=mysql_query("SELECT rating FROM sr_photo_rating WHERE photo_id='".$myPhotoResult['photo_id']."'");
													while($ratingResult=mysql_fetch_assoc($ratingQuery)){
															$avgSum=$avgSum+$ratingResult['rating'];
													}
													$totalVote=mysql_num_rows($ratingQuery);
													if($totalVote > 0){
														$avgPhotoRating=round(($avgSum)/($totalVote) , 1);
													}else {
														$avgPhotoRating=0;
													}
													$rateArray=explode('-',getRated($avgPhotoRating));
												?>
													<div class="rate-my-photo">
														<div class="img-rated">
															<img src="<?php echo $userProfileObj->getPhotoPath($myPhotoResult['photo']);?>" />
															<a href="javascript:void(0);">
																<?php if($myPhotoResult['status'] == 0) {?>
																	<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>
																<?php }else if($avgPhotoRating != 0){
																		echo $avgPhotoRating;
																	}else {?>
																	<i class="fa fa-clock-o" data-toggle="tooltip" data-placement="bottom" title="You haven't rated enough people to get this picture rated yet."></i>
																<?php }
																?>	
															</a>
														</div>
														<div class="img-discription">
														<?php if($avgPhotoRating != 0){ ?>
															<p><b>Rated <cite class="<?php echo $rateArray[1];?>"><?php echo $rateArray[0];?></cite></b></p>
															<p class="text-color-info"><?php echo $totalVote;?> Votes</p>
														<?php }else { ?>
															<p><b><a href="rate-photos.php" class="color-green">Rate other people photos </a></b></p>
														<?php }?>
														</div>
													</div>
													<?php } ?>
													<div class="rate-my-photo">
														<div class="img-rated" data-target="#addMyPhotoModal" data-toggle="modal">
														<img src="images/add-p.png" class="add1"/>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
		<!--Footer start here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
		<!--Footer end here-->
	</div>
</body>
</html>