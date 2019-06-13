<?php 
namespace App\Http\Traits;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Task;
use App\UserTask;
use App\Project;
use App\Team;



trait tasks{
 
public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
 }


  public function Last($model,$columnName,$idUser){
  	 return $model::where($columnName,$idUser)->orderBy('created_at', 'asc')->get()->first();;
  }

   // this function get the id of the last task the user has recieved
   public function IdLast($model,$columnName,$idUser){

      return self::Last($model,$columnName,$idUser)->id_task;
   }//IdLastTask
   
   // public function update($object , $column, $value){
   // 	$object->where($object->primaryKey, self::CurrentUser()->id)->update([$column => $$value] );

   // }//update

    public function has30Task(){

        $AllUser = self::GetAllUser();
        $UserCompelteTasks = [];
       	foreach ($AllUser as $key => $User) {
       		if(self::Last(new UserTask,'id_task',$User->id)->id_task > 30 ){

       			$make_update = New User;

       			$make_update->where('id',$User->id)->update(['tasks_compelete'=>'compelete']);
       			array_push($UserCompelteTasks,$User);
       		}//if
       	}//end foreach 
       	return $UserCompelteTasks;

    }//has30Task

     // => this funciton to get all rows in table UserTask that belong the current User
    public function GetAllUser(){
      return  User::where('id' ,'=>','1')->get();
    }//GetAllRows

    public function GetUserWantFirstProject(){
       $Users =  User::where('tasks_compelete','compelete')->where('level', '1')->get();
       $ids = [];
       foreach ($Users as $key => $User) {
       		array_push($ids, $User->id);
       }
       return $ids;

    }//GetUserWantFirstProject

    public function MakeFirstTeamWork (){
    	$FirstProject = self::GetFirstProject();
    	$UserWantFirstProject = self::GetUserWantFirstProject();

    	if(count($UserWantFirstProject > $FirstProject->number_of_programmers)){

    		$Groups = array_chunk($UserWantFirstProject, $FirstProject->number_of_programmers);
    		
    		foreach ($Groups as $key => $Group) {
    			$Team = new Team;
    			$Team->members = $Group;
    			$Team->project = 1;
    			$Team->save();
    		}//foreach

    	}//if

    }//MakeFirstTeamWork

    public function GetFirstProject(){
    	return Project::where('id','1')->get()->first();
    }

    // this function return the sum of degree and sum of the total degree
    public function GetDegreeOfTasks($id){
    	$tasks_user = UserTask::where('id_task',$id)->get();
    	$sum_of_degree=0 ;
    	$total_degree =0;
    	foreach ($tasks_user as $key => $task) {
    		$sum_of_degree += $task->degree;
    		$sum_of_total += $task->total_degree;
    	}

    	$level = $sum_of_degree / $sum_of_total * 100;

    	return $level;
    }


     /*  => this to determine the user that has 30 task after has 30 tasks the system 
           will  automatic calcalute the the the level of this person within get the sum of the degree of the all task that he solved it and division it on sum of tataldegree of  depended on the result came from division sum of degree on taota_degree will determine the level if it is excellent of inermediate or entry level 
    */  
    public function DetermineLevel(){

	  $UserCompelteTasks =  self::has30Task();

	  foreach ($UserCompelteTasks as $key => $User) {

	      if($self::GetDegreeOfTasks($User->id) >= 70){

	        User::where('id',$User->id)->update(['level'=>'1']);

	      }
	  }//end foreach

    }//DetermineLevel
  
}//end trait 