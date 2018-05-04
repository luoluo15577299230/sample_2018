@extends('layouts/default')

@section('title', 'Login')

@section('content')
     <div class="container">
        <form class="form-horizontal">
            <div class="form-group">
                <label for="inputName" class="col-sm-4 control-label">Name</label>
                <div class="col-sm-5">
                    <input type="email" class="form-control" id="inputName" placeholder="Username/Email">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword" class="col-sm-4 control-label">Password</label>
                <div class="col-sm-5">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-5">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Remember me
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-5">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
            </div>
        </form>
    </div>

@endsection