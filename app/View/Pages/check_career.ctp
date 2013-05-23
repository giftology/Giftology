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

$cakeDescription = __d('cake_dev', 'Giftology: careers');
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
  $(".showtext").click(function(){
    $(".hiddentext").slideToggle("slow"); 
    });
   $(".showtext1").click(function(){
    $(".hiddentext1").slideToggle("slow"); 
    });
});
   </script>
   

   <script type="text/javascript">

      $(document).ready(function(){
            $("#submit").click(function (){
                var e = false;
                var emailRegex = new RegExp(/^[0-9-+]+$/);
                 var emailRegex = new RegExp(/^([\w\.\-]+)@([\w\-]+)((\.(\w){2,3})+)$/i);
                var valid = emailRegex.test($("#email").val());
                 if ($("#name").val().length == 0) {
                    $("#error_name").show();
                    e = true;
                }
                else{
                    $("#error_name").hide();    
                }
                
                if ($("#email").val().length == 0)
                 {
                    /*$("#error_email").show();
                    e = true;*/
                    var r=confirm("continue without email address!");
                    if (r==true)
                      {
                         return false;
                      }
                    else
                      {
                        e = true;
                      }
                    }
               else if(!valid)
                        {
                          $("#error_email1").show();
                             e = true;  
                        }
                else if(valid)
                        {
                            $("#error_email1").hide(); 
             
                        }
                if(e) return false;
            });

           
        });
      
    
jQuery(document).ready(function()
{ 
$('.reset-link').click(function(){
  $('.error_message').css('display','none');
});
});

  
   </script>
   
       
                    




<div id="foot_career">
  <p><img src="<?php echo FULL_BASE_URL;?>/img/career.png" class="career_img" ></p>
  <center ><h3 class="careerMainHead" style="margin-left:134px;">Career With Us</h3></center>
  <div class="media" >
    
       
    <p id="contacttext" >We are always on the look out for great people to work with us. If you’re good at what you do or have the drive to prove yourself contact us on <strong>careers@giftology.com</strong></p>
    <p>&nbsp;</p>
    <p id="contacttext" > If you’re awesome alongwith having an Entrepreneurial attitude, Good Aesthetic Sense, Passion /Interest in eCommerce & the Enthusiasm to learn…well you’re just what we’re looking for!
 </p>
<p>&nbsp;</p>

<p id="contacttexth1" ><b>Traits of a Giftologer :</b></p>

<p id="contacttext">-  An entrepreneurial spirit and unmatched drive</p>

<p id="contacttext" >- Enjoy the challenging atmosphere of a business start-up</p>

<p id="contacttext" >-  Have a ball of a time</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

    <div class="career_recent">

     <p id="contacttext"><b> Recent Openings</b></p>
    </div>
    <p>&nbsp;</p>

    <p class="showtext" id="contacttexth1" ><img src="<?php echo FULL_BASE_URL;?>/img/details.png" style="margin-right:10px; ">Position: Interns</p>
    <div class="hiddentext" id="contacttext" style="display:none; margin-left:25px;">
    
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
  </div>
    <p style="border-bottom:1px dotted #999;">&nbsp;</p>

<p>&nbsp;</p>

    <p class="showtext1" id="contacttexth1" style="color:#900;cursor:pointer; "><img src="<?php echo FULL_BASE_URL;?>/img/details.png" style="margin-right:10px;">Position: Interns</p>
    <div class="hiddentext1" id="contacttext" style="display:none; margin-left:25px;">
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
    <p>lorum ipsum</p>
  </div>
   <!-- <p style="border-bottom:1px dotted #999;">&nbsp;</p>-->

    
    

    <div id="foot_content_contact" style="margin-top:30px;" >
<p id="contacttext" style="margin-left:15px;"> <strong>Fill the following form to apply:</strong></p>
<p>&nbsp;</p>
      <div align="center" class="careerCustom">

        <p class="careertext" style="line-height:43px;">We would like to hear from you. Please submit
                              the form below with your resume.</p>
                <p class="careertext"><font color="#FF0000">*</font> 
                              All Fields are Mandatory <br>
                </p>
        <form name="form1" method="post" action="">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr> 
                                  <td width="4%">&nbsp;</td>
                                  <td width="33%">&nbsp;</td>
                                  <td width="63%">&nbsp;</td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><font color="#FF0000">*</font> 
                                    Name</td>
                                  <td><input type="text" name="name" id="name"></td>
                                </tr>
                                 <tr id="error_name" style="display:none;" class="error_message">
                                   <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td >
                                  <h5 style="color:#FF0000; display:inline; font-size:10px" >*please enter your name.</h5>
                                  </td>
                                  </tr>   
                                 
                         
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                             
                                
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><font color="#FF0000">*</font> 
                                    E-mail Address</td>
                                  <td><input type="text"  name="email" id="email" placeholder="abc@domain.com" ></td>
                                   
                                </tr>
                                <tr id="error_email1" style="display:none; " class="error_message">
                                   <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td >
                                  <h5 style="color:#FF0000; display:inline;font-size:10px" >*please enter valid email address.</h5>
                                  </td>
                                  </tr>
                                <tr>
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><font color="#FF0000">*</font> You are applying
                                  for </td>
                                  <td><select name="cars" class="styled-select">
                                        <option value="volvo">Internship</option>
                                        <option value="saab">PHP Development </option>
                                        <option value="fiat">Graphic Designer </option>
                                        <option value="audi">Front End Development</option>
                                        <option value="audi">Business Development</option>
                                        <option value="audi">Other</option>
                                  </select></td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><font color="#FF0000">*</font> 
                                    Cover Letter</td>
                                  <td><textarea name="textarea" cols="50" rows="5"></textarea></td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><font color="#FF0000">*</font> 
                                    Paste Your resume</td>
                                  <td><textarea name="textarea2" cols="50" rows="5"></textarea></td>
                   <td>&nbsp;</td>
                  
                                </tr>
                 <tr> 
                                  <td class="careertext"></td>
                                  <td class="careertext"></td>
                                  
                                  <td style="text-align:center" class="careertext">OR</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr>
                 <tr> 
                                  <td class="careertext"></td>
                                  <td class="careertext"><font color="#FF0000">*</font> 
                                    Upload Your resume</td>
                                  <td><input type="file" id="fname" class="button"></td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext">&nbsp;</td>
                                  <td>&nbsp;</td>
                                </tr>
                                <tr> 
                                  <td class="careertext">&nbsp;</td>
                                  <td class="careertext"><div align="right"> </div></td>
                                  <td>
                                    <input type="submit" name="submit" value="Submit" id="submit">
                                  <input type="reset" value="reset all fields" class="reset-link" style="cursor:pointer">
                                </td>
                                </tr>
                              </tbody></table>
                            </form>
</div>

 



      
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
 



<p id="contacttext" ><b>-> Please do not hesitate to <a href="http://www.giftology.com/contact" style="color:#900;" >contact us </a>in case you have any questions.</b> </p>
</div>
</div>