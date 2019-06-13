<?php

// this route for obtain the form for login 
Route::get('admin/login',"LoginController@show")->name('admin.login');
// this check if the field the admin enter it is correct
Route::post('admin/login',"LoginController@check")->name('admin.login');
// show the form register
Route::get('admin/register','RegisterController@show')->name('admin.register');
//to register new admin in datebase
Route::post('admin/register','RegisterController@create')->name('admin.register');
//show the main page for dashboard
Route::get('admin/index',function(){return view('admin.layouts.index');})->name('admin_index');
//show page add task
Route::get('admin/tasks/add','tasks\TaskController@show_add')->name('add_task');
// store the new task
Route::post('admins/tasks/create','tasks\TaskController@create')->name('create_task');
// route show page show 
Route::get('admin/tasks/show','tasks\TaskController@show_show')->name('show_show');
// show page delete 
Route::get('admin/tasks/delete','tasks\TaskController@show_delete')->name('show_delete');
// to delete 
Route::get('admin/tasks/delete/{id}','tasks\TaskController@to_delete')->name('to_delete');
// to show edit page
Route::get('admin/tasks/edit','tasks\TaskController@show_edit')->name('show_edit');
// to edit single task 
Route::get('admin/tasks/single_edit/{id}','tasks\TaskController@single_edit')->name('single_edit');
// this for compelte the editin of Task
Route::post('admin/tasks/single','tasks\TaskController@compelete_edit')->name('compelete_edit');

// //show page add project
// Route::get('admin/tasks/add','tasks\TaskController@show_add')->name('add_task');
// // store the new task
// Route::post('admins/tasks/create','tasks\TaskController@create')->name('create_task');
// // route show page show 
// Route::get('admin/tasks/show','tasks\TaskController@show_show')->name('show_show');
// // show page delete 
// Route::get('admin/tasks/delete','tasks\TaskController@show_delete')->name('show_delete');
// // to delete 
// Route::get('admin/tasks/delete/{id}','tasks\TaskController@to_delete')->name('to_delete');
// // to show edit page
// Route::get('admin/tasks/edit','tasks\TaskController@show_edit')->name('show_edit');
// // to edit single task 
// Route::get('admin/tasks/single_edit/{id}','tasks\TaskController@single_edit')->name('single_edit');
// // this for compelte the editin of Task
// Route::post('admin/tasks/single','tasks\TaskController@compelete_edit')->name('compelete_edit');
