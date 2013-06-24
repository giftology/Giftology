
<div class="small-voucher" id="<?php echo $product['Product']['encrypted_gift_id']; ?>">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <!--////////////////////////////////////////////////////////////////
                             <?php  if(FALSE): ?>
                            <span id="trigger"><img class="trigger_tnc1" src="<?=FULL_BASE_URL;?>/img/info.png" alt="" style="float: right;margin-top: -1px;margin-right: -28px;position: relative;z-index: 10; height:43px;" name="<?php echo $product['Product']['id'];?>"></span>
                            <?php  
                             if($product['Vendor']['short_description'] || $product['Product']['short_terms']): ?>
                             <div id="<?php echo $product['Product']['id'];?>" class ="pop-up1">
                                <?php if($product['Vendor']['short_description']): ?>
                                <div style="width:240px;  position:relative;  text-align:justify; border-bottom:1px dotted #333; padding:3px 0;font: normal 11px/20px Georgia;">
                                    <p style="font: normal 11px/20px Georgia, "Times New Roman", Times, serif;">
                                        <?= strip_tags( $product['Vendor']['short_description'],'<p><span><ol><li>');?>
                                    </p>
                                </div>
                            <?php endif; 
                              if($product['Product']['short_terms']):  
                            ?>

                                <div style="width:240px;  position:relative;text-align:justify;  padding:3px 0;font: normal 11px/18px Georgia;">
                                    <p style="font: normal 11px/18px Georgia, "Times New Roman", Times, serif;">
                                        <?= strip_tags($product['Product']['short_terms'],'<p><span><ol><li>'); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                                <div class="arrownav">
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php endif; ?>
                            //////////////////////////////////////////////-->
                             <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$product['Vendor']['thumb_image']; ?>">						</span>
                            <span class="details">
                                    <span class="issuer"><?= $product['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($product['Product']['min_value']) ?
                                        $product['Product']['min_value'] :
                                        $product['min_value']; ?></span>
                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? 'or more':'' ?>

                                    <?php if (isset($hide_price) && $hide_price): ?>
                                            <span class="label">REDEEM</span>
                                    <?php else: ?>
                                            <?php if ($product['Product']['min_price'] == 0): ?>
                                                    <span class="label">FREE</span>
                                            <?php else: ?>
                                                    <span class="label">PAY <span id="WebRupee" class="WebRupee">Rs.</span>
                                                    <?= $product['Product']['min_price']; ?>
                                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? '+':'' ?>

                                            <?php endif; ?> 
                                    <?php endif; ?>
                            </span>
                    </span>
                    
    </div>


    <!--//////////////////////////////////////////////////
    <style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
       
      }
      
     div.pop-up1 {
display: none;
position: absolute;
width: 240px;
height: auto;
padding: 0px 10px;
background: #ECEAEA;
color: #000000;
border: 3px solid #8AB819;
border-radius:  10px;
font-size: 90%;
z-index: 20;
opacity: 0.8;
margin-left:30px;
}



     /* .small-voucher .selected-overlay {
    background-image: url("/img/small-voucher-hover.png");
    display: none;
    height: 110px;
    margin-top: -10px;
    position: absolute;
    width: 200px;
    z-index: 10;*/
}
    </style>
<!--/////////////////////////////////////////////////////////


     <script type="text/javascript">
      $(function() {
        var gift_value = $('.trigger_tnc1').attr('name'); 
        //alert(gift_value );
        $('.trigger_tnc1').hover(function(e) {
            var gift_value = this.name;            
            $('#'+gift_value).fadeIn(1000);           
            return false;
          
        }, function() {
            var gift_value = this.name;            
            $('#'+gift_value).fadeOut(200);
            return false;
        });
        
        $('.trigger_tnc1').mousemove(function(e) {
          $("div.pop-up1").css('top', e.pageY-1350 ).css('left', e.pageX+moveLeft);
        });
        

      });
    </script>-->
    