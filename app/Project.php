<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{	


	// this function return  the ids of Projects in the site 
    public function GetFirstProject(){

    	$Project= $this->where($this->primaryKey, '1')->get()->first();
    	return $Project;

    }//GetProjects

}//end class
