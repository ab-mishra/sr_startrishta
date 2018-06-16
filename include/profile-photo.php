<div class="pull-left margin-t20">
<?php 

$userPhotoQuery=$userProfileObj->getUserPhoto($user_id);
$countPhoto =mysql_num_rows($userPhotoQuery);
if(mysql_num_rows($userPhotoQuery) == 0){

?>
	<div class="pro-photos empty">
		<div class="ad_pics pull-left">
			 <a href="javascript:void(0);" ><img src="images/add-img-icon-orange.png"/>
			</a>
		</div>
		<form enctype="multipart/form-data" method="post" action="">
		<div class="upload_pics_option pull-left">
			<span><p><strong>Upload Photos</strong> and meet people near you today. </p></span>
			<div>
				<div>
					<a class="btn btn-default default slat-blue" href="javascript:void(0);" data-target="#addMyPhotoModal" data-toggle="modal">Upload Photo </a>
					
					or 
					<?php /*if($isFbLinked){?>
						<a class="btn btn-default fb-blue bold" href="javascript:void(0);"> 
					<?php }else{ ?>
						<a class="btn btn-default fb-blue bold" href="javascript:void(0);" id="import-from-fb"> 
					<?php }*/ ?>
					<a class="btn btn-default fb-blue" 
					href="<?php echo FBIMPORT;?>" id="import-from-fb1">
					<i class="fa fa-facebook-square"></i> Import from Facebook </a>
				</div>
			</div>
		</div>
		</form>
	</div>
<?php } else { 
		$gallery_array = array();
		
		while($userPhotoResult = mysql_fetch_assoc($userPhotoQuery)){
			$gallery_array[] = $userPhotoResult;
		}
		
?>
	<div class="pro-photos">
		<div id="my-photoslider-wrap" style="visibility: hidden;">
			<div class="slider3">
				<?php 
				$iCount=1;
				foreach($gallery_array as $gallery){
					$photo_id=$gallery['photo_id'];
					$photo=$gallery['photo'];
				?>
					<div class="slide my-gallery" id="my-gallery-<?php echo $photo_id.'-'.$iCount;?>" style="cursor:pointer;">
						<img src="<?php echo $userProfileObj->getThumbPhotoPath($photo);?>">
					</div>	
				<?php 
				$iCount++;
				} ?>
			</div>
		</div>
	</div>
	<div class="pro-photos toadd adone">
		<a href=""  data-target="#addMyPhotoModal" data-toggle="modal">Add Photos</a>
	</div>
	<div class="pro-photos toadd adtwo">
		<a href="" data-target="#addMyPhotoModal" data-toggle="modal">Add Photos</a>
	</div>
	<div class="pro-photos toadd adthree">
		<a href="" data-target="#addMyPhotoModal" data-toggle="modal">Add Photos</a>
	</div>	

<?php } ?>
</div>