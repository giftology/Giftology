$(document).ready(function(){
	jQuery.ias({
		container : "#friend_list",
		item: ".image-wrapper",
		pagination: "#paginator_nav",
		next: ".next a",
		loader: "../img/loader.gif",
	});
	jQuery.ias({
		container : "#campaigns",
		item: ".small-voucher",
		pagination: "#paginator_nav",
		next: ".next a",
		loader: "../img/loader.gif",
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
            var maxVoucherValue = parseInt($('#max-voucher-value').val());
            var currVoucherValue = parseInt($('.contribution_amount').val());
            var newVoucherValue = 0;
            if (currVoucherValue >= maxVoucherValue) {
                $('.minus-plus .plus').addClass('disabled');
                return;
            }
            if (currVoucherValue == freeVoucherValue) {
                if (currVoucherValue < 500) {
			newVoucherValue = 500;
		} else {
			newVoucherValue = 1000;
		}
            } else {
                newVoucherValue = currVoucherValue + 500;
            }
            var youPay = newVoucherValue - freeVoucherValue;
            //alert("Curr is "+ currVoucherValue+ " new is " + newVoucherValue + " You pay " + youPay + " max is " +maxVoucherValue);
            $('.contribution_amount').val(newVoucherValue);
            $('#contrib-text').html("You pay: &#x20b9;"+youPay);
            $('.amount').html("&#x20b9;"+newVoucherValue);
            $('.minus-plus .minus').removeClass('disabled');
        });
    $('.minus-plus .minus').click(function() {
            var freeVoucherValue = parseInt($('#free-voucher-value').val());
            var currVoucherValue = parseInt($('.contribution_amount').val());
            var newVoucherValue = 0;
            if (currVoucherValue == freeVoucherValue) {
                $('.minus-plus .minus').addClass('disabled');
                return;
            }
            newVoucherValue = currVoucherValue - 500;

            if (newVoucherValue < freeVoucherValue) {
                newVoucherValue = freeVoucherValue;
            } 
            var youPay = newVoucherValue - freeVoucherValue;
            //alert("Curr is "+ currVoucherValue+ " new is " + newVoucherValue + " You pay " + youPay + " max is " +maxVoucherValue);
            $('.contribution_amount').val(newVoucherValue);
            $('#contrib-text').html("You pay: &#x20b9;"+youPay);
            $('.amount').html("&#x20b9;"+newVoucherValue);
            $('.minus-plus .plus').removeClass('disabled');
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


