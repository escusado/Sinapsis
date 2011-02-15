<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="es">
<head>
	<title>Sinapsis</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="<?php echo base_url();?>css/reset.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>css/sinapsis.css" type="text/css" />

	<script type='text/javascript' src='<?php echo base_url();?>js/jquery.js'></script>
	<script type='text/javascript' src='<?php echo base_url();?>js/sinapasis.js'></script>
	
</head>
<body>
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