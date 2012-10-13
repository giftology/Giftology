    <div >
            <?php if(isset($today_users) && $today_users): ?>
            <div>
                    <h4>Celebrate today</h4>
                    <ul data-role="listview" data-theme="c">

                            <?php foreach($today_users as $reminder): ?>
                                <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>" rel="external">
                                                <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?type=normal"/>
                                                <br><?= $reminder['Reminder']['friend_name']; ?>
                                        </a>
                                </li>
                             <?php endforeach; ?>
                    </ul>
            </div>
            <div class="clear"></div>
            <?php endif; ?>

            <?php if(isset($tommorrow_users) && $tommorrow_users): ?>
            <div>
                    <h4>Celebrate tommorrow (schedule gift now)</h4>
                    <ul data-role="listview" data-theme="c">
                            <?php foreach($tommorrow_users as $reminder): ?>
                                <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>" rel="external">
                                                <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?type=normal"/>
                                                <br><?= $reminder['Reminder']['friend_name']; ?>
                                        </a>
                                </li>
                             <?php endforeach; ?>
                    </ul>
            </div>
            <div class="clear"></div>
            <?php endif; ?>

            <?php if(isset($this_month_users) && $this_month_users): ?>
            <div>
                    <h4>Celebrate in <?= date("F"); ?> (schedule gift now)</h4>
                    <ul data-role="listview" data-theme="c">

                            <?php foreach($this_month_users as $reminder): ?>
                                <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>" rel="external">
                                                <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?type=normal"/>
                                                <br><?= $reminder['Reminder']['friend_name']; ?>
                                        </a>
                                </li>
                             <?php endforeach; ?>
                    </ul>
            </div>
            <?php endif; ?>

            <?php if(isset($next_month_users) && $next_month_users): ?>
            <div>
                    <h4>Celebrate in <?= date("F", strtotime(date('Y-m-d')."+ 1month")); ?> (schedule gift now)</h4>
                    <ul data-role="listview" data-theme="c">

                            <?php foreach($next_month_users as $reminder): ?>
                                <li>
                                        <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>" rel="external">
                                                <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?type=normal"/>
                                                <br><?= $reminder['Reminder']['friend_name']; ?>
                                        </a>
                                </li>
                             <?php endforeach; ?>
                    </ul>
            </div>
            <?php endif; ?>

            <?php if(isset($all_users)): ?>
            <div id='friend_list'>
                    <h4>Send a gift card to any friend
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
                                        array('reminders' => $all_users,
                                              'no_calendar' => true),
                                        array('cache' => array(
                                                'key' => $facebook_user['id'].'All-Page'.
                                                (isset($this->request->params['named']['page']) ? $this->request->params['named']['page'] : 1).
                                                date('Y-m-d').'no_calendar'.
                                                (isset($this->request->data['Reminders']) ?
                                                        '_search_'.$this->request->data['Reminders']['friend_name']
                                                        : '')))); ?>
            </div>
            <?php endif; ?>
    </div>

    
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
    
    
    

