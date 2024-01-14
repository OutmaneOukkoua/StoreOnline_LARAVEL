<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My app</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My E-Commerce</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @auth
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @if(Auth::user()->role == "admin")
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('categories.index') }}">Catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.index') }}">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('commandes.index') }}">Commandes</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('produits.acheter') }}">Acheter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('LigneCommandeDemo.index') }}">Panier <span id="nb_produits">{{Auth::user()->produits->count()}}</span></a>
                    </li>


                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login.logout') }}">Déconnexion</a>
                    </li>


                </ul>
                <div class="d-flex">
                    <span>{{Auth::user()->name}}</span>

                </div>
                @endauth
            </div>
        </div>
    </nav>


    <div class="m-5">
        @yield('content')
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>


</body>

</html>