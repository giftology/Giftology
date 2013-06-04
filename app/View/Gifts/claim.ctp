<?php $this->layout = 'claim'; ?> 

<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <?= $facebook_user['name']; ?>'s gifts<span class="arrow"></span>
                </li>
                <li>Claim your gift</li>
                
        </ul>
        
</div>


<br><br>



<div id="gift-details">

        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('claim',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Gift']['id'].'claim'))); ?>
        </div>
       <div class="delivery-message">
                <div class="greeting-bubble" style="font-size:14px">

                    <?php
                    echo $gift['Gift']['gift_message'];?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$gift['Sender']['facebook_id']."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                
              </div>
              <?php echo $this->Form->create('gifts', array('action' => 'claim'));?>
              <?php echo $this->Form->hidden("giftid" ,array('value'=>$us ))?>
               <div class="parent_submit">
            <?php echo $this->Form->end(__('Save To Gift Box'));?>
               
            </div>
              
          </div> 
          <div class="clear"></div>
          <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
          <script type='text/javascript'>
           $('.single-use').click(function() {
        // interrupt form submission
            var key_value = this.id;
           //alert(key_value);
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/gifts/fetch_code",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        //$('.event').remove();
                        //$('#paginator_nav').remove();
                        
                         $('#ititemplate').tmpl(res_data).appendTo('#gift-details');
                     }

                     });
           
        });
   

</script>