<div class="WeeklyNewsletters index">
	<h2><?php echo __('WeeklyNewsletters'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('header_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('strip_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('product1_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('product2_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('brand1_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('brand2_banner'); ?></th>
			<th><?php echo $this->Paginator->sort('brand1_text'); ?></th>
			<th><?php echo $this->Paginator->sort('brand2_text'); ?></th>
			<th><?php echo $this->Paginator->sort('template_text'); ?></th>
			<th><?php echo $this->Paginator->sort('template_heading'); ?></th>
			<th><?php echo $this->Paginator->sort('featured_brand'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($news as $news): ?>
	<tr>
		<td><?php echo h($news['WeeklyNewsletters']['id']); ?>&nbsp;</td>
		<td><?php echo h($news['WeeklyNewsletters']['name']); ?>&nbsp;</td>
		<td><?php echo h($news['WeeklyNewsletters']['created']); ?>&nbsp;</td>
		<td><?php echo h($news['WeeklyNewsletters']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $news['WeeklyNewsletters']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $news['WeeklyNewsletters']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $news['WeeklyNewsletters']['id']), null, __('Are you sure you want to delete # %s?', $news['WeeklyNewsletters']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Newsletters'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Newsletters'), array('controller' => 'WeeklyNewsletters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Newsletters'), array('controller' => 'WeeklyNewsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>
