@extends('layouts.belong_user')
@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();
@endphp
@section('title')
    Chat
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
@section('content')
 <div class="container pt-md-2 " >
 	
 	<div class="chat col-md-6 offset-md-3" style="height: 570px;overflow: hidden;">
 		<div class="h-100 w-100 bg-info rounded">

 			<h4 class="text-center pt-md-2 ">Facebook</h4>
 			<hr>

 			<div class="containChat " style="overflow-y: scroll;height: 70%">
				@if(session()->has('messages') or isset($messages))
				 @php
				   if(session()->has('messages')){
				   	 $messages = session()->get('messages');
				   }elseif(isset($messages)){
				   	$messages = $messages;
				   }
				 @endphp
			 	   @foreach($messages as $message)

				 	 @if($message->sender !== $CurrentUser->id)
	 					 <div class="col-md-12">
		 					<div class="col-md-6">
			 					<h5 class="pl-md-2 text-white "> {{$message->name_sender}} </h5>
				 				<p class="ml-md-4 bg-warning col-md-11 rounded pt-md-1 pb-md-1 text-center"> {{$message->text}} </p>
		 					</div>
	 					</div>
	 					<hr>
	 					@else
	 					  <div class="col-md-12">
		 					<div class="col-md-6  mx-auto mr-md-1">
			 					<h5 class="pr-md-6 text-white " >{{$message->name_sender}}</h5>
				 				<p class="ml-md-4 bg-warning col-md-11 rounded pt-md-1 pb-md-1  text-center"> {{$message->text}} </p>
		 					</div>
		 				</div>
		 				<hr>
	 				 @endif
				 	   	
			 	   @endforeach
			 	   @else
			 	    <div class="col-md-12">
		 					<div class="col-md-6  mx-auto">
			 					
				 				<p class="ml-md-4 bg-warning col-md-11 rounded pt-md-1 pb-md-1  text-center"> أبدء المحادثة مع فريقك </p>
		 					</div>
		 				</div>
			 	@endif {{-- //if belong session()->has('messages') --}}
 				
 		    </div> {{-- ContainChat --}}
 		    <div class="form pt-md-2 h-25">
 		    	<form method="POST" action="{{route('setMessage')}}" >
                  {{ csrf_field() }}
 		    		<input type="text" name="message" class="form-control col-md-12" placeholder="Write your message">
 		    		<button class="btn btn-dark" type="submit" 
 		    		 style="margin: auto;
							display: block;
							width: 100px;
							margin-top: 11px;"> Send</button>
 		    	</form>
 		    </div>

 	   </div>{{-- h-100 w-100 --}} 
 	</div> {{-- chat --}}
 </div> {{-- container --}}
@stop
