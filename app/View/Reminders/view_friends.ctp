<script type="text/javascript">
var res_data;
  var fb_param = {};
  fb_param.pixel_id = '6007399956303';
  fb_param.value = '0.00';
  (function(){
    var fpw = document.createElement('script');
    fpw.async = true;
    fpw.src = '//connect.facebook.net/en_US/fp.js';
    var ref = document.getElementsByTagName('script')[0];
    ref.parentNode.insertBefore(fpw, ref);
  })();
  </script>
  <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6007399956303&amp;value=0" /></noscript>
<!--<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<!--<script type='text/javascript'>
    $(document).ready(function(){
        var delay = (function(){
          var timer = 0;
          return function(callback, ms){
            clearTimeout (timer);
            timer = setTimeout(callback, ms);
          };
        })();
        $('#friend_name').keyup(function() {
        // interrupt form submission
            var key_value = this.value;
            delay(function(){
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/reminders/search_friend",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        $('.event').remove();
                        $('#paginator_nav').remove();
                        
                         $('#ititemplate').tmpl(res_data).appendTo('.image-wrapper');
                     
                        $('Form > .event').click(function (){
                            //alert("shubham");
                            var gift_value = $(this).attr('id');
                            var gift_name = $(this).attr('name');
                            var gift_birth = $(this).attr('birth-data');
                            var gift_loc = $(this).attr('loc-data');
                            var gift_year = $(this).attr('year-data');
                            var gift_sex = $(this).attr('sex-data');
                            var gift_ocasion = $(this).attr('ocasion-data');
                            //alert(gift_value + " " + gift_name + " " + gift_birth);
                            $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_value+'_hidden',
                                    name: 'friend_id',
                                    value: gift_value,
                                }).appendTo('#productsViewProductsForm');

                                   $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_name+'_hidden',
                                    name: 'friend_name',
                                    value: gift_name,
                                }).appendTo('#productsViewProductsForm');

                                    $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_birth+'_hidden',
                                    name: 'friend_birth',
                                    value: gift_birth,
                                }).appendTo('#productsViewProductsForm');

                                     $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_year+'_hidden',
                                    name: 'friend_year',
                                    value: gift_year,
                                }).appendTo('#productsViewProductsForm');

                                 
                                 $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_sex+'_hidden',
                                    name: 'friend_sex',
                                    value: gift_sex,
                                }).appendTo('#productsViewProductsForm');

                                

                                 $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_loc+'_hidden',
                                    name: 'friend_loc',
                                    value: gift_loc,
                                }).appendTo('#productsViewProductsForm');
                                 $('<input>').attr({
                                    type: 'hidden',
                                    id: gift_ocasion+'_hidden',
                                    name: 'friend_ocasion',
                                    value: gift_ocasion,
                                }).appendTo('#productsViewProductsForm');
                                $("#productsViewProductsForm").submit() 

                        });
                        
                        //$('.campaign_checkbox').show();
                    }
                });
            },1000);   
        });
    });

</script>-->


<!--<script id="ititemplate" type="text/x-jquery-tmpl">
 <?php  echo $this->Form->create('products', array('action' => 'view_products'));?>
 <div class="event" id="${Reminder.encrypted_friend_fb_id}" name="${Reminder.friend_name}" birth-data="${Reminder.friend_birthday}" loc-data="${Reminder.current_location}" year-data="${Reminder.friend_birthyear}" sex-data="${Reminder.sex}">
     <div class="event suggested">
        <div class="image-container">
            <div class="frame-wrapper">
                <div class="shadow-wrapper">
                    <div class="frame">
                        <img src="https://graph.facebook.com/${Reminder.friend_fb_id}/picture?width=110&height=110">
                    </div>
                </div>
            </div>
        </div>
        <p class="name">${Reminder.friend_name}</p>
    </div>
</div>
 <?php echo $this->Form->end();?>               
</script>-->




