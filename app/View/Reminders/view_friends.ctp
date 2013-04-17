<!--<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script type='text/javascript'>
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

</script>


<script id="ititemplate" type="text/x-jquery-tmpl">
 <?php  echo $this->Form->create('products', array('action' => 'view_products'));?>
 <div class="event" id="${Reminder.encrypted_friend_fb_id}" name="${Reminder.friend_name}" birth-data="${Reminder.friend_birthday}" loc-data="${Reminder.current_location}" year-data="${Reminder.friend_birthyear}" sex-data="${Reminder.sex}">
     <div class="event suggested">
        <div class="image-container">
            <div class="frame-wrapper">
                <div class="shadow-wrapper">
                    <div class="frame">
                        <img src="https://graph.facebook.com/${Reminder.friend_fb_id}/picture?type=normal">
                    </div>
                </div>
            </div>
        </div>
        <p class="name">${Reminder.friend_name}</p>
    </div>
</div>
 <?php echo $this->Form->end();?>               
</script>

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
                                        echo $this->Paginator->prev($this->html->image('35x35_prev.png'), array('escape' => false), null, array('class' => 'prev disabled'));
                                } ?>
                                <?php 
                                    $page = isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1;

                                    $count = $total_friends/24;
                                    $count = $count + 1; ?>
                                <span class="pages"><span id="prev"><?= intval($page) ?></span>/<span id="next"><?= intval($count) ?></span></span>
                                <?php if ($this->Paginator->hasNext()) {
                                        echo $this->Paginator->next($this->html->image('35x35_next.png'), array('escape' => false), null, array('class' => 'next disabled'));
                                }
                        ?>
                        </div>
            </div>
            <?php endif; ?>
    </div>

                                


 <div id="news-items" >
        <div class="shadow-wrapper right items">
                <div class="frame">
                <html xmlns="http://www.w3.org/1999/xhtml"
                xmlns:fb="https://www.facebook.com/2008/fbml">
      
            <div id="fb-root"></div>
            <script src="http://connect.facebook.net/en_US/all.js"></script>
            <h4>Like Giftology ? Invite your friends!</h4>
            <button id="SendButtonForNoPerms"class="spread showtransbox"
              onclick="sendRequestViaMultiFriendSelector(); return false;"
              value="Spread the Joy"
            >Spread the Joy       
            </button>
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
    </div>
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
                       <h3>Whats happening now</h3><ul>
            <?php $last_sender_id = 0; ?>
            
                        <?php foreach($gifts_sent as $gift): ?>
                        <?php echo $gift['Gift']['sender_id']; ?>

                <?php if ($gift['Sender']['facebook_id'] != $last_sender_id): ?>
                                <li>
                                <div>
                                <img src="https://graph.facebook.com/<?= $gift['Sender']['facebook_id']; ?>/picture?type=square"/>
                                <p></p><?= $gift['sender_name']['UserProfile']['first_name'].' '.$gift['sender_name']['UserProfile']['last_name']; ?> sent a <?= $gift['Product']['Vendor']['name']; ?> gift voucher to <?= $gift['receiver_name']['Reminder']['friend_name']; ?>
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
    
    
