@foreach($answers as $answer)
  @if(!$answer->disabled)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pt-2 col-md-12 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
        {{$answer->message}}
      </div>
      <div class="text-right pr-1">
        <a class="underTab nameInQuestion" href="IRA PRA O PERFIL">{{$answer->id_author}}</a>
        <span class="mr-auto">{{$answer->date}}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-1" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
        <span class="label label-primary pr-1">{{$answer->karma}}</span>
        <a class="pr-4" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
        
        @guest
        @else
          @if ($answer->id_author === Auth::user()->id)
          <input type="hidden" id="questinId" value="{{$question->id}}">
          <a href="#" data-toggle="modal" data-target="#editanswerModal" data-dismiss="modal" class="underTab colorLink">Edit</a>
          <a href="#" class="underTab colorLink">Delete</a>
          <input type="hidden" value="{{$answer->id}}" id="answerIdToDelete">
          <a id="deleteAnswerButton" href="#" data-toggle="modal" data-target="#deleteAnswer" data-dismiss="modal">Delete</a>
        @elseif ($answer->id_author !== Auth::user()->id)
          <a href="#" class="underTab colorLink">Report</a>
          @else
          <a href="#" class="underTab colorLink">Delete</a>
        @endif
        @endguest
      </div>
    </div>


  </li>

  @include('partials.submitEditAnsModal')
  @include('partials.deleteAnswer')
  @endif
  @endforeach
