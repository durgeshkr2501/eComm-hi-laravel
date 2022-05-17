@extends('layouts.master')
@section('content')

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            @if(session()->has('error'))
                <p>{{ session()->get('error') }}</p>
            @endif
            <form action="login" method="POST">
                <div class="form-group">
                    @csrf
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    @error('email')<p class="text-danger">{{$message}}</p> @enderror

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    @error('password')<p class="text-danger">{{$message}}</p> @enderror
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

@endsection