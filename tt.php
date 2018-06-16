<html>
<head></head>
<body>
<div class="clearfix">
		<h3><span>Select Address</span></h3>
		<div id="locationField">
			<input id="autocomplete2" class="form-control" placeholder="Enter your address" onFocus="geolocate()" name="google_address" type="text"></input>
		</div>
	</div>
<div class="clearfix"></div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Zip Code<span style="color:#F00;">*</span></label>
				<input type="text" class="form-control" placeholder="PinCode" id="postal_code_2" name="postal_code_2">
			</div>
		</div>
		<div id="getpincode">
			<div class="col-sm-4">
				<div class="form-group">
					<label>Country<span style="color:#F00;">*</span></label>
					<input type="text" class="form-control" id="country_2" placeholder="Country" name="country_2">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>State<span style="color:#F00;">*</span></label>
					<input type="text" class="form-control"  id="administrative_area_level_1_2" name="administrative_area_level_1_2" placeholder="State">
				</div>
			</div>
			<div class="col-lg-4">
				<div class="form-group">
					<label>District<span style="color:#F00;">*</span></label>
					<input type="text" class="form-control" id="district_2" placeholder="District" name="district_2">
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" placeholder="City" id="locality_2" name="locality_2">
			</div>
		</div>
		<div class="col-lg-4">
			<div class="form-group">
				<label>Town/ Village/ Locality</label>
				<input type="text" class="form-control" id="sublocality_level_1d" name="sublocality_level_1d" placeholder="Village">
			</div>
		</div>
		
		
		<div class="col-lg-6">
			<div class="form-group">
				<label> Street 1 <span style="color:#F00;">*</span></label>
				 <textarea class="form-control" placeholder="Type  Address 1 here..." id="street_number_2" name="street_number_2" rows="3"></textarea>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="form-group">
				<label>Street 2</label>
				 <textarea class="form-control" placeholder="Type  Address 2 here..." id="route_2" name="route_2" rows="3"></textarea>
			</div>
		</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCm8qtPeYpDYaAxh5Fy5IgpEXEPvhMXea0&libraries=places,geometry&callback=initAutocomplete" async defer></script>

<script>   
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

		var placeSearch, autocomplete,autocomplete2;
		var componentForm = {
			street_number: 'short_name',
			route: 'long_name',
			sublocality_level_1: 'short_name',
			locality: 'long_name',
			administrative_area_level_1: 'short_name',
			hcountry: 'long_name',
			postal_code: 'short_name'
		};
		var componentForm2 = {
			street_number: 'short_name',
			route: 'long_name',
			locality: 'long_name',
			administrative_area_level_1: 'short_name',
			country: 'long_name',
			postal_code: 'short_name'
		};

		function initAutocomplete() {
		// Create the autocomplete object, restricting the search to geographical
        // location types.
			autocomplete = new google.maps.places.Autocomplete(
				/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});
			
			autocomplete2 = new google.maps.places.Autocomplete(
				/** @type {!HTMLInputElement} */(document.getElementById('autocomplete2')),
			{types: ['geocode']});	

			// When the user selects an address from the dropdown, populate the address
			// fields in the form.
			autocomplete.addListener('place_changed', fillInAddress);
			autocomplete2.addListener('place_changed', fillInAddress2);
		}

		function fillInAddress() {
			// Get the place details from the autocomplete object.
			var place = autocomplete.getPlace();
			//alert (JSON.stringify(place));
			for (var component in componentForm) {
				document.getElementById(component).value = '';
				document.getElementById(component).disabled = false;
			}
			// Get each component of the address from the place details
			// and fill the corresponding field on the form.
			for (var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm[addressType]) {
					var val = place.address_components[i][componentForm[addressType]];
					document.getElementById(addressType).value = val;
					var latitude = place.geometry.location.lat();
					var longitude = place.geometry.location.lng(); 
					document.getElementById('lat').value = latitude;
					document.getElementById('lng').value = longitude;
					$("#postal_code").focus();
					document.getElementById('selectaddress').value = '1';
					if(document.getElementById('lng').value != '')
					{
						document.getElementById('latlonstatus').value = '1';
					}
				}
			}
		}
		function fillInAddress2() {
			// Get the place details from the autocomplete object.
			var place = autocomplete2.getPlace();
			//alert (JSON.stringify(place));
			for (var component in componentForm2) {
				document.getElementById(component+'_2').value = '';
				document.getElementById(component+'_2').disabled = false;
			}
			//alert(latitude);
			//alert(longitude);
			for (var i = 0; i < place.address_components.length; i++) {
				var addressType = place.address_components[i].types[0];
				if (componentForm2[addressType]) {
					var val = place.address_components[i][componentForm2[addressType]];
					document.getElementById(addressType+'_2').value = val;
					var latitude = place.geometry.location.lat();
					var longitude = place.geometry.location.lng(); 
					document.getElementById('lat_2').value = latitude;
					document.getElementById('lng_2').value = longitude;
					$("#postal_code_2").focus();
					document.getElementById('selectaddress2').value = '1';
					if(document.getElementById('lng_2').value != '')
					{
						document.getElementById('latlonstatus2').value = '1';
					}
				}
			}	
		}
		// Bias the autocomplete object to the user's geographical location,
		// as supplied by the browser's 'navigator.geolocation' object.
		function geolocate() {
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var geolocation = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};
					var circle = new google.maps.Circle({
						center: geolocation,
						radius: position.coords.accuracy
					});
					autocomplete.setBounds(circle.getBounds());
					autocomplete2.setBounds(circle.getBounds());
				});
			}
		}
</script>
</body>
</html>