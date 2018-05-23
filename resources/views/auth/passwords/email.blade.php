@extends('layouts.default')
@section('title', '重置密码')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="pannel-heading">
                <h4 class="text-center">重置密码</h4><hr>
            </div>
            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? 'has-error' : ''}} ">
                        <label for="email" class="col-sm-4 control-label">登录邮箱：</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>

                            @if($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('emial') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <button type="submit" class="btn btn-primary">发送密码重置邮件</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection