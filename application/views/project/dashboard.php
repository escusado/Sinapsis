<?php $this->load->view('includes/header'); ?>
<script type='text/javascript' src='<?php echo base_url();?>js/dashboard.js'></script>

<h1> <?php echo $project['project_name']; ?></h1>

<?php

	//echo '<pre>', print_r($entries, true), '</pre>';

	
	echo '<ul id="',$project['_id'],'">';
	
	display_node_childs($this->entries_model->get_entries_by_parent((string)$project['_id']),(string)$project['_id']);
	function display_node_childs($entries,$node_id){
		if(count($entries)!=0)echo '<ul id="',$node_id,'">';
		foreach($entries as $entry){
			

			echo '	<li class="tree_node" id="',$entry['_id'],'" node_order="',$entry['order'],'">';
			echo '	<span class="node_data">';
			echo '		<span class="index_order">', $entry['order'], '. </span>';
			echo '		<span class="index_title">', $entry['title'], '</span>';
			echo '	</span>';

			//VERY DIRTY recursive call to trace the tree
			$CI =& get_instance();
			display_node_childs( $CI->entries_model->get_entries_by_parent( (string)$entry['_id'] ),(string)$entry['_id'] ) ; 
			
			echo '</li>';
		}
		if(count($entries)!=0)echo '</ul>';
	}
	echo '</ul>';
?>

<div style="display:none;">

	<span id="node_operations">
		<img id="add_node" class="link_cursor" src="<?php echo base_url();?>images/page_add.png" title="Añadir índice">
		<img id="add_sub_node" class="link_cursor" src="<?php echo base_url();?>images/page_subindex.png" title="Añadir Subíndice">
	</span>

	<div id="add_node_form" >
		<span class="edit_tools" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<input type="hidden" name="parent_id" value="-"/>';
				echo '<input type="hidden" name="order" value="0"/>';
				echo form_input('title', 'Título','class="add_node_form"');
				echo '<img id="add_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Guardar Índice">';
				echo '<img id="cancel_entry" class="link_cursor" src="'.base_url().'images/delete.png" title="Cancelar">';
			echo form_close();
		?>
		</span>
	</div>

	<div id="add_sub_node_form" >
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
	</div>

</div>

<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>