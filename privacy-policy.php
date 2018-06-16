<?php 
require('classes/profile_class.php');
$userProfileObj=new Profile();
$page='policy';
if(!empty($_SESSION['user_id'])){
	$user_id=$_SESSION['user_id'];
	$userResult = $userProfileObj->getUserInfo($user_id);
}
?>
<!doctype html>
<html>
<head>
	<title>Startrishta | Privacy Policy</title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" type="image/png" href="images/favico.png">
		<?php require("include/login-script.php"); ?>
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
							<!-- it's Side Menu -->
							<?php require("include/side-bar.php"); ?>
							<!-- it's Side Menu -->
						</div>
						<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 col_sm_9_small">
							<?php 
							$queryPrivacy=mysql_query("Select * from sr_cms where status='1' and page='privacy'");
							  $result=mysql_fetch_array($queryPrivacy);
							?>
							<div class="title_in red margin-b10 margin-t50 bold"> <h2><b><?php echo stripslashes($result['title']); ?></b></h2></div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="row terms lato font-15">
									 <p>This privacy policy applies to Eldama Group Ltd and its affiliate companies and brands.</p><p>The terms ‘us’, ‘we’, ‘our’ refers to all brands owned and operated by Eldama Group Ltd for the purposes of this Agreement.</p><p>We uphold the strictest of standards with respect to protection of privacy and of personal information. Our technical teams do their utmost to ensure the safety of our sites. Internet security is a complex issue and no system can be considered 100% secure. Should a security breach occur Startrishta.com will endeavour to act as fast as possible to remedy the problem.</p><p>Some information, comments or content (photographs or video) that the Member optionally provides may possibly, under the responsibility and on the initiative of the Member concerned, reveal the ethnic origin of the Member, his/her nationality, religion and/or sexual orientation. By providing such optional information, the Member concerned manifests his/her intention and, consequently, expressly consents to, and takes sole and exclusive responsibility for, the processing of this mentioned "sensitive" data by Startrishta.com Ltd.</p><p>Each Member can access or request access to information concerning him/her in order to have it modified, deleted or to forbid any further use by us. Members can submit such requests for access by mailing their requests to the following address: BM Startrishta.com, London, WC1N 3XX or by filling out the contact form, and each Member shall carefully identify the sender's personal information.</p><p>Each Member can, at the time of registration or at any time thereafter, request to receive and, subsequently, request without charge via startrishta.com to cease to receive, our newsletters and/or promotional offers sent to her/him by email or to mobile phone from Startrishta.com Ltd and/or its partners. The rights and warranties of startrishta.com Members respect in particular the UK Data Protection Act of 1998 implementing the EU Directive 95/46/EC dated 24 October 1995 on the protection of personal data and privacy within the European Union; and The Electronic Commerce Regulations of 2002 and the Privacy and Electronic Communications Regulations of 2003 implementing the EU Directive 2000/31/EC dated 8 June 2000 on electronic commerce and EU Directive 2002/58/EC dated 12 July 2002 on the protection of personal data and privacy in electronic communications</p>
								<h4 class="terms_header margin-t30">	1. When and why do we gather information about you?</h4>

									<p>The Member is asked to supply information about himself/herself when he/she registers with the Service, participates in a contest, responds to a survey, participates in a chat or acquires a subscription. Certain items of information are mandatory in order to gain access to Services.</p><p>We have the ability to retain your contact details should you input them on our website even if you do not complete your registration</p>
								<h4 class="terms_header margin-t30">	2. What sort of information do we gather?</h4>

									<p>Personal information gathered by startrishta.com can include your name, mailing and/or email address, fixed line and/or mobile telephone numbers, bank information, information about your physical appearance, photographs, voice recording, video, personal values, religion, interests, and your use of the Service.</p>									<p>Furthermore, certain non-personal information are also gathered, such as the version of the Member's and any other visitor's web browser, the operating system and the IP address of the computer from which they are visiting.</p>									<p>Finally, Startrishta.com uses cookies, designed to store information used to identify the Member while he/she is browsing on our websites, in order to allow the Member to continue browsing without having to re-enter this information for each new page. The Member always has the option of preventing the use of cookies by modifying the options of his/her web browser. See section 4 Cookies Policy for further information.</p>
								<h4 class="terms_header margin-t30">	3. Who has access to your information?</h4>

									<p>The information gathered about you when you register with startrishta.com and subscribe to our Services is used to offer you our different Services. All precautions have been taken on our databases to archive your information in a secure environment. Only a small number of our employees have access to your information, which is only accessible in case of necessity. The personal information you provide at the time of registration which does not comprise your personal ad and your profile will not be accessible by third parties, nor passed on, sold or exchanged, except in the cases named below and subject to your prior information and agreement, or in assumption of your non opposition hereto.</p>									<p>We may send you promotional offers from some of our partners, subject to your explicit and informed consent given during registration, unless you choose not to be contacted during your registration or unless you change your mind at any moment thereafter. If you do not wish to receive any special offers from Startrishta.com or from other partners companies, let us know when you join by visiting the "Settings" menu on the Startrishta.com website, or by going through our Contact us page.</p>									<p>Eldama Group Ltd may occasionally share general socio-demographic information that does not include names with selected partners to allow them to target their announcements (by age category, gender, etc.). In this case, we will not send these partners any information that would allow them to identify you.</p>									<p>The information contained in your personal ad, your search criteria and your profile can be accessed on Startrishta.com, on the web, by email (newsletters), by mobile telephone. In addition, this information may be broadcast directly by Eldama Group Ltd or via our partners to persons interested in Startrishta.com, through newsletters or third-party websites, or by all other electronic (email, text messaging, etc.) or audiovisual (radio, television, etc.) communication tools, or by written press (newspapers, magazines, etc.), to increase your chances of meeting someone by promoting your personal ads, search criteria and profile.</p>									<p>Consequently, the Member explicitly authorises Eldama Group Ltd to reproduce and broadcast the information contained in his/her personal ad, search criteria or profile (personal information, description, images, videos, etc.) on all or part of the Startrishta.com Services (on the website, on the Internet, by email) and/or in a general manner, on all distribution media, in particular audiovisual communication (press, radio, analogue television, digital television, cable or satellite) or electronic communication (email, Internet), throughout the entire world and for the length of time established in these Terms of Use between the Member and one of our websites.</p>									<p>For the purpose of applicable data protection legislation in the European Economic Area ("EEA"), the data controller of startrishta.com is Eldama Group Ltd Ltd (postal address: BM Startrishta.com, London, WC1N 3XX, registered office: 20-22 Wenlock Road, London, N1 7GU & registered number 8897921).</p>									<p>The Member explicitly authorises Eldama Group Ltd to transfer the information you provided to Startrishta.com and the benefits of the above mentioned rights to its partners and eventual successors of Startrishta.com.</p>									<p>If you no longer wish for Eldama Group Ltd or its partners to reproduce or broadcast the information comprised in your personal ad, your search criteria, or your profile, you can terminate your Startrishta.com account following the conditions foreseen in the Article "Termination". Since this information is comprised of your personal ad, your search criteria and your profile, the termination will only take effect upon the next update or version of these communications (printed, press, audiovisual, or electronic) containing your personal ad, your search criteria and your profile information.</p>
								<h4 class="terms_header margin-t30">	4. Cookies Policy </h4>

									<p>Cookies are small text files that are placed on your computer by websites that you visit or certain emails you open. They are widely used in order to make websites work, or work more efficiently, as well as to provide business and marketing information to the owners of the site. They contain information about the use of your computer but don't include personal information about you (they don't store your name, for instance).</p>									<p>For more detailed information about cookies visit www.allaboutcookies.org</p>									<p>This policy explains how cookies are used on Startrishta.com in general - and, below, how you can control the cookies that may be used on this site (not all of them are used on every site)</p>									<p><strong>About this Cookie policy</strong></p>									<p>This Cookie Policy applies to all of our websites and our mobile applications ("theWebsite"). In this Cookie Policy, when we refer to any of our Websites, we mean any website ormobile application operated by or on behalf of Startrishta.com Ltd or its subsidiaries and affiliates, regardless of how you access the network. This Cookie Policy forms part of and is incorporated into our Website Terms and Conditions</p><p>By accessing the Website, you agree that this Cookie Policy will apply whenever you accessthe Website on any device. Any changes to this policy will be posted here. We reserve the right to vary this Cookie Policy from time to time and such changes shall become effective as soon as they are posted. Your continued use of the Website constitutes your agreement to all such changes</p><p><strong>Our use of cookies</strong></p><p>We may collect information automatically when you visit the Website, using cookies. The cookies allow us to identify your computer and find out details about your last visit. You can choose, below, not to allow cookies. If you do, we can't guarantee that your experience with the Website will be as good as if you do allow cookies. The information collected by cookies does not personally identify you; it includes general information about your computer settings, your connection to the Internet e.g. operating system and platform, IP address, your browsing patterns and timings of browsing on the Website and your location. Most internet browsers accept cookies automatically, but you can change the settings of your browser to erase cookies or prevent automatic acceptance if you prefe</p><p>These links explain how you can control cookies via your browser - remember that if you turn off cookies in your browser then these settings apply to all websites not just this one:</p><ul><li>Internet Explorer http://support.microsoft.com/kb/278835 (this page links to further information for different versions of IE - the mobile version is at http:/ /www.microsoft.com/windowsphone/en-us/howto/wp7/web/changing-privacyand-other-browser-settings.aspx).</li><li>Chrome: http://support.google.com/chrome/bin/answer.py?hl=en-GB&answer=95647</li><li>Safari: http://docs.info.apple.com/article.html?path=Safari/5.0/en/9277.html(orhttp://support.apple.com/kb/HT1677 for mobile versions)</li><li>Firefox: http://support.mozilla.org/en-US/kb/ Enabling%20and%20disabling%20cookies</li><li>Blackberries: http://docs.blackberry.com/en/smartphone_users/deliverables/32004/Turn_off_cookies_in_the_browser_60_1072866_11.jsp</li><li>Android: http://support.google.com/mobile/bin/answer.py?hl=en&answer=169022</li><li>Opera: http://www.opera.com/browser/tutorials/security/privacy/1</li></ul><p><strong>Types of cookie that may be used during your visit to the Website:</strong></p><p>The following types of cookie are used on this site. We don't list every single cookie used by name - but for each type of cookie we tell you how you can control its use.</p><ul><li><strong>Analytics cookies</strong><br /><p>These monitor how visitors move around the Website and how they reached it. This is used so that we can see total (not individual) figures on which types of content users enjoy most, for instance.</p><p>You can opt out of these if you want:</p><ul><li>Omniture: http://www.omniture.com/en/privacy/2o7#optout</li><li>Google: https://tools.google.com/dlpage/gaoptout</li></ul><ol><li><strong>Third-party service cookies</strong><p>The social sharing services we offer are run by other companies. These companies may drop cookies on your computer when you use them on our site or if you are already logged in to them.</p><p>Here is a list of places where you can find out more about specific services that we may use and their use of cookies:</p><p>Facebook's data use policy: http://www.facebook.com/about/privacy/your-info-on-other</p><p>Twitter's privacy policy: https://twitter.com/privacy</p></li><li><strong>Our own ad serving and management cookies</strong><p>We sell space on some of our websites to advertisers - they pay for the content that you enjoy for free. As part of this, we use several services to help us and advertisers understand what adverts you might be interested in. These cookies hold information about the computer - they don't hold personal information about you (ie it's not linked to you as an individual). But they might hold a record of what other websites you've looked at - so we could show you a car advert if you've previously visited a motoring website.</p><p>These are the services we use and how you can control those cookies.</p><ol><li>Emediate (Ad-serving Technology): Privacy policy and opt out via http://www.emediate.com/143/</li><li>Connextra (Ad-serving Technology): Privacy policy and opt out via http://connextra.net/privacy_policy.htm</li><li>Doubleclick (Ad-serving Technolocy): Privacy policy at <a href="http://www.google.com/">http://www.google.com/</a>doubleclick/privacy/ and opt out via http://www.youronlinechoices.com/uk/</li><li>Smart Ad-server (Ad-serving Technology): Privacy policy and opt out via http://smartadserver.com/privacy-policy</li></ol><p>Please note that turning off advertising cookies will not mean that you are not served any advertising but merely that it will not be tailored to your interests.</p></li><li><strong>Other ad management cookies</strong><p>Some advertisements on the Website are provided by other organisations. Our advertising partners will serve advertisements that they believe are most likely to be of interest to you, based on information about your visit to the Website and other websites. In order to do this, our advertising partner may need to place a cookie on your computer. These cookies hold information about the computer - they don't hold personal information about you (ie it's not linked to you as an individual).</p><ol><li>AdJug (Advertising Partner): Privacy policy and opt out via http://www.adjug.com/info/privacy.asp</li><li>Specific Media (Advertising Partner): Privacy policy and opt out via http://www.specificmedia.co.uk/privacy</li><li>Criteo UK (Advertising Partner): Privacy policy and opt out via http://www.criteo.com/us/privacy-policy</li><li>Xaxis UK (Advertising Partner): Privacy policy and opt out via http://www.xaxis.com/uk/page/privacy-policy</li><li>YOC Performance (Mobile Advertising Partner): Privacy policy and opt out via https://www.yoc-performance.com/company_privacy.html</li><li>AOL Advertising (Advertising Partner) - Privacy policy available at http://privacy.aol.co.uk and opt-out at http://www.youronlinechoices.com/uk/your-adchoices</li></ol><p><strong>Rubicon (Ad-serving Technology)</strong></p><p>More information on Rubicon Project and how it helps both website operators and their site users may be obtained here: http://www.rubiconproject.com/whoweare .You can control Rubicon Project cookies and opt out of them altogether, if you wish, here: http://www.rubiconproject.com/privacy/consumer-online-profile-and-opt-out. Further information on the use of personal data and use of the Online Behavioural. Advertising (OBA) &lsquo;AdChoices&rsquo; icon for online advertising is provided by the Interactive</p><p><strong>Advertising Bureau (IAB) Europe:</strong></p><ol><li>EU countries: http://www.youronlinechoices.eu</li><li>UK: http://www.youronlinechoices.com/uk</li><li>UK opt-outs: http://www.youronlinechoices.com/uk/your-ad-choices</li></ol><p><strong>Site users in the United States should visit:</strong></p><ol><li>NAI (Network Advertising Initiative): http://www.networkadvertising.org/managing/opt_out.asp</li><li>or DAA (Digital Advertising Alliance) About Ads: http://www.aboutads.info/choices/</li></ol><p>You can also opt out of all advertising-related cookies on the above sites. Please note that turning off advertising cookies will not mean that you are not served any advertising but merely that it will not be tailored to your interests.</p></li><li><strong>Site management cookies</strong><p>These are used to maintain your identity or session on the Website. For instance, where our websites run on more than one server, we use a cookie to ensure that you are sent information by one specific server (otherwise you may log in or out unexpectedly). We may use similar cookies when you vote in opinion polls to ensure that you can only vote once. These cookies cannot be turned off individually but you could change your browser setting to refuse all cookies (see above) if you do not wish to accept them.</p></li></ol>
									<h4> &nbsp;</h4>
					
					
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--Main Container end here-->
			<?php 
			//--Footer start here-->
			require("include/footer.php"); 
			//------its sign in and sign up------->
			include('include/sign-in.php') ;
		?>
	</div>
</body>
</html>