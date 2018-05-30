@extends('layouts.app')

@include('partials.submitQuestModal') 

@section('content')
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="modals" class='submitQuestion'>

  </div>



  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Search</li>
      @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest

    </ol>
  </nav>

  <div id="questions" class="bg-white">
    <div class="container-fluid bg-white col-md-9">
      <ul class="list-group col-md-12">
        @include('partials.question')
      </ul>
    </div>

    <div class=" bg-white col-md-3" style="margin-top: 70px">
      <ul class="list-group col-md-12 ">

         @include('partials.questionNav', ['search_result'=>$questions, 'topics'=>$topics])
      </ul>
    </div>
  </div>

    </div>
    </div>
    </div>
    </div>
  </body>

  @endsection