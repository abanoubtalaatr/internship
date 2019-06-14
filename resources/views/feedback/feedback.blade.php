@extends('layouts.belong_user')
@section('style')

<meta name="csrf-token" content="{{ csrf_token() }}">
@if(App::isLocale('en'))
      <link rel="stylesheet" type="text/css" href="{{asset('css/information/profile_left.css')}}">
    @endif
    @if(App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="{{asset('css/information/profile_right.css')}}">
    @endif

@stop {{-- style section --}}

@section('content')
	
  <div class="container pt-md-3 rounded mt-md-4">
    @if(session()->has('message'))
        <div class="alert alert-info"> you send Your Message Successfully</div>
      @endif
  </div>
<div class="container overflow_hidden pt-md-3 pb-md-4 mb-md-2 rounded mt-md-4 " style="background: linear-gradient(135deg, rgba(12,206,188,1) 0%, rgba(49,93,183,1) 100%);">


    <div class="contact" style="overflow: hidden;" >

    <div class="col-md-12 border border-white rounded " data-sequence='500'>
        <h4 class="pb-md-4">Email Contact</h4>
        <form class="" action="{{route("SetFeedBack")}}" method="POST">
          @csrf
          <label>Write Your FeedBack About Site Or Feature Should To add T site</label>
          <div class="form-group animatedParent">
            <textarea class="form-control animated fadeInLeft" name="feedback" placeholder="Message" style="max-height: 89px;min-height: 89px;resize: none;"></textarea>
          </div>
          <button class="btn btn-warning w-25 h1"> Send </button>
        </form>
      </div> {{-- col-md--}}
      
    </div> {{-- //row --}}
</div> {{-- container --}} 


@stop