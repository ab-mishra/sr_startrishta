<?php  
require "bootstrap.php";

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$payer = new Payer();
$payer->setPaymentMethod("paypal");

$productName="Startrishta Credit Purchase";


$currency = $_POST['currency_code'];
$productAmount = $_POST['amount'];
$credits = $_POST['credits'];
$credit_id = $_POST['credit_id'];
$sku = 'srcredit'.$credits;
$decode_key='-Credit';
$param = base64_encode($credit_id.$decode_key);


$item = new Item();
$item->setName($productName)
    ->setCurrency($currency)
    ->setQuantity(1)
    ->setSku($sku)
    ->setPrice($productAmount );
	

$itemList = new ItemList();
$itemList->setItems([$item]);

$details = new Details();
$details->setShipping(0)
    ->setTax(0)
    ->setSubtotal($productAmount );
	
$amount = new Amount();
$amount->setCurrency($currency)
    ->setTotal($productAmount )
    ->setDetails($details);
	
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Startrishta credit purchase-".$credits)
    ->setInvoiceNumber(uniqid());
	
$baseUrl = getBaseUrl();
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/ExecuteCreditAgreement.php?success=true&param=".$param)
    ->setCancelUrl("$baseUrl/ExecuteCreditAgreement.php?success=false");
	
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));

$request = clone $payment;

try {
    $payment->create($apiContext);
}catch (Exception $ex) {
	 print "<pre>";
	print_r($ex);
	print "</pre>";
	exit(1);
}

$approvalUrl = $payment->getApprovalLink();
echo  json_encode(array("url"=>$approvalUrl));


//header("location:".$approvalUrl);
