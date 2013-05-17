<?= $this->element('admin_header'); ?>
<div class="vendorLocations index">
	<h2><?php echo __('Vendor Locations'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('pin_code'); ?></th>
			<th><?php echo $this->Paginator->sort('phone1'); ?></th>
			<th><?php echo $this->Paginator->sort('phone2'); ?></th>
			<th><?php echo $this->Paginator->sort('phone3'); ?></th>
			<th><?php echo $this->Paginator->sort('google_maps_link'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('vendors_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($vendorLocations as $vendorLocation): ?>
	<tr>
		<td><?php echo h($vendorLocation['VendorLocation']['id']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['address1']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['address2']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['city']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['pin_code']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['phone1']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['phone2']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['phone3']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['google_maps_link']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['created']); ?>&nbsp;</td>
		<td><?php echo h($vendorLocation['VendorLocation']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($vendorLocation['Vendors']['name'], array('controller' => 'vendors', 'action' => 'view', $vendorLocation['Vendors']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $vendorLocation['VendorLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $vendorLocation['VendorLocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $vendorLocation['VendorLocation']['id']), null, __('Are you sure you want to delete # %s?', $vendorLocation['VendorLocation']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Vendor Location'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendors'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
	</ul>
</div>
