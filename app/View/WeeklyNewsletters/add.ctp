<div class="Newsletters form">
<?php echo $this->Form->create('WeeklyNewsletters', array('type' => 'file')); ?>
	<fieldset>
		<legend><?php echo __('Add Newsletters'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('header_banner', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('strip_banner', array('label' => 'Wide Image (200x64px)', 'type' => 'file'));
		echo $this->Form->input('product1_banner', array('label' => 'Facebook Share Image (200x200px)', 'type' => 'file'));
		echo $this->Form->input('product2_banner', array('label' => 'Carousel(199x102px)', 'type' => 'file'));
		echo $this->Form->input('brand1_banner', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('brand2_banner', array('label' => 'Thumb (50x50px)', 'type' => 'file'));

		echo $this->Tinymce->input('WeeklyNewsletters.brand1_text', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletters.brand2_text', array( 
	            'label' => 'short About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletters.template_text', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		echo $this->Tinymce->input('WeeklyNewsletters.template_heading', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 


	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List WeeklyNewsletters'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('New WeeklyNewsletters'), array('controller' => 'WeeklyNewsletters', 'action' => 'add')); ?> </li>
	</ul>
</div>
