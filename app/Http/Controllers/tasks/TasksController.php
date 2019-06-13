<?php

namespace App\Http\Controllers\tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\tasks;
use App\User;
use App\Task;
use App\UserTask;
use App\UserProjectTask;
use App\ProjectTask;
use App\Project;

class TasksController extends Controller
{   
    use tasks;
    // this to get the current user in site
    public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
    }

    // this function get get the task that belong the current project the user suppose work on it and return the ids of this task to use to get all details about this tasks from table ProjectTasks ;
    public function GetTasksBelongCurrentProject($id){
        $Tasks_of_Project = UserProjectTask::where('id_user',self::CurrentUser()->id)
        ->where('id_project',$id)->get();
        $id_of_tasks = [];
        foreach ($Tasks_of_Project as $key => $Task) {
          array_push($id_of_tasks, $Task->id_task);
        }
        return $id_of_tasks;
    }
    // this for get the tasks that belog to this id of project
    public function GetDataOfTasksProject($id,$id_task){
      $Tasks_of_Project = ProjectTask::where('id_project',$id)->where('id_task',$id_task)->get();
      return $Tasks_of_Project;
    }
    public function GetUserProjectTasks(){
        $tasks = UserProjectTask::where('id_user',self::CurrentUser()->id)->get();
        $ids = [];
        foreach ($tasks as $key => $task) {
            array_push($ids,$task->id_task);
        }
        return $ids;
    }
    public function GetLastTask(){
      // this for get the last task the user has recieve it
      $UserTask = UserTask::where('id_user',self::CurrentUser()->id)->orderBy('created_at', 'desc')->get()->first();


      // this if mean the current user has project already this mean not show to him the level of tasks
      
      if(!is_null(self::CurrentUser()->last_project)){
         $ids = self::GetUserProjectTasks();
         
        
         $TasksProject=self::GetDataOfTasksProject(self::CurrentUser()->last_project,$ids);
        
          


         $Project = Project::find(self::CurrentUser()->last_project);
         
         return view('tasks.tasks',compact('TasksProject','Project'));    
      }
      //this else if the user no have any project check if this last task have degree or not if not will show to the user to compelete the task else show message you will recieve the next task in tomorrow
      else{
        
        if(!is_null($UserTask)){
             if(!is_null($UserTask->degree)){
                $NewTask = 'NewTask';
                return view('tasks.tasks',compact('NewTask')); 
             }else{
               $Task = Task::find($UserTask->id_task);
               return view('tasks.tasks',compact('Task','UserTask')); 
             }
             
          }else{
             $NewTask = 'NewTask';
             return view('tasks.tasks',compact('NewTask')); 
          }   
      } 
     
    }//GetLastTask

    // public function check(){

    //     if(self::FirstVisit(new User,new UserTask) == 'true'){

    //         $FirstTime = 'is the First Time Here in Site ';
    //         return view('tasks.tasks',compact('FirstTime'));

    //     }elseif(self::CurrentTask()=='false'){
    //          $NewTask = 'NewTask';
    //          return view('tasks.tasks',compact('NewTask'));

            
    //    }elseif(self::CurrentTask()){
    //         $task = new Task;
    //         $Task = $task->SpecialTask(self::CurrentTask()->id_task);
            
    //         $UserTask = self::CurrentTask();

    //         return view('tasks.tasks',compact('Task','UserTask'));
    //    }else{
    //     echo "<script>
    //             alert('Make Sure  You Have An Account or Log in ');
    //             window.location.href  = '/';
    //         </script>";
    //    }
       
    // }// check

    // /*
    //  => this function to check if the  user have the first time to press the tab of tasks
    //     if the fisrt time the systme will automatic get the first task form table task and show it to him in blade tasks......
    //     in this function will use instance form User class , UserTask and id for this person 
    //     and will use function SpecialUserTask  that existing in class UserTask that check if the user recieve before any tasks or not  > and will use function User
    //     that bring the current user depend on (login or register) mean id

    //     +++ the main reason for this function to show button getFirstTask +++  

    // */
    // private function FirstVisit($User,$UserTask){

    //  if(is_null($UserTask->SpecialUserTask(self::CurrentUser()->id))){
    //     return 'true';
    //   }else{
    //     return 'false';
    //   }

    // }// FirstVisit

    // // this function to get the special Task your limit it and then insert it in database table UserTask
    // public function GetFirstTask(UserTask $User_Task,Task $task){
    //     // this to get the spcial task that identfiy using id
    //     $Task = $task->SpecialTask(1);
    //     // this to store the task that have alreay fetch it from data base from table Task
    //     $User_Task->InsertUserTask($Task->id,self::CurrentUser()->id,$Task->period);
    //     $UserTask = $User_Task->SpecialUserTask($Task->id);
    //    return view('tasks.tasks',compact('Task','UserTask')); 

    // }//GetTask

    // public function GetNewTask(UserTask $User_Task,Task $task){
    //   // get the last task the user recieve it 
    //   $last_user_task = $this->Last($User_Task,'id_user',self::CurrentUser()->id);

    //   // this mean ensure the user have task before 
    //   if(!is_null($last_user_task)){
    //       $count_Tasks = $task::where('id','>=',1)->get();
    //          // get the next Task form table Task
    //       $Task = $task->SpecialTask($last_user_task->id_task + 1);

    //       //this mean the next task is exisiting in table Task 
    //       if(!is_null($Task) and $Task->id <= count($count_Tasks)){
    //             // this to store the task into UserTask that have alreay fetch it from data base from table Task
    //          $User_Task->InsertUserTask($Task->id,self::CurrentUser()->id,$Task->period);
    //          $UserTask = $last_user_task;
            
    //          return view('tasks.tasks',compact('Task','UserTask'));
    //       }else{
    //         echo 'in this time not avalible task for you ';
    //       }
         
    //   }else{
    //     echo 'oops some thing is wrong try again later';
    //   }
          
    // }//GetNewTask

    // public function CurrentTask(){

    //  $last_task = $this->Last(new UserTask,'id_user',self::CurrentUser()->id);

    //  if(is_null($last_task->degree)){
    //     return $last_task;
    //  }else{
    //     return 'false';
    //  }

    //  }//CurrentTask

}//end class
