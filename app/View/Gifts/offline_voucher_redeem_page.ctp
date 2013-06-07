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
        
        <div class="done1" >
        <span>done</span> 
        </div>
      </div>
      







      
  <div id="container" >
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
    </div>
        <!--<div class="value">
        <img src="<?= IMAGE_ROOT.'value11.png'; ?>" >
        </div>-->
    
        <div class="count">
          <div id="countdown"></div>
          <p id="note"></p>
        </div>
        <div>
                <center><?= $gift['Gift']['code']; ?></center>
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

<style type="text/css">
.disclosure {
    -moz-box-sizing: border-box;
    background-color: #FAFAFA;
    border: 1px solid #CCCCCC;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.08) inset;
    margin-bottom: 30px;
    padding: 7px;
    position: relative;
    width: 288px;
}
.disclosure p.heading {
    font-size: 14px;
    font-weight: bold;
}
.disclosure p {
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    margin: 0;
}
.disclosure .wrapper {
    -moz-transition: height 300ms ease 0s;
    height: 0;
    overflow: hidden;
}
.disclosure p.content {
    font-size: 12px;
    padding-top: 10px;
}
.disclosure p {
    font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
    margin: 0;
}
.disclosure .toggle {
    background-color: transparent;
    background-image: url("http://localhost/img/expand-disclosure.png");
    border: medium none;
    border-radius: 0 0 0 0;
    bottom: -13px;
    box-shadow: none;
    cursor: pointer;
    display: block;
    height: 26px;
    margin: 0;
    min-width: 0;
    padding: 0;
    position: absolute;
    right: 4px;
    width: 25px;
}
.disclosure.opened .toggle .arrow {
    -moz-animation: 500ms ease-out 0s normal none 1 disclosure-spin-flip;
    -moz-transform: rotate(180deg);
}
.disclosure .toggle .arrow {
    -moz-transform-origin: 50% 3px;
    background-image: url("http://localhost/img/expand-disclosure.png");
    background-position: 0 -78px;
    display: block;
    height: 10px;
    left: 6px;
    position: absolute;
    top: 9px;
    width: 13px;
}



.voucher .frame {
    background-image: url("/img/voucher-frame.png");
    height: 250px;
    position: absolute;
    top: 0;
    width: 100%;
}
.frame {
    display: block;
}
.voucher {
    height: 250px;
    position: relative;
    width: 320px;
}
.voucher .paper {
    background-color: white;
    bottom: 25px;
    left: 23px;
    position: absolute;
    right: 23px;
    top: 23px;
}
.voucher-container.purchase .voucher h2 {
    display: none;
}
.voucher .value {
    color: #000000;
    font-family: Adelle,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 45px;
    font-weight: bold;
    margin: 0;
    position: absolute;
    text-align: center;
    top: 42px;
    width: 100%;
}
#WebRupee {
    display: inline;
}
.WebRupee {
    font-family: 'WebRupee';
}
.voucher .value {
    color: #000000;
    font-family: Adelle,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 45px;
    font-weight: bold;
    text-align: center;
}

.voucher .divider {
    background-image: url("/img/voucher-divider-line.png");
    height: 2px;
    left: 17px;
    position: absolute;
    top: 120px;
    width: 288px;
}

.voucher .at {
    color: #8C8C8C;
    font-family: Adelle,"Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 20px;
    margin: 0;
    position: absolute;
    text-align: center;
    top: 107px;
    width: 100%;
}
p {
    margin: 0;
}
.voucher .fine-print {
    bottom: 28px;
    color: #4D4D4D;
    font-size: 11px;
    margin: 0;
    position: absolute;
    text-align: center;
    width: 100%;
}
.voucher img.wide {
    height: 64px;
    left: 50%;
    margin-left: -100px;
    position: absolute;
    top: 140px;
    width: 200px;
}



</style>

