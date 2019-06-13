<?php

namespace App\Http\Controllers\image;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ImageController extends Controller
{
    //
    public function CurrentUser(){
        $User = new User;
        return $User->CurrentUser();
    }

    public function update(Request $request){

    	 request()->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        $user = User::where('id',self::CurrentUser()->id)->update(['image'=>$imageName]);
        
    }
    public function deleteImage(){

    	$user = User::where('id',self::CurrentUser()->id)->update(['image'=>'avatar.jpg']);
  
        return view('information.profile');

    }
}
