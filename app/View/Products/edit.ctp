<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('min_price');
		echo $this->Form->input('max_price');
		echo $this->Form->input('min_value');
		echo $this->Form->input('days_valid');
		echo $this->Form->input('terms_heading');
	        echo $this->Tinymce->input('Product.terms', array( 
	            'label' => 'Terms & Conditions' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        );
	        echo $this->Tinymce->input('Product.short_terms', array( 
	            'label' => 'Short Terms & Conditions' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        );
		echo $this->Tinymce->input('Product.redeem_instr', array( 
	            'label' => 'Redemption Instructions' 
		            ),array( 
		                'language'=>'en' 
		            ), 
		            'full' 
	        ); 

		echo $this->Form->input('code_type_id');
		echo $this->Form->input('code');
		echo $this->Form->input('vendor_id');
		echo $this->Form->input('product_type_id');
		echo $this->Form->input('age_segment_id');
		echo $this->Form->input('gender_segment_id');
		//echo $this->Form->input('city_segment_id');
	?>
	<dt><?php echo __('City Segment'); ?></dt>
		<?php
            $city_segments = array();
			$city_segments_unserialized = unserialize($this->request->data['Product']['city_segment']);
			if(isset($city_segments_unserialized) && !empty($city_segments_unserialized)) $city_segments = $city_segments_unserialized;
			foreach($citySegments as $k => $city_segment){
            $existence = false;
            $existence = in_array($k, $city_segments);
		?>
		<input type="checkbox" name="city_segment[<?php echo $k;?>]" value="<?php echo $k;?>" class="city_segment" <?php if($existence) echo "checked";?>> <?php echo $city_segment;?>
		<?php
			}
		?>
	<?php
		echo $this->Form->input('display_order');
		echo $this->Form->input('sender_gift_limit');
		echo $this->Form->input('sender_gift_limit');
		echo $this->Form->input('receiver_gift_limit');
		echo $this->Form->input('receiver_time_limit');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Product.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Vendors'), array('controller' => 'vendors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vendor'), array('controller' => 'vendors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gender Segments'), array('controller' => 'gender_segments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gender Segment'), array('controller' => 'gender_segments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Uploaded Product Codes'), array('controller' => 'uploaded_product_codes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Uploaded Product Code'), array('controller' => 'uploaded_product_codes', 'action' => 'add')); ?> </li>
	</ul>
</div>
<script type="text/javascript">
$(document).ready(function(){
        $('.city_segment').show();
    });
</script>
