<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
	$(document).ready(function() {

	//debug
	 /*$("body").click(function(event) {
	   console.log($(event.target));
	 }); */

	var project_node = '<?php echo (string)$project['_id']; ?>';

		$('li.tree_node').hover(function(){
				$('span#node_operations').clone().insertAfter($('li#'+$(this).attr('id')).children('span.index_title'));

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
					$('#'+project_node).find('span#node_operations').remove();
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

	
	echo '<ul id="',$project['_id'],'">';
	
	display_node_childs($this->entries_model->get_entries_by_parent((string)$project['_id']),(string)$project['_id']);
	function display_node_childs($entries,$node_id){
		if(count($entries)!=0)echo '<ul id="',$node_id,'">';
		foreach($entries as $entry){
			

			echo '<li class="tree_node" id="',$entry['_id'],'" node_order="',$entry['order'],'"><span class="index_order">', $entry['order'], '. </span><span class="index_title">', $entry['title'], '</span>';

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