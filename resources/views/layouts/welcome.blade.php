
<! DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Internship</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" type="text/css" href="{{asset('css/fontawsome/css/all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate/animations.css')}}"> 
    @if(App::isLocale('en'))
      <link rel="stylesheet" type="text/css" href="{{asset('css/welcome/internship_left.css')}}">
    @endif
    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome/internship_right.css')}}">
    @endif
    


</head>

<body>
@php 
  use App\User;
  $User = new User;
  $CurrentUser = $User->CurrentUser();

  if($CurrentUser !== 'welcome'){
    $fullname = $CurrentUser->first_name.'.'. $CurrentUser->last_name.'.'.$CurrentUser->id;
  }
  
 
@endphp
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        @if (Route::has('login'))
           <div class="top-right links">
            
           
                @auth
                     <a href="{{ route('information.profile',['name'=> $fullname])}}">profile</a>
                     <a href="{{ url('/tasks') }}">taks</a>    
                @endauth
                @guest
              
                      @if(session()->has('user_id'))
                        <a href="{{ route('information.profile',['name'=> $fullname])}}">profile</a>
                        <a href="{{ url('/tasks') }}">taks</a> 
                        @else
                           <a href="{{ url('/login') }}" style="margin-right: 5px;">Login </a>
                           <a href="{{ url('/register') }}"> Register</a> 
                      @endif
                     
                @endguest

                

                    <button 
                         style="display: none;"
                         onclick = "window.location.href ='/lang/en'" >English</button>
                    <button 
                            style="display: none;" 
                            onclick = "window.location.href ='/lang/ar'" >عربى
                    </button>
                
            </div> {{-- top right --}}
        @endif 
        <a href="/" style="text-decoration: none;"> @lang('welcome/welcome.site')</a>
        
    </div> {{-- end container  --}}
 </nav> {{-- navbar --}}
<div class="container overflow_hidden">
    <div class="welcome mt-md-2 mb-md-2 pt-md-3 pb-md-3">
       <h3 class=""> @lang('welcome/welcome.welcome')</h3> 
    </div>
</div> <!-- container  -->
 
<div class="container overflow_hidden padding_bottom animatedParent rounded">

    <div class="intro animated fadeInLeft" style="background: url({{asset('public_image/a.png')}});background-size: 2%;color: black">
        <h3>@lang('welcome/welcome.title_intro')</h3>
        <p>
            @lang('welcome/welcome.intro')

        </p>
    </div> {{-- intro --}}
</div> {{-- container  --}}
<hr>

<div class="container overflow_hidden padding_bottom animatedParent">
    <div class="types rounded animated fadeInUp" style="background:linear-gradient(-187deg,#000428 18%,#004e92 22%);overflow: hidden;">
        <div class="head">
           <h3 class="text-white pl-md-3">@lang('welcome/welcome.title_type')</h3>  
        </div>
       
        <div class="col-md-5 float-right first" style="color: white;">
           <h3>@lang('welcome/welcome.first_type_internship')</h3>
           <hr>
           <p style="color: #f5e5e5">@lang('welcome/welcome.description_first_type')</p>
        </div>
        <div class="col-md-5 float-left second" style="color: white;" >
           <h3>@lang('welcome/welcome.second_type_internship')</h3>
           <hr>
           <p style="color: #f5e5e5">@lang('welcome/welcome.description_second_type')</p>
        </div>

    </div>
</div> {{-- container --}} 
<hr>

<div class="container overflow_hidden padding_bottom " >
    <div class="steps pt-md-3 pb-md-3 pl-md-3 pr-md-3" style="background: url({{asset('public_image/a.png')}});background-size: 2%;">
        <div class="head animatedParent">
           <h3 class=" animated fadeInLeft">@lang('welcome/welcome.step_title')</h3>  
        </div>
       
        <div class="animatedParent">
          
          <h4 class=" animated fadeInLeft">  @lang('welcome/welcome.second_step')</h4>
          <hr>
         
        </div>
    </div>
</div> {{-- container --}} 
<hr>
 {{-- /*                                        
                                        ++ 
                                      ++  ++
                                     +++  +++
                                    +++    +++
                                   +++      +++
                                  ++++++++++++++
                                 ++++++++++++++++
                                +++            +++ 
                               +++              +++
                              +++                +++
     */ --}}

