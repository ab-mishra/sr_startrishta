<?php
if(empty($_SESSION['ADMIN']['USER_ID'])){
	echo "<script>window.location.href='index.php'</script>";
	exit;
}
$admin_id=$_SESSION['ADMIN']['USER_ID'];
$newPhotoResult=$adminObj->getNewPhotos();
$newPhotoCount=count($newPhotoResult);

$newInterestResult=$adminObj->getNewInterest();
$newInterestCount=count($newInterestResult);

$photoReportedResult=$adminObj->getPhotoReported();
$photoReportedCount=count($photoReportedResult);

$abuseReportResult=$adminObj->getAbuseReport();
$abuseReportCount=count($abuseReportResult);

$adminResult=$adminObj->getAdminInfo($admin_id);
$userPrivilege = $adminObj->getUserPrivileges($admin_id);
?>

<!-- HEADER -->
	    <header class="header affix" role="banner">
		<nav class="header-navbar">
		    <div class="navbar-header clearfix">
				<a class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mini-navbar-collapse">
				    <span class="sr-only">Toggle navigation</span>
				    <i class="fa fa-plus"></i>
				</a>
				<a class="logo pull-left" href="dashboard.php">
				    <img src="assets/img/core/logo.png" width="110" alt="Startrishta">
				</a>
				<a class="sidebar-switch pull-right"><span class="icon fa"></span></a>
		    </div>
    
		    <div class="collapse navbar-collapse" id="mini-navbar-collapse">
		    	<span class="header-date"><?php echo date('F d, Y');?></span>
				<ul class="nav navbar-nav navbar-right">
				   <!--  <li>
				    	<a href="#">
							<i class="fa fa-paper-plane-o"></i>
							<span>Compose</span>
						    </a>
					</li> -->
				    <!-- <li>
					    <a href="page-lock.html">
							<i class="fa fa-lock"></i>
							<span>Lock</span>
				    	</a>
					</li> -->
				    <li class="turn-off">
				    	<a href="logout.php">
							<span><?php echo $adminResult['name'];?> <i class="fa fa-power-off"></i></span>
				    	</a>
					</li>
				</ul>
		    </div><!-- navbar-collapse -->
		</nav>
	    </header>
	<!-- HEADER -->
