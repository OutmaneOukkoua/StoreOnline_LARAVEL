@extends('layouts.app')
<meta name="csrf-token" content="{{csrf_token()}}">
<style>
    .flex-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .sidebar {
        background-color: azure;
        padding: 5px;
    }

    .sidebar ul {
        margin: 0;
        list-style-type: none;
        padding: 0;
    }

    .sidebar li {
        padding: 5px;
        padding-left: 15px;
        /* margin-bottom: 10px; */
        font-size: 18px;
    }

    .sidebar li button {
        color: #333;
        text-decoration: none;
    }

    .sidebar li:hover {
        color: #000;
        background-color: aqua;
        /* text-decoration: underline; */
    }
</style>
<script>
    function AddToPanier(id) {
        const qt = document.getElementById(id).value;
        var request = new XMLHttpRequest();
        request.open('POST', "{{route('LigneCommandeDemo.store')}}", true);
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        request.onload = function() {
            if (this.status == 200) {
                document.getElementById('nb_produits').innerHTML = this.response;
            }

        };
        request.send(`codeproduit=${id}&quantite=${qt}`);
        document.getElementById(id).value = 1;
    }
</script>
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 sidebar">
            <ul>

                <a href="{{route('produits.acheter')}}">
                    <li>Tout</li>
                </a>
                @foreach ($categories as $categorie)
                <a href="{{route('produits.acheter',$categorie->id)}}">
                    <li>{{$categorie->description}}</li>
                </a>
                @endforeach
            </ul>
        </div>
        <div class="col-md-9">
            <div class="row">

                <div class="col">
                    <h4>Liste des produits</h4>
                </div>
                <div class="col">
                    @if(session('success'))
                    <div class="alert alert-info">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>
            </div>

            <div class="row">
                @foreach ($produits as $produit)

                <div class="col-4 card mt-4" style="width: 18rem;">
                    <img src="{{ asset($produit->image) }}" class="card-img-top" alt="..." width="200px" height="250px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $produit->prix }} DH</h5>
                        <p class="card-text">{{ $produit->description }}</p>
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                    </div>
                    <div class="card-footer flex-container">
                        <!-- <form action="{{route('LigneCommandeDemo.store',$produit->codeproduit)}}" method="post" class="flex-container"> -->
                        <input type="number" value='1' id="{{ $produit->codeproduit }}" class="form-control" />
                        <button class="btn btn-primary" onclick="AddToPanier('{{ $produit->codeproduit }}')">+</button>
                        <!-- </form> -->
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>


@endsection