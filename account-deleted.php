<?php require('classes/profile_class.php');$page='account-deleted';$userProfileObj=new User();$user_id=$_SESSION['user_id'];$userDeletedQuery=mysql_query("UPDATE sr_users SET is_deleted=1 WHERE user_id='".$user_id."'");if($userDeletedQuery){		mysql_query("UPDATE sr_users SET is_online=0 WHERE user_id='".$user_id."'");	//mysql_query("UPDATE sr_login_history SET  logout_time = '".DATE_TIME."' WHERE user_id='".$user_id."' AND login_time = '".$login_time."'");	session_destroy();setcookie('remember','', time()-864000, '/');// or die('unable to create cookie'); $userProfileObj->sendDeleteUserMail($user_id);}?><!doctype html><html><head>	<title>Startrishta | Account Deleted</title>	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	<?php require("include/script.php"); ?></head><body>	<div class="main-body">		<!--Main Container start here-->		<div class="clearfix">			<div class="nav_scroll">				<div class="container">						<!-- it's header -->						<header class="clearfix">							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">								<div class="left logo">									<a href="index.php"><img src="images/logo-color.png"/></a>								</div>							</div>						</header>						<!-- it's header -->				</div>			</div>			<div class="border_grad"></div>		<!-- Vip Cntainer--------------->			<div class="container">				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">					<div class="row">						<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 margin-t50 margin-b10 col-md-offset-1 col-lg-offset-1 col-sm-offset-0">							<div class="col-sm-3 col-md-3 vip-sm-3 text-right">								<img src="images/customer-help.png" width=" " height=" "/> 							</div>							<div class="col-sm-8 col-md-7 ">								<h4 class="margin-t10 vip-header lato"><b>Your account is deleted </b></h4>								<hr />								<h5 class="margin-t10 lato gray_1 margin-b25 line-height30"><b>We're sorry to see you go! There are loads of guys and girls who will miss you on Startrishta.</b></h5>								<h5 class="margin-t10 lato gray_1"><b>Come back any time if you ever want to meet new people.</b></h5>								<div class="clearfix"></div>								<a class="btn btn-default custom green_btn margin-t25"  href="index.php" style="padding:8px 30px; font-size:18px;"> Goodbye... hopefully not for long! </a>							</div>						</div>					</div>				</div>			</div>		<!-- End Vip Cntainer--------------->			</div>		<!--Main Container end here-->		<div class="footer-fixed">			<?php 			require("include/footer.php");			?>		</div>		<?php 		require("include/foot.php"); 		?>	</div>	</body></html>