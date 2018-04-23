@if(count($topics) > 0)
    @foreach($topics as $topic)

      <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card mb-4">
          <div class="card-image text-center" onclick="window.location.href='{{asset("topic/". $topic->name)}}'">
            <img class="card-img-top" src="{{asset("images/". $topic->img)}}" alt="{{$topic->img}}">

            <h5 class="card-title name-top text-dark font-weight-bold">{{$topic->name}}</h5>
          
          </div>
          
          @guest
          @else
          <div class="card-body" id="submitFollowTopic">
            @foreach(Auth::user()->followTopic as $followedTopic) 
              @if($topic->id == $followedTopic->id)
                <a href="" class="unfollow"><h5 class="text-center mx-auto">
                  Unfollow <i class="text-right fas fa-heart"></i>
                </h5>
                </a>
            @else
              <a href="" class="follow"><h5 class="text-center mx-auto">
                Follow <i class="text-right far fa-heart"></i>
              </h5>
              </a>
            @endif
            @endforeach
          <param value="{{$topic->id}}" id="idTopic">
          </div>
          @endguest
        </div>
      </div>
      
    @endforeach
   
  @else
    <p>No Topics found!</b>
  @endif