<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	$(document).ready(function() {

	//debug
	// $("body").click(function(event) {
	  // console.log($(event.target));
	// }); Conclusión</span>

		$('li.tree_node').hover(function(){
				$('span#node_operations').clone().insertAfter($(this).children('span.index_title'));

				$('img#add_node').click(function() {
					$('#project_index').find('li#add_node_form').remove();
					$('#project_index').find('li#add_sub_node_form').remove();
					$('li#add_node_form').clone().insertAfter($(this).parent().parent());
					$(this).parent().parent().parent().children('li#add_node_form').slideDown();
				});

				$('img#add_sub_node').click(function() {
					$('#project_index').find('li#add_node_form').remove();
					$('#project_index').find('li#add_sub_node_form').remove();
					$('li#add_sub_node_form').clone().insertAfter($(this).parent().parent());
					$(this).parent().parent().parent().children('li#add_sub_node_form').slideDown();
				});
			},
				function(){
					$('#project_index').find('span#node_operations').remove();
				}
		);
		
		$('img#add_sub_entry').click(function() {
			$(this).parent().children('[name$="parent_id"]').val($(this).parent().parent().parent().prev().attr('node_id'));
			$(this).parent().submit();
		});

		$('img#add_entry').click(function() {
			$(this).parent().children('[name$="parent_id"]').val($(this).parent().parent().parent().parent().attr('node_id'));

			var order = $(this).parent().parent().parent().next().attr('node_order');

			if(order == ''){
				order = 0;
			}

			$(this).parent().children('[name$="order"]').val(order);
			
			$(this).parent().submit();
		});

	});



</script>

<h1> <?php echo $project['project_name']; ?></h1>

<?php

	//echo '<pre>', print_r($entries, true), '</pre>';

	
	echo '<ul id="project_index" node_id="',$project['_id'],'">';
	
	display_node_childs($project['_id'],$this->entries_model->get_entries_by_parent((string)$project['_id']));
	function display_node_childs($node_id,$entries){
		echo '<ul>';
		foreach($entries as $entry){
			
			//$entries_buffer = array();
			if($entry['parent_id'] == $node_id){
				//array_push($entries_buffer,$entry);
				echo '<li class="tree_node" node_id="',$entry['_id'],'" node_order="',$entry['order'],'"><span class="index_order">', $entry['order'], '. </span><span class="index_title">', $entry['title'], '</span></li>';
				display_node_childs($entry['_id'],$entries); //recursive call to trace the tree
			}

			//echo '<pre>', print_r($entries_buffer, true), '</pre>';
		}
		echo '</ul>';
	}
	echo '</ul>';
?>

<div style="display:none;">

	<span id="node_operations">
		<img id="add_node" class="link_cursor" src="<?php echo base_url();?>images/page_add.png" title="Añadir índice">
		<img id="add_sub_node" class="link_cursor" src="<?php echo base_url();?>images/page_subindex.png" title="Añadir Subíndice">
	</span>

	<li id="add_node_form" style="display:none;">
		<span class="edit_tools" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<input type="hidden" name="parent_id" value="-"/>';
				echo '<input type="hidden" name="order" value="0"/>';
				echo form_input('title', 'Título','class="add_node_form"');
				echo '<img id="add_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Guardar Índice">';
			echo form_close();
		?>
		</span>
	</li>

	<li id="add_sub_node_form" style="display:none;">
		<span class="edit_tools" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<img class="sub_index" src="', base_url() ,'images/sub_index.png">';
				echo '<input type="hidden" name="parent_id" value="-"/>';
				echo '<input type="hidden" name="order" value="0"/>';
				echo form_input('title', 'Título','class="add_node_form"');
				echo '<img id="add_sub_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Colocar Subíndice">';
			echo form_close();
		?>
		</span>
	</li>

</div>

<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>