@extends('layouts.app')


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

          <div class="col-md-6" style="margin-left: 25%;">
            <div class="about">{{$user->bio}} </div>
          </div>

          <div class="mt-3 about" style="color: lightblue">
            {{$user->email}}
            <br />
            Overall Karma :  9000
            <br />
            Best Answers : 28
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

    <div class="text-right pr-5 mt-3">
      <label>Sort by:</label>
      <select>
        <option value="Our special sauce" selected>
          Our special sauce
        </option>
        <option value="Oldest to newest">
          Oldest to newest
        </option>
        <option value="Newest to oldest">
          Newest to oldest
        </option>
        <option value="Karma">
          Karma
        </option>
      </select>
    </div>


    <div class="container-fluid bg-white col-md-9">
      <ul>

           @include('partials.question')
      </ul>
    </div>
  </div>
  </div>
  </div>

@endsection