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

$cakeDescription = __d('cake_dev', 'Giftology: Privacy Policy');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $cakeDescription; ?>
    <?php echo $title_for_layout; ?>
  </title>
  



   <script
src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>

<script>
var myCenter=new google.maps.LatLng(28.494153,77.095571);

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:15,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
    
    
  
   
   
       
                    




<div id="foot_content" style="height:630px;">
<div class="media">

  
<center><h3>About Us</h3></center>
               
   <div id="foot_content_contact" >
    <p>&nbsp;</p>
      
     <p id="contacttext" style="margin:0 15px;"> Do away with your gifting woes, because Giftology is here to make your life a lot simpler!! We’re a social gifting platform. In simple words, we enable you to send gifts to your friends on Facebook! Now isn’t that awesome? </p><br>
  
          <p id="contacttext" style="margin:0 15px;"> And it gets better. We’ve got free gifts for you to send! So instead of writing the plain ol’ Happy Birthday of your friend’s wall, send them a gift from giftology.com! All you have to do is connect with Facebook, select a friend then select a gift and… whoosh… it’s sent. Hey look out, there’s some awesome karma coming your way.</p>

     <p id="contacttext" style="margin:35px 15px;"><img src="<?php echo FULL_BASE_URL;?>/img/howitworks.png" ></p>

      
</div>
</div>
</div>