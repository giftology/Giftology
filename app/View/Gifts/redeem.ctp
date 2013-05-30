
<style type="text/css">
/* popup_box DIV-Styles*/
#popup_box {
  display:none;
  width:600px;
  height:688px;
  background-image:url(../img/back.jpg);
  z-index:10;
  border:2px solid #999;
  margin:auto;
  font-size:15px;
  -moz-box-shadow: 0 0 10px #666;
  -webkit-box-shadow: 0 0 10px #666;
  box-shadow: 0 0 10px #666;
  

}

.RedeemH1{ text-align:center; font:24px 'calibri',Arial, Helvetica, sans-serif; color:#000000; }
.RedeemH2{ text-align:center; font:20px 'calibri',Arial, Helvetica, sans-serif; color:#000000;}
.mar1{margin-top:50px;margin-left:41px;}
.mar2{margin-top:40px;}
.mar3{margin-top:-25px;}
.mar4{margin-top:-21px;}
.mar5{margin-left:8px;}
.lineh1{ line-height:30px;}
.lineh2{ line-height:20px;}
.lineh3{ line-height:0px;}
.brandscreen{margin: 40px auto; width:550px; background-image:url(1.png); height:256px; }
.brandscreen img{ width:500px; margin:20px 24px 30px 24px;}
.done{margin:-40px auto; width:184px; height:40px;}
.coupon{width:366px; margin: 40px auto; height:60px;}
.FL{ float:left;}



#container {
  background: #f0f0f0; /*Sample*/
  width:100%;
  height:10px;
  
}
a {
  cursor: pointer;
  text-decoration:underline;
  color:#930;
}
/* This is for the positioning of the Close Link */
#popupBoxClose {
  font-size:20px;
  line-height:15px;
  right:-6px;
  top:-5px;
  position:absolute;
  color:#6fa5e2;
  font-weight:500;
  
}
input[type="text"] {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #DAD7D4;
    border-radius: 4px 4px 4px 4px;
    color: #666666;
    padding: 5px;
    resize: none;
  width:250px;
}


</style>

<script type="text/javascript">
  
  $(document).ready( function() {
  
    // When site loaded, load the Popupbox First
    
    $('.single-use').click( function() {
    loadPopupBox();
    $('#container').css('display','none')
    
    });
  
    $('#popupBoxClose').click( function() {     
      unloadPopupBox();
      $('#container').css('display','block')
    });
    
    
    $('#ask').click( function() {
      $('#popup_box').slideUp(1000);
    });
    $('#submitt').click( function() {
      $('#popup_box').slideUp(1000);
    });
      $('#edit').click( function() {
        $(this).hide();
      $('#email').fadeIn(1000);
      $('#done').fadeIn(1000);
      $('#registered').css('display','none');
      
    });

    function unloadPopupBox() { // TO Unload the Popupbox
      $('#popup_box').fadeOut("slow");
      $("#container").css({ // this is just for style   
        "opacity": "1"  
      }); 
    } 
    
    function loadPopupBox() { // To Load the Popupbox
      $('#popup_box').fadeIn(1000);
      $("#container").css({ // this is just for style
        "opacity": "0.2"  
      });     
    }
     /**********************************************************/
  $(document).keydown(function(e){
    if (e.keyCode == 27) { 
      $('#popupBoxClose').click();
       return false;
    }});  
  });
</script>



 
 <!--popup box-->



<div>
        <ul id="breadcrumbs">
                <li class="breadcrumb home events">
                        <span class="left"></span>
                        <a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
                </li>
                <li class="breadcrumb">
                        <span class="left"></span>
                        <a href="<?= $this->Html->url(array('controller'=>'gifts',
                                                      'action'=>'view_gifts')); ?>"><?= $facebook_user['name']; ?>'s gifts<span class="arrow"></span></a>
                </li>
                <li>Redeem your gift</li>
                
        </ul>
        
</div>


<div style="float:right;margin-top:50px;margin-left:800px">
            
           </div>


