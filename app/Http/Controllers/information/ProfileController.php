<?php

namespace App\Http\Controllers\information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

	//this fucntion to view html page and send the data belong this page
    public function view(){

    	if (Auth::check()){
    		
    		session()->put('user_id', Auth::id());
    		$users = new User;
        	$single_user = $users::find(session()->get('user_id'));
        	return view('information.profile',compact('single_user'));
    	}else if(session()->has('user_id')){
    		$users = new User;
        	$single_user = $users::find(session()->get('user_id'));
        	return view('information.profile',compact('single_user'));
    	}else{
            echo "<script>
                alert('Make Sure  You Have An Account or Log in ');
                window.location.href  = '/';
            </script>";
           
        }
    }// view



} //class 
