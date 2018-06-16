<?php 
require('classes/photo_class.php');
require_once('classes/profile_class.php');
$page='my-photos.php';
$userProfileObj=new Photo();
$userObj=new Profile();

require_once('include/header.php');

$userInterestQuery = $userProfileObj->getUserInterest($user_id);
$userInterestCount=mysql_num_rows($userInterestQuery);
/************PHOTO OF YOU****************/
$gallery_array= array();
$gallery_query=mysql_query("Select * from  sr_user_photo where user_id='".$user_id."' and  photo_type='1' and private='0' and status<2 ORDER BY created_on DESC");
while($gallery_result = mysql_fetch_assoc($gallery_query)){
	$gallery_array[] = $gallery_result;
}

$countPhoto=mysql_num_rows($gallery_query);
/************PHOTO OF YOU AND FRIEND****************/
$friendGalleryArray= array();
$friendGalleryQuery=mysql_query("Select * from  sr_user_photo where user_id='".$user_id."' and  photo_type='2' and private='0' and status<2 ORDER BY created_on DESC");
while($friendGalleryResult = mysql_fetch_assoc($friendGalleryQuery)){
	$friendGalleryArray[] = $friendGalleryResult;
}
$friendGalleryCount=mysql_num_rows($friendGalleryQuery);
/************ PRIVATE PHOTO****************/
$privateGalleryArray= array();
$privateGalleryQuery=mysql_query("Select * from  sr_user_photo where user_id='".$user_id."' AND private='1' and status<2 ORDER BY created_on DESC");
while($privateGalleryResult = mysql_fetch_assoc($privateGalleryQuery)){
	$privateGalleryArray[] = $privateGalleryResult;
}
$privatePhotoCount=mysql_num_rows($privateGalleryQuery);
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | My Photos</title>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/script.php"); ?>
</head>
<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
		<!--PROMOTION PANE-->
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
					<div class="row margin_t-60">
						<!-- Profile left side bar -->
						<?php include("include/profile-left-side.php"); ?>
						<!-- Profile left side bar -->
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

							

							<div class="row margin-r0">
								<?php include('include/promotion-panel.php'); ?>
								<!--PROMOTION PANEL-->
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view margin-b20">
											<div class="pull-left">
												<span class="pro_name_m"><?php echo $userResult['user_name'];?>,&nbsp;</span> 
												<span class="pro_age_m"><?php echo (date(Y) - date('Y' ,strtotime($userResult['dob']))) ;?></span> 
												<!--<a href="#" class="parmot_profile"></a>-->
												<ul><?php echo $userObj->getProfilePromoteDate($user_id);?></ul>
											</div>

											<div class="pull-left">
												<div class="intest_box">
													<a href="">
														<span><?php echo $userInterestCount;?></span>
														<p>YOUR INTERESTS</p>
													</a>
												</div>
												<div class="intest_box">
													<a href="">
														<span>0</span>
														<p>YOUR FRIENDS</p>
													</a>
												</div>
												<div class="photos_btn">
													<a href="home.php">
														<i class="fa fa-eye"></i> My Profile
													</a>
												</div>
											</div>
											<div class="divider-line clearfix margin-t25"></div> 

											<!-- PHOTOS OF YOU -->
											<div class="pull-left margin-t20">
												<div class="pro_ttl">
													<span>Photos of you</span> <span class="badge"><?php echo $countPhoto; ?></span>
												</div>
												<!--<p>Only these are visible in Kismat Connection</p>-->
												<div class="photos-my-photos">
													<ul>
														<li data-target="#addMyPhotoModal" data-toggle="modal">
															<img src="images/add-p.png" class="add"/>
														</li>
														<?php 
														$iCount=1;
														foreach($gallery_array as $gallery){
															$photo_rating=0;
															$photo_id=$gallery['photo_id'];
															$photo_type=$gallery['photo_type'];
															$photo=$gallery['photo'];
															$photo_status=$gallery['status'];
															$is_profileImage=$gallery['is_profileImage'];
															$photo_rating = $userProfileObj->getPhotoAverageRating($photo_id);
															?>
															<li class="pointer">
																<input type="hidden" value="<?php echo $photo_type; ?>" id="type<?php echo $photo_id; ?>"/>
																<?php  
																$photoPath = $userProfileObj->getThumbPhotoPath($photo);
														//if($photoPath != 0){
																?>	
																<img  id="my-gallery-<?php echo $photo_id.'-'.$iCount;?>" class="my-gallery" src="<?php echo $photoPath; ?>"/>

																<a href="javascript:void(0);">
																	<?php 
																	if($photo_status == 0) {
																		echo '<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>';
																	}else if($photo_rating != 0){
																		echo $photo_rating;
																	}else {
																		echo '<i class="fa fa-clock-o"  data-toggle="tooltip" data-placement="bottom" title="Photo is currently being rated"></i>';
																	}
																	?>				 
																</a>
																<?php //} ?>
															<span class="my-photos"> 
																<a data-toggle="modal" id="editimg-<?php echo $photo_id.'-'.$iCount;?>" data-target="#imageEdit" 
																href="javascript:void(0);"><i class="fa fa-pencil pointer"></i></a>
															<?php 
															/*if($is_profileImage){?>
															<a class="not-delete-profile-photo pointer" href="javascript:void(0);" ><i class="fa fa-trash"></i></a>
															<?php }else{*/ ?>
															<a class="deletePhoto pointer" id="deletePhoto-<?php echo $photo_id;?>" href="javascript:void(0);" ><i class="fa fa-trash"></i></a>
															<?php //} ?>
														</span>
													</li>	
													<!--Pop for model popup gallery Photo-->  
													<?php include('slider/gallery.php');?>
													<!--End model popup gallery photo-->
													<?php $iCount++;
												} ?>
											</ul>
										</div>
										<ul class="add-more-photos">
											<li><?php echo $countPhoto; ?> photos</li><li> | </li>
											<li><a href="javascript:void(0);" class="color-green" data-target="#addMyPhotoModal" data-toggle="modal">Add more</a></li>
										</ul>
									</div>
									<div class="divider-line clearfix"></div>

									<!--Group PHOTO-->
									<div class="pull-left">
										<div class="pro_ttl"><span>Group Photos</span><span class="badge"><?php echo $friendGalleryCount; ?></span> 
										</div>
										<div class="photos-my-photos">
											<ul>
												<li data-target="#addGroupPhotoModal" data-toggle="modal">
													<img src="images/add-p.png" class="add"/>
												</li>
												<?php 
												$iCount=1;
												foreach($friendGalleryArray as $friendGallery){
													$friendPhotoId=$friendGallery['photo_id'];
													$friendPhotoType=$friendGallery['photo_type'];
													$groupPhoto=$friendGallery['photo'];
													$friendPhotoStatus=$friendGallery['status'];
													$friendPhotoRating = $userProfileObj->getPhotoAverageRating($friendPhotoId);
													?>
													<li class="pointer">
														<input type="hidden" value="<?php echo $friendPhotoType; ?>" id="type<?php echo $friendPhotoId; ?>"/>
														<?php  
														$groupPhotoPath = $userProfileObj->getThumbPhotoPath($groupPhoto);
														//if($photoPath != 0){
														?>	
														<img  id="my-gallery-<?php echo $friendPhotoId.'-'.$iCount;?>" class="my-gallery" src="<?php echo $groupPhotoPath; ?>"/>


														<?php 
														if($friendPhotoStatus == 0) {
															echo '<a href="javascript:void(0);"><i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i></a>';
														}
														?>				 

														<?php //} ?>
														<span class="my-photos">
															<!--<a href="javascript:void(0);" class="rotateLeft" id="rotateLeft-<?php echo $friendPhotoId.'-'.$iCount;?>"><i class="fa fa-undo pointer"></i></a>
															<a href="javascript:void(0);" class="rotateRight" id="rotateRight-<?php echo $friendPhotoId.'-'.$iCount;?>"><i class="fa fa-repeat pointer"></i></a>-->
															<a data-toggle="modal" id="editimg-<?php echo $friendPhotoId.'-'.$iCount;?>" data-target="#imageEdit" 
																href="javascript:void(0);"><i class="fa fa-pencil pointer"></i></a>
															<a class="deletePhoto pointer" id="deletePhoto-<?php echo $friendPhotoId;?>"
																href="javascript:void(0);" ><i class="fa fa-trash"></i></a>
															</span>
														</li>
														<!--Pop for model popup gallery Photo-->  
														<?php include("slider/friend-gallery.php"); ?>
														<!--End model popup gallery photo-->
														<?php $iCount++;} ?>
													</ul>
												</div>
												<ul class="add-more-photos">
													<li><?php echo $friendGalleryCount; ?> photos</li>
													<li> | </li>
													<li><a href="" class="color-green" data-target="#addGroupPhotoModal" data-toggle="modal">Add more</a></li>
													<?php if($friendGalleryCount > 0){ ?>
													<li> | </li>
													<li data-target="#makeAlbumPrivate" data-toggle="modal" class="pointer"><a class="color-green">Make Collection Private</a></li>
													<li> | </li>
													<li class="pointer deleteAlbum" data-id="deleteGroupAlbum"><a class="color-green">Delete Collection</a></li>
													<?php } ?>
												</ul>
											</div>
											<div class="divider-line clearfix"></div>
											<!--PRIVATE PHOTO-->
											<div class="pull-left">
												<div class="pro_ttl"><span>Private Photos</span><span class="badge"><?php echo $privatePhotoCount; ?></span> 
												</div>
												<div class="photos-my-photos">
													<ul>
														<li data-target="#addPrivatePhotoModal" data-toggle="modal">
															<img src="images/add-p.png" class="add"/>
														</li>
														<?php 
														$iCount=1;
														foreach($privateGalleryArray as $privateGallery){
															$privatePhotoId=$privateGallery['photo_id'];
															$privatePhotoType=$privateGallery['photo_type'];
															$privatePhoto=$privateGallery['photo'];
															$privatePhotoStatus=$privateGallery['status'];
															$privatePhotoRating = $userProfileObj->getPhotoAverageRating($privatePhotoId);
															$privatePhotoPath = $userProfileObj->getThumbPhotoPath($privatePhoto);
															if($privatePhotoPath != ''){
																?>
																<li class="pointer">
																	<li class="pointer">
																		<input type="hidden" value="<?php echo $privatePhotoType; ?>" id="type<?php echo $privatePhotoId; ?>"/>
																		<img  id="my-gallery-<?php echo $privatePhotoId.'-'.$iCount;?>" class="my-gallery" src="<?php echo $privatePhotoPath; ?>" data="<?php echo 'private';?>"/>
																		<?php 
																		if($privatePhotoStatus == 0) {
																			echo '<a href="javascript:void(0);"><i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i></a>';
																		}else if($privatePhotoRating != 0){
																			echo '<a href="javascript:void(0);">'.$privatePhotoRating.'</a>';
																		}
																//} ?>
																<span class="my-photos">
																	<!--<a href="javascript:void(0);" class="rotateLeft" id="rotateLeft-<?php echo $privatePhotoId.'-'.$iCount;?>"><i class="fa fa-undo pointer"></i></a>
																	<a href="javascript:void(0);" class="rotateRight" id="rotateRight-<?php echo $privatePhotoId.'-'.$iCount;?>"><i class="fa fa-repeat pointer"></i></a>-->
																	<a data-toggle="modal" id="editimg-<?php echo $privatePhotoId.'-'.$iCount;?>" data-target="#imageEdit" 
																		href="javascript:void(0);"><i class="fa fa-pencil pointer"></i></a>
																	<a class="deletePhoto pointer" id="deletePhoto-<?php echo $privatePhotoId;?>"
																		href="javascript:void(0);" ><i class="fa fa-trash"></i></a>
																	</span>
																</li>
																<!--Pop for model popup gallery Photo-->  
																<?php 
																include("slider/private-gallery.php");
																$iCount++;
															}
														} ?>
													</ul>
												</div>
												<ul class="add-more-photos">
													<li><?php echo $privatePhotoCount; ?> photos</li>
													<li> | </li>
													<li><a href="" class="color-green" data-target="#addPrivatePhotoModal" data-toggle="modal">Add more</a></li>
													<li> | </li>
													<?php if($privatePhotoCount > 0){ ?>
													<li class="pointer makeAlbumPublic" data-id="makeAlbumPublic">
													<a class="color-green">Make Collection Public</a></li>	
													<li> | </li>
													<li class="pointer deleteAlbum" data-id="deletePrivateAlbum"><a class="color-green">Delete Collection</a></li>
													<?php } ?>
												</ul>
											</div>
											<!-- -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Image Edit Popup -->
		<div class="modal fade" tabindex="-1" role="dialog" id="imageEdit">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title">Rotate Image</h4>
					</div>

					<div class="modal-body">
						<div class="imgRotateBox" id="imgRotateBox">
							<img id="ro-img-src" src="" alt="start rishta profile image">
							<form name="rotateform" id="rotateform" method="post" action="" onsubmit="return false" >
							<input type="hidden" value="save_rotate_photo" name="action" />
							<input type="hidden" value="" name="imgangle" id="imgangle" />
							<input type="hidden" value="" name="imgsrc" id="imgsrc" />
							<input type="hidden" value="" name="imgname" id="imgname" />
							</form>
						</div>
					</div>

					<div class="modal-footer">
						<div class="sliderImgRotate">
							<button onclick="rotateRight()"><i class="fa fa-undo"></i></button>
							<button onclick="rotateLeft()"><i class="fa fa-repeat"></i></button>
						</div>
						<button type="button" id="saverotate" class="btn btn-primary">Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->




		<!--Main Container end here-->
		<!--Footer start here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		include("include/gallery-modal.php"); 
		?>
	</div>

	<script>
		$("a[id^='editimg']").click(function(){
			var getImgId = $(this).attr("id").split("-");
			var setImg = "my-gallery-"+getImgId[1]+"-"+getImgId[2];
			var findSrc = $("#"+setImg).attr("src");
			//alert(findSrc);
			$("img[id='ro-img-src']").attr("src", findSrc);
			$("#imgsrc").val(findSrc);
			//imgname = findSrc.replace('upload/photo/200X200','');
			imgname = findSrc.replace('upload/photo/',''); // Updates by Chitra 09/10/2017
			$('#imgname').val(imgname);
		});
	</script>

	<script type="text/javascript" src="js/jQueryRotateCompressed.js"></script>
	<script type="text/javascript" src="js/photo.js"></script>
	<script>	
		function getAngle(obj) {
			var matrix = obj.css("-webkit-transform") || obj.css("-moz-transform") || obj.css("-ms-transform") || obj.css("-o-transform") ||
			obj.css("transform");
			if(matrix !== 'none') {
				var values = matrix.split('(')[1].split(')')[0].split(',');
				var a = values[0];
				var b = values[1];
				var angle = Math.round(Math.atan2(b, a) * (180/Math.PI));
			} else { var angle = 0; }
			return angle;
		}
	</script>

