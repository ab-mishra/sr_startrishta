<?php
include('classes/adminClass.php');
$adminObj = new Admin();

include('classes/epClass.php');
$epObj = new Entertainment();

$getInterests = $epObj->getUserInterest(1);
$getFriends = $epObj->getMyFriends(1);
$uid=$_REQUEST['uid'];
$getProfileInfo=$epObj->getEPProfileInfo($uid);
//echo $getProfileInfo['dob'];
//print_r($getProfileInfo);
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Startrishta | EP</title>
    <link rel="icon" type="image/png" href="images/favico.png">

    <!-- Styling -->
    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/ui.css" rel="stylesheet">

    <!-- Theme -->
    <link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

    <!-- Owl Carousel -->
    <link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">
    <link href="vendor/plugins/form/datetimepicker/bootstrap-datetimepicker.css" rel="stylesheet">
    <link href="assets/css/stylesheet-pure-css.css" rel="stylesheet">


    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">
</head>

<body>
<!-- Preloader -->
<div id="preloader"><div id="status">&nbsp;</div></div>


<div class="wrapper">
    <!-- THEME OPTIONS -->


    <!-- HEADER -->

    <?php  include("include/header.php"); ?>

    <!-- SIDEBAR -->
    <?php include("include/side-menu.php") ?>
    <!-- SIDEBAR -->
    <!-- MAIN -->
    <div class="main clearfix">
        <!-- CONTENT -->
        <div id="content" class="">
            <div class="container-fluid">
                <div class="drag-drop dash-main">
                    <div class="row-10">
                        <p style="display:none;"><a href="ep.php" class="cgreen pull-right"> <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back To Entertainment Profile</a></p>
                        <h5 class="no-space">Edit Entertainment Profile </h5>
                        <div id="usr_name_rev" style="display:none;">
                            <p id="rev-back-icon" ><a style="cursor:pointer;" > <i class="fa fa-long-arrow-left" aria-hidden="true"></i> Back </a></p>
                            <p id="show_rev_user" >User</p>
                        </div>
                        <div class="clearfix"></div><br>
                        <form id="ep_form" method="post" enctype="multipart/form-data" >
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                <div class="profile-dash admin-form-e clearfix">
                                    <h6>Basic Information</h6>
                                    <div class="p-info-form">
                                        <div class="form-group">
                                            <input type="hidden" value="<?php echo $_GET['uid']; ?>" name="userid" />
                                            <input type="text" class="form-control" id="usr_name" value="<?php echo $getProfileInfo['user_name']; ?>" name="usr_name" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="dob_date" value="" name="dob_date" placeholder="">
                                        </div>
                                        <div class="form-group clearfix">
                                            <label class="f-l-left">Gender</label>
                                            <div class="radio">
                                                <div class="swith_gq">
                                                    <input type="radio" value="2" <?php if($getProfileInfo[3]==2){echo 'checked';} ?> name="gender" data-rel="#general" id="radio1">
                                                    <label for="radio1"><span><span></span></span>Female</label>
                                                </div>
                                                <div class="swith_gq">
                                                    <input type="radio" value="1" name="gender" <?php if($getProfileInfo[3]==1){echo 'checked';} ?> data-rel="#general" id="radio2">
                                                    <label for="radio2"><span><span></span></span>Male</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input id="locationlat" type="hidden" value="" />
                                            <input id="locationlon" type="hidden" value="" />
                                            <input id="location" name="location" class="form-control" value="<?php echo $getProfileInfo['location']; ?>" type="text" placeholder="Location search.." />
                                            <span class="ppd_srch" id="location_search"></span>
                                        </div>
                                        <div class="form-group">
                                            <label>Reason on website</label>
                                            <select class="form-control" id="usr_iamhere" name="usr_iamhere" >
                                                <?php
                                                $reasonOnWeb = $epObj->getHereTo();
                                                if( $reasonOnWeb!=0 )
                                                {
                                                    while( $reasonOnWebFetch = mysql_fetch_array($reasonOnWeb) )
                                                    {
                                                      // echo $getProfileInfo['here_to'],$reasonOnWebFetch['here_to_id'];
                                                        if(!strcmp($getProfileInfo['here_to'],$reasonOnWebFetch['here_to_id']))
                                                        {
                                                            ?>
                                                            <option value="<?php echo $reasonOnWebFetch['here_to_id']; ?>" selected >
                                                                <img src="<?php echo SITEURL."images/".$reasonOnWebFetch['icon']; ?>" />&nbsp;
                                                                <?php echo $reasonOnWebFetch['here_to']; ?></option>
                                                            <?php
                                                        }
                                                        else
                                                        {


                                                        ?>
                                                    <option value="<?php echo $reasonOnWebFetch['here_to_id']; ?>" >
                                                        <img src="<?php echo SITEURL."images/".$reasonOnWebFetch['icon']; ?>" />&nbsp;
                                                        <?php echo $reasonOnWebFetch['here_to']; ?></option><?php
                                                    }
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div id="image_preview" style="display: block;">
                                                <?php
                                                if($getProfileInfo['photo']=='')
                                                {
                                                ?>
                                                <img id="previewing" src="images/noimage.png" width="150px" height="150px"></div>
                                            <?php }
                                            else
                                            {?>
                                            <img id="previewing" src="../upload/photo/<?php echo $getProfileInfo['photo']; ?>" width="150px" height="150px"></div>
                                            <?php } ?>
                                            <label>Upload Profile Picture</label>
                                            <input type="file" name="imagefile" id="imagefile" class="filestyle btn-default slat-blue" data-input="false" data-buttontext="Upload Photo" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);">
                                            <div class="bootstrap-filestyle input-group"><span class="group-span-filestyle " tabindex="0"><label for="imagefile" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Upload Photo</span></label></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-9 col-md-8 col-sm-6 col-xs-12">
                                <div class="profile-dash admin-ep-right clearfix">
                                    <h6>Profile Information</h6>

                                    <ul class="middle-dash clearfix">
                                        <li class="interests" style="display:none;" >
                                            <h6>Interests <span><?php echo mysql_num_rows($getInterests); ?></span>
                                                &nbsp;
                                                <a href="javascript:void(0);" id="edit-interest" class="edit bg">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                            </h6>
                                            <ul class='clearfix' id="interest_show">
                                                <?php
                                                while( $userInterest = mysql_fetch_array($getInterests) )
                                                {
                                                    ?><li>
                                                    <a href="javascript:void(0);">
                                                        <span class="<?php echo $userInterest['icon'];?>"></span><?php echo $userInterest['interest']; ?>
                                                    </a>
                                                    </li><?php
                                                }
                                                ?>
                                            </ul>

                                            <div id="interest_edit" >
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="$('#interest-manually').show()">
                                                    <div class="pull-left">Choose interest(s) manually <i class="fa fa-caret-down"></i> </div>
                                                </button>
                                                <div class="dropdown-menu gray" id="interest-manually">
                                                    <ul class="clearfix">
                                                        <?php
                                                        $interestCatQuery = mysql_query("SELECT * FROM sr_interest_category WHERE status=1");
                                                        while($interestCatResult=mysql_fetch_assoc($interestCatQuery)){?>
                                                            <li>
                                                                <a href="javascript:void(0)" class="dropdown-submenu btn_intst">
                                                                    <span class="<?php echo $interestCatResult['icon'];?>"></span><p><?php echo $interestCatResult['category'];?></p>
                                                                </a>
                                                                <ul class="dropdown-submenu">
                                                                    <?php $interestQry=mysql_query("SELECT * FROM sr_interest WHERE cat_id='".$interestCatResult['cat_id']."' AND status=1");
                                                                    while($interestRes=mysql_fetch_assoc($interestQry)){
                                                                        if(!in_array($interestRes['interest_id'], $interestIdArray)){
                                                                            ?>
                                                                            <li class="interest-section" data-value="<?php echo $interestRes['interest'];?>" data-id="<?php echo $interestRes['interest_id'];?>" data-title="<?php echo $interestRes['icon'];?>">
                                                                                <a class="btn_intst" href="javascript:void(0)">
                                                                                    <?php echo $interestRes['interest'];?></a>
                                                                            </li>
                                                                        <?php }
                                                                    } ?>
                                                                    <!--<li><a class="btn_intst"  href="javascript:void(0)"><i class="fa fa-refresh"></i> Show more</a></li>-->
                                                                </ul>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                    <div class="align-c my_rating">
                                                        <a href="javascript:void(0);" onclick="$('#interest-manually').hide();" class="btn btn-default custom slat-blue">Done </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <li class="">
                                            <h6>About me <a href="javascript:void(0);" id="edit-about-me" class="edit bg"><i class="fa fa-pencil"></i></a></h6>
                                            <p id="abt-def-txt" style="display:none;" >Tell everyone a little a bit about yourself</p>
                                            <div class="pull-left" id="about-me-edit" style="display:block;">
                                                <textarea class="pro_edit" cols="80" rows="1" placeholder="Tell everyone a little a bit about yourself" name="aboutMe" id="aboutMeTextarea" maxlength='1000'><?php echo $getProfileInfo['about_me']; ?></textarea>
                                                <div class="word_count pull-right"><span id="count_aboutme">0/1000</span></div>
                                            </div>
                                            <div class="divider-line clearfix"></div>
                                        </li>

                                        <li class="">
                                            <h6> Looking for <a href="javascript:void(0);" id="edit-looking-for" class="edit bg"><i class="fa fa-pencil"></i></a></h6>
                                            <p id="lookinfor-def-txt" style="display:none;" >Lets others know what sort of person you are looking to meet</p>
                                            <div class="pull-left" id="looking-for-edit" style="display:block;">
                                                <textarea class="pro_edit" cols="80" rows="1" placeholder="Lets others know what sort of person you are looking to meet" name="lookingFor" id="lookingForTextarea" maxlength='1000'><?php echo $getProfileInfo['looking_for']; ?></textarea>
                                                <div class="word_count pull-right"><span id="count_lookingfor">0/1000</span></div>
                                            </div>
                                            <div class="divider-line clearfix"></div>
                                        </li>

                                        <li class="">
                                            <h6> Personal Info <a href="javascript:void(0);" id="edit-personal-info" class="edit bg"><i class="fa fa-pencil"></i></a></h6>
                                            <ul class="personal-info-wap" style="display: none" id="personal-info-show" >
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Relational Status:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Star Sign:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Sexuality:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Body Type:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Complexion:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Height:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Eye Color:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Hair Color:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Languages:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Smoking:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Drinking:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Kids:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Education:</li><li></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="inner-personal-info">
                                                        <li>Work:</li><li></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <?php
                                            $getRelationships = $epObj->getRelationship();
                                            $getStarsign = $epObj->getstarSign();
                                            $getSexuality = $epObj->getSexuality();
                                            $getBodyType = $epObj->getBodyType();
                                            $getComplexion = $epObj->getComplexion();
                                            $getEyeColor = $epObj->getEyeColor();
                                            $getHairColor = $epObj->getHairColor();
                                            $getLanguage = $epObj->getLanguage();
                                            $getEducation = $epObj->getEducation();
                                            ?>
                                            <ul class="personal-info-wap" id="personal-info-edit" style="display:block;" >
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Relational Status:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="relation" id="relation">
                                                                <option value="">Select</option>
                                                                <?php
                                                                while( $getRelationships1 = mysql_fetch_array($getRelationships) ) {
                                                                    if (!strcmp($getProfileInfo['relationship_status'], $getRelationships1['relationship_id'])) {
                                                                        ?>
                                                                        <option selected
                                                                                value="<?php echo $getRelationships1['relationship_id']; ?>"><?php echo $getRelationships1['relationship_status']; ?></option><?php
                                                                    }
                                                                    else
                                                                    {
                                                                        ?>
                                                                        <option
                                                                                value="<?php echo $getRelationships1['relationship_id']; ?>"><?php echo $getRelationships1['relationship_status']; ?></option>
                                                                <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Star Sign:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="starsign" id="starsign">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getStarsign!=0 )
                                                                {
                                                                    while( $getStarsignFetch = mysql_fetch_array($getStarsign) ) {
                                                                        //echo $getProfileInfo['star_sign'].$getStarsignFetch['sign_id'];
                                                                        if (!strcmp($getProfileInfo['star_sign'], $getStarsignFetch['sign_id'])) {

                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getStarsignFetch['sign_id']; ?>">
                                                                            <?php echo $getStarsignFetch['star_sign']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                    value="<?php echo $getStarsignFetch['sign_id']; ?>">
                                                                                <?php echo $getStarsignFetch['star_sign']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Sexuality:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="sexuality" id="sexuality">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getSexuality!=0 )
                                                                {
                                                                    while( $getSexualityFetch = mysql_fetch_array($getSexuality) )
                                                                    {
                                                               if (!strcmp($getProfileInfo['body_type'], $getSexualityFetch['sexuality_id'])) {
                                                                            ?><option selected value="<?php echo $getSexualityFetch['sexuality_id']; ?>">
                                                                            <?php echo $getSexualityFetch['sexuality']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option value="<?php echo $getSexualityFetch['sexuality_id']; ?>">
                                                                                <?php echo $getSexualityFetch['sexuality']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Body Type:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="bodytype" id="bodytype">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getBodyType!=0 )
                                                                {
                                                                    while( $getBodyTypeFetch = mysql_fetch_array($getBodyType) ) {
                                                                        if (!strcmp($getProfileInfo['body_type'], $getBodyTypeFetch['bodytype_id']))
                                                                        {
                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getBodyTypeFetch['bodytype_id']; ?>">
                                                                            <?php echo $getBodyTypeFetch['body_type']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $getBodyTypeFetch['bodytype_id']; ?>">
                                                                                <?php echo $getBodyTypeFetch['body_type']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Complexion:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="complexion" id="complexion">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getComplexion!=0 )
                                                                {

                                                                    while( $getComplexionFetch = mysql_fetch_array($getComplexion) ) {
                                                                        if (!strcmp($getProfileInfo['complexion'], $getComplexionFetch['complexion_id'])) {

                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getComplexionFetch['complexion_id']; ?>">
                                                                            <?php echo $getComplexionFetch['complexion']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $getComplexionFetch['complexion_id']; ?>">
                                                                                <?php echo $getComplexionFetch['complexion']; ?></option>
                                                                <?php
                                                                        }
                                                                    }

                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Height:&nbsp;
                                                        </li>
                                                        <li class="cm-icon">
                                                            <input name="height" class="" id="height" type="text" placeholder="169" value="<?php echo $getProfileInfo['height'] ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Eye Color:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="eyecolor" id="eyecolor">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getEyeColor!=0 )
                                                                {
                                                                    while( $getEyeColorFetch = mysql_fetch_array($getEyeColor) ) {
                                                                        if (!strcmp($getProfileInfo['eye_color'], $getEyeColorFetch['eye_color_id'])) {
                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getEyeColorFetch['eye_color_id']; ?>">
                                                                            <?php echo $getEyeColorFetch['eye_color']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                           ?>
                                                                            <option
                                                                                value="<?php echo $getEyeColorFetch['eye_color_id']; ?>">
                                                                                <?php echo $getEyeColorFetch['eye_color']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Hair Color:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="haircolor" id="haircolor">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getHairColor!=0 )
                                                                {
                                                                    while( $getHairColorFetch = mysql_fetch_array($getHairColor) ) {
                                                                        if (!strcmp($getProfileInfo['hair_color'], $getHairColorFetch['hair_color_id'])) {
                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getHairColorFetch['hair_color_id']; ?>">
                                                                            <?php echo $getHairColorFetch['hair_color']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $getHairColorFetch['hair_color_id']; ?>">
                                                                                <?php echo $getHairColorFetch['hair_color']; ?></option>
                                                                <?php
                                                                        }
                                                                    }

                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Languages:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="language" id="language">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getLanguage!=0 )
                                                                {
                                                                    while( $getLanguageFetch = mysql_fetch_array($getLanguage) ) {
                                                                        if (!strcmp($getProfileInfo['language'], $getLanguageFetch['language_id'])) {
                                                                            ?>
                                                                        <option selected
                                                                            value="<?php echo $getLanguageFetch['language_id']; ?>">
                                                                            <?php echo $getLanguageFetch['language']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $getLanguageFetch['language_id']; ?>">
                                                                                <?php echo $getLanguageFetch['language']; ?></option>
                                                                <?php
                                                                        }
                                                                    }
                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Smoking:&nbsp;
                                                        </li>
                                                        <li>
                                                            <div class="radio">
                                                                <div class="swith_gq">
                                                                    <input type="radio" value="1" <?php if($getProfileInfo['smoking']==1){echo 'checked';} ?> name="smoking" data-rel="#general" id="radio3" >
                                                                    <label for="radio3"><span><span></span></span>Yes</label>
                                                                </div>
                                                                <div class="swith_gq">
                                                                    <input type="radio" value="0" <?php if($getProfileInfo['smoking']==0){echo 'checked';} ?> name="smoking" data-rel="#general" id="radio4" >
                                                                    <label for="radio4"><span><span></span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Drinking:&nbsp;
                                                        </li>
                                                        <li>
                                                            <div class="radio">
                                                                <div class="swith_gq">
                                                                    <input type="radio" <?php if($getProfileInfo['drinking']==1){echo 'checked';} ?> value="1" name="drinking" data-rel="#general" id="radio5" >
                                                                    <label for="radio5"><span><span></span></span>Yes</label>
                                                                </div>
                                                                <div class="swith_gq">
                                                                    <input type="radio" <?php if($getProfileInfo['drinking']==0){echo 'checked';} ?> value="0" name="drinking" data-rel="#general" id="radio6" >
                                                                    <label for="radio6"><span><span></span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Kids:&nbsp;
                                                        </li>
                                                        <li>
                                                            <div class="radio">
                                                                <div class="swith_gq">
                                                                    <input type="radio" <?php if($getProfileInfo['kids']==1){echo 'checked';} ?> value="1" name="kids" data-rel="#general" id="radio7" >
                                                                    <label for="radio7"><span><span></span></span>Yes</label>
                                                                </div>
                                                                <div class="swith_gq">
                                                                    <input type="radio" <?php if($getProfileInfo['kids']==0){echo 'checked';} ?> value="0" name="kids" data-rel="#general" id="radio8" >
                                                                    <label for="radio8"><span><span></span></span>No</label>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Education:&nbsp;
                                                        </li>
                                                        <li>
                                                            <select name="education" id="education">
                                                                <option value="">Select</option>
                                                                <?php
                                                                if( $getEducation!=0 )
                                                                {
                                                                    while( $getEducationFetch = mysql_fetch_array($getEducation) ) {
                                                                        if (!strcmp($getProfileInfo['education'], $getEducationFetch['education_id'])) {

                                                                            ?>
                                                                            <option selected
                                                                            value="<?php echo $getEducationFetch['education_id']; ?>">
                                                                            <?php echo $getEducationFetch['education']; ?></option><?php
                                                                        }
                                                                        else
                                                                        {
                                                                            ?>
                                                                            <option
                                                                                value="<?php echo $getEducationFetch['education_id']; ?>">
                                                                                <?php echo $getEducationFetch['education']; ?></option>
                                                                <?php
                                                                        }
                                                                    }

                                                                }
                                                                ?>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <ul class="admin-personal-info">
                                                        <li>Work:&nbsp;
                                                        </li>
                                                        <li>
                                                            <input name="usr_work" id="work" type="text" placeholder="" value="<?php echo $getProfileInfo['work'] ?>">
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </form>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="f-b-submit">
                                <button type="button" id="save-edit-upload" class="btn btn-dash-grey">Save & Upload</button>
                            </div>
                            <span id="create_ep_err" style="font-weight:bold; color:#ff0000;" ></span>
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

<!-- REQUIRED SCRIPTS -->
<script src="vendor/js/required.min.js"></script>
<script src="assets/js/quarca.js"></script>

<!-- Progress Bar -->
<script src="vendor/plugins/ui/progress-bar/bootstrap-progressbar.min.js"></script>

<!-- Owl Carousel -->
<script src="vendor/plugins/ui/carousel/owl.carousel.min.js"></script>

<script src="vendor/plugins/form/minicolors/jquery.minicolors.min.js"></script>
<script src="vendor/plugins/form/datetimepicker/bootstrap-datetimepicker.min.js"></script>
<script src="vendor/plugins/form/summernote/summernote.min.js"></script>

<?php #Location API ?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script src="js/ep.js"></script>


<script type="text/javascript">
    "use strict";
    $(document).ready(function() {
        //PROGRESS BAR
        $('.progress .progress-bar').progressbar({
            transition_delay: 400,
            display_text: 'fill'
        });

        //CAROUSEL
        var owl = $('#demo1');
        owl.owlCarousel({
            loop: false,
            nav: true,
            margin: 10,
            navText: [
                "<i class='fa fa-angle-left fa-lg'></i>",
                "<i class='fa fa-angle-right fa-lg'></i>"
            ],
            responsive: {
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });

        var owl2 = $('#demo2');
        owl2.owlCarousel({
            loop: true,
            nav: true,
            dots: false,
            margin: 10,
            navText: [
                "<i class='fa fa-angle-left fa-lg'></i>",
                "<i class='fa fa-angle-right fa-lg'></i>"
            ],
            responsive: {
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:4
                }
            }
        });

    }); //END
</script>
<script type="text/javascript">
    "use strict";
    $(document).ready(function() {
        //MINICOLORS
        $('.color-picker').each( function() {
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                defaultValue: $(this).attr('data-defaultValue') || '',
                inline: $(this).attr('data-inline') === 'true',
                letterCase: $(this).attr('data-letterCase') || 'lowercase',
                opacity: $(this).attr('data-opacity'),
                position: $(this).attr('data-position') || 'bottom left',
                change: function(hex, opacity) {
                    if( !hex ) return;
                    if( opacity ) hex += ', ' + opacity;
                    if( typeof console === 'object' ) {
                        console.log(hex);
                    }
                },
                theme: 'bootstrap'
            });
        });

        //DATETIMEPICKER
        $(function () {
            /**/
            var dateNow ="<?php echo $getProfileInfo[4]; ?>";
            $('#dob_date').datetimepicker({
                format: 'DD/MM/YYYY',
                defaultDate: dateNow

            });
            //$('#dob_date').val(dateNow2);
            //$('#dob_date').datetimepicker('update',dateNow2);
            $('#time').datetimepicker({
                format: 'LT'
            });

            $('#date-time').datetimepicker({
            });

            $('#view-mode').datetimepicker({
                viewMode: 'years'
            });

            $('#days-of-week').datetimepicker({
                daysOfWeekDisabled: [0,6]
            });
        });

        //SUMMERNOTE
        $('#wysiwyg').summernote({
            height: 300,
            minHeight: 200,
            maxHeight: 500,
            focus: true
        });
    });//END
</script>
<script>
    /* $("#edit-about-me").click(function(){
     $("#about-me-edit").slideToggle();
     }) */
</script>
</body>

<!-- Mirrored from cazylabs.com/themes-demo/quarca/ui-advanced-elements.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:42 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>