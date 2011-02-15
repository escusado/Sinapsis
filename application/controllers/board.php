<?php

class Board extends Sinapsis_Controller{
	//users_model is autoloaded
	function __construct(){
		//load constructor from parent (MY_Controller) and pass allowed user roles
		parent::__construct(array('su'));
	}


	function index(){
		$this->load->view('board/panel');
	}

	function create_user_form(){

		$this->load->helper('string');
		
		$data = array(
			'su_user_list' => $this->users_model->list_users_by_role('su'),
			'ex_user_list' => $this->users_model->list_users_by_role('ex'),
			'nu_user_list' => $this->users_model->list_users_by_role('nu')
		);

		$this->load->view('board/create_user',$data);
	}

	function new_user(){

		$user = array(
			'username' => $this->input->post('username'),
			'password' => sha1($this->input->post('username')),
			'role' => $this->input->post('role')
		);
		
		$this->users_model->create_user($user);

		redirect('board/create_user_form');
	}

}