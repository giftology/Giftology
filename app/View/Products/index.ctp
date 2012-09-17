<div class="products index">
	<h2><?php echo __('Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('min_price'); ?></th>
			<th><?php echo $this->Paginator->sort('max_price'); ?></th>
			<th><?php echo $this->Paginator->sort('min_value'); ?></th>
			<th><?php echo $this->Paginator->sort('days_valid'); ?></th>
			<th><?php echo $this->Paginator->sort('terms_heading'); ?></th>
			<th><?php echo $this->Paginator->sort('terms'); ?></th>
			<th><?php echo $this->Paginator->sort('redeem_instr'); ?></th>
			<th><?php echo $this->Paginator->sort('code_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('vendor_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gender_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('city_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('age_segment_id'); ?></th>
			<th><?php echo $this->Paginator->sort('display_order'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['min_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['max_price']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['min_value']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['days_valid']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['terms_heading']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['terms']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['redeem_instr']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['CodeType']['name'], array('controller' => 'code_types', 'action' => 'view', $product['CodeType']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['code']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Vendor']['name'], array('controller' => 'vendors', 'action' => 'view', $product['Vendor']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['ProductType']['type'], array('controller' => 'product_types', 'action' => 'view', $product['ProductType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['GenderSegment']['gender'], array('controller' => 'gender_segments', 'action' => 'view', $product['GenderSegment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['CitySegment']['city'], array('controller' => 'city_segments', 'action' => 'view', $product['CitySegment']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['AgeSegment']['name'], array('controller' => 'age_segments', 'action' => 'view', $product['AgeSegment']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['display_order']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['created']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gender Segments'), array('controller' => 'gender_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender Segment'), array('controller' => 'gender_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Age Segments'), array('controller' => 'age_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Age Segment'), array('controller' => 'age_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List City Segments'), array('controller' => 'city_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City Segment'), array('controller' => 'city_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Code Types'), array('controller' => 'code_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Code Type'), array('controller' => 'code_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
