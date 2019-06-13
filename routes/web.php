<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Route::get('/lang/{lang}',function($lang){
	        	

// 		if(in_array($lang ,['ar','en'])){

// 			if(auth()->user()){
// 				 $user = auth()->user();
// 				 $user->lang = $lang;
// 				 $user->save();
// 			}else{
// 				if(session()->has('lang'))
// 				{
// 				  session()->forget('lang');
// 				}
// 				 session()->put('lang',$lang);
// 			}

// 			}
			   
// 		//end if 
// 		else{

// 			if(auth()->user()){
// 			    $user = auth()->user();
// 			    $user->lang = 'en';
// 			    $user->save();
// 		    }
// 		    else{
// 		    	 if(session()->has('lang')){
// 				 	session()->forget('lang');
// 		         }
// 		       session()->put('lang','en');

// 		    }
// 		}
	
		 
    
// });



Route::get('/', function(){
	return view('layouts.welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/register', 'Auth\RegisterController@create')->name('register');



//profile route
Route::name('information.')->group(function () {
    Route::get('profile', "information\ProfileController@view")->name('profile');
});

Route::get('tasks',"tasks\TasksController@test")->name('tasks');

// this route for show page of edit profile 
Route::get('/profile/edit','information\EditController@show')->name('edit_profile');
// this route for update the edit
Route::post('/profile/update','information\EditController@update')->name('update_profile');

// this route for get image path and handle it 
Route::post('image','image\ImageController@handle')->name('handle_image');
// this route for delete the image and reset it to default 
Route::post('delete','image\ImageController@deleteImage')->name('delete_image');


