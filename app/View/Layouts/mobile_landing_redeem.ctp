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
        Giftology | The Social Gifting Company | Redemption Page
      </title>
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
    echo $this->Minify->css(array('main_redeem','flexslider','normalize','style1'));
    echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','mixpanel-2.1.min','jquery.ias.min','giftology')); 
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script'); ?>
    <script type="text/javascript">
    var fb_param = {};
    fb_param.pixel_id = '6007399956303';
    fb_param.value = '0.00';
    (function(){
      var fpw = document.createElement('script');
      fpw.async = true;
      fpw.src = '//connect.facebook.net/en_US/fp.js';
      var ref = document.getElementsByTagName('script')[0];
      ref.parentNode.insertBefore(fpw, ref);
    })();
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/offsite_event.php?id=6007399956303&amp;value=0" /></noscript>
    </head>
    <body style="zoom: 1; margin-bottom: 0px;">
        <?php echo $this->Facebook->init(); ?>
        <div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
  
  <div id="MobileRedeemLandingWrapper">
        <section class="inner-content gift-bg">
            <div class="wrap-inner">
            <div class="logo-block"><a href="<?= FULL_BASE_URL; ?>" class="logo"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt=""></a></div>
            <div class="giftology"><img src="<?= FULL_BASE_URL; ?>/img/giftology-log.jpg" alt=""></div>
            <?php $name = explode(" ", $receiver_name);
            $first_name = isset($name[0]) ? $name[0] : NULL;
             ?>
            <div class="recive-by">
                <div class="recive-by-content">
                    <p><b> Hi  <span><?= $first_name ?></span></b></p>
                    <p><b>You've received a gift from <span><?= $sender_name ?></span></b></p>
                     <!--<a href="javascript:void(0);" class="fb-btn">&nbsp;</a>-->
                     <div  id="fb" ><?php echo $this->Facebook->login(array('img' => 'fb-btn.png',
<<<<<<< HEAD
                'redirect' => array('controller'=>'gifts','action'=>'redeem','enc_id'=>$encrypted_gift_id))); ?>
=======
                'redirect' => array('controller'=>'reminders','action'=>'view_friends'))); ?>
>>>>>>> master
                    </div>
                 </div>
                <div class="fblike"><!--<img src="<?= FULL_BASE_URL; ?>/img/fblike.jpg" alt="">--></div>
                
                
            </div>
             <div class="gift-block animated">
                
                    <div class="gift-btm"><img src="<?= FULL_BASE_URL; ?>/img/giftbox.png" alt="" width="100"></div>
                   
                    
                   
                   <!-- <div class="tag-content animated ">
                        <a href="javascript:void(0);" class="tag-logo"><img src="img/tag-logo.png" alt="">--></a>
                     <!--  <span class="withlove">With Love.</span>
                        <span class="name"><a href="javascript:void(0);">-<?= $sender_name ?></a></span>
                    </div>-->
                
             <div class="clear">&nbsp;</div>
             </div>
             
            
                   
        </section>           
                
         <div class="clear"></div>
          <div class="footer text14 txt-center" style="border-top:1px solid #fff; padding:10px 0; ">
            <ul class="footer-links">
              <li> <?= $this->Html->link('Home', array('controller' => 'reminders', 'action' =>  'view_friends')); ?></li>
              <li> <?= $this->Html->link('About Us', array('controller' => 'pages', 'action' =>  'display','AboutUs')); ?></li>
              <li><?= $this->Html->link('FAQ', array('controller' => 'pages', 'action' =>  'display','Faq')); ?></li>
              <li><?= $this->Html->link('Terms Of Service', array('controller' => 'pages', 'action' =>  'display','TermsOfServices')); ?></li>
            </ul>
          </div>
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
<style type="text/css">
#MobileRedeemLandingWrapper{
    width:100%;
    height:auto;
    border:#ccc solid 0px;
    min-height:100%;
    position:relative;
}



#MobileRedeemLandingWrapper .inner-content{
  float: left;
width: 98%;
min-height: 500px;
margin: 0 1%;

}

#MobileRedeemLandingWrapper .wrap-inner{
width: 96%;
margin: 0 auto;
position: relative;
}


#MobileRedeemLandingWrapper .giftology {
position: absolute;
top: 287px;
left:0;
z-index: 0;
width: 80%;

}

#MobileRedeemLandingWrapper .giftology img {

  width:100%;
  height:150px;

}



#MobileRedeemLandingWrapper .recive-by-content {
float: left;
width: 100%;
min-height: 210px;
text-align: center;
font-size: 18px;
padding: 60px 0;
}



#MobileRedeemLandingWrapper #fb{ margin-top:30px;}

#MobileRedeemLandingWrapper #fb img{ width:80%;}

#MobileRedeemLandingWrapper .gift-top {
width: 92px;
height: 265px;
background: url(/img/gift-top.png) no-repeat 0 0;
background-size: 92px 90px;
position: absolute;
left: 0px;
top: 0;

}


#MobileRedeemLandingWrapper .gift-btm {
position: absolute;
top: 60px;
left: -4px;
width: 100px;
z-index: 1;}

#MobileRedeemLandingWrapper .gift-block {
width: 100px;
height: 200px;
float: right;
position: absolute;
right: 0%;
top: 13px;
display: none;
}


#MobileRedeemLandingWrapper .tag-content {
position: absolute;
right: 18px;
top: 106px;
width: 62px;
height: 36px;
background: #f1f1f1;
opacity: .5;
border-radius: 3px;
border: 4px double rgb(156, 205, 33);
}

#MobileRedeemLandingWrapper .withlove {
width: 66px;
font-size: 12px;
font-weight: 600;
text-shadow: 1px 1px 0 #ccc;
margin: 0;
}


#MobileRedeemLandingWrapper .tag-logo {
margin:0;
width: 90px;
height: 3px;

}


#MobileRedeemLandingWrapper .name {
width: 66px;
margin: 0px 0 0 -6px;
text-shadow: 1px 1px 0 #FFF;
font-size: 14px;

}



#MobileRedeemLandingWrapper .filter-btn, #MobileRedeemLandingWrapper .back-btn {float:left; margin:5px 0 5px 5px}
#MobileRedeemLandingWrapper .filter-btn-icon {display:none}

@media all and (max-width:225px) {

#MobileRedeemLandingWrapper .filter-btn { display:none}
#MobileRedeemLandingWrapper .filter-btn-icon { display:none}

}

@media all and (min-width:225px) and (max-width:269px) {

#MobileRedeemLandingWrapper .filter-btn { display:none}
#MobileRedeemLandingWrapper .filter-btn-icon { width:35px; height:30px; margin-top:11px; display:block; float:left}
}

#MobileRedeemLandingWrapper .text14 {font-size:14px}

#MobileRedeemLandingWrapper .footer {background:#444; color:#f5f5f5;
    position:fixed; 
    bottom:0px;
    width:100%;
}
#MobileRedeemLandingWrapper .footer-links {list-style-type:none; margin:0; padding:0;color:#fff;}
  
#MobileRedeemLandingWrapper .footer-links li {display:inline; }

#MobileRedeemLandingWrapper .footer-links li a {padding:2px 0px; margin:0 7px; color:#fff;}

#MobileRedeemLandingWrapper .txt-center {
  text-align:center;
}


</style>
