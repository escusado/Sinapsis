$(document).ready(function() {

//debug
 /*$("body").click(function(event) {
   console.log($(event.target));
 }); */

 	/*test sortable jqueryui*/
	$( ".sortable" ).sortable({
		handle : '#move_node'
		,
		start: function(event,ui){
			console.log( $(ui.item).parent().attr('id'));
		}
		,
		update : function (event,ui) {
			$('#move_node_form').lightbox('Mover índice de');

		}
	});

		$( ".sortable" ).disableSelection();
 	/*test sortable jqueryui*/


	$('span.node_data').hover(
		function(){
			//place controls in current node
			$(this).append($('span#node_operations').clone());
		}
		, //second parameter to "$('span.node_data').hover(1,2)" is mouse out on the current element
		function(){
			//console.log($(this).children());
			$(this).children('span#node_operations').remove();
		}
	);

	$('img#add_node').click(function() {
		//get parent data to send to the create node method
		parent_node = $(this).parent().parent().parent().parent().parent().attr('id');
		//get the desired order
		order = $(this).parent().parent().parent().next().attr('node_order');
		//if last index count children and place at last
		if (order == null){
			order = $(this).parent().parent().parent().parent().children().length;
		}

		parent_title = $(this).parent().parent().parent().parent().parent().children('span.node_data').children('span.index_title').html();

		$('#add_node_form').lightbox('Añadir índice a '+parent_title);

		//assign values to hidden fields in form
		$('#lightbox_dialog form').children('[name$="parent_id"]').val(parent_node);
		$('#lightbox_dialog form').children('[name$="order"]').val(order);
		
		$('#add_node_submit').click(function() {
			$(this).parent().submit();
		}); 
	});

	$('img#add_sub_node').click(function() {
		this_node = $(this).parent().parent().parent().attr('id');
		parent_title = $(this).parent().parent().parent().children('span.node_data').children('span.index_title').html();
		$('#add_sub_node_form').lightbox('Añadir Subíndice a '+parent_title);

		$('#lightbox_dialog form').children('[name$="parent_id"]').val(this_node);
		
		$('#add_node_submit').click(function() {
			$(this).parent().submit();
		}); 
	});



});
