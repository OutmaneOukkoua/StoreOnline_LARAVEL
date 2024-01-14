@extends('layouts.app')

@section('content')

<div class="row m-2">
    <div class="col-5">
        <h4>Ton Panier</h4>
    </div>

    <div class="col-4">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>
    <div class="col-3 text-right">
        <form action="{{route('commandes.store')}}" method="post">
            @csrf
            <button class="btn btn-primary">Valider</button>
        </form>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Code produit</th>
            <th>Description</th>
            <th>Image</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix * Quantité</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $som = 0;
        @endphp

        @foreach($produits as $p)
        @php
        $som += $p->produit->prix * $p->quantite;
        @endphp
        <tr>
            <td>{{ $p->produit->codeproduit }}</td>
            <td>{{ $p->produit->description }}</td>
            <td><img src="{{asset($p->produit->image)}}" width="100px"></td>
            <td>{{ $p->produit->prix }} DH</td>
            <td>{{ $p->quantite }}</td>
            <td>{{ $p->produit->prix * $p->quantite }} DH</td>
            <td>
                <form action="{{route('LigneCommandeDemo.destroy', $p->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th colspan="2">{{$som}} DH</th>
        </tr>
    </tbody>
</table>
@endsection
