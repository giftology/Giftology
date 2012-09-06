		<div>
			<ul id="breadcrumbs">
				<li class="breadcrumb home events">
					<span class="left"></span>
					<a href="<?= DOMAIN_NAME; ?>"><span class="arrow"></span></a>
				</li>
				<li class="breadcrumb">
					<span class="left"></span>
					<a href="<?= $this->Html->url(array('controller'=>'products',
								'action'=> 'view_products',
								'receiver_id' => $receiver_id,
								'receiver_name' => $receiver_name,
								'receiver_birthday' => $receiver_birthday,
								'ocasion' => $ocasion));
						?>"><?= $receiver_name; ?><span class="arrow"></span></a>
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
				  		<textarea placeholder="Write something nice to <?= $receiver_name; ?>." id="gift-message" name="gift-message" class="gift-message" autofocus="autofocus"></textarea>
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
					<div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="post_to_fb" class="facebook" checked>
						<label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
					</div>
					<div class="input email">
			  			<label for="email">Send email to</label>
			  			<input type="email" id="receiver_email" placeholder="<?= $receiver_name; ?>@example.com" name="receiver_email" id="email">
					</div>
		  		</div>
			<ul class="voucher-details"><li>This gift card is valid for <?= $product['Product']['days_valid']; ?> days.</li></ul>
			
			<button class="buy" onClick="location.href='<?=
                            $this->Html->url(array(
				'controller' => 'gifts',
				'action' => 'send',
				'receiver_fb_id' => $receiver_id,
				'receiver_name' => $receiver_name,
				'receiver_birthday' => $receiver_birthday,
				'product_id' => $product['Product']['id']));; ?>/receiver_email:'+document.getElementById('receiver_email').value+'/post_to_fb:'+document.getElementById('post_to_fb').checked+'/message:'+document.getElementById('gift-message').value">Send to <?= $receiver_name; ?>
			</button>

		</div>
		<div class="purchase voucher-container">
			<?= $this->element('gift_voucher',
                                        array('product' => $product,
					      'small' => false),
                                        array('cache' => array(
                                                'key' => $product['Product']['id'].'full'))); ?>
		</div>
	</div>	
	<div class="clear"></div>
	
	