<?php                                        
            $date_to_compare = strtotime(date('Y-m-d H:i:s'));
            $profile_generated_since = floor(abs($date_to_compare - strtotime($user_created)) / 86400);
            if((!($user_mail) && ($mail_verified == 0)) || ((substr($user_created, 0, 10) ==  date('Y-m-d')) && ($mail_verified == 0)) || (($profile_generated_since < 5) && ($mail_verified == 0)) || (($profile_generated_since >= 180) && ($profile_generated_since < 190) && ($mail_verified == 0)) || (DEFAULT_EMAIL_VERIFICATION && ($mail_verified == 0)))
              { ?>


                      <div id="popup_box"  > <!-- OUR PopupBox DIV-->
                      <p> "We don't want you to miss upcoming birthdays. Help us keep you informed by confirming your email address"</p>
                      <p style="display:inline !important;">
                      <span>Your registered E-mail address is</span>
                      <input class="u-4" name="email" id="email"  placeholder="Email" style="display:none;" />
                         <div  id="error_email" style="display:none; ">
                         <h5 style="color:#FF0000; display:inline;" id="error_email">*please enter valid email address.</h5>
                        </div>
                      <span style="color:#b70000; margin:0 20px 0 10;" id="registered"><b><?php echo $user_mail; ?></b></span>
                      <span id="edit">edit</span>
                      
                                 <input type="button" name="submit" title="send" class="submission" id="submitt" value="Confirm Email Address" style="border:2px solid black; margin:10px; cursor:pointer;  "  />
                                <input type="button" name="" class="reset" value="Ask me later"  id="ask" style=" border:2px solid black; cursor:pointer;"  />

                                <input type="submit" name="submit" title="send" class="submission" id="done" value="Done" style="border:2px solid black; margin:10px; display:none; cursor:pointer; "  />
                        
     
                      </p>
       
     
      
     


                     </div>
  <?php } ?>

<div class="left-container">
            <?php if(isset($today_users) && $today_users): ?>
            <div>
                    <h4 class="line-header">Celebrate today<div class="calendar"><p><?= date('d'); ?></p></div></h4>
                    <h5>Selected Friend will be tagged in your post</h5>
                    <?= $this->element('friend_list',
                                        array('reminders' => $today_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'today.Birthday'.date('Y-m-d')))); ?>
            </div>
            <div class="clear"></div>
            <?php endif; ?>

            <?php if(isset($tommorrow_users) && $tommorrow_users): ?>
            <div>
                    <h4 class="line-header">Celebrate tommorrow (schedule gift now)</h4>
                    <h5>Selected Friend will be tagged in your post</h5>
                    <?= $this->element('friend_list',
                                        array('reminders' => $tommorrow_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'tommorrow.Birthday'.date('Y-m-d')))); ?>
            </div>
            <div class="clear"></div>
            <?php endif; ?>

            <?php if(isset($this_month_users) && $this_month_users): ?>
            <div>
                    <h4 class="line-header">Celebrate in <?= date("F"); ?> (schedule gift now)</h4>
                    <h5>Selected Friend will be tagged in your post</h5>
                    <?= $this->element('friend_list',
                                        array('reminders' => $this_month_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'Month.Birthday'.date('Y-m-d')))); ?>
            </div>
            <?php endif; ?>

            <?php if(isset($next_month_users) && $next_month_users): ?>
            <div>
                    <h4 class="line-header">Celebrate in <?= date("F", strtotime(date('Y-m-d')."+ 1month")); ?> (schedule gift now)</h4>
                    <h5>Selected Friend will be tagged in your post</h5>
                    <?= $this->element('friend_list',
                                        array('reminders' => $next_month_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'NextMonth.Birthday'.date('Y-m-d')))); ?>
            </div>
            <?php endif; ?>

            <?php if(isset($all_users)): ?>
            <div id='friend_list'>
                    <h4 class="line-header">Send a gift card to any friend
                                <div id='search_friend'>
                                <?php echo $this->Form->create('Reminders'); ?>
                                <?php echo $this->Form->input('friend_name', array('id'=>'friend_name','label'=>'', 'placeholder' => "Search for friends...")); ?>
                                <?php echo $this->Form->end(__('search_button_small.jpg')); ?>
                        </div>

                    </h4>
                           <h5>Selected Friend will be tagged in your post</h5>
                        
                    <?= $this->element('friend_list_all',
                                        array('reminders' => $all_users,
                                              'no_calendar' => true),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'All-Page'.
                                                (isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1).
                                                date('Y-m-d').'no_calendar'.
                                                (isset($this->request->data['Reminders']) ?
                                                        '_search_'.$this->request->data['Reminders']['friend_name']
                                                        : '')))); ?>


                        <div id='paginator_nav'>
                                
                       <?php
                                //Set paginator options for AJAX
                                // Not using paginator AJAX.  Using Infinite scroll
                                // ajax instead
                                /*$this->Paginator->options(array(
                                    'update' => '#friend_list',
                                    'evalScripts' => true,
                                ));*/

                                if ($this->Paginator->hasPrev()) {
                                        echo $this->Paginator->prev($this->html->image('35x35_prev.png' , array("title" => "Prev")), array('escape' => false), null, array('class' => 'prev disabled'));
                                } ?>
                                <?php 
                                    $page = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1;

                                    $count = $total_friends/24;
                                    $count = $count + 1; ?>
                              
                                <span class="pages"><span id="prev"><?= intval($page) ?></span>/<span id="next"><?= intval($count) ?></span></span>
                                 
                                <?php if ($this->Paginator->hasNext()) {
                                        echo $this->Paginator->next($this->html->image('35x35_next.png' , array("title" => "Next")), array('escape' => false), null, array('class' => 'next disabled'));
                                }
                        ?>
                        </div>
            </div>
            <?php endif; ?>
    </div>

