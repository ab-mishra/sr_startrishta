<?php


include('../classes/user_class.php');
 $user_id = $_SESSION['user_id'];
$userProfileObj = new User();

  $isVipMember = $userProfileObj ->isVipMember($user_id);
/****************CREDIT TYPE :-

1:get to the top of people search

2:appear more often in kismat connection

3:get seen on the fame reel

4:message 5 more people

5:give virtual gift

6:show you are ready to chat

7:get 150 more votes on kismat connection

*******************/

 

//$defaultCreditAmount='0.1';

$defaultCreditAmount='12.49';

$defaultCredit='550';

$defaultCreditId='10';



$credit_cancel_url=HTTP_SERVER.'credit.php'; // Test Paypal API URL



/*$creditCurrencyHtml = '<select class=" selectpicker show-tick form-control input_box fontawesome-select select-payment credit_payment_currency">';

foreach($currencyArray as $currencyResult){
if($currencyResult['currency_id']==3) {
	if ($defaultCurrency == $currencyResult['currency_id']) $selected11 = 'selected'; else $selected11 = '';

	$creditCurrencyHtml .= '<option class="new-select-a" value="' . $currencyResult['currency_id'] . '" ' . $selected11 . '>

		<a href="javascript:void(0)">&nbsp;' . $currencyResult['icon'] . ' - ' . $currencyResult['currency_name'] . ', ' . $currencyResult['currency'] . '</a>

	</option>';
}
						

}	

$creditCurrencyHtml .= '</select>';

$creditCurrencyHtml = '<input type="text"  readonly class="form-control width100" value="$ - US Dollars, USD" />';*/



$creditResponseHtml = '<select class=" selectpicker show-tick form-control input_box fontawesome-select select-payment credit_payment_total">';



$query =mysql_query("SELECT f.id,f.price, c.credit FROM sr_credits c, sr_credit_fee f WHERE c.id=f.credit AND f.currency='".$defaultCurrency."' AND f.status=1");
$addText = '';
while($result=mysql_fetch_assoc($query)){

	if($defaultCreditId == $result['id']) $selected12='selected'; else $selected12='';

	$creditResponseHtml .= '<option class="new-select-a" value="'.$result['id'].'" '.$selected12.'>';
	$creditResponseHtml .= '<a href="javascript:void(0)">';
	if($result['price'] == '24.99')
	{ 
		$addText = '<b style="color:red !important;">*Best Value*</b>';
	}
	else
	{ 
		$addText = ''; 
	}
	$creditResponseHtml .= $addText.'&nbsp;&nbsp;'.$defaultCurrencyIcon.' '.$result['price'].' - '.$result['credit'].' credits';
	$creditResponseHtml .= '</a>';
	$creditResponseHtml .= '</option>';		

	}

$creditResponseHtml .= '</select>';

$paypalDiv ='

		<h4 class="dark-blue font-15 margin-t20 align-c">

			<b><span style="color:#8e9597;">This service costs </span>100 credits.</b>

		</h4>

		<h4 class="dark-blue font-15  margin-t10 margin-b10 align-c">

			<b>Top up now &#45; the more credits you buy, the cheaper they are:</b>

		</h4>

		<br>

		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="form-group m-selectbox">'.$creditCurrencyHtml.'</div>

			</div>

		</div>

		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="clearfix form-group m-selectbox responseCreditPayment">'.$creditResponseHtml.'</div>

			</div>

		</div>	

		<!--<div class="relative padding-l10 padding-r10 margin-b20">

			<div class="pull-left margin-b15 margin-r5">

				<input id="visitorCheckbox-10" class="visitorCheckbox my-check m-check" type="checkbox" value="10" name="visitorCheckbox" checked />

				<label class="my-label m-label" for="visitorCheckbox-10">

					<span class="pull-left"></span>

				</label>

			</div>

			<span class="p_popup">
			Top up my Credits automatically when my balance falls below 200 credits. If you do not want to enable Auto Top-up please uncheck the box.
				<span class="help_icon">
					<a href="javascript:void(0);">
						<img src="images/icon-help-green.png" width=" " height=" " alt="help" />
					</a>

					<div class="help_text margin_l90">
						Your Startrishta credits will be topped up with the same amount
						using the payment method  you originally used to buy this service 
						when you reach 200 credits. You can change your Auto Top-up 
						settings at anytime in your <br /> <a href="profile-setting.php" class="color-green">payment settings.</a>
					</div>
				</span>
			</span>
		</div>-->

		<form action='.$paypal_url.' method="post" name="form" onsubmit="return validateCreditPayment();">

			<input type="hidden" name="business" value='.$paypal_id.'>

			<input type="hidden" name="image_url" value="'.SITEURL.'images/sr-logo-150.png" />

			<input type="hidden" name="cmd" value="_xclick">

			<input type="hidden" name="item_name" value="Credit">

			<input type="hidden" name="item_number" value="">

			<input type="hidden" name="amount" class="credit_amount" value='.$defaultCreditAmount.'>

			<input type="hidden" name="no_shipping" value="1">

			<input type="hidden" name="currency_code" class="currency_code" value="USD">

			<input type="hidden" name="cancel_return" value='.$credit_cancel_url.'>

			<input type="hidden" name="return" class="credit_return" value="">

			<button type="submit" name="submit" class="pay-btn margin-l150" value="" 
			style="width: 112px;cursor: pointer;border-radius: 59px; border: none;"></button>

		</form>

		<br>';



