<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='terms';
if(!empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Terms & Conditions</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
	<?php require("include/script.php"); ?>
</head>
<body>
	<div class="main-body">
		<!------its sign in and sign up------->
		<?php //include('include/sign-in.php') ;?>
		
		<!--Main Container start here-->
		<div class="clearfix">
			<div class="nav_scroll">
				<div class="container">
					<!-- it's header -->
					<?php require("include/header-inner.php"); ?>
					<!-- it's header -->
				</div>
			</div>
			<div class="border_grad"></div>
			
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="row">
						
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col_sm_3_big">
							<!-- it's header -->
							<?php require("include/side-bar.php"); ?>
							<!-- it's header -->
						</div>
						<?php 
							$queryTerms=mysql_query("Select * from sr_cms where status='1' and page='Terms'");
							$result=mysql_fetch_array($queryTerms);
						?>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
							<!--<div class="title_in red margin-b10 margin-t50 bold"> <h2><b><?php //echo stripslashes($result['title']); ?></b></h2></div>-->
							<div class="title_in red margin-b10 margin-t50 bold"> <h2><b>Terms of Use</b></h2></div>
							
							
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
								<!--<div class="row terms">
								   <?php// echo stripslashes($result['description']); ?>
								</div>-->
								
								<!-- -->      
								<div class="row terms lato font-15">
								   <h4 class="terms_header margin-t5">Introduction </h4>
										<p>Revised on 08/12/2016</p>
										<p>These Terms and Conditions apply to the entire content's of the present website.</p>
										<p>If you are a Startrishta.com member please note the legal entity you are entering into a contract with is:</p>
										<p>Eldama Group Ltd, a private limited company incorporated in England and Wales with registered company number 08897921 whose postal address is BM Startrishta.com, London, WC1N 3XX  and whose registered office is at 20-22 Wenlock Road, London, N1 7GU.</p>
										<p>These terms and conditions are binding documents which govern your use of our services and our provision of the service to you. You are advised to read these terms and conditions carefully. This will help ensure that they contain everything you want and that there is nothing within them that you are not prepared to agree to. If they contain anything that you are not willing to agree with then your only course of redress is not to use any of the services offered by any of our brands.</p>
									<h4 class="terms_header margin-t30">1. Definitions and Interpretations</h4>
										<p>The following words shall have the followings meaning in these Terms &amp; Conditions:</p>
										<p><strong>Agreement &mdash;</strong>&nbsp;shall mean these Terms and Conditions;</p>
										<p><strong>Subscription &mdash;</strong>&nbsp;refers to a paid fixed rate giving unlimited access to our paid Services, as required, for a limited period that can be 1 month, 3 months and 6 months, renewable after the purchased period where the subscription has been purchased using a bank card or any other method of payment listed on our website and allowing continuing debits to be made;</p>
										<p><strong>Service(s) &mdash;</strong>&nbsp;refers to the entirety of the Services available to you via any of our sites our Members, whether paid or unpaid;</p>
										<p><strong>Paid Services &mdash;&nbsp;</strong>refers to all Services accessible, at rates quoted, by this site to Members with a valid subscription.</p>
										<p><strong>Member(s) &mdash;&nbsp;</strong>refers to any or all valid registered users of our Service, whether they access Services or Paid Services.</p>
										<p><strong>Member Content &mdash;&nbsp;</strong>refers to the information contained in the Member&#39;s profile, created by the Member and displayed on any of our site(s) from time to time.</p>
										<p>The terms us, we, our refers to all brands owned and operated by Startrishta.com Ltd for the purposes of this Agreement.</p>
									<h4 class="terms_header margin-t30"> 2. Registration</h4>
										<p>To become a Member of our site you must be at least eighteen (18) years old.</p>
										<p>You must complete all of the fields on the registration form(s).</p>
										<p>You should not have been convicted of any offence, or subject to any court order, relating to assault, violence, sexual misconduct or harassment. You are advised that a breach of this clause constitutes a serious breach of this Agreement;</p>
										<p>Should you wish to sign up a friend to our Services; you must have obtained the prior consent of this friend in order for us to process their data and provide the Service to them via yourself.</p>
									<h4 class="terms_header margin-t30">3. Your right to cancel under the Distance Selling Regulations </h4>
										<p>This section applies to you only if you are a "consumer" as defined in the Consumer Protection (Distance Selling) Regulations 2000 and resident within the EU. You may cancel your order for the Services by giving us written notice within seven working days of placing your order. Within 30 days of your notice we will provide a refund. However, this right of cancellation does not apply once you have started to use the relevant Services.</p>
									<h4 class="terms_header margin-t30">4. Use of the Services </h4>
										<p>Password(s) and any other information used to identify a Member are strictly private and confidential and must not be passed on or shared with any third parties.</p>
										<p>To access the Services you will need a computer, laptop and or smart mobile phone. It is your responsibility to ensure that you have (and continue to have) one of these devices including the cost of using these devices.</p>
										<p>We may deactivate accounts of Members who have not used the Services for six months or more and for whom no pass remains valid. In the case of paying Members, this six month period begins on the date that the last Pass expired.</p>
									<h4 class="terms_header margin-t30">	5. Your Safety and Security </h4>
										<p>It is important that you understand that we cannot advise on or broker marriage or long-term relationships; the onus still remains on you to decide who is right for you; we just provide the options.</p>
										<p>Furthermore; we do not have a contractual obligation nor moral or ethically responsibility or the technical means to:</p> 
										<p><strong>verify the identity of persons who register as Members or use our Services;</strong></p> 
										<p><strong>or to verify or monitor Member Content (although we do reserve the right to monitor if we think it appropriate).</strong></p>
										<p><strong>As a Member you are advised not to assume that any Member Content is accurate. A person may not be who he or she claims to be. You should at all times exercise the same caution you would normally when you meet people. We cannot be liable for false or misleading statements by Members.</strong></p>
										<p>As a Member you at all times remain solely responsible (and liable) for the use of your identification information by third parties or for the actions or statements made through your Member's account, whether these be fraudulent or no.</p>
										<p>When arranging to meet another person through use of the Services, you must take appropriate precautions. Any such meetings are at your own risk and are not our responsibility.</p>
										<p>You are responsible for the acts or omissions of any third parties who use your identification information or account, whether fraudulent or not. You agree to indemnify us against any claims of this kind. For the avoidance of all doubt; we shall not be liable if your identity is used by someone else.</p>
										<p>If you feel or suspect that there has been a breach (of any kind) of your account and or the information displayed on your profile then you must immediately notify us. Furthermore; you should also amend your password.</p>
									<h4 class="terms_header margin-t30">	6. Member Obligation </h4>
										<p>As a Member you agree not to:</p>
										<ul class="terms_ul">
											<li>in connection with the Services breach any applicable law, regulation or code of conduct;</li>
											<li>make comments, broadcast or publish in any form whatsoever Member content or any other content that infringes the rights of others or that is defamatory, injurious, obscene, offensive, violent or can/does incite violence, or is any way shape or form racist or xenophobic;</li>
											<li>in general; not to make any comment (whether in writing or verbally) that is contrary to the purpose of any of our sites' current rules and laws in force or acceptable norms and standards;</li>
											<li>upload photographs, videos and any other information in terms of data or files supplied by a Member that are indecent. Photographs, videos and other information in terms of data or files supplied must refer exclusively to the Member or to a third party from whom the Member has expressly obtained consent and are the sole responsibility of the Member concerned;</li>
											<li>provide email addresses to us of other persons or publish or send any Member Content referring to other persons without having obtained their prior consent;</li>
											<li>reveal through the Services any information that enables you to be personally identified or contacted other than through the Services including last name, postal / email address or telephone number; or and</li>
											<li>you agree not to use the Services for junk mail, spam and pyramid or similar or fraudulent schemes.</li>
										</ul>
									<h4 class="terms_header margin-t30">	7. Member Content </h4>
										<p>At Startrishta.com; we put you the Member in control; therefore for the avoidance of all doubt it is your responsibility to decide which information to publish or send as Member Content. We cannot be held liable for any misuse thereof by any other user or third party.</p>
										<p>The information supplied by a Member must be accurate and conform to the reality. The consequences of disclosing information on the life of the Member or of other Members are the sole responsibility of the Member concerned.</p>
										<p>Consequently, he/she waives all recourse against Eldama Group Ltd, notably on the basis of any possible damage to the Member's right to his/her image, the Member's honour and reputation, or the Member's privacy, resulting from the dissemination or revelation of information concerning the Member under the conditions foreseen by this agreement since the Member has given his/her prior, free and express consent to such revelation through his/her registering with the Service and in application of this Agreement.</p>
										<p>We reserve the right not to accept or to suspend or remove from our Services all or part of any profile, personal ad or any other Member Content for any reason we deem fit.</p>
										<p>We are not liable for Member Content or other activities of Members which may breach the rights of other Users or third parties.</p>
										<p>Members are urged to notify us of inappropriate Member Content. You acknowledge that such notification may take place and that we may take steps outlined in this Agreement in respect of such information which comes to our attention.</p>
										<p>We reserve the right not to accept or to suspend or remove from our Services all or part of any profile, personal ad or any other Member Content for any reason we deem fit.</p>
										<p>We reserve the right to irretrievably delete messages and other Member Content after any period of time if we exercise any right of termination under this agreement.</p>
									<h4 class="terms_header margin-t30">	8. Payment Terms </h4>
										<p>The use of the Paid Services assumes that the Member has a subscription or has purchased Credits on a one of basis. Members can acquire a subscription/ purchase credits by payment methods proposed by this site.</p>
										<p>The prices and the terms of payment for the different Paid Services are displayed at all times on this site, including at the point when the member chooses to make a purchase.</p>
										<p>The activation of a subscription or adding additional credits on a member's account occurs as soon as, or a few moments after a valid transaction has been completed (successful online transaction).</p>
										<p>The Member can contact the site at any time to cancel their subscription. The cancellation will take effect from the expiry date given for the active pass, in accordance with <strong>Article 15, 'Termination'</strong>, below.</p>
										<p>All subscriptions will be automatically renewed. Unless, the Member notifies us of their wish to terminate their subscription at least 48 hours before the subscription's expiration date. The renewal shall be performed in accordance with the manner of payment originally chosen by the Member, at the price rate of the subscription to which the Member originally subscribed. For the avoidance of all doubt Members can avoid having their subscription auto-renewed if they contact us 48 hours before their subscription expiration date to terminate their subscription.</p>
										<p>Members can also subscribe to smartphone applications. These applications can be provided by other service providers (such as iTunes or mobile services providers) and therefore may be subject to other payment conditions than those used and available to Members on any of our sites. Any such applicable terms will only be apply to one-off purchases and all relevant terms and conditions associated with these payments will be brought to the attention of the Member prior to purchase.</p>
										<p>Purchase of a subscription to a smartphone application or other mobile service(s) not enable the Member to use Paid Services on our sites.</p>
									<h4 class="terms_header margin-t30">	9. Personal privacy and protection of Member data </h4>
										<p>We uphold the strictest of standards with respect to protection of privacy and of personal information, and has made a notification to the UK Information Commissioner. Please see our Privacy Policy for full details on how we store and use the information you provide to us.</p>
									<h4 class="terms_header margin-t30">	10. Intellectual Property </h4>
										<p>The trademarks, logos, graphics, photographs, animations, videos and texts featured on the this website and all affiliate websites, are the intellectual property of Startrishta.com Ltd or its partners and may not be reproduced, used or represented without the express permission of Startrishta.com Ltd or its partners, under threat of legal action.</p>
										<p>The rights of use granted by ourselves to the Member are strictly limited to accessing, downloading, printing and reproduction on all media (hard disk, floppy disk, CD-ROM, etc.) and to use of these documents for private and personal purposes in the scope of and for the duration for of the Member's membership. Any other use by the Member is prohibited without the express authorisation of Eldama Group Ltd.</p>
										<p>In particular, the Member is prohibited from modifying, copying, reproducing, disseminating, transmitting, exploiting for commercial gain and/or distributing in any form whatsoever the Services, from all of our website pages or software codes for elements comprising the any element of Services and website.</p>
									<h4 class="terms_header margin-t30">	11. Liabilities and Warranties </h4>
										<p>This section (and any other clause excluding or restricting our liability) applies to our directors, officers, employees, subcontractors, agents and affiliated companies (who may enforce this clause under the Contracts (Rights of Third Parties) Act 1999) as well as to us. Nothing in this agreement in any way limits or excludes our liability for negligence causing death or personal injury or for fraudulent misrepresentation or for anything which may not legally be excluded or limited.</p>
										<p>You must give us a reasonable opportunity to remedy any matter for which we are liable before you incur any costs remedying the matter yourself. If you do not, we shall have no liability to you for that matter.</p>
										<p>We shall not be liable for any damage to a Member caused or contributed to by that Member, for example by not complying with this Agreement.</p>
										<p>Our liability of any kind (including our own negligence) with respect to the Services for any one event or series of related events is limited to two times the total fees payable by you in the 12 months before the event(s) complained of or the sum of £250 whichever is higher.</p>
										<p>In no event (including our own negligence) will we be liable for any:</p>
										<ul class="terms_ul">
											<li>economic losses (including, without limit, loss of revenues, profits, contracts, business or anticipated savings);</li>
											<li>loss of goodwill or reputation;</li>
											<li>special, indirect or consequential losses; or and</li>
											<li>damage to or loss of data (even if we have been advised of the possibility of such losses).</li>
										</ul>
									<h4 class="terms_header margin-t30">	12. Indemnity </h4>
										<p>You agree to indemnify us (including our directors, officers, employees, subcontractors, agents and affiliated companies) against all third party claims and liabilities related to your breach of this agreement and/or to your use of the Services. Eldama Group Ltd retains the exclusive right to settle compromise and pay any and all Claims or causes of action which are brought against us without your prior consent.</p>
									<h4 class="terms_header margin-t30">	13. Functioning of the website and Services </h4>
										<p>To use the Services, the Member must have the necessary hardware equipment and software and the necessary parameters required to properly use the website i.e. access to the internet. Members are also advised to have JavaScript functions enabled, cookies enabled, and pop-ups enabled.</p>
										<p>You acknowledge and agree that any profiles of users and Members, as well as, communications from such persons may not be true, accurate or authentic and may be exaggerated or based on fantasy. You acknowledge and understand that you may be communicating with such persons and that we are not responsible for such communications.</p>																				<p>The Member must have the skills, hardware and software required to use the Internet or, as appropriate, Internet, and telephone services, and acknowledges that the characteristics and constraints of the Internet mean that the security, availability and integrity of Internet data transmissions cannot be guaranteed.</p>
										<p>We do not guarantee that the Services will function if the Member activates a pop-up killing tool. In this case, the function should be deactivated before using the Service.</p>
										<p>We do not guarantee that the Services will be usable if the Member's internet service provider is unable to provide its services properly. In this context, we cannot be held responsible for the non-functioning, unavailability or adverse conditions of usage of the website resulting from incorrect hardware, problems experienced by the Member's internet service provider or blockages on the Internet networks or for all other reasons outside our sphere of influence. Moreover, due amongst other things to the specifics of their Internet browser, Members connecting through AOL may encounter problems making our sites function properly. Furthermore, smartphone applications are only available to our Members in possession of the smartphone handset and internet access is required.</p>
										<p>Under these conditions, we do not guarantee that the Services shall function without interruption or error. In particular, the use of our website may be interrupted at any time for the purposes of maintenance, updates or technical improvements, or to develop its content and/or presentation. Whenever possible, we shall inform its Members prior to maintenance work or updates.</p>
									<h4 class="terms_header margin-t30">	14. Third party websites </h4>
										<p>We or third parties may provide links on our Site to third party websites. You use them at your own risk. We do not review such sites. We do not recommend or endorse such sites nor are we responsible for the content of those sites or any goods or services offered thereon. If in the course of performing a search on our site you encounter any third party website the use of which would violate applicable law, you must immediately cease use of such website.</p>
									<h4 class="terms_header margin-t30">	15. Termination </h4>
										<p>A Member may at any time and without the need to provide any reason end his/her registration with us by requesting the closure of his/her account in the area of the website designated for such purposes. Such request shall be deemed effective from the first working day after receipt by us of the request for closure of the account concerned. Such a request does not trigger reimbursement of, if appropriate, any time remaining on the Member's subscription.</p>
										<p>Termination of a subscription, by a Member, shall be effective on the applicable subscription's expiration date provided; the Member has contacted us at least 48 hours before their subscription expiration date in order to terminate the subscription.</p>
										<p>Without prejudice to the other provisions hereof, where the Member commits a serious breach, we will terminate the Member's account without prior notification or warning. Such termination shall have the same effects as a termination by the Member.</p>
										<p>Without prejudice to the other provisions hereof, where the Member commits a breach, we will terminate the Member's account seven (7) days after having sent to the Member an email requesting unsuccessfully that he or she comply with these Terms of Use.</p>
										<p>Such termination shall take effect without prejudice to any damages that we might claim from the Member or his/her beneficiaries and legal representatives, in compensation of the harm suffered as a result of such breaches.</p>
										<p>The Member will be informed by email of the termination, or the confirmation of the termination, of his/her account. Data relating to the Member will be destroyed at his/her request or upon expiration of the legal time period following the termination of the Member's account.</p>
										<p>As noted in herein, Members can also subscribe to smartphone application. Smartphone applications can be provided by other service providers and therefore may be subject to other termination requirements and provisions. Members are urged to consult their Smartphone application for full details.</p>
									<h4 class="terms_header margin-t30">	16. Entire Agreement </h4>
										<p>This Agreement and the pages on this website to which these terms refer, constitute a contract that governs the relationship between the Member and Eldama Group Ltd.</p>
										<p>If any of the provisions of these Terms of Use is declared void in application of a law, a regulation, or a final decision of a court having proper jurisdiction, all other provisions shall remain fully in effect. Furthermore, failure by a Party to take action in respect of the breach by the other Party of any provisions of these Terms of Use, shall not be interpreted as constituting a waiver by said first Party of the right to take action in future in respect of such a breach.</p>
									<h4 class="terms_header margin-t30">	17. Amendments </h4>
										<p>We may modify these Terms and Conditions at any time. The Member will be informed of the nature of these modifications as soon as they are posted on the website. The modifications shall take effect 14 days after their posting on the website. For Members registered after any modifications have been put online, these modifications shall be immediately applicable, as the Member will have expressly accepted them when the account was opened.</p>
									<h4 class="terms_header margin-t30">	18. Jurisdiction and Applicable Law </h4>
										<p>This contract shall be governed by English law and any disputes will be decided only by the English courts.</p>
										<p>For any questions you wish to ask, you may contact us by completing the contact form.</p>
										<h4> &nbsp;</h4>
								</div>
							</div>
					<!-- -->
						</div>
					</div>	
				</div>
			</div>
		</div>
		<!--Main Container end here-->
		<?php 
			//--Footer start here-->
			require("include/footer.php"); 
			//------its sign in and sign up----- -->
			include('include/sign-in.php') ;
		?>
	</div>
	
	
</body>
</html>