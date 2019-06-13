<?php
namespace App\Http\Controllers\jobCorn;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\Task;
use App\UserTask;
use App\Project;
use App\Team;
use App\UserProjectTask;
use App\TeamLeader;

/**
 * s
 */
class jobCorn{

    public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
    }
    public function handle(){

      self::SendTask();
      self::GetAllUser();
      self::DetermineLevel();
      self::GetUserWantFirstProject();
      self::GetFirstProject();
      self::MakeFirstTeamWork();
      self::DeterminTeamsWantNewProject();
      self::SeTPropertyTeams();

    }


  /* =>>=>>=>>=>>
      this start component of SeadTask 
  */
    //to send task should check if the user have task before or not if has send the next task from table Task else not have any task will send the first task in table Task
  public function SendTask(){

    $AllUser =self::GetAllUser();
    
    foreach ($AllUser as $key => $User) {

      $UserTask = UserTask::where('id_user',$User->id)->orderBy('created_at', 'asc')->get()->first();

      // this if the user not have any task at all you will sign to him first task 

      if(is_null($UserTask)){
        
        $NewTask = self::GetFirstTask();
        $NewUserTask = new UserTask;
        self::InsertNewUserTask($NewTask->id,$User->id);

      }else{

        $NewTask = Task::where('id',$UserTask->id_task + 1)->get()->first();
        // this to check the next Task from table Task is already existing 
        if(!is_null($NewTask)){
          // to ensure that NewTask not exist in table UserTask
          if(is_null(self::SearchAboutTask($User->id,$NewTask->id))){
             self::InsertNewUserTask($NewTask->id,$User->id);
          }

        }//if

      }//else

   }//foreach
    
  }//function SendTask 

  // this to insert new row in database in table UserTask
  public function InsertNewUserTask($idTask,$idUser){
      $NewUserTask = new UserTask;
      $NewUserTask->id_task = $idTask;
      $Hours = date('h') + 4;
      $NewUserTask->start_task = date('Y-m-d h:i:s');
      $NewUserTask->End_task   = date("Y-m-d $Hours:i:s");
      $NewUserTask->id_user    = $idUser;
      $NewUserTask->save();
  } //InsertNewUserTask
  
  public function SearchAboutTask($idUser,$idTask){
    return UserTask::where('id_user',$idUser)->where('id_task',$idTask)->get()->first();
  }

