
<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Giftology: FAQ');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>
		<?php echo $title_for_layout; ?>
	</title>



		
		<!-- jquery core -->
		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<!-- jquery plugins -->
		


		<?php
     
      echo $this->Minify->script('../js/highlight');
      echo $this->Minify->script('../js/jquery002');
      echo $this->Minify->css(array('highlight','demo'));
    ?>
	
<script type="text/javascript">
			$(document).ready(function() {

				//syntax highlighter
				hljs.tabReplace = '    ';
				hljs.initHighlightingOnLoad();

				//accordion
				$('h4.accordion').accordion({
					defaultOpen: 'section1',
					cookieName: 'accordion_nav',
					speed: 'slow',
					animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
						elem.next().slideFadeToggle(opts.speed);
					},
					animateClose: function (elem, opts) { //replace the standard slideDown with custom function
						elem.next().slideFadeToggle(opts.speed);
					}
				});
	
				$('h4.accordion2').accordion({
					defaultOpen: 'sample-1',
					cookieName: 'accordion2_nav',
					speed: 'slow',
					cssClose: 'accordion2-close', //class you want to assign to a closed accordion header
					cssOpen: 'accordion2-open',
					
				});

				//custom animation for open/close
				$.fn.slideFadeToggle = function(speed, easing, callback) {
					return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
				};

			});
		</script>
		<style type="text/css">
			#body {width:90%}
		</style>


	 
		
		
	
   
   
       
                    






          
  
   	  <div id="foot_content">
	<div class="content"><center><h2>TERMS & CONDITIONS</h2></center>
		<p>&nbsp;</p>
			<div id="accordion">
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section1">1. General T&C's<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>1.1 <a href="http://giftology.com" style="color:#900;">www.giftology.com</a>(the "<strong>Website</strong>") is a social gifting website, enabling its users to send and receive  gifts ("<strong>Gifts</strong>") to and from friends for gifts and products offered by Giftology and/or third party suppliers ("<strong>Merchants</strong>"). </p>
						<p>1.2   Giftology allows Merchants to market their brands through gifts offered on the Website. Note that in certain limited instances Giftology may promote its own products and/or services on the Website through Gifts.</p>
						<p>1.3   Visitors to the Website ("<strong>Users</strong>" or "<strong>you</strong>"), including those Users who purchase any Gifts via theWebsite ("<strong>Purchasers</strong>") are bound by these terms and conditions ("<strong>T&C</strong>").  These T&C constitute a legally binding contract between you and Giftology. <u> <i><font style="color:#333;"> If you do not agree to these T&C, do not continue to use the Website.  Your continued use of the Website will constitute acceptance of the T&C, unmodified by you.</font></i></u></p>
	
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section2">2. General restrictions on use<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>2.1   <strong>Geographic restriction:</strong>  Merchants are based in India, their Gifts being valid within India, and then usually only redeemable/collectable at a specific geographic location within India, during a specific time  period.Consequently, before purchasing a Gift, <u> <i><font style="color:#333;">please take note of when and where such Gift is redeemable.</font></i></u></p>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section3">3. Registering a user account.<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>3.1   The Website enables you to register online for a Giftology User account ("<strong>User Account</strong>") using your Facebook <b>account.</b> You will need to have a User Account and be logged into it in order to send,purchase and redeem Gifts. All permissions are managed through Facebook's external APIs and,as such, it is required that you abide by Facebook's terms and conditions, found on their website.</p>
<p>3.2   You may only hold one User Account, and in opening it, must be acting on your own behalf in your personal capacity.  You may not act as an agent for another person or open a User Account for another person.  Beneficial ownership of User Accounts is not permitted.</p><p>
3.3   To obtain a User Account you must provide Giftology, through Facebook's automated API, with certain information, including, but not limited to the following accurate information: your full names, date of birth, and your personal, permanent, valid and active email address which you access regularly.</p>
<p>3.4  When you register for and/or log into your User Account via Facebook, then you understand and agree that Facebook will disclose to us any information that it may have on record as being information which you have allowed them to share with others, as per your Facebook privacy settings.  You can restrict the information Facebook shares with us (or anyone else), by changing the privacy settings on your Facebook account. </p><p>
3.5   Giftology reserves the right to deny you a User Account, or to deny you access to certain or all of the services available to Users via the Website ("<strong>Services</strong>"), for any reason we in our sole discretion deem fit,including but not limited to suspected fraudulent activities, because you pose an unacceptable level of risk to us and/or any Merchants, or because you were previously suspended from using the Services. </p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section4">4. Merchants & their gifts<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>4.1   Each Gift is subject to its own terms and conditions ("<strong>Gift Conditions</strong>"), including, for example, that .</p>

						<ul style="list-style:none; margin-left:30px;">
 <li>a)   Gifts thereunder may only be redeemed at certain locations, either online or offline</li>
   <li>b)   Gifts thereunder may only be redeemed against certain purchases or against a particular total spend</li>
     <li>c)  You may only purchase one Gift per type of gift offered by a merchant ("<strong>Offer</strong>")</li>
