<?php 
include('classes/adminClass.php');
$adminObj = new Admin();


# FOR NEW INTEREST
if( isset($_POST['updateNewInterest']) )
{
	$approveInterestId = $_POST['interestId'];
	$InterestCatId = $_POST['newInterestCatId'];
	$interest_text = $_POST['newinterest_text'];
	$res = $adminObj->updateApproveInterest($approveInterestId, $InterestCatId, $interest_text);
}

if( isset($_POST['approveInterest']) )
{	
	$interestId = $_POST['interestId'];
	$res = $adminObj->approveInterest($interestId);
	/* if($res == 1){
		echo $adminObj->getResultPopup('Interest Approved sucessuflly' , 'Alert');
	}
	if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	} */
}

if( isset($_POST['disapproveInterest']) )
{
	$interestId = $_POST['interestId'];
	$res = $adminObj->disapproveInterest($interestId);
	/* if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	}
	if($res == 1){
		echo $adminObj->getResultPopup('Interest disapproved sucessfully' , 'Alert');
	} */
}


# FOR APPROVED INTEREST
if( isset($_POST['updateInterest']) )
{
	$approveInterestId = $_POST['approveInterestId'];
	$InterestCatId = $_POST['InterestCatId'];
	$interest_text = $_POST['interest_text'];
	$res = $adminObj->updateApproveInterest($approveInterestId, $InterestCatId, $interest_text);
	/* if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	}
	if($res == 1){
		echo $adminObj->getResultPopup('Interest updated sucessfully' , 'Alert');
	} */
}

if( isset($_POST['approveDisapproveInterest']) )
{
	$interestId = $_POST['approveInterestId'];
	$res = $adminObj->disapproveInterest($interestId);
	/* if($res == 0){
		echo $adminObj->getResultPopup('Please try again' , 'Alert');
	}
	if($res == 1){
		echo $adminObj->getResultPopup('Interest disapproved sucessfully' , 'Alert');
	} */
}


# FOR DISAPPROVED INTEREST
if( isset($_POST['updateDisInterest']) )
{
	$disapproveInterestId = $_POST['disapproveInterestId'];
	$disInterestCatId = $_POST['disInterestCatId'];
	$disinterest_text = $_POST['disinterest_text'];
	$res = $adminObj->updateApproveInterest($disapproveInterestId, $disInterestCatId, $disinterest_text);
}

if( isset($_POST['approveDisapproveInterest-d']) )
{
	$interestId = $_POST['disapproveInterestId'];
	$res = $adminObj->approveInterest($interestId);
}

$newInterestArray = $adminObj->getNewInterest();
$approveInterestArray = $adminObj->getApproveInterest();
$disapproveInterestArray = $adminObj->getDisapproveInterest();
$interestCategoryArray = $adminObj->getInterestCategory();


