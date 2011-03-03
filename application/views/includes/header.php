<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Sinapsis</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

	<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/lightbox.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/sinapsis.css" type="text/css" />
	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/lightbox.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/sinapasis.js'></script>

	
</head>
<body>


<?php
	//Display notice window
	if($this->session->flashdata('notice_message') != '') {
		echo '<div id="notice_message">';
		echo $this->session->flashdata('notice_message');
		echo '</div>';	
	}
?>

<div id="lightbox" style="display:none;">
	<div id="lightbox_content">
		<img id="close_lightbox" class="link_cursor" src="<?php echo base_url() ?>images/close_mark.png" title="Cancelar">
		<div id="lightbox_title"></div>
		<div class="dotted_line"></div>
		<div id="lightbox_dialog">
		</div>
	</div>
</div>

	<div id="header">
		<div id="header_wrapper">
			<div id="header_title" class="left">
				header title
			</div>
			<div id="header_navigation" class="right">
				
			</div>
			<?php echo anchor('users/logout','Salir','class="btn_link logout_btn"'); ?>
			<div class="break"></div>
		</div>
	</div>
	
	<div id="wrapper">
		<div id="sidebar" class="left">
			sidebar
		</div>
		<div id="content" class="left">