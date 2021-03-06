<?php
session_start();
require_once("../classes/user_class.php");

// # Create Plan Sample
//
// This sample code demonstrate how you can create a billing plan, as documented here at:
// https://developer.paypal.com/webapps/developer/docs/api/#create-a-plan
// API used: /v1/payments/billing-plans
require 'bootstrap.php';
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;

$amount = $_REQUEST['amount'];
        if(!isset($_REQUEST['duration'])){
            $billing_duration=3;
        }
        else {
            $billing_duration = $_REQUEST['duration'];
        }
if($billing_duration==1)
{
    //Weekly
    $frequency ="week";
    $frequencyInterval = "1";
    $cycles= "48";
}
elseif($billing_duration==2)
{
    //Monthly
    $frequency ="Month";
    $frequencyInterval = "1";
    $cycles= "12";
}
elseif($billing_duration==3)
{
    //Quarterly
    $frequency ="Month";
    $frequencyInterval = "3";
    $cycles= "4";
}
elseif($billing_duration==4)
{
    //HalfYear
    $frequency ="Month";
    $frequencyInterval = "6";
    $cycles= "2";
}
$decode_key='-Vip';
        $param = base64_encode($billing_duration.$decode_key);
//$billing_type = $_REQUEST['type'];
//$billing_frequency = $_REQUEST['frequency'];

// Create a new instance of Plan object
$plan = new Plan();
// # Basic Information
// Fill up the basic information that is required for the plan
$plan->setName('Startrishta VIP Subsciption')
    ->setDescription('Startrishta VIP Subsciption Recurring Payments')
    ->setType('fixed');
// # Payment definitions for this billing plan.
$paymentDefinition = new PaymentDefinition();
// The possible values for such setters are mentioned in the setter method documentation.
// Just open the class file. e.g. lib/PayPal/Api/PaymentDefinition.php and look for setFrequency method.
// You should be able to see the acceptable values in the comments.
// Charge Models
$paymentDefinition->setName('Regular Payments')
    ->setType('REGULAR')
    ->setFrequency($frequency)
    ->setFrequencyInterval($frequencyInterval)
    ->setCycles($cycles)
    ->setAmount(new Currency(array('value' => $amount, 'currency' => 'USD')));
$chargeModel = new ChargeModel();
$chargeModel->setType('SHIPPING')
    ->setAmount(new Currency(array('value' => 0, 'currency' => 'USD')));
$paymentDefinition->setChargeModels(array($chargeModel));
$merchantPreferences = new MerchantPreferences();
$baseUrl = getBaseUrl();
// ReturnURL and CancelURL are not required and used when creating billing agreement with payment_method as "credit_card".
// However, it is generally a good idea to set these values, in case you plan to create billing agreements which accepts "paypal" as payment_method.
// This will keep your plan compatible with both the possible scenarios on how it is being used in agreement.
$merchantPreferences->setReturnUrl("$baseUrl/ExecuteAgreement.php?success=true&param=".$param)
    ->setCancelUrl("$baseUrl/ExecuteAgreement.php?success=false")
    ->setAutoBillAmount("yes")
    ->setInitialFailAmountAction("CONTINUE")
    ->setMaxFailAttempts("0");
    //->setSetupFee(new Currency(array('value' => 1, 'currency' => 'USD')));
$plan->setPaymentDefinitions(array($paymentDefinition));
$plan->setMerchantPreferences($merchantPreferences);
// For Sample Purposes Only.
$request = clone $plan;
// ### Create Plan
try {
    $output = $plan->create($apiContext);
} catch (Exception $ex) {
    // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
    ResultPrinter::printError("Created Plan", "Plan", null, $request, $ex);
    exit(1);
}
// NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
//ResultPrinter::printResult(     "Created Plan", "Plan", $output->getId(), $request, $output);
return $output;