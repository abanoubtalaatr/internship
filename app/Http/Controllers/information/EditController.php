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
        return view('information.edit');
    	
    }//show 


    // this recevie the new date and update the old date with it
    public function update(Request $request){

        $user = new User;
    	$users= User::find($user->CurrentUser()->id)->update($request->all());
        return view('information.profile');
    	
    	
    }// this function to update the current information
}
