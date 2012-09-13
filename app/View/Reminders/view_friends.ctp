    <div class="left-container">
            <?php if(isset($today_users) & $today_users): ?>
            <div>
                    <h4 class="line-header">Celebrate today<div class="calendar"><p><?= date('d'); ?></p></div></h4>
                    <?= $this->element('friend_list',
                                        array('reminders' => $today_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'today.Birthday'.date('Y-m-d')))); ?>
            </div>
            <div class="clear"></div>
            <?php endif; ?>

            <?php if(isset($this_month_users) & $this_month_users): ?>
            <div>
                    <h4 class="line-header">Celebrate this month </h4>
                    <?= $this->element('friend_list',
                                        array('reminders' => $this_month_users,
                                              'ocasion' => 'Birthday', ),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'Month.Birthday'.date('Y-m-d')))); ?>
            </div>
            <?php endif; ?>

            <?php if(isset($all_users) & $all_users): ?>
            <div id='friend_list'>
                    <h4 class="line-header">Send a gift card to any friend
                                            <div id='search_friend'>
                                <?php echo $this->Form->create('Reminders'); ?>
                                <?php echo $this->Form->input('friend_name', array('label'=>'', 'placeholder' => "Search for friends...")); ?>
                                <?php echo $this->Form->end(__('search_button_small.jpg')); ?>
                        </div>

                    </h4>
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
                                        echo $this->Paginator->prev(' << ', array(), null, array('class' => 'prev disabled'));
                                }
                                if ($this->Paginator->hasNext()) {
                                        echo $this->Paginator->next(' >> ', array(), null, array('class' => 'next disabled'));
                                }
                        ?>
                        </div>
                    <?= $this->element('friend_list',
                                        array('reminders' => $all_users),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'All-Page'.
                                                (isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1).
                                                date('Y-m-d').
                                                (isset($this->request->data['Reminders']) ?
                                                        $this->request->data['Reminders']['friend_name']
                                                        : '')))); ?>
            </div>
            <?php endif; ?>
    </div>

    <div id="news-items">
        <div class="shadow-wrapper right items">
                <div class="frame">
                        <h3>Total Gifts Sent</h3><ul>
                       <h4><?= $this->Number->format($num_gifts_sent); ?></h4>
                       <h3>Whats happening now</h3><ul>
                        <?php foreach($gifts_sent as $gift): ?>
                                <li><?= $this->Facebook->name($gift['Sender']['facebook_id']); ?> sent a <?= $gift['Product']['Vendor']['name']; ?> gift voucher to <?= $this->Facebook->name($gift['GiftsReceived']['receiver_fb_id']); ?>
                                </li>
                        <?php endforeach; ?>
                        </ul>
                 </div>
        </div>
    </div>
    
    <div class="clear"></div>
    
        <?php /* Since the JsHelper automatically buffers all generated script content to reduce the number of
       * <script> tags in your source code you must call write the buffer out. At the bottom of your view file. Be sure to include: */ ?>

    <?= $this->Js->writeBuffer(); ?>
    
        <? /*php echo "<h1> welcome to giftology ".$user['UserProfile']['first_name']." ".$user['UserProfile']['last_name']." </h1>"; ?>
    <?php if(isset($user['Reminders'])): ?>
    <?php foreach($user['Reminders'] as $reminder): ?>
        <?php if ($reminder['friend_birthday']): //filter out NULL brithdays?>
            <?php echo $this->Facebook->picture($reminder['friend_fb_id'], array('linked'=>false, 'size'=>'square', 'facebook-logo'=>false)); ?><br>
            <?= $this->Html->link($reminder['friend_name'], array('controller'=>'products', 'action'=>'index', 'receiver_id' => $reminder['friend_fb_id'])); ?><br>
            <?= substr($this->Time->niceShort($reminder['friend_birthday']), 0, -7); // chop off the time char of string?><br>
        <?php endif; ?>
    <?php endforeach; ?>
    <?php endif; */?>
    
    
    

