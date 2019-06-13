@extends('layouts.teamleader')
@php 
  use App\TeamLeader;
  $TeamLeader = new TeamLeader;
  $CurrentTeamLeader = $TeamLeader->CurrentTeamLeader();
@endphp
@section("title")
  profile/edit
@stop {{-- title --}}

@section('style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/information/edit_profile.css')}}">
@stop  {{-- style --}}

@section('content')
@if(!is_null($CurrentTeamLeader))
<div class="edit">
	<div class="container">
		<h3 class="text-center">Edit Your Profile</h3>
		<hr>
		<div class="row col-md-12">

	     <form method="POST" action="{{route('updateTeamLeader')}}" class="first_form_edit col-md-12">
            {{ csrf_field() }}

            <div class="first_section col-md-6 float-left clearfix">
            	<div class="form-group">
                <label>Frirst Name:</label>
                <input type="text" name="first_name" class="form-control" placeholder="Frist  Name" value="{{$CurrentTeamLeader->first_name}}">
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last name" value="{{$CurrentTeamLeader->last_name}}">
                @if ($errors->has('Last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>


             <div class="form-group">
                <label> Old Password: </label>
                <input type="password" name="old_password" class="form-control" placeholder="Type old password if you want to change password" value="">

                @if ($errors->has('old_password'))
                    <span class="text-danger">{{ $errors->first('old_password') }}</span>
                @endif
            </div>

             <div class="form-group">
                <label>New Password: </label>
                <input type="password" name="new_password" class="form-control" placeholder="New Password" value="">

                @if ($errors->has('new_password'))
                    <span class="text-danger">{{ $errors->first('new_password') }}</span>
                @endif
            </div>


            </div> {{-- first section  --}}

            <div class="second_section col-md-6 float-left clearfix">
            	
            


            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone" 
                value="@if(is_null($CurrentTeamLeader->phone)){{ " "}}@else{{$CurrentTeamLeader->phone}}@endif">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            


            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$CurrentTeamLeader->email}}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            

            </div> {{-- second section --}}
            
           <div class="button">
			 <button class="btn btn-primary btn-submit">Submit</button>
           </div>
        </form>
			 

		</div> {{-- row --}}

	
	</div> {{-- container --}}
</div> {{-- edit --}}  

 
@endif

@stop {{-- content --}}