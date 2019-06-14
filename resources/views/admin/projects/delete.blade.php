@extends('admin.layouts.master')
@php 
 use App\Project;
 $AllProject =Project::all();
@endphp

@section('content')
		  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Current Tasks To Delete
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin/tasks/show">Tasks</a></li>
        <li class="active">Delete </li>
      </ol>
    </section>

       
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Tasks In Site</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id Task</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Period</th>
                  <th>Programer</th>
                  <th>Control</th>
                </tr>
                </thead>
                <tbody>
                 @php 
                    

                     	foreach ($AllProject as $key => $value) {
			                 echo "<tr>
			                  <td>$value->id</td>
			                  <td>$value->name</td>
			                  <td>$value->description</td>
			                  <td>$value->period</td>
                        <td>$value->number_of_programmers</td>
			                  <td class='text-center'> <a href= '/admin/projects/delete/$value->id' class='btn btn-danger'> Delete</a></td>
			                </tr>";
                 	   }
                 	
                 @endphp
                </tbody>
                <tfoot>
               
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
   
  </div>
  <!-- /.content-wrapper -->
@endsection