<?php 
require('classes/user_class.php');
$userObj=new User();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Startrishta - Start Something New</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Get notified when we launch. Whether you’re serious about matrimony or simply want to explore, everyone is welcome at Startrishta. Join our community and get to know new friends in your area.">
		<link rel="icon" type="image/png" href="img/favico.png">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<style>
			html{
				height: 100%;
				width:100%;
			}
			body{
				margin:0;
				padding:0;
				background: #ffffff;
				font-family: 'Open Sans', sans-serif;
				height: 100%;
				width: 100%;
				background: #34495e;
			}
			.header{
				width: 100%;
				background: #121d2a;
				/*box-shadow: 0 5px 5px #000000;*/
				text-align: center;
				padding: 15px 0;
				position: absolute;
				z-index: 5;
				left: 0
				top:0;
				width: 100%;
				margin-bottom: 5%;
			}
			h1{
				margin: 0;
				text-align: center;
				line-height: 25px;
				text-transform: uppercase;
				position: absolute;
				width: 100%;
				top:15%;
				font-size: 25px;
				color:#cacaca;
				/*font-weight: normal;*/
			}
			h1 span{
				line-height: 45px;
				font-weight: bold;
				font-size: 35px;
				color: #ffffff;
			}
			.heart{
				width:307px;
				position: absolute;
				top: 30%;
				left: 41%;
			}
			.left,.right{
				display:inline-block;
			}
			.left{
				width:170px;
				height:238px;
				margin-right:-4px;
			}
			.heart div>div{
				display:block;
				height:34px;
			}
			.heart div.left > div:first-child{
				padding-right:68px
			}
			.heart div.left > div:nth-child(2){
				padding-right:34px
			}
			.heart div>div>div{
				width:30px;
				height:30px;
				background-color:red;
				display:inline-block;
				float:right;
				margin:2px;
			}
			.heart div.right>div>div{
				float:left;
			}
			.heart div.right > div:first-child{
				padding-left:34px;
			}
			h4{
				color: #cacaca;
				font-weight: bold;
				text-align: center;
				margin-top: 0px;
				clear: both;
				position: absolute;
				top: 75%;
				width:100%;
			}
			.get_no{
				text-align: center;
				margin-bottom: 30px;
				position: absolute;
				top: 82%;
				width: 100%;
			}
			.submit-container button, .get_no button, .error_alert button{
				background: #ff0000;
				border:none;
				border-radius:3px;
				-webkit-border-radius:3px;
				-moz-border-radius:3px;
				-ms-border-radius:3px;
				-o-border-radius:3px;
				display: inline-block;
				font-size: 15px;
				color: #ffffff;
				text-transform: uppercase;
				padding: 10px 30px;
				cursor: pointer;
			}
			.error_alert button{
				padding: 5px 30px;
			}
			footer{
				position: fixed;
				bottom: 1%;
				width: 100%;
				margin: 0;
			}
			.footerwraper{
				width: 40%;
				border-top:2px solid #cacaca;
				left: 30%;
				padding: 5px 15px;
				margin: 0 auto;
			}
			.footerwraper a{
				color: #cacaca;
				line-height: 25px;
				text-decoration: none;
				text-transform: uppercase;
			}
			.footerwraper a.twt{
				float: right;
				font-size: 20px;
			}
			.footerwraper a.l_more{
				float: left;
			}
			.overlay{
				width: 100%;
				height: 100%;
				background: rgb(52,73,94);
				position: absolute;
				z-index: 1;
				left: 0;
				top: 0;
				display: none;
			}
			.email-overlay, .email-overlay2 {
			    align-self: center;
			    background-color: #121D2A;
			    flex-direction: column;
			    left: 0;
			    margin: 0 calc(50% - 350px);
			    padding: 75px 0;
			    position: absolute;
			    top: 112px;
			    width: 700px;
			    z-index: 2;
			    display: none;
			    min-height: 300px;
			}
			/*.email-overlay2 {
				display: block;
			}*/
			#email-form {
			    display: inline-block;
			    width: 700px;
			    text-align:center;
			}
			#email-form p{
				width: 65%;
				margin: 0 auto;
				color: #ffffff;
				font-size: 20px;
			}
			#email-form input[type="text"], #email-form select{
				width: 70%;
				height: 40px;
				border:none;
				border-bottom:2px solid #dddddd;
				background: none;
				margin-bottom: 20px;
				color: #ffffff;
				font-size: 15px;
				margin: 0 auto;
			}
			#email-form select{
				width:100%;
				-moz-appearance:none;
				-webkit-appearance:none;
				-ms-appearance:none;
				-o-appearance:none;
				margin-top: 10px;
			}
			#email-form select option{
				background-color: #121D2A;
			}
			#email-form span.sel_cnt{
				position: relative;
				display: block;
				width:70%;
				margin: 0 auto;
			}
			#email-form span.sel_cnt:before{
				color: #fff;
			    content: "\f0d7";
			    font-family: FontAwesome;
			    pointer-events: none;
			    position: absolute;
			    right: 0;
			    top:30%;

			}
			.email-overlay p:first-child {
			    margin-top: 0;
			}
			#email-form .header_pop {
			    margin-bottom: 50px;
			    color: #ffffff;
			    letter-spacing: 1.4px;
			    line-height: 24px;
			}
			#email-form p.note{
				color: #ffffff;
				font-size: 12px;
				margin-bottom: 15px;
			}
			.header_pop2{
				color: #ffffff;
				font-size: 18px;
				text-transform: uppercase;
				text-align: center;
				margin-top: 75px;
			}
			#close-button, #close-button2 {
			    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
			    border: 0 none;
			    color: #fff;
			    font-size: 22px;
			    position: absolute;
			    right: 30px;
			    top: 30px;
			    cursor: pointer;
			}
			p.submit-container{
				margin-top: 50px;
				text-align: center;
			}
			#success-message{
				width: 80%;
				margin: 0 auto;
				background: green;
				color: #ffffff;
				font-size: 15px;
				margin-top: 30px;
				text-align: center;
				padding: 5px;
			}
			.error_alert{
				position: absolute;
				background:#ffffff;
				width: 300px;
				height: 100px;
				left: 0;
				top: 0;
				right: 0;
				bottom: 0;
				margin: auto auto;
				border-radius: 10px;
				padding:30px 10px 10px 10px;
				text-align: center;
				font-size: 12px;
				z-index: 999;
				display:none;
			}
			.error_alert i{
				position: absolute;
				right: 10px;
				top: 10px;
				color: #666666;
				cursor: pointer;
				transition:all ease-In-Out 0.3s;
			}
			.error_alert i:hover{
				color: #000000;
			}



			@media screen and ( max-height: 700px ){
			    .get_no{
			    	top: 85%;
			    }
			}
			
			
			@media screen and ( max-height: 600px ){
				h1{
					top:10%;
				}
				h1 span{
					display: none;
				}
				.heart{
					top: 25%;
				}
				.footerwraper a{
					font-size: 18px;
				}
				.footerwraper a.twt{
					font-size: 30px;
				}
				h4{
					display: none;
				}
				.get_no{
			    	top: 80%;
			    }
			}
			@media screen and ( max-height: 500px ){
				.heart{
					width:307px;
					position: absolute;
					top: 27%;
				}
				.left,.right{
					display:inline-block;
				}
				.left{
					width:170px;
					height:196px;
					margin-right:-4px;
				}
				.heart div>div{
					display:block;
					height:28px;
				}
				.heart div>div>div{
					width:24px;
					height:24px;
					background-color:red;
					display:inline-block;
					float:right;
					margin:2px;
				}
				.heart div.right>div>div{
					float:left;
				}
				.heart div.left > div:first-child {
				    padding-right: 56px;
				}
				.heart div.left > div:nth-child(2) {
				    padding-right: 28px;
				}
				.heart div.right > div:first-child{
					padding-left:28px;
				}
			}
			/*@media screen and ( max-height: 550px ){
				
				.heart{
					top: 28%;
				}
				.get_no{
			    	top: 83%;
			    }
			}
			@media screen and ( max-height: 500px ){
				
				.heart{
					top:22%;
				}
				.get_no{
			    	top: 80%;
			    }
			}
			@media screen and ( max-height: 450px ){
				.get_no{
			    	top: 82.5%;
			    }
			}*/
			@media screen and ( max-width: 1024px ){
				.footerwraper{
					width:70%;
				}
			}
			@media screen and ( max-width: 800px ){
				.footerwraper{
					width:80%;
				}
			}
			@media screen and ( max-width: 700px ){
				.overlay{
					background: #121D2A;
				}
				.email-overlay, .email-overlay2 {
					width:100%;
					margin: 0;
					top: 66px;
				}
				#email-form {
					width: 100%;
				}
			}
		</style>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-43962266-1', 'auto');
  ga('send', 'pageview');

