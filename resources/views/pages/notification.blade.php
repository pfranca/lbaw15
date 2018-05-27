@extends('layouts.app')

@include('partials.submitQuestModal') 
@section('content')
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">
<div id="modals" class='submitQuestion'>

</div>



<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Notifications</li>
    @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest

  </ol>
</nav>

  <div id="questions" class="bg-white row">
    <div class="col-10 mx-auto my-5">
    <ul class="list-group">
    @include('partials.notificationQuestions')
    </ul>
    </div>

  </div>
  </div>
  </div>

</body>
@endsection