<div class="send_urself" id="news-items">
    <?php  echo $this->Form->create('products', array('action' => 'view_products'));?><div class="eve" style="cursor:pointer;float:right;margin-bottom:-25px" id="<?= $id ?>" name="<?= $name[0]['first_name']." ".$name[0]['last_name'] ?>"><img src="<?= IMAGE_ROOT; ?>Giftyourself_Button.png" alt="Go On, Spoil Yourself!!" title="Gift Yourself"/></div>
     <?php echo $this->Form->end();?>    
</div>
<div id="news-items" class="android_app" style="margin-bottom:-35px;cursor:pointer"><img src="<?= IMAGE_ROOT; ?>GooglePlay_Button.png" alt="Android App" title="App Coming Soon, Stay Tuned!"/> </div>
<div id="news-items" style="margin-bottom:35px;cursor:pointer">
       
                
                <html xmlns="http://www.w3.org/1999/xhtml"
                xmlns:fb="https://www.facebook.com/2008/fbml">
      
           
           
            <div id="SendButtonForNoPerms"class="spread showtransbox"
              onclick="sendRequestToRecipients(); return false;"
              value="Spread the Joy" style="background:transparent!important; cursor:pointer;"
            > <img src="<?= IMAGE_ROOT; ?>FInvite_Button.png" alt="Invite Friends" title="Invite Your Friends"/>      
            </div>
            <?php 
                $imploded_facebook_id = NULL;
                if(isset($facebook_id) && !empty($facebook_id)){
                    $imploded_facebook_id = implode(',',$facebook_id);
                }
            ?>
            <input type="hidden" value="<?php  echo $imploded_facebook_id;?>" name="user_ids" />
            <script>
              FB.init({
                appId  : '105463376223556',
                frictionlessRequests: true
              });

              function sendRequestToRecipients() {
                var user_ids = document.getElementsByName("user_ids")[0].value;
                FB.ui({method: 'apprequests',
                  message: 'Giftology',
                  to: user_ids
                }, requestCallback);
              }

              function sendRequestViaMultiFriendSelector() {
                FB.ui({method: 'apprequests',
                  message: 'Giftology'
                }, requestCallback);
              }
              
              function requestCallback(response) {
                // Handle callback here
              }
            </script>
       
   
