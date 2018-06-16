	<script>		
		// Photo  of You //
		function rotateFoo(id){
			$("#you_photo-"+id).animate({borderSpacing: -90}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')
		}
		
		function rotateFoor(id){
			$("#you_photo-"+id).animate({borderSpacing: 0}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')

		}
		function validatePhoto(){
			var upload_image=$('#upload_image').val();
			if(upload_image==''){
				alert('Please upload photo');
				return false;
			}
		}
		// Photo Group  and friends //
		function rotateFoo1(id1){
			$("#rot"+id1).animate({borderSpacing: -90}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')
		}
		function rotateFoor1(id1){
			$("#rot"+id1).animate({borderSpacing: 0}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')

		}
		function validatePhoto1(){
		var upload_image1=$('#upload_image1').val();
		if(upload_image1==''){
			alert('Please upload photo');
			return false;
			}
		}
	// Photo  Private Rotate //
		function rotateFoo2(id2){
			$("#rotp"+id2).animate({borderSpacing: -90}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')
		}
		
		function rotateFoor2(id2){
			$("#rotp"+id2).animate({borderSpacing: 0}, {
			step: function(now,fx) 
			{
			  $(this).css('-webkit-transform','rotate('+now+'deg)'); 
			  $(this).css('-moz-transform','rotate('+now+'deg)');
			  $(this).css('transform','rotate('+now+'deg)');
			},
			duration:'slow'
			},'linear')
		}
		function validatePhoto2(){
		var upload_image2=$('#upload_image2').val();
		if(upload_image2==''){
			alert('Please upload photo');
			return false;
			}
		}
	</script>
	
<script defer src="slider/jquery.flexslider.js"></script>

<!----------------------------PHOTO OF ME------------------------------------------>
<script type="text/javascript">
$(document).ready(function(){
	$(".edit_caption_button").click(function(){
		var id=$(this).attr('id').split('-');
		$("#photo_caption-"+id[1]).hide();
		$("#edit_caption_box-"+id[1]).show();
		$("#edit_caption_button-"+id[1]).hide();
	});
	$(".cancel_photo_caps").click(function(){
		var id=$(this).attr('id').split('-');
		$("#photo_caption-"+id[1]).show();
		$("#edit_caption_box-"+id[1]).hide();
		$("#edit_caption_button-"+id[1]).show();
	});
	$(".save_photo_caps").click(function(){
		var id=$(this).attr('id').split('-');
		var photo_id = id[1];
		var caption=$('#text_photo_caps-'+photo_id).val();
		$.ajax({
			type:"POST",
			url:"ajax/photo.php",
			data:{caption:caption , caption_photo_id : photo_id , action : 'postPhotoCation'},
			success:function(result){
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					$("#photo_caption-"+photo_id).html(caption).show();
					$("#edit_caption_box-"+photo_id).hide();
					$("#edit_caption_button-"+photo_id).show();
				}
			}
		
		});
	});
	$(".set_profile").click(function(){
		var id=$(this).attr('id').split('-');
		var photo_id = id[1];
		$.ajax({
			type:"POST",
			url:"ajax/photo.php",
			data:{profile_photo_id : photo_id , action : 'setProfilePhoto'},
			success:function(result){
				//$("#preloader").hide();
				alert(result);
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					alert("profile photo set sucessfully.");
				}
			}
		
		});
	});
	
	$('.you_photo').click(function(){
		var id =$(this).attr('id').split('-');
		$('#photo-gallery-'+id[1]).modal('show');
		var photo_id= id[1];
		$('#photo-gallery-'+photo_id).on('shown.bs.modal', function(e) {
		$(window).trigger('resize');
		$('#carousel-'+photo_id).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 80,
				itemHeight: 90,
				itemMargin: 5,
				asNavFor: '#sliders-'+photo_id
			}); 
			$('#sliders-'+photo_id).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 715,
				sync: "#carousel-"+photo_id,
				start: function(slider){
				  //$('body').removeClass('loading');
				}
			});
			
		});
		return false;
	});
	$('.slider_thumb').click(function(){
		var id=$(this).attr('id').split('-');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
  
	$('.flex-nav-prev').live('click' ,function(){
		var id = $(this).parent('ul').parent('div').next('div').children('div').children('ul').children('li.slider_thumb.flex-active-slide').attr('id').split('-');
		alert(id);
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
	$('.flex-nav-next').live('click' ,function(){
		var id = $(this).parent('ul').parent('div').next('div').children('div').children('ul').children('li.slider_thumb.flex-active-slide').attr('id').split('-');
		alert(id);
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
/*********************COMMENT****************************/ 
	$(".addComment").click(function(e) {
		var ID=$(this).attr('id').split('-');
		var photo_id=ID[1];
		var iCount=ID[2];
		var comment_text = $('#coment_textarea-'+photo_id+'-'+iCount).val();
		//var comment_count=$('#hidden_comment_count-'+photo_id).val();
		if(comment_text == ""){
			alert('please enter some text.');
			exit;
		}
		//$("#preloader").show();
		$.ajax({
			type: "POST",
			url: "ajax/photo.php",
			data: {comment_text:comment_text , comment_photo_id : photo_id ,iCount:iCount, action : 'postPhotoComment'},
			success: function(result){
				//$("#preloader").hide();
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					//var count=parseInt(parseInt(comment_count) + 1);
					//$('#comment_count-'+photo_id).html('('+count+')');
					//$('#hidden_comment_count-'+photo_id).val(count)
					$('#comments_box-'+photo_id+'-'+iCount).prepend(result);	
					$('#coment_textarea-'+photo_id+'-'+iCount).val('');
				}
			}
		});
		return false;   
	});
	$('.delete_comment').live('click' , function(){
		var id=$(this).attr('id').split('-');
		var com_id=id[1];
		var photo_id=id[2];
		var iCount=id[3];
		if(confirm('Sure you want to delete this comment')){
		$.ajax({
				type: "POST",
				url: "ajax/photo.php",
				data: {del_com_id:com_id,del_com_photo_id:photo_id,action : 'deletePhotoComment'},
				success: function(result){
					if(result == '1'){
						$('#comment-'+com_id+'-'+iCount).slideUp("slow");
					}else if(result == '0'){
							alert("Failed to delete Comment.Please Try again");
					}
				}
			});
		}
		return false;  
	});
	$('.make-private').live('click' , function(){
		var id=$(this).attr('id').split('-');
		var photo_id=id[2];
		$.ajax({
				type: "POST",
				url: "ajax/photo.php",
				data: {private_photo_id:photo_id,action : 'makePhotoPrivate'},
				success: function(result){
					alert(result);
					if(result == '1'){
						$(".slider-container-fadebox-3").css("display","block");
					}else if(result == '0'){
							alert("Failed to delete Comment.Please Try again");
					}
				}
			});
		return false;  
	});
});
</script>

<!----------------------------PRIVATE PHOTO----------------------------------------->
<script type="text/javascript">
$(document).ready(function(){
	$(".private_edit_caption_button").click(function(){
		var id=$(this).attr('id').split('-');
		$("#private_photo_caption-"+id[1]).hide();
		$("#private_edit_caption_box-"+id[1]).show();
		$("#private_edit_caption_button-"+id[1]).hide();
	});
	$(".private_cancel_photo_caps").click(function(){
		var id=$(this).attr('id').split('-');
		$("#private_photo_caption-"+id[1]).show();
		$("#private_edit_caption_box-"+id[1]).hide();
		$("#private_edit_caption_button-"+id[1]).show();
	});
	$(".private_save_photo_caps").click(function(){
		var id=$(this).attr('id').split('-');
		var photo_id = id[1];
		var caption=$('#private_text_photo_caps-'+photo_id).val();
		$.ajax({
			type:"POST",
			url:"ajax/photo.php",
			data:{caption:caption , caption_photo_id : photo_id , action : 'postPhotoCation'},
			success:function(result){
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					$("#private_photo_caption-"+photo_id).html(caption).show();
					$("#private_edit_caption_box-"+photo_id).hide();
					$("#private_edit_caption_button-"+photo_id).show();
				}
			}
		
		});
	});
	$(".private_set_profile").click(function(){
		var id=$(this).attr('id').split('-');
		var photo_id = id[1];
		$.ajax({
			type:"POST",
			url:"ajax/photo.php",
			data:{profile_photo_id : photo_id , action : 'setProfilePhoto'},
			success:function(result){
				//$("#preloader").hide();
				alert(result);
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					alert("profile photo set sucessfully.");
				}
			}
		
		});
	});
	$('.private_photo').click(function(){
		var id =$(this).attr('id').split('-');
		$('#private-gallery-'+id[1]).modal('show');
		var photo_id= id[1];
		$('#private-gallery-'+photo_id).on('shown.bs.modal', function(e) {
		$(window).trigger('resize');
		$('#private_carousel-'+photo_id).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 80,
				itemHeight: 90,
				itemMargin: 5,
				asNavFor: '#private_sliders-'+photo_id
			}); 
			$('#private_sliders-'+photo_id).flexslider({
				animation: "slide",
				controlNav: false,
				animationLoop: false,
				slideshow: false,
				itemWidth: 715,
				sync: "#private_carousel-"+photo_id,
				start: function(slider){
				  //$('body').removeClass('loading');
				}
			});
			
		});
		return false;
	});
	/*
	$('.slider_thumb').click(function(){
		var id=$(this).attr('id').split('-');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
  
	$('.flex-nav-prev').live('click' ,function(){
		var id = $(this).parent('ul').parent('div').next('div').children('div').children('ul').children('li.slider_thumb.flex-active-slide').attr('id').split('-');
		alert(id);
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
	$('.flex-nav-next').live('click' ,function(){
		var id = $(this).parent('ul').parent('div').next('div').children('div').children('ul').children('li.slider_thumb.flex-active-slide').attr('id').split('-');
		alert(id);
		$('.popup-right-box').css('display' , 'none');
		$('#popup-right-box-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photos_comments').css('display' , 'none');
		$('#comment-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.photo_caption').css('display' , 'none');
		$('#caption-'+id[1]+'-'+id[2]).css('display' , 'block');
		$('.modal-header').css('display' , 'none');
		$('#header-'+id[1]+'-'+id[2]).css('display' , 'block');
	});
/*********************COMMENT****************************
	$(".addComment").click(function(e) {
		var ID=$(this).attr('id').split('-');
		var photo_id=ID[1];
		var iCount=ID[2];
		var comment_text = $('#coment_textarea-'+photo_id+'-'+iCount).val();
		//var comment_count=$('#hidden_comment_count-'+photo_id).val();
		if(comment_text == ""){
			alert('please enter some text.');
			exit;
		}
		//$("#preloader").show();
		$.ajax({
			type: "POST",
			url: "ajax/photo.php",
			data: {comment_text:comment_text , comment_photo_id : photo_id ,iCount:iCount, action : 'postPhotoComment'},
			success: function(result){
				//$("#preloader").hide();
				if(result == '0'){
					alert("Failed to comment.Please Try again");
				}
				else {
					//var count=parseInt(parseInt(comment_count) + 1);
					//$('#comment_count-'+photo_id).html('('+count+')');
					//$('#hidden_comment_count-'+photo_id).val(count)
					$('#comments_box-'+photo_id+'-'+iCount).prepend(result);	
					$('#coment_textarea-'+photo_id+'-'+iCount).val('');
				}
			}
		});
		return false;   
	});
	$('.delete_comment').live('click' , function(){
		var id=$(this).attr('id').split('-');
		var com_id=id[1];
		var photo_id=id[2];
		var iCount=id[3];
		if(confirm('Sure you want to delete this comment')){
		$.ajax({
				type: "POST",
				url: "ajax/photo.php",
				data: {del_com_id:com_id,del_com_photo_id:photo_id,action : 'deletePhotoComment'},
				success: function(result){
					if(result == '1'){
						$('#comment-'+com_id+'-'+iCount).slideUp("slow");
					}else if(result == '0'){
							alert("Failed to delete Comment.Please Try again");
					}
				}
			});
		}
		return false;  
	});
	$('.make-private').live('click' , function(){
		var id=$(this).attr('id').split('-');
		var photo_id=id[2];
		$.ajax({
				type: "POST",
				url: "ajax/photo.php",
				data: {private_photo_id:photo_id,action : 'makePhotoPrivate'},
				success: function(result){
					alert(result);
					if(result == '1'){
						$(".slider-container-fadebox-3").css("display","block");
					}else if(result == '0'){
							alert("Failed to delete Comment.Please Try again");
					}
				}
			});
		return false;  
	});
	*/
});
</script>