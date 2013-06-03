<?php
echo $this->Minify->css(array('main_redeem','flexslider','normalize','style','main'));
    echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','mixpanel-2.1.min','jquery.ias.min','giftology'));?>
  
  <div id="wrapper" style="mrgin-top:30px;" >
        <section class="inner-content gift-bg">
            <div class="wrap-inner"><div class="giftology"><img src="<?= FULL_BASE_URL; ?>/img/giftology-log.jpg" alt=""></div>
           <div class="recive-by">
                <div class="recive-by-content">
                  <div  id="fb" ><?php echo $this->Form->input("Save To Gift Box" ,array('name'=>'gift','type' => 'submit','id' => 'gift','label' => false,'div' => false,'class'=>'imageclick'))?>
                    </div>
                </div>
                
                
                
            </div>
           
            
            <div class="gift-block animated">
                <div class="gift-content">
                    <div class="gift-top animated">&nbsp;</div>
                    <div class="top-shadow">&nbsp;</div>
                    <div class="gift-btm"><img src="<?= FULL_BASE_URL; ?>/img/gift-btm.png" alt=""></div>
                    <div class="box-shadow"></div>
                    
                    <div class="roof"></div>
                    <div class="tag-content animated ">
                        <a href="javascript:void(0);" class="tag-logo"><!--<img src="img/tag-logo.png" alt="">--></a>
                        <span class="withlove">With Love...</span>
                        <span class="name"><a href="javascript:void(0);">-<?= $sender_name ?></a></span>
                    </div>
                </div>
             </div>
             <div class="clear">&nbsp;</div>
            </div> 
                   
        </section>           
              
          
        <script type="text/javascript">
                $(window).load(function(){
                    $('.gift-block').addClass('bounceInDown').fadeIn();
                    setTimeout(function(){
                        $('.gift-block').removeClass('bounceInDown');
                        },1500);
                        
                    $('.tag-content').hover(function(){
                        $(this).addClass('swing');
                        },function(){
                            $(this).removeClass('swing');
                            }); 
                            
                    $('.gift-content').hover(function(){
                        $('.gift-top').addClass('topswing');
                        },function(){
                            $('.gift-top').removeClass('topswing');
                            });         
                            
                    
                    setTimeout(function(){
                        $('.box-shadow').fadeIn('slow');
                        },700);
                });
        </script>