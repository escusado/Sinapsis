<?php
class Sinapsis extends Controller{
	
	function __construct(){
		parent::Controller();
	}

	function index(){
		//check if user logged in
		if ($this->auth->get_user($this->session->userdata('user_id')) === FALSE) {
			//not logged in
			$this->load->view('login/form');
			return;
		}
		//logged in
		$this->load->model('users_model');
		//choose correct controller based on user role

		switch ($this->users_model->get_user_role()){
			case 'su':	redirect('/board/index');
						break;
			case 'ex':	redirect('/examiner/index');
						break;
			case 'nu':	redirect('/student/index');
						break;
			defalt:		$this->load->view('login/form');
						break;
		}

	}


 /*DEBUG FUNCTIONS****************************************************************************/
	function create_test_users(){
		

		$data = array(
			'username' => 'admin',
			'password' => sha1('admin'),
			'role' => 'su'
		);

		$user = $this->mdb->insert(
			$this->mdb->sinapsisDB->users,
			$data
		);

		echo 'created user<br>';
		print_r($user);
		// $this->auth->try_login($data);

		// echo 'user created, logged in and the user_id in the session is:<br>';
		// echo $this->session->userdata('user_id');

	}

	function set_session(){
		$this->session->set_userdata(array( 'user_id' => '1234567890' ));
	}

	function test_session(){

	function myGetType($var){
		if (is_array($var)) return "array";
		if (is_bool($var)) return "boolean";
		if (is_float($var)) return "float";
		if (is_int($var)) return "integer";
		if (is_null($var)) return "NULL";
		if (is_numeric($var)) return "numeric";
		if (is_object($var)) return "object";
		if (is_resource($var)) return "resource";
		if (is_string($var)) return "string";
		return "unknown type";
	}

		$test_user_id = $this->auth->get_user($this->session->userdata('user_id'));

		if ($test_user_id === FALSE){
			echo 'falso';
		}

		if ($test_user_id === TRUE){
			echo 'VERDAD';
		}

		echo '$test_user_id: <br>';
		echo $test_user_id['_id'].'<br>';
		echo 'test value<br>';
		echo $test_user_id['_id'] === '';

		echo myGetType(($this->session->userdata('user_id'))).'<br>'; 
		echo ($this->session->userdata('user_id')).'<br>';
		echo myGetType($this->auth->get_user($this->session->userdata('user_id'))).'<br>';
		print_r($this->auth->get_user($this->session->userdata('user_id'))).'<br>';
		echo $this->auth->get_user($this->session->userdata('user_id')) === FALSE;
	}



}