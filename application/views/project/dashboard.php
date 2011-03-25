<?php $this->load->view('includes/header'); ?>
<script type='text/javascript' src='<?php echo base_url();?>js/jquery-ui-1.8.11.custom.min.js'></script>
<script type='text/javascript' src='<?php echo base_url();?>js/dashboard.js'></script>

<h1> <?php echo $project['project_name']; ?></h1>

<?php

	//echo '<pre>', print_r($entries, true), '</pre>';

	
	echo '<ul id="',$project['_id'],'" class="sortable">';
	echo 	'<span class="node_data">';
	echo '		<span class="index_order">índice</span>';
	echo '		<span class="index_title">', $project['project_name'], '</span>';
	echo '	</span>';

	display_node_childs($this->entries_model->get_entries_by_parent((string)$project['_id']),(string)$project['_id']);
	function display_node_childs($entries,$node_id){
		if(count($entries)!=0)echo '<ul id="',$node_id,'" class="sortable">';
		foreach($entries as $entry){
			

			echo '	<li class="tree_node" id="',$entry['_id'],'" node_order="',$entry['order'],'">';
			echo '	<span class="node_data">';
			echo '		<span class="index_order">', $entry['order']+1, '. </span>';
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
		<img id="add_node" class="link_cursor" src="<?php echo base_url();?>images/page_add.png" title="Añadir Índice">
		<img id="add_sub_node" class="link_cursor" src="<?php echo base_url();?>images/page_subindex.png" title="Añadir Subíndice">
		<img id="move_node" class="move_cursor" src="<?php echo base_url();?>images/move.gif" title="Mover Índice">
	</span>

	<div id="add_node_form" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<input type="hidden" name="parent_id" value="-" />';
				echo '<input type="hidden" name="order" value="0"/>';
				echo form_input('title', 'Título','class="add_node_form"');
				echo '<div id="add_node_submit" class="btn link_cursor"><p>Añadir índice</p></div>';
				//echo '<img id="add_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Guardar Índice">';
			echo form_close();
		?>
	</div>

	<div id="add_sub_node_form" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<input type="hidden" name="parent_id" value="-"/>';
				echo '<input type="hidden" name="order" value="0"/>';
				echo form_input('title', 'Título','class="add_node_form"');
				echo '<div id="add_node_submit" class="btn link_cursor"><p>Añadir Subíndice</p></div>';
				//echo '<img id="add_sub_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Colocar Subíndice">';
			echo form_close();
		?>
	</div>
	
	<div id="move_node_form" >
		<?php 
			echo form_open('entry/new_entry');
				echo '<input type="hidden" name="parent_id" value="-"/>';
				echo '<input type="hidden" name="order" value="0"/>';
				echo '<div id="move_node_submit" class="btn link_cursor"><p>Move Índice</p></div>';
				//echo '<img id="add_sub_entry" class="link_cursor" src="'.base_url().'images/add.png" title="Colocar Subíndice">';
			echo form_close();
		?>
	</div>
	
</div>



<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>