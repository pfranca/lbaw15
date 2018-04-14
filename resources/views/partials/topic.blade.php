@if(count($topics) > 0)
    @foreach($topics as $topic)

      <div class="col-sm-12 col-md-4 col-lg-3">
        <div class="card mb-4">
          <div class="card-image text-center" onclick="window.location.href='topic.html'">
            <img class="card-img-top" src="{{asset("images/". $topic->img)}}" alt="{{$topic->img}}">
            <h5 class="card-title name-top text-dark font-weight-bold">{{$topic->name}}</h5>
          </div>
          <div class="card-body">
            <a href="" class="follow "><h5 class="text-center mx-auto">
              Follow <i class="text-right far fa-heart"></i>
            </h5>
          </a>
          </div>
        </div>
      </div>

    @endforeach
  @else
    <p>No Topics found!</b>
  @endif