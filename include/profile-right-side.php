<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col_sm_12_right">
  <!--REWARD-->	
  <div class="Repo_box margin-b20 right_side_panel-1">		
    <?php 		
    $userRewardArray = $userProfileObj->getUserRewards($user_id);		
    if(count($userRewardArray)){
    	?>		
    <div class="interest_panel_div">			
      <h4 class="margin-b25">
        <strong>Daily Rewards
        </strong>
        <br>
        <small class="text-13">Your chance to win Startrishta Credits
        </small>
      </h4>			
      <ul class="stickers">			
        <?php foreach($userRewardArray as $userRewardResult){ ?>				
        <li class="gift" data-target="#go4sticker<?php echo $userRewardResult['reward_id'];?>" 
        	data-toggle="modal">					
          <!--<a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="">-->					
          <a href="javascript:void(0);">						
            <img src="images/reward/<?php echo $userRewardResult['reward_icon'];?>"/>					
          </a>					
          <div class="gift_caps">						
            <i class="indicate fa fa-play">
            </i>						
            <ul>							
              <li style="width:0px;height:0px;">
              </li>							
              <li style="width:100%;">								
                <div class="name">
                  <?php echo $userRewardResult['reward_desc'];?>
                </div>								
                <div style="text-align:center;">
                  <p>
                    <b>
                      <?php echo date('d F Y' , strtotime($userRewardResult['awarded_on']));?>
                    </b>
                  </p>
                </div>							
              </li>						
            </ul>					
          </div>				
        </li>				
        <!--rewards div-->				
        <div id="go4sticker<?php echo $userRewardResult['reward_id'];?>" class="modal fade login_pop" role="dialog" >					
          <div class="modal-dialog-1">						
            <div class="modal-content">							
              <div >								
                <div class="modal-header">									
                  <button type="button" class="close" data-dismiss="modal">&times;
                  </button>									
                  <h5>
                    <b>Congratulations! You just won a Badge
                    </b>
                  </h5>								
                </div>								
                <div class="modal-body">									
                  <form class="login-form">										
                    <h5 class="align-c">
                      <?php echo $userRewardResult['reward_title'];?>
                    </h5>										
                    <div class="popup_add_photo margin-t10">											
                      <div class="sticker_bg">												
                        <img src="images/reward/<?php echo $userRewardResult['reward_icon'];?>"/>											
                      </div>											
                      <p class="align-c">Awarded on 
                        <?php echo date('d F Y' , strtotime($userRewardResult['awarded_on']));?>
                      </p>										
                    </div>										
                    <div>											
                      <p class="align-c lh-20">
                        <b>
                          <?php echo $userRewardResult['reward_text'];?>
                        </b>
                      </p>										
                    </div>										
                    <div class="popup_add_photo margin-t20">											
                      <a href="" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Got it 
                      </a>										
                    </div>									
                  </form>								
                </div>							
              </div>						
            </div>					
          </div>				
        </div>				
        <!--end of rewards-->			
        <?php } ?>			
      </ul>			
      <?php if(count($userRewardArray) > 6){ ?>			
      <a class="pull-left interest_more_btn" href="javascript:void(0);">view more
      </a>			
      <?php } ?>		
    </div>		
    <div class="align-c margin-t20">			
      <a href="javascript:void(0);" id="getMoreReward" class="btn btn-default custom slat-blue">Get More Rewards
      </a>		
    </div>		
    <?php } else { ?>		
    <div class="interest_panel_div">			
      <h4 class="margin-b25">
        <strong>Daily Rewards
        </strong>
        <span class="red-color"> (Beta)
        </span>
      </h4>			
      <p>Your chance to win Startrishta Credits.
      </p>			
      <div class="align-c margin-t20">				
        <a href="javascript:void(0);" id="getMoreReward" class="btn btn-default custom slat-blue">Get More Rewards
        </a>			
      </div>		
    </div>		
    <?php } ?>			
  </div>		
  <!--GIFT-->		
  <?php 	$userGiftQuery=mysql_query("SELECT g.gift ,ug.*, u.user_id , u.user_name , u.profile_image FROM sr_gifts g,sr_user_gift ug,sr_users u WHERE ug.gift_id=g.gift_id AND ug.gifted_by=u.user_id AND ug.user_id='".$user_id."'");	if(mysql_num_rows($userGiftQuery) > 0) {	?>	
  <div class="Repo_box margin-b20 right_side_panel">		
    <div class="gift_panel_div" style="height:auto;">			
      <h4 class="margin-b10 color-db">
        <b>Gifts
        </b>
      </h4>			
      <ul class="stickers">			
        <?php			$giftCount=0;			while($userGiftresult=mysql_fetch_assoc($userGiftQuery)){			if($giftCount >= 6){				$giftClass='d_none gift_div';			}else {				$giftClass='';			}			?>				
        <li class="gift <?php echo $giftClass;?>">					
          <a href="javascript:void(0);">
            <img src="images/<?php echo $userGiftresult['gift'];?>"/>
          </a>										
          <div class="gift_caps">						
            <i class="indicate fa fa-play">
            </i>						
            <ul>							
              <li>
                <img src="<?php echo $userProfileObj->getProfileImage($userGiftresult['profile_image']);?>"/>
              </li>							
              <li>								
                <div class="name">
                  <a href="profile.php?uid=<?php echo $userGiftresult['user_id'];?>" style="text-decoration:underline;color:#30bf9d;">
                    <?php echo $userGiftresult['user_name'];?>
                  </a>
                  <i>(
                    <?php echo date('d-M-Y' , strtotime($userGiftresult['gifted_on']));?>)
                  </i>
                </div>								
                <div>
                  <p>
                    <b>
                      <?php echo $userGiftresult['message'];?>
                    </b>
                  </p>
                </div>							
              </li>						
            </ul>					
          </div>				
        </li>			
        <?php 			$giftCount++;			} ?>			
      </ul>			
      <?php if(mysql_num_rows($userGiftQuery) > 6) {?>				
      <div style="text-align:center;">
        <a class="gifts_more_btn" href="javascript:void(0)">view more
        </a>
      </div>			
      <?php } ?>		
    </div>	
  </div>	
  <?php } ?>	
  <!--VERIFICATION-->									
  <div class="Repo_box margin-b20">		
    <div>			
      <h4 class="margin-b20">
        <b>Verification
        </b>
      </h4>			
      <p>Startrishta promotes real profiles. Prove to others you exist and get more responses. Select at least one option to get verified:
      </p>			
      <ul class="verification">				
        <li class="margin-b10" style="cursor:pointer;">					
          <?php 					if( $isMobileVerified )					{						?>						
          <a id="moble-app">							
            <span class="icon">
              <img src="images/mobile.png"/>
            </span>							
            <div data-target="#mob_unverify" data-toggle="modal" >
              <strong>Mobile Phone
              </strong>
              <p>Linked
              </p>
            </div>							
            <span class="pull-right color-white select" id="hover-effect">
              <i class="fa fa-check green">
              </i>
            </span>						
          </a>						
          <?php 					}					else					{						?>						
          <a data-target="#number_verification" data-toggle="modal" style="cursor:pointer;">							
            <span class="icon">
              <img src="images/mobile.png"/>
            </span>							
            <div >
              <strong>Mobile Phone
              </strong>
              <p>Unlinked
              </p>
            </div>							
            <span class="pull-right color-white select">
              <i class="fa fa-chevron-right">
              </i>
            </span>						
          </a>						
          <?php 					} 					?>				
        </li>								
        <li class="margin-b10" id="moble-app" style="cursor:pointer;">					
          <?php 
          if($isFbLinked){ ?>						
          <?php if(isset($_SESSION['fb_user'])) { ?>						
          <a href="javascript:void(0);" >							
            <span class="icon">
              <img src="images/facebook.png"/>
            </span>							
            <div>
              <strong>Facebook
              </strong>
              <p>
              <p>Linked
              </p>
              </p>
            </div>							
          <span class="pull-right color-white select" id="hover-effect1" >
            <i class="fa fa-check green">
            </i>
          </span>						
        </a>						
      <?php } else{							?>						
      <a href="javascript:void(0);" id="unlinkedFb" >							
        <span class="icon">
          <img src="images/facebook.png"/>
        </span>							
        <div>
          <strong>Facebook
          </strong>
          <p>
          <p>Linked
          </p>
          </p>
        </div>							
      <span class="pull-right color-white select" id="hover-effect1" >
        <i class="fa fa-check green">
        </i>
      </span>						
      </a>						
    <?php						}?>					
    <?php }					else{ ?>						
    <a href="javascript:void(0);" id="fbloginappRight">							
      <span class="icon">
        <img src="images/facebook.png"/>
      </span>							
      <div>
        <strong>Facebook
        </strong>
        <p>
        <p>Unlinked
        </p>
        </p>
      </div>							
    <span class="pull-right color-white select">
      <i class="fa fa-chevron-right">
      </i>
    </span>						
    </a>					
  <?php }									?>				
  </li>								