$paypalFooter = '<div class="pay-footer">

		<hr>

		<p class="footer"><span class="paypal-foot-msg">You will be charged '.$defaultCurrencyIcon.' '.$defaultCreditAmount.' by PayPal. </span>   
		<a href="javascript:void(0)" data-toggle="modal" data-target="#credit_service_condition" class="color-green"> Service conditions</a></p>

	</div>';

	

$creditHtml = '

	<div class="vip-right-box-1">

		<br>

		<h4 class="dark-blue"><b>Do more with Credits </b> </h4>

		<ul class="margin-t15">

			<li>

				<a href="javascript:void(0)"><img src="images/icon-8.png" width=" " height=" " alt="message" /><span class="width-80r">Get to the top of People Search &nbsp;<i class="fa fa-caret-right"></i></span></a>

				<ul class="benefits_details">

					<li>Promote your profile to first place in search results for your area</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon-7.png" width=" " height=" " alt="like" /><span class="width-80r">Apper more often in Kismat Connection &nbsp;<i class="fa fa-caret-right"></i></span></a>

				<ul class="benefits_details">

					<li>Get 100 more priority displays in Kismat Connection to increase your chances of other people liking you</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon-6.png" width=" " height=" " alt="H. people" />&nbsp; Get seen on the Fame Reel &nbsp;<i class="fa fa-caret-right"></i></a>

				<ul class="benefits_details">

					<li>Appear on the Fame Reel at the top of the page & let other Startrishta users notice you quicker</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon-5.png" width=" " height=" " alt="favorite" />&nbsp; Message 5 more People  &nbsp;<i class="fa fa-caret-right"></i> </a>

				<ul class="benefits_details">

					<li>Initiate conversations with 5 new people</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon-gift.png" width=" " height=" " alt="stealth" />&nbsp; Give Virtual Gifts  &nbsp;<i class="fa fa-caret-right"></i> </a>

				<ul class="benefits_details">

					<li>Get someone\'s attention instantly by giving them a gift</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon-hi.png" width=" " height=" " alt="chat" />&nbsp; Show you are ready to chat  &nbsp;<i class="fa fa-caret-right"></i> </a>

				<ul class="benefits_details">

					<li>Get featured on the main chat window when users in your area check their messages</li>

				</ul>

			</li>

			<li>

				<a href="javascript:void(0)"><img src="images/icon150.png" width=" " height=" " alt="votes" /><span class="width-80r"> Get 150 more votes on Kismat Connection &nbsp;<i class="fa fa-caret-right"></i></span> </a>

				<ul class="benefits_details">

					<li>Like even more people on Kismat Connection and increase your chances of getting a match</li>

				</ul>

			</li>

		</ul>

	</div>';

		

