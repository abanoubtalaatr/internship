<?php

namespace App\Http\Controllers\report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Report;
use App\TeamLeader;
class ReportController extends Controller
{
	public function CurrentTeamLeader(){
	    $TeamLeader = new TeamLeader;
	    return $TeamLeader->CurrentTeamLeader();
	}//CurrentTeamLeader

   public function viewReport(){

   	     return view('report.report');
   }


   public function sendReport(Request $request){

   	if(!empty($request->name_user) and !empty($request->report)){

	   	 $report = new Report;
	   	 $report->name_of_team_leader = self::CurrentTeamLeader()->first_name . self::CurrentTeamLeader()->last_name;
	   	 $report->name_of_user = $request->name_user;
	   	 $report->report = $request->report;
	   	 $report->save();
	   	 return redirect()->route('viewReport');

   	}//if
   	 

   }//SendReport

}