</div>
<!--<div id="news-items" style="margin-top:-20px" >
        <div class="shadow-wrapper right items">
                <div class="frame">
                        <h3>News</h3><ul>
                       
            <?php foreach($gifts_opens as $gifts_open):  ?>

               
                   
                        
                    <li>

                            <div>
                                <img src="https://graph.facebook.com/<?= $gifts_open['Gift']['receiver_fb_id']; ?>/picture?type=square"/>
                                <p></p><?= $this->Facebook->name($gifts_open['Gift']['receiver_fb_id']); ?> opened your <?= $gifts_open['Product']['Vendor']['name']; ?> gift.
                                <span id="timeago"><?= $this->Time->timeAgoInWords($gifts_open['Gift']['gift_open_date']); ?></span>
                            </div>
                    </li>
                     <?php endforeach; ?>
                
                        <?php foreach($gift_expires as $gift_expire):  ?>
                        <li>
                            <div>
                                <img src="https://graph.facebook.com/<?= $gift_expire['Gift']['receiver_fb_id']; ?>/picture?type=square"/>
                                <p></p>Your <?= $gift_expire['Product']['Vendor']['name']; ?> gift expires in 7 days.
                                
                                
                            </div>
                          </li>  
                        
               
              
                
                 <?php endforeach; ?>
                        
                        </ul>
                 </div>
        </div>
    </div>-->
 
    <div id="news-items" style="margin-top:-20px">
        <div class="shadow-wrapper right items">
                <div class="frame">
                        <h3>Total Gifts Sent</h3><ul>
                       <h4><?= $this->Number->format($num_gifts_sent); ?></h4>
                       <h3>What's Happening Now</h3><ul>
            <?php $last_sender_id = 0; ?>
            
                        <?php foreach($gifts_sent as $gift): ?>
                        <?php echo $gift['Gift']['sender_id']; ?>
                        
                <?php if ($gift['Sender']['facebook_id'] != $last_sender_id && $gift['GiftsReceived']['receiver_fb_id']!=$gift['Sender']['facebook_id']): ?>
                                <li>
                                <div>
                                <img src="https://graph.facebook.com/<?= $gift['Sender']['facebook_id']; ?>/picture?type=square"/>
                              
                                <p></p><a target="_new" href="https://facebook.com/profile.php?id=<?php echo $gift['Sender']['facebook_id']; ?>"><?= $gift['sender_name']['UserProfile']['first_name']; ?> </a>sent a <?= $gift['Product']['Vendor']['name']; ?> gift voucher to <a target="_new" href="https://facebook.com/profile.php?id=<?php echo  $gift['GiftsReceived']['receiver_fb_id']; ?>"><?= $gift['receiver_name']['Reminder']['friend_name']; ?> </a>
                                 <span id="timeago"><?= $this->Time->timeAgoInWords($gift['GiftsReceived']['created']); ?></span>

                                
                </p></div></li>
                <?php $last_sender_id = $gift['Sender']['facebook_id']; ?>
                <?php endif; ?>
                        <?php endforeach; ?>
                        </ul>
                 </div>
        </div>
    </div>
    
    <div class="clear"></div>
    <?php if (isset($fire_swaransoft_pixel)): ?>
       <img width="1" height="1" border="0" src="http://socialconnexion.in/campaign/pixel.aspx?cam_id=giftologyreg">
    <?php endif; ?>

        <?php /* Since the JsHelper automatically buffers all generated script content to reduce the number of
       * <script> tags in your source code you must call write the buffer out. At the bottom of your view file. Be sure to include: */ ?>

    <?= $this->Js->writeBuffer(); ?>
    
        <?php /*php echo "<h1> welcome to giftology ".$user['UserProfile']['first_name']." ".$user['UserProfile']['last_name']." </h1>"; ?>
    <?php if(isset($user['Reminders'])): ?>
    <?php foreach($user['Reminders'] as $reminder): ?>
        <?php if ($reminder['friend_birthday']): //filter out NULL brithdays?>
            <?php echo $this->Facebook->picture($reminder['friend_fb_id'], array('linked'=>false, 'size'=>'square', 'facebook-logo'=>false)); ?><br>
            <?= $this->Html->link($reminder['friend_name'], array('controller'=>'products', 'action'=>'index', 'receiver_id' => $reminder['friend_fb_id'])); ?><br>
            <?= substr($this->Time->niceShort($reminder['friend_birthday']), 0, -7); // chop off the time char of string?><br>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; */?>
    <?php 
    if($send_date == "")
    {
        $date = "";
    } 
    else{
        //$date =date("Y-m-d", strtotime($send_date['Gift']['created']));
        $days_before_mail = "7";
        $product_expire_date=date('Y-m-d', strtotime('+'.$days_before_mail.'days', strtotime($send_date['Gift']['created'])));
        
    }
    
     ?>
    <script type="text/javascript">

      $(document).ready(function(){
       var new_date = '<?php echo $product_expire_date;?>';
       var total_time = new Date(new_date).getTime();
       if(new_date)
       {
        
             var current = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate()).getTime();
            // alert(new_date+ " "+ total_time + " " +current);
            if(total_time > current){
                $(".send_urself").hide();
            }
            else{
                $(".send_urself").show();
            }
        }
       else
       {
            $(".send_urself").show();
        }
        $('Form > .eve').click(function (){

                var gift_value = $(this).attr('id');
                var gift_name = $(this).attr('name');
                //alert(gift_value + " "+gift_name );

                
                  $('<input>').attr({
                    type: 'hidden',
                    id: gift_value+'_hidden',
                    name: 'friend_id',
                    value: gift_value,
                }).appendTo('#productsViewProductsForm');

                   $('<input>').attr({
                    type: 'hidden',
                    id: gift_name+'_hidden',
                    name: 'friend_name',
                    value: gift_name,
                }).appendTo('#productsViewProductsForm');

                $("#productsViewProductsForm").submit() 
            }); 
        $(".android_app").click(function (){
            alert("App Coming Soon, Stay Tuned!");
        });
        });
  </script>
  <script type="text/javascript">
