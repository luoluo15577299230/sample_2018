@extends('layouts/default')

@section('title', 'Login')

@section('content')
    <div class="container">
        <form class="form-horizontal col-md-8 col-md-offset-2">
            <div class="control-group">
                <label class="control-label" for="inputName">Name</label>
                <div class="controls">
                    <input type="text" id="inputName" placeholder="Username/Email">
                </div>
            </div>
            <div class="control_group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input type="password" id="inputPassword" placeholder="Password">
                </div>
            </div>
                <label>
                    <input type="checkbox">记住账号密码
                </label>
        </form>
    </div>
@endsection