<!doctype html>
<html>
<head>
	<title>Startrishta | Contact Us</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/script.php"); ?>
	
	<script type="text/javascript">
		
		//Fixed Navigation//
		$(window).scroll(function(){
		  if ($(this).scrollTop() > 5) {
			  $('#task_flyout').addClass('fixed');
		  } else {
			  $('#task_flyout').removeClass('fixed');
		  }
		});
		
		$(document).ready(function(){
			$(".prof_dpdwn").click(function(){
				var prof_dropdown = $(".prof_drop_dwn").css("display");
				if(prof_dropdown == 'none'){
				$(".prof_drop_dwn").css("display","block");}
				else{
					$(".prof_drop_dwn").css("display","none");
				}
			});
		});
		
		
	</script>
	<script>
		$(document).ready(function(){
			$(".change_form div input").click(function(){
				var k = $(this).data("rel");
				$(k).show().siblings("form").hide();
			});
		});
	</script>
	
	
	
	
	
</head>

<body>
	<div class="main-body">
	
		<!--right side panel-->
		<div class="navigation">
			<div class="n_fixed">
			<a class="right close-signup slide-left-signup"><i class="fa fa-times"></i></a>
			<div class="fixed-signup-info padding-t30 padding-b30 margin-t50">
				<p class="align-c"><i>Whether you’re serious about matrimony, looking for new friends or simply want to explore, everyone is welcome at Startrishta. With thousands joining everyday, it’s easy to meet new people.</i></p>
			</div>
			
			<form class="login-form" >
				<h1 class="align-c">Sign up - it’s free!</h1>
				<div>
					<label><i class="fa fa-envelope"></i></label>
					<input type="text" placeholder="email address"/>
				</div>
				
				<div>
					<label><i class="fa fa-lock"></i></label>
					<input type="password" placeholder="password"/>
				</div>
				
				<div class="sign_up">
					<input class="login_btn" type="button" value="Done"/>
				</div>
				
				<div class="sign_up">
					<a class="fb_login_btn" href=""> <i class="fa fa-facebook-square"></i> Sign in with Facebook</a>
				</div>
				
				<div>
					<p class="align-c">By continuing, you're confirming that you've read and agree to our <a href="#">Terms and Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
				</div>
			</form>
			</div>
		</div>
		<!--right side panel end-->
	
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
						
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
					
						<!-- it's login popup -->
						<div id="myModal" class="modal fade login_pop" role="dialog" >
							<div class="modal-dialog home_pg">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="login_box">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Member Login</h4>
										</div>
										<div class="modal-body">
											<form class="login-form">
												<div>
													<label><i class="fa fa-envelope"></i></label>
													<input type="text" placeholder="email address"/>
												</div>
												<div>
													<label><i class="fa fa-lock"></i></label>
													<input type="password" placeholder="password"/>
												</div>
												
												<div>
													<span class="pull-left"><input class="pull-left rem_me" type="checkbox"/> Remember Me</span>
													<span class="pull-right"><a class="reset_form">Forgot Password?</a></span>
												</div>
												
												<div>
													<input class="login_btn" type="button" value="Done"/>
												</div>
												
												<div>
													<a class="fb_login_btn" href=""> <i class="fa fa-facebook-square"></i>    Sign in with Facebook</a>
												</div>
												
												<div>
													<p class="align-c">By continuing, you're confirming that you've read and agree to our <a href="#">Terms and Conditions</a>, and <a href="#">Privacy Policy</a>.</p>
												</div>
											</form>
										</div>
									</div>
									<div class="reset_box">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Reset Your Password</h4>
										</div>
										
										<div class="modal-body">
											<form class="login-form">
												<div>
													<p class="align-c forget-btxt">We will send a password reset link to your email address, please check it shortly.</p>
												</div>
												<div>
													<input class="forget-input" type="text" placeholder="Type your email address"/>
												</div>
												<div>
													<input class="login_btn" type="button" value="Send Reset Link"/>
												</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- it's popup -->
			
				</div>
			</div>
			<div class="border_grad"></div>
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<!-- it's header -->
							<?php require("include/side-bar.php"); ?>
							<!-- it's header -->
						</div>
						
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="title_in red margin-b10 margin-t50 bold"> <h3>Contact Startrishta</h3></div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row contacts">
									<p>We will deal with your query as soon as possible.</p>
									<span>Choose a field from the list below:</span>
									
									<!--start options-->
									<div class="change_form">
										<div class="swith_gq">
											<input id="radio1" data-rel="#general" type="radio" name="option" value="1" checked="">
											<label for="radio1"><span><span></span></span>General questions</label>
										</div>
										
										<div class="swith_bq">
											<input id="radio1" data-rel="#billing" type="radio" name="option" value="1" checked="">
											<label for="radio1"><span><span></span></span>Billing questions</label>
										</div>
										
										<div class="swith_rb">
											<input id="radio1" data-rel="#bug" type="radio" name="option" value="1" checked="">
											<label for="radio1"><span><span></span></span>Report a bug</label>
										</div>
										
										<div class="swith_sf">
											<input id="radio1" data-rel="#suggest" type="radio" name="option" value="1" checked="">
											<label for="radio1"><span><span></span></span>Suggest a feature</label>
										</div>
									</div>
									<!--end options-->
									
									<div id="from_idnty">
									
									<!--form for Suggest A Feature-->
									<form class="conts_form active">
										<div>
											<label><span>*</span> Name:</label>
											<input type="text" placeholder="" />
										</div>
										<div>
											<label><span>*</span> Email Address:</label>
											<input type="email" placeholder="" />
										</div>
									</form>
									<!--form end Suggest A Feature-->
									
									
									
									<!--form for Suggest A Feature-->
									<form class="conts_form" id="suggest">
										<div>
											<label><span>*</span> Name:</label>
											<input type="text" placeholder="" />
										</div>
										<div>
											<label><span>*</span> Email Address:</label>
											<input type="email" placeholder="" />
										</div>
										<div>
											<h5>Type your suggestion below</h5>
										</div>
										<div class="last">
											<p>Please add as much detail as possible and we’ll be in touch should we need additional information.</p>
										</div>
										<div>
											<label><span>*</span> Message:</label>
											<textarea placehoder=""></textarea>
										</div>
										
										<div>
											<a href=""><span class="glyphicon glyphicon-paperclip"></span>Attach screenshot</a>
										</div>
										
										<div class="relative">
											<input type="file" id="files" class="up_multi_file" name="files[]" multiple />
											<output id="list"></output>
										</div>
									
										<div class="btn_div">
											<input type="submit" class="button1" value="Send" />
										</div>
									</form>
									<!--form end Suggest A Feature-->
									
									
									
									
									<!--form for Report a bug-->
									<form class="conts_form" id="bug">
										<div>
											<label><span>*</span> Name:</label>
											<input type="text" placeholder="" />
										</div>
										<div>
											<label><span>*</span> Email Address:</label>
											<input type="email" placeholder="" />
										</div>
										<div>
											<p>Where was the bug found?</p>
										</div>
										<div class="bug_found">
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Profile page</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>People Search</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Photos</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Kismat Connection</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>My Messages</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Favorites</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Liked me</label>
											</div>
											<div class="pull-left">
												<input id="radio1" type="radio" name="option" value="1" checked="checked">
												<label for="radio1"><span><span></span></span>Other</label>
											</div>
										</div>
										<div>
											<h5>Type your message below</h5>
										</div>
										<div class="last">
											<p>Please add as much detail as possible and we’ll be in touch should we need additional information.</p>
										</div>
										<div>
											<label><span>*</span> Message:</label>
											<textarea placehoder=""></textarea>
										</div>
										<div>
											<a href=""><span class="glyphicon glyphicon-paperclip"></span>Attach screenshot</a>
										</div>
										<div class="relative">
											<input type="file" id="files1" class="up_multi_file" name="files[]" multiple />
											<output id="list1"></output>
										</div>
									
										<div class="btn_div">
											<input type="submit" class="button1" value="Send" />
										</div>
									</form>
									<!--form end Report a bug-->
									
									
									<!--form for Billing-->
									<form class="conts_form" id="billing">
										<div>
											<label><span>*</span> Name:</label>
											<input type="text" placeholder="" />
										</div>
										<div>
											<label><span>*</span> Email Address:</label>
											<input type="email" placeholder="" />
										</div>
										<div>
											<div class="half pull-left">
												<p>Type of payment:</p>
												<div class="bug_found">
													<div class="pull-left">
														<input id="radio1" type="radio" name="option" value="1" checked="checked">
														<label for="radio1"><span><span></span></span>Startrishta credits</label>
													</div>
													<div class="pull-left">
														<input id="radio1" type="radio" name="option" value="1" checked="checked">
														<label for="radio1"><span><span></span></span>VIP subscriptions</label>
													</div>
												</div>
											</div>
											<div class="half pull-left">
												<p>Method of payment:</p>
												<div class="bug_found">
													<div class="pull-left">
														<input id="radio1" type="radio" name="option" value="1" checked="checked">
														<label for="radio1"><span><span></span></span>Paypal</label>
													</div>
													<div class="pull-left">
														<input id="radio1" type="radio" name="option" value="1" checked="checked">
														<label for="radio1"><span><span></span></span>Credit card</label>
													</div>
												</div>
											</div>
										</div>
										<div>
											<label><span>*</span> Date of Payment:</label>
											<div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
												<input class="form-control" type="text" readonly />
												<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
											</div>
										</div>
										<div>
											<h5>Type your message below</h5>
										</div>
										<div class="last">
											<p>Please add as much detail as possible and we’ll be in touch should we need additional information.</p>
										</div>
										<div>
											<label><span>*</span> Message:</label>
											<textarea placehoder=""></textarea>
										</div>
										<div>
											<a href=""><span class="glyphicon glyphicon-paperclip"></span>Attach screenshot</a>
										</div>
										<div class="relative">
											<input type="file" id="files2" class="up_multi_file" name="files[]" multiple />
											<output id="list2"></output>
										</div>
									
										<div class="btn_div">
											<input type="submit" class="button1" value="Send" />
										</div>
									</form>
									<!--form end Billing-->
									
									
									<!--form start General-->
									<form class="conts_form" id="general">
										<div>
											<label><span>*</span> Name:</label>
											<input type="text" placeholder="" />
										</div>
										<div>
											<label><span>*</span> Email Address:</label>
											<input type="email" placeholder="" />
										</div>
										<div>
											<h5>Type your message below</h5>
										</div>
										<div class="last">
											<p>Please add as much detail as possible and we’ll get in touch as soon as we can.</p>
										</div>
										<div>
											<label><span>*</span> Message:</label>
											<textarea placehoder=""></textarea>
										</div>
										<div>
											<a href=""><span class="glyphicon glyphicon-paperclip"></span>Attach screenshot</a>
										</div>
										<div class="relative">
											<input type="file" id="files3" class="up_multi_file" name="files[]" multiple />
											<output id="list3"></output>
										</div>
									
										<div class="btn_div">
											<input type="submit" class="button1" value="Send" />
										</div>
									</form>
									<!--form start General-->
									
									</div>
									
									
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
	
			<?php 
			//--Footer start here-->
			require("include/footer.php"); 
			//------its sign in and sign up------->
			include('include/sign-in.php') ;
		?>
	</div>
	
	
	
	
	<script src="js/input_file.js"></script>
	
	<script type="text/javascript">
		$(function () {
		  $("#datepicker").datepicker({ 
				autoclose: true, 
				todayHighlight: true
		  }).datepicker('update', new Date());
		  
		  
		  $('.remove-image').live('click' ,function(){
				var id=$(this).attr('id').split('-');
				$('#image-'+id[2]).hide();
		  });
		  $('.remove-image1').live('click' ,function(){
				var id=$(this).attr('id').split('-');
				$('#image1-'+id[2]).hide();
		  });
		  
		   $('.remove-image2').live('click' ,function(){
				var id=$(this).attr('id').split('-');
				$('#image2-'+id[2]).hide();
		  });
		  
		  $('.remove-image3').live('click' ,function(){
				var id=$(this).attr('id').split('-');
				$('#image3-'+id[2]).hide();
		  });
		  
		});

	</script>
	
</body>
</html>