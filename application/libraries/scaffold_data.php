<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Scaffold_data {

    function create($project_id){
    	
    	return $data = array(
	    	array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //root entries has the project as parent
	    		'version' => 0,
	    		'title' => 'Introducción',
	    		'body' => 'Introducción Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    ),
		    array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //root entries has the project as parent
	    		'version' => 0,
	    		'title' => 'Marco Contextual',
	    		'body' => 'Marco Contextual Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    ),
		    array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //root entries has the project as parent
	    		'version' => 0,
	    		'title' => 'Marco Conceptual',
	    		'body' => 'Marco Conceptual Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    ),
		    array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //parent for chapters is the entry that has '_chapters' as title
	    		'version' => 0,
	    		'title' => 'Capitulo I',
	    		'body' => 'Capitulo I Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    ),
		    array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //parent for chapters is the entry that has '_chapters' as title
	    		'version' => 1,
	    		'title' => 'Capitulo II',
	    		'body' => 'Capitulo II Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    ),
		    array(
	    		'project_id' => $project_id,
	    		'parent_id' => $project_id, //root entries has the project as parent
	    		'version' => 0,
	    		'title' => 'Conclusión',
	    		'body' => 'Conclusión Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
		    )
	    );
    }
}
