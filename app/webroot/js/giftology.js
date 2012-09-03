$(document).ready(function(){
	jQuery.ias({
		container : "#friend_list",
		item: ".image-wrapper",
		pagination: "#paginator_nav",
		next: ".next a",
		loader: "/images/loader.gif",
	});
        $('#flashMessage').delay(8000).slideUp(1000);

    $('.toggle').click(function () {
        //JQuery animate cannot understand
        //auto height, so calculate and give
        //to animate before calling
        var curHeight = $('.wrapper').height();
        $('.wrapper').css('height', 'auto');
        var finalHeight = $('.wrapper').height();
        
        //check if wrapper is already open
        if (curHeight == finalHeight) {
            finalHeight = 0;
        }
        $('.wrapper').height(curHeight).animate({
            height: finalHeight
            }, 1000, function() {
            // Animation complete.
        });
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

