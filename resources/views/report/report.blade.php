@php 
  use App\TeamLeader;
  $TeamLeader = new TeamLeader;
  $CurrentTeamLeader = $TeamLeader->CurrentTeamLeader();
@endphp
@extends('layouts.teamleader')
@section('title')
profile
@stop
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@if(App::isLocale('en'))
      <link rel="stylesheet" type="text/css" href="{{asset('css/information/profile_left.css')}}">
    @endif
    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/information/profile_right.css')}}">
    @endif

@stop {{-- style section --}}
@if(!empty($CurrentTeamLeader))
@section('content')
	<div class="container mt-md-4">
		<div class="row">

		    <form method="POST" class="col-md-7 offset-md-2 border border-primary pt-md-4 pb-md-4 rounded" action="{{route('sendReport')}}">
		    	<h3 class="col-md-12 mb-md-4 border pt-md-2 pb-md-2 pr-md-2 pl-md-2">Write Report About User</h3>
		    	
	            {{ csrf_field() }}

	            <div class="col-md-12">

		           <div class="form-group col-md-12">
		                <label>Name of user:</label>
		                <input type="text" name="name_user" class="form-control" placeholder='Write the name '>
		                @if ($errors->has('name_user'))
		                    <span class="text-danger">{{ $errors->first('name_user') }}</span>
		                @endif
		            </div>

		            <div class="form-group col-md-12">

		                <label>Report</label>
		                <textarea class="form-control" style="min-height: 220px;" placeholder="Write Report" name="report"></textarea>
		            </div>

		           <div class="button col">
					 <button class="btn btn-primary btn-submit">Send Report</button>
		           </div>
	            </div> 
	            
	          
	        </form>
	
		</div>
	</div>
@stop
@endif