<div class="image-wrapper">

   <?php  echo $this->Form->create('products', array('action' => 'view_products'));?>
    <?php foreach($reminders as $reminder): ?>
        <div class="event" id= "<?= $reminder['Reminder']['encrypted_friend_fb_id']; ?>" name= "<?= $reminder['Reminder']['friend_name']; ?>" birth-data="<?= $reminder['Reminder']['friend_birthday']; ?>" loc-data="<?= $reminder['Reminder']['current_location']; ?>" year-data="<?= $reminder['Reminder']['friend_birthyear']; ?>" sex-data="<?=$reminder['Reminder']['sex']; ?>" ocasion-data="<?= isset($ocasion) ? $ocasion : null ; ?>">
                
                <div class="event suggested">
                        <div class="image-container">
                                <div class="frame-wrapper">
                                        <div class="shadow-wrapper">
                                                <div class="frame">
                                                        <img src="https://graph.facebook.com/<?= $reminder['Reminder']['friend_fb_id']; ?>/picture?width=110&height=110"/>
                                                        <?php if (!isset($no_calendar)): ?>
                                                            <div class="calendar">
                                                                    <p><?= date('d', strtotime($reminder['Reminder']['friend_birthday'])); ?></p>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <p class="name"><?= $reminder['Reminder']['friend_name']; ?>
                        </p>
                </div>
                </a>
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
        });
  </script>