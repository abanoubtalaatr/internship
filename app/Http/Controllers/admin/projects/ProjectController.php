<?php

namespace App\Http\Controllers\admin\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    protected function show_project_add{
    	return view('admin.tasks.add');
    }// end show_add
    protected function show_project_show (){

    	if(session()->has('admin_show_current_tasks')){
    		return view('admin.tasks.show');
    	}else{
    		$current_tasks = Task::where('id','>=',1)->get();
    		return view('admin.tasks.show',compact('current_tasks'));
    	}
    	
    }// end show show 

    protected function show_project_delete(){
    	if(session()->has('admin_delete_current_tasks')){
    		return view('admin.tasks.delete');
    	}else{

			$current_tasks = Task::where('id','>=',1)->get();
			return view('admin.tasks.delete',compact('current_tasks'));
    	}
    	
    }// end show_delete

    protected function to_project_delete($id){
    	$task = Task::find($id);
        if($task->delete()){

        $current_tasks = Task::where('id','>=',1)->get();
         return redirect()->route( 'show_delete' )->with( [ 'admin_delete_current_tasks' =>$current_tasks ] );
        }

    }// end to_delete

    protected function show_project_edit(){

    	if(session()->has('admin_eidt_current_tasks')){
    		return view('admin.tasks.edit');
    	}else{
			$current_tasks = Task::where('id','>=',1)->get();
			return view('admin.tasks.edit',compact('current_tasks'));
    	}
    }// show_edit
    protected function single_project_edit($id){

    	if(session()->has('admin_single_current_tasks')){
    		return view('admin.tasks.single_edit');
    	}else{
			$task_for_edit = Task::find($id);
    	return view('admin.tasks.single_edit',compact('task_for_edit'));
    	}
    	


    }
    protected function compelete_project_edit(Request $request){
    	$task = Task::where('id',$request->id)->get()->first();
    	$task->title = $request->title;
    	$task->description = $request->description;
    	$task->period = $request->period;
    	if($task->save()){

	    	$current_tasks = Task::where('id','>=',1)->get();

	        return redirect()->route( 'show_edit' )->with( [ 'admin_edit_current_tasks' =>$current_tasks ] );
    	}

    }

    protected function create(Request $request){
       $task = new Task;
       $task->title = $request->title;
       $task->description = $request->description;
       $task->period = $request->period;
       if($task->save()){

       	$current_tasks = Task::where('id','>=',1)->get();

        return redirect()->route( 'show_show' )->with( [ 'admin_show_current_tasks' =>$current_tasks ] );
        
       }
    }// end create
}
