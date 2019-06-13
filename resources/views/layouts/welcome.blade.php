<! DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    @if(App::isLocale('en'))
      <link rel="stylesheet" type="text/css" href="{{asset('css/welcome/internship_left.css')}}">
    @endif
    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/welcome/internship_right.css')}}">
    @endif
    


</head>

<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        @if (Route::has('login'))
           <div class="top-right links">
               
           
                @auth
                     <a href="{{ url('/profile') }}">profile</a>
                     <a href="{{ url('/tasks') }}">taks</a>    
                @endauth
                @guest
                      @if(session()->has('user_id'))
                        <a href="{{ url('/profile') }}">profile</a>
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
        <a href="/ar"> @lang('welcome/welcome.site')</a>
        
    </div> {{-- end container  --}}
 </nav> {{-- navbar --}}
<div class="container overflow_hidden">
    <div class="welcome">
       <h3> @lang('welcome/welcome.welcome')</h3> 
    </div>
</div> <!-- container  -->
 
<div class="container overflow_hidden padding_bottom">
    <div class="intro">
        <h3>@lang('welcome/welcome.title_intro')</h3>
        <p>
            @lang('welcome/welcome.intro')

        </p>
    </div> {{-- intro --}}
</div> {{-- container  --}}
<hr>

<div class="container overflow_hidden padding_bottom">
    <div class="types">
        <div class="head">
           <h3>@lang('welcome/welcome.title_type')</h3>  
        </div>
       
        <div class="col-md-5 float-right first">
           <h3>@lang('welcome/welcome.first_type_internship')</h3>
           <hr>
           <p>@lang('welcome/welcome.description_first_type')</p>
        </div>
        <div class="col-md-5 float-left second">
           <h3>@lang('welcome/welcome.second_type_internship')</h3>
           <hr>
           <p>@lang('welcome/welcome.description_second_type')</p>
        </div>

    </div>
</div> {{-- container --}} 
<hr>

<div class="container overflow_hidden padding_bottom">
    <div class="steps">
        <div class="head">
           <h3>@lang('welcome/welcome.step_title')</h3>  
        </div>
       
        <div class="">
          <hr>
          <h4> 1- @lang('welcome/welcome.first_step')</h4>
          <hr>
          <h4> 2- @lang('welcome/welcome.second_step')</h4>
          <hr>
          <h4> 3- @lang('welcome/welcome.third_step')</h4>
        </div>
    </div>
</div> {{-- container --}} 
<hr>

<div class="container overflow_hidden padding_bottom padding_top">
    <div class="contact">
        <div class="head">
            <h3>@lang("welcome/welcome.contact") </h3>
        </div>

        <div class="">
          <hr>
          <h4>@lang("welcome.phone_title")</h4>
          <h5>  @lang('welcome/welcome.phone')</h5>
          <hr>
          <h4> @lang('welcome/welcome.email_title')</h4>
          <h5> @lang('welcome/welcome.email')</h5>

          <hr>
          <h4> @lang('welcome/welcome.facebook_title')</h4>
          <h5> <a href="@lang('/welcome.facebook')"> @lang('welcome/welcome.facebook')</a></h5>
          
        </div>
    </div>
</div> {{-- container --}} 

</body>
</html>
