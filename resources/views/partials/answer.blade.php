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
          
              <button value="{{$answer->id}}" id="getAnswerId" style="display: none;" type="button" class="buttonDown btn btn-primary btn-sm"></button>
          <a href="#" class="underTab colorLink">Edit </a>
          <input type="hidden" value="{{$answer->id}}" id="answerIdToDelete">
          <a id="deleteAnswerButton" href="#" data-toggle="modal" data-target="#deleteAnswer" data-dismiss="modal">Delete</a>
        @else
          <a href="#" class="underTab colorLink">Report</a>
        @endif
        @endguest
      </div>
    </div>


  </li>

  @include('partials.deleteAnswer')
  @endif
  @endforeach