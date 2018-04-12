@extends('layouts.app')


@section('content')

<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="indexLogged.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
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
          <div class="mt-3 about">
            Overall Karma :  9000
            <br />
            Best Answers : 28
          </div>


        </div>

      </div>
    </div>
    <div class="d-flex justify-content-end">
      <button  type="button" class="submitQuestionButton btnsubmit btn btn-xs" data-toggle="modal" data-target="#profileModal" data-dismiss="modal">Edit Profile</button>
    </div>
  </div>

  <div class="modal fade" id="profileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
        </div>
        <div class="modal-body">
          <form role="form" class="form-inline">
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Name:</label>
              <input type="text" class="widthFormControl form-control" id="usr">
            </div>
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Email:</label>
              <input type="text" class="widthFormControl form-control" id="email">
            </div>
            <div class="form-group">
            <button  type="button" class="submitQuestionButton btnsubmit btn btn-xs" data-toggle="modal" data-target="#profileModal" data-dismiss="modal">Change Profile Pic</button>
            <button  type="button" class="submitQuestionButton btnsubmit btn btn-xs" data-toggle="modal" data-target="#profileModal" data-dismiss="modal">Change Background</button>
            </div>
            <div class="form-group">
                <label class="nameInFormControl" for="usr">Bio:</label>
              <div class="container text-area-fix">
                <textarea class="widthFormControl form-control" rows="8"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="buttonDown btn btn-primary btn-sm">Submit</button>
          <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
        </div>
      </div>
    </div>
  </div>

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
          <div id ="question1" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
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
          <div id ="question2" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
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