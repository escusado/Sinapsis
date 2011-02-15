<?php
class Student extends Sinapsis_Controller{
	function __construct(){
		parent::__construct(array('su','nu'));
	}

	function index(){
		echo 'welcome student';
	}
}