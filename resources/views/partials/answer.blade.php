@foreach($answers as $answer)
  @if(!$answer->disabled)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pt-2 col-md-12 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
        {{$answer->message}}
      </div>
      <div class="text-right pr-1">
        <a class="underTab nameInQuestion" href="{{asset("user/".$answer->user->username)}}">{{$answer->user->username}}</a>
        <span class="mr-auto">{{$answer->date}}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-1" data-toggle="upvote" href="#upvote" onclick="actionUpvoteAnswer({{$answer->id}})"><i class="far fa-thumbs-up"></i></a>
        <span id="answer_karma{{$answer->id}}" class="label label-primary pr-1">{{$answer->karma}}</span>
        <a class="pr-4" data-toggle="upvote" href="#downvote" onclick="actionDownvoteAnswer({{$answer->id}})"><i class="far fa-thumbs-down"></i></a>
        
        @guest
        @else
          @if ($answer->id_author === Auth::user()->id)
          <a href="#" data-id="{{$answer->id}}" data-toggle="modal" data-target="#editanswerModal" data-dismiss="modal" class="underTab colorLink">Edit</a>
          <a  href="#" data-id="{{$answer->id}}" data-toggle="modal" data-target="#deleteAnswerModal" data-dismiss="modal">Delete</a>
        @elseif(Auth::user()->type === 'MOD')
          <a href="#" data-id="{{$answer->id}}" data-toggle="modal" data-target="#reportModalAnswer" data-dismiss="modal" class="underTab colorLink">Report</a>
          <a  href="#" data-id="{{$answer->id}}" data-toggle="modal" data-target="#deleteAnswerModal" data-dismiss="modal">Delete</a>
        @else
          <a href="#" data-id="{{$answer->id}}" data-toggle="modal" data-target="#reportModalAnswer" data-dismiss="modal" class="underTab colorLink">Report</a>
        @endif
        @endguest
      </div>
    </div>


  </li>

  @include('partials.submitEditAnsModal')
  @include('partials.deleteAnswer')
  @include('partials.reportModalAnswer')
  @endif
  @endforeach
