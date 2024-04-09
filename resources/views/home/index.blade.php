@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <h1>Produits</h1>
    @if ($products->count() > 0)
        <table class="table">
            <thead>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Disponibilité</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    @if ($product->is_active)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ($product->is_active)
                                    Disponible
                                @else
                                    Non-disponible
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        Aucun produit à afficher pour le moment !
    @endif
@endsection