</script>
	</head>
	<body>
		<div class="header">
			<img src="img/logo.png">
		</div>
		<h1>
			<span>START SOMETHING NEW</span>
			<br>SPRING 2016
		</h1>
		<div class="heart">
			<div class='left'>
				<div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
				</div>
			</div>
			<div class='right'>
				<div>
					<div></div>
					<div></div>
				</div>
				<div style=''>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
					<div></div>
				</div>
				<div>
					<div></div>
					<div></div>
				</div>
	  			<div>
	    			<div></div>
	  			</div>
			</div>
		</div>
		<h4>Be one of the first to know when<br>Startrishta.com goes live</h4>
		<div class="get_no">
			<button id="get-notified">
	          	<span>GET NOTIFIED</span>
	        </button>
		</div>
		<footer>
			<div class="footerwraper">
				<a target="_blank" href="https://twitter.com/startrishta" class="twt"><i class="fa fa-twitter"></i></a>
				<a target="_blank" href="http://blog.startrishta.com" class="l_more">Learn More</a>
			</div>
		</footer>
		<div class="overlay">
		</div>
		<div class="email-overlay" id="email-overlay">
			<form action="" method="post" id="email-form">
				<p class="header_pop ">
					Be one of the first to know when <br>Startrishta.com goes live
				</p>
				<div class="validation-error" id="email-validation-error"></div>
				<p>
					<input type="text" placeholder="Email" class="email" name="email" id="email_id">
				</p>
				<p>
					<span class="sel_cnt">
						<select name="gender" class="country-select" id="genderInput">
				            <option selected="selected" value="">Gender</option>
				            <option value="Male">Male</option>
				            <option value="Female">Female</option>
				        </select>
			        </span>
				</p>
				<p>
					<span class="sel_cnt">
						<select name="country" class="country-select" id="countryInput">
				            <option selected="selected" value="">Country</option>
						<?php 
						$countryQuery=mysql_query("SELECT * FROM sr_countries");
						while($countryResult = mysql_fetch_object($countryQuery)){?>
				            <option value="<?php echo $countryResult->country_name; ?>"><?php echo $countryResult->country_name; ?></option>
				        <?php } ?>
				        </select>
			        </span>
				</p>
				<!-- <p class="note">
					<label>
						<input type="checkbox" name="optin" class="confirm" id="optinInput">
						Please send me a one-time update when Start Rishta launches.
					</label>
				</p> -->
				<div class="validation-error" id="optin-validation-error"></div>
			</form>
			<p class="submit-container">
				<button type="submit" id="submit_notify">SUBMIT</button>
			</p>
			<button id="close-button">x</button>
		</div>
		<div class="email-overlay2">
			<p class="header_pop2">
				THANK YOU! WE'LL SEND YOU A<br>
				MESSAGE AS SOON AS STARTRISHTA.COM<br>
				IS RELEASED!
			</p>
			<button id="close-button2">x</button>
		</div>
		<div class="error_alert">
			<i id="dismiss" class="fa fa-times" onclick="hide_alert();"></i>
			<p id="error_alert_msg"></p>
			<button id="dismiss" onclick="hide_alert();" >OK</button>
		</div>
		<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>-->
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript">
			function hide_alert(){
				document.getElementById('dismiss').parentNode.style.display='none';
			}
			function heart_ani(){
			$('.heart div>div>div').each(function(id){
				$(this).css({
					position: 'relative',
					top: '-200px',
					opacity: 0
				});
				var wait = Math.floor((Math.random()*3000)+1);
				$(this).delay(wait).animate({
					top: '0px',
					opacity: 1
				},2000);
			});
			}
			function overl(){
				var hh = $(".header").outerHeight();
				var wh = $(window).height();
				var over_h = wh-hh;
				$(".overlay").height(over_h);
				$(".overlay").css("margin-top", hh);
			}
			function heart_place(){
				var k = $(window).width();
				var lef_t = (k - 307)/2;
				$(".heart").css("left", lef_t);
			}
			$(document).ready(function(){
				overl()
				heart_place()
				heart_ani()
				setInterval(heart_ani,7000);
				$("#get-notified").click(function(){
					$(".overlay").fadeIn();
					$(".email-overlay").fadeIn();
				});
				$("#close-button").click(function(){
					$(".overlay").fadeOut();
					$(".email-overlay").fadeOut();
				});
				$(".submit-container button").click(function(){
					//$(this).closest(".email-overlay").fadeOut();
					//$(".email-overlay2").fadeIn();
				});
				$("#close-button2").click(function(){
					$(".email-overlay2").fadeOut();
					$(".overlay").fadeOut();
				});
			});
			$(window).resize(function(){
				heart_place()
			});
		</script>
		<script>
		$(function(){
			$('#submit_notify').click(function(){
				var email_id=$('#email_id').val();
				var country=$('#countryInput').val();
				var gender=$('#genderInput').val();
				if(email_id==''){
					$('#error_alert_msg').html('Please enter email address.');
					$('.error_alert').show();
					return false;
				}else {
					if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email_id))) {
						$('#error_alert_msg').html('Please enter a valid email address');
						$('.error_alert').show();
						$("#email_id").val('');
						$("#email_id").focus();
						return false;
					}
					/*if(email_id.length > 100)
					{
						$('#error_alert_msg').html("Email length can not be greater than 100 characters.");
						$('.error_alert').show();
						$("#email_id").focus();
						return false;
					}*/
				}
				if(country==''){
					$('#error_alert_msg').html('Please select country.');
					$('.error_alert').show();
					return false;
				}
				if(gender==''){
					$('#error_alert_msg').html('Please select gender.');
					$('.error_alert').show();
					return false;
				}
				$.ajax({
					type:"POST",
					url:"ajax/notify.php",
					data:{email_id:email_id , country:country , gender: gender , action:'notify'},
					success:function(result){
						if(result == 1){
							$(".email-overlay").fadeOut();
							$(".email-overlay2").fadeIn();
							$(".email").val('');
						}else if(result == 2){
							$('#error_alert_msg').html("Email address is already in used.");
							$('.error_alert').show();
						}
						else {
							$('#error_alert_msg').html("There is some problem.please try again.");
							$('.error_alert').show();
						}
					}
				});
			});
		});
		</script>
	
	</body>
</html>