<div class="image-wrapper">
    <?php  echo $this->Form->create('products', array('action' => 'view_products'));?>
    <?php foreach($reminders as $reminder): ?>
        <div class="event" id= "<?= $reminder['Reminder']['encrypted_friend_fb_id']; ?>" name= "<?= $reminder['Reminder']['friend_name']; ?>" birth-data="<?= $reminder['Reminder']['friend_birthday']; ?>" loc-data="<?= $reminder['Reminder']['current_location']; ?>" year-data="<?= $reminder['Reminder']['friend_birthyear']; ?>" sex-data="<?=$reminder['Reminder']['sex']; ?>" ocasion-data="<?= $ocasion; ?>" suggested-friend="<?= $reminder['Reminder']['latest_friend_fb_id']; ?>">
              
                <div class="event suggested">
                        <div class="image-container">
                                <div class="frame-wrapper">
                                        <div class="shadow-wrapper">
                                                <div class="frame">
                                                        <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?width=110&height=110"/>
                                                        <?php if (!isset($no_calendar) && array_key_exists('count', $reminder) ): ?>
                                                            <div class="calendar">
                                                                    <p><?= date('d', strtotime($reminder['Reminder']['friend_birthday'])); ?></p>
                                                            </div>
                                                            <?php else: ?>
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
                        <?php 
                        $age=date("Y")-$reminder['Reminder']['friend_birthyear']; if($age>0 && $age!=date("Y") && array_key_exists('count', $reminder)) : 
                               ?>Turns <?php echo $age ;
                            elseif($reminder['Reminder']['encrypted_user_id']): ?>
                                Return Gift
                              <?php  elseif($reminder['Reminder']['latest_friend_data_id'] && $reminder['Reminder']['sex'] == "male"): ?>
                                Welcome Him
                            <?php  elseif($reminder['Reminder']['latest_friend_data_id'] && $reminder['Reminder']['sex'] == "female"): ?>
                                Welcome Her
                            <?php elseif(!array_key_exists('count', $reminder)): ?>
                                Suggested
                            <?php else: ?>Birthday
                            <?php endif; ?></p>
                </div>
                
        </div>
    <?php endforeach; ?>
    <?php echo $this->Form->end();?>    
</div>

 <script type="text/javascript">

      $(document).ready(function(){

        $('Form > .event').click(function (){
                var gift_value = $(this).attr('id');
                var gift_name = $(this).attr('name');
                var gift_birth = $(this).attr('birth-data');
                var gift_loc = $(this).attr('loc-data');
                var gift_year = $(this).attr('year-data');
                var gift_sex = $(this).attr('sex-data');
                var gift_ocasion = $(this).attr('ocasion-data');
                var gift_suggested = $(this).attr('suggested-friend');
                
                
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
                    id: gift_suggested+'_hidden',
                    name: 'friend_suggested',
                    value: gift_suggested,
                }).appendTo('#productsViewProductsForm');

                 $('<input>').attr({
                    type: 'hidden',
                    id: gift_ocasion+'_hidden',
                    name: 'friend_ocasion',
                    value: gift_ocasion,
                }).appendTo('#productsViewProductsForm');
                $("#productsViewProductsForm").submit() 
            }); 
        });
  </script>