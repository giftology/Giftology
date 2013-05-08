
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
	<div class="content"><center><h2>FAQ</h2></center>
		<p>&nbsp;</p>
			<div id="accordion">
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section1">What is Giftology?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Giftology serves as a ‘discovery platform’ where users can explore a plethora of brands and exciting gifts which they can send to Facebook registered friends and family anywhere in India. Our free gift cards save your time, money and effort to choose the right gift.
						You can make it even bigger (in value) by contributing towards gifts to your dear ones!!</p>
	
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section2">What? Are there free gifts? Is this real?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Yes, this is real! Pinky swear.Giftology offers this service for free, with no charge to the user.Our partners use Giftology as a platform to market themselves using Facebook. We bring them closer to users and they offer users free gifts, simple.</p>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section3">I've sent a gift, how do I know my friend has received it?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>&nbsp;1. Your friend will be notified that they've received a gift using the notification methods you choose: by email, on Facebook, or both.</p>
	  <p>&nbsp;2. It's up to your friends to then login to Giftology and "accept" their gift. If they haven't done this yet, you'll have to remind them.</p>
	  <p>&nbsp;3. Sometimes gifts need to be delivered to the recipient. In this case we'll send it to them once we have received the payment (in case of cash payment via Gharpay–coming soon).</p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section4">Where are these gift accepted?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Some gifts are used on partner websites and others in the specific store or location.If there are any conditions please refer to the offer details.</p>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section5">Do these gifts have an expiry date?  <span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Yes, they do. Partners gifts are typically valid from 15 days to 365 days.</p>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section6">Are there any terms and conditions associated with the gifts?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Terms and conditions associated with each gift vary. Hence we request you to go through the complete T&C as well as the procedure of redeeming them to avoid any ambiguity as well as to ensure the entire gifting process is smooth.</p>
						
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body_section7">Why does my voucher show as Expired?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						<p>Oh no! This means the gift voucher is no more redeemable due to the following reasons:</p>
						 <p>&nbsp;1. The gift may have surpassed its “valid up-to” date</p>
						 <p>&nbsp;2. The gift offered by our partner has been withdrawn</p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">How can I pay for gifts?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
						 <p>Paying is simple on Giftology. We offer the following payment modes:</p>
						 <p>&nbsp;- Credit cards</p>
						 <p>&nbsp;- Debit cards</p>
						 <p>&nbsp;- Net banking</p>
						 <p>&nbsp;- Prepaid Cash cards</p>
					</div>
				</div>
				<!-- end panel --><!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">Are there any hidden charges?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		               <p>There is no fine print. Everything is clearly specified on the website.</p>
					</div>
				</div>
				<!-- end panel -->
				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">Will I receive an invoice along with the order?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>Yes, an email containing the order details will be sent to the email id registered on Facebook. If you haven’t received one, please contact us on <strong>cs@giftology.com.</strong>This is to be retained for any future clarity.</p>
					</div>
				</div>
				<!-- end panel -->

				<!-- panel -->
				<h4 class="accordion accordion-close" id="body-section8">Who should I contact for payment related issues?<span></span></h4>
				<div style="display: none;" class="container">
					<div class="content">
		<p>Kindly email us at <strong>cs@giftology.com </strong>with your concern. Also please mention your full name as on Facebook for us to identify your account with us. </p>

					</div>
				</div>
				<!-- end panel -->
			</div>
			
		</div>
	</div>
