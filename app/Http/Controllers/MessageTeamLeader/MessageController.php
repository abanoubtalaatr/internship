<?php

namespace App\Http\Controllers\MessageTeamLeader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\TeamLeader;

class MessageController extends Controller
{
    public function CurrentTeamLeader(){
        $TeamLeader = new TeamLeader;
        return $TeamLeader->CurrentTeamLeader();
    }//CurrentTeamLeader

    
    public function getMessage($id){
        $Message_for_team = Message::where('team',$id)->get();
       
        if(is_null($Message_for_team)){
           $id = Message::where('team',$id)->get()->first()->team;
        return view('chatTeamLeader.chat',compact('Message_for_team','id')); 
        }else{
             $id = $id;
        return view('chatTeamLeader.chat',compact('Message_for_team','id')); 
        }
        
    }//GetTeamMessage
    public function SetMessageTeamLeader(Request $request,$id){

       if(!is_null($request->message)){

            $Message = new Message;

            $Message->team =$id;
            $Message->sender = self::CurrentTeamLeader()->id;
            $Message->name_sender = 'Leader : '.self::CurrentTeamLeader()->first_name ." ".self::CurrentTeamLeader()->last_name;
            $Message->text = $request->message;
            $Message->save();

            return redirect()->route('GetTeamMessage',['id'=>$id]);
            
            
         }else{

            $Message_for_team =self::getMessage($id);
            
            return redirect()->route('chat')->with([ 'messages' =>$Message_for_team]);
         }
    }

}
