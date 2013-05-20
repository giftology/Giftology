<?= $this->element('admin_header'); ?>
<div class="users view">
<h2><?php  echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($user['User']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Facebook Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['facebook_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Last Login'); ?></dt>
		<dd>
			<?php echo h($user['User']['last_login']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Profiles'), array('controller' => 'user_profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Profile'), array('controller' => 'user_profiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Utms'), array('controller' => 'user_utms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Utm'), array('controller' => 'user_utms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Addresses'), array('controller' => 'user_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Address'), array('controller' => 'user_addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gifts Received'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transactions'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Reminders'), array('controller' => 'reminders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reminders'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related User Profiles'); ?></h3>
	<?php if (!empty($user['UserProfile'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['first_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Last Name'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['last_name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['email']; ?>
&nbsp;</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['mobile']; ?>
&nbsp;</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['city']; ?>
&nbsp;</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['gender']; ?>
&nbsp;</dd>
		<dt><?php echo __('Birthday'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['birthday']; ?>
&nbsp;</dd>
		<dt><?php echo __('Birthyear'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['birthyear']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $user['UserProfile']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit User Profile'), array('controller' => 'user_profiles', 'action' => 'edit', $user['UserProfile']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related User Utms'); ?></h3>
	<?php if (!empty($user['UserUtm'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['user_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Utm Source'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['utm_source']; ?>
&nbsp;</dd>
		<dt><?php echo __('Utm Medium'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['utm_medium']; ?>
&nbsp;</dd>
		<dt><?php echo __('Utm Campaign'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['utm_campaign']; ?>
&nbsp;</dd>
		<dt><?php echo __('Utm Term'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['utm_term']; ?>
&nbsp;</dd>
		<dt><?php echo __('Utm Content'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['utm_content']; ?>
&nbsp;</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['created']; ?>
&nbsp;</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
	<?php echo $user['UserUtm']['modified']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit User Utm'), array('controller' => 'user_utms', 'action' => 'edit', $user['UserUtm']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related User Addresses'); ?></h3>
	<?php if (!empty($user['UserAddress'])): ?>
	<table cellpadding = "0" cellspacing = "0"  border="1">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Address1'); ?></th>
		<th><?php echo __('Address2'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Pin Code'); ?></th>
		<th><?php echo __('Country'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UserAddress'] as $userAddress): ?>
		<tr>
			<td><?php echo $userAddress['id']; ?></td>
			<td><?php echo $userAddress['user_id']; ?></td>
			<td><?php echo $userAddress['address1']; ?></td>
			<td><?php echo $userAddress['address2']; ?></td>
			<td><?php echo $userAddress['city']; ?></td>
			<td><?php echo $userAddress['pin_code']; ?></td>
			<td><?php echo $userAddress['country']; ?></td>
			<td><?php echo $userAddress['created']; ?></td>
			<td><?php echo $userAddress['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_addresses', 'action' => 'view', $userAddress['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_addresses', 'action' => 'edit', $userAddress['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_addresses', 'action' => 'delete', $userAddress['id']), null, __('Are you sure you want to delete # %s?', $userAddress['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Address'), array('controller' => 'user_addresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($user['GiftsReceived'])): ?>
	<table cellpadding = "0" cellspacing = "0"  border="1">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Receiver Fb Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Gift Amount'); ?></th>
		<th><?php echo __('Gift Status Id'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GiftsReceived'] as $giftsReceived): ?>
		<tr>
			<td><?php echo $giftsReceived['id']; ?></td>
			<td><?php echo $giftsReceived['product_id']; ?></td>
			<td><?php echo $giftsReceived['sender_id']; ?></td>
			<td><?php echo $giftsReceived['receiver_id']; ?></td>
			<td><?php echo $giftsReceived['receiver_fb_id']; ?></td>
			<td><?php echo $giftsReceived['code']; ?></td>
			<td><?php echo $giftsReceived['gift_amount']; ?></td>
			<td><?php echo $giftsReceived['gift_status_id']; ?></td>
			<td><?php echo $giftsReceived['expiry_date']; ?></td>
			<td><?php echo $giftsReceived['created']; ?></td>
			<td><?php echo $giftsReceived['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $giftsReceived['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $giftsReceived['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $giftsReceived['id']), null, __('Are you sure you want to delete # %s?', $giftsReceived['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gifts Received'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($user['GiftsSent'])): ?>
	<table cellpadding = "0" cellspacing = "0" border="1" >
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Receiver Fb Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Gift Amount'); ?></th>
		<th><?php echo __('Gift Status Id'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GiftsSent'] as $giftsSent): ?>
		<tr>
			<td><?php echo $giftsSent['id']; ?></td>
			<td><?php echo $giftsSent['product_id']; ?></td>
			<td><?php echo $giftsSent['sender_id']; ?></td>
			<td><?php echo $giftsSent['receiver_id']; ?></td>
			<td><?php echo $giftsSent['receiver_fb_id']; ?></td>
			<td><?php echo $giftsSent['code']; ?></td>
			<td><?php echo $giftsSent['gift_amount']; ?></td>
			<td><?php echo $giftsSent['gift_status_id']; ?></td>
			<td><?php echo $giftsSent['expiry_date']; ?></td>
			<td><?php echo $giftsSent['created']; ?></td>
			<td><?php echo $giftsSent['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $giftsSent['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $giftsSent['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $giftsSent['id']), null, __('Are you sure you want to delete # %s?', $giftsSent['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gifts Sent'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Reminders'); ?></h3>
	<?php if (!empty($user['Reminders'])): ?>
	<table cellpadding = "0" cellspacing = "0"  border="1">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Friend Fb Id'); ?></th>
		<th><?php echo __('Friend Name'); ?></th>
		<th><?php echo __('Friend Birthday'); ?></th>
		<th><?php echo __('Friend Birthyear'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Reminders'] as $reminders): ?>
		<tr>
			<td><?php echo $reminders['id']; ?></td>
			<td><?php echo $reminders['user_id']; ?></td>
			<td><?php echo $reminders['friend_fb_id']; ?></td>
			<td><?php echo $reminders['friend_name']; ?></td>
			<td><?php echo $reminders['friend_birthday']; ?></td>
			<td><?php echo $reminders['friend_birthyear']; ?></td>
			<td><?php echo $reminders['created']; ?></td>
			<td><?php echo $reminders['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'reminders', 'action' => 'view', $reminders['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'reminders', 'action' => 'edit', $reminders['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reminders', 'action' => 'delete', $reminders['id']), null, __('Are you sure you want to delete # %s?', $reminders['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Reminders'), array('controller' => 'reminders', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
