<?php
include('../classes/adminClass.php');
$adminObj=new Admin();
$adminId=$_SESSION['ADMIN']['USER_ID'];


#Photos Reported
if( isset($_POST['action']) && $_POST['action']=='flagPhotoReport' )
{
	
	$userId = $_POST['user_id'];
	$photo_report_id = $_POST['report_id'];
	$option = $_POST['option'];
	$photo_id = $_POST['photo_id'];
	
	$query = mysql_query("UPDATE sr_photo_report SET is_read=1, admin_action='".$option."',admin_id='".$adminId."', action_date=now() WHERE photo_report_id='".$photo_report_id."'");
	
	if($query)
	{
		switch( $option )
		{
		case 1:	#Keep Photo
			$query = mysql_query("UPDATE sr_photo_report SET status=0 WHERE photo_report_id='".$photo_report_id."'");
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Photo Approved', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
		break;
		case 2: #Delete Photo
			$deleteQuery = mysql_query("UPDATE sr_user_photo SET status='2' WHERE photo_id='".$photo_id."'");
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Photo Deleted', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$photo_report_id."'");
		break;
		}

		echo 1;	
	}
	else{
		echo 0;
	}
	exit;
}


#Abuse Reported
if( isset($_POST['action']) && $_POST['action']=='flagUserReport' )
{
	
	$userId = $_POST['user_id'];
	$user_report_id = $_POST['report_id'];
	$option = $_POST['option'];
	
	$query = mysql_query("UPDATE sr_user_report SET is_read=1, admin_action='".$option."',admin_id='".$adminId."', action_date=now() WHERE user_report_id='".$user_report_id."'");
	
	if($query){
		if($option == 1){
			echo $result = $adminObj->suspendUser($userId, $user_name, $reason, $description);
		}
		elseif($option == 2){
			$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Dismiss Abuse Report', admin_id='".$adminId."', timestamp=now() , status=1 , report_id='".$user_report_id."'");
		}
	
	}else{
		echo 0;
	}
	exit;
}


#Approve Photo
if( isset($_POST['action']) && $_POST['action']=='approveNewPhoto' )
{	
	$userId = $_POST['user_id'];
	$photo_id = $_POST['photo_id'];
	$flag = $_POST['flag'];
	
	$query = mysql_query("UPDATE sr_user_photo SET status='".$flag."' WHERE photo_id='".$photo_id."'");
	
	if($query)
	{
		$activity = ($flag == 1)?'Approved Photo':'Disapproved Photo';
		
		$timestampQuery = mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='".$activity."', admin_id='".$adminId."', timestamp=now() , status=1 , photo_id='".$photo_id."'");
		
		echo 1;
	
	}
	else{
		echo 0;
	}
	exit;
}


