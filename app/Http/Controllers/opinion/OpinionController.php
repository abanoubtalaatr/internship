<?php

namespace App\Http\Controllers\opinion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpinionController extends Controller
{
   public function view(){
   	return view("opinion.opinion");
   }
}
