@foreach($notifications as $notification)
{{$notification}}

@include('partials.deleteQuestion',['questions'=>$questions,'question'=>$notification->getQuestion($notification->id_question)])
@include('partials.submitEditQuestion',['topics'=>$topics,'questions'=>$questions,'topic'=>$notification->getTopic($notification->id_question),'question'=>$notification->getQuestion($notification->id_question)])



       <li class="media list-group-item box-question">
          <div class="media-body">
            <div class="row pr-4">
              <h5 class="mt-2 answer-link ml-2 col-10">
                {{$notification->message}}
                
              </h5>
              <a href="" class="col-1 answer-link ml-auto text-center" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>
            <div class="media-body mt-3 pl-5">
              <div class="md-12 answer-link">
                  {{$notification->getQuestion($notification->id_question)->short_message}}
              </div>
              <div class="text-right pr-1">
                <a class="underTab nameInQuestion" href="../user/{{\Auth::user()->username}}">You</a>
                <span class="mr-auto">submitted {{$notification->date}}</span>
                <span>in</span>
                <a class="underTab nameInQuestion" href="../topic/{{$notification->getTopic($notification->id_question)->name}}">{{$notification->getTopic($notification->id_question)->name}}</a>
              </div>
              <div class="mt-2">
                <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                <span class="label label-primary pr-1">{{$notification->getQuestion($notification->id_question)->karma}}</span>
                <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                <a href="../topic/{{$notification->getTopic($notification->id_question)->name}}/question/{{$notification->getQuestion($notification->id_question)->id}}" class="underTab colorLink">Go to question</a>
                <a href="#" data-toggle="modal" data-target="#editquestionModal" data-dismiss="modal" class="underTab colorLink ml-auto">Edit</a>
                <a href="#" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete</a>
              </div>
            </div>
          </div>
        </li>
@endforeach

