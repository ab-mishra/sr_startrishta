function findLocation(name){
	
	$('#location-user-name').html(name);
	$('#search_location').modal('show');
	
}
function getLocation(){
	if (navigator.geolocation){
		navigator.geolocation.getCurrentPosition(showPosition,showError);
	}
	else{
		$('#near_location').html("Geolocation is not supported by this browser.");
	}
}
function showPosition(position){
	//$('#near_location').htm("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);   
	$.ajax({
		type:"POST",
		url:"ajax/search.php",
		data:{action:'enableLocationService'},
		success:function(result){
			if(result== 0){
				$('#error_message_header').html('Alert');
				$('#error_message').html('Problem in network.Please try again');
				$('#alert_modal').modal('show');
			}else{
				window.location.href='search.php';
			}
		}
	});
}
function showError(error){
	$('#near_location').html("Geolocation is not supported by this browser.");
}
function initMap() {
	var input = /** @type {!HTMLInputElement} */(
	document.getElementById('pac-input1'));
	var autocomplete = new google.maps.places.Autocomplete(input);
	var infowindow = new google.maps.InfoWindow();
  
	autocomplete.addListener('place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      window.alert("Autocomplete's returned place contains no geometry");
      return;
    }
	$('#location_lat').val(place.geometry.location.lat());
	$('#location_lon').val(place.geometry.location.lng());
  });
}

function listFilter(header, list) { 
	var form = $("<form>").attr({"class":"filterform","action":"#"}),
					input = $("<input>").attr({"class":"filterinput","type":"text","id":"serInterestInput"});
	$(form).append(input).appendTo(header);
	$(input)
	.keyup( function () {
		var filter = $(this).val();
		$.ajax({
			type:"POST",
			url:"ajax/search.php",
			data:{interestFilter:filter , action:'interestFilter'},
			success:function(result){
				$('#list').html(result);
			}
		});
		return false;
	});
}
$(function(){
	listFilter($("#header"), $("#list"));
	
	$('#extended_search').click(function(){
		$(this).hide();
		$('#extended_search_div').show();
		$('#basic_search').show();
		
	});
	$('#basic_search').click(function(){
		$(this).hide();
		$('#extended_search_div').hide();
		$('#extended_search').show();
		
	});
	$('#reset_search').click(function(){
		$.ajax({
			type:"POST",
			url:"ajax/search.php",
			data:{action:'resetSearch'},
			success:function(result){
				if(result == 1){
					window.location.href="";
				}else {
					$('#error_message_header').html('Alert');
					$('#error_message').html('Problem in network.Please try again.');
					$('#alert_modal').modal('show');
				}
			}
		});
		return false;
	});
	$('.close_search').live('click' , function(){
		$(this).next('.search_criteria').val('');
		$(this).next('.search_criteria').addClass('slect-arrow');
		$(this).addClass('d_none');
		$(this).next().next().next('.search-select-option').html('');
	});
	$('#OtherLanguage').live('click',function(){
		$('#selectLanguage').toggleClass('d_none');
	});
	$('#convert_to_feet').live('click',function(){
		var min_height=$('#min_height').val();
		var max_height=$('#max_height').val();
		var min_realFeet = ((min_height*0.393700) / 12);
		var max_realFeet = ((max_height*0.393700) / 12);
		var min_feet = Math.floor(min_realFeet);
		var max_feet = Math.floor(max_realFeet);
		var min_inch = Math.round((min_realFeet - min_feet) * 12);
		var max_inch = Math.round((max_realFeet - max_feet) * 12);
		$('#min_feet').val(min_feet);
		$('#min_inch').val(min_inch);
		$('#max_feet').val(max_feet);
		$('#max_inch').val(max_inch);
		$(this).hide();
		$('#cm_div').hide();
		$('#feet_div').show();
		$('#convert_to_cm').show();
	});
	$('#convert_to_cm').live('click' ,function(){
		var min_feet=parseInt($('#min_feet').val());
		var max_feet=parseInt($('#max_feet').val());
		var min_inch=parseInt($('#min_inch').val());
		var max_inch=parseInt($('#max_inch').val());
		var min_inchVal = parseFloat(parseFloat(min_feet * 12) + min_inch);
		var max_inchVal = parseFloat(parseFloat(max_feet * 12) + max_inch);
		var min_cm = Math.ceil(parseFloat(min_inchVal * 2.54));
		var max_cm = Math.ceil(parseFloat(max_inchVal * 2.54));
		$('#min_height').val(min_cm);
		$('#max_height').val(max_cm);
		$(this).hide();
		$('#feet_div').hide();
		$('#cm_div').show();
		$('#convert_to_feet').show();
		
	});
	$(".btn_intst").click(function(){
		//var interest = $(this).children('p').html();
		var interest_class = $(this).attr('title');
		var interest = $(this).attr('data-value');
		var interest_id = $(this).attr('data-id');
		var interest_ids = $('#hiddenSearchInterest').val();
		interest_ids = interest_ids + ',' + interest_id;
		$('#hiddenSearchInterest').val(interest_ids);
		$("#interests_opn").prepend('<li class="alert-dismissible" role="alert"><a href="javascript:void()"><span class="'+interest_class+'"></span><p>'+interest+'</p><i class="fa fa-times close_interest" id="close_interest-'+interest_id+'" data-dismiss="alert" aria-label="Close"></i></a></li>');
		
		$('#interest_li-'+interest_id).hide();
	});
	$(".close_interest").live('click' ,function(){
		var interest_id = $(this).attr('id').split('-');
		$('#interest_li-'+interest_id[1]).show();
	});

	//age Range Code//
	var here_age_min = $('#here_age_min').val();
	var here_age_max = $('#here_age_max').val();
	if(here_age_min != 0)
		var min_value=here_age_min;
	else
		var min_value = 18;
	if(here_age_max != 0)
		var max_value=here_age_max;
	else
		var max_value = 80;
	$( "#age-slider-range" ).slider({
		  range: true,
		  min: 18,
		  max: 80,
		  values: [ min_value, max_value ],
		  slide: function( event, ui ) {
			$("#age-amount").html( "" + ui.values[ 0 ] + " - " + ui.values[ 1 ] );
			$('#here_age_min').val(ui.values[0]);
			$('#here_age_max').val(ui.values[1]);
		  }
	});
	$( "#age-amount" ).html( "" + $( "#age-slider-range" ).slider( "values", 0) + " - " + $( "#age-slider-range" ).slider( "values", 1 ) );		

	/****************LOCATION SLIDER RANGE******************/
	$( "#location-slider-range" ).slider({
		range: true,
		min: 0,
		max: 100,
		values: [ 0, 30 ],
		slide: function( event, ui ) {
			$("#miles-amount").html( "Within " + ui.values[ 1 ] + " miles " );
			$('#miles').val(ui.values[1]);
		}
	});
	
});
