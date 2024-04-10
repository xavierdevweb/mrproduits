@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1>
        Produits</h1>

    </table>
    <div class="container">
        <div class="row">
            @foreach ($products as $product)
                @if ($product->is_active)
                    <!-- Exemple de carte pour un produit -->
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <!-- Option pour l'image -->
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}">
                            <div class="card-body">
                                <!-- Nom du produit -->
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <!-- Description du produit -->
                                <p class="card-text">{{ $product->description }}</p>
                                <!-- Prix du produit -->
                                <p class="card-text">{{ $product->price }}</p>
                                <!-- Disponibilité du produit -->
                                <p class="card-text">Disponible : @if ($product->is_active)
                                        Oui
                                    @else
                                        Non
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    Aucun produit à afficher pour le moment !
                @endif
            @endforeach
        </div>
    </div>
@endsection
