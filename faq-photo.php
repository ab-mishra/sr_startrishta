<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='photo';
if(isset($_GET['q'])){
	$query=$_GET['q'];
	$sqlFaq=mysql_query("select * from sr_faq where status='1' AND faq_type_id=3 AND question LIKE '%".$query."%'");
}else{
	$query='';
	$sqlFaq=mysql_query("select * from sr_faq where status='1' AND faq_type_id=3");
}
if(!empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | FAQ</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/login-script.php"); ?>
</head>

<body>
	<div class="main-body">
		<!------its sign in and sign up------->
		<?php //include('include/sign-in.php') ;?>
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
							<div class="title_in bold dark_blue margin-b10 margin-t50"> <h3><strong>How can we help you?</strong></h3></div>
							<p>Welcome! Search for a topic using the search bar below, or choose a feature from the Navigation list.</p>
							<div class="row">
							<form method="get" action="">
								<div class="col-lg-12">
									<div class="input-group">
									  <input type="text" class="form-control my_input" name="q" value="<?php echo $query;?>"placeholder="Search for..." >
									  <span class="input-group-btn">
										<button class="btn btn-default btn_gray" type="button"><span class="glyphicon glyphicon-search"></span></button>
									  </span>
									</div><!--input-group -->
								</div>
							</form>
								<div class="col-lg-12">
									<div id="accordion" class="panel-group">
										<?php
										if(mysql_num_rows($sqlFaq)){
											$i=1;
											while($resultFaq=mysql_fetch_array($sqlFaq)){
												$faq_id=$resultFaq['faq_id'];
												$question=$resultFaq['question'];
												$answer=$resultFaq['answer'];
											?>
												<div class="panel panel-default">
													<div class="panel-heading">
														<h5 class="panel-title gray">
															<a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $faq_id; ?>"><?php echo $question; ?></a>
														</h5>
													</div>
													<div id="<?php echo $faq_id; ?>" class="panel-collapse collapse <?php if($i==1){ echo "in";} ?> ">
														<div class="panel-body">
															<p><?php echo stripslashes($answer); ?></p>
														</div>
													</div>
												</div>
											<?php $i++; 
											}
										}else{ ?>
											<div class="col-lg-12">
												<div class="faq_bg margin-t10">
													<p class="align-c lato font-16">We're sorry the term you searched for could not be found, please try again.<br />
													Alternatively choose a topic from the navigation bar or you can <a class="red" href="contacts.php">contact us</a><br />
													for more information.</p>
												</div>
											</div>
										<?php } ?>
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
</body>
</html>