?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
        <meta charset="utf-8">
       
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title>Startrishta | New Interest</title>
		<link rel="icon" type="image/png" href="images/favico.png">
	
	<!-- Styling -->
	<link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/ui.css" rel="stylesheet">
	
	<!-- Theme -->
	<link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

		<link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet"> 
	<!-- Owl Carousel -->
	<link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
	<link href="vendor/plugins/form/bootstrap-select/bootstrap-select.css" rel="stylesheet">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
	<link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
	    
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    </head>
    
    <body>
	<!-- Preloader -->
	    <div id="preloader"><div id="status">&nbsp;</div></div>
	
	<div class="wrapper dashboard">
	<!-- THEME OPTIONS -->
	   
	    
	<?php  include("include/header.php"); ?>
	<!-- SIDEBAR -->
	<?php include("include/side-menu.php") ?>
	    
	   
	<!-- SIDEBAR -->
	    
	<!-- MAIN -->
	    <div class="main clearfix">
	    	<!-- CONTENT -->
			<div id="content" class="">
			    <div class="container-fluid">
					<div class=" drag-drop dash-main">
						<div class="row-10">
					   		<h5 class="no-space"> Interests</h5>
					   		<br/><br/>
					   		<div class="col-lg-10 clearfix">
					   			<div role="tabpanel">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active"><a href="#tab2a" aria-controls="tab2a" role="tab" data-toggle="tab">New Interests (<?php echo count($newInterestArray);?>)</a></li>
										<li role="presentation"><a href="#tab1a" aria-controls="tab1a" role="tab" data-toggle="tab">Approved Interests (<?php echo count($approveInterestArray);?>)</a></li>
										<li role="presentation"><a href="#tab3a" aria-controls="tab3a" role="tab" data-toggle="tab">Disapproved Interest (<?php echo count($disapproveInterestArray);?>)</a></li>
									</ul>
									
									<!-- Tab panes -->
									<div class="tab-content">
										<!-- NEW INTEREST -->
										<div role="tabpanel" class="tab-pane fade in active" id="tab2a">
										<?php 
										foreach( $newInterestArray as $newInterest )
										{
											$interestId = $newInterest['interest_id'];
											$interestInfo = $adminObj->getInterestInfo($interestId);
											$interestCatId = $interestInfo['cat_id'];
											
											$getUser = $adminObj->getUserByInterest($interestId);
											$getUserFetch = mysql_fetch_array($getUser);
											?>
											<form action="" method="post">
												<input type="hidden" value="<?php echo $interestId;?>" name="interestId"/>
												<input type="hidden" value="<?php echo $interestInfo['cat_id'];?>" name="newInterestCatId" />
												<ul class="intrest-search-bar clearfix">
													<li>User ID: <?php echo $getUserFetch['user_id']; ?></li>
													<li>
														<ul class="intrest-search clearfix">
															<li>
																<div class="form-group">
																<select id="n-demo-htmlselect-<?php echo $interestId;?>" class="demo-htmlselect" name="newInterest">
																<?php 
																foreach( $interestCategoryArray as $interestCategory )
																{
																	if( $interestCatId == $interestCategory['cat_id'] ) 		$selected='selected'; else $selected='';
																	?>
																	<option data-imagesrc="assets/images/interest/<?php echo $interestCategory['icon'];?>.png" <?php echo $selected;?> value="<?php echo $interestCategory['cat_id'];?>" ><?php echo $interestCategory['category'];?></option>
																	<?php 
																} 
																?>
																</select>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<input type="text" class="form-control" name="newinterest_text" value="<?php echo $interestInfo['interest'];?>" />
																</div>
															</li>
														</ul>
													</li>
													<li>
														<button type="submit" class="btn btn-block" name="updateNewInterest">Update</button>
													</li>
													<li>
														<button type="submit" class="btn btn-success" name="approveInterest">Approve</button>
													</li>
													<li>
														<button type="submit" class="btn btn-block" name="disapproveInterest">Reject</button>
													</li>
												</ul>
											</form>
											<?php 
										} 
										?>
										</div>
										
										<!-- APPROVED INTEREST -->
										<div role="tabpanel" class="tab-pane fade" id="tab1a">
										<?php 
										foreach( $approveInterestArray as $approveInterest )
										{
											$interestId = $approveInterest['interest_id'];
											$interestInfo = $adminObj->getInterestInfo($interestId);
											$interestCatId = $interestInfo['cat_id'];
											
											$getUser = $adminObj->getUserByInterest($interestId);
											$getUserFetch = mysql_fetch_array($getUser);
											?>
											<form action="" method="post">	
												<input type="hidden" value="<?php echo $interestId;?>" name="approveInterestId"/>
												<input type="hidden" value="<?php echo $interestInfo['cat_id'];?>" name="InterestCatId" />
												<ul class="intrest-search-bar clearfix">
													<li>User ID: <?php echo $getUserFetch['user_id']; ?></li>
													<li>
														<ul class="intrest-search clearfix">
															<li>
																<div class="form-group">
																<select id="demo-htmlselect-<?php echo $interestId;?>" class="demo-htmlselect" name="approveInterest">
																<?php foreach($interestCategoryArray as $interestCategory){
																if($interestCatId == $interestCategory['cat_id']) $selected='selected'; else $selected='';
																?>
																	<option data-imagesrc="assets/images/interest/<?php echo $interestCategory['icon'];?>.png" <?php echo $selected;?> value="<?php echo $interestCategory['cat_id'];?>"><?php echo $interestCategory['category'];?></option>
																<?php } ?>
																</select>
																</div>
																
															</li>
															<li>
																<div class="form-group">
																	<input type="text" class="form-control" name="interest_text" value="<?php echo $interestInfo['interest'];?>" />
																</div>
															</li>
														</ul>
													</li>
													<li>
														Requested On:&nbsp;<?php echo date('d-m-Y g:i A', strtotime($approveInterest['added_on'])); ?>
													</li>
													<li>
														<button type="submit" class="btn btn-success" name="updateInterest">Update</button>
													</li>
													<li>
														<button type="submit" class="btn btn-block" name="approveDisapproveInterest">Reject</button>
													</li>
												</ul>
											</form>
											<?php 
										} 
										?>
										</div>
										
										<!-- DISAPPROVED INTEREST -->
									   <div role="tabpanel" class="tab-pane fade" id="tab3a">
										<?php 
										foreach( $disapproveInterestArray as $disapproveInterest )
										{
											$interestId = $disapproveInterest['interest_id'];
											$interestInfo = $adminObj->getInterestInfo($interestId);
											$interestCatId = $interestInfo['cat_id'];
											
											$getUser = $adminObj->getUserByInterest($interestId);
											$getUserFetch = mysql_fetch_array($getUser);
											?>
											<form action="" method="post">	
												<input type="hidden" value="<?php echo $interestId;?>" name="disapproveInterestId"/>
												<input type="hidden" value="<?php echo $interestInfo['cat_id'];?>" name="disInterestCatId" />
												<ul class="intrest-search-bar clearfix">
													<li>User ID: <?php echo $getUserFetch['user_id']; ?></li>
													<li>
														<ul class="intrest-search clearfix">
															<li>
																<div class="form-group">
																<select id="d-demo-htmlselect-<?php echo $interestId;?>" class="demo-htmlselect" name="disapproveInterest">
																<?php 
																foreach( $interestCategoryArray as $interestCategory )
																{
																	if( $interestCatId == $interestCategory['cat_id'] ) 		$selected='selected'; else $selected='';
																	?>
																	<option data-imagesrc="assets/images/interest/<?php echo $interestCategory['icon'];?>.png" <?php echo $selected;?> value="<?php echo $interestCategory['cat_id'];?>"><?php echo $interestCategory['category'];?></option>
																	<?php 
																} 
																?>
																</select>
																</div>
															</li>
															<li>
																<div class="form-group">
																	<input type="text" class="form-control" name="disinterest_text" value="<?php echo $interestInfo['interest'];?>" />
																</div>
															</li>
														</ul>
													</li>
													<li>
														<button type="submit" class="btn btn-success" name="updateDisInterest">Update</button>
													</li>
													<li>
														<button type="submit" class="btn btn-block" name="approveDisapproveInterest-d">Approve</button>
													</li>
												</ul>
											</form>	
											<?php 
										} 
										?>
										</div>
									</div>
									
								</div><!-- /tabpanel -->
							</div>
			    		</div>
					<div class="clearfix"></div>
			<!-- /drag-drop -->
					</div>	<!-- col-lg-9 closed-->
					
			   		</div><!-- container-fluid -->
				</div><!-- content -->
	    	</div><!-- main -->
			<!-- /MAIN  -->
		</div><!-- wrapper -->	
	<?php include("include/foot.php"); ?>
	<!--credits modal-->	
	</div>
