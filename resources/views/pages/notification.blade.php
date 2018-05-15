@extends('layouts.app')

@section('content')
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">


  <div id="modals" class='submitQuestion'>

  </div>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="indexLogged.html">Cooperative Q & A</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
          </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline offset-lg-2 col-12 col-lg-5 col-xl-6">
        <input class="form-control search-control col-10" type="text" placeholder="Search">
        <button class="btnsearch  col-2" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="feed.html">FEED</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="indexLogged.html#topics">TOPICS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
               Jon Doe  <img class="img-fluid nav-img-profile" src="img/user.png" alt="profilePic" />
            </a>
          <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="favQuestions.html">Following</a>
            <a class="dropdown-item" href="profile.html">Your Profile</a>
            <a class="dropdown-item" href="notification.html">Notifications</a>
            <a class="dropdown-item" href="admin/adminTheme.html">Admin</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.html">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="indexLogged.html">Home</a></li>
      <li class="breadcrumb-item"><a href="profile.html">Jon Doe</a></li>
      <li class="breadcrumb-item active" aria-current="page">Notifications</li>
      <li class="ml-auto">
        <a href="#" data-toggle="modal" data-target="#questionModal" data-dismiss="modal">Submit Question</a>
      </li>

    </ol>
  </nav>

  <div class="fluid bg-profile-title">
    <div class="container-fluid">
      <div class="row text-center">
        <div class="col-md-12 tittle-section theme-title-section">

          <div class="col-md-12">
            <img class="img-profile" src="img/user.png">
          </div>

          <div class="col-md-12">
            <div class="tittle-profile">Jon Doe</div>
          </div>

          <div class="col-md-12">
            <div class="about">This is what I like to post! Some questions</div>

          </div>

        </div>

      </div>
    </div>
  </div>

  <div id="questions" class="bg-white row">
    <div class="col-10 mx-auto my-5">
      <ul class="list-group">
        <li class="media list-group-item box-question">
          <div class="media-body">
            <div class="row pr-4">
              <h5 class="mt-2 answer-link ml-2 col-10">
                Someone liked your answer
              </h5>
              <a href="" class="col-1 answer-link ml-auto text-center" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>

            <div class="media-body mt-3 pl-5">
              <div class="md-12 answer-link">
                Roger Federer is a Swiss Tennis Player. Many people have called him the greatest male tennis player of all time.
              </div>
              <div class="text-right pr-1">
                <a class="underTab nameInQuestion" href="profile.html">You</a>
                <span class="mr-auto">submitted 10 days ago</span>
                <span>in</span>
                <a class="underTab nameInQuestion" href="topic.html">Random</a>
              </div>
              <div class="mt-2">
                <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                <span class="label label-primary pr-1">1590</span>
                <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                <a href="question3.html" class="underTab colorLink">Go to question</a>
                <a href="#" class="underTab colorLink">Edit</a>
                <a href="#" class="underTab colorLink">Delete</a>
              </div>
            </div>
          </div>
        </li>
        <li class="media list-group-item box-question">
          <div class="media-body">
            <div class="row pr-4">
              <h5 class="mt-2 answer-link ml-2 mr-auto col-10">
                Someone liked your question
              </h5>
              <a href="" class="col-1 answer-link ml-auto text-center" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>
            <div class="media-body mt-3 pl-5">
              <div>
                <a class="question-link answer-link" href="question3.html">
              What male tennis player has won the most Grand Slam titles?
              </a>
              </div>
              <div class="text-right pr-1">
                <a class="underTab nameInQuestion" href="profile.html">You</a>
                <span class="mr-auto">submitted 10 days ago</span>
                <span>in</span>
                <a class="underTab nameInQuestion" href="topic.html">Random</a>
              </div>
              <div class="mt-2">
                <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                <span class="label label-primary pr-1">1590</span>
                <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                <a href="question3.html" class="underTab colorLink">See answers</a>
                <a href="#" class="underTab colorLink">Edit</a>
                <a href="#" class="underTab colorLink">Delete</a>
              </div>
            </div>
          </div>
        </li>
        <li class="media list-group-item box-question">
          <div class="media-body">
            <div class="row pr-4">
              <h5 class="mt-2 answer-link ml-2 mr-auto col-10">
                <a href="profile.html" class="nameInQuestion">Jon Doe</a> answered your question
              </h5>
              <a href="" class="col-1 answer-link ml-auto text-center" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>
            <div class="media-body mt-3 pl-5">
              <a class="question-link answer-link" href="question3.html">
              What male tennis player has won the most Grand Slam titles?
              </a>
              <div class="text-right pr-1">
                <a class="underTab nameInQuestion" href="profile.html">You</a>
                <span class="mr-auto">submitted 10 days ago</span>
                <span>in</span>
                <a class="underTab nameInQuestion" href="topic.html">Random</a>
              </div>
              <div class="mt-2">
                <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                <span class="label label-primary pr-1">1590</span>
                <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                <a href="question3.html" class="underTab colorLink">See answers</a>
                <a href="#" class="underTab colorLink">Edit</a>
                <a href="#" class="underTab colorLink">Delete</a>
              </div>
              <div class="media-body mt-3 pl-5">
                <div class="answer-link">
                  Roger Federer is a Swiss Tennis Player. Many people have called him the greatest male tennis player of all time.
                </div>
                <div class="text-right pr-1">
                  <a class="underTab nameInQuestion" href="profile.html">Paul Walker</a>
                  <span class="mr-auto">answered 9 days ago</span>
                </div>
                <div class="mt-2">
                  <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                  <span class="label label-primary pr-1">1590</span>
                  <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                  <a href="question3.html" class="underTab colorLink">Best Answer</a>
                  <a href="#" class="underTab colorLink">Report</a>
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>

  </div>
  </div>
  </div>

</body>
@endsection