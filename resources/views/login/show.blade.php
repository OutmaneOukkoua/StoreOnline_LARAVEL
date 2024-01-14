@extends('layouts.app')

@section('content')
<form action="" method="post" class="form">
    @csrf
    <div class="form-group">
        <label for="login">Login</label>
        <input type="text" name="login" id="login" class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password" class="form-control" />
    </div>
    @if(session('erreur'))
    <div class="alert alert-danger">
        {{ session('erreur') }}
    </div>
    @endif
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>

<br/>
<br/>
<a class="btn btn-success" href="{{ route('register.client') }}">Register</a>

@endsection
