@foreach($notifications as $notification)
@if(!$notification->seen)
       <li class="media list-group-item box-question" id="notification{{$notification->id}}" style="font-size: 2px" >
          <div class="media-body">
            <div class="row pr-4">
              <h6 class="mt-2 answer-link ml-2 col-10">
                {{$notification->message}}
                <div class="text-right pr-1">
                <span class="small">submitted {{ date("F j, Y, g:i a", strtotime($notification->date)) }}</span>
              </div>
              </h6>
              
              <a class="col-1 answer-link ml-auto text-center" onclick="actionDismiss({{$notification->id}})" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>
            <div class="media-body mt-3 pl-5">
              <a class="question-link" href="../topic/{{$notification->getTopic($notification->id_question)->name}}/question/{{$notification->getQuestion($notification->id_question)->id}}">
              {{$notification->getQuestion($notification->id_question)->short_message}}
              </a>
              <div class="text-right pr-1">
                <a class="underTab nameInQuestion" href="../user/{{\Auth::user()->username}}">You</a>
                <span class="mr-auto">submitted {{ date("F j, Y, g:i a", strtotime($notification->getQuestion($notification->id_question)->date)) }}</span>
                <span>in</span>
                <a class="underTab nameInQuestion" href="../topic/{{$notification->getTopic($notification->id_question)->name}}">{{$notification->getTopic($notification->id_question)->name}}</a>
              </div>
              <div class="mt-2">
                <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
                <span class="label label-primary pr-1">{{$notification->getQuestion($notification->id_question)->karma}}</span>
                <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
                <a href="../topic/{{$notification->getTopic($notification->id_question)->name}}/question/{{$notification->getQuestion($notification->id_question)->id}}" class="underTab colorLink">Go to question</a>
              </div>
            </div>
          </div>
        </li>
@endif
@endforeach