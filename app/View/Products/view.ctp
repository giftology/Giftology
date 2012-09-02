<div class="products view">
<h2><?php  echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['min_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Max Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['max_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Min Value'); ?></dt>
		<dd>
			<?php echo h($product['Product']['min_value']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo h($product['Product']['image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Days Valid'); ?></dt>
		<dd>
			<?php echo h($product['Product']['days_valid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terms'); ?></dt>
		<dd>
			<?php echo h($product['Product']['terms']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($product['Product']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendor'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Vendor']['name'], array('controller' => 'vendors', 'action' => 'view', $product['Vendor']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Type'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['ProductType']['type'], array('controller' => 'product_types', 'action' => 'view', $product['ProductType']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product Segment'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['ProductSegment']['id'], array('controller' => 'product_segments', 'action' => 'view', $product['ProductSegment']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($product['Product']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($product['Product']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Segments'), array('controller' => 'product_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Segment'), array('controller' => 'product_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($product['Gift'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Receiver Fb Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Gift Amount'); ?></th>
		<th><?php echo __('Gift Status Id'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Gift'] as $gift): ?>
		<tr>
			<td><?php echo $gift['id']; ?></td>
			<td><?php echo $gift['product_id']; ?></td>
			<td><?php echo $gift['sender_id']; ?></td>
			<td><?php echo $gift['receiver_id']; ?></td>
			<td><?php echo $gift['receiver_fb_id']; ?></td>
			<td><?php echo $gift['code']; ?></td>
			<td><?php echo $gift['gift_amount']; ?></td>
			<td><?php echo $gift['gift_status_id']; ?></td>
			<td><?php echo $gift['expiry_date']; ?></td>
			<td><?php echo $gift['created']; ?></td>
			<td><?php echo $gift['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $gift['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $gift['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), null, __('Are you sure you want to delete # %s?', $gift['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Transactions'); ?></h3>
	<?php if (!empty($product['Transaction'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Gift Id'); ?></th>
		<th><?php echo __('Amount Paid'); ?></th>
		<th><?php echo __('Transaction Status Id'); ?></th>
		<th><?php echo __('Pg Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Transaction'] as $transaction): ?>
		<tr>
			<td><?php echo $transaction['id']; ?></td>
			<td><?php echo $transaction['sender_id']; ?></td>
			<td><?php echo $transaction['receiver_id']; ?></td>
			<td><?php echo $transaction['product_id']; ?></td>
			<td><?php echo $transaction['gift_id']; ?></td>
			<td><?php echo $transaction['amount_paid']; ?></td>
			<td><?php echo $transaction['transaction_status_id']; ?></td>
			<td><?php echo $transaction['pg_id']; ?></td>
			<td><?php echo $transaction['created']; ?></td>
			<td><?php echo $transaction['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transactions', 'action' => 'view', $transaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transactions', 'action' => 'edit', $transaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transactions', 'action' => 'delete', $transaction['id']), null, __('Are you sure you want to delete # %s?', $transaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Uploaded Product Codes'); ?></h3>
	<?php if (!empty($product['UploadedProductCode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Value'); ?></th>
		<th><?php echo __('Available'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['UploadedProductCode'] as $uploadedProductCode): ?>
		<tr>
			<td><?php echo $uploadedProductCode['id']; ?></td>
			<td><?php echo $uploadedProductCode['product_id']; ?></td>
			<td><?php echo $uploadedProductCode['code']; ?></td>
			<td><?php echo $uploadedProductCode['value']; ?></td>
			<td><?php echo $uploadedProductCode['available']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'uploaded_product_codes', 'action' => 'view', $uploadedProductCode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'uploaded_product_codes', 'action' => 'edit', $uploadedProductCode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'uploaded_product_codes', 'action' => 'delete', $uploadedProductCode['id']), null, __('Are you sure you want to delete # %s?', $uploadedProductCode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
