<div class="offers view">
<h2><?php  echo __('Offer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Terms'); ?></dt>
		<dd>
			<?php echo h($offer['Offer']['terms']); ?>
			&nbsp;
		</dd>
		<dd>
			<?php
			$image = "../files/offer/image/" . $offer['Offer']['id'] . "/" . $offer['Offer']['image'];
			echo $this->Html->image($image); ?>
			&nbsp;	
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Offer'), array('action' => 'edit', $offer['Offer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Offer'), array('action' => 'delete', $offer['Offer']['id']), null, __('Are you sure you want to delete # %s?', $offer['Offer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Offers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Offer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Send Offer'), array('controller' => 'gifts', 'action' => 'send',
									 'receiver_id' => $this->request->params['named']['receiver_id'],
									 'offer_id' => $offer['Offer']['id'])); ?> </li>

	</ul>
</div>
