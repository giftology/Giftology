<?= $this->element('admin_header'); ?>
<div class="products form">
<?php echo $this->Form->create('Product'); ?>
	<fieldset>
		<legend><?php echo __('Add Product'); ?></legend>
	<?php echo $this->Form->input('min_price'); ?>
		<div class="error_message" id="error_min" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 50000.</h5>
        </div>

	<?php	echo $this->Form->input('max_price'); ?>
		<div class="error_message" id="error_max" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 50000.</h5>
        </div>

	<?php	echo $this->Form->input('min_value'); ?>
			<div class="error_message" id="error_first" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 50000.</h5>
	        </div>
	<?php echo $this->Form->input('days_valid'); ?>
		<div class="error_message" id="error_days" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 1 - 365.</h5>
        </div>

	<?php	echo $this->Form->input('terms_heading');
	        echo $this->Tinymce->input('Product.terms', array( 
	            'label' => 'Terms & Conditions' 
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
		echo $this->Tinymce->input('Product.short_terms', array( 
			'label' => 'ShortTerms & Conditions' 
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
		//DebugBreak();
			foreach($citySegments as $k => $city_segment){
		?>
		<input type="checkbox" name="city_segment[<?php echo $k;?>]" value="<?php echo $k;?>" class="city_segment"> <?php echo $city_segment;?>
		<?php
			}
		?>
		<?php echo $this->Form->input('display_order'); ?>
			<div class="error_message" id="error_display" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 150.</h5>
	        </div>
		<?php echo $this->Form->input('sender_gift_limit'); ?>
			<div class="error_message" id="error_sender" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 10.</h5>
	        </div>
		<?php echo $this->Form->input('sender_time_limit'); ?>
			<div class="error_message" id="error_sender_time" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 30.</h5>
	        </div>
		<?php echo $this->Form->input('receiver_gift_limit'); ?>
			<div class="error_message" id="error_receiver" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 5.</h5>
	        </div>
		<?php echo $this->Form->input('receiver_time_limit'); ?>
			<div class="error_message" id="error_receiver_time" style="display:none; margin-left:20px;">
	            <h5 style="color:#FF0000">*please enter a value between 0 - 15.</h5>
	        </div>

	
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

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
      	$(".submit").click(function (){ 
      		var e = false;
      		if (!($("#ProductMinPrice").val() <= 50000 && $("#ProductMinPrice").val() >=0)  || ($("#ProductMinPrice").val().length == 0)) {
                    $("#error_min").show();
                    e = true;
                }
                else{
                    $("#error_min").hide();    
                }

            if (!($("#ProductMaxPrice").val() <= 50000 && $("#ProductMaxPrice").val() >=0)  || ($("#ProductMaxPrice").val().length == 0)) {
                    $("#error_max").show();
                    e = true;
                }
                else{
                    $("#error_max").hide();    
                }

      		if (!($("#ProductMinValue").val() <= 50000 && $("#ProductMinValue").val() >=0)  || ($("#ProductMinValue").val().length == 0)) {
                    $("#error_first").show();
                    e = true;
                }
                else{
                    $("#error_first").hide();    
                }

            if (!($("#ProductDaysValid").val() <= 365 && $("#ProductDaysValid").val() >= 1)) {
            	//alert($("#ProductDaysValid").val());
                    $("#error_days").show();
                    e = true;
                }
                else{
                    $("#error_days").hide();    
                }

            if (!($("#ProductDisplayOrder").val() <= 150 && $("#ProductDisplayOrder").val() >=0)  || ($("#ProductDisplayOrder").val().length == 0)) {
                    $("#error_display").show();
                    e = true;
                }
                else{
                    $("#error_display").hide();    
                }

            if (!($("#ProductSenderGiftLimit").val() <= 10 && $("#ProductSenderGiftLimit").val() >=0)  || ($("#ProductSenderGiftLimit").val().length == 0)) {
                    $("#error_sender").show();
                    e = true;
                }
                else{
                    $("#error_sender").hide();    
                }

            if (!($("#ProductSenderTimeLimit").val() <= 30 && $("#ProductSenderTimeLimit").val() >=0)  || ($("#ProductSenderTimeLimit").val().length == 0)) {
                    $("#error_sender_time").show();
                    e = true;
                }
                else{
                    $("#error_sender_time").hide();    
                }

            if (!($("#ProductReceiverGiftLimit").val() <= 5 && $("#ProductReceiverGiftLimit").val() >=0)  || ($("#ProductReceiverGiftLimit").val().length == 0)) {
                    $("#error_receiver").show();
                    e = true;
                }
                else{
                    $("#error_receiver").hide();    
                }

            if (!($("#ProductReceiverTimeLimit").val() <= 15 && $("#ProductReceiverTimeLimit").val() >=0)  || ($("#ProductReceiverTimeLimit").val().length == 0)) {
                    $("#error_receiver_time").show();
                    e = true;
                }
                else{
                    $("#error_receiver_time").hide();    
                }
             if(e) return false;
      	});
      });

	$(document).ready(function(){
        $('.city_segment').show();
    });
      </script>
