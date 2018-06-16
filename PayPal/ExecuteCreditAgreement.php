<?php
require 'bootstrap.php';
require('../classes/profile_class.php');
$dateTime=gmdate("Y-m-d H:i:s", time()+19800);

echo $user_id=$_SESSION['user_id'];

$obj=new Profile();
$con = new Connection();
$con->createConnection();

use PayPal\Api\Amount;
use PayPal\Api\Details;
//use PayPal\Api\ExecutePayment;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $paymentId = $_GET['paymentId'];
    $payment = Payment::get($paymentId, $apiContext);
    $execution = new PaymentExecution();
    $execution->setPayerId($_GET['PayerID']);
     $param = $_GET['param'];

    //$transaction = new Transaction();
    //$amount = new Amount();
    //$details = new Details();

    //$details->setShipping(2.2)->setTax(1.3)->setSubtotal(17.50);

    //$amount->setCurrency('USD');
    //$amount->setTotal(21);
    //$amount->setDetails($details);
    //$transaction->setAmount($amount);
    //$execution->addTransaction($transaction);

    try {
        $result = $payment->execute($execution, $apiContext);
        //ResultPrinter::printResult("Executed Payment", "Payment", $payment->getId(), $execution, $result);

        try {
            $payment = Payment::get($paymentId, $apiContext);
        } catch (Exception $ex) {
            ResultPrinter::printError("Get Payment", "Payment", null, null, $ex);
            exit(1);
        }
    }
    catch (Exception $ex) {
        ResultPrinter::printError("Executed Payment", "Payment", null, null, $ex);
        exit(1);
    }
//    ResultPrinter::printResult("Get Payment", "Payment", $payment->getId(), null, $payment);

    //return $payment;
    if(isset($_GET['param'])){

        $id_encoded =base64_decode($_REQUEST['param']);
        $id_encoded=explode("-",$id_encoded);
        $id =  $id_encoded[0];


        $credit_for=$_REQUEST['credit'];



        $getCreditQuery = mysql_query("SELECT c.credit,f.currency,f.price 

		FROM sr_credits c, sr_credit_fee f WHERE c.id=f.credit AND f.id='".$id."'");

        $getCreditResult=mysql_fetch_assoc($getCreditQuery);

        $curr_query = mysql_query("SELECT * from sr_currency where currency_id = '".$getCreditResult['currency']."' ");

        $curr = mysql_fetch_array($curr_query);

        $getCredit = $getCreditResult['credit'];

        $price = $getCreditResult['price'];

        $currency = $getCreditResult['currency'];
        echo "INSERT INTO sr_user_credit SET  credit='".$getCredit."',price='".$price."', currency='".$currency."', used_credit=0, expired_credit=0, status=1, credited_on='".$dateTime."', user_id='".$user_id."'";
        exit;
        $Query=mysql_query("INSERT INTO sr_user_credit SET  credit='".$getCredit."',price='".$price."', currency='".$currency."', used_credit=0, expired_credit=0, status=1, credited_on='".$dateTime."', user_id='".$user_id."'");

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

								Make the most of your extra credits by logging in 

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

										<td style="padding:0 30px 15px;">Credits</td>

									</tr>

									<tr>

										<td style="padding:0 30px 15px;">Total Credits:</td>

										<td style="padding:0 30px 15px;">'.$credit.'</td>

									</tr>

									<tr>

										<td style="padding:0 30px 15px;">Amount Paid</td>

										<td style="padding:0 30px 15px;">

										'.$curr['icon'].$getCreditResult['price'].' '.$curr['currency'].'

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


            echo "<script>window.location.href='../credit.php?credit=success'</script>";

        }else {

          die(mysql_error());

        }

    }

} else {
    echo "<script>window.location.href='../credit.php?msg=failure'</script>";
    exit;
}