$creditDiv='

	<div class="vip-container1">

		<h4 class="dark-blue font-15 margin-t20 align-c">

			<b><span style="color:#8e9597;">This service costs </span>100 credits.</b>

		</h4>

		<h4 class="dark-blue font-15  margin-t10 margin-b10 align-c">

		<b>Top up now &#45; the more credits you buy, the cheaper they are:</b>

		</h4>

		<br>
		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="form-group m-selectbox">'.$creditCurrencyHtml.'</div>

			</div>

		</div>

		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="clearfix form-group m-selectbox responseCreditPayment">'.$creditResponseHtml.'</div>

			</div>

		</div>

		<div class="align-c margin-r20 norton">

			<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>

		</div>

	</div>

	<div class="pay-footer">

		<hr>
		<p class="footer"><p class="footer"><span class="paypal-foot-msg">You will be charged '.$defaultCurrencyIcon.' '.$defaultCreditAmount.' by PayPal. </span>   <a href="javascript:void(0)" data-toggle="modal" data-target="#credit_service_condition" class="color-green"> Service conditions</a></p>

	</div>';	

	

	$creditFullDiv ='

	<div class="vip-container1">

		<h4 class="dark-blue font-15 margin-t20 align-c">

			<b><span style="color:#8e9597;">This service costs </span>100 credits.</b>

		</h4>

		<h4 class="dark-blue font-15  margin-t10 margin-b10 align-c">

		<b>Top up now &#45; the more credits you buy, the cheaper they are:</b>

		</h4>

		<br>
		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="form-group m-selectbox">'.$creditCurrencyHtml.'</div>

			</div>

		</div>

		<div class="relative">

			<div class="filter1 margin-l50 margin-r60 margin-b15">

				<div class="clearfix form-group m-selectbox responseCreditPayment">'.$creditResponseHtml.'</div>

			</div>

		</div>

		<!--<div class="relative padding-l10 padding-r10 margin-b20">
			<div class="pull-left margin-b15 margin-r5">
				<input id="visitorCheckbox-10" class="visitorCheckbox my-check m-check" type="checkbox" value="10" name="visitorCheckbox" checked />
				<label class="my-label m-label" for="visitorCheckbox-10">
					<span class="pull-left"></span>
				</label>
			</div>

			<span class="p_popup">Top up my Credits automatically when my balance falls below 200 credits. If you do not want to enable Auto Top-up please uncheck the box.
				<span class="help_icon">
					<a href="javascript:void(0);">
						<img src="images/icon-help-green.png" width=" " height=" " alt="help" />
					</a>

					<div class="help_text margin_l90">
						Your Startrishta credits will be topped up with the same amount
						using the payment method  you originally used to buy this service 
						when you reach 200 credits. You can change your Auto Top-up 
						settings at anytime in your <br /> <a href="profile-setting.php" class="color-green">payment settings.</a>
					</div>
				</span>
			</span>
		</div>-->

		<div class="align-c margin-r20 norton">
			<form action='.$paypal_url.' method="post" name="form" onsubmit="return validateCreditPayment();">

			<input type="hidden" name="business" value='.$paypal_id.'>

			<input type="hidden" name="image_url" value="'.SITEURL.'images/sr-logo-150.png" />

			<input type="hidden" name="cmd" value="_xclick">

			<input type="hidden" name="item_name" value="Credit">

			<input type="hidden" name="item_number" value="">

			<input type="hidden" name="amount" class="credit_amount" value='.$defaultCreditAmount.'>

			<input type="hidden" name="no_shipping" value="1">

			<input type="hidden" name="currency_code" class="currency_code" value="USD">

			<input type="hidden" name="cancel_return" value='.$credit_cancel_url.'>

			<input type="hidden" name="return" class="credit_return" value="">
			
			<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>
			
		</form>

			

		</div>

	</div>

	<div class="pay-footer">

		<hr>

		<p class="footer"><p class="footer"><span class="paypal-foot-msg">
			You will be charged '.$defaultCurrencyIcon.' '.$defaultCreditAmount.' by Card. </span>
				<a href="javascript:void(0)" data-toggle="modal" data-target="#credit_service_condition" class="color-green"> Service conditions</a></p>

	</div>';