<li class="margin-b10" >					
  <?php if($isVipMember){?>						
  <a title="Membership will get expired on <?php echo date('d l Y', strtotime($vipExpiryDate)); ?>" >							
    <span class="icon">
      <img src="images/vip-small.png"/>
    </span>							
    <div>
      <strong>VIP Membership
      </strong>
      <p>Linked
      </p>
    </div>							
    <span class="pull-right color-white select">
      <i class="fa fa-check green">
      </i>
    </span>						
  </a>					
  <?php }else{?>						
  <a href="vip.php" style="cursor:pointer;">							
    <span class="icon">
      <img src="images/vip-small-gray.png"/>
    </span>							
    <div>
      <strong>VIP Membership
      </strong>
      <p>Unlinked
      </p>
    </div>							
    <span class="pull-right color-white select">
      <i class="fa fa-chevron-right">
      </i>
    </span>						
  </a>					
  <?php } ?>				
</li>							
</ul>		
</div>	
</div>									
</div>
</div>
<!--GET MORE REWARD MODAL-->
<div id="getMoreSticker" class="modal fade login_pop" role="dialog" >	
  <div class="modal-dialog-1">		
    <div class="modal-content pull-left">			
      <div>				
        <div class="modal-header">					
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>					
          <h4>
            <b>Your Startrishta Reward Badges
            </b>
          </h4>				
        </div>				
        <div class="modal-body" id="reward_body">				
        </div>			
      </div>		
    </div>	
  </div>
