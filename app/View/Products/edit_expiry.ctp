<?= $this->element('admin_header'); ?>
<table cellpadding="0" cellspacing="0" border="1" margin-top="20px">

	<tr>
			
			<th>Product Id</th>
			<th>Vendor Name</th>
			<th>expiry</th>
			<th>Date Format</th>
			<th>Status of Product</th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($product as $products): ?>
		<tr>
			<td><?php echo h($products['UploadedProductCode']['product_id']); ?>&nbsp;</td>
			<td><?php echo h($products[0]['Vendor']['name']); ?>&nbsp;</td>
			<td>
				<textarea id = "<?php echo h($products['UploadedProductCode']['product_id']); ?>"><?php echo h($products['UploadedProductCode']['expiry']); ?>&nbsp;
				</textarea>
			</td>
			<td> (yy-mm-dd) </td>
				<?php  $days = "31";
				$today_Date = date('Y-m-d');
	        	$product_expire_date=date('Y-m-d', strtotime('+'.$days.'days', strtotime(date('Y-m-d'))));?>
	        	<?php if($product_expire_date > $products['UploadedProductCode']['expiry'] && $today_Date <= $products['UploadedProductCode']['expiry']): ?>
        				<td><b>Going to Expire</b></td>
				<?php elseif($today_Date > $products['UploadedProductCode']['expiry']): ?>
        				<td><b> Expired</b></td>
    		 	<?php else: ?>
        		 		<td> Will Expire in next few month</td>
        		<?php endif; ?>
			<td class="actions" product="<?php echo h($products['UploadedProductCode']['product_id']); ?>" expiry="<?php echo h($products['UploadedProductCode']['expiry']); ?>" style="cursor:pointer">Save</td>
		</tr>
	<?php endforeach; ?>
</table>

<script type="text/javascript">
$(document).ready(function(){
    $(".actions").click(function (){
    	var product = $(this).attr('product');
    	var expiry = $(this).attr('expiry');
    	var thought = jQuery("textarea#"+product).val();
    	//alert(product + " "+ thought );
    	$.ajax({
                    type: "POST",
                    dataType: 'json',
                    async: false,
                    url: "/products/edit_expiry",
                    data: {search_key:thought,search_keys:product},
                    success: function(data) {
                    	alert(data);
                    	//window.setTimeout('location.reload()', 1000);
                      var res_data = jQuery.parseJSON(data);
                       $('#ititemplate').tmpl(res_data).appendTo('.clear');
                     }

                     });
    });
});

</script>