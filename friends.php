<?php 
require('classes/profile_class.php');
$page='friends';
$userProfileObj=new Profile();

require_once('include/header.php');

$friendsArray = $userProfileObj->getMyFriends($user_id);
$friendCount = count($friendsArray);

?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Friends</title>
	
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
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row">
									<div class="profile_view rated margin-b20">
										<h3 class="margin-b20 margin-t10">Your Friends</h3>
										<div class="content-1 margin-b20">
											<div class="thumb-like raising"><img src="images/icon-like-1.png" /></div>
											<div class="thumb-like-content padding-l20">
												<p><a href="add-friends.php" class="color-green"><b>Find your friends!</b></a></p>
												<p>Find people you know on Startrishta or invite them to join.</p>
											</div>
										</div>
										<input type="hidden" value="<?php echo $friendCount ;?>" id="favCount" />
										<?php
											foreach($friendsArray as $friend){
											$vipClass = '';
											$isUserVip = $userProfileObj->isVipMember($friend['user_id']);
											if($isUserVip) $vipClass = 'vip';
											$userReputation = $userProfileObj->getUserReputation($friend['user_id']);
											if($userReputation <= 40 ) $reputation='Low';
											if($userReputation > 40 && $userReputation <= 60) $reputation='Heating Up';
											if($userReputation > 60 && $userReputation <= 80) $reputation='Hot';
											if($userReputation > 80) $reputation='Very Hot';
											$isUserFavorite = $userProfileObj->isUserFavorite($friend['user_id'] , $user_id);
											$statusIconHtml =$userProfileObj->getStatusIconHtml($friend['user_id'], $friend['gender'] ,$reputation , $isUserFavorite , $isUserVip);
											$diff = time() - strtotime($friend['created_on']);
											$dayDiff = floor($diff / 86400);
										?>
										<div class="rated_sec visitor_profile <?php echo $vipClass;?>" id="friendDiv-<?php echo $friend['user_id'];?>">
											<div>
												<div class="user_pic" style="position:relative;">
													<a href="profile.php?uid=<?php echo $friend['user_id'];?>">
														<img src="<?php echo $userProfileObj->getProfileImage($friend['profile_image']) ;?>"/>
													</a>
													<div class="check_box msg_pro_chk my-pro-check"  style="display:none;">
														<div class="pull-left">
															<input type="checkbox" name="friendCheckbox" class="friendCheckbox my-check"  id="friendCheckbox-<?php echo $friend['user_id'];?>" value="<?php echo $friend['user_id'];?>"/>
															<label for="friendCheckbox-<?php echo $friend['user_id'];?>" class="my-label"><span class="pull-left"></span></label>
														</div>
													</div>
												</div>
												<div class="user_rating margin-t20">
													<div class="name">
														<span>
															<a href="profile.php?uid=<?php echo $friend['user_id'];?>" class="nm">
																<?php echo $friend['user_name'];?>,</a>
														</span>
														<span>
															<a href="javascript:void(0)" class="age">
																<?php echo (date("Y") - date("Y" , strtotime($friend['dob'])));?>,</a>
														</span>
														<span>
															<a href="javascript:void(0)" class="loc"><?php echo $friend['location'];?></a>
														</span>
														<?php if($dayDiff == 0){?>
														<span><a href="javascript:void()" class="new">New!</a></span>
														<?php } ?>
													</div>
												</div>
												<div class="user_option">
													<div class="pull-right status">
														<ul><?php echo $statusIconHtml;?></ul>
													</div>
													<div class="popup-right-box rated">
														<div class="profile pull-right margin-t20">
														<ul>
														<li class="pull-right">  
															<a class="prof_dpdwn2 btn btn-default default slat-blue btn-pad" data-toggle="dropdown" > 
															<b><i class="fa fa-power-off"></i> Action <i class="fa fa-sort-desc"></i>
															</b></a>
															<ul class="prof_drop_dwn2 dropdown-menu">
																<li class="message_now" id="message_now-<?php echo $friend['user_id'];?>">
																	<a href="javascript:void(0)">
																		<span class="msg"></span> Message Now
																	</a>
																</li>
																<?php echo $userProfileObj->getUserActionHtml($friend['user_id'] ,$friend['user_name'] , $isUserFavorite);?>
																<li> 
																	<a href="javascript:void(0);" class="deleteFav" id="deleteFav-<?php echo $friend['user_id'];?>">
																		<span class="dlt"></span>Delete
																	</a>
																</li>
															</ul>
														</li>
														</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<?php } ?>
										<div class="rated_sec last pull-left visitor_profile">
											<?php if($friendCount != 0){?>
											<div class="rs edit" id="fav-edit">
												<div id="edit">
													<span><a href="javascript:void(0);"> <i class="fa fa-pencil"></i> Edit</a></span>
												</div>
												<div id="delet">
													<span class="" id="cancle"><a href="javascript:void(0);">Cancel</a></span>
													<span class="margin-r10"><a href="javascript:void(0);" id="deleteAllFriend"><i class="fa fa-trash-o"></i> Delete</a></span>
													
													<div class="select_all" id="select_all">
														<form>
															<div>
																<div class="radio my-radio">
																	<div class="select"><b>Select</b></div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="selectAllFriend" class="my-radio">
																		<label for="selectAllFriend"><span><span></span></span>All</label>
																	</div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="unselectAllFriend" class="my-radio">
																		<label for="unselectAllFriend"><span><span></span></span>None</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="align-c rs_bg_last"><a href="javascript:void(0);" id="friendCount1"><?php echo $friendCount;?> people found</a></div>
											<h1 class="h1">&nbsp;</h1>
										</div>	
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
		//NEW LIKE-ME PAGE
		var rh = $(".rh-height").height();
		var lh = $(".lh-height").height();
		if(lh > rh){
			$(".rh-height").height((lh)-50);
		} else{ $(".lh-height").height(rh); }
	});
	$(function(){
		$("#edit").click(function(){
			$("#delet").css("display" , "block");
			$(".my-pro-check").css("display" , "block");
			$(this).css("display" , "none");
		});
		$("#cancle").click(function(){
			$("#delet").css("display" , "none");
			$(".my-pro-check").css("display" , "none");
			$("#edit").css("display" , "block");
		});
		//####################DELETE##########################
		$('.deleteFriend').click(function(){
			$('#preloader').show();
			var ID = $(this).attr('id').split('-');
			var count = $('#friendCount').val();
			$.ajax({
				type:"POST",
				url:"ajax/Friend.php",
				data:{friend_id:ID[1] , action:'deleteFriend'},
				success:function(result){
					if(result==1){
						$('#friendDiv-'+ID[1]).remove();
						var fcount = parseInt(parseInt(count)-1);
						$('#friendCount').val(fcount);
						$('#friendCount1').html(fcount +' people found');
						if(fcount == 0){
							$('#Friend-edit').hide();
						}
					}else{
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again.');
						$('#alert_modal').modal('show');
					}
					$('#preloader').hide();
				}
			});
			return false;
		});
		//#################DELECT ALL FRIENDS##########################
		$("#selectAllFriend").live('click' ,function () {
			$(".friendCheckbox").each(function(){
				this.checked = true;
			});
		});
		$("#unselectAllFriend").live('click' ,function () {
			$(".friendCheckbox").each(function(){
				this.checked = false;
			});
		});
		$("#deleteAllFriend").live('click' ,function () {
			if($("input[name='friendCheckbox']:checked").length==0){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select atleast one user.');
				$('#alert_modal').modal('show');
				return false;
			}
			var userIds = [];
			$("input[name='friendCheckbox']:checked").each(function() {
				userIds.push($(this).val());
			});
			alert(userIds);
			$.ajax({
				type:"POST",
				url:"ajax/friend.php",
				data:{action:'deleteAllFriend' , userIds:userIds},
				success:function(result){
					if(result==1){
						window.location.href='friends.php';
					}else{
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});	
	});
</script>
</body>
</html>