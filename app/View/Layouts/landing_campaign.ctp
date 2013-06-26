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
    echo $this->Minify->css(array('main','normalize','flexslider','style'));
    //echo $this->Minify->css('normalize');
    
    //echo $this->Minify->css('flexslider');
    echo $this->Minify->script(array('jquery-1.7.2.min','jquery-ui-1.8.23.min','jquery-1.9.0.min','jquery.easing-1.3','jquery.flexslider-min','plugins','main','carouFredSel','modernizr-2.6.2.min','mixpanel-2.1.min','jquery.ias.min','giftology','accord1'));
    //echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
    //echo $this->Html->script('slides.min.jquery');
    //echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
    //echo $this->Html->script('giftology');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
  ?>
<!-- saved from url=(0044)http://vikasmakwana.com/giftology/index.html -->
<html style="" class=" js flexbox canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers applicationcache svg inlinesvg smil svgclippaths">
<head>
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


      <!--top strip-->
      <?php if(SOCIAL_LIKE): ?>

      <style type="text/css">
      .show-case{margin-top:50px;}
      .flexslider{top:48px;}
      </style>


     <div class="strip" >

        <div id="hc2" class="haccordion" style="position:relative; float:right; color:black;  font:12px/6px Arial, Helvetica, sans-serif;">

        <ul>

          <?php if(FB_LIKE): ?>
        <li style="border-right-width:0">
         <div class="hpanel" style="padding:8px; width:130px" >
        <img src="<?= FULL_BASE_URL; ?>/img/facebook.png" width="30" height="30"  class="fb" style="margin-right:12px"/>

         <!--<div class="fb-like"><?php echo $this->Facebook->like(array('href' => "https://www.facebook.com/GiftologyIndiaa?fref=ts"));?></div>-->

       
         <div class="fb-like" data-href="https://www.facebook.com/GiftologyIndiaa?fref=ts" data-send="false" data-layout="button_count" data-width="120" data-show-faces="false"></div>


            <div id="fb-root"></div>
            <script>
            
            (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0];
              if (d.getElementById(id)) return;
              js = d.createElement(s); js.id = id;
              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=105463376223556";
              fjs.parentNode.insertBefore(js, fjs);

            }(document, 'script', 'facebook-jssdk'));</script>
        </div>
        </li>
        <?php endif; ?>
          <?php if(TWITTER_LIKE): ?>
        <li style="border-right-width:0">
        <div class="hpanel" style="padding:8px; width:156px">
        <img src="<?= FULL_BASE_URL; ?>/img/twitter.png" width="30" height="30" class="tw" style="margin-right:12px"/>
        <a href="https://twitter.com/share" class="twitter-share-button" style="padding-top:4px;">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>
        </li>
         <?php endif; ?>
        <?php if(ANDROID_INSTALL): ?>
        <li style="border-right-width:0">
        <div class="hpanel" style="padding:10px; width:140px">
        <div style="display:inline; margin-right:10px">
        <img src="<?= FULL_BASE_URL; ?>/img/android.png" width="30" height="30" class="ad"/>
        </div>
        <a href="http://bit.ly/Giftologyapp" target="_blank" style="color:#000"> Download app</a>
         
        </div>
        </li>
        <?php endif; ?>
        <?php if(GIFT_SENT): ?>
        <li>
        <div class="hpanel" style="padding:10px; width:200px">
        <div style="display:inline; margin-right:10px">
        <img src="<?= FULL_BASE_URL; ?>/img/gift.png" width="30" height="30" class="gb"/>
        </div>
         Total Gifts Sent: <span style=" box-shadow:0 2px 2px 1px #d7d7d7; padding:2px 5px;  text-shadow:0 1px #f0f0f0;"> <?= $this->Number->format($num_gifts_sent); ?> </span>
          
        </div>
        </li>
      <?php endif;?>
        

        </ul>
        </div>
        </div>
        <?php endif; ?>

        <!--top strip-->
         <div class="logo-block" style="position: absolute;z-index: 6; left:14%; top:0px"><a href="javascript:void(0);" class="logo" style="outline: none;"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt=""></a></div>
      <div class="banner-content" style="height: 363px;">
       
          <?php if(!$campaign_id): ?>
         <!--<p>The fun and easy way to give <span>free </span>and<br>  <span>paid </span>gifts to your <span>Facebook friends</span></p> -->
         <?php endif; ?>
    <script type="text/javascript">
    $(document).ready(function(){
    $("#fb").click(function(){
        $("a").attr("href",$("a").attr("href").replace(/#/, "")); 
    return false; /* This prevents url from # */
});
  });
    </script>    

<?php if($campaign_end_image) {?>
<div class="fbconect" id="fb" ><?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
              'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?></div>
        <div class="clear">&nbsp;</div>
        </div>
    </div>
    <section class="slider">
        <div class="flexslider">
                          <ul class="slides">
                          <li style="display: list-item;">
                          <img src="<?= FULL_BASE_URL; ?>/<?= $campaign_end_image; ?>">
                           </li>
                         </ul>
        </div>
      </section>
      <?php } 
      else {
        ?>
      <div class="fbconect" id="fb" ><?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
              'redirect' => array('controller'=>'campaigns', 'action'=>'view_products',$campaign_id,))); ?></div>
        <div class="clear">&nbsp;</div>
        </div>
    </div>
    <section class="slider">
        <div class="flexslider">
                          <ul class="slides">
                          <li style="display: list-item;">
                          <img src="<?= FULL_BASE_URL; ?>/<?= $campaign_wide_image; ?>">
                           </li>
                         </ul>
        </div>
      </section>
      <?php } ?>
      
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
                      <?= $this->Html->link('RETAILERS', array('controller' => 'retailers', 'action' => 'index', 'Retailers')); ?>
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
haccordion.setup({
accordionid: 'hc2', //main accordion div id
paneldimensions: {peekw:'40px', fullw:'450px', h:'40px'},
selectedli: [-1, true], //[selectedli_index, persiststate_bool]
collapsecurrent: true //<- No comma following very last setting!
})

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
