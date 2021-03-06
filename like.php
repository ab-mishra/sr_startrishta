<?php 
require('classes/profile_class.php');
$page='like';
$userProfileObj=new Profile();

require_once('include/header.php');
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Like</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
	<style>
		.button-u.send-msg-btn{width:100%; float: none;}
		.modal-footer{text-align: center;}
		.user_option ul{text-align: right; margin-bottom: 10px; margin-right: 0;}
		.user_option ul:last-child{margin-bottom: 0px;}
		.user_option ul li{float: none; display: inline-block;}
		.status{margin-top: 0;}
		.button-u>a{padding:5px 10px; background: #c9302c; margin: 0;}
		.rated_sec > div > .user_option.like1{width:216px;}

		.like-dislike ul{text-align: right;}
		.like-dislike ul li {width: auto; float: none; display: inline-block;}
		.like-dislike ul li:last-child{margin-left: 0;}
		.like-dislike ul li a{float: none; display: inline-block; width: auto;}
		.like-dislike ul li img{float: none;}
	</style>
</head>

<body class="<?php echo $CustomizeTheme; ?>">
	<div class="main-body">
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
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
						<div class="row promotion_p3">
						<!--------PROMOTION PANEL--------------------->
							<?php include('include/promotion-panel.php');?>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row m-right_0">
								<input type="hidden" value="<?php echo $userLikeCount;?>" id="likedMeCount" />
								<input type="hidden" value="" id="likeUserId" />
								<?php 
								##############################NO USER###########################
								if(!$userLikeCount){?>
									<div class="profile_view rated margin-b20 rh-height" style="height: auto;overflow-y: scroll;max-height: 800px;">
										<h3 class="margin-b20 margin-t10">People who liked you</h3>
										<div class="content-1 margin-b20">
											<div class="thumb-like raising">
												<img src="images/raising.png" />
											</div>
											<div class="thumb-like-content padding-l20">
												<p class="margin-t20">
													<a href="javascript:void(0);" class="color-green go-credit-appear-kc">Get 100 more priority displays  </a>
													in Kismat Connection to increase your chances <br/> of someone liking you!
												</p>
											</div>
										</div>
									</div>
								<?php 
								##############################VIP MEMBER######################## 
								}else if($isVipMember){
								?>
									<div class="profile_view rated margin-b20 rh-height" style="height: auto;overflow-y: scroll;max-height: 800px;">
										<h3 class="margin-b20 margin-t10">People who want to meet you</h3>
										<div class="content-1 margin-b20">
											<div class="thumb-like raising">
												<img src="images/icon-like.png" />
											</div>
											<div class="thumb-like-content padding-l20">
												<p class="margin-t20">
													<a href="javascript:void(0);" class="color-green go-credit-appear-kc">Get 100 more priority displays  </a>
													in Kismat Connection to increase your chances <br/> of someone liking you!
												</p>
											</div>
										</div>
									<?php	
									foreach($likeMeArray as $users)
									{
										$vipClass = '';
										$isUserVip = $userProfileObj->isVipMember($users['user_id']);
										if($isUserVip) $vipClass = 'vip';
										$userReputation = $userProfileObj->getUserReputation($users['user_id']);
										if($userReputation <= 40 ) $reputation='Low';
										if($userReputation > 40 && $userReputation <= 60) $reputation='Heating Up';
										if($userReputation > 60 && $userReputation <= 80) $reputation='Hot';
										if($userReputation > 80) $reputation='Very Hot';
										$isUserFavorite = $userProfileObj->isUserFavorite($users['user_id'] , $user_id);
										$statusIconHtml =$userProfileObj->getStatusIconHtml($users['user_id'], $users['gender'], $reputation, $isUserFavorite, $isUserVip);
										$isUserLiked = $userProfileObj->isUserLike($users['user_id'] , $user_id);
										$isUserLiked1 = $userProfileObj->isUserLike($user_id , $users['user_id']);
										$otherUserResult = $userProfileObj->getUserInfo($users['user_id']);
										$diff = time() - strtotime($users['liked_on']);

										$dayDiff = floor($diff / 86400);
										?>
										<div class="rated_sec <?php echo $vipClass;?> visitor_profile" id="like_user_div-<?php echo $users['user_id'];?>">
											<input type="hidden" id="matched-user-image-<?php echo $users['user_id'];?>" value="<?php echo $userProfileObj->getProfileImage($users['profile_image']);?>" />
											<input type="hidden" id="matched-user-name-<?php echo $users['user_id'];?>" value="<?php echo $users['user_name']?>" />
											<div>
												<div class="user_pic">
													<a href="profile.php?uid=<?php echo $users['user_id'];?>"><img src="<?php echo $userProfileObj->getProfileImage($users['profile_image']);?>"/></a>
												</div>
												<div class="user_rating like">
													<div class="name">
														<span><a href="profile.php?uid=<?php echo $users['user_id'];?>" class="nm"><?php echo $users['user_name']?>,</a></span>
														<span><a href="javascript:void(0)" class="age"><?php echo (date("Y") - date("Y" , strtotime($users['dob'])));?>,</a></span>
														<span><a href="javascript:void(0)" class="loc"><?php echo $users['location']?></a></span>
														<?php if($dayDiff == 0){?>

															<span><a href="javascript:void()" class="new">New!</a></span>

														<?php }
														?>
														<p class="match"><span> <?php if($users['gender'] == 1) echo 'He'; else echo 'She';?>  likes you!</span></p>
													</div>
												</div>



												<div class="user_option like1">
													<div class="pull-right status">
															<ul class="like-section margin-b">
														<ul><?php echo $statusIconHtml;?></ul>
															<li><?php
																//	print_r($isUserLiked,$isUserLiked1);
																if($isUserLiked1 == 1 && $isUserLiked == 1){?>
																<a class="match" href="javascript:void(0)"><img style="width: 30px;" src="images/match.png"/></a>

															</li>
															<li>
																<div class="button-u send-msg-btn">
																	<a href="javascript:void(0);"
					onclick="location.href='user-message.php?chat_id=<?php echo $users['user_id'];?>'" class="message_now" id="message_nowlk-<?php echo $users['user_id'];?>" class="pull-right b_red">Send <?php if($users['gender'] == 2) echo "Her";else { echo "Him";}?> a Message</a>
																</div>
															</li>
														</ul>
															<!--View Like Option-->
															<?php }else {
																if($isUserLiked !=''){
																	if($isUserLiked == 0){?>
																		<a class="disliked" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"  title="You didn't like <?php if($otherUserResult['gender'] == 2) echo "her!";else { echo "him!";}?>"><img src="images/deslike.png"/></a>
																	<?php }
																	if($isUserLiked == 1){ ?>
																		<a class="liked " href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom"  title="You liked <?php if($otherUserResult['gender'] == 2) echo "her!";else { echo "him!";}?>"><img src="images/liked.png"/></a>
																	<?php }
																}
															}
															?>
													</div>

													<?php if($isUserLiked != 1 && $isUserLiked1 != 0){?>
														<div class="like-dislike " id="like-unlike-div-<?php echo $users['user_id'];?>">
															<ul>
																<li>
																	<a href="javascript:void(0);" class="userLike" id="userLike-<?php echo $users['user_id'];?>" ><img src="images/icon002.png"><strong>Like</strong></a>
																</li>
																<li>
																	<a href="javascript:void(0);" class="userUnlike" id="userUnlike-<?php echo $users['user_id'];?>"><img src="images/icon003.png"><strong>Dislike</strong></a>
																</li>
															</ul>
														</div>
													<?php } ?>

												</div>
											</div>
										</div>
										
										<?php 
									} ?>
										<h3 class="margin-b20 margin-t30 text-center">
											<?php if($userLikeCount==1) {
												echo '1 person likes you!';
											}else{
												echo $userLikeCount.' people likes you!';
											}
											?></h3>
									</div>
								<?php 	 
								}else{
								#########################NON VIP MEMBER############################### ?>
									<div class="profile_view rated margin-b20 rh-height" style="height: auto;overflow-y: scroll;max-height: 800px;">
										<h3 class="margin-b20 margin-t10"><strong>You have people waiting to meet you!</strong></h3>
										<div class="vip_likes">
										<?php
										$likeMeJson = json_encode($likeMeArray);
										//print_r($likeMeArray);

										foreach(array_slice($likeMeArray, 0, 9) as $users){
											$diff = time() - strtotime($users['liked_on']);

											$dayDiff = floor($diff / 86400);
										?>
											<div class="vip_likes_user">
												<div class="canv">
													<div class="canv-img"><?php if($dayDiff == 0){?>

															<span><a href="javascript:void()" class="new">New!</a></span>

														<?php } ?></div>
														<canvas id="canvas<?php echo $users['user_id'];?>" width="500" height="400" ></canvas>

												</div>
												<span class="image_count">
													<i class="fa fa-camera"></i>
													<span><?php echo $userProfileObj->getPublicPhotoCount($users['user_id']);?></span>
												</span>
												<?php if($users['is_online']){?>
												<span class="online_user">
													<img src="images/online.png">
												</span>
												<?php } ?>
											</div>
										<?php } ?>
										<div class="vip_likes_user vip_likes_user1">
											<i class="fa fa-ellipsis-h fa-3x"></i>
										</div>
										</div>
										<div class="vip_likes vip_go">
											<p class="margin-b30 text-center">If you are a VIP member you can see who they are.</p>
											<h3 class="margin-b20 margin-t30 text-center">
												<?php if($userLikeCount==1) {
													echo '1 person likes you!';
												}else{
													echo $userLikeCount.' people like you!';
												}
												?></h3>
											<button class="btn go_vip btn-danger bold" id="go-vip-liked-profile" type="button" >Go VIP</button>
											<p class="text-center margin-t20 margin-b30"><a href="add-friends.php">Or try it for free!</a></p>
										</div>
										<div class="play_kismat">
											<p class="text-center">Or perhaps fate will match you if you<a class="color-green-1" href="kismat-connection.php"> play Kismat Connection!</a></p>
										</div>

									</div>
						<?php   } ?>
								</div>
							</div>
						</div>
					</div>
					<!---------------------------------------------------------->
					</div>
				</div>
			</div>
		<!--Main Container end here-->

<!-- #################################MATCHES DIV########################################## -->
<!--Match Div-->
<?php
foreach($likeMeArray as $users){?>
	<div id="matched-<?php echo $users['user_id'];?>" class="modal fade login_pop in matched_modal" role="dialog" aria-hidden="false">
		<div class="modal-dialog match">
			<div class="modal-content light-gray">
				<div>
					<div class="modal-header">
						<!--<button type="button" class="close" data-dismiss="modal">�</button>-->
						<h4><b>You found a match! </b></h4>
					</div>
					
					<div class="modal-body">
						<div class="kc_match bg_saltblue">
							<div class="identifire clearfix">
								<div><img src="<?php echo $userProfileObj->getProfileImage($userResult['profile_image']);?>" /></div>
								<div><img src="<?php echo $userProfileObj->getProfileImage($users['profile_image']);?>" /></div>
								<div class="match_icon"><img src="images/match.png"/></div>
							</div>
							<div class="pull-left white full align-c margin-t30"><h3 >You found a match. <br /><?php echo $users['user_name'];?> likes you too! </h3></div>
						</div>
					</div>
					
					<div class="modal-footer text-center" >
						<div class="button-u send-msg-btn">
							<a href="javascript:void(0);" class="message_now" 
							onclick="location.href='user-message.php?chat_id=<?php echo $users['user_id'];?>'" 
							id="message_nowlk-<?php echo $users['user_id'];?>" 
							class="pull-right b_red">
							Send <?php if($users['gender'] == 2) echo "her";else { echo "him";}?> a Message</a>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

<?php } ?>

	<!--Footer start here-->
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
		<!--Footer end here-->
		</div>
	</div>
	<script>
	$(window).load(function(){
		var rh = $(".rh-height").height();
		var lh = $(".lh-height").height();
		if(lh > rh){
			$(".rh-height").height((lh)-50);
		}
		else{
			$(".lh-height").height(rh);
		}
	});
	$(function(){
		$('.userLike').click(function(){
			$('#preloader').show();
			var ID=$(this).attr('id').split('-');
			var like_user_id = ID[1];
			var user_name=$('#matched-user-name-'+like_user_id).val();
			var user_image=$('#matched-user-image-'+like_user_id).val();
			$.ajax({
				type:"POST",
				url:"ajax/other-profile.php",
				data:{action:'addtolike' ,like_user_id:like_user_id},
				success:function(result){
					$('#preloader').hide();
					if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again.');
						$('#alert_modal').modal('show');
					}else if(result == 1){
						$('#like-unlike-div-'+like_user_id).remove();
						$('#matched-user-name').html(user_name);
						$('#likeUserId').val(like_user_id);
						$('#matched-user-image').attr("src",user_image);
						$('#matched').modal('show');
					}else if(result == 3){
						$('#matched-'+like_user_id).modal('show');
					}
				}
			});
		});
		$('.userUnlike').click(function(){
			$('#preloader').show();
			var ID=$(this).attr('id').split('-');
			var unlike_user_id = ID[1];
			var count = $('#likedMeCount').val();
			$.ajax({
				type:"POST",
				url:"ajax/other-profile.php",
				data:{action:'addtounlike' ,unlike_user_id:unlike_user_id},
				success:function(result){
					if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again.');
						$('#alert_modal').modal('show');
					}else if(result == 1){
						$('#like_user_div-'+unlike_user_id).remove();
						var lcount = parseInt(parseInt(count)-1);
						$('#likedMeCount').val(lcount);
						$('#userLikeCountL').html(lcount);
					}
					$('#preloader').hide();
				}
			});
		});
		
		/***************************************************************/
		$('#message_now').click(function(){
			$('#matched').modal('hide');
			$('#preloader').show();
			$('#my-message-box').addClass('active');
			$('#message_div2').show();
			var userId=$('#likeUserId').val();
			$.ajax({
				type:"POST",
				url:"ajax/message.php",
				data:{userConverId:userId , action:'startConversation'},
				success:function(result){
					$('#preloader').hide();
					$('.onlineUserDiv').removeClass('active');
					$('#onlineUserDiv-'+userId).addClass('active');
					$('#unread-msg-count-'+userId).hide();
					$('#userChat_window').html(result);
				}
			});
			return false;
		});
	
	});
	</script>
	<script>
	
	
	
