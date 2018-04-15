<!DOCTYPE html>
<html lang="en">

<head>
  <title>{{config('app.name', 'Q&A')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="{{asset('css/q&a.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

  <script src="{{asset('js/q&a.js')}}" defer></script>
  
</head>

@include('partials.loginModal')

<body id="index" data-spy="scroll" data-target=".navbar" data-offset="50">

  <div id="modals" class='login'>

  </div>

  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{asset('/')}}">Cooperative Q & A</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
    <span class="navbar-toggler-icon"></span>
      </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <form class="form-inline offset-lg-2 col-12 col-lg-5 col-xl-6">
        <input class="form-control search-control col-10" type="text" placeholder="Search">
        <button class="btnsearch  col-2" type="submit"><i class="fas fa-search"></i></button>
      </form>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="feed.html">FEED</a>
        </li>
        <li class="nav-item">
          <a id="TopicsNavBar" class="nav-link">TOPICS</a>
        </li>
        <li class="nav-item">
            @guest
                 <a id="loginButton" class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">LOGIN</a>
            @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endguest
        </li>
      </ul>
    </div>
  </nav>

@yield('content');

  </body>
<footer class="footer text-center static-bottom">
  <p>Cooperative Q&A <a href="#" data-toggle="tooltip" title="Cooperative q&a">www.cooperativeq&a.com</a></p>
</footer>

</html>
                        
                   