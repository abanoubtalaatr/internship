<?php

namespace App;
use App\Http\Traits\tasks;
use Illuminate\Database\Eloquent\Model;
use App\User;


class UserTask extends Model 
{
	 use tasks;

     public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
    }


    protected $primaryKey = 'id_user';


    //This function get row form table UserTask depended on id
    public function SpecialUserTask($id){
    	return $this->where($this->primaryKey,$id)->first();
    }// SpecialUserTask
    
    public function InsertUserTask($idTask , $idUser,$period){

       if(is_null(self::SpecialUserTask($idTask))){
         $this->id_user = $idUser;
         $this->id_task = $idTask;
         $this->start_task = date("Y-m-d h:i:s");
         $end = date('h') + $period;
         $this->End_task =  date("Y-m-d $end:i:s");
         $this->save();

       }
    }//InsertTask  

    public function LastUserTask($idUser){
      return $this->where($this->primaryKey,$idUser)->latest()->first();
    }
    public function IdLastUserTask($idUser){
       return self::LastUserTask($idUser)->id_task;
    }//IdLastUserTask

    /* => check if the user has 30 task or not if true 
          will make some changes in table belong this person 
    */
  

   

   


}//end UserTask
