
@extends('layouts.belong_user')
@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();
@endphp
{{-- Start title section --}}
@section('title')
    Tasks
@stop {{-- title --}}

{{-- Start style section  --}} 
@section('style')

@if(App::isLocale('en'))
      <link rel="stylesheet" type="text/css" href="{{asset('css/tasks/tasks_left.css')}}">
    @endif
    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/tasks/tasks_right.css')}}">
    @endif
@stop {{-- style section --}}
<!-- start of container  --> 
@section('content')

<div class="container">
<!-- Start content -->
<div class="content col-md-12">	
   <!-- Start tasks -->   
	<div class="tasks col-md-12">
		
		<div class="task">

		 @if(isset($Task) and !empty($Task) and isset($UserTask) and !empty($UserTask))
		 <h3>Tasks</h3>
		 <hr style="color:black !important">
			@if(isset($error1) && isset($error2))
			
				<div class="alert alert-danger col-md-12"> Check your class name And the Name of Function And Upload again the file After Eidting</div>
			
			@endif

			
			@if(isset($error2))
				<div class="alert alert-danger col-md-12"> Check Function Name Upload again the file After Eidting</div>
			@endif
			@if(isset($error1))
				<div class="alert alert-danger col-md-12"> Check your class Name Upload again the file After Eidting</div>
			@endif
			
			<div class="row">

				<div class="description col-md-12">

					<span style="display: block">{{$Task->title}}</span>
					<h5 class="pl-md-4 pt-md-3"> Class Name is : task_{{$CurrentUser->id}}_{{$Task->id}}</h5>
					<p>{{$Task->description}} </p>
					
				</div>
				
				<div class="row-2" style="width: 100%;">
					<form method="POST" enctype="multipart/form-data" action="{{route('upload_solution')}}">
						 @csrf
					    <button class="btn btn-primary">

				    	<input type="file" name="file" id ='file' onchange = "loadFile(event)">
						<input type="hidden" name="task_number" value="{{$Task->id}}">
						<input type="hidden" name="id" value="{{$CurrentUser->id}}">
				    	<span>Upload Task</span>
				    	<input type="hidden" name="te" value="test">

				    	<button class="btn btn-primary" type="submit" style="float: right;color: white;line-height: 1.5;"> Send Task</button>
					</form>
					
			     </div>

				<div class="row-2">
					<span id="name_file">  </span>
					<span id = 'cancel'>cancel</span>
				</div>
				
			</div>{{-- row  --}}
			@else
			@if(isset($NoError) || isset($NewTask))

			@if(isset($your_degree) and !empty($your_degree))
				<div class="alert alert-success ">
					
					 <h3 class="h5 ">your degree in last Task is : {{$your_degree}} from {{$total_degree}}</h3> 
					@endif
					 @if(!empty($your_notes))
					<h3>Notes : {{$your_notes}}</h3>
					
				</div>
			@endif 

			<div class="row">
				<div class="alert alert-primary"> You will receive the New Task At 8 am </div>
			</div>

			 {{-- <div class="row">

				  	  <div class="alert alert-primary"> If you want new task click request task button else you will receive the next task at the 8 AM</div>

					  <div class="button">
					  	<form method="POST" enctype="multipart/form-data" action="{{route('NewTask')}}">
					  		@csrf
					  		 <button class="btn btn-primary" type="submit">Request new Task</button>
					  	</form>
					  	 
					  	 <form>
					  		@csrf
					  		 <button class="btn btn-secondary" type="submit">No Thanks</button>
					  	</form>
					  	
					  </div>
		    </div> --}}
		    @endif {{-- if of check no error  --}}

			 
		@endif {{-- this belong Task --}}
		@if(isset($Team))
		  <div class="row">
		  	 Team
		  </div>	
		@endif
	 {{-- this secontion below task of the project of the team work  --}}

	 @if(isset($TasksProject) and isset($Project))
	   <div class="row">
		 	<div class="description col-md-12">
		 		<span>{{$Project->name}}</span>
		 		<p> {{$Project->description}}</p>
		 	</div>
	   </div> {{-- row --}}

	    <hr>
	 	<h4>Tasks in Project </h4>
	 	<hr>

 	    @foreach($TasksProject as $key => $Task)

	 		<div class="row">
				<div class="description col-md-12">

					<span>{{$Task->title}}</span>
					<p> {{$Task->description}}</p>
				</div>
			</div>{{-- row  --}}

		@endforeach
	 @endif {{-- endif of the TasksProject --}}


	 {{-- this the end of the section belong the tasks of project --}}
		</div> {{-- tasks --}}
	</div><!-- End tasks -->

</div><!-- End content -->
	
</div><!-- End the container -->

@stop {{-- section content --}}

@section('javascript')

 <script type="text/javascript" src="{{asset('js/task/task_soluation.js')}}"></script>

@stop {{-- //section javascript --}}

