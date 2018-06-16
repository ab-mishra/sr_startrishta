<!--<div id="alert_modal" class="modal fade login_pop" role="dialog" style="z-index:9999">
	<div class="modal-dialog-1">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3><b>Alert</b></h3>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div class="popup_add_photo">
						</div>
						<div>
						<h5 class="align-c lh-20"><b id="error_message"></b></h5>
						</div>
						<div class="popup_add_photo margin-t20">
							<a href="javascript:void(0);" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">OK </a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>-->
<!----------------------------------------PROFILE EMPTY MODAL ------------------------------>
<!--Pop for Change Email Address-->
<div id="changeEmailAddress" class="modal fade login_pop" role="dialog" >
	<div class="modal-dialog home_pg">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Change your email address</h4>
				</div>
				
				<div class="modal-body">
					<form class="login-form">
						<div>
							<p class="align-c forget-btxt">Your confirmation email will be sent to your new email address</p>
						</div>
						<div>
							<input class="forget-input" id="changed_address" type="text" placeholder="Enter your new address"/>
						</div>
						<div>
							<input class="login_btn" type="button"id="changeAddress" value="Save Change"/>
						</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>				

<?php if(empty($userResult['user_name'])) {?>
<!--Pop for Personal Information-->
<div id="myModal3" class="modal fade login_pop" role="dialog" data-backdrop="static">
	<div class="modal-dialog home_pg pop_pro">
		<div class="modal-content">
			<div >
				<div class="modal-header">
					<h4 class="modal-title">Personal information</h4>
				</div>
				
				<div class="modal-body clearfix">
				<div id="error_first_regist" style="color:red;"></div>
					<form class="login-form psnl_pro pull-left">
						<div>
							<label><p>Name:</p></label>
							
							<input type="text" placeholder="" id="user_name"/>
							<p>You can always change this later</p>
						</div>
						<div>
							<label><p>Date of birth:</p></label><input type="text" placeholder="e.g. 30-05-1999" id="dob" class="input-group date" data-date-format="dd-mm-yyyy"/><p id="dob_div"></p>
						</div>
						<div>
							<label><p>Gender:</p></label>
							<div class="radio">
								<div class="swith_gq">
									<input type="radio" value="2" name="gender" data-rel="#general" id="radio1">
									<label for="radio1"><span><span></span></span>Female</label>
								</div>
								<div class="swith_gq">
									<input type="radio" value="1" name="gender" data-rel="#general" id="radio2">
									<label for="radio2"><span><span></span></span>Male</label>
								</div>
							</div>
						</div>
						<div class="relative">
							<label><p>Location:</p></label>
							<input id="location_lat" type="hidden" value="" />
							<input id="location_lon" type="hidden" value="" />
							<input id="pac-input" class="focus-color" type="text" placeholder="search" />
							<!--<input id="pac-input" class="controls" type="text" placeholder="Enter a location">-->
							<span class="ppd_srch" id="location_search"><i class="fa fa-search"></i></span>
						</div>
						<div class="relative">
							<label><p>I'm here to:</p></label>
							<!--<input type="text" class="form-control">-->
							<div class="filter">
								<div class="form-group">
									<input class="ploc_input" type="hidden" id="here_to" value="1">
									<span class="input_box fontawesome-select">&nbsp; <i class="fa fa-heart"></i> &nbsp; Explore Marriage Options</span>
									<span class="down_arrow_btn fontawesome-select"> <b>&#xf0d7; </b></span>
									<div class="clearfix"></div>
									<ul class="p_locations clearfix fontawesome-select">
										<?php 
										$hereToArray=$userProfileObj->getHereTo();
										foreach($hereToArray as $hereTo){
										?>
											<li class="p_location here_to_options" data-id="<?php echo $hereTo['here_to_id'];?>">
												<a href="javascript:void(0);">
													<?php echo $hereTo['html_icon'];?> <span><?php echo $hereTo['here_to'];?></span>
												</a>
											</li>
										<?php } ?>
										<!--
										<li class="p_location here_to_options">
											<a href="javascript:void(0);">
												  &nbsp; &#xf007; <span>Make New Friends</span>
											</a>
										</li>
										<li class="p_location here_to_options">
											<a href="javascript:void(0);">
												 &nbsp; &#xf075; <span>Chat</span>
											</a>
										</li>-->
									</ul>
								</div>
						<!--end of new-->
							</div>
						</div>
						<div class="ppd">
							<input class="login_btn" type="button" value="Done" id="donePerInfo"/>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end-->
<?php } ?>
		<!--Pop for Add Photo 3-->
		<div id="myModal6" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4>Add New photos</h4>
						</div>
						<div class="modal-body">
							<form class="login-form popup-bg">
								<div class="popup_add_photo">
									<img src="images/icon-007.png"/>
								</div>
								<div>
								<h4 class="align-c width-80"><b>Upload Photos</b></h4> 
								<h4 class="align-c width-80">and meet people near you today. </h4>
								</div>
								<div class="popup_add_photo margin-t20">
									<a class="btn btn-default default slat-blue padding-r75 padding-l75" href="">Upload Photo </a>
								</div>
								<div class="align-c white1">or </div>
								<div class="popup_add_photo">
								 <a class="btn btn-default fb-blue bold" href=""> <i class="fa fa-facebook-square"></i> Import photos from Facebook </a>
								</div>
								<br>
								<!--<div>
									<input class="login_btn" type="button" value="Done"/>
								</div>-->
								<p class="align-c gray text-normal width-90"> ou can add up to 500 photos in your ‘Photos of you’ album. We accept JPG and PNG file formats. Individual file size limit must not exceed 10MB.</p>
								<!--<div class="pap_font pull-left">
									<a href="#">I’ll add one later</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Pop for Add Photos-->
		
		<!--Pop  vip pay-->
		<div id="vip_modal" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Upgrade to a VIP membership to customise your profile & stand out from the crowd!</b></h4>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box">
								<br>
								<h5 class="align-c"><b>VIP Member Benefits </b></h5>
								<ul>
									<li>
										<a href="#"><img src="images/icon-15.png"> &nbsp; Message Boosts <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-14.png"> &nbsp; See whop likes you <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-13.png"> &nbsp; Talk to the hotel people <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-12.png"> &nbsp; Added as a fevorite <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-11.png"> &nbsp; Stealth mode <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-10.png"> &nbsp; Profile customisation  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-9.png"> &nbsp; Chat to new member first  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									
								</ul>
							</div>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#one"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#two" href="#"><img src="images/icon.jpg" />Paypal Account</a>
									</li>
								</ul>
								<!--credit card-->
								
								<div id="one" class=" vip-left-box-container credit-card">
									<div class="vip-container1">
									<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
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
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>	
									<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
								<!--paypal-->
								<div id="two" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
									<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
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
														<a href="#">
															  &nbsp; &#xf156; Indian Rupee
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															  &nbsp; &#xf155; US Dollar
														</a>
													</li>
													<li class="p_location">
														<a href="#">
															 &nbsp; &#xf155; US Dollar
														</a>
													</li>
												</ul>
											</div>
									<!--end of new-->
										</div>
									</div>	
									<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of paypal-->
								
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End vip pay-->
		<!--Pop  up Creadit -->
		<div id="myModal11" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Appear on the Fame Reel for instant exposure to new people in your area!</b></h4>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box-1">
								<br>
								<h5 class="align-c"><b>Do more with credits  </b></h5>
								
								<ul class="margin-t15">
									<li>
										<a href="#"><img src="images/icon-8.png"> <span class="width-80r"> Get to the top of People Search <span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span> </span></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-7.png"><span class="width-80r"> Apper more often in Kismat Connection<span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-6.png"> &nbsp; Get seen on the fame reel <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-5.png"> &nbsp; Message 5 more People  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-gift.png"> &nbsp; Give Virtual Gifts  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-hi.png"> &nbsp; Show you are ready to chat  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon150.png"> <span class="width-80r"> Get 150 more votes on Kismat Connection  <span class="fontawesome-select"><b> &#xf0da;</b></span></span> </a>
									</li>
									
								</ul>
							</div>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#three"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#four" href="#"><img src="images/icon.jpg" />Paypal Account</a>
									</li>
								</ul>
								<div id="four" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
										<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
										<br>
										<p class="margin-t50 align-c text-normal"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
										<p class="align-c text-normal">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								
								<!--credit card-->
								
								<div id="three" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End vip pay 2-->
		<!--Pop up for kismat connection vip pay-->
		<div id="kismat_connection" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Increase your chances of a match, get shown to 100 new people playing Kismat Connection!</b></h4>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box-1">
								<br>
								<h5 class="align-c"><b>Do more with credits  </b></h5>
								
								<ul class="margin-t15">
									<li>
										<a href="#"><img src="images/icon-8.png"> <span class="width-80r"> Get to the top of People Search <span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span> </span></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-7.png"><span class="width-80r"> Apper more often in Kismat Connection<span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-6.png"> &nbsp; Get seen on the fame reel <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-5.png"> &nbsp; Message 5 more People  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-gift.png"> &nbsp; Give Virtual Gifts  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-hi.png"> &nbsp; Show you are ready to chat  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon150.png"> <span class="width-80r"> Get 150 more votes on Kismat Connection  <span class="fontawesome-select"><b> &#xf0da;</b></span></span> </a>
									</li>
								</ul>
							</div>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#five"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#six" href="#"><img src="images/icon.jpg" />Paypal Account</a>
									</li>
								</ul>
								<div id="six" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
										<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
										<br>
										<p class="margin-t50 align-c text-normal"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
										<p class="align-c text-normal">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								
								<!--credit card-->
								
								<div id="five" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End kismat connection-->
		<!--Pop up for rise up search-->
		<div id="search_rise_up" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Get to the top of Startrishta’s search results and enjoy maximum attention!</b></h4>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box-1">
								<br>
								<h5 class="align-c"><b>Do more with credits  </b></h5>
								
								<ul class="margin-t15">
									<li>
										<a href="#"><img src="images/icon-8.png"> <span class="width-80r"> Get to the top of People Search <span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span> </span></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-7.png"><span class="width-80r"> Apper more often in Kismat Connection<span class="fontawesome-select"><b> &nbsp;&#xf0da;</b></span></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-6.png"> &nbsp; Get seen on the fame reel <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-5.png"> &nbsp; Message 5 more People  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-gift.png"> &nbsp; Give Virtual Gifts  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon-hi.png"> &nbsp; Show you are ready to chat  <span class="fontawesome-select"><b> &#xf0da;</b></span> </a>
									</li>
									<li>
										<a href="#"><img src="images/icon150.png"> <span class="width-80r"> Get 150 more votes on Kismat Connection  <span class="fontawesome-select"><b> &#xf0da;</b></span></span> </a>
									</li>
									
								</ul>
							</div>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#seven"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#eight" href="#"><img src="images/icon.jpg" />Paypal Account</a>
									</li>
								</ul>
								<div id="eight" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
										<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
										<br>
										<p class="margin-t50 align-c text-normal"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
										<p class="align-c text-normal">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								
								<!--credit card-->
								
								<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#" class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End vip pay 4-->
		
		<!--Pop  congratulation-->
		<div id="myModal9" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Congratulations!</b></h4>
						</div>
						
						<div class="modal-body">
							<form class="login-form">
								<div class="popup_add_photo">
									<!--<img src="images/icon-007.png"/>-->
								</div>
								<div>
								<h5 class="align-c lh-20"><b>You’ve just recevid 100 priority displays in kismat Connection - Enjoy attention!</b></h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="" class="btn btn-default padding-lr-40 custom red">Done </a>
								</div>
								<!--<div class="pap_font pull-left">
									<a href="#">I’ll add one later</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End congratulation-->
		<!--Pop  congratulation 2-->
		<div id="myModal9-1" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Congratulations!</b></h4>
						</div>
						
						<div class="modal-body">
							<form class="login-form">
								<div class="popup_add_photo">
									<!--<img src="images/icon-007.png"/>-->
								</div>
								<div>
								<h5 class="align-c lh-20"><b>You are now first in search results for your 
