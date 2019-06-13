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

<div class="container custom_profile">
	
   <div class="row">

   	<div class="profile col-md-12">
		 <div class="profile_image col-md-3 ">
		 	<div class="image col-md-12">
		 		
		 		<img src="{{asset("images\\")}}{{$CurrentTeamLeader->image}}" class="img-fluid img-thumbnail rounded " id="real_image">
		 		
		 	</div>
	    	<div class="editing_image col-md-12">
    		 <form  action="{{ route('updateImageTeamLeader') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="contain_file_btn col-md-12">
                	
                	<button class="btn btn-primary change_image" id='change_image'>Change Image</button>
                    
                    <input type="file" name="image" id='file' onchange="loadFile(event)">
                </div> 
                <button class="btn btn-primary save float-right col-md-3" id="save_imageTeamLeader"> Save</button>
             </form>

             <form style="width: 100%;" action="{{route('deleteImageTeamLeader')}}" method="POST">
             	@csrf
             	<button type ='submit'id = 'delete_image'class="btn btn-danger col-md-11" style="margin-top: 15px;margin-left: 7.7%;">Delete</button>
             </form>
    		  
	    		
	    	</div>
	     </div> {{-- End Profile Image --}}
     {{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
     	 <div class="profile_info col-md-9 ">
			<h3 class="name"> {{$CurrentTeamLeader->first_name}}  {{$CurrentTeamLeader->last_name}}	</h3>

			<h4>
				@if($CurrentTeamLeader->phone != NULL)
					<label>Phone</label><div class="alert alert-primary "> {{$CurrentTeamLeader->phone}}</div>
				@else
				   <div class="alert alert-warning" style="margin:0px"> {{("Add Your Phone")}}</div>
			    @endif

			</h4>

			<h4>
				@if($CurrentTeamLeader->email != NULL)
				        <label>Email</label><div class="alert alert-primary "> {{$CurrentTeamLeader->email}}</div>
					@else
					   <div class="alert alert-warning" style="margin:0px"> {{("Add Your email")}} </div>
				    @endif
			</h4>

	     </div>

   	</div> {{-- profile --}}
   </div> {{-- row --}}



{{-- SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS --}}
</div> {{-- customer profile --}}

<div class="container text-center" 
   style="width: 100px;
    margin: auto;padding-bottom: 20px;">
	<div class="row">
		
			<a class="btn btn-primary mt-md-3" href="{{route('viewTeamLeaderEdit')}}"> Edit Profile</a>
		
	</div>
</div>

@stop {{-- content section --}}
@endif

@section('javascript')
 <script type="text/javascript" src="{{asset('js/profile/profile.js')}}"></script>
@stop   {{-- javascript --}}





