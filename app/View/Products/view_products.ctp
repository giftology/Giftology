<div>
<ul id="breadcrumbs">
<li class="breadcrumb home events">
<span class="left"></span>
<a href="<?= FULL_BASE_URL; ?>"><span class="arrow"></span></a>
</li>
<?php if($receiver_id == $sender_id): ?>
<li><?= "Myself"; ?></li>
<?php else: ?>
<li><?= $receiver_name; ?></li>
<?php endif;?>
</ul>
<?= $this->element('celebration_details', array('receiver_name'=>$receiver_name,
'ocasion' => $ocasion),
 array('cache' => array('key'=>$receiver_name.$ocasion))
  ); ?>
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
