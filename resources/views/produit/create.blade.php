@extends('layouts.app')

@section('content')
<h4>Ajouter un produit</h4>
<form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="codeproduit">Code Produit</label>
        <input type="text" name="codeproduit" class="form-control" id="codeproduit">
        @error('codeproduit')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="form-control" id="description"></textarea>
        @error('description')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" class="form-control" id="image">
        @error('image')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="number" name="prix" class="form-control" id="prix" step="0.01">
        @error('prix')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="id_categorie">Catégorie</label>
        <select name="id_categorie" class="form-control" id="id_categorie">
            @foreach ($categories as $categorie)
            <option value="{{ $categorie->id }}">{{ $categorie->description }}</option>
            @endforeach
        </select>
        @error('id_categorie')
        <div class="text-danger">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Créer</button>
</form>
@endsection