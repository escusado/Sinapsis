<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	$(document).ready(function() {

	//debug
	// $("body").click(function(event) {
	  // console.log($(event.target));
	// }); Conclusión</span>

		$('li.tree_node').hover(function(){
				$(this).append($('#node_editor').html());
				$(this).children('.edit_tools').attr('style','display:inline');

				$('img#add_node').click(function() {
					$(this).parent().parent().parent().children('li#add_node_form').remove();
					$('li#add_node_form').clone().insertAfter($(this).parent().parent());
					$(this).parent().parent().parent().children('li#add_node_form').slideDown();

					$('img#place_node').click(function() {
						console.log('add');
						$(this).append('<li class="new_node " style="display:none;"><span class="index_title">'+$(this).parent().children('.add_node_form').val()+'</li>');
						$(this).children('li.new_node').insertAfter($(this).parent().parent());
						$(this).parent().parent().next().slideDown();
						$(this).parent().parent().remove();
					});
					$('img#cancel_place_node').click(function() {
						$(this).parent().parent().remove();
					});
				});
			},
			function(){
				$(this).children('.edit_tools').remove();
			}
		);


	});
</script>

<h1> <?php echo $project['project_name']; ?></h1>

<?php 
	//echo '<pre>', print_r($entries, true), '</pre>';

	
	echo '<ul id="project_index">';
	display_node_childs($project['_id'],$entries);
	function display_node_childs($node_id,$entries){
		
		foreach($entries as $entry){
			
			$entries_buffer = array();
			if($entry['parent_id'] == $node_id){
				array_push($entries_buffer,$entry);
				echo '<li class="tree_node" node_id="',$entry['_id'],'"><span class="index_title">', $entry['title'], '</span></li>';
				display_node_childs($entry['_id'],$entries_buffer); //recursive call to trace the tree
			}

			//echo '<pre>', print_r($entries_buffer, true), '</pre>';
		}

	}
	echo '</ul>';
?>

<div style="display:none;">
	<div id="node_editor">
		<span class="edit_tools"><img id="add_node" class="link_cursor" src="<?php echo base_url();?>images/page_add.png"></span>
	</div>

	<li id="add_node_form" style="display:none;"><span id="place_node" class="edit_tools" ><?php echo form_input('title', 'Título','class="add_node_form"'); ?><img id="place_node" class="link_cursor" src="<?php echo base_url();?>images/add.png"><img id="cancel_place_node" class="link_cursor" src="<?php echo base_url();?>images/delete.png"></span></li>

</div>

<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>