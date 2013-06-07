<!--<div id="gift-details">

        <h3><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full_redeem'))); ?>
        </div>
       <div id="gift-redemption-details">
            <div id="redemption-code-title">Redemption Code</div>
            	<div id="redemption-code"><center><?= $gift['Gift']['code']; ?></center></div>
            </div>
        </div>
</div>  --><!DOCTYPE html>
<!--
<html>
    <head>
        <meta charset="utf-8" />
        <title>A jQuery Countdown Timer | Tutorialzine Demo</title>
        <link rel="stylesheet" href="http://localhost/css/styles1.css" />
        <link rel="stylesheet" href="http://localhost/css/jquery.countdown.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://localhost/js/jquery.countdown.js"></script>
    <script src="http://localhost/js/scrit1.js"></script></head>
  <body>
    <div id="wrapper">
        <div id="container" >
            <div class="logo">
                <img src="<?= IMAGE_ROOT.'logo11.png'; ?>">
            </div>
            <div class="value">
                <img src="<?= IMAGE_ROOT.'value11.png'; ?>" >
            </div>
    
            <div class="count">
                <div id="countdown"></div>
                <p id="note"></p>
            </div>

            <div>
                <center><?= $gift['Gift']['code']; ?></center>
            </div>

            <div class="done">
                <p>done shopping</p>
            </div>
            <div class="disclosure opened">
               <p class="heading">Terms and conditions</p>
               <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $gift['Product']['terms']; ?></p>
               </div>
                <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                    <span class="arrow"></span>
                </a>
           </div>
        </div>
    </div>
  

    </body>
</html> -->



<?= $this->layout = false; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="http://localhost/css/styles1.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://localhost/js/jquery.countdown.js"></script>
    <script src="http://localhost/js/scrit1.js"></script>
</head>
<body>
    <div id="wrapper">
        <div class="headerbluebg">
            <div class="logo">
                <img src="<?= IMAGE_ROOT.'logo11.png'; ?>">
            </div>
            <!-- <div class="done1" >
                <span>done</span> 
                </div>
              </div>-->
            <div id="container" >
            <center>
                <div class="small">
                    <div class="voucher">
                        <div class="paper"></div>
                        <h2 class="value"><span id="WebRupee" class="WebRupee">Rs.</span><?= $gift['Product']['min_value']; ?></h2>
                        <div class="divider"></div>
                        <img width="200" height="64" src="<?= FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image'];
                        ?>" class="wide">
                        <p class="at">at</p><p class="fine-print"><?= $gift['Product']['terms_heading']; ?></p>
                        <div class="frame"></div>
                    </div>
                
                    <!--<div class="value">
                    <img src="<?= IMAGE_ROOT.'value11.png'; ?>" >
                    </div>-->
                
                    <div class="count">
                      <div id="countdown"></div>
                      <p id="note"></p>
                    </div>
                    <span class="spans"> 
                        <center><?= $gift['Gift']['code']; ?></center>
                    </span>
                    <div class="disclosure opened">
                           <p class="heading">Terms and conditions</p>
                           <div class="wrapper" style="height: 0px;">
                                <p class="content shown"><?= $gift['Product']['terms']; ?></p>
                           </div>
                            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                            </a>
                    </div>
                </div>
           </center>
       </div>
   </div>
</body>
</html>

<script type="text/javascript">
$(document).ready(function(){
 $('.toggle').click(function () {
        //JQuery animate cannot understand
        //auto height, so calculate and give
        //to animate before calling
        var curHeight = $(this).parent().find('.wrapper').height();
        $(this).parent().find('.wrapper').css('height', 'auto');
        var finalHeight = $(this).parent().find('.wrapper').height();
        
        //check if wrapper is already open
        if (curHeight == finalHeight) {
            finalHeight = 0;
        }
        $(this).parent().find('.wrapper').height(curHeight).animate({
            height: finalHeight
            }, 1000, function() {
            // Animation complete.
        });
    });
  });
</script>
