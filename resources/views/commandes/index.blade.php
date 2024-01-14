<!-- resources/views/categories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="row m-2">
    <div class="col-4">
        <h4>Liste des Commandes</h4>
    </div>
    <div class="col">
        @if(session('success'))
        <div class="alert alert-info">
            {{ session('success') }}
        </div>
        @endif
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Client</th>
            <th>Date Commande</th>
            <th>Etat Commande</th>
            <th>Nombre Produits</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->user->name }}</td>
            <td>{{ $commande->datecommande }}</td>
            <td>{{ $commande->etat }}</td>
            <td>{{ $commande->lignecommande->count() }}</td>
            <td>
                <form action="{{route('commandes.annuler',$commande->id)}}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-dark" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette catégorie ?')" title="Annuler">A</button>
                </form>
                <form action="{{route('commandes.valider',$commande->id)}}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-info" onclick="return confirm('Êtes-vous sûr de vouloir valider cette catégorie ?')" title="Valider">V</button>
                </form>
                <form action="{{route('commandes.destroy',$commande->id)}}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')" title="Supprimer"><span class="bi bi-trash"></span></button>
                </form>

                <a href="{{route('commandes.show',$commande->id)}}" class="btn btn-sm btn-warning" title="Detail"><span class="bi bi-eye"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection