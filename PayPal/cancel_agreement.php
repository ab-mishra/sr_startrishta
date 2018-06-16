<?php

//print_r($_POST);
ini_set('display_errors',1);
//session_start();
//echo 'ho';
include "../classes/connection.php";
require('../classes/profile_class.php');

$obj=new Profile();
$con = new Connection();
$con->createConnection();

require 'bootstrap.php';

// # Suspend an agreement
// This sample code demonstrate how you can suspend a billing agreement, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#suspend-an-agreement
// API used: /v1/payments/billing-agreements/<Agreement-Id>/suspend
// Retrieving the Agreement object from Create Agreement Sample to demonstrate the List
/** @var Agreement $createdAgreement */
$agreement_id = $_POST['agreement_id'];


//include "plan.php";
use PayPal\Api\Agreement;
use PayPal\Api\AgreementStateDescriptor;
use PayPal\Api\AgreementDetails;

//echo "<pre>";
//print_r($agreement_details);
//echo  "</pre>";
//echo  $renew_date = $agreement_details->getNextBillingDate();
//exit;




$agreement = new Agreement();

$agreement->setId($agreement_id);
//print_r($agreement->getAgreementDetails());

$agreementStateDescriptor = new AgreementStateDescriptor();
$agreementStateDescriptor->setNote("Cancel the agreement");

    try {
    $agreement->cancel($agreementStateDescriptor, $apiContext);
    $cancelAgreementDetails = Agreement::get($agreement->getId(), $apiContext);

        $agreement_check = \PayPal\Api\Agreement::get($agreement_id, $apiContext);
        $agreement_details = $agreement_check->getAgreementDetails();

        $is_cancelled = $agreement_check->getState();

    if($is_cancelled=='Cancelled')
    {
        
        //echo "update sr_vip_transaction_history set is_cancelled=1 where transaction_id=".$agreement_id;
        $update_transaction_query = mysql_query("update sr_vip_transaction_history set is_cancelled=1 where transaction_id='$agreement_id'");
        if($update_transaction_query)
        {
            echo 1;
        }
        else
        {
            echo 0;
        }
    }

//    print_r($agreement->getState());
} catch (Exception $ex) {

    print_r($ex);
}

//print_r($cancelAgreementDetails->getState());