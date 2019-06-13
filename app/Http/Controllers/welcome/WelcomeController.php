<?php

namespace App\Http\Controllers\welcome;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;


class WelcomeController extends Controller
{
    public function ar(){
		return view("welcome_ar");
    }//ar
    
    public function en(){
    	return view('welcome_en');
    }//en
}
