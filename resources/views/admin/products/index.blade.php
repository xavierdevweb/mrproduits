@extends('layouts.admin.app')

@section('title', 'Produits')

@section('content')
    <h1>Produits</h1>
    @if ($products->count() > 0)
        <table class="table">
            <thead>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Disponibilité</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </thead>
            <tbody>
                @foreach ($products as $product)
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
                        <td><a href="{{ route('admin.products.edit', ['product' => $product]) }}"
                                class="btn btn-success">Modifier</a></td>
                        <form action="{{ route('admin.products.destroy', ['product' => $product]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <td><button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        Aucun produit à afficher pour le moment !
    @endif

    <a href="{{ route('admin.products.create') }}">Ajouter un produit</a>
@endsection
