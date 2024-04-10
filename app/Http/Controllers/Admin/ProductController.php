<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index() {

        $products = Product::all(); // Va faire référence au model Product.

        return view('admin.products.index', ['products' => $products]);
    }

    public function create() {
        return view('admin.products.create');
    }

    public function store(Request $request) {
        // Validez les données du formulaire
        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'is_active' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validez le champ image
        ]);

        // Téléchargez l'image dans le système de fichiers
        $imagePath = $request->file('image')->store('images', 'public');

        // Créez un nouveau produit avec les données du formulaire et le chemin de l'image
        $product = new Product;
        $product->name = $validatedData['name'];
        $product->description = $validatedData['description'];
        $product->price = $validatedData['price'];
        $product->is_active = $validatedData['is_active'];
        $product->image_path = $imagePath;
        $product->save();

        // Redirigez l'utilisateur vers la page index avec un message de succès
        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès !');
    }

    public function edit($id) {

        $product = Product::findOrFail($id);

        return view('admin.products.edit', ['product' => $product]);
    }

    public function update(Request $request, $id) {
        $product = Product::findOrFail($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_active = $request->is_active;

        // Téléchargez la nouvelle image si elle a été mise à jour
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image_path = $imagePath;
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produit modifié avec succès !');
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé avec succès !');
    }


}
