<?php 
require('classes/profile_class.php');
$page='profile-visitor';
$userProfileObj=new Profile();

require_once('include/header.php');

$userInterestQuery = $userProfileObj->getUserInterest($user_id);
$userInterestCount=mysql_num_rows($userInterestQuery);
$VisitorArray=$userProfileObj->getProfileVisitor($user_id);
//var_dump($VisitorArray);
$VisitorCount=count($VisitorArray);

/*
if(isset($_SESSION['http_refer'])){
	if(isset($_SERVER['HTTP_REFERER'])){
		if($_SERVER['HTTP_REFERER'] != 'http://localhost/start-rishta/profile-visitor.php'){
			$http_path = $_SESSION['http_refer'] = $_SERVER['HTTP_REFERER'];
		}else{
			$http_path = $_SESSION['http_refer'];
		}
	}else{
		$http_path = $_SESSION['http_refer'];
	}
}else{
	$http_path = $_SESSION['http_refer'] = $_SERVER['HTTP_REFERER'];
}
*/
//set the seesion to identify that user is visit this page...
$_SESSION['profile_visit'] = '1';
$profile_image = $userResult['profile_image'];
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Profile Visitor</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
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
									<div class="profile_view rated margin-b20 rh-height">
										<h3 class="margin-b20 margin-t10">Your Profile Visitors</h3>
										<div class="content-1 margin-b20">
											<div class="thumb-like raising"><img src="images/raising.png" /></div>
											<div class="thumb-like-content padding-l20">
												<p class="margin-t20">Get more people to check you out by <a href="javascript:void(0);" class="color-green go-credit-raising-profile">raising your profile</a> to the top of your <br/> area's search results!</p>
											</div>
										</div>
										<input type="hidden" value="<?php echo $VisitorCount ;?>" id="visitorCount" />
									<?php 
									foreach($VisitorArray as $visitor)
									{
										$vipClass = '';
										$isUserVip = $userProfileObj->isVipMember($visitor['user_id']);
										if($isUserVip) $vipClass = 'vip';
										$visited_on = $userProfileObj->getTimeToStr($visitor['updated_on']);
										$commanInterestCount=$userProfileObj->getUserCommonInterest($user_id , $visitor['user_id']);
										$interestCount=$userProfileObj->getUserInterestCount($visitor['user_id']);
										$userReputation = $userProfileObj->getUserReputation($visitor['user_id']);
										if($userReputation <= 40 ) $reputation='Low';
										if($userReputation > 40 && $userReputation <= 60) $reputation='Heating Up';
										if($userReputation > 60 && $userReputation <= 80) $reputation='Hot';
										if($userReputation > 80) $reputation='Very Hot';
										$isUserFavorite = $userProfileObj->isUserFavorite($visitor['user_id'] , $user_id);
										$statusIconHtml =$userProfileObj->getStatusIconHtml($visitor['user_id'], $visitor['gender'] ,$reputation , $isUserFavorite , $isUserVip);
									//	print_r($visitor);
									 $diff = time() - strtotime($visitor['updated_on']);

										$dayDiff = floor($diff / 86400);

									?>		
										<div class="rated_sec visitor_profile <?php echo $vipClass;?>" id="visitorDiv-<?php echo $visitor['user_id'];?>">
											<div>
												<div class="user_pic" style="position:relative;">
													<a href="profile.php?uid=<?php echo $visitor['user_id'];?>"><img src="<?php echo $userProfileObj->getProfileImage($visitor['profile_image']);?>"/></a>
													
													<div class="check_box msg_pro_chk my-pro-check"  style="display:none;">
														<div class="pull-left">
															<input type="checkbox" name="visitorCheckbox" class="visitorCheckbox my-check"  id="visitorCheckbox-<?php echo $visitor['user_id'];?>" value="<?php echo $visitor['user_id'];?>"/>
															<label for="visitorCheckbox-<?php echo $visitor['user_id'];?>" class="my-label"><span class="pull-left"></span></label>
														</div>
													</div>
													
												</div>
												<div class="user_rating">
													<div class="name">
														<!--<input type="checkbox" name="visitorCheckbox" class="visitorCheckbox" value="<?php echo $visitor['user_id'];?>" style="opacity:1;" />-->
														
														<span><a href="profile.php?uid=<?php echo $visitor['user_id'];?>" class="nm"><?php echo $visitor['user_name']?>,</a></span>
														<span><a href="javascript:void(0)" class="age"><?php echo (date("Y") - date("Y" , strtotime($visitor['dob'])));?>,</a></span>
														<span><a href="javascript:void(0)" class="loc"><?php echo $visitor['location']?></a></span>
														<?php if($dayDiff == 0){?>

															<span><a href="javascript:void()" class="new">New!</a></span>

														<?php } else
														?>
														<span class="det">visited you <?php echo $visited_on;?></span>
														<?php if($commanInterestCount){?>
														<p class="match">
															<span> <?php echo $commanInterestCount;?> out of <?php echo $interestCount;?> interest<?php echo ($commanInterestCount>1 && $commanInterestCount!="")?"s":""; ?> matched! </span>
														</p>
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
																<i class="fa fa-power-off"></i> Action <i class="fa fa-sort-desc"></i>
																</a>
																<ul class="prof_drop_dwn2 dropdown-menu">
																	<?php echo $userProfileObj->getUserActionHtml($visitor['user_id'] ,$visitor['user_name'] , $isUserFavorite);?>
																	<li> 
																		<a href="javascript:void(0);" class="deleteVisitor" id="deleteVisitor-<?php echo $visitor['user_id'];?>">
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
											<?php if($VisitorCount != 0){?>
											<div class="rs edit" id="visitor-edit">
												<div id="edit">
													<span><a href="javascript:void(0);"> <i class="fa fa-pencil"></i> Edit</a></span>
												</div>
												<div id="delet">
													<span class="" id="cancle"><a href="javascript:void(0);">Cancel</a></span>
													<span class="margin-r10" id="delVisitor">
														<a href="javascript:void(0);" id="deleteAllVisitor"><i class="fa fa-trash-o"></i> Delete</a>
													</span>
													<div class="select_all" id="select_all">
														<form>
															<div>
																<div class="radio my-radio">
																	<div class="select"><b>Select</b></div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="selectAllVisitor" class="my-radio">
																		<label for="selectAllVisitor"><span><span></span></span>All</label>
																	</div>
																	<div class="swith_gq">
																		<input type="radio" name="option" data-rel="#general" id="unselectAllVisitor" class="my-radio">
																		<label for="unselectAllVisitor"><span><span></span></span>None</label>
																	</div>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<?php } ?>
											<div class="align-c rs_bg_last">
											<?php 
											switch($VisitorCount):
											case 0:
												echo "0 people found";
											break;
											case 1:
												echo "1 person found";
											break;
											default:
												echo $VisitorCount." people found";
											break;
											endswitch;
											?>		</div>
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
		<?php 
		require("include/footer.php"); 
		require("include/foot.php"); 
		?>
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

		var profile_image = '<?php echo $profile_image;?>';
         /*if(profile_image == ''){
			$("#addProfilePhotoModal").modal({show:true , backdrop: 'static', keyboard: false});
		}
		$('#close_modal').click(function(){
			$('#preloader').show();
			
			$.ajax({
				type:"POST",
				url:"ajax/visitor.php",
				data:{action:'closeModal'},
				success:function(result){
					$('#preloader').hide();
					window.location.href=''+http_path+''
				}
			});
			return false;
		});*/
		//####################################################
		$(".visitorCheckbox").live('click' ,function () {
			if($("input[name='visitorCheckbox']:checked").length==0){
				$('#delVisitor').children('a').css('color','#ffffff');
			}else{
				$('#delVisitor').children('a').css('color','#30bf9d');
				$("#unselectAllVisitor").prop('checked' , false);
			}
			$("#selectAllVisitor").prop('checked' , false);
		});
		//####################DELETE##########################
		$('.deleteVisitor').click(function(){
			$('#preloader').show();
			var ID = $(this).attr('id').split('-');
			var count = $('#visitorCount').val();
			$.ajax({
				type:"POST",
				url:"ajax/visitor.php",
				data:{visitor_id:ID[1] , action:'deleteVisitor'},
				success:function(result){
					if(result==1){
						$('#visitorDiv-'+ID[1]).remove();
						var vcount = parseInt(parseInt(count)-1);
						$('#visitorCount').val(vcount);
						$('#visitorCount1').html(vcount);
						$('#visitorCount2').html(vcount +' people found');
						if(vcount == 0){
							$('#visitor-edit').hide();
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
		//#################DELETE ALL VISITOR##########################
		$("#selectAllVisitor").live('click' ,function () {
			$(".visitorCheckbox").each(function(){
				this.checked = true;
			});
			$('#delVisitor').children('a').css('color','#30bf9d');
		});
		$("#unselectAllVisitor").live('click' ,function () {
			$(".visitorCheckbox").each(function(){
				this.checked = false;
			});
			$('#delVisitor').children('a').css('color','#ffffff');
		});
		$("#deleteAllVisitor").live('click' ,function () {
			if($("input[name='visitorCheckbox']:checked").length==0){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select atleast one user.');
				$('#alert_modal').modal('show');
				return false;
			}
			var userIds = [];
			$("input[name='visitorCheckbox']:checked").each(function() {
				userIds.push($(this).val());
			});
			$.ajax({
				type:"POST",
				url:"ajax/visitor.php",
				data:{action:'deleteAllVisitor' , userIds:userIds},
				success:function(result){
					if(result==1){
						window.location.href='profile-visitor.php';
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