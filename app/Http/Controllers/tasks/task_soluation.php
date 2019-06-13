<?php

namespace App\Http\Controllers\tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\tasks;

use App\User;
use App\UserTask;
use App\Task;

class task_soluation extends Controller
{
   use tasks;
   public $checker1 = false;
   public $checker2 = false;
   public $real_degree; 
   public $real_total_degree ;
   public $your_notes;

public function handle(){
        
    if(isset($_POST)){

        $User = new User;
        $Task_of_User = new UserTask;

        $Task = Task::find($_POST['task_number']);
        $UserTask = $Task_of_User->SpecialUserTask($this->CurrentUser()->id);
      
       $fileName = "task_".$_POST['id']."_".$_POST['task_number'].'.'.request()->file->getClientOriginalExtension();


       request()->file->move(public_path('task'), $fileName); 

       self::correct_this($_POST['task_number'],$_POST['id'],date("Y-m-d h:i:sa"));

        
       if($this->checker1 == false and $this->checker2 ==false ){
          $your_degree = $this->real_degree;
          $total_degree = $this->real_total_degree;
          $notes = $this->your_notes;
          $NoError = 'NoError';
          return view('tasks.tasks',compact('NoError','your_degree','total_degree','notes'));
        
        }elseif($this->checker1 == true && $this->checker2 == true){
        $error1 = 'name of class';
        $error2 = 'name of function';
       
        return view('tasks.tasks',compact('Task','UserTask','error1','error2'));
       }else if($this->checker2 == true){
        $error2 = "name of function";
        return view('tasks.tasks',compact('Task','UserTask','error2'));
       

       }else if($this->checker1 ==true){
        $error1 = "name of your class";
        return view('tasks.tasks',compact('Task','UserTask','error1'));
        
       }else{
       
       }
       
    }//isset $_Post
    
}// End function handle 



public function correct_this($task_number , $id,$date_of_receive_task){

    $User = new User;
    $task_name = "task_" .$id.'_'.$task_number . ".php";
    $path_file = public_path('task\\'). $task_name;
 
    $receive = UserTask::where('id_user',$User->CurrentUser()->id)->where('id_task',$task_number)->update(['delivery' => $date_of_receive_task] );

    if($task_number == 1)
    { 

      $degree = $this->task_1_correction($task_name);

      $user_degree = $degree[0];
      $total_degree = $degree[1];
      $error = $degree[2];
       
       if(!is_null($degree)){
            $this->real_degree = $user_degree;
            $this->real_total_degree = $total_degree;
          $update_task_with_new_value = UserTask::find($receive);
          
            $notes = "[";
            for($i=0;$i<count($error);$i++)
            {
                $notes .= "(" .$error[$i] . ") , ";
            }
            $notes .= "]";
            $this->your_notes = $notes;
        if($update_task_with_new_value->delivery > $update_task_with_new_value->End_task ){
            
                   $newValue = UserTask::where('id_user',$User->CurrentUser()->id)->where('id_task',$task_number)->update(['degree'=> 1,'notes' => $notes,'total_degree'=>$total_degree]); 
        }else{
            $newValue = UserTask::where('id_user',$User->CurrentUser()->id)->where('id_task',$task_number)->update(['degree'=>$user_degree,'notes'=> $notes,'total_degree'=>$total_degree]); 
        }
    }// is not null 

  }//task_number 1
        else if($task_number == 2){
           
           $degree = $this->task_2_correction($task_name);
           
           $user_degree = $degree[0];
           $total_degree = $degree[1];
           $error = $degree[2];

          
           if(!is_null($degree)){
            $this->real_degree = $user_degree;
            $this->real_total_degree = $total_degree;
            $update_task_with_new_value = UserTask::find($receive);           
            $notes = "[";
            for($i=0;$i<count($error);$i++)
            {
                $notes .= "(" .$error[$i] . ") , ";
            }
            $notes .= "]";
            $this->your_notes = $notes;
              if($update_task_with_new_value->delivery > $update_task_with_new_value->End_task ){

                    $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=> 1,'notes' => $notes,'total_degree'=>$total_degree]); 
                }else{
                     $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=>$user_degree,'notes'=> $notes,'total_degree'=>$total_degree]); 
                }
           }
        }// 2
        else if($task_number == 3)
        {
           $degree = $this->task_3_correction($task_name);
           
           $user_degree = $degree[0];
           $total_degree = $degree[1];
           $error = $degree[2];
           if(!is_null($degree)){
                $this->real_degree = $user_degree;
               $this->real_total_degree = $total_degree;
                $update_task_with_new_value = UserTask::find($receive);           
                $notes = "[";
                for($i=0;$i<count($error);$i++)
                {
                    $notes .= "(" .$error[$i] . ") , ";
                }
                $notes .= "]";
                $this->your_notes = $notes;
                  if($update_task_with_new_value->delivery > $update_task_with_new_value->End_task ){

                    $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=> 1,'notes' => $notes,'total_degree'=>$total_degree]); 
                }else{
                     $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=>$user_degree,'notes'=> $notes,'total_degree'=>$total_degree]); 
                }
           }
         
        }// task_number 3
        else if($task_number == 4)
        {
           $degree = $this->task_4_correction($task_name);
           
           $user_degree = $degree[0];
           $total_degree = $degree[1];
           $error = $degree[2];
           if(!is_null($degree)){
            $this->real_degree = $user_degree;
           $this->real_total_degree = $total_degree;
             $update_task_with_new_value = UserTask::find($receive);           
            $notes = "[";
            for($i=0;$i<count($error);$i++)
            {
                $notes .= "(" .$error[$i] . ") , ";
            }
            $notes .= "]";
            $this->your_notes = $notes;
             if($update_task_with_new_value->delivery > $update_task_with_new_value->End_task ){

                    $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=> 1,'notes' => $notes,'total_degree'=>$total_degree]); 
                }else{
                     $newValue = UserTask::where('id_user', session()->get('user_id'))->where('id_task',$task_number)->update(['degree'=>$user_degree,'notes'=> $notes,'total_degree'=>$total_degree]); 
                }
           }// if check_nulb
        }// else if task_number 4
    }// function correct this 


    // start task_1_correction
    private function task_1_correction($task_name)
    {
       
       require_once public_path('task\\') . $task_name;
       $newValue_of_task = explode('.',$task_name);
       
     if(class_exists($newValue_of_task[0])){
        $task = new $newValue_of_task[0];
        if(session()->has('error_class')){
            session()->forget('error_class');
          }
          if(method_exists($newValue_of_task[0], 'check_name')){

        $wrong = array();
        $wrong[0] = "";
        $wrong[1] = "al";
        $wrong[2] = "asdryuimngyuioplkjhgd";
        $wrong[3] = "bassem55";
        $wrong[4] = "bassem reda";
        $wrong[5] = "<script>anything</script>";
        $correct = array();
        $correct[0] = "abanoub";
        $correct[1] = "ali";
        $correct[2] = "bassem";

        $notes = array();

        $counter = 0;

        $degree = 0;

        for($i=0;$i<count($wrong);$i++)
        {
            if($task->check_name($wrong[$i]) === "wrong")
            {
                $degree++;
            }
            else if($task->check_name($wrong[$i]) === "correct")
            {
                $notes[$counter] = $wrong[$i];
                $counter++;
            }   
        }

        for($i=0;$i<count($correct);$i++)
        {
            if($task->check_name($correct[$i]) === "correct")
            {
                $degree++;
            }
            else if($task->check_name($correct[$i]) === "wrong")
            {
                $notes[$counter] = $wrong[$i];
                $counter++;
            }
        }

        $arr = array();
        $arr[0] = $degree;//degree
        $arr[1] = count($wrong) + count($correct);//total degree 
        $arr[2] = $notes;
        return $arr;


          }else{
             $this->checker2 = true;
             session()->put('error_function','error_function');
             unlink(public_path('task\\') . $task_name);
          }

        }else{
            $this->checker1 = true;
            session()->put('error_class','error_class');
            unlink(public_path('task\\') . $task_name);
        }
       
       
    }// End task_1_correction

    // Start task_2_correction

      private function task_2_correction($task_name)
    {

        
       require_once public_path('task\\') . $task_name;
       $newValue_of_task = explode('.',$task_name);

       if(class_exists($newValue_of_task[0])){

         if(session()->has('error_class')){
            session()->forget('error_class');
          }

           if(method_exists($newValue_of_task[0], 'check_phonenumber')){
             if(session()->has('error_function')){
                session()->forget('error_function');
             }
            $task = new $newValue_of_task[0];
            $wrong = array();
            $wrong[0] = "0120287465";//10 
            $wrong[1] = "012028736166";//12
            $wrong[2] = "012012";//6
            $wrong[3] = "01302873616";//12 but start with 013
            $wrong[4] = "01702873616";//12 but start with 017
            $wrong[5] = "012e45mu576";//12 but contain characters
            $correct = array();
            $correct[0] = "01201873616";
            $correct[1] = "01102764837";
            $correct[2] = "01098237673";
           
            $degree = 0;
            $notes = array();
            $counter = 0;
            $degree = 0;
            for($i=0;$i<count($wrong);$i++)
            {
                if($task->check_phonenumber($wrong[$i]) == "wrong")
                {
                    $degree++;
                }
                else if($task->check_phonenumber($wrong[$i]) == "correct")
                {
                    $notes[$counter] = $wrong[$i];
                    $counter++;
                }   
            }
            for($i=0;$i<count($correct);$i++)
            {
                if($task->check_phonenumber($correct[$i]) == "correct")
                {
                    $degree++;
                }
                else if($task->check_phonenumber($correct[$i]) == "wrong")
                {
                    $notes[$counter] = $wrong[$i];
                    $counter++;
                }
            }
            $arr = array();
            $arr[0] = $degree;//degree
            $arr[1] = count($wrong) + count($correct);//total degree 
            $arr[2] = $notes;
            return $arr;
           }else{

            $this->checker2 = true;
             session()->put('error_function','error_function');
             unlink(public_path('task\\') . $task_name);
           }
           
       }else{
           $this->checker1 = true;
           session()->put('error_class','error_class');
           unlink(public_path('task\\') . $task_name);
       }//if class is exist or not
         
    }
    //End task_2_correction

    //Start task_3_correction

