<!doctype html>
<html>
<head>
	<title>Start Rista | FAQ</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	
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
							<div class="title_in bold dark_blue margin-b10 margin-t50"> <h3><strong>How can we help you?</strong></h3></div>
							<p>Welcome! Search for a topic using the search bar below, or choose a feature from the Navigation list.</p>
							<div class="row">
								<div class="col-lg-12">
									<div class="input-group">
									  <input type="text" class="form-control" placeholder="Search for...">
									  <span class="input-group-btn">
										<button class="btn btn-default btn_gray" type="button"><span class="glyphicon glyphicon-search"></span></button>
									  </span>
									</div><!--input-group -->
								</div>
								
								<!--it's after search panel-->
								<div class="col-lg-12 alert_bx">
									<div class="alert alert-info alert-dismissible margin-t20 font_s14" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										<strong>How can I change my date of birth on my profile? </strong>
										<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. </p>
									</div>
								</div>
								
								<div class="col-lg-12">
									<div id="accordion" class="panel-group">
										<div class="panel panel-default">
											<div class="panel-heading">
												<h5 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">How Do Credits work? </a>
												</h5>
											</div>

											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis est sed felis sollicitudin, eu vestibulum nisi elementum. Nulla facilisi. Aliquam bibendum mi ac porttitor ultrices. Nunc nec orci iaculis, tincidunt justo vitae, varius mi. Nunc non pretium ex. In hac habitasse platea dictumst. Nam bibendum porttitor mi sit amet pretium. Curabitur tincidunt justo ipsum, a posuere nunc suscipit nec. Etiam finibus, augue at congue fringilla, risus mi dapibus dolor, sed sodales enim lacus a ligula. Morbi mauris tellus, pellentesque lacinia posuere at, porta nec risus. In iaculis tempus erat id varius. Cras dignissim lorem nisl, ac semper tortor fermentum at. Phasellus commodo eros id augue blandit eleifend. Aliquam vel condimentum dui. Pellentesque eu sapien sed enim commodo pharetra. Nam sed velit libero. <a href="" target="_blank">Read more.</a></p>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading">
												<h5 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">How can I control my privacy?  </a>
												</h5>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis est sed felis sollicitudin, eu vestibulum nisi elementum. Nulla facilisi. Aliquam bibendum mi ac porttitor ultrices. Nunc nec orci iaculis, tincidunt justo vitae, varius mi. Nunc non pretium ex. In hac habitasse platea dictumst. Nam bibendum porttitor mi sit amet pretium. Curabitur tincidunt justo ipsum, a posuere nunc suscipit nec. Etiam finibus, augue at congue fringilla, risus mi dapibus dolor, sed sodales enim lacus a ligula. Morbi mauris tellus, pellentesque lacinia posuere at, porta nec risus. In iaculis tempus erat id varius. Cras dignissim lorem nisl, ac semper tortor fermentum at. Phasellus commodo eros id augue blandit eleifend. Aliquam vel condimentum dui. Pellentesque eu sapien sed enim commodo pharetra. Nam sed velit libero. <a href="" target="_blank">Read more.</a></p>
												</div>
											</div>
										</div>

										<div class="panel panel-default">
											<div class="panel-heading">
												<h5 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">How do I delete my profile?  </a>
												</h5>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="panel-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In convallis est sed felis sollicitudin, eu vestibulum nisi elementum. Nulla facilisi. Aliquam bibendum mi ac porttitor ultrices. Nunc nec orci iaculis, tincidunt justo vitae, varius mi. Nunc non pretium ex. In hac habitasse platea dictumst. Nam bibendum porttitor mi sit amet pretium. Curabitur tincidunt justo ipsum, a posuere nunc suscipit nec. Etiam finibus, augue at congue fringilla, risus mi dapibus dolor, sed sodales enim lacus a ligula. Morbi mauris tellus, pellentesque lacinia posuere at, porta nec risus. In iaculis tempus erat id varius. Cras dignissim lorem nisl, ac semper tortor fermentum at. Phasellus commodo eros id augue blandit eleifend. Aliquam vel condimentum dui. Pellentesque eu sapien sed enim commodo pharetra. Nam sed velit libero. <a href="" target="_blank">Read more.</a></p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--it's after search panel end-->
								
								
							</div><!--row -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
	
	
	
	
		<!--Footer start here-->
		<?php require("include/footer.php"); ?>
		<!--Footer end here-->
	</div>
	
	
</body>
</html>