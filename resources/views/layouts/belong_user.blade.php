@if(!empty($single_user))
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
            <a href="{{ route('information.profile')}}">profile</a>
          </li>

      		<li> 
      			<a href="{{ route('tasks')}}">tasks</a>
      		</li>

                  <li> 
                     <div class="dropdown">
                          <button class="btn_custom dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{$single_user->first_name . " ". $single_user->last_name}}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                             </a>
                            <button class="dropdown-item" onclick="window.location.href ='/profile/edit'" style="cursor: pointer;"> Edit profile</button>

                             

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
