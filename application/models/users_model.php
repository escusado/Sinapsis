<?php

class Users_model extends Model{
	function __construct(){
		parent::Model();
	}

	function list_users(){
		return $this->mdb->get(
			$this->mdb->sinapsisDB->users
		);
	}

	function create_user($user){
		$user = $this->mdb->insert(
			$this->mdb->sinapsisDB->users,
			$user
		);

		return $user;

	}

	function user_exist($username){
		$data=array(
			'username' => $username
		);

		return $this->mdb->get(
			$this->mdb->sinapsisDB->users,
			$data
		);
	}

	function list_users_by_role($role){
		$data=array(
			'role' => $role
		);
		
		return $this->mdb->get(
			$this->mdb->sinapsisDB->users,
			$data
		);
	}

	function get_user_role(){
		// $data = array(
		// 	'_id' => new MongoId($this->session->userdata('user_id'))
		// );

		$user = $this->mdb->getbyid(
			$this->mdb->sinapsisDB->users,
			new MongoId($this->session->userdata('user_id'))
		);

		return $user['role'];

	}

}