
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

$cakeDescription = __d('cake_dev', 'Giftology: Team');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php echo $this->Facebook->html(); ?>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription; ?>
		<?php echo $title_for_layout; ?>
	</title>



	 <script> 
$(document).ready(function(){
  //$(".a").hover(function(){
   // $(".a1").slideToggle("slow"); 
    //});

 $(".a ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/Aman.jpg");$('.a .text3').hide();$(".a1").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/aman.png");$('.a .text3').show();$(".a1").hide();}); 
  


  //////////////


  
<<<<<<< HEAD
  $(".b ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/VArun.jpg");$('.b .text3').hide();$(".a2").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/varun.png");$('.b .text3').show();$(".a2").hide();}); 
=======
  $(".b ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/VArun.jpg");$('.b .text3').hide();$(".a2").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/VARUN.png");$('.b .text3').show();$(".a2").hide();}); 
>>>>>>> vendor_fields
  /////////////////

  

  $(".c ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/Alok.jpg");$('.c .text3').hide();$(".a3").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/alok.png");$('.c .text3').show();$(".a3").hide();}); 
  //////////////////

  $(".d").hover(function(){
    
     $(".d").toggleClass('aaa')
		if($(this).hasClass('aaa')){ 
		$(".resources").animate({ height: 980 }, 600);
		}
		
		else{
				$(".resources").animate({ height: 850 }, 600);
		}
   
  });
  $(".d ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/Kiran.jpg");$('.d .text3').hide();$(".a4").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/kiran.png");$('.d .text3').show();$(".a4").hide();}); 
  ///////////////////

  
  $(".e ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/NIkhil.jpg");$('.e .text3').hide();$(".a5").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/nikhil.png");$('.e .text3').show();$(".a5").hide();}); 
  /////////////////

 
  $(".f ").hover(function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/SB1.jpg");$('.f .text3').hide();$(".a6").show();},function(){$(this).find("img").attr("src", "<?php echo FULL_BASE_URL;?>/img/SB.jpg");$('.f .text3').show(); $(".a6").hide();}); 
});
</script>


	<div class="resources aaa" style="height:770px;">

	<center><h2 style="margin-top:30px;">Our Core Team</h2></center>
  	<div class="body1">
		<div class="port a">
			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/aman.png"  >
			<p>&nbsp;</p>
			<p class=" text3 " >Aman Narang<br>Co-Founder & Head Business Development<br></p>
			
			<p><br>
				 <div class="teamHover a1 text2 " style="display:none; margin-top:-273px; ">
                          <p> Prior to joining Giftology, Aman spearheaded new acquisitions at Freecharge.in and at Paytronic Network Pvt. Ltd. He has a knack for understanding various parts of the business and experimenting with new concepts for business growth with a keen interest in online marketing and product management. </p>
  							<br>
                          <p>Aman holds an MBA from The University of Sheffield and is also a Telecom Engineer from BIT, Bangalore. He loves to go on long drives and is a big foodie.</p><br>
                          <p><strong>Email:</strong> aman@giftology.com </p><br>
                        	
			    </div>
				  
			</p>
		</div>
		<div class="port b">
			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/VARUN.png" rel="#mies2" >
			<p>&nbsp;</p>
			
			<p class=" text3 " >Varun Vummidi<br>CEO<br></p>
			<p>&nbsp;</p>
			<p><br>
				 <div class="teamHover a2 text2 " style="display:none;">
                          <p>Varun Vummidi comes off a successful stint at Jabong.com as part of the founding team. He was a key player in helping it become one of the fastest growing e-commerce companies in India.</p><br>
  
                                        <p>Previously,Varun has been an Entrepreneur in Residence at Jabong.com, a Product Specialist at Merrill Lynch and Relationship Manager at HDFC Bank Ltd. He has also worked as a freelance Radio DJ for All India Radio in Chennai and as an M.C.</p><br>
  
                                        <p>Varun holds an MBA from Baruch College, New York and a B.Com from Loyola College, Chennai. Varun loves to backpackand play basketball in his free time.</p><br>
                                          <p><strong>Email:</strong> varun@giftology.com </p>
                        	
			    </div>
				  
			</p>
		</div>
		<div class="port last c">

			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/alok.png" rel="#mies3" >
			<p>&nbsp;</p>
			<p class=" text3 " >Alok Kumar <br>Assistant Director, Technology</p>
			<p>&nbsp;</p>
			<p><br>
				 <div class="teamHover a3 text2 " style="display:none;">
                          <p>Alok Kumar is a technophile who always enjoyed workingin a startup environment. He believes in high quality software development and futuristic approach for better solutions.</p><br>
  
                           <p>Previously, Alok worked for Mrbabu.com, Kuwait and CEON Solutions Private Limited, India. He has keen interest in R&D, Product Development and Project Management.</p><br>
  
                            <p>Alok holds B.Tech and M.Tech degrees from Indian Institute of Information Technology and Management, Gwalior, India. He is an avid soccer fan.</p><br>
                             <p><strong>Email:</strong> alok@giftology.com </p>
                        	
			    </div>
				  
			</p>
		</div>
  	</div>
  	<div class="body1">
		<div class="port d">
			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/kiran.png" >
			<p>&nbsp;</p>
			<p class=" text3 " >Kiran Sidhu <br>Chairman</p>
			<p>&nbsp;</p>
			<p><br>
				 <div class="teamHover a4 text2 " style="display:none;">
                          <P>Kiran has been a seed investor in many start-ups in various technology and biotechnology ventures. He funded and oversaw the development of BuzzDash that was sold to the Tribune Group in 2009. Kiran was also an early stage investor in two biotechnology companies: Vasgene Therapeutics and Inovio Biomedical Corporation. He has also led Nano Universe, an early stage Internet incubator, through a successful AIM listing acting as Finance Director and co-founder. </p><br>
  
                             <p>Previously, Kiran led On Stage Entertainment through a successful NASDAQ small company listing as the CFO. He has also served as a senior associate with Merrill Lynch Investment Banking (M& A) and as a manager with Price Waterhouse's Strategic Consulting Group.</p><br>
  
                             <p>Kiran has a MBA from the Wharton School of Business and a B.A. from Brown University.</p>
                        	
			    </div>
				  
			</p>
		</div>
		<div class="port e">

			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/nikhil.png" rel="#mies4" >
			<p>&nbsp;</p>
			<p class=" text3 " >Nikhil Sama<br>Founder & Non-Executive Director</p>
			<p>&nbsp;</p>
			<p><br>
				 <div class="teamHover a5 text2 " style="display:none;">
                           <p> Nikhil is a passionate technologist and seasoned professional with over 12 years of experience in the Technology industry.  He is currently the founder and director for SnapLion, a mobile app creation engine for musicians.</p><br>
  
                          <p> Previously, Nikhil was Director at Rocket Internet GmbH where he incubated several start-ups (including Jabong.com, FabFurnish.com, Printvenue.com among others) and was a strategy consultant with Bain & Co in Chicago IL.<p/><br>
  
                            <p>Nikhil has an MBA from The University of Chicago – Booth School of Business, an M.S. from the University of Southern California and a B.Tech from Delhi College of Engineering.<p/>

                        	
			    </div>
				  
			</p>
		</div>
		<div class="port last f">

			<img class="none" width="125" height="100" alt="picture" src="<?php echo FULL_BASE_URL;?>/img/SB.jpg" rel="#mies5" >
			<p>&nbsp;</p>
			<p class=" text3 " >Shailesh Bhushan<br>Finance Director</p>
			<p>&nbsp;</p>
			<p><br>
				 <div class="teamHover a6 text2 " style="display:none;">
                           <p>Shailesh brings over 18 years of global experience within Finance and Operations. He hasin-depth knowledge of corporate accounting taxation, MIS and e-commerce.</p><br>
  
                           <p>Previously,Shailesh has worked with Transact Network Ltd. as V.P Finance managing the financial operations of its prepaid card business.  He has also worked with leading Indian business houses such as DLF and Reliance with scope of business in to construction, power, service, education, ITES and finance sector.</p><br>
  
                           <p>Shailesh is a fellow member of Institute of Chartered Accountants of India, New Delhi and holds a M.Com from Agra University.</p>
			    </div>
				  
			</p>
		</div>
  	</div>
  </div>


