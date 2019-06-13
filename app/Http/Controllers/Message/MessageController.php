<?php

namespace App\Http\Controllers\Message;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;
use App\User;
class MessageController extends Controller
{
	public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
    }
    public function view(){

    	$messages =self::GetTeamMessage();
            
	    return view('chat.chat',compact('messages'));
    }
    public function SendMessage(Request $request){
    	 if(!is_null($request->message)){

	    	$Message = new Message;

	    	$Message->team = self::CurrentUser()->teams;
	    	$Message->sender = self::CurrentUser()->id;
	    	$Message->name_sender = self::CurrentUser()->first_name ." ".self::CurrentUser()->last_name;
	    	$Message->text = $request->message;
	    	$Message->save();
            $Message_for_team =self::GetTeamMessage();
            
	        return redirect()->route('chat')->with([ 'messages' =>$Message_for_team]);
    	 }else{
    	 	$Message_for_team =self::GetTeamMessage();
            
	        return redirect()->route('chat')->with([ 'messages' =>$Message_for_team]);
    	 }
    }//SendMessage

    public function GetTeamMessage(){
    	return $Message_for_team = Message::where('team',self::CurrentUser()->teams)->get();
    }//GetTeamMessage


}//class











