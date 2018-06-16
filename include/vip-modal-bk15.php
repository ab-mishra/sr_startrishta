<?php
 
$defaultAmount='34.99';
$defaultCurrency = '3';
$defaultCurrencyIcon = '&#36;';
$defaultDuration= '3 Months';
$defaultVipId='11';

$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='rinku593-facilitator@gmail.com'; // Business email ID

//$paypal_success_url='http://vibescomm.in/wip_projects/development/startrishta/paypal-success.php'; // Test Paypal API URL
$paypal_cancel_url='http://vibescomm.in/wip_projects/development/startrishta/vip.php'; // Test Paypal API URL

$currencyHtml ='<select class=" selectpicker show-tick form-control input_box fontawesome-select payment_currency">';

foreach($currencyArray as $currencyResult){
if($defaultCurrency == $currencyResult['currency_id']) $selected1='selected'; else $selected1='';
	$currencyHtml .= '<option class="new-select-a" value="'.$currencyResult['currency_id'].'" '.$selected1.'>
						<a href="javascript:void(0)">&nbsp;'.$currencyResult['icon'].' - '.$currencyResult['currency_name'].', '.$currencyResult['currency'].'</a>
					</option>';
						
}	
$currencyHtml .= '</select>';

/*$responseHtml = '<span class="input_box fontawesome-select select-payment">&nbsp;&nbsp; '.$defaultDuration.' at '.$defaultCurrencyIcon.' '.$defaultAmount.'</span>
					<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
					<div class="clearfix"></div>
					<select class="p_locations clearfix fontawesome-select credit-payment-options">';*/
					

$query =mysql_query("SELECT f.id,f.price, d.duration FROM sr_vip_duration d, sr_vip_fee f WHERE d.duration_id=f.duration AND f.currency='".$defaultCurrency."'");

$responseHtml = '<select class="selectpicker show-tick form-control input_box fontawesome-select select-payment payment_total">';
while($result=mysql_fetch_assoc($query)){
if($defaultVipId == $result['id']) $selected2='selected'; else $selected2='';
$responseHtml .= '<option class="new-select-a p_location" value="'.$result['id'].'" '.$selected2.'>
					<a href="javascript:void(0)"> '.$result['duration'].' at '.$defaultCurrencyIcon.' '.$result['price'].' - '.$defaultCurrencyIcon.' '.$result['price'].' total</a>
				</option>';
					
}
$responseHtml .= '</select>';

$paypalDiv ='
	<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
		<br>
		<div class="relative">
			<div class="filter1 margin-l90 margin-r100 margin-b15">
				<div class="form-group m-selectbox">'.$currencyHtml.'</div>
			</div>
		</div>
		
		<div class="relative">
			<div class="filter1 margin-l90 margin-r100 margin-b15">
				<div class="clearfix form-group m-selectbox responsePayment">'.$responseHtml.'</div>
			</div>
		</div>	
		<form action='.$paypal_url.' method="post" name="form" onsubmit="return validateVipPayment();">
			<input type="hidden" name="business" value='.$paypal_id.'>
			<input type="hidden" name="cmd" value="_xclick">
			<input type="hidden" name="item_name" value="">
			<input type="hidden" name="item_number" value="">
			<input type="hidden" name="amount" class="amount" value='.$defaultAmount.' required>
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="currency_code" class="currency_code" value="USD" required>
			<input type="hidden" name="cancel_return" value='.$paypal_cancel_url.'>
			<input type="hidden" name="return" class="return" value="">
			<button type="submit" name="submit" class="pay-btn margin-l150" value="" style="width: 112px;cursor: pointer;border-radius: 59px; border: none;"></button>
		</form>
		<br>';

$paypalFooter = '<div class="pay-footer">
		<hr>
		<p class="footer"><span class="paypal-foot-msg"></span> <a href="javascript:void(0)" data-toggle="modal" data-target="#vip_service_condition" class="color-green">Service conditions</a></p>
	</div>';
	
	
