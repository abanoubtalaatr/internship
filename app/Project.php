<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{	

	 protected $fillable = [
        'name','description','number_of_programmers','period'
    ];
	// this function return  the ids of Projects in the site 
    public function GetFirstProject(){

    	$Project= $this->where($this->primaryKey, '1')->get()->first();
    	return $Project;

    }//GetProjects

}//end class
