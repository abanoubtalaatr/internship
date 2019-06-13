<?php

namespace App\Http\Controllers\teamleader;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TeamLeader;
class EditImageTeamLeaderController extends Controller
{
	public function CurrentTeamLeader(){
        $TeamLeader = new TeamLeader;
        return $TeamLeader->CurrentTeamLeader();
    }

	public function updateImageTeamLeader(){
    	 request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $user = TeamLeader::where('id',self::CurrentTeamLeader()->id)->update(['image'=>$imageName]);
        return redirect()->route('viewProfile');
    }

    public function deleteImageTeamLeader(){
    	$user = TeamLeader::where('id',self::CurrentTeamLeader()->id)->update(['image'=>'avatar.jpg']);
  
        return redirect()->route('viewProfile');

    }
}
