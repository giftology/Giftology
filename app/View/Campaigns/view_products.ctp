     <div>
            <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                    <span class="left"></span>
                    <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">                   
                    <span class="left"></span>
                    Share! Surprise!<span class="arrow"></span></a>
                </li>
                <li>Send a gift</li>
            </ul>
        
        </div>  
        <div id="celebration-details">
            <div class="details-container">

                
                <div class="tag-icons"></div>
                <h5 class="line-header">Celebrate your friends  with a Rs. <?=$products['Product']['min_value']?> voucher </h5>
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
            <div id='searc_campaign'>
                                <?php echo $this->Form->create('Campaigns'); ?>
                                <?php echo $this->Form->input('friend_name', array('label'=>'', 'placeholder' => "Search for friends...")); ?>
                               <?php echo $this->Form->end(); ?>
            </div>
                <div id="pra" style="float:left;overflow-y:scroll;height:450px;margin-top:70px;margin-left:-310px">

                    <table style="width:300px" class="friend_result" cellpadding="0" cellspacing="0">
                           
                            <tbody>             
                                <?php
                                
                                    foreach ($data as $data): ?>
                                    <tr class="friends">
                                    <td class="friend_row" id="<?php echo $data['Reminder']['friend_fb_id'];?>"><img src="https://graph.facebook.com/<?= $data['Reminder']['friend_fb_id']; ?>/picture?type=square"/> 
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
                                <p class="content shown"><?= $products['Product']['terms']; ?></p>
                        </div>
                        <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                        </a>
                </div>
           <!-- </div>-->
                <div class="clear"></div>
              <!--  <div style="float:right;positon:relative;margin-right:110px">-->
                    <div class="disclosure opened">
                            <p class="heading">About <?= $products['Vendor']['name']; ?></p>
                            <div class="wrapper" style="height: 0px;">
                                    <p class="content shown"><?= $products['Vendor']['description']; ?></p>
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
                    <div class="greeting-bubble">
                        <?php echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'placeholder' => "Write something nice to ",'class'=>"gift-message" ))?>
                    </div>
                    <div class="shadow-wrapper">
                        <div class="frame">
                            <div class="img-placeholder male">
                                <?php $photo_url = "https://graph.facebook.com/".$facebook_user['id']."/picture"; ?>
                                <img src=<?= $photo_url; ?>>
                            </div>
                        </div>
                    </div>
                
                    <div class="input email" ><?php echo $this->Form->hidden("contribution_amount" ,array('label' => false,'div' => false,'value'=>$products['Product']['min_value'] ))?></div>
                    <div class="input email" ><?php echo $this->Form->hidden("product_id" ,array('label' => false,'div' => false,'value'=>$products['Product']['id'] ))?></div>
                    <div class="input email" ><?php echo $this->Form->hidden("vendor_id" ,array('label' => false,'div' => false,'value'=>$products['Product']['vendor_id'] ))?></div>
                    <div class="input email" ><?php echo $this->Form->hidden("reciever_name" ,array('label' => false,'div' => false,'value'=>$data['Reminder']['friend_name'] ))?></div>
                     <div class="error_message" id="error_text" style="display:none; margin-left:120px;">
                        <h5 style="color:#FF0000">*please enter the message.</h5>
                    </div>
            </div>
            <div class="parent_submit">
            <?php  echo $this->Form->Submit(__('Send'), array('id'=>'form_shipping'));?>
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
                    $(this).attr('disabled', true);
                }
            });
        });
    </script>

    <script type='text/javascript'>
    $(document).ready(function(){
        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        $('#CampaignsFriendName').keyup(function() {
        // interrupt form submission
            var key_value = this.value;
            delay(function(){
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/campaigns/search_friend",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        $('.friends').empty();
                        for(var i = 0; i < count; i++){
                            var check = $("#"+res_data[i]["Reminder"]["friend_fb_id"]).is( "*" );
                            if(!check){
                                if($("#"+res_data[i]["Reminder"]["friend_fb_id"]+"_hidden").is( "*" ))
                                    new_row = '<tr class="friends"><td class="friend_row" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'"><img src="https://graph.facebook.com/'+res_data[i]["Reminder"]["friend_fb_id"]+'/picture?type=square"/>'+res_data[i]["Reminder"]["friend_name"]+'</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"]+'" checked="checked"></td></tr>';

                                else new_row = '<tr class="friends"><td class="friend_row" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'"><img src="https://graph.facebook.com/'+res_data[i]["Reminder"]["friend_fb_id"]+'/picture?type=square"/>'+res_data[i]["Reminder"]["friend_name"]+'</td><td><input class="campaign_checkbox" type="checkbox" name="chk1[]" id="'+res_data[i]["Reminder"]["friend_fb_id"]+'" value="'+res_data[i]["Reminder"]["friend_name"]+'"></td></tr>';
                                
                                $('.friend_result').append(new_row);
                            }
                        }
                        $('.campaign_checkbox').show();
                    }
                });
            },1000);   
        });
    });
    $(document).ready(function(){
        var count_friend = 0;
        var names = new Object();
        $(".campaign_checkbox").live("click", function(){
            var key_value = this.id;
            //alert($(".campaign_checkbox").is(":checked"));
            //if($(".campaign_checkbox").is(':checked')){
            if ($(this).prop('checked')==true){
                count_friend = count_friend + 1;
                if(count_friend > 30){
                    count_friend = count_friend - 1;
                    alert('You can select only max 30');
                    $(this).attr('checked', false);
                    return;
                }
                
                $('<input>').attr({
                    type: 'hidden',
                    id: this.id+'_hidden',
                    name: 'chk2['+this.id+']',
                    value: this.id,
                }).appendTo('#campaign');
                names[key_value] = this.value;
                //alert(names[key_value]);
                //var name=this.value;
                //var myTextArea = document.getElementById('text_message').getAttribute('placeholder');

                //var hello = $("#text_message").attr("placeholder", myTextArea +' '+ name).placeholder();
            }
            else{
                $(this).attr('checked', false);
                count_friend = count_friend - 1;
                if($("#"+this.id+"_hidden").is( "*" )) $("#"+this.id+"_hidden").remove();
                delete names[key_value];
            }

            var placeholder_message = "Write something nice to";
            if(count_friend > 0)
                placeholder_message = placeholder_message+ " selected "+ count_friend + " friends : ";

            for (var i in names) {
               placeholder_message = placeholder_message + " " + names[i];         
            }

            $("#text_message").attr("placeholder", placeholder_message).placeholder(); 
        });
    });

    $('.campaign_checkbox').show();
    
    </script>
