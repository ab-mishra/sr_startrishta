<section>	<?php    //echo date("Y-m-d H:i:s");	//print_r($photoReelArray);	?>	<div class="photo_reel">		<div class="container">			<div class="get_me_here_slide">				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">					<div id="bxslider-fame-reel-wrap" style="visibility: hidden;">						<div class="slider_4 custom_slide" style="direction:ltr;">						<?php						foreach( $photoReelArray as $photoReel )						{                            //echo $added_date=$photoReel['created_on'];                            //echo $userProfileObj->time2str($added_date);							$isUserVerified = $userProfileObj->isUserVerified($photoReel['user_id']);							$isBlockUser = $userProfileObj->isBlockUser( $_SESSION['user_id'], $photoReel['user_id'] );							if( file_exists("upload/photo/".$photoReel['profile_image']) && ($photoReel['profile_image']!='') && $isBlockUser==0 )							{								$photoReelProfileImage = $userProfileObj->getProfileImage($photoReel['profile_image']);								?>								<div class="slide slider_onclick" id="slider_onclick-<?php echo $photoReel['user_id'];?>">									<?php 									if(file_exists($photoReelProfileImage))									{ 									?>										<img src="<?php echo $photoReelProfileImage;?>" data='1'/>									<?php 									} else { ?>										<img src="upload/photo/<?php echo $photoReel['profile_image'];?>" data='2'/>									<?php 									}									?>									<div class="caps_name">										<span class="bg_hov">											<?php											if( $photoReel['is_online'] )											{												?><div class="pull-left online_user">													<i class="fa fa-circle green"></i>												</div><?php											}											?><div class="pull-left">												<strong><?php													 $firstWord = explode(' ', $photoReel['user_name']);echo $firstWord[0];													//echo $photoReel['created_on'];													?> </strong>												<span>                                                    <?php $from = new DateTime($photoReel['dob']); $to=new DateTime('today');													echo $from->diff($to)->y;?>                                                </span><br />											<span style="font-size: 10px;">	added <?php                                                //echo $timenew=$userProfileObj->time2str($photoReel['created_on']);                                                echo $timenew=$userProfileObj->time2str($photoReel[1]);                                                ?> </span>												<!--<p><?php /*echo $photoReel['city'].', '.$photoReel['country'];*/?></p>-->											</div>										</span>									</div>									<?php									if( $isUserVerified )									{										?><div class="caps_tag"><img src="images/active.png" height="20px" width="20px"/></div><?php									}									?>									<div class="caps_pics">										<a href="javascript:void(0);">											<i class="fa fa-camera"></i>											<span><?php echo $userProfileObj->getPublicPhotoCount($photoReel['user_id']);?></span>										</a>									</div>								</div>								<?php 							}						} 						?>						</div>					</div>				</div>			</div>						<div class="get_me_here">				<i class="fa fa-stop"></i><i class="rotate fa fa-stop"></i>				<?php //if($isFameReel){ ?>				<div class="gmh_pic" data-toggle="tooltip" data-placement="bottom" title="Add your photo here to get seen by everyone!">					<?php					if($userProfileImg)					{										if($userProfileImg['status'] != 2)						{													if(file_exists("upload/photo/200X200/".$userProfileImg['photo'])){								$img = "upload/photo/200X200/".$userProfileImg['photo'];							}							else{								$img = "upload/photo/".$userProfileImg['photo'];							}						?>						<img src="<?php echo $img;?>" data="2">						<div class="caption">							<a href="javascript:void(0);" class="credit-popup go-credit-get-me-here">								GET<br /> ME<br /> HERE</a>						</div>						<?php 						} 						else 						{ 						?>						<div class="caption">							<a href="javascript:void(0);" class="credit-popup go-credit-get-me-here">								GET<br /> ME<br /> HERE</a>						</div>						<?php 						}					} 					else					{ ?>					<div class="caption">							<a href="javascript:void(0);" id="profile_null_gmh" class="credit-popup go-credit-get-me-here">								GET<br /> ME<br /> HERE</a>						</div>					<?php 					}					?>				</div>			</div>					</div>	</div></section>