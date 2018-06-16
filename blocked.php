<?php 
require('classes/profile_class.php');
$page='blocked';
$userProfileObj=new Profile();

require_once('include/header.php');

$blockUserArray = $userProfileObj->getBlockUser($user_id); 
$blockCount = count($blockUserArray);

?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Blocked</title>
	
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
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
					<?php include('include/promotion-panel.php');?>
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="row">
										<div class="profile_view rated margin-b20">
											<h3 class="margin-b20 margin-t10">People You have blocked</h3>
												<div class="content-1 margin-b20">
													<div class="thumb-like raising"><img src="images/icon-blocked.png" /></div>
													<div class="thumb-like-content padding-l20">
														<p>When you block someone on Startrishta, they cannot contact you.You can <br/>unblock them at any time if you choose to.</p>
													</div>
												</div>
												<input type="hidden" value="<?php echo $blockCount ;?>" id="blockCount" />
												<?php
													foreach($blockUserArray as $blockResult){
													$vipClass = '';
													$isUserVip = $userProfileObj->isVipMember($blockResult['user_id']);
													if($isUserVip) $vipClass = 'vip';
													$userReputation = $userProfileObj->getUserReputation($blockResult['user_id']);
													if($userReputation <= 40 ) $reputation='Low';
													if($userReputation > 40 && $userReputation <= 60) $reputation='Heating Up';
													if($userReputation > 60 && $userReputation <= 80) $reputation='Hot';
													if($userReputation > 80) $reputation='Very Hot';
													$isUserFavorite = $userProfileObj->isUserFavorite($blockResult['user_id'] , $user_id);
													$statusIconHtml =$userProfileObj->getStatusIconHtml($blockResult['user_id'], $blockResult['gender'] ,$reputation , $isUserFavorite , $isUserVip);
													$diff = time() - strtotime($blockResult['block_on']);
													$dayDiff = floor($diff / 86400);
												?>
										<div class="rated_sec visitor_profile <?php echo $vipClass;?>" id="favDiv-<?php echo $blockResult['user_id'];?>">
											<div>
												<div class="user_pic" style="position:relative;">
													<!--<a href="profile.php?uid=<?php echo $blockResult['user_id'];?>">-->
													<a href="javascript:void(0);" style="cursor:default;">
														<img src="<?php echo $userProfileObj->getProfileImage($blockResult['profile_image']) ;?>"/>	
													</a>
													<span class="online_user-2">
														<img src="images/online.png">
													</span>
													<div class="check_box msg_pro_chk my-pro-check"  style="display:none;">
														<div class="pull-left">
															<input type="checkbox" name="blockCheckbox" class="blockCheckbox my-check"  id="blockCheckbox-<?php echo $blockResult['user_id'];?>" value="<?php echo $blockResult['user_id'];?>"/>
															<label for="blockCheckbox-<?php echo $blockResult['user_id'];?>" class="my-label"><span class="pull-left"></span></label>
														</div>
													</div>
												</div>
												<div class="user_rating">
													<div class="name margin-t15">
														<span>
															<a href="profile.php?uid=<?php echo $blockResult['user_id'];?>" class="nm">
																<?php echo $blockResult['user_name'];?>,</a>
														</span>
														<span>
															<a href="javascript:void(0)" class="age">
																<?php echo (date("Y") - date("Y" , strtotime($blockResult['dob'])));?>,</a>
														</span>
														<span>
															<a href="javascript:void(0)" class="loc"><?php echo $blockResult['location'];?></a>
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
																<li class="message_now" id="message_now-<?php echo $blockResult['user_id'];?>">
																	<a href="javascript:void(0)">
																		<span class="msg"></span> Message History
																	</a>
																</li>
																<li> 
																	<a href="javascript:void(0);" class="unblockUser" id="unblockUser-<?php echo $blockResult['user_id'];?>-<?php echo $blockResult['user_name'];?>">
																		<!--<span class="dlt"></span>Unblock-->
																		<span class="blk"></span>Unblock
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
											<?php if($blockCount != 0){?>
											<div class="rs edit" id="block-edit">
												<div id="edit">
													<span><a href="javascript:void(0);"> <i class="fa fa-pencil"></i> Edit</a></span>
												</div>
												<div id="delet">
													<span class="" id="cancle"><a href="javascript:void(0);">Cancel</a></span>
													<span class="margin-r10"><a href="javascript:void(0);" id="unblockSelected"><!--<span class="blk unblock"></span>--> Unblock Selected</a></span>
													
													<div class="select_all" id="select_all">
														<form>
															<div>
																<div class="radio my-radio">
																	<div class="select"><b>Select</b></div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="selectAllBlock" class="my-radio">
																		<label for="selectAllBlock"><span><span></span></span>All</label>
																	</div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="unselectAllBlock" class="my-radio">
																		<label for="unselectAllBlock"><span><span></span></span>None</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php } ?>
											<?php if($blockCount == 1){ ?>
												<div class="align-c rs_bg_last" id="blockCount2"><?php echo $blockCount;?> Person found</div>
											<?php }else{ ?>
												<div class="align-c rs_bg_last" id="blockCount2"><?php echo $blockCount;?> People found</div>
											<?php } ?>
											
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
		$('.unblockUser').click(function(){
			$('#preloader').show();
			var ID = $(this).attr('id').split('-');
			var user_id=ID[1];
			var user_name=ID[2];
			var count = $('#blockCount').val();
			$.ajax({
				type:"POST",
				url:"ajax/block.php",
				data:{block_uid:user_id , action:'unblockUser'},
				success:function(result){
					if(result!=0){
						$('#favDiv-'+user_id).remove();
						var fcount = parseInt(parseInt(count)-1);
						$('#blockCount').val(fcount);
						$('#blockCount1').html(fcount);
						$('#blockCount2').html(fcount +' people found');
						if(fcount == 0){
							$('#block-edit').hide();
						}
						$("#user-unblock-msg").html(user_name);
						$('#user-unblock-modal').modal('show');
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
		//#################DELECT ALL FAVORITES##########################
		$("#selectAllBlock").live('click' ,function () {
			$(".blockCheckbox").each(function(){
				this.checked = true;
			});
		});
		$("#unselectAllBlock").live('click' ,function () {
			$(".blockCheckbox").each(function(){
				this.checked = false;
			});
		});
		$("#unblockSelected").live('click' ,function () {
			if($("input[name='blockCheckbox']:checked").length==0){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select atleast one user.');
				$('#alert_modal').modal('show');
				return false;
			}
			var userIds = [];
			$("input[name='blockCheckbox']:checked").each(function() {
				userIds.push($(this).val());
			});
			$.ajax({
				type:"POST",
				url:"ajax/block.php",
				data:{action:'unblockAllUser' , userIds:userIds},
				success:function(result){
					if(result==1){
						window.location.href="blocked.php";
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