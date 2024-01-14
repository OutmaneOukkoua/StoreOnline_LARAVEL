@extends('layouts.app')

@section('content')
    <h4>Modifier le produit</h4>
    <form action="{{ route('produits.update', $produit->codeproduit) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div  class="form-group">
            <label for="codeproduit">Code Produit</label>
            <input type="text" name="codeproduit" id="codeproduit" class="form-control" value="{{ $produit->codeproduit }}" required>
        </div>
        <div  class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $produit->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
            @if ($produit->image)
                <img src="{{ asset($produit->image) }}" width="100px" alt="">
            @endif
        </div>
        <div class="form-group">
            <label for="prix">Prix</label>
            <input type="number" name="prix" id="prix" step="0.01" class="form-control" value="{{ $produit->prix }}" required>
        </div>
        <div class="form-group">
            <label for="id_categorie">Catégorie</label>
            <select name="id_categorie" id="id_categorie" class="form-control" required>
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $produit->id_categorie == $categorie->id ? 'selected' : '' }}>{{ $categorie->description }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
@endsection