<div class="container overflow_hidden pt-md-3 pb-md-4 mb-md-2 rounded " style="background: linear-gradient(135deg, rgba(12,206,188,1) 0%, rgba(49,93,183,1) 100%);">

    <div class="contact" >
       <div class="head mb-md-5  text-center">
            <h3>@lang("welcome/welcome.contact") </h3>
        </div>

      <div class="col-md-5 border border-white rounded pt-md-3 pb-md-2 float-left  animatedParent ">
        <h4  class="pb-md-4">Information Contact</h4>
          
        <div class="media animated fadeInLeft ">

          <div class="i  rounded-circle position-relative" 
             style="width: 50px;
                height: 50px;
                border: 2px solid white;
                margin-right: 18px;
                margin-top: 7px;">

             <i class="fas fa-phone position-absolute" 
                 style="left: 13px;
                        color: white;
                        font-size: 18px;
                        top: 12px;"></i>
          </div>
         
          <div class="media-body">
            <h4>@lang("welcome/welcome.phone_title")</h4>
            <h5>  @lang('welcome/welcome.phone')</h5>
          </div>
       </div>
       <hr>
       <div class="media animated fadeInRight">

          <div class="i  rounded-circle position-relative" 
             style="width: 50px;
                height: 50px;
                border: 2px solid white;
                margin-right: 18px;
                margin-top: 7px;">

             <i class="fas fa-envelope position-absolute" 
                 style="left: 13px;
                        color: white;
                        font-size: 18px;
                        top: 12px;"></i>
          </div>
         
          <div class="media-body">
            <h4> @lang('welcome/welcome.email_title')</h4>
            <h5> @lang('welcome/welcome.email')</h5>
          </div>
       </div>
        <hr>
       <div class="media animated fadeInLeft">

          <div class="i  rounded-circle position-relative" 
             style="width: 50px;
                height: 50px;
                border: 2px solid white;
                margin-right: 18px;
                margin-top: 7px;">

             <i class="fab fa-facebook-f position-absolute" 
                 style="left: 18px;
                        color: white;
                        font-size: 18px;
                        top: 12px;"></i>
          </div>
         
          <div class="media-body">
            <h4> @lang('welcome/welcome.facebook_title')</h4>
            <h5>  @lang('welcome/welcome.facebook')</h5>
          </div>
       </div>
       <hr>
       <div class="media animated fadeInRight">

          <div class="i  rounded-circle position-relative" 
             style="width: 50px;
                height: 50px;
                border: 2px solid white;
                margin-right: 18px;
                margin-top: 7px;">

             <i class="fab fa-whatsapp position-absolute" 
                 style="left: 18px;
                        color: white;
                        font-size: 18px;
                        top: 12px;"></i>
          </div>
         
          <div class="media-body">
            <h4> Whatsapp number</h4>
            <h5>  @lang('welcome/welcome.phone')</h5>
          </div>
       </div>
      </div> {{-- col-md--}}

      {{-- /*                                        
                                        ++ 
                                      ++  ++
                                     +++  +++
                                    +++    +++
                                   +++      +++
                                  ++++++++++++++
                                 ++++++++++++++++
                                +++            +++ 
                               +++              +++
                              +++                +++
     */ --}}

    <div class="col-md-6 border border-white rounded pt-md-3 pb-md-2 float-left ml-md-5" data-sequence='500'>
        <h4 class="pb-md-4">Email Contact</h4>
        <form class="">
          <div class="form-group animatedParent">
            <label for="formGroupExampleInput" class="">Name</label>
            <input type="text" class="form-control  animated fadeInLeft" id="formGroupExampleInput" placeholder="Your Name">
          </div>
          <div class="form-group animatedParent">
            <label for="formGroupExampleInput2 animated fadeInLeft">Email</label>
            <input type="email" class="form-control" id="formGroupExampleInput2" placeholder="Your Email">
          </div>

          <div class="form-group animatedParent">
            <label class="animated fadeInLeft">Message</label>
            <textarea class="form-control animated fadeInLeft" placeholder="Message" style="max-height: 89px;min-height: 89px;resize: none;"></textarea>
          </div>
          <button class="btn btn-warning w-25 h1"> Send </button>
        </form>
      </div> {{-- col-md--}}
      
    </div> {{-- //row --}}
</div> {{-- container --}} 
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/css3-animate-it.js')}}"></script>
</body>
</html>
