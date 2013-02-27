     <script type="text/javascript">

      $(document).ready(function(){
            $("#form_shipping").click(function (){
                var e = false;
                var emailRegex = new RegExp(/^[0-9-+]+$/);
                var valid_phone = emailRegex.test($("#phone_len").val());
               if($("#text_message").val().length == 0){
                    $("#error_text").show();
                        e = true;
                }
                else{
                    $("#error_text").hide();
                }
                if(!valid_phone || $("#phone_len").val().length < 10 || $("#phone_len").val().length >10){
                    $("#error_phone").show();
                        e = true;
                }
                else{
                    $("#error_phone").hide();
                }
                if($("#pin_code").val().length < 6 ||$("#pin_code").val().length > 6){
                    $("#error_pin").show();
                        e = true;
                }
                else{
                    $("#error_pin").hide();    
                }
                if ($("#first_name").val().length == 0) {
                    $("#error_first").show();
                    e = true;
                }
                else{
                    $("#error_first").hide();    
                }
                if ($("#address").val().length == 0) {
                    $("#error_address").show();
                    e = true;
                }
                else{
                    $("#error_address").hide();    
                }
                if ($("#city").val().length == 0) {
                    $("#error_city").show();
                    e = true;
                }
                else{
                    $("#error_city").hide();    
                }
                if ($("#state").val().length == 0) {
                    $("#error_state").show();
                    e = true;
                }
                else{
                    $("#error_state").hide();    
                }
                if ($("#country").val().length == 0) {
                    $("#error_country").show();
                    e = true;
                }
                else{
                    $("#error_country").hide();    
                }

                var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
                var valid = emailRegex.test($("#email").val());

                if ($("#email").val().length == 0)
                 {
                    /*$("#error_email").show();
                    e = true;*/
                    var r=confirm("continue without email address!");
                    if (r==true)
                      {
                         return true;
                      }
                    else
                      {
                        e = true;
                      }
                    }
               else if(!valid)
                        {
                          $("#error_email").show();
                             e = true;  
                        }
                else if(valid)
                        {
                            $("#error_email").hide();    
                        }
                if(e) return false;
            });
           
        });
      
      </script>
      <script type="text/javascript">

      $(document).ready(function(){
            $("#form_free").click(function (){
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

     

     <div>
            <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                    <span class="left"></span>
                    <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">                   
                    <span class="left"></span>
                    <a href="<?= $this->Html->url(array('controller'=>'products',
                                'action'=> 'view_products',
                                'receiver_id' => $receiver_id,
                                'receiver_name' => $receiver_name,
                                'receiver_birthday' => $receiver_birthday,
                                'ocasion' => $ocasion));
                        ?>"><?= $receiver_name; ?><span class="arrow"></span></a>
                </li>
                <li>Send a gift</li>
            </ul>
        <?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
                                                                'ocasion' => $ocasion),
                              array('cache' => array('key'=>$receiver_name.$ocasion))
                   ); ?>
        </div>
    
        <div id="gift-details">
            <?php         if (isset($this->request->params['named']['receiver_birthday']) &&
                        !$this->Time->isToday($this->request->params['named']['receiver_birthday']) &&
                        isset($this->request->params['named']['ocasion']) &&
                        $this->request->params['named']['ocasion'] == 'Birthday') {
                        $send_now = 0;
                    } else {
                        $send_now = 1;
                    }
            ?>
            <h3>Will be delivered: <strong><?= $send_now ? 'Today' :
                substr($this->Time->niceShort($receiver_birthday), 0, -7); ?></strong></h3>
             </div>
              <?php 
           // DebugBreak(); 
            $str1 = SHIPPED;
            $str2=$product['Product']['product_type_id'];
            $shipped=strcmp($str2,$str1); 
        if($shipped == 0)
        {   
            ?> 
            <?php  echo $this->Form->create('gifts', array('action' => 'send'));
            ?>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice to $receiver_name",'class'=>"gift-message" ))?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                 <div class="error_message" id="error_text" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the message.</h5>
                </div>
            </div>
            <div class="delivery-sharing">
             <center><h3>Shipping Address</h3></center>
            <div class="error_message"></div>

            <?php $name = explode(" ", $receiver_name);
            $last_name = isset($name[1]) ? $name[1] : NULL;
             ?>
            
            <div class="input email">
                <label for="email">First Name</label>
                <div class="input email" ><?php echo $this->Form->input("first_name" ,array('id' => 'first_name','label' => false,'div' => false,'value'=>$name[0]))?></div>
                <div class="error_message" id="error_first" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the first name.</h5>
                </div>
            </div>
            <div class="input email">
                <label for="email">Last Name</label>
                <div class="input email" ><?php  echo $this->Form->input("last_name" ,array('label' => false,'div' => false,'class'=>"umstyle5" ,'value'=>$last_name))?></div>
            </div>
            <div class="input email">
                <label for="email">Address</label>
                <div class="input email" ><?php echo $this->Form->input("address1" ,array('id'=>'address','type'=>'textarea','label' => false,'div' => false,'class'=>"umstyle5" ,'value'=>$address1))?></div>
                <div class="error_message" id="error_address" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the address.</h5>
                </div>
            </div>
            <div class="input email">
                <label for="email">City</label>
                <div class="input email" ><?php  echo $this->Form->input("city" ,array('id'=>'city','label' => false,'div' => false,'class'=>"umstyle5",'value'=> $city ))?></div>
                <div class="error_message" id="error_city" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the city.</h5>
                </div>
             </div>
             <div class="input email">
                <label for="email">Pin Code</label>
                <div class="input email" ><?php echo $this->Form->input("pin_code" ,array('id' => 'pin_code', 'label' => false,'div' => false,'class'=>"umstyle5",'value'=> $pin_code ))?></div>
                <div class="error_message" id="error_pin" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the 6 digit pincode</h5>
                </div>
            </div>
            <div class="input email">
                <label for="email">Phone</label>
                <div class="input email" ><?php echo $this->Form->input("phone" ,array('label' => false,'id'=>'phone_len','div' => false,'class'=>"umstyle5",'value'=> $phone ))?></div>
                <div class="error_message" id="error_phone" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the 10 digit mobile no</h5>
                </div>
            </div>
            <div class="input email">
                <label for="email">State</label>
                <div class="input email" ><?php echo $this->Form->input("state" ,array('id' => 'state','label' => false,'div' => false,'class'=>"umstyle5" ,'value'=> $state))?></div>
                <div class="error_message" id="error_state" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter state.</h5>
                </div>
            </div>
            <div class="input email">
                <label for="email">Country</label>
                <div class="input email" ><?php echo $this->Form->input("country" ,array('id' => 'country','label' => false,'div' => false,'class'=>"umstyle5",'value'=> $country ))?></div>
                <div class="error_message" id="error_country" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter country.</h5>
                </div>
            </div>
            <div class="input email" ><?php echo $this->Form->hidden("id" ,array('label' => false,'div' => false,'value'=>$id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['id'] ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("reciver_name" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?></div>
             
                <!--<div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="post_to_fb" class="facebook" checked>
                    <label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
                </div> -->
            <div class="input checkbox">
                <?php echo $this->Form->input('Explicitly Post on Facebook', array('type' => 'checkbox','name'=>'chk','id'=>'chk1','checked'=>'true')); ?>
            </div>
                <div class="input email">
                    <label for="email">Send email to<br/><span style="color:grey;padding-left:20px;font-size:small;">(optional)</span></label>
                    <div class="input email" ><?php echo $this->Form->input("reciever_email" ,array('id'=>
                    'email','label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "$receiver_name@example.com",'value'=> $reciever_email ))?></div>
                    <div class="error_message" id="error_email" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter valid email address.</h5>
                </div>
                </div>
            </div>
            <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. FREE to send</li></ul>

            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send to '.$receiver_name), array('id'=>'form_shipping'));?>  
               
            </div>    
            </div>
                
            <?php
        }   
        else 
        { 
            
           echo $this->Form->create('gifts', array('action' => 'send','id'=>'pra'));
            //echo $this->Form->create('Gift'); ?>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice to $receiver_name",'class'=>"gift-message" ))?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                <div class="error_message" id="error_text" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter the message.</h5>
                </div>
            </div>

            <h4>Deliver your gift</h4>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['id'] ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("reciver_name" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?></div>
            <div class="delivery-sharing">
                <!--<div class="input checkbox"><input type="checkbox" value="facebook" name="facebook" id="post_to_fb" class="facebook" checked>
                    <label for="facebook">Share on <?= $receiver_name; ?>'s Facebook wall</label>
                </div>-->
            <div class="input checkbox">
                <?php echo $this->Form->input('Explicitly Post on Facebook', array('type' => 'checkbox','name'=>'chk','id'=>'chk1','checked'=>'true')); ?>
            </div>
                <div class="input email">
                    <label for="email">Send email to</label>
                    <div class="input email" ><?php echo $this->Form->input("reciever_email" ,array('label' => false,'div' => false,'class'=>"umstyle5", 'placeholder' => "$receiver_name@example.com" ))?></div>
                </div>
            </div>
            <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. FREE to send</li></ul>

            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Send to '.$receiver_name), array('id'=>'form_free'));?>  
               
            </div>     
            </div>

            <?php } ?>
        
        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                                        array('product' => $product,
                          'small' => false),
                                        array('cache' => array(
                                                'key' => $product['Product']['id'].'full'))); ?>
        </div>
        
    <div class="clear"></div>
