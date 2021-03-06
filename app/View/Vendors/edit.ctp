<?= $this->element('admin_header'); ?>
<div class="vendors form">
<?php echo $this->Form->create('Vendor', array('type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit Vendor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('thumb_file', array('label' => 'Thumb (50x50px)', 'type' => 'file'));
		echo $this->Form->input('wide_file', array('label' => 'Wide Image (200x64px)', 'type' => 'file'));
		echo $this->Form->input('facebook_file', array('label' => 'Facebook Share Image (200x200px)', 'type' => 'file'));
		echo $this->Form->input('carousel_image_file', array('label' => 'Carousel(199x102px)', 'type' => 'file'));
		echo $this->Form->input('redeem_image_file', array('label' => 'Redeem Image (500x200px)', 'type' => 'file'));
		echo $this->Form->input('vendor_website_link', array('label' => 'Vendor Website Link'));

		echo $this->Tinymce->input('Vendor.description', array( 
	            'label' => 'About' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 
		
		echo $this->Tinymce->input('Vendor.short_description', array( 
	            'label' => 'Short About' 
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vendor.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Vendor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
