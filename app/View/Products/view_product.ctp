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

                /*if ($("#email").val().length == 0)
                 {
                    var r=confirm("continue without email address!");
                    if (r==true)
                      {
                         return true;
                      }
                    else
                      {
                        e = true;
                      }
                    }*/
                    if($("[id='chk1']:checked").length<1)
                    {
                        if(!valid){
                            alert("please enter valid email id");
                            return false;
                        }
                        else{
                            return ture;
                        }
                        
                        return false;
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
                 var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
                var valid = emailRegex.test($("#giftsRecieverEmail").val());

                if($("[id='chk1']:checked").length<1){
                    if(!valid){
                        alert("Please enter the email id");
                        return false;
                    }
                    else{
                        return ture;
                    }
                    
                    return false;
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
            <?php 
            if (isset($receiver_birthday) &&
                        !$this->Time->isToday($receiver_birthday) &&
                        isset($ocasion) &&
                        $ocasion == 'Birthday' ) {
                        $send_now = 0;
                        $message = array("A little something to get the party started. Happy birthday!","Now, that’s just for being the best. Happy birthday!","You got this gift to celebrate. Happy birthday!","Today lets celebrate YOU. Happy birthday!");
                        $mess = array_rand($message,1);
                      $message_random = $message[$mess];
                    }
                     else {
                        $send_now = 1;
                        $message = array(" I saw this gift and couldn't help getting it for you.","Here’s a gift just for being the best!","I hope this gift makes you feel as great as you are.");
                        $mess = array_rand($message,1);
                          $message_random = $message[$mess];
                        //print_r($message[$mess]);
                    }
                    if($receiver_birthday == date('Y-m-d'))
                    {
                        $message = array("A little something to get the party started. Happy birthday!","Now, that’s just for being the best. Happy birthday!","You got this gift to celebrate. Happy birthday!","Today lets celebrate YOU. Happy birthday!");
                        $mess = array_rand($message,1);
                      $message_random = $message[$mess];
                    }
                    if($receiver_id == $facebook_id)
                    {
                        $message_random ="Thank you Giftology for my gift! Can't wait to unwrap it :)";
                    }
                    $receiver = explode(" ", $receiver_name);
                    if ($suggested_friends) {
                        $send_now = 1;
                       $message = array(" I saw this gift and couldn't help getting it for you.","Here’s a gift just for being the best!","I hope this gift makes you feel as great as you are.");
                        $mess = array_rand($message,1);
                          $message_random = $message[$mess];
                    }
            ?>
             <h3>Will be delivered: 
           <?php 
               if($receiver_id == $facebook_id ):?>
               <strong>Today</strong>
           <?php else: ?>

                <strong>
                    <select id="demo-html" class="demo-htmlselect" style="width:110px">
                        <?php if($send_now == 0 ): ?>
                        <option value="0" class="send" id="schedule"><!--<?= 
                        date("d-m-Y", strtotime($receiver_birthday)); ?>-->On Birthday</option> 
                         <?php endif; ?>
                         
                        <option value="0" class="send" id="today">Now</option>

                         <option value="0" id="later" class=c1>Later</option>
                    </select>
                </strong>
                <?php if($send_now == 0 ): ?>
                        <span id = "birthday_date" style="margin-left:10px;font-size: 20px"><?= 
                        date("d-m-Y", strtotime($receiver_birthday)); ?></span>
                    <?php endif; ?>
                <span id = "date" style="margin-left:60px;font-size: 20px"></span>
         <?php endif; ?>
                </h3>
             

               

             </div>
               

             <div id="myDropdown">
                 
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
            <h4>Include a Message</h4>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                    <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'value' => "$message_random ",'class'=>"gift-message" ))?>
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
            <span style="float:right;display:none;top:320px;left:32%;position:absolute" id="datepicker1"><?php echo $this->Form->hidden("date_to_send_later" ,array('style'=>'top:20%','label' => false,'div' => false,'id'=>'datepicker' ))?></span>
            <div class="input email" ><?php echo $this->Form->hidden("id" ,array('label' => false,'div' => false,'value'=>$id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['encrypted_gift_id'] ))?></div>
             <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$session_token ))?></div>
            <div class="input email" id="input_email"><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
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
            <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. Purchase to send</li></ul>

            <div class="parent_submit">
            <?php echo $this->Form->Submit(__('Purchase for '.$receiver_name), array('id'=>'form_shipping'));?>  
               
            </div>    
            </div>
                
            <?php
        }   
        else 
        { 
            
           echo $this->Form->create('gifts', array('action' => 'send','id'=>'pra'));
            //echo $this->Form->create('Gift'); ?>
            <h4>Include a Message</h4>
            <div class="delivery-details">
            <div class="delivery-message">
                <div class="greeting-bubble">
                   
                    <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'value' => "$message_random ",'class'=>"gift-message" ))?>
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
            <span style="float:right;display:none;top:320px;left:32%;position:absolute" id="datepicker1"><?php echo $this->Form->hidden("date_to_send_later" ,array('style'=>'top:20%','label' => false,'div' => false,'id'=>'datepicker' ))?></span>
            <div class="input email" ><?php echo $this->Form->hidden("user_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$product['Product']['encrypted_gift_id'] ))?></div>
            <div class="input email" ><?php echo $this->Form->hidden("gift_id" ,array('label' => false,'div' => false,'value'=>$session_token ))?></div>
            <div class="input email" id="input_email"><?php echo $this->Form->hidden("send_now" ,array('label' => false,'div' => false,'value'=>$send_now ))?></div>
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
                <div class="error_message" id="error_email" style="display:none; margin-left:120px;">
                    <h5 style="color:#FF0000">*please enter valid email address.</h5>
                </div>
            </div>
            <?php if($product['Product']['min_price']!=0): ?>
                <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. Purchase to Send</li></ul>
                 <div class="parent_submit">
                <?php echo $this->Form->Submit(__('Purchase for '.$receiver_name), array('id'=>'form_free'));?>  
               
                </div>
            <?else:?>
                <ul class="voucher-details"><li>Valid for <?= $product['Product']['days_valid']; ?> days. FREE to send</li></ul>
                 <div class="parent_submit">
                <?php echo $this->Form->Submit(__('Send to '.$receiver_name), array('id'=>'form_free'));?>  
                   
                </div>
             <?php endif; ?>
               
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
    <script type='text/javascript'>
    $(document).ready(function(){
        $('#form_free').click(function(){
            $(this).attr('disabled','disabled');
            if( $('.gift-message').val() !='' && !$("[id='chk1']:checked").length<1) 
                $(this).parents('form').submit();
            else $(this).removeAttr('disabled');  
        });

         $('#form_shipping').click(function(){
            $(this).attr('disabled','disabled');
            if( $('.gift-message').val() !='' && !$("[id='chk1']:checked").length<1) 
                $(this).parents('form').submit();
            else $(this).removeAttr('disabled');    
        });

        /*$('.umstyle5').blur(function(){
            var field_value = $(this).val();
            if(field_value != ''){
                $('#form_free').removeAttr('disabled');
                $('#form_shipping').removeAttr('disabled');      
            }
            else{
                $('#form_free').attr('disabled',true);     
                $('#form_shipping').attr('disabled',true);    
            }
            var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
            var valid = emailRegex.test(field_value);

            if (field_value.length == 0){
                var r=confirm("continue without email address!");
                if (r==true){
                        $('#form_free').removeAttr('disabled');
                        $('#form_shipping').removeAttr('disabled');
                        return true;
                }
                else{
                    e = true;
                }
            }
            else if(!valid){
                $("#error_email").show();
                e = true;  
            }
            else if(valid){
                e = false;
                $("#error_email").hide();
                
            }
            if(e){
                $('#form_free').attr('disabled',true);     
                $('#form_shipping').attr('disabled',true); 
                return false;
            }
            else{
                $('#form_free').removeAttr('disabled');
                $('#form_shipping').removeAttr('disabled');    
            }
        });*/  
    });
    </script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
 
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
   
   <script  type='text/javascript'>
$(document).ready(function(){
    $(".demo-htmlselect").change(function(){
        var id = $(this).find(':selected')[0].id;
        
       if(id=="later"){
        //alert(formattedDate);
      $("#datepicker1").show();
      $("#datepicker").show();
      $("#date").show();
       $("#birthday_date").hide();
      var vall= $("#input_email > #giftsSendNow").val('0');
      var vall= $("#datepicker1 > #datepicker").val(formattedDate);
      }
      else{
        $("#datepicker1").hide();
      $("#datepicker").hide();
      $("#date").hide();
      //var vall= $("#datepicker1 > #datepicker").attr('value');
      var vall= $("#datepicker1 > #datepicker").val('');
      var vall= $("#input_email > #giftsSendNow").val('1');

      }
      if(id=="today"){
        var vall= $("#input_email > #giftsSendNow").val('1');
        $("#birthday_date").hide();
    }
    if(id=="schedule"){
       var vall= $("#input_email > #giftsSendNow").val('0');
        $("#birthday_date").show();
    }
      

      
    });
    
      
});
  </script>
  <script  type='text/javascript'>
  var formattedDate;
  $(function() {
    $( "#datepicker" ).datepicker({
      showOn: "button",
      buttonImage: "http://giftology.com/img/Calender.png",
      buttonImageOnly: true,
      dateFormat: 'yy-mm-dd',
      buttonText: "Choose the date",
      onClose: function() {
    var dateText = new Date($(this).val());
    var  date = new Date($(this).val());
    if (dateText) {

        formattedDate = (date.getDate() ) + "-" + 
                            (date.getMonth() +1) + "-" + 
                            date.getFullYear();
        var selected = new Date(dateText).getTime();
        
       var today = new Date(new Date().getFullYear(), new Date().getMonth()+2, new Date().getDate()).getTime();
       var today_Date = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()).getTime();
      
       if(today > selected && selected > today_Date){
        
        document.getElementById("date").innerHTML = "On"+" "+formattedDate; 
       }
       else{
        var name = '<?php echo $receiver_name;?>';
        var name = name.split(" ");
        
        alert("Oops.. You're thinking too far ahead! Surprise " +name[0]+ " earlier."); 
       }
                         
        if(formattedDate == "NaN-NaN-NaN")
        {
            document.getElementById("date").innerHTML = "";
        }
    }
}
    });

  });

  </script>
  <style>
    div.ui-datepicker
    {
    font-size:10px;
    }

</style>





    
     

    