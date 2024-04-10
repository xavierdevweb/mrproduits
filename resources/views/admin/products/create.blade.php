@extends('layouts.admin.app')

@section('title', 'Ajouter un produit')

@section('content')
    <h1>Ajouter un produit</h1>


    <div class="row">
        <div class="col-6 col-lg-6">
            <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf

                <input type="file" name="image">

                <div class="mb-3">
                    <label for="name" class="form-label">Nom du produit</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prix</label>
                    <input type="text" id="price" name="price" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="is_active" class="form-label">Disponibilité du produit</label>
                    <select name="is_active" id="is_active" class="form-control" type="text">
                        <option value="1">Disponible</option>
                        <option value="0">Non-disponible</option>
                    </select>

                    <input type="submit" value="sauvegarder" class="btn btn-primary">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Retour</a>
            </form>
        </div>
    </div>


    {{-- Notre formulaire ira ici ! --}}
@endsection
