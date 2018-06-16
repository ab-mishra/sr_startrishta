function refreshChatDiv(){
	var chatUserId = $("#chatUserId").val();
	$.ajax({
		type:"POST",
		url:"ajax/message.php",
		data:{ChatId:chatUserId , action:'showChatHistory'},
		success:function(result){  
			if(result !=''){
				$('#today-chat-message-div').html(result);
				
			}
		}
	});
		return false;
}
function delete_chat_func(id)
{
	//alert(id);
	//var id=$(this).attr('id').split('-');
	$('#delete_oneconv_div').modal('show');
	$('#oneconv_delete').on('click',function(){
	$.ajax({
		url:'ajax/message.php',
		type:'POST',
		data:{action:'deleteConversation' , deleteUserId:id},
		success:function(result){
			$('#delete_oneconv_div').modal('hide');
			//alert(result);
		}
	});
});
}
$('<audio id="chatAudio"><source src="notify/notify.wav" type="audio/wav"></audio>').appendTo('body');
/*var mcount=1;
function refreshMsgCount(){
	//var old=<?php echo $_SESSION['old']; ?>
	$.ajax({
		type:"POST",
		url:"ajax/message.php",
		data:{action:'refreshMsgCount'},
		success:function(result){
			console.log(mcount);
			console.log(result);
			if(result != 0){
				$('#notify_msg').show().html(result);

				if(result==mcount)
				{
					$('#chatAudio')[0].play();
				}

			}else{
				$('#notify_msg').hide();
			}
			mcount=result;
			mcount++;
		}
	});
}*/
function refreshOnlineUsers_d()
{
	var chatUser_id = $('#chatUser_id').val();
	var searchWord = $('#searchOnlineUserList').val();
	var id = $('#msgType').val();
	var userIds = [];
	
	$("input[name='chatUserCheckbox']:checked").each(function() {
		userIds.push($(this).val());
	});
	
	$.ajax({
		type:"POST",
		url:"ajax/message.php",
		dataType:"json",
		data:{action:'refreshOnlineUsers' , searchWord:searchWord , msgType:id , chatUser_id : chatUser_id ,chatUserIds: userIds},
		success:function(outputResult){
			//var outputResult = jQuery.parseJSON(result);
			//alert(outputResult);
			$('#chatOnlineUserDiv').html(outputResult[0]);
			if(outputResult[1] != 0){
				if($('#chatAudio').length){
					$('#chatAudio')[0].play();
				}
			}
		}
	});
	return false;
}
	
	

	// Chat window
	function showChatHistory(id)
	{
		$('#preloader').show();
		$('li[id^="onlineUserDiv-"]').removeClass('active');

		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{userConverId:id , action:'startConversation'},
			success:function(result){
				$('#preloader').hide();
				//$('#chatUser_id').val(id);
				$('li[id="onlineUserDiv-'+id+'"]').addClass('active');
				$('#unread-msg-count-'+id).hide();
				$('div[id^="userChat_window"]').html(result);
				$("#chat-message-div").animate({
					scrollTop: $(document).height() }, "slow");
				setInterval(function(){
					refreshChatDiv();
				}, 1000);

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
			}
		});
		return false;

	}

