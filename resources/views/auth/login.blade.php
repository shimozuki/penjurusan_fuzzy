@extends('layouts.login')

@section('title','Login page kepegawaian')

@section('content')
<form class="user" method="post" action="{{route('login')}}">
    @csrf
    <div class="form-group">
        <input type="text" name="username"
            class="form-control form-control-user @error('username') border border-danger @enderror"
            placeholder="Username...">
        @error('username')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" name="password"
            class="form-control form-control-user @error('password') border border-danger @enderror"
            placeholder="Password">
        @error('password')
        <small class="text-danger">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember">
            <label class="custom-control-label" for="customCheck">Remember
                Me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
@endsection