<div class="image-wrapper">

    <?php foreach($reminders as $reminder): ?>
        <div class="event">
                <a href="<?= $this->Html->url(array('controller' => 'products',
                                                    'action' => 'view_products',
                                                    'receiver_id' => $reminder['Reminder']['friend_fb_id'],
                                                    'receiver_name' => $reminder['Reminder']['friend_name'],
                                                    'receiver_birthday' => $reminder['Reminder']['friend_birthday'],
                                                    'ocasion' => isset($ocasion) ? $ocasion : null)); ?>">
                <div class="event suggested">
                        <div class="image-container">
                                <div class="frame-wrapper">
                                        <div class="shadow-wrapper">
                                                <div class="frame">
                                                        <?php echo $this->Facebook->picture($reminder['Reminder']['friend_fb_id'], array('linked'=>false, 'size'=>'normal', 'facebook-logo'=>false)); ?><br>
                                                        <div class="calendar">
                                                                <p><?= date('d', strtotime($reminder['Reminder']['friend_birthday'])); ?></p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <p class="name"><?= $reminder['Reminder']['friend_name']; ?></p>
                        <?php if(isset($ocasion)): ?>
                                <p class="occasion"><?= $ocasion; ?></p>
                        <?php endif; ?>
                </div>
                </a>
        </div>
    <?php endforeach; ?>	
</div>
