<?= $this->element('admin_header'); ?>
<div class="userAddresses index">
	<h2><?php echo __('User Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0" border="1">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('address1'); ?></th>
			<th><?php echo $this->Paginator->sort('address2'); ?></th>
			<th><?php echo $this->Paginator->sort('city'); ?></th>
			<th><?php echo $this->Paginator->sort('pin_code'); ?></th>
			<th><?php echo $this->Paginator->sort('country'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($userAddresses as $userAddress): ?>
	<tr>
		<td><?php echo h($userAddress['UserAddress']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userAddress['User']['id'], array('controller' => 'users', 'action' => 'view', $userAddress['User']['id'])); ?>
		</td>
		<td><?php echo h($userAddress['UserAddress']['address1']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['address2']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['city']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['pin_code']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['country']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['created']); ?>&nbsp;</td>
		<td><?php echo h($userAddress['UserAddress']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userAddress['UserAddress']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userAddress['UserAddress']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userAddress['UserAddress']['id']), null, __('Are you sure you want to delete # %s?', $userAddress['UserAddress']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
          	<?php
          	    if ($this->Paginator->hasPrev()) {
          		echo $this->Paginator->prev($this->html->image('35x35_prev.png' , array("title" => "Prev")), array('escape' => false), null, array('class' => 'prev disabled'));
          	}
          		 if ($this->Paginator->hasNext()) {
          		 echo $this->Paginator->next($this->html->image('35x35_next.png' , array("title" => "next")),array('escape' => false), null, array('class' => 'next disabled'));
          	}
          	?>
              </div>
              <div style="width:auto;height:auto;margin-top:-18px;margin-left:100px;" >
          		<br><?php echo $this->Paginator->numbers(array('separator' => ' | ','modulus'=>'10','first'=>'First Page ','last'=>' Last Page'));?>
              </div> 
              <div style="width:auto;height:auto;margin-top:20px;margin-left:50px;" >
          			<?php
          			echo $this->Paginator->counter(array(
          				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
          				));
          				?>	
              </div>
          </div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New User Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
