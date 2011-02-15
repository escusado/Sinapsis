<!--load header-->
<?php $this->load->view('includes/header'); ?>
<script type="text/javascript">
$(document).ready(function(){

	$("#username").change(function() {

		var usr = $("#username").val();

			$.ajax({
				type: "POST",
				url: "/users/check_username",
				data: "username="+ usr,
				success: function(msg){  

						$("#status").ajaxComplete(function(event, request, settings){ 

							if(msg == 'EXIST'){
								$("#status").html('El nombre de usuario ya existe');
							}else{
								$("#status").html('El nombre de usuario está disponible');
							}

						});
			 		}
			});
	});

});
</script>
<table summary="Administradores" class="user_table" cellspacing="0">
<tr>
	<td class="servHd">Administradores</td>
</tr>
	<?php
		foreach($su_user_list as $su_user){
			echo alternator('<tr class="eaven">', '<tr class="odd">');
				echo '<td>'.$su_user['username'].'</td>';
			echo '</tr>';
		}
	?>
</table>

<table summary="Asesores" class="user_table" cellspacing="0">
<tr>
	<td class="servHd">Asesores</td>
</tr>
	<?php
		foreach($ex_user_list as $ex_user){
			echo alternator('<tr class="eaven">', '<tr class="odd">');
				echo '<td>'.$ex_user['username'].'</td>';
			echo '</tr>';
		}
	?>
</table>

<table summary="Estudiantes" class="user_table" cellspacing="0">
<tr>
	<td class="servHd">Estudiantes</td>
</tr>
	<?php
		foreach($nu_user_list as $nu_user){
			echo alternator('<tr class="eaven">', '<tr class="odd">');
				echo '<td>'.$nu_user['username'].'</td>';
			echo '</tr>';
		}
	?>
</table>
<div class="dotted_line"></div>
<div id="create_user_form">

	<h2>Create new user</h2>

	<div id='status'>status</div>

	<?php 
		echo form_open('board/new_user');
		echo form_input('username', 'Username','id="username"');
		echo '<br>';
		echo form_input('password', 'Password');
		echo '<br>';
		$options = array(
			'nu'	=> 'Alumno',
			'ex'	=> 'Asesor',
			'su'	=> 'Administrador'
		);
		echo form_dropdown('role', $options, 'large');
		echo '<br>';
		echo form_submit('submit', 'Guardar');
		echo form_close();
	?>
</div>

<!--load footer-->
<?php $this->load->view('includes/footer'); ?>