$creditDiv='
	<div class="vip-container1">
		<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
		<br>
		<div class="relative">
			<div class="filter1 margin-l90 margin-b15">
				<div class="form-group">
					<input class="ploc_input" type="hidden" value="">
					<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
					<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
					<div class="clearfix"></div>
					<ul class="p_locations clearfix fontawesome-select">
						<li class="p_location">
							<a href="javascript:void(0)">
								  &nbsp; &#xf156; Indian Rupee
							</a>
						</li>
						<li class="p_location">
							<a href="javascript:void(0)">
								  &nbsp; &#xf155; US Dollar
							</a>
						</li>
						<li class="p_location">
							<a href="javascript:void(0)">
								 &nbsp; &#163; GBP
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="relative">
			<div class="filter1 margin-l90 margin-b15">
				<!--new-->
				<div class="form-group">
					<input class="ploc_input" type="hidden" value="">
					<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
					<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
					<div class="clearfix"></div>
					<ul class="p_locations clearfix fontawesome-select">
						<li class="p_location">
							<a href="javascript:void(0)">
								  &nbsp; &#xf156; Indian Rupee
							</a>
						</li>
						<li class="p_location">
							<a href="javascript:void(0)">
								  &nbsp; &#xf155; US Dollar
							</a>
						</li>
						<li class="p_location">
							<a href="javascript:void(0)">
								 &nbsp; &#xf155; US Dollar
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>	
		<div class="align-c margin-r20 norton">
			<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>
		</div>
	</div>
	<div class="pay-footer">
		<hr>
		<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="javascript:void(0)" class="color-green">Service conditions</a></p>
	</div>';	
	$vipBenefiltsHtml = '
	<div class="vip-right-box-1">
		<br>
		<h4 class="dark-blue"><b>VIP Member Benefits </b> </h4>
		
		<ul class="margin-t15">
			<li>
				<a href="javascript:void(0)"><img src="images/icon-15.png" width=" " height=" " alt="message" /><span class="width-80r">Message Boost &nbsp;<i class="fa fa-caret-right"></i></span></a>
				<ul class="benefits_details">
					<li>Get a conversation started quicker by having all you messages read first</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)"><img src="images/icon-14.png" width=" " height=" " alt="like" />  &nbsp; See who likes you &nbsp;<i class="fa fa-caret-right"></i></span> </a>
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
				<a href="javascript:void(0)"><img src="images/icon-12.png" width=" " height=" " alt="favorite" /> &nbsp; Added as a Favorite  &nbsp;<i class="fa fa-caret-right"></i> </a>
				<ul class="benefits_details">
					<li>Find out who has added your profile to their favorites list and get in touch with them</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)"><img src="images/icon-11.png" width=" " height=" " alt="stealth" /> &nbsp; Stealth Mode  &nbsp;<i class="fa fa-caret-right"></i> </a>
				<ul class="benefits_details">
					<li>Become invisible when visiting other people\'s profiles to browse in private </li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)"><img src="images/icon-10.png" width=" " height=" " alt="customisation" /> &nbsp; Profile Customisation  &nbsp;<i class="fa fa-caret-right"></i> </a>
				<ul class="benefits_details">
					<li>Upgrade your profile with a variety of great wallpapers to show off with</li>
				</ul>
			</li>
			<li>
				<a href="javascript:void(0)"><img src="images/icon-9.png" width=" " height=" " alt="chat" />  &nbsp; Chat to New Members First &nbsp;<i class="fa fa-caret-right"></i></span> </a>
				
				<ul class="benefits_details">
					<li>Get a headstart on everyone else by being able to message newest Startrishta Members first</li>
				</ul>
			</li>
			
		</ul>
	</div>';
?>
<!--<input type="hidden" class="payment_currency_hidden"  value="" >
<input type="hidden" class="payment_total_hidden"  value="" >-->
<!--================================vip pay 05=========================-->
		 <?php /*<div id="vip_payment_28012016" class="modal fade login_pop new-vip" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times; </button>
							<h3 class="dark-blue padding-r30 font-22"><b>Become a VIP member and get unrestricted access on Startrishta to meet people faster!</b></h3>
						</div>
						<div class="modal-body">
							<?php echo $vipBenefiltsHtml;?>
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#seven"  href="javascript:void(0)"><img src="images/icon1.jpg" width=" " height=" " alt="Credit Card" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#eight" href="javascript:void(0)"><img src="images/icon.jpg" width=" " height=" " alt="Paypal Account"/>Paypal Account</a>
									</li>
								</ul>
							<!--=======================Paypal Account==========================-->
								<div id="eight" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
										<!--<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>-->
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
										<br>
										<!--<p class="margin-t50 align-c text-normal text-13"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
										<p class="align-c text-normal text-13">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>-->
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="javascript:void(0)" data-toggle="modal" data-target='#vip_service_condition' class="color-green">Service conditions</a></p>
									</div>
								</div>
								
							<!--=======================credit card===========================-->
								<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="javascript:void(0)" data-toggle="modal" data-target='#vip_service_condition' class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
<!--================================End vip pay	Paypal 06=========================-->
	<div id="vip_onclick_paypal" class="modal fade login_pop new-vip" role="dialog" >
		<div class="modal-dialog-vip">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times; </button>
						<h3 class="dark-blue padding-r30 font-22"><b>Become a VIP member and get unrestricted access on Startrishta to meet people faster!</b></h3>
					</div>
					<div class="modal-body">
						<?php echo $vipBenefiltsHtml;?>
						<div class="vip-left-box">
							<ul class="vip-pay">
								<li class="active">
									<a data-rel="#eight" href="javascript:void(0)"><img src="images/icon.jpg" width=" " height=" " alt="Paypal Account"/>Paypal Account</a>
								</li>
							</ul>
							<div id="eight" class="active_pane vip-left-box-container paypal">
								<div class="vip-container1">
										<?php echo $paypalDiv;?>
									</div>
										<?php echo $paypalFooter;?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--==========================================vip pay Credit 07===============================-
	<div id="vip_onclick_credit" class="modal fade login_pop new-vip" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times; </button>
							<h3 class="dark-blue padding-r30 font-22"><b>Become a VIP member and get unrestricted access on Startrishta to meet people faster!</b></h3>
						</div>
						
						<div class="modal-body">
							<?php echo $vipBenefiltsHtml;?>
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li class="active">
										<a data-rel="#seven"  href="javascript:void(0)"><img src="images/icon1.jpg" width=" " height=" " alt="Credit Card" />Credit Card</a>
									</li>
								</ul>
								<div id="seven" class="active_pane vip-left-box-container credit-card">
									<?php echo $creditDiv;?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div> */ ?>
