

<!--<script>
$(function() {
    var moveLeft = 0;
    var moveDown = 0;
    $('a.popper').hover(function(e) {
   
        var target = '#' + ($(this).attr('data-popbox'));
         
        $(target).show();
        moveLeft = $(this).outerWidth();
        moveDown = ($(target).outerHeight() / 2);
    }, function() {
        var target = '#' + ($(this).attr('data-popbox'));
        $(target).hide();
    });
 
    $('a.popper').mousemove(function(e) {
        var target = '#' + ($(this).attr('data-popbox'));
         
        leftD = e.pageX + parseInt(moveLeft);
        maxRight = leftD + $(target).outerWidth();
        windowLeft = $(window).width() - 40;
        windowRight = 0;
        maxLeft = e.pageX - (parseInt(moveLeft) + $(target).outerWidth() + 20);
         
        if(maxRight > windowLeft && maxLeft > windowRight)
        {
            leftD = maxLeft;
        }
     
        topD = e.pageY - parseInt(moveDown);
        maxBottom = parseInt(e.pageY + parseInt(moveDown) + 20);
        windowBottom = parseInt(parseInt($(document).scrollTop()) + parseInt($(window).height()));
        maxTop = topD;
        windowTop = parseInt($(document).scrollTop());
        if(maxBottom > windowBottom)
        {
            topD = windowBottom - $(target).outerHeight() - 20;
        } else if(maxTop < windowTop){
            topD = windowTop + 20;
        }
     
        $(target).css('top', topD).css('left', leftD);
     
     
    });
 
});
</script>-->

     


<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li><?= $facebook_user['name'].'\'s gifts'; ?></li>
        </ul>
</div>
<br><br>

<ul class="nav2 float-l" style="float:right">
            <li><a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'sent_gifts')); ?> class="wallet <?= isset($gifts_active) ? $gifts_active:''; ?>"><span>Sent Gifts</span></a></li>
           
        </ul>
        <ul class="nav1 float-l" style="float:right">
            <li><a href=<?= $this->Html->url(array('controller'=>'gifts',  'action'=>'view_gifts')); ?> class="wallet <?= isset($gifts_active) ? $gifts_active:''; ?>"><span>Received Gifts</span></a></li>
</ul>
<br><br>
<div>
        <h3 class="line-header">
                <span><?= $facebook_user['name'].'\'s sent gifts&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		//echo $this->Html->link('View Sent gifts  ', array('controller' => 'gifts', 'action' => 'view_gifts', 'sent' => 1));
		//echo $this->Html->link('  View Expired/Used gifts', array('controller' => 'gifts', 'action' => 'view_gifts', 'invalid' => 1));?></span>
        </h3>
        
        <div id="campaign">
		<div id='paginator_nav'>
                                
                        <?php
                                //Set paginator options for AJAX
                                // Not using paginator AJAX.  Using Infinite scroll
                                // ajax instead
                                /*$this->Paginator->options(array(
                                    'update' => '#friend_list',
                                    'evalScripts' => true,
                                ));*/

                                        echo $this->Paginator->prev(' << ', array(), null, array('class' => 'prev disabled'));
                                        echo $this->Paginator->next(' >> ', array(), null, array('class' => 'next disabled'));
                        ?>
                </div>

                <?php foreach ($gifts as $gift): ?>
			<?php $gift['Vendor'] = &$gift['Product']['Vendor']; ?>
			<a href="<?= $this->Html->url(array('controller' => 'gifts',
                    'action' => 'sent_gifts',
                    $gift['Gift']['id'])); ?>"  class="popper" data-popbox="<?=$gift['Gift']['id'];?>">

                <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$gift['Vendor']['thumb_image']; ?>">                     </span>
                            <span class="details">
                                    <span class="issuer"><?= $gift['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($gift['Product']['min_value']) ?
                                        $gift['Product']['min_value'] :
                                        $gift['min_value']; ?></span>
                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? 'or more':'' ?>
                                     <?php
                                   $originalDate = $gift['Gift']['created'];
                                   $newDate = date("j F ", strtotime($originalDate)); ?>
                                    <span class="label" style="margin-top:43px;font-size:11px;background-color: #FFFFFF;color: #000000">Sent On : <?= $newDate ?></span>
                                    <span class="label" style="margin-top:25px;font-size:11px;background-color: #FFFFFF;color: #000000">To : <?= $gift['name'] ?></span>
                                    <?php if ($gift['Gift']['gift_status_id']==GIFT_STATUS_SCHEDULED): ?>
                                            <span class="label" style="margin-top:-20px;font-size:11px;background-color: #FFFFFF;color: #000000">SCHEDULED GIFT</span>
                                     <?php endif; ?> 

                                    
                                            <?php if ($gift['Product']['min_price'] == 0): ?>
                                                    <span class="label">FREE</span>
                                            <?php else: ?>
                                                    <span class="label">PAID <span id="WebRupee" class="WebRupee">Rs.</span>
                                                    <?= $gift['Product']['min_price']; ?>
                                                    <?= (isset($gift['Product']['min_price']) && ($gift['Product']['max_price'] > $gift['Product']['min_price'])) ? '+':'' ?>

                                            <?php endif; ?> 
                                   
                            </span>
                    </span>
                     
    </div>
                </a>
                
                
                <?php endforeach; ?>
		
		<?php if (empty($gifts)): ?>
			<br><br>
			<div class='no_data'>Nothing here yet.  <br><br>Start some good Karma.  Send gifts to some friends, and they'll send you some in return. </div>
		<?php endif; ?>
        </div>
        
        
</div>	



