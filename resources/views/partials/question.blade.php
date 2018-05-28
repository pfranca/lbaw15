@if(count($questions) > 0)
    @foreach($questions as $question)
      @if(!$question->disabled)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-2">
      <div class="md-12 pl-4">
      @foreach($topics as $topic)
        @if ($question->id_topic === $topic->id)
          <a class="question-link" href="../topic/{{$topic->name}}/question/{{$question->id}}">
            {{$question->short_message}}      
        </a>
        @endif
      @endforeach
      </div>
      <div class="text-right pr-1">
        <a class="underTab nameInQuestion" href="../../user/{{$question->user->username}}">{{$question->user->username}}</a>
        <span class="mr-auto">{{ date("F j, Y, g:i a", strtotime($question->date)) }}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-2" id="vote_button{{$question->id}}" data-toggle="vote" onclick="actionUpvoteQuestion({{$question->id}})"><i class="far fa-thumbs-up" ></i></a>
        <span id="question_karma{{$question->id}}" class="label label-primary pr-2">{{$question->karma}}</span>
        <a class="pr-3" data-toggle="upvote" onclick="actionDownvoteQuestion({{$question->id}})"><i class="far fa-thumbs-down"></i></a>
        <a id="bestAnswer" class="underTab colorLink" data-toggle="collapse" href="#question{{$question->id}}" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
        @guest
        @else
          @if ($question->id_author === Auth::user()->id)
          <a href="question3.html#answer" class="underTab colorLink">Answer</a>
            <a href="#" data-id="{{$question->id}}" data-long="{{$question->long_message}}" data-short="{{$question->short_message}}" data-toggle="modal" data-target="#editquestionModal" data-dismiss="modal" class="underTab colorLink ml-auto">Edit</a>
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete</a>

          @elseif (Auth::user()->type === 'MOD')
            <a href="question3.html#answer" class="underTab colorLink">Answer</a>
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
            <a href="#" data-id="{{$question->id}}" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete </a>
            @if(Auth::user()->followQuestionId($question->id,Auth::user()->id))
              <button id="followQuestion" onclick="actionFollowQuestion('{{$question->id}}')" type="button" class="buttonDown followCardQuestion" style="margin-left: 2%"> Unfollow </button>
            @else
              <button id="followQuestion" onclick="actionFollowQuestion('{{$question->id}}')" type="button" class="buttonDown followCardQuestion" style="margin-left: 2%"> Follow </button>
            @endif  
          @else
          <a href="{{$topic->name}}/question/{{$question->id}}" class="underTab colorLink">Answer</a>
          <a href="" data-id="{{$question->id}}" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
          @if(Auth::user()->followQuestionId($question->id,Auth::user()->id))
              <button id="followQuestion" onclick="actionFollowQuestion('{{$question->id}}')" type="button" class="buttonDown followCardQuestion" style="margin-left: 2%;border-radius: 20px; background-color: #4da6ff; color: white; border-style: none;padding-right: 20px; padding-left: 20px"> Unfollow </button>
            @else
              <button id="followQuestion" onclick="actionFollowQuestion('{{$question->id}}')" type="button" class="buttonDown followCardQuestion" style="margin-left: 2%;border-radius: 20px; background-color: #4da6ff; color: white; border-style: none; font-size: 2vmin; padding-right: 20px; padding-left: 20px"> Follow </button>
            @endif  
          @endif
        @endguest
      </div>
    </div>
    
    <div id="question{{$question->id}}" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
      </div>
      <div class="text-right pr-1">
        @if($question->getBestAnswer($question->id) != null)
          <div>{{$question->getBestAnswer($question->id)->message}}</div>
          <a class="underTab nameInQuestion" href="../../user/{{$question->getUser($question->id)->username}}">{{$question->getUser($question->id)->username}}</a>
        <span class="mr-auto">{{ date("F j, Y, g:i a", strtotime($question->getBestAnswer($question->id)->date)) }}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
        <span class="label label-primary pr-1">{{$question->getBestAnswer($question->id)->karma}}</span>
        <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
        @guest
        @else
        <a href="" data-id="{{$question->getBestAnswer($question->id)->id}}" data-toggle="modal" data-target="#reportModalAnswer" data-dismiss="modal" class="underTab colorLink">Report</a>
          @if ($question->getBestAnswer($question->id)->id_author === Auth::user()->id)
          <a href="" data-id="{{$question->getBestAnswer($question->id)->id}}"  data-toggle="modal" data-target="#deleteAnswerModal" data-dismiss="modal" class="underTab colorLink">Delete</a>
          @endif
        @endguest
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
  @include('partials.submitEditQuestion')
  @include('partials.deleteQuestion')
  @include('partials.deleteAnswer')
  @include('partials.reportModal')
  @include('partials.reportModalAnswer')