<!--================================vip pay upgrade 08=========================-->
		<div id="vip-payment-popup" class="modal fade login_pop new-vip card-payment-vip" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times; </button>
							<h3 class="dark-blue padding-r30 font-22"><b id="vip-payment-header">Become a VIP member and get unrestricted access on Startrishta to meet people faster!</b></h3>
						</div>
						
						<div class="modal-body">
							<?php echo $vipBenefiltsHtml;?>
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
									</div>
										<?php echo $paypalFooter;?>
								</div>
								<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#163; GBP
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>
										
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										
										
										<!--===================-->		
										<div class="relative">
											<ul class="debit-card margin-r40 clearfix">
												<li><a href="javascript:void(0);"><img src="images/creadit-card1.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card2.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card3.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card4.png" width=" " height=" " alt="card" /></a></li>
											</ul>
												<div class="form-group margin-t20">
													<label>Card Number:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Name on the card:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Expiry date:</label>
													<select class="month">
														<option>Jan</option>
														<option>Feb</option>
														<option>jan</option>
														<option>Mar</option>
														<option>Apr</option>
														<option>May</option>
														<option>Jun</option>
														<option>Jul</option>
														<option>Aug</option>
														<option>Sep</option>
														<option>Oct</option>
														<option>Nov</option>
														<option>Dec</option>
													</select>
													
													<select class="year">
														<option>2015</option>
														<option>2016</option>
														<option>2017</option>
														<option>2018</option>
														<option>2019</option>
														<option>2020</option>
														<option>2021</option>
														<option>2022</option>
														<option>2023</option>
														<option>2024</option>
														<option>2025</option>
														<option>2026</option>
														<option>2027</option>
														<option>2028</option>
														<option>2029</option>
														<option>2030</option>
														<option>2031</option>
														<option>2032</option>
														<option>2033</option>
														<option>2034</option>
														<option>2035</option>
														<option>2036</option>
														<option>2037</option>
														<option>2038</option>
														<option>2039</option>
														<option>2040</option>
													</select>
												</div>
												
												<div class="form-group">
													<label>Security code:</label>
													<input type="text" class="input_type_text" style="width:120px;"/>
													<span ><a href="javascript:void(0);"><img src="images/icon-help.png" width=" " height=" " alt="help" /></a></span>
												</div>
											<div class="clearfix"></div>
										</div>
								<!--===================-->					
										<div class="align-c norton1">
											<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="pay-footer clearfix">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 by credit card. <a href="javascript:void(0)" class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<!--
=======================credit card===========================
	
<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#163; GBP
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>	
										<div class="relative">
											<ul class="debit-card margin-r40 clearfix">
												<li><a href="javascript:void(0);"><img src="images/creadit-card1.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card2.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card3.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card4.png" width=" " height=" " alt="card" /></a></li>
											</ul>
												<div class="form-group margin-t20">
													<label>Card Number:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Name on the card:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Expiry date:</label>
													<select class="month">
														<option>Jan</option>
														<option>Feb</option>
														<option>jan</option>
														<option>Mar</option>
														<option>Apr</option>
														<option>May</option>
														<option>Jun</option>
														<option>Jul</option>
														<option>Aug</option>
														<option>Sep</option>
														<option>Oct</option>
														<option>Nov</option>
														<option>Dec</option>
													</select>
													
													<select class="year">
														<option>2015</option>
														<option>2016</option>
														<option>2017</option>
														<option>2018</option>
														<option>2019</option>
														<option>2020</option>
														<option>2021</option>
														<option>2022</option>
														<option>2023</option>
														<option>2024</option>
														<option>2025</option>
														<option>2026</option>
														<option>2027</option>
														<option>2028</option>
														<option>2029</option>
														<option>2030</option>
														<option>2031</option>
														<option>2032</option>
														<option>2033</option>
														<option>2034</option>
														<option>2035</option>
														<option>2036</option>
														<option>2037</option>
														<option>2038</option>
														<option>2039</option>
														<option>2040</option>
													</select>
												</div>
												<div class="form-group">
													<label>Security code:</label>
													<input type="text" class="input_type_text" style="width:120px;"/>
													<span ><a href="javascript:void(0);"><img src="images/icon-help.png" width=" " height=" " alt="help" /></a></span>
												</div>
											<div class="clearfix"></div>
										</div>				
										<div class="align-c norton1">
											<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="pay-footer clearfix">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="javascript:void(0)" class="color-green">Service conditions</a></p>
									</div>
								</div>						
