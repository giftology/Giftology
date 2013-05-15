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

$cakeDescription = __d('cake_dev', 'Giftology: ContactUs');
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

	
<center><h3>Careers</h3></center>
            <p id="contacttext" style="margin:0 15px;">We are hiring for roles in Technology (PHP) and Sales, across India!</p>
            
              <p id="contacttext" style="margin-left:15px;">We are always on the look out for great people to work with us. If you’re good at what you do or have the drive to prove yourself contact us on <strong>careers@giftology.com</strong></p>

    <center><h3>Conact US</h3></center>      
   <div id="foot_content_contact" >
    

      <div class="leftd">
      <p id="contacttexth2"> <img src="<?php echo FULL_BASE_URL;?>/img/findusat.png" style="margin:0 10px 0 0;"><span >find us </span></p>
<p id="contacttexth1">we are located at:</p>

<p id="contacttext" >27, Nathupur Road,<br>
DLF Phase 3,<br>
Gurgaon 122002</p>
<p id="contacttext1">-----------------------------------------</p>
<p id="contacttexth2" style="padding-top:5px"><img src="<?php echo FULL_BASE_URL;?>/img/callaticon.png" style="margin:0 10px 0 0;"><span>Phone</span></p>
<p id="contacttexth1">To reach us on phone you can call:</p>
<p id="contacttext" >+91-9717881110</p>
<p id="contacttext1">-----------------------------------------</p>
<p id="contacttexth2" style="padding-top:5px"><img src="<?php echo FULL_BASE_URL;?>/img/emailicon.png" style="margin:0 10px 0 0;"><span>Email:</span></p>
<p id="contacttext">cs@giftology.com</p>
      </div>
       <div class="rightd" id="googleMap">
      
      </div>
     



      
</div>
</div>
</div>