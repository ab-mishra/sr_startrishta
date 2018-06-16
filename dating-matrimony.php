<?php
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='dating';
if(!empty($_SESSION['user_id'])){
    $user_id=$_SESSION['user_id'];
    $userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
    <title>Startrishta | Terms & Conditions</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="icon" type="image/png" href="images/favico.png">
    <?php require("include/script.php"); ?>
</head>
<body>
<div class="main-body">
    <!------its sign in and sign up------->
    <?php //include('include/sign-in.php') ;?>

    <!--Main Container start here-->
    <div class="clearfix">
        <div class="nav_scroll">
            <div class="container">
                <!-- it's header -->
                <?php require("include/header-inner.php"); ?>
                <!-- it's header -->
            </div>
        </div>
        <div class="border_grad"></div>

        <div class="container">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_sm_3_big">
                        <!-- it's header -->
                        <?php require("include/side-bar.php"); ?>
                        <!-- it's header -->
                    </div>
                    <?php
                    $queryTerms=mysql_query("Select * from sr_cms where status='1' and page='Terms'");
                    $result=mysql_fetch_array($queryTerms);
                    ?>
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
                        <!--<div class="title_in red margin-b10 margin-t50 bold"> <h2><b><?php //echo stripslashes($result['title']); ?></b></h2></div>-->
                        <div class="title_in red margin-b10 margin-t50 bold"> <h2><b>Dating and matrimony</b></h2></div>


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <!--<div class="row terms">
								   <?php// echo stripslashes($result['description']); ?>
								</div>-->

                            <!-- -->
                            <div class="row terms lato font-15">
                                <p>Startrishta, the clue’s in the name, rishta. We’re here to make people connect, and to empower them to start their own story. That’s what gets us up in the morning. We’ve put our heart into matching our members and sparking meaningful relationships.
                                </p>

                <p> We let you pick what you matters to you. Whether it’s for matrimony, meeting new people online, finding new bffs or just to chat, we’ve got it covered. We get the cultural sensitives of some our users so we’ve developed intelligent filters that let you sort by features that are important for you. Streamline your experience by religion, language and so much more to give you a totally appropriate experience even your mum would approve of! </p>

                            </div>
                        </div>
                        <!-- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Main Container end here-->
    <?php
    //--Footer start here-->
    require("include/footer.php");
    //------its sign in and sign up----- -->
    include('include/sign-in.php') ;
    ?>
</div>


</body>
</html>