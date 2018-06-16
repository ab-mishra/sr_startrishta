<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Contact Us</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	
	<?php require("include/login-script.php"); ?>
	
	<script type="text/javascript">
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
	
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
						<!-- it's header -->
						<?php require("include/header-inner.php"); ?>
						<!-- it's header -->
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
									<!--Success Message-->
									<div class="align-l pull-left margin-t20">
										<a class="btn btn-default custom red" href="">Back to the homepage </a>
									</div>
									<!--Success Message-->
									
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