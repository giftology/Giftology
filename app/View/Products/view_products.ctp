
<div id="overlay" class="mainpage" style="width: 1805px;left:-500px">
  <!--OVERLAY PAGE 1-->
  <div class="overlaypage" >
    <!-- content div 1-->
    <div id="overlayPageContent1" style="display:none" >
      <p>asdgbfj</p>
      <p>sdjkgfnhkn</p>
      <p>frist div content</p>
    </div>
    <!-- content div 2-->
    <div  id="overlayPageContent2" style="display:none" >
      <p>asdgbfj</p>
      <p>sdjkgfnhkn</p>
      <p>second div content</p>
    </div>
    <!-- content div 3-->
    <div  id="overlayPageContent3" style="display:none">
      <p>asdgbfj</p>
      <p>sdjkgfnhkn</p>
      <p>third div content</p>
    </div>
    <div class="overlaycancel"> </div>
  </div>
</div>




<div>
<ul id="breadcrumbs">
<li class="breadcrumb home events">
<span class="left"></span>
<a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
</li>
<li><?= $receiver_name; ?></li>
</ul>
<?php if($sender_id == $receiver_id): ?>
<?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
'ocasion' => $ocasion),
 array('cache' => array('key'=>'myself'.$receiver_name.$ocasion))
  ); ?>
<?php else: ?>
<?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
'ocasion' => $ocasion),
 array('cache' => array('key'=>$receiver_name.$ocasion))
  ); ?>
<?php endif; ?>
</div>
<div>
<h3 class="line-header">
<span>Send a gift card</span>
</h3>
<div id="campaigns">
  <?php  echo $this->Form->create('products', array('action' => 'view_product'));?>
                        <?php foreach ($products as $product): ?>

 
<a style="display: inline-block;height: 90px;margin: 0 32px 20px;padding-top: 18px;width: 250px; cursor:pointer;">


 
<?= $this->element('gift_voucher',
array('product' => $product,
     'small' => true),
array('cache' => array(
'key' => $product['Product']['id'].'small'))); ?>
            
            <?php echo $this->Form->hidden("receiver_id" ,array('label' => false,'div' => false,'value'=>$receiver_id ))?>
            <?php echo $this->Form->hidden("receiver_name" ,array('label' => false,'div' => false,'value'=>$receiver_name ))?>
            <?php echo $this->Form->hidden("receiver_birthday" ,array('label' => false,'div' => false,'value'=>$receiver_birthday ))?>
            <?php echo $this->Form->hidden("ocasion" ,array('label' => false,'div' => false,'value'=>$ocasion ))?>
            <?php echo $this->Form->hidden("suggested" ,array('label' => false,'div' => false,'value'=>$suggested_friends ))?>
          
           
                
            
</a>
<?php endforeach; ?>
<?php echo $this->Form->end();?> 
</div>
</div>	
<div class="clear"></div>
<script type="text/javascript">

      $(document).ready(function(){
            $(".small-voucher").click(function (){
                
                var gift_value = this.id;
                $('<input>').attr({
                    type: 'hidden',
                    id: gift_value+'_hidden',
                    name: 'encrypted_product_id',
                    value: gift_value,
                }).appendTo('#productsViewProductForm');
                $("#productsViewProductForm").submit()
            });
        });
</script>


<!--feedback strip modification-->
<style type="text/css">
body{overflow-x:hidden }
#container {margin:0;padding:0;width:100%;min-height:500px;background:#fff;}
#stripe1 {width:200px;height:42px;position:fixed;top:200px;float:right;right:-150px;cursor:pointer;}
#stripe2 {width:200px;height:42px;position:fixed;top:300px;float:right;right:-150px;cursor:pointer;}
#stripe3 {width:200px;height:42px;position:fixed;top:400px;float:right;right:-150px;cursor:pointer;}
#overlay {min-height:100%;height:650px;background:#000;opacity:0.85;z-index:11;display:none;position:absolute;top:0; }
.overlaypage {width:700px;height:300px;background:#fafafa;z-index:12;position:fixed;border:1px solid #d7d7d7;margin:200px 558px}
.overlaycancel {width:50px;height:50px;background:#000;z-index:13;position:absolute;float:right;right:0;top:0;}
</style>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" >
$(document).ready(function(){
//strip1 hover
$("#stripe1").hover(function(){
    $(this).toggleClass('abs')
    if($(this).hasClass('abs')){$('#stripe1').animate({right:'-150px'});}
    else{$('#stripe1').animate({right:'0px'});};
  }); 

//strip2 hover
$("#stripe2").hover(function(){
    $(this).toggleClass('abs')
    if($(this).hasClass('abs')){$('#stripe2').animate({right:'-150px'});}
    else{$('#stripe2').animate({right:'0px'});};
  }); 

//strip3 hover
$("#stripe3").hover(function(){
    $(this).toggleClass('abs')
    if($(this).hasClass('abs')){$('#stripe3').animate({right:'-150px'});}
    else{$('#stripe3').animate({right:'0px'});};
  }); 


$("#stripe1, #stripe2, #stripe3 ").click(function(){
  $("#overlay").fadeIn(2000);
  
  
});
$('.overlaycancel').click(function(){ 
    $("#overlayPageContent1").css('display','none');
    $("#overlayPageContent2").css('display','none');
    $("#overlayPageContent3").css('display','none');
    $("#overlay").fadeOut(1000);                          
                              
});

$("#stripe1 ").click(function(){
  $("#overlayPageContent1").css('display','block');
  
});

$("#stripe2 ").click(function(){
  $("#overlayPageContent2").css('display','block');
});

$("#stripe3 ").click(function(){
  $("#overlayPageContent3").css('display','block');
});

$(document).keydown(function(e){
    if (e.keyCode == 27) { 
       $("#overlayPageContent1").css('display','none');
    $("#overlayPageContent2").css('display','none');
    $("#overlayPageContent3").css('display','none');
    $("#overlay").fadeOut(1000);
       return false;
    }
 });
});
</script>



<div class="mainpage" style="width:100%; min-height:0">
  <div id="stripe1" class="abs"> <img src="<?= FULL_BASE_URL; ?>/img/strip.png" /> </div>
  <div id="stripe2" class="abs"> <img src="<?= FULL_BASE_URL; ?>/img/strip.png" /> </div>
  <div id="stripe3" class="abs"> <img src="<?= FULL_BASE_URL; ?>/img/strip.png" /> </div>
</div>