?>			

		<div id="credit_payment_popup" class="modal fade login_pop new-vip card-payment-vip" role="dialog" >

			<div class="modal-dialog-vip">

				<div class="modal-content">

					<div>

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal">&times; </button>

							<h3 class="dark-blue padding-r30 font-22">

								<b id="credit-payment-header">Buy Credits to promote your profile on Startrishta today</b>

							</h3>

						</div>

						

						<div class="modal-body">

							<?php echo $creditHtml;?>

							<div class="vip-left-box">

								<ul class="vip-pay">

									<li id="cr_pay">

										<a data-rel="#seven" href="javascript:void(0)"><img src="images/icon1.jpg" width=" " height=" " alt="Credit Card" />Credit Card</a>

									</li>

									<li class="active"  id="pp_pay">

										<a data-rel="#eight"href="javascript:void(0)"><img src="images/icon.jpg" width=" " height=" " alt="Paypal Account"/>Paypal Account</a>

									</li>

								</ul>

								<!--=======================Paypal Account==========================-->

								<div id="eight" class="active_pane vip-left-box-container paypal">

									<div class="vip-container1 new-container">

										<?php echo $paypalDiv;?>
										
										<!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="9F82KC3KYVB82">
<input type="image" src="https://www.paypalobjects.com/en_US/GB/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>-->


									</div>

										<?php echo $paypalFooter;?>

								</div>

								<!--=======================credit card===========================-->

								<div id="seven" class="vip-left-box-container credit-card">

									<?php echo $creditFullDiv;?>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>



		

		<!--==========================================vip pay Credit  009===============================-->

		<div id="credit_payment1" class="modal fade login_pop new-vip" role="dialog" >

			<div class="modal-dialog-vip">

				<div class="modal-content">

					<div>

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal">&times; </button>

							<h3 class="dark-blue padding-r30 font-22"><b>Buy Credits to promote your profile on Startrishta today</b></h3>

						</div>

						<div class="modal-body"><?php echo $creditHtml;?>

							<div class="vip-left-box">

								<ul class="vip-pay">

									<li class="active">

										<a data-rel="#seven"  href="javascript:void(0)"><img src="images/icon1.jpg" width=" " height=" " alt="Credit Card" />Credit Card</a>

									</li>

								</ul>

								<div id="seven" class="active_pane vip-left-box-container credit-card" style="width:96%;">

									<?php echo $creditFullDiv;?>

								</div>

								<!--end of credit card-->

							</div>

							

						</div>

					</div>

				</div>

			</div>

		</div>

		

	<!-- ############### SERVICE AND CONDITIONS ############ -->



		<div id="credit_service_condition" class="modal fade login_pop" role="dialog" >

			<div class="modal-dialog-1">

				<div class="modal-content">

					<div >

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal">&times;</button>

							<h4 class="gray_1"><b>Service Conditions </b></h4>

						</div>

						<div class="modal-body padding-t0">

								<div>

								<p class="gray_1 lato">

									<b>By clicking -Pay- you authorize Startrishta.com Ltd to charge your PayPal or Credit Card account for the amount selected for use on Startrishta and accept the Terms outlined below. You can change your payment method or auto-topup settings at any time in-<a href="profile-setting.php" class="green">payment settings.</a></b>

								</p>

								<p class="gray_1 lato">

									<b>Terms for Startrishta Credits:</b>

								</p>

								<ol class="condition">

									<li>When you purchase or receive credit, you do not own the credits. Rather, you receive a limited right to use such credits for services on Startrishta.</li>

									<li>Purchases of credits are non-refundable.</li>

									<li>Top up works by adding credits to your Startrishta account when it reaches less than 200 credits. You will be recharged with the same amount using the payment method you originally used to buy this service.For example, If you purchased 550 credit and enabled Top up, you will be billed $7.49.You can change your auto top-up anytime in your <a href="profile-setting.php" class="green">payment settings.</a></li>

									<li>We may change the purchase price for credits at any time as well as the ways that you can use credits. We also reserve the right to stop issuing credits.</li>

									<li>Credits are not redeemable for any sum of money or monetary value from us unless we  agree otherwise in writing.</li>

									<li>Unused credits expire after 6 month.</li>

									<li>If you delete your account or if your account is terminated by Startrishta due to breach of our terms and conditions, you will lose any accumulated credits.</li>

									<li>If you receive free or promotional Credits, we may expire them at any time.</li>

								</ol>

								</div>

								<div class="popup_add_photo margin-t20">

									<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red font-16" data-dismiss="modal"> Done </a>

								</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	<!-- ############# SUCCESS MODALS ############## -->	


		<!--================================End Complimentary VIP membership 0011=========================-->

	<?php if(isset($_REQUEST['credit'])){

	    if($isVipMember)
          {
	    ?>

		<div id="credit_congrats_popup" class="modal fade login_pop" role="dialog" >

			<div class="modal-dialog-1">

				<div class="modal-content">

					<div>

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal">&times;</button>

							<h4><b>Congratulations!</b></h4>

						</div>

						<div class="modal-body">

							<form class="login-form">

								<div class="popup_add_photo"></div>

								<div>

									<h5 class="align-c lh-20">

										<b id="credit-congrats-message">

										<?php

										if($_REQUEST['credit']=='1'){

											echo "You've promoted your profile to the top of Startrishta's search results! Enjoy the attention!";

										}
										else if($_REQUEST['credit']=='2'){

											echo "You've added 100 more priority displays in Kismat Connection- enjoy the attention!";

										}
										else if($_REQUEST['credit']=='3'){

											echo "You will be added to the Fame Reel shortly - Enjoy the attention!";

										}
										else if($_REQUEST['credit']=='6'){

											echo "Show that you are Ready to Chat & meet people quicker!";

										}
										else if($_REQUEST['credit']=='success'){

											echo "Congratulations on purchasing your credits!<br/>They will be added to your account shortly.";

										}
										else
										    {

											echo "Congratulations on purchasing your credits!<br/>They will be added to your account shortly.";

										}

										?>

										</b>

									</h5>

								</div>

								<div class="popup_add_photo margin-t20">

									<a href="credit.php" class="btn btn-default padding-lr-40 custom red">Done </a>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

		<?php }
		else
        {
            ?>
            <div id="credit_congrats_popup" class="modal fade login_pop" role="dialog">

                <div class="modal-dialog-1" style="max-width: 670px;width: 670px">

                    <div class="modal-content">

                        <div>

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                <h4 class="gray_1"><b>Congratulations on purchasing your credits!</b></h4>

                            </div>

                            <div class="modal-body new-vip">

                                <div>



                                    <div class="creadits_image creadits_image1 align-c">

                                        <img width=" " height=" " alt="creadits" src="images/vip-big.png">

                                    </div>

                                    <div class="creadits_image_details">

                                        <h4 class="gray_1 lato font-17 l-height-25 margin-t5">

                                            <b>Have you tried subscribing to our VIP package yet?</b>

                                        </h4>

                                        <p class="gray_1 lato font-13">

                                            Upgrade your membership and get these fantastic benefits:

                                        </p>

                                    </div>

                                    <div class="row">

                                        <div class="vip-right-box-1 complimentary">

                                            <ul class="margin-t15">

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-15.png" width=" " height=" " alt="message" /> &nbsp; Message Boost &nbsp;<i class="fa fa-caret-right"></i></a>

                                                        <ul class="benefits_details">

                                                            <li>Get a conversation started quicker by having all you messages read first</li>

                                                        </ul>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-14.png" width=" " height=" " alt="like" />  &nbsp; See who likes you &nbsp;<i class="fa fa-caret-right"></i></a>

                                                        <ul class="benefits_details">

                                                            <li>Check out who likes you on Kismat Connection and message them straight away</li>

                                                        </ul>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-13.png" width=" " height=" " alt="H. people" /> &nbsp; Talk to the Hottest People &nbsp;<i class="fa fa-caret-right"></i></a>

                                                        <ul class="benefits_details">

                                                            <li>Chat with the most popular members on Startrishta whose reputations are Very Hot</li>

                                                        </ul>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-12.png" width=" " height=" " alt="favorite" /> &nbsp; See who has added you as a Favorite  &nbsp;<i class="fa fa-caret-right"></i> </a>

                                                        <ul class="benefits_details">

                                                            <li>Find out who has added your profile to their favorites list and get in touch with them</li>

                                                        </ul>

                                                    </li>

                                                </div>

                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">



                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-11.png" width=" " height=" " alt="stealth" /> &nbsp; Stealth Mode  &nbsp;<i class="fa fa-caret-right"></i> </a>

                                                        <ul class="benefits_details">

                                                            <li>Become invisible when visiting other people's profiles to browse in private </li>

                                                        </ul>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-10.png" width=" " height=" " alt="customisation" /> &nbsp; Profile Customisation  &nbsp;<i class="fa fa-caret-right"></i> </a>

                                                        <ul class="benefits_details">

                                                            <li>Upgrade your profile with a variety of great wallpapers to show off with</li>

                                                        </ul>

                                                    </li>

                                                    <li>

                                                        <a href="javascript:void(0)"><img src="images/icon-9.png" width=" " height=" " alt="chat" />  &nbsp; Chat to New Members First &nbsp;<i class="fa fa-caret-right"></i></a>



                                                        <ul class="benefits_details">

                                                            <li>Get a headstart on everyone else by being able to message newest Startrishta Members first</li>

                                                        </ul>

                                                    </li>

                                                </div>

                                            </ul>

                                        </div>

                                    </div>

                                </div>

                                <div class="popup_add_photo margin-t20">

                                    <form method="post" name="form" id="vip_form_offer" onsubmit="return false;">
                                        <input type="hidden" name="logoimg" value="https://www.startrishta.com/beta-dev/images/sr-logo-150.png">
                                        <input type="hidden" name="image_url" value="https://www.startrishta.com/beta-dev/images/sr-logo-150.png">
                                        <input type="hidden" name="business" value="imran@startrishta.com">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="item_name" value="VIP">
                                        <input type="hidden" name="item_number" value="">
                                        <input type="hidden" name="amount" class="amount" value="14.99" required="">
                                        <input type="hidden" name="duration" class="duration" value="2" required="">
                                        <input type="hidden" name="no_shipping" value="1">
                                        <input type="hidden" name="currency_code" class="currency_code" value="USD" required="">
                                        <input type="hidden" name="cancel_return" value="https://www.startrishta.com/vip.php">
                                        <input type="hidden" name="return" class="return" value="">

                                    <a href="javascript:void(0)" id="submit_btn_vip_offer" class="btn btn-default padding-lr-40 custom red font-16"> <img src="images/icon-v.png" width=" " height=" " alt=" " />Purchase one month VIP subscription</a>
                                    </form>

                                </div>

                                <div class="pay-footer clearfix">

                                    <p class="footer margin-t30 margin-b15">

                                        You will be charged &pound;7.49 via PayPal.

                                        <a class="color-green" href="javascript:void(0)">Service conditions</a>

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <?php
        }
    }
		?>

		<div id="credit_payment_congrats_popup" class="modal fade login_pop" role="dialog" >

			<div class="modal-dialog-1">

				<div class="modal-content">

					<div>

						<div class="modal-header">

							<button type="button" class="close" data-dismiss="modal">&times;</button>

							<h4><b>Congratulations!</b></h4>

						</div>

						<div class="modal-body">

							<form class="login-form">

								<div class="popup_add_photo"></div>

								<div>

									<h5 class="align-c lh-20">

										<b id="credit-congrats-message"></b>

									</h5>

								</div>

								<div class="popup_add_photo margin-t20">

									<a href="" class="btn btn-default padding-lr-40 custom red">Done </a>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