<li>d)  You may only receive one Gift per type of gift offered by a merchant ("<strong>Offer</strong>")
Consequently, it is your responsibility to ensure that &nbsp; &nbsp; you read the Gift Conditions applicable to any specific Gift before purchasing a Gift thereunder. </li>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section5">5. Availability of Gifts <span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>5.1 Certain Gifts are targeted to particular recipients depending on the wishes of the merchant offering the Gifts. In some cases certain Gifts may be available to particular people.</p>

					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section6">6. Cost of Gifts<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>6.1   Free gifts are offered by merchants. These are generally offered at no cost to the gifter or the recipient.</p>
 <p>6.2   Paid Gifts are also available with Giftology. The displayed Gift price is inclusive of value-added tax ("VAT").</p>
<p>6.3   From time to time there may be additional charges, e.g. for shipping, due to be paid by either the gifter  or the recipient.</p>
<p>6.4   <strong>Errors: </strong> Although all reasonable efforts are taken to ensure that prices are accurately indicated, you acknowledge that errors can occur and that Merchants' standard pricing may change from time to time.  However, should a Gift be erroneously offered at an incorrect price, although you will not be entitled to purchase such Gift at such incorrect price, you will be refunded any monies already paid by you should you not wish to proceed with the purchase at the correct price.</p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body_section7">7. Promotional Gifts<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>7.1   Promotional (free gifts) may expire after a certain period of time as specified by the merchant.</p>
<p>7.2   Promotional (free gifts) that have not been "accepted" by a recipient after a certain period of time, usually 30 days, will expire. Should the gifter wish to re-send the gift, they will have to restart the giving process from scratch. No guarantees are made that the original gift will still be available.</p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">8. Payment methods<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>8.1   The price for each Gift is payable into Giftology's bank account.</p>
<p>8.2   You will be able to make payment into Giftology's bank account in any one of the following ways:</p>
<ul style="list-style:none; margin-left:30px;">
 <li>a)  <strong> Credit/Debit card payments:</strong>  Giftology currently accepts VISA and Mastercard <b>credit cards</b>, <b>net banking</b> options, <b>debit cards</b>, <b>cash cards</b> etc...  At the time of making your Gift purchase, the transaction details are; presented to the bank and an authorization is obtained for the Gift price.  If such authorisation is not obtained, the purchase will be cancelled.  If authorisation is obtained, payment in respect of the Gift may be collected immediately.</li></ul>
					</div>
				</div>
				<!-- end panel --><!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">9. Purchasing a gift<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		              <p>9.1   <strong>You will only have completed your purchase of a Gift if .</strong></p>
<ul style="list-style:none; margin-left:30px;">
 <li>a)   you enter the requested payment information;</li>
<li>b)  your acceptance of these T&C and the relevant Gift Conditions;  </li>
<li>c)   your payment for the Gift has been successfully authorised;</li>
<li>d)  Giftology sends you a confirmation email that the transaction has been concluded.</li></ul>
<p>9.2  <strong> Limited availability:</strong> Stocks of all Gifts are limited.  You cannot reserve a Gift for purchase later.  Unless and until we confirm the purchase has been completed, no purchase shall have occurred.</h5>
<p>9.3  <strong> Cancelling a Gift purchase:</strong></p>

<ul style="list-style:none; margin-left:30px;">
 <li>a)   By Giftology:  Giftology reserves the right, for purposes of preventing suspected fraud, to refuse to accept or process payment on any Gift purchase, on notice to you.   Giftology shall only be liable to refund monies already paid by you and accepts no other liability which may arise as a result of such refusal to process your Gift purchase.</li></ul>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">10. Delivery of Gifts<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>10.1   Any Gift purchased by you will be delivered in the manner required by that particular gift, this may be:</p>
<ul style="list-style:none; margin-left:30px;">
 <li>a)   Electronic: by email, sms, Facebook notification or some other electronic method to the address specified by the recipient</li>
