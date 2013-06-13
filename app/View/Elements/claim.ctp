<div class="voucher">
    <div class="paper"></div>
    <h2 class="value">
        <span id="WebRupee" class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?>
    </h2>
    <div class="divider"></div>
    <img width="200" height="64" src="<?= FULL_BASE_URL.'/'.$product['Product']['Vendor']['wide_image'];?>" class="wide">
    <p class="at">at</p><p class="fine-print"><?= $product['Product']['terms_heading']; ?></p>
    <div class="frame"></div>
</div>
<input type="hidden" id="contribution_amount" name="contribution_amount" class="contribution_amount" value="<?= $product['Product']['min_value']; ?>"/>
<div class="disclosure opened">
    <p class="heading">Terms and conditions</p>
    <div class="wrapper" style="height: 0px;">
        <p class="content shown"><?= $product['Product']['short_terms']; ?></p>
    </div>
    <a class="toggle" onclick="clicky.log('#T+C Toggle','T+C Toggle');">
        <span class="arrow"></span>
    </a>
</div>
<div class="disclosure opened">
    <p class="heading">About <?= $product['Product']['Vendor']['name']; ?></p>
    <div class="wrapper" style="height: 0px;">
        <p class="content shown"><?= $product['Product']['Vendor']['short_description']; ?></p>
    </div>
    <a class="toggle" onclick="clicky.log('#About Toggle','About Toggle');">
        <span class="arrow"></span>
    </a>
</div>
<div class="gift-amount">
    <p class="amount"><span id="WebRupee" class="WebRupee">Rs.</span><?= $product['Product']['min_value']; ?></p>
</div>