<!--================================vip pay upgrade 14=========================-->
		<?php /* <div id="vip_payment_20" class="modal fade login_pop new-vip card-payment-vip" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times; </button>
							<h3 class="dark-blue padding-r30 font-22"><b>Upgrade to a VIP membership & Meet New People Faster</b></h3>
						</div>
						
						<div class="modal-body">
							<?php echo $vipBenefitsHtml;?>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li id="cr_pay1">
										<a data-rel="#seven" href="javascript:void(0)"><img src="images/icon1.jpg" width=" " height=" " alt="Credit Card" />Credit Card</a>
									</li>
									<li class="active"  id="pp_pay1">
										<a data-rel="#eight"href="javascript:void(0)"><img src="images/icon.jpg" width=" " height=" " alt="Paypal Account"/>Paypal Account</a>
									</li>
								</ul>
					<!--=======================Paypal Account==========================-->
								<div id="eight" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1 new-container">
										<!--<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>-->
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										
										
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select padding-l5"> 550 credits (<span class="light-green">50 free!</span>) - &#163;7.49 </span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  550 credits (50 free!) - &#163;7.49 
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  550 credits (50 free!) - &#xf156;7.49 
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  550 credits (50 free!) - &#xf155;7.49 
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>	
										
										<div class="pay-btn margin-l150"></div>
										<br/>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="javascript:void(0)" class="color-green">Service conditions</a></p>
									</div>
								</div>
								
				<!--=======================credit card===========================-->
								
								<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<h4 class="dark-blue font-15 margin-t30 margin-b20 align-c"><b>Subscribe now to take advantage of VIP member benefits.</b></h4>
										<br>
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-inr"></i> &nbsp; Indian Rupee, INR</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#163; GBP
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>
										
										<div class="relative">
											<div class="filter1 margin-l90 margin-b15">
												<!--new-->
												<div class="form-group">
													<input class="ploc_input" type="hidden" value="">
													<span class="input_box fontawesome-select">&nbsp;1 Month &#xf156;854/m - &#xf156;854 Total</span>
													<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
													<div class="clearfix"></div>
													<ul class="p_locations clearfix fontawesome-select">
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="javascript:void(0)">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										
										
										<!--===================-->		
										<div class="relative">
											<ul class="debit-card margin-r40 clearfix">
												<li><a href="javascript:void(0);"><img src="images/creadit-card1.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card2.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card3.png" width=" " height=" " alt="card" /></a></li>
												<li><a href="javascript:void(0);"><img src="images/creadit-card4.png" width=" " height=" " alt="card" /></a></li>
											</ul>
												<div class="form-group margin-t20">
													<label>Card Number:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Name on the card:</label>
													<input type="text" class="input_type_text" />
												</div>
												<div class="form-group">
													<label>Expiry date:</label>
													<select class="month">
														<option>Jan</option>
														<option>Feb</option>
														<option>jan</option>
														<option>Mar</option>
														<option>Apr</option>
														<option>May</option>
														<option>Jun</option>
														<option>Jul</option>
														<option>Aug</option>
														<option>Sep</option>
														<option>Oct</option>
														<option>Nov</option>
														<option>Dec</option>
													</select>
													
													<select class="year">
														<option>2015</option>
														<option>2016</option>
														<option>2017</option>
														<option>2018</option>
														<option>2019</option>
														<option>2020</option>
														<option>2021</option>
														<option>2022</option>
														<option>2023</option>
														<option>2024</option>
														<option>2025</option>
														<option>2026</option>
														<option>2027</option>
														<option>2028</option>
														<option>2029</option>
														<option>2030</option>
														<option>2031</option>
														<option>2032</option>
														<option>2033</option>
														<option>2034</option>
														<option>2035</option>
														<option>2036</option>
														<option>2037</option>
														<option>2038</option>
														<option>2039</option>
														<option>2040</option>
													</select>
												</div>
												
												<div class="form-group">
													<label>Security code:</label>
													<input type="text" class="input_type_text" style="width:120px;"/>
													<span ><a href="javascript:void(0);"><img src="images/icon-help.png" width=" " height=" " alt="help" /></a></span>
												</div>
											<div class="clearfix"></div>
										</div>
								<!--===================-->					
										<div class="align-c norton1">
											<button class="btn btn-danger bold " type="submit" style="font-size:16px;"> Pay by Card </button>
										</div>
										<div class="clearfix"></div>
									</div>
									<div class="pay-footer clearfix">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="javascript:void(0)" class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		*/ ?>
		
