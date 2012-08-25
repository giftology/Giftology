<div class="transactions view">
<h2><?php  echo __('Transaction'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Sender']['id'], array('controller' => 'users', 'action' => 'view', $transaction['Sender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receiver'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Receiver']['id'], array('controller' => 'users', 'action' => 'view', $transaction['Receiver']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Product']['id'], array('controller' => 'products', 'action' => 'view', $transaction['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gifts'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transaction['Gifts']['id'], array('controller' => 'gifts', 'action' => 'view', $transaction['Gifts']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount Paid'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['amount_paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transaction Status Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['transaction_status_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pg Id'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['pg_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transaction['Transaction']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transaction'), array('action' => 'edit', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transaction'), array('action' => 'delete', $transaction['Transaction']['id']), null, __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?> </li>
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
