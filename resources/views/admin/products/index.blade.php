@extends('layouts.admin.app')

@section('title', 'Produits')

@section('content')
    <div class="container d-flex justify-content-between ">
        <h1>Produits</h1>
        <div class="d-flex addProduct align-items-center">
            <a href="{{ route('admin.products.create') }}">Ajouter un produit</a>
            <a href="{{ route('admin.products.create') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                </svg></a>

        </div>

    </div>


    <div class="container">
        <div class="row" role="button">
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
                                <div class="container-fluid d-flex justify-content-center">
                                    <a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                                        class="btn btn-success">Modifier</a>
                                    <a href="{{ route('admin.products.clone', $product->id) }}"
                                        class="btn btn-primary">Dupliquer</a>

                                    <form action="{{ route('admin.products.destroy', ['product' => $product]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>

                                    </form>

                                </div>

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
