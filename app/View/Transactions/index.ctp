<div class="transactions index">
	<h2><?php echo __('Transactions'); ?></h2>
	<div>
		<button href="#collapse1" class="nav-toggle",sixe='1'>Search</button>
	</div>
	<div id="collapse1"  class="backSearch" style="border:1px solid #ccc; width:800px; padding:30px; margin-bottom:50px;">

		<?php echo $this->Form->create('Transaction', array('url' => array_merge(array('action' => 'index'), $this->params['pass']))); 
		?>

       <span><?php echo $this->Form->input('id', array('type'=>'text','div' => false,'label'=>'','size'=>'1','placeholder'=>'ID'));?></span>
       <span><?php echo $this->Form->input('sender_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Sender Id'));?></span>
       <span><?php echo $this->Form->input('receiver_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Receiver Id'));?></span>
      <span><?php echo $this->Form->input('product_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','placeholder'=>'Product Id'));?></span>
      
       <td><?php echo $this->Form->input('gift_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'gift_id',"placeholder"=>'Gift Id'));?>
		<?php echo $this->Form->input('amount_paid', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'amount_paid','placeholder'=>'Amount Paid'));?>
		<?php echo $this->Form->input('transaction_status_id', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'Transaction_status','placeholder'=>'Transaction status'));?>
        </td>

          <td><?php echo $this->Form->input('created_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker2',"placeholder"=>'Created Start '));?>
		<?php echo $this->Form->input('created_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker3','placeholder'=>'Created End'));?>
        </td>
        <td><?php echo $this->Form->input('modified_start', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker4',"placeholder"=>'Modified Start'));?>
			<?php echo $this->Form->input('modified_end', array('type'=>'text','div' => false,'label'=>'','size'=>'10','id'=>'datepicker5','placeholder'=>'Modified End'));?>
        </td>
        
       	<center>
         <?php echo $this->Form->submit(__('Search', true), array('div' => false));	
        if (isset($this->params['named']) & !empty($this->params['named'])){ 
            echo $this->Html->link(_('Reset Filter'), array('controller'=>'Transactions','action'=>'index'));
        } 
        ?></center>
        </span>

         <?php echo $this->Form->end();?></td>

	</div>
	 <?php echo $this->Form->create( '', array( 'id'=>'frm1' ,'name'=>'frm1' ,'controller'=>'Transactions', 'action' => 'download_transaction_csv', 'onsubmit'=>'return chkValidate();') );?>
        <table class="grd-chkbox" cellpadding="0" cellspacing="0" id="ordrMgmt">
        	<div class="download_csv">
         <?php  echo $this->Form->submit("Download User CSV" ,array( 'name'=>'csv', 'class'=>'button','type'=>'submit', 'id'=>'assign' , 'label' =>'','value'=>"" ));	
              echo $this->Form->end();
             ?>
         </div>
	<table cellpadding="0" cellspacing="0" border="1">
	<tr>
			<td class="campaign_checkbo"> <input class="campaign_checkbox" type="checkbox" name="checkall"onclick='checkedAll(frm1);' > </td>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sender_id'); ?></th>
			<th><?php echo $this->Paginator->sort('receiver_id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('gifts_id'); ?></th>
			<th><?php echo $this->Paginator->sort('amount_paid'); ?></th>
			<th><?php echo $this->Paginator->sort('transaction_status_id'); ?></th>
			
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	
	foreach ($transactions as $transaction): ?>
	<tr>
		<td class="campaign_checkbo"><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $transaction['Transaction']['id'];?>" value="<?php echo $transaction['Transaction']['id'];?>"> </td>
		<td><?php echo h($transaction['Transaction']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transaction['Gift']['sender_id'], array('controller' => 'users', 'action' => 'view', $transaction['Gift']['sender_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Gift']['receiver_id'], array('controller' => 'users', 'action' => 'view', $transaction['Gift']['receiver_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Gift']['product_id'], array('controller' => 'products', 'action' => 'view', $transaction['Gift']['product_id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transaction['Gift']['id'], array('controller' => 'gifts', 'action' => 'view', $transaction['Gift']['id'])); ?>
		</td>
		<td><?php echo h($transaction['Transaction']['amount_paid']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['transaction_status_id']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['created']); ?>&nbsp;</td>
		<td><?php echo h($transaction['Transaction']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transaction['Transaction']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transaction['Transaction']['id']), null, __('Are you sure you want to delete # %s?', $transaction['Transaction']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transaction'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Gifts'), array('controller' => 'gifts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gifts'), array('controller' => 'gifts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transaction Statuses'), array('controller' => 'transaction_statuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction Statuses'), array('controller' => 'transaction_statuses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sender'), array('controller' => 'users', 'action' => 'add')); ?> </li>
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