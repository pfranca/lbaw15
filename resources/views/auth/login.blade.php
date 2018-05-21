@extends('layouts.app')

@section('content')


<div class="fluid">
    <div id="band" class="container-fluid bg-1 adjust-login">
      <div class="container adjust-login">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2 modal-login">
                    <div class="panel panel-default " align="center">
                        <div class="panel-heading "></div>

                        <div class="panel-body ">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label" style="color: white">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="error">
                                    {{ $errors->first('username') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" style="color: white">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="error">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                            </div>
                        </div>

                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4"> 
                                <button type="submit"  class="btn btn-primary">
                                    Login
                                </button>
                            </div>
                        </div>
                            <a class="button button-outline" href="{{ route('register') }} " style="color: #4da6ff">Register</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
