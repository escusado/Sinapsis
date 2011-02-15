<?php
class Users extends Controller{
	function __construct(){
		parent::Controller();
	}

	function login(){
		$credentials = 	array(
							'username' => $this->input->post('username'),
							'password' => sha1($this->input->post('password'))
						);
		//print_r($credentials);
		
		if($this->auth->try_login($credentials)){
			//user exists
			//echo 'users: yes';
			redirect('board');
		}else{
			//unsuccessful
			//echo 'users: no';
			redirect('sinapsis');
		}

	}

	function logout(){
		$this->auth->logout();
		redirect('sinapsis');
	}

	function check_username(){
		$this->load->model('users_model');

		$username=$_POST['username'];
		
		if($this->users_model->user_exist($username)){
			$this->output->set_output('EXIST');
		}else{
			$this->output->set_output('CLEAR');
		}
	}
}