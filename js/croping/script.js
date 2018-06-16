$(document).ready(function(){
	$("#file").change(function(e){
		//$("#myModal").modal('hide');
		var img = e.target.files[0];

		if(!iEdit.open(img, true, function(res){
			$("#result").attr("src", res);	
			$("#img_hidden").val(res);
				$("#img_form").submit();
			//console.log(res);	
		})){
			alert("Whoops! That is not an image!");
		}

	});
});