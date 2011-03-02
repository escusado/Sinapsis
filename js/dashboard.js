$(document).ready(function() {

//debug
 /*$("body").click(function(event) {
   console.log($(event.target));
 }); */

	$('span.node_data').hover(
		function(){
			//place controls in current node
			$(this).append($('span#node_operations').clone());
		}
		, //second parameter to "$('span.node_data').hover(1,2)" is mouse out on the current element
		function(){
			//console.log($(this).children());
			$(this).children('span#node_operations').remove();
			$(this).children('#add_node_form').remove();
		}
	);

	$('img#add_node').click(function() {
		parent_node = $(this).parent().parent().parent().parent().parent().attr('id');
		//$('#add_node_form').lightbox('Añadir índice');
	});

	$('img#add_sub_node').click(function() {
		this_node = $(this).parent().parent().parent().parent().attr('id');
	});

});