<div id="gift-details">

        <h3 style="margin-left:50px"><?= $gift['Sender']['UserProfile']['first_name'].' '.$gift['Sender']['UserProfile']['last_name']; ?> sent you this gift: <strong><?= substr($this->Time->niceShort($gift['Gift']['created']), 0, -7); ?></strong></h3>

        <div class="purchase voucher-container">
            <?= $this->element('gift_voucher',
                        array('product' => $gift,
                              'small' => false,
                              'redeem' => true),
                        array('cache' => array(
                                'key' => $gift['Product']['id'].'full_redeem'))); ?>
        </div>
       <div class="delivery-message">
                <div class="greeting-bubble">

                    <?php
                    echo $gift['Gift']['gift_message']; 
                     echo $this->Form->textarea("gift-message" ,array('id'=>'text_message','label' => false,'div' => false,'value' => " ",'class'=>"gift-message" ));?>
                </div>
                
                <div class="shadow-wrapper">
                    <div class="frame">
                        <div class="img-placeholder male">
                            <?php $photo_url = "https://graph.facebook.com/".$sender."/picture"; ?>
                            <img src=<?= $photo_url; ?>>
                        </div>
                    </div>
                </div>
                
              </div>
              <?php echo $this->Form->input("Use Online" ,array('name'=>'city_r','type' => 'submit','id' => 'r_city','label' => false,'div' => false,'class'=>'imageclick'))?>

              <div class="open-online-redeem popover fade bottom in" id="use_online" style="top: 578px; left: 624.5px; display: none;">
                <div class="arrow inner"></div>
                <div class="arrow outer"></div>
                <div class="content">
                    <h3>Ready?</h3>
                    <div class="buttons">
                        <button class="cancel">Cancel</button>
                        <button class="single-use" id="<?php echo $gift['Gift']['id'];?>"> Use online </button>
                    </div>
                </div>
          </div>
                

       


          

</div>	
<div class="clear"></div>
<script type="text/javascript">

      $(document).ready(function(){
            $("#print").click(function (){
                //var value = $(this).closest('form').attr('id');
                $("#print_pdf").attr('target', '_blank');
                $("#print1").submit()
            });
        });
      
</script>
<script type="text/javascript">

      $(document).ready(function(){
            $("#sms").click(function (){
                $("#sms1").submit()
            });
        });
        </script>
<script type="text/javascript">

      $(document).ready(function(){
            $("#email_voucher").click(function (){
                $("#email1").submit()
            });
        });
</script>

<script>
$(document).ready(function(){
            $(".submit").click(function (){
                $("#use_online").show();
            });
            $(".cancel").click(function (){
                $("#use_online").hide();
            });
        });


</script>

<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script type='text/javascript'>
 $('.single-use').click(function() {
        // interrupt form submission
            var key_value = this.id;
           //alert(key_value);
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/gifts/fetch_code",
                    data: "search_key="+key_value,
                    success: function(data) {
                        //alert(data);
                        var res_data = jQuery.parseJSON(data);;
                        var count = res_data.length;
                        var new_row = '';
                        //$('.event').remove();
                        //$('#paginator_nav').remove();
                        
                         $('#ititemplate').tmpl(res_data).appendTo('.delivery-message');
                     }

                     });
           
        });
   

</script>
<script id="ititemplate" type="text/x-jquery-tmpl">
<div id="popup_box" style="margin-top:20px" >
    <h1 class="RedeemH1 mar1" >Sponsored gift voucher worth rs 300..</h1>
    <h2 class="RedeemH1 lineh3 mar2">Use Online at:</h2>
    <h2 class="RedeemH2 lineh3"><u>www.jabong.com</u></h2>
     <div class="brandscreen">
     <img src="../img/snap_jabong.jpg">
     </div>
     <p class="RedeemH2 mar3 ">Use your voucher code at jabong.com when checking out your <br>shopping
    cart choose “add coupon code” and then “apply coupon”.</p>
    <div class="coupon">

    <div class="FL mar5"><img src="../img/arrow1.png"></div>
    <div class="FL mar5" > <input type="text" value="${Gift.code}"> </div>
    <div class="FL mar4"><img src="../img/ccb.png"></div>


    </div>
       <p class="done "><img src="done.png" align="center"></p>
     <a id="popupBoxClose"><img src="../img/close1.png"></a>
 </div>
 </script>