<!--===============================Pop  congratulation VIP membership-->
		<div id="vip_payment_congrats_popup" class="modal fade login_pop" role="dialog" >
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
									<b id="vip-congrats-message">Your VIP membership <br />has been extended. Enjoy!</b>
								</h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done </a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<!--================================Complimentary VIP membership 11=========================-->
		<div id="vip_omplimentary" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="gray_1"><b>Complimentary VIP membership!</b></h4>
						</div>
						
						<div class="modal-body new-vip">
							<div>
								<h4 class="gray_1 lato font-17 l-height-25">
									<b>Why don’t you carry on using your VIP membership and enjoy 48 hours 
									completely free of charge! We’ll add this on to your current subscription.</b>
								<h4>
								<p class="gray_1 lato font-13">
									Get these fantastic VIP Member benefits:
								</p>
								
								<div class="row">
									<div class="vip-right-box-1 complimentary">
										<ul class="margin-t15">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">
											<li>
												<a href="javascript:void(0)"><img src="images/icon-8.png" width=" " height=" " alt="message" /> &nbsp; Message Boost &nbsp;<i class="fa fa-caret-right"></i> </span></a>
												<ul class="benefits_details">
													<li>Get a conversation started quicker by having all you messages read first</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-7.png" width=" " height=" " alt="like" />  &nbsp; See who likes you &nbsp;<i class="fa fa-caret-right"></i></span> </a>
												<ul class="benefits_details">
													<li>Check out who likes you on Kismat Connection and message them straight away</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-6.png" width=" " height=" " alt="H. people" /> &nbsp; Talk to the Hottest People &nbsp;<i class="fa fa-caret-right"></i></a>
												<ul class="benefits_details">
													<li>Chat with the most popular members on Startrishta whose reputations are Very Hot</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-5.png" width=" " height=" " alt="favorite" /> &nbsp; Added as a Favorite  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Find out who has added your profile to their favorites list and get in touch with them</li>
												</ul>
											</li>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">
											
											<li>
												<a href="javascript:void(0)"><img src="images/icon-gift.png" width=" " height=" " alt="stealth" /> &nbsp; Stealth Mode  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Become invisible when visiting other people's profiles to browse in private </li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-hi.png" width=" " height=" " alt="customisation" /> &nbsp; Profile Customisation  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Upgrade your profile with a variety of great wallpapers to show off with</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon150.png" width=" " height=" " alt="chat" />  &nbsp; Chat to New Members First &nbsp;<i class="fa fa-caret-right"></i></span> </a>
												
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
								<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red font-16" data-dismiss="modal"> Get 2 Extra Days VIP FREE! </a> 
								<p><b>or</b>  <a href="javascript:void(0)" class="underline-link">  Continue </a> </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

