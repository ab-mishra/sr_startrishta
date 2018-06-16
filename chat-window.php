<div class="chat-sec-panel <?php echo $class; ?>" <?php echo $showChatHistory; ?> id="scroll-bot" >
	<div>
		<?php 
		while( $showChatResult = mysql_fetch_array($showChatQuery) )
		{
			$profileImg = mysql_query("Select profile_image from sr_users where user_id = '".$showtodayChatResult['sent_by']."' ");
			$profileImgFetch = mysql_fetch_array($profileImg);
			$profileImgUrl = ( $profileImgFetch['profile_image']!="" )?$profileImgFetch['profile_image']:"dummy-profile.png";
			
			if( $showChatResult['user_id'] == $user_id )
			{
				?>
				<div class="chat-wap-c">
					<div class="send-chat">
						<div class="user-name-c"><a href="#"><span><?php echo  $showChatResult['user_name']; ?></span><i><?php
											echo $date=date('M,d Y h:i A',strtotime($showChatResult['sent_date']));

												?></i></a></div>
						<div class="user-cont-c">
							<?php 
							echo htmlspecialchars_decode($showChatResult['msg']);

							if( $showChatResult['msg_upload'] != '' )
							{ 
								?><img src="<?php echo getMessageImage($showChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
							} 
							?>
						</div>
						<?php
						if($showChatResult['is_read']==1)
						{
						 ?>
						<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
						<?php
						}	
						 else
						 {?>
						 <div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
								<?php  } ?>

					</div>
				</div>
				<?php
			}
			else
			{
				?>
				<div class="chat-wap-c">
					<div class="receive-chat">
						<div class="user-name-r"<a href="#"><span><?php echo  $showChatResult['user_name']; ?></span><i><?php
											echo $date=date('M,d Y h:i A',strtotime($showChatResult['sent_date']));

												?></i></a></div>
						<div class="user-cont-r"><?php 
							echo htmlspecialchars_decode($showChatResult['msg']);

							if( $showChatResult['msg_upload'] != '' )
							{ 
								?><img src="<?php echo getMessageImage($showChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
							} 
							?>
						</div>
					<?php
					if($showChatResult['is_read']==1)
					{
						?>
						<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
						<?php
					}
					else
					{?>
						<div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
					<?php  } ?>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<div id="today-chat-message-div" >
		<?php 
		while( $showtodayChatResult = mysql_fetch_array($showtodayChatQuery) )
		{
			/* echo "<pre>";
			print_r($showtodayChatResult); */
			
			$profileImg = mysql_query("Select profile_image from sr_users where user_id = '".$showtodayChatResult['sent_by']."' ");
			$profileImgFetch = mysql_fetch_array($profileImg);
			$profileImgUrl = ( $profileImgFetch['profile_image']!="" )?$profileImgFetch['profile_image']:"dummy-profile.png";
			
			if( $showtodayChatResult['user_id'] == $user_id )
			{
				?>
				<div class="chat-wap-c">
					<div class="send-chat">
						<div class="user-name-c"><a href="#"><span><?php echo  $showtodayChatResult['user_name']; ?></span><i><?php
											echo $date=date('M,d Y h:i A',strtotime($showtodayChatResult['sent_date']));

												?></i></a></div>
						<div class="user-cont-c">
							<?php 
							echo htmlspecialchars_decode($showtodayChatResult['msg']);

							if( $showtodayChatResult['msg_upload'] != '' )
							{ 
								?><img src="<?php echo getMessageImage($showtodayChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
							} 
							?>
						</div>
					<?php
						if($showtodayChatResult['is_read']==1)
						{
						 ?>
						<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
						<?php
						}
						else
						{?>
							<div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
						<?php  } ?>

					</div>
				</div>
				<?php
			}
			else
			{
				?>
				<div class="chat-wap-c">
					<div class="receive-chat">
						<div class="user-name-r"<a href="#"><span><?php echo  $showtodayChatResult['user_name']; ?></span><i><?php
											echo $date=date('M,d Y h:i A',strtotime($showtodayChatResult['sent_date']));

												?></i></a></div>
						<div class="user-cont-r"><?php 
							echo htmlspecialchars_decode($showtodayChatResult['msg']);

							if( $showtodayChatResult['msg_upload'] != '' )
							{ 
								?><img src="<?php echo getMessageImage($showtodayChatResult['msg_upload']); ?>" style="max-width:100%"/><?php 
							} 
							?>
						</div>
					<?php
						if($showtodayChatResult['is_read']==1)
						{
						 ?>
						<div class="mess-tip-wap"><i class="fa fa-check"></i>Message read</div>
						<?php
						}
						else
						{?>
							<div class="mess-tip-wap"><i class="fa fa-clock-o"></i>Message unread</div>
						<?php  } ?>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>
</div>

<?php
if( $isChatUserBlocked )
{
	?><div class=" align-c padding-t15 chat-foot-panel" style="bottom: 0px; min-height:90px;">You cannot message people that you've blocked.<br/> You must <a href="javascript:void(0);" class="unblockUserMsg" id="unblockUserMsg2-<?php echo $chatUserId.'-'.$chatUserName;?>">unblock</a> them to chat.</div><?php 
}
else if($isChatUserBlockedMe)
{
	if($rec_countBlocked==0&&$send_countBlocked>=2)
	{
		//echo $isChatUserBlockedMe."blocked";
		?>
		<div class=" <?php echo $ComBoxClassBlock2;?> chat-foot-panel" id="two_messages" style="bottom: 0px;">You have sent <?php echo $userPer;?> two messages already. If <?php echo $userNou;?> responds, you can continue chatting. <!--Increase your chance of response <a href="javascript:void(0);" class="green giveGiftToUser"  id="giveGiftToUserm2-<?php /*echo $chatUserId; */?>"> by sending <?php /*echo $userPer;*/?> a gift now.--></a></div>
		<?php
	}
	else
	{
		?>
		<div class="chat-foot-panel <?php echo $ComBoxClass1;?> <?php echo ($showChatBox!="")?$showChatBox:$class; ?>" id="enter_comments" >
			<div class="send-icons" id="icons-added">
				<div id="emoji_container"></div>
			</div>
			<form name="uploadForm" id="uploadForm" method="post" >
				<input type="hidden" name="action" value="sendMessage" >
				<input type="hidden" name="chatUserId" value="<?php echo $chatUserId; ?>" >
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="input-group">
							<span class="lead emoji-picker-container">
								<textarea type="text" class="form-control" autocomplete="off" data-emojiable="true" placeholder="Write a message"  name="chat_message" id="chat_message"  style="display:none;"></textarea>
							</span>
						<span class="input-group-btn">
						<button class="btn btn-default send-message" value="Send" type="submit"><i class="fa fa-paper-plane"></i></button>
						<!--<button class="btn btn-default" id="emotions" type="button"><i class="fa fa-smile-o" aria-hidden="true"></i></button>-->
						<div class="fileUpload btn btn-default">
							<span><i class="fa fa-camera" aria-hidden="true"></i></span>
							<input type="file" class="upload" id="msg_upload" name="msg_upload" />
						</div>
					</span>
						</div>
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="boost-wap">
							<div class="pull-left check-box">
								<?php
								if( $isUserVip )
								{
									?><input id="checkboxboost" class="" type="checkbox" name="chatUserCheckbox" checked readonly>
									<label for="checkboxboost"><span class="pull-left"></span></label><?php
								}
								else
								{
									?><input id="checkboxboost" class="go-vip-boost-message" type="checkbox" name="chatUserCheckbox">
									<label for="checkboxboost"><span class="pull-left"></span></label><?php
								}
								?>
							</div>
							<span id="boost_message" ><img src="images/fire-mail.png" /> Boost your message so it gets read first.</span>
						</div>
					</div>
				</div>
			</form>
		</div>
			<?php

	}
}
else
{
	?>
<div class=" <?php echo $ComBoxClass2;?> chat-foot-panel" id="two_messages" style="bottom: 0px;">You have sent <?php echo $userPer;?> two messages already. If <?php echo $userNou;?> responds, you can continue chatting. Increase your chance of response <a href="javascript:void(0);" class="green giveGiftToUser"  id="giveGiftToUserm2-<?php echo $chatUserId; ?>"> by sending <?php echo $userPer;?> a gift now.</a></div><?php
}
## TextBox
if( !$isChatUserBlocked && !$isChatUserBlockedMe  )
{
	?>
	<div class="chat-foot-panel <?php echo $ComBoxClass1;?> <?php echo ($showChatBox!="")?$showChatBox:$class; ?>" id="enter_comments" >
		<div class="send-icons" id="icons-added">
			<div id="emoji_container"></div>
		</div>
		<form name="uploadForm" id="uploadForm" method="post" >
			<input type="hidden" name="action" value="sendMessage" >
			<input type="hidden" name="chatUserId" value="<?php echo $chatUserId; ?>" >
			<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="input-group">
					<span class="lead emoji-picker-container">
						<textarea type="text" class="form-control" autocomplete="off" data-emojiable="true" placeholder="Write a message" name="chat_message"  id="chat_message" style="display:none;"></textarea>
					</span>
					<span class="input-group-btn">
						<button class="btn btn-default send-message" style="background: #f3c500;border-color:#fff !important;border: 1px solid; " value="Send" type="submit"><i class="fa fa-paper-plane" style="color: #fff;"></i></button>
						<!--<button class="btn btn-default" style="background: #f3c500;border-color:#fff !important;" id="emotions" type="button"><i class="fa fa-smile-o" aria-hidden="true"></i></button> -->
						<div class="fileUpload btn btn-default" style="background: #f3c500;border-color:#fff !important;">
							<span><i class="fa fa-camera" aria-hidden="true"></i></span>
							<input type="file" class="upload" id="msg_upload" name="msg_upload" />
						</div>
						<div class="loading btn btn-default" style="background: #f3c500;border-color:#fff !important;display: none"><img src="images/loader.gif" style="width: 15px;" /> </div>
					</span>
				</div>
				</div>
				<div class="col-md-12 col-sm-12">
					<div class="boost-wap">
						<div class="pull-left check-box">
							<?php 
							if( $isUserVip )
							{
								?><input id="checkboxboost" class="" type="checkbox" name="chatUserCheckbox" checked readonly>
								<label for="checkboxboost"><span class="pull-left"></span></label><?php
							}
							else
							{
								?><input id="checkboxboost" class="go-vip-boost-message" type="checkbox" name="chatUserCheckbox">
								<label for="checkboxboost"><span class="pull-left"></span></label><?php
							}
							?>
						</div>
						<span id="boost_message" ><img src="images/fire-mail.png" /> Boost your message so it gets read first.</span>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php
}
?>

  
<script>
//Added by kapil
$("textarea[id^='chat_message']").emojioneArea({
  //container: "#emoji_container",
  hideSource: false,
  pickerPosition: "top",
filtersPosition: "bottom",
tones: false,
autocomplete: false,
inline: true,
hidePickerOnBlur: true,
events: {
		  mousedown: function (editor, event) { 
			//hide the picker/selector if you click on the textarea
			$(".emojionearea-picker").addClass("hidden");
			$(".emojionearea-button").removeClass("active");
		  }, 
		  keydown: function (editor, event) { 
			//hide the picker/selector if you click on the textarea
			$(".emojionearea-picker").addClass("hidden");
			$(".emojionearea-button").removeClass("active");
		  },
		 
	  }
});


 $("#emotions").click(function(){
  		//$("#icons-added").toggle();
	 	//$("#emoji_container .emojionearea-filters").toggle();
	});
	
 $('#msg_upload').on('change',function(){
	 var myform = document.getElementById("uploadForm");
	 var fd = new FormData(myform );
	 $('.fileUpload').hide();
	 $('.loading').show();
	 $.ajax({
		 type:"POST",
		 url:"ajax/message.php",
		 data: fd,
		 cache: false,
		 contentType: false,
		 processData: false,
		 success:function(result){
			 $('.fileUpload').show();
			 $('.loading').hide();
			 $('#preloader').hide();
			 $('#chat-message-div').show();
			 $('#vip_unmatched').hide();
			 if(result == 2){
				 $('#enter_comments').remove();
				 $('#two_messages').show();
			 }
			 //refreshChatDiv();
			 $("#chat-message-div").animate({
				 scrollTop: $(document).height() }, "slow");
			 $(".emojionearea-editor").html('');
			 var input = $("#msg_upload");
			 input.replaceWith(input.val('').clone(true));
			 $(".content_area").removeClass("height_emo1 height_emo2");
			 $('#chat_message').val('', '');
			 $("#scroll-bot").animate({ scrollTop: $('#scroll-bot').prop("scrollHeight")}, 1000);

		 }
	 });
	 return false;
 });
document.onkeydown=function(evt)
{
	var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
	if(keyCode == 13)
	{
		//e.preventDefault();
		//$('#preloader').show();
		
		var chatUserId = $("#chatUserId").val();
		var textcontent = $(".emojionearea-editor").html();
		//$('#chat_message').val(textcontent);
		var chat_msg=$('#chat_message').val();
		if(textcontent=='' && $("#msg_upload").val()=="" && chat_msg=='' )
		{
			//$('#error_message_header').html('');
			//$('#error_message').html("Please type a message.");
			//$('#alert_modal').modal('hide');
			//$("#chat_message").focus();
			$('#preloader').hide();
			return false;
		}
		
		var myform = document.getElementById("uploadForm");
		var fd = new FormData(myform );
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data: fd,
			cache: false,
            contentType: false,
            processData: false,
			success:function(result){
				$('#preloader').hide();
				$('#chat-message-div').show();
				$('#vip_unmatched').hide();
				if(result == 2){
					$('#enter_comments').remove();
					$('#two_messages').show();
				}
				//refreshChatDiv();
				$("#chat-message-div").animate({ 
					scrollTop: $(document).height() }, "slow");
				$(".emojionearea-editor").html('');
				var input = $("#msg_upload");
				input.replaceWith(input.val('').clone(true));
				$(".content_area").removeClass("height_emo1 height_emo2");
				$('#chat_message').val('', '');
				$("#scroll-bot").animate({ scrollTop: $('#scroll-bot').prop("scrollHeight")}, 1000);
				
			}
		});
		return false;
	}
}
</script>
<script>
	$(document).ready(function(){


		$("#scroll-bot").animate({ scrollTop: $('#scroll-bot').prop("scrollHeight")}, 1000);

	});
</script>