@extends('layouts.app')

@include('partials.submitQuestModal') 

@section('content')



  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{$topic_name}}</li>
      @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest
    </ol>
  </nav>


  <input type="hidden" name="topicName" value="{{$topic_name}}">

  <div id="questions" class="row bg-white col-md-12">
    <div class="text-right pr-1 mt-1" style="margin-left:14%"></div>

    <div class=" bg-white col-md-6" style="margin-top: 70px">
      <ul class="list-group col-md-12">
        @include('partials.question', ['questions'=>$questions, 'topic_name'=>$topic_name])
        {{$questions->links()}}
      </ul>
    </div>

    <div class=" bg-white col-md-3" style="margin-top: 70px">
      <ul class="list-group col-md-12">
      <div class="title-nav">Sorted</div>
        <div class="text-left pr-1 mt-1 nav-sort">
         
          <select id="dropdownSort">
          <option>
              Dummy
            </option>
            <option id="asc" value="Oldest to newest">
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
        @include('partials.questionNav')
      </ul>
    </div>
  </div>
  
  </div>
  </div>
  </div>

@endsection
