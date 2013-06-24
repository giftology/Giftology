<?php $this->layout = 'claim'; ?> 

  

<div >
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <?= $facebook_user['name']; ?>'s gifts<span class="arrow"></span>
                </li>
                <li>Claim your gift</li>
                
        </ul>
        
</div>


<br><br>



<div id="gift-details">

        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('claim',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Gift']['id'].'claim'))); ?>
        </div>
       <div class="delivery-message">
                <div class="greeting-bubble" style="font-size:14px">

                    <?php
                    echo $gift['Gift']['gift_message'];?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$gift['Sender']['facebook_id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                
              </div>
              <?php echo $this->Form->create('gifts', array('action' => 'claim'));?>
              <?php echo $this->Form->hidden("giftid" ,array('value'=>$us ))?>
            <?php if($gift['Product']['product_type_id'] == 2 && $gift['Gift']['claim'] == 0) : ?>
              <div class="delivery-sharing">
                <h4 style="font-size:13px">The gift will be arriving soon to the following address:</h4>
                <center><h3 style="margin-top: 25px;">Shipping Address</h3></center>
                  <div class="input email">
                        <label for="email">First Name</label>
                        <div class="input email" ><?php echo $this->Form->input("first_name" ,array('id' => 'first_name','label' => false,'div' => false,'value'=>$value_shipping['UserAddress']['first_name']))?></div>
                        <div class="error_message" id="error_first" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the first name.</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">Last Name</label>
                        <div class="input email" ><?php  echo $this->Form->input("last_name" ,array('id' => 'last_name','label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['last_name'] ))?></div>
                        <div class="error_message" id="error_last" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the second name.</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">Address</label>
                        <div class="input email" ><?php echo $this->Form->input("address1" ,array('id'=>'address','type'=>'textarea','label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['address1'] ))?></div>
                        <div class="error_message" id="error_address" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the address.</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">City</label>
                        <div class="input email" ><?php  echo $this->Form->input("city" ,array('id'=>'city','label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['city'] ))?></div>
                        <div class="error_message" id="error_city" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the city.</h5>
                        </div>
                     </div>
                     <div class="input email">
                        <label for="email">Pin Code</label>
                        <div class="input email" ><?php echo $this->Form->input("pin_code" ,array('id' => 'pin_code', 'label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['pin_code'] ))?></div>
                        <div class="error_message" id="error_pin" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the 6 digit pincode</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">Phone</label>
                        <div class="input email" ><?php echo $this->Form->input("phone" ,array('label' => false,'id'=>'phone_len','div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['phone']))?></div>
                        <div class="error_message" id="error_phone" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter the 10 digit mobile no</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">State</label>
                        <div class="input email" ><?php echo $this->Form->input("state" ,array('id' => 'state','label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['state'] ))?></div>
                        <div class="error_message" id="error_state" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter state.</h5>
                        </div>
                    </div>
                    <div class="input email">
                        <label for="email">Country</label>
                        <div class="input email" ><?php echo $this->Form->input("country" ,array('id' => 'country','label' => false,'div' => false,'class'=>"umstyle5",'value'=>$value_shipping['UserAddress']['country'] ))?></div>
                        <div class="error_message" id="error_country" style="display:none; margin-left:120px;">
                            <h5 style="color:#FF0000">*please enter country.</h5>
                        </div>
                    </div>
                    <div class="input email" ><?php echo $this->Form->hidden("user_add_id" ,array('label' => false,'div' => false,'value'=>$gift['Gift']['gift_address_id'] ))?></div>
                  </div>
            <?php endif; ?>
               <div class="parent_submit" style="margin-left: 80px">
            <?php echo $this->Form->end(__('Save To Gift Box'), array('id'=>'form_shipping'));?>
               
            </div>
              
  </div> 
          <div class="clear"></div>

        
          <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
          <script type='text/javascript'>
           $('.single-use').click(function() {
        // interrupt form submission
            var key_value = this.id;
           //alert(key_value);
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/gifts/fetch_code",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        //$('.event').remove();
                        //$('#paginator_nav').remove();
                        
                         $('#ititemplate').tmpl(res_data).appendTo('#gift-details');
                     }

                     });
           
        });
   

</script>


     <script type="text/javascript">

      $(document).ready(function(){
            $(".submit").click(function (){
             var e = false;
                var emailRegex = new RegExp(/^[0-9-+]+$/);
                var valid_phone = emailRegex.test($("#phone_len").val());
              
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
                if ($("#last_name").val().length == 0) {
                    $("#error_last").show();
                    e = true;
                }
                else{
                    $("#error_last").hide();    
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

                    
                    if(e) return false;
            });
           
        });
      
      </script>

