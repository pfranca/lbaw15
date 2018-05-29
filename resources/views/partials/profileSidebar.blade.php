
<li class="list-group-item font-theme align-items-start box-question">
    <div class="pb-1">
      <div class="col-md-12 pl-3 nav1" style="">

        <div class="title-nav">User's Inf</div>
         
         <div class="userSide" >
            {{$user->email}}
            <br />
            Karma :  9000
            <br />
            Answers : 28
          </div>

        <div class="title-nav" style="border-top-style:2px solid black;">Sorted</div>
        <div class="text-left pr-1 mt-1 nav-sort">        
          <select>
            <option value="Our special sauce" selected>
              Our special sauce
            </option>
            <option value="Oldest to newest">
              Oldest to newest
            </option>
            <option value="Newest to oldest">
              Newest to oldest
            </option>
            <option value="Karma">
              Karma
            </option>
          </select>
        </div>

        <div class="row">
          <div class="title-voted">Most Voted</div>
          @foreach($topics->slice(0, 5) as $topic)   
          <div class="col-md-12 nav-mg">
            <a class="nav-a-style" > 
              {{$topic->getBestQuestion($topic->id)->karma}}
            </a>
            <a class="question-link text-right" href="../topic/{{$topic->name}}/question/{{$topic->getBestQuestion($topic->id)->id}}">
              {{$topic->getBestQuestion($topic->id)->short_message}}      
            </a>
          </div>    
        @endforeach
        </div>
        <div class="title-visited">Most Visited</div>
        @foreach($topics->slice(1,3 ) as $topic)   
          <div class="card-image text-center img-bottom" onclick="window.location.href='{{asset("topic/". $topic->name)}}'">
            <img class="card-img-top img-nav" src="{{asset("images/". $topic->img)}}" alt="{{$topic->img}}">

            <h5 class="card-title name-top text-dark font-weight-bold" style="margin-top: -42px">{{$topic->name}}</h5>
          
          </div>
        @endforeach 
      </div>
    </div>
  </div>
    
    

</li>
  
  @include('partials.submitEditQuestion')
  @include('partials.deleteQuestion')
  @include('partials.deleteAnswer')
  @include('partials.reportModal')
  @include('partials.reportModalAnswer')
