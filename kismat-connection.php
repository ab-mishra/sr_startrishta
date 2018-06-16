<?php
require('classes/kismat_connection.php');
$page = 'kismat-connection';
$userProfileObj = new KismatConnection();
require_once('include/header.php');
$user_id = $_SESSION['user_id'];
$userResult = $userProfileObj->getUserInfo($user_id);
$profilePercentage = $userProfileObj->getProfilePer($userResult);
$userInterestQuery = $userProfileObj->getUserInterest($user_id);
$userInterestCount = mysql_num_rows($userInterestQuery);
$offset = 1;
if (isset($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 0;
}
$kismatConnectionUsers = $userProfileObj->getKismatConnectionUser($user_id, $limit, $offset);
$kismatConnectionUserCount = $userProfileObj->getKismatConnectionUserCount($user_id);
$kcUserCount = count($kismatConnectionUsers);
$MyPhotoCount = $userProfileObj->getMyPhotoCountKC($user_id);
$kismatConnectionLikeCount = $userProfileObj->getKismatConnectionLikedUserCount($user_id);
$userName = '';
$userId = '';
$kcuserResult = current($kismatConnectionUsers);
if ($kcUserCount != 0) {
    $userId = $kcuserResult['user_id'];
    $userName = $kcuserResult['user_name'];

    $CommonInterestCount = $userProfileObj->getUserCommonInterest($user_id, $userId);
    $otherInterestQuery = $userProfileObj->getUserInterest($userId);

    $otherUserReputation = $userProfileObj->getUserReputation($userId);
    if ($otherUserReputation <= 40) $otherReputaion = 'Low';
    if ($otherUserReputation > 40 && $otherUserReputation <= 60) $otherReputaion = 'Heating Up';
    if ($otherUserReputation > 60 && $otherUserReputation <= 80) $otherReputaion = 'Hot';
    if ($otherUserReputation > 80) $otherReputaion = 'Very Hot';

    $galleryArray = array();
    $galleryQuery = mysql_query("Select * from  sr_user_photo where status='1' AND private='0' AND user_id='" . $userId . "' ORDER BY `is_profileImage` DESC");
    while ($galleryResult = mysql_fetch_assoc($galleryQuery)) {
        $galleryArray[] = $galleryResult;
    }
    $countPhoto = mysql_num_rows($galleryQuery);
    $isUserLike = $userProfileObj->isUserLike($userId, $user_id);
    $isUserLike1 = $userProfileObj->isUserLike($user_id, $userId);
    $isUserFavorite = $userProfileObj->isUserFavorite($userId, $user_id);
    $isVipMember = $userProfileObj->isVipMember($userId);

    $userPhotoArray = array();
    $userPhotoQuery = mysql_query("Select photo , photo_id from  sr_user_photo where status='1' AND private='0' AND user_id='" . $userId . "' and status<2 ORDER BY `is_profileImage` DESC");
    while ($userPhotoResult = mysql_fetch_assoc($userPhotoQuery)) {
        $userPhotoArray[] = $userPhotoResult;
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Startrishta | Kismat Connection</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="images/favico.png">

    <?php require("include/script.php"); ?>
</head>

<body class="<?php echo $CustomizeTheme; ?>">
<div class="main-body">
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
        <?php include('include/header-get-me-here.php'); ?>
        <!-----------------GET ME HERE SLIDER END----------------------------------->

        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row  margin_t-60">

                    <!-------------LEFT SIDE------------------------->
                    <?php require("include/profile-left-side.php"); ?>
                    <!----------------------------------------------->
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
                        <div class="row promotion_p2 m-right_0">
                            <!--------PROMOTION PANEL--------------------->
                            <?php include('include/promotion-panel.php'); ?>
                            <?php if ($kcUserCount != 0) { ?>
                                <div class="border_kc">
                                    <div class="col-md-12 col-sm-12 clearfix">
                                        <div class="pull-left margin-b10 full">
                                            <div class="like-section kc2">
                                                <?php
                                                if ($userResult['profile_image'] == '') {
                                                    //echo '<script>alert("1");</script>';
                                                    ?>
                                                    <a class="like ld_both" href="javascript:void(0)"
                                                       data-target="#addProfilePhotoModal" data-toggle="modal"><img
                                                                src="images/icon002.png"/></a>
                                                    <a class="dislike ld_both" id="user_unlikekc"
                                                       href="javascript:void(0)"><img src="images/icon003.png"/></a>
                                                <?php } elseif ($MyPhotoCount < 1) {
                                                    //echo '<script>alert("2");</script>';
                                                    ?><!--<script>alert("<?php /*echo $MyPhotoCount."   ".$limit */ ?>");</script>-->
                                                    <a class="like ld_both" href="javascript:void(0)"
                                                       data-target="#addMyPhotoModal" data-toggle="modal"><img
                                                                src="images/icon002.png"/></a>
                                                    <a class="dislike ld_both" id="user_unlikekc"
                                                       href="javascript:void(0)"><img src="images/icon003.png"/></a>
                                                    <?php
                                                } elseif ($MyPhotoCount == 1 && $kismatConnectionLikeCount >= 1) {
                                                    //echo '<script>alert("3.2");</script>';
                                                    ?><!--<script>alert("<?php /*echo $MyPhotoCount."   ".$limit */ ?>");</script>-->
                                                    <a class="like ld_both" href="javascript:void(0)"
                                                       data-target="#addMyPhotoModal" data-toggle="modal"><img
                                                                src="images/icon002.png"/></a>
                                                    <a class="dislike ld_both" id="user_unlikekc"
                                                       href="javascript:void(0)"><img src="images/icon003.png"/></a>
                                                    <?php
                                                } elseif ($MyPhotoCount < 3 && $kismatConnectionLikeCount >= 1) {
                                                    //echo '<script>alert("3");</script>';
                                                    ?><!--<script>alert("<?php /*echo $MyPhotoCount."   ".$limit */ ?>");</script>-->
                                                    <a class="like ld_both" href="javascript:void(0)"
                                                       data-target="#addMyPhotoModal" data-toggle="modal"><img
                                                                src="images/icon002.png"/></a>
                                                    <a class="dislike ld_both" id="user_unlikekc"
                                                       href="javascript:void(0)"><img src="images/icon003.png"/></a>
                                                    <?php
                                                } else {
                                                    //echo '<script>alert("4");</script>';
                                                    ?>
                                                    <a class="like ld_both" id="user_likekc"
                                                       href="javascript:void(0)"><img src="images/icon002.png"/></a>
                                                    <a class="dislike ld_both" id="user_unlikekc"
                                                       href="javascript:void(0)"><img src="images/icon003.png"/></a>
                                                    <?php
                                                } ?>
                                            </div>

                                            <div class="like-section kc name_age">
                                                <div class="full pull-left">
                                                    <a class="name"
                                                       href="profile.php?uid=<?php echo $kcuserResult['user_id']; ?>"><?php echo $kcuserResult['user_name']; ?></a>
                                                    <span class="age">
														<?php if ($kcuserResult['dob'] != '') {
                                                            echo ' , ';
                                                            echo(date('Y') - date('Y', strtotime($kcuserResult['dob'])));
                                                        } ?></span>
                                                    <span class="tags"><img src="images/active.png"
                                                                            data-toggle="tooltip"
                                                                            data-placement="bottom"
                                                                            title="Verified Member"
                                                                            style="margin-bottom:5px;"></span>
                                                </div>
                                                <div class="pull-left">
                                                    <div class="intest_box kc">
                                                        <a href="" style="cursor:default;">
                                                            <span><?php echo $CommonInterestCount; ?></span>
                                                            <p>INTERESTS &nbsp; IN COMMON</p>
                                                        </a>
                                                    </div>
                                                    <div class="intest_box kc">
                                                        <a href="" style="cursor:default;">
                                                            <span>0</span>
                                                            <p>SHARED FRIENDS</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="pull-right status kc">
                                                <ul>
                                                    <?php echo $userProfileObj->getStatusIconHtml($kcuserResult['user_id'], $kcuserResult['gender'], $otherReputaion, $isUserFavorite, $isVipMember); ?>
                                                </ul>
                                                <div class="photos_btn">
                                                    <a href="javascript:void(0);" id="toggle-profile">
                                                        Show Profile
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!------------------PROFILE INFOMATION------------------>
                                    <div id="kc-one" class="full d_none">
                                        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="profile_view kc margin-b20">
                                                    <div class="pull-left margin-t0">
                                                        <div class="pro-photos pro-photos-1">
                                                            <div class="slide-box">
                                                                <div class="slider3">
                                                                    <?php
                                                                    foreach ($galleryArray as $gallery) {
                                                                        $photo_id = $gallery['photo_id'];
                                                                        $photo = $gallery['photo'];
                                                                        ?>
                                                                        <div class="slide pointer">
                                                                            <?php if (file_exists("upload/photo/" . $photo) and ($photo != '')) { ?>
                                                                                <img src="upload/photo/<?php echo $photo; ?>"/>
                                                                            <?php } ?>
                                                                        </div>
                                                                        <?php
                                                                    } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="divider-line clearfix"></div>

                                                    <div class="pull-left">
                                                        <div class="pro_ttl"><span>He's here to</span></div>
                                                        <p><?php echo $userProfileObj->getHereToName($kcuserResult['here_to']); ?></p>
                                                    </div>

                                                    <div class="divider-line clearfix"></div>

                                                    <div class="pull-left">
                                                        <?php if ($userResult['location_service']) { ?>
                                                            <div class="pro_ttl-1"><span>Location</span></div>
                                                            <p><?php echo $kcuserResult['location']; ?></p>
                                                        <?php } else { ?>
                                                            <p><b class="color-green"><a href="javascript:void(0);"
                                                                                         onclick="findLocation('<?php echo $otherUserResult['user_name']; ?>');">Find
                                                                        out </a></b>how
                                                                close <?php echo $kcuserResult['user_name']; ?> is to
                                                                you right now!</p>
                                                        <?php } ?>
                                                        <!--<p><?php /*echo $kcuserResult['location'];*/ ?></p>-->
                                                    </div>

                                                    <div class="divider-line clearfix"></div>
                                                    <div class="pull-left">
                                                        <div class="pro_ttl-1">
                                                            <span>Interests</span>
                                                        </div>
                                                        <div class="interests">
                                                            <ul>
                                                                <?php while ($otherInterestResult = mysql_fetch_assoc($otherInterestQuery)) { ?>
                                                                    <li><a class="blue1" href="javascript:void()"><span
                                                                                    class="<?php echo $otherInterestResult['icon']; ?>"></span>
                                                                            <p><?php echo $otherInterestResult['interest']; ?></p>
                                                                        </a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="divider-line clearfix"></div>
                                                    <div class="pull-left">
                                                        <div class="pro_ttl"><span>Friends</span> <span
                                                                    class="badge">0</span></div>
                                                        <div class="pro_friends">
                                                            <!--<ul>
                                                                <li><a href=""><img src="images/usersSpotlightMan.png"/></a></li>
                                                            </ul>-->
                                                            <p>No Friends</p>
                                                        </div>
                                                    </div>
                                                    <div class="divider-line clearfix"></div>
                                                    <div class="pull-left">
                                                        <div class="pro_ttl-1">
                                                            <span>About <?php if ($kcuserResult['gender'] == 2) echo "her"; else {
                                                                    echo "him";
                                                                } ?></span></div>
                                                        <p><?php
                                                            if ($userResult['about_me'] == '') {
                                                                echo substr($kcuserResult['about_me'], 0, 10);
                                                                echo '<b class="color-green"><a href="javascript:void(0)" data-toggle="modal" data-target="#aboutHimModel"> more </a></b>';
                                                            } else
                                                                echo $kcuserResult['about_me'];
                                                            ?></p>
                                                    </div>
                                                    <div class="divider-line clearfix"></div>
                                                    <div class="pull-left">
                                                        <div class="pro_ttl-1"><span>Looking for</span></div>
                                                        <p>
                                                            <?php
                                                            if ($userResult['looking_for'] == '') {
                                                                echo substr($kcuserResult['looking_for'], 0, 10);
                                                                echo '<b class="color-green"><a href="javascript:void(0)" data-toggle="modal" data-target="#lookingForModel"> more </a></b>';
                                                            } else
                                                                echo $kcuserResult['looking_for'];
                                                            ?></p>
                                                    </div>
                                                    <div class="divider-line clearfix"></div>
                                                    <div class="pull-left">
                                                        <div class="pro_ttl"><span>Personal Info</span></div>
                                                        <div class="par_info">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="que">Relationship Status:</div>
                                                                            <div>
                                                                                <?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getRelationshipName($kcuserResult['relationship_status']);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="que">Star Sign:</div>
                                                                            <div>
                                                                                <?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getstarSignName($kcuserResult['star_sign']);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="que">Sexuality:</div>
                                                                            <div><?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getSexualityName($kcuserResult['sexuality'] == 1);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?></div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="que">Body Type:</div>
                                                                            <div><?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getBodyTypeName($kcuserResult['body_type']);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?></div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <ul>
                                                                        <li>
                                                                            <div class="que">Drinking:</div>
                                                                            <div><?php if ($profilePercentage >= 50) {
                                                                                    if ($kcuserResult['drinking'] == 1) echo 'Yes'; else echo 'No';
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?></div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="que">Complexion:</div>
                                                                            <div><?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getComplexionName($kcuserResult['complexion']);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?></div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="que">Education:</div>
                                                                            <div><?php if ($profilePercentage >= 50) {
                                                                                    echo $userProfileObj->getEducationName($kcuserResult['education']);
                                                                                } else { ?>
                                                                                    <b class="color-green"><a
                                                                                                data-target="#Alert2update"
                                                                                                data-toggle="modal"
                                                                                                href="">Show </a></b>
                                                                                <?php } ?></div>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                            <!--
                                            <div class="Repo_box margin-b20">
                                                <div>
                                                    <h4 class="margin-b20 color-db">Verification</h4>
                                                    <!--<p>Startrishta promotes real profiles. Prove to others you exist and get more responses. Select at least one option to get verified:</p>--
                                                    <ul class="verification">
                                                        <!--<li class="margin-b10">
                                                            <a>
                                                                <span class="icon"><img src="images/mobile.png"/></span>
                                                                <div><strong>Mobile Phone</strong><p>Linked</p></div>
                                                                <span class="pull-right green select"><i class="fa fa-check"></i></span>
                                                            </a>
                                                        </li>--

                                                        <li class="margin-b10">
                                                            <a>
                                                                <span class="icon"><img src="images/facebook.png"/></span>
                                                                <div><strong>Facebook</strong><p>Linked</p></div>
                                                                <span class="pull-right green select"><i class="fa fa-check"></i></span>
                                                            </a>
                                                        </li>

                                                        <li class="margin-b10">
                                                            <a>
                                                                <span class="icon"><img src="images/vip-small.png"/></span>
                                                                <div><strong>VIP Membership</strong><p>Linked</p></div>
                                                                <span class="pull-right green select"><i class="fa fa-check"></i></span>
                                                            </a>
                                                        </li>

                                                    </ul>
                                                </div>
                                            </div>-->

                                            <div class="Repo_box margin-b20">
                                                <div class="gift_panel">
                                                    <h4 class="margin-b10 color-db">Gifts</h4>
                                                    <ul class="stickers">
                                                        <li class="gift">
                                                            <a href=""><img src="images/gift.png"/></a>
                                                        </li>
                                                        <li class="gift_custom1 ">
                                                            <a href="javascript:void(0)"
                                                               class="green align-l giveGiftToUser"
                                                               id="giveGiftToUserkc-<?php echo $kcuserResult['user_id']; ?>">Get <?php if ($kcuserResult['gender'] == 2) echo "Her"; else {
                                                                    echo "His";
                                                                } ?> attention with a gift!</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <?php /*$userStickerQuery = $userProfileObj->getUserStickers($userId);
										if(mysql_num_rows($userStickerQuery)){
										?>
										<div class="Repo_box margin-b20">
											<div>
												<h4 class="margin-b25 color-db">Stickers</h4>
												<ul class="stickers">
												<?php while($userStickerResult=mysql_fetch_assoc($userStickerQuery)){ ?>
													<li class="gift">
														<a href="javascript:void(0);" data-toggle="tooltip" data-placement="bottom" title="<?php echo $userStickerResult['sticker_text'];?>">
															<img src="images/sticker/<?php echo $userStickerResult['sticker_icon'];?>"/>
														</a>
													</li>
												<?php } ?>
												</ul>
												<?php if(mysql_num_rows($userStickerQuery) > 6){ ?>
												<a class="pull-left interest_more_btn" href="javascript:void()">view more</a>
												<?php } ?>
											</div>
										</div>
										<?php }*/ ?>

                                            <div class="Repo_box margin-b20">
                                                <div>
                                                    <h4 class="margin-b20 color-db">Stats</h4>
                                                    <p><?php if ($kcuserResult['gender'] == 2) echo "She"; else {
                                                            echo "He";
                                                        } ?> is <b>1,203 </b>place in search results with
                                                        <b><?php echo $userProfileObj->getTodayVisitorCount($userId); ?></b>
                                                        profile visitors today and
                                                        <b><?php echo $userProfileObj->getMonthVisitorCount($userId); ?></b>profile
                                                        visitors so far this month.</p>

                                                    <p><?php if ($kcuserResult['gender'] == 2) echo "Her"; else {
                                                            echo "His";
                                                        } ?> reputation right now is <span class="red">very hot</span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <!--------------------------------------KISMAT CONECTION--------------------------------------------->
                                    <div id="kc-two" class="full">
                                        <div class="col-md-12 col-sm-12  clearfix relative">
                                            <!------------user profile main image------------------->
                                            <ul id="kc-slider" class="kc-slider">
                                                <?php foreach ($userPhotoArray as $userPhotos) { ?>
                                                    <li>
                                                        <img src="<?php echo $userProfileObj->getPhotoPath($userPhotos['photo']); ?>"/>
                                                    </li>
                                                <?php } ?>
                                            </ul>
                                            <!-------------------------------------------------->
                                            <?php if ($MyPhotoCount < 3) {
                                                $remCount = 3 - $MyPhotoCount;
                                                ?>
                                                <!--<div class="slider-container-fadebox-1 kc_add_photo photo_fecebook" style="display:block;">
												<span class="v-middle fb">
													<p class="align-c color-white h4 margin-t40">
														<b>You need to add <?php /*echo $remCount.' more ';if($remCount==1) echo 'photo'; else echo 'photos';*/ ?> </b>
													</p>
													<div class="line100"></div>
													<p class="align-c color-white">
														To view all his photos you must have at least 3 photos of you!
													</p>
													<div class="popup_add_photo margin-t20">
														<span class="btn btn-default default slat-blue padding-l25 padding-r25 ok-2" data-target="#addMyPhotoModal" data-toggle="modal" onclick="$('.gallery-modal').modal('hide');" >Upload Photo</span>
														<span class="color-white"> <b> or </b></span>
														<span class="fb_bar_caps fb_bar_caps_a" >
															<a href="javascript:void(0);" ><img src="images/fb_icon_white.png"/> Import photos from facebook</a>
														</span>
													</div>
												</span>
											</div>-->
                                            <?php } ?>
                                            <!-------------------------------------------------->
                                            <input type="hidden" id="kc_reportphoto_id" value=""/>
                                            <div class="full pull-left">
                                                <a class="pull-right" href="javascript:void(0);" data-toggle="modal"
                                                   data-target="#kc-report-photo">
                                                    <img src="images/flag.png"/>Report photo
                                                </a>
                                            </div>

                                            <!--<div class="kc_controlr">
                                                <div>
                                                    <span>Shortcut:</span>
                                                    <a href="javascript:void(0);">1</a><span>Yes</span>
                                                    <a href="javascript:void(0);">2</a><span>No</span>
                                                    <a href="javascript:void(0);">Space</a><span>Next person</span>
                                                </div>
                                            </div>-->
                                            <div class="kc_morephotos">
                                                <a href="javascript:void(0);"><i class="fa fa-camera"></i>
                                                    <span><?php echo $countPhoto; ?></span></a>
                                            </div>
                                            <!-------------------------user photo album strip-------------------------------------->
                                            <!--<ul id="kc-thum-slider" class="kc_thumnails">
											<?php foreach ($kismatConnectionUsers as $kismatConnectionUser) { ?>
												<li class="kc-user" id="kc-user-<?php echo $kismatConnectionUser['user_id']; ?>"><img src="<?php echo $userProfileObj->getProfileImage($kismatConnectionUser['profile_image']); ?>" /></li>
											<?php } ?>
											</ul>-->

                                            <ul id="kc-thum-slider" class="kc_thumnails">
                                                <?php
                                                $iCount = 0;
                                                foreach ($userPhotoArray as $userThumPhotos) { ?>
                                                    <li data-slideIndex="<?php echo $iCount; ?>" class="kc-image-slider"
                                                        id="kc-image-slider-<?php echo $userThumPhotos['photo_id']; ?>">
                                                        <a href="javascript:void(0);">
                                                            <img src="<?php echo $userProfileObj->getPhotoPath($userThumPhotos['photo']); ?>"/>
                                                        </a>
                                                    </li>
                                                    <?php
                                                    $iCount++;
                                                } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--Match Div-->
                                <div id="matched" class="modal fade login_pop in" role="dialog" aria-hidden="false">
                                    <div class="modal-dialog match">
                                        <div class="modal-content light-gray">
                                            <div>
                                                <div class="modal-header">
                                                    <!--<button type="button" class="close" data-dismiss="modal">�</button>-->
                                                    <h4><b>You found a match! </b></h4>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="kc_match bg_saltblue">
                                                        <div class="identifire clearfix">
                                                            <div>
                                                                <img src="<?php echo $userProfileObj->getProfileImage($userResult['profile_image']); ?>"/>
                                                            </div>
                                                            <div>
                                                                <img src="<?php echo $userProfileObj->getProfileImage($kcuserResult['profile_image']); ?>"/>
                                                            </div>
                                                            <div class="match_icon"><img src="images/match.png"/></div>
                                                        </div>
                                                        <div class="pull-left white full align-c margin-t30"><h3>You
                                                                found a match. <br/><?php echo $userName; ?> likes you
                                                                too! </h3></div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <div class="button-u">
                                                        <a href="javascript:void(0);" class="message_now"
                                                           style="display:inline-block;"
                                                           id="message_nowkc-<?php echo $kcuserResult['user_id']; ?>"
                                                           class="pull-right b_red">Send <?php if ($kcuserResult['gender'] == 2) echo "Her"; else {
                                                                echo "His";
                                                            } ?> a Message</a>
                                                    </div>
                                                    <div class="button-u"><a href="kismat-connection.php"
                                                                             class="pull-left">Keep playing</a></div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--Match Div-->
                            <?php } else {
                                $limit = ''; ?>
                                <div class="msg_cont_sec2 kc align-c">
                                    <div class="align-c margin-t60 d_block"><a href=""><img
                                                    src="images/facial.png"/></a></div>
                                    <h3 class="margin-t20 margin-b20 lh-40">Oh no...</h3>
                                    <div class="margin-b30"><p>Unexpectedly, you have run out of possible Kismat
                                            Connection users in your area.<br/>New people are joining everyday so check
                                            back soon or change your search filters!</p></div>
                                    <div class="align-c kc-unexpect margin-t5 margin-b20 full pull-left">
                                        <span>More options</span>
                                        <a href="<?php echo HTTP_SERVER; ?>add-friends.php">Find your friends on
                                            Startrishta</a>
                                        <a data-toggle="modal" data-target="#addMyPhotoModal"
                                           href="javascript:void(0);">Upload a new photo of yourself</a>
                                    </div>
                                    <p><a href=""> </a></p>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Main Container end here-->

        <!--Footer start here-->
        <?php
        require("include/footer.php");
        require("include/foot.php");
        ?>
        <!--Footer end here-->
    </div>
    <!--kismat_connection-->
    <!------------------------REPORT PHOTO---------------------------------->
    <div id="kc-report-photo" class="modal fade login_pop" role="dialog">
        <div class="modal-dialog-1">
            <div class="modal-content">
                <div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3><b>Report Photo</b></h3>
                    </div>

                    <div class="modal-body">
                        <form class="login-form" method="post" action="">
                            <ul class="kc_filter">
                                <li>
                                    <div class="swith_gq rate-pp">
                                        <input id="kc_hereto7" data-rel="#general" type="radio" name="kc_reportphoto"
                                               value="Inappropriate Photo" checked/>
                                        <label for="kc_hereto7"><span class="pull-left"><span></span></span>Inappropriate
                                            Photo</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="swith_gq rate-pp">
                                        <input id="kc_hereto8" data-rel="#general" type="radio" name="kc_reportphoto"
                                               value="Threatening behaviour"/>
                                        <label for="kc_hereto8"><span class="pull-left"><span></span></span>Threatening
                                            behaviour</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="swith_gq rate-pp">
                                        <input id="kc_hereto9" data-rel="#general" type="radio" name="kc_reportphoto"
                                               value="Other"/>
                                        <label for="kc_hereto9"><span
                                                    class="pull-left"><span></span></span>Other</label>
                                    </div>
                                </li>
                            </ul>


                            <div class="popup_add_photo">
                            </div>

                            <div class="report">
                                <textarea id="kc_reportphotoTextarea" maxlength='500'></textarea>
                                <div class="word_count"><span id="count_kc_reportphoto">0</span>/500</div>
                            </div>
                            <div class="photo_cmnt_btn report margin-t5 clearfix align-c">
                                <!--<a href="javascript:void(0);" id="kc_reportphotoSubmit" class="btn btn-default padding-lr-40 custom red">Submit</a>
                                <span class="pull-left"><span class="pull-left margin-r10">or</span> <a href="javascript:void(0);" data-dismiss="modal">Cancel</a></span>-->
                                <a href="javascript:void(0);" id="kc_reportphotoSubmit"
                                   class="btn btn-default padding-lr-40 custom red">Submit</a>
                                &nbsp; <b>or</b> &nbsp; <a href="javascript:void(0);" class="green"
                                                           data-dismiss="modal">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End report abuse-->

    <!--Report Succussfully-->
    <div id="kc-report-succussfully" class="modal fade login_pop" role="dialog">
        <div class="modal-dialog-1">
            <div class="modal-content">
                <div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3><b>Thank You!</b></h3>
                    </div>

                    <div class="modal-body">
                        <form class="login-form">
                            <div class="popup_add_photo"></div>
                            <div>
                                <h5 class="align-c lh-20"><b> We've received your report and will review it as soon as
                                        we can. If we find the user is in violation of our policies we will take direct
                                        action.</b></h5>
                            </div>
                            <div class="popup_add_photo margin-t20">
                                <a href="javascript:void(0);" data-dismiss="modal"
                                   class="btn btn-default padding-lr-40 custom red">OK </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="search_location" class="modal fade login_pop" role="dialog" style="z-index:10000;">
        <div class="modal-dialog-1" style="width:434px;">
            <div class="modal-content">
                <div>
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4><b>Location</b></h4>
                    </div>

                    <div class="modal-body">
                        <form class="login-form">
                            <div class="popup_add_photo">
                            </div>
                            <div>
                                <h5 class="align-c lh-20"><b>To find out how close <span id="location-user-name"></span>
                                        is to you, you need to switch on the location service on your browser</b></h5>
                            </div>
                            <div class="popup_add_photo margin-t20">
                                <a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red"
                                   onclick="getLocation();">Turn on your Browsers Location Services</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Report Succussfully-->
    <!------------------------------------------------------------------------------------------------>
    <script>

        $(document).ready(function () {
            var limit = 1;
            $('#kc-thum-slider').css('visibility', 'hidden');

            $('.kc_morephotos').live('mouseover', function () {
                $('#kc-thum-slider').css('visibility', 'visible');
            });
            //$('#kc-thum-slider').parent().parent().css('color' , 'red');
            /********************8USER LIKE**************************/
            $('#user_likekc').click(function () {
                var user_id = '<?php echo $userId;
                    if ($limit == '') {
                        $limit = 1;
                    } else {
                        $limit++;
                    }
                    ?>';
                $('#preloader').show();
                $.ajax({
                    type: "POST",
                    url: "ajax/kismat-connection.php",
                    data: {like_user_id: user_id, action: 'addtolikekc', limit: limit},
                    success: function (result) {
                        $('#preloader').hide();
                        if (result == 0) {
                            alert(result);
                            $('#error_message_header').html('Alert');
                            $('#error_message').html('Problem in network.please try again.');
                            $('#alert_modal').modal('show');
                        }
                        if (result == 3) {
                            $('#matched').modal('show');
                        } else {
                            $('.border_kc').html(result);
                        }
                    }
                });
                return false;
            });
            $('#user_unlikekc').click(function () {
                var user_id = '<?php echo $userId;
                    if ($limit == '') {
                        $limit = 1;
                    } else {
                        $limit++;
                    }
                    ?>';
                $('#preloader').show();

                $.ajax({
                    type: "POST",
                    url: "ajax/kismat-connection.php",
                    data: {unlike_user_id: user_id, action: 'addtounlikekc', limit: limit},
                    success: function (result) {
                        $('#preloader').hide();
                        if (result == 0) {
                            $('#error_message_header').html('Alert');
                            $('#error_message').html('Problem in network.please try again.');
                            $('#alert_modal').modal('show');
                        } else {
                            $('.border_kc').html(result);
                        }
                    }
                });
                return false;
            });


            var realSlider = $("ul#kc-slider").bxSlider({
                speed: 1000,
                pager: false,
                slideWidth: 715,
                nextText: '',
                prevText: '',
                startSlide: 0,
                infiniteLoop: false,
                hideControlOnEnd: true,
                onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                    changeRealThumb(realThumbSlider, newIndex);

                }
            });
            var realThumbSlider = $("ul#kc-thum-slider").bxSlider({
                minSlides: 3,
                maxSlides: 3,
                slideWidth: 140,
                slideMargin: 10,
                moveSlides: 1,
                pager: false,
                speed: 1000,
                infiniteLoop: false,
                hideControlOnEnd: true,
                startSlide: 0,
                nextText: '<span></span>',
                prevText: '<span></span>',
                onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                    /*$j("#sliderThumbReal ul .active").removeClass("active");
                    $slideElement.addClass("active"); */
                }
            });

            linkRealSliders(realSlider, realThumbSlider);

            if ($("#kc-thum-slider li").length < 5) {
                $("#kc-thum-slider .bx-next").hide();
            }

            // sincronizza sliders realizzazioni
            function linkRealSliders(bigS, thumbS) {

                $("ul#kc-thum-slider").on("click", "a", function (event) {
                    event.preventDefault();
                    var newIndex = $(this).parent().attr("data-slideIndex");
                    bigS.goToSlide(newIndex);
                });
            }

            //slider!=$thumbSlider. slider is the realslider
            function changeRealThumb(slider, newIndex) {

                var $thumbS = $("#kc-thum-slider");
                $thumbS.find('.active').removeClass("active");
                $thumbS.find('li[data-slideIndex="' + newIndex + '"]').addClass("active");

                if (slider.getSlideCount() - newIndex >= 4) slider.goToSlide(newIndex);
                else slider.goToSlide(slider.getSlideCount() - 4);

            }

            $(".kc_toggle_icon").click(function () {
                if ($(".kc-toggle").css("display") == 'block') {
                    $(".kc-toggle").hide();
                    $(".kc_toggle_icon i").removeClass("fa-caret-up");
                    $(".kc_toggle_icon i").addClass("fa-caret-down");
                } else {
                    $(".kc-toggle").show();
                    $(".kc_toggle_icon i").removeClass("fa-caret-down");
                    $(".kc_toggle_icon i").addClass("fa-caret-up");
                }
            });

            $("#toggle-profile").click(function () {
                $("#kc-one").toggle();
                $("#kc-two").toggle();
                var html = $(this).html();
                //alert(html);
                if (html == 'Hide Profile') {
                    $(this).html('Show Profile');
                    //alert(html);
                } else {
                    $(this).html('Hide Profile');
                    $('.slider3').reloadSlider();
                }
            });

            //age Range Code//
            var here_age_min = $('#kc_here_age_min').val();
            var here_age_max = $('#kc_here_age_max').val();
            if (here_age_min != 0)
                var min_value = here_age_min;
            else
                var min_value = 18;
            if (here_age_max != 0)
                var max_value = here_age_max;
            else
                var max_value = 50;
            $("#kc-age-slider-range").slider({
                range: true,
                min: 18,
                max: 80,
                values: [min_value, max_value],
                slide: function (event, ui) {
                    $("#kc-age-amount").html("" + ui.values[0] + " - " + ui.values[1]);
                    $('#kc_here_age_min').val(ui.values[0]);
                    $('#kc_here_age_max').val(ui.values[1]);
                }
            });
            $("#kc-age-amount").html("" + $("#kc-age-slider-range").slider("values", 0) +
                " - " + $("#kc-age-slider-range").slider("values", 1));

            $('#kc-reset-serarch').click(function () {
                $.ajax({
                    type: "POST",
                    url: "ajax/search.php",
                    data: {action: 'resetSearch'},
                    success: function (result) {
                        if (result == 1) {
                            window.location.href = "";
                        } else {
                            $('#error_message_header').html('Alert');
                            $('#error_message').html('Problem in network.please try again.');
                            $('#alert_modal').modal('show');
                        }
                    }
                });
                return false;
            });
            /********************REPORT PHOTO**************************/
            $('#kc_reportphotoTextarea').keyup(function () {
                var value = $(this).val();
                var len = value.length;
                if (len <= 500) {
                    $('#count_kc_reportphoto').text(len);
                }
            });
            $('#kc_reportphotoSubmit').on('click', function () {
                //var photo_id=$('ul[id="kc-thum-slider"] li>.active').attr('id');
                //alert(photo_id);
                var id = $('#kc-thum-slider li.active').attr('id');

                if (typeof id === "undefined") {
                    var id = $('#kc-thum-slider li').first().attr('id').split('-');
                    var photo_id = id[3];
                } else {
                    var id = $('#kc-thum-slider li.active').attr('id').split('-');
                    var photo_id = id[3];
                }

                var reason = $('input[name=kc_reportphoto]:checked').val();
                var description = $('#kc_reportphotoTextarea').val();

                if (typeof reason === "undefined") {
                    reason = ''
                }
                if (reason == '') {
                    $('#error_message_header').html('Alert');
                    $('#error_message').html('Please select reason.');
                    $('#alert_modal').modal('show');
                    return false;
                } else if (reason == 'Other' && description == '') {
                    $('#error_message_header').html('Alert');
                    $('#error_message').html('Please enter reason.');
                    $('#alert_modal').modal('show');
                    return false;
                }

                $('#preloader').show();
                $.ajax({
                    type: "POST",
                    url: "ajax/profile.php",
                    data: {report_photo_id: photo_id, reason: reason, description: description, action: 'reportPhoto'},
                    success: function (result) {
                        $('#preloader').hide();
                        $('#kc-report-photo').modal('hide');
                        //alert(result);return false;
                        if (result == 1) {
                            $('#kc-report-succussfully').modal('show');
                        } else if (result == 0) {
                            $('#error_message_header').html('Alert');
                            $('#error_message').html('Problem in network.please try again.');
                            $('#alert_modal').modal('show');
                        }
                    }
                });
                return false;

            });

        });

        function findLocation(name) {

            $('#location-user-name').html(name);
            $('#search_location').modal('show');

        }

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
            else {
                $('#near_location').html("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            //$('#near_location').htm("Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude);
            $.ajax({
                type: "POST",
                url: "ajax/search.php",
                data: {action: 'enableLocationService'},
                success: function (result) {
                    if (result == 0) {
                        $('#error_message_header').html('Alert');
                        $('#error_message').html('Problem in network.Please try again');
                        $('#alert_modal').modal('show');
                    } else {
                        window.location.href = '';
                    }
                }
            });
        }

        function showError(error) {
            $('#near_location').html("Geolocation is not supported by this browser.");
        }
    </script>
</body>
</html>