<li>b)   Physical: by post, courier, or by hand to the delivery address specified by the recipient</li>
</ul>
<p>10.2   Each delivery method will be delivered by a particular date, either chosen by Giftology, or chosen by the gifter.</p>
<p>10.3   Giftology will not be responsible for any lost or stolen Gifts.</p>
					</div>
				</div>
				<!-- end panel -->

				

				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">11. Prohibited Conduct<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>Kindly email us at <strong><font style="color:#900;"><u> <i><font style="color:#900;">cs@giftology.com</font></i></u> </font></strong>with your concern. Also please mention your full name as on Facebook for us to identify your account with us. </p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">12. Privacy <span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>12.1  <strong> Types of information we collect:</strong> You agree that we may electronically collect, store and/or use the following of your information:</p>

<ul style="list-style:none; margin-left:30px;">
 <li>a)    name and surname, birth date, location and other details provided through your Facebook account <strong> ("Personal Details")</strong>;</li>
<li>b)   e-mail address, physical address, mobile number, and credit card billing address ("<strong>Contact Details</strong>");</li>
<li>c)  the credit card number, cardholder name and expiration date you submit to us in respect of your credit card(s) ("<strong>Card Details</strong>");</li>
<li>d)   internet usage information, including your Internet Protocol address ("IP Address"), browsing habits, click patterns, unique user ID, version of software installed, system type, screen resolutions, colour capabilities, plug-ins, language settings, cookie preferences, search engine keywords, JavaScript enablement, the content and pages that you access on the Website, and the dates and times that you visit the Website, paths taken, and time spent on sites and pages within the Website and Platform ("<strong>Usage Details</strong>"); and</li>
<li>e)   additional information you may provide on a voluntary basis, such as demographic information or information related to your favourite social networking site (eg. the site name, address and description), or information relating to your participation in competitions, promotions, surveys, and/or additional services ("<strong>Optional Details</strong>").</li></ul>


<p>12.2  <strong> How we collect information:</strong> Giftology collects the aforesaid information from you in the following manner:</p>
<ul style="list-style:none; margin-left:30px;">
 <li>a)  <strong> User-provided Information: </strong>You provide certain of the aforesaid information directly to us as follows: </li>
<ul style="list-style:none; ">
 <li>-  Your Personal Details and Contact Details are provided by you during your registration for a User Account and/or thereafter by your having actively updated or supplemented your details.</li>
<li>-   your Card Details will be provided by you each time you purchase a Gift on the Website.</li>
<li>-   Optional Details may be submitted by you to us if you decide to upload or download certain content (or products) from the Website, enter competitions, take advantage of promotions, respond to surveys, register and subscribe for certain additional services, or otherwise use the optional features and functionality of the Website.</li></ul>
<li>b)  <strong> "Cookies" Information: </strong> When you access the Website, we may send one or more cookies (small text files containing a string of alphanumeric characters) to your computer to collect certain Usage Details. Giftology may use both session cookies (which disappears after you close your browser) and persistent cookies (which remain after you close your browser which can be removed manually) and may be used by your browser on subsequent visits to the Website. Please note that the use of cookies is standard on the internet and many major websites use them. Please review your web browser "Help" file to learn more about modifying your cookie settings.  <strong>Note:</strong> Some of our business partners (e.g. advertisers) use cookies on our Website. We have no access to or control over these cookies. This clause covers the use of cookies by Giftology only and does not cover the use of cookies by any advertisers.</li>
<li>c)  <strong>Other tracking technology:</strong>When you access the Website or open one of our HTML emails, certain Usage Details may be automatically collected and recorded by us from your system by using different types of tracking technology.</li>
<li>d)  <strong> Web Beacons: </strong>Our Website may contain electronic image requests (called a "single-pixel gif" or "web beacon" request) that allow us to count page views and to access cookies. Any electronic image viewed as part of a web page (including an ad banner) can act as a web beacon. Web beacons are typically 1-by-1 pixel files (so small that you would most likely not realize that they are there), but their presence can usually be seen within a browser by clicking on "View" and then on "Source."  We may also include web beacons in HTML-formatted newsletters that we send to opt-in subscribers in order to count how many newsletters have been read. Giftology web beacons do not collect, gather, monitor or share any personally identifiable information about you, they are just the technique we use to compile anonymous information about the Website and Service usage.</li></ul>
<p>12.3   <strong>The purposes for which we collect the information: </strong> Giftology uses the information that you provide (or that we collect) to operate, maintain, enhance, and provide all of the Features and Services, to allow us to track user-generated content and Users to the extent necessary to comply with all applicable laws. Giftology uses all of the information collected to understand the usage trends and preferences of our Users, to improve the way the Website or Services work and look, and to create new features and functionality.<strong> More specifically:</strong></p>
<ul style="list-style:none; margin-left:30px;">
 <li>a)   We use your<strong>Card Details</strong> only in order to process your purchase of a Gift. We only store limited information allowed by law for customer service purposes, which is why you must re-enter such details every time you make a purchase on the Website.</li>