$(function(){

//###############################################################################################
	/*$('<audio id="chatAudio"><source src="notify/notify.wav" type="audio/wav"></audio>').appendTo('body');*/


	$('#msg_volume').click(function(){
		var vol_class = $(this).children('i').attr('class');
		if(vol_class == 'fa fa-volume-up'){
			$(this).children('i').removeClass('fa-volume-up');
			$(this).children('i').addClass('fa-volume-off');
			$('#chatAudio').remove();
		}else if(vol_class == 'fa fa-volume-off'){
			$(this).children('i').removeClass('fa-volume-off');
			$(this).children('i').addClass('fa-volume-up');
			$('<audio id="chatAudio"><source src="notify/notify.wav" type="audio/wav"></audio>').appendTo('body');
		}
		});
    var refreshOnlineUserInterval =null;
	//setInterval(function(){ refreshMsgCount() }, 1000);
	
	$('#uploadProfilPhoto').live('change' , function(){
		$("#profilPhotoForm").submit();
	});

	$('#my-message-box').click(function(){
		$(this).addClass('active');
		$('#message_div2').show();
		//$('#notify_msg').html('0');
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action : 'setMessageClicked'},
			success:function(result){
				//alert(result);
				setInterval(function(){ refreshOnlineUsers() }, 10000);
			}
		});
		return false;
	});
	var countfalg = 0;

	function setOnlineChat(){
		//refreshOnlineUsersCount
		$.ajax({
			type: "POST",
			url: "ajax/message.php",
			data: {msgType: 'online', action: 'refreshOnlineUsersCount'},
			success: function (result) {
				/*console.log('res123 >>> '+result);*/
				if(countfalg == result){ return false; }
				else{ /*console.log('res >>> '+result);*/ //refreshOnlineUsers_d(); countfalg = result;
					}
				/*console.log('res000 >>> '+countfalg);*/
			}
		});
	}
	
	var j = setInterval(function(){ setOnlineChat() }, 10000);

	var int = setInterval(function () {
		$.ajax({
			type: "POST",
			url: "ajax/message.php",
			data: {msgType: 'Inbox', action: 'msgNavClicked'},
			success: function (result) {
				$('ul[id="chatOnlineUserDiv"]').html(result);
				//$('.profile-menu').removeClass('open');
			}
		});
	}, 10000);
	//Change Chat Listing
	$('li[id^="message_navigation"]').click(function()
	{
		var chatTitle = $(this).attr('title');
		$("#message_navigation_title").html(chatTitle);

		$('#preloader').show();
		
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{msgType:chatTitle , action : 'msgNavClicked'},
			success:function(result){
				$('#preloader').hide();
				$('ul[id="chatOnlineUserDiv"]').html(result);
				$('div[id^="userChat_window"]').html('');
				$('.profile-menu').removeClass('open');
				clearInterval(int);
				setTimeout(function() {
					int = setInterval(function(){
						$.ajax({
							type: "POST",
							url: "ajax/message.php",
							data: {msgType: chatTitle, action: 'msgNavClicked'},
							success: function (result) {
								$('ul[id="chatOnlineUserDiv"]').html(result);
								//$('.profile-menu').removeClass('open');
							}
						});
					}, 10000);
				});
				/*if(chatTitle=='Inbox') {
					var interval;
					var timer = function() {
						interval = setInterval(function () {
							$.ajax({
								type: "POST",
								url: "ajax/message.php",
								data: {msgType: chatTitle, action: 'msgNavClicked'},
								success: function (result) {
									$('ul[id="chatOnlineUserDiv"]').html(result);
									//$('.profile-menu').removeClass('open');
								}
							});


							return false;
						}, 1000);
					};
				}*/

			}
		});
		
		return false;
	});

	$('#soundtoggle').click(function(){
		$('audio')[0].remove('#chatAudio');
		$('#soundtoggle')
	});


	$('#search_more_people').live('click' , function(){
		$('#preloader').show();
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action : 'searchMorePeople'},
			success:function(result){
				$('#preloader').hide();
				$('div[id^="search_more_people_div"]').html(result);
			}
		});
		return false;
	});

	$('a[id="not_interested"]').live('click' , function(){
		$('#preloader').show();
		var sentby=$(this).find('input').val();
		//alert(sentby);
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action : 'notInterested',sentby: sentby},
			success:function(result){
				$('#preloader').hide();
				$('div[id^="userChat_window"]').html(result);
			}
		});
		return false;
	});
	
	//Search users
	$('#searchOnlineUserList').live('keyup' , function()
	{
		var msgType = $('div[id="message_navigation_title"]').html();
		var searchWord = $(this).val();
		
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{searchWord:searchWord ,msgType:msgType, action:'searchOnlineUserList'},
			success:function(result){
				//alert(result);
				$('ul[id^="chatOnlineUserDiv"]').html(result);
			}
		});

		return false;
	});


	$('.chatUserPic').live('click' , function(){
		$('#preloader').show();
		var id = $(this).attr('id').split('-');
		var userId=id[1];
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{userProfileId:userId , action:'showUserChatProfile'},
			success:function(result){
				$('#preloader').hide();
				$('#chatUser_id').val(userId);
				$('.onlineUserDiv').removeClass('active');
				$('#onlineUserDiv-'+userId).addClass('active');
				$('#unread-msg-count-'+userId).hide();
				$('#userChat_window').html(result);
			}
		});
			return false;
	});
	$('.chatUserCheckbox').live('click' , function(){
		if($(this).attr('checked') == 'checked'){
			$('#delete_allconv').children('i').addClass('them-green');
		}else{
			$('#selectAll').prop('checked' , false);
		}
		if($('.chatUserCheckbox:checked').length == 0){
			$('#delete_allconv').children('i').removeClass('them-green');
		}
	
	});
	//#########################################################//
	$('#start_conversation').live('click' , function(){
		$('#preloader').show();
		var id = $(this).data('id');
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{userConverId:id , action:'startConversation' , clicked:'yes'},
			success:function(result){
				$('#preloader').hide();
				$('li[id^="onlineUserDiv-"]').removeClass('active');
				$('li[id^="onlineUserDiv-"]'+id).addClass('active');
				$('#chatUser_id').val(id);
				$('#unread-msg-count-'+id).hide();
				$('div[id^="userChat_window"]').html(result);
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
			}
		});
			return false;
	});
	$('#reply-now').live('click' , function(){
		$('#preloader').show();
		var id = $(this).data('id');
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{userConverId:id , action:'startConversation', replyClicked:'yes'},
			success:function(result){
				$('#preloader').hide();
				$('#msg-reply-div').hide();
				$('#chatUser_id').val(id);
				$('.onlineUserDiv').removeClass('active');
				$('#onlineUserDiv-'+id).addClass('active');
				$('#unread-msg-count-'+id).hide();
				$('#userChat_window').html(result);
			}
		});
			return false;
	});
	
	
	//Chat window on click of a user link
	$('label[id^="chatOnlineUserList"]').live('click' , function()
	{
		var id = $(this).attr('id').split('-');
		showChatHistory(id[1]);
	});
	
	$(".emojionearea-editor").live('keydown' , function() {
		var keyed = $(this).html();
		$("#chat_message").val(keyed);
	});
	$(".send-message").live('click' , function() {
		//alert("ddd");
		var keyed = $(".emojionearea-editor").html();
		$("#chat_message").val(keyed);
	});
	$(".emojionearea-editor").live('blur' , function() {
		var keyed = $(this).html();
		$("#chat_message").val(keyed);
	});
	
	
	//post a message on click on send button
	$("#uploadForm").live('submit',(function(e) 
	{
		
		e.preventDefault();
		//$('#preloader').show();
		var chatUserId = $("#chatUserId").val();
		var textcontent = $(".emojionearea-editor").html();
		var chat_msg=$('#chat_message').val();
		chat_msg.value=textcontent;
		if(textcontent=='' && $("#msg_upload").val()=="" && chat_msg=='' ){
			//$('#error_message_header').html('');
			//	$('#error_message').html("Please type a message.");
			//$('#alert_modal').modal('hide');
			//$("#chat_message").focus();
			$('#preloader').hide();
			return false;
		}		
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:  new FormData(this),
			cache: false,
            contentType: false,
            processData: false,
			success:function(result){
				alert(result);
				$('#preloader').hide();
				$('#chat-message-div').show();
				$('#vip_unmatched').hide();
				if(result == 2){
					$('#enter_comments').remove();
					$('#two_messages').show();
				}
				refreshChatDiv();
				//$("#scroll-bot").animate({ scrollTop: $('#scroll-bot').prop("scrollHeight")}, 1000);
				$("#chat-message-div").animate({
					scrollTop: $(document).height() }, "slow");
				$(".emojionearea-editor").html('');
				var input = $("#msg_upload");
				input.replaceWith(input.val('').clone(true));
				$(".content_area").removeClass("height_emo1 height_emo2");
				$('#chat_message').val('', '');
			}
		});
			return false;
	}));
	//send a message onclick of enter
	$(".emojionearea-editor").live('keypress' , function(e) {
		if(e.which == 13) {

		}
	});
	/* Boost Message */
	$("#boost_message").live('click' , function(){
		$(".boost_msg").html('Boost your message so it gets read first.');
		return false;
	});
	
	var count = 0;
	$("#msg_nointerest").live('click',function(){
			var sentby=$(this).find('#chatuserid').val();
		var del_count=$(this).find('#del_count').val();
		var user_notInterested=$(this).find('#user_notInterested').val();
		//alert(user_notInterested);
		if (user_notInterested==1){
			//alert('block'); 
			$.ajax({
				type:"POST",
				url:"ajax/other-profile.php",
				data:{action : 'addtoblock',block_user_id: sentby},
				success:function(result){
					/*console.log(result);return false;*/
					$('#preloader').hide();
					$('div[id^="userChat_window"]').html(result);
				}
			});
							return false;

		}
		if(del_count==0)
		{
			$.ajax({
				type:"POST",
				url:"ajax/message.php",
				data:{action : 'notInterested',sentby: sentby},
				success:function(result){
					/*console.log(result);return false;*/
					$('#preloader').hide();
					$('div[id^="userChat_window"]').html(result);
				}
			});
			return false;
		}
		else {
			$("#show-interested").modal("show");
			$(".nv_mid_links ul li").removeClass("active");
		}
		//alert(sentby);

		/*$("#chkCountMsg").html(count++);
		*/
	});
	$(".msg_cancel").live('click',function(){
		$("#message_report").hide();
	});
	//##########################DELETE ONE CONVERSATION
	$("#delete_oneconv").live('click',function(){
		$("#delete_oneconv_div").modal('show');
		$(".nv_mid_links ul li").removeClass("active");
	});
	$("#oneconv_cancel").live('click',function(){
		$("#delete_oneconv_div").modal('hide');
	});
	$("#oneconv_delete").live('click',function(){
		$('#preloader').show();
		var deleteUserId=$('#chatUserId').val();  
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action:'deleteConversation' , deleteUserId:deleteUserId},
			success:function(result){
				$("#delete_oneconv_div").hide();
				$('#preloader').hide();
				showChatHistory(deleteUserId);
			}
		});
	});
	
	
	//########################DELETE ALL CONVERSATION
	$("input[name^='chatUserCheckbox']").live('click',function(){
		$('#delete_allconv').children('i').addClass('them-green');
		if( $("input[name^='chatUserCheckbox']:checked").length>0 ){
			$("#select_all").css("display", "block");
		}
		else
		{
			$("#select_all").css("display", "none");
		}
		
	});
	$("#selectAll").live('click' ,function () {
		$("input[class='chatUserCheckbox']").each(function(){
			this.checked = true;
		});
		$('#delete_allconv').children('i').addClass('them-green');
	});
	$("#unselectAll").live('click' ,function () {
		$("input[class='chatUserCheckbox']").each(function(){
			this.checked = false;
		});
		$('#delete_allconv').children('i').removeClass('them-green');
	});

	$("a[id^='delete_allconv']").live('click',function()
	{
		$("div[id='delete_allconv_div']").modal('show');
		//$(".nv_mid_links ul li").removeClass("active");
	});
	
	$("#allconv_cancel").on('click',function()
	{
		$('#delete_allconv_div').modal('hide');
	});
	
	$("#allconv_delete").on('click',function(){
		$('#preloader').show();
		  var userIds = [];
			$("input[name^='chatUserCheckbox']:checked").each(function() {
				userIds.push($(this).val());
			});
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{action:'deleteAllConversation' , userIds:userIds},
			success:function(result){
				$("#delete_allconv_div").modal('hide');
				$(".chatUserCheckbox").each(function(){
					this.checked = false;
				});
				$('#selectAll').prop('checked' , false);
				$('#unselectAll').prop('checked' , false);
				//$('#inbox').click();
				$('#preloader').hide();
			}
		});
	});
	
	//#################Messages Popup Close
	$("#close_msg_div").click(function(){
		$(".message_div").css("display","none");
		$(".nv_mid_links ul li").removeClass("active");
		 clearInterval(refreshOnlineUserInterval);
	});
	
	//#########################Message Caption
	$(".user_pics ul li").hover(function(){
		$(this).children('div').css({"display": "block", "color": "red"});
	});
	$(".user_pics ul li").mouseleave(function(){
		$(this).children('div').css({"display": "none", "color": "red"});
	});
	//#########################COPY INTEREST
	$('#copy_interest').modal('show');
	$("input[name='user_interest[]']").live('click' , function(){
		var count=$("input[name='user_interest[]']:checked").length;
		if(count != 0){
			$('#selected_interest').html(count +' selected');
		}else{
			$('#selected_interest').html('');
		}
	});
	$("#add_selected_interest").live('click' , function(){
		var count=$("input[name='user_interest[]']:checked").length;
		var interest_ids = [];
		$("input[name='user_interest[]']:checked").each(function() {
			interest_ids.push($(this).val());
		});
				//alert(interest_ids);
		if(count == 0){
			alert('Please select at least one interest');
			return false;
		}
		$.ajax({
			type:"POST",
			url:"ajax/message.php",
			data:{interest_ids:interest_ids , action:"addInterest"},
			success:function(result){
				//alert(result);
				$('#copy_interest').modal('hide');
			}
		});
		return false;
	});

