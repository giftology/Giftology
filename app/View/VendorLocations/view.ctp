<?= $this->element('admin_header'); ?>
<div class="vendorLocations view">
<h2><?php  echo __('Vendor Location'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address1'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['address1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address2'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['address2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pin Code'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['pin_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone1'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['phone1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone2'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['phone2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone3'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['phone3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Google Maps Link'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['google_maps_link']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($vendorLocation['VendorLocation']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vendors'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vendorLocation['Vendors']['name'], array('controller' => 'vendors', 'action' => 'view', $vendorLocation['Vendors']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vendor Location'), array('action' => 'edit', $vendorLocation['VendorLocation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vendor Location'), array('action' => 'delete', $vendorLocation['VendorLocation']['id']), null, __('Are you sure you want to delete # %s?', $vendorLocation['VendorLocation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendor Locations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor Location'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendors'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
	</ul>
</div>
