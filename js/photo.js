$(function(){//############################ROTATE PHOTO############################	rotateAngle =0;	$('.rotateRight').click(function() {		var id=$(this).attr('id').split('-');		var angle = getAngle($('#my-gallery-'+id[1]+'-'+id[2]));		var rotateAngle = parseInt(angle + 90);		$('#my-gallery-'+id[1]+'-'+id[2]).rotate(rotateAngle);		$(this).css({			"-webkit-transform": "rotate(90deg)",			"-moz-transform": "rotate(90deg)",			"transform": "rotate(90deg)" /* For modern browsers(CSS3)  */		});	});	$('.rotateLeft').click(function() {		var id=$(this).attr('id').split('-');		var angle = getAngle($('#my-gallery-'+id[1]+'-'+id[2]));		var rotateAngle = parseInt(angle - 90);		$('#my-gallery-'+id[1]+'-'+id[2]).rotate(rotateAngle);	});		$('.rotate-right').live('click' , function() {		var id=$(this).attr('id').split('-');		var angle = getAngle($('#sliderImage-'+id[1]+'-'+id[2]));		var rotateAngle = parseInt(angle + 90);		$('#sliderImage-'+id[1]+'-'+id[2]).rotate(rotateAngle);	});	$('.rotate-left').live('click' ,function() {		var id=$(this).attr('id').split('-');		var angle = getAngle($('#sliderImage-'+id[1]+'-'+id[2]));		var rotateAngle = parseInt(angle - 90);		$('#sliderImage-'+id[1]+'-'+id[2]).rotate(rotateAngle);	});//###############################DELETE COLLECTIONS################################	$('.deleteAlbum').click(function(){		var id=$(this).attr('data-id');		$('#albumDeleteType').val(id);		$('#deleteAlbumModal').modal('show');	});	$('#delete-album').click(function(){		var albumDeleteType =$('#albumDeleteType').val();		$('#preloader').show();		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{action : albumDeleteType},			success:function(result){			$('#preloader').hide();				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to delete collection.Please Try again.');					$('#alert_modal').modal('show');				}else {					window.location.href="";				}			}		});		return false;		});//###############################PUBLIC COLLECTIONS############################	$('.makeAlbumPublic').click(function(){		var id=$(this).attr('data-id');		$('#albumPublicType').val(id);		$('#makeAlbumPublicModal').modal('show');	});	$('#pubic-album').click(function(){		var albumPublicType =$('#albumPublicType').val();		$('#preloader').show();		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{action : albumPublicType},			success:function(result){			$('#preloader').hide();				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to pubilc collection.Please Try again.');					$('#alert_modal').modal('show');				}else {					window.location.href="";				}			}		});		return false;		});//##############################PRIVATE COLLECTIONS############################	$('#private-album').click(function(){		$('#preloader').show();		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{action : 'makeAlbumPrivate'},			success:function(result){			$('#preloader').hide();				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to private collection.Please Try again.');					$('#alert_modal').modal('show');				}else {					window.location.href="";				}			}		});		return false;		});//##################################DELETE PHOTO##############################	$('.deletePhoto').click(function(){		var id=$(this).attr('id').split('-');		$('#deletePhoto_id').val(id[1]);		$('#deletePhotoModal').modal('show');	});	$('#delete-photo-modal').click(function(){		var photo_id = $('#deletePhoto_id').val();		$('#preloader').show();		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{action : 'deletePhoto' , del_photo_id :photo_id},			success:function(result){			$('#preloader').hide();				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to delete photo.Please Try again.');					$('#alert_modal').modal('show');				}else {					window.location.href="";				}			}		});		return false;		});	 //#####################################GALLERY#######################################$('.my-gallery').click(function(){		var id=$(this).attr('id').split('-');		var data=$(this).attr('data');		var photo_id=id[2];		var iCount=id[3];				//alert(photo_id);	//alert(iCount);		var startCount=parseInt(iCount -1);		$('#my-gallery-modal-'+photo_id+'-'+iCount).modal('show');		$('#my-gallery-modal-'+photo_id+'-'+iCount).on('shown.bs.modal', function() {			var realSlider= $("ul#bxslider-"+photo_id+'-'+iCount).bxSlider({				  //minSlides:1,				  speed:1000,				  pager:false,				  slideWidth: 573,				  nextText:'',				  prevText:'',				  startSlide:startCount,				  infiniteLoop:false,				  hideControlOnEnd:true,				  onSlideBefore:function($slideElement, oldIndex, newIndex){					changeRealThumb(realThumbSlider,newIndex);									  },				  onSliderLoad: function(){					$('#bxslider-wrap-'+photo_id+'-'+iCount).css("visibility", "visible");				}			});			var realThumbSlider=$("ul#bxslider-pager-"+photo_id+'-'+iCount).bxSlider({				  minSlides: 4,				  maxSlides: 4,				  slideWidth: 140,				  slideMargin: 10,				  moveSlides: 1,				  pager:false,				  speed:1000,				  infiniteLoop:false,				  hideControlOnEnd:true,				  startSlide:startCount,				  nextText:'<span></span>',				  prevText:'<span></span>',				  onSlideBefore:function($slideElement, oldIndex, newIndex){					/*$("#sliderThumbReal ul .active").removeClass("active");					$slideElement.addClass("active"); */				}			});						linkRealSliders(realSlider,realThumbSlider);					if($("#bxslider-pager-"+photo_id+'-'+iCount+" li").length<6){			  $("#bxslider-pager-"+photo_id+'-'+iCount+" .bx-next").hide();			}			// sincronizza sliders realizzazioni			function linkRealSliders(bigS,thumbS){			  			  $("ul#bxslider-pager-"+photo_id+'-'+iCount).on("click","a",function(event){				event.preventDefault();				var newIndex=$(this).parent().attr("data-slideIndex");				var newID=$(this).parent().attr("id").split('-');					bigS.goToSlide(newIndex);														$('.photos_comments-'+photo_id+'-'+iCount).css('display' , 'none');										$('#comment-'+newID[1]+'-'+newID[2]).css('display' , 'block');										$('.popup-right-box-'+photo_id+'-'+iCount).css('display' , 'none');					$('#popup-right-box-'+newID[1]+'-'+newID[2]).css('display' , 'block');					$('.photo_caption-'+photo_id+'-'+iCount).css('display' , 'none');					$('#caption-'+newID[1]+'-'+newID[2]).css('display' , 'block');					$('.modal-header-'+photo_id+'-'+iCount).css('display' , 'none');					$('#header-'+newID[1]+'-'+newID[2]).css('display' , 'block');			  });			}			//slider!=$thumbSlider. slider is the realslider			function changeRealThumb(slider,newIndex){			  			  var $thumbS=$("#bxslider-pager-"+photo_id+'-'+iCount);			  $thumbS.find('.active').removeClass("active");			  $thumbS.find('li[data-slideIndex="'+newIndex+'"]').addClass("active");			  			  if(slider.getSlideCount()-newIndex>=4)slider.goToSlide(newIndex);			  else slider.goToSlide(slider.getSlideCount()-4);			}		});		});		//############################NEXT BUTTON	$('.bx-next').live('click' ,function(){		var sliderName =$(this).parent().parent().prev('div').children('ul');		if(sliderName.attr('class') == 'myphotosfix'){			var slideTransform = sliderName.attr('style').split(';');			slideTransform = $.map(slideTransform, function(style){			style = style.trim();			if (style.startsWith('transform: translate3d')) {				var match = style.match(/transform: translate3d\((.+)px,(.+)px,(.+)px\)/);				var value = parseInt(match[1]);			}			return value;			});			var slideCount =  parseInt(Math.abs(slideTransform/15)+1);			var slideID = sliderName.attr('id').split('-');			var imgId = $(this).parent().parent().prev('div').children('ul').children("li:nth-child("+slideCount+")").children('img').attr('id').split('-');					$('.photos_comments-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#comment-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.popup-right-box-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#popup-right-box-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.photo_caption-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#caption-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.modal-header-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#header-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');					}    });	//############################PREVIOUS BUTTON	$('.bx-prev').live('click' ,function(){		var sliderName =$(this).parent().parent().prev('div').children('ul');		if(sliderName.attr('class') == 'myphotosfix'){			var slideTransform = sliderName.attr('style').split(';');			slideTransform = $.map(slideTransform, function(style){			style = style.trim();			if (style.startsWith('transform: translate3d')) {				var match = style.match(/transform: translate3d\((.+)px,(.+)px,(.+)px\)/);				var value = parseInt(match[1]);			}			return value;			});			var slideCount =  parseInt(Math.abs(slideTransform/15)+1);			var slideID = sliderName.attr('id').split('-');			var imgId = $(this).parent().parent().prev('div').children('ul').children("li:nth-child("+slideCount+")").children('img').attr('id').split('-');									$('.photos_comments-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#comment-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.popup-right-box-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#popup-right-box-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.photo_caption-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#caption-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');			$('.modal-header-'+slideID[1]+'-'+slideID[2]).css('display' , 'none');			$('#header-'+imgId[1]+'-'+imgId[2]).css('display' , 'block');					}    });		//##########################CAPTIONS	$(".edit_caption_button").live('click' , function(){		var id=$(this).attr('id').split('-');		$("#photo_caption-"+id[1]+"-"+id[2]).hide();		$("#edit_caption_box-"+id[1]+"-"+id[2]).show();		$("#edit_caption_button-"+id[1]+"-"+id[2]).hide();	});	$(".cancel_photo_caps").live('click' , function(){		var id=$(this).attr('id').split('-');		$("#photo_caption-"+id[1]+"-"+id[2]).show();		$("#edit_caption_box-"+id[1]+"-"+id[2]).hide();		$("#edit_caption_button-"+id[1]+"-"+id[2]).show();	});	$(".save_photo_caps").live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id = id[1];		var caption=$("#text_photo_caps-"+id[1]+"-"+id[2]).val();		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{caption:caption , caption_photo_id : photo_id , action : 'postPhotoCation'},			success:function(result){				if(result == '0'){					alert("Failed to comment.Please Try again");					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to delete Comment.Please Try again.');					$('#alert_modal').modal('show');				}				else {					$("#photo_caption-"+id[1]+"-"+id[2]).html(caption).show();					$("#edit_caption_box-"+id[1]+"-"+id[2]).hide();					$("#edit_caption_button-"+id[1]+"-"+id[2]).show();				}			}				});	});	//############################ADD COMMENT	$('.commentTextarea').keypress(function(e) {		var tval = $('.commentTextarea').val(),			tlength = tval.length,			set = 500,			remain = parseInt(set - tlength);		if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {			$('.commentTextarea').val((tval).substring(0, tlength - 1))		}	});	$(".addComment").live('click' , function(){		var ID=$(this).attr('id').split('-');		var photo_id=ID[1];		var iCount=ID[2];		var comment_text = $.trim($('#coment_textarea-'+photo_id+'-'+iCount).val());		var comm_count = comment_text.length;		if(comment_text == ""){			/*$('#error_message_header').html('Alert');			$('#error_message').html('Please enter comment.');			$('#alert_modal').modal('show');*/			$('#coment_textarea-'+photo_id+'-'+iCount).focus();			return false;		}		//$("#preloader").show();		$.ajax({			type: "POST",			url: "ajax/photo.php",			data: {comment_text:comment_text , comment_photo_id : photo_id ,iCount:iCount, action : 'postPhotoComment'},			success: function(result){				//$("#preloader").hide();				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to Comment.Please Try again.');					$('#alert_modal').modal('show');				}				else {					$('#comments_box-'+photo_id+'-'+iCount).prepend(result);						$('#coment_textarea-'+photo_id+'-'+iCount).val('');				}			}		});		return false;   	});	//#######################DELETE COMMENT	$('.delete_comment').live('click' , function(){		var id=$(this).attr('id').split('-');		var com_id=id[1];		var photo_id=id[2];		var iCount=id[3];		//if(confirm('Sure you want to delete this comment')){		$.ajax({				type: "POST",				url: "ajax/photo.php",				data: {del_com_id:com_id,del_com_photo_id:photo_id,action : 'deletePhotoComment'},				success: function(result){					if(result == '1'){						$('#comment-'+com_id+'-'+iCount).slideUp("slow");					}else if(result == '0'){						$('#error_message_header').html('Alert');						$('#error_message').html('Failed to delete Comment.Please Try again.');						$('#alert_modal').modal('show');					}				}			});		//}		return false;  	});		//#################REPLY ON COMMENT		$('.reply_comment').live('click' , function(){		var id=$(this).attr('id').split('-');		$('#reply_div-'+id[1]+'-'+id[2]+'-'+id[3]).show().focus();	});		$('.reply_textarea').live('keyup' , function(e){		if(e.which == 13){			$('#preloader').show();			var id=$(this).attr('id');			var ID=id.split('-');			var comment_id=ID[1];			var photo_id=ID[2];			var text = $(this).val();			//alert(comment_id +'-'+photo_id+'-'+text);			if(text == ''){				$('#error_message_header').html('Alert');				$('#error_message').html('Please enter comment.');				$('#alert_modal').modal('show');				$('#preloader').hide();				return false;			}			$.ajax({				type:"POST",				url:"ajax/photo.php",				data:{reply_pid:photo_id , reply_cid:comment_id ,text:text, action:'addReply'},				success:function(result){					$('#preloader').hide();					$('#'+id).val('');					if(result == 0){						$('#error_message_header').html('Alert');						$('#error_message').html('Problem in network.please try again.');						$('#alert_modal').modal('show');					}else{						$('#CommentReplyDiv-'+comment_id+'-'+ID[3]).prepend(result);					}				}			});		}	});	//#####################OPTIONS	$(".set_profile").live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id = id[1];		$.ajax({			type:"POST",			url:"ajax/photo.php",			data:{profile_photo_id : photo_id , action : 'setProfilePhoto'},			success:function(result){				if(result == '0'){					$('#error_message_header').html('Alert');					$('#error_message').html('Failed to set profile image.Please Try again.');					$('#alert_modal').modal('show');				}				else {					$('.slider-container-fadebox-2').show();				}			}				});	});	//####################MAKE PRIVATE	$('.make-private').live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id=id[2];		$.ajax({				type: "POST",				url: "ajax/photo.php",				data: {private_photo_id:photo_id,action : 'makePhotoPrivate'},				success: function(result){					//alert(result);					if(result == 1){						$(".slider-container-fadebox-3").css("display","block");					}else if(result == '0'){						$('#error_message_header').html('Alert');						$('#error_message').html('Failed to make private.Please Try again.');						$('#alert_modal').modal('show');					}				}			});		return false;  	});		// Make photos of you	$('.make-photosofyou').live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id=id[2];		$.ajax({				type: "POST",				url: "ajax/photo.php",				data: {photos_ofyou_id:photo_id,action : 'makePhotosOfYou'},				success: function(result){					//alert(result);					if(result == 1){						$(".slider-container-fadebox-5").css("display","block");					}else if(result == '0'){						$('#error_message_header').html('');						$('#error_message').html('Failed to make. Please Try again.');						$('#alert_modal').modal('show');					}				}			});		return false;  	});		//####################MAKE PUBLIC	$('.make-public').live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id=id[2];		$.ajax({				type: "POST",				url: "ajax/photo.php",				data: {public_photo_id:photo_id,action : 'makePhotoPublic'},				success: function(result){					if(result == 1){						$(".slider-container-fadebox-1").css("display","block");						$(".slider-container-fadebox-5").css("display","block");					}else if(result == '0'){						$('#error_message_header').html('Alert');						$('#error_message').html('Failed to make public.Please Try again.');						$('#alert_modal').modal('show');					}				}			});		return false;  	});	//##############DELETE PHOTO	$('.delete-delete-photo').live('click' , function(){		var id=$(this).attr('id').split('-');		var photo_id=id[2];		$.ajax({				type: "POST",				url: "ajax/photo.php",				data: {delete_photo_id:photo_id,action : 'deletePhotos'},				success: function(result){					if(result == 1){						window.location.href="";					}else if(result == '0'){						$('#error_message_header').html('Alert');						$('#error_message').html('Failed to delete photo.Please Try again.');						$('#alert_modal').modal('show');					}				}			});		return false;  	});	$('.cancel-delete-photo').live('click' , function(){		var id=$(this).attr('id').split('-');		$("#photo-delete-fadebox-"+id[3]+"-"+id[4]).css("display","none");	});		$('.delete-photo').live('click' , function(){		var id=$(this).attr('id').split('-');		$("#photo-delete-fadebox-"+id[2]+"-"+id[3]).css("display","block");	});		$('.not-delete-profile-photo').live('click' , function(){		$('#error_message_header').html('Alert');		$('#error_message').html('You can not delete your Profile Photo');		$('#alert_modal').modal('show');	});	$('.not-make-private').live('click' , function(){		$('#error_message_header').html('Alert');		$('#error_message').html('You can not make your Profile Photo Private');		$('#alert_modal').modal('show');	});		});