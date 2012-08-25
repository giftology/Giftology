<div class="transactions index">
	<h2><?php echo __('Transactions'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gifts_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount_paid'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pg_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($transactions as $transaction): ?>
	<tr>
		<td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['Sender']['id'], array('controller' => 'users', 'action' => 'view', $transaction['Sender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Receiver']['id'], array('controller' => 'users', 'action' => 'view', $transaction['Receiver']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Product']['id'], array('controller' => 'products', 'action' => 'view', $transaction['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Gifts']['id'], array('controller' => 'gifts', 'action' => 'view', $transaction['Gifts']['id'])); ?>
		</td>
		<td><?php echo h($transaction['Transaction']['amount_paid']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['transaction_status_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['pg_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['created']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), null, __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gifts'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Statuses'), array('controller' => 'transaction_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Statuses'), array('controller' => 'transaction_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
