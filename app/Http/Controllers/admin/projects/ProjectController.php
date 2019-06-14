<?php

namespace App\Http\Controllers\admin\projects;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Project;
class ProjectController extends Controller
{
    protected function ShowAdd(){
    	return view('admin.projects.add');
    }// end show_add


    

    protected function CreateProject (Request $request){

        if(!empty($request->name) and !empty($request->description) and !empty($request->period) ){
            $project = new Project;
            $project->name = $request->name;
            $project->description = $request->description;
            $project->period = $request->period;
            $project->number_of_programmers = $request->programer;

            if( $project->save() ){
                return redirect()->route('ShowProject');
            }

        }
    	
    }// end show show 

    public function ShowProject(){
        return view('admin.projects.show');
    }

    public function ShowEdit(){
        return view('admin.projects.edit');
    }

    public function ShowSingleEdit($id){

        $project = Project::find($id);
        return view("admin.projects.single_edit",compact('project'));


    }

    public function SaveEdit (Request $request){
       
        $project =Project::find($request->id)->update(
            [
             'name'=>$request->name,
             'description'=>$request->description,
             'number_of_programmers'=>$request->programer]);

        return redirect()->route('ShowEdit');
    }

    public function ShowDelete(){
        return view("admin.projects.delete");
    }

    public function DeleteProject($id){
        
        $project = Project::find($id)->delete();
        return redirect()->route('ShowDelete');
    }//



}
