	<div>
		<ul id="breadcrumbs">
			<li class="breadcrumb home events">
				<span class="left"></span>
				<a href="#"><span class="arrow"></span></a>
			</li>
			<li><?= $receiver_name; ?></li>
		</ul>
		<?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
								'ocasion' => $ocasion),
							  array('cache' => array('key'=>$receiver_name.$ocasion))
				   ); ?>
	</div>
	
	<div>
		<h3 class="line-header">
			<span>Send a gift card</span>
		</h3>
		
		<div id="campaigns">
                        <?php foreach ($products as $product): ?>
			<div class="small-voucher">
				<a href="<?= $this->Html->url(array('controller' => 'products',
                                                                    'action' => 'view_product',
                                                                    'receiver_id' => $receiver_id,
                                                                    'receiver_name' => $receiver_name,
                                                                    'receiver_birthday' => $receiver_birthday,
                                                                    $product['Product']['id'])); ?>">
					<span class="free  voucher">
						<span class="featured-frame"></span>
						<span class="selected-overlay"></span>
						<span class="image-container">
							<span class="image-frame"></span>
							<img src="<?= DOMAIN_NAME.$product['Product']['image']; ?>">						</span>
						<span class="details">
							<span class="issuer"><?= $product['Vendor']['name']; ?></span>
							<span class="value"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></span>
							<span class="label">FREE</span>
                                                </span>
                                        </span>
                                </a>
                        </div>
			<?php endforeach; ?>
		</div>
		
		
	</div>	
	<div class="clear"></div>
	
	
