@extends('layouts.app')

@section('content')
    <div class="col-md-12 settings-background">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 settings-container">
                    <div class="panel panel-default">
                        <div class="settings-inner-panel">
                            <div class="panel-heading settings-page-title">Password update
                                <a href="{{ url('settings') }}">
                                    <button class="btn btn-default">
                                        Settings
                                    </button>
                                </a></div>
                            <div class="panel-body">
                                @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <form class="form-horizontal setting-form" role="form" method="POST" action="{{ url('/update-password') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('existing') ? ' has-error' : '' }}">
                                        <label for="existing" class="col-md-4 control-label">Password</label>
                                        <div class="col-md-6">
                                            <input id="existing" type="password" class="form-control" name="existing">
                                            @if ($errors->has('existing'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('existing') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">New password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <label for="password_confirmation" class="col-md-4 control-label">Repeat password</label>
                                        <div class="col-md-6">
                                            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-update-info">
                                                <strong>Changes</strong>
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