area – Enjoy the attention!</b></h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="" class="btn btn-default padding-lr-40 custom red">Done </a>
								</div>
								<!--<div class="pap_font pull-left">
									<a href="#">I’ll add one later</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End congratulation 2-->
		<!--Pop  congratulation 3-->
		<div id="myModal9-2" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Congratulations!</b></h4>
						</div>
						
						<div class="modal-body">
							<form class="login-form">
								<div class="popup_add_photo">
									<!--<img src="images/icon-007.png"/>-->
								</div>
								<div>
								<h5 class="align-c lh-20"><b>You will be  added to the Fame Reel shortly – 
Enjoy the attention!</b></h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="" class="btn btn-default padding-lr-40 custom red">Done </a>
								</div>
								<!--<div class="pap_font pull-left">
									<a href="#">I’ll add one later</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End congratulation 3-->
<!------------dec 2015-------------------------------------------------------->
		<!--Pop up for like me non vip-->
		<div id="go_vip_pay" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-vip">
				<div class="modal-content">
					<div>
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Upgrade to a VIP membership to find out who has liked your profile!</b></h4>
						</div>
						
						<div class="modal-body">
							<div class="vip-right-box-1">
								<br>
								<h4 class=""><b>Vip Member Benefits</b></h4>
								
								<ul class="margin-t15 go_vip_pay_benefits">
									<li>
										<a href="#"><img src="images/icon-15.png"> &nbsp; <b>Message Boots </b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-14.png"> &nbsp; <b>See who likes you</b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-13.png"> &nbsp; <b>Talk to the Hottest People</b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-12.png"> &nbsp; <b>Add as a Favourite</b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-11.png"> &nbsp; <b>Sttealth mode  </b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-10.png"> &nbsp; <b>Profile Customisation</b></a>
									</li>
									<li>
										<a href="#"><img src="images/icon-9.png"> &nbsp; <b>Chat to new Members First</b></a>
									</li>
									
								</ul>
							</div>
							
							<div class="vip-left-box">
								<ul class="vip-pay">
									<li >
										<a data-rel="#seven"  href="#"><img src="images/icon1.jpg" />Credit Card</a>
									</li>
									<li class="active">
										<a data-rel="#eight" href="#"><img src="images/icon.jpg" />Paypal Account</a>
									</li>
								</ul>
								<div id="eight" class="active_pane vip-left-box-container paypal">
									<div class="vip-container1">
										<p class="color-gray align-c"><span class="color-d">This service costs </span>100 credits.</p>
										<p class="color-gray align-c">Top up now - the more credits you buy, the cheaper they are:</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																 &nbsp; 1 Month 1254/m  US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; 1 Month 1054/m  US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; 1 Month 854/m  US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
										<br>
										<p class="margin-t50 align-c text-normal text-13"><b><i class="fa fa-check-square color-green"></i></b> &nbsp;Top up my Credits automatically when my balance fall bellow 200 credits.</p>
										<p class="align-c text-normal text-13">If you do not want to eneble Auto Top-up please uncheck the box &nbsp;<i class="fa fa-question-circle font_s18 color-gray-light"></i></p>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 PayPal. <a href="#"class="color-green">Service conditions</a></p>
									</div>
								</div>
								
								<!--credit card-->
								
								<div id="seven" class="vip-left-box-container credit-card">
									<div class="vip-container1">
										<p class="h4 color-gray align-c">Subscribe now to take advantage member benefits</p>
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
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
															<a href="#">
																  &nbsp; &#xf156; Indian Rupee
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																  &nbsp; &#xf155; US Dollar
															</a>
														</li>
														<li class="p_location">
															<a href="#">
																 &nbsp; &#xf155; US Dollar
															</a>
														</li>
													</ul>
												</div>
										<!--end of new-->
											</div>
										</div>	
										<div class="pay-btn margin-l150"></div>
									</div>
									<div class="pay-footer">
										<hr>
										<p class="footer">You will be charged <i class="fa fa-inr "></i>849 credit card. <a href="#" class="color-green">Service conditions</a></p>
									</div>
								</div>
								<!--end of credit card-->
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End vip pay like me non vip-->
		<!--Pop  congratulation 12-2015-01-->
		<div id="myModal12-1" class="modal fade login_pop" role="dialog" >
			<div class="modal-dialog-1">
				<div class="modal-content">
					<div >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Congratulations!</b></h4>
						</div>
						
						<div class="modal-body">
							<form class="login-form">
								<div class="popup_add_photo">
									<!--<img src="images/icon-007.png"/>-->
								</div>
								<div>
								<h5 class="align-c lh-20"><b>As a VIP member you can now view who has
liked your profile</b></h5>
								</div>
								<div class="popup_add_photo margin-t20">
									<a href="javascript:void(0)" class="btn btn-default padding-lr-40 custom red" data-dismiss="modal">Done </a>
								</div>
								<!--<div class="pap_font pull-left">
									<a href="#">I’ll add one later</a>
								</div>-->
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--End congratulation 3-->