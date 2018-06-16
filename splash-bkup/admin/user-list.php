<?php
error_reporting(0);
include("classes/connection.php");
$obj = new Connection();
	/*if(isset($_REQUEST['action'],$_REQUEST['faq_id'],$_SESSION['admin']['user_id']) and  ($_REQUEST['action']=='deleteFaq') and !empty($_REQUEST['faq_id']) and !empty($_SESSION['admin']['user_id'])){
		$faq_id=$_REQUEST['faq_id'];
		$sql=mysql_query("delete FROM sr_faq WHERE  faq_id='".$faq_id."'");
		if($sql==true){			
			echo "<script>window.location='faq-list.php'</script>";
		}
	}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
		<title>Start Rishta</title>
   <?php  include("scripting-admin.php"); ?>
</head>
<body>
    <div class="wrapper"> 
        <!--BEGIN header-->
		<?php include("inc-header.php");?>
		<!-- END header--> 
		<!--BEGIN Navigation-->
		<?php include("inc-navigation.php");?>
		<!-- END Navigation--> 
        <div class="content">
            <div class="breadLine">

                <ul class="breadcrumb">
                    <li><a href="#">Dashboard</a> <span class="divider">></span></li>                
                    <li class="active">User Zone </li>
                </ul>
				
            </div>
            <div class="workplace">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-documents"></div>
							<h1>View / Edit User</h1>
							<ul class="buttons">
							<li>
								<a href="#" class="isw-settings"></a>
								<ul class="dd-list">
									<li><a href="excelGenerator-users.php"><span class="isw-plus"></span> Export</a></li>
								</ul>
							</li>
							</ul>       
						</div>
						<div class="block-fluid">
							<table cellpadding="0" cellspacing="0" width="100%" class="table displaytable">
							<thead>
								<tr>
									<th width="20%">Email Id</th>
									<th width="20%">Country</th>									
									<!--<th width="20%">Answer</th>-->								
									<th width="20%">Date</th>								
								</tr>
							</thead>
							<tbody> 
								<?php
                                $sql = mysql_query("SELECT * FROM sr_user_notify order by datetime desc");
								while($rows=mysql_fetch_array($sql))
								{
								?>
								<tr>
								<td><?php echo $rows['email_id']; ?></td>
								<td><?php echo $rows['country']; ?></td>
								<td><?php echo date('d-m-Y h:i' , strtotime($rows['datetime'])); ?></td>
								
								</tr>
								<?php
								} 
								?>
							</tbody>
							</table>	
						</div>
					</div>
				</div>
                <div class="dr"><span></span></div>
            </div>

        </div>   
    </div>
</body>
</html>
