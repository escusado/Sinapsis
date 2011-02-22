$(window).bind("load", function() { 
	
	   var footerHeight = 0,
		   footerTop = 0,
		   $footer = $("#footer");

	   positionFooter();

	   function positionFooter() {
			
			documentHeight = $('#wrapper').height()+$('#footer').height()+$('#header').height();

			if( documentHeight < $(window).height() ){
				$('#wrapper').height($(window).height()-($('#footer').height()+$('#header').height()));	
			}

			$('#sidebar').height($('#wrapper').height()-10);
			$('#content').height($('#wrapper').height()-10);
			$('#footer').width($(window).width());
			$('#header').width($(window).width());
	   }

	   $(window)
			   .scroll(positionFooter)
			   .resize(positionFooter)

});

$(document).ready(function() {
	if($('#notice_message').length > 0){
		$('#notice_message').fadeOut(5000);
	}
});