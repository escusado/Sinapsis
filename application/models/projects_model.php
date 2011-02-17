<?php
class Projects_model extends Model{
	function __construct(){
		parent::Model();
	}

	function get_project(){
		$data=array(
			'student_id' => $this->session->userdata('user_id')
		);
		//check for porject existance based on the user id, if not present return false
		return $this->mdb->get(
			$this->mdb->sinapsisDB->projects,
			$data
		);

	}

	function create_project($data){
		return $this->mdb->insert(
			$this->mdb->sinapsisDB->projects,
			$data
		);

	}
}