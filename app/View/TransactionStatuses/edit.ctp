<div class="transactionStatuses form">
<?php echo $this->Form->create('TransactionStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Transaction Status'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TransactionStatus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('TransactionStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transaction Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
