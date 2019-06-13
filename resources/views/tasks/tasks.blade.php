
@extends('layouts.belong_user')

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
		

       <!-- Start overview -->
		<div class="tasks col-md-12">
			<h3>Tasks</h3>
			<hr style="color:black !important">
			<div class="task">
				<div class="row">
					<div class="alert alert-danger"> New task wait you</div>

					<button class="btn btn-primary" id = 'start_task'> Start Now</button>
					
				</div>
			</div>
			
		</div><!-- End overview -->
	</div><!-- End content -->
	

</div><!-- End the container -->

@stop {{-- section content --}}

@section('javascript')

 <script type="text/javascript" src="{{asset('js/data_of_task.js')}}"></script>

@stop {{-- //section javascript --}}

