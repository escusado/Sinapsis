<?php $this->load->view('includes/header'); ?>


<h1> <?php echo $project['project_name']; ?></h1>

<?php 
	//echo '<pre>', print_r($entries, true), '</pre>';

	foreach($entries as $entry){
		echo '<pre>', print_r($entry['title'], true), '</pre>';
	}

?>

<?php echo anchor('student/edit_project','Editar proyecto')?>

<?php $this->load->view('includes/footer'); ?>