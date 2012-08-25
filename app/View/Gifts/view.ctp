<div class="gifts view">
<h2><?php  echo __('Gift'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['Product']['id'], array('controller' => 'products', 'action' => 'view', $gift['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Receiver'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['Receiver']['id'], array('controller' => 'users', 'action' => 'view', $gift['Receiver']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['Sender']['id'], array('controller' => 'users', 'action' => 'view', $gift['Sender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gift Amount'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['gift_amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiry Date'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['expiry_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($gift['Gift']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gift Status'); ?></dt>
		<dd>
			<?php echo $this->Html->link($gift['GiftStatus']['id'], array('controller' => 'gift_statuses', 'action' => 'view', $gift['GiftStatus']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gift'), array('action' => 'edit', $gift['Gift']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gift'), array('action' => 'delete', $gift['Gift']['id']), null, __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('controller' => 'gift_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Status'), array('controller' => 'gift_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
