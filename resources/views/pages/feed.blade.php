@extends('layouts.app')

@include('partials.submitQuestModal') 

@section('content')
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="modals" class='submitQuestion'>

  </div>



  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Feed</li>
      @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest

    </ol>
  </nav>

  <div id="questions" class="row bg-white col-md-12">
    <div class="text-right pr-1 mt-1" style="margin-left:14%"></div>

    <div class=" bg-white col-md-6" style="margin-top: 75px">
      <ul class="list-group col-md-12">
        @include('partials.question' , ['questions'=>$allQuestions,'topics'=>$allTopics])

      </ul>
    </div>

    <div class=" bg-white col-md-3" style="margin-top: 70px">
      <ul class="list-group col-md-12">
        @include('partials.questionNav',['questions'=>$allQuestions, 'topics'=>$allTopics])
        }
      </ul>
    </div>
  </div>


  </div>
  </div>
  </div>
  </body>

  @endsection