@foreach($answers as $answer)
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
        {{--
        <a href="#" class="underTab colorLink">Report A FUNCIONAR</a>
        <a href="#" class="underTab colorLink">Delete A FUNCIONAR</a>
      --}}
      </div>
    </div>


  </li>

  @endforeach