$(document).ready(function()
{
    $(".android_app").hover(
        function()
        {
            $(this).find("img").attr("src", "../img//Googleplay_Button_1.png");
        },
        function()
        {
            $(this).find("img").attr("src", "../img//GooglePlay_Button.png");
        }                         
    ); 

    $(".eve").hover(
        function()
        {
            $(this).find("img").attr("src", "../img//Giftyourself_Button_3.png");
        },
        function()
        {
            $(this).find("img").attr("src", "../img//Giftyourself_Button.png");
        }                         
    ); 

    $("#SendButtonForNoPerms").hover(
        function()
        {
            $(this).find("img").attr("src", "../img//Finvite_Button_2.png");
        },
        function()
        {
            $(this).find("img").attr("src", "../img//FInvite_Button.png");
        }                         
    );                  
});

  </script>
    
<script type="text/javascript">
    
    $(document).ready( function() {
        // When site loaded, load the Popupbox First
        loadPopupBox();
    
        $('#ask').click( function() {
            $('#popup_box').slideUp(1000);
        });
        $('#submitt').click( function() {
            var email_submit= '<?php echo $user_mail; ?>' ;

            if(email_submit){
                
         $.ajax({   
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/reminders/email_update",
                    data: "email="+email_submit,
                    success: function(data) {
                        var res_data = jQuery.parseJSON(data);
                        alert(res_data);
                        if(res_data == "Verification mail has been sent to your Id"){
                          $('#popup_box').slideUp(1000);  
                        } else{
                          return false;
                        
                        }
                          return false;
                           
                    }});
            $('#popup_box').slideUp(1000);
        }
           else{
            alert("Oops, we are missing your e-mail id.");
            return false;
           }

        });
            $('#edit').click( function() {
                $(this).hide();
                $('#submitt').hide();
                $('#ask').hide();
                
            $('#email').fadeIn(1000);
            $('#done').fadeIn(1000).css('display','inline');
            $('#registered').css('display','none');
            
        });
        function loadPopupBox() {   // To Load the Popupbox
            $('#popup_box').fadeIn(1000);
                    
        }
         /**********************************************************/   
    });
    
</script>

<script type="text/javascript">

      $(document).ready(function(){
            $("#done").click(function (){
                var e = false;
                var emailRegex = new RegExp(/^[0-9-+]+$/);
                 var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
                var valid = emailRegex.test($("#email").val());

                if ($("#email").val().length == 0)
                 {
                     $("#error_email").show();
                             e = true;  
                    
                    }
               else if(!valid)
                        {
                          $("#error_email").show();
                             e = true;  
                        }
                else if(valid)
                        {
                            $("#error_email").hide(); 
                            var email_val= $("#email").val();
                            $("#done").attr('disabled','disabled');
         $.ajax({   
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/reminders/email_update",
                    data: "email="+email_val,
                    success: function(data) {
                        var res_data = jQuery.parseJSON(data);
                        alert(res_data);
                        if(res_data == "Verification mail has been sent to your Id"){
                          $('#popup_box').slideUp(1000);  
                        }else{
                            var res_data = jQuery.parseJSON(data);
                            alert(res_data);
                            return false;
                        }
                          return false;
                    }
                });
                        }
                if(e) return false;
            });
           
        });
      
      </script>
