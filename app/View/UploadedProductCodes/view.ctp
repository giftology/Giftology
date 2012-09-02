<div class="uploadedProductCodes view">
<h2><?php  echo __('Uploaded Product Code'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($uploadedProductCode['UploadedProductCode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($uploadedProductCode['Product']['id'], array('controller' => 'products', 'action' => 'view', $uploadedProductCode['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($uploadedProductCode['UploadedProductCode']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Available'); ?></dt>
		<dd>
			<?php echo h($uploadedProductCode['UploadedProductCode']['available']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Uploaded Product Code'), array('action' => 'edit', $uploadedProductCode['UploadedProductCode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Uploaded Product Code'), array('action' => 'delete', $uploadedProductCode['UploadedProductCode']['id']), null, __('Are you sure you want to delete # %s?', $uploadedProductCode['UploadedProductCode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
