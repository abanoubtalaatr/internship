<?php

namespace App\Http\Controllers\tasks;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class TasksController extends Controller
{
    public function test(){
    	$users = new User;
        $single_user = $users::find(session()->get('user_id'));
    	return view('tasks.tasks',compact('single_user'));
    }
}
