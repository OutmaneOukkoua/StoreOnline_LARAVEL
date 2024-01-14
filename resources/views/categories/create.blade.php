@extends('layouts.app')

@section('content')
<h1>Ajouter une catégorie</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="description">Description</label>
        <input type="text" id="description" name="description" class="form-control">
        @error('description')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection
