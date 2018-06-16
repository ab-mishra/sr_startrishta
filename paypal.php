<?php
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_success_url='www.startrishta.com/paypal-success.php'; // Test Paypal API URL
$paypal_cancel_url='www.startrishta.com/paypal-cancel.php'; // Test Paypal API URL
$paypal_id='shilpisingh064-facilitator@gmail.com'; // Business email ID
?>

<body>

<form action='<?php echo $paypal_url; ?>' method='post' name='form'>
<input type='hidden' name='business' value='<?php echo $paypal_id; ?>'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='item_name' value=''>
<input type='hidden' name='item_number' value=''>
<input type='hidden' name='amount' value='1'>
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='currency_code' value='USD'>
<input type='hidden' name='cancel_return' value='<?php echo $paypal_cancel_url;?>'>
<input type='hidden' name='return' value='<?php echo $paypal_success_url;?>'>
<input type="image" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">
</form> 


</body>