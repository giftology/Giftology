<?php if (!$small) : ?>
    <div class="voucher">
            <div class="paper"></div>
            <h2 class="value"><span id="WebRupee" class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></h2>
            <div class="divider"></div>
            <img width="200" height="64" src="<?= FULL_BASE_URL.'/'.$product['Vendor']['wide_image'];
            ?>" class="wide">
            <p class="at">at</p><p class="fine-print"><?= $product['Product']['terms_heading']; ?></p>
            <div class="frame"></div>
    </div>
    <?php if (!isset($redeem) || !$redeem): ?>
        <?php if ($product['Product']['max_price'] > $product['Product']['min_price']): ?>
            <div id="add-value">
                <div id="contrib-text"><center>You pay: <span id="WebRupee" class="WebRupee">Rs.</span></span>
                    <?= $product['Product']['min_price']; ?></center></div>
                <div class="minus-plus">
                        <span type="hidden" class="disabled minus"></span>
                        <span type="hidden" class="plus"></span>
                </div>
            </div>
        <?php else: ?>
            <?php if ($product['Product']['min_price'] > 0): ?>
                <div id="add-value">
                    <div id="contrib-text"><center>You pay: <span id="WebRupee" class="WebRupee">Rs.</span></span>
                        <?= $product['Product']['min_price']; ?></center></div>
                    <div class="minus-plus">
                            <span type="hidden" class="disabled minus"></span>
                            <span type="hidden" class="disabled plus"></span>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <input type="hidden" id="contribution_amount" name="contribution_amount" class="contribution_amount" value="<?= $product['Product']['min_value']; ?>"/>
    <?php endif; ?>
    <div class="disclosure opened">
            <p class="heading">Terms and conditions</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Product']['terms']; ?></p>
            </div>
            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                    <span class="arrow"></span>
            </a>
    </div>
    <div class="disclosure opened">
            <p class="heading">About <?= $product['Vendor']['name']; ?></p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Vendor']['description']; ?></p>
            </div>
            <a class="toggle" onclick="clicky.log('#About Toggle','About Toggle');">
                    <span class="arrow"></span>
            </a>
    </div>
    <div class="gift-amount">
                <p class="amount"><span id="WebRupee" class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></p>
    </div>
    <input type="hidden" id="free-voucher-value" value=<?= ($product['Product']['min_price'] > 0) ? 
                    0 : $product['Product']['min_value']; ?>></input>
    <input type="hidden" id="min-voucher-price" value=<?= $product['Product']['min_price']; ?>></input>
    <input type="hidden" id="max-voucher-price" value=<?= $product['Product']['max_price']; ?>></input>

<?php else: ?>
    <div class="small-voucher" id="<?php echo $product['Product']['encrypted_gift_id']; ?>" >
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$product['Vendor']['thumb_image']; ?>"> </span>
                            <span class="details">
                                    <span class="issuer"><?= $product['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($product['Product']['min_value']) ?
                                        $product['Product']['min_value'] :
                                        $product['min_value']; ?></span>
                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? 'or more':'' ?>



                                    <!--<ul class="voucher-details">
                                        <li class="icon"></li>
                                    </ul>-->
                                    
                            <!--<div id="container">
                                  <p>
                                        <span  id="trigger"><img src="<?= FULL_BASE_URL; ?>/img/notice.gif" alt="" style="float:right"></span>
                                  </p>

                                  <div id="pop-up">
                                    
                                    <p>
                                      <?= $product['Product']['terms']; ?>
                                    </p>
                                  </div>
                            </div>-->
                            




                                    <?php if (isset($hide_price) && $hide_price): ?>
                                            <span class="label">REDEEM</span>
                                    <?php else: ?>
                                            <?php if ($product['Product']['min_price'] == 0): ?>
                                                    <span class="label" >FREE</span>
                                            <?php else: ?>
                                                    <span class="label">PAY <span id="WebRupee" class="WebRupee">Rs.</span>
                                                    <?= $product['Product']['min_price']; ?>
                                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? '+':'' ?>

                                            <?php endif; ?> 
                                    <?php endif; ?>
                            </span>
                    </span>
                    
    </div>
    <span id="trigger"><img class="trigger_tnc" src="<?=FULL_BASE_URL;?>/img/info.png" alt="" style="float: right;margin-top: -129px;margin-right: -28px;position: relative;z-index: 10; height:43px;" name="<?php echo $product['Product']['id'];?>"></span>
                                
                                <div id="<?php echo $product['Product']['id'];?>" class ="pop-up">
                                    <div class="arrownav">

                                </div>
                                 <div style="width:240px;  position:relative;  text-align:justify; border-bottom:1px dotted #333; padding:3px 0;font: normal 11px/20px Georgia;">
                                
                                
                                 <p style="font: normal 11px/20px Georgia, "Times New Roman", Times, serif;">
                                 <?= strip_tags( $product['Vendor']['short_description'],'<p><span><ol><li>');?>
                             </p>
                             </div>
                                <div style="width:240px;  position:relative;text-align:justify;  padding:3px 0;font: normal 11px/18px Georgia;">
                                   
                               
                                <p style="font: normal 11px/18px Georgia, "Times New Roman", Times, serif;">
                                 <?= strip_tags($product['Product']['short_terms'],'<p><span><ol><li>'); ?>
                             </p>
                             </div>
                            

                                <div class="arrownav1">
                              </div>
                            
                              
                          </div>
<?php endif; ?>

<style type="text/css">
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, Helvetica, sans-serif;
       
      }
      
     div.pop-up {
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


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>

    <script type="text/javascript">
      $(function() {
        var gift_value = $('.trigger_tnc').attr('name'); 
        //alert(gift_value );
        $('.trigger_tnc').hover(function(e) {
            var gift_value = this.name;            
            $('#'+gift_value).fadeIn(1000);           
            return false;
          
        }, function() {
            var gift_value = this.name;            
            $('#'+gift_value).fadeOut(1000);
            return false;
        });
        
        $('.trigger_tnc').mousemove(function(e) {
          $("div.pop-up").css('top', e.pageY +40 ).css('left', e.pageX+moveLeft);
        });
        

      });
    </script>

