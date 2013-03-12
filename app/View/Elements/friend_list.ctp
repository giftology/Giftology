<div class="image-wrapper">

    <?php foreach($reminders as $reminder): ?>
        <div class="event">
                <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'receiver_location' => $reminder['Reminder']['current_location'],
                                                    'friend_birthyear' => $reminder['Reminder']['friend_birthyear'],
                                                    'receiver_sex' => $reminder['Reminder']['sex'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>">
                <div class="event suggested">
                        <div class="image-container">
                                <div class="frame-wrapper">
                                        <div class="shadow-wrapper">
                                                <div class="frame">
                                                        <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?type=normal"/>
                                                        <?php if (!isset($no_calendar)): ?>
                                                            <div class="calendar">
                                                                    <p><?= date('d', strtotime($reminder['Reminder']['friend_birthday'])); ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                        <?php if($reminder['count'] != 0): ?>
                        <a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'sent_gifts')); ?>><div class="count" ><p style="font-color:#000000"><?= $reminder['count']; ?></p></div></a>

                         <?php else: ?>
                         <div ></div>
                          <?php endif; ?>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <p class="name"><?= $reminder['Reminder']['friend_name']; ?></p>
                         
                        <p class="occasion">
                        <?php $age=date("Y")-$reminder['Reminder']['friend_birthyear']; if($age>0 && $age!=date("Y")) : 
                               ?>Turns <?php echo $age ;
                            else: ?>
                                Birthday
                            <?php endif; ?></p>
                </div>
                </a>
        </div>
    <?php endforeach; ?>	
</div>
