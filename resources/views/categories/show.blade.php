@extends('layouts.app')

@section('content')
<div class="row m-2">
    <h5>Liste des produits de Catégorie : <span class="text-primary ml-3">{{ $categorie->description }}</span></h5>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Code Produit</th>
            <th>Description</th>
            <th>Image</th>
            <th>Prix</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produits as $produit)
        <tr>
            <td>{{ $produit->codeproduit }}</td>
            <td>{{ $produit->description }}</td>
            <td><img src="{{ asset($produit->image) }}" alt="Product Image" width="100px"></td>
            <td>{{ $produit->prix }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
