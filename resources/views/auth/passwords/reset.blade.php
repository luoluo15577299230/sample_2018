@extends('layouts.default')
@section('title', '更新密码')

@section('content')
        <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="pannel-heading">
                <h4 class="text-center">更新密码</h4><hr>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : ''}} ">
                        <label for="email" class="col-sm-4 control-label">登录邮箱：</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $email or old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emial') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? 'has-error' : ''}} ">
                        <label for="password" class="col-sm-4 control-label">密码：</label>
                        <div class="col-sm-5">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : ''}} ">
                        <label for="password-confirm" class="col-sm-4 control-label">确认密码：</label>
                        <div class="col-sm-5">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <button type="submit" class="btn btn-primary">修改密码</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection