<div class="WeeklyNewsletter view">
<h2><?php  echo __('WeeklyNewsletter'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand1'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['brand1_text']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Brand2'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['brand2_text']); ?>
			&nbsp;banner
		</dd>

		<dt><?php echo __('Template'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['template_text']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Min Price'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['template_heading']); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Header'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['header_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Strip'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['strip_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('product1'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['product1_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('product2'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['product2_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand1'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['brand1_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('brand2'); ?></dt>
		<dd>
			<?php echo $this->Html->image('../'.$news['WeeklyNewsletter']['brand2_banner'],array('width' => '50px','height' => '50px')); ?>
			&nbsp;
		</dd>

		<dt><?php echo __('Min Price'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['scheduled_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($news['WeeklyNewsletter']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit WeeklyNewsletter'), array('action' => 'edit', $news['WeeklyNewsletter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete WeeklyNewsletter'), array('action' => 'delete', $news['WeeklyNewsletter']['id']), null, __('Are you sure you want to delete # %s?', $news['WeeklyNewsletter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List WeeklyNewsletter'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New WeeklyNewsletter'), array('action' => 'add')); ?> </li>
	</ul>
</div>
