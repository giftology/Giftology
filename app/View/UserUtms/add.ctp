<?= $this->element('admin_header'); ?>
<div class="userUtms form">
<?php echo $this->Form->create('UserUtm'); ?>
	<fieldset>
		<legend><?php echo __('Add User Utm'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List User Utms'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
