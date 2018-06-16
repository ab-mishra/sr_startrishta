$(document).ready(function()
{
	$("#review-ep").click(function(){
		var usr_name = $("#usr_name").val();
		var dob_date = $("#dob_date").val();
		var usr_gender = $("input:radio[name=gender]:checked").val();
		var usr_location = $("#location").val();
		var usr_iamhere = $("#usr_iamhere").val();
		var imagefile=$("#imagefile").val();
		$("#create_ep_err").html("");
		if( usr_name=="" )
		{
			$("#create_ep_err").html("Name is required");
			$("#usr_name").focus();
			return false;
		}
		if( dob_date=="" )
		{
			$("#create_ep_err").html("DOB is required");
			$("#dob_date").focus();
			return false;
		}
		if( $("input:radio[name=gender]:checked").length == 0 )
		{
			$("#create_ep_err").html("Gender is required");
			return false;
		}
		if( usr_location=="" )
		{
			$("#create_ep_err").html("Location is required");
			$("#location").focus();
			return false;
		}
		if( usr_iamhere=="" )
		{
			$("#create_ep_err").html("Reason on website is required");
			$("#usr_iamhere").focus();
			return false;
		}
		if( imagefile=="" )
		{
			$("#create_ep_err").html("Profile picture is required");
			//$("#usr_iamhere").focus();
			return false;
		}
		//$.post('url', data);
		
		//Review functionality
		var data = $('form').serialize();
		//data.append('action','reviewEP');
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			data: data+ '&action=reviewEP',
			success: function(result)
			{
				$("#usr_name_rev").show('slow');
				//about me
				$("#abt-def-txt").html($("#aboutMeTextarea").val());
				$("#abt-def-txt").show('slow');
				$("#about-me-edit").hide('slow');
				//looking for
				$("#lookinfor-def-txt").html($("#lookingForTextarea").val());
				$("#lookinfor-def-txt").show('slow');
				$("#looking-for-edit").hide('slow');
				//personal info
				$("#personal-info-show").html(result);
				$("#personal-info-show").show('slow');
				$("#personal-info-edit").hide('slow');
				//form buttons
				$("#review-ep").hide('slow');
				$("#save-upload").show('slow');
			}
		});
		
		//Review back functionality
		$("#rev-back-icon").click(function()
		{
			$("#usr_name_rev").hide('slow');
			$("#review-ep").show('slow');
			$("#save-upload").hide('slow');
		});
		
		/* $("#show_rev_user").html(usr_name);
		$("#abt-def-txt").html($("#aboutMeTextarea").val());
		$("#lookinfor-def-txt").html($("#lookingForTextarea").val());
		$("#lookinfor-def-txt").html($("#lookingForTextarea").val());
		$("#show-relation").html($("#relation").val());
		$("#show-starsign").html($("#starsign").val());
		$("#show-sexuality").html($("#sexuality").val());
		$("#show-bodytype").html($("#bodytype").val());
		$("#show-complexion").html($("#complexion").val());
		$("#show-height").html($("#height").val());
		$("#show-eyecolor").html($("#eyecolor").val());
		$("#show-haircolor").html($("#haircolor").val());
		$("#show-language").html($("#language").val());
		$("#show-smoking").html($("input:radio[name='smoking']:checked").val());
		$("#show-drinking").html($("input:radio[name='drinking']:checked").val());
		$("#show-kids").html($("input:radio[name='kids']:checked").val());
		$("#show-education").html($("#education").val());
		$("#show-work").html($("#work").val()); */
		
	});
	//Save & upload action
	$("#save-upload").click(function(){
	//	var datas = $('form').serialize();
		var data = new FormData($('#ep_form')[0]);
		data.append("imagefile[]", $('#imagefile')[0].files[0]);
		data.append("action",'createEP');
		/*$.each($("input[type='file']")[0].files, function(i, file) {
			data.append('file', file);
			alert(data);
		});*/
		//var data = new FormData($('form')[0]);
		//var data = $('form').serialize();
		//var image=$('#imagefile').val();
		//alert(image);
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				//console.log(result);//return false;
				if( result==1 )
				{
					$("#create_ep_err").html("Profile created successfully").css('color', 'green');
					setTimeout(function(){ window.location.href = 'ep-user-list.php'; }, 2000);
				}
				else
				{
					$("#create_ep_err").html("Network error. Please try later");
				}
			}
		});
	});
	$("#save-edit-upload").click(function(){
		//	var datas = $('form').serialize();
		var data = new FormData($('#ep_form')[0]);
		data.append("imagefile[]", $('#imagefile')[0].files[0]);
		data.append("action",'editEP');
		
		/*$.each($("input[type='file']")[0].files, function(i, file) {
		 data.append('file', file);
		 alert(data);
		 });*/
		//var data = new FormData($('form')[0]);
		//	var data = $('form').serialize();
		//var image=$('#imagefile').val();
		//alert(image);
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				console.log(result);
				if( result==1 )
				{
					$("#create_ep_err").html("Profile edited successfully").css('color', 'green');
					//setTimeout(function(){ window.location.href = 'ep-profile.php'; }, 5000);	//1 sec
					//	$("#ep_form").reset();
				}
				else
				{
					$("#create_ep_err").html("Network error. Please try later");
				}
			}
		});
	});
	//Personal info section
	$("#edit-about-me").click(function(){
		$("#abt-def-txt").hide('slow');
		$("#about-me-edit").show('slow');
	});
	$("#edit-looking-for").click(function(){
		$("#lookinfor-def-txt").hide('slow');
		$("#looking-for-edit").show('slow');
	});
	$("#edit-personal-info").click(function(){
		$("#personal-info-show").hide('slow');
		$("#personal-info-edit").show('slow');
	});
	$("#visit-submit").click(function () {
		var data = new FormData($('#visit-form')[0]);
		if($('#visitor').is(':checked')) {
			data.append("action",'visitSelected');
		}
		if($('#liked').is(':checked')) {
			data.append("action2",'likeSelected');
		}
		if($('#favorite').is(':checked')) {
			data.append("action3",'favoriteSelected');
		}
		console.log(data);
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				if(result!=0) {
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("Action applied successfully.").css('color', 'green');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
				else
				{
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("No profile for desired action.").css('color', 'red');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
			}
		});
	});
	$("#visit-all").on('click',function(){
		$('#visitor').prop('checked','checked');
		$('#liked').prop('checked','checked');
		$('#favorite').prop('checked','checked');
		var data = new FormData($('#visit-form')[0]);
		data.append("action",'visitSelected');
		data.append("action2",'likeSelected');
		data.append("action3",'favoriteSelected');
		data.append("visitor","visitor");
		data.append("liked","liked");
		data.append("favorite","favorite");
		console.log(data);
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				if(result!=0) {
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("Action applied.").css('color', 'green');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
				else
				{
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("No profile for desired action.").css('color', 'red');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
			}
		});
	});
	$("#promote-selected-btn").click(function(){
		var data = new FormData($('#promote-form')[0]);
		if($('#priority').is(':checked')) {
			data.append("action",'priority');
		}
		if($('#top-search').is(':checked')) {
			data.append("action2",'top-search');
		}
		if($('#fame-reel').is(':checked')) {
			data.append("action3",'fame-reel');
		}
		if($('#ready-to-chat').is(':checked')) {
			data.append("action4",'ready-to-chat');
		}
		if($('#reputation').is(':checked')) {
			data.append("action5",'reputation');
		}
		if($('#govip').is(':checked')) {
			data.append("action6",'govip');
		}
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				if(result!=0) {
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("Action applied.").css('color', 'green');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
				else
				{
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("All actions already applied.").css('color', 'red');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
			}
		});

	});
	$("#promote-all-btn").click(function(){
		$('#priority').prop('checked','checked');
		$('#top-search').prop('checked','checked');
		$('#fame-reel').prop('checked','checked');
		$('#ready-to-chat').prop('checked','checked');
		$('#reputation').prop('checked','checked');
		$('#govip').prop('checked','checked');
		var data = new FormData($('#promote-form')[0]);
			data.append("action",'priority');
			data.append("action2",'top-search');
			data.append("action3",'fame-reel');
			data.append("action4",'ready-to-chat');
			data.append("action5",'reputation');
			data.append("action6",'govip');
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				if(result!=0) {
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("Action applied successfully.").css('color', 'green');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
				else
				{
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("All actions already applied.").css('color', 'red');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
			}
		});

	});
	$("#msg-select-btn").click(function () {
		var data = new FormData($('#message-form')[0]);
		if($('#stock').is(':checked')) {
			data.append("action",'stock');
		}
		if($('#wait-to-talk').is(':checked')) {
			data.append("action2",'wait-to-talk');
		}
        var time_limit=$('input[name=name_of_your_radiobutton]:checked').val();
        data.append("time_limit",time_limit);
		$.ajax({
			type: 'Post',
			url: 'ajax/entertainment.php',
			processData: false,  // tell jQuery not to process the data
			contentType: false,  // tell jQuery not to set contentType
			data: data,
			success: function(result){
				var sum = 0;
                while (result) {
                    sum += result % 10;
                    result = Math.floor(result / 10);
                }
				alert(result);
				if(result!=0) {
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("Action applied.").css('color', 'green');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
				else
				{
					$("#create_ep_err").fadeIn('slow');
					$("#create_ep_err").html("All actions already applied.").css('color', 'red');
					setTimeout(function(){$("#create_ep_err").fadeOut('slow')},3000);
				}
			}
		});
	})
});
$(document).ready(function() {

	//$('#imagefile').change(function() {

		$(function() {
			$("#imagefile").change(function() {
				$("#create_ep_err").empty(); // To remove the previous error message
				var file = this.files[0];
				var imagefile = file.type;
				var match= ["image/jpeg","image/png","image/jpg"];
				if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
				{
					$('#previewing').attr('src','noimage.png');
					$("#create_ep_err").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
					return false;
				}
				else
				{
					var reader = new FileReader();
					reader.onload = imageIsLoaded;
					reader.readAsDataURL(this.files[0]);
				}
			});
		});
		function imageIsLoaded(e) {
			$("#file").css("color","green");
			$('#image_preview').css("display", "block");
			$('#previewing').attr('src', e.target.result);
			$('#previewing').attr('width', '150px');
			$('#previewing').attr('height', '150px');
		};
	});





