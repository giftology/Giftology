<?php if (!$small) : ?>
    <div class="voucher">
            <div class="paper"></div>
            <h2 class="value"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></h2>
            <div class="divider"></div>
            <img width="200" height="64" src="<?= FULL_BASE_URL.'/'.$product['Vendor']['wide_image'];
            ?>" class="wide">
            <p class="at">at</p><p class="fine-print"><?= $product['Product']['terms_heading']; ?></p>
            <div class="frame"></div>
    </div>
    <?php if (!isset($redeem) || !$redeem): ?>
        <?php if ($product['Product']['max_price'] > $product['Product']['min_value']): ?>
            <div id="add-value">
                <div id="contrib-text"><center>You pay: <span class="WebRupee">Rs.</span>0</center></div>
                <div class="minus-plus">
                        <button type="hidden" class="disabled minus"></button>
                        <button type="hidden" class="plus"></button>
                </div>
            </div>
        <?php endif; ?>
        <input type="hidden" id="contribution_amount" name="contribution_amount" class="contribution_amount" value="<?= $product['Product']['min_value']; ?>"/>
    <?php endif; ?>
    <div class="disclosure opened">
            <p class="heading">Terms and conditions</p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Product']['terms']; ?></p>
            </div>
            <a class="toggle clicky_log">
                    <span class="arrow"></span>
            </a>
    </div>
    <div class="disclosure opened">
            <p class="heading">About <?= $product['Vendor']['name']; ?></p>
            <div class="wrapper" style="height: 0px;">
                    <p class="content shown"><?= $product['Vendor']['description']; ?></p>
            </div>
            <a class="toggle clicky_log">
                    <span class="arrow"></span>
            </a>
    </div>
    <div class="gift-amount">
                <p class="amount"><span class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></p>
    </div>
    <input type="hidden" id="free-voucher-value" value=<?= $product['Product']['min_value']; ?>></input>
    <input type="hidden" id="max-voucher-value" value=<?= $product['Product']['max_price']; ?>></input>

<?php else: ?>
    <div class="small-voucher">
                    <span class="free  voucher">
                            <span class="featured-frame"></span>
                            <span class="selected-overlay"></span>
                            <span class="image-container">
                                    <span class="image-frame"></span>
                                    <img src="<?= FULL_BASE_URL.'/'.$product['Vendor']['thumb_image']; ?>">						</span>
                            <span class="details">
                                    <span class="issuer"><?= $product['Vendor']['name']; ?></span>
                                    <span class="value"><span class="WebRupee">Rs.</span>
                                    <?= isset($product['Product']['min_value']) ?
                                        $product['Product']['min_value'] :
                                        $product['min_value']; ?></span>
                                    <?php if (isset($hide_price) && $hide_price): ?>
                                            <span class="label">REDEEM</span>
                                    <?php else: ?>
                                            <?php if ($product['Product']['min_price'] == 0): ?>
                                                    <span class="label">FREE</span>
                                            <?php else: ?>
                                                    <span class="label">BUY</span>
                                            <?php endif; ?> 
                                    <?php endif; ?>
                            </span>
                    </span>
    </div>
<?php endif; ?>