<?php
include('classes/adminClass.php');
$adminObj=new Admin();
$limit = 3;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
$start_from = ($page-1) * $limit;
$sql = "select * from sr_user_login WHERE user_id not in (select user_id from sr_users) and email_id !='' ORDER BY user_id DESC LIMIT $start_from, $limit";
$rs_result = mysql_query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Startrishta | Users List</title>
    <link rel="icon" type="image/png" href="images/favico.png">
    <!-- Styling -->
    <link href="vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/ui.css" rel="stylesheet">
    <!-- Theme -->
    <link id="theme" href="assets/css/themes/theme-default.css" rel="stylesheet" type="text/css">

    <link href="vendor/plugins/form/icheck/skins/square/_all.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="vendor/plugins/ui/carousel/owl.carousel.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600' rel='stylesheet' type='text/css'>
    <link href="vendor/fonts/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.0.3.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/simplePagination.css" />
    <script src="assets/js/jquery.simplePagination.js"></script>

</head>

<body>
<!-- Preloader -->
<div id="preloader"><div id="status">&nbsp;</div></div>

<div class="wrapper dashboard">

    <?php  include("include/header.php"); ?>

    <!-- SIDEBAR -->
    <?php include("include/side-menu.php") ?>


    <!-- SIDEBAR -->

    <!-- MAIN -->
    <div class="main clearfix">
        <!-- CONTENT -->
        <div id="content" class="">
            <div class="container-fluid">
                <div class=" drag-drop dash-main">
                    <div class="row-10">
                        <h5> User List</h5>
                        <div class="col-md-5 col-lg-5">
                            <div class="">
                                <form>
                                    <ul class="search-bar-power clearfix">
                                        <li>
                                            <ul class="search-bar search-bar-wap clearfix">
                                                <li>
                                                    <div class="form-group">
                                                        <select class="selectpicker default" >
                                                            <option value="">User ID</option>
                                                            <option value="">Email ID</option>
                                                        </select>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="id" id="systemId" value="" />
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <button type="submit" class="btn btn-block">Search</button>
                                        </li>
                                    </ul>
                                    <!--
                                     -->
                                </form>
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <form method="post" action="exportexcel.php">
                                <input type="hidden" name="searchValue" value="<?php echo $searchValue; ?>"/>
                                <input type="hidden" name="searchType" value="<?php echo $searchType; ?>"/>
                                <input type="submit" name="download" align="right" class="btn-success downexcel pull-right" value="Export Data"/>
                            </form>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- /drag-drop -->
                </div>	<!-- col-lg-9 closed-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pane equal">
                            <div class="table-responsive">
                                <table class="powersearch-table table  table-hover">
                                    <form id="search-form" method="post">
                                        <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Sl No.</th>
                                            <th>User Id</th>
                                            <th>Email</th>
                                            <th>Date Joined</th>
                                            <th>Joined Medium</th>
                                        </tr>
                                        <?php
                                        $i=1;
                                        while ($result = mysql_fetch_assoc($rs_result))
                                        {

                                            ?>
                                        <tr class="table-secnd">
                                            <td><input type="checkbox" name="user_id" value="<?php echo  $result['email_id'];?>" /> </td>
                                            <td><?php echo  $i;?></td>
                                            <td><?php echo  $result['user_id'];?></td>
                                            <td><?php echo  $result['email_id'];?></td>
                                            <td><?php echo  date("d-m-y H:i A",strtotime($result['created_on']));?></td>
                                            <td><?php if($result['oauth_uid']!=''){echo  "Facebook";}else{echo  "Direct";}?></td>

                                        </tr>
                                        <?php $i++;
                                        }?>
                                        </thead>
                                    </form>


                                </table>
                                <?php
                                $sql = "select count(user_id) from sr_user_login WHERE user_id not in (select user_id from sr_users) and email_id !=''";
                                $rs_result = mysql_query($sql);
                                $row = mysql_fetch_row($rs_result);
                                $total_records = $row[0];
                                $total_pages = ceil($total_records / $limit);
                                 $pagLink = "<nav><ul class='pagination'>";
                                for ($i=1; $i<=$total_pages; $i++) {
                                    $pagLink .= "<li><a href='pre-registered.php?page=".$i."'>".$i."</a></li>";
                                };
                                echo $pagLink . "</ul></nav>";
                                ?>
                            </div>
<textarea id="mail_body" name="mail_body"></textarea>

                            <input type="submit" id="save_value" value="Submit"  />
                        </div><!-- pane -->
                    </div><!-- col -->
                </div><!-- row -->
                <!--<nav>
                   <p class="searchPagination"></p>
                        </nav>-->
            </div><!-- container-fluid -->
        </div><!-- content -->
    </div><!-- main -->
    <!-- /MAIN  -->
</div><!-- wrapper -->




<?php include("include/foot.php"); ?>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR_BASEPATH = 'ckeditor';

    var editor = CKEDITOR.replace('mail_body', {
        filebrowserBrowseUrl: "kcfinder/browse.php?type=files"
    });
</script>

<script type="text/javascript">


        $('#save_value').click(function(){
            var valemail = [];
            var bodymsg=CKEDITOR.instances.mail_body.getData();
           // alert(bodymsg);
            $(':checkbox:checked').each(function(i){
                valemail[i] = $(this).val();
            });
            $.ajax({
                type: "POST",
                data: {valemail:valemail,bodymsg:bodymsg,action:'sendMultiMail'},
                url: "ajax/admin.php",
                success: function(datamsg){
                    alert(datamsg);
                }
            });
        });
</script>
</body>
<!-- Mirrored from cazylabs.com/themes-demo/quarca/index2.html by HTTrack Website Copier/3.x [XR&CO'2010], Thu, 26 Mar 2015 07:26:33 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>
