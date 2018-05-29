@if(count($questions) > 0)
    @foreach($questions as $question)
      @if(!$question->disabled)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-2">
      <div class="md-12 pl-3" style="font-size: 9px;">
        @foreach($topics as $topic)
          @if ($question->id_topic === $topic->id)
            <a class="question-link" href="../topic/{{$topic->name}}/question/{{$question->id}}">
              {{$question->short_message}}      
          </a>
          @endif
        @endforeach
      </div>

      <div class="col-md-12">
      <a class="pr-2" id="upvote_button{{$question->id}}" data-toggle="vote" onclick="actionUpvoteQuestion({{$question->id}})"><i class="far fa-thumbs-up" ></i></a>
        <span id="question_karma{{$question->id}}" class="label label-primary pr-2">{{$question->karma}}</span>
        <a class="pr-3" id="downvote_button{{$question->id}}" data-toggle="upvote" onclick="actionDownvoteQuestion({{$question->id}})"><i class="far fa-thumbs-down"></i></a>
        <a id="bestAnswer" class="underTab colorLink" data-toggle="collapse" href="#question{{$question->id}}" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
        @if(Auth::user()->alreadyVoted($question->id,Auth::user()->id) === 1)
          <style type="text/css">
            #upvote_button{{$question->id}}{
              color : #0099cc;
            }
          </style>
        @endif
        @if(Auth::user()->alreadyVoted($question->id,Auth::user()->id) === -1)
          <style type="text/css">
            #downvote_button{{$question->id}}{
              color : #0099cc;
            }
          </style>
        @endif
        @guest
        @else
        <a id="submitAnswerButton" href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#answerModal" data-dismiss="modal">Answer</a>
          @if ($question->id_author === Auth::user()->id)
            <a href="#" data-id="{{$question->id}}" data-long="{{$question->long_message}}" data-short="{{$question->short_message}}" data-toggle="modal" data-target="#editquestionModal" data-dismiss="modal" class="underTab colorLink ml-auto">Edit</a>
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete</a>
          @elseif (Auth::user()->type === 'MOD')
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete </a>
          @else
          <a href="" data-id="{{$question->id}}" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
          @endif
        @endguest
      </div>

      <div class="row text-right text-bottom col-md-6 pull-right" >
        <div class="col-md-12 mg-b-5">
          @if(Auth::user()->followQuestionId($question->id,Auth::user()->id))
              <button id="followQuestion{{$question->id}}" onclick="actionFollowQuestion('{{$question->id}}')" value="followingPage" type="button" class="buttonDown followCardQuestion q-btn-unfollow"> Unfollow </button>
            @else
              <button id="followQuestion{{$question->id}}" onclick="actionFollowQuestion('{{$question->id}}')" value="followingPage" type="button" class="buttonDown followCardQuestion q-btn-follow"> Follow </button>
            @endif   

        </div>
        <div class="col-md-12">
          <a class="underTab nameInQuestion" href="{{asset("user/".$question->user->username)}}">{{$question->user->username}}</a>
          <span class="mr-auto">{{ date("F j, Y, g:i a", strtotime($question->date)) }}</span>
        </div>      
      </div>

    </div>

    <div id="question{{$question->id}}" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
      </div>
      <div class="text-right pr-1">
        @if($question->getBestAnswer($question->id) != null)
          <div>{{$question->getBestAnswer($question->id)->message}}</div>
          <a class="underTab nameInQuestion" href="{{asset("/user/".$question->getBestAnswer($question->id)->user->username)}}">{{$question->getBestAnswer($question->id)->user->username}}</a>
        <span class="mr-auto">{{ date("F j, Y, g:i a", strtotime($question->getBestAnswer($question->id)->date)) }}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-2" id="upvote_button_answer{{$question->getBestAnswer($question->id)->id}}" data-toggle="vote" onclick="actionUpvoteAnswer({{$question->getBestAnswer($question->id)->id}})"><i class="far fa-thumbs-up" ></i></a>
       <span id="answer_karma{{$question->getBestAnswer($question->id)->id}}" class="label label-primary pr-1">{{$question->getBestAnswer($question->id)->karma}}</span>
        <a class="pr-3" id="downvote_button_answer{{$question->getBestAnswer($question->id)->id}}" data-toggle="upvote" onclick="actionDownvoteAnswer({{$question->getBestAnswer($question->id)->id}})"><i class="far fa-thumbs-down"></i></a>
        @if(Auth::user()->alreadyVotedAnswer($question->getBestAnswer($question->id)->id,Auth::user()->id) === 1)
          <style type="text/css">
            #upvote_button_answer{{$question->getBestAnswer($question->id)->id}}{
              color : #0099cc;
            }
          </style>
        @endif
        @if(Auth::user()->alreadyVotedAnswer($question->getBestAnswer($question->id)->id,Auth::user()->id) === -1)
          <style type="text/css">
            #downvote_button_answer{{$question->getBestAnswer($question->id)->id}}{
              color : #0099cc;
            }
          </style>
        @endif
        <a href="" data-id="{{$question->getBestAnswer($question->id)->id}})" data-toggle="modal" data-target="#reportModalAnswer" data-dismiss="modal" class="underTab colorLink">Report</a>
        @if ($question->getBestAnswer($question->id)->id_author === Auth::user()->id)
        <a href=""data-id="{{$question->getBestAnswer($question->id)->id}}"  data-toggle="modal" data-target="#deleteAnswerModal" data-dismiss="modal" class="underTab colorLink">Delete</a>
        <a href="#" data-id="{{$question->getBestAnswer($question->id)->id}}" data-message="{{$question->getBestAnswer($question->id)->message}}" data-toggle="modal" data-target="#editanswerModal" data-dismiss="modal" class="underTab colorLink">Edit</a>
        @endif        
      </div>
        @else
        <div>This question has no answers</div>
        @endif
    </div>

  </li>
  @endif
  @endforeach
    @else
    <p>No Questions found!</b>
  @endif

  @include('partials.submitAnsModal')  
  @include('partials.submitEditAnsModal') 
  @include('partials.submitEditQuestion') 
  