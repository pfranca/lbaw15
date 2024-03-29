@extends('layouts.app')

@include('partials.submitQuestModal')

@section('content')
<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
      @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest
    </ol>
  </nav>

  <div class="fluid bg-profile-title">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-12 tittle-section theme-title-section text-center">

          <div class="col-md-12" style="margin-top: 45px;">
            <img class="img-profile" src="{{asset('images/'.$user->img)}}">
          </div>

          <div class="col-md-12">
            <div class="tittle-profile">{{$user->name}}</div>
          </div>

          <div class="col-md-6 profile-bio">
            <div class="about">{{$user->bio}} </div>
          </div>


        </div>
        
      </div>
    </div>
    @guest
    @else
    @if(Auth::user()->id == $user->id)
    <div class="d-flex justify-content-end">
      <button  type="button" data-id="{{$user->id}}" class="submitQuestionButton btnsubmit btn btn-xs" data-toggle="modal" data-target="#profileModal" data-dismiss="modal">Edit Profile</button>
    </div>
    @endif
    @endguest
  </div>

  @include('partials.editProfile')

  <div id="questions" class="bg-white">

    <div id="questions" class="row bg-white col-md-12">
    <div class="text-right pr-1 mt-1" style="margin-left:14%"></div>

    <div class=" bg-white col-md-6" style="margin-top: 35px">
      <ul class="list-group col-md-12">
        @include('partials.question')
        
      </ul>
    </div>

    <div class=" bg-white col-md-3" style="margin-top: 70px">
      <ul class="list-group col-md-12">
        @include('partials.profileSidebar')
      </ul>
    </div>
  </div>

  </div>
  </div>
  </div>

@endsection