
<div id="gallery-modal-<?php echo $photo_id.'-'.$iCount;?>" class="gallery-modal modal fade login_pop" role="dialog" >
	<div class="modal-dialog myphotos">
		<div class="modal-content">
			<div >
			<?php 
			$ph_count=1;
			foreach($galleryArray as $gallery1){
				$ph_id1=$gallery1['photo_id'];
				if($photo_id == $ph_id1) $head_class='block'; else $head_class='none';
			?>
				<div class="modal-header modal-header-<?php echo $photo_id.'-'.$iCount;?>" id="header-<?php echo $ph_id1.'-'.$iCount;?>" style="display:<?php echo $head_class;?>">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4><b>Photos of <?php echo $otherUserResult['user_name'];?> </b><span class="brown-bg"> <?php echo $ph_count;?>/<?php echo $countPhoto;?> </span></h4>
				</div>
			<?php 
			$ph_count++;
			} ?>
				<div class="modal-body clearfix">
					<!------------------------CAPTION START--------------------------------------------->
					<?php 
						foreach($galleryArray as $gallery2){
							$ph_id=$gallery2['photo_id'];
							if($photo_id == $ph_id) $cap_class='block'; else $cap_class='none';
					?>
						<div class="margin-t-15 pull-left Full-width photo_caption" style="display:<?php echo $cap_class;?>">
							<div class="pull-left">
								<?php echo $gallery2['caption'];?>
							</div>
							<span class="pull-right"> 
							<?php //if($gallery2['rate_status'] == 1) {?>
								<a href="rate-photos.php?pid=<?php echo $ph_id ;?>" class="text-u">Rate this photo</a> 
								<span class="edit-1 brown-bg-1">
									<i class="fa fa-question"></i>
								</span>
							<?php //} ?> 
							</span>		
						</div> 
					<?php } ?>	
					<!------------------------CAPTION END--------------------------------------------->
					<div class="relative for2ndchild pull-left margin-b10">
					<!--------------PHOTO SLIDER START-------------------------->
						
					<div class="bxslider-wrap" id="bxslider-wrap-<?php echo $photo_id.'-'.$iCount;?>">
						<ul class="myphotosfix" id="bxslider-<?php echo $photo_id.'-'.$iCount;?>" >
							<?php foreach($galleryArray as $gallery3){?>
								<li>
									<img src="<?php echo $userProfileObj->getPhotoPath($gallery3['photo']);?>" id="sliderImage-<?php echo $gallery3['photo_id'].'-'.$iCount;?>"/>
								</li>
							<?php } ?>
						</ul>
					</div>
						<ul class="myphotosthum clearfix" id="bxslider-pager-<?php echo $photo_id.'-'.$iCount;?>">
							<?php 
							$iC=0;
							foreach($galleryArray as $gallery4){?>
								<li data-slideIndex="<?php echo $iC;?>" id="myslider-<?php echo $gallery4['photo_id'].'-'.$iCount;?>">
									<a href="javascript:void(0);">
										<img src="<?php echo $userProfileObj->getPhotoPath($gallery4['photo']);?>" />
									</a>
								</li>
							<?php 
							$iC++;
							} ?>
						</ul>
						<ul class="pop_fixed_optn pull-left">
							<!--<li>
								<a href="javascript:void(0);" class="fb_caps_btn">
									<img src="images/fb_thum_icon.png"/>
									<div class="caps">0</div>
								</a>
							</li>-->
							<li>
								<a href="javascript:void(0)" class="lock_caps_btn">
									<img src="images/lock_thum_icon.png"/>
									<div class="caps"><?php echo $UserPrivatePhotoCount;?></div>
								</a>
							</li>
						</ul>
						<!-------------PHOTO SIDER END-------------------------->
						<!------------------------------REPORT PHOTO-------------------------------->
						<input type="hidden" class="reportPhotoId" value="">
						<?php 
						foreach($galleryArray as $reportgallery){
							$reportgallery['photo_id'];
							if($photo_id == $reportgallery['photo_id']) $rep_class='block'; else $rep_class='none';
						?>
						<div class="pull-left report_flag report_btn report_photo_btn popup-right-box-<?php echo $photo_id.'-'.$iCount;?>" style="display:<?php echo $rep_class;?>" id="popup-right-box-<?php echo $reportgallery['photo_id'].'-'.$iCount;?>">
							<a href="javascript:void(0);"><img src="images/flag.png"/>Report photo</a>
						</div>
						<?php } ?>
						<hr>
						<!--##################################REPORT PHOTO##############################-->
						<div class="slider-container-fadebox-1 report_option photo_report">
							<span class="v-middle report">
								<p class="align-c color-white h3 report_btn">
									<b>Report This Photo </b>
								</p>
								<form class="report_caps clearfix login-form">
									<div>
										<div class="check_box">
											<div class="swith_gq report unique">
												<input type="radio" name="reportPhotoReason" id="photoabuse" value="Inappropriate Photo">
												<label for="photoabuse"><span class="left"><span></span></span><p class="left">Inappropriate Photo</p></label>
											</div>
										</div>
									</div>
									<div>
										<div class="check_box">
											<div class="swith_gq report unique">
												<input type="radio" name="reportPhotoReason" id="photoabuse2" value="Celebrity/ Imposter Photo">
												<label for="photoabuse2"><span class="left"><span></span></span><p class="left">Celebrity/ Imposter Photo</p></label>
											</div>
										</div>
									</div>
									<div>
										<div class="check_box">
											<div class="swith_gq report unique">
												<input type="radio" name="reportPhotoReason" id="photoabuse3" value="Other">
												<label for="photoabuse3"><span class="left"><span></span></span><p class="left">Other</p></label>
											</div>
										</div>
									</div>
									
									<div>
										<textarea class="reportPhotoTextarea" maxlength="500"></textarea>
										<span style="float:left;" class="count_reportPhoto">0/500</span>
									</div>
									
									<div class="popup_add_photo margin-t20">
										<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" >
											<a href="javascript:void(0);" class="color-white submit_photo_report">Report</a>
										</span>
										<span class="clearfix color-white">or <a href="javascript:void(0);" class="txt_green cancel_photo_report">Cancel</a></span>
									</div>
								</form>
							</span>
						</div>
					
						<div class="slider-container-fadebox-1 report_confirm">
							<span class="v-middle fb">
								<p class="align-c color-white h4">
									Thank you, we will investigate your <br />report immediately
								</p>
								
								<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" ><a href="javascript:void(0);" class="white done_report">Done</a></span>
								</div>
							</span>
						</div>
					
						<!--##################################FACEBOOK#############################-->
						<div class="slider-container-fadebox-1  facebook_option">
							<span class="v-middle fb">
								<p class="align-c color-white h4">
									<b><i class="fa fa-camera"></i> <span>0</span> Photos</b>
								</p>
								<a href="javascript:void(0)" class="align-c d_block"><img src="images/fb_caps_icon.png"/></a>
								<div class="fb_bar_caps">
									<a href="javascript:void(0)" ><img src="images/fb_icon_white.png"/> Add 5 more photos to unlock</a>
								</div>
								<p class="align-c color-white">
									To see other users' Facebook photos you need to add <b>at least 5 photos</b><br /> of you and friends from Facebook
								</p>
								<!--<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" ><a href=""><b>Ok</b></a></span>
								</div>-->
							</span>
						</div>
						<!--#################################PRIVATE PHOTO##############################-->
						<div class="slider-container-fadebox-1  lock_option">
							<span class="v-middle fb">
								<p class="align-c color-white h4">
									<b><i class="fa fa-camera"></i> <span><?php echo $UserPrivatePhotoCount;?></span> Photos</b>
								</p>
								<a href="javascript:void()" class="align-c d_block"><img src="images/lock_caps_icon.png"/></a>
								<p class="align-c color-white">
									<?php echo $otherUserResult['user_name'];?> has marked <?php echo $UserPrivatePhotoCount;?> of <?php if($otherUserResult['gender'] == 2) echo "Her";else { echo "His";}?>  photos as private. You can look at these <br /> photos only after you chat to him.
								</p>
								<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" >
										<a href="javascript:void(0);" class="white message_now" id="chatnow-<?php echo $userId;?>" onclick="$('.gallery-modal').modal('hide');">Chat now!</a>
									</span>
									<span class="clearfix color-white">or <a href="javascript:void(0);" class="txt_green skip_private_photo">Skip private photos</a></span>
								</div>
							</span>
						</div>
						<!--#################################PHOTO COUNT##############################-->
						<?php if($MyPhotoCount < 3){
							$remCount = 3-$MyPhotoCount;
						?>
						<div class="slider-container-fadebox-1" style="display:block;">
							<span class="v-middle fb">
								<p class="align-c color-white h4">
									<b>You need to add <?php echo $remCount.' more ';if($remCount==1) echo 'photo'; else echo 'photos';?> </b>
								</p>
								<div class="line100"></div>
								<p class="align-c color-white">
									To view all his photos you must have at least 3 photos of you!
								</p>
								<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" data-target="#addMyPhotoModal" data-toggle="modal" onclick="$('.gallery-modal').modal('hide');" >Upload Photo</span>
									<span class="clearfix color-white">or</span>
									<div class="fb_bar_caps">
										<a href="javascript:void(0);" ><img src="images/fb_icon_white.png"/>Import photos from facebook</a>
									</div>
								</div>
							</span>
						</div>
						<?php } ?>
						<!--##################################NOT MOderate PHOTO##############################-->
						<div class="slider-container-fadebox-1  not_moderate">
							<span class="v-middle fb clearfix pull-left">
								<p class="align-c color-white h4">
									<b>Not moderated</b>
								</p>
								<a href="javascript:void()" class="align-c d_block"><img src="images/no_modrate.png"/></a>
								<p class="align-c color-white">
									<strong>Attention!</strong> This content has not been reviewed yet and may be inappropriate.
								</p>
								<p class="align-c color-white">
									You can click  &#8220;Skip&#8221; below to avoid seeing any potentially offensive content. <br />Click &#8220;Continue&#8221; if you would like to view the content.
								</p>
								<div class="clearfix">
									<div class="check_box mod">
										<span class="left">
											<input type="checkbox" id="" class="style-checkbox check1">
											<span class="style-checkbox3 style_imp_checkbox"><i class="fa fa-square fa"></i></span>
										</span>
									</div>
									<div class="txt color-white left margin-l5">Don't ask me again</div>
								</div>
								
								<div class="popup_add_photo margin-t20">
									<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" ><a href="" class="white">Continue</a></span>
									<span class="clearfix color-white">or <a href="" class="txt_green">Skip</a></span>
								</div>
							</span>
							
						</div>
						
					</div>
					<!---------------------OPTIONS--------------------------------->
					<?php 
					$com_class='';
					foreach($galleryArray as $gallery5){
						$p_id=$gallery5['photo_id'];
						
						if($photo_id == $p_id) $com_class='block'; else $com_class='none';
					?>
					<!-------------------------COMMENT START------------------------------------>
					<div class="photos_comments photos_comments-<?php echo $photo_id.'-'.$iCount;?>" id="comment-<?php echo $p_id.'-'.$iCount;?>" style="display:<?php echo $com_class;?>">
						<form>
							<div class="clearfix pull-left photo_cmnt full padding-r10">
								<label><img src="<?php echo $userProfileImage;?>"/></label>
								<div class="col-md-11 col-xs-11 pull-right">
									<input type="text" class="form-control input_type_text" id="coment_textarea-<?php echo $p_id.'-'.$iCount;?>" placeholder="Comment..">
								</div>
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
								$commented_id=$commentResult['user_id'];
								$commented_by=$commentResult['user_name'];
								$commented_image=$userProfileObj->getProfileImage($commentResult['profile_image']);
								$commented_on=$userProfileObj->getTimeToStr($commentResult['commented_on']);
							?>
								<div class="clearfix full" id="comment-<?php echo $comment_id.'-'.$iCount;?>">
									<label><img src="<?php echo $commented_image;?>"/></label>
									<div class="col-md-11 col-xs-11 pull-right">
										<ul class="coment_replay">
											<li><a href="javascript:void(0);"><?php echo $commented_by;?></a></li>
											<li><i><?php echo $commented_on;?></i></li><li>|</li>
											<li><a href="javascript:void(0);" class="reply_comment" id="reply_comment-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>">Reply </a></li><li>|</li>
											<?php if($user_id==$commented_id) {?>
												<li><a href="javascript:void(0);" class="delete_comment" id="delete_comment-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>">Delete </a></li><li>|</li>
											<?php } ?>
										</ul>
										<p><?php echo $comment;?></p>
										<!--###################################################################-->
										<div class="col-md-12 col-xs-12 pull-right padding-r0 margin-t10" id="CommentReplyDiv-<?php echo $comment_id.'-'.$iCount;?>">
										<?php
											$replyArray = $userProfileObj->getAllCommentReply($photoId , $comment_id);
											foreach($replyArray as $replyResult){
												$reply_id=$replyResult['reply_id'];
												$reply=$replyResult['text'];
												$reply_uid=$replyResult['user_id'];
												$reply_by=$replyResult['user_name'];
												$reply_image=$userProfileObj->getProfileImage($replyResult['profile_image']);
												$reply_on=$userProfileObj->getTimeToStr($replyResult['reply_on']);
											?>
											<div id="reply-content-<?php echo $reply_id;?>">
												<label>
													<img src="<?php echo $reply_image;?>" class="input_type_text_label" />
												</label>
												<div class="col-md-11 col-xs-11 pull-right">
												<ul class="coment_replay">
													<li><a href="javascript:void(0);"><?php echo $reply_by;?></a></li>
													<li><i><?php echo $reply_on;?></i></li><li>|</li>
													<?php /* if($user_id==$commented_id) {?>
														<li><a href="javascript:void(0);" class="delete_comment" id="delete_comment-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>">Delete </a></li><li>|</li>
													<?php }*/ ?>
												</ul>
												<p><?php echo $reply;?></p>
												</div>
											</div>
										<?php } ?>
										</div>
										<div class="col-md-12 col-xs-12 pull-right padding-r0 margin-t10" style="display:none;" id="reply_div-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>">
												<label><img src="<?php echo $commented_image;?>" class="input_type_text_label"/></label>
												<div class="col-md-11 col-xs-11 pull-right">	
													<input type="text" class="form-control input_type_text reply_textarea" id="reply_textarea-<?php echo $comment_id.'-'.$photoId.'-'.$iCount;?>" placeholder="Reply.." />
												</div>
										</div>
											<!--<div class="pull-left photo_cmnt_btn">
												<input class="btn pull-left addComment" id="addComment-<?php echo $p_id.'-'.$iCount;?>" class="comment_textarea" type="button" value="Add Comments"> 
												<span class="pull-left padding-10 margin-t5"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);">Cancel</a></span>
											</div>-->
									</div>
								</div>
							</div>
							<hr>
							<?php } ?>
							</div>
						</form>
						<div class="photos_subscribe">
							<a href="javascript:void(0);">Subscribe to comments</a>
						</div>
					</div>
					<!-------------------------COMMENT END------------------------------------>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
		<!--Other Photo Gallery Popup end-->
		