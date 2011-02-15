<?php
class Project extends Sinapsis_Controller{
	function __construct(){
		parent::__construct(array('su','nu','ex'));

		$this->load->model('projects_model');
	}

	function find_project(){
		$this->projects_model->get_project();
	}

	function dashboard(){
		$this->load->view('project/dashboard');
	}

	function create_project_form(){
		$this->load->view('project/create');
	}

	function new_project(){
		$data = array(
			'student_id' => $this->session->userdata('user_id'),
			'project_name' => $this->input->post('project_name')
		);

		$this->projects_model->create_project($data);
		redirect('student/index');
	}

}