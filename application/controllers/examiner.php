<?php
class Examiner extends Sinapsis_Controller{
	function __construct(){
		parent::__construct(array('su','ex'));
	}

	function index(){
		echo 'welcome examiner';
	}
}