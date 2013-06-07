<?= $this->layout = 'offline_redeemption'; ?>

    <div id="wrapper">
        <div class="headerbluebg">
            
            <div class="header">
                <div class="logo-block"><a href="<?= FULL_BASE_URL; ?>" class="logo" style="outline: none;"><img src="<?= FULL_BASE_URL; ?>/img/logo.png" alt="" style="width:150%"></a></div>
            </div>
            
             <!--<div class="done1" >
                <span>done</span> 
                </div>-->
              </div>
            <div id="container" >
            <center>
                <div class="small">
                    <div class="voucher">
                        <div class="paper"></div>
                        <h2 class="value"><span id="WebRupee" class="WebRupee">Rs.</span><?= $gift['Product']['min_value']; ?></h2>
                        <div class="divider"></div>
                        <img width="200" height="64" src="<?= FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image'];
                        ?>" class="wide">
                        <p class="at">at</p><p class="fine-print"><?= $gift['Product']['terms_heading']; ?></p>
                        <div class="frame"></div>
                    </div>
                
                    <!--<div class="value">
                    <img src="<?= IMAGE_ROOT.'value11.png'; ?>" >
                    </div>-->
                
                    <div class="count">
                      <div id="countdown"></div>
                      <p class="firstname"><?= $gift['Sender']['UserProfile']['first_name'] ?></p><p id="note"></p>
                    
                    <p class="spans"> <?= $gift['Gift']['code']; ?>
                    </p>
                    </div>
                    <!--<div class="disclosure opened">
                           <p >Terms and conditions</p>
                           <div class="wrapper" style="height: 0px;">
                                <p class="content shown"><?= $gift['Product']['terms']; ?></p>
                           </div>
                            <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
                                <span class="arrow"></span>
                            </a>
                    </div>-->
                </div>
           
                   <div class="shows">
                    <button class="hit" style="" id="<?= $gift['Gift']['id']; ?>">
                    Redeem
                    </button>
                  </div>
          </center>
       </div>

   </div>

   

<script type="text/javascript">
$(document).ready(function(){
    $('.count').hide();
    $('.toggle').click(function () {
        //JQuery animate cannot understand
        //auto height, so calculate and give
        //to animate before calling
        var curHeight = $(this).parent().find('.wrapper').height();
        $(this).parent().find('.wrapper').css('height', 'auto');
        var finalHeight = $(this).parent().find('.wrapper').height();
        
        //check if wrapper is already open
        if (curHeight == finalHeight) {
            finalHeight = 0;
        }
        $(this).parent().find('.wrapper').height(curHeight).animate({
            height: finalHeight
            }, 1000, function() {
            // Animation complete.
        });
    });
  });
</script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script type='text/javascript'>
 $('.hit').click(function() {
    $('.count').show();
    $('.hit').hide();
        // interrupt form submission
            var key_value = this.id;
           //alert(key_value);
                $.ajax({
                    type: "POST",
                    dataType: 'html',
                    async: false,
                    url: "/gifts/offline_voucher_redeem_page/"+key_value,
                    data: "search_key="+key_value,
                    success: function(data) {
                      
                        //var res_data = jQuery.parseJSON(data);
                        //var count = res_data.length;
                        //var new_row = '';
                        //$('#gift-details').remove();
                        //$('.footer-wrap').remove();
                        //$('footer').remove();
                        //$('.delivery-message,.submit').remove();
                        
                         //$('#ititemplate').tmpl(res_data).appendTo('.clear');
                     }

                     });
           
        });
   

</script>
