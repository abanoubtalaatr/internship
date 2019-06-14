@extends('admin.layouts.master')

@section('content')
   
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
      <h1>
         Edit
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/tasks">Project</a></li>
        <li class="active">Edit</li>
      </ol>
    </section>
    @if(isset($project))
    
  	<form method="POST" action=" {{route('SaveEdit')}}">
      @csrf
      <input type="hidden" name="id" value="{{$project->id}}">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Title </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;font-family: serif;" name="name">{{$project->name}}</textarea>
            
            </div>
          </div>
    </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Description For This Task
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
             
                <textarea class="textarea" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;font-family: serif;" name="description">{{$project->description}}</textarea>
             
            </div>
          </div>
    </section>

    
    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Edit Number Programer
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
               <select class="form-control" name="programer">
                 <option>{{$project->number_of_programmers}}</option>
                 <option value="4">4 </option>
                 <option value="5">5</option>
                 <option value="6">6 </option>
                 <option value="7">7</option>
                 <option value="8">8 </option>
                 <option value="9">9</option>
                 <option value="10">10 </option>
                 <option value="11">11</option>
                 <option value="12">12 </option>
                 <option value="13">13</option>

               </select>
            </div>
          </div>

    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Edit Period
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
               <select class="form-control" name="period">
               	 <option>{{$project->period}}</option>
               	 <option value="1">1 hour </option>
               	 <option value="2">2 hours</option>
               	 <option value="3">3 hours </option>
               	 <option value="4">4 hours</option>
               	 <option value="5">5 hours </option>
               	 <option value="6">6 hours</option>
               	 <option value="7">7 hours </option>
               	 <option value="8">8 hours</option>
               	 <option value="9">9 hours </option>
               	 <option value="10">10 hours</option>

               </select>
            </div>
          </div>
    </section>
      <section class="content-header text-center">
     	<button class="btn btn-primary" type="submit"> Edit Task</button>
     </section>
  	</form>

    @endif
  
    <hr>
    <hr>
  </div>
	
@endsection