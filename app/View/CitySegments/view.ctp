<div class="citySegments view">
<h2><?php  echo __('City Segment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($citySegment['CitySegment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($citySegment['CitySegment']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo h($citySegment['CitySegment']['state']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo h($citySegment['CitySegment']['country']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Latitude'); ?></dt>
		<dd>
			<?php echo h($citySegment[0]['latitude']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Longitude'); ?></dt>
		<dd>
			<?php echo h($citySegment[0]['longitude']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit City Segment'), array('action' => 'edit', $citySegment['CitySegment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete City Segment'), array('action' => 'delete', $citySegment['CitySegment']['id']), null, __('Are you sure you want to delete # %s?', $citySegment['CitySegment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List City Segments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New City Segment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($citySegment['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Min Price'); ?></th>
		<th><?php echo __('Max Price'); ?></th>
		<th><?php echo __('Min Value'); ?></th>
		<th><?php echo __('Days Valid'); ?></th>
		<th><?php echo __('Terms'); ?></th>
		<th><?php echo __('Redeem Instr'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Vendor Id'); ?></th>
		<th><?php echo __('Product Type Id'); ?></th>
		<th><?php echo __('Gender Segment Id'); ?></th>
		<th><?php echo __('City Segment Id'); ?></th>
		<th><?php echo __('Age Segment Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($citySegment['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['min_price']; ?></td>
			<td><?php echo $product['max_price']; ?></td>
			<td><?php echo $product['min_value']; ?></td>
			<td><?php echo $product['days_valid']; ?></td>
			<td><?php echo $product['terms']; ?></td>
			<td><?php echo $product['redeem_instr']; ?></td>
			<td><?php echo $product['code']; ?></td>
			<td><?php echo $product['vendor_id']; ?></td>
			<td><?php echo $product['product_type_id']; ?></td>
			<td><?php echo $product['gender_segment_id']; ?></td>
			<td><?php echo $product['city_segment_id']; ?></td>
			<td><?php echo $product['age_segment_id']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
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
