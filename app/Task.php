<?php

namespace App;
use App\Http\Traits\tasks;

use Illuminate\Database\Eloquent\Model;
use App\UserTask;

class Task extends Model
{
   use tasks;
   
   protected $primaryKey = 'id';

   // this function return new instance of UserTask class
   public function InstanceUserTask(){
    	return new UserTask;
   }//InstanceUserTask


   public function SpecialTask($id){
      return $this->where($this->primaryKey,$id)->first(); 
    }//end get FirstTask
    

    //get New task depended on the requst of user
    public function NewTask($way){
    	$this->UserTask->IdLastTask($way);
    }//end NewTask




}// end class
