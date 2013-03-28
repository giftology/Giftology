     <script type="text/javascript">

      $(document).ready(function(){
            $(".submit").click(function (){
            	if($("#mobile_number").val().length <10 || $("#mobile_number").val().length > 10)
            	{
            		alert("Plese enter 10 digit mobile number");
            		return false;
            	}
            	if($("#mobile_number").val().length ==10 )
            	{
            		 
            		x = confirm("Please verify that your mobile # " +mobile_number.value +" is correct? SMS can be sent only once.");   
if (x == true)  
{  
 return true;  
}  
else  
{  
return false; }   
            		
            	}
                
            });
           
        });
      
      </script>
      
 <div style="margin-top:100px">
 	<center>
           <?php 
            $pin;
			$originalDate = $gift['Gift']['expiry_date'];
			$newDate = date("d-m-Y", strtotime($originalDate));
            if($pin)
                $message="Dear " .$facebook_user['first_name'].", your " .$gift['Product']['Vendor']['name']." gift code for Rs. ".$gift['Gift']['gift_amount']." is ".$gift['Gift']['code'] .", pin ".$pin." valid upto ".$newDate.". Pls show SMS prior to billing. One code per transaction.";
            else $message="Dear " .$facebook_user['first_name'].", your " .$gift['Product']['Vendor']['name']." gift code for Rs. ".$gift['Gift']['gift_amount']." is ".$gift['Gift']['code']." valid upto ".$newDate.". Pls show SMS prior to billing. One code per transaction.";
           
             echo $this->Form->create('gifts', array('action' => 'send_sms'));
            
             echo $this->Form->hidden("id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['id']))?>
             <div class="input email">
             	<br><br>
                
                <div class="input email" ><label for="email">Mobile Number   </label><?php echo $this->Form->input("mobile_number" ,array('id' => 'mobile_number', 'label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "10 Digit Mobile Number"))?></div>
                <div class="error_message" id="error_mobile" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the 10 digit Mobile Number</h5>
                </div>
            </div>
            <div class="input email" ><?php echo $this->Form->hidden("message" ,array('label' => false,'div' => false,'value'=>$message ))?></div>
            <br><br>
            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send sms'), array('id'=>'form_shipping')); ?>
               
            </div> </center>
            </div>
            