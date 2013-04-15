     <script type="text/javascript">
      
      $(document).ready(function(){

            $("#form_shipping").click(function (){

              var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
                var valid = emailRegex.test($("#email").val());

                if ($("#email").val().length == 0)
                 {

                    $("#error_mobile").show();
                    e = true;

                   
                   
                    }
               else if(!valid)
                        {
                          $("#error_mobile").show();
                             e = true;  
                        }
                else if(valid)
                        {
                             
                            x = confirm("Please verify that your Email " +email.value +" is correct? Email can be sent only once.");   
if (x == true)  
{  
 return true;  
}  
else  
{  
return false; }  
                        }
                if(e) return false;
            	// alert("'shubham'");
             
              
            }
            	
         
            );
      });
      </script>
      
 <div style="margin-top:100px">
 	<center>
           <?php 
           echo $this->Form->create('gifts', array('action' => 'send_voucher_email'));
            
             echo $this->Form->hidden("id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['id']))?>
             <div class="input email">
             	<br><br>
                
                <div class="input email" ><label for="email">Email Address   </label><?php echo $this->Form->input("email" ,array('id' => 'email', 'label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "Valid Email Address",'value'=>$email))?></div>
                <div class="error_message" id="error_mobile" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter Valid Email Address</h5>
                </div>
            </div>
            
            <?php echo $this->Form->hidden("user_name" ,array('label' => false,'div' => false,'value'=>$facebook_user['first_name'] ))?>
             <br><br>
            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send Email'), array('id'=>'form_free')); ?>
                 
            </div> </center>
            </div>
             <script type='text/javascript'>
    $(document).ready(function(){
        $('#form_free').click(function(){
            $(this).attr('disabled','disabled');
             
        });
        </script>
            