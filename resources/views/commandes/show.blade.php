@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-4">
        Client : <b>{{$commande->user->name}}</b>
    </div>
    <div class="col-4">
        Date Commande : <b>{{$commande->datecommande}}</b>
    </div>
    <div class="col-4">
        Etat Facture : <b>{{$commande->etat}}</b>
    </div>
</div>
<div class="row mt-2">
    <div class="col-12">
        <h4>Liste des Produits</h4>
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Code Produit</th>
            <th>Description</th>
            <th>Image</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix * Quantité</th>
        </tr>
    </thead>
    <tbody>
        @php
        $som = 0;
        @endphp
        @foreach($produits as $index => $produit)
        <tr>
            @php
            $som += $produit->prix * $lignecommandes[$index]->quantite;
            @endphp
            <td>{{ $produit->codeproduit }}</td>
            <td>{{ $produit->description }}</td>
            <td><img src="{{ asset($produit->image) }}" width="100px"></td>
            <td>{{ $produit->prix }}</td>
            <td>{{ $lignecommandes[$index]->quantite }}</td>
            <td>{{ $produit->prix * $lignecommandes[$index]->quantite }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="5"></th>
            <th>{{ $som }}</th>
        </tr>
    </tbody>
</table>
@endsection
