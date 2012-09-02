		<div>
			<ul id="breadcrumbs">
				<li class="breadcrumb home events">
					<span class="left"></span>
					<a href="#"><span class="arrow"></span></a>
				</li>
				<li class="breadcrumb">
					<span class="left"></span>
					<a href="#events/53376186"><?= $receiver_name; ?><span class="arrow"></span></a>
				</li>
				<li>Send a gift</li>
			</ul>
		<?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
                                                                'ocasion' => $ocasion),
							  array('cache' => array('key'=>$receiver_name.$ocasion))
				   ); ?>
		</div>
	
		<div id="gift-details">
			<h3>Will be delivered: <strong>Today<!--?= substr($this->Time->niceShort($receiver_birthday), 0, -7); ?--></strong></h3>
			<div class="delivery-details">
			  	<div class="delivery-message">
					<div class="greeting-bubble">
				  		<textarea placeholder="Write something nice to <?= $receiver_name; ?>." name="message" class="message" autofocus="autofocus"></textarea>
					</div>
					<div class="shadow-wrapper">
				  		<div class="frame">
							<div class="img-placeholder male">
                						<?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                                                            <img src=<?= $photo_url; ?>>
    							</div>
				  		</div>
					</div>
			  	</div>
		  		<h4>Deliver your gift</h4>
		  		<div class="delivery-sharing">
					<div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="facebook" class="facebook">
						<label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
					</div>
					<div class="input email">
			  			<label for="email">Send email to</label>
			  			<input type="email" placeholder="<?= $receiver_name; ?>@example.com" name="email" id="email">
					</div>
		  		</div>
			<ul class="voucher-details"><li>This gift card is valid forever.</li></ul>
		</div>
		<div class="purchase voucher-container">
			<div class="voucher">
				<div class="paper"></div>
				<h2 class="value"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></h2>
    				<div class="divider"></div>
                                <img width="200" height="64" src="img/sephora.png" class="wide">
				<p class="at">at</p><p class="fine-print">Only valid in United States.</p>
				<div class="frame"></div>
			</div>
			<div class="disclosure opened">
				<p class="heading">Terms and conditions</p>
				<div class="wrapper" style="height: 295px;">
					<p class="content shown">Use of this Paid Gift Card constitutes acceptance of the following terms: Paid Gift Cards are redeemable for merchandise sold in U.S. Sephora stores, on Sephora.com for U.S. orders only, through the Sephora catalog and at Sephora inside JCPenney stores.  Paid Gift Cards are not redeemable for cash (except as required by law). This Paid Gift Card does not expire and is valid until redeemed.  The value of this Paid Gift Card will not be replaced if the card is lost, stolen, altered or destroyed.  Treat this card as cash. If your purchase exceeds the unused balance of the Paid Gift Card, you must pay the excess at the time of purchase. For questions regarding Paid Gift Cards or the Wrapp application, please contact support@wrapp.com. For Sephora store locations, to order, or for card balance, please visit Sephora.com or call 1.877.SEPHORA. Issued by Sephora USA, Inc.</p>
				</div>
				<a class="toggle">
					<span class="arrow"></span>
				</a>
			</div>
			<div class="minus-plus">
				<input type="hidden" name="contribution_amount" class="contribution_amount" value="1000">
				<button class="disabled minus"></button>
				<p class="amount"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></p>
				<button class="plus"></button>
			</div>
			<button class="buy" onClick="location.href='<?=
                            $this->Html->url(array('controller' => 'gifts',
                                                   'action' => 'send',
                                                   'receiver_fb_id' => $receiver_id,
                                                   'receiver_name' => $receiver_name,
                                                   'receiver_birthday' => $receiver_birthday,
                                                   'product_id' => $product['Product']['id']));; ?>'">Send to <?= $receiver_name; ?></button>
		</div>
	</div>	
	<div class="clear"></div>
	
	

