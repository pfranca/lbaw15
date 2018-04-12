@extends('layouts.app')


@section('content')

   <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="indexLogged.html">Home</a></li>
      <li class="breadcrumb-item"><a href="topic.html">Sports</a></li>
      <li class="breadcrumb-item active" aria-current="page">Question</li>
      <li class="ml-auto">
        <a id="submitAnswerButton" href="#" data-toggle="modal" data-target="#answerModal" data-dismiss="modal">Submit Answer</a>
      </li>

    </ol>
  </nav>


  <div id="questions" class="bg-white">

    <div class="row questionPage py-5">
      <div class="col-10 col-md-9 col-lg-10 mx-auto" style="font-weight: bold; color: #cce6ff">
          What male tennis player has won the most Grand Slam titles?
      </div>
      <div class="col-10 col-md-9 offset-lg-2 col-lg-10 mx-auto" style="font-size: 60%; color: #e6ffff">
          <div class="dropdown-divider mx-auto" style="width: 5%;"></div>
      </div>
      <div class="col-10 col-md-9 col-lg-6 mx-auto" style="font-size: 70%; color: #f2f2f2">
         currently only available to a few — either locked in people’s heads, or only accessible to select groups. We want
              to connect the people who have knowledge to the people who either locked in people’s heads, or only accessible to select!!
      </div>
    </div>
    <div class="container-fluid bg-white col-md-9">
      <ul class="list-group col-md-11 mx-auto">
         <li class="list-group-item font-theme align-items-start box-question">
          <div class="pt-2 col-md-12 ml-auto mr-auto">
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

        <li class="list-group-item font-theme align-items-start box-question">
          <div class="pt-2 col-md-12 ml-auto mr-auto">
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

@endsection