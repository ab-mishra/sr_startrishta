<?php

// # Create Billing Agreement with PayPal as Payment Source
//
// This sample code demonstrate how you can create a billing agreement, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#create-an-agreement
// API used: /v1/payments/billing-agreements

// Retrieving the Plan from the Create Update Sample. This would be used to
//print_r($_REQUEST);
//exit;
// define Plan information to create an agreement. Make sure the plan you are using is in active state.
/** @var Plan $createdPlan */

$createdPlan = require 'update_plan.php';

use PayPal\Api\Agreement;
use PayPal\Api\Payer;
use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

$datetime = new DateTime(date('Y-m-d H:i:s', strtotime('+5 minutes')));

$start_date = $datetime->format('c');

///$start_date=gmdate("Y-m-d H:i:s");
//$start_date=gmdate("Y-m-d H:i:s");
/* Create a new instance of Agreement object
{
    "name": "Base Agreement",
    "description": "Basic agreement",
    "start_date": "2015-06-17T9:45:04Z",
    "plan": {
      "id": "P-1WJ68935LL406420PUTENA2I"
    },
    "payer": {
      "payment_method": "paypal"
    },
    "shipping_address": {
        "line1": "111 First Street",
        "city": "Saratoga",
        "state": "CA",
        "postal_code": "95070",
        "country_code": "US"
    }
}*/
$agreement = new Agreement();


$agreement->setName('Startrishta VIP Subcription')
    ->setDescription('Startrishta VIP Subcription Recurring Payments')
    ->setStartDate($start_date);

// Add Plan ID
// Please note that the plan Id should be only set in this case.
$plan = new Plan();
$plan->setId($createdPlan->getId());
$agreement->setPlan($plan);

// Add Payer
$payer = new Payer();
$payer->setPaymentMethod('paypal');
$agreement->setPayer($payer);

// Add Shipping Address
$shippingAddress = new ShippingAddress();
$shippingAddress->setLine1('111 First Street')
    ->setCity('Saratoga')
    ->setState('CA')
    ->setPostalCode('95070')
    ->setCountryCode('US');
$agreement->setShippingAddress($shippingAddress);

// For Sample Purposes Only.
$request = clone $agreement;

// ### Create Agreement
try {
    // Please note that as the agreement has not yet activated, we wont be receiving the ID just yet.
    $agreement = $agreement->create($apiContext);

    // ### Get redirect url
    // The API response provides the url that you must redirect
    // the buyer to. Retrieve the url from the $agreement->getApprovalLink()
    // method
    $approvalUrl = $agreement->getApprovalLink();
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Created Billing Agreement.", "Agreement", null, $request, $ex);
    exit(1);
}

// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
//ResultPrinter::printResult("Created Billing Agreement. Please visit the URL to Approve.", "Agreement", "<a href='$approvalUrl' >$approvalUrl</a>", $request, $agreement);
$numItems = count($agreement->getLinks());
$i = 0;
foreach ($agreement->getLinks() as $linked) {
    if ($i === 0) {
        echo "[";
    }
    echo $linked;
    if (++$i === $numItems) {
        echo "]";
    } else {
        echo ",";
    }
    /* if($linked->getRel() == 'approval_url')
     {
         $redirectUrl = $linked->getHref();
     }*/
}
//echo $LinkArray;
//echo "<script>window.location = '{$redirectUrl}';</script>";
//echo json_encode($agreement->getLinks());

//print_r($linkArray);
//print_r(json_encode($linkArray));
//$FullArray = $agreement ;
