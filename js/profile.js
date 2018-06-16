$(function(){	$('#import-from-fb').oauthpopup({		path: 'social/login.php?importFb',		width:600,		height:300,   });	$("#dob").datepicker({ 		autoclose: true, 		todayHighlight: true,		orientation: "top",		endDate: '-0d',			format: 'dd-mm-yyyy',		startView: 2	});	$("#dob").change(function(){		var dob = $(this).val().split('-');		var d = new Date();		var n = d.getFullYear();		var age = parseFloat(n) - parseFloat(dob[2]);		if(parseFloat(age) > 18){			$('#dob_div').html('');			$('#dob_div').html('Your age is <strong>'+age+' years</strong>').css('color' , '#b1b5b8');		}else {			$('#dob_div').html('You must be at least 18 year old to register.').css('color' , 'red');			$('#dob').val('');		}	});	$('#donePerInfo').click(function(){		$('#preloader').show();		var user_name=$('#username').val();		if($("input[name='gender']").is(':checked')){			var gender=$("input[name='gender']:checked").val();		}else {			var gender = '';		}		var dob=$('#dob').val();		var location=$('#location').val();		var location_lat=$('#locationlat').val();		var location_lon=$('#locationlon').val();		var here_to=$('#hereto').val();		if(user_name == ''){			$('#preloader').hide();			$('#error_first_regist').html('Please complete all fields to continue');			$('#username').focus();			return false;		}		if(gender == ''){			$('#preloader').hide();			$('#error_first_regist').html('Please complete all fields to continue');			$("input[name='gender']").focus();			return false;		}		if(dob == ''){			$('#preloader').hide();			$('#error_first_regist').html('Please complete all fields to continue');			$('#dob').focus();			return false;		}		if(location == ''){			$('#preloader').hide();			$('#error_first_regist').html('Please complete all fields to continue');			$('#location').focus();			return false;		}		if(location_lat==''&&location_lon==''){            $('#preloader').hide();            $('#error_first_regist').html('Your location was not saved correctly. Please re-select from the drop down');            $('#location').focus();            return false;        }		if(here_to == ''){			$('#preloader').hide();			$('#error_first_regist').html('Please complete all fields to continue');			$("#hereto").focus();			return false;		}		$.ajax({			type:"POST",			url:"ajax/profile.php",			data:{user_name:user_name,gender:gender,dob :dob,location:location,location_lat:location_lat,location_lon:location_lon,here_to:here_to,action:'savePersonalInfo'},			success:function(result){				$('#preloader').hide();				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.please try again.');					$('#alert_modal').modal('show');				}else if(result == 1){					$('#userName').html(user_name);					var displaydob = $('#dob').val().split('-');					var d = new Date();					var n = d.getFullYear();					var age = parseFloat(n) - parseFloat(displaydob[2]);					$('#userDob').html(' , ' +age);					if(here_to==1) {						$('#here-to-content').html('Explore Marriage Options');					}					else if(here_to==2)					{						$('#here-to-content').html('Make New Friends');					}					else if(here_to==3)					{						$('#here-to-content').html('Chat');					}						$('#myModal2').modal('show');										$('#myModal3').modal('hide');				}			}		});		return false;	});	$('.here_to_options').click(function(){		var option = $(this).data('id');		$('#hereto').val(option);		return false;	});	/*Updates by Chitra 23/05/2017 for checking restricted user names*/		$("#username").on('blur',function(){		/*alert(this.value);*/		var username = this.value;		if(username != ''){			$.ajax({				type:"POST",				url:"ajax/edit-profile.php",				data:{username:username, action:'checkusername'},				success:function(result){					/*console.log("Res >>>> ---- "+result);*/					if(result == '1'){						$('#error_first_regist').html("Username not acceptable. Please try another username.");						$("#username").focus();						$("#username").val("");						return false;					}					else{						$('#error_first_regist').html("");					}				}			});		}	});/*/###############################EDIT PROFILE##############################################*/	$("#user_dob").datepicker({ 		autoclose: true, 		todayHighlight: true,		orientation: "top",		endDate: '-0d',		format: 'dd-mm-yyyy',		startView: 2	});	var here_age_min = $('#here_age_min').val();	var here_age_max = $('#here_age_max').val();	if(here_age_min != 0)		var min_value=here_age_min;	else		var min_value = 18;	if(here_age_max != 0)		var max_value=here_age_max;	else		var max_value = 100;			$( "#slider-range" ).slider({		range: true,		min: 18,		max: 100,		values: [ min_value, max_value ],		slide: function( event, ui ) {			$("#amount").val( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );			$('#here_age_min').val(ui.values[0]);			$('#here_age_max').val(ui.values[1]);		}	});	$( "#amount" ).val( "" + $( "#slider-range" ).slider( "values", 0) + " - " + $( "#slider-range" ).slider( "values", 1 ) );	$('.here_to').click(function(){		var option = $(this).data('id');		$('#here_to').val(option);	});	$('.relationship_status').click(function(){		var option = $(this).data('id');		$('#relationship_status').val(option);	});	$('.star_sign').click(function(){		var option = $(this).data('id');		$('#star_sign').val(option);	});	$('.sexuality').click(function(){		var option = $(this).data('id');		$('#sexuality').val(option);	});	$('.body_type').click(function(){		var option = $(this).data('id');		$('#body_type').val(option);	});	$('.complexion').click(function(){		var option = $(this).data('id');		$('#complexion').val(option);	});	$('.eye_color').click(function(){		var option = $(this).data('id');		$('#eye_color').val(option);	});	$('.hair_color').click(function(){		var option = $(this).data('id');		$('#hair_color').val(option);	});	$('.language').click(function(){		var option = $(this).data('id');		$('#language').val(option);	});	$('.kids').click(function(){		var option = $(this).data('id');		$('#kids').val(option);	});	$('.education').click(function(){		var option = $(this).data('id');		$('#education').val(option);	});	$('.income').click(function(){		var option = $(this).data('id');		$('#income').val(option);	});	/*/#####################HEIGHT###############################*/	$('#height_div').on('click' , '#convert_to_feet' ,function(){		var height=$('#height').val();		var realFeet = ((height*0.393700) / 12);		var feet = Math.floor(realFeet);		var inches = Math.round((realFeet - feet) * 12);		$('#feet').val(feet);		$('#inches').val(inches);		$(this).hide();		$('#cm_div').hide();		$('#feet_div').show();		$('#convert_to_cm').show();	});	$('#height_div').on('click' , '#convert_to_cm' ,function(){		var feet=parseInt($('#feet').val());		var inches=parseInt($('#inches').val());		var inchVal = parseFloat(parseFloat(feet * 12) + inches);		var cm = Math.ceil(parseFloat(inchVal * 2.54));		$('#height').val(cm);		$(this).hide();		$('#feet_div').hide();		$('#cm_div').show();		$('#convert_to_feet').show();			});	/*/################BASIC INFORMATION#######################*/	$('#edit-basic-info').click(function(){		$('#basic-info-edit').show();		$('#basic-info-view').hide();		return false;	});	$('#basic-info-edit').on('click' , '#cancel-basic-info' , function(){		$('#basic-info-edit').hide();		$('#basic-info-view').show();		return false;	});	$('#basic-info-edit').on('click' , '#save-basic-info' , function(e){		var username=$("#user_name").val();		//var username = this.value;		if(username != ''){			$.ajax({				type:"POST",				url:"ajax/edit-profile.php",				data:{username:username, action:'checkusername'},				success:function(result){					//console.log("res ---- "+result);					if(result == 1){						//alert('test');						//$("#preloader").show();						$('#user_name_error').html("Username not available. Please use a different one.");						$("#user_name").focus();						$("#user_name").val("");						$("#preloader").hide();						e.preventDefault();						return false;					}					else{						$("#user_name").val(username);						$('#user_name_error').html("");						$('#preloader').show();		var user_name = $('#user_name').val();		if(user_name == ''){			$('#user_name_error').html('Please enter your name!');			$('#preloader').hide();			return false;		}		else{			$('#user_name_error').html('');		}		var dob = $('#user_dob').val();		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{user_name:user_name,dob:dob , action:'saveBasicInfo'},			success:function(result){				$('#preloader').hide();				var res = jQuery.parseJSON(result);				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again');					$('#alert_modal').modal('show');				}else if(result == 2){					$('#user_name_error').html('Please enter your name!');				}else{					$('#basic-info-edit').hide();					$('#basic-info').html(res['view']);					$('#basic-info-edit').html(res['edit']);					$('#basic-info-view').show();					$("#user_dob").datepicker({ 						autoclose: true, 						todayHighlight: true,						orientation: "top",						endDate: '-0d',						format: 'dd-mm-yyyy',						startView: 2					});				}			}		});		return false;						//return true;					}				}			});		}	});	/* Updates by Chitra, 24/05/2017 	$("#user_name").on('keyup',function(){		//alert("Chitra");return false;		var username=$("#user_name").val();		//var username = this.value;		if(username != ''){			$.ajax({				type:"POST",				url:"ajax/edit-profile.php",				data:{username:username, action:'checkusername'},				success:function(result){					//console.log("res ---- "+result);					if(result == 1){						//$("#preloader").show();						$('#user_name_error').html("Username not available. Please use a different one.");						$("#user_name").focus();						$("#user_name").val("");						//$("#preloader").hide();						//e.preventDefault();						return false;					}					else{						$("#user_name").val(username);						$('#user_name_error').html("");						//return true;					}				}			});		}		//return false;	});*/	/*/######################HERE TO######################################*/	$('#edit-here-to').click(function(){		$('#here-to-edit').show();		$('#here-to-view').hide();		return false;	});	$('#cancel-here-to').click(function(){		$('#here-to-edit').hide();		$('#here-to-view').show();		return false;	});	$('#save-here-to').click(function(){		var here_to = $('#here_to').val();		var here_age_min = $('#here_age_min').val();		var here_age_max = $('#here_age_max').val();		if($("#here_with_girl").prop('checked') == true){			var here_with_girl = 1;		}else {			var here_with_girl = 0 ;		}		if($("#here_with_guy").prop('checked') == true){			var here_with_guy = 1;		}else {			var here_with_guy = 0 ;		}		$('#preloader').show();		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{here_to:here_to,here_with_girl:here_with_girl,here_with_guy:here_with_guy,here_age_min:here_age_min,here_age_max:here_age_max , action:'saveHereTo'},			success:function(result){				$('#preloader').hide();				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again');					$('#alert_modal').modal('show');				}else{					var res = jQuery.parseJSON(result);					if(res[0] == 1){						$('#here-to-edit').hide();						$('#here-to-content').html(res[1]);						$('#here-to-view').show();					}				}			}		});		return false;	});		/*/######################LOCATION######################################*/	$('#edit-location').click(function(){		var location_lat = $('#location_lat').val();		var location_lon = $('#location_lon').val();		$('#location-edit').show();		$('#location-view').hide();		initMap(location_lat , location_lon);		return false;	});	$('#cancel-location').click(function(){		var location_lat = $('#location_lat').val();		var location_lon = $('#location_lon').val();		$('#location-edit').hide();		$('#location-view').show();		initMap(location_lat , location_lon);		return false;	});	$('#save-location').click(function(){		var location = $('#pac-input').val();		var location_lat = $('#location_lat').val();		var location_lon = $('#location_lon').val();		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{location:location,location_lat:location_lat,location_lon:location_lon,action:'saveLocation'},			success:function(result){				$('#location-edit').hide();				$('#location-view').show();				initMap(location_lat , location_lon);				window.location.href='';			}		});		return false;	});	/*/################INTEREST#################################*/	$('#edit-interest').live('click' , function(){		$('#interest-edit').show();		$('#interest-view').hide();		return false;	});	$('#cancel-interest').click(function(){		$('#interest-edit').hide();		$('#interest-view').show();		return false;	});	$('#add_new_interest_popup').live('click' , function(){		var interest = $(this).attr('data-value');		$('#interest_value').html(interest);		$('#new_interest').modal('show');		return false;	});	$('#save_new_interest').live('click' , function(){		var interest = $('#interest_value').html();		var category =$("input:radio[name=category]:checked").val().split('$$$');		$.ajax({			type:"POST",			url:"ajax/profile.php",			data:{interest:interest , category:category[0] ,category_icon : category[1] ,action:'saveNewInterest'},			success:function(result){				if(result == 1){					$('.filterinput').val('')					$('#new_interest').modal('hide');					$('#interest_confirmation').modal('show');				}else{					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again.');					$('#alert_modal').modal('show');				}			}		});		return false;	});	$('#save-interest').live('click' , function(){		var interest = [];		$('input[type=hidden][name="interest_hidden[]"]').each(function(){			interest.push($(this).val());		});		var count = interest.length;		/*if(count == 0){			$('#error_message_header').html('Alert');			$('#error_message').html('Please select atleast one interest.');			$('#alert_modal').modal('show');			return false;		}*/		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{interest:interest ,action:'saveInterest'},			success:function(result){				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again.');					$('#alert_modal').modal('show');				}else{					response = jQuery.parseJSON(result);					$('input[type=hidden][name="interest_hidden[]"]').each(function(){						$(this).remove();					});										if(count == 0){						$('#interests-alert').html('Add your interests here to get found by like minded people');					}					else{						$('#interests_opn').html(response['edit']);						//$('#getCount').html(count);						$.ajax({							type:"POST",							url:"ajax/edit-profile.php",							data:{interest:interest ,action:'countInterest'},							success:function(res){								/*console.log(res);*/								$('#getCount').html(res);							}						});					}					$('.filterinput').val('')					$('#interest-view').show().html(response['view']);					$('#interest-edit').hide();				}			}		});		return false;	});	$("#interest-edit").on('click' ,'.interest-section' ,function(){		var interest_class = $(this).attr('data-title');		var interest = $(this).attr('data-value');		var interest_id = $(this).attr('data-id');		var interestArr = [];		$('input[type=hidden][name="interest_hidden[]"]').each(function(){			interestArr.push($(this).val());		});		if(jQuery.inArray(interest_id , interestArr) == -1){			interestArr.push(interest_id);			$("#interests_opn").prepend('<li class="alert-dismissible" role="alert"><a href="javascript:void(0)"><span class="'+interest_class+'"></span><p>'+interest+'</p><i class="fa fa-times close_interest" id="close_interest-'+interest_id+'" data-dismiss="alert" aria-label="Close"></i></a></li>');			$('#interests_opn').after('<input type="hidden" name ="interest_hidden[]" value="'+interest_id+'">');			$('.filterinput').val('')		}	});		$('#add_new_interset1').live('click' , function(){		$('#interest-manually').show();	});		$(".close_interest").live('click' ,function(){		var interest_id = $(this).attr('id').split('-');		$('input[type=hidden][name="interest_hidden[]"]').each(function(){			if($(this).val() == interest_id[1]){				$(this).remove();			}		});	});	$(".delete_interest").live('click' , function(){		var interest_id = $(this).attr('id').split('-');		$.ajax({			type:"POST",			url:"ajax/profile.php",			data:{user_interest_id:interest_id[1],action:'deleteInterest'},			success:function(result){				if(result == 1){					//$(this).parent('a').parent('li').hide();				}else{					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again.');					$('#alert_modal').modal('show');				}			}		});		return false;	});	/*/################LOOKING FOR#################################*/	$('#edit-looking-for').click(function(){		$('#looking-for-edit').show();		$('#looking-for-view').hide();		return false;	});	$('#cancel-looking-for').click(function(){		$('#looking-for-edit').hide();		$('#looking-for-view').show();		return false;	});	$('#lookingForTextarea').keyup(function(){		var value = $(this).val();		var len = value.length;		$('#count_lookingfor').text(len+'/1000');		if(len == 80) {			$('#looking-for-check').show();		}else if(len < 80){			$('#looking-for-check').hide();		}	});	$('#save-looking-for').click(function(){		$('#preloader').show();		var value = $('#lookingForTextarea').val();		var lookingFor = $.trim(value);				/*if(lookingFor == ''){			$('#error_message_header').html('Alert');			$('#error_message').html('Please enter Looking for');			$('#alert_modal').modal('show');			$('#preloader').hide();			return false;			}*/		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{looking_for:lookingFor , action:'saveLookingFor'},			success:function(result){				$('#preloader').hide();				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again');					$('#alert_modal').modal('show');				}else{					if(lookingFor == ''){						$('#looking-for-text').html('Let others know what sort of person you are looking to meet');					}					else{						$('#looking-for-text').html(lookingFor);					}										$('#looking-for-edit').hide();					$('#looking-for-view').show();				}			}		});		return false;	});		/*/################ABOUT ME#####################################*/	$('#aboutMeTextarea').keyup(function(){		var value = $(this).val();		var len = value.length;		$('#count_aboutme').text(len+'/1000');		if(len == 80) {			$('#about-me-check').show();		}else if(len < 80){			$('#about-me-check').hide();		}	});	$('#edit-about-me').click(function(){		$('#about-me-edit').show();		$('#about-me-view').hide();		return false;	});	$('#cancel-about-me').click(function(){		$('#about-me-edit').hide();		$('#about-me-view').show();		return false;	});	$('#save-about-me').click(function(){		$('#preloader').show();		var value = $('#aboutMeTextarea').val();		var aboutMe = $.trim(value);		/*if(aboutMe == ''){			$('#error_message_header').html('Alert');			$('#error_message').html('Please enter about me');			$('#alert_modal').modal('show');			$('#preloader').hide();			return false;		}*/		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{aboutMe:aboutMe , action:'saveAboutMe'},			success:function(result){				$('#preloader').hide();				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again');					$('#alert_modal').modal('show');				}				else{					if(aboutMe == ''){						$('#about-me-text').html('Tell everyone a little a bit about yourself');						}						else{						$('#about-me-text').html(aboutMe);					}					$('#about-me-edit').hide();					$('#about-me-view').show();				}			}		});		return false;	});		/*/################PERSONAL INFO####################################*/	$('#edit-personal-info').click(function(){		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{action:'getPercentage'},			success:function(percResult){					$("#profPer").html(percResult);					$(".progress-bar").attr("style","width:"+percResult+"%");				}			});		$('#personal-info-edit').show();		$('#personal-info-view').hide();		return false;	});	$('#cancel-personal-info').click(function(){		$('#personal-info-edit').hide();		$('#personal-info-view').show();		return false;	});	$('#save-personal-info').click(function(){		$('#preloader').show();		var relationship_status = $('#relationship_status').val();		var sexuality = $('#sexuality').val();		var star_sign = $('#star_sign').val();		var body_type = $('#body_type').val();		var complexion = $('#complexion').val();		var height = $('#height').val();		var eye_color = $('#eye_color').val();		var hair_color = $('#hair_color').val();		var smoking = $('input:radio[name="smoking"]:checked').val();		var drinking = $('input:radio[name="drinking"]:checked').val();		var kids = $('#kids').val();		var education = $('#education').val();		var work = $('#work').val();		var income = $('#income').val();		var company = $('#company').val();		/**************language*****************************/		var langArr = [];		$(".language:checked").each(function(){			langArr.push($(this).val());		});		if(langArr.length > 5){			$('#error_message_header').html('Alert');			$('#error_message').html('Please select maximum 5 language.');			$('#alert_modal').modal('show');			$('#preloader').hide();			return false;		}		$.ajax({			type:"POST",			url:"ajax/edit-profile.php",			data:{sexuality:sexuality,relationship_status:relationship_status, star_sign:star_sign, body_type:body_type, complexion:complexion, height:height, eye_color:eye_color, hair_color:hair_color, language:langArr.join(','), smoking:smoking, drinking:drinking, kids:kids, education:education, work:work, income:income, company:company, action:'savePersonalInfo'},			success:function(result){				$('#preloader').hide();				if(result == 0){					$('#error_message_header').html('Alert');					$('#error_message').html('Problem in network.Please try again');					$('#alert_modal').modal('show');				}else{					$('#personal-information').html(result);					$('#personal-info-edit').hide();					$('#personal-info-view').show();									}			}		});		return false;	});		/* kapil */	$('#lookingForTextarea, #aboutMeTextarea').data('holder',$('#lookingForTextarea, #aboutMeTextarea').attr('placeholder'));    $('#lookingForTextarea, #aboutMeTextarea').focusin(function(){        $(this).attr('placeholder','');    });    $('#lookingForTextarea, #aboutMeTextarea').focusout(function(){        $(this).attr('placeholder',$(this).data('holder'));    });		$("#re_enter_mobile").click(function(){		$("#mobileVerificationForm").fadeOut('slow');		$("#mobileNumberForm").fadeIn('slow');		$("#mobile_number").select();	})});