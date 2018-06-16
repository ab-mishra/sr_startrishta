	function valid_Billing()
	{
		if($(".name").val()==""){
			$(".name").prev("label").addClass("checked");
			$(".name").focus();
			return false;
		}else{
			$(".name").prev("label").removeClass("checked");
		}
		// if($(".name").val().length>25){
		// $('#error_message').html("Please enter  name less than 25 characters.");
		// $('#error_alert').modal('show');
		// $(".name").focus();
		// return false;
		// }
		if($(".name").val()!='')
		{	$(".name").prev("label").removeClass("checked");
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".name").val().length; i++) {
			   if (iChars.indexOf($(".name").val().charAt(i)) != -1) {
				$(".name").prev("label").addClass("checked");
				$(".name").focus();
				return false;
			   }
			}
		}
		if($(".email").val()==''){
				$(".email").prev("label").addClass("checked");
				$(".email").focus();
                return false;
            }else{
				$(".email").prev("label").removeClass("checked");
			}
         if($(".email").val().length>50){
				$(".email").prev("label").addClass("checked");
				$(".email").focus();
                return false;
           }else{
				$(".email").prev("label").removeClass("checked");
			}
            var email = $(".email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
				$(".email").prev("label").addClass("checked");
				$(".email").focus();
                return false;
            }else{
				$(".email").prev("label").removeClass("checked");
			}
			if($(".message").val()==''){
				$(".message").prev("label").addClass("checked");
				$(".message").focus();
                return false;
            }else{
				$(".message").prev("label").removeClass("checked");
			}
	    return true;
	}
	
	function valid_Genral()
	{
		if($(".contact_name").val()==""){
			
			$(".contact_name").prev("label").addClass("checked");
			$(".contact_name").focus();
			return false;
		}else{
			$(".contact_name").prev("label").removeClass("checked");
		}
		// if($(".contact_name").val().length>25){
			// $(".contact_name").prev("label").addClass("checked");
			// $(".contact_name").focus();
			// return false;
		// }
		if($(".contact_name").val()!='')
		{
			$(".contact_name").prev("label").removeClass("checked");
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".contact_name").val().length; i++) {
			   if (iChars.indexOf($(".contact_name").val().charAt(i)) != -1) {
				$(".contact_name").prev("label").addClass("checked");
				$(".contact_name").focus();
				return false;
			   }
			}
		}
		if($(".contact_email").val()==''){
				$(".contact_email").prev("label").addClass("checked");
				$(".contact_email").focus();
                return false;
            }else {
				$(".contact_email").prev("label").removeClass("checked");
			}
         if($(".contact_email").val().length>50){
				$(".contact_email").prev("label").addClass("checked");
				$(".contact_email").focus();
                return false;
            }
            var email = $(".contact_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
				$(".contact_email").prev("label").addClass("checked");
				$(".contact_email").focus();
                return false;
            }else{
				$(".contact_email").prev("label").removeClass("checked");
			}
			if($(".contact_message").val()==''){
				$(".contact_message").prev("label").addClass("checked");
				$(".contact_message").focus();
                return false;
            }else{
				$(".contact_message").prev("label").removeClass("checked");
			}
	    return true;
	}
	
	function valid_Bug()
	{
		if($(".bug_name").val()==""){
				$(".bug_name").prev("label").addClass("checked");
				$(".bug_name").focus();
		return false;
		}else{
			$(".bug_name").prev("label").removeClass("checked");
		}
		// if($(".bug_name").val().length>25){
		// $('#error_message').html("Please enter name less than 25 characters.");
		// $('#error_alert').modal('show');
		// $(".bug_name").focus();
		// return false;
		// }
		if($(".bug_name").val()!='')
		{
			$(".bug_name").prev("label").removeClass("checked");
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".bug_name").val().length; i++) {
			   if (iChars.indexOf($(".bug_name").val().charAt(i)) != -1) {
				$(".bug_name").prev("label").addClass("checked");
				$(".bug_name").focus();
				return false;
			   }
			}
		}
		if($(".bug_email").val()==''){
				$(".bug_email").prev("label").addClass("checked");
				$(".bug_email").focus();
                return false;
		}else{
			$(".bug_email").prev("label").removeClass("checked");
		}
         if($(".bug_email").val().length>50){
				$(".bug_email").prev("label").addClass("checked");
				$(".bug_email").focus();
                return false;
		}else{
			$(".bug_email").prev("label").removeClass("checked");
		}
            var email = $(".bug_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
				$(".bug_email").prev("label").addClass("checked");
				$(".bug_email").focus();
                return false;
   		}else{
			$(".bug_email").prev("label").removeClass("checked");
		}

			if($(".bug_message").val()==''){
				$(".bug_message").prev("label").addClass("checked");
				$(".bug_message").focus();
                return false;
            }else{
				$(".bug_message").prev("label").removeClass("checked");
			}
	    return true;
	}
	
	function valid_Features()
	{
		if($(".suggest_name").val()==""){
			$(".suggest_name").prev("label").addClass("checked");
			$(".suggest_name").focus();
		return false;
		}else{
			$(".suggest_name").prev("label").removeClass("checked");
		}
		// if($(".suggest_name").val().length>25){
		// $('#error_message').html("Please enter name less than 25 characters.");
		// $('#error_alert').modal('show');
		// $(".suggest_name").focus();
		// return false;
		// }
		if($(".suggest_name").val()!='')
		{
			$(".suggest_name").prev("label").removeClass("checked");
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".suggest_name").val().length; i++) {
			   if (iChars.indexOf($(".suggest_name").val().charAt(i)) != -1) {
					$(".suggest_name").prev("label").addClass("checked");
					$(".suggest_name").focus();
				return false;
			   }
			}
		}
		if($(".suggest_email").val()==''){
			$(".suggest_email").prev("label").addClass("checked");
			$(".suggest_email").focus();
                return false;
            }else{
				$(".suggest_email").prev("label").removeClass("checked");
			}
         if($(".suggest_email").val().length>50){
				$(".suggest_email").prev("label").addClass("checked");
				$(".suggest_email").focus();
                return false;
            }else{
				$(".suggest_email").prev("label").removeClass("checked");
			}
            var email = $(".suggest_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
				$(".suggest_email").prev("label").addClass("checked");
				$(".suggest_email").focus();
                return false;
            }else{
				$(".suggest_email").prev("label").removeClass("checked");
			}
			if($(".suggest_features").val()==''){
				$(".suggest_features").prev("label").addClass("checked");
				$(".suggest_features").focus();
                return false;
            }else{
				$(".suggest_features").prev("label").removeClass("checked");
			}
	    return true;
	}
	
	
