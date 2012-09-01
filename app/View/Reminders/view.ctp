<div class="reminders view">
<h2><?php  echo __('Reminder'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($reminder['User']['id'], array('controller' => 'users', 'action' => 'view', $reminder['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend Fb Id'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['friend_fb_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend Name'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['friend_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Friend Birthday'); ?></dt>
		<dd>
			<?php echo h($reminder['Reminder']['friend_birthday']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Reminder'), array('action' => 'edit', $reminder['Reminder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reminder'), array('action' => 'delete', $reminder['Reminder']['id']), null, __('Are you sure you want to delete # %s?', $reminder['Reminder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminder'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
