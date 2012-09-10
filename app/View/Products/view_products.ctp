	<div>
		<ul id="breadcrumbs">
			<li class="breadcrumb home events">
				<span class="left"></span>
				<a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
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
			<a href="<?= $this->Html->url(array('controller' => 'products',
				    'action' => 'view_product',
				    'receiver_id' => $receiver_id,
				    'receiver_name' => $receiver_name,
				    'receiver_birthday' => $receiver_birthday,
				    'ocasion' => $ocasion,
				    $product['Product']['id'])); ?>">

				<?= $this->element('gift_voucher',
						array('product' => $product,
						      'small' => true),
						array('cache' => array(
							'key' => $product['Product']['id'].'small'))); ?>
			</a>
			<?php endforeach; ?>
		</div>
		
		
	</div>	
	<div class="clear"></div>
	
	
