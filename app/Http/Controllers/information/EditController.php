<?php

namespace App\Http\Controllers\information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class EditController extends Controller
{

	// this function to show page edit and send the information that would to update or edit
    public function show(){
    	$users = new User;
        $single_user = $users::find(session()->get('user_id'));
        return view('information.edit',compact('single_user'));
    	
    }//show 


    // this recevie the new date and update the old date with it
    public function update(Request $request){

    	
    	$users= User::find(session()->get('user_id'))->update($request->all());
    	
    	return redirect('/profile');
    	
    	
    }// this function to update the current information
}
