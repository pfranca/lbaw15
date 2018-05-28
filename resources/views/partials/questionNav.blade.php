@if(count($questions) > 0)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-2">
      <div class="col-md-12 pl-3" style="font-size: 6px">
        <div class="row"></div>
        @foreach($topics->slice(0, 5) as $topic)   
          <div class="col-md-12" style="margin-bottom: 15px">
            <a style="font-size: 14px; padding: 5px; margin-right: 15px; background-color: #eff0f1" > 
              {{$topics[0]->getBestQuestion($topics[0]->id)->karma}}
            </a>
            <a class="question-link text-right" href="../topic/{{$topic->name}}/question/{{$topic->getBestQuestion($topic->id)->id}}">
              {{$topic->getBestQuestion($topic->id)->short_message}}      
            </a>
          </div>    
        @endforeach
      </div>
    </div>
  </div>
    
    

</li>
  
    @else
    <p>No Questions found!</b>
  @endif
  @include('partials.submitEditQuestion')
  @include('partials.deleteQuestion')
  @include('partials.deleteAnswer')
  @include('partials.reportModal')
  @include('partials.reportModalAnswer')