<li>b)  We use your <strong>Personal Details</strong> to greet you when you access your User Account, to manage and administer your use of the Services and fulfil our contractual obligations.  More specifically, you acknowledge and agree that your full names and contact number if relevant may be disclosed to Merchants from whom you have purchased Gifts to facilitate communication between you in relation to your use of the Gifts.</li>
<li>c)   We use your<strong> Contact Details</strong> to verify your identity and to inform you of facts relating to your use of the Services (eg. notifications regarding major updates or content you have posted or downloaded from the Website, customer service notifications, and to address copyright infringement or defamation issues) as well as to inform you, subject to obtaining your prior consent, of competitions, promotions and special offers form us and/or our partners and/or affiliates. We may also provide your email address and physical address details to Merchants from whom you have purchased Gifts to facilitate communication between you in relation to the usage of your Gift.</li>
<li>d)  We may use your<strong> Usage Details</strong> to:</li>
<ul style="list-style:none; ">
 <li>-   remember your information so that you will not have to re-enter it during your visit or the next time you access the Website;</li>
<li>-  monitor aggregate Website usage metrics such as total number of visitors and pages accessed; and</p>
<li>-  track your entries, submissions, and status in any promotions or other activities in connection with your usage of the Website.</li>
<li>-  We may use any <strong>Optional Details </strong>provided by you for such purposes as indicated to you at the time you agree to provide such Optional Details.</li></ul></ul>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">13. Security<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>Kindly email us at <u> <i><font style="color:#900;">cs@giftology.com</font></i></u> with your concern. Also please mention your full name as on Facebook for us to identify your account with us. </p>
		<p>13.1   Any person that delivers or attempts to deliver any damaging code to this Website or attempts to gain unauthorised access to any page on this Website shall be prosecuted and civil damages shall be claimed in the event that Giftology suffers any damage or loss.</p>
