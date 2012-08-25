<div class="giftStatuses form">
<?php echo $this->Form->create('GiftStatus'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gift Status'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GiftStatus.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GiftStatus.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
	</ul>
</div>
