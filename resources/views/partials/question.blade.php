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
        <a class="underTab nameInQuestion" href="ISTO TEM DE IR PARA O PERFIL">{{$question->id_author}}</a>
        <span class="mr-auto">{{$question->date}}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-2" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
        <span class="label label-primary pr-2">{{$question->karma}}</span>
        <a class="pr-3" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
        <a id="bestAnswer" class="underTab colorLink" data-toggle="collapse" href="#question{{$question->id}}" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
        @guest
        @else
        <input type="hidden" id="questionIdReported" value="{{$question->id}}">
          @if ($question->id_author === Auth::user()->id)
          <a href="question3.html#answer" class="underTab colorLink">Answer</a>
            <a href="#" data-toggle="modal" data-target="#editquestionModal" data-dismiss="modal" class="underTab colorLink ml-auto">Edit</a>
            <a href="#" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete</a>
          @elseif (Auth::user()->type === 'MOD')
            <a href="question3.html#answer" class="underTab colorLink">Answer</a>
            <a href="#" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
            <a href="#" data-toggle="modal" data-target="#questionDelModal" data-dismiss="modal" class="underTab colorLink" id="deleteQuestion">Delete </a>
            @if(Auth::user()->followQuestionId($question->id,Auth::user()->id))
              <button id="followAnser" onclick="actionFollowAnswer('{{$question->id}}')" type="button" class="buttonDown" style="margin-left: 2%"> Unfollow </button>
            @else
              <button id="followAnser" onclick="actionFollowAnswer('{{$question->id}}')" type="button" class="buttonDown" style="margin-left: 2%"> Follow </button>
            @endif  
          @else
          <a href="question3.html#answer" class="underTab colorLink">Answer</a>
          <a href="#" data-toggle="modal" data-target="#reportModal" data-dismiss="modal" class="underTab colorLink">Report</a>
          @endif
        @endguest
      </div>
    </div>
    
    <div id="question{{$question->id}}" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
      </div>
      <div class="text-right pr-1">
        <div>{{$question->short_message}}</div>
        <a class="underTab nameInQuestion" href="ISTO TEM DE IR PARA O PERFIL">IR BUSCAR USER A DB</a>
        <span class="mr-auto">DATA DE QD FOI SUBMITED</span>
      </div>
      <div class="col-md-12">
        <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
        <span class="label label-primary pr-1">IR BSUCAR KARMA A DB</span>
        <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
        <a href="#" class="underTab colorLink">Report POR ACCAO</a>
        <a href="#" class="underTab colorLink">Delete POR ACCAO</a>
      </div>
    </div>

  </li>
  @endif
  @endforeach
    @else
    <p>No Questions found!</b>
  @endif
  @include('partials.submitEditQuestion')
  @include('partials.deleteQuestion')
  @include('partials.reportModal')