private function task_3_correction($task_name)
{
require_once public_path('task\\') . $task_name;
$newValue_of_task = explode('.',$task_name);

    if(class_exists($newValue_of_task[0])){
    $task = new $newValue_of_task[0];
    if(session()->has('error_class')){
        session()->forget('error_class');
      }
        if(method_exists($newValue_of_task[0], 'check_email')){
             if(session()->has('error_function')){
                session()->forget('error_function');
             }
        $wrong = array();
        $wrong[0] = "";//empty
        $wrong[1] = "bassem reda@gmail.com";//space
        $wrong[2] = "bassemreda@anything.com";//not gmail or yahoo
        $wrong[3] = "bassem#gmail.com";//# not @
        $wrong[4] = "bassem@gmail.com@gmail.com";//@gmail.com written two times
        $wrong[5] = "bassem@gmailcom";
        $correct = array();
        $correct[0] = "bassemreda55@gmail.com";
        $correct[1] = "abanoub@yahoo.com";
        $correct[2] = "bassem@yahoo.com";
        $notes = array();
        $counter = 0;
        $degree = 0;
        for($i=0;$i<count($wrong);$i++)
        {
            if($task->check_email($wrong[$i]) == "wrong")
            {
                $degree++;
            }
            else if($task->check_email($wrong[$i]) == "correct")
            {
                $notes[$counter] = $wrong[$i];
                $counter++;
            }   
        }
        for($i=0;$i<count($correct);$i++)
        {
            if($task->check_email($correct[$i]) == "correct")
            {
                $degree++;
            }
            else if($task->check_email($correct[$i]) == "wrong")
            {
                $notes[$counter] = $wrong[$i];
                $counter++;
            }
        }
        $arr = array();
        $arr[0] = $degree;//degree
        $arr[1] = count($wrong) + count($correct);//total degree 
        $arr[2] = $notes;
        return $arr;
        }else{
             $this->checker2 = true;
             session()->put('error_function','error_function');
             unlink(public_path('task\\') . $task_name);
        }
    }else{
       $this->checker1 = true;
       session()->put('error_class','error_class');
       unlink(public_path('task\\') . $task_name);
    }
    
}
//End task_3_correction

 // Start_4_correction
