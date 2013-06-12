$(function(){
	 $('.hit').click(function() {
	var note = $('#note'),
		ts = new Date(2012, 0, 1),
		newYear = true;
	
	if((new Date()) > ts){
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() +15*60*1000;
		newYear = false;
	}
		
	

		$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = " Your voucher expires in ";
			
			if(minutes==0&& seconds>=10){
			message +="<b>"+ minutes + "0:" + ( minutes==1 ? '':'' ) ;
			message += seconds+"</b>"  + ( seconds==1 ? '':'' ) + "  <br />";
			note.html(message);
			
			}
			
			
			
			else{
			message +="<b>"+ minutes + " 0:0" + ( minutes==1 ? '':'' ) ;
			message += seconds+"</b>"  + ( seconds==1 ? '':'' ) + "  <br />";
			
			if(minutes==0 && seconds<1){
				window.location.replace("http://www.giftology.com");
			}
			
				note.html(message);
			}
				
		}
	});
});
	
});
