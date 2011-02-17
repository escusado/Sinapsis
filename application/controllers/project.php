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
		$this->load->model('entries_model');
		$data = array(
			'project' => current($this->projects_model->get_project()),//extrac single project from results
			'entries' => $this->entries_model->get_entries(),
		);
		
		$this->load->view('project/dashboard',$data);
	}

	function create_project_form(){
		$this->load->view('project/create');
	}

	function new_project(){
		$this->load->model('entries_model');
		$data = array(
			'student_id' => $this->session->userdata('user_id'),
			'project_name' => $this->input->post('project_name')
		);
		$project_id = $this->projects_model->create_project($data);
		
		//create default entries
		$this->entries_model->create_scaffold_data($project_id);
		
		redirect('student/index');
	}

}