/*
	$('review-ep').click(function() {

		$("#viewimage").html('');

		$("#viewimage").html('<img src="images/loading.gif" />');

		$(".uploadform").ajaxForm({

			url: 'upload.php',

			success:    showResponse

		}).submit();

	});

});



function showResponse(responseText, statusText, xhr, $form){

	if(responseText.indexOf('.')>0){

		$('#thumbviewimage').html('<img src="<?php echo $upload_path; ?>'+responseText+'"   style="position: relative;" alt="Thumbnail Preview" />');

		$('#viewimage').html('<img class="preview" alt="" src="<?php echo $upload_path; ?>'+responseText+'"   id="thumbnail" />');

		$('#filename').val(responseText);

		$('#thumbnail').load(function(){ // display initial image selection 16:9

			/!* var height = ( this.width / 16 ) * 9;

			 if( height <= this.height ){

			 var diff = ( this.height - height ) / 2;

			 var coords = { x1 : 0, y1 : diff, x2 : this.width, y2 : height + diff };

			 }

			 else{ // if new height out of bounds, scale width instead

			 var width = ( this.height / 9 ) * 16;

			 var diff = ( this.width - width ) / 2;

			 var coords = { x1 : diff, y1 : 0, x2 : width + diff, y2: this.height };

			 }  *!/

			//$('#thumbnail').imgAreaSelect({disable:true,hide:true});

			// $( this ).imgAreaSelect( {handles : true} );

			$(".imgareaselect-selection").parent().remove();

			$(".imgareaselect-outer").remove();

			$('#thumbnail').imgAreaSelect({

				x1 : 0,

				y1 : 0,

				x2 : 100,

				y2: 100 ,

				disable:false,

				hide:false,

				aspectRatio: '1:1',

				handles: true  ,

				show : true,

				persistent:true,

				onSelectChange: preview

			});

		});

	}else{

		$('#thumbviewimage').html(responseText);

		$('#viewimage').html(responseText);

	}

}*/
