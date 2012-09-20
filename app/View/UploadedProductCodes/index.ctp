<div class="uploadedProductCodes index">
	<h2><?php echo __('Uploaded Product Codes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('available'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($uploadedProductCodes as $uploadedProductCode): ?>
	<tr>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($uploadedProductCode['Product']['id'], array('controller' => 'products', 'action' => 'view', $uploadedProductCode['Product']['id'])); ?>
		</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['code']); ?>&nbsp;</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['available']); ?>&nbsp;</td>
		<td><?php echo h($uploadedProductCode['UploadedProductCode']['expiry']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $uploadedProductCode['UploadedProductCode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $uploadedProductCode['UploadedProductCode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $uploadedProductCode['UploadedProductCode']['id']), null, __('Are you sure you want to delete # %s?', $uploadedProductCode['UploadedProductCode']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