var likeMeJson = '<?php echo $likeMeJson; ?>';
//alert(likeMeJson);

var likeMeArray = jQuery.parseJSON(likeMeJson);
var i;
var j;
var len = likeMeArray.length;
var play = false;
var ctx = [];
var img = [];
var w = [];
var h = [];

for(i=0 ; i<len ; i++){

	var canvasId = '#canvas'+likeMeArray[i]['user_id'];

	ctx[i] = $(""+canvasId+"")[0].getContext('2d');
	
	img[i] = new Image();

	ctx[i].mozImageSmoothingEnabled = false;
	ctx[i].webkitImageSmoothingEnabled = false;
	ctx[i].imageSmoothingEnabled = false;

	img[i].onload = pixelate;

	img[i].src = "upload/photo/"+likeMeArray[i]['profile_image'];
}

function pixelate() {

	var size = 0.08;

	for(j=0 ; j<len ; j++){
		var canvasId = '#canvas'+likeMeArray[j]['user_id'];
		w = $(""+canvasId+"")[0].width * size,
		h = $(""+canvasId+"")[0].height * size;
		
		ctx[j].drawImage(img[j], 0, 0, w, h);

		ctx[j].drawImage($(""+canvasId+"")[0], 0, 0, w, h, 0, 0, $(""+canvasId+"")[0].width, $(""+canvasId+"")[0].height);
	}
}
</script>
</body>
</html>