/* =>>=>>=>>=>>

      this End component of SeadTask 
*/
/*                                        
                                        ++ 
                                      ++  ++
                                     +++  +++
                                    +++    +++
                                   +++      +++
                                  ++++++++++++++
                                 ++++++++++++++++
                                +++            +++ 
                               +++              +++
                              +++                +++
*/
// Start comepoent of assign New Project

  public function SearchAboutUserTask($id,$idTask){
    $Task =  UserTask::where('id_user',$id)->where('id_task',$idTask)->get()->first();
    if(is_null($Task)){
      return 'null';
    }else{
      return 'false';
    }
  }//SearchAboutUserTask

  public function GetFirstTask(){
    return Task::find(1);
  }//GetFirstTask

  public function HasUserTask(){
    $Users = self::GetAllUser();
    $UTask = self::GetFirstTask();

    if(!is_null($UTask)){

       foreach ($Users as $key => $User) {
        if(self::SearchAboutUserTask($User->id,$UTask->id_task) !=='null'){

           $user_task = new UserTask;
           $user_task->id_user = $User->id;
           $user_task->id_task = $UTask->id; 
           $user_task->save(); 
           
        }else{
          // this else for if this person have before a tasks and get the last 
          $Last_task = self::Last(new UserTask,'id_user',$User->id);

          $NewTask = Task::where('id',$Last_task['id_task'] + 1)->get()->first();
          if(!is_null($NewTask)){

            $New_User_Task = new  UserTask;
            $New_User_Task->id_user = $User->id;
            $New_User_Task->id_task = $NewTask->id;
            $New_User_Task->save();

          }else{
            $NewTask ='NewTask'; 
            return view('tasks.tasks',compact("NewTask"));
          }
        }

      }//foreach

    }//is_null
   
  }//HasUserTask
	public function Last($model,$columnName,$idUser){
     return $model::where($columnName,$idUser)->orderBy('created_at', 'desc')->get()->first();
   }

   /* => to assign the first project to the new user that recently fisish the task 
    invoke has30Task to ensure the this user has already fishish the 30 task this by get all user that have in table Usertask
    => then invoke GetDegreeOfTasks to ensure that is user pass 70 % of tasks degree if yes is pass 

   */
    //1
    public function has30Task(){

        $AllUser = self::GetAllUser(); 
        $UserCompelteTasks = [];

        foreach ($AllUser as $key => $User) {
          if(!is_null(self::Last(new UserTask, 'id_user',$User->id))){
             if(self::Last(new UserTask,'id_user',$User->id)->id_task >=2 ){

              $make_update = New User;

              $make_update->where('id',$User->id)->update(['tasks_compelete'=>'compelete']);
              array_push($UserCompelteTasks,$User);
            }//if
             
          }//if
        }//end foreach 
        if(empty($UserCompelteTasks)){
          return "Null";
        }else{
          return $UserCompelteTasks;
        }

    }//has30Task
     // => this funciton to get all rows in table UserTask that belong the current User

    public function GetAllUser(){
      return User::all(); 
    }//GetAllRows
    //3
    public function GetUserWantFirstProject(){
       $Users =  User::where('tasks_compelete','compelete')->where('level',1)->get();
       
       $ids = [];
       foreach ($Users as $key => $User) {
          array_push($ids, $User->id);
       }
       return $ids;

    }//GetUserWantFirstProject
   //4
    public function SearchAboutTeam($members , $project){
      $team = Team::where('members',$members)->where('project',$project)->get()->first();
      if(is_null($team)){
        return 'null';
      }else{
        return 'not null';
      }
    }
    public function SearchAboutGroup($group){
      $group = UserProjectTask::where("belong_group",$group)->get()->first();
      if(is_null($group)){
        return 'null';
      }else{
        return 'not null';
      }
    }

    public function GetTeamLeaderRandom(){
      $RandomTeamLeader = TeamLeader::all();
      $ids= [];
      if(!is_null($RandomTeamLeader)){

        foreach ($RandomTeamLeader as $key => $TeamLeader) {
          array_push($ids, $TeamLeader->id); 
        }//foreach
        return rand(1,count($ids));
      }//if

    }//public GetTeamLeaderRandom

    public function MakeFirstTeamWork (){

      $FirstProject = self::GetFirstProject();
     
       $UserWantFirstProject = self::GetUserWantFirstProject();
      
      $countUser = count($UserWantFirstProject);

      if(!is_null($UserWantFirstProject) and !is_null($FirstProject)){
        if(count($UserWantFirstProject) >= count($UserWantFirstProject)){
        
        $Groups = array_chunk($UserWantFirstProject, $countUser,false);
        
        foreach ($Groups as $key => $Group) {
          
           $Team = new Team;
           $value = '';
            
           foreach ($Group as $key => $solo_user) {
                $value .= $solo_user.',';

           }//endforeach
           
           if(self::SearchAboutTeam($value,$FirstProject->id) =='null'){
              
               $Team->members .= $value;
               $calcaluteEndDate = $FirstProject->period + date('d');
               $Team->project_end = date("Y-m-$calcaluteEndDate; h:i:s");
               $Team->project = 1;
               $Team->teamLeader = self::GetTeamLeaderRandom();
               $Team->save();

               $user =User::where('id',self::CurrentUser()->id);
               $user->update(['projects'=>'1','last_project'=>'1']);
               
            }
            
            $NumberOfTasks = intval($FirstProject->tasks);

             if(self::SearchAboutGroup($value) =='null'){
              for($a = 1 ; $a <= 2;$a+=2){
                  foreach ($Group as $key => $user) {
                     $UserProjectTask = new UserProjectTask;
                     $UserProjectTask->id_user = $user;
                     $UserProjectTask->id_task = $key + $a;
                     $UserProjectTask->id_project = 1;
                     $UserProjectTask->belong_group = $value;
                     $UserProjectTask->save();
                  }
                }        
              }//if
                
         }//foreach

        }//if

      }//is nulle
      else{
        echo 'no data recieved';
      }
      

    }//MakeFirstTeamWork
     //5
    public function GetFirstProject(){
      return Project::where('id','1')->get()->first();
    }

    // this function return the sum of degree and sum of the total degree
    //6
    public function GetDegreeOfTasks($id){
      $tasks_user = UserTask::where('id_user',$id)->whereNotNull('degree')->get();
      $sum_of_degree=0 ;
      $sum_of_total =0;
      foreach ($tasks_user as $key => $task) {
        
        $sum_of_degree += $task->degree;
        $sum_of_total += $task->total_degree;
       $level = $sum_of_degree / $sum_of_total * 100;

      return intval($level);
      }


      
    }


     /*  => this to determine the user that has 30 task after has 30 tasks the system 
           will  automatic calcalute the the the level of this person within get the sum of the degree of the all task that he solved it and division it on sum of tataldegree of  depended on the result came from division sum of degree on taota_degree will determine the level if it is excellent of inermediate or entry level 
    */  
           //7
    public function DetermineLevel(){
      $UserCompelteTasks =  self::has30Task();
    
      
      foreach ($UserCompelteTasks as $key => $User) {

          if(self::GetDegreeOfTasks($User->id) >= 70){

            User::where('id',$User->id)->update(['level'=>'1']);

          }
      }//end foreach
    }//DetermineLevel

    /*  this seciaro for get the next project for the team */
    public function GetTeams(){
      $Team = new Team;
      $AllTeams = $Team->all();

       return $AllTeams;
    }//getTeams 

    public function DeterminTeamsWantNewProject(){
        $AllTeams = self::GetTeams();
        foreach ($AllTeams as $key => $Team) {
         if($Team->project_end > date('Y-m-d h:i:s')){
            echo 'not now to get new project ';
         }else{

             $NewProject =  self::GetNewProject($Team->project);
             if(!is_null($NewProject)){
              $AnotherTeam = new Team;
              $calcaluteEndDate = $NewProject->period + date('d');
              $AnotherTeam->project_end = date("Y-m-$calcaluteEndDate; h:i:s");
              $AnotherTeam->project = $NewProject->id;
              $AnotherTeam->members = $Team->members;
              $AnotherTeam->save();
             }
          }
        }// end foreach
    }//DeterminTeamsWantNewProject

    public function GetNewProject($id){
        $NewProject = Project::find($id + 1);
        if(is_null($NewProject)){
          echo 'no yet current Project';
        }else{
          return $NewProject;
        }
    }

// end compenent of assign New Project


/*     
                                        +
                                      ++  ++
                                     +++  +++
                                    +++    +++
                                   +++      +++
                                  ++++++++++++++
                                 ++++++++++++++++
                                +++            +++ 
                               +++              +++
                              +++                +++
*/
// this component of setProperty of team to user

  public function SeTPropertyTeams(){

    $AllTeams = Team::all();

    foreach ($AllTeams as $key => $Team) {
        $Group = explode(',',$Team->members);
        foreach ($Group as $key => $single_user) {
            if($single_user !=''){
              User::where('id',$single_user)->update(['teams'=>$Team->id]);
            }    
        }//foreach

    }//foreach

  }//setPropertyTeams

//end compnenet of setProperty of team to user 
}//class