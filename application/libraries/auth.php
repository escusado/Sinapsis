<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth {

	var $CI;
	
	function __construct() {
		 $this->CI =& get_instance();
	}

	function try_login($condition = array()) {

		//debug
		// echo 'try_login<br>';
		// print_r($condition);
		
		$query = 	current($this->CI->mdb->get(
						$this->CI->mdb->sinapsisDB->users,
						$condition
					));
		
		//debug
		//print_r($query);
		// echo '<br>query<br>';
		//echo('auth: ['.$query['_id'].']');
		// echo '<br>sizeof<br>';
		//echo (sizeof($query));

		if ($query['_id'] == '') {
			//debug
			//echo 'auth: no such user ';
			return FALSE;

		} else {

			$this->CI->session->set_userdata(array( 'user_id' => $query['_id'] ));
			//echo 'auth: yes user ';
			//debug
			// echo '<br>session<br>';
			// echo $this->CI->session->userdata('user_id');
			
			return TRUE;
		}
	}
	
	
	 function logout() {
		$this->CI->session->set_userdata(array('user_id'=>FALSE));
	}
	
	
	function get_user($id) {

		//debug
		// echo 'get_user';
		// echo $id;
		
		if ($id) {

			$data = array(
				'user_id' => $id
			);

			$query = 	$this->CI->mdb->getbyid(
							$this->CI->mdb->sinapsisDB->users,
							$id
						);
			
			//print_r($query);


			if ($query['_id'] == '') {
				return FALSE;
			} else {
				return $query;
			}

		} else {
			
			return FALSE;
		
		}
	}
 }
