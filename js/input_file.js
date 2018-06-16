	function handleFileSelect(evt) {
		var files = evt.target.files; // FileList object
		// Loop through the FileList and render image files as thumbnails.
		var k=0;
		for (var i = 0, f; f = files[i]; i++) {

		  // Only process image files.
		  if (!f.type.match('image.*')) {
			continue;
		  }

		  var reader = new FileReader();
			
		  // Closure to capture the file information.
		  reader.onload = (function(theFile) {
			return function(e) {
			  // Render thumbnail.
			  k++;
			  var span = document.createElement('span');
			  span.setAttribute("id", "image-"+k);
			  span.innerHTML = ['<a class="remove-image" id="remove-image-'+k+'"></a><img class="thumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('list').insertBefore(span, null);
			};
		  })(f);

		  // Read in the image file as a data URL.
		  reader.readAsDataURL(f);
		}
	  }

	  document.getElementById('files').addEventListener('change', handleFileSelect, false);
	  
	  
	  
	  
	  
	  function handleFileSelect1(evt) {
		var files = evt.target.files; // FileList object
		// Loop through the FileList and render image files as thumbnails.
		var k=0;
		for (var i = 0, f; f = files[i]; i++) {

		  // Only process image files.
		  if (!f.type.match('image.*')) {
			continue;
		  }

		  var reader = new FileReader();
			
		  // Closure to capture the file information.
		  reader.onload = (function(theFile) {
			return function(e) {
			  // Render thumbnail.
			  k++;
			  var span = document.createElement('span');
			  span.setAttribute("id", "image1-"+k);
			  span.innerHTML = ['<a class="remove-image1" id="remove-image1-'+k+'"></a><img class="thumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('list1').insertBefore(span, null);
			};
		  })(f);

		  // Read in the image file as a data URL.
		  reader.readAsDataURL(f);
		}
	  }

	  document.getElementById('files1').addEventListener('change', handleFileSelect1, false);
	  
	  
	  
	  
	  
	  
	  function handleFileSelect2(evt) {
		var files = evt.target.files; // FileList object
		// Loop through the FileList and render image files as thumbnails.
		var k=0;
		for (var i = 0, f; f = files[i]; i++) {

		  // Only process image files.
		  if (!f.type.match('image.*')) {
			continue;
		  }

		  var reader = new FileReader();
			
		  // Closure to capture the file information.
		  reader.onload = (function(theFile) {
			return function(e) {
			  // Render thumbnail.
			  k++;
			  var span = document.createElement('span');
			  span.setAttribute("id", "image2-"+k);
			  span.innerHTML = ['<a class="remove-image2" id="remove-image2-'+k+'"></a><img class="thumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('list2').insertBefore(span, null);
			};
		  })(f);

		  // Read in the image file as a data URL.
		  reader.readAsDataURL(f);
		}
	  }

	  document.getElementById('files2').addEventListener('change', handleFileSelect2, false);
	  
	  
	  
	  
	  
	  
	  function handleFileSelect3(evt) {
		var files = evt.target.files; // FileList object
		// Loop through the FileList and render image files as thumbnails.
		var k=0;
		for (var i = 0, f; f = files[i]; i++) {

		  // Only process image files.
		  if (!f.type.match('image.*')) {
			continue;
		  }

		  var reader = new FileReader();
			
		  // Closure to capture the file information.
		  reader.onload = (function(theFile) {
			return function(e) {
			  // Render thumbnail.
			  k++;
			  var span = document.createElement('span');
			  span.setAttribute("id", "image3-"+k);
			  span.innerHTML = ['<a class="remove-image3" id="remove-image3-'+k+'"></a><img class="thumb" src="', e.target.result,
								'" title="', escape(theFile.name), '"/>'].join('');
			  document.getElementById('list3').insertBefore(span, null);
			};
		  })(f);

		  // Read in the image file as a data URL.
		  reader.readAsDataURL(f);
		}
	  }

	  document.getElementById('files3').addEventListener('change', handleFileSelect3, false);
	  
		
		
		
		