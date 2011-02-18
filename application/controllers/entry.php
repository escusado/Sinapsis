<?php
class Entry extends Controller{
	function __construct(){
		parent::Controller();
		$this->load->model('entries_model');
	}

	function new_entry(){
		$this->entries_model->create_new_entry();
		redirect('project/dashboard');
	}
}