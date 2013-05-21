<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,  maximum-scale=1.0, user-scalable=no">
<title>Welcome to Giftology</title>

<?php echo $this->Html->css('style-mobile');
		echo $this->Html->script('giftology');
                echo $this->Html->script('jquery-1.7.2.min');
?>
</head>

<body>
    <?php echo $this->Facebook->init(); ?>
<div id="wrapper"> 
  <!--body wrapper start-->
  <div class="home-content" style="padding-bottom:30px">
    <marquee behavior="scroll" direction="left" scrollamount="3" >
     <?php
                      if (glob("img/mobile/*.{jpg,png}",GLOB_BRACE) != false)
                         {
                           $filecount = glob("img/mobile/logos/*.{jpg,png}",GLOB_BRACE);
                             
                             foreach($filecount as $img)
                                { ?>
                                    <img src="<?= FULL_BASE_URL; ?>/<?php echo $img; ?>" class="lazy" alt="">
                              <?php   }

                          }
                        else
                                 {
                          echo 0;} 
                ?>
    </marquee>
    <div class="clear"></div>
   </div>
  
  <div class="logo" align="center"><img src="<?= FULL_BASE_URL; ?>/img/mobile/brand-logo-mobile.png"  alt="" /></div>
  <div class="clear"></div>
  <div class="transbox" id="transbox" style="display:none"></div>
  <div class="home-content h" >
    <p>The fun and easy way to give 
      gifts to your facebook friends</p>
      <div class="logo" align="center"><?php echo $this->Facebook->login(array('img' => 'fb-connect-mobile.png',
              'redirect' => array('controller'=>'reminders', 'action'=>'view_friends'))); ?></div>
  <div class="clear"></div>
  </div>
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
  <br>
  <div class="clear"></div>
  <div class="footer text14 txt-center" style="border-top:1px solid #fff; padding:10px 0; ">
    <ul class="footer-links">
      <li> <?= $this->Html->link('Home', array('controller' => 'reminders', 'action' =>  'view_friends')); ?></li>
      <li> <?= $this->Html->link('About Us', array('controller' => 'pages', 'action' =>  'display','AboutUs')); ?></li>
      <li><?= $this->Html->link('FAQ', array('controller' => 'pages', 'action' =>  'display','Faq')); ?></li>
      <li><?= $this->Html->link('Terms Of Service', array('controller' => 'pages', 'action' =>  'display','TermsOfServices')); ?></li>
    </ul>
  </div>
</div>
<!--body wrapper end-->

<script>
$(document).ready(function(){
	var windowWidth = $(window).width(); 
var windowHeight = $(window).height(); 
if ((windowWidth <319)&&(windowHeight <425))
{
	 $('html').css('background','#fff');
	  $('.text14').css('font-size','8px');
	
	 
}


});
</script>
</body>
</html>