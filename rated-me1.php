<?php 
require('classes/photo_class.php');
require('classes/profile_class.php');
$page='rated-my-photos.php';
$userProfileObj=new Profile();
$photoObj=new Photo();
	if(empty($_SESSION['user_id']))
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	$user_id=$_SESSION['user_id'];
    $userResult = $userProfileObj->getUserInfo($user_id);
	$CustomizeTheme = $userProfileObj->getCustomizeTheme($user_id);
?>

<!doctype html>
<html>
<head>
	<title>Start Rista | Profile</title>
	<!--<meta name="viewport" content="width=device-width, initial-scale=1.0"/>-->
	<?php require("include/script.php"); ?>
</head>

<body>
	<div class="main-body <?php echo $CustomizeTheme;?>">
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
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
					<div class="row margin-t20">
						<!-- Profile left side bar -->
						  <?php include("include/profile-left-side.php"); ?>
						<!-- Profile left side bar -->
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view margin-b20">
											<h3 class="margin-b20 margin-t10">See Who Has Rated your Photos</h3>
											<div class="pull-left">
												<div class="content-1 margin-b20">
													<div class="thumb-like">
														<img src="images/thumb-like.png" />
													</div>
													<div class="thumb-like-content padding-l20">
														<p class="">
															To get your photos rated, you need to <a href="rate-photos.php" class="color-green">rate other people.</a>
														</p>
														<p class="">
															The more you rate, the more of your photos get rated!
														</p>
													</div>
												</div>
												<?php 
												
												$ratedMeQuery=mysql_query("SELECT p.photo_id , p.photo , u.user_id ,u.user_name , u.profile_image ,u.location , u.dob, r.rating FROM `sr_users` u , sr_user_photo p , sr_photo_rating r where u.user_id=r.rated_by AND r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating >=4 GROUP BY r.rated_by");
												$ratedMeDownQuery=mysql_query("SELECT p.photo_id , p.photo , u.user_id ,u.user_name , u.profile_image ,u.location , u.dob, r.rating FROM `sr_users` u , sr_user_photo p , sr_photo_rating r where u.user_id=r.rated_by AND r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating < 4");
												$ratedMeDownCount=mysql_num_rows($ratedMeDownQuery);
												while($ratedMeResult=mysql_fetch_assoc($ratedMeQuery)){
												?>
												<div class="content-3 margin-b20">
													<div class="rating-images-1">
														<img src="profile_images/<?php echo $ratedMeResult['profile_image'];?>" style="width:80px;height:80px;"/>
														<div class="rating-images-1-1">
															<p><span class="color-green"><b><?php echo $ratedMeResult['user_name'];?>, </b></span> <?php echo (date('Y') - date('Y' ,strtotime($ratedMeResult['dob']))).', '.$ratedMeResult['location'];?></p>
															<?php 
															$ratedPhotoQuery=mysql_query("SELECT p.photo_id , p.photo ,r.rating FROM sr_user_photo p , sr_photo_rating r where r.photo_id=p.photo_id AND p.user_id='".$user_id."' AND r.rating >=4 AND r.rated_by='".$ratedMeResult['user_id']."'");
															while($ratedPhotoResult=mysql_fetch_assoc($ratedPhotoQuery)){
															?>
															<div class="rating-images-1-2">
																<div class="rating-images-1-3">
																<p><b><?php echo $ratedPhotoResult['rating'];?></b></p>
																</div>
																<img src="doc/photo/<?php echo $ratedPhotoResult['photo'];?>" style="width:52px;height:52px;" />
															</div>
															<?php }?>
														</div>
													</div>
													<div class="rating-images-2">
														<a href="#" class="parmot_profile-00" data-toggle="tooltip" data-placement="bottom"  title="Add To Your Favourites!"></a>
														<a href="#" class="parmot_profile-01" data-toggle="tooltip" data-placement="bottom"  title="Add To Your Favourites!"></a>
														<a href="#" class="parmot_profile-02" data-toggle="tooltip" data-placement="bottom"  title="Add To Your Favourites!"></a>
														<a href="#" class="parmot_profile-03" data-toggle="tooltip" data-placement="bottom" title="Add To Your Favourites!"></a>
													</div>
													<br>
													<div class="profile pull-right margin-t20">
														<ul>
															<li> 
																<a class="prof_dpdwn4 btn btn-lg default slat-blue btn-pad"> <b> <i class="fa fa-power-off"></i> Action <i class="fa fa-sort-desc"></i></b>  </a>
																<ul class="prof_drop_dwn4 size-text">
																	<span class="arrow"></span>
																	<li>
																		<a href="#"> <i class="fa fa-comment"></i>Massage now</a>
																	</li>
																	<li>
																		<a href="#"> <i class="fa fa-star"></i>Add to Favourites</a>
																	</li>
																	<li>
																		<a href="#"> <i class="fa fa-gift"></i>Give Gift</a>
																	</li>
																	<li>
																		<a href="#"> <i class="fa fa-ban"></i>Block</a>
																	</li>
																	<li>
																		<a href="#"> <i class="fa fa-flag"></i>Report Abuse</a>
																	</li>
																	<li>
																		<a href="#"> <i class="fa fa-trash"></i>Delete</a>
																	</li>
																</ul>
															</li>
														</ul>
													</div>
												</div>
												<div class="divider-line clearfix  margin-b20"></div>
												<?php } ?>
												
											</div>
											<div class="pull-left">
												<!--  -->
												<div class="group">
													<img src="images/group.png">
												</div>
												<p class="margin-t5"><?php echo $ratedMeDownCount;?> other people rated your photos but fell outside</p>
												<p class="margin0">your search criteria or scored too low.</p>
												<!--  -->
											</div>
											
											<div class="pull-left margin-t50 margin-b50">
												<div class="edit">
													<span><a href=""> <i class="fa fa-pencil"></i> Edit</a></span>
												</div>
												<div class="edit1">
													<p class="align-c"> 3 people found </p>
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
		<?php require("include/footer.php"); ?>
		<!--Footer end here-->
	</div>
	<script>
		//action btns
		$(document).ready(function(){
			$(".prof_dpdwn2").click(function(){
				var prof_dropdown2 = $(".prof_drop_dwn2").css("display");
				if(prof_dropdown2 == 'none'){
				$(".prof_drop_dwn2").css("display","block");}
				else{
					$(".prof_drop_dwn2").css("display","none");
				}
			});
			$(".prof_dpdwn3").click(function(){
				var prof_dropdown3 = $(".prof_drop_dwn3").css("display");
				if(prof_dropdown3 == 'none'){
				$(".prof_drop_dwn3").css("display","block");}
				else{
					$(".prof_drop_dwn3").css("display","none");
				}
			});$(".prof_dpdwn4").click(function(){
				var prof_dropdown4 = $(".prof_drop_dwn4").css("display");
				if(prof_dropdown4 == 'none'){
				$(".prof_drop_dwn4").css("display","block");}
				else{
					$(".prof_drop_dwn4").css("display","none");
				}
			});
		});
	</script>
</body>
</html>