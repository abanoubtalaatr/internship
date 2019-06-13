@extends('layouts.belong_user')
@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();
@endphp
@section('title')
   Solution Of Tasks
@stop {{-- title --}}

{{-- Start style section  --}} 
@section('style')
	@if(App::isLocale('en'))
	      <link rel="stylesheet" type="text/css" href="{{asset('css/tasks/tasks_left.css')}}">
	    @endif
	    @if(App::isLocale('ar'))
	        <link rel="stylesheet" type="text/css" href="{{asset('css/tasks/tasks_right.css')}}">
	@endif
@stop

{{-- Start style section  --}} 
@section('content')

	<div class="container mt-md-5 ">

		
			@if(isset($solutions) and !empty($solutions) and !is_null($solutions) )
			 <div class="row ">
				@foreach($solutions as $solution)
					<div class="alert alert-info border border-primary col-md-12 rounded">
						<label>Name of Task </label>
						<h4 class="text-capitalize pl-md-3 text-primary">{{$solution->title}}</h4>
						<label> Description </label>
						<p class="pl-md-3 text-dark">{{$solution->description}}</p>
						<label>Solution</label>
						<p class="pl-md-3 text-danger">{{$solution->solution}}</p>

					</div>
	
				 @endforeach 
			  </div> {{-- row --}}	 
			@endif
		
		@if(isset($emptys))
			  <div class="row col-md-12 ">
			  	<div class="alert alert-danger rounded col-md-12 text-center h4">
			  		{{'No solution Tasks Because you Not recieve or not complete current task'}}
			  	</div>
			  </div>
			@endif

	</div>
@stop
{{-- End style section  --}} 