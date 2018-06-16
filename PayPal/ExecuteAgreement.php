<?php
ini_set('display_errors',1);
session_start();

include "../classes/connection.php";
require('../classes/profile_class.php');

$obj=new Profile();
$con = new Connection();
$con->createConnection();
// #Execute Agreement
// This is the second part of CreateAgreement Sample.
// Use this call to execute an agreement after the buyer approves it.
require 'bootstrap.php';

// ## Approval Status
// Determine if the user accepted or denied the request
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $token = $_GET['token'];
    $agreement = new \PayPal\Api\Agreement();
    try {
        // ## Execute Agreement
        // Execute the agreement by passing in the token
        $agreement->execute($token, $apiContext);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printError("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $ex);
        exit(1);
    }

    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    //ResultPrinter::printResult("Executed an Agreement", "Agreement", $agreement->getId(), $_GET['token'], $agreement);

    // ## Get Agreement
    // Make a get call to retrieve the executed agreement details
    try {
        $agreement = \PayPal\Api\Agreement::get($agreement->getId(), $apiContext);
    } catch (Exception $ex) {
        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        ResultPrinter::printError("Get Agreement", "Agreement", null, null, $ex);
        exit(1);
    }

    // echo  $agreement->getPlan();
    $user_id = $_SESSION['user_id'];
    $agreementId = $agreement->getId();
    $start_date = $agreement->getStartDate();
    $token_no = $_GET['token'];
    $agreement_state = $agreement->getState();
    $start_date = date("Y-m-d H:i:s", strtotime($start_date));


    //echo  "select * from transaction_history where transaction_id =$agreementId";
    if(isset($_REQUEST['param'])){
        $id_encoded =base64_decode($_REQUEST['param']);
        $id_encoded=explode("-",$id_encoded);
        $id =  $id_encoded[0];
        $currency='USD';
        if($id == 1)
        {
            $amount ='4.99';

        }
        elseif ($id == 2)
        {
            $amount ='14.99';
        }
        elseif ($id == 3)
        {
            $amount ='34.99';
        }
        elseif ($id == 4)
        {
            $amount ='49.99';
        }


        $check_query = mysql_query("select * from sr_vip_transaction_history where transaction_id ='$agreementId'");
    if(!$check_query)
    {
        die(mysql_error());
    }
    if (mysql_num_rows($check_query) ===  0)
    {
        $recurring_query = "insert into sr_vip_transaction_history set user_id = $user_id , transaction_id = '$agreementId',vip_id='$id',amount = '$amount',currency = '$currency',start_date = '$start_date', is_recurring = 1 , is_cancelled = 0 , token_no = '$token_no', created_on = now() ,updated_on = now() ";
    }
    else{
        $recurring_query = "update sr_vip_transaction_history set updated_on = now() WHERE transaction_id = '$agreementId'";
    }


    $execute_recurring_query = mysql_query($recurring_query);

    if($execute_recurring_query)
    {

        $dateTime=gmdate("Y-m-d H:i:s", time()+19800);

        $week1 = date("Y-m-d H:i:s", strtotime("+1 week", strtotime($dateTime)));

        $month1 = date("Y-m-d H:i:s", strtotime("+1 month", strtotime($dateTime)));

        $month3 = date("Y-m-d H:i:s", strtotime("+3 months", strtotime($dateTime)));

        $month6 = date("Y-m-d H:i:s", strtotime("+6 months", strtotime($dateTime)));

            $query =mysql_query("SELECT sr_vip_fee.*, sr_currency.* FROM sr_vip_fee JOIN sr_currency on currency_id 

		WHERE sr_currency.currency_id = sr_vip_fee.currency AND sr_vip_fee.id='".$id."'");

            $result=mysql_fetch_assoc($query);

            //echo "<pre>";print_r($result);

            $duration = $id;
			
            if($duration == 1){

                $end_date = $week1;

            }

            else if($duration == 2){

                $end_date = $month1;

            }

            else if($duration == 3){

                $end_date = $month3;

            }

            else if($duration == 4){

                $end_date = $month6;

            }
echo $end_date;
            //echo $month6.'<br>';

            $vipQuery=mysql_query("SELECT * FROM sr_vip_user WHERE user_id='".$_SESSION['user_id']."' and status=1");

            if($vipQuery && mysql_num_rows($vipQuery)>0){

                $Query=mysql_query("UPDATE  sr_vip_user SET  vip_id='".$id."', start_date='".$dateTime."' , 

			end_date='".$end_date."' WHERE  user_id='".$_SESSION['user_id']."'");

            }else{
                $Query=mysql_query("INSERT INTO  sr_vip_user SET  vip_id='".$id."' , 

			user_id='".$_SESSION['user_id']."', start_date='".$dateTime."' , 

			end_date='".$end_date."'");
            }



            if($Query){

                $mailToUser = mysql_query("Select sul.email_id, su.user_name from sr_user_login sul 

		join sr_users su on su.user_id = sul.user_id 

		where sul.user_id = '".$_SESSION['user_id']."' ");



                $mailToUserFetch = mysql_fetch_array($mailToUser);



                $objEmail = new Email();

                $objEmail->mailaccount='start_rishta';

                $objEmail->to=$mailToUserFetch['email_id'];

                $objEmail->from=ADMINMAIL2;

                $objEmail->fromname=Email_FROMNAME;

                $objEmail->bcc=Email_BCC;

                $objEmail->subject = "Startrishta Purchase Confirmation ".date("d M, Y", strtotime(DATE_TIME));

                $objEmail->body = '<html>

			<head>

				<title></title>

				<style type="text/css">

			    	body {margin: 0; padding: 0; min-width: 100%!important;}

			    	.content {width: 100%; max-width: 600px;}

			    </style>

			</head>

			<body><!-- font-family: Open Sans,sans-serif; -->

			<table width="100%" style="max-width:600px; margin:auto; " bgcolor="#E36356" border="0" cellpadding="0" cellspacing="0">

				<tr>

					<td style="padding-top:30px;">

						<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">

							<tr>

								<td style="max-width:100%; width:100%; padding-top:20px;">

								<img src='.SITEURL.'images/logo3.png style="margin:0 auto; display:block;" width="100" height="98" alt="logo"/></td>

							</tr>

							<tr>

								<td style="text-align:center; padding-top:20px;">

									<h2 style="color:#7E7E7E; font-weight:bold; font-size: 27px;">

									Hi '.$mailToUserFetch["user_name"].'</h2>

								</td>

							</tr>

							<tr>

								<td style="padding:0 30px 15px;">

								Congratulations on your recent purchase with Startrishta.com. 

								<br>

								Make the most of your extra VIP status by logging in 

								and promoting your profile!

								</td>

							</tr>

							<tr>

								<td style="padding:0 30px 15px;">

								<strong>Startrishta Invoice/Receipt</strong></td>

							</tr>

							<tr>

								<td style="padding:0 30px 15px;"><hr></td>

							</tr>

							<tr>

								<td>

								<table width="95%" style="max-width:600px; margin:auto;" bgcolor="#ffffff" border="0" cellpadding="0" cellspacing="0">

									<tr>

										<td style="padding:0 30px 15px;">Product:</td>

										<td style="padding:0 30px 15px;">VIP Subscription</td>

									</tr>

									<tr>

										<td style="padding:0 30px 15px;">Duration:</td>

										<td style="padding:0 30px 15px;">

										'.date("d M, Y h:i A",strtotime($dateTime)).' To 

										'.date("d M, Y h:i A", strtotime($end_date)).'</td>

									</tr>

									<tr>

										<td style="padding:0 30px 15px;">Amount Paid</td>

										<td style="padding:0 30px 15px;">

										$ '.$amount. ' USD

										</td>

									</tr>

									<tr>

										<td style="padding:0 30px 15px;">Date of Invoice</td>

										<td style="padding:0 30px 15px;">

										'.date("d M, Y h:i A",strtotime(DATE_TIME)).'

										</td>

									</tr>

									

								</table>

								</td>

							</tr>

							<tr>

								<td style="padding:0 30px 15px;"><hr></td>

							</tr>

							<tr>

								<td style="padding:0 30px 15px;"><a style="background:#e74c3c;text-decoration:none; border:none;border-radius: 3px;color: #fff;cursor: pointer;font-size: 12px;font-weight: 400 !important;padding: 5px 9px;" 

		                        href="'.SITEURL.'">Click here to Login</a></td>

		                    </tr>



							<tr>

								<td style="padding:20px 30px 20px;">

									<p style="font-size:14px;">Thanks,<br>Startrishta Support</p>

								</td>

							</tr>

							<tr>

								<td style="padding:20px 0px 20px; text-align:center; background:#EEEEEC;">

									<ul style="text-align:center; padding:0; margin:0;">

										<li style="list-style:none; display:inline-block; 

										font-size:12px; line-height:20px; color:#878787;">STAY CONNECTED</li>

										<li style="list-style:none; display:inline-block;vertical-align: bottom;">

										<a href="https://www.facebook.com/startrishta/" target="_blank" 

										style="display:block;">

										<img src='.SITEURL.'images/facebook-icon.png style="max-width:20px;"></a>

										</li>

										<li style="list-style:none; display:inline-block; vertical-align: bottom;">

										<a href="https://twitter.com/startrishta" target="_blank" style="display:block;">

										<img src='.SITEURL.'images/twitter-icon.png style="max-width:20px;"></a>

										</li>

									</ul>

								</td>

							</tr>

						</table>

					</td>

				</tr>

					<td>

						<img src='.SITEURL.'images/bottom.png style="max-width:600px; width:100%;" />

					</td>

				<tr>

				</tr>

			</table>

			</body>

			</html>';

                //print_r($objEmail);exit;

                $email_response = $objEmail->sendemail();



                if(isset($_REQUEST['vip'])){

                    echo "<script>window.location.href='../vip.php?vip=".$_REQUEST['vip']."'</script>";

                }else{

                    echo "<script>window.location.href='../vip.php?success'</script>";

                }

            }else {

                echo 0;

            }

        }

    }
    else

    {
        die(mysql_error());
    }

//print_r($agreement);
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    //ResultPrinter::printResult("Get Agreement", "Agreement", $agreement->getId(), null, $agreement);
} else {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
   // ResultPrinter::printResult("User Cancelled the Approval", null);
    echo "<script>window.location.href='../vip.php?cancelled'</script>";
}