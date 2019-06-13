@extends('layouts.belong_user')

@section("title")
  profile/edit
@stop {{-- title --}}

@section('style')
  <link rel="stylesheet" type="text/css" href="{{asset('css/information/edit_profile.css')}}">
@stop  {{-- style --}}

@section('content')
@if(!is_null($single_user))
<div class="edit">
	<div class="container">
		<h3 class="text-center">Edit Your Profile</h3>
		<hr>
		<div class="row col-md-12">

	     <form method="POST" action="{{route('update_profile')}}" class="first_form_edit col-md-12">
            {{ csrf_field() }}

            <div class="first_section col-md-6 float-left clearfix">
            	<div class="form-group">
                <label>Frirst Name:</label>
                <input type="text" name="first_name" class="form-control" placeholder="Frist  Name" value="{{$single_user->first_name}}">
                @if ($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Last Name:</label>
                <input type="text" name="last_name" class="form-control" placeholder="Last name" value="{{$single_user->last_name}}">
                @if ($errors->has('Last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
            </div>

            <div class="form-group">
             <label>Career:</label>

                <input type="text" name="career" class="form-control" placeholder="Your career like backend developer" 
		                value="@if(is_null($single_user->career)){{ " "}}@else{{$single_user->career}}@endif">

                @if ($errors->has('career'))
                    <span class="text-danger">{{ $errors->first('career') }}</span>
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

             
            <div class="form-group">
                <label>Skills:</label>
                <textarea name="skills" class="form-control" 
                placeholder = " Write This format (html , css )">@if(is_null($single_user->skills)){{""}}@else{{$single_user->skills}}@endif</textarea> 

                @if ($errors->has('skills'))
                    <span class="text-danger">{{ $errors->first('skills') }}</span>
                @endif
            </div>

            </div> {{-- first section  --}}

            <div class="second_section col-md-6 float-left clearfix">
            	<div class="form-group">
                <label>Age:</label>
                <input type="text" name="age" class="form-control" placeholder="Age" 
                value="@if(is_null($single_user->age)){{""}}@else{{$single_user->age}}@endif">
                @if ($errors->has('age'))
                    <span class="text-danger">{{ $errors->first('age') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>experience:</label>
                <input type="text" name="experience" class="form-control" placeholder="Your experince like 1 month or more " 
		                value="@if(is_null($single_user->experience)){{""}}@else{{$single_user->experience}}@endif">
                @if ($errors->has('experience'))
                    <span class="text-danger">{{ $errors->first('experience') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone" 
                value="@if(is_null($single_user->phone)){{ " "}}@else{{$single_user->phone}}@endif">
                @if ($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>Address</label>
		        <input type="text" name="address" class="form-control" placeholder="Your Address" value="@if(is_null($single_user->address)){{""}}@else{{$single_user->address}}@endif">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>


            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{$single_user->email}}">
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

             <div class="form-group">
                <label>Social Media links:</label>
                <textarea name="links_social_media" class="form-control" placeholder= "Write format like (facebook.com/abanoubtalaat ) , (instagram.com/abanoubtalaat ) ">@if(is_null($single_user->phone)){{""}}@else{{$single_user->links_social_media}}@endif</textarea> 
                @if ($errors->has('links_social_media'))
                    <span class="text-danger">{{ $errors->first('links_social_media') }}</span>
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