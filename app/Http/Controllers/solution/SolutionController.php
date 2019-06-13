<?php

namespace App\Http\Controllers\solution;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserTask;
use App\User;
use App\TaskSolution;
class SolutionController extends Controller
{

	
  public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
  }

  public function GetAllTaskUserTakenIt(){
  	 $UserTask = UserTask::where('id_user',self::CurrentUser()->id)->whereNotNull('degree')->get();
  	 $Ids_tasks = [];

  	 if(!is_null($UserTask)){

  	 	foreach ($UserTask as $key => $Task) {
  	 		array_push($Ids_tasks, $Task->id_task);

  	 	}//foreach	
  	 	return $Ids_tasks;
  	 }//if
  	 
  }//GetAllTaskUserTakenIt

  public function getTaskSolution ($id){
  	return TaskSolution::find($id);
  }//getTaskSolution

  public function GetSolutionForTasks(){
  	$ids = self::GetAllTaskUserTakenIt();
  	$solutions = [];
  	for($i = 0 ; $i < count($ids);$i++){
  	$task = self::getTaskSolution($ids[$i]);
  	 if(!is_null($task)){
  	 	array_push($solutions,$task);
  	 }

  		
  	}//for
  	
  	if(!empty($solutions) and !is_null($solutions)){
  		return view('solution.solution',compact('solutions'));
  	}else{
  		$emptys  = '';
  		return view('solution.solution',compact('emptys'));	
  	}
  	
  }//GetSolutionForTasks



}//class
