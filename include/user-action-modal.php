<!--**********************FAVOURITE *************************************-->
<div id="user-fav-modal" class="modal fade login_pop" role="dialog" style="z-index:10000;">
	<div class="modal-dialog-1">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Congratulations!</b></h4>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="popup_add_photo">
						</div>
						<div>
							<h5 class="align-c lh-20"><b><span id="user-fav-msg"></span> is now added to your <a href="javascript:void(0);">Favorites list</a></b></h5>
						</div>
						<div class="popup_add_photo margin-t20">
							<button class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="user-unfav-modal" class="modal fade login_pop" role="dialog" style="z-index:10000;">
	<div class="modal-dialog-1">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<!--<h4><b>Congratulations!</b></h4>-->
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="popup_add_photo">
						</div>
						<div>
							<h5 class="align-c lh-20"><b><span id="user-unfav-msg"></span> has been removed from your Favorites list</b></h5>
						</div>
						<div class="popup_add_photo margin-t20">
							<button class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- for my message module -->
<div id="msg-user-fav-modal" class="modal fade login_pop" role="dialog" style="z-index:10000;">
	<div class="modal-dialog-1">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Congratulations!</b></h4>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="popup_add_photo">
						</div>
						<div>
							<h5 class="align-c lh-20"><b><span id="msg-user-fav-msg"></span> is now added to your <a href="javascript:void(0);" onclick="location.href = 'favorites-main.php';">Favorites list</a></b></h5>
						</div>
						<div class="popup_add_photo margin-t20">
							<button id="fav-done" data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">Done</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	
