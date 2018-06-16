	function valid_Billing()
	{
		if($(".name").val()==""){
		alert("Please enter name.");
		$(".name").focus();
		return false;
		}
		if($(".name").val().length>25){
		alert("Please enter  name less than 25 characters");
		$(".name").focus();
		return false;
		}
		if($(".name").val()!='')
		{
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".name").val().length; i++) {
			   if (iChars.indexOf($(".name").val().charAt(i)) != -1) {
				alert ("Please enter name without special character & numeric value");
				$(".name").focus();
				return false;
			   }
			}
		}
		if($(".email").val()==''){
                alert("Please enter email address");
                $(".email").focus();
                return false;
            }
         if($(".email").val().length>40){
                alert("Please enter email less than 40 characters");
                $(".email").focus();
                return false;
            }
            var email = $(".email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
                alert("Please enter valid email address.");
                $(".email").focus();
                return false;
            }
			if($(".message").val()==''){
                alert("Please enter message");
                $(".message").focus();
                return false;
            }
	    return true;
	}
	
	function valid_Genral()
	{
		if($(".contact_name").val()==""){
		alert("Please enter name.");
		$(".contact_name").focus();
		return false;
		}
		if($(".contact_name").val().length>25){
		alert("Please enter name less than 25 characters");
		$(".contact_name").focus();
		return false;
		}
		if($(".contact_name").val()!='')
		{
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".contact_name").val().length; i++) {
			   if (iChars.indexOf($(".contact_name").val().charAt(i)) != -1) {
				alert ("Please enter name without special character & numeric value");
				$(".contact_name").focus();
				return false;
			   }
			}
		}
		if($(".contact_email").val()==''){
                alert("Please enter email address");
                $(".contact_email").focus();
                return false;
            }
         if($(".contact_email").val().length>40){
                alert("Please enter email less than 40 characters");
                $(".contact_email").focus();
                return false;
            }
            var email = $(".contact_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
                alert("Please enter valid email address.");
                $(".contact_email").focus();
                return false;
            }
			if($(".contact_message").val()==''){
                alert("Please enter message");
                $(".contact_message").focus();
                return false;
            }
	    return true;
	}
	
	function valid_Bug()
	{
		if($(".bug_name").val()=="")
		{
		alert("Please enter name.");
		$(".bug_name").focus();
		return false;
		}
		if($(".bug_name").val().length>25){
		alert("Please enter name less than 25 characters");
		$(".bug_name").focus();
		return false;
		}
		if($(".bug_name").val()!='')
		{
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".bug_name").val().length; i++) {
			   if (iChars.indexOf($(".bug_name").val().charAt(i)) != -1) {
				alert ("Please enter name without special character & numeric value");
				$(".bug_name").focus();
				return false;
			   }
			}
		}
		if($(".bug_email").val()==''){
                alert("Please enter email address");
                $(".bug_email").focus();
                return false;
            }
         if($(".bug_email").val().length>40){
                alert("Please enter email less than 40 characters");
                $(".bug_email").focus();
                return false;
            }
            var email = $(".bug_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
                alert("Please enter valid email address.");
                $(".bug_email").focus();
                return false;
            }
			if($(".bug_message").val()==''){
                alert("Please enter message");
                $(".bug_message").focus();
                return false;
            }
	    return true;
	}
	
	function valid_Features()
	{
		if($(".suggest_name").val()=="")
		{
		alert("Please enter name.");
		$(".suggest_name").focus();
		return false;
		}
		if($(".suggest_name").val().length>25){
		alert("Please enter name less than 25 characters");
		$(".suggest_name").focus();
		return false;
		}
		if($(".suggest_name").val()!='')
		{
			var iChars = "!`~@#$%^&*()+=-[]1234567890\\\';,_/{}|\":<>?";
			for (var i = 0; i < $(".suggest_name").val().length; i++) {
			   if (iChars.indexOf($(".suggest_name").val().charAt(i)) != -1) {
				alert ("Please enter name without special character & numeric value");
				$(".suggest_name").focus();
				return false;
			   }
			}
		}
		if($(".suggest_email").val()==''){
                alert("Please enter email address");
                $(".suggest_email").focus();
                return false;
            }
         if($(".suggest_email").val().length>40){
                alert("Please enter email less than 40 characters");
                $(".suggest_email").focus();
                return false;
            }
            var email = $(".suggest_email").val();
         if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email))){
                alert("Please enter valid email address.");
                $(".suggest_email").focus();
                return false;
            }
			if($(".suggest_features").val()==''){
                alert("Please enter message");
                $(".suggest_features").focus();
                return false;
            }
	    return true;
	}
	
	
