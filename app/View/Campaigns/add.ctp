<div class="vendors form">
<?php echo $this->Form->create('Campaign', array('type' => 'file')); ?>
   
    <?php
   echo $this->Form->input('type', array('type' => 'select','id'=>'type', 'options' =>array('1'=>'Campaign','2'=>'Contest')));?>
   <div id="prod1">
       <?php echo $this->Form->input('product_id', array('label' => 'Product ID','id'=>'prod', 'type' => 'text'));?></div>
         <div class="error_message" id="error_city" style="display:none; margin-left:20px;">
                    <span style="color:#FF0000">*Please enter the Product ID.</span>
                 </div>
       <?php
         echo $this->Form->input('enable', array('type' => 'select', 'options' =>array('1'=>'Enable','0'=>'Disable')));
        echo $this->Form->input('start_date') ;
        echo $this->Form->input('end_date') ;
        echo $this->Form->input('on_landing_page', array('type' => 'select', 'options' =>array('1'=>'YES','0'=>'NO')));
       ?> <div id="redirect1"><?php echo $this->Form->input('redirect_to', array('type' => 'select', 'id'=>'redirect','options' =>array('1'=>'REMINDER','2'=>'CAMPAIGN'))); ?> </div> 
        <?php echo $this->Form->input('thumb_file', array('label' => 'Product Image', 'type' => 'file'));
        echo $this->Form->input('wide_file', array('label' => 'Landing Page Image', 'type' => 'file'));
         echo $this->Form->input('end_file', array('label' => 'Campaign End Page Image', 'type' => 'file'));
       


    ?>
    </fieldset>
<?php echo $this->Form->Submit(__('Submit'), array('id'=>'form_shipping'));?> 
</div>


<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Campaign'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Campaign'), array('controller' => 'campaigns', 'action' => 'admin')); ?> </li>
		
	</ul>
</div>
 <script  type='text/javascript'>
$(document).ready(function(){
    $("#type").click(function(){
        if($(this).val() == 2){
             $("#prod1").hide();
              $("#redirect1").hide();
             $("#error_city").hide();
        }
        else{
            $("#prod1").show(); 
             $("#redirect1").show(); 
            
       }
        });

    $(".submit").click(function(){
        //$("#prod1").hide();
        if($('#prod1').is(':visible') && $("#prod").val().length == 0){
            $("#error_city").show();
             return false;
        }
        
        });
        
});


</script>