<script>
$(document).ready(function(){

	//#############################################################

	//$("#credit_congrats").modal("show");

	var credit_for='credit';

	var defaultCreditId='<?php echo $defaultCreditId;?>';

	var http_path='<?php echo HTTP_SERVER;?>';

	$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

	//#########################RAISING PROFILE(PROFILE VISITOR)#############################

		$('.go-credit-raising-profile').on('click', function(){
			var userCredit='<?php echo $userCredit;?>';
			credit_for='1';

			$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

			if(userCredit <100){

				$('#credit-payment-header').html("Get to the top of Startrishta's search results and enjoy maximum attention!");

				$('#credit_payment_popup').modal('show');

			}else{

				$.ajax({

					type:"POST",

					url:"ajax/credit.php",

					data:{action:'raising_your_profile' , credit_for:credit_for},

					success:function(result){
						if(result == 1){

							$('#credit-congrats-message').html("You've promoted your profile to the top of Startrishta's search results - Enjoy the attention!");
	
							$('#credit_payment_congrats_popup').modal('show');

							return false;

						}if(result == 0){

							$('#credit-payment-header').html("Get to the top of Startrishta's search results and enjoy maximum attention!");

							$('#credit_payment_popup').modal('show');

						}

						else{

							$('#error_message_header').html('Alert');

							$('#error_message').html('Problem in network.please try again.');

							$('#alert_modal').modal('show');

						}

					}

				});

				return false;

			}
	});

	//#########################APPEAR MORE ON KISMAT CONNECTION#########################

		$('.go-credit-appear-kc').click(function(){

			var userCredit='<?php echo $userCredit;?>';

			credit_for='2';

			$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

			if(userCredit <100){

				$('#credit-payment-header').html("Add 100 more Priority Displays in Kismat Connection & increase your chances of a match!");

				$('#credit_payment_popup').modal('show');

			}else{

				$.ajax({

					type:"POST",

					url:"ajax/credit.php",

					data:{action:'ready_to_chat' , credit_for:credit_for},

					success:function(result){

						if(result == 1){

							$('#credit-congrats-message').html("You've added 100 more priority displays in Kismat Connection- enjoy the attention!");

							$('#credit_payment_congrats_popup').modal('show');

						}else if(result == 0){

							$('#credit-payment-header').html("Add 100 more Priority Displays in Kismat Connection & increase your chances of a match!");

							$('#credit_payment_popup').modal('show');

						}

						else{

							$('#error_message_header').html('Alert');

							$('#error_message').html('Problem in network.please try again.');

							$('#alert_modal').modal('show');

						}

					}

				});

				return false;

			}

		});

	//#########################GET ME HERE(HEADER)##########################################
	$(document).ready(function(){
		$('.go-credit-get-me-here').click(function(){

			if($(this).attr("id")== "profile_null_gmh") {
				return false;
			}

			var userCredit='<?php echo $userCredit;?>';

			credit_for='3';

			$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

			if(userCredit < 150){

				$('#credit-payment-header').html("Appear on the Fame Reel and get instantly seen by new people in your area!");

				$('#credit_payment_popup').modal('show');

			}else{

				$.ajax({

					type:"POST",

					url:"ajax/credit.php",

					data:{action:'get_me_here' , credit_for:credit_for},
					
					success:function(result){

						if(result == 1){

							$('#credit-congrats-message').html("You will be added to the Fame Reel for 12 hours – Enjoy the attention!");
							
							$('#credit_payment_congrats_popup').modal('show');

						}else if(result == 0){

							$('#credit-payment-header').html("Appear on the Fame Reel for instant exposure to new people in your area!");

							$('#credit_payment_popup').modal('show');

						}

						else{

							$('#error_message_header').html('Alert');

							$('#error_message').html('Problem in network.please try again.');

							$('#alert_modal').modal('show');

						}

					}

				});

				return false;

			}

		});
	});

		

	//#########################I AM READY TO CHAR(MY MESSAGE POPUP)#########################

		$('.go-credit-ready-to-chat').click(function(){

			var userCredit='<?php echo $userCredit;?>';

			credit_for='6';

			$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

			if(userCredit <100){

				$('#credit-payment-header').html("Show others you are ready to chat & meet people quicker!");

				$('#credit_payment_popup').modal('show');

			}else{

				$.ajax({

					type:"POST",

					url:"ajax/credit.php",

					data:{action:'ready_to_chat' , credit_for:credit_for},

					success:function(result){

						if(result == 1){

							$('#credit-congrats-message').html("You will appear here shortly for other people to see.");

							$('#credit_payment_congrats_popup').modal('show');

						}else if(result == 0){

							$('#credit-payment-header').html("Show others you are ready to chat & meet people quicker!");

							$('#credit_payment_popup').modal('show');

						}

						else{

							$('#error_message_header').html('Alert');

							$('#error_message').html('Problem in network.please try again.');

							$('#alert_modal').modal('show');

						}

					}

				});

				return false;

			}

		});

	//############################GIFT#####################################################

	$('#give_gift').click(function(){

		var userCredit='<?php echo $userCredit;?>';

		credit_for='5';

		$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+defaultCreditId+'&credit='+credit_for);

		if(userCredit < 100){

			$('#credit-payment-header').html("Give a gift to get their attention!");

			$('#credit_payment_popup').modal('show');

			return false;

		}else{

			var user_id=gift_user_id;

			var gift_id=$('#gift_id').val();

			var gift_msg=$('#gift_msg').val();

			if($("#private").prop('checked') == true){

				var private_gift = 1;

			}else {

				var private_gift = 0 ;

			}

			if(gift_id == ''){

				$('#error_message').html('Please select a gift.');

				$('#alert_modal').modal('show');

				return false;

			}

			$('#preloader').show();

			$.ajax({

				type:"POST",

				url:"ajax/other-profile.php",

				data:{gift_user_id : user_id , gift_id:gift_id ,gift_msg:gift_msg,private_gift:private_gift,action : 'giveGiftToUser'},

				success:function(result){
					//alert(result);
					//return false;

					$('#preloader').hide();

					$('#gift-modal').modal('hide');

					if(result == 1){

						$('.gift_box').children('a').css('border', ''); 

						$('.gift_box').children('a').css('padding', '5px'); 

						$('#gift_id').val('');

						$('#gift_msg').val('');

						$("#private").attr('checked', false);

						$('#gift-success-modal').modal('show');

					}else if(result == 0){

						$('#error_message_header').html('Alert');

						$('#error_message').html('Problem in network.please try again.');

						$('#alert_modal').modal('show');

					}

				}

			});

		}

		return false;

	});

	//########################INCREASE MY REPUTATION(LEFT SIDE)#############################

		$('#increase-my-reputation').click(function(){

			var val=''

			$('.rep_checkbox:checked').each(function(){

				val = $(this).val();

			});

			if(val == ''){

				$('#error_message_header').html('Alert');

				$('#error_message').html('Please select an option first');

				$('#alert_modal').modal('show');

				return false;

			}

			else if(val == 'get-me-here'){

				$('.go-credit-get-me-here').click();

			}

			else if(val == 'appear-kc'){

				$('.go-credit-appear-kc').click();

			}

			else if(val == 'raising-profile'){

				$('.go-credit-raising-profile').click();

			}

			$('#increaseReputation').modal('hide');

		

		});

	

	//##########################CREDIT OPTIONS ON POP UP

		$('.credit_payment_currency').change(function(){

			var currency_id=$(this).val();

			$('#preloader').show();

			$.ajax({

				type:"POST",

				url:"ajax/credit.php",

				data:{action:'getCreditInfo' , currency_id:currency_id},

				success:function(result){

					//alert(result);

					$('.responseCreditPayment').html(result);

					$('.select-payment').selectpicker();

					$(".credit_amount").val('');

				}

			});

			$('#preloader').hide();

			return false;

		});

		

		$('.credit_payment_total').live('change' , function(){

			var credit_id = $(this).val();

			$('#preloader').show();

			$.ajax({

				type:"POST",

				url:"ajax/credit.php",

				dataType:"json",

				data:{action:'getCreditPayment' , credit_id:credit_id},

				success:function(result){

					$(".credit_amount").val(result[0]);

					$(".credit_return").val(http_path+'paypal-credit-success.php?ID='+credit_id+'&credit='+credit_for);

					$(".currency_code").val(result[1]);

					$(".paypal-foot-msg").html('You will be charged '+result[2]+' '+result[0]+' by PayPal.');

				}

			});

			$('#preloader').hide();

			return false;

	});

    $("#submit_btn_vip_offer").click(function () {
           //e.preventDefault();
        var formdata = $('#vip_form_offer').serialize();
        $("#preloader").css({"display":"block",  "z-index":"99999"});
        $.ajax({
            type:"POST",

            url:"PayPal/agreement.php",

            data:formdata,

            success:function(result){
                var duce = jQuery.parseJSON(result);
                //console.log(duce);
                $.each(duce, function(i,val) {
                    if(val.rel === 'approval_url')
                    {
                        //alert(val.href);
                        window.location = val.href;
                    }

                    console.log(i+val);
                });
                //console.log(result);
            }
        });
    });

});

function validateCreditPayment(){

		if($(".credit_amount").val() == ''){

			$('#error_message_header').html('Alert');

			$('#error_message').html('Please select credit.');

			$('#alert_modal').modal('show');

		return false;

		}

	}

</script>