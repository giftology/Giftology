     <div>
            <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                    <span class="left"></span>
                    <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">                   
                    <span class="left"></span>
                    Share Surprise<span class="arrow"></span></a>
                </li>
                <li>Send a gift</li>
            </ul>
        
        </div>  
        <div id="celebration-details">
            <div class="details-container">

                
                <div class="tag-icons"></div>
                <h5 class="line-header">Celebrate your friends  with a Rs. <?=$products['0']['Product']['min_value']?> voucher </h5>
            </div>
            <div class="image-container">
                <div class="polaroid"><!--<?= $this->Facebook->picture($receiver_id, array('linked'=>false, 'size'=>'normal', 'facebook-logo'=>false)); ?>--><img  src="<?= IMAGE_ROOT; ?>Holi-New-290x200pxl.jpg"></div>
                <div class="paperclip"></div>
                
            </div>
        </div>
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
        <h3 class="line-header" style="margin-top:1px">
            <span>Choose Friends</span>
        </h3>
            <div id='searc_campaign'  style="float:left;margin-left:2px">
                                <?php echo $this->Form->create('Campaigns'); ?>
                                <?php echo $this->Form->input('friend_name', array('label'=>'', 'placeholder' => "Search for friends...")); ?>
                               <!-- <?php echo $this->Form->end(__('search_button_small.jpg')); ?>-->
            </div>
                <div id="pra" style="float:left;overflow-y:scroll;height:450px;margin-top:70px;margin-left:-310px">

                    <table style="width:300px" class="friend_result" cellpadding="0" cellspacing="0">
                           
                            <tbody>             
                                <?php
                                
                                    foreach ($data as $data): ?>
                                    <tr>
                                    <td style="" class="friend_row" id="<?php echo $data['Reminder']['friend_fb_id'];?>" name="<?php echo $data['Reminder']['friend_name'];?>"><img src="https://graph.facebook.com/<?= $data['Reminder']['friend_fb_id']; ?>/picture?type=square"/> 
                                    <?php echo $data['Reminder']['friend_name']; ?></td>
                                    <td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="<?php echo $data['Reminder']['friend_fb_id'];?>" value="<?php echo $data['Reminder']['friend_name'];?>"></td>
                                    </tr>
                                    <?php endforeach; ?>
                            </tbody>
                       </table>
                </div> 
    
   <div class="purchase voucher-container" style="width:400px;margin-right:80px;margin-top:40px">
            <div class="clear"></div>
            <!--<div style="float:right;margin-left:70px">-->
                <div class="disclosure opened">
                        <p class="heading">Terms and conditions</p>
                        <div class="wrapper" style="height: 0px;">
                                <p class="content shown"><?= $product['Product']['terms']; ?></p>
                        </div>
                        <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                        </a>
                </div>
           <!-- </div>-->
                <div class="clear"></div>
              <!--  <div style="float:right;positon:relative;margin-right:110px">-->
                    <div class="disclosure opened">
                            <p class="heading">About <?= $product['Vendor']['name']; ?></p>
                            <div class="wrapper" style="height: 0px;">
                                    <p class="content shown"><?= $product['Vendor']['description']; ?></p>
                            </div>
                            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                    <span class="arrow"></span>
                            </a>
                    </div>
               <!-- </div>-->
           <div class="clear"></div>
           <br><br><br><br>
       <!--</div>
           <div> -->
 <?php  echo $this->Form->create('gifts', array('action' => 'send_campaign','id'=>'campaign'));?>
 
         <div class="delivery-details" style="float:left;margin-left:2px">
            <div class="delivery-message">
                     <!--<div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message1','label' => false,'div' => false,'placeholder' => "Write something nice ",'class'=>"gift-message", 'disabled' => 'disabled'))?>
                    </div><br>-->
                    <div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice ",'class'=>"gift-message" ))?>
                    </div>
                    <div class="shadow-wrapper">
                        <div class="frame">
                            <div class="img-placeholder male">
                                <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                                <img src=<?= $photo_url; ?>>
                            </div>
                        </div>
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
                            new_row = "<tr><td><input c;ass='campaign_checkbox' type='checkbox' name='chk1[]' id='"+res_data[i]["Reminder"]["friend_fb_id"]+"' value='"+res_data[i]["Reminder"]["friend_fb_id"]+"'  >"+res_data[i]["Reminder"]["friend_name"]+"</td></tr>";
                            $('.friend_result > tbody:last').last().append(new_row);
                        }
                    }
                    //alert(new_row); tobnd("tr:last"));
                }
            });
        });
    });
    $(document).ready(function(){
        $(".campaign_checkbox").click(function(){
            
            $('<input>').attr({
                    type: 'hidden',
                    id: this.id,
                    name: 'chk2['+this.id+']',
                    value: this.id,
            }).appendTo('#campaign');
            var name=this.value;
            var myTextArea = document.getElementById('text_message').getAttribute('placeholder');

            var hello = $("#text_message").attr("placeholder", myTextArea +' '+ name).placeholder();
            
            //$('.text_message1').val(this.text);
        });


    /*$('<input>').attr({
        type: 'hidden',
        id: this.id,
        name: 'chk2['+this.value()+']',
        value: 'chk',
}).appendTo('#campaign');*/
 });

 $('.campaign_checkbox').show();
</script>
    