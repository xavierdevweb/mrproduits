<!DOCTYPE html>
<html lang="fr">

@include('layouts.admin.includes.head')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Mr. Produits - Admin !</a>
            <div>
                <!-- Affiche le bouton de déconnexion uniquement si l'utilisateur est connecté -->
                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-link">Déconnexion</button>
                    </form>
                @else
                    <!-- Affiche les liens de connexion et d'inscription si l'utilisateur n'est pas connecté -->
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}">Inscription</a>
                @endauth
            </div>
        </div>
    </nav>
    </nav>

    <div class="container mt-5">
        @yield('content')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
</body>

</html>
