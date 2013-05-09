
<div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$product['Vendor']['thumb_image']; ?>">						</span>
                            <span class="details">
                                    <span class="issuer"><?= $product['Vendor']['name']; ?></span>
                                    <span class="value"><span id="WebRupee" class="WebRupee">Rs.</span>
                                    <?= isset($product['Product']['min_value']) ?
                                        $product['Product']['min_value'] :
                                        $product['min_value']; ?></span>
                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? 'or more':'' ?>

                                    <?php if (isset($hide_price) && $hide_price): ?>
                                            <span class="label">REDEEM</span>
                                    <?php else: ?>
                                            <?php if ($product['Product']['min_price'] == 0): ?>
                                                    <span class="label">FREE</span>
                                            <?php else: ?>
                                                    <span class="label">PAY <span id="WebRupee" class="WebRupee">Rs.</span>
                                                    <?= $product['Product']['min_price']; ?>
                                                    <?= (isset($product['Product']['min_price']) && ($product['Product']['max_price'] > $product['Product']['min_price'])) ? '+':'' ?>

                                            <?php endif; ?> 
                                    <?php endif; ?>
                            </span>
                    </span>
                    
    </div>
    