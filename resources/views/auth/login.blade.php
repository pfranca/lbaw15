@extends('layouts.app')

@section('content')


<div class="fluid">
    <div id="band" class="container-fluid bg-1 adjust">
      <div class="container adjust-login">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2 modal-login">
                    <div class="panel panel-default " align="center">
                        <div class="panel-heading "></div>

                        <div class="panel-body ">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label col-white">Username</label>

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
                            <label for="password" class="col-md-4 control-label col-white">Password</label>

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
                                <button type="submit"  class="btn btn-primary q-btn-login mt-2">
                                    Login
                                </button>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                 <a class="button button-outline col-blue under-a-line"  style="text-decoration: none;" href="{{ route('password.request') }}">Forgot Your Password?</a>
                            </div>
                            <div class="col-md-12">
                                <a class="button button-outline col-blue under-a-line" style="text-decoration: none;" href="{{ route('register') }} " >Register</a>
                            </div>
                        </div>
                           
                            
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
