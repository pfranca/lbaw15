@if(count($questions) > 0)
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-1">
      <div class="col-md-12 pl-3" style="font-size: 6px; padding: 0px">
        <div class="row">
          @foreach($topics->slice(0, 5) as $topic)   
          <div class="col-md-12" style="margin-bottom: 15px">
            <a style="font-size: 14px; padding: 5px; margin-right: 15px; margin-bottom: 22px; background-color: #eff0f1" > 
              {{$topics[0]->getBestQuestion($topics[0]->id)->karma}}
            </a>
            <a class="question-link text-right" href="../topic/{{$topic->name}}/question/{{$topic->getBestQuestion($topic->id)->id}}">
              {{$topic->getBestQuestion($topic->id)->short_message}}      
            </a>
          </div>    
        @endforeach
        </div>

        @foreach($topics->slice(3,2 ) as $topic)   
          <div class="card-image text-center" style="margin-bottom: 20px" onclick="window.location.href='{{asset("topic/". $topic->name)}}'">
            <img class="card-img-top"   style="min-height: 40px;max-height: 70px; min-width: 200px; max-width: 220px" src="{{asset("images/". $topic->img)}}" alt="{{$topic->img}}">

            <h5 class="card-title name-top text-dark font-weight-bold" style="margin-top: -42px; color: white">{{$topic->name}}</h5>
          
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
