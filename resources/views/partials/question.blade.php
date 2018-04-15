@if(count($questions) > 0)
    @foreach($questions as $question)

<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-2">
      <div class="md-12 pl-4">
        <a class="question-link" href="{{$topic_name}}/question/{{$question->id}}">
            {{$question->short_message}}      
        </a>
      </div>
      <div class="text-right pr-1">
        <a class="underTab nameInQuestion" href="ISTO TEM DE IR PARA O PERFIL">{{$question->id_author}}</a>
        <span class="mr-auto">{{$question->date}}</span>
      </div>
      <div class="col-md-12">
        <a class="pr-2" data-toggle="upvote" href="#upvote"><i class="far fa-thumbs-up"></i></a>
        <span class="label label-primary pr-2">{{$question->karma}}</span>
        <a class="pr-3" data-toggle="upvote" href="#downvote"><i class="far fa-thumbs-down"></i></a>
        <a class="underTab colorLink" data-toggle="collapse" href="#question1" aria-expanded="false" aria-controls="collapseExample">Best Answer</a>
        <a href="question3.html#answer" class="underTab colorLink">Answer ISTO DE DE IR PARA O MODAL</a>
        <a href="#" class="underTab colorLink ml-auto">Edit ISTO TEM DE IR PARA O MODAL</a>
        <a href="#" class="underTab colorLink">Report POR ACCAO</a>
        <a href="#" class="underTab colorLink">Delete POR ACCAO</a>

      </div>
    </div>
    <div id="question1" class="collapse bg-light pt-2 col-md-11 ml-auto mr-auto">
      <div class="md-12 pl-4 pt-2 answer-link">
          {{$answers[3]->message}}
      </div>
      <div class="text-right pr-1">
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

  @endforeach
   {{$questions->links()}}
  @else
    <p>No Questions found!</b>
  @endif