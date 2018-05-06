@extends('layouts.default')
@section('title', 'Login')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="pannel-heading">
                <h4 class="text-center">Login</h4><hr>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <form method="POST" action="{{ route('login') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="Password" placeholder="Password" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember"> Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <button type="submit" class="btn btn-default">Login</button>
                            </div>
                    </div>
                </form>

                <hr>
                <p>还没有账号？<a href="{{ route('signup') }}">现在注册！</a></p>
            </div>
        </div>
    </div>
@endsection