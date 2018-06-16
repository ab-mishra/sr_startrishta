<?php
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='terms';
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
    <style>
        .content_fullwidth {float: left;width: 100%;padding: 33px 0px 0px 0px;}
        .error_pagenotfound {padding: 50px 30px 58px 30px;margin: 2rem auto 5rem;width: 67%;background-color: #fff;border: 1px solid #eee;border-bottom: 5px solid #eee;text-align: center;font-family: 'Open Sans', sans-serif;}
        .error_pagenotfound strong {display: block;font-size: 145px;line-height: 100px;color: #e3e3e3;font-weight: normal;}
        .error_pagenotfound b {display: block;font-size: 40px;line-height: 40px;color: #eee;margin: 0;font-weight: 300;}
        .error_pagenotfound em {display: block;font-size: 18px;line-height: 50px;color: #e74c3c;margin: 0;font-style: normal;}
        p {font: 14px 'arial', sans-serif;font-weight: normal;line-height: 20px;}
        .mar_top3 {margin-top: 30px;width: 100%;float: left;}
        .btn-back{border-radius: 0;padding: 10px 25px}

    </style>
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
            <div class="content_fullwidth">
                <div class="error_pagenotfound">
                    <strong>404</strong>
                    <br>
                    <b>Oops... Page Not Found!</b>
                    <em>Sorry the Page Could not be Found here.</em>
                    <p>Try using the button below to go to main page of the site</p>
                    <div class="clearfix mar_top3"></div>
                    <a href="index.php" class="btn btn-danger btn-back"><i class="fa fa-arrow-circle-left fa-lg"></i>&nbsp; Go to Back</a>
                </div><!-- end error page notfound -->
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