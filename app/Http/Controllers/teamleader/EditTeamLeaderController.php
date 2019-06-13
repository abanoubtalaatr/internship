<?php

namespace App\Http\Controllers\teamleader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamLeader;
class EditTeamLeaderController extends Controller
{
    public function CurrentTeamLeader(){
        $TeamLeader = new TeamLeader;
        return $TeamLeader->CurrentTeamLeader();
    }
    // this function to show page edit and send the information that would to update or edit
    public function viewTeamLeaderEdit(){
    	
        return view('teamleader.edit');
    	
    }//show 


    // this recevie the new date and update the old date with it
    public function updateTeamLeader(Request $request){

        $user = new TeamLeader;
    	$users= TeamLeader::find(self::CurrentTeamLeader()->id)->update($request->all());
        return view('teamleader.profile');
    	
    	
    }// this function to update the current information

}
