@extends('layouts.app')

@section('content')
<body style="background-color: #2d2d30">
  <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="../indexLogged.html">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Admin</li>
      <li class="breadcrumb-item active" aria-current="page">Moderators</li>
      <li class="ml-auto">
        <a id="showAdmin" href="#" data-toggle="collapse" data-target="#sidebar">Show Admin</a>
      </li>

    </ol>
  </nav>

  <div class="modal fade" id="moderatorModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Moderator</h5>
        </div>
        <div class="modal-body">
        <!--dropdown em vez de input-->
          <form role="form" class="form-inline">
            <div class="form-group">
              <label class="nameInFormControl" for="usr">ID:</label>
              <select id="userSelected" class="selectpicker">
                  @foreach($users as $user)
                    <option >{{$user->id}}</option>
                  @endforeach
              </select>
            </div>            
        </div>
        <div class="modal-footer">
          <button type="submit" id="addModeratorBtn" class="buttonDown btn btn-primary btn-sm">Submit</button>
          <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
        </div>
      </div>
    </div>
  </div>

    <!-- id="adminBar" -->
    <div class="row" id="adminBar" style="margin-top: 51px;">
    
      @include('partials.adminNavBar')
      
    
        
     
      <div class=" col-md-12" id="bdAdmin">
          <div class="col-md-10 container-fluid" id="bdAdminMargin">

            <div class="d-flex add-topic-btn">
              <button  type="button" class="submitQuestionButton btnsubmit btn btn-xs" data-toggle="modal" data-target="#moderatorModal" data-dismiss="modal">Add Moderator</button>
            </div>

            <table id="moderators" class="display" width="100%"></table>

          </div>
      </div>
  </div>

  </div>
  </div>

</body>
@endsection