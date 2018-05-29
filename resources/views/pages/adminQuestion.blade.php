@extends('layouts.app')

@section('content')
<nav id="breadcrumbs" class="fixed-top" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a  href="{{asset('/')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Admin</li>
      <li class="breadcrumb-item active" aria-current="page">Questions</li>
      <li class="ml-auto">
        <a id="showAdmin" href="#" data-toggle="collapse" data-target="#sidebar">Show Admin</a>
      </li>

    </ol>
  </nav>

    <!-- id="adminBar" -->
    <div class="row" id="adminBar" style="margin-top: 51px;">
      
      @include('partials.adminNavBar')

      <div class=" col-md-12" id="bdAdmin">
          <div class="col-md-10 container-fluid" id="bdAdminMargin">

            <table id="question" class="display" width="100%"></table>

          </div>
      </div>
  </div>

  </div>
  </div>

</body>
<footer class="footer text-center static-bottom">
  <p>Cooperative Q&A <a href="#" data-toggle="tooltip" title="Cooperative q&a">www.cooperativeq&a.com</a></p>
</footer>
</html>

@endsection
