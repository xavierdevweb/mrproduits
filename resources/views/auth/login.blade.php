@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <!-- Formulaire de connexion -->
                        <form method="POST" action="{{ route('auth.login.index') }}">
                            @csrf

                            <!-- Champ pour l'adresse e-mail -->
                            <div class="form-group">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required autofocus>
                            </div>

                            <!-- Champ pour le mot de passe -->
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>

                            <!-- Bouton de soumission -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
