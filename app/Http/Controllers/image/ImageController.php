<?php

namespace App\Http\Controllers\image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ImageController extends Controller
{
    //
    public function handle(Request $request){

    	 request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
       
        request()->image->move(public_path('images'), $imageName);

		$users = new User;
        $user = $users::find(session()->get('user_id'));
        $user->image = $imageName;
        $user->save();
    }
    public function deleteImage(){

    	$users = new User;
        $user = $users::find(session()->get('user_id'));
        $user->image = 'avatar.jpg';
        $user->save();
        $single_user = $users::find(session()->get('user_id'));
        return view('information.profile',compact('single_user'));

    }
}
