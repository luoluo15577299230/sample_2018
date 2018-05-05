@extends('layouts.default')
@section('title', 'SignUp')

@section('content')
    <div class="col-md-offset-2 col-md-8">
        <div class="panel panel-default">
            <div class="pannel-heading">
                <h4 class="text-center">Sign Up</h4><hr>
            </div>
            <div class="panel-body">
                @include('shared._errors')

                <form method="POST" action="{{ route('users.store') }}" class="form-horizontal">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="inputName" class="col-sm-4 control-label">Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputName" placeholder="User Name" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputemail" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="inputemail" placeholder="Email" name="email" value="{{ old('email') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" value="{{ old('password') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Password_confirmation" class="col-sm-4 control-label">Re_Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value=""> I had Readed the Agreement
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-5">
                                <button type="submit" class="btn btn-default">Sign Up</button>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
