
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Profile</h5>
        </div>
        <div class="modal-body" style="    padding: 25px;">
          <form role="form" class="form-inline" action="{{URL::to('/user/$user->username/edit')}}" method="post">
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Name:</label>
               <input type="text"  style="display: none"  class="widthFormControl form-control" id="usernameEdit" value="{{$user->username}}">
              <input type="text" class="widthFormControl form-control" id="usr" value="{{$user->name}}">
            </div>
            <div class="form-group">
              <label class="nameInFormControl" for="usr">Email:</label>
              <input type="text" class="widthFormControl form-control" id="emailToChange" value="{{$user->email}}">
            </div>
            <div class="form-group">
            
            <div class="form-group col-md-12"  style="margin-top: 13px;" >
              <label class="nameInFormControl" for="usr">Profile:</label>
               <input type="file" placeholder="OK" id="profileImg" class="add-topic-btn " name="pic" accept="image/*">
            </div>

            <div class="form-group">
              <label class="nameInFormControl" for="usr">Background:</label>
                <input type="file" style="margin-top: 13px;" id="bgImage" class="add-topic-btn " name="pic" accept="image/*">
            </div>

            </div>
            <div class="form-group">
                <label class="nameInFormControl" for="usr">Bio:</label>
              <div class="container text-area-fix">
                <textarea class="widthFormControl form-control" id="bio" rows="8" >{{$user->bio}}</textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="buttonDown btn btn-primary btn-sm" id="submitionEdit">Submit</button>
          <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
        </div>
      </div>
    </div>
  </div>