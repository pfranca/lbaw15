@if(count($questions) > 0)
<div class="modal fade" id="questionDelModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Are you sure you want to delete?</h5>
       
            </div>
            
            <div class="modal-footer">
             
              <button id="submitDeleteQuestion" type="button" class="buttonDown btn btn-primary btn-sm">Delete</button>
              <button type="button" class="buttonDown btn btn-secondary btn-sm" data-toggle="modal" data-target="#" data-dismiss="modal">Exit</button>
            </div>
          </div>
        </div>
       </div>
@endif
       