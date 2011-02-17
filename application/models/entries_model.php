<?php
class Entries_model extends Model{
	function __construct(){
		parent::Model();
	}

	function create_scaffold_data($project_id){
		$this->load->library('scaffold_data');
		$order = 0;
		$chapters_id ='';

		foreach ($this->scaffold_data->create($project_id) as $entry){
			$entry['order'] = $order;
			$order+=1;
			//print_r($entry);
			$this->mdb->insert(
				$this->mdb->sinapsisDB->entries,
				$entry
			);
		}

	}

	function get_entries(){
		$this->load->model('projects_model');
		$project_id = key($this->projects_model->get_project());

		$data=array(
			'project_id' => $project_id
		);

		return $this->mdb->get(
			$this->mdb->sinapsisDB->entries,
			$data
		);
	}

}