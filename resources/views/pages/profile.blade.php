@extends('layouts.app')


@section('content')

<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
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
            <img class="img-profile" src="{{asset('images/'.Auth::user()->img)}}">
          </div>

          <div class="col-md-12">
            <div class="tittle-profile">{{Auth::user()->name}}</div>
          </div>

          <div class="col-md-12">
            <div class="about">{{Auth::user()->bio}}</div>
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
      <ul>

          @{{ AS PERGUNTAS AQUI }}
      </ul>
    </div>
  </div>
  </div>
  </div>

@endsection