<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	$(document).ready(function() {

		$('li.tree_node').hover(function(){
				$(this).append($('#node_editor').html());
				$(this).children('#edit_tools').attr('style','display:inline');
			},
			function(){
				$(this).children('#edit_tools').remove();
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

<div id="node_editor">
	<span id="edit_tools" style="display:none;"><img id="add_node" class="link_cursor" src="<?php echo base_url();?>images/page_add.png"></span>
</div>

<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>