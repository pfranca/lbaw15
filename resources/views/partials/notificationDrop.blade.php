@foreach($notifications as $notification)
@if(!$notification->seen)
       <li class="media list-group-item box-question pb-2" id="notification{{$notification->id}}" style="font-size: 8px; background-color: #343a40; border: 1px none #8c8c8c; " >
          
          <div class="row">
            <div class="col-10">
               <h6 class="mt-2 answer-link ml-2 col-10 col-white">
                {{$notification->message}} 
                </h6>
                <div class=" pl-4 col-white" >
                  <span class="small">submitted {{ date("F j, Y, g:i a", strtotime($notification->date)) }}</span>
                </div>
                <div class=" pl-4 mt-1" >
                  <a href="{{asset("/topic/".$notification->getTopic($notification->id_question)->name."/question/".$notification->getQuestion($notification->id_question)->id)}}" class="underTab colorLink-notification">Check Here</a>
                </div>
            </div>
            <div class="col-2 mt-2" >
              <a class="col-1 answer-link ml-auto text-center close-notification" onclick="actionDismiss({{$notification->id}})" title="Dismiss"><i class="far fa-window-close"></i></a>
            </div>
          </div>

         
          
@endif
@endforeach