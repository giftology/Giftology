<div class="gifts form">
<?php echo $this->Form->create('Gift'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gift'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('sender_id');
		echo $this->Form->input('receiver_id');
		echo $this->Form->input('receiver_fb_id');
		echo $this->Form->input('code');
		echo $this->Form->input('gift_amount');
		echo $this->Form->input('gift_status_id');
		echo $this->Form->input('expiry_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Gift.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Gift.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('controller' => 'gift_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Status'), array('controller' => 'gift_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
