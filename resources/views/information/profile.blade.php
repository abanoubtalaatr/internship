@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();
@endphp
@extends('layouts.belong_user')
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
@if(!empty($CurrentUser))

@section('content')

<div class="container custom_profile">
	
   <div class="row">

   	<div class="profile col-md-12">
		 <div class="profile_image col-md-3 ">
		 	<div class="image col-md-12">
		 		<img src="{{asset("images\\")}}{{$CurrentUser->image}}" class="img-fluid img-thumbnail rounded " id="real_image">
		 		
		 	</div>
	    	<div class="editing_image col-md-12">
    		 <form  action="{{ route('update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="contain_file_btn col-md-12">
                	
                	<button class="btn btn-primary change_image" id='change_image'>Change Image</button>
                    
                    <input type="file" name="image" id='file' onchange="loadFile(event)">
                </div> 
                <button class="btn btn-primary save float-right col-md-3" id="save_image"> Save</button>
             </form>

             <form style="width: 100%;" action="{{route('delete_image')}}" method="POST">
             	@csrf
             	<button type ='submit'id = 'delete_image'class="btn btn-danger col-md-11" style="margin-top: 15px;margin-left: 7.7%;">Delete</button>
             </form>
    		  
	    		
	    	</div>
	     </div> {{-- End Profile Image --}}
     {{-- ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ --}}
     	 <div class="profile_info col-md-9 ">
			<h3 class="name"> {{$CurrentUser->first_name}}  {{$CurrentUser->last_name}}	</h3>					
			<h4 class="career">
				@if($CurrentUser->career != NULL)
					<label>Career</label><div class="alert alert-primary ">  {{$CurrentUser->career}}</div>	
				@else
				   <div class="alert alert-warning" style="margin:0px">{{("Update Your Career")}} </div>
			    @endif
		     </h4>
			<h4 class="city">
				@if($CurrentUser->address != NULL)
					<label>Address</label><div class="alert alert-primary ">{{$CurrentUser->address}}</div>
				@else
				   <div class="alert alert-warning" style="margin:0px"> {{("Update Your City")}} </div> 
			    @endif
			</h4>
			<div class="skills">
				@php 
				  $skills = $CurrentUser->skills;
				  if(is_null($skills)){
				  	echo "<div class='alert alert-warning' style='margin:0px'> Add Your Skills </div>";    
				  }
				  else{
					  $skills = explode(",",$skills);
					  echo "<label>Skills</label>";
					  echo "<div class='alert alert-primary '>";

					  foreach ($skills as $key => $value) 
					  		echo "<span>$value</span>";
					  }
					  echo "</div>";
				 
				@endphp
			</div> 
	     </div>


   	</div> {{-- profile --}}
   </div> {{-- row --}}



{{-- SSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS --}}
</div> {{-- customer profile --}}

<div class="custom_profile container"  style="padding-bottom: 20px;">
	
<div class="row">
	<div class="profile col-md-12 ">
		    {{-- Start profile general --}}
		 <div class="profile_general col-md-6">
			<h4> 
				@if($CurrentUser->age != NULL)
					<label>Age</label><div class="alert alert-primary "> {{$CurrentUser->age}}</div>	
				@else
				   <div class="alert alert-warning" style="margin:0px"> {{("Add Your Age")}}  </div>
			    @endif
			</h4>
			<h4>
				@if($CurrentUser->experience != NULL)
					<label>Experience</label>
					<div class="alert alert-primary "> {{$CurrentUser->experience}}</div>	
				@else
				   <div class="alert alert-warning" style="margin:0px"> {{("Add Your experience")}}  </div>
			    @endif
			</h4>
			<h4>
				@if($CurrentUser->phone != NULL)
					<label>Phone</label><div class="alert alert-primary "> {{$CurrentUser->phone}}</div>
				@else
				   <div class="alert alert-warning" style="margin:0px"> {{("Add Your Phone")}}</div>
			    @endif

			</h4>
			<h4>
				@if($CurrentUser->email != NULL)
				        <label>Email</label><div class="alert alert-primary "> {{$CurrentUser->email}}</div>
					@else
					   <div class="alert alert-warning" style="margin:0px"> {{("Add Your email")}} </div>
				    @endif
			</h4>
		 </div> {{-- //profile_general --}}


		 <div class="profile_social col-md-6  ">
					<h4>
						@php 
						  $links = $CurrentUser->links_social_media;
						  if(is_null($links)){
						  	echo "<div class='alert alert-warning' style='margin:0px'> Add Your  Social Media Links </div>";    
						  }
						  else{
							  $links = explode(",",$links);
							 echo "<label> Social Media Links</label>";
							  
							  foreach ($links as $key => $value) 
							  	    
							  		echo "<div style='margin-bottom:10px;' class='alert alert-primary'><a href ='/$value' target = '_blank'>$value</a></div>";		
							  }
						@endphp
				    </h4>
		  </div> {{-- profile _solical --}}



	</div> {{-- profile --}}
</div>{{-- row --}}
</div>{{-- cusom_profile --}}
<div class="container text-center" 
   style="width: 100px;
    margin: auto;padding-bottom: 20px;">
	<div class="row">
		
			<a class="btn btn-primary" href="{{route('edit_profile')}}"> Edit Profile</a>
		
	</div>
</div>

@stop {{-- content section --}}
@endif

@section('javascript')
 <script type="text/javascript" src="{{asset('js/profile/profile.js')}}"></script>
@stop   {{-- javascript --}}





