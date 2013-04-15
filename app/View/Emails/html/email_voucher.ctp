<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>giftology</title>
</head>
<body style=" margin:0; padding:0; line-height:1;font-family:Georgia, 'Times New Roman', Times, serif; font-size:13px;">
<div style="width:650px; margin:0 auto;">
  <div style="width:630px; margin:0 auto; padding:0 10px 10px 10px; background:#E14C41 url(../img/red_main-bg.jpg) no-repeat 0 0; min-height:430px; position:relative; overflow:hidden;">
    <div style="width:100%; float:left;">
      <table style="width:100%; margin:0; padding:0;" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center"><a href="http://www.giftology.com/" target="_blank"><img src="../img/logo.png" alt="" style="outline:none;"></a></td>
        </tr>
        <tr>
          <td align="center"><h2 style="font:Georgia, 'Times New Roman', Times, serif; margin:0; padding:10px 0 10px 0;"><font style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:30px; color:#FFF; font-style:italic; font-weight:300;">Hi <?= $receiver; ?></font></h2></td>
        </tr>
        <tr>
          <td align="center"><p style="margin:0; padding:0; line-height:22px;"><font style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:16px; color:#FFF; font-style:italic; font-weight:300;">Your gift details are here below.</font></p></td>
        </tr>
        <tr>
          <td align="center"><div style="background:#F0F0F0; text-align:center; overflow: hidden; padding:14px 0 18px 0; margin:15px 0 -25px 0;">
              <h3 style="margin:0; padding:0; color:#df4d40; font-size:28px;"><font style="font-family:Segoe Script"> Gift Voucher</font></h3>
              <table style="width:530px; margin:0; padding:20px 0; display:inline-block;">
                <tr>
                  <td>  
            <div style="width:260px;background-image:url(../img/red_voucher-frame.png);  height:205px; border:1 solid black; float:left;">
                <h3 style="margin:40px 0 0 -19px; padding:0; color:#333; font-family:'Arial Black', Gadget, sans-serif; font-size:32px; font-weight:600; text-align:center;"> <img src="../img/red_rupee'.png" height="30" width="30" style="margin-right:-8px;"> <?=$gift['Gift']['gift_amount']; ?></h3>
                <p style="margin-top:20px;"><img src="../img/red_shad-bg1.png" width="240"></p>

                <p style="margin:-10px 0 0 0; "><img src="<?= FULL_BASE_URL.'/'.$gift['Product']['Vendor']['wide_image']; ?>" height="50" width="180" alt="giftology.com" title="giftology.com" align="center" ></p>
            </div>
          </td>
                  <td style="width:259px; margin:0px; float:left; background-image:url(../img/red_voucher-frame.png); height:205px;" >
                    <h3 style="margin:45px 0 -12px 12px;  padding:0; color:#333; font-size:16px; font-family:Georgia, 'Times New Roman', Times, serif; font-weight:300; text-align:center; line-height:180%;">Giftology code is <br> <font size="+1" color="#9f2027" ><?=$gift['Gift']['code']; ?></font></h3>
                    <h3 style="margin:20px 0 0 12px; padding:0; color:#333; font-size:16px; font-family:Georgia, 'Times New Roman', Times, serif; font-weight:300; text-align:center;"><?php if($pin) echo "PIN: ".$pin;?></font></h3>
                
                   <h3 style="margin:10px 0 0 12px; padding:0; color:#333; font-size:16px; font-family:Georgia, 'Times New Roman', Times, serif; font-weight:300; text-align:center;">Valid Upto :  <?=$gift['Gift']['expiry_date']; ?></font></h3>


 
                  </td>
                </tr>
              </table>
            </div></td>
        </tr>
        <tr>
            <td align="center" >
            <img src="../img/red_shad-bg.png">
            </td>
        </tr>
        <tr >
        
          <td align="left"><div style="background:#fff;  overflow:hidden; margin:0 auto; width:630px;">
              <div style=" width:270px; margin:0 10px; float:left; ">
                <h2 style="margin:0; padding:20px 0 20px 24px;"><font style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:18px; font-weight:300; font-style:italic;">How To Redeem </font></h2>
                <ol style="color:#333; line-height:22px;font-family:Georgia, 'Times New Roman', Times, serif !important; font-size:14px; font-weight:300;  color:#333; text-align:justify; margin-top:0;">
                  <?=$gift['Product']['redeem_instr']; ?>
                </ol>
              </div>
                <div style=" width:20px;  margin:50px auto; float:left; ">
               <img src="../img/red_new.png" height=525>
               </div>
               <div style=" width:270px; margin:0 25px; float:left; text-align:justify;  ">
                <h2 style="margin:0; padding:20px 0 20px 0;"><font style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:18px; font-weight:300; font-style:italic;">Terms & Conditions </font></h2>
                <p style="margin-top:-13px; padding:0; color:#333; "><font style="font-family:Georgia, 'Times New Roman', Times, serif !important; font-size:14px; font-weight:300;  color:#333; line-height:1.5 !important;"><?=$gift['Product']['terms'] ?></font></p>
                <ol  style="color:#333; line-height:22px;font-family:Georgia, 'Times New Roman', Times, serif; font-size:14px; font-weight:300;  color:#333;text-align:justify; margin-left:20px;">
                  
                  <li> Offer valid on all products.</li>
                  
                  <li> One code per transaction.</li>
                  <li> 15-day return policy (conditions apply).</li>
                  <li> Cannot be combined with any other offer/discounts.</li>
                 
                </ol>
                <p style="margin:0; padding:0; color:#333; line-height:22px;"><font style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:14px; font-weight:300; font-style:italic; color:#333;"> For any further queries, mail us :<b> support@thewatchshop.in</b></p>
                <p>&nbsp;</p>
              </div>
            </div></td>
        </tr>
        <tr>
          <td><div style="width:630px; background:#F0F0F0; padding:10px 0; border-bottom:1px solid #DBDBDB;">
              <p style="width:560px; margin:0 30px; padding:13px 0; color:#525252; font-size:13px; font-style:italic; line-height:22px;"><font style="font-family:Georgia, 'Times New Roman', Times, serif;">This voucher is provided by Giftology.com on behalf of the service provider. Management may withdraw the offer at any time without prior notice. Giftology.com is a property of Sama Web Innovations Pvt. Ltd.</font></p>
            </div>
            <div style="width:100%; padding:19px 0; text-align:center; width:630px; background:#F0F0F0; font-size:14px; font-style:italic;"><font style="font-family:Georgia, 'Times New Roman', Times, serif;"><a href="https://twitter.com/mygiftology" target="_new" style="text-decoration:none; color:#2DAAE4;" >follow on Twitter</a> &nbsp;   &nbsp; &nbsp;. &nbsp; &nbsp; &nbsp; <a href="https://www.facebook.com/GiftologyIndiaa" target="_new"  style="text-decoration:none; color:#3B5A99;" >Like on Facebook</a></font></div></td>
        </tr>
      </table>
    </div>
    <div style="clear:both; width:100%; height:0;">&nbsp;</div>
  </div>
  <div style="width:530px; padding:20px 60px 30px 60px; margin:0 auto; text-align:center; line-height:22px; color:#666;">
    <table width="100%" style="margin:0; padding:0; text-align:center;">
      <tr>
        <td><p style="margin:0; padding:0;"><font style="font-family:Georgia, 'Times New Roman', Times, serif;">Please do not reply to this message - it was sent from an unmonitored email address.<br>
            This message is a service email related to your account.<br>
            For any support or questions, please mail us at cs@giftology.com</font></p>
          <p style="font-size:13px; margin:0; padding:0;"><font style="font-family:Georgia, 'Times New Roman', Times, serif;"><a href="javascript:void(0);" style=" color:#666;">update subscription preferences</a> | <a href="javascript:void(0);" style=" color:#666;">unsubscribe from this list</a></font></p>
          <p style="padding:10px 0 0; margin:0;"><font style="font-family:Georgia, 'Times New Roman', Times, serif;">giftology.com • NR-27, crossroad complex • DLF Phase 3 • gurgaon 122010</font> </p></td>
      </tr>
    </table>
  </div>
</div>
</body>
</html>