</div>
<!--END GET MORE REWARD MODAL-->
<!-- MOBILE NUMBER VERIFICATION -->
<div id="number_verification" class="modal fade login_pop" role="dialog" >	
  <div class="modal-dialog home_pg">		
    <!-- Modal content-->		
    <div class="modal-content">			
      <div class="login_box">				
        <div class="modal-header">					
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>					
          <h4 class="modal-title">Mobile Number Verification
          </h4>				
        </div>				
        <div class="modal-body">					
          <form class="login-form" method="post" action="" id="mobileNumberForm">						
            <h5 class="align-c padding-b10">Please enter mobile number
            </h5>						
            <div>							
              <label>
                <i class="fa fa-phone">
                </i>
              </label>							
              <input type="text" class="mob_verify_custom" name="mobile_number" id="mobile_number" placeholder="Mobile Number"/>						
            </div>						
            <div class="sign_up">							
              <input class="login_btn" name="submitMobileNumber" type="button" value="Done" id="submitMobileNumber"/>							
              <h5 class="align-c padding-b10">Please enter 10 digit mobile number with country code.
              </h5>						
            </div>					
          </form>					
          <form class="login-form" method="post" action="" style="display:none;" id="mobileVerificationForm">												
            <h5 class="align-c padding-b10">Enter your verification code below to proceed.
            </h5>						
            <div>							
              <label>
                <i class="fa">
                </i>
              </label>							
              <input type="text" name="mobile_otp" id="mobile_otp" placeholder="Verification code"/>							
              <div class="mobileNumberForm">								
                <a href="javascript:void(0)" id="re_enter_mobile" data-target='#mobileNumberForm'>Re-Enter Mobile No.
                </a>							
              </div>						
            </div>						
            <div class="sign_up">													
              <input class="login_btn" name="verifyMobileNumber" type="button" value="Verify" id="verifyMobileNumber"/>						
            </div>					
          </form>				
        </div>			
      </div>		
    </div>	
  </div>
</div>
<!-- END MOBILE NUMBER VERIFICATION -->
<!------ Mobile Unlinking ------>
<div id="mob_unverify" class="modal fade login_pop" role="dialog" >	
  <div class="modal-dialog home_pg">		
    <!-- Modal content-->		
    <div class="modal-content">			
      <div class="login_box">				
        <div class="modal-header">					
          <button type="button" class="close" data-dismiss="modal">&times;
          </button>					
          <h4 class="modal-title">Mobile Number Verification
          </h4>				
        </div>				
        <div class="modal-body" id="unLinkMsg">					
          <form class="login-form" method="post" action="" id="mobileNumberForm">						
            <h5 class="align-c padding-b10">Do you really want to unlink your mobile number?
            </h5>						
            <div >							
              <input class="btn btn-danger" name="unlink_mob" type="button" value="Unlink" id="unlink_mob"/>&nbsp;							
              <input class="btn btn-danger" name="unlink_mob_no" type="button" data-dismiss="modal" value="Cancel" id="unlink_mob_no"/>						
            </div>					
          </form>				
        </div>			
      </div>		
    </div>	
  </div>
</div>
<!--WON NEW REWARD-->
<style>.tooltip-inner {
  white-space:pre-wrap;
  }

</style>
