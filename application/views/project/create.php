<?php $this->load->view('includes/header'); ?>

<h1>Crear nuevo proyecto</h1>

<div id="create_project_form">
	<?php 
		echo form_open('project/new_project');
		echo form_input('project_name', 'Título');
		echo '<br>';
		echo form_submit('submit', 'Guardar');
		echo form_close();
	?>
</div>

<?php $this->load->view('includes/footer'); ?>