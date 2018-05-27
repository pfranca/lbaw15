@extends('layouts.app')

@include('partials.submitQuestModal') 

@section('content')
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

  <div id="modals" class='submitQuestion'>

  </div>

<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="indexLogged.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
      <li class="breadcrumb-item active" aria-current="page">Following</li>
      @guest
      @else
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>
      @endguest
    </ol>
  </nav>

  <div class="fluid bg-fav-question">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-12 tittle-section">
          <div class="col-md-12">
            <div class="tittle">Following</div>
          </div>

          <div class="col-md-12">
            <div class="about">Your Recent Favorite Followed Questions!</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Container (THEMES Section) -->
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
      @include('partials.followingQuestions')
      </ul>
    </div>
  </div>
  </div>
  </div>
</body>
@endsection