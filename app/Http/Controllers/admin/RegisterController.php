<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;

class RegisterController extends Controller
{



    protected function show(){
     return view('admin.register');
    }
    
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }
      protected function create(Request $request)
    {
       // store the date come from register form in data base table (user)
        $admin = new Admin;
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->password = $request->password;

        $admin->save();

        //if every thing is ok , will create session named user_id to use it  profile 
        if($admin->save()){  
          session()->put('admin_id',$admin->id);
          return redirect()->route('admin_index');
        }// end if
    
    }// create function 
}
