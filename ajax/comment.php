<?php
require('../classes/user_class.php');
$userProfileObj=new User();
$user_id = $_SESSION['user_id'];

function getProfileImage($profile_image){
		if($profile_image == ''){
			return "upload/profile_images/dummy-profile.png";
		}else if( ! file_exists("../upload/photo/$profile_image")){
			return "upload/profile_images/dummy-profile.png";
		}else {
			return "upload/photo/$profile_image";
		}
	}
	
$userResult = $userProfileObj->getUserInfo($user_id);
$userProfileImage=getProfileImage($userResult['profile_image']);

if(isset($_POST['action']) && $_POST['action']=='addComment'){
	
	$photo_id = $_POST['com_pid'];
	$comment_text = $_POST['comment_text'];
	
	$insertQuery = mysql_query("INSERT INTO sr_photo_comment SET comment='".$comment_text."', photo_id='".$photo_id."', commented_by='".$user_id."', commented_on='".DATE_TIME."' ");
	if($insertQuery){
		$commentArray = $userProfileObj->getLastPhotoComment($photo_id);
		foreach($commentArray as $commentResult){
			$comment_id=$commentResult['comment_id'];
			$comment=$commentResult['comment'];
			$commented_uid=$commentResult['user_id'];
			$commented_by=$commentResult['user_name'];
			$commented_image=$commentResult['profile_image'];
			$commented_on=$userProfileObj->getTimeToStr($commentResult['commented_on']);
			?>
			<div class="profile_pic_coment comment_1" id="commentDiv-<?php echo $comment_id;?>" >
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 margin-t15">
					<div class="row-1 img_comment">
						<img src="<?php echo SITEURL."upload/photo/200X200/".$commented_image;?>">
					</div>
				</div>
				<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
					<ul class="user-details-delet">
						<li>
							<a href="profile.php?uid=<?php echo $commented_uid;?>">
								<?php echo $commented_by;?></a>
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
										<a class="add_comment-_btn cancelTextarea" href="javascript:void(0);">Cancel</a>
									</div>
								</form>
							</div>
						</div>
						<div id="CommentReplyDiv-<?php echo $comment_id;?>"></div>
					</div>
				</div>
			</div>
	<?php } 
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteComment'){
	
	$comment_id=$_POST['del_com_id'];
	$photo_id=$_POST['del_com_pid'];
	
	$Query=mysql_query("DELETE FROM sr_photo_comment WHERE photo_id='".$photo_id."' AND comment_id='".$comment_id."' AND commented_by = '".$user_id."'");
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}
/*************** delete my all comments of my photo ********************/

if(isset($_POST['action']) && $_POST['action']=='deleteAllmyPhotoComment'){
	$myphotoList='(0)';
	$myphotoComList='(0)';
	$user_id = $_SESSION['user_id'];
	$myphotoSQl = "select * from  sr_user_photo where user_id='".$user_id."'";
	$myphotoObj = mysql_query($myphotoSQl);
	if(mysql_num_rows($myphotoObj)>0){
		while($myphotoInfo = mysql_fetch_array($myphotoObj)){
			$myphotoId[] = $myphotoInfo['photo_id'];
		}
		$myphotoList = implode(",", $myphotoId);
		/*******************************deleted comment ids **********************************************/
		$myphotoComSQl = "select * from  sr_photo_comment  WHERE photo_id IN (".$myphotoList.")  AND commented_by = '".$user_id."'";
		$myphotoComObj = mysql_query($myphotoComSQl);
		if(mysql_num_rows($myphotoComObj)>0){
			
			while($myphotoComInfo = mysql_fetch_array($myphotoComObj)){
				$myphotoComId[] = $myphotoComInfo['comment_id'];
			}
			$myphotoComList = implode(",", $myphotoComId);
			$QueryRelpy = mysql_query("DELETE FROM sr_comment_reply WHERE com_id IN (".$myphotoComList.")");
			$Query = mysql_query("DELETE FROM sr_photo_comment WHERE comment_id IN (".$myphotoComList.")  AND commented_by = '".$user_id."'");
			
		}
		
			//echo "DELETE FROM sr_photo_comment WHERE photo_id IN (".$myphotoList.")  AND commented_by = '".$user_id."'"; exit;
		
		//$Query=mysql_query("DELETE FROM sr_photo_comment WHERE photo_id IN (".$myphotoList.")  AND commented_by = '".$user_id."'");
		if($Query!=false || $QueryRelpy!=false){
			echo 1;
		}else {
			echo 0;
		}
	}
	
	
	
}

/**************************** Delete my all comments of other photos ************************/
if(isset($_POST['action']) && $_POST['action']=='deleteAllotherPhotoComment'){
	
	$myphotoList='(0)';
	$user_id = $_SESSION['user_id'];
	$myphotoSQl = "select * from  sr_user_photo where user_id='".$user_id."'";
	$myphotoObj = mysql_query($myphotoSQl);
	if(mysql_num_rows($myphotoObj)>0){
		while($myphotoInfo = mysql_fetch_array($myphotoObj)){
			$myphotoId[] = $myphotoInfo['photo_id'];
		}
		$myphotoList = implode(",", $myphotoId);
		/*******************************deleted comment ids **********************************************/
		$myphotoComSQl = "select * from  sr_photo_comment  WHERE photo_id NOT IN (".$myphotoList.")  AND commented_by = '".$user_id."'";
		$myphotoComObj = mysql_query($myphotoComSQl);
		if(mysql_num_rows($myphotoComObj)>0){
			
			while($myphotoComInfo = mysql_fetch_array($myphotoComObj)){
				$myphotoComId[] = $myphotoComInfo['comment_id'];
			}
			$myphotoComList = implode(",", $myphotoComId);
			$QueryRelpy = mysql_query("DELETE FROM sr_comment_reply WHERE com_id IN (".$myphotoComList.")");
			$Query = mysql_query("DELETE FROM sr_photo_comment WHERE comment_id IN (".$myphotoComList.")  AND commented_by = '".$user_id."'");
			
		}
		if($Query){
			echo 1;
		}else {
			echo 0;
		}
	}
}

//##################################REPLY#########################################
if(isset($_POST['action']) && $_POST['action']=='addReply'){
	
	$photo_id = $_POST['reply_pid'];
	$com_id = $_POST['reply_cid'];
	$text = $_POST['text'];
	
	$insertQuery = mysql_query("INSERT INTO sr_comment_reply SET com_id='".$com_id."', photo_id='".$photo_id."', text='".$text."', reply_by='".$user_id."', reply_on='".DATE_TIME."', updated_on='".DATE_TIME."' ");
	if($insertQuery){
		$replyArray = $userProfileObj->getLastCommentReply($photo_id , $com_id);
		foreach($replyArray as $replyResult){
			$reply_id=$replyResult['reply_id'];
			$reply=$replyResult['text'];
			$reply_uid=$replyResult['user_id'];
			$reply_by=$replyResult['user_name'];
			$reply_image=getProfileImage($replyResult['profile_image']);
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
	<?php 
		}
	}else{
		echo 0;
	}
	exit;
}

if(isset($_POST['action']) && $_POST['action']=='deleteReply'){
	
	$reply_id=$_POST['del_reply_id'];
	
	$Query=mysql_query("DELETE FROM sr_comment_reply WHERE reply_id='".$reply_id."' AND reply_by = '".$user_id."'");
	if($Query){
		echo 1;
	}else {
		echo 0;
	}
}
?>