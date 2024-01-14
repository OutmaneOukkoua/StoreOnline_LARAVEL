@extends('layouts.app')

@section('content')
<div class="row m-2">
    <div class="col-3">
        <h4>Liste des catégories</h4>
    </div>
    <div class="col-6">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-3">
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Ajouter une catégorie</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Description</th>
            <th>Produits</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $categorie)
        <tr>
            <td>{{ $categorie->id }}</td>
            <td>{{ $categorie->description }}</td>
            <td>{{ $categorie->produits->count() }}</td>
            <td>
                <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-primary"><span class="bi bi-pencil"></span></a>
                <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')"><span class="bi bi-trash"></span></button>
                </form>
                <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-sm btn-warning"><span class="bi bi-eye"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
