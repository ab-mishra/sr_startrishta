<!doctype html>
<html>
<head>
	<title>Startrishta</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
	
</head>

<body>
	<div class="main-body">
	
	<div class="clearfix">
		<div class="nav_scroll">
			<div class="container">
				<header>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="left logo"><img src="images/logo-color.png"/></div>
					</div>
				</header>
			</div>
		</div>
		<div class="border_grad"></div>
		
		<div class="container">
			<div class="main">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-md-12">
							<div class="clearfix margin-t50 margin-b50">
								<h3>Your photos have been moderated</h3>
								
								<div class="margin-t50">
									<a class="red" href=""><h4>We&#39;ve removed the following photos:</h4></a>
								</div>
								<div class="margin-t10 moderated">
									<ul class="margin-b10">
										<li><a href=""><img src="images/celeb1.jpg" /></a></li>
										<li><a href=""><img src="images/celeb2.jpg" /></a></li>
										<li><a href=""><img src="images/celeb3.jpg" /></a></li>
									</ul>
									
									<span class="pull-left"><a class="red" href="">(3)</a></span>
								</div>
								
								<div class="margin-t10 moderated">
									<p>Please adhere to
										our <a href="">Terms & Conditions</a> when uploading photos.<br /> Startrishta will 
										remove any photos that are deemed inappropriate&#44;<br /> Infringe
										copyright or are of people below the age of 18.</p>
								</div>
								
								<div class="pull-left margin-t50">
									<a href="javascript:void(0);" class="btn btn-default custom red" data-toggle="modal" data-target="#increaseReputation">Continue </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<!--Footer start here-->
		<?php require("include/footer.php"); ?>
	<!--Footer end here-->
	</div>
<script>
function validateSignIn(){
	var signInEmailId=$('#signInEmailId').val();
	var signInPassword=$('#signInPassword').val();
	if(signInEmailId==''){
		alert('Please enter email id');
		return false;
	}else {
		if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(signInEmailId))) {
			alert("Invalid Email ID. Please enter the correct ID.");
			$("#signInEmailId").val('');
			$("#signInEmailId").focus();
			return false;
		}
		if(signInEmailId.length > 100)
		{
			alert("Email length can\'t be greater than 100 characters.");
			$("#signInEmailId").focus();
			return false;
		}
	}
	if(signInPassword==''){
		alert('Please enter Password');
		return false;
	}
	
	$.ajax({
		type:"POST",
		url:"ajax/user.php",
		data:{signInEmailId:signInEmailId,signInPassword:signInPassword,action:'SignIn'},
		success:function(result){
			var data = JSON.parse(result);
			if(data[0] == 0){
				alert("There is some problem.Please try agian!");
			}else if(data[0] == 1){
				window.location.href='about.php';
			}else if(data[0] == 2){
				window.location.href='confirm-email.php?id='+data[1];
			}else if(data[0] == 3){
				alert('Incorrect email id or password');
			}else if(data[0] == 4){
				alert('please enter Email id and password.');
			}
		}
	});
	return false;
}
</script>
</body>
</html>