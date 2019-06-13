<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class LoginController extends Controller
{


   protected function show(){
     return view('admin.login');
   }
	 protected function validator(array $data)
    {
        return Validator::make($data, [
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }

    public function check(Request $request){


      if(Admin::where('password', $request->password)->where('email',$request->email)->get()->first()){
      	return view('admin.layouts.index');
      }else{
      	return view('admin.login');
      }
    }

}
