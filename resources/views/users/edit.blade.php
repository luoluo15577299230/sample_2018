@extends('layouts.default')
@section('title', '编辑个人资料')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="pannel-heading">
                <h4 class="text-center">编辑个人资料</h4><hr>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <div class="gravatar_edit">
                    <a href="http://gravatar.com/emails" target="_blank">
                        <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="gravatar">
                    </a>
                </div>

                <form method="POST" action="{{ route('users.update', $user->id) }}" class="form-horizontal">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="{{ $user->email }}" disabled>
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
                                <button type="submit" class="btn btn-default">保存修改</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection