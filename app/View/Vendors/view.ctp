<?= $this->element('admin_header'); ?>
<div class="vendors view">
<h2><?php  echo __('Vendor'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vendor['Vendor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($vendor['Vendor']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Thumb'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$vendor['Vendor']['thumb_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wide Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$vendor['Vendor']['wide_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$vendor['Vendor']['facebook_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Redeem Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$vendor['Vendor']['redeem_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendor Website Link '); ?></dt>
		<dd>
			<?php echo h($vendor['Vendor']['vendor_website_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Carousel Image'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$vendor['Vendor']['carousel_image']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vendor['Vendor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vendor['Vendor']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vendor'), array('action' => 'edit', $vendor['Vendor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vendor'), array('action' => 'delete', $vendor['Vendor']['id']), null, __('Are you sure you want to delete # %s?', $vendor['Vendor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($vendor['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Min Price'); ?></th>
		<th><?php echo __('Max Price'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Days Valid'); ?></th>
		<th><?php echo __('Terms'); ?></th>
		<th><?php echo __('Short Terms'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Vendor Id'); ?></th>
		<th><?php echo __('Product Type Id'); ?></th>
		<th><?php echo __('Product Segment Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($vendor['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['min_price']; ?></td>
			<td><?php echo $product['max_price']; ?></td>
			<td><?php echo $product['image']; ?></td>
			<td><?php echo $product['days_valid']; ?></td>
			<td><?php echo $product['terms']; ?></td>
			<td><?php echo $product['short_terms']; ?></td>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td><?php echo $product['vendor_id']; ?></td>
			<td><?php echo $product['product_type_id']; ?></td>
			<td><?php echo $product['product_segment_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>