<?php

namespace App\Http\Controllers\information;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{

	//this fucntion to view html page and send the data belong this page
    public function view($name){

        // this to check the current url is correct is login to site now
         $current = explode('.', $name);
         if(count($current) == 3){
            $current_id = $current[2];
        }else{
            $current = null;
        }
         
        // check if come from login or register
        // if login use auth:check else from register
    	if (Auth::check() OR session()->has('user_id')){
    		$users = new User;
            $single_user ;
            if(Auth::check()){
                $single_user = $users::find(Auth::id());
            }elseif (session()->get('user_id')) {
               
               $single_user = $users::find(session()->get('user_id'));
            }
            // check if current url not null and the id that exist in url is equal to the id of user that have register or login immediatly
            if( $current !=null and $current_id == $single_user->id ) {
                return view("information.profile",compact('single_user'));
            }else{
                abort(404, 'Something went wrong');
            }	

    	}else{
            echo "<script>
                alert('Make Sure  You Have An Account or Log in ');
                window.location.href  = '/';
            </script>";
           
        }
    }// view



} //class 