<!--================================Unscbscribe VIP membership 11=========================-->
		<div id="vip_unsubscribe" class="modal fade login_pop new-vip card-payment-vip" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times; </button>
							<h3 class="dark-blue padding-r30 font-22"><b>Why are you unsubscribing?</b></h3>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box-1">
								<br>
								<h4 class="dark-blue"><b>VIP Member Benefits </b> </h4>
								
								<ul class="margin-t15">
									<li>
										<a href="javascript:void(0)"><img src="images/icon-8.png" width=" " height=" " alt="message" /> &nbsp; Message Boost &nbsp;<i class="fa fa-caret-right"></i> </span></a>
										<ul class="benefits_details">
											<li>Get a conversation started quicker by having all you messages read first</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-7.png" width=" " height=" " alt="like" />  &nbsp; See who likes you &nbsp;<i class="fa fa-caret-right"></i></span> </a>
										<ul class="benefits_details">
											<li>Check out who likes you on Kismat Connection and message them straight away</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-6.png" width=" " height=" " alt="H. people" /> &nbsp; Talk to the Hottest People &nbsp;<i class="fa fa-caret-right"></i></a>
										<ul class="benefits_details">
											<li>Chat with the most popular members on Startrishta whose reputations are Very Hot</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-5.png" width=" " height=" " alt="favorite" /> &nbsp; Added as a Favorite  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Find out who has added your profile to their favorites list and get in touch with them</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-gift.png" width=" " height=" " alt="stealth" /> &nbsp; Stealth Mode  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Become invisible when visiting other people's profiles to browse in private </li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon-hi.png" width=" " height=" " alt="customisation" /> &nbsp; Profile Customisation  &nbsp;<i class="fa fa-caret-right"></i> </a>
										<ul class="benefits_details">
											<li>Upgrade your profile with a variety of great wallpapers to show off with</li>
										</ul>
									</li>
									<li>
										<a href="javascript:void(0)"><img src="images/icon150.png" width=" " height=" " alt="chat" />  &nbsp; Chat to New Members First &nbsp;<i class="fa fa-caret-right"></i></span> </a>
										
										<ul class="benefits_details">
											<li>Get a headstart on everyone else by being able to message newest Startrishta Members first</li>
										</ul>
									</li>
									
								</ul>
							</div>
							
							<div class="vip-left-box padding-r20">
								<p class="gray_1 lato margin-t0">Our VIP membership offers users the very best experience on Startrishta.</p>
								<p class="gray_1 lato">If you still want to cancel your subscription, please let us know why so we can provide a better experience in the future.</p>
								<form class="login-form" method="post" action="">
									<div class="popup_add_photo">
									</div>
									<div class="swith_gq report">
										<input type="radio" value=" " name="kc_reportphoto" id="kc_reportphoto1">
										<label for="kc_reportphoto1"><span class="left"><span></span></span><p class="left">It is too expensive</p></label>
									</div>
									<div class="swith_gq report">
										<input type="radio" value=" " name="kc_reportphoto" id="kc_reportphoto2">
										<label for="kc_reportphoto2"><span class="left"><span></span></span><p class="left">I don’t use my VIP membership benefits very often</p></label>
									</div>
									<div class="swith_gq report">
										<input type="radio" value=" " name="kc_reportphoto" id="kc_reportphoto3">
										<label for="kc_reportphoto3"><span class="left"><span></span></span><p class="left">I’m changing my method of payment</p></label>
									</div>
									<div class="swith_gq report">
										<input type="radio" value=" " name="kc_reportphoto" id="kc_reportphoto4">
										<label for="kc_reportphoto4"><span class="left"><span></span></span><p class="left">VIP membership hasn’t worked for me</p></label>
									</div>
									<div class="swith_gq report">
										<input type="radio" value="Other" name="kc_reportphoto" id="kc_reportphoto5">
										<label for="kc_reportphoto5"><span class="left"><span></span></span><p class="left">Other</p></label>
									</div>
									<div class="report">
										<span><p class="gray_1 lato font-13">Add more details below (optional):</p></span>
										<textarea id="kc_reportphotoTextarea" class="input_type_text" maxlength='500'></textarea>
										<div class="word_count"><span id="count_kc_reportphoto">0</span>/500</div>
									</div>
									<div class="popup_add_photo margin-t5">
										<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red font-16" data-dismiss="modal"> Keep VIP Membership </a> 
										<!--<p class="font-15 margin-l10"> <b> or </b>  <a href="javascript:void(0)" class="underline-link">  Continue </a> </p>-->
										<b> or </b>  <a href="javascript:void(0)" class="underline-link">  Continue </a>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
