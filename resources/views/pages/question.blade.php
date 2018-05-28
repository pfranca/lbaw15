@extends('layouts.app')



@section('content')

   <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="/topic/{{$topic_name}}"> {{$topic_name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Question </li>
      @guest
      @else
      <li class="ml-auto">
        <a id="submitAnswerButton" href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#answerModal" data-dismiss="modal">Submit Answer</a>
     </li>
      @endguest
    </ol>
  </nav>

  <input type="hidden" id="questionId" value="{{$question->id}}">


  <div id="questions" class="bg-white">

    <div class="row questionPage py-5">
      <div class="col-10 col-md-9 col-lg-10 mx-auto" style="font-weight: bold; color: #cce6ff; margin-top: 30px;">
         {{$question->short_message}}
      </div>
      <div class="col-10 col-md-9 offset-lg-2 col-lg-10 mx-auto" style="font-size: 60%; color: #e6ffff">
          <div class="dropdown-divider mx-auto" style="width: 5%;"></div>
      </div>
      <div class="col-10 col-md-9 col-lg-6 mx-auto" style="font-size: 70%; color: #f2f2f2">
          {{$question->long_message}}
      </div>
      <input type="hidden" name="userAuthId" value="$user_id">
      @guest
      @else
      @if(!Auth::user()->isFollowedQuestion($question->id, Auth::user()->id))
      <div>
            <a id="fllQuestion{{$question->id}}" value="Follow" onclick="actionFllQuestion('{{$question->id}}')" class="btn btn-circle js-scroll-trigger btn-arrow">
              <div class="about">
                <p>Follow Question</p>
              </div>
            </a>
          </div>
          <div>
          @else
            <a id="fllQuestion{{$question->id}}" value="Unfollow" onclick="actionFllQuestion('{{$question->id}}')" class="btn btn-circle js-scroll-trigger btn-arrow">
              <div class="about">
                <p>Unfollow Question</p>
              </div>
            </a>
          </div>
          @endif
          @endguest
    </div>
    <div class="container-fluid bg-white col-md-9">
      <ul class="list-group col-md-11 mx-auto">

        @include('partials.answer')
        
      </ul>
    </div>
  </div>
  </div>
  </div>
  
  @include('partials.submitAnsModal')



@endsection