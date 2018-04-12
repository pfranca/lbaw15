@extends('layouts.app')


@section('content')



  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="indexLogged.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Sports</li>
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
        <li class="list-group-item font-theme align-items-start box-question">
          <div class="pb-2">
            <div class="md-12 pl-4">
              <a class="question-link" href="question3.html">
              Who was the shortest player ever to play in the NBA?
              </a>
            </div>
            <div class="text-right pr-1">
              <a class="underTab nameInQuestion" href="profile.html">Jon Doe</a>
              <span class="mr-auto">submitted 10 days ago</span>
            </div>
            <div class="col-md-12">
              <a class="pr-2" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
              <span class="label label-primary pr-2">1590</span>
              <a class="pr-3" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
              <a class="underTab colorLink" data-toggle="collapse" href="#question1" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
              <a href="question3.html#answer" class="underTab colorLink">Answer</a>
              <a href="#" class="underTab colorLink ml-auto">Edit</a>
              <a href="#" class="underTab colorLink">Report</a>
              <a href="#" class="underTab colorLink">Delete</a>

            </div>
          </div>
          <div id="question1" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
            <div class="md-12 pl-4 pt-2 answer-link">
              Tyrone Bogues is 5'3 and is an American retired basketball player. He played as point guard.
            </div>
            <div class="text-right pr-1">
              <a class="underTab nameInQuestion" href="profile.html">Jon Doe</a>
              <span class="mr-auto">submitted 10 days ago</span>
            </div>
            <div class="col-md-12">
              <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
              <span class="label label-primary pr-1">1590</span>
              <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
              <a href="#" class="underTab colorLink">Report</a>
              <a href="#" class="underTab colorLink">Delete</a>
            </div>
          </div>

        </li>

        <li class="list-group-item font-theme align-items-start box-question">
          <div class="pb-2">
            <div class="md-12 pl-4">
              <a class="question-link" href="question3.html">
              What male tennis player has won the most Grand Slam titles?
              </a>
            </div>
            <div class="text-right pr-1">
              <a class="underTab nameInQuestion" href="profile.html">Jon Doe</a>
              <span class="mr-auto">submitted 10 days ago</span>
            </div>
            <div class="col-md-12">
              <a class="pr-2" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
              <span class="label label-primary pr-2">1590</span>
              <a class="pr-3" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
              <a class="underTab colorLink" data-toggle="collapse" href="#question2" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
              <a href="question3.html#answer" class="underTab colorLink">Answer</a>
              <a href="#" class="underTab colorLink ml-auto">Edit</a>
              <a href="#" class="underTab colorLink">Report</a>
              <a href="#" class="underTab colorLink">Delete</a>

            </div>
          </div>
          <div id="question2" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
            <div class="md-12 pl-4 pt-2 answer-link">
              Roger Federer is a Swiss Tennis Player. Many people have called him the greatest male tennis player of all time.
            </div>
            <div class="text-right pr-1">
              <a class="underTab nameInQuestion" href="profile.html">Jon Doe</a>
              <span class="mr-auto">submitted 10 days ago</span>
            </div>
            <div class="col-md-12">
              <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
              <span class="label label-primary pr-1">1590</span>
              <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
              <a href="#" class="underTab colorLink">Report</a>
              <a href="#" class="underTab colorLink">Delete</a>
            </div>
          </div>

        </li>
      </ul>
    </div>
  </div>
  </div>
  </div>
  </div>

@endsection