</div>
<script>
	$(document).ready(function()
	{
		$('#result-modal').modal('show');
		<?php 
		foreach( $newInterestArray as $Interest )
		{ 
			$interestId = $Interest['interest_id'];
			?>
			var interestId = '<?php echo $interestId;?>';
			$('#n-demo-htmlselect-'+interestId).ddslick({
				defaultSelectedIndex: interestId
			});
			<?php 
		}
		#Approved photos
		foreach( $approveInterestArray as $approveInterest )
		{ 
			$interestId = $approveInterest['interest_id'];
			?>
			var interestId = '<?php echo $interestId;?>';
			$('#demo-htmlselect-'+interestId).ddslick({
				defaultSelectedIndex: interestId
			});
			<?php 
		}
		#Disapproved photos
		foreach( $disapproveInterestArray as $disapproveInterest )
		{ 
			$interestId = $disapproveInterest['interest_id'];
			?>
			var interestId = '<?php echo $interestId;?>';
			$('#d-demo-htmlselect-'+interestId).ddslick({
				defaultSelectedIndex: interestId
			});
			<?php 
		} 
		?>
			
		$('.dd-option').click(function(){
			var catId = $(this).children('.dd-option-value').val();
			$("input[name='InterestCatId'").val(catId);
		});
	});
</script>	
</body>	
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>