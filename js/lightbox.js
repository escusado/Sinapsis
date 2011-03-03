(function( $ ){
  $.fn.lightbox = function(lightbox_title) {
  	$('#lightbox').height($(document).height());
  	$('#lightbox').width($(document).width());

  	$("body").css("overflow", "hidden");

  	$('#lightbox_title').html(lightbox_title);

  	$('#lightbox_dialog').html('');
  	
  	$('#lightbox_dialog').append($(this).html());
  	
  	$('#lightbox').fadeIn();

	$('#lightbox_content').offset({
							top: ($('#lightbox').height()/2)-$('#lightbox_content').height()/2,
							left: ($('#lightbox').width()/2)-$('#lightbox_content').width()/2
						   });

	$('img#close_lightbox').offset({
							top: $('#lightbox_content').offset().top+5,
							left: $('#lightbox_content').offset().left+$('#lightbox_content').width()-10
						   });

	$('img#close_lightbox').click(function(){
		$('#lightbox').fadeOut();
	});
  	
  	//console.log($(this));
  };
})( jQuery );
