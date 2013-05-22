
<?= $this->element('admin_header'); ?>
<div class="gifts index">
	<h2><?php echo __('Gifts'); ?></h2>
	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:10px; margin-bottom:70px;">
		<?php echo $this->Form->create('Gift', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
?>  <tr>
		<td></td>
        <td><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'Id'));?></td>
        <td><?php echo $this->Form->input('product_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Product Id'));?></td>
        <td><?php echo $this->Form->input('sender_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Sender Id'));?></td>
        <td><?php echo $this->Form->input('receiver_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Receiver Id'));?></td>
        <td><?php echo $this->Form->input('receiver_fb_id', array('type'=>'text','div' => false,'label'=>'','size'=>'15','placeholder'=>'Receiver FB Id'));?></td>
        <td><?php echo $this->Form->input('receiver_email', array('type'=>'text','div' => false,'label'=>'','size'=>'15','placeholder'=>'Receiver Email'));?></td>
        <td><?php echo $this->Form->input('code', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Code'));?></td>
        <td><?php echo $this->Form->input('gift_amount', array('type'=>'text','div' => false,'label'=>'','size'=>'5','placeholder'=>'Gift Amount'));?></td>
        <td><?php echo $this->Form->input('gift_status_id', array('type'=>'text','div' => false,'label'=>'','size'=>'5','placeholder'=>'Gift Status Id'));?></td>
        <td><?php echo $this->Form->input('expiry_start', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker',"placeholder"=>'Start Date','placeholder'=>'Expiry Start'));?>
		<?php echo $this->Form->input('expiry_end', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker1','placeholder'=>'End Date','placeholder'=>'Expiry End'));?>
        </td>
        <td><?php echo $this->Form->input('created_start', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker2',"placeholder"=>'Created Start Date'));?>
		<?php echo $this->Form->input('created_end', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker3','placeholder'=>'Created End Date'));?>
        </td>
        <td><?php echo $this->Form->input('modified_start', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker4',"placeholder"=>'Created Start Date'));?>
			<?php echo $this->Form->input('modified_end', array('type'=>'text','div' => false,'label'=>'','size'=>'5','id'=>'datepicker5','placeholder'=>'Created End Date'));?>
        </td>
        
       <td>
         <?php echo $this->Form->submit(__('Search', true), array('div' => false));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'Gifts','action'=>'index'));
        } 
        ?>
        </td>			
    </tr>
                 <?php echo $this->Form->end();?></td>
                 </div>
	 <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'Gifts', 'action' => 'download_gift_csv', 'onsubmit'=>'return chkValidate();') );?>
        <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
        	<div class="download_csv">
         <?php  echo $this->Form->submit("Download Gift CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
              echo $this->Form->end();
             ?>
         </div>
	<table cellpadding="0" cellspacing="0" border="1">
	<tr>    
<td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_fb_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_email'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('gift_amount'); ?></th>
			<th><?php echo $this->Paginator->sort('gift_status_id'); ?></th>
			<th><?php echo $this->Paginator->sort('expiry_date'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	
	
	<?php
	foreach ($gifts as $gift): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $data['Reminder']['friend_fb_id'];?>" value="<?php echo $gift['Gift']['id'];?>"> </td>
		<td><?php echo h($gift['Gift']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['Product']['id'], array('controller' => 'products', 'action' => 'view', $gift['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gift['Sender']['id'], array('controller' => 'users', 'action' => 'view', $gift['Sender']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gift['Receiver']['id'], array('controller' => 'users', 'action' => 'view', $gift['Receiver']['id'])); ?>
		</td>
		<td><?php echo h($gift['Gift']['receiver_fb_id']); ?>&nbsp;</td>
		<td><?php 
		if($gift['Gift']['receiver_email']){
		echo h($gift['Gift']['receiver_email']); 
		}
		else
		{
		echo "NULL";
		}
		?>&nbsp;</td>	
		<td><?php echo h($gift['Gift']['code']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['gift_amount']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gift['GiftStatus']['id'], array('controller' => 'gift_statuses', 'action' => 'view', $gift['GiftStatus']['id'])); ?>
		</td>
		<td><?php echo h($gift['Gift']['expiry_date']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['created']); ?>&nbsp;</td>
		<td><?php echo h($gift['Gift']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gift['Gift']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gift['Gift']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gift['Gift']['id']), null, __('Are you sure you want to delete # %s?', $gift['Gift']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Gift'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gift Statuses'), array('controller' => 'gift_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gift Status'), array('controller' => 'gift_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <script>
  $(function() {
  	
    $( "#datepicker" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
     $( "#datepicker1" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
      $( "#datepicker2" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
         $( "#datepicker3" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
            $( "#datepicker4" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
               $( "#datepicker5" ).datepicker({
     dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
  });
});
  </script>

<script>
		$(document).ready(function() {
			$('#collapse1').hide();
			
		  $('.nav-toggle').click(function(){

			//get collapse content selector
			var collapse_content_selector = $(this).attr('href');					
 
			//make the collapse content to be shown or hide
			var toggle_switch = $(this);
			$(collapse_content_selector).toggle(function(){
			  if($(this).css('display')=='none'){
                                //change the button label to be 'Show'
				toggle_switch.html('Search(+)');
			  }else{
                                //change the button label to be 'Hide'
				toggle_switch.html('Search(-)');
			  }
			});
		  });
 
		});	
		</script>
<script>
    function chkValidate(){
        if($("[name='chk1[]']:checked").length<1){
            alert('Please select atleast one record.');
            return false;
        }
        return true;
    }
    checked=false;
 function checkedAll (frm1) {
 
	var aa= document.getElementById('frm1');
	 if (checked == false)
        {
           checked = true
          }
        else        {
          checked = false
          }
	for (var i =0; i < aa.elements.length; i++) 
	{
		 aa.elements[i].checked = checked;
	}
	
 }
 $(document).ready(function(){
        $('.campaign_checkbox').show();
    });
</script>
