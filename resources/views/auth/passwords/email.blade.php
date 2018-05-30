@extends('layouts.app')

@section('content')


<div class="fluid">
    <div id="band" class="container-fluid bg-1 adjust">
      <div class="container adjust-login">
            <div class="row justify-content-center">
                <div class="col-md-8 col-md-offset-2 modal-login">
                    <div class="panel panel-default " align="center">
                        <div class="panel-heading "></div>

                        <div class="panel-body mt-5">
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label col-white">E-Mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control mb-4" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary q-btn-login">
                                            Get Reset Link via email
                                        </button>
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
