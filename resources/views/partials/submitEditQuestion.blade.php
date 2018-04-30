@if(count($questions) > 0)
  <div class="modal fade" id="editquestionModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Question</h5>
    
            </div>
            <div class="modal-body">
              <form role="form">
                <div class="form-group">
                  <label>Topic to post</label>
                  <select id="edit_topicSelected" class="selectpicker">
                    @foreach($topics as $topic)
                        @if ($question->id_topic === $topic->id)
                            <option selected value="{{$topic->id}}">{{$topic->name}}</option>
                        @else
                            <option value="{{$topic->id}}">{{$topic->name}}</option>
                      @endif
                
                    @endforeach
                  </select>
                </div>
                <div>Write here the short description of the question:</div>
                <div  class="form-group">
                  <textarea id="edit_short_message" class="form-control" rows="3"></textarea>
                </div>
                <div>Write here the description of the question (optional):</div>
                <div class="form-group">
                  <textarea id="edit_long_message" class="form-control" rows="5"></textarea>
                </div>
              </form>
            </div>

            <div class="modal-footer">
              <button type="button" id="editquestionSubmitBtn" class="buttonDown btn btn-primary btn-sm">Submit</button>
              <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
            </div>
          </div>
        </div>
      </div>
@endif
    