<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Task;
use App\UserTask;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {         
        $users = new User;
        $user_task = new UserTask;
        $single_user = $users::find(session()->get('user_id'));
        $global_task = new Task; 

        $last_task = $user_task;
        $id_of_last_task = $last_task->id_task;
        $information_of_last_task =  $global_task::find($id_of_last_task);  
         $single_user = $users::find(session()->get('user_id'));
        return view('information.profile',compact('single_user','last_task','information_of_last_task'));
        
    }
}
