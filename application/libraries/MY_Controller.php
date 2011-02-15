<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sinapsis_Controller extends Controller {
	function __construct($roles) {
		parent::Controller();

		//test for authorized content
		$test_user_id = $this->auth->get_user($this->session->userdata('user_id'));

		//not in user list
		if ($test_user_id === FALSE){
			redirect('sinapsis');
		}

		//if user role not in $roles array redirect to controller
		if( !(in_array($test_user_id['role'],$roles)) ){
			redirect('sinapsis');
		}
	}
}  