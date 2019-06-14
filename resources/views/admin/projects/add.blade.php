@extends('admin.layouts.master')

@section('content')
   
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<section class="content-header">
      <h1>
         Add New Task
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/tasks">Project</a></li>
        <li class="active">Add</li>
      </ol>
    </section>

  	<form method="POST" action="{{route('CreateProject')}}">
      @csrf
    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Name Of Project </h3>
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
                          style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;font-family: serif;" name="name"></textarea>
            
            </div>
          </div>
    </section>

    <!-- Content Header (Page header) -->
    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Description For This Project
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
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;font-family: serif;" name="description"></textarea>
             
            </div>
          </div>
    </section>


    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Period
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
               	 <option value="10 days">10 days </option>
               	 <option value="15 days">15 days</option>
               	 <option value="20 days">20 days </option>
               	 <option value="25 days">25 days</option>
               	 <option value="30 days">30 days </option>
               	 <option value="35 days">35 days</option>
               	 <option value="40 days">40 days </option>
               	 <option value="45 days">45 days</option>
               	 <option value="50 days">50 days </option>
               	 <option value="60 days">60 days</option>

               </select>
            </div>
          </div>




    <section class="content-header">
          <div class="box">
            <div class="box-header" style="margin-top: 20px; color: black;">
              <h3 class="box-title" style="font-family: serif;">Add Number of Programer
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
                 <option value="4">4 </option>
                 <option value="5">5</option>
                 <option value="6">6 </option>
                 <option value="7">7</option>
                 <option value="8">8 </option>
                 <option value="9">9</option>
                 <option value="10">10 </option>
                 <option value="11">11</option>
                 <option value="12">12</option>
                 <option value="13">13</option>

               </select>
            </div>
          </div>


    </section>
      <section class="content-header text-center">
     	<button class="btn btn-primary" type="submit"> Add New Task</button>
     </section>
  	</form>
  
    <hr>
    <hr>
  </div>
	
@endsection