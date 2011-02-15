<!--load header-->
<?php $this->load->view('includes/header'); ?>

<div id="login_form">

	<h2>Login, Fool!</h2>
	<?php 
		echo form_open('users/login','name=login_form');
		echo form_input('username', 'Username');
		echo form_password('password', 'Password');
		echo form_submit('submit', 'Login','class="btn"');
		echo form_close();
	?>
</div>


<!--load footer-->
<?php $this->load->view('includes/footer'); ?>