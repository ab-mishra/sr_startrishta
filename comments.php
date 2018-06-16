<?php 

require('classes/profile_class.php');

$page='comment';

$userProfileObj=new Profile();



require_once('include/header.php');

//500 characters

?>

<!doctype html>

<html>

<head>

	<title>Startrishta | Comment</title>

	

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<link rel="icon" type="image/png" href="images/favico.png">

	

	<?php require("include/script.php"); ?>

</head>



<body class="<?php echo $CustomizeTheme; ?>">

	<div class="main-body">

		<!--------PROMOTION PANEL--------------------->

		<?php //include('include/promotion-panel.php');?>

	

		<!--Main Container start here-->

		<div class="clearfix">

			<div class="nav_scroll in">

				<div class="container">

						<!-- it's header -->

						<?php require("include/header-inner.php"); ?>

						<!-- it's header -->

				</div>

			</div>

			<div class="border_grad"></div>

			<!-----------------GET ME HERE SLIDER--------------------------------------->

			<?php include('include/header-get-me-here.php');?>

			<!-----------------GET ME HERE SLIDER END----------------------------------->

			

			<div class="container">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<div class="row margin_t-60">

					<!--------------------LEFT SIDE------------------------>

						<?php include('include/profile-left-side.php');?>

					<!---------------------------------------------------------->

					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">

							<div class="row promotion_p3">

						<!--------PROMOTION PANEL--------------------->

							<?php include('include/promotion-panel.php');

							?>

							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<div class="row m-right_0">

									<div class="profile_view rated margin-b20 rh-height">

										<div class="fav_container">

											<h3 class="margin-b20 margin-t10 favorit">Your Photo Comments </h3>

											<div class="content-1 margin-b20">

												<div class="thumb-like raising" ><img src="images/icon-thumb-like.png" /></div>

												<div class="thumb-like-content padding-l20">

													<br>

													<p>Find all your photo comments in one place - a simple way to keep organised!</p>

												</div>

											</div>

										<!---------------------------------comment tab--------------------------->

											<div class="comment-tab">

												<ul>

													<li class="active"><a href="javascript:void(0);" data-rel="#tab-1">Your photos (<?php echo $allMyPhotoCount;?>)</a></li>

													<li><a href="javascript:void(0);" data-rel="#tab-2">Other's photos (<?php echo $otherPhotoCount;?>)</a></li>

												</ul>

												

										<!--#########################################YOUR PHOTO COMMENT################################-->

												<div class="comment-tab-details active" id="tab-1">		

												<?php 

												foreach($allMyPhotoArray as $photoResult){ 
													//print_r($photoResult);

													$photo_id=$photoResult['photo_id'];

													$photoPath = $userProfileObj->getPhotoPath($photoResult['photo']);

													$ratedPhotorating = $userProfileObj->getPhotoAverageRating($photo_id);

													if($photoPath != ''){

														?>

													<div class="comments-photos">

														<div class="row">

															<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">

																<div class="profile_pic">

																	<img src="<?php echo $photoPath;?>">

																	<div class="profile_pic-rating">

																	<?php if($photoResult['status'] == 0) {?>

																		<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>

																	<?php }else if($ratedPhotorating != 0){

																			echo round($ratedPhotorating);

																		}else {?>

																		<i class="fa fa-clock-o"  data-toggle="tooltip" data-placement="bottom" title="Photo is currently being rated"></i>

																	<?php }

																	?>

																	</div>

																</div>

															</div>

															<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">

																<div class="profile_pic_coment">

																	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pad_0800">

																		<div class="row-1 img_comment">

																			<img src="<?php echo $userProfileImage;?>">

																		</div>

																	</div>

																	<!--#################COMMENT TEXTAREA################-->

																	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">

																		<form class="form-group">

																			<input type="text" class="form-control textarea" id="commentTextarea-<?php echo $photo_id;?>">

																			<div class="margin-t10 add_c">

																				<a class="btn btn-default custom slat-blue add_comment-_btn addComment" id="addComment-<?php echo $photo_id;?>" href="javascript:void(0);">Add Comment</a> &nbsp;  Or &nbsp; 

																				<a class="add_comment-_btn cancelTextarea" href="javascript:void(0);">Cancel</a>

																			</div>

																		</form>

																	</div>

																	<!--<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pull-right">

																		<a href="javascript:void(0);"><i class="fa fa-close pull-right"></i></a>

																	</div>-->

																</div>

															<!--############### COMMENT DIV#########################-->

																<div id="photoCommentDiv-<?php echo $photo_id;?>">

																<?php 

																$commentArray = $userProfileObj->getLastPhotoComment($photo_id);

															foreach($commentArray as $commentResult){

																$comment_id=$commentResult['comment_id'];

																$comment=$commentResult['comment'];

																$commented_uid=$commentResult['user_id'];

																$commented_by=$commentResult['user_name'];

																$commented_image=$userProfileObj->getProfileImage($commentResult['profile_image']);

																$commented_on=$userProfileObj->getTimeToStr($commentResult['commented_on']);

																?>

																<div class="profile_pic_coment comment_1" id="commentDiv-<?php echo $comment_id;?>" >

																	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 margin-t15 pad_0800">

																		<div class="row-1 img_comment">

																			<img src="<?php echo $commented_image;?>">

																		</div>

																	</div>

																	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 pull-right">

																		<ul class="user-details-delet">

																			<li>

																				<a href="profile.php?uid=<?php echo $commented_uid;?>"><?php echo $commented_by;?></a>

																				<?php if($user_id == $commented_uid){

																						echo '<span> (you) </span>';} echo $commented_on;?>

																			</li>

																			<li> &nbsp; | &nbsp; </li>

																			<li>

																				<a href="javascript:void(0);" class="reply"> Reply  </a>

																			</li>

																		<?php if($user_id == $commented_uid){?>

																			<li> &nbsp; | &nbsp; </li>

																			<li>

																				<a href="javascript:void(0);" class="deleteComment" id="deleteComment-<?php echo $photo_id.'-'.$comment_id;?>">Delete</a>

																			</li>

																		<?php } ?>

																		</ul>

																		<p class="word-wrap"><?php echo $comment;?></p>

																		

																		<!---------------------------REPLY-------------------->

																		<div class="replay_coment">	

																			<hr>

																			<div class="add_comment_input add_c">

																				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

																					<div class="row-1 img_comment">

																						<img src="<?php echo $userProfileImage;?>">

																					</div>

																				</div>

																				<!--##############REPLY TEXTAREA################-->

																				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

																					<form class="form-group">

																						<input type="text" class="form-control textarea" id="replyTextarea-<?php echo $photo_id.'-'.$comment_id;?>">

																						<div class="margin-t10 add_c">

																							<a class="btn btn-default custom slat-blue add_comment-_btn addReply" id="addReply-<?php echo $photo_id.'-'.$comment_id;?>" href="javascript:void(0);">Reply</a> &nbsp;  Or &nbsp; 

																							<a class="add_comment-_btn cancelRepyTextarea" href="javascript:void(0);">Cancel</a>

																						</div>

																					</form>

																				</div>

																			</div>

																		<div id="CommentReplyDiv-<?php echo $comment_id;?>">

																			<?php

																			$replyArray = $userProfileObj->getLastCommentReply($photo_id , $comment_id);

																			foreach($replyArray as $replyResult){

																			$reply_id=$replyResult['reply_id'];

																			$reply=$replyResult['text'];

																			$reply_uid=$replyResult['user_id'];

																			$reply_by=$replyResult['user_name'];

																			$reply_image=$userProfileObj->getProfileImage($replyResult['profile_image']);

																			$reply_on=$userProfileObj->getTimeToStr($replyResult['reply_on']);

																			?>

																			<div id="replyDiv-<?php echo $reply_id;?>">

																			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 margin-t15">

																				<div class="row-1 img_comment">

																					<img src="<?php echo $reply_image;?>">

																				</div>

																			</div>

																			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

																				<ul class="user-details-delet">

																					<li>

																						<a href="javascript:void(0);"><?php echo $reply_by;?></a>

																						<?php if($user_id == $reply_uid){

																							echo '<span> (you) </span>';

																						} echo $reply_on.'</li><li> &nbsp; | &nbsp; </li>';

																						?>

																					<li>

																						<a href="javascript:void(0);" class="deleteReply" id="deleteReply-<?php echo $reply_id;?>">Delete</a>

																					</li>

																				</ul>

																				<p><?php echo $reply;?></p>

																			</div>

																			</div>

																			<?php } ?>

																		</div>

																		</div>

																		<!--------------------------End -replay-------------------->

																	</div>

																</div>

																</div>

															<?php } ?>

															<!--###############END COMMENT DIV#########################-->

															</div>

														</div>

													</div>

											<?php }

											} ?>

													<?php if($allMyPhotoCount){?>

													<div class="rs edit" id="visitor-edit">

														<div id="edit">

															<span><a href="javascript:void(0);"> <i class="fa fa-pencil"></i> Edit</a></span>

														</div>

														<div id="delet">

															<span class="" id="Cancel"><a href="javascript:void(0);">Cancel</a></span>

															<span class="margin-r10"><a href="javascript:void(0);" id="deleteAllmyPhotoComment"><i class="fa fa-trash-o"></i> Delete Comments</a></span>

															

															<!--<div class="select_all" id="select_all">

																<form>

																	<div>

																		<div class="radio my-radio">

																			<div class="select"><b>Select</b></div>

																			<div class="swith_gq">

																				<input type="radio" name="option" data-rel="#general" id="selectAllVisitor" class="my-radio">

																				<label for="selectAllVisitor"><span><span></span></span>All</label>

																			</div>

																			<div class="swith_gq">

																				<input type="radio" name="option" data-rel="#general" id="unselectAllVisitor" class="my-radio">

																				<label for="unselectAllVisitor"><span><span></span></span>None</label>

																			</div>

																		</div>

																	</div>

																</form>

															</div>-->

														</div>

													</div>		

													<?php } ?>

												</div>

										

										<!--#########################################OTHERS PHOTO COMMENT################################-->

											<div class="comment-tab-details" id="tab-2">		

												<?php 

												foreach($otherPhotoArray as $photoResult){ 

													$photo_id=$photoResult['photo_id'];

													$photoPath = $userProfileObj->getPhotoPath($photoResult['photo']);

													$ratedPhotorating = $userProfileObj->getPhotoAverageRating($photo_id);

													if($photoPath != ''){

														?>

													<div class="comments-photos">

														<div class="row">

															<div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">

																<div class="profile_pic">

																	<img src="<?php echo $photoPath;?>">

																	<div class="profile_pic-rating">

																	<?php if($photoResult['status'] == 0) {?>

																		<i class="fa fa-cog" data-toggle="tooltip" data-placement="bottom" title="Photo awaiting moderation"></i>

																	<?php }else if($ratedPhotorating != 0){

																			echo round($ratedPhotorating);

																		}else {?>

																		<i class="fa fa-clock-o"  data-toggle="tooltip" data-placement="bottom" title="Photo is currently being rated"></i>

																	<?php }

																	?>

																	</div>

																</div>

															</div>

															<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">

																<div class="profile_pic_coment">

																	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pad_0800">

																		<div class="row-1 img_comment pull-right">

																			<img src="<?php echo $userProfileImage;?>">

																		</div>

																	</div>

																	<!--#################COMMENT TEXTAREA################-->

																	<div class="col-lg-10 col-md-10 col-sm-9 col-xs-10">

																		<form class="form-group">

																			<input type="text" class="form-control textarea" id="commentTextarea-<?php echo $photo_id;?>">

																			<div class="margin-t10 add_c">

																				<a class="btn btn-default custom slat-blue add_comment-_btn addComment" id="addComment-<?php echo $photo_id;?>" href="javascript:void(0);">Add Comment</a> &nbsp;  Or &nbsp; 

																				<a class="add_comment-_btn cancelTextarea" href="javascript:void(0);">Cancel</a>

																			</div>

																		</form>

																	</div>

																	<!--<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">

																		<a href="javascript:void(0);"><i class="fa fa-close pull-right"></i></a>

																	</div>-->

																</div>

															<!--############### COMMENT DIV#########################-->

																<div id="photoCommentDiv-<?php echo $photo_id;?>">

																<?php 

																$commentArray = $userProfileObj->getLastPhotoComment($photo_id);

															foreach($commentArray as $commentResult){

																$comment_id=$commentResult['comment_id'];

																$comment=$commentResult['comment'];

																$commented_uid=$commentResult['user_id'];

																$commented_by=$commentResult['user_name'];

																$commented_image=$userProfileObj->getProfileImage($commentResult['profile_image']);

																$commented_on=$userProfileObj->getTimeToStr($commentResult['commented_on']);

																?>

																<div class="profile_pic_coment comment_1" id="commentDiv-<?php echo $comment_id;?>" >

																	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 margin-t15 pad_0800">

																		<div class="row-1 img_comment">

																			<img src="<?php echo $commented_image;?>">

																		</div>

																	</div>

																	<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

																		<ul class="user-details-delet">

																			<li>

																				<a href="profile.php?uid=<?php echo $commented_uid;?>"><?php echo $commented_by;?></a>

																				<?php if($user_id == $commented_uid){

																						echo '<span> (you) </span>';} echo $commented_on;?>

																			</li>

																			<li> &nbsp; | &nbsp; </li>

																			<li>

																				<a href="javascript:void(0);" class="reply"> Reply  </a>

																			</li>

																		<?php if($user_id == $commented_uid){?>

																			<li> &nbsp; | &nbsp; </li>

																			<li>

																				<a href="javascript:void(0);" class="deleteComment" id="deleteComment-<?php echo $photo_id.'-'.$comment_id;?>">Delete</a>

																			</li>

																		<?php } ?>

																		</ul>

																		<p><?php echo $comment;?></p>

																		

																		<!---------------------------REPLY-------------------->

																		<div class="replay_coment">	

																			<hr>

																			<div class="add_comment_input add_c">

																				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 pad_0800">

																					<div class="row-1 img_comment">

																							<img src="<?php echo $userProfileImage;?>">

																					</div>

																				</div>

																				<!--##############REPLY TEXTAREA################-->

																				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

																					<form class="form-group">

																						<input type="text" class="form-control textarea" id="replyTextarea-<?php echo $photo_id.'-'.$comment_id;?>">

																						<div class="margin-t10 add_c">

																							<a class="btn btn-default custom slat-blue add_comment-_btn addReply" id="addReply-<?php echo $photo_id.'-'.$comment_id;?>" href="javascript:void(0);">Reply</a> &nbsp;  Or &nbsp; 

																							<a class="add_comment-_btn cancelRepyTextarea" href="javascript:void(0);">Cancel</a>

																						</div>

																					</form>

																				</div>

																			</div>

																		<div id="CommentReplyDiv-<?php echo $comment_id;?>">

																			<?php

																			$replyArray = $userProfileObj->getLastCommentReply($photo_id , $comment_id);

																			foreach($replyArray as $replyResult){

																			$reply_id=$replyResult['reply_id'];

																			$reply=$replyResult['text'];

																			$reply_uid=$replyResult['user_id'];

																			$reply_by=$replyResult['user_name'];

																			$reply_image=$userProfileObj->getProfileImage($replyResult['profile_image']);

																			$reply_on=$userProfileObj->getTimeToStr($replyResult['reply_on']);

																			?>

																			<div id="replyDiv-<?php echo $reply_id;?>">

																			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 margin-t15">

																				<div class="row-1 img_comment">

																					<img src="<?php echo $reply_image;?>">

																				</div>

																			</div>

																			<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">

																				<ul class="user-details-delet">

																					<li>

																						<a href="javascript:void(0);"><?php echo $reply_by;?></a>

																						<?php if($user_id == $reply_uid){

																							echo '<span> (you) </span>';

																						} echo $reply_on.'</li><li> &nbsp; | &nbsp; </li>';

																						?>

																					<li>

																						<a href="javascript:void(0);" class="deleteReply" id="deleteReply-<?php echo $reply_id;?>">Delete</a>

																					</li>

																				</ul>

																				<p><?php echo $reply;?></p>

																			</div>

																			</div>

																			<?php } ?>

																		</div>

																		</div>

																		<!--------------------------End -replay-------------------->

																	</div>

																</div>

																</div>

															<?php } ?>

															<!--###############END COMMENT DIV#########################-->

															</div>

														</div>

													</div>

											<?php }

											} ?>

											<?php if($otherPhotoCount){?>

													<div class="rs edit" id="visitor-edit">

														<div id="edit1">

															<span><a href="javascript:void(0);"> <i class="fa fa-pencil"></i> Edit</a></span>

														</div>

														<div id="delet1">

															<span class="" id="Cancel1"><a href="javascript:void(0);">Cancel</a></span>

															<span class="margin-r10"><a href="javascript:void(0);" id="deleteAllotherPhotoComment"><i class="fa fa-trash-o"></i> Delete Comments</a></span>

															

															<!--<div class="select_all" id="select_all">

																<form>

																	<div>

																		<div class="radio my-radio">

																			<div class="select"><b>Select</b></div>

																			<div class="swith_gq">

																				<input type="radio" name="option" data-rel="#general" id="selectAllVisitor" class="my-radio">

																				<label for="selectAllVisitor"><span><span></span></span>All</label>

																			</div>

																			<div class="swith_gq">

																				<input type="radio" name="option" data-rel="#general" id="unselectAllVisitor" class="my-radio">

																				<label for="unselectAllVisitor"><span><span></span></span>None</label>

																			</div>

																		</div>

																	</div>

																</form>

															</div>-->

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

					<!---------------------------------------------------------->

					</div>

				</div>

			</div>

		<!--Main Container end here-->

		<?php 

		require("include/footer.php"); 

		require("include/foot.php"); 

		?>

		</div>

	</div>

<!---##################################################MODALS###################################################33#############-->



	

<script>

	$(window).load(function(){

		//NEW LIKE-ME PAGE

		var rh = $(".rh-height").height();

		var lh = $(".lh-height").height();

		if(lh > rh){

			$(".rh-height").height((lh)-50);

		} else{ $(".lh-height").height(rh); }

	});

	$(document).ready(function(){

	

	$(".comment-tab > ul li a").click(function(){

		$(".comment-tab > ul li").removeClass("active");

		$(this).parent("li").addClass("active");

		var tab = $(this).data('rel');

		$(".comment-tab > div").hide().removeClass("active");

		$(".comment-tab").find(tab).show().addClass("active");

		$(".rh-height").css('height' , 'auto');

	});

	//#############################EDIT BUTTON#######################################

		$("#edit").click(function(){

			$("#delet").css("display" , "block");

			$(".my-pro-check").css("display" , "block");

			$(this).css("display" , "none");

		});

		$("#Cancel").click(function(){

			$("#delet").css("display" , "none");

			$(".my-pro-check").css("display" , "none");

			$("#edit").css("display" , "block");

		});

		$("#edit1").click(function(){

			$("#delet1").css("display" , "block");

			//$(".my-pro-check").css("display" , "block");

			$(this).css("display" , "none");

		});

		$("#Cancel1").click(function(){

			$("#delet1").css("display" , "none");

			//$(".my-pro-check").css("display" , "none");

			$("#edit1").css("display" , "block");

		});

	//####################################################################

		$(".textarea").live('focus' , function(){

			var add_c = $(this).next(".add_c");

			add_c.slideDown("slow"); 

			$('.textarea').next('.add_c').not(add_c).slideUp("slow");

		});

		$(".cancelTextarea").live('click' , function(){

			$(this).parent().slideUp("slow");

			$(this).parent().prev().val('');

		});

	//####################CLOSE PHOTO'S COMMENT########################

		$(".profile_pic_coment .fa-close").click(function(){

			$(this).closest(".comments-photos").slideUp("slow");

		});

	//################COMMENT########################################

		$('.addComment').click(function(){

			$('#preloader').show();

			var ID=$(this).attr('id').split('-');

			var photo_id=ID[1];

			var comment_text = $('#commentTextarea-'+photo_id).val();

			if(comment_text == ''){

				$('#error_message_header').html('Alert');

				$('#error_message').html('Please enter comment.');

				$('#alert_modal').modal('show');

				$('#preloader').hide();

				return false;

			}

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{com_pid:photo_id ,comment_text:comment_text, action:'addComment'},

				success:function(result){

					$('#preloader').hide();

					$('#commentTextarea-'+photo_id).val('');

					if(result == 0){

						$('#error_message_header').html('Alert');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#photoCommentDiv-'+photo_id).html(result);

					}

				}

			});

		});

		$('.deleteComment').live('click' , function(){

			$('#preloader').show();

			var ID=$(this).attr('id').split('-');

			var photo_id=ID[1];

			var com_id=ID[2];

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{del_com_id:com_id ,del_com_pid:photo_id, action:'deleteComment'},

				success:function(result){

					$('#preloader').hide();

					if(result == 0){

						$('#error_message_header').html('Alert');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#commentDiv-'+com_id).remove();

					}

				}

			});

		});

		/*************** delete my all comments of my photo ********************/

		$('#deleteAllmyPhotoComment').live('click' , function(){

			$('#preloader').show();

			// var ID=$(this).attr('id').split('-');

			// var photo_id=ID[1];

			// var com_id=ID[2];

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{action:'deleteAllmyPhotoComment'},

				success:function(result){

					$('#preloader').hide();

					

					if(result == 0){

						$('#error_message_header').html('All comments of your photos have been deleted');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#error_message_header').html('');

						location.reload();

					}

				}

			});

		});

		/**************************** Delete my all comments of other photos ************************/

		$('#deleteAllotherPhotoComment').live('click' , function(){

			$('#preloader').show();

			// var ID=$(this).attr('id').split('-');

			// var photo_id=ID[1];

			// var com_id=ID[2];

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{action:'deleteAllotherPhotoComment'},

				success:function(result){

					$('#preloader').hide();

					if(result == 0){

						$('#error_message_header').html("All comments of other's photos have been deleted");

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#error_message_header').html('');

						location.reload();

					}

				}

			});

		});

			

	

	//#####################REPLY ON COMMENT################################

		$(".reply").live('click' ,function(){

			 $(this).closest("ul").siblings("div.replay_coment").children("div.add_comment_input").slideToggle("slow");

		});

		

		$('.addReply').live('click' ,function(){

			$('#preloader').show();

			var ID=$(this).attr('id').split('-');

			var photo_id=ID[1];

			var comment_id=ID[2];

			var text = $('#replyTextarea-'+photo_id+'-'+comment_id).val();

			if(text == ''){

				$('#error_message_header').html('Alert');

				$('#error_message').html('Please enter comment.');

				$('#alert_modal').modal('show');

				$('#preloader').hide();

				return false;

			}

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{reply_pid:photo_id , reply_cid:comment_id ,text:text, action:'addReply'},

				success:function(result){

					$('#preloader').hide();

					$('#replyTextarea-'+photo_id+'-'+comment_id).val('');

					if(result == 0){

						$('#error_message_header').html('Alert');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#CommentReplyDiv-'+comment_id).html(result);

					}

				}

			});

		});

		

		$('.deleteReply').live('click' , function(){

			$('#preloader').show();

			var ID=$(this).attr('id').split('-');

			var reply_id=ID[1];

			$.ajax({

				type:"POST",

				url:"ajax/comment.php",

				data:{del_reply_id:reply_id, action:'deleteReply'},

				success:function(result){

					$('#preloader').hide();

					if(result == 0){

						$('#error_message_header').html('Alert');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}else{

						$('#replyDiv-'+reply_id).remove();

					}

				}

			});

		});

		

		$(".cancelRepyTextarea").live('click' , function(){

			$(this).parent().parent().parent().parent().slideUp("slow");

		});

		

	});

</script>

</body>

</html>