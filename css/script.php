
	<!--CSS start from here-->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="css/font-awesome.css"/>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans" />
	<link type="text/css" rel="stylesheet" href="css/stylesheet-pure-css.css"/>
	<link type="text/css" rel="stylesheet" href="css/datepicker.css">
	<link type="text/css" rel="stylesheet" href="css/jquery.bxslider.css">
	<link type="text/css" rel="stylesheet" href="css/jquery-ui.css">
	<link type="text/css" rel="stylesheet" href="css/select2.css">
	<link type="text/css" rel="stylesheet" href="css/style.css">
	<link type="text/css" rel="stylesheet" href="css/custom.css"/>
	<!--CSS End Here-->
	
	
	<!--Js start here-->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-filestyle.js"></script>
	<script src="js/jquery-ui.js"></script>
	<!--<script src="js/select2.js"></script>-->
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/bx.easing.js"></script>
	<script src="js/bx.js"></script>
	<!--<script src="http://cdn.jsdelivr.net/bxslider/4.1.1/plugins/jquery.easing.1.3.js"></script>	
	<script src="http://cdn.jsdelivr.net/bxslider/4.1.1/jquery.bxslider.js"></script>-->
	<script src="js/validation.js"></script>


	<script type="text/javascript">
	
	$(document).ready(function(){
		/**************Header dropdown*****************/
		$(".prof_dpdwn").click(function(){
				var prof_dropdown = $(".prof_drop_dwn").css("display");
				if(prof_dropdown == 'none'){
				$(".prof_drop_dwn").css("display","block");}
				else{
					$(".prof_drop_dwn").css("display","none");
				}
			});
		/*************Photo reel*****************/
		$('.slider4').bxSlider({
			slideWidth: 110,
			slideHeight: 140,
			minSlides: 1,
			maxSlides: 15,
			pager: false,
			moveSlides: 1,
			slideMargin: -10,
			auto:true
		});
		/*************Photo slide*****************/
		$('.slider3').bxSlider({
			slideWidth: 134,
			slideHeight: 134,
			minSlides: 1,
			maxSlides: 15,
			pager: false,
			moveSlides: 1,
			slideMargin: 0,
			auto:false,
		});
		//document ready or onload checkbox=unchecked
		//$('input[type="checkbox"]').attr('checked', false);
		//scroll down//
		$('.go-to-top').click(function(){
			$('html,body').animate({scrollTop: $(document).height()}, 600);
			  return false;
		});
		$(".vip_icon a").hover(function(){
			$this(".vip_info").css("display","block")
		});
		$(".vip_icon a").mouseleave(function(){
			$(".vip_info").css("display","none")
		});
	});	
	
	$(document).ready(function(){
		//tooltip
		$('[data-toggle="tooltip"]').tooltip();
			
		//End pay tab creadit paypal	
		$(".vip-pay li a").click(function(){
			$(this).parent("li").addClass("active");
			$(this).parent("li").siblings("li").removeClass("active");
			var k = $(this).data("rel");
			//alert(k);
			$(this).closest("ul.vip-pay").siblings("div").hide().removeClass("active_pane");
			$(this).closest("ul.vip-pay").siblings(k).show().addClass("active_pane");
		});
		
		$(".fb_caps_btn").click(function(){
			$(".facebook_option").css("display","block");
		});
		$(".lock_caps_btn").click(function(){
			$(".lock_option").css("display","block");
		});
		
		$(".report_btn").click(function(){
			$(".report_option").css("display","block");
		});
		/*Script For photo Popup*
		$(".delete").click(function(){
				$(".slider-container-fadebox").css("display","block");
			});
		$(".cancle").click(function(){
				$(".slider-container-fadebox").css("display","none");
			});
		$(".photo-public").click(function(){
				$(".slider-container-fadebox-1").css("display","block");
			});
		$(".ok").click(function(){
				$(".slider-container-fadebox-1").css("display","none");
			});
		$(".change-photo").click(function(){
				$(".slider-container-fadebox-2").css("display","block");
			});
		$(".ok-1").click(function(){
				$(".slider-container-fadebox-2").css("display","none");
			});
		$(".make-private").click(function(){
				$(".slider-container-fadebox-3").css("display","block");
			});
		$(".ok-2").click(function(){
				$(".slider-container-fadebox-3").css("display","none");
		});
		*/
		//My Photos Dropdown//
		$(".prof_dpdwn1").click(function(){
			var prof_dropdown = $(".prof_drop_dwn1").css("display");
			if(prof_dropdown == 'none'){
			$(".prof_drop_dwn1").css("display","block");}
			else{
				$(".prof_drop_dwn1").css("display","none");
			}
		});
	});
	</script>


	<!--Custom Select Dropdown-->
	<script>
	$(document).ready(function(){
		$(".filter ul.p_areas li.active").show();
		$(".filter ul.p_areas li:first").click(function(){
			$(this).siblings("li.p_area").removeClass("active").slideDown();
			$(this).siblings("li:last").slideUp();
		});
		$(".filter ul.p_areas li").last().click(function(){
			$(this).slideUp();
			$(this).siblings("li").slideDown();
		});
		$(".filter ul.p_areas li.p_area").click(function(){
			$(this).siblings("li.p_area").removeClass("active").slideUp();
			$(this).addClass("active");
			$(this).siblings("li:last").slideDown();
		})
		// 2
		$(".filter1 ul.p_areas li.active").show();
		$(".filter1 ul.p_areas li:first").click(function(){
			$(this).siblings("li.p_area").removeClass("active").slideDown();
			$(this).siblings("li:last").slideUp();
		});
		$(".filter1 ul.p_areas li").last().click(function(){
			$(this).slideUp();
			$(this).siblings("li").slideDown();
		});
		$(".filter1 ul.p_areas li.p_area").click(function(){
			$(this).siblings("li.p_area").removeClass("active").slideUp();
			$(this).addClass("active");
			$(this).siblings("li:last").slideDown();
		})
		
		
		//common for both
		$(".down_arrow_btn").click(function(){
			$(this).siblings("ul.p_locations").slideToggle();
		});
		$(".p_locations li a").click(function(){
			var location_data = $(this).text();
			$(this).closest(".p_locations").slideUp();
			$(this).closest(".p_locations").siblings('input.ploc_input').attr("value" , location_data);
			$(this).closest(".p_locations").siblings('.input_box').text(location_data);
		});
	});
	</script>
	<!--End Custom Select Dropdown-->

	<script>
	//check box click
	$(document).ready(function(){
		$(".check1").click(function(){
			var span=$(this).next('span').attr('class');
			//$("."+span+" i").toggleClass("fa-check-square checked_gr");
			$(this).next('span').children('i').toggleClass("fa-check-square checked_gr");
		});
		
		
	});
	</script>
	
	
	<!--Photo Slider Control-->
	<script>
		$(document).ready(function(){
		  var divCountimg = $(".slider3 div.slide").length;
			if(($(".slider3 div.slide").length) <= 3 ){
				$(".bx-controls-direction").hide();
				$(".pro-photos").css("width","25%");
			}
			//if 6 or less then 6 OR more then 3 
			if(($(".slider3 div.slide").length) <= 6 &&  ($(".slider3 div.slide").length) > 3){
				$(".bx-controls-direction").hide();
				$(".pro-photos").css("width","50%");
				$(".pro-photos.toadd").css("width","25%");
				$(".toadd.adone").hide();
			}if(($(".slider3 div.slide").length) <= 9 &&  ($(".slider3 div.slide").length) > 6){
				$(".bx-controls-direction").hide();
				$(".pro-photos").css("width","75%");
				$(".pro-photos.toadd").css("width","25%");
				$(".toadd.adone, .toadd.adtwo").hide();
			}
			if(($(".slider3 div.slide").length) > 9){
				$(".bx-controls-direction").show();
				$(".pro-photos").css("width","75%");
				$(".pro-photos.toadd").css("width","25%");
				$(".toadd.adone, .toadd.adtwo").hide();
			}
			
			//$(".js-example-basic-multiple").select2();
		});
		
		
	</script>
	<script>
$(window).load(function(){
		//onload show click to close
       $('.email-sent-1').css("display","block");
		$(".btn-close-x-1").click(function(){
				$(".email-sent-1").css("display","none");
			});
		$('.email-sent').css("display","block");
		$(".btn-close-x").click(function(){
				$(".email-sent").css("display","none");
			});
			//$('.profile-picture').css("display","block");
		$(".btn-close-x-01").click(function(){
				$(".profile-picture").css("display","none");
			});
			//$('.extra-display').css("display","block");
		$(".btn-close-x-02").click(function(){
				$(".extra-display").css("display","none");
			});
			//$('.go-vip').css("display","block");
		$(".btn-close-x-03").click(function(){
				$(".go-vip").css("display","none");
			});
			//$('.rise-up').css("display","block");
		$(".btn-close-x-04").click(function(){
				$(".rise-up").css("display","none");
			});
			//$('.rise-up-1').css("display","block");
		$(".btn-close-x-05").click(function(){
				$(".rise-up-1").css("display","none");
			});
});
</script>