<p>13.2   You allow Giftology to take all reasonable steps to ensure the integrity and security of the Website and back-office applications.</p>
<p>13.3   All credit card transactions are Secure Socket Layers encrypted. Giftology's registration documents and the Website's registered domain name are checked and verified by a respected SSL certificate provider.</p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">14. Duration of, and change to these T&C<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>14.1   Giftology may, at its sole discretion, change these T&C or any part thereof at any time on notice to you.  It is your responsibility to ensure that you are satisfied with the amendments.  Should you not be satisfied with the amendments, you are entitled to terminate your User Account by notifying Giftology in writing to <u> <i><font style="color:#900;">info@giftology.com </font></i></u>and must refrain from making any further purchases on, or using in any way, the Website.</p>
<p>14.2   These T&C shall commence from the date on which they are published on the Website and continue indefinitely, as amended by Giftology from time to time (as described above), for so long as the Website exists and is operational, Giftology being entitled to terminate these T&C and/or shut down the Website at any time (subject to still processing any Gift purchases already made).</p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">15. Disputes<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>15.1  <strong> Between you and Giftology:</strong>  Save for urgent or interim relief which may be granted by a competent court, in the event of any dispute of any nature whatsoever arising between you and Giftology on any matter provided for in, or arising out of these T&C, and not resolved through the Customer Relations Department of Giftology, then such a dispute shall be submitted to confidential arbitration in terms of the expedited rules of the Arbitration Foundation of India. </p> 
<p>15.2  <strong> Between you and a Merchant:</strong>  Giftology is not your, nor any Merchant's agent, nor will it act as either of your agent in connection with resolving any disputes between you.</p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">16. Address for Notices<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>Giftology chooses as its address for all purposes under these T&C, whether in respect of court process, notice, or other documents or communication of whatsoever nature, the following address:  8, Siri fort road, New Delhi - 110049, India, with a copy to <u> <i><font style="color:#900;">cs@giftology.com</font></i></u> (the sending of such copy being required in order for any notice to be validly delivered to Giftology).</p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">17. Breach & termination<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>17.1   You are entitled at any time to terminate your User Account and/or your relationship with Giftology on written notice to Giftology at <u> <i><font style="color:#900;">info@giftology.com</font></i></u> provided that any Gift purchases already made by you which have not yet been sent will remain valid and enforceable against the relevant Merchant/s in accordance with these T&C.  Because such Gifts would also have been emailed to the recipient, they will still be able to access them.  PLEASE NOTE HOWEVER that if for some reason you have sent a Gift which failed to reach the recipient, or which they may have deleted from their email inbox, the termination of your User Account will serve to terminate any record of such Gift and you will no longer be able to redeem it.  Consequently, please ensure that all Gifts have been received before terminating your User Account.</p>
<p>17.2   Giftology will be entitled to temporarily suspend or permanently terminate your access to your User Account and/or some or all of the Services available via the Website as it in its discretion deems appropriate should you breach any provision of these T&C and fail to remedy such breach (if capable of remedy) within a reasonable period after written notice thereof to you.  In certain circumstances, where immediate suspension or termination is necessary to avoid possible harm to any Merchant/s, other User/s or Giftology itself, Giftology will be entitled to immediately suspend or terminate your access to your User Account and/or some or all Services to you, on notice to you. </p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">18. Copyright & other intellectual property rights<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>18.1   Any and all copyright subsisting in the Website, including these T&C, vests in Giftology and all rights not expressly granted are reserved. </p>
<p>18.2   You may only download, view and print content from this Website for private and non-commercial purposes.  To obtain permissions for the commercial use of any content on this Website, contact us at <u> <i><font style="color:#900;">cs@giftology.com</font></i></u> for assistance.</p>
<p>18.3   Giftology cannot screen or edit all the content available from the Website and does not accept any liability for illegal, defamatory or obscene content.  You are encouraged to inform Giftology of any content that may be offensive or illegal.</p>
<p>18.4   All the content, trademarks and data on this Website, including but not limited to, software, databases, text, graphics, icons, hyperlinks, private information, designs and agreements, are the property of or licensed to Giftology and as such are protected from infringement by local and international legislation and treaties.</p>

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">19. Electronic communications<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>When you visit the Website or send e-mails to Giftology, you consent to receiving communications from Giftology electronically and agree that all agreements, notices, disclosures and other communications sent by Giftology satisfy any legal requirements, including but not limited to the requirement that such communications should be "in writing". </p> 

					</div>
				</div>
				<!-- end panel -->


				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">20. Hyperlinks, framing, spiders & crawlers<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>20.1   No person, business or web site may link to any page on this Website without the prior written permission of Giftology.  Such permission could be obtained by contacting <u> <i><font style="color:#900;">cs@giftology.com</font></i></u></p>

<p>20.2   Hyperlinks provided on this Website to non-Giftology sites are provided as is and Giftology does not necessarily agree with, edit or sponsor the content on such web pages.</p>
<p>20.3   No person, business or web site may frame this site or any of the pages on this Website in any way whatsoever.</p>
<p>20.4   No person, business or web site may use any technology to search and gain any information from this Website without the prior written permission of Giftology. Such permission could be obtained from <u> <i><font style="color:#900;">cs@giftology.com</font></i></u>
</p>


					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">21. Disclaimer<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>
21.1   Save for Giftology being liable to you, neither Giftology nor any of its agents or representatives shall be liable for any damage, loss or liability of whatsoever nature arising from the use or inability to use this Website or the services or content provided from and through this Website.  Furthermore, Giftology makes no representations or warranties, implied or otherwise, that, amongst others, the content and technology available from this Website are free from errors or omissions or that the service will be 100% uninterrupted and error free.  You are encouraged to report any possible malfunctions and errors to <u> <i><font style="color:#900;">cs@giftology.com</font></i></u>.</p>
<p>21.2   The Website itself is supplied on an "as is" basis and has not been compiled or supplied to meet your individual requirements.  It is your sole responsibility to satisfy yourself prior to accepting these T&C that the service available from and through this Website will meet your individual requirements and be compatible with your hardware and/or software.</p>
<p>21.3   Information, ideas and opinions expressed on this Website should not be regarded as professional advice or the official opinion of Giftology and you are encouraged to consult professional advice before taking any course of action related to information, ideas or opinions expressed on this Website</p>

					</div>
				</div>
				<!-- end panel -->
			</div>
			
		</div>
	</div>
