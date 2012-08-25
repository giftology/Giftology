<div class="userUtms form">
<?php echo $this->Form->create('UserUtm'); ?>
	<fieldset>
		<legend><?php echo __('Edit User Utm'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('utm_source');
		echo $this->Form->input('utm_medium');
		echo $this->Form->input('utm_campaign');
		echo $this->Form->input('utm_term');
		echo $this->Form->input('utm_content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UserUtm.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UserUtm.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List User Utms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
