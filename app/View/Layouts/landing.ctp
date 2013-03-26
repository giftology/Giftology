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
<head>
  <?php echo $this->Html->charset(); ?>
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
  <?php
    echo $this->Html->meta('icon');
    echo $this->Minify->css(array('main', 'normalize','flexslider'));
    //echo $this->Minify->css('normalize');
    
    //echo $this->Minify->css('flexslider');
    echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','ga'));
    //echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    //echo $this->Html->script('slides.min.jquery');
    //echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
    //echo $this->Html->script('giftology');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
<!-- saved from url=(0044)http://vikasmakwana.com/giftology/index.html -->
<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths"><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-24851185-2']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><head>
<!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>giftology</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="http://vikasmakwana.com/giftology/favicon.ico" type="image/x-icon">
         <link rel="stylesheet" href="http://vikasmakwana.com/giftology/css/normalize.css">
        <link rel="stylesheet" href="http://vikasmakwana.com/giftology/css/main.css">
        <link rel="stylesheet" href="http://vikasmakwana.com/giftology/css/flexslider.css"> -->
        <!--<script type="text/javascript" async="" src="../js/ga.js"></script><script src="../js/modernizr-2.6.2.min.js"></script>-->
<body style="zoom: 1; margin-bottom: 0px;">
<?php echo $this->Facebook->init(); ?>
  <div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>
  
  <div id="wrapper">
    <div class="banner-block">
      <div class="banner-content" style="height: 363px;">
        <div class="logo-block"><a href="javascript:void(0);" class="logo" style="outline: none;"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt=""></a></div>
          <?php if(!$campaign_id): ?>
         <p>The fun and easy way to give <span>free </span>and<br>  <span>paid </span>gifts to your <span>Facebook friends</span></p>
         <?php endif; ?>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#fb").click(function(){
        $("a").attr("href",$("a").attr("href").replace(/#/, "")); 
    return false; /* This prevents url from # */
});
  });
    </script>    


<div class="fbconect" id="fb" ><?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
              'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?></div> 
        <div class="clear">&nbsp;</div>
        </div>
    </div>
    <section class="slider">
        <div class="flexslider">
          <?php
            if(isset($campaign_id)): ?>
          <?php 
                      if (glob("img/campaign/$campaign_id*.{jpg,png}",GLOB_BRACE) != false)
                         {
                           $filecount = glob("img/campaign/$campaign_id*.{jpg,png}",GLOB_BRACE);
                             
                             foreach($filecount as $img)
                                { ?> <ul class="slides">
                                     <li style="display: list-item;">
                                     <img src="<?= FULL_BASE_URL; ?>/<?php echo $img; ?>" class="lazy" alt="">
                                     </li>
                                     </ul>
                                    
                              <?php   } }
                              else echo null;

                          
                        else : ?>
                          <ul class="slides">
                          <li style="display: list-item;">
                          <img src="<?= FULL_BASE_URL; ?>/img/slides.jpg">
                           </li>
                         </ul>
              <?php endif;  ?>
        </div>
      </section>

     <!--<?php //if(isset($campaign_Images)): ?>
         <section class="show-case">
        <div class="showcase-wrap"><img width="200px" height="200px" style="border-style:solid;border-width:1px;" src="<?= FULL_BASE_URL.'/'.$campaign_Images['0']['Vendor']['wide_image']; ?>" class="lazy" alt=""></div></section>
      <?php //else: ?>-->
      
     <section class="show-case">
        <div class="showcase-wrap">
           <div id="giftVouchers">
            <?php if(CAROUSEL_CODE == 1): ?>
                <?php
                      if (glob("img/slider/*.{jpg,png}",GLOB_BRACE) != false)
                         {
                           $filecount = glob("img/slider/*.{jpg,png}",GLOB_BRACE);
                             
                             foreach($filecount as $img)
                                { ?>
                                    <div><img src="<?= FULL_BASE_URL; ?>/<?php echo $img; ?>" class="lazy" alt=""></div>
                              <?php   }

                          }
                        else
                                 {
                          echo 0;} 
                ?>
            <?php else: ?>
                  <?php
                      foreach($Images as $Image)
                          { ?>
                              <div><img width="200px" height="200px" style="border-style:solid;border-width:1px;" src="<?= FULL_BASE_URL.'/'.$Image['0']['Vendor']['wide_image']; ?>" class="lazy" alt=""></div>

                                      <?php   }
                      ?>
            <?php endif; ?>
          </div>
        </div>
    </section>
   <!--<?php //endif; ?>-->
         <section class="content-wrap">
            <div class="content-region">
                <span class="block-title">See how it works</span>
                
                <div class="how-it-work">
                    <ul>
                        <li>
                            <span class="title">1. Choose a Friend</span>
                                      <div class="box-block"><img src="<?= FULL_BASE_URL; ?>/img/chose-frnd.png" alt=""></div>
                            <p>You don't need a reason but we<br> notify you of friends birthdays</p>
                        </li>
                        <li>
                            <span class="title">2. Select a Gift</span>
                            <div class="box-block"><img src="<?= FULL_BASE_URL; ?>/img/select-gift.png" alt=""></div>
                            <p>Choose the right gift for your<br>  friend or loved one</p>
                        </li>
                        <li>
                            <span class="title">3. Share the Joy!</span>
                            <div class="box-block"><img src="<?= FULL_BASE_URL; ?>/img/share-joy.png" alt=""></div>
                            <p>That's right! The gift notification is<br> delivered instantly via Facebook</p>
                        </li>
                    </ul>
                </div>
                  <div class="clear">&nbsp;</div>
            </div>
            <div class="featured-logo">
              <div class="flogo-block">
                    <span class="block-title">As featured in</span>
                      <div class="featured-in">
                            <a href="javascript:void(0);" class="l1" style="outline: none;">&nbsp;</a>
                            <a href="javascript:void(0);" class="l2" style="outline: none;">&nbsp;</a>
                            <a href="javascript:void(0);" class="l3" style="outline: none;">&nbsp;</a>
                            <a href="javascript:void(0);" class="l4" style="outline: none;">&nbsp;</a>
                              
                     </div>
                     </div>
                </div>
           </section>
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
    <?php
      //echo $this->Minify->script('../js/jquery-1.9.0.min');
      //echo $this->Minify->script('../js/jquery.easing-1.3');
      //echo $this->Minify->script('.../js/jquery.flexslider-min');
      //echo $this->Minify->script('../js/plugins');
      //echo $this->Minify->script('../js/main');   
      //echo $this->Minify->script('../js/carouFredSel');      
      //echo $this->fetch('script');
    ?>
      
       <script type="text/javascript">
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
    });
     
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
  </script>
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
 <?php echo $this->Mixpanel->embed(); ?>
<?php if($campaign_id):?>
  <!--<script type="text/javascript">
    $('.show-case').hide();
  </script>-->
<?php endif ?>
</body></html>
