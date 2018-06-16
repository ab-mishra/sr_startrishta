
		<div id="my-gallery-modal-<?php echo $privatePhotoId3.'-'.$iCount;?>" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog myphotos">
				<div class="modal-content">
					<div >
					<?php 
					$ph_count=1;
					foreach($privateGalleryArray3 as $gallery1){
						$ph_id1=$gallery1['photo_id'];
						if($privatePhotoId3 == $ph_id1) $head_class='block'; else $head_class='none';
					?>
						<div class="modal-header modal-header-<?php echo $privatePhotoId3.'-'.$iCount;?>" id="header-<?php echo $ph_id1.'-'.$iCount;?>" style="display:<?php echo $head_class;?>">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Private Photos </b><span class="brown-bg"> <?php echo $ph_count;?>/<?php echo $privatePhotoCount3;?> </span></h4>
						</div>
					<?php 
					$ph_count++;
					} ?>
						<div class="modal-body clearfix">
							<!------------------------CAPTION START--------------------------------------------->
							<?php 
								foreach($privateGalleryArray3 as $gallery2){
									$ph_id=$gallery2['photo_id'];
									if($privatePhotoId3 == $ph_id) $cap_class='block'; else $cap_class='none';
							?>
								<div class="margin-t-15 pull-left Full-width photo_caption photo_caption-<?php echo $privatePhotoId3.'-'.$iCount;?>" id="caption-<?php echo $ph_id.'-'.$iCount;?>" style="display:<?php echo $cap_class;?>">
									<div class="pull-left" id="photo_caption-<?php echo $ph_id.'-'.$iCount;?>">
										<?php echo $gallery2['caption'];?>
									</div>
									<a href="javascript:void(0);" id="edit_caption_button-<?php echo $ph_id.'-'.$iCount;?>" class="edit_caption_button" ><i class="fa fa-pencil"></i></a>
									
									<div id="edit_caption_box-<?php echo $ph_id.'-'.$iCount;?>" class="edit_caption_box photo_caps_edit d_none">
										<form>
											<div class="pull-left">
												<input type="text" placeholder="Caption" value="<?php echo $gallery2['caption'];?>" class="btn pull-left text_photo_caps" id="text_photo_caps-<?php echo $ph_id.'-'.$iCount;?>">
											</div>
											<div class="pull-left">
												<input class="btn pull-left save_photo_caps" id="save_photo_caps-<?php echo $ph_id.'-'.$iCount;?>" type="button" value="Save"> 
												<span>or <a class="cancel_photo_caps" id="cancel_photo_caps-<?php echo $ph_id.'-'.$iCount;?>" href="javascript:void(0);">Cancel</a></span>
											</div>
										</form>
									</div>
									
									<span class="pull-right"> 
										<a href="#" class="text-u">Get this photo rated</a> 
										<span class="edit-1 brown-bg-1">
											<i class="fa fa-question"></i>
										</span>
									</span>
								</div> 
							<?php } ?>	
							<!------------------------CAPTION START--------------------------------------------->
							
							
							<div class="relative pull-left margin-b10">
							<!--------------PHOTO SLIDER START-------------------------->
								
								<ul class="myphotosfix" id="bxslider-<?php echo $privatePhotoId3.'-'.$iCount;?>" >
									<?php foreach($privateGalleryArray3 as $gallery3){?>
										<li>
											<img src="<?php echo $userProfileObj->getPhotoPath($gallery3['photo']);?>" id="sliderImage-<?php echo $gallery3['photo_id'].'-'.$iCount;?>"/>
										</li>
									<?php } ?>
								</ul>
								<ul class="myphotosthum clearfix" id="bxslider-pager-<?php echo $privatePhotoId3.'-'.$iCount;?>">
									<?php 
									$iC=0;
									foreach($privateGalleryArray3 as $gallery4){?>
										<li data-slideIndex="<?php echo $iC;?>" id="myslider-<?php echo $gallery4['photo_id'].'-'.$iCount;?>">
											<a href="javascript:void(0);">
												<img src="<?php echo $userProfileObj->getPhotoPath($gallery4['photo']);?>" />
											</a>
										</li>
									<?php 
									$iC++;
									} ?>
								</ul>

								<!-------------PHOTO SIDER END-------------------------->
							
								<!--Report Photo Section--
								<div class="pull-left report_flag slideshow-1">
									<a href="javascript:void(0);"><img src="images/flag.png"/>Report photo</a>
								</div>	
								<!--End Report Photo Section-->
								<hr>
								<!--fade box 2-->
								<div class="slider-container-fadebox-1">
									<span class="v-middle">
										<p class="align-c color-white h4">
											<b>You’ve made this photo public.</b>
										</p>
										<p class="align-c color-white h4">
											<b>Everyone on Startrishta will be able to view it.</b>
										</p>
										<div class="popup_add_photo margin-t20">
											<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok" ><a href=""><b>Ok</b></a></span>
										</div>
									</span>
								</div>
								<!--End of fade box 2-->
								<!--fade box 3-->
								<div class="slider-container-fadebox-2">
									<span class="v-middle">
										<p class="align-c color-white h4">
											<b>Congratulation You’ve replace your profile photo!</b>
										</p>
										<div class="popup_add_photo margin-t20">
											<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-1" ><a href=""><b>Done</b></a></span>
										</div>
									</span>
								</div>
								<!--End of fade box 3-->
							</div>
							<!---------------------OPTIONS--------------------------------->
							<?php 
							$com_class='';
							foreach($privateGalleryArray3 as $gallery5){
								$p_id=$gallery5['photo_id'];
								
								if($privatePhotoId3 == $p_id) $com_class='block'; else $com_class='none';
							?>
								<div class="popup-right-box popup-right-box-<?php echo $privatePhotoId3.'-'.$iCount;?>" id="popup-right-box-<?php echo $p_id.'-'.$iCount;?>" style="display:<?php echo $com_class;?>">
									<!--<div>
										<a href="javascript:void(0);"  class="set_profile" id="set_profile-<?php echo $p_id.'-'.$iCount;?>">
											<span class="pull-right"><i class="fa fa-user"></i> Use as Profile Photo</span>
										</a>
									</div>-->
									<br />
									<div class="profile pull-right margin-t5">
										<ul>
											<li> 
												<a class="prof_dpdwn1 btn btn-default default slat-blue btn-pad"> <b>Edit Picture<i class="fa fa-sort-desc"></i></b>  </a>
												<ul class="prof_drop_dwn1">
													<li class="rotate-right" id="rotate_right-<?php echo $p_id.'-'.$iCount;?>"> &nbsp;<i class="fa fa-repeat"></i> &nbsp; Rotate Right</li>
													<li class="rotate-left" id="rotate_left-<?php echo $p_id.'-'.$iCount;?>"> &nbsp;<i class="fa fa-undo"></i> &nbsp; Rotate Left</li>
													<li class="make-public" id="make-public-<?php echo $p_id.'-'.$iCount;?>"> &nbsp;<i class="fa fa-thumb-tack"></i> &nbsp; Make Public</li>
													<li class="delete-photo" id="delete-photo-<?php echo $p_id.'-'.$iCount;?>"> &nbsp;<i class="fa fa-trash-o"></i> &nbsp; Delete</li>
												</ul>
											</li>
										</ul>
									</div>
								</div>
							<!-------------------------COMMENT START------------------------------------>
							<div class="photos_comments photos_comments-<?php echo $privatePhotoId3.'-'.$iCount;?>" id="comment-<?php echo $p_id.'-'.$iCount;?>" style="display:<?php echo $com_class;?>">
								<form>
									<div class="clearfix pull-left photo_cmnt">
										<label><img src="<?php echo $userProfileImage;?>"/></label>
										<textarea id="coment_textarea-<?php echo $p_id.'-'.$iCount;?>" placeholder="Comment.."></textarea>
										
										<div class="pull-left photo_cmnt_btn">
											<input class="btn pull-left addComment" id="addComment-<?php echo $p_id.'-'.$iCount;?>" class="comment_textarea" type="button" value="Add Comments"> 
											<span class="pull-left"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);">Cancel</a></span>
										</div>
										
									</div>
									
									<hr>
									<div id="comments_box-<?php echo $p_id.'-'.$iCount;?>">
									<?php 
									$commentQuery=mysql_query("SELECT u.user_id,u.user_name,u.profile_image ,c.* FROM sr_photo_comment c,sr_users u WHERE photo_id = '".$p_id."' AND u.user_id=c.commented_by ORDER BY commented_on DESC");
									while($commentResult=mysql_fetch_assoc($commentQuery)){
										$comment_id=$commentResult['comment_id'];
										$comment=$commentResult['comment'];
										$photoId=$commentResult['photo_id'];
										$commented_by=$commentResult['user_name'];
										$commented_image=$userProfileObj->getProfileImage($commentResult['profile_image']);
										$commented_on=$commentResult['commented_on'];
									?>
										<div class="clearfix full" id="comment-<?php echo $comment_id.'-'.$iCount;?>">
											<label><img src="<?php echo $commented_image;?>"/></label>
											<div>
											<span><a href="javascript:void(0);"><?php echo $commented_by;?></a> <p><i><?php echo date('d-M-Y h:i' , strtotime($commented_on));?></i>|</p> <a href="javascript:void(0);">Reply |</a><a href="javascript:void(0);" class="delete_comment" id="delete_comment-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>">Delete |</a></span>
											<p><?php echo $comment;?></p>
											</div>
										</div>
									<hr>
									<?php } ?>
									</div>
								</form>
								<div class="photos_subscribe">
									<a href="">Subscribe to comments</a>
								</div>
							</div>
							<!-------------------------COMMENT START------------------------------------>
							<!--delete photo fade box-->
								<div class="photo-delete-fadebox" id="photo-delete-fadebox-<?php echo $p_id.'-'.$iCount;?>">
									<span class="v-middle">
										<p class="align-c color-white h4"><b>Wait! are you sure you want to delete this photo?</b></p>
										<div class="popup_add_photo margin-t20">
											<span class="btn btn-default default slat-blue cancle cancel-delete-photo" id="cancel-delete-photo-<?php echo $p_id.'-'.$iCount;?>">Cancel</span>
										</div>
										<p class="align-c"><a href="javascript:void(0);" id="delete-photo-<?php echo $p_id.'-'.$iCount;?>" class="color-green delete-delete-photo" >Delete</a></p>
									</span>
								</div>
							<!--End delete photo fade box-->
						<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Other Photo Gallery Popup end-->
		
		<!--start delete model popup -->
		<div id="deletePhoto-<?php echo $privatePhotoId3; ?>" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div class="clearfix">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Delete Photo</b></h4>
						</div>
						
						<div class="modal-body clearfix">
							<span class="login-form">
								<div>
								<h5 class="align-c lh-20">
									<b>Wait are you sure</b>
								</h5>
								<h5 class="align-c lh-20"> 
									<b>you want to delete this photo?</b>
								</h5>
								</div>
								<form action="" method="post">
									
									<div class="popup_add_photo margin-t20">
										<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom slat-blue" data-dismiss="modal">Cancel</a>
										<br><br>
										
									<a href="photos.php?action=deletePhoto&photo_id=<?php echo $privatePhotoId3; ?>" class="green">Delete</a>
									</div>
								</form>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
														<!--- delete model popup --->