<!--**********************BLOCK *************************************-->
<div id="user-block-modal" class="modal fade login_pop" role="dialog"style="z-index:10000;" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Member blocked</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b><span id="user-block-msg"></span> is now in your blocked list.</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href=""  data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">Done</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<div id="user-unblock-modal" class="modal fade login_pop" role="dialog"style="z-index:10000;" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Member unblocked</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b>You have removed <span id="user-unblock-msg"></span> from your blocked list.</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">OK</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--################################REPORT USER################################-->
	<div id="report-abuse-modal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Report Abuse</b></h3>
					</div>
					<div class="modal-body">
						<form class="login-form" method="post" action="">
							<div class="popup_add_photo"></div>
							<div class="swith_gq report">
								<input type="radio" value="Personal abuse" name="reportReason" data-rel="#personal" id="abuse1" value="Personal abuse">
								<label for="abuse1"><span class="left"><span></span></span><p class="left">Personal abuse</p></label>
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Threatening behaviour" name="reportReason" data-rel="#threatening" id="abuse2" value="Threatening behaviour">
								<label for="abuse2"><span class="left"><span></span></span><p class="left">Threatening behaviour</p></label>
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Inappropriate photo" name="reportReason" data-rel="#inappropriate" id="abuse3" value="Inappropriate photo">
								<label for="abuse3"><span class="left"><span></span></span><p class="left">Inappropriate photo</p></label>
							</div>
							<div class="swith_gq report">
								<input type="radio" value="Other" name="reportReason" data-rel="#other" id="abuse4" value="Other">
								<label for="abuse4"><span class="left"><span></span></span><p class="left">Other</p></label>
							</div>
							<div class="report">
								<textarea id="reportUserTextarea" maxlength='1000'></textarea>
								<div class="word_count"><span id="count_reportUser">0</span>/1000</div>
							</div>
							<div class="swith_gq report">
								<input type="checkbox" value="1" name="reportBlockUser" id="reportBlockUser">
								<label for="reportBlockUser">
									<span class="pull-left"></span>
									<p class="pull-left font_s16">Block user</p>
								</label>
							</div>
							<div class="photo_cmnt_btn report margin-t5 clearfix">
								<a href="javascript:void(0);" id="reportUserSubmit" class="btn btn-default padding-lr-40 custom red">Submit</a>
								<span class="pull-right"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);" data-dismiss="modal">Cancel</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="report-succuss-modal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Thank You</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo"></div>
							<div>
							<h5 class="align-c lh-20"><b>  We've received your report and will review it as soon as we can. If we find the user is in violation of our policies we will take direct action.</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">OK </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--################################GIFT################################-->

	<div id="gift-modal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content light-gray">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Choose the perfect gift to give today! </b></h4>
					</div>
					
					<div class="modal-body">
						<span class="login-form">
						
							<div class="pull-left">
								<div class="popup_gifts">
									<ul>
										<?php 
										$giftQuery=$userProfileObj->getGifts();
										while($giftResult = mysql_fetch_object($giftQuery)){
										?>
											<li class="gift_box" id="gift_box-<?php echo $giftResult->gift_id;?>" >
												<a href="javascript:void(0);">
													<img src="images/<?php echo $giftResult->gift;?>"/>
												</a>
											</li>
										<?php } ?>
									</ul>
									<input type="hidden" id="gift_id" value="" />
								</div>
							</div>
							<div class="pull-left">
								<form class="gifts_frm">
									<label><img src="<?php echo $userProfileImage;?>"></label>
									<textarea placeholder="Add a short message (optional)" id="gift_msg" maxlength='70'></textarea>
								</form>
								<div class="pull-left remine_me_foot">
									<div class="pull-left remm_me">
										<input type="checkbox" name="private" id="private"><label for="private"><span class="pull-left"></span><p class="pull-left font_s16">Make this gift private</p></label>
									</div>
									<span class="pull-right" id="count_gift">0/70</span>
								</div>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" id="give_gift">Give Gift</a>
							</div>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="gift-success-modal" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Congratulations!</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo"></div>
							<div>
							<h5 class="align-c lh-20"><b>Your gift will appear shortly on their profile page</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);"  data-dismiss="modal" class="btn btn-default padding-lr-40 custom red">Done </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<!--##############################ALERT FOR OTHER USER PROFILE######################-->
	<div id="Alert2update" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Complete more of your profile</b></h4>
					</div>
					<div class="modal-body">
						<form class="login-form" method="post" action="home.php">
							<div class="popup_add_photo"></div>
							<div>
								<h5 class="align-c lh-20">To see the rest of their information you need to complete at least 50% of your own <b>Personal Info</b> section on your Profile</h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<?php /* <a href="home.php" name="personalInfo" class="btn btn-default padding-lr-40 custom red">Complete it now </a> */ ?>
								<button href="home.php"  name="personalInfo" type="submit" class="btn btn-default padding-lr-40 custom red">Complete it now </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="aboutHimModel" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Complete more of your profile</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form" action="home.php" method="post">
							<div class="popup_add_photo"></div>
							<div>
								<h5 class="align-c lh-20">To see the rest of their information you need to fill out your <b>About Me</b> section on your Profile</h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<button href="home.php"  name="aboutMe" type="submit" class="btn btn-default padding-lr-40 custom red">Complete it now </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="lookingForModel" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4><b>Complete more of your profile</b></h4>
					</div>
					
					<div class="modal-body">
						<form class="login-form" method="post" action="home.php">
							<div class="popup_add_photo"></div>
							<div>
								<h5 class="align-c lh-20">To see the rest of their information you need to fill out your <b>Looking For</b> section on your Profile</h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<?php /* <a href="home.php" name="lookingFor" class="btn btn-default padding-lr-40 custom red">Complete it now </a> */ ?>
								<button href="home.php"  name="lookingFor" type="submit" class="btn btn-default padding-lr-40 custom red">Complete it now </button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script>
	//######################GIFT#################################
	var gift_user_id = '';
	$('.giveGiftToUser').live('click' , function(){
		var ID = $(this).attr('id').split('-');
		gift_user_id = ID[1];
		$('#gift-modal').modal('show');
	});
	$('.gift_box').click(function(){
		var id=$(this).attr('id').split('-');
		$('#gift_id').val(id[1]);
		$('.gift_box').children('a').css('border', ''); 
		$('.gift_box').children('a').css('padding', '5px'); 
		$(this).children('a').css('border', '5px solid #acb7bb'); 
		$(this).children('a').css('padding', '0px'); 
	});
	//######################################ON PROFILE PAGE#######################################
		$('#user_like').click(function(){
		var user_id='<?php echo $userId;?>';
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{like_user_id : user_id , action : 'addtolike'},
			success:function(result){
				$('#preloader').hide();
				if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');
				}else if(result == 3){
					$('#matched').modal('show');
				}else{
					window.reload;
				}
			}
		});
		return false;
	});
	$('#user_unlike').click(function(){
		var user_id='<?php echo $userId;?>';
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{unlike_user_id : user_id , action : 'addtounlike'},
			success:function(result){
				$('#preloader').hide();
				if(result == 0){
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.please try again.');
					$('#alert_modal').modal('show');
				}else{
					window.location.href="";
				}
			}
		});
		return false;
	});
	</script>