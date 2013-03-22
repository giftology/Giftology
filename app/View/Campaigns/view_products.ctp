	<!--<div id="campaigns">
                        <?php foreach ($products as $product):  ?>
			<a href="<?= $this->Html->url(array('controller' => 'campaigns',
				    'action' => 'view_product',
				    $product['Product']['id'])); ?>">

				<?= $this->element('campaigns',
						array('product' => $product,
						      'small' => true),
						array('cache' => array(
							'key' => $product['Product']['id'].'small'))); ?>
			</a>
			<?php endforeach; ?>
		</div>-->
	<div style="float:left">
	<table class="friend_result" cellpadding="0" cellspacing="0">
	<div id='search_friend'>
                                <?php echo $this->Form->create('Campaigns'); ?>
                                <?php echo $this->Form->input('friend_name', array('label'=>'', 'placeholder' => "Search for friends...")); ?>
                                <?php echo $this->Form->end(__('search_button_small.jpg')); ?>
                            </div>
	<?php  echo $this->Form->create('gifts', array('action' => 'send_campaign'));?>
    <tbody>             
	<?php
	
        foreach ($data as $data): ?>
        <tr>
        <td class="friend_row" id="<?php echo $data['Reminder']['friend_fb_id'];?>"><input type="checkbox" name="chk1[]" id="<?php echo $data['Reminder']['friend_fb_id'];?>" value="<?php echo $data['Reminder']['friend_fb_id'];?>"  > 
		<?php echo $data['Reminder']['friend_name']; ?></td>
		</tr>
        <?php endforeach; ?>
    </tbody>
    <div style="position:absolute;margin-left:400px;margin-top:100px">
         <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice ",'class'=>"gift-message" ))?>
                </div>
                
                <div class="input email" ><?php echo $this->Form->hidden("contribution_amount" ,array('label' => false,'div' => false,'value'=>$product['Product']['min_value'] ))?></div>
                	<div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['id'] ))?></div>
                	<div class="input email" ><?php echo $this->Form->hidden("vendor_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['vendor_id'] ))?></div>
                	<div class="input email" ><?php echo $this->Form->hidden("reciever_name" ,array('label' => false,'div' => false,'value'=>$data['Reminder']['friend_name'] ))?></div>
                 <div class="error_message" id="error_text" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the message.</h5>
                </div>
            </div>
            <?php  echo $this->Form->Submit(__('Send'), array('id'=>'form_shipping'));?>  
            </div>	
	
        </div>

        <div>
	

	</table>
	
	
</div>
<div class="clear"></div>
<div style="float:right;margin-bottom:400px">
	<div class="disclosure opened">
            <p class="heading">Terms and conditions</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Product']['terms']; ?></p>
            </div>
            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                    <span class="arrow"></span>
            </a>
    </div>
</div>

        


	<script type="text/javascript">

      $(document).ready(function(){
            $("#form_shipping").click(function (){
            	if($("#text_message").val().length == 0){
                    $("#error_text").show();
                        return false;
                }
                else{
                    $("#error_text").hide();
                }
            });
        });
    </script>

    <script type='text/javascript'>
    $(document).ready(function(){
	    $('input').keyup(function() {
	    // interrupt form submission
	    	//var key_value = this.value;
	    	$.ajax({
		        type: "POST",
		        dataType: 'html',
		        async: false,
		        url: "/campaigns/search_friend",
		        data: "search_key="+this.value,
		        success: function(data) {
		        	//alert(data);
		        	var res_data = jQuery.parseJSON(data);;
		        	var count = res_data.length;
		        	var new_row = '';
		        	for(var i = 0; i < count; i++){
		        		check = $("#"+res_data[i]["Reminder"]["friend_fb_id"]).is( "*" );
		        		if(!check){
		        			new_row = "<tr><td><input type='checkbox' name='chk1[]' id='"+res_data[i]["Reminder"]["friend_fb_id"]+"' value='"+res_data[i]["Reminder"]["friend_fb_id"]+"'  >"+res_data[i]["Reminder"]["friend_name"]+"</td></tr>";
		        			$('.friend_result > tbody:last').last().append(new_row);
		        		}
		        	}
		        	//alert(new_row); tobnd("tr:last"));
		        }
		    });
		});
	});
	</script>