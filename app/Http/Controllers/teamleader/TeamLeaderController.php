<?php

namespace App\Http\Controllers\teamleader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamLeader;

class TeamLeaderController extends Controller
{
    public function viewProfile(){
    	return view("teamleader.profile");
    }
    public function viewloginTeamLeader(){
    	return view('teamleader.login');
    }
    public function loginTeamLeader(Request $request){
        
         
    	$teamleader = TeamLeader::where('email',$request->email)->where('password',$request->password)->get()->first();
      
    	if(!is_null($teamleader)){
            
    		 session()->put('id_teamleader',$teamleader->id);
    		return view('teamleader.profile');
    	}else{
    		return view('teamleader.login');
    	}
    	
    }//loginTeamLeader
}
