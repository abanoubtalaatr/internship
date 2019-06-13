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

Route::get('/job', 'jobCorn\jobCorn@handle')->name('test');
Route::get('/project',"tasks\TasksController@GetLastTask")->name('project');
Route::get('/chat',"Message\MessageController@view")->name('chat');
Route::post('/setMessage',"Message\MessageController@SendMessage")->name('setMessage');
Route::get('/solution','solution\SolutionController@GetSolutionForTasks')->name('solution');
Route::get("/opinion", 'opinion\OpinionController@view')->name('opinions');

// this belong teamleader
Route::get('/teamleaderProfile','teamleader\TeamLeaderController@viewProfile')->name('viewProfile');


Route::get('/viewloginTeamLeader','teamleader\TeamLeaderController@viewloginTeamLeader')->name('viewloginTeamLeader');

Route::post('/loginTeamLeader','teamleader\TeamLeaderController@loginTeamLeader')->name('loginleader');


Route::get('/viewTeamLeaderEdit','teamleader\EditTeamLeaderController@viewTeamLeaderEdit')->name('viewTeamLeaderEdit');

Route::post('/updateTeamLeader','teamleader\EditTeamLeaderController@updateTeamLeader')->name('updateTeamLeader');




//end teamleader

//this belong delete and update image for teamleader
Route::post('/updateImageTeamLeader','teamleader\EditImageTeamLeaderController@updateImageTeamLeader')->name('updateImageTeamLeader');

Route::post('/deleteTeamLeader','teamleader\EditImageTeamLeaderController@deleteImageTeamLeader')->name('deleteImageTeamLeader');
//end delete and update image for teamleader

//chatTeamLeader
Route::get('chatTeamLeader/{id}','MessageTeamLeader\MessageController@getMessage')->name('GetTeamMessage');

Route::post('SetMessage/{id}','MessageTeamLeader\MessageController@SetMessageTeamLeader')->name('SetMessageTeamLeader');

//End ChatTeamLeader


// this belong reports

Route::get('/viewReport','report\ReportController@viewReport')->name('viewReport');
Route::post('/sendReport','report\ReportController@sendReport')->name('sendReport');
//end reports

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
    Route::get('/profile/{name}', "information\ProfileController@view")->name('profile');
    
});

// get the task you should solve it now 

Route::get('tasks',"tasks\TasksController@GetLastTask")->name('tasks');

Route::get('tasks/FirstTask',"tasks\TasksController@GetFirstTask")->name('FirstTask');

Route::post('upload_solution','tasks\task_soluation@handle')->name('upload_solution');
Route::post('NewTask',"tasks\TasksController@GetNewTask")->name('NewTask');



// this route for show page of edit profile 
Route::get("/profile//edit",'information\EditController@show')->name('edit_profile');
// this route for update the edit
Route::post('/profile/update','information\EditController@update')->name('update_profile');

// this route for get image path and handle it 
Route::post('/image/update','image\ImageController@update')->name('update');
// this route for delete the image and reset it to default 
Route::post('delete','image\ImageController@deleteImage')->name('delete_image');