<!-- Rotate Image Script Start -->
	<script>
		function rotateLeft(){
			var angle = ($('#imgRotateBox img').data('angle')) || 0;
			angle += 90;
			if(angle==360)
			{
				angle=0;
			}
			//alert(angle);
			$("#imgangle").val(angle);
			$('#imgRotateBox img').css({'transform': 'rotate(' + angle + 'deg)'});
			$('#imgRotateBox img').data('angle', angle);
		}
		function rotateRight(){
			var angle = ($('#imgRotateBox img').data('angle')) || 0;
			angle -= 90;
			if(angle==-360)
			{
				angle=0;
			}
			//alert(angle);
			$("#imgangle").val(angle);
			$('#imgRotateBox img').css({'transform': 'rotate(' + angle + 'deg)'});
			$('#imgRotateBox img').data('angle', angle);
		}
		$('#saverotate').click(function(){
			$('#rotateform').submit();
		});
		$('#rotateform').submit(function(){
			var data=$('#rotateform').serialize();
			/*console.log(data);return false;*/
			$.ajax({
				type:"POST",
				url:"ajax/photo.php",
				data:data,
				success:function(result){
					/*console.log(result);return false;
					alert(result);return false;*/
					location.reload();
				}
			});
		});
	</script>
</body>
</html>