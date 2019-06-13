@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();
  if(!is_null($CurrentUser->last_project)){
    $disable_task ='abanoub';
  }
  
 
@endphp

@if(!empty($CurrentUser))
<!DOCTYPE html>
<html>
<head>
      <title> @yield('title') </title>    
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
  @yield('style')
</head>
<body>

<!--  start the navbar of the sit -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

	<div class="container">
	<ul class="list-unstyled"> 
		<li> <a href="/">Internship Online</a></li>
	</ul>	

      <div class="list">
      	<ul class="list-unstyled">

          <li> 
            @php
             $fullname = $CurrentUser->first_name.'.'. $CurrentUser->last_name.'.'.$CurrentUser->id
            @endphp

            <a href="{{ route('information.profile',['name'=> $fullname])}}">profile</a>
          </li>
          <li> <a href="{{route('opinions')}}">Opinions</a></li>

      		<li> 

      			<a href="{{(isset($disable_task)?route('project'):route('tasks'))}}">
             @php 
              if(!empty($disable_task)){
               echo "Project";
              }else{
                echo "Tasks";

              }
             @endphp

            </a>
      		</li>
          @if(isset($disable_task))
          <li> <a href="{{route('chat')}}">Chat with Team</a></li>
          @else
            <li> <a href="{{route('solution')}}"> Solution Task</a></li>
          @endif

            <li> 
               <div class="dropdown">
                    <button class="btn_custom dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      {{$CurrentUser->first_name . " ". $CurrentUser->last_name}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      
                      <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                       </a>
                      <button class="dropdown-item" onclick="window.location.href ='/profile//edit'" style="cursor: pointer;"> Edit profile</button>

                       

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      
                    </div>
                  </div>
            </li>
      	</ul>
      </div>
	</div> <!-- End the container -->
  
</nav>
<!-- End the navbar of the site  -->
@yield('content')
@yield('javascript')
 <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
 <script type="text/javascript" src="{{asset("js/js.js")}}"></script>
</body>
</html>

@endif