<!--================================Scbscribe VIP Congrats =========================-->
<?php if(!isset($_GET['success'])){?>	
	<div id="vip_subscribtion_congrat" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header background-img">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="gray_1"><b>Congratulation on your VIP subscription!</b></h4>
						</div>
						<div class="modal-body new-vip">
							<div>
								<div class="creadits_image">
									<img src="images/credits.png" width=" " height=" " alt="creadits" />
								</div>
								<div class="creadits_image_details">
									<h4 class="gray_1 lato font-17 l-height-25">
										<b><span class="red_v">Special offer </span>- get 100 free Startrishta credits</b>
									<h4>
									<p class="gray_1 lato font-14">
										for a limited time only buy credits for only &#163;7.49 and get 100 credits for free!
									</p>
									<div class="popup_add_photo margin-t20">
										<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red font-16 pull-left"> Buy now </a> 
									</div>
								</div>
								<div class="row">
									<div class="vip-right-box-1 complimentary">
										<ul class="margin-t15">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">
											<li>
												<a href="javascript:void(0)"><img src="images/icon-8.png" width=" " height=" " alt="message" /> &nbsp; Get to the top of People Search &nbsp;<i class="fa fa-caret-right"></i></a>
												<ul class="benefits_details">
													<li>Promote your profile to first place in search results for your area</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-7.png" width=" " height=" " alt="like" />  &nbsp; Appear more often in Kismat Connection &nbsp;<i class="fa fa-caret-right"></i></a>
												<ul class="benefits_details">
													<li>Get 100 more priority displays in Kismat<br  class="hidden-sm"/> Connection to increase your chances of <br  class="hidden-sm"/>other people liking you</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-6.png" width=" " height=" " alt="H. people" /> &nbsp; Get seen on  the Fame Reel &nbsp;<i class="fa fa-caret-right"></i></a>
												<ul class="benefits_details">
													<li>Appear on the Fame Reel at the top of the <br  class="hidden-sm"/> page & let other Startrisha users notice<br  class="hidden-sm"/> you quicker</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-5.png" width=" " height=" " alt="favorite" /> &nbsp; Message 5 more people  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Initiate conversations with 5 new people</li>
												</ul>
											</li>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 margin-b20">
											
											<li>
												<a href="javascript:void(0)"><img src="images/icon-gift.png" width=" " height=" " alt="stealth" /> &nbsp; Give Virtual Gifts  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Get someone's attention instantly by giving them a gift</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon-hi.png" width=" " height=" " alt="customisation" /> &nbsp; Show you are ready to chat  &nbsp;<i class="fa fa-caret-right"></i> </a>
												<ul class="benefits_details">
													<li>Get featured on the main chat window when users in your area check their messages</li>
												</ul>
											</li>
											<li>
												<a href="javascript:void(0)"><img src="images/icon150.png" width=" " height=" " alt="chat" />  &nbsp; Get 150 more votes on Kismat Connection &nbsp;<i class="fa fa-caret-right"></i></a>
												
												<ul class="benefits_details">
													<li>Like even more people on Kismat Connection and increase your chances of getting a match</li>
												</ul>
											</li>
											</div>
										</ul>
									</div>
								</div>
								
								<div class="pay-footer clearfix">
									<p class="footer">You will be charged &#163;7.49 via PayPal. <a href="javascript:void(0)" data-toggle="modal"  data-target="#vip_service_condition" class="color-green">Service conditions</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php } ?>

<!--================================VIP Service Conditions 10=========================-->
		<div id="vip_service_condition" class="modal fade login_pop" role="dialog" >
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
									<b>By clicking ‘Pay’ you authorize Startrishta.com Ltd to charge your PayPal or Credit Card account for the amount selected for use on Startrishta and accept the Terms outlined below. You can change your payment method or subscription settings at any time in <a href=" " class="green">payment settings.</a></b>
								</p>
								<p class="gray_1 lato">
									<b>Terms for Startrishta VIP Membership:</b>
								</p>
								<ol class="condition">
									<li>When you subscribe or receive VIP membership, you do not own the credits. Rather, you receive a limited right to use such credits for 		services on Startrishta.</li>
									<li>Subscriptions to VIP Membership are non-refundable.</li>
									<li>Subscriptions works by automatically renewing your VIP membership using the same time-length and payment method you last chose. For example, if you subscribed for one week at £2.49 your 
									   subscription will renew after 7 days for another week, at £2.49. You can change your subscription settings anytime in your <a href=" " class="green">payment settings.</a></li>
									<li>We may change the subscription price for VIP membership at any time as well as the ways that you can use VIP member benefits. We also reserve the right to stop issuing VIP memberships.</li>
									<li>VIP memberships are not redeemable for any sum of money or monetary value from us unless we  agree otherwise in writing.</li>
									<li>If you delete your account or if your account is terminated by Startrishta due to breach of our terms and conditions, you will lose your VIP membership status.</li>
									<li>If you receive free or promotional VIP membership, we may expire it at any time.</li>
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
		
	<!------------------------CONGRATULATION FOR VIP MEMBER---------------------------------->
	<?php if(isset($_REQUEST['vip'])){?>
	<div id="vip_modal_cong" class="modal fade login_pop" role="dialog" data-backdrop="static" data-keyboard="false" style="z-index:10000;" >
		<div class="modal-dialog-1">
			<div class="modal-content">
				<div>
					<div class="modal-header">
						<h4><b>Congratulations!</b></h4>
					</div>
					<div class="modal-body">
						<form class="login-form">
							<div class="popup_add_photo"></div>
							<div>
							<h5 class="align-c lh-20">
								<b id="vip-cong-title">
								<?php 
								if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='new-member'){
									echo "As a VIP member you can now talk to the newest Startrishta members - have fun";
								}else if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='hot-member'){
									echo "As a VIP member you can now talk to the hottest members on Startrishta.";
								}else if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='search-criteria'){
									echo "As a VIP member you can now have the ability talk to anyone on Startrishta!";
								}else if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='liked-profile'){
									echo "As a VIP member you can now view who has liked your profile!";
								}else if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='favorite-member'){
									echo "As a VIP member you can now see who has added you to their favorite profile!";
								}else if(isset($_REQUEST['vip']) && $_REQUEST['vip']=='boost-message'){
									echo "As a VIP member you can now boost	your message to the top of the inbox!";
								}
								?>
								</b>
							</h5>
							</div>
							<div class="popup_add_photo margin-t20">
								<a href="vip.php" class="btn btn-default padding-lr-40 custom red">Done </a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>
<script>

