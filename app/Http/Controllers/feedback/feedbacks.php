<?php

namespace App\Http\Controllers\feedback;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FeedBack;
class feedbacks extends Controller
{
   public function view(){
   	return view("feedback.feedback");
   }//view

   // this function to send the feedback to database 
   public function SetFeedBack(Request $request){
   	var_dump($request->feedback);
   	  if(!empty($request->feedback)){

   	  	$feedback = new FeedBack;
   	  	$feedback->feedback = $request->feedback;
   	  
	   	  if( $feedback->save()){
	   	  	$success = 'success';
	   	  	return redirect()->route('feedback')->with(['message'=>'success']);
	   	  }

   	  	
   	  }
   }//SetFeedBack


}
