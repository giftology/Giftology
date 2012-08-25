<div class="vendorLocations form">
<?php echo $this->Form->create('VendorLocation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vendor Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('address1');
		echo $this->Form->input('address2');
		echo $this->Form->input('city');
		echo $this->Form->input('pin_code');
		echo $this->Form->input('phone1');
		echo $this->Form->input('phone2');
		echo $this->Form->input('phone3');
		echo $this->Form->input('google_maps_link');
		echo $this->Form->input('vendors_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('VendorLocation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('VendorLocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vendor Locations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendors'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
	</ul>
</div>