/*function validateVip(){		
	if($('.payment_currency_hidden').val() == ''){
		$('#error_message_header').html('Alert');
		$('#error_message').html('Please select currency.');
		$('#alert_modal').modal('show');
		return false;
	}else if($('.payment_total_hidden').val() == ''){
		$('#error_message_header').html('Alert');
		$('#error_message').html('Please select duration.');
		$('#alert_modal').modal('show');
		return false;
	}
	return true;
}*/
		
	$(function(){
		$('#vip_modal_cong').modal('show');
		var vip_for='vip';
		var defaultVipId='<?php echo $defaultVipId;?>';
		var http_path='<?php echo HTTP_SERVER;?>';
		$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId);
		//#############################NEW MEMBER(MY MESSAGE)#########################
		$('#go-vip-new-member').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership to talk to new members first!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'new-member';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		
		//#############################HOT MEMBER(MY MESSAGE)#########################
		$('#go-vip-hot-member').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership & chat with the hottest members on Startrishta!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'hot-member';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		//#############################SEARCH CRITERIA(MY MESSAGE)#########################
		$('#go-vip-search-criteria').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership & talk with anyone on Startrishta!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'search-criteria';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
			//#############################BOOST MESSAGE(MY MESSAGE)#########################
		$('.go-vip-boost-message').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership to have all your messages read first!');
			$('#vip-payment-popup').modal('show');
			$(this).prop('checked' , false);
			vip_for = 'boost-message';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});	
		//#############################CUSTOMIZE PROFILE(LEFT SIDE)#########################
		$('#go-vip-customize-profile').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to VIP membership & stand out from the crowd!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'customize-profile';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		//###########################LIKE PAGE#########################
		$('#go-vip-liked-profile').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership to find out who has liked your profile!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'liked-profile';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		
		//###########################FAVORITE PAGE#########################
		$('#go-vip-favorite-profile').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership and see who has added you as a favorite!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'favorite-profile';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		//###########################STEALTHMODE#########################
		$('#go-vip-stealth-mode').live('click' , function(){
			$('#vip-payment-header').html('Upgrade to a VIP membership & browse in secret with Stealth Mode!');
			$('#vip-payment-popup').modal('show');
			vip_for = 'favorite-profile';
			$(".return").val(http_path+'paypal-success.php?ID='+defaultVipId+'&vip='+vip_for);
		});
		
		//#############################################################################
		$('.payment_currency').change(function(){
			var value=$(this).val();
			var currency_id=value;
			$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/vip.php",
				data:{action:'getVipDuration' , currency_id:currency_id},
				success:function(result){
					$('.responsePayment').html(result);
					$('.select-payment').selectpicker();
					$(".amount").val('');
					//$('.select-payment').html('&nbsp;Select');
				}
			});
			$('#preloader').hide();
			return false;
		});
		$('.payment_total').live('change' , function(){
			var vip_id = $(this).val();
			//alert(vip_id);
			$('#preloader').show();
			$.ajax({
				type:"POST",
				url:"ajax/vip.php",
				dataType:"json",
				data:{action:'getVipPayment' , vip_id:vip_id},
				success:function(result){
					//alert(result);
					$(".amount").val(result[0]);
					$(".currency_code").val(result[1]);
					$(".return").val('http://vibescomm.in/wip_projects/development/start-rishta/paypal-success.php?ID='+vip_id+'&vip='+vip_for);
					$(".paypal-foot-msg").html('You will be charged '+result[2]+' '+result[0]+' by PayPal.');
				}
			});
			$('#preloader').hide();
			return false;
		});
		
		$(".new-vip .vip-right-box-1 > ul > li > a, .new-vip .vip-right-box-1 > ul > div > li > a").click(function(){
			$(".new-vip .vip-right-box-1 > ul > li > a, .new-vip .vip-right-box-1 > ul > div > li > a").removeClass("active");
			$(".new-vip .vip-right-box-1 > ul > li > a i, .new-vip .vip-right-box-1 > ul > div > li > a i").removeClass("fa-caret-down");
			$(".new-vip .vip-right-box-1 > ul > li > a i, .new-vip .vip-right-box-1 > ul > div > li > a i").addClass("fa-caret-right");
			$("ul.benefits_details").slideUp("slow");
			if($(this).next("ul.benefits_details").is(":visible") == false){
				$(this).next("ul.benefits_details").slideDown("slow");
				$(this).find("i").addClass("fa-caret-down");
				$(this).find("i").removeClass("fa-caret-right");
				$(this).addClass("active");
			}else{
				//$(".new-vip .vip-right-box-1 > ul > li > a i").removeClass("fa-caret-down");
				//$(".new-vip .vip-right-box-1 > ul > li > a i").addClass("fa-caret-right");
			}
		});
		<!---popup right-box height with bg -->
		$("#cr_pay , #cr_pay1").click(function(){
			$(this).parents().parents().prev(".vip-right-box-1").addClass("vip_right_box_02");
		});
		$("#pp_pay , #pp_pay1").click(function(){
			$(this).parents().parents().prev(".vip-right-box-1").removeClass("vip_right_box_02");
		});
		
	});
	
	function validateVipPayment(){
		if($(".amount").val() == ''){
			$('#error_message_header').html('Alert');
			$('#error_message').html('Please select duration.');
			$('#alert_modal').modal('show');
		return false;
		}
	}
</script>