<div class="gifts index">
	<h2><?php echo __('Gifts'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('gift_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('gift_status_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($gifts as $gift): ?>
	<tr>
		<td><?php echo h($gift['Gift']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['Product']['id'], array('controller' => 'products', 'action' => 'view', $gift['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gift['Receiver']['id'], array('controller' => 'users', 'action' => 'view', $gift['Receiver']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gift['Sender']['id'], array('controller' => 'users', 'action' => 'view', $gift['Sender']['id'])); ?>
		</td>
		<td><?php echo h($gift['Gift']['code']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['gift_amount']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['created']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['modified']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['GiftStatus']['id'], array('controller' => 'gift_statuses', 'action' => 'view', $gift['GiftStatus']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gift['Gift']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gift['Gift']['id']), null, __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gift'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('controller' => 'gift_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Status'), array('controller' => 'gift_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
