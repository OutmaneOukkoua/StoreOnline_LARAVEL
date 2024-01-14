@extends('layouts.app')

@section('content')
<div class="row m-2">
    <div class="col-3">
        <h4>Liste des produits</h4>
    </div>

    <div class="col-6">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-3">
        <a href="{{ route('produits.create') }}" class="btn btn-primary">Ajouter un produit</a>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Code Produit</th>
            <th>Description</th>
            <th>Image</th>
            <th>Prix</th>
            <th>Catégorie</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produits as $produit)
        <tr>
            <td>{{ $produit->codeproduit }}</td>
            <td>{{ $produit->description }}</td>
            <td><img src="{{ asset($produit->image) }}" alt="Product Image" width="100px"></td>
            <td>{{ $produit->prix }}</td>
            <td>{{ $produit->categorie->description }}</td>
            <td>
                <a href="{{ route('produits.edit', $produit ) }}" class="btn btn-sm  btn-primary"><span class="bi bi-pencil"></span></a>
                <form action="{{ route('produits.destroy', $produit ) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm  btn-danger"  onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette Produit ?')"><span class="bi bi-trash"></span></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection