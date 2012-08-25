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
		<li><?php echo $this->Html->link(__('List User Addresses'), array('controller' => 'user_addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Address'), array('controller' => 'user_addresses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Profiles'), array('controller' => 'user_profiles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Profile'), array('controller' => 'user_profiles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Utms'), array('controller' => 'user_utms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Utm'), array('controller' => 'user_utms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gifts Sent'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Addresses'); ?></h3>
	<?php if (!empty($user['UserAddress'])): ?>
	<table cellpadding = "0" cellspacing = "0">
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
	<h3><?php echo __('Related User Profiles'); ?></h3>
	<?php if (!empty($user['UserProfile'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('First Name'); ?></th>
		<th><?php echo __('Last Name'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('Gender'); ?></th>
		<th><?php echo __('Birthday'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UserProfile'] as $userProfile): ?>
		<tr>
			<td><?php echo $userProfile['id']; ?></td>
			<td><?php echo $userProfile['user_id']; ?></td>
			<td><?php echo $userProfile['first_name']; ?></td>
			<td><?php echo $userProfile['last_name']; ?></td>
			<td><?php echo $userProfile['email']; ?></td>
			<td><?php echo $userProfile['city']; ?></td>
			<td><?php echo $userProfile['gender']; ?></td>
			<td><?php echo $userProfile['birthday']; ?></td>
			<td><?php echo $userProfile['created']; ?></td>
			<td><?php echo $userProfile['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_profiles', 'action' => 'view', $userProfile['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_profiles', 'action' => 'edit', $userProfile['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_profiles', 'action' => 'delete', $userProfile['id']), null, __('Are you sure you want to delete # %s?', $userProfile['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Profile'), array('controller' => 'user_profiles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related User Utms'); ?></h3>
	<?php if (!empty($user['UserUtm'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Utm Source'); ?></th>
		<th><?php echo __('Utm Medium'); ?></th>
		<th><?php echo __('Utm Campaign'); ?></th>
		<th><?php echo __('Utm Term'); ?></th>
		<th><?php echo __('Utm Content'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['UserUtm'] as $userUtm): ?>
		<tr>
			<td><?php echo $userUtm['id']; ?></td>
			<td><?php echo $userUtm['user_id']; ?></td>
			<td><?php echo $userUtm['utm_source']; ?></td>
			<td><?php echo $userUtm['utm_medium']; ?></td>
			<td><?php echo $userUtm['utm_campaign']; ?></td>
			<td><?php echo $userUtm['utm_term']; ?></td>
			<td><?php echo $userUtm['utm_content']; ?></td>
			<td><?php echo $userUtm['created']; ?></td>
			<td><?php echo $userUtm['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_utms', 'action' => 'view', $userUtm['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_utms', 'action' => 'edit', $userUtm['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_utms', 'action' => 'delete', $userUtm['id']), null, __('Are you sure you want to delete # %s?', $userUtm['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Utm'), array('controller' => 'user_utms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($user['GiftsSent'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Gift Amount'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Gift Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GiftsSent'] as $giftsSent): ?>
		<tr>
			<td><?php echo $giftsSent['id']; ?></td>
			<td><?php echo $giftsSent['product_id']; ?></td>
			<td><?php echo $giftsSent['receiver_id']; ?></td>
			<td><?php echo $giftsSent['sender_id']; ?></td>
			<td><?php echo $giftsSent['code']; ?></td>
			<td><?php echo $giftsSent['gift_amount']; ?></td>
			<td><?php echo $giftsSent['expiry_date']; ?></td>
			<td><?php echo $giftsSent['created']; ?></td>
			<td><?php echo $giftsSent['modified']; ?></td>
			<td><?php echo $giftsSent['gift_status_id']; ?></td>
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
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($user['GiftsReceived'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Receiver Id'); ?></th>
		<th><?php echo __('Sender Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Gift Amount'); ?></th>
		<th><?php echo __('Expiry Date'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Gift Status Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['GiftsReceived'] as $giftsReceived): ?>
		<tr>
			<td><?php echo $giftsReceived['id']; ?></td>
			<td><?php echo $giftsReceived['product_id']; ?></td>
			<td><?php echo $giftsReceived['receiver_id']; ?></td>
			<td><?php echo $giftsReceived['sender_id']; ?></td>
			<td><?php echo $giftsReceived['code']; ?></td>
			<td><?php echo $giftsReceived['gift_amount']; ?></td>
			<td><?php echo $giftsReceived['expiry_date']; ?></td>
			<td><?php echo $giftsReceived['created']; ?></td>
			<td><?php echo $giftsReceived['modified']; ?></td>
			<td><?php echo $giftsReceived['gift_status_id']; ?></td>
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
