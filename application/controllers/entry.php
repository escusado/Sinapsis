<?php
class Entry extends Controller{
	function __construct(){
		parent::Controller();
	}

	function new_entry(){
		$this->output->enable_profiler(TRUE);
	}
}