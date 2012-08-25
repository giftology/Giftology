<div class="userUtms view">
<h2><?php  echo __('User Utm'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userUtm['User']['id'], array('controller' => 'users', 'action' => 'view', $userUtm['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm Source'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['utm_source']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm Medium'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['utm_medium']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm Campaign'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['utm_campaign']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm Term'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['utm_term']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Utm Content'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['utm_content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userUtm['UserUtm']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User Utm'), array('action' => 'edit', $userUtm['UserUtm']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User Utm'), array('action' => 'delete', $userUtm['UserUtm']['id']), null, __('Are you sure you want to delete # %s?', $userUtm['UserUtm']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List User Utms'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Utm'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
