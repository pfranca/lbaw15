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
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>

    </ol>
  </nav>

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
      <ul class="list-group col-md-12">
        @include('partials.questionFeed')
      </ul>
    </div>
  </div>
  </div>
  </div>
  </div>
  </body>

  @endsection