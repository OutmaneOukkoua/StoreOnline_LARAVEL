@extends('layouts.app')

@section('content')
<form action="{{ route('register.client') }}" method="post" class="form">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" />
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
    </div>
    @if(session('erreur'))
    <div class="alert alert-danger">
        {{ session('erreur') }}
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Register</button>
</form>


<br/>
<br/>
<a class="btn btn-info" href="{{ route('login.login') }}">Login</a>
@endsection