@extends('layouts.master')
@section('title')
    Login
@endsection
@section('content')
    <h2>Login</h2>
    <hr>
    <form method="POST" action="/login">
        
        {{ csrf_field() }}

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

    @if (count($errors->all())>0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <p>{{ $error }}</p>
        </div>
    @endforeach
@endif
@endsection