private function task_4_correction($task_name)
{
    require_once public_path('task\\') . $task_name;
    $newValue_of_task = explode('.',$task_name);
    if(class_exists($newValue_of_task[0])){
      $task = new $newValue_of_task[0];
      if(session()->has('error_class')){
        session()->forget('error_class');
      }
      if(method_exists($newValue_of_task[0],'signup' )){
        if(session()->has('error_function')){
                session()->forget('error_function');
             }
            $correct_name = array();
            $correct_name[0] = "abanoub";
            $correct_name[1] = "ali";
            $correct_name[2] = "kero";
            $correct_name[3] = "bassem";
            $correct_name[4] = "namewithoutspace";
            $correct_name[5] = "namewithouttag";
            $correct_email = array();
            $correct_email[0] = "bassemreda55@gmail.com";
            $correct_email[1] = "abanoub@yahoo.com";
            $correct_email[2] = "bassem@yahoo.com";
            $correct_email[3] = "abanoub@gmail.com";
            $correct_email[4] = "kero@yahoo.com";
            $correct_email[5] = "marco@gmail.com";
            $correct_password = array();
            $correct_password[0] = "bassem12";
            $correct_password[1] = "bassem12345";
            $correct_password[2] = "<bassemreda55>";
            $correct_password[3] = "<script>bassem55</scropt>";
            $correct_password[4] = "1234bassem34";
            $correct_password[5] = "abanoub<>s55";
            $wrong_name = array();
            $wrong_name[0] = "";
            $wrong_name[1] = "al";
            $wrong_name[2] = "asdryuimngyuioplkjhgd";
            $wrong_name[3] = "bassem55";
            $wrong_name[4] = "bassem reda";
            $wrong_name[5] = "<script>anything</script>";
            $wrong_email = array();
            $wrong_email[0] = "";//empty
            $wrong_email[1] = "bassem reda@gmail.com";//space
            $wrong_email[2] = "bassemreda@anything.com";//not gmail or yahoo
            $wrong_email[3] = "bassem#gmail.com";//# not @
            $wrong_email[4] = "bassem@gmail.com@gmail.com";//@gmail.com written two times
            $wrong_email[5] = "bassem@gmailcom";
            $wrong_password = array();
            $wrong_password[0] = "12345678";//do not have char
            $wrong_password[1] = "basemreda";//do not have a number
            $wrong_password[2] = "bassem5";//7 digit
            $wrong_password[3] = "";
            $wrong_password[4] = "marco";
            $wrong_password[5] = "<><><>";
            $degree = 0;
            for($i=0;$i<count($wrong_email);$i++)
            {
                $result_correct = $task->signup($correct_name[$i] , $correct_name[$i] , $correct_email[$i] , $correct_password[$i]);
                $result_wrong   = $task->signup($wrong_name[$i] , $wrong_name[$i] , $wrong_email[$i] , $wrong_password[$i]);
                $notes = array();
                $counter = 0;
                if($result_wrong == "wrong")
                {
                    $degree++;
                }
                else
                {
                    $notes[$counter] =  "(".$wrong_name[$i]." , ".$wrong_name[$i]." , ".$wrong_email[$i]."  , ".$wrong_password[$i].")";
                    $counter++;
                }
                if($result_correct == "correct")
                {
                    $degree++;
                }
                else if($result_correct == "wrong")
                {
                    $notes[$counter] =  "(".$correct_name[$i]." , ".$correct_name[$i]." , ".$correct_email[$i]."  , ".$correct_password[$i].")";
                    $counter++;
                }
                
            }
            $arr = array();
            $arr[0] = $degree;//degree
            $arr[1] = count($wrong) + count($correct);//total degree 
            $arr[2] = $notes;
            return $arr;

          }else{
             $this->checker2 = true;
             session()->put('error_function','error_function');
             unlink(public_path('task\\') . $task_name);
          }

    }else{
        $this->checker1 = true;
       session()->put('error_class','error_class');
       unlink(public_path('task\\') . $task_name);
    }
}//End_4_correction
    
}// end calss