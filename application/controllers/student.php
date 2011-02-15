<?php
class Student extends Sinapsis_Controller{
	function __construct(){
		parent::__construct(array('su','nu'));
	}

	function index(){
		$this->load->model('projects_model');
		//check if student has project
		if($this->projects_model->get_project()){
			redirect('project/dashboard');
		}else{
			redirect('project/create_project_form');
		}
	}
}