#Reject Photo
if( isset($_POST['action']) && $_POST['action']=='disapproveNewPhoto' )
{
	
	$userId = $_POST['user_id'];
	$photo_id = $_POST['photo_id'];
	$reason = $_POST['reason'];
	$description = $_POST['description'];
	
	$query = mysql_query("UPDATE sr_user_photo SET status='2' WHERE photo_id='".$photo_id."'");
	
	if( $query )
	{
		mysql_query("INSERT INTO `sr_photo_report` SET `photo_id` = '".$photo_id."', `reason`='".$reason."' , `description`='".$description."', `reported_on`=now() , status=1, `disapprove_by_admin`=1");
		
		$timestampQuery =mysql_query("INSERT INTO sr_admin_user_timestamp SET user_id='".$userId."', activity='Disapproved Photo', admin_id='".$adminId."', timestamp=now() , status=1 , photo_id='".$photo_id."'");
		
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}


#Undo Approval/Rejection
if( isset($_POST['action']) && $_POST['action']=='resetPhotoStatus' )
{
	
	$userID = $_POST['userID'];
	$photoID = $_POST['photoID'];
	
	$query = mysql_query("UPDATE sr_user_photo SET status='0' WHERE photo_id='".$photoID."'");
	
	if( $query )
	{
		mysql_query("delete from `sr_photo_report` where `photo_id` = '".$photoID."' ");
		mysql_query("delete from `sr_admin_user_timestamp` where `photo_id` = '".$photoID."' ");
		echo 1;
	
	}else{
		echo 0;
	}
	exit;
}


#Refreshing Right Panel
if( isset($_POST['action']) && $_POST['action']=='refreshApprovedPhotosDiv' )
{
	$getLastTwoApprovedPhotos = $adminObj->getLastApprovedPhotos(2);
	if( $getLastTwoApprovedPhotos!=0 )
	{
		while( $getLastTwoApprovedPhotosFetch = mysql_fetch_array($getLastTwoApprovedPhotos) )
		{
			$userInfo = $adminObj->getUserInfo($getLastTwoApprovedPhotosFetch['user_id']);
			//$imgPath = SITEURL."upload/photo/dummy-profile.png";
			$imgPath = "../upload/profile_images/dummy-profile.png"; //Updates by Chitra 8/5/2017
			if($getLastTwoApprovedPhotosFetch['photo'] != '')
			{
				if( file_exists("../../upload/photo/".$getLastTwoApprovedPhotosFetch['photo']) )
				{
					//$imgPath = SITEURL."upload/photo/".$getLastTwoApprovedPhotosFetch['photo'];
					$imgPath = "../upload/photo/200X200/".$getLastTwoApprovedPhotosFetch['photo']; //Updates by Chitra 8/5/2017
				}
			}
			?>
			<div class="img-wap-photo">
				<div class="img-undo-btn" id="undo-<?php echo $getLastTwoApprovedPhotosFetch['photo_id'];?>" ><a href="javascript:void(0);">Undo</a></div>
				<input type="hidden" value="<?php echo $userInfo['user_id']; ?>" id="user-undo" />
				<img src="<?php echo $imgPath; ?>" class="img-responsive" />
				<div class="photo-top-wap" title="Click here to view details" onclick="window.location.href='power-search.php?id=<?php echo $userInfo['user_id']; ?>'" >
					<div><span class="photo-t-t">User ID:</span> <?php echo $userInfo['user_id']; ?></div>
					<div><span class="photo-t-t">Username:</span> <?php echo ucwords($userInfo['user_name']); ?></div>
					<div><span class="photo-t-t">Uploaded:</span> <?php echo date('d/m/Y', strtotime($userInfo['created_on'])); ?> at <?php echo date('g:i', strtotime($userInfo['created_on'])); ?> GMT</div>
				</div>
			</div>
			<?php
		}
	}
	exit;
}


#Refreshing photos
if( isset($_POST['action']) && trim($_POST['action'])=="refreshingPhotos" )
{
	$newPhotosArray = $adminObj->getNewPhotos();
	?>
	<div class="row-10">
		<h5> New Photos <span style="color:#ff0000;">(<?php echo count($newPhotosArray); ?>)</span></h5>
		<div class="clearfix"></div>	
	</div>
	<div class="clearfix"></div>
	<div class="col-lg-9">
		<ul class="clearfix gallery new-interest">
			<?php 
			foreach( $newPhotosArray as $newPhoto )
			{
				$userInfo = $adminObj->getUserInfo($newPhoto['user_id']);
				?>
				<li id="photoDiv-<?php echo $newPhoto['photo_id'];?>">
					<ul class="clearfix hide-show">
						<li>
							<div class="photo-top-wap" title="Click here to view details" onclick="window.location.href='power-search.php?id=<?php echo $userInfo['user_id']; ?>'" ><div><span class="photo-t-t">User ID:</span> <?php echo $userInfo['user_id']; ?></div>  
							<div><span class="photo-t-t">Username:</span> <?php echo ucwords($userInfo['user_name']); ?></div>
							<div><span class="photo-t-t">Uploaded:</span> <?php echo date('d/m/Y', strtotime($userInfo['created_on'])); ?> at <?php echo date('g:i', strtotime($userInfo['created_on'])); ?> GMT</div></div>
							<a href="javascript:void(0);" rel="prettyPhoto[gallery1]" >
								<?php
								$imgPath = SITEURL."upload/profile_images/dummy-profile.png";
								if($newPhoto['photo'] != '')
								{
									//if( file_exists("../upload/photo/".$newPhoto['photo']) )
									if( file_exists("../../upload/photo/".$newPhoto['photo']) )
									{
										$imgPath = SITEURL."upload/photo/thumb/".$newPhoto['photo'];	
									}
								}
								?>
								<img src="<?php echo $imgPath; ?>" class="img-responsive" />
							</a>
						</li>
						<li>
							<ul class="interest-phpto">
								<li>
									<div class="radio1 green">
										<button class="apprive-btn 1" value="<?php echo $newPhoto['photo_id'];?>" name="flag" id="user-<?php echo $newPhoto['user_id'];?>" style="background-color:#5CBA24; width:70px; border-radius:4px; color:#fff; border:1px solid #50A81C;">Approve</button>
									</div>
								</li>
								<li>
									<div class="radio1 green">
										<button class="reject-btn 2" value="<?php echo $newPhoto['photo_id'];?>" name="flag" id="user-<?php echo $newPhoto['user_id'];?>" style="background-color:#E72E2E;width:70px;border-radius:4px; color:#fff;border:1px solid #D22020;">Reject</button>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</li>
				<?php 
			} 
			?>
		</ul>
	</div>
	<script type="text/javascript" charset="utf-8">
	function refreshRightDiv()
	{
		$.ajax({
			type: "Post",
			url: "ajax/report.php",
			data: {action: "refreshApprovedPhotosDiv"},
			success: function(result)
			{
				$("#prev-app-ph").html(result);
			}
		})
	}


	$(function(){
		$('button[name="flag"]').click(function()
		{
			var photo_id = $(this).val();
			var flag = $(this).attr('class').split(' ');
			var user_id = $(this).attr('id').split('-');
			
			if( flag[1]==1 )
			{
				$.ajax({
					type:"POST",
					url:"ajax/report.php",
					data:{photo_id:photo_id, user_id:user_id[1], flag:flag[1], action:'approveNewPhoto'},
					success:function(result){
						$('#photoDiv-'+photo_id).hide();
						refreshRightDiv();
					}
				});
			}
			else
			{
				$('#disapprove-photo').modal('show');
				$('#hidden-user-id').val(user_id);
				$('#hidden-photo-id').val(photo_id);
			}
			return false;
		});
		
		$('#disapprove-button').click(function()
		{
			var user_id = $('#hidden-user-id').val();
			var photo_id = $('#hidden-photo-id').val();
			var reason = $('input[name=disapprove_reason]:checked').val();
			var description = $('#disapprove_description').val();
			
			if( typeof reason === "undefined" )
			{
				reason=''
			}
			if( reason == '' )
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please select reason.');
				$('#alert_modal').modal('show');
				return false;
			}
			else if( reason == 'Other' && description=='' )
			{
				$('#error_message_header').html('Alert');
				$('#error_message').html('Please enter reason.');
				$('#alert_modal').modal('show');
				return false;
			}
			//$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/report.php",
				data:{photo_id:photo_id, user_id:user_id, reason:reason, description:description, action:'disapproveNewPhoto'},
				success:function(result){
					//$('#preloader').hide();
					$('#disapprove-photo').modal('hide');
					if( result == 1 )
					{
						$('#photoDiv-'+photo_id).hide();
					}
					else if(result == 0){
						$('#error_message_header').html('Alert');
						$('#error_message').html('Problem in network.please try again.');
						$('#alert_modal').modal('show');
					}
				}
			});
			return false;
		});
		
		//Undo Photo
		$("div[id^='undo-']").click(function()
		{
			var photoID = $(this).attr("id").split('-');
			var userID = $("#user-undo").val();
			
			$.ajax({
				type: 'Post',
				url: 'ajax/report.php',
				data: {action: 'resetPhotoStatus', photoID: photoID[1], userID: userID},
				success: function(result){
					if( result==1 )
					{
						$("div[id='undo-"+photoID[1]+"']").parent().hide();
						refreshRightDiv();
					}
				}
			});
			
			$.ajax({
			type: 'Post',
			url: 'ajax/report.php',
			data: {action: 'refreshingPhotos'},
			success: function(result){
				$("#refreshPhotoId").html(result);
			}
		});
		});
	});


	//Refreshing photos
	var photos_ajax = function() {
		$.ajax({
			type: 'Post',
			url: 'ajax/report.php',
			data: {action: 'refreshingPhotos'},
			success: function(result){
				$("#refreshPhotoId").html(result);
			}
		});
	};

	var interval = 10000 * 60 * 0.5; // where X is your every X minutes
	setInterval(photos_ajax, interval);
	</script>

	<div class="modal fade pop-up-dash" id="disapprove-photo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog pop-up-width" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Disapprove Photo</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="hidden-user-id" >
					<input type="hidden" id="hidden-photo-id" >
						<p>Reason for rejection</p>
						<div class="pane-re equal">
						<form>
							<div class="radio blue">
							<label>
								<input type="radio" name="disapprove_reason" value="Inappropriate"> Inappropriate
							</label>
							</div>
							<div class="radio blue">
								<label>
									<input type="radio" name="disapprove_reason" value="Poor Quality"> Poor Quality
								</label>
							</div>
							<div class="radio blue">
								<label>
								<input type="radio" name="disapprove_reason" value="Misrepresentation"> Misrepresentation
								</label>
							</div>
							<div class="radio blue">
								<label>
								<input type="radio" name="disapprove_reason" value="Duplicate">Duplicate
								</label>
							</div>
							<div class="radio blue">
								<label>
								<input type="radio" name="disapprove_reason" value="Other"> Other
								</label>
							</div>				
						</form>
						</div><!-- pane -->
						<div class="form-group">
							<label for="comment">Give More Details:</label>
							<textarea class="form-control text-design" rows="2" id="disapprove_description"></textarea>
						</div>		
				</div>
				<div class="modal-footer">
					<div class="text-center clearfix">
						<button type="button" class="btn btn-popup-red" id="disapprove-button">Reject Photo</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
