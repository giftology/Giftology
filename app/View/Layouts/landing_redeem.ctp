<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Giftology: The social gifting company');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js filternone"> <![endif]-->
    <head>
      <title>
        Giftology | The Social Gifting Company | Homepage
      </title>
      <?php if (isset($fb_title)): ?>
          <meta property="og:type" content="giftology:gift" />
          <meta property="og:url" content="<?= $fb_url; ?>" />
          <meta property="og:title" content="<?= $fb_title; ?>" /> 
          <meta property="og:image" content="<?= $fb_image; ?>" /> 
          <meta property="og:description" content="<?= $fb_description; ?>" /> 
      <?php endif; ?>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>giftology</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
         <!--<link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
         <script src="js/vendor/modernizr-2.6.2.min.js"></script>-->
         <?php
    echo $this->Html->meta('icon');
    echo $this->Minify->css(array('main_redeem','flexslider','normalize','style','main'));
    echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','mixpanel-2.1.min','jquery.ias.min','giftology')); 
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script'); ?>
    </head>
    <body style="zoom: 1; margin-bottom: 0px;">
        <?php echo $this->Facebook->init(); ?>
        <div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
  
  <div id="wrapper">
        <section class="inner-content gift-bg">
            <div class="wrap-inner">
            <div class="logo-block"><a href="<?= FULL_BASE_URL; ?>" class="logo"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt=""></a></div>
            <div class="giftology"><img src="<?= FULL_BASE_URL; ?>/img/giftology-log.jpg" alt=""></div>
            <?php $name = explode(" ", $receiver_name);
            $first_name = isset($name[0]) ? $name[0] : NULL;
             ?>
            <div class="recive-by">
                <div class="recive-by-content">
                    <p> Hi  <span><?= $first_name ?></span>
                    <p>You've received a gift from <span><?= $sender_name ?></span></p>
                     <!--<a href="javascript:void(0);" class="fb-btn">&nbsp;</a>-->
                     <div  id="fb" ><?php echo $this->Facebook->login(array('img' => 'fb-btn.png',
                'redirect' => array('controller'=>'gifts','action'=>'redeem','enc_id'=>$encrypted_gift_id))); ?>
                    </div>
                 </div>
                <div class="fblike"><!--<img src="<?= FULL_BASE_URL; ?>/img/fblike.jpg" alt="">--></div>
                
                
            </div>
            <?php echo $this->Facebook->friendpile(); ?>
            
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
              <div class="featured-logo">
                <div class="flogo-block">
                    <span class="block-title">As featured in</span>
                    <div class="featured-in">
                        <a href="javascript:void(0);" class="l1">&nbsp;</a>
                        <a href="javascript:void(0);" class="l2">&nbsp;</a>
                        <a href="javascript:void(0);" class="l3">&nbsp;</a>
                        <a href="javascript:void(0);" class="l4">&nbsp;</a>
                    </div>
                 </div>
                </div>   
          <footer>
            <div class="footer-wrap">
                <nav class="footer-nav">
                   
                   <?= $this->Html->link('HOME', array('controller' => 'reminders', 'action' =>  'view_friends')); ?>
                    <?= $this->Html->link('ABOUT US', array('controller' => 'pages', 'action' =>  'display','AboutUs')); ?>
                      <?= $this->Html->link('MEDIA', array('controller' => 'pages', 'action' =>  'display','Media')); ?>
                      <?= $this->Html->link('RETAILERS', array('controller' => 'pages', 'action' => 'display', 'Retailers')); ?>
                       <?= $this->Html->link('FAQ', array('controller' => 'pages', 'action' =>  'display','Faq')); ?>
                       <?= $this->Html->link('CONTACT US', array('controller' => 'pages', 'action' => 'display', 'ContactUs')); ?>
                    
                     <?= $this->Html->link('BLOG', 'http://mygiftology.wordpress.com/'); ?>
                     <?= $this->Html->link('TERMS OF SERVICE', array('controller' => 'pages', 'action' =>  'display','TermsOfServices')); ?>
                                      
                     
                 </nav>
                <div class="copyright">© Giftology 2013. All rights reserved</div>
             </div>
          </footer>
          <?php if (isset($this->request->query['utm_source']) &&
              $this->request->query['utm_source'] == 'swaransoft'): ?>
                <img width="1" height="1" border="0" src="http://socialconnexion.in/campaign/pixel.aspx?cam_id=giftologylandingpage ">
    <?php endif; ?>
     </div>
        <!--<script src="js/vendor/jquery-1.9.0.min.js"></script>
        <script src="js/vendor/jquery.easing-1.3.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>-->
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
         <!--<script type="text/javascript">
       !function(window){
  var $q = function(q, res){
        if (document.querySelectorAll) {
          res = document.querySelectorAll(q);
        } else {
          var d=document
            , a=d.styleSheets[0] || d.createStyleSheet();
          a.addRule(q,'f:b');
          for(var l=d.all,b=0,c=[],f=l.length;b<f;b++)
            l[b].currentStyle.f && c.push(l[b]);

          a.removeRule(0);
          res = c;
        }
        return res;
      }
    , addEventListener = function(evt, fn){
        window.addEventListener
          ? this.addEventListener(evt, fn, false)
          : (window.attachEvent)
            ? this.attachEvent('on' + evt, fn)
            : this['on' + evt] = fn;
      }
    , _has = function(obj, key) {
        return Object.prototype.hasOwnProperty.call(obj, key);
      }
    ;

  function loadImage (el, fn) {
    var img = new Image()
      , src = el.getAttribute('data-src');
    img.onload = function() {
      if (!! el.parent)
        el.parent.replaceChild(img, el)
      else
        el.src = src;

      fn? fn() : null;
    }
    img.src = src;
  }

  function elementInViewport(el) {
    var rect = el.getBoundingClientRect()

    return (
       rect.top    >= 0
    && rect.left   >= 0
    && rect.top <= (window.innerHeight || document.documentElement.clientHeight)
    )
  }

    var images = new Array()
      , query = $q('img.lazy')
      , processScroll = function(){
          for (var i = 0; i < images.length; i++) {
            if (elementInViewport(images[i])) {
              loadImage(images[i], function () {
                images.splice(i, i);
              });
            }
          };
        }
      ;
    // Array.prototype.slice.call is not callable under our lovely IE8 
    for (var i = 0; i < query.length; i++) {
      images.push(query[i]);
    };

    processScroll();
    addEventListener('scroll',processScroll);

}(this);
         $(function(){
       var testimer
       $('#giftVouchers div').bind('mouseenter',function(){
         var ths = $(this);
         testimer = setTimeout(function(){
          ths.animate({top:'-5px'});   
           },100);
         
        });
         $('#giftVouchers div').bind('mouseleave',function(){
           $(this).animate({top:'0px'});
        });
       
       $('#giftVouchers').carouFredSel({
          width: 1200,
          items: 4,
          scroll: 1,
          'responsive': true,
          auto: {
            duration: 1250,
            timeoutDuration: 4000
          },
          prev: '',
          next: '',
          pagination: ''
        });
    )};
     
     $(window).resize(function(){
       setTimeout(function(){
        $('.banner-content').height($('.flexslider').height());
        },50);
      
       });
      $(window).load(function(){
      setTimeout(function(){
        $('.banner-content').height($('.flexslider').height());
        },100);
    $('.flexslider').flexslider({
      animation: "fade",
      controlNav: false,
      start: function(slider){
        $('body').removeClass('loading');
      }
      });
      
});
  </script>-->
  <script type="text/javascript">
    var clicky_site_ids = clicky_site_ids || [];
    clicky_site_ids.push(66489932);
    (function() {
      var s = document.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = '//static.getclicky.com/js';
      ( document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0] ).appendChild( s );
})();
  </script> 
  <script type="text/javascript">
    $(document).ready(function(){
    $("#fb").click(function(){
        $("a").attr("href",$("a").attr("href").replace(/#/, "")); 
    return false; /* This prevents url from # */
    });
  });
    </script>
  
        <?php echo $this->Mixpanel->embed(); ?>
 </body>
</html>
