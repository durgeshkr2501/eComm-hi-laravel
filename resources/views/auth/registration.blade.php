@extends('layouts.master')
@section('content')

<div class="container custom-registration">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
        @if(session()->has('error'))
                <p class="text-danger mt-2">{{ session()->get('error') }}</p>
            @endif
            <form action="registration" method="POST">
                <div class="form-group">
                    @csrf
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputUserName" aria-describedby="nameHelp" placeholder="User Name">

                </div>
                <div class="form-group">
                    @csrf
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control"  placeholder="Password">
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Contact</label>
                    <input type="" name="contact" class="form-control" placeholder="contact number">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

@endsection