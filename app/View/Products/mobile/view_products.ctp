
<div>	
        <ul data-role="listview" data-theme="c">
		<?php foreach ($products as $product): ?>
		<li>
			<a href="<?= $this->Html->url(array('controller' => 'products',
				    'action' => 'view_product',
				    'receiver_id' => $receiver_id,
				    'receiver_name' => $receiver_name,
				    'receiver_birthday' => $receiver_birthday,
				    'ocasion' => $ocasion,
				    $product['Product']['id'])); ?>" rel="external">
                        <img src="<?= FULL_BASE_URL.'/'.$product['Vendor']['thumb_image']; ?>">
			<span class="issuer"><?= $product['Vendor']['name']; ?></span>
			<span class="mobile_label">FREE</span>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	
	
</div>	
<div class="clear"></div>

	
