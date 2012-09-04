<?php if (!$small) : ?>
    <div class="voucher">
            <div class="paper"></div>
            <h2 class="value"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></h2>
            <div class="divider"></div>
            <img width="200" height="64" src="<?= DOMAIN_NAME.$product['Vendor']['wide_image'];
            ?>" class="wide">
            <p class="at">at</p><p class="fine-print">Only valid in India.</p>
            <div class="frame"></div>
    </div>
    <div class="disclosure opened">
            <p class="heading">Terms and conditions</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Product']['terms']; ?></p>
            </div>
            <a class="toggle">
                    <span class="arrow"></span>
            </a>
    </div>
    <div class="disclosure opened">
            <p class="heading">About <?= $product['Vendor']['name']; ?></p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Vendor']['description']; ?></p>
            </div>
            <a class="toggle">
                    <span class="arrow"></span>
            </a>
    </div>

    <div class="minus-plus">
            <input type="hidden" name="contribution_amount" class="contribution_amount" value="1000">
            <!--button type="hidden" class="disabled minus"></button-->
            <p class="amount"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></p>
            <!--button type="hidden" class="plus"></button-->
    </div>
    
<?php else: ?>
    <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= DOMAIN_NAME.$product['Vendor']['thumb_image']; ?>">						</span>
                            <span class="details">
                                    <span class="issuer"><?= $product['Vendor']['name']; ?></span>
                                    <span class="value"><span class="WebRupee">Rs.</span>
                                    <?= isset($product['Product']['min_value']) ?
                                        $product['Product']['min_value'] :
                                        $product['min_value']; ?></span>
                                    <span class="label">FREE</span>
                            </span>
                    </span>
    </div>
<?php endif; ?>