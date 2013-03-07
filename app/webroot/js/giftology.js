$(document).ready(function(){
	jQuery.ias({
		container : '#friend_list',
		item: '.image-wrapper',
		pagination: '#paginator_nav',
		next: '.next a',
		loader: '<img src="img/loader.gif"/>',
        loaderDelay: 100,
        triggerPageThreshold: 2,
        trigger: 'Find more friends to celebrate'
	});
	jQuery.ias({
		container : '#campaigns',
		item: '.small-voucher',
		pagination: '#paginator_nav',
		next: '.next a',
		loader: '<img src="img/loader.gif"/>',
        loaderDelay: 100,
        triggerPageThreshold: 2,
        trigger: 'Find more received gifts'
	});
    jQuery.ias({
        container : '#campaign',
        item: '.small-voucher',
        pagination: '#paginator_nav',
        next: '.next a',
        loader: '<img src="img/loader.gif"/>',
        loaderDelay: 100,
        triggerPageThreshold: 2,
        trigger: 'More sent gifts'
    });


        $('#flashMessage').delay(8000).slideUp(1000);
        
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
    
    $('.minus-plus .plus').click(function() {
            var freeVoucherValue = parseInt($('#free-voucher-value').val());
            var minVoucherPrice = parseInt($('#min-voucher-price').val());
            var maxVoucherPrice = parseInt($('#max-voucher-price').val());
            var contributionAmount = parseInt($('.contribution_amount').val());
            var newVoucherValue = 0;
            if (contributionAmount >= maxVoucherPrice) {
                $('.minus-plus .plus').addClass('disabled');
                return;
            }
            if (contributionAmount == freeVoucherValue) {
                if (freeVoucherValue < 500 && minVoucherPrice < 500) {
        			newVoucherValue = 500;
        		} else {
        			newVoucherValue = 1000;
        		}
            } else {
                newVoucherValue = contributionAmount + 500;
            }
            var youPay = newVoucherValue - freeVoucherValue;
            //alert("Curr is "+ contributionAmount+ " new is " + newVoucherValue + " You pay " + youPay + " max is " +maxVoucherPrice);
            $('.contribution_amount').val(newVoucherValue);
            $('#contrib-text').html("You pay: &#x20b9;"+youPay);
            $('.amount').html("&#x20b9;"+newVoucherValue);
            $('.minus-plus .minus').removeClass('disabled');
        });
    $('.minus-plus .minus').click(function() {
            var freeVoucherValue = parseInt($('#free-voucher-value').val());
            var minVoucherPrice = parseInt($('#min-voucher-price').val());
            var contributionAmount = parseInt($('.contribution_amount').val());
            var newVoucherValue = 0;
            if (contributionAmount == freeVoucherValue) {
                $('.minus-plus .minus').addClass('disabled');
                return;
            }
            newVoucherValue = contributionAmount - 500;

            if (newVoucherValue < freeVoucherValue) {
                newVoucherValue = freeVoucherValue;
            } 
            if (newVoucherValue < minVoucherPrice) {
                newVoucherValue = minVoucherPrice;
            }
            var youPay = newVoucherValue - freeVoucherValue;
            //alert("Curr is "+ contributionAmount+ " new is " + newVoucherValue + " You pay " + youPay + " max is " +maxVoucherPrice);
            $('.contribution_amount').val(newVoucherValue);
            $('#contrib-text').html("You pay: &#x20b9;"+youPay);
            $('.amount').html("&#x20b9;"+newVoucherValue);
            $('.minus-plus .plus').removeClass('disabled');
        });
     $('.showtransbox').click(function() {
	    //$('.transbox').show();
        });


});


//FB parses through stuff when DOM loads
// we are loading stuff from AJAX, and need fb
// reparse the FB image stuff every time we complete
// ajax calls, else the pics wont show up
$(document).ajaxComplete(function(){
    try{
        FB.XFBML.parse(); 
    }catch(ex){}
});

// listen to an XFBML rendered Event
$(document).bind('fb_xfbml_rendered',function(){
    //console.log('fb_xfbml_rendered; Images are vieable');
    $('.transbox').fadeOut('slow');
});


