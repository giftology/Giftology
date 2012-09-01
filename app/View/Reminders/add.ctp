<div class="reminders form">
<?php echo $this->Form->create('Reminder'); ?>
	<fieldset>
		<legend><?php echo __('Add Reminder'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('friend_fb_id');
		echo $this->Form->input('friend_name');
		echo $this->Form->input('friend_birthday');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Reminders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
