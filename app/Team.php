<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;
use App\TeamLeader;

class Team extends Model
{
	public function Project(){
		return new Project;
	}
    public function CheckProject(){

    }
   public function CurrentTeamLeader(){
        $TeamLeader = new TeamLeader;
        return $TeamLeader->CurrentTeamLeader();
    }

    public function GetTeamsWhereTeamLeaderIsleaderofThem(){
    	$teams = $this->where('teamLeader',self::CurrentTeamLeader()->id)->get();
    	return $teams;
    }//GetGroupWhereTeamLeaderIsleaderofThem
}