//##########################RESET SEARCH
	$('#resetSearchFromMsg').click(function(){
		$.ajax({
			type:"POST",
			url:"ajax/search.php",
			data:{action:'resetSearch'},
			success:function(result){
				if(result == 1){
					window.location.href="";
				}else {
					alert('problem in network.please try again.');
				}
			}
		});
		return false;
	});

//##########################EMOTIONS
	$("#emotions").live("click" , function(){

		$(".emojionearea-filters").toggle();
		$(".content_area").toggleClass("height_emo");
		$("#chat-message-div").animate({ 
			scrollTop: $(document).height() }, "slow");
		//alert($('.emojionearea-filters-scroll:eq(4)').attr("class"));
		
	});
	$(".emojionearea-filter").live("click" , function(){
		if($('.emojionearea-tab-people').css('display') == 'block' || $('.emojionearea-tab-nature').css('display') == 'block' || $('.emojionearea-tab-food_drink').css('display') == 'block' || $('.emojionearea-tab-celebration').css('display') == 'block' || $('.emojionearea-tab-activity').css('display') == 'block' ||$('.emojionearea-tab-travel').css('display') == 'block' || $('.emojionearea-tab-objects_symbols').css('display') == 'block' || $('.emojionearea-tab-flags').css('display') == 'block'){
			$(".content_area").addClass("height_emo2");
		}else{
			$(".content_area").removeClass("height_emo2");
		}
	});
	$("body").live("blur" , function(){
		$(".content_area").removeClass("height_emo2");
		
	});
	
	
	/* Message: Not Interested */
	$("#notInterestedContinue").click(function()
	{
		var notInterestedOption = $("input[name='notInterestedAction']:checked").val();
		var newUserNotMatched = $("#newUserNotMatched").val();
		var current_user_id=$('#current_user_id').val();
		
		if( notInterestedOption=="" )
		{	
			alert("Please choose an option");
			return false;
		}
		else
		{
			var alertMsg = '';
			$.ajax({
				type: 'POST',
				url: 'ajax/other-profile.php',
				data: {action: 'addtoblock',block_user_id:newUserNotMatched},
				success: function(result){
					alert(current_user_id);
					$.ajax({
						type: 'POST',
						url: 'ajax/message.php',
						data: {action: 'user_notInterested_action',userid:current_user_id},
						success:function(output){
					$('#error_message_header').html('');
					$('#error_message').html("User blocked successfully.");
					$('#alert_modal').modal('show');
						}
					});
					
				}
			});
			return false;
		}
		
	});

});
