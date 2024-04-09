@extends('layouts.admin.app')

@section('title', 'Modifier un produit')

@section('content')
    <h1>Modifier {{ $product->name }}</h1>


    <div class="row">
        <div class="col-6 col-lg-6">
            <form method="POST" action="{{ route('admin.products.update', ['product' => $product]) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ $product->price }}">
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Disponibilité du produit</label>
                    <select name="is_active" id="is_active" class="form-control" type="text">
                        <option value="1" @if ($product->is_active) selected @endif>Disponible</option>
                        <option value="0" @if (!$product->is_active) selected @endif>Non-disponible</option>
                    </select>

                    <input type="submit" value="sauvegarder" class="btn btn-primary">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
            </form>
        </div>
    </div>


    {{-- Notre formulaire ira ici ! --}}
@endsection
