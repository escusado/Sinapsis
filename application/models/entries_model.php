<?php
class Entries_model extends Model{
	function __construct(){
		parent::Model();
		$this->load->model('projects_model');
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
		
		$project_id = key($this->projects_model->get_project());

		$data=array(
			'project_id' => $project_id
		);

		return $this->mdb->get(
			$this->mdb->sinapsisDB->entries,
			$data,
			array('order'=>1)
		);
	}

	function create_new_entry(){
		//$this->output->enable_profiler(TRUE);

		$project_id = key($this->projects_model->get_project());
		
		$data = array(
			'parent_id' => $this->input->post('parent_id')
		);

		$siblings = $this->mdb->get(
			$this->mdb->sinapsisDB->entries,
			$data,
			array('order'=>1)
		);
		
		$order_counter = $this->input->post('order');

		//make space for new entry
		foreach ($siblings as $sibling){
			if($sibling['order'] == $order_counter){
				$sibling['order']+=1;

				$sibling_id = $sibling['_id'];

				$this->mdb->updatebyid(
					$this->mdb->sinapsisDB->entries,
					$sibling_id,
					$sibling
				);
				$order_counter+=1;
			}
		}

		$data = array(
			'project_id' => $project_id,
			'parent_id' => $this->input->post('parent_id'),
			'order' => $this->input->post('order'),
			'version' => 0,
			'title' => $this->input->post('title'),
			'body' => 'New Lorem Ipsum'
		);

		$this->mdb->insert(
			$this->mdb->sinapsisDB->entries,
			$data
		);

	}

}