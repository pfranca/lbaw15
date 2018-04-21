
  <div class="modal fade" id="questionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Submit Question</h5>
    
            </div>
            <div id="id_author" value="{{Auth::user()->getKey()}}">User's id {{Auth::user()->getKey()}}</div>
            <div class="modal-body">
              <form role="form">
                <div class="form-group">
                  <label>Topic to post</label>
                  <select id="topicSelected" class="selectpicker">
                    @foreach($topics as $topic)
                      <option value="{{$topic->id}}">{{$topic->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div>Write here the short description of the question:</div>
                <div  class="form-group">
                  <textarea id="short_message" class="form-control" rows="3"></textarea>
                </div>
                <div>Write here the description of the question (optional):</div>
                <div class="form-group">
                  <textarea id="long_message" class="form-control" rows="5"></textarea>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" id="questionSubmitBtn" class="buttonDown btn btn-primary btn-sm">Submit</button>
              <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
            </div>
          </div>
        </div>
      </div>
    