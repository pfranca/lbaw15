
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
        </div>
        {{csrf_field()}}
        <div class="modal-body" style="    padding: 25px;">
          <form role="form" class="form-inline" enctype="multipart/form-data" method="POST" action="{{route('edit_user',['username' => $user->username])}}" >
          {{csrf_field()}}
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Name:</label>
               <input type="text"  style="display: none"  class="widthFormControl form-control" id="usernameEdit" value="{{$user->username}}">
              <input type="text" class="widthFormControl form-control" id="usr" name="name" value="{{$user->name}}">
            </div>
            <input type="text" style="display: none" name="id" value="{{$user->id}}">
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Email:</label>
              <input type="text" class="widthFormControl form-control" id="emailToChange" name="email" value="{{$user->email}}">
            </div>
            <div class="form-group">
            
            <div class="form-group col-md-12"  style="margin-top: 13px;" >
              <label class="nameInFormControl" for="usr">Profile:</label>
               <input type="file" name="pic" >
            </div>
            </div>
            <div class="form-group">
                <label class="nameInFormControl" for="usr">Bio:</label>
              <div class="container text-area-fix">
                <textarea class="widthFormControl form-control" id="bio" name="bio" rows="8" >{{$user->bio}}</textarea>
              </div>
            </div>
            <div class="modal-footer">
               <button type="su" class="buttonDown btn btn-primary btn-sm" id="submitionEdit">Submit</button>
                <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
             </div>
          </form>
        </div>
      </div>
    </div>
  </div>