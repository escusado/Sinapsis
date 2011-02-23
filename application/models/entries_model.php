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

	function get_entries_by_parent($parent_id){
		//echo $parent_id;
		return $this->mdb->get(
			$this->mdb->sinapsisDB->entries,
			array('parent_id' => $parent_id),
			array('order'=>1)
		);
	}

	function create_new_entry(){
		//$this->output->enable_profiler(TRUE);

		$project_id = key($this->projects_model->get_project());

		$siblings = $this->mdb->get(
			$this->mdb->sinapsisDB->entries,
			array('parent_id' => $this->input->post('parent_id')),
			array('order'=>1)
		);
		
		$order_counter = (int)$this->input->post('order');

		// echo 'desired space: '.$order_counter.'<br \>';
		// echo 'title: '.$this->input->post('title').'<br \>';
		// echo '************************************<br \>';

		//make space for new entry
		foreach ($siblings as $sibling){
			//check for the current sibling that has that space
			if($sibling['order'] == $order_counter){
				//move to the next space
				//echo $sibling['title'].' old space: '.$sibling['order'].'<br \>';
				$sibling['order']+=1;
				//echo $sibling['title'].' new space: '.$sibling['order'].'<br \>-----------------------------<br \>';
				//save it
				$this->mdb->updatebyid(
					$this->mdb->sinapsisDB->entries,
					$sibling['_id'],
					$sibling
				);
				//move to the next space to continue the repositioning
				$order_counter+=1;
			}
		}

		//create new entry in the desired space
		$data = array(
			'project_id' => $project_id,
			'parent_id' => $this->input->post('parent_id'),
			'version' => 0,
			'title' => $this->input->post('title'),
			'body' => 'New Lorem Ipsum',
			'order' => (int)$this->input->post('order') //convert to integer
		);

		$this->mdb->insert(
			$this->mdb->sinapsisDB->entries,
			$data
		);


		//show flash data on header
		$notice_message = 'Añadido:'.$this->input->post('title').'.<br \>En el índice: '.$this->input->post('order').'.';
		$this->session->set_flashdata('notice_message', $notice_message);
	}

}