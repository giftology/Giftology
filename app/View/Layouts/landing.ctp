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

		echo $this->Html->css('normalize');
		echo $this->Html->css('style');
		echo $this->Html->css('flexslider');
		echo $this->Html->css('main');
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
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
        <script type="text/javascript" async="" src="../js/ga.js"></script><script src="../js/modernizr-2.6.2.min.js"></script>
<body style="zoom: 1; margin-bottom: 0px;">
<?php echo $this->Facebook->init(); ?>
	<div class="transbox" id="transbox" style="display:none"><img class="spinner" src="<?echo IMAGE_ROOT.'/spinner.gif'; ?>"/></div>
	
  <div id="wrapper">
  	<div class="banner-block">
    	<div class="banner-content" style="height: 363px;">
        <div class="logo-block"><a href="javascript:void(0);" class="logo" style="outline: none;"><img src="../img/logo.png" alt=""></a></div>
         <p>The fun and easy way to give <span>free </span>and<br>  <span>paid </span>gifts to your <span>Facebook friends</span></p>
         
        

  <div class="fbconect"><?php echo $this->Facebook->login(array('img' => 'fb-connect-large.png',
							'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?></div>
        <div class="clear">&nbsp;</div>
        </div>
    </div>
    <section class="slider">
        <div class="flexslider">
          <ul class="slides">
            <li style="display: list-item;">
  	    	    <img src="<?= FULL_BASE_URL; ?>/img/slides.jpg">
  	    		</li>
  	    		
          </ul>
        </div>
      </section>
           <section class="show-case">
            <div class="showcase-wrap">
                <ul>
                    <li><img src="<?= FULL_BASE_URL; ?>/img/carat-lane.jpg" alt=""></li>
                    <li><img src="<?= FULL_BASE_URL; ?>/img/firstcry.jpg" alt=""></li>
                    <li><img src="<?= FULL_BASE_URL; ?>/img/jabong.jpg" alt=""></li>
                    <li><img src="<?= FULL_BASE_URL; ?>/img/nirulas.jpg" alt=""></li>
                </ul>
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
                    <?= $this->Html->link('ABOUT US','/AboutUs', array('controller' => 'pages', 'action' =>  'AboutUs')); ?>
                    <?= $this->Html->link('TERMS OF SERVICE','/TermsOfServices', array('controller' => 'pages', 'action' =>  'TermsOfServices')); ?>
                    <?= $this->Html->link('PRIVACY', '/Privacy',array('controller' => 'pages', 'action' =>  'Privacy')); ?>
                    <?= $this->Html->link('FAQ','/Faq', array('controller' => 'pages', 'action' =>  'Faq')); ?>
                    
                    <?= $this->Html->link('RETAILERS', '/Retailers',array('controller' => 'pages', 'action' =>  'Retailers')); ?>
                    <?= $this->Html->link('CONTACT US','/ContactUs', array('controller' => 'pages', 'action' =>  'ContactUs')); ?> 
                    <?= $this->Html->link('MEDIA','/Media', array('controller' => 'pages', 'action' =>  'Media')); ?>
                                      
                     
                 </nav>
                <div class="copyright">© Giftology 2013. All rights reserved</div>
             </div>
          </footer>

		<?php if (isset($this->request->query['utm_source']) &&
		$this->request->query['utm_source'] == 'swaransoft'): ?>
			<img width="1" height="1" border="0" src="http://socialconnexion.in/campaign/pixel.aspx?cam_id=giftologylandingpage ">
		<?php endif; ?>
   	 </div>
 		<script src="../js/jquery-1.9.0.min.js"></script>
        <script src="../js/jquery.easing-1.3.js"></script>
        <script src="../js/jquery.flexslider-min.js"></script>
        <script src="../js/plugins.js"></script>
        <script src="../js/main.js"></script>
       <script type="text/javascript">
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
 <?php echo $this->Mixpanel->embed(); ?>

</body></html>
