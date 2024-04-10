@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inscription</div>
                    <div class="card-body">
                        <!-- Formulaire d'inscription -->
                        <form method="POST" action="{{ route('auth.register.store') }}">
                            <!-- Utilisez le nom de la route correct -->
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Champ pour le nom -->
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" class="form-control" required
                                        autofocus>
                                </div>

                                <!-- Champ pour l'adresse e-mail -->
                                <div class="form-group">
                                    <label for="email">Adresse e-mail</label>
                                    <input type="email" name="email" id="email" class="form-control" required>
                                </div>

                                <!-- Champ pour le mot de passe -->
                                <div class="form-group">
                                    <label for="password">Mot de passe</label>
                                    <input type="password" name="password" id="password" class="form-control" required>
                                </div>

                                <!-- Bouton de soumission -->

                            @endif
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">S'inscrire</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
