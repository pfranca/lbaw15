@extends('layouts.app')



@section('content')

   <nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item"><a href="/topic/{{$topic_name}}"> {{$topic_name}}</a></li>
      <li class="breadcrumb-item active" aria-current="page">Question </li>
      @guest
      @else
      <li class="ml-auto">
        <a id="submitAnswerButton" href="#" data-id="{{$question->id}}" data-user="{{Auth::user()->id}}" data-toggle="modal" data-target="#answerModal" data-dismiss="modal">Submit Answer</a>
     </li>
      @endguest
    </ol>
  </nav>

  <input type="hidden" id="questionId" value="{{$question->id}}">


  <div id="questions" class="bg-white">

    <div class="row questionPage col-md-12">
      <div class="text-right pr-1 mt-1" style="margin-left:14%"></div>
      <div class="col-md-10 mr-0">

        <div class="row col-md-12 pt-4">
          <div class="col-md-6 d-flex align-items-end mb-4 mt-1 ml-2 text-left q-style">
           {{$question->short_message}}  
          </div>
          <!-- Buton to follow question-->
          <div class="col-md-5   mt-5 ">
            @guest
              @else
              @if(!Auth::user()->isFollowedQuestion($question->id, Auth::user()->id))
                    <a id="fllQuestion{{$question->id}}" value="Follow" onclick="actionFllQuestion('{{$question->id}}')" class="q-follow btn js-scroll-trigger ">
                      <div class="about txt-color">
                        <p>Follow Question</p>
                      </div>
                    </a>

                  @else
                    <a id="fllQuestion{{$question->id}}" value="Unfollow" onclick="actionFllQuestion('{{$question->id}}')" class="q-follow btn btn-circle js-scroll-trigger btn-arrow">
                      <div class="about txt-color">
                        <p>Unfollow Question</p>
                      </div>
                    </a>

                  @endif
                  @endguest
          </div>
        </div>
        
        <div class="col-md-7 ml-2 text-left b-line" style="font-size: 70%; color: #404040">
            {{$question->long_message}} aokfj fig aoisgkaskdfmkndfkslnf ksmd s dls dl dl dl dlf dlmfpsodfmosidnfs fpsidmf sdpkmf psdm fpsd
            okfj fig aoisgkaskdfmkndfkslnf ksmd s dls dl dl dl dlf dlmfpsodfmosidnfs fpsidmf sj mfspºojd fmsd
        </div>

      </div>
    </div>
    
  <div id="questions" class="row bg-white col-md-12">
      <div class="text-right pr-1 mt-1" style="margin-left:14%"></div>


      <div class=" bg-white col-md-6" style="margin-top: 35px">
        <ul class="list-group col-md-12">
          @include('partials.answer')
        </ul>
      </div>

      <div class=" bg-white col-md-3" style="margin-top: 70px">
        <ul class="list-group col-md-12">
          @include('partials.questionNav' ,['questions'=>$allQuestions, 'topics'=>$allTopics])
        </ul>
      </div>
  </div>

  </div>
  </div>
  </div>
  
  @include('partials.submitAnsModal')



@endsection