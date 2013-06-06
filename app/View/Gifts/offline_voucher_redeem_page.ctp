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
<?= $this->layout = false; ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>A jQuery Countdown Timer | Tutorialzine Demo</title>
        <link rel="stylesheet" href="http://localhost/css/styles1.css" />
        <link rel="stylesheet" href="http://localhost/css/jquery.countdown.css" />
    <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="http://localhost/js/jquery.countdown.js"></script>
    <script src="http://localhost/js/scrit1.js"></script>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
      </head>
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
    <input type="text">
    </div>
    <div class="done">
    <p>done shopping</p>
    </div>
    <div class="tnc">
    <p style="margin:3px 0 0 33px;"><span>Terms & Condition</span> <span ><img src="<?= IMAGE_ROOT.'arrow11.png'; ?>"></span></p>
    
    </div>

    
    
    </div>
  

    </body>
</html>

