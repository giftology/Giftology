<?= $this->element('admin_header'); ?><div class="giftStatuses view">
<h2><?php  echo __('Gift Status'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($giftStatus['GiftStatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($giftStatus['GiftStatus']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($giftStatus['GiftStatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($giftStatus['GiftStatus']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gift Status'), array('action' => 'edit', $giftStatus['GiftStatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gift Status'), array('action' => 'delete', $giftStatus['GiftStatus']['id']), null, __('Are you sure you want to delete # %s?', $giftStatus['GiftStatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Status'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Gifts'); ?></h3>
	<?php if (!empty($giftStatus['Gift'])): ?>
	<table cellpadding = "0" cellspacing = "0" border="1">
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
		foreach ($giftStatus['Gift'] as $gift): ?>
		<tr>
			<td><?php echo $gift['id']; ?></td>
			<td><?php echo $gift['product_id']; ?></td>
			<td><?php echo $gift['receiver_id']; ?></td>
			<td><?php echo $gift['sender_id']; ?></td>
			<td><?php echo $gift['code']; ?></td>
			<td><?php echo $gift['gift_amount']; ?></td>
			<td><?php echo $gift['expiry_date']; ?></td>
			<td><?php echo $gift['created']; ?></td>
			<td><?php echo $gift['modified']; ?></td>
			<td><?php echo $gift['gift_status_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'gifts', 'action' => 'view', $gift['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'gifts', 'action' => 'edit', $gift['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'gifts', 'action' => 'delete', $gift['id']), null, __('Are you sure you want to delete # %s?', $gift['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
