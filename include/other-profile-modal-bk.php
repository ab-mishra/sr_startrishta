
<!--Alert to Update your profile-->
<!--End Alert to Update your profile-->
	<!--##############################FAVORITE LIST##############################-->
	<div id="favoriteModel" class="modal fade login_pop" role="dialog" >
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
								<h5 class="align-c lh-20"><b><?php echo $otherUserResult['user_name'];?> is now added to your <a href="javascript:void(0);">Favorites list</a></b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--################################REPORT USER################################-->
	<div id="reportabuse" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Report Abuse</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form" method="post" action="">
							<div class="popup_add_photo">
							</div>
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
								<span class="pull-left"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);" data-dismiss="modal">Cancel</a></span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="report-succussfully" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Thank You!</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo"></div>
							<div>
							<h5 class="align-c lh-20"><b>  We’ve received your report and will review it as soon as we can. If we find the user is in violation of our policies we will take direct action.</b></h5>
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

	<!--################################BLOCK MEMBER################################-->
	<div id="block-member" class="modal fade login_pop" role="dialog" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div >
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h3><b>Member is bloked</b></h3>
					</div>
					
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo">
							</div>
							<div>
							<h5 class="align-c lh-20"><b><?php echo $otherUserResult['user_name'];?> is now in your blocked list.</b></h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="javascript:void(0);" id="add_block" class="btn btn-default padding-lr-40 custom red">Done</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--################################GIFT################################-->

	<div id="for_gifts" class="modal fade login_pop" role="dialog" >
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
									<input class="btn add pull-left" type="Submit" value="Add">
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
	
<script>
$(function(){
	
	$('#message_now').click(function(){
		$('#preloader').show();
		$('#my-message-box').addClass('active');
		$('#message_div2').show();
		var userId='<?php echo $userId;?>';
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
	
	$('#add_favourite').click(function(){
		var user_id='<?php echo $userId;?>';
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{fav_user_id : user_id , action : 'addtofavourite'},
			success:function(result){
				$('#preloader').hide();
				if(result == 0){
					alert('Problem in network.please try again.');
				}else {
					$('#favoriteModel').modal('show');
					$('#add_favourite').html('');
					$('#add_favourite').html('<span class="mf"></span>Added to Favourites');
				}
			}
		});
		return false;
	});
	$('#add_block').click(function(){
		var user_id='<?php echo $userId;?>';
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{block_user_id : user_id , action : 'addtoblock'},
			success:function(result){
				$('#preloader').hide();
				$('#block-member').modal('hide');
				if(result == 1){
					//alert('added to block list.');
				}else if(result == 2){
					alert('Already added to block.');
				}else if(result == 0){
					alert('Problem in network.please try again.');
				}
			}
		});
		return false;
	});

	$('#reportUserTextarea').keyup(function(){
		var value = $(this).val();
		var len = value.length;
		if(len <= 1000) {
			$('#count_reportUser').text(len);
		}
	});
	$('#reportUserSubmit').click(function(){
		var user_id='<?php echo $userId;?>';
		var reason = $('input[name=reportReason]:checked').val();
		var block_user = $('input[name=reportBlockUser]:checked').val();
		var description = $('#reportUserTextarea').val();
		if(typeof reason === "undefined"){
			reason=''
		}
		if(typeof block_user === "undefined"){
			block_user=''
		}
		if(reason == ''){
			alert('Please select reason.');
			return false;
		}else if(reason == 'Other' && description==''){
			alert('Please enter reason.');
			return false;
		}
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{report_user_id : user_id ,reason:reason ,description:description,block_user:block_user,action : 'reportUser'},
			success:function(result){
				$('#preloader').hide();
				$('#reportabuse').modal('hide');
				if(result == 1){
					$('#report-succussfully').modal('show');
				}else if(result == 0){
					alert('Problem in network.please try again.');
				}
			}
		});
		return false;
		
	});
	
		
	/************************GIFT************************/
	$('.pay-btn-gift').click(function(){
		$('#pay4gift').modal('hide');
		$('#giftsuccussfully').modal('show');
	});
	
	$('.gift_box').click(function(){
		var id=$(this).attr('id').split('-');
		$('#gift_id').val(id[1]);
		$('.gift_box').children('a').css('border', ''); 
		$('.gift_box').children('a').css('padding', '5px'); 
		$(this).children('a').css('border', '5px solid #acb7bb'); 
		$(this).children('a').css('padding', '0px'); 
	});
	$('#give_gift').click(function(){
		var user_id='<?php echo $userId;?>';
		var gift_id=$('#gift_id').val();
		var gift_msg=$('#gift_msg').val();
		if($("#private").prop('checked') == true){
			var private_gift = 1;
		}else {
			var private_gift = 0 ;
		}
		if(gift_id == ''){
			$('#error_message').html('Please select a gift.');
			$('#alert_modal').modal('show');
			return false;
		}
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/other-profile.php",
			data:{gift_user_id : user_id , gift_id:gift_id ,gift_msg:gift_msg,private_gift:private_gift,action : 'giveGiftToUser'},
			success:function(result){
				$('#preloader').hide();
				$('#for_gifts').modal('hide');
				if(result == 1){
					$('#pay4gift').modal('show');
				}else if(result == 0){
					alert('Problem in network.please try again.');
				}
			}
		});
		return false;
	});
});
</script>