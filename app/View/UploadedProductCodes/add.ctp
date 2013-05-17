<?= $this->element('admin_header'); ?>
<div class="uploadedProductCodes form">
<?php echo $this->Form->create('UploadedProductCode', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Uploaded Product Code'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('code');
		echo $this->Form->input('available');
		echo $this->Form->input('upload', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
