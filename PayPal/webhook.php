<?php
ini_set("display_errors",1);
require_once("../classes/user_class.php");
$json = file_get_contents("php://input");
$action = json_decode($json,true);
	if($action['event_type']=='BILLING.SUBSCRIPTION.CANCELLED' && $action['resource_type'] == 'Agreement')
    {
        $action['event_type'];
        $id = $action['resource']['id'];
//		print_r($action->resource);
        $txtfile = "ipn_dir/data_".$id.'_cancelled'.".txt";
        $query = mysql_query("select * from sr_vip_transaction_history where transaction_id='$id'");
        if(!$query)
        {
            die(mysql_error());
        }
        else
        {
            if(mysql_num_rows($query))
            {
                $update_query = mysql_query('update sr_vip_transaction_history set is_cancelled = 1 , updated_on = now()');
                if(!$update_query)
                {
                    die(mysql_error());
                }
            }
        }
    }
    elseif($action['event_type']=='PAYMENT.SALE.PENDING' && $action['resource_type'] == 'sale')
    {
        $action['event_type'];
        $id = $action['resource']['billing_agreement_id'];
//		print_r($action->resource);
        $txtfile = "ipn_dir/data_".$id.'_pending'.".txt";


        $query = mysql_query("select * from sr_vip_transaction_history where transaction_id='$id'");
        if(!$query)
        {
            die(mysql_error());
        }
        else
        {
            if(mysql_num_rows($query))
            {
                /* $update_query = mysql_query('update sr_vip_transaction_history set is_cancelled = 1 , updated_on = now()');
                if(!$update_query)
                {
                    die(mysql_error());
                } */
            }
        }
    }
    else
        {
    $txtfile = "ipn_dir/data_".time().'_transactions'.".txt";
}
	$fh = fopen($txtfile, "a");
fwrite($fh,$json); // Write information to the file
    fclose($